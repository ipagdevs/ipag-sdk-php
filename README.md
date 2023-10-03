# iPag PHP client SDK

> A ferramenta certa para uma rápida e segura integração com o iPag e a sua aplicação PHP.

**Índice**

- [iPag PHP client SDK](#ipag-php-client-sdk)
  - [Dependências](#dependências)
  - [Instalação](#instalação)
- [IpagClient](#ipagclient)
  - [Autenticação](#autenticação)
- [Pagamento (Payment)](#pagamento-payment)
  - <img style="max-width: 100%;vertical-align: middle;" width="30" src="https://img.shields.io/badge/POST-248fb2.svg?style=for-the-badge" /> [Criar Pagamento](#criar-pagamento)
  - <img style="max-width: 100%;vertical-align: middle;" width="30" src="https://img.shields.io/badge/GET-6bbd5b.svg?style=for-the-badge" /> [Consultar Pagamento](#consultar-pagamento)
  - <img style="max-width: 100%;vertical-align: middle;" width="30" src="https://img.shields.io/badge/POST-248fb2.svg?style=for-the-badge" /> [Capturar Pagamento](#capturar-pagamento)
  - <img style="max-width: 100%;vertical-align: middle;" width="30" src="https://img.shields.io/badge/POST-248fb2.svg?style=for-the-badge" /> [Cancelar Pagamento](#cancelar-pagamento)

- [Cliente (Customer)](#cliente-customer)
  - <img style="max-width: 100%;vertical-align: middle;" width="30" src="https://img.shields.io/badge/POST-248fb2.svg?style=for-the-badge" /> [Novo Cliente](#novo-cliente)
  - <img style="max-width: 100%;vertical-align: middle;" width="30" src="https://img.shields.io/badge/PUT-9b708b.svg?style=for-the-badge" /> [Alterar Cliente](#alterar-cliente)
  - <img style="max-width: 100%;vertical-align: middle;" width="30" src="https://img.shields.io/badge/GET-6bbd5b.svg?style=for-the-badge" /> [Obter Cliente](#obter-cliente)
  - <img style="max-width: 100%;vertical-align: middle;" width="30" src="https://img.shields.io/badge/GET-6bbd5b.svg?style=for-the-badge" /> [Listar Clientes](#listar-clientes)
  - <img style="max-width: 100%;vertical-align: middle;" width="30" src="https://img.shields.io/badge/DEL-e27a7a.svg?style=for-the-badge" /> [Deletar Cliente](#deletar-cliente)
- [Plano de Assinatura (Subscription Plan)](#plano-de-assinatura-subscription-plan)
  - <img style="max-width: 100%;vertical-align: middle;" width="30" src="https://img.shields.io/badge/POST-248fb2.svg?style=for-the-badge" /> [Novo Plano](#novo-plano-de-assinatura)
  - <img style="max-width: 100%;vertical-align: middle;" width="30" src="https://img.shields.io/badge/PUT-9b708b.svg?style=for-the-badge" /> [Alterar Plano](#alterar-plano-de-assinatura)
  - <img style="max-width: 100%;vertical-align: middle;" width="30" src="https://img.shields.io/badge/GET-6bbd5b.svg?style=for-the-badge" /> [Obter Plano](#obter-plano-de-assinatura)
  - <img style="max-width: 100%;vertical-align: middle;" width="30" src="https://img.shields.io/badge/GET-6bbd5b.svg?style=for-the-badge" /> [Listar Planos](#listar-planos-de-assinatura)
  - <img style="max-width: 100%;vertical-align: middle;" width="30" src="https://img.shields.io/badge/DEL-e27a7a.svg?style=for-the-badge" /> [Deletar Plano](#deletar-plano-de-assinatura)
- [Assinatura (Subscription)](#assinatura-subscription)
  - <img style="max-width: 100%;vertical-align: middle;" width="30" src="https://img.shields.io/badge/POST-248fb2.svg?style=for-the-badge" /> [Nova Assinatura](#nova-assinatura)
  - <img style="max-width: 100%;vertical-align: middle;" width="30" src="https://img.shields.io/badge/PUT-9b708b.svg?style=for-the-badge" /> [Alterar Assinatura](#alterar-assinatura)
  - <img style="max-width: 100%;vertical-align: middle;" width="30" src="https://img.shields.io/badge/GET-6bbd5b.svg?style=for-the-badge" /> [Obter Assinatura](#obter-assinatura)
  - <img style="max-width: 100%;vertical-align: middle;" width="30" src="https://img.shields.io/badge/GET-6bbd5b.svg?style=for-the-badge" /> [Listar Assinaturas](#listar-assinaturas)
  - <img style="max-width: 100%;vertical-align: middle;" width="30" src="https://img.shields.io/badge/DEL-e27a7a.svg?style=for-the-badge" /> [Desvincular Token da assinatura](#desvincular-token-da-assinatura)
  - <img style="max-width: 100%;vertical-align: middle;" width="30" src="https://img.shields.io/badge/POST-248fb2.svg?style=for-the-badge" /> [Quitar Parcela da Assinatura](#quitar-parcela-da-assinatura)
  - <img style="max-width: 100%;vertical-align: middle;" width="30" src="https://img.shields.io/badge/POST-248fb2.svg?style=for-the-badge" /> [Agendar Parcelamento da Assinatura](#agendar-parcelamento-da-assinatura)
- [Transação (Transaction)](#transação-transaction)
  - <img style="max-width: 100%;vertical-align: middle;" width="30" src="https://img.shields.io/badge/GET-6bbd5b.svg?style=for-the-badge" /> [Obter Transação](#obter-transação)
  - <img style="max-width: 100%;vertical-align: middle;" width="30" src="https://img.shields.io/badge/GET-6bbd5b.svg?style=for-the-badge" /> [Listar Transações](#listar-transações)
  - <img style="max-width: 100%;vertical-align: middle;" width="30" src="https://img.shields.io/badge/POST-248fb2.svg?style=for-the-badge" /> [Liberar Recebíveis da Transação](#liberar-recebíveis-da-transação)
- [Token (Card Token)](#token-card-token)
  - <img style="max-width: 100%;vertical-align: middle;" width="30" src="https://img.shields.io/badge/POST-248fb2.svg?style=for-the-badge" /> [Novo Token](#novo-token)
  - <img style="max-width: 100%;vertical-align: middle;" width="30" src="https://img.shields.io/badge/GET-6bbd5b.svg?style=for-the-badge" /> [Obter Token](#obter-token)
- [Cobrança (Charge)](#cobrança-charge)
  -  <img style="max-width: 100%;vertical-align: middle;" width="30" src="https://img.shields.io/badge/POST-248fb2.svg?style=for-the-badge" /> [Nova Cobrança](#nova-cobrança)
  - <img style="max-width: 100%;vertical-align: middle;" width="30" src="https://img.shields.io/badge/PUT-9b708b.svg?style=for-the-badge" /> [Alterar Cobrança](#alterar-cobrança)
  - <img style="max-width: 100%;vertical-align: middle;" width="30" src="https://img.shields.io/badge/GET-6bbd5b.svg?style=for-the-badge" /> [Obter Cobrança](#obter-cobrança)
  - <img style="max-width: 100%;vertical-align: middle;" width="30" src="https://img.shields.io/badge/GET-6bbd5b.svg?style=for-the-badge" /> [Listar Cobranças](#listar-cobranças)
- [Estabelecimento (Establishment)](#estabelecimento-establishment)
  - <img style="max-width: 100%;vertical-align: middle;" width="30" src="https://img.shields.io/badge/POST-248fb2.svg?style=for-the-badge" /> [Novo Estabelecimento](#novo-estabelecimento)
  - <img style="max-width: 100%;vertical-align: middle;" width="30" src="https://img.shields.io/badge/PUT-9b708b.svg?style=for-the-badge" /> [Alterar Estabelecimento](#alterar-estabelecimento)
  - <img style="max-width: 100%;vertical-align: middle;" width="30" src="https://img.shields.io/badge/GET-6bbd5b.svg?style=for-the-badge" /> [Obter Estabelecimento](#obter-estabelecimento)
  - <img style="max-width: 100%;vertical-align: middle;" width="30" src="https://img.shields.io/badge/GET-6bbd5b.svg?style=for-the-badge" /> [Listar Estabelecimentos](#listar-estabelecimentos)
  + [Transações (Transactions)](#transações-transactions)
    - <img style="max-width: 100%;vertical-align: middle;" width="30" src="https://img.shields.io/badge/GET-6bbd5b.svg?style=for-the-badge" /> [Listar todas Transações dos Estabelecimentos](#listar-todas-transações-dos-estabelecimentos)
    - <img style="max-width: 100%;vertical-align: middle;" width="30" src="https://img.shields.io/badge/GET-6bbd5b.svg?style=for-the-badge" /> [Listar Transações dos Estabelecimentos](#listar-transações-dos-estabelecimentos)
    - <img style="max-width: 100%;vertical-align: middle;" width="30" src="https://img.shields.io/badge/GET-6bbd5b.svg?style=for-the-badge" /> [Obter Transação de um Estabelecimento](#obter-transação-de-um-estabelecimento)
  + [Métodos de Pagamento (Payment Methods)](#métodos-de-pagamento-payment-methods)
    - <img style="max-width: 100%;vertical-align: middle;" width="30" src="https://img.shields.io/badge/POST-248fb2.svg?style=for-the-badge" /> [Configurar Métodos de Pagamento](#configurar-métodos-de-pagamento)
  + [Antifraudes (Antifraud)](#antifraudes-antifraud)
    - <img style="max-width: 100%;vertical-align: middle;" width="30" src="https://img.shields.io/badge/POST-248fb2.svg?style=for-the-badge" /> [Configurar Antifraudes](#configurar-antifraudes)
- [Regra de Split (Split Rules)](#regra-de-split-split-rules)
    - <img style="max-width: 100%;vertical-align: middle;" width="30" src="https://img.shields.io/badge/POST-248fb2.svg?style=for-the-badge" /> [Nova Regra de Split](#nova-regra-de-split)
    - <img style="max-width: 100%;vertical-align: middle;" width="30" src="https://img.shields.io/badge/GET-6bbd5b.svg?style=for-the-badge" /> [Obter Regra de Split](#obter-regra-de-split)
    - <img style="max-width: 100%;vertical-align: middle;" width="30" src="https://img.shields.io/badge/GET-6bbd5b.svg?style=for-the-badge" /> [Listar Regras de Split](#listar-regras-de-split)
    - <img style="max-width: 100%;vertical-align: middle;" width="30" src="https://img.shields.io/badge/DEL-e27a7a.svg?style=for-the-badge" /> [Deletar Regra de Split](#deletar-regra-de-split)
- [Vendedor (Seller)](#vendedor-seller)
   - <img style="max-width: 100%;vertical-align: middle;" width="30" src="https://img.shields.io/badge/POST-248fb2.svg?style=for-the-badge" /> [Novo Vendedor](#novo-vendedor)
   - <img style="max-width: 100%;vertical-align: middle;" width="30" src="https://img.shields.io/badge/PUT-9b708b.svg?style=for-the-badge" /> [Alterar Vendedor](#alterar-vendedor)
   - <img style="max-width: 100%;vertical-align: middle;" width="30" src="https://img.shields.io/badge/GET-6bbd5b.svg?style=for-the-badge" /> [Obter Vendedor](#obter-vendedor)
   - <img style="max-width: 100%;vertical-align: middle;" width="30" src="https://img.shields.io/badge/GET-6bbd5b.svg?style=for-the-badge" /> [Listar Vendedores](#listar-Vendedores)
- [Transferência (Transfer)](#transferência-transfer)
  - <img style="max-width: 100%;vertical-align: middle;" width="30" src="https://img.shields.io/badge/GET-6bbd5b.svg?style=for-the-badge" /> [Listar Transferências](#listar-transferências)
  - <img style="max-width: 100%;vertical-align: middle;" width="30" src="https://img.shields.io/badge/GET-6bbd5b.svg?style=for-the-badge" /> [Obter Transferência](#obter-transferência)
  +  [Transferência dos Vendedores (Sellers Transfers)](#transferência-dos-vendedores-sellers-transfers)
     - <img style="max-width: 100%;vertical-align: middle;" width="30" src="https://img.shields.io/badge/GET-6bbd5b.svg?style=for-the-badge" /> [Listar Transferências dos Vendedores](#listar-transferências-dos-vendedores)
     - <img style="max-width: 100%;vertical-align: middle;" width="30" src="https://img.shields.io/badge/GET-6bbd5b.svg?style=for-the-badge" /> [Obter Transferência de Vendedor](#obter-transferência-de-vendedor)
  +  [Lançamentos Futuros (Future Transfers)](#lançamentos-futuros-future-transfers)
     - <img style="max-width: 100%;vertical-align: middle;" width="30" src="https://img.shields.io/badge/GET-6bbd5b.svg?style=for-the-badge" /> [Listar Lançamentos Futuros](#listar-lançamentos-futuros)
     - <img style="max-width: 100%;vertical-align: middle;" width="30" src="https://img.shields.io/badge/GET-6bbd5b.svg?style=for-the-badge" /> [Listar Lançamentos Futuros de Vendedor (Por Id)](#listar-lançamentos-futuros-de-vendedor-por-id)
     - <img style="max-width: 100%;vertical-align: middle;" width="30" src="https://img.shields.io/badge/GET-6bbd5b.svg?style=for-the-badge" /> [Listar Lançamentos Futuros de Vendedor (Por CPF/CNPJ)](#listar-lançamentos-futuros-de-vendedor-por-cpf-cnpj)
- [Link de Pagamento (Payment Links)](#link-de-pagamento-payment-links)
     - <img style="max-width: 100%;vertical-align: middle;" width="30" src="https://img.shields.io/badge/POST-248fb2.svg?style=for-the-badge" /> [Novo Link de Pagamento](#novo-link-de-pagamento)
     - <img style="max-width: 100%;vertical-align: middle;" width="30" src="https://img.shields.io/badge/GET-6bbd5b.svg?style=for-the-badge" /> [Obter Link de Pagamento (Por Id)](#obter-link-de-pagamento-por-id)
     - <img style="max-width: 100%;vertical-align: middle;" width="30" src="https://img.shields.io/badge/GET-6bbd5b.svg?style=for-the-badge" /> [Obter Link de Pagamento (Por External Code)](#obter-link-de-pagamento-por-external-code)
- [Webhook](#webhook)
     - <img style="max-width: 100%;vertical-align: middle;" width="30" src="https://img.shields.io/badge/POST-248fb2.svg?style=for-the-badge" /> [Novo Webhook](#novo-webhook)
     - <img style="max-width: 100%;vertical-align: middle;" width="30" src="https://img.shields.io/badge/GET-6bbd5b.svg?style=for-the-badge" /> [Obter Webhook](#obter-webhook)
     - <img style="max-width: 100%;vertical-align: middle;" width="30" src="https://img.shields.io/badge/GET-6bbd5b.svg?style=for-the-badge" /> [Listar Webhooks](#listar-webhooks)
     - <img style="max-width: 100%;vertical-align: middle;" width="30" src="https://img.shields.io/badge/DEL-e27a7a.svg?style=for-the-badge" /> [Deletar Webhook](#deletar-webhook)
- [Checkout](#checkout)
     - <img style="max-width: 100%;vertical-align: middle;" width="30" src="https://img.shields.io/badge/POST-248fb2.svg?style=for-the-badge" /> [Novo Checkout](#novo-checkout)
- [Voucher](#voucher)
     - <img style="max-width: 100%;vertical-align: middle;" width="30" src="https://img.shields.io/badge/POST-248fb2.svg?style=for-the-badge" /> [Novo Voucher](#novo-voucher)
- [Testes](#testes)
- [Licença](#licença)
- [Documentação](#documentação)
- [Dúvidas \& Sugestões](#dúvidas--sugestões)

## Dependências

**require**

- [PHP >= 7.4]
- [guzzlehttp/guzzle]
- [kubinyete/assertation]
- [psr/log]
- [symfony/polyfill-php81]
- [symfony/polyfill-php80]

**require-dev**

- [phpunit/phpunit]
- [symfony/var-dumper]
- [fakerphp/faker]

## Instalação

Execute em seu shell:

    composer require ipagdevs/ipag-sdk-php

# IpagClient

Classe responsável pela integração com a API do iPag. Através dela você consegue acessar todos os endpoints disponíveis na API.

> Para mais informações de como funciona a autenticação no Ipag, consulte: [Autenticação Ipag](https://developers.ipag.com.br/pt-br/auth)

### Autenticação

```php
$ipagClient = new \Ipag\Sdk\Core\IpagClient(
    'apiID',
    'apiKey',
    IpagEnvironment::SANDBOX
);
```

# Pagamento (Payment)

> Exemplo de Pagamento via Cartão de Crédito (Simples): [examples/payment/usage_simple_card.php](./examples/payment/usage_simple_card.php)

> Exemplo de Pagamento via Cartão de Crédito (Completo): [examples/payment/usage_complete_card.php](./examples/payment/usage_complete_card.php)

> Exemplo de Pagamento via Cartão de Crédito para Clientes Estrangeiros (Simples): [examples/payment/usage_card_foreign_customers_simple.php](./examples/payment/usage_card_foreign_customers_simple.php)

> Exemplo de Pagamento via Cartão de Crédito para um Evento: [examples/payment/usage_card_for_event.php](./examples/payment/usage_card_for_event.php)

> Exemplo de Pagamento via Boleto (Completo): [examples/payment/usage_boleto_full.php](./examples/payment/usage_boleto_full.php)

> Exemplo de Pagamento com Tokenização do Cartão de Crédito: [examples/payment/usage_card_tokenization.php](./examples/payment/usage_card_tokenization.php)

> Exemplo de Pagamento utilizando apenas o Token de Cartão: [examples/payment/usage_token_card.php](./examples/payment/usage_token_card.php)

> Exemplo de Pagamento via Cartão de Crédito com Criação de Assinatura|Cobrança Recorrente: [examples/payment/usage_recurring_billing_card.php](./examples/payment/usage_recurring_billing_card.php)

> Exemplo de Pagamento via Cartão de Crédito com Split de Pagamento: [examples/payment/usage_card_with_split.php](./examples/payment/usage_card_with_split.php)

> Exemplo de Pagamento via Pix (Completo): [examples/payment/usage_pix.php](./examples/payment/usage_pix.php)

```php
$paymentTransaction = new \Ipag\Sdk\Model\PaymentTransaction(
    [
        "amount" => 97.86,
        "callback_url" => "https://99mystore.com.br/ipag/callback",
        "order_id" => "1234567",
        "payment" => [
            "type" => "card",
            "method" => IpagEnvironment::cardMethods()::VISA,
            "installments" => 1,
            "card" => [
                "holder" => "FULANO DA SILVA",
                "number" => "4111 1111 1111 1111",
                "expiry_month" => "03",
                "expiry_year" => "2021",
                "cvv" => "123"
            ]
        ],
        "customer" => [
            "name" => "Jack Jins",
            "cpf_cnpj" => "799.993.388-01"
        ]
    ]
);
```
ou
```php
$paymentTransaction = (new \Ipag\Sdk\Model\PaymentTransaction)
    ->setAmount(100.0)
    ->setOrderId('123456')
    ->setCallbackUrl('https://99mystore.com.br/ipag/callback')
    ->setAntifraud(
        (new \Ipag\Sdk\Model\PaymentAntifraud)
            ->setFingerprint('123')
            ->setProvider('anti')
    )
    ->setPayment(
        (new \Ipag\Sdk\Model\Payment)
            ->setType('card')
            ->setMethod(IpagEnvironment::cardMethods()::VISA)
            ->setCard(
                (new \Ipag\Sdk\Model\PaymentCard)
                    ->setHolder('teste')
                    ->setNumber('123')
                    ->setCvv('123')
            )
    )
    ->setCustomer(
        (new \Ipag\Sdk\Model\Customer)
            ->setName('Fulano da Silva')
            ->setCpfCnpj('799.993.388-01')
            ->setBillingAddress(
                (new \Ipag\Sdk\Model\Address)
                    ->setStreet('Rua A')
            )
            ->setShippingAddress(
                (new \Ipag\Sdk\Model\Address)
                    ->setStreet('Rua A')
            )
    )
    ->setProducts([
        (new \Ipag\Sdk\Model\Product)
            ->setName('Produto 1'),
    ])
    ->addProduct(
        (new \Ipag\Sdk\Model\Product)
            ->setName('Produto 2')
    )
    ->setSubscription(
        (new \Ipag\Sdk\Model\PaymentSubscription)
            ->setFrequency(1)
            ->setTrial(
                (new \Ipag\Sdk\Model\Trial)
                    ->setAmount(100.9)
            )
    )
    ->setSplitRules([
        (new \Ipag\Sdk\Model\PaymentSplitRules)
            ->setSellerId('vendedor1@mail.me')
            ->setAmount(15.87),
    ])
    ->addSplitRules(
        (new \Ipag\Sdk\Model\PaymentSplitRules)
            ->setSellerId('vendedor2@mail.me')
            ->setPercentage(20.0)
    );
```

### Criar Pagamento

```php
$responsePayment = $ipagClient->payment()->create($paymentTransaction);
```

### Consultar Pagamento

```php
$responsePayment = $ipagClient->payment()->getById($transactionId);
```
```php
$responsePayment = $ipagClient->payment()->getByUuid($transactionUuid);
```
```php
$responsePayment = $ipagClient->payment()->getByUuid($transactionTid);
```
```php
$responsePayment = $ipagClient->payment()->getByUuid($orderId);
```

### Capturar Pagamento

```php
$responsePayment = $ipagClient->payment()->captureById($transactionId);
```

```php
$responsePayment = $ipagClient->payment()->captureByUuid($transactionUuid);
```

```php
$responsePayment = $ipagClient->payment()->captureByUuid($transactionTid);
```

```php
$responsePayment = $ipagClient->payment()->captureByUuid($orderId);
```

### Cancelar Pagamento

```php
$responsePayment = $ipagClient->payment()->cancelById($transactionId);
```

```php
$responsePayment = $ipagClient->payment()->cancelByUuid($transactionUuid);
```

```php
$responsePayment = $ipagClient->payment()->cancelByUuid($transactionTid);
```

```php
$responsePayment = $ipagClient->payment()->cancelByUuid($orderId);
```

# Cliente (Customer)

> Exemplo completo: [examples/customer/usage.php](./examples/customer/usage.php)

```php
$customer = new \Ipag\Sdk\Model\Customer([
    'name' => 'Maria da Silva',
    'email' => 'mariadasilva@email.com',
    'cpf_cnpj' => '799.993.388-01',
    'phone' => '(11) 98888-3333',
    'business_name' => 'Maria Ltda.',
    'address' => [
        'street' => 'Avenida Paulista',
        'number' => '01',
        'district' => 'São Paulo',
        'city' => 'São Paulo',
        'state' => 'SP',
        'zipcode' => '01310-930'
    ]
]);
```

ou

```php
$customer = new \Ipag\Sdk\Model\Customer()
    ->setName('Maria da Silva')
    ->setEmail('mariadasilva@email.com')
    ->setCpfCnpj('799.993.388-01')
    ->setPhone('(11) 98888-3333')
    ->setBusinessName('Maria Ltda.')
    ->setAddress(
        new \Ipag\Sdk\Model\Address()
            ->setStreet('Avenida Paulista')
            ->setNumber('01')
            ->setDistrict('São Paulo')
            ->setCity('São Paulo')
            ->setState('SP')
            ->setZipcode('01310-930')
);
```

### Novo Cliente

```php
$responseCustomer = $ipagClient->customer()->create($customer);
```

### Alterar Cliente

```php
$responseCustomer = $ipagClient->customer()->update($customer, $customerId);
```

### Obter Cliente

```php
$responseCustomer = $ipagClient->customer()->get($customerId);
```

### Listar Clientes

```php
$responseCustomer = $ipagClient->customer()->list([
    'name' => 'maria'
]);
```

### Deletar Cliente

```php
$ok = $ipagClient->customer()->delete($customerId);
```

# Plano de Assinatura (Subscription Plan)

> Exemplo completo: [examples/subscription_plan/usage.php](./examples/subscription_plan/usage.php)

```php
$subscriptionPlan = new \Ipag\Sdk\Model\SubscriptionPlan([
    'name' => 'PLANO GOLD',
    'description' => 'Plano Gold com até 4 treinos por semana',
    'amount' => 0,
    'frequency' => 'monthly',
    'interval' => 1,
    'cycles' => 0,
    'best_day' => true,
    'pro_rated_charge' => true,
    'grace_period' => 0,
    'callback_url' => 'https://sualoja.com.br/ipag/callback',
    'trial' => [
        'amount' => 0,
        'cycles' => 0
    ]
]);
```

ou

```php
$subscriptionPlan = new \Ipag\Sdk\Model\SubscriptionPlan()
    ->setName("PLANO GOLD")
    ->setDescription("Plano Gold com até 4 treinos por semana")
    ->setAmount(99.00)
    ->setFrequency("monthly")
    ->setInterval(1)
    ->setCycles(0)
    ->setBestDay(true)
    ->setProRatedCharge(true)
    ->setGracePeriod(0)
    ->setCallbackUrl("https://sualoja.com.br/ipag/callback")
    ->setTrial(
        new \Ipag\Sdk\Model\Trial()
            ->setAmount(0)
            ->setCycles(0)
);
```

### Novo Plano de Assinatura

```php
$responseSubscriptionPlan = $ipagClient->subscriptionPlan()->create($subscriptionPlan);
```

### Alterar Plano de Assinatura

```php
$responseSubscriptionPlan = $ipagClient->subscriptionPlan()->update($subscriptionPlan, $subscriptionPlanId);
```

### Obter Plano de Assinatura

```php
$responseSubscriptionPlan = $ipagClient->subscriptionPlan()->get($subscriptionPlanId);
```

### Listar Planos de Assinatura

```php
$responseSubscriptionPlan = $ipagClient->subscriptionPlan()->list([
    'name' => 'PLANO SILVER',
]);
```

### Deletar Plano de Assinatura

```php
$ipagClient->subscriptionPlan()->delete($subscriptionPlanId);
```

# Assinatura (Subscription)

> Exemplo completo: [examples/subscription/usage.php](./examples/subscription/usage.php)

```php
$subscription = new \Ipag\Sdk\Model\Subscription([
    'is_active' => true,
    'profile_id' => 'SUB_018',
    'plan_id' => 2,
    'customer_id' => 100003,
    'starting_date' => '2021-07-11',
    'closing_date' => '2021-08-11',
    'callback_url' => 'https://minhaloja.com/callback',
    'creditcard_token' => null
]);

```

ou

```php
$subscription = new \Ipag\Sdk\Model\Subscription()
    ->setIsActive(true)
    ->setProfileId('SUB_001')
    ->setPlanId(1)
    ->setCustomerId(100001)
    ->setStartingDate('2021-07-10')
    ->setClosingDate('2021-08-10')
    ->setCallbackUrl('https://minhaloja.com/callback')
    ->setCreditcardToken('123');

```

### Nova Assinatura

```php
$responseSubscription = $ipagClient->subscription()->create($subscription);
```

### Alterar Assinatura

```php
$responseSubscription = $ipagClient->subscription()->update($subscription, $subscriptionId);
```

### Obter Assinatura

```php
$responseSubscription = $ipagClient->subscription()->get($subscriptionId);
```

### Listar Assinaturas

```php
$responseSubscription = $ipagClient->subscription()->list([
    'is_active' => true,
]);
```

### Desvincular Token da Assinatura

```php
$ok = $ipagClient->subscription()->unlinkToken($subscriptionId);
```

### Quitar Parcela da Assinatura

```php
$responseSubscription = $ipagClient->subscription()->payOffInstallment($subscriptionId, $invoiceNumber);
```

### Agendar Parcelamento da Assinatura

```php
$ok = $ipagClient->subscription()->scheduleInstallmentPayment($subscriptionId, $invoiceNumber);
```

# Transação (Transaction)

> Exemplo completo: [examples/transaction/usage.php](./examples/transaction/usage.php)

### Obter Transação

```php
$responseTransaction = $ipagClient->transaction()->get($transactionId);
```

### Listar Transações

```php
$responseTransaction = $ipagClient->transaction()->list([
    'order' => 'desc',
    'from_date' => '2023-08-29'
]);
```

### Liberar Recebíveis da Transação

```php
$responseTransaction = $client->transaction()->releaseReceivables($sellerId, $transactionId);
```

# Token (Card Token)

> Exemplo completo: [examples/token/usage.php](./examples/token/usage.php)

```php
$token = new \Ipag\Sdk\Model\Token([
    'card' => [
        'holderName' => 'Frederic Sales',
        'number' => '4024 0071 1251 2933',
        'expiryMonth' => '02',
        'expiryYear' => '2023',
        'cvv' => '431'
    ],
    'holder' => [
        'name' => 'Frederic Sales',
        'cpfCnpj' => '79999338801',
        'mobilePhone' => '1899767866',
        'birthdate' => '1989-03-28',
        'address' => [
                'street' => 'Rua dos Testes',
                'number' => '100',
                'district' => 'Tamboré',
                'zipcode' => '06460080',
                'city' => 'Barueri',
                'state' => 'SP'
            ]
    ]
]);
```
ou
```php
$token = (new \Ipag\Sdk\Model\Token())
    ->setCard(
        (new \Ipag\Sdk\Model\Card())
            ->setHolderName('Frederic Sales')
            ->setNumber('4024 0071 1251 2933')
            ->setExpiryMonth('02')
            ->setExpiryYear('2023')
            ->setCvv('431')
    )
    ->setHolder(
        (new \Ipag\Sdk\Model\Holder())
            ->setName('Frederic Sales')
            ->setCpfCnpj('79999338801')
            ->setMobilePhone('1899767866')
            ->setBirthdate('1989-03-28')
            ->setAddress(new \Ipag\Sdk\Model\Address)
    );
```

### Novo Token

```php
$responseToken = $ipagClient->token()->create($token);
```
### Obter Token

```php
$responseToken = $ipagClient->token()->get($tokenValue);
```

# Cobrança (Charge)

> Exemplo completo: [examples/charge/usage.php](./examples/charge/usage.php)

```php
$charge = new \Ipag\Sdk\Model\Charge([
    'amount' => 150.50,
    'description' => 'Cobrança referente a negociação de débito pendente na Empresa X',
    'due_date' => '2020-10-30',
    'frequency' => 1,
    'interval' => 'month',
    'type' => 'charge',
    'last_charge_date' => '2020-10-30',
    'callback_url' => 'https://api.ipag.test/retorno_charge',
    'auto_debit' => false,
    'installments' => 12,
    'is_active' => true,
    'products' => [1, 2, 3],
    'customer' => [
        'name' => 'Maria Francisca',
    ],
    'checkout_settings' => [
        'max_installments' => 12,
    ]
]);
```
ou
```php
$charge = (new \Ipag\Sdk\Model\Charge)
    ->setAmount(150.50)
    ->setDescription('Cobrança referente a negociação de débito pendente na Empresa X')
    ->setDueDate('2020-10-30')
    ->setFrequency(1)
    ->setInterval('month')
    ->setType('charge')
    ->setLastChargeDate('2020-10-30')
    ->setCallbackUrl('https://api.ipag.test/retorno_charge')
    ->setAutoDebit(false)
    ->setInstallments(12)
    ->setIsActive(true)
    ->setProducts([1, 2, 3])
    ->setCustomer(
        (new \Ipag\Sdk\Model\Customer)
            ->setName('Maria Francisca')
    )
    ->setCheckoutSettings(
        (new \Ipag\Sdk\Model\CheckoutSettings)
            ->setMaxInstallments(12)
    );
```

### Nova Cobrança

```php
$responseCharge = $ipagClient->charge()->create($charge);
```

### Alterar Cobrança

```php
$responseCharge = $ipagClient->charge()->update($charge, $chargeId);
```

### Obter Cobrança

```php
$responseCharge = $ipagClient->charge()->get($chargeId);
```

### Listar Cobranças

```php
$responseCharge = $ipagClient->charge()->list([
    'is_active' => false,
]);
```

# Estabelecimento (Establishment)

> Exemplo completo: [examples/establishment/usage.php](./examples/establishment/usage.php)

```php
$establishment = new \Ipag\Sdk\Model\Establishment([
    'name' => 'Lívia Julia Eduarda Barros',
    'email' => 'livia.julia.barros@eximiart.com.br',
    'login' => 'livia',
    'password' => 'livia123',
    'document' => '074.598.263-83',
    'phone' => '(98) 3792-4834',
    'address' =>
        [
            'street' => 'Rua A',
        ],
    'owner' => [
        'name' => 'Lívia Julia Eduarda Barros',
    ],
    'bank' => [
        'code' => '001'
    ]
]);
```
ou
```php
$establishment = (new \Ipag\Sdk\Model\Establishment)
    ->setName('Lívia Julia Eduarda Barros')
    ->setEmail('livia.julia.barros@eximiart.com.br')
    ->setLogin('livia')
    ->setPassword('livia123')
    ->setPhone('(98) 3792-4834')
    ->setDocument('074.598.263-83')
    ->setAddress(new \Ipag\Sdk\Model\Address)
    ->setOwner(new \Ipag\Sdk\Model\Owner)
    ->setBank(new \Ipag\Sdk\Model\Bank);
```

### Novo Estabelecimento

```php
$responseEstablishment = $ipagClient->establishment()->create($establishment);
```

### Alterar Estabelecimento

```php
$responseEstablishment = $ipagClient->establishment()->update($establishment, $establishmentTid);
```

### Obter Estabelecimento

```php
$responseEstablishment = $ipagClient->establishment()->get($establishmentTid);
```

### Listar Estabelecimentos

```php
$responseEstablishment = $ipagClient->establishment()->list();
```

## Transações (Transactions)

### Listar todas Transações dos Estabelecimentos

```php
$responseTransactions = $ipagClient->establishment()->transaction()->list();
```

### Listar Transações dos Estabelecimentos

```php
$responseTransactions = $ipagClient->establishment()->transaction()->listByEstablishment($establishmentTid);
```

### Obter Transação de um Estabelecimento

```php
$responseTransactions = $ipagClient->establishment()->transaction()->getByEstablishment($establishmentTid, $transactionTid);
```

## Métodos de Pagamento (Payment Methods)

```php
$paymentMethod = new \Ipag\Sdk\Model\PaymentMethod([
    'acquirer' => 'stone',
    'priority' => 100,
    'environment' => 'test',
    'capture' => true,
    'retry' => true,
    'credentials' => [
        'stone_code' => 'xxxxx',
        'stone_sak' => 'xxxxxx'
    ],
]);
```

### Configurar Métodos de Pagamento

```php
$responseConfig = $ipagClient
    ->establishment()
    ->paymentMethods()
    ->config($paymentMethod, $establishmentTid);
```

## Antifraudes (Antifraud)

```php
$antifraud = new \Ipag\Sdk\Model\Antifraud(
    [
        "provider" => (
            new Ipag\Sdk\Support\Provider\Antifraudes\RedShieldProvider([
            "token" => "xxxxxxxx",
            "entityId" => "xxxxxxxx",
            "channelId" => "xxxxxxxx",
            "serviceId" => "xxxxxxxx"
            ])
        )->jsonSerialize(),
        "settings" => [
            "enable" => true,
            "environment" => "test",
            "consult_mode" => "auto",
            "capture_on_approval" => false,
            "cancel_on_refused" => true,
            "review_score_threshold" => 0.8
        ]
    ]
);
```

### Configurar Antifraudes

```php
$responseConfig = $ipagClient
    ->establishment()
    ->antifraud()
    ->config($antifraud, $establishmentTid);
```

# Regra de Split (Split Rules)

> Exemplo completo: [examples/split_rules/usage.php](./examples/split_rules/usage.php)

```php
$splitRules = new \Ipag\Sdk\Model\SplitRules([
    "receiver_id" => "1000000",
    "percentage" => 10.00
]);
```
ou
```php
$splitRules = (new \Ipag\Sdk\Model\SplitRules)
    ->setReceiverId("1000000")
    ->setPercentage(10.00);
```

### Nova Regra de Split

```php
$responseSplitRules = $ipagClient->splitRules()->create($splitRules, $transactionId);
```

### Obter Regra de Split

```php
$responseSplitRules = $ipagClient->splitRules()->get($splitRuleId, $transactionId);
```

### Listar Regras de Split

```php
$responseSplitRules = $ipagClient->splitRules()->list($transactionId);
```

### Deletar Regra de Split

```php
$responseSplitRules = $ipagClient->splitRules()->delete($splitRuleId, $transactionId);
```

# Vendedor (Seller)

> Exemplo completo: [examples/seller/usage.php](./examples/seller/usage.php)

```php
$seller = new \Ipag\Sdk\Model\Seller([
    "login" => "josefrancisco",
    "password" => "123123",
    "name" => "José Francisco Silva",
    "cpf_cnpj" => "854.508.440-42",
    "email" => "jose@mail.me",
    "phone" => "(11) 98712-1234",
    "description" => "XXXXXXXXXXXXXX",
    "address" => [
        "street" => "Rua Júlio Gonzalez",
    ],
    "owner" => [
        "name" => "Giosepe",
    ],
    "bank" => [
        "code" => "290",
    ]
]);
```
ou
```php
$seller = (new \Ipag\Sdk\Model\Seller)
    ->setLogin("josefrancisco")
    ->setPassword("123123")
    ->setName("José Francisco Silva")
    ->setCpfCnpj("854.508.440-42")
    ->setEmail("jose@mail.me")
    ->setPhone("11987121234")
    ->setDescription("XXXXXXXXXXXXXX")
    ->setAddress(
        (new \Ipag\Sdk\Model\Address)
            ->setStreet("Rua Jálio Gonzalez")
    )
    ->setOwner(
        (new \Ipag\Sdk\Model\Owner)
            ->setName("Giosepe")
    )
    ->setBank(
        (new \Ipag\Sdk\Model\Bank)
            ->setCode("290")
    );
```

### Novo Vendedor
```php
$responseSeller = $ipagClient->seller()->create($seller);
```

### Alterar Vendedor
```php
$responseSeller = $ipagClient->seller()->update($seller, $sellerId);
```

### Obter Vendedor
```php
$responseSeller = $ipagClient->seller()->get($sellerId);
```

### Listar Vendedores
```php
$responseSellers = $ipagClient->seller()->list();
```

# Transferência (Transfer)

> Exemplo completo: [examples/transfer/usage.php](./examples/transfer/usage.php)

### Listar Transferências

```php
$responseTransfers = $ipagClient->transfer()->list();
```

### Obter Transferência

```php
$responseTransfers = $ipagClient->transfer()->get($transferId);
```

## Transferência dos Vendedores (Sellers Transfers)

### Listar Transferências dos Vendedores

```php
$responseTransfers = $ipagClient->transfer()->seller()->list();
```

### Obter Transferência de Vendedor

```php
$responseTransfers = $ipagClient->transfer()->seller()->get($transferId);
```

## Lançamentos Futuros (Future Transfers)

### Listar Lançamentos Futuros

```php
$responseTransfers = $ipagClient->transfer()->future()->list();
```

### Listar Lançamentos Futuros de Vendedor (Por Id)

```php
$responseTransfers = $ipagClient->transfer()->future()->listBySellerId($sellerId);
```

### Listar Lançamentos Futuros de Vendedor (Por CPF/CNPJ)

```php
$responseTransfers = $ipagClient->transfer()->future()->listBySellerCpfCnpj($sellerCpf);
```

## Link de Pagamento (Payment Links)

> Exemplo completo: [examples/payment_links/usage.php](./examples/payment_links/usage.php)

```php
$paymentLink = new \Ipag\Sdk\Model\PaymentLink([
    'externalCode' => '131',
    'amount' => 0,
    'description' => 'LINK DE PAGAMENTO SUPER BACANA',
    'expireAt' => '2020-12-30 23:00:00',
    'buttons' => [
        'enable' => false,
    ],
    'checkout_settings' => [
        'max_installments' => 12,
    ],
]);
```
ou
```php
$paymentLink = (new \Ipag\Sdk\Model\PaymentLink)
    ->setExternalCode('131')
    ->setAmount(0)
    ->setDescription('LINK DE PAGAMENTO SUPER BACANA')
    ->setExpireAt('2020-12-30 23:00:00')
    ->setButtons(
        (new \Ipag\Sdk\Model\Buttons)
            ->setEnable(false)
    )
    ->setCheckoutSettings(
        (new \Ipag\Sdk\Model\CheckoutSettings)
            ->setMaxInstallments(12)
    );
```

### Novo Link de Pagamento

```php
$responsePaymentLink = $ipagClient->paymentLinks()->create($paymentLink);
```

### Obter Link de Pagamento (Por Id)

```php
$responsePaymentLink = $ipagClient->paymentLinks()->getById($paymentLinkId);
```

### Obter Link de Pagamento (Por External Code)

```php
$responsePaymentLink = $ipagClient->paymentLinks()->getByExternalCode($externalCode);
```

# Webhook

> Exemplo completo: [examples/webhook/usage.php](./examples/webhook/usage.php)

```php
$webhook = new \Ipag\Sdk\Model\Webhook([
    'http_method' => 'POST',
    'url' => 'https://minhaloja.com.br/callback',
    'description' => 'Webhook para receber notificações de atualização das transações',
    'actions' => [
        \Ipag\Sdk\Core\IpagEnvironment::webhook()::PAYMENT_LINK_PAYMENT_SUCCEEDED,
        \Ipag\Sdk\Core\IpagEnvironment::webhook()::PAYMENT_LINK_PAYMENT_FAILED,
    ]
]);
```
ou
```php
$webhook = (new \Ipag\Sdk\Model\Webhook)
    ->setHttpMethod('POST')
    ->setUrl('https://minhaloja.com.br/callback')
    ->setDescription('Webhook para receber notificações de atualização das transações')
    ->setActions([
        \Ipag\Sdk\Core\IpagEnvironment::webhook()::PAYMENT_LINK_PAYMENT_SUCCEEDED,
        \Ipag\Sdk\Core\IpagEnvironment::webhook()::PAYMENT_LINK_PAYMENT_FAILED,
    ]);
```

### Novo Webhook

```php
$responseWebhook = $ipagClient->webhook()->create($webhook);
```

### Obter Webhook

```php
$responseWebhook = $ipagClient->webhook()->get($webhookId);
```

### Listar Webhooks

```php
$responseWebhook = $ipagClient->webhook()->list();
```

### Deletar Webhook

```php
$ok = $ipagClient->webhook()->delete($webhookId);
```

# Checkout

> Exemplo completo: [examples/checkout/usage.php](./examples/checkout/usage.php)

```php
$checkout = new \Ipag\Sdk\Model\Checkout([
    'customer' => [
        "name" => "Fulano da Silva",
        "tax_receipt" => "212.348.796-11",
        "email" => "teste@email.com",
        "phone" => "(11) 2222-3333",
        "birthdate" => "1987-11-21",
        "address" => [
            "zipcode" => "01156060",
            "street" => "Rua Júlio Gonzalez",
            "number" => "1023",
            "district" => "Barra Funda",
            "complement" => "Sala 02",
            "city" => "São Paulo",
            "state" => "SP"
        ]
    ],
    'installment_setting' => [
        "max_installments" => 12,
        "min_installment_value" => 5,
        "interest" => 0,
        "interest_free_installments" => 12
    ],
    'order' => [
        "order_id" => "100001",
        "amount" => "15.00",
        "return_url" => "https://www.loja.com.br/callback",
        "return_type" => "json"
    ],
    'products' => [
        [
            'name' => 'Smart TV LG 55 4K UHD',
            "unit_price" => "3.999",
            "quantity" => 1,
            "sku" => "LG123",
            "description" => "Experiência cristalina em 4K."
        ],
        [
            'name' => 'LED Android TV 4K UHD LED',
            "unit_price" => "2.310",
            "quantity" => 1,
            "sku" => "SAM123",
            "description" => "Android TV de 126 cm (50)."
        ],
    ],
    'split_rules' => [
        [
            "receiver" => "qwertyuiopasdfghjklzxcvbnm123456",
            "percentage" => "50",
            "charge_processing_fee" => true,
        ],
        [
            "receiver" => "654321mnbvcxzlkjhgfdsapoiuytrewq",
            "percentage" => "20"
        ]
    ],
    'sellerId' => '100014',
    'expires_in' => 60,
]);
```
ou
```php
$checkout = (new \Ipag\Sdk\Model\Checkout())
    ->setCustomer(
        (new \Ipag\Sdk\Model\Customer)
            ->setName('Lívia Julia Eduarda Barros')
    )
    ->setInstallmentSetting(
        (new \Ipag\Sdk\Model\InstallmentSetting)
            ->setMaxInstallments(12)
    )
    ->setOrder(
        (new \Ipag\Sdk\Model\Order)
            ->setOrderId('1000077')
    )
    ->addProduct(
        (new \Ipag\Sdk\Model\Product())
            ->setName('Smart TV LG 55 4K UHD')
    )
    ->addProduct(
        (new \Ipag\Sdk\Model\Product())
            ->setName('Smart TV 50" UHD 4K')
    )
    ->addSplitRule(
        (new \Ipag\Sdk\Model\SplitRules)
            ->setReceiverId('1000000')
    )
    ->addSplitRule(
        (new \Ipag\Sdk\Model\SplitRules)
            ->setReceiverId('1000001')
    )
    ->setSellerId('100014')
    ->setExpiresIn(60);
```

### Novo Checkout

```php
$responseCheckout = $ipagClient->checkout()->create($checkout);
```

# Voucher

> Exemplo completo: [examples/voucher/usage.php](./examples/voucher/usage.php)

```php
$voucher = new \Ipag\Sdk\Model\Voucher([
    'order' => [
        'order_id' => '100015',
        'amount' => 699.99,
        'created_at' => '2020-08-04 21:45:10',
        'callback_url' => 'https://www.yahoo.com.br/callback'
    ],
    'seller' => [
        'cpf_cnpj' => '854.508.440-42',
    ],
    'customer' => [
        'name' => 'FULANO DA SILVA',
        'cpf_cnpj' => '949.373.210-05',
        'email' => 'fulano@mail.me',
        'phone' => '(11) 99780-1000',
        'birthdate' => '1990-10-10',
        'address' => [
            'street' => 'Av. Brasil',
            'number' => '1000',
            'district' => 'Centro',
            'complement' => 'Ap 451',
            'city' => 'São Paulo',
            'state' => 'SP'
        ]
    ]
]);
```
ou
```php
$voucher = (new \Ipag\Sdk\Model\Voucher)
    ->setOrder(
        (new \Ipag\Sdk\Model\Order)
            ->setOrderId(
                '1000077'
            )
    )
    ->setSeller(
        (new \Ipag\Sdk\Model\Seller)
            ->setCpfCnpj(
                '074.598.263-83'
            )
    )
    ->setCustomer(
        (new \Ipag\Sdk\Model\Customer)
            ->setName(
                'FULANO DA SILVA'
            )
            ->setAddress(
                (new \Ipag\Sdk\Model\Address)
                    ->setStreet('Av. Brasil')
            )
    );
```

### Novo Voucher

```php
$responseVoucher = $ipagClient->voucher()->create($voucher);
```

## Testes

É necessário a instalação do PHPUnit para a realização dos testes.

## Licença

[The MIT License](https://github.com/ipagdevs/ipag-sdk-php/blob/master/LICENSE)

## Documentação

[Documentação Oficial](https://developers.ipag.com.br)

## Dúvidas & Sugestões

Em caso de dúvida ou sugestão para o SDK abra uma nova [Issue](https://github.com/ipagdevs/ipag-sdk-php/issues).
