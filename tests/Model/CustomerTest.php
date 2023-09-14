<?php

namespace Ipag\Sdk\Tests\Model;

use Ipag\Sdk\Model\Schema\Exception\MutatorAttributeException;
use PHPUnit\Framework\TestCase;


class CustomerTest extends TestCase
{
    public function testShouldCreateCustomerObjectWithConstructorSuccessfully()
    {
        $customer = new \Ipag\Sdk\Model\Customer([
            'name' => 'Lívia Julia Eduarda Barros',
            'email' => 'livia.julia.barros@eximiart.com.br',
            'cpf_cnpj' => '074.598.263-83',
            'phone' => '(98) 3792-4834',
            'business_name' => 'Lívia Ltda.',
            'is_active' => true,
            'address' =>
            [
                'street' => 'Rua A',
            ]
        ]);

        $this->assertEquals($customer->getName(), 'Lívia Julia Eduarda Barros');
        $this->assertEquals($customer->getEmail(), 'livia.julia.barros@eximiart.com.br');
        $this->assertEquals($customer->getCpfCnpj(), '07459826383');
        $this->assertEquals($customer->getPhone(), '9837924834');
        $this->assertEquals($customer->getIsActive(), true);
        $this->assertEquals($customer->getBusinessName(), 'Lívia Ltda.');

        $this->assertInstanceOf(\Ipag\Sdk\Model\Address::class, $customer->getAddress());

        $this->assertEquals($customer->getAddress()->getStreet(), 'Rua A');

    }

    public function testShouldCreateCustomerObjectAndSetTheValuesSuccessfully()
    {
        $customer = (new \Ipag\Sdk\Model\Customer())
            ->setName('Lívia Julia Eduarda Barros')
            ->setEmail('livia.julia.barros@eximiart.com.br')
            ->setCpfCnpj('074.598.263-83')
            ->setPhone('(98) 3792-4834')
            ->setIsActive(true)
            ->setBusinessName('Lívia Ltda.')
            ->setAddress(new \Ipag\Sdk\Model\Address);

        $this->assertEquals($customer->getName(), 'Lívia Julia Eduarda Barros');
        $this->assertEquals($customer->getEmail(), 'livia.julia.barros@eximiart.com.br');
        $this->assertEquals($customer->getCpfCnpj(), '07459826383');
        $this->assertEquals($customer->getPhone(), '9837924834');
        $this->assertEquals($customer->getIsActive(), true);
        $this->assertEquals($customer->getBusinessName(), 'Lívia Ltda.');

        $this->assertInstanceOf(\Ipag\Sdk\Model\Address::class, $customer->getAddress());

    }

    public function testShouldCreateEmptyCustomerObjectSuccessfully()
    {
        $customer = new \Ipag\Sdk\Model\Customer;

        $this->assertEmpty($customer->getName());
        $this->assertEmpty($customer->getEmail());
        $this->assertEmpty($customer->getCpfCnpj());
        $this->assertEmpty($customer->getPhone());
        $this->assertEmpty($customer->getBusinessName());
        $this->assertEmpty($customer->getIsActive());
        $this->assertEmpty($customer->getAddress());

    }

    public function testCreateAndSetEmptyPropertiesCustomerObjectSuccessfully()
    {
        $customer = new \Ipag\Sdk\Model\Customer([
            'name' => 'Lívia Julia Eduarda Barros',
            'email' => 'livia.julia.barros@eximiart.com.br',
            'cpf_cnpj' => '074.598.263-83',
            'phone' => '(98) 3792-4834',
            'business_name' => 'Lívia Ltda.',
            'is_active' => true,
            'address' =>
            [
                'street' => 'Rua A',
            ]
        ]);

        $customer
            ->setName(null)
            ->setEmail(null)
            ->setCpfCnpj(null)
            ->setPhone(null)
            ->setIsActive(null)
            ->setBusinessName(null)
            ->setAddress(null);

        $this->assertEmpty($customer->getEmail());
        $this->assertEmpty($customer->getCpfCnpj());
        $this->assertEmpty($customer->getPhone());
        $this->assertEmpty($customer->getBusinessName());
        $this->assertEmpty($customer->getIsActive());

        $this->assertEmpty($customer->getAddress());

    }

    public function testShouldThrowAValidationExceptionOnTheCustomerEmailProperty()
    {
        $customer = new \Ipag\Sdk\Model\Customer();

        $this->expectException(MutatorAttributeException::class);

        $customer->setEmail('livia.julia.barros');
    }

    public function testShouldThrowAValidationExceptionOnTheCustomerPhoneProperty()
    {
        $customer = new \Ipag\Sdk\Model\Customer();

        $this->expectException(MutatorAttributeException::class);

        $customer->setPhone('111');
    }

    public function testShouldThrowAValidationExceptionOnTheCustomerCnpjCpfProperty()
    {
        $customer = new \Ipag\Sdk\Model\Customer();

        $this->expectException(MutatorAttributeException::class);

        $customer->setCpfCnpj('074.598.263-80');
    }

    public function testShouldThrowAValidationExceptionOnTheCustomerBirthdateProperty()
    {
        $customer = new \Ipag\Sdk\Model\Customer();

        $this->expectException(MutatorAttributeException::class);

        $customer->setBirthdate('10/07/2021');

    }

}