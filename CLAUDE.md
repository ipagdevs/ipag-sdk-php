# CLAUDE.md

SDK PHP da API iPag, publicado no Packagist como
[`ipagdevs/ipag-sdk-php`](https://github.com/ipagdevs/ipag-sdk-php). É uma
biblioteca, sem aplicação para subir: o trabalho aqui é editar `src/`, testar
com PHPUnit e publicar uma tag. O `README.md` é a documentação **do
consumidor** e não descreve como o SDK funciona por dentro. Isso fica em
`docs/`.

**O repositório é público.** Tudo o que for commitado (código, testes,
exemplos, mensagens, PRs e estes docs) fica visível para qualquer pessoa.
Número de task interna, dado de estabelecimento e documento ou log de
produção não entram aqui.

## Layout

| Caminho | O que é |
|---|---|
| `src/Core/` | `IpagClient` (ponto de entrada e accessors dos endpoints), `Client`, `Endpoint` (base dos recursos), `IpagEnvironment`, `Enums/` (classes com constantes, não enums nativos) |
| `src/Endpoint/` | Uma classe por recurso da API (`$location` define a rota) |
| `src/Model/` | Payloads de **request**, construídos sobre a DSL de `src/Model/Schema/` |
| `src/Http/` | `GuzzleHttpClient` e `Response`, que é o que os endpoints retornam |
| `src/Exception/` | `HttpClientException` (4xx), `HttpServerException` (5xx), `HttpTransferException` (rede), `ParseException` |
| `src/Support/` | Credenciais e providers de antifraude e adquirente (também são `Model`) |
| `src/Mock/` | `IpagClientMock`, usado pelos testes. Vai no pacote publicado. |
| `tests/` | PHPUnit 9.6, sem rede (Guzzle `MockHandler`) |
| `examples/` | Scripts que fazem chamadas **reais** à sandbox (`examples/config.php`) |
| `CHANGELOG.md` | Uma entrada por release, a partir da primeira versão depois de `v1.4.1` |
| `docs/`, `.claude/skills/`, `CLAUDE.md` | Docs para agentes e devs. Ficam fora do pacote publicado (`export-ignore` no `.gitattributes`). |

## Regras que economizam tempo

1. **O piso é o PHP 7.4.** O `composer.json` fixa `config.platform.php=7.4.33`
   e o CI roda 7.4, 8.3 e 8.4. Não use sintaxe de PHP 8.0 ou mais nova (union
   types, `mixed`, `match`, `?->`, named args, promoção no construtor, `enum`,
   `readonly`), nem rode `composer update` sem o pin.
2. **O host não tem PHP nem Composer: tudo roda via `docker run` com imagens
   oficiais.** O `Dockerfile`, o `docker-compose.yml` e o `.devcontainer/` estão
   no `.gitignore` e não existem num clone. Os comandos validados estão em
   [setup.md](docs/setup.md#comandos).
3. **Rode a suíte nas três versões antes do PR.** O `phpunit.xml` transforma
   deprecation em erro (`convertDeprecationsToExceptions`), e o que passa no 7.4
   pode quebrar no 8.4.
4. **Os testes não verificam a request.** Nenhum teste confere URL, verbo,
   query ou body enviados. Um `$location` ou um verbo errado passa no CI. Se a
   mudança mexe nisso, o teste precisa inspecionar a request
   ([sdk.md](docs/sdk.md#testes)).
5. **Endpoints retornam `Http\Response`, não models.** Os models só montam o
   payload de request. Para ler a resposta, use `getData()` ou
   `getParsedPath('a.b')`.
6. **Mutator é um método com o nome exato do atributo** (`cpf_cnpj()`,
   `zipcode()`). Um atributo novo com o mesmo nome de um método existente vira
   mutator sem aviso.
7. **A semântica de um campo vem da documentação da API**
   ([developers.ipag.com.br](https://developers.ipag.com.br)), nunca do próprio
   SDK, que não documenta formato nem default.
8. **Nunca use `origin/develop` como base.** Ela tem commits não mergeados que
   colidem com a `master` (os mesmos accessors `subscriptionV2()` e
   `paymentLinksV2()` retornando classes diferentes). Todo PR vai para a
   `master`.
9. **Quem publica a versão é a tag.** O `composer.json` não tem `version`, e
   cada release precisa de entrada no `CHANGELOG.md` e de uma tag anotada no
   merge commit ([setup.md](docs/setup.md#versionamento-e-release)).

## Docs

| Doc | Vá aqui quando |
|---|---|
| [docs/setup.md](docs/setup.md) | for instalar dependências, rodar testes ou exemplos, entender o CI, versionar ou publicar |
| [docs/sdk.md](docs/sdk.md) | for ler ou alterar o SDK: client, endpoints, DSL de models, mutators, exceções, testes, como adicionar endpoint ou campo |
| [docs/gotchas.md](docs/gotchas.md) | antes de mexer em ambiente ou release, e quando algo não fizer sentido |

O fluxo de execução de tasks (do pickup ao release) está na skill
[`ipag-sdk-php-execution`](.claude/skills/ipag-sdk-php-execution/SKILL.md).

Fontes canônicas que os docs **não** replicam:
- a documentação da API ([developers.ipag.com.br](https://developers.ipag.com.br)), para campos e regras;
- `composer.json`/`composer.lock`, para versões;
- `.github/workflows/ci-tests.yml`, para o CI;
- `README.md`, para a API pública do SDK.

## Estado de referência

`master` em `103e055` (tag `v1.4.1`), `composer.lock` com Guzzle `7.10.0`,
PHPUnit `9.6.34` e `kubinyete/assertation` `1.0.4`. A suíte tinha 461 testes,
todos passando em PHP 7.4, 8.3 e 8.4.

Se algo não bater, revalide:

```bash
git rev-parse --short HEAD && git describe --tags
git status --short
```

Ao mudar `composer.json`, `phpunit.xml`, `.github/workflows/*` ou `src/Core/*`,
atualize o doc correspondente.
