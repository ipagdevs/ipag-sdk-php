# iPag PHP client SDK
> A ferramenta certa para uma rápida e segura integração com o iPag e a sua aplicação PHP

**Índice**

- [iPag PHP client SDK](#ipag-php-client-sdk)
    + [Dependências](#dependências)
    + [Instalação](#instalação)
- [Cliente (Customer)](#cliente-customer)
    + [Dados do cliente](#dados-do-cliente)
- [IpagClient](#ipag-client) 
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

# Cliente (Customer)

> Exemplo completo: [exemplos/customer/usage.php](./examples/customer/usage.php)

### Dados do cliente
```php
$customer = new Ipag\Sdk\Model\Customer([
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

```php
$customer = new Ipag\Sdk\Model\Customer();

$customer->setName('Maria da Silva');
$customer->setEmail('mariadasilva@email.com');
$customer->setCpfCnpj('799.993.388-01');
$customer->setPhone('(11) 98888-3333');
$customer->setBusinessName('Maria Ltda.');

$address = new Ipag\Sdk\Model\Address();

$address->setStreet('Avenida Paulista');
$address->setNumber('01');
$address->setDistrict('São Paulo');
$address->setCity('São Paulo');
$address->setState('SP');
$address->setZipcode('01310-930');

$customer->setAddress($address);

```

## Testes

É necessário a instalação do PHPUnit para a realização dos testes.

## Licença
[The MIT License](https://github.com/ipagdevs/ipag-sdk-php/blob/master/LICENSE)

## Documentação

[Documentação Oficial](https://developers.ipag.com.br)

## Dúvidas & Sugestões

Em caso de dúvida ou sugestão para o SDK abra uma nova [Issue](https://github.com/ipagdevs/ipag-sdk-php/issues).