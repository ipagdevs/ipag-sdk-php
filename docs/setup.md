← [CLAUDE.md](../CLAUDE.md) · **setup** · [sdk](sdk.md)

# Setup e operação

Biblioteca pura: não tem servidor nem banco. O ciclo é instalar dependências,
rodar o PHPUnit e, quando precisar, rodar um exemplo contra a sandbox.

## Do zero

Só precisa de Docker. Os comandos usam as imagens oficiais `composer:2` e
`php:<versão>-cli` e rodam com o seu usuário (`-u`), para que `vendor/` não
fique com dono `root`.

```bash
git clone git@github.com:ipagdevs/ipag-sdk-php.git && cd ipag-sdk-php

# dependências: instala exatamente o composer.lock (resolvido para PHP 7.4.33)
docker run --rm -u "$(id -u):$(id -g)" -e COMPOSER_HOME=/tmp/composer \
  -v "$PWD":/app -w /app composer:2 install --no-interaction

# suíte nas três versões do CI
for v in 7.4 8.3 8.4; do
  docker run --rm -u "$(id -u):$(id -g)" -v "$PWD":/app -w /app php:$v-cli vendor/bin/phpunit || break
done
```

A imagem `composer:2` roda PHP 8.x, mas o `config.platform.php=7.4.33` do
`composer.json` faz o install respeitar o lock resolvido para 7.4. O mesmo
`vendor/` serve para as três versões.

## Comandos

Todos a partir da raiz do repo. Troque `7.4` pela versão desejada.

