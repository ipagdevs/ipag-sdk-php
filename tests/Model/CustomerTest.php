<?php

namespace Ipag\Sdk\Tests\Model;

use Ipag\Sdk\Model\Address;
use Ipag\Sdk\Model\Customer;
use Ipag\Sdk\Model\Schema\Exception\MutatorAttributeException;
use PHPUnit\Framework\TestCase;


class CustomerTest extends TestCase
{
    public function testCreateAndSetCustomerConstruct()
    {
        $customer = new Customer([
            'name' => 'Lívia Julia Eduarda Barros',
            'email' => 'livia.julia.barros@eximiart.com.br',
            'cpf_cnpj' => '074.598.263-83',
            'phone' => '(98) 3792-4834',
            'business_name' => 'Lívia Ltda.',
            'is_active' => true,
        ]);

        $this->assertEquals($customer->getName(), 'Lívia Julia Eduarda Barros');
        $this->assertEquals($customer->getEmail(), 'livia.julia.barros@eximiart.com.br');
        $this->assertEquals($customer->getCpfCnpj(), '07459826383');
        $this->assertEquals($customer->getPhone(), '9837924834');
        $this->assertEquals($customer->getIsActive(), true);
        $this->assertEquals($customer->getBusinessName(), 'Lívia Ltda.');

    }

    public function testCreateAndSetCustomer()
    {
        $customer = new Customer();
        $customer->setName('Lívia Julia Eduarda Barros');
        $customer->setEmail('livia.julia.barros@eximiart.com.br');
        $customer->setCpfCnpj('074.598.263-83');
        $customer->setPhone('(98) 3792-4834');
        $customer->setIsActive(true);
        $customer->setBusinessName('Lívia Ltda.');

        $customer->setAddress(new Address);

        $this->assertEquals($customer->getName(), 'Lívia Julia Eduarda Barros');
        $this->assertEquals($customer->getEmail(), 'livia.julia.barros@eximiart.com.br');
        $this->assertEquals($customer->getCpfCnpj(), '07459826383');
        $this->assertEquals($customer->getPhone(), '9837924834');
        $this->assertEquals($customer->getIsActive(), true);
        $this->assertEquals($customer->getBusinessName(), 'Lívia Ltda.');

        $this->assertInstanceOf(Address::class, $customer->getAddress());

    }

    public function testCreateCustomerEmpty()
    {
        $customer = new Customer();

        $this->assertEmpty($customer->getName());
        $this->assertEmpty($customer->getEmail());
        $this->assertEmpty($customer->getCpfCnpj());
        $this->assertEmpty($customer->getPhone());
        $this->assertEmpty($customer->getBusinessName());
        $this->assertEmpty($customer->getIsActive());

        $this->assertEmpty($customer->getAddress());

    }

    public function testCreateAndSetEmptyCustomerAttrsCustomer()
    {
        $customer = new Customer([
            'name' => 'Lívia Julia Eduarda Barros',
            'email' => 'livia.julia.barros@eximiart.com.br',
            'cpf_cnpj' => '074.598.263-83',
            'phone' => '(98) 3792-4834',
            'business_name' => 'Lívia Ltda.',
            'address' => [
                'street' => 'Rua Agenor Vieira',
                'number' => 768,
                'district' => 'São Francisco',
                'city' => 'São Luís',
                'state' => 'MA',
                'zipcode' => '65076-020'
            ]
        ]);

        $customer->setEmail(null);
        $customer->setCpfCnpj(null);
        $customer->setPhone(null);
        $customer->setBusinessName(null);
        $customer->setIsActive(null);

        $this->assertEmpty($customer->getEmail());
        $this->assertEmpty($customer->getCpfCnpj());
        $this->assertEmpty($customer->getPhone());
        $this->assertEmpty($customer->getBusinessName());
        $this->assertEmpty($customer->getIsActive());

    }

    public function testItInvalidEmailCustomer()
    {
        $customer = new Customer();

        $this->expectException(MutatorAttributeException::class);

        $customer->setEmail('livia.julia.barros');
    }

    public function testItInvalidPhoneCustomer()
    {
        $customer = new Customer();

        $this->expectException(MutatorAttributeException::class);

        $customer->setPhone('111');
    }

    public function testItInvalidCpfCnpjCustomer()
    {
        $customer = new Customer();

        $this->expectException(MutatorAttributeException::class);

        $customer->setCpfCnpj('074.598.263-80');
    }

}