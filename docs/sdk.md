← [CLAUDE.md](../CLAUDE.md) · [setup](setup.md) · **sdk**

# Como o SDK funciona

PSR-4: `Ipag\Sdk\` → `src/` e `Ipag\Sdk\Tests\` → `tests/`.

## Mapa

```
IpagClient (src/Core/IpagClient.php)
 ├─ IpagEnvironment          base URL (LOCAL | SANDBOX | PRODUCTION)
 ├─ GuzzleHttpClient         Basic auth + header x-api-version
 ├─ JsonSerializer
 └─ customer(), payment(), paymentLinksV2(), ...   -> XxxEndpoint::make() (instância nova a cada chamada)

XxxEndpoint::create(Model $m)
 └─ Endpoint::_POST($m->jsonSerialize(), $query)    src/Core/Endpoint.php
     └─ Client::request()                           serializa, loga, chama o Guzzle
         └─ Http\Response                           <- é isto que o consumidor recebe
```

## Client e ambiente

Assinatura: `new IpagClient(string $apiID, string $apiKey, string $environment,
?LoggerInterface $logger = null, string $version = '2')`.

- **O ambiente é uma whitelist exata.** `IpagEnvironment` só aceita as strings
  das constantes `LOCAL` (`'api.ipag.test'`, **sem esquema**), `SANDBOX`
  (`'https://sandbox.ipag.com.br'`) e `PRODUCTION`
  (`'https://api.ipag.com.br'`). Qualquer outro valor lança
  `UnexpectedValueException("The environment must be valid")`, inclusive
  `http://api.ipag.test`.
- **Há duas noções de versão, independentes:**
  - o header `x-api-version`: é o 5º argumento do construtor (default `'2'`) e
    vale para o client inteiro;
  - a **rota**: cada classe de endpoint define a sua em `$location`.
- **O logger é PSR-3** (`psr/log` `^1|^2|^3`) e cai em `NullLogger` se for
  omitido. Em `debug`, ele loga o **body completo** da request, incluindo
  dados de cartão, e o body da resposta.

## Endpoints

Cada classe em `src/Endpoint/` estende `Core\Endpoint` e define
`protected string $location` com o **caminho completo** da rota. Os métodos
chamam `_GET/_POST/_PUT/_PATCH/_DELETE($body?, $query, $header, $relativeUrl)`.

| Família | `$location` | Classes |
|---|---|---|
| Recursos clássicos | `/service/resources/<recurso>` | Charge, Checkout, Customer, Establishment, FutureTransfer, PaymentLinks, Seller, SellerTransfer, SplitRules, Subscription, SubscriptionPlan, Token, Transaction, Transfer, Voucher, Webhook |
| v2 | `/service/v2/<recurso>` | PaymentLinksV2, SubscriptionV2 (só create/update), EstablishmentTransaction, EstablishmentPaymentMethods, EstablishmentAntifraud |
| Pagamento | `/service` + relativo (`/payment`, `/consult`, `/capture`, `/cancel`) | Payment |

Convenções que o código segue:

- **O ID vai na query, não no path.** `get`, `update` e `delete` passam
  `['id' => $id]`, ex.: `PUT /service/v2/payment_links?id=10`. Só
  sub-recursos usam segmento (`PaymentLinksV2Endpoint::listTransactions` →
  `/{id}/transactions`).
- **Sub-endpoints não aninham o path.** `EstablishmentEndpoint::transaction()`
  e `TransferEndpoint::seller()` criam o filho com
  `X::make($this->parent, $this->parent)`, então cada filho declara a própria
  rota completa.
- **Alguns métodos reescrevem `$this->location` em tempo de execução**
  (`SubscriptionEndpoint::unlinkToken` e `_actionsInstallmentPayment`). Isso só
  é seguro porque cada accessor do `IpagClient` devolve uma instância nova.
- **Nome de versão 2:** classe `<Recurso>V2Endpoint`, accessor
  `<recurso>V2()` e models em `src/Model/<Recurso>V2/`. Os sub-endpoints de
  establishment, que já são v2, não carregam o sufixo.

## Models

Os models são **payloads de request**. Cada subclasse de `Model`
(`src/Model/Model.php`) declara o schema e termina com `return $schema->build();`:

```php
protected function schema(SchemaBuilder $schema): Schema
{
    $schema->string('name')->nullable();
    $schema->int('stock_limit')->nullable();
    $schema->has('address', Address::class)->nullable();
    $schema->hasMany('products', Product::class)->nullable();
    return $schema->build();
}
```

| DSL | O que faz |
|---|---|
| `any`, `string`, `int`, `float`, `bool`, `date($fmt)`, `enum($valores)` | Tipos. `int` rejeita `"1"`, e `float` aceita int mas rejeita string numérica. |
| `has($attr, Classe)`, `hasMany(...)` | Relação com outro model |
| `->nullable()`, `->default($v)`, `->hidden()` | `hidden` tira o atributo do JSON |
| `->array()` / `->list()` | Atributo vira lista do tipo |
| `->limit(n)`, `->truncate(n)`, `->between(min, max)` | Strings |
| `->min()`, `->max()` | Floats |

- **O construtor recebe um array associativo.** Uma lista (`[0 => ...]`) lança
  `\Exception`.
- **Os accessors são escritos à mão e tipados**, ex.
  `getX(): ?T { return $this->get('x'); }` e
  `setX(?T $x): self { $this->set('x', $x); return $this; }`. Tipo errado num
  setter lança `\TypeError`, e há testes que contam com isso.
- **O mutator é um método `protected` com o nome exato do atributo**, que
  retorna `new Mutator($getter, $setter)`. O setter recebe
  `($value, MutatorContext $ctx)` e falha com `$ctx->raise('msg')` ou
  `$ctx->assert($cond, 'msg')`, que lançam `MutatorAttributeException`. Para
  validar, o código costuma usar `Kubinyete\Assertation\Assert`.
  `Model::loadMutator` descobre o mutator com `is_callable([$this, $nome])`.
- **Serialização:** `jsonSerialize()` emite **todo** atributo não-`hidden`,
  **inclusive `null`**, e serializa as relações recursivamente.
  - Os models v2 (`PaymentLinkV2`, `SubscriptionV2`, `Plan`, `PlanTrial`)
    sobrescrevem o método para tirar os nulos com
    `array_filter(..., fn($v) => !is_null($v))`.
  - `CheckoutSettings` e os models v1 aninhados (ex. `Customer` dentro de
    `SubscriptionV2`) não sobrescrevem, e mandam `null`.
- **Mutator com data** precisa de guarda para `null` antes de
  `\DateTime::createFromFormat`. Sem ela, o PHP 8.1+ emite deprecation, que a
  suíte transforma em erro.

## Respostas

Nenhum endpoint transforma a resposta em model. `Http\Response` expõe:

- `getData()`: o array decodificado;
- `getParsedPath('attributes.amount')`: lookup com ponto, a partir da raiz do
  body (re-decodifica o body a cada chamada);
- `getBody()`: o body cru;
- `getHeaders()` e `getStatusCode()`.

Body vazio ou JSON que decodifica para string vira `['data' => <cru>]`.
`Model::parse()` e `tryParse()` existem, mas nenhum endpoint os usa.

## Exceções

```
\Exception
 ├─ BaseException
 │   ├─ HttpException (abstract)   getResponse() getStatusCode() getStatusMessage() getErrors()
 │   │   ├─ HttpClientException    4xx (Guzzle ClientException)
 │   │   ├─ HttpServerException    5xx (Guzzle ServerException)
 │   │   └─ HttpTransferException  rede (Guzzle ConnectException)
 │   └─ ParseException             JSON inválido em JsonSerializer
 ├─ SchemaException ── SchemaAttributeParseException, SchemaAttributeSerializeException
 └─ MutatorException ── MutatorAttributeException
```

O mapeamento Guzzle → SDK fica em `GuzzleHttpClient::request()`. Depois,
`Endpoint::request()` **re-embrulha só a `HttpClientException`**:

- a mensagem vira `response message: "<erros juntados por |>" (status code: N)`;
- os erros saem de `message`, `error` ou `data` do body e vão para
  `getErrors()`;
- `statusCode` e `statusMessage` ficam `null`, e o status passa a estar em
  `getCode()` e em `getResponse()->getStatusCode()`.

5xx e erro de rede sobem como vieram. As exceções de schema **não** estendem
`BaseException`, então um `catch (BaseException)` não as pega.

## Testes

| Pasta | Base | Padrão |
|---|---|---|
| `tests/Model/` | `PHPUnit\Framework\TestCase` | monta o model por construtor e por setters e confere getters e `jsonSerialize()`. Validação: `expectException(MutatorAttributeException::class)` ou `\TypeError`. |
| `tests/Endpoint/` | `Ipag\Sdk\Tests\IpagClient` | `$this->instanceClient([new Response(200, [], json_encode([...]))])`, depois chama o endpoint e confere `getParsedPath(...)`. Erro: `try/catch`, com `assertInstanceOf(HttpException::class, ...)` e `assertSame(4xx, $e->getCode())`. |
| `tests/Support/` | `TestCase` | credenciais e providers |

Os fixtures são métodos privados no próprio teste (não há pasta de fixtures).
O `phpunit.xml` é estrito: `failOnRisky`, `failOnWarning`,
`beStrictAboutOutputDuringTests` e deprecation vira exceção.

**Para verificar a request enviada**, monte o stack com o middleware de
histórico do Guzzle. O `instanceClient()` não expõe isso:

```php
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;
use Ipag\Sdk\Core\IpagEnvironment;
use Ipag\Sdk\Mock\IpagClientMock;

$history = [];
$stack = HandlerStack::create(new MockHandler([new Response(200, [], '{}')]));
$stack->push(Middleware::history($history));
$client = new IpagClientMock('test', 'AAA', IpagEnvironment::SANDBOX, '2', ['handler' => $stack]);

$client->customer()->update($customer, 10);

$request = $history[0]['request'];
$this->assertSame('PUT', $request->getMethod());
$this->assertSame('/service/resources/customers', $request->getUri()->getPath());
$this->assertSame('id=10', $request->getUri()->getQuery());
$body = json_decode((string) $request->getBody(), true);
```

Use `SANDBOX` aqui, não `LOCAL`. Sem esquema, o Guzzle trata
`api.ipag.test/...` inteiro como path, e `getHost()` vem vazio. O
`MockHandler` nunca chega à rede em nenhum dos dois casos.

**Dados de teste são sintéticos.** Gere CPF e CNPJ válidos pelo dígito
verificador. Nunca use documento, nome ou ID vindos de um caso real.

## Adicionar um endpoint

O padrão foi tirado do commit que trouxe links de pagamento e assinatura v2
(`23bb290`):

1. `src/Endpoint/<Recurso>V2Endpoint.php` com `$location` e métodos que
   recebem o model e chamam `$this->_POST($model->jsonSerialize())` (e
   equivalentes).
2. Models em `src/Model/<Recurso>V2/`, com `jsonSerialize()` filtrando os
   nulos, como os outros v2.
3. Accessor e `use` em `src/Core/IpagClient.php`.
4. `tests/Endpoint/<Recurso>V2EndpointTest.php` **verificando método, path e
   query** (snippet acima) e `tests/Model/...Test.php`.
5. `examples/<recurso>_v2/NN-<acao>.php`.
6. Seção no `README.md`. O `23bb290` não fez isso, e é por isso que o README
   não tem nada de v2.

## Adicionar um campo a um model

O padrão foi tirado de `4f601a6`:

1. Adicione o atributo ao `schema()`. Confira na documentação da API o tipo, o
   formato e se ele é anulável.
2. Escreva o getter e o setter tipados, e o mutator se houver validação ou
   normalização.
3. Atualize o `tests/Model/<Model>Test.php` (construtor, setter e serialização)
   e o exemplo que monta esse model.
4. Antes de nomear o atributo, verifique se ele não colide com um método do
   model, porque senão vira mutator.

## Notas de leitura

Bugs latentes em caminhos pouco exercitados. Não corrija de passagem: cada um
merece task própria.

- `SchemaAttribute.php` importa `Ipag\Sdk\Util\StringUtil`, que não existe. O
  erro aparece quando o parse de um atributo array falha.
- `MutatorContext::getAttributeRelativeName()` chama `$target->getName()`. O
  `Model` base não tem esse método, e nos models que têm (ex. `Customer`) ele
  devolve o atributo `name`, não o nome do model. Só é usado quando o contexto
  é criado sem o schema do atributo, o que o `Model` não faz hoje.
- `Endpoint::sanitizeErrorMessage()` pode retornar `null`, que vai direto para
  `implode`. Isso é um provável `TypeError` no PHP 8 para uma resposta 4xx com
  body inesperado.
- Body 4xx que não é JSON lança `ParseException` de dentro do `catch`, no lugar
  da `HttpClientException`.
- `IpagClient::IpagClient()` é um método vazio, resto de construtor no estilo
  PHP 4. Não é construtor.
- `IpagClientMock` tem uma assinatura diferente da do `IpagClient`
  (`version` em 4º, `configGuzzle` em 5º, sem logger) e monta o header Basic
  à mão.