| Para | Rode |
|---|---|
| Instalar dependências | `docker run --rm -u "$(id -u):$(id -g)" -e COMPOSER_HOME=/tmp/composer -v "$PWD":/app -w /app composer:2 install --no-interaction` |
| Suíte inteira | `docker run --rm -u "$(id -u):$(id -g)" -v "$PWD":/app -w /app php:7.4-cli vendor/bin/phpunit` |
| Um arquivo | `... php:7.4-cli vendor/bin/phpunit tests/Model/CustomerTest.php` |
| Um teste | `... php:7.4-cli vendor/bin/phpunit --filter testShouldCreateCustomerObjectWithConstructorSuccessfully` |
| Saída legível | acrescente `--testdox` |
| Um exemplo | `... php:7.4-cli php examples/customer/00-customer-create.php` (credenciais: ver [Exemplos](#exemplos)) |
| Script avulso | `docker run --rm -u "$(id -u):$(id -g)" -v "$PWD":/app:ro -v /caminho/do/script:/s:ro php:7.4-cli php /s/x.php` |

**Cobertura não roda nas imagens oficiais.** Elas não trazem Xdebug nem PCOV.
O CI gera o `clover.xml` com Xdebug. Para ver cobertura, abra o PR e olhe o
relatório do CI.

**Não troque o `composer install` por `composer update`.** O `update`
re-resolve tudo e, se o pin de plataforma for removido ou contornado, traz
pacotes que exigem PHP 8. Mudança de dependência é decisão de task, não efeito
colateral.

### Por que `docker run` e não o compose local

Algumas máquinas têm `Dockerfile`, `docker-compose.yml`, `.docker/php.ini` e
`.devcontainer/`, mas eles estão no `.gitignore` e **não existem num clone**.
Não documente nem dependa deles: um comando que só funciona com esses arquivos
quebra para o próximo dev ou agente. As imagens oficiais cobrem tudo o que a
suíte precisa (as extensões padrão do `php:*-cli` bastam).

## Exemplos

`examples/<recurso>/NN-<acao>.php` são scripts que fazem chamadas **reais**.
Todos fazem `require_once` de `examples/config.php`, que monta o client com
`'apiID'`, `'apiKey'` e `IpagEnvironment::SANDBOX`.

Para rodar um exemplo:

1. Edite `examples/config.php` com credenciais de **sandbox**.
2. Rode-o como na tabela acima. O container tem rede por padrão.
3. **Desfaça a edição antes de commitar.** O arquivo é versionado e o repo é
   público. Antes de qualquer `git add`, confira que
   `git diff --quiet examples/config.php` não retorna nada.

Alguns exemplos usam IDs fixos (ex. `examples/subscription_v2/02-*.php`) que
só existem na conta de quem os escreveu. Troque pelos da sua conta.

**Ambiente local.** `IpagEnvironment::LOCAL` (`api.ipag.test`, sem esquema) é o
nome de serviço da API dentro da rede do docker compose do ambiente local, e
não resolve no host. Para usar esse ambiente, rode o container do PHP na mesma
rede da API:

```bash
docker run --rm --network <rede-da-api> -u "$(id -u):$(id -g)" -v "$PWD":/app -w /app \
  php:7.4-cli php examples/customer/00-customer-create.php
```

Para descobrir a rede, rode `docker inspect <container-da-api>`. Para conferir,
`getent hosts api.ipag.test` dentro do container precisa devolver o IP da API.

## CI

`.github/workflows/ci-tests.yml` é o único workflow.

| | |
|---|---|
| Dispara em | push em `master` e `develop`, e PR para `master` |
| Matriz | PHP `7.4`, `8.3` e `8.4` (`ubuntu-latest`, `shivammathur/setup-php`, Xdebug) |
| Instala | `composer install --prefer-dist`, que respeita o lock e o pin de plataforma |
| Roda | `php vendor/bin/phpunit --color --testdox --coverage-clover clover.xml tests` |
| Cobertura | Code Climate, só no job 7.4 e só com o secret `CODE_CLIMATE_ID` |

Não há lint nem análise estática no CI, nem configuração deles no repo.

## Versionamento e release

O `composer.json` **não tem campo `version`**: o Packagist publica cada tag do
GitHub como uma versão. Consumidor com pin conservador (`~1.4.0`, `1.4.*`)
recebe patch sem revisar, então decida o bump pelo **conteúdo** do release:

| O release contém | Bump |
|---|---|
| quebra de compatibilidade: método público removido ou renomeado, assinatura alterada, mudança de serialização da qual consumidor depende | MAJOR |
| **qualquer feature nova**: endpoint, método, campo de model, enum | **MINOR** |
| só correção, compatibilidade de PHP ou refactor sem efeito observável | PATCH |

O release são **três artefatos**, e esquecer um deixa o release inconsistente:

| Artefato | Onde |
|---|---|
| entrada do release | `CHANGELOG.md`, no topo (`## vX.Y.Z - AAAA-MM-DD`, PT-BR), **no mesmo PR da mudança** |
| tag | anotada (`git tag -a`), no **merge commit do PR na `master`**, mensagem `Release vX.Y.Z` |
| GitHub Release | na tag, com o texto da entrada do `CHANGELOG.md` |

```bash
# só depois do PR mergear na master
git checkout master && git pull origin master
git log -1 --oneline                          # confirme: é o merge commit do PR
git tag -a vX.Y.Z -m "Release vX.Y.Z"
git push origin vX.Y.Z
```

O histórico de tags é irregular, e **não siga** os desvios:
- `1.4.0` saiu sem o `v`;
- `v1.4.1` é lightweight;
- `v1.3.1` aponta para um commit direto, sem PR.

O padrão é o de `v1.3.0`: tag anotada, com `v`, no merge commit.

Tag publicada **não se move**. Se um número errado já saiu, corrija no release
seguinte, nunca reescrevendo a tag: quem já resolveu a dependência fixou o
commit no `composer.lock`.

O `CHANGELOG.md` começou na primeira versão depois de `v1.4.1`. As versões
anteriores só têm a tag e os commits.

### Chegar ao consumidor é outro passo

Publicar a tag não atualiza ninguém. O módulo Magento 2
([`ipagdevs/magento2`](https://github.com/ipagdevs/magento2)) fixa a versão
exata do SDK no `composer.json`, então a correção só chega lá com um PR no
próprio módulo, e as integrações de lojistas só a recebem quando atualizam a
dependência. Se a task nasceu de um caso de cliente, o release só fecha o ciclo
quando quem acompanha o caso é avisado da versão.
