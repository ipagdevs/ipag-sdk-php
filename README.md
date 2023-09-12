# iPag PHP client SDK
> A ferramenta certa para uma rápida e segura integração com o iPag e a sua aplicação PHP

**Índice**

- [iPag PHP client SDK](#ipag-php-client-sdk)
    + [Dependências](#dependências)
    + [Instalação](#instalação)
- [IpagClient](#ipag-client)
    + [Autenticação](#autenticação)
- [Cliente (Customer)](#cliente-customer)
    + [Dados do cliente](#dados-do-cliente)
    + [Novo Cliente](#novo-cliente)
    + [Alterar Cliente](#alterar-cliente)
    + [Obter Cliente](#obter-cliente)
    + [Listar Clientes](#listar-clientes)
    + [Deletar Cliente](#deletar-cliente)
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

# Cliente (Customer)

> Exemplo completo: [exemplos/customer/usage.php](./examples/customer/usage.php)

### Dados do cliente
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
$responseCustomer = $ipagClient->customer()->update($customer, 100001);
```

### Obter Cliente
```php
$responseCustomer = $ipagClient->customer()->get(100003);
```

### Listar Clientes
```php
$responseCustomer = $ipagClient->customer()->list([
    'name' => 'maria'
]);
```

### Deletar Cliente
```php
$ok = $ipagClient->customer()->delete(100001);
```

# Plano de Assinatura (Subscription Plan)

> Exemplo completo: [exemplos/customer/usage.php](./examples/subscription_plan/usage.php)

### Dados do Plano de Assinatura
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
$responseSubscriptionPlan = $ipagClient->subscriptionPlan()->update($subscriptionPlan, 1);
```

### Obter Plano de Assinatura
```php
$responseSubscriptionPlan = $ipagClient->subscriptionPlan()->get(13);
```

### Listar Planos de Assinatura
```php
$responseSubscriptionPlan = $ipagClient->subscriptionPlan()->list([
    'name' => 'PLANO SILVER',
]);
```

### Deletar Plano de Assinatura
```php
$ipagClient->subscriptionPlan()->delete(1);
```

## Testes

É necessário a instalação do PHPUnit para a realização dos testes.

## Licença
[The MIT License](https://github.com/ipagdevs/ipag-sdk-php/blob/master/LICENSE)

## Documentação

[Documentação Oficial](https://developers.ipag.com.br)

## Dúvidas & Sugestões

Em caso de dúvida ou sugestão para o SDK abra uma nova [Issue](https://github.com/ipagdevs/ipag-sdk-php/issues).