---
name: ipag-sdk-php-execution
description: >
  Use este skill sempre que uma task iPag for executada neste projeto
  (ipag-sdk-php, o SDK PHP público da API iPag): bug fix em model ou endpoint,
  campo ou endpoint novo, compatibilidade de versão de PHP, release do SDK.
  Cobre o ciclo completo, do pickup no Jira até a tag publicada. Inclui as
  particularidades deste repo: ele é público no GitHub (nada interno em
  branch, commit, PR, teste ou changelog), o host não tem PHP (tudo via
  Docker) e a correção só chega ao consumidor depois de tag e de atualização
  da dependência do lado dele.
  Triggers: "pegar essa task", "bora começar", "vamos implementar",
  "executar a IPAG-XXXX", "corrigir esse bug no SDK", "adicionar campo no
  model", "adicionar endpoint", "publicar versão do SDK", "abrir PR",
  "finalizar a task".
---

# Skill — Execução de tasks no ipag-sdk-php

Equivalente, para **este** projeto, do skill genérico de execução iPag. É
autossuficiente e não depende de outro skill estar carregado.

Contexto técnico não se repete aqui: está em `CLAUDE.md`, `docs/setup.md` e
`docs/sdk.md` (caminhos relativos à raiz do repo).

---

## O que define tudo: repo público e entrega por tag

| | |
|---|---|
| Host | **GitHub** `ipagdevs/ipag-sdk-php`, **público** |
| Branch principal | `master` (**nunca** `develop`) |
| PR | GitHub. O `gh` **não está instalado** neste host e não há MCP do GitHub, então devolva o link. |
| Distribuição | Packagist, a partir das **tags**. O `composer.json` não tem `version`. |
| Consumidores | integrações de lojistas via Composer e o módulo Magento 2 (`ipagdevs/magento2`), que fixa a versão exata |

Duas consequências valem para todos os passos:

1. **Nada interno vai para o repo.** Número de task Jira, link do Jira, nome
   ou ID de estabelecimento, CPF/CNPJ ou nome de cliente final e trecho de log
   de produção não entram em branch, commit, PR, issue, teste, exemplo ou
   `CHANGELOG.md`. O detalhe interno fica no Jira, que é privado.
2. **Merge não é entrega.** A correção só existe para o consumidor depois da
   tag (Passo 8), e só chega a ele quando ele atualiza a dependência.

---

## Passo 1 — Pegar a task no Jira

Via MCP Atlassian, antes de tocar em código:

1. **Status em andamento.** Se estiver em "To Do", transicione
   (`getTransitionsForJiraIssue` → `transitionJiraIssue`).
2. **Data de início.** Preencha com a data atual se estiver vazia.
3. **Story points.** Estime e preencha se não houver. A escala é **Fibonacci:
   1, 3, 5, 8, 13**, nunca 2.

   Para os dois campos, confirme o field id via `getJiraIssue`
   (`fields: ["*all"]`) antes de gravar. Não assuma o id.
4. **Leia as issues vinculadas.** Task de bug costuma nascer de um caso de
   suporte em outro projeto, e é lá que estão a reprodução, os logs e quem
   precisa ser avisado no fim (Passo 8).

**Se o MCP Atlassian estiver fora do ar**, peça ao usuário o export da task (e
das vinculadas) num arquivo e siga com ele. O que seria gravado no Jira
(status, story points, comentários) vira texto pronto, que você devolve ao
usuário ou grava quando o MCP voltar. Não trave a execução por isso.

Task tipo `[Review]`: ver "Casos especiais", sem seguir os passos 2 a 8.

---

## Passo 2 — Classificar a task

| Tipo de task | Onde mexe | Release |
|---|---|---|
| Bug em model ou mutator | `src/Model/**`, `tests/Model/**` | PATCH |
| Bug em endpoint ou HTTP | `src/Endpoint/**`, `src/Core/**`, `src/Http/**`, `tests/Endpoint/**` | PATCH |
| Compatibilidade de PHP | onde o CI acusar | PATCH |
| Campo novo em model | model, teste, exemplo, `README.md` | MINOR |
| Endpoint ou método público novo | endpoint, models, `IpagClient`, testes, exemplo, `README.md` | MINOR |
| Quebra de compatibilidade | **alinhe com o usuário antes** | MAJOR |
| Só docs ou setup de agente | `CLAUDE.md`, `docs/`, `.claude/` | nenhuma |

Uma correção de bug que **muda o valor serializado** (ex.: o documento deixa
de ser completado com zeros) continua sendo PATCH, mas registre no
`CHANGELOG.md` o que muda para quem dependia do comportamento antigo.

Confirme o estado antes de começar:

```bash
git status -sb
git fetch origin && git log --oneline -1 origin/master
# o vendor/ bate com o lock? (só lê; "0 installs, 0 updates" = em dia)
docker run --rm -u "$(id -u):$(id -g)" -e COMPOSER_HOME=/tmp/composer \
  -v "$PWD":/app:ro -w /app composer:2 install --dry-run --no-interaction
```

Se o `vendor/` estiver atrás do lock, ou com dono `root`, reinstale antes de
confiar em qualquer resultado de teste.

---

## Passo 3 — Criar a branch

```bash
git checkout master && git pull origin master
git checkout -b {tipo}/IIP-{issue}-{descricaoEmCamelCase}
```

**O `{issue}` não é o número da task Jira.** O repo é público, e o número
interno não vai para ele. Por isso o prefixo é `IIP-{n}` ("**I**pag
**I**mprovement **P**urpose"), onde `{n}` é o número de uma **issue pública
no GitHub** (`ipagdevs/ipag-sdk-php/issues/{n}`) que descreve o propósito.
É a mesma convenção do módulo Magento 2, adotada em 2026-09 pelo mesmo motivo.

Prefixos: `fix/` e `feat/` para código, e `docs/` ou `chore/` para o que não
muda o pacote. O histórico tem `feature/IPAG-6787-...` e
`feature/minorFixesPR8`, que são anteriores à convenção e **não** devem ser
seguidos.

Sem `gh` nem MCP do GitHub, **o usuário cria a issue manualmente**:

1. Gere título e corpo em Markdown, **com conteúdo público**: o comportamento
   do SDK, um exemplo com dado sintético e o esperado contra o obtido. Sem
   cliente, sem estabelecimento, sem log de produção e sem link do Jira.
2. Devolva o texto, ou a URL já preenchida:
   `https://github.com/ipagdevs/ipag-sdk-php/issues/new?title=...&body=...`
   (URL-encoded).
3. Peça o número de volta e só então crie a branch (ou renomeie, com
   `git branch -m`, a que já estiver em uso).

### Consolidação por propósito

Quando várias tasks Jira formam um propósito único, use **uma** branch e
**uma** issue para o propósito, acumulando os commits de todas. Antes do PR,
squashe num commit só (o GitHub deste repo faz merge commit, não squash, então
o que estiver no PR entra na `master` como está):

```bash
git checkout master && git pull origin master
git checkout -b {tipo}/IIP-{n}-{proposito}
git merge --squash <branch-com-o-trabalho>
git commit -m "..."
git diff origin/master...HEAD --stat     # só o que é deste propósito?
```

Propósitos diferentes vão em PRs diferentes, mesmo que nasçam da mesma task.
Por exemplo, setup de agente e correção de bug: o PR de release deve conter só
o que entra no release.

---

## Passo 4 — Planejar antes de codar

Para tasks não triviais, alinhe a abordagem com o usuário antes de escrever
código. Depois, **antes de executar**, poste o plano aprovado como comentário
na task Jira (`addCommentToJiraIssue`): causa raiz, abordagem, bump previsto
(PATCH/MINOR/MAJOR) e como verificar. O comentário é privado e pode ter os
detalhes do caso real.

Se a task pede "revisar se outros lugares têm a mesma lógica", faça o
levantamento **no plano**, com a lista de arquivos, e não descubra no meio da
implementação.

---

## Passo 5 — Implementar

- **Sintaxe de PHP 7.4.** A lista do que não pode está na regra 1 do
  `CLAUDE.md`.
- **Não rode `composer update` nem `composer require`** sem que a task peça uma
  mudança de dependência. Se o lock mudar só no `plugin-api-version`, reverta.
- **A semântica do campo vem de [developers.ipag.com.br](https://developers.ipag.com.br)**
  (tipo, formato, máscara, default), não do SDK.
- **Siga o padrão do código vizinho:** os mutators, os accessors tipados, os
  models v2 que filtram nulos e o ID na query. Como adicionar endpoint ou
  campo está em [sdk.md](../../../docs/sdk.md#adicionar-um-endpoint).
- **Arquivos novos com LF.** Não normalize CRLF de arquivos existentes na
  mesma PR.
- **O `README.md` acompanha a API pública:** método, endpoint ou campo novo
  ganha uma seção no mesmo PR.
- **Commits:** semânticos, em PT-BR e no presente (`fix: corrige ...`,
  `feat: adiciona ...`, `docs:`, `chore:`, `test:`). Corpo em bullets quando
  houver mais de uma mudança. **Sem** número de task Jira e **sem** o trailer
  `Co-Authored-By: Claude ...`, que o time não usa.

---

## Passo 6 — Testar

Este repo **tem** suíte real (PHPUnit 9.6, sem rede) e CI em PHP 7.4, 8.3 e
8.4. A tarefa só está pronta com as três versões verdes **localmente**:

```bash
for v in 7.4 8.3 8.4; do
  docker run --rm -u "$(id -u):$(id -g)" -v "$PWD":/app -w /app php:$v-cli vendor/bin/phpunit || break
done
```

Arquivo ou teste único: `... vendor/bin/phpunit tests/Model/CustomerTest.php`
ou `--filter <nome>`. Os outros comandos estão em
[setup.md](../../../docs/setup.md#comandos).

**Em bug, reproduza antes de corrigir.**

1. Escreva o teste que falha, com dado sintético que tenha a mesma
   característica do caso real.
2. Veja-o falhar e só então corrija.

Para uma reprodução rápida fora da suíte, use um script avulso montado
read-only, que não suja o repo:

```bash
docker run --rm -u "$(id -u):$(id -g)" -v "$PWD":/app:ro -v <dir-do-script>:/s:ro \
  php:7.4-cli php /s/repro.php /app      # o script faz require "$argv[1]/vendor/autoload.php"
```

O que os testes precisam cobrir:

- **Model:** construtor, setter, getter e `jsonSerialize()`, com o caso feliz,
  os casos de borda pedidos pela task e o erro de validação
  (`MutatorAttributeException`/`\TypeError`).
- **Endpoint:** se a mudança toca rota, verbo, query ou body, verifique a
  **request** com o middleware de histórico do Guzzle
  ([sdk.md § Testes](../../../docs/sdk.md#testes)). Os testes existentes não
  fazem isso, e uma rota errada passaria no CI.
- **Dados:** CPF/CNPJ sintéticos válidos, gerados pelo dígito verificador.
  Nunca o documento do caso real.

**Validação contra a API** (quando a task espera comportamento da API, ex.
"a API retorna o documento com a máscara X"):

1. Rode um exemplo de `examples/` contra a **sandbox**, com credenciais
   editadas localmente em `examples/config.php`.
2. Desfaça a edição antes de qualquer `git add` (`git diff --quiet examples/config.php`).
3. Sem credenciais de sandbox, diga isso explicitamente e deixe a validação
   pendente. Não a dê como feita com base só no teste unitário.

Registre o resultado como comentário na task Jira **quando houver consenso**
de que a implementação está finalizada, não no meio de uma iteração.

---

## Passo 7 — Abrir PR

```bash
git diff origin/master...HEAD --stat        # escopo: só este propósito
git diff --quiet examples/config.php        # sem credencial
git push -u origin <branch>                 # imprime o link .../pull/new/<branch>
```

- **Base: `master`.** O PR roda o CI nas três versões.
- **Devolva ao usuário** o link de criação que o `git push` imprime, com
  sugestão de título e descrição. Não dá para criar via CLI ou MCP.
- **Descrição pública:**
  - o que muda e por quê, com exemplo sintético;
  - como foi testado;
  - bump previsto;
  - `Relates to #{n}`, com a issue pública. Use `Closes #{n}` só se o PR
    encerra o propósito inteiro.

  Sem link do Jira e sem dado do caso real.
- **Não abra o PR por conta própria:** espere o usuário sinalizar que o
  propósito está pronto.
- **O `CHANGELOG.md` vai no próprio PR** (Passo 8, item 1). Assim o review
  cobre o texto do release.

---

## Passo 8 — Publicar a versão

Toda task de código (`fix/`, `feat/`) termina em release, a não ser que o
usuário decida acumular mudanças para um release conjunto. O processo completo
está em [setup.md § Versionamento e release](../../../docs/setup.md#versionamento-e-release).
O resumo:

1. **No PR**, nova entrada no topo do `CHANGELOG.md`:
   `## vX.Y.Z - AAAA-MM-DD`, com bullets em PT-BR escritos para o
   **consumidor** (o que muda no uso, não o que mudou no código).
2. **Depois do merge**, crie uma tag **anotada** no merge commit da `master`.
   **O push da tag publica para todos os consumidores, então só faça com o ok
   explícito do usuário:**

   ```bash
   git checkout master && git pull origin master
   git log -1 --oneline                       # é o merge commit do PR?
   git tag -a vX.Y.Z -m "Release vX.Y.Z"
   git push origin vX.Y.Z
   ```

   Não repita os desvios do histórico (tag sem `v`, lightweight, fora de merge
   commit). Tag publicada não se move.
3. **GitHub Release:** devolva ao usuário o link
   `https://github.com/ipagdevs/ipag-sdk-php/releases/new?tag=vX.Y.Z` com o
   texto da entrada do `CHANGELOG.md`.
4. **Packagist:** confira se a versão apareceu em
   `https://packagist.org/packages/ipagdevs/ipag-sdk-php`. Se não aparecer,
   avise o usuário. Atualizar lá exige acesso de mantenedor.
5. **Avise quem depende:**
   - Se a task nasceu de um caso de suporte, prepare o aviso: versão, o que
     corrige e o comando de atualização
     (`composer require ipagdevs/ipag-sdk-php:^X.Y.Z`). Poste-o como
     comentário na issue de origem, após confirmar com o usuário.
   - Se a correção importa para o módulo Magento 2, registre que ele fixa a
     versão exata e precisa de PR próprio no repo dele (ver "Casos
     especiais").

---

## Padrão de comentários no Jira

Use `addCommentToJiraIssue` em **Markdown** (`##`, `-`, `` `código` ``,
`**negrito**`), com `contentFormat: "markdown"`. Nunca misture wiki markup
(`h2.`, `{{...}}`, `*bold*`) com `contentFormat: markdown`, porque sai
literal. Para corrigir um comentário já postado, reenvie com o mesmo
`commentId`.

Comentário de auditoria prematuro (postado antes do consenso) se **apaga** e
dá lugar ao final. Não empilhe um novo "que supera o anterior".

---

## Casos especiais

### Task só de docs ou setup de agente
Não gera release nem entrada no `CHANGELOG.md`. Um PR com prefixo `docs/` ou
`chore/`. Esses arquivos ficam fora do pacote publicado pelo `export-ignore`
do `.gitattributes`. Se criar outro arquivo que não deve ir para o Packagist,
inclua-o lá.

### Atualizar o consumidor (módulo Magento 2)
O módulo fixa a versão exata do SDK, então a correção não chega sozinha.
Atualizá-lo é **outra task, em outro repo**, com o skill de execução do
ambiente Magento. Ao propor isso, liste o que muda entre a versão que ele fixa
e a nova (`git log --oneline <tag-atual>..vX.Y.Z`), porque o salto pode trazer
releases intermediários.

### Task tipo Review
O entregável é um único comentário de review na própria task, sem alterar
código. Diffe contra o merge-base, nunca direto contra a `master`:

```bash
git fetch origin <branch>
base=$(git merge-base origin/master origin/<branch>)
git diff $base..origin/<branch>
```

Rode a suíte nas três versões na branch revisada. Poste o review em Markdown,
estruturado por severidade: ✅ Verificado OK / 🔴 Pontos a resolver /
🟡 Arquitetura (não bloqueante) / ⚪ Nits. Confira também se a branch respeita
"nada interno no repo".

### Código vindo da `develop`
A `develop` diverge da `master` e tem accessors que colidem com ela. Se algo
de lá for pedido, traga por cherry-pick para uma branch nova a partir da
`master`, resolvendo a colisão de nomes no plano. Nunca faça merge da
`develop`.

---

## Manter este skill vivo

Aprendizado novo da execução (comando, permissão, padrão de dados) entra **na
mesma PR da task**. Vai aqui se for sobre *como executar tasks*, e no doc
correspondente em `docs/` se for sobre *como o SDK funciona*. Escreva em termos públicos: o repo é aberto.

---

## Checklist antes de considerar a task pronta

- [ ] A task está "In Progress", com data de início e story points desde o começo (ou o texto ficou pendente para o usuário, se o MCP estiver fora)?
- [ ] As issues vinculadas foram lidas (reprodução e quem avisar no fim)?
- [ ] O `vendor/` foi conferido contra o lock antes de confiar nos testes?
- [ ] A branch saiu da `master` e segue `{tipo}/IIP-{issue}-{desc}`, com issue pública criada?
- [ ] Se a task é uma entre várias do mesmo propósito, os commits estão acumulando na branch única do propósito?
- [ ] O plano foi postado no Jira antes de codar (tasks não triviais), com a lista de lugares afetados?
- [ ] O bug foi reproduzido por um teste que falhava antes da correção?
- [ ] O código é PHP 7.4 e a suíte está verde em 7.4, 8.3 e 8.4 localmente?
- [ ] Se mexeu em rota, verbo, query ou body, há um teste que inspeciona a request?
- [ ] Os dados de teste e exemplo são sintéticos, sem nada do caso real?
- [ ] O `composer.lock` está intocado, ou a mudança nele é intencional?
- [ ] Os commits estão sem número Jira e sem o trailer `Co-Authored-By: Claude ...`?
- [ ] O `examples/config.php` está sem credencial?
- [ ] O `README.md` foi atualizado, se a API pública mudou?
- [ ] A entrada do `CHANGELOG.md` está no PR, com o bump certo (PATCH/MINOR/MAJOR)?
- [ ] Antes do PR, o histórico foi squashado e o escopo conferido contra `origin/master`?
- [ ] O PR referencia a issue pública (`Relates to #{n}`) e não tem nada interno?
- [ ] A validação contra a API foi feita na sandbox, ou declarada como pendente, e registrada no Jira após o consenso?
- [ ] Depois do merge, com o ok do usuário, a tag anotada foi criada no merge commit, com GitHub Release e Packagist conferidos?
- [ ] Quem depende foi avisado (caso de suporte; módulo Magento, se for o caso)?
- [ ] Os links de PR, issue e release foram devolvidos ao usuário?
- [ ] O aprendizado novo da execução foi registrado (aqui ou no doc correspondente em `docs/`)?
