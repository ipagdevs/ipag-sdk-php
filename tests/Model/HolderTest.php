<?php

namespace Ipag\Sdk\Tests\Model;

use Ipag\Sdk\Model\Schema\Exception\MutatorAttributeException;
use PHPUnit\Framework\TestCase;

class HolderTest extends TestCase
{
    public function testShouldCreateHolderObjectWithConstructorSuccessfully()
    {
        $holder = new \Ipag\Sdk\Model\Holder([
            'name' => 'Frederic Sales',
            'cpfCnpj' => '79999338801',
            'mobilePhone' => '1899767866',
            'birthdate' => '1989-03-28',
            'address' => [
                'street' => 'Rua A',
            ]
        ]);

        $this->assertEquals($holder->getName(), 'Frederic Sales');
        $this->assertEquals($holder->getCpfCnpj(), '79999338801');
        $this->assertEquals($holder->getMobilePhone(), '1899767866');
        $this->assertEquals($holder->getBirthdate(), '1989-03-28');

        $this->assertInstanceOf(\Ipag\Sdk\Model\Address::class, $holder->getAddress());

        $this->assertEquals($holder->getAddress()->getStreet(), 'Rua A');

    }

    public function testShouldCreateHolderObjectAndSetTheValuesSuccessfully()
    {
        $holder = (new \Ipag\Sdk\Model\Holder)
            ->setName('Frederic Sales')
            ->setCpfCnpj('79999338801')
            ->setMobilePhone('1899767866')
            ->setBirthdate('1989-03-28')
            ->setAddress(new \Ipag\Sdk\Model\Address);

        $this->assertEquals($holder->getName(), 'Frederic Sales');
        $this->assertEquals($holder->getCpfCnpj(), '79999338801');
        $this->assertEquals($holder->getMobilePhone(), '1899767866');
        $this->assertEquals($holder->getBirthdate(), '1989-03-28');

        $this->assertInstanceOf(\Ipag\Sdk\Model\Address::class, $holder->getAddress());

    }

    public function testShouldCreateEmptyHolderObjectSuccessfully()
    {
        $holder = new \Ipag\Sdk\Model\Holder;

        $this->assertEmpty($holder->getName());
        $this->assertEmpty($holder->getCpfCnpj());
        $this->assertEmpty($holder->getMobilePhone());
        $this->assertEmpty($holder->getBirthdate());
        $this->assertEmpty($holder->getAddress());

    }

    public function testCreateAndSetEmptyPropertiesHolderObjectSuccessfully()
    {
        $holder = new \Ipag\Sdk\Model\Holder([
            'name' => 'Frederic Sales',
            'cpfCnpj' => '79999338801',
            'mobilePhone' => '1899767866',
            'birthdate' => '1989-03-28',
            'address' => [
                'street' => 'Rua A',
            ]
        ]);

        $holder
            ->setName(null)
            ->setCpfCnpj(null)
            ->setMobilePhone(null)
            ->setBirthdate(null)
            ->setAddress(null);

        $this->assertEmpty($holder->getName());
        $this->assertEmpty($holder->getCpfCnpj());
        $this->assertEmpty($holder->getMobilePhone());
        $this->assertEmpty($holder->getBirthdate());
        $this->assertEmpty($holder->getAddress());

    }

    public function testShouldThrowAValidationExceptionOnTheHolderCpfCnpjProperty()
    {
        $holder = new \Ipag\Sdk\Model\Holder;

        $this->expectException(MutatorAttributeException::class);

        $holder->setCpfCnpj('074.598.263-80');
    }

    public function testShouldThrowAValidationExceptionOnTheHolderPhoneProperty()
    {
        $holder = new \Ipag\Sdk\Model\Holder;

        $this->expectException(MutatorAttributeException::class);

        $holder->setMobilePhone('111');
    }

    public function testShouldThrowAValidationExceptionOnTheHolderBirthdateProperty()
    {
        $holder = new \Ipag\Sdk\Model\Holder;

        $this->expectException(MutatorAttributeException::class);

        $holder->setBirthdate('10/07/2021');

    }

}