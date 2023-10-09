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

> Exemplo de Pagamento via Cartão de Crédito (Simples): [examples/payment/00-payment-create-card-simple.php](./examples/payment/00-payment-create-card-simple.php)

> Exemplo de Pagamento via Cartão de Crédito (Completo): [examples/payment/01-payment-create-card-complete.php](./examples/payment/01-payment-create-card-complete.php)

> Exemplo de Pagamento via Cartão de Crédito para Clientes Estrangeiros (Simples): [examples/payment/02-payment-create-card-foreign-customer.php](./examples/payment/02-payment-create-card-foreign-customer.php)

> Exemplo de Pagamento via Cartão de Crédito para um Evento: [examples/payment/03-payment-create-card-for-event.php](./examples/payment/03-payment-create-card-for-event.php)

> Exemplo de Pagamento via Boleto (Completo): [examples/payment/04-payment-create-bankslip.php](./examples/payment/04-payment-create-bankslip.php)

> Exemplo de Pagamento com Tokenização do Cartão de Crédito: [examples/payment/05-payment-create-card-tokenization.php](./examples/payment/05-payment-create-card-tokenization.php)

> Exemplo de Pagamento utilizando apenas o Token de Cartão: [examples/payment/06-payment-create-card-token.php](./examples/payment/06-payment-create-card-token.php)

> Exemplo de Pagamento via Cartão de Crédito com Criação de Assinatura|Cobrança Recorrente: [examples/payment/07-payment-create-subscription-recurring-billing-card.php](./examples/payment/07-payment-create-subscription-recurring-billing-card.php)

> Exemplo de Pagamento via Cartão de Crédito com Split de Pagamento: [examples/payment/08-payment-create-card-with-split.php](./examples/payment/08-payment-create-card-with-split.php)

> Exemplo de Pagamento via Pix (Completo): [examples/payment/09-payment-create-pix.php](./examples/payment/09-payment-create-pix.php)

```php
$paymentTransaction = new \Ipag\Sdk\Model\PaymentTransaction(
    [
        'amount' => 100,
        'callback_url' => 'https://ipag-sdk.requestcatcher.com/callback',
        'order_id' => '12345679',
        'payment' => [
            'type' => Ipag\Sdk\Core\Enums\PaymentTypes::CARD,
            'method' => Ipag\Sdk\Core\Enums\Cards::VISA,
            'installments' => 4,
            'card' => [
                'holder' => 'Bruce Wayne',
                'number' => '4111 1111 1111 1111',
                'expiry_month' => '01',
                'expiry_year' => '2025',
                'cvv' => '123'
            ]
        ],
        'customer' => [
            'name' => 'Bruce Wayne',
            'cpf_cnpj' => '490.558.550-30'
        ]
    ]
);
```
ou
```php
$paymentTransaction = (new \Ipag\Sdk\Model\PaymentTransaction())
    ->setAmount(100)
    ->setOrderId('123456')
    ->setCallbackUrl('https://ipag-sdk.requestcatcher.com/callback')
    ->setAntifraud(
        (new \Ipag\Sdk\Model\PaymentAntifraud())
            ->setFingerprint('123')
            ->setProvider('anti')
    )
    ->setPayment(
        (new \Ipag\Sdk\Model\Payment())
            ->setType(Ipag\Sdk\Core\Enums\PaymentTypes::CARD)
            ->setMethod(Ipag\Sdk\Core\Enums\Cards::VISA)
            ->setCard(
                (new \Ipag\Sdk\Model\PaymentCard())
                    ->setHolder('Bruce Wayne')
                    ->setNumber('4111 1111 1111 1111')
                    ->setCvv('123')
            )
    )
    ->setCustomer(
        (new \Ipag\Sdk\Model\Customer())
            ->setName('Bruce Wayne')
            ->setCpfCnpj('490.558.550-30')
            ->setBillingAddress(
                (new \Ipag\Sdk\Model\Address())
                    ->setStreet('Avenida Principal')
            )
            ->setShippingAddress(
                (new \Ipag\Sdk\Model\Address())
                    ->setStreet('Avenida Principal')
            )
    )
    ->setProducts([
        (new \Ipag\Sdk\Model\Product())
            ->setName('Smart TV LG 55 4K UHD'),
    ])
    ->addProduct(
        (new \Ipag\Sdk\Model\Product())
            ->setName('LED Android TV 4K UHD LED')
    )
    ->setSubscription(
        (new \Ipag\Sdk\Model\PaymentSubscription())
            ->setFrequency(1)
            ->setTrial(
                (new \Ipag\Sdk\Model\Trial())
                    ->setAmount(100)
            )
    )
    ->setSplitRules([
        (new \Ipag\Sdk\Model\PaymentSplitRules())
            ->setSellerId('vendedor1@mail.me')
            ->setAmount(15),
    ])
    ->addSplitRules(
        (new \Ipag\Sdk\Model\PaymentSplitRules())
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
ou
```php
$responsePayment = $ipagClient->payment()->captureByUuid($transactionUuid);
```
ou
```php
$responsePayment = $ipagClient->payment()->captureByUuid($transactionTid);
```
ou
```php
$responsePayment = $ipagClient->payment()->captureByUuid($orderId);
```

### Cancelar Pagamento

```php
$responsePayment = $ipagClient->payment()->cancelById($transactionId);
```
ou
```php
$responsePayment = $ipagClient->payment()->cancelByUuid($transactionUuid);
```
ou
```php
$responsePayment = $ipagClient->payment()->cancelByUuid($transactionTid);
```
ou
```php
$responsePayment = $ipagClient->payment()->cancelByUuid($orderId);
```

# Cliente (Customer)

```php
$customer = new \Ipag\Sdk\Model\Customer([
    'name' => 'Bruce Wayne',
    'email' => 'brucewayne@email.com',
    'cpf_cnpj' => '490.558.550-30',
    'phone' => '(22) 2222-33333',
    'business_name' => 'Wayne Enterprises',
    'birthdate' => '1987-02-19',
    'address' => [
        'street' => 'Avenida Principal',
        'number' => '12345',
        'district' => 'São Paulo',
        'city' => 'São Paulo',
        'state' => 'SP',
        'zipcode' => '01310-000'
    ]
]);
```

ou

```php
$customer = new \Ipag\Sdk\Model\Customer()
    ->setName('Bruce Wayne')
    ->setEmail('brucewayne@email.com')
    ->setCpfCnpj('490.558.550-30')
    ->setPhone('(22) 2222-33333')
    ->setBusinessName('Wayne Enterprises')
    ->setAddress(
        new \Ipag\Sdk\Model\Address()
            ->setStreet('Avenida Paulista')
            ->setNumber('12345')
            ->setDistrict('São Paulo')
            ->setCity('São Paulo')
            ->setState('SP')
            ->setZipcode('01310-000')
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
    'name' => 'wayne'
]);
```

### Deletar Cliente

```php
$responseCustomer = $ipagClient->customer()->delete($customerId);
```

> Todos os exemplos: [examples/customer/](./examples/customer/)

# Plano de Assinatura (Subscription Plan)

```php
$subscriptionPlan = new \Ipag\Sdk\Model\SubscriptionPlan([
    'name' => 'PLANO GOLD',
    'description' => 'Plano Gold com até 4 treinos por semana',
    'amount' => 100,
    'frequency' => Ipag\Sdk\Core\Enums\Interval::MONTHLY,
    'interval' => 1,
    'cycles' => 0,
    'best_day' => true,
    'pro_rated_charge' => true,
    'grace_period' => 0,
    'callback_url' => 'https://ipag-sdk.requestcatcher.com/callback',
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
    ->setAmount(100)
    ->setFrequency(Ipag\Sdk\Core\Enums\Interval::MONTHLY)
    ->setInterval(1)
    ->setCycles(0)
    ->setBestDay(true)
    ->setProRatedCharge(true)
    ->setGracePeriod(0)
    ->setCallbackUrl("https://ipag-sdk.requestcatcher.com/callback")
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
    'name' => 'GOLD',
]);
```

### Deletar Plano de Assinatura

```php
$ipagClient->subscriptionPlan()->delete($subscriptionPlanId);
```

> Todos os exemplos: [examples/subscription_plan/](./examples/subscription_plan/)

# Assinatura (Subscription)

```php
$subscription = new \Ipag\Sdk\Model\Subscription([
    'is_active' => true,
    'profile_id' => 'SUB_01',
    'plan_id' => 1,
    'customer_id' => 100001,
    'starting_date' => '2021-07-11',
    'closing_date' => '2021-08-11',
    'callback_url' => 'https://ipag-sdk.requestcatcher.com/callback',
    'creditcard_token' => '123'
]);

```

ou

```php
$subscription = new \Ipag\Sdk\Model\Subscription()
    ->setIsActive(true)
    ->setProfileId('SUB_001')
    ->setPlanId(1)
    ->setCustomerId(100001)
    ->setStartingDate('2021-07-11')
    ->setClosingDate('2021-08-11')
    ->setCallbackUrl('https://ipag-sdk.requestcatcher.com/callback')
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
$responseSubscription = $ipagClient->subscription()->unlinkToken($subscriptionId);
```

### Quitar Parcela da Assinatura

```php
$responseSubscription = $ipagClient->subscription()->payOffInstallment($subscriptionId, $invoiceNumber);
```

### Agendar Parcelamento da Assinatura

```php
$responseSubscription = $ipagClient->subscription()->scheduleInstallmentPayment($subscriptionId, $invoiceNumber);
```

> Todos os exemplos: [examples/subscription/](./examples/subscription/)

# Transação (Transaction)

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

> Todos os exemplos: [examples/transaction/](./examples/transaction/)

# Token (Card Token)

```php
$token = new \Ipag\Sdk\Model\Token([
    'card' => [
        'holderName' => 'Bruce Wayne',
        'number' => '4111 1111 1111 1111',
        'expiryMonth' => '01',
        'expiryYear' => '2025',
        'cvv' => '123'
    ],
    'holder' => [
        'name' => 'Bruce Wayne',
        'cpfCnpj' => '490.558.550-30',
        'mobilePhone' => '(22) 2222-33333',
        'birthdate' => '1987-02-19',
        'address' => [
                'street' => 'Avenida Principal',
                'number' => '12345',
                'complement' => 'Sala 02',
                'district' => 'São Paulo',
                'city' => 'São Paulo',
                'state' => 'SP',
                'zipcode' => '01310-000'
            ]
    ]
]);
```
ou
```php
$token = (new \Ipag\Sdk\Model\Token())
    ->setCard(
        (new \Ipag\Sdk\Model\Card())
            ->setHolderName('Bruce Wayne')
            ->setNumber('4111 1111 1111 1111')
            ->setExpiryMonth('01')
            ->setExpiryYear('2025')
            ->setCvv('123')
    )
    ->setHolder(
        (new \Ipag\Sdk\Model\Holder())
            ->setName('Bruce Wayne')
            ->setCpfCnpj('490.558.550-30')
            ->setMobilePhone('(22) 2222-33333')
            ->setBirthdate('1987-02-19')
            ->setAddress(
                new \Ipag\Sdk\Model\Address()
                    ->setStreet('Avenida Principal')
            )
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

> Todos os exemplos: [examples/token/](./examples/token/)

# Cobrança (Charge)

```php
$charge = new \Ipag\Sdk\Model\Charge([
    'amount' => 100,
    'description' => 'Cobrança referente a negociação de débito pendente na Empresa X',
    'due_date' => '2020-10-30',
    'frequency' => 1,
    'interval' => Ipag\Sdk\Core\Enums\Interval::MONTH,
    'type' => 'charge',
    'last_charge_date' => '2020-10-30',
    'callback_url' => 'https://ipag-sdk.requestcatcher.com/callback',
    'auto_debit' => false,
    'installments' => 12,
    'is_active' => true,
    'products' => [1, 2, 3],
    'customer' => [
        'name' => 'Bruce Wayne',
    ],
    'checkout_settings' => [
        'max_installments' => 12,
    ]
]);
```
ou
```php
$charge = (new \Ipag\Sdk\Model\Charge())
    ->setAmount(100)
    ->setDescription('Cobrança referente a negociação de débito pendente na Empresa X')
    ->setDueDate('2020-10-30')
    ->setFrequency(1)
    ->setInterval(Ipag\Sdk\Core\Enums\Interval::MONTH)
    ->setType('charge')
    ->setLastChargeDate('2020-10-30')
    ->setCallbackUrl('https://ipag-sdk.requestcatcher.com/callback')
    ->setAutoDebit(false)
    ->setInstallments(12)
    ->setIsActive(true)
    ->setProducts([1, 2, 3])
    ->setCustomer(
        (new \Ipag\Sdk\Model\Customer())
            ->setName('Bruce Wayne')
    )
    ->setCheckoutSettings(
        (new \Ipag\Sdk\Model\CheckoutSettings())
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

> Todos os exemplos: [examples/charge/](./examples/charge/)

# Estabelecimento (Establishment)

```php
$establishment = new \Ipag\Sdk\Model\Establishment([
    'name' => 'Bruce Wayne',
    'email' => 'brucewayne@email.com',
    'login' => 'wayne1',
    'password' => 'bat123',
    'document' => '490.558.550-30',
    'phone' => '(22) 2222-33333',
    'address' =>
        [
            'street' => 'Avenida Principal',
        ],
    'owner' => [
        'name' => 'Bruce Wayne',
    ],
    'bank' => [
        'code' => '999'
    ]
]);
```
ou
```php
$establishment = (new \Ipag\Sdk\Model\Establishment())
    ->setName('Bruce Wayne')
    ->setEmail('brucewayne@email.com')
    ->setLogin('wayne1')
    ->setPassword('bat123')
    ->setPhone('(22) 2222-33333')
    ->setDocument('490.558.550-30')
    ->setAddress(new \Ipag\Sdk\Model\Address())
    ->setOwner(new \Ipag\Sdk\Model\Owner())
    ->setBank(new \Ipag\Sdk\Model\Bank());
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
    'credentials' =>
        (
            (new Ipag\Sdk\Support\Credentials\PaymentMethods\StoneCredentials())
                ->setStoneCode('xxxxx')
                ->setStoneSak('xxxxxx')
        )->jsonSerialize(),
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
        'provider' => (
            new Ipag\Sdk\Support\Provider\Antifraudes\RedShieldProvider([
                'token' => 'xxxxxxxx',
                'entityId' => 'xxxxxxxx',
                'channelId' => 'xxxxxxxx',
                'serviceId' => 'xxxxxxxx'
            ])
        )->jsonSerialize(),
        'settings' => [
            'enable' => true,
            'environment' => 'test',
            'consult_mode' => 'auto',
            'capture_on_approval' => false,
            'cancel_on_refused' => true,
            'review_score_threshold' => 0.8
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

> Todos os exemplos: [examples/establishment/](./examples/establishment/)

# Regra de Split (Split Rules)

```php
$splitRules = new \Ipag\Sdk\Model\SplitRules([
    'receiver_id' => '1000000',
    'percentage' => 10.00
]);
```
ou
```php
$splitRules = (new \Ipag\Sdk\Model\SplitRules())
    ->setReceiverId('1000000')
    ->setPercentage(10);
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

> Todos os exemplos: [examples/split_rules/](./examples/split_rules/)

# Vendedor (Seller)

```php
$seller = new \Ipag\Sdk\Model\Seller([
    'login' => 'jimgordon',
    'password' => 'jim123',
    'name' => 'Jim Gordon',
    'cpf_cnpj' => '168.853.290-02',
    'email' => 'jimgordon@email.com',
    'phone' => '(11) 3333-44444',
    'description' => '',
    'address' => [
        'street' => 'Avenida Principal',
        'number' => '12345',
        'district' => 'São Paulo',
        'city' => 'São Paulo',
        'state' => 'SP',
        'zipcode' => '01310-000'
    ],
    'owner' => [
        'name' => 'Bruce Wayne',
        'email' => 'brucewayne@email.com',
        'cpf' => '490.558.550-30',
        'phone' => '(22) 2222-33333',
        'birthdate' => '1987-02-19',
    ],
    'bank' => [
        'code' => '999',
        'agency' => '1234',
        'account' => '54321',
        'type' => 'checkings',
        'external_id' => '1',
    ]
]);
```
ou
```php
$seller = (new \Ipag\Sdk\Model\Seller())
    ->setLogin('jimgordon')
    ->setPassword('jim123')
    ->setName('Jim Gordon')
    ->setCpfCnpj('168.853.290-02')
    ->setEmail('jimgordon@email.com')
    ->setPhone('(11) 3333-44444')
    ->setDescription('')
    ->setAddress(
        (new \Ipag\Sdk\Model\Address())
            ->setStreet('Avenida Principal')
    )
    ->setOwner(
        (new \Ipag\Sdk\Model\Owner())
            ->setName('Bruce Wayne')
    )
    ->setBank(
        (new \Ipag\Sdk\Model\Bank())
            ->setCode('999')
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

> Todos os exemplos: [examples/seller/](./examples/seller/)

# Transferência (Transfer)

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

> Todos os exemplos: [examples/transfer/](./examples/transfer/)

# Link de Pagamento (Payment Links)

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
$paymentLink = (new \Ipag\Sdk\Model\PaymentLink())
    ->setExternalCode('131')
    ->setAmount(0)
    ->setDescription('LINK DE PAGAMENTO SUPER BACANA')
    ->setExpireAt('2020-12-30 23:00:00')
    ->setButtons(
        (new \Ipag\Sdk\Model\Buttons())
            ->setEnable(false)
    )
    ->setCheckoutSettings(
        (new \Ipag\Sdk\Model\CheckoutSettings())
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

> Todos os exemplos: [examples/payment_links/](./examples/payment_links/)

# Webhook

```php
$webhook = new \Ipag\Sdk\Model\Webhook([
    'http_method' => 'POST',
    'url' => 'https://ipag-sdk.requestcatcher.com/webhook',
    'description' => 'Webhook para receber notificações de atualização das transações',
    'actions' => [
        \Ipag\Sdk\Core\Enums\Webhooks::PAYMENT_LINK_PAYMENT_SUCCEEDED,
        \Ipag\Sdk\Core\Enums\Webhooks::PAYMENT_LINK_PAYMENT_FAILED,
    ]
]);
```
ou
```php
$webhook = (new \Ipag\Sdk\Model\Webhook())
    ->setHttpMethod('POST')
    ->setUrl('https://ipag-sdk.requestcatcher.com/webhook')
    ->setDescription('Webhook para receber notificações de atualização das transações')
    ->setActions([
        \Ipag\Sdk\Core\Enums\Webhooks::PAYMENT_LINK_PAYMENT_SUCCEEDED,
        \Ipag\Sdk\Core\Enums\Webhooks::PAYMENT_LINK_PAYMENT_FAILED,
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

> Todos os exemplos: [examples/webhook/](./examples/webhook/)

# Checkout

```php
$checkout = new \Ipag\Sdk\Model\Checkout([
    'customer' => [
        'name' => 'Bruce Wayne',
        'tax_receipt' => '490.558.550-30',
        'email' => 'brucewayne@email.com',
        'phone' => '(22) 2222-33333',
        'birthdate' => '1987-02-19',
        'address' => [
            'street' => 'Avenida Principal',
            'number' => '12345',
            'district' => 'São Paulo',
            'city' => 'São Paulo',
            'state' => 'SP',
            'zipcode' => '01310-000'
        ]
    ],
    'installment_setting' => [
        'max_installments' => 12,
        'min_installment_value' => 5,
        'interest' => 0,
        'interest_free_installments' => 12
    ],
    'order' => [
        'order_id' => '100001',
        'amount' => '15.00',
        'return_url' => 'https://ipag-sdk.requestcatcher.com/callback',
        'return_type' => 'json'
    ],
    'products' => [
        [
            'name' => 'Smart TV LG 55 4K UHD',
            'unit_price' => 5000,
            'quantity' => 1,
            'sku' => 'LG123',
            'description' => 'Experiência cristalina em 4K.'
        ],
        [
            'name' => 'LED Android TV 4K UHD LED',
            'unit_price' => 5000,
            'quantity' => 1,
            'sku' => 'SAM123',
            'description' => 'Android TV de 126 cm (50).'
        ],
    ],
    'split_rules' => [
        [
            'receiver' => 'qwertyuiopasdfghjklzxcvbnm123456',
            'percentage' => '50',
            'charge_processing_fee' => true,
        ],
        [
            'receiver' => '654321mnbvcxzlkjhgfdsapoiuytrewq',
            'percentage' => '20'
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
        (new \Ipag\Sdk\Model\Customer())
            ->setName('Bruce Wayne')
    )
    ->setInstallmentSetting(
        (new \Ipag\Sdk\Model\InstallmentSetting())
            ->setMaxInstallments(12)
    )
    ->setOrder(
        (new \Ipag\Sdk\Model\Order())
            ->setOrderId('1000001')
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
        (new \Ipag\Sdk\Model\SplitRules())
            ->setReceiverId('1000000')
    )
    ->addSplitRule(
        (new \Ipag\Sdk\Model\SplitRules())
            ->setReceiverId('1000001')
    )
    ->setSellerId('100014')
    ->setExpiresIn(60);
```

### Novo Checkout

```php
$responseCheckout = $ipagClient->checkout()->create($checkout);
```

> Todos os exemplos: [examples/checkout/](./examples/checkout/)

# Voucher

```php
$voucher = new \Ipag\Sdk\Model\Voucher([
    'order' => [
        'order_id' => '100015',
        'amount' => 100,
        'created_at' => '2020-08-04 21:45:10',
        'callback_url' => 'https://ipag-sdk.requestcatcher.com/callback'
    ],
    'seller' => [
        'cpf_cnpj' => '168.853.290-02',
    ],
    'customer' => [
        'name' => 'Jim Gordon',
        'cpf_cnpj' => '168.853.290-02',
        'email' => 'jimgordon@email.com',
        'phone' => '(11) 3333-44444',
        'birthdate' => '1990-10-10',
        'address' => [
            'street' => 'Avenida Principal',
            'number' => '12345',
            'district' => 'São Paulo',
            'city' => 'São Paulo',
            'state' => 'SP',
            'zipcode' => '01310-000'
        ]
    ]
]);
```
ou
```php
$voucher = (new \Ipag\Sdk\Model\Voucher())
    ->setOrder(
        (new \Ipag\Sdk\Model\Order())
            ->setOrderId(
                '1000001'
            )
    )
    ->setSeller(
        (new \Ipag\Sdk\Model\Seller())
            ->setCpfCnpj(
                '168.853.290-02'
            )
    )
    ->setCustomer(
        (new \Ipag\Sdk\Model\Customer())
            ->setName(
                'Jim Gordon'
            )
            ->setAddress(
                (new \Ipag\Sdk\Model\Address())
                    ->setStreet('Avenida Principal')
            )
    );
```

### Novo Voucher

```php
$responseVoucher = $ipagClient->voucher()->create($voucher);
```

> Todos os exemplos: [examples/voucher/](./examples/voucher/)

## Testes

É necessário a instalação do PHPUnit para a realização dos testes.

## Licença

[The MIT License](https://github.com/ipagdevs/ipag-sdk-php/blob/master/LICENSE)

## Documentação

[Documentação Oficial](https://developers.ipag.com.br)

## Dúvidas & Sugestões

Em caso de dúvida ou sugestão para o SDK abra uma nova [Issue](https://github.com/ipagdevs/ipag-sdk-php/issues).
