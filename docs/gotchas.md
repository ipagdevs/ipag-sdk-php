← [CLAUDE.md](../CLAUDE.md) · [setup](setup.md) · [sdk](sdk.md) · **gotchas**

# Armadilhas

Só o que não se descobre lendo o código. Os bugs latentes estão em
[sdk.md § Notas de leitura](sdk.md#notas-de-leitura).

## Ambiente

### O compose local não existe num clone

`Dockerfile`, `docker-compose.yml`, `.docker/` e `.devcontainer/` estão no
`.gitignore` (`Dockerfile`, `*docker*`, `.devcontainer`). Onde existem, são
arquivos pessoais: o serviço tem nome de dev, a imagem é PHP 7.4 com Xdebug em
`start_with_request=yes` e o `XDEBUG_CONFIG` usa sintaxe do Xdebug 2. Use os
comandos `docker run` de [setup.md](setup.md#comandos), que funcionam em
qualquer clone.

### `vendor/` e `.phpunit.cache` com dono `root`

Um `composer install` rodado como root num container deixa `vendor/` e
`.phpunit.cache/` com dono `root`. Os sintomas são dois:

- o `composer install` com `-u` falha com `Permission denied`;
- o `vendor/` envelhece sem ninguém perceber. O lock evolui, mas ninguém
  consegue reinstalar.

Com o `vendor/` velho, o PHPUnit antigo emite deprecation no PHP 8.4, e a
suíte inteira cai com `Tests: 461, Assertions: 0, Errors: 461`
(`Implicitly marking parameter ... as nullable` em `sebastian/cli-parser`). Não
é bug do SDK, é o `vendor/`.

```bash
# o vendor/ bate com o lock? (só lê, nada é alterado)
docker run --rm -u "$(id -u):$(id -g)" -e COMPOSER_HOME=/tmp/composer \
  -v "$PWD":/app:ro -w /app composer:2 install --dry-run --no-interaction
# "0 installs, 0 updates" = em dia

# reinstalar: apaga como root (o dono atual) e instala com o seu usuário.
# Use a imagem php: na composer:2, "rm" é alias de "composer remove".
docker run --rm -v "$PWD":/app -w /app php:7.4-cli rm -rf vendor .phpunit.cache
docker run --rm -u "$(id -u):$(id -g)" -e COMPOSER_HOME=/tmp/composer \
  -v "$PWD":/app -w /app composer:2 install --no-interaction
```

O `.phpunit.cache` com dono `root` não quebra nada: o PHPUnit só deixa de
gravar o cache de resultados.

### `composer.lock` muda sem ninguém pedir

- Um Composer mais novo reescreve o `plugin-api-version` no lock. Se essa for a
  única mudança no lock, reverta (`git checkout composer.lock`).
- `config.platform.php=7.4.33` e o `audit.ignore` do `composer.json` vieram
  juntos em `97d439b`, que fez o downgrade dos pacotes para manter o PHP 7.4.
  Não remova nenhum dos dois sem uma task que trate disso. Sem o pin, um
  `composer update` resolve pacotes que exigem PHP 8, e o job 7.4 do CI quebra.

### O piso é o PHP 7.4, os polyfills são só de função

`symfony/polyfill-php80` e `polyfill-php81` trazem **funções**
(`str_contains`, `array_is_list`, que é usada em `SchemaRelationAttribute`),
nunca sintaxe.

| Não pode | Pode (7.4) |
|---|---|
| union types, `mixed`, retorno `static`, `match`, `?->`, named args, promoção no construtor, `enum`, `readonly`, vírgula final em **lista de parâmetros** | propriedades tipadas, arrow functions, `??=`, vírgula final em **chamada** |

### Deprecation é erro

Com `convertDeprecationsToExceptions="true"`, um aviso do PHP 8.x derruba o
teste. As duas classes que já apareceram (corrigidas em `686bd49` e `4db912a`):

- **`null` passado para função interna** (8.1). Os mutators de data precisam de
  `if (is_null($value)) return null;` antes de `\DateTime::createFromFormat`, e
  os de string, de `$value ?? ''` antes de `preg_replace`.
- **Parâmetro implicitamente anulável** (8.4). Use `?string $x = null`, nunca
  `string $x = null`.

### 18 arquivos estão com CRLF

Os arquivos de v2 que entraram em `23bb290` (em `src/`, `tests/` e `examples/`)
estão commitados com CRLF (`git ls-files --eol | grep crlf`). Os demais estão
com LF, e o repo não tem regra de `eol` no `.gitattributes`. Crie arquivos
novos com LF. Normalizar os existentes no meio de outra task gera um diff de
arquivo inteiro e esconde a mudança real: isso merece um PR próprio.

### `examples/config.php` é versionado

Para rodar um exemplo é preciso editá-lo com credenciais reais, e ele é
rastreado num repo público. Antes de qualquer `git add`, confira que
`git diff --quiet examples/config.php` não retorna nada.

## SDK

### Os testes não veem a request

Os testes de endpoint enfileiram respostas no `MockHandler` e conferem só o que
voltou. Nenhum deles inspeciona URL, verbo, query ou body. Um `$location`
errado, `_PUT` no lugar de `_POST` ou o ID no path em vez da query passam no
CI. Quando a mudança toca nisso, use o middleware de histórico
([sdk.md § Testes](sdk.md#testes)).

### `getStatusCode()` é `null` na `HttpClientException`

O `Endpoint::request()` re-embrulha todo 4xx numa `HttpClientException` nova,
passando `statusCode` e `statusMessage` como `null`. Use `getCode()` ou
`getResponse()->getStatusCode()`. 5xx e erro de rede não passam por isso e
mantêm o status.

### `headers` no Guzzle derruba o User-Agent

O `GuzzleHttpClient` junta o default com a config usando um `array_merge`
**raso**. Como o `IpagClient` passa uma chave `headers`, o default
`User-Agent: IPag SDK for PHP` é descartado. O mesmo vale para quem passar
`headers` ao montar o client.

### `IpagEnvironment::LOCAL` não tem esquema

A whitelist aceita só o literal `'api.ipag.test'`. Quem passa
`http://api.ipag.test` recebe `UnexpectedValueException`, e sem esquema o
Guzzle trata a URL inteira como path relativo. Nos testes isso não aparece,
porque o `MockHandler` nunca resolve a URL.

### Models v1 mandam `null`

O `jsonSerialize()` do `Model` base emite todos os atributos, inclusive os
nulos. Um `update` de `Customer` só com `name` envia os outros 15 campos como
`null`. Os models v2 filtram os nulos, mas os v1 aninhados neles não.

### `or()` do Assert prioriza o lado direito

A validação de documento vem de `kubinyete/assertation`. Em
`Assert::value($v)->asCpf(false)->or()->asCnpj(false)->get()`, o `get()`
devolve o resultado do **último** ramo, se ele for válido, e só cai no anterior
se não for. E `asCpf()`/`asCnpj()` completam o valor com zeros à esquerda
(`str_pad` até 11 e até 14) antes de validar, devolvendo o valor **completado**.

Juntas, as duas coisas fazem com que um valor curto possa sair reclassificado
e com zeros a mais. É o mesmo trecho em `Customer` (`cpf_cnpj`,
`tax_receipt`), `Holder` e `Seller`. `Owner` e `Establishment` usam só o
`asCpf()`.

### Atributo com nome de método vira mutator

O `Model::loadMutator()` trata como mutator qualquer método chamável com o
nome do atributo e o chama sem argumentos. Se um atributo tiver o nome de um
método existente (`get`, `set`, `fill`, `jsonSerialize`, um accessor…), o
model quebra no primeiro `get`/`set` desse atributo, com `ArgumentCountError`
ou com `Expected value from mutator '<nome>' to be instance of Mutator`.

### `origin/develop` diverge da `master`

São 9 commits não mergeados, de 2024-10, com endpoints novos (Account,
Receivable, EstablishmentDispute…). Eles usam o sufixo oposto
(`XxxEndpointV2`) e os **mesmos** accessors `subscriptionV2()` e
`paymentLinksV2()` retornando outras classes, então o merge conflita. Não
branche dela. Se algo de lá for útil, traga por cherry-pick numa task própria.

### `IpagClientMock` vai para o pacote

Ele está em `src/Mock/`, então é carregado no autoload dos consumidores.
Mudar a assinatura dele é mudar API pública.

## Processo

### Dado de produção não entra no repo

Task que nasce de um caso de suporte costuma trazer CPF/CNPJ de cliente final,
dados do estabelecimento, IDs de recurso e trechos de log de produção. Nada
disso entra em teste, exemplo, commit, PR, issue ou `CHANGELOG.md`, porque o
repo é público e o histórico não se apaga. Reproduza com documento sintético
válido (gerado pelo dígito verificador) que tenha a **mesma característica**
do caso real, como o mesmo número de zeros à esquerda.

### Tags irregulares

`1.4.0` saiu sem `v`, `v1.4.1` é lightweight e `v1.3.1` não está num merge
commit. O padrão a seguir está em
[setup.md § Versionamento e release](setup.md#versionamento-e-release).

### O README não cobre v2

`23bb290` adicionou `paymentLinksV2()` e `subscriptionV2()` sem tocar o
`README.md`. Ele também tem o badge de versão parado em `1.0.0`, a primeira
âncora do índice quebrada e uma seção "Testes" sem comandos. Endpoint ou
método público novo precisa de seção no README no mesmo PR.
