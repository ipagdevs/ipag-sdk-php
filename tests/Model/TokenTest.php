<?php

namespace Ipag\Sdk\Tests\Model;

use Ipag\Sdk\Model\Schema\Exception\MutatorAttributeException;
use PHPUnit\Framework\TestCase;

class TokenTest extends TestCase
{
    public function testShouldCreateTokenObjectWithConstructorSuccessfully()
    {
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

        $this->assertInstanceOf(\Ipag\Sdk\Model\Card::class, $token->getCard());

        $this->assertInstanceOf(\Ipag\Sdk\Model\Holder::class, $token->getHolder());

        $this->assertInstanceOf(\Ipag\Sdk\Model\Address::class, $token->getHolder()->getAddress());

    }

    public function testShouldCreateTokenObjectAndSetTheValuesSuccessfully()
    {
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

        $this->assertInstanceOf(\Ipag\Sdk\Model\Card::class, $token->getCard());

        $this->assertInstanceOf(\Ipag\Sdk\Model\Holder::class, $token->getHolder());

        $this->assertInstanceOf(\Ipag\Sdk\Model\Address::class, $token->getHolder()->getAddress());

    }

    public function testShouldCreateEmptyTokenObjectSuccessfully()
    {
        $token = new \Ipag\Sdk\Model\Token;

        $this->assertEmpty($token->getCard());

        $this->assertEmpty($token->getHolder());

    }

    public function testCreateAndSetEmptyPropertiesTokenObjectSuccessfully()
    {
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

        $token
            ->setCard(null)
            ->setHolder(null);

        $this->assertEmpty($token->getCard());

        $this->assertEmpty($token->getHolder());

    }

    public function testShouldThrowAValidationExceptionOnTheTokenValidatedAtProperty()
    {
        $token = new \Ipag\Sdk\Model\Token;

        $this->expectException(MutatorAttributeException::class);

        $token->setValidatedAt('10/07/2021');

    }

    public function testShouldThrowAValidationExceptionOnTheTokenExpiresAtProperty()
    {
        $token = new \Ipag\Sdk\Model\Token;

        $this->expectException(MutatorAttributeException::class);

        $token->setExpiresAt('10/07/2021');

    }

}