<?php

namespace Ipag\Sdk\Tests\Model;

use Ipag\Sdk\Model\Schema\Exception\MutatorAttributeException;
use PHPUnit\Framework\TestCase;

class SellerTest extends TestCase
{
    public function testShouldCreateSellerObjectWithConstructorSuccessfully()
    {
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

        $this->assertEquals("josefrancisco", $seller->getLogin());
        $this->assertEquals("123123", $seller->getPassword());
        $this->assertEquals("José Francisco Silva", $seller->getName());
        $this->assertEquals("85450844042", $seller->getCpfCnpj());
        $this->assertEquals("jose@mail.me", $seller->getEmail());
        $this->assertEquals("11987121234", $seller->getPhone());
        $this->assertEquals("XXXXXXXXXXXXXX", $seller->getDescription());

        $this->assertInstanceOf(\Ipag\Sdk\Model\Address::class, $seller->getAddress());
        $this->assertEquals("Rua Júlio Gonzalez", $seller->getAddress()->getStreet());

        $this->assertInstanceOf(\Ipag\Sdk\Model\Owner::class, $seller->getOwner());
        $this->assertEquals("Giosepe", $seller->getOwner()->getName());

        $this->assertInstanceOf(\Ipag\Sdk\Model\Bank::class, $seller->getBank());
        $this->assertEquals("290", $seller->getBank()->getCode());

    }

    public function testShouldCreateSellerObjectAndSetTheValuesSuccessfully()
    {
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

        $this->assertEquals("josefrancisco", $seller->getLogin());
        $this->assertEquals("123123", $seller->getPassword());
        $this->assertEquals("José Francisco Silva", $seller->getName());
        $this->assertEquals("85450844042", $seller->getCpfCnpj());
        $this->assertEquals("jose@mail.me", $seller->getEmail());
        $this->assertEquals("11987121234", $seller->getPhone());
        $this->assertEquals("XXXXXXXXXXXXXX", $seller->getDescription());

        $this->assertInstanceOf(\Ipag\Sdk\Model\Address::class, $seller->getAddress());
        $this->assertEquals("Rua Jálio Gonzalez", $seller->getAddress()->getStreet());

        $this->assertInstanceOf(\Ipag\Sdk\Model\Owner::class, $seller->getOwner());
        $this->assertEquals("Giosepe", $seller->getOwner()->getName());

        $this->assertInstanceOf(\Ipag\Sdk\Model\Bank::class, $seller->getBank());
        $this->assertEquals("290", $seller->getBank()->getCode());

    }

    public function testShouldCreateEmptySellerObjectSuccessfully()
    {
        $seller = new \Ipag\Sdk\Model\Seller;

        $this->assertEmpty($seller->getLogin());
        $this->assertEmpty($seller->getPassword());
        $this->assertEmpty($seller->getName());
        $this->assertEmpty($seller->getCpfCnpj());
        $this->assertEmpty($seller->getEmail());
        $this->assertEmpty($seller->getPhone());
        $this->assertEmpty($seller->getDescription());

        $this->assertEmpty($seller->getAddress());
        $this->assertEmpty($seller->getOwner());
        $this->assertEmpty($seller->getBank());


    }

    public function testCreateAndSetEmptyPropertiesSellerObjectSuccessfully()
    {
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

        $seller
            ->setLogin(null)
            ->setPassword(null)
            ->setName(null)
            ->setCpfCnpj(null)
            ->setEmail(null)
            ->setPhone(null)
            ->setDescription(null)
            ->setAddress(null)
            ->setOwner(null)
            ->setBank(null);

        $this->assertEmpty($seller->getLogin());
        $this->assertEmpty($seller->getPassword());
        $this->assertEmpty($seller->getName());
        $this->assertEmpty($seller->getCpfCnpj());
        $this->assertEmpty($seller->getEmail());
        $this->assertEmpty($seller->getPhone());
        $this->assertEmpty($seller->getDescription());

        $this->assertEmpty($seller->getAddress());
        $this->assertEmpty($seller->getOwner());
        $this->assertEmpty($seller->getBank());

    }

    public function testShouldThrowAValidationExceptionOnTheSellerCpfCnpjProperty()
    {
        $seller = new \Ipag\Sdk\Model\Seller();

        $this->expectException(MutatorAttributeException::class);

        $seller->setCpfCnpj('074.598.263-80');
    }

    public function testShouldThrowAValidationExceptionOnTheSellerEmailProperty()
    {
        $seller = new \Ipag\Sdk\Model\Seller();

        $this->expectException(MutatorAttributeException::class);

        $seller->setEmail('livia.julia.barros');
    }

    public function testShouldThrowAValidationExceptionOnTheSellerPhoneProperty()
    {
        $seller = new \Ipag\Sdk\Model\Seller();

        $this->expectException(MutatorAttributeException::class);

        $seller->setPhone('111');
    }

    public function testShouldThrowAValidationExceptionOnTheSellerBirthdateProperty()
    {
        $seller = new \Ipag\Sdk\Model\Seller();

        $this->expectException(MutatorAttributeException::class);

        $seller->setBirthdate('10/07/2021');

    }

}