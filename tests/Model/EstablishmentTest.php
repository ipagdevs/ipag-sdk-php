<?php

namespace Ipag\Sdk\Tests\Model;

use Ipag\Sdk\Model\Schema\Exception\MutatorAttributeException;
use PHPUnit\Framework\TestCase;

class EstablishmentTest extends TestCase
{
    public function testShouldCreateEstablishmentObjectWithConstructorSuccessfully()
    {
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

        $this->assertEquals('Lívia Julia Eduarda Barros', $establishment->getName());
        $this->assertEquals('livia.julia.barros@eximiart.com.br', $establishment->getEmail());
        $this->assertEquals('livia', $establishment->getLogin());
        $this->assertEquals('livia123', $establishment->getPassword());
        $this->assertEquals('9837924834', $establishment->getPhone());
        $this->assertEquals('07459826383', $establishment->getDocument());

        $this->assertInstanceOf(\Ipag\Sdk\Model\Address::class, $establishment->getAddress());
        $this->assertInstanceOf(\Ipag\Sdk\Model\Owner::class, $establishment->getOwner());
        $this->assertInstanceOf(\Ipag\Sdk\Model\Bank::class, $establishment->getBank());

    }

    public function testShouldCreateEstablishmentObjectAndSetTheValuesSuccessfully()
    {
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

        $this->assertEquals('Lívia Julia Eduarda Barros', $establishment->getName());
        $this->assertEquals('livia.julia.barros@eximiart.com.br', $establishment->getEmail());
        $this->assertEquals('livia', $establishment->getLogin());
        $this->assertEquals('livia123', $establishment->getPassword());
        $this->assertEquals('9837924834', $establishment->getPhone());
        $this->assertEquals('07459826383', $establishment->getDocument());

        $this->assertInstanceOf(\Ipag\Sdk\Model\Address::class, $establishment->getAddress());
        $this->assertInstanceOf(\Ipag\Sdk\Model\Owner::class, $establishment->getOwner());
        $this->assertInstanceOf(\Ipag\Sdk\Model\Bank::class, $establishment->getBank());

    }

    public function testShouldCreateEmptyEstablishmentObjectSuccessfully()
    {
        $establishment = new \Ipag\Sdk\Model\Establishment;

        $this->assertEmpty($establishment->getName());
        $this->assertEmpty($establishment->getEmail());
        $this->assertEmpty($establishment->getLogin());
        $this->assertEmpty($establishment->getPassword());
        $this->assertEmpty($establishment->getPhone());
        $this->assertEmpty($establishment->getDocument());

        $this->assertEmpty($establishment->getAddress());
        $this->assertEmpty($establishment->getOwner());
        $this->assertEmpty($establishment->getBank());

    }

    public function testCreateAndSetEmptyPropertiesEstablishmentObjectSuccessfully()
    {
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

        $establishment
            ->setName(null)
            ->setEmail(null)
            ->setLogin(null)
            ->setPassword(null)
            ->setPhone(null)
            ->setDocument(null)
            ->setAddress(null)
            ->setOwner(null)
            ->setBank(null);

        $this->assertEmpty($establishment->getName());
        $this->assertEmpty($establishment->getEmail());
        $this->assertEmpty($establishment->getLogin());
        $this->assertEmpty($establishment->getPassword());
        $this->assertEmpty($establishment->getPhone());
        $this->assertEmpty($establishment->getDocument());

        $this->assertEmpty($establishment->getAddress());
        $this->assertEmpty($establishment->getOwner());
        $this->assertEmpty($establishment->getBank());

    }

    public function testShouldThrowAValidationExceptionOnTheEstablishmentEmailProperty()
    {
        $establishment = new \Ipag\Sdk\Model\Establishment;

        $this->expectException(MutatorAttributeException::class);

        $establishment->setEmail('livia.julia.barros');
    }

    public function testShouldThrowAValidationExceptionOnTheEstablishmentDocumentProperty()
    {
        $establishment = new \Ipag\Sdk\Model\Establishment;

        $this->expectException(MutatorAttributeException::class);

        $establishment->setDocument('074.598.263-80');
    }

    public function testShouldThrowAValidationExceptionOnTheEstablishmentPhoneProperty()
    {
        $establishment = new \Ipag\Sdk\Model\Establishment;

        $this->expectException(MutatorAttributeException::class);

        $establishment->setPhone('111');
    }

}