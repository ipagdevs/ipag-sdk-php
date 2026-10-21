<?php

namespace Ipag\Sdk\Tests\Model;

use PHPUnit\Framework\TestCase;
use Ipag\Sdk\Model\Schema\Exception\MutatorAttributeException;

class CustomerTest extends TestCase
{
    public function testShouldCreateCustomerObjectWithConstructorSuccessfully()
    {
        $customer = new \Ipag\Sdk\Model\Customer([
            'id' => '123',
            'uuid' => 'abc123',
            'tax_receipt' => '074.598.263-83',
            'tax_id' => '123456789',
            'birthdate' => '1980-01-01',
            'ip' => '10.0.0.1',
            'name' => 'Lívia Julia Eduarda Barros',
            'email' => 'livia.julia.barros@eximiart.com.br',
            'cpf_cnpj' => '074.598.263-83',
            'phone' => '(98) 3792-4834',
            'business_name' => 'Lívia Ltda.',
            'is_active' => true,
            'address' =>
                [
                    'street' => 'Rua A',
                ],
            'billing_address' =>
                [
                    'street' => 'Rua A',
                ],
            'shipping_address' =>
                [
                    'street' => 'Rua A',
                ],
        ]);


        $this->assertEquals($customer->getId(), '123');
        $this->assertEquals($customer->getUuid(), 'abc123');
        $this->assertEquals($customer->getTaxReceipt(), '07459826383');
        $this->assertEquals($customer->getTaxId(), '123456789');
        $this->assertEquals($customer->getBirthdate(), '1980-01-01');
        $this->assertEquals($customer->getIp(), '10.0.0.1');

        $this->assertEquals($customer->getName(), 'Lívia Julia Eduarda Barros');
        $this->assertEquals($customer->getEmail(), 'livia.julia.barros@eximiart.com.br');
        $this->assertEquals($customer->getCpfCnpj(), '07459826383');
        $this->assertEquals($customer->getPhone(), '9837924834');
        $this->assertEquals($customer->getIsActive(), true);
        $this->assertEquals($customer->getBusinessName(), 'Lívia Ltda.');

        $this->assertInstanceOf(\Ipag\Sdk\Model\Address::class, $customer->getAddress());
        $this->assertEquals($customer->getAddress()->getStreet(), 'Rua A');

        $this->assertInstanceOf(\Ipag\Sdk\Model\Address::class, $customer->getBillingAddress());
        $this->assertEquals($customer->getBillingAddress()->getStreet(), 'Rua A');

        $this->assertInstanceOf(\Ipag\Sdk\Model\Address::class, $customer->getShippingAddress());
        $this->assertEquals($customer->getShippingAddress()->getStreet(), 'Rua A');

    }

    public function testShouldCreateCustomerObjectAndSetTheValuesSuccessfully()
    {
        $customer = (new \Ipag\Sdk\Model\Customer())
            ->setId('123')
            ->setUuid('abc123')
            ->setTaxReceipt('074.598.263-83')
            ->setTaxId('123456789')
            ->setBirthdate('1980-01-01')
            ->setIp('10.0.0.1')
            ->setName('Lívia Julia Eduarda Barros')
            ->setEmail('livia.julia.barros@eximiart.com.br')
            ->setCpfCnpj('074.598.263-83')
            ->setPhone('(98) 3792-4834')
            ->setIsActive(true)
            ->setBusinessName('Lívia Ltda.')
            ->setAddress(new \Ipag\Sdk\Model\Address())
            ->setBillingAddress(new \Ipag\Sdk\Model\Address())
            ->setShippingAddress(new \Ipag\Sdk\Model\Address());

        $this->assertEquals($customer->getId(), '123');
        $this->assertEquals($customer->getUuid(), 'abc123');
        $this->assertEquals($customer->getTaxReceipt(), '07459826383');
        $this->assertEquals($customer->getTaxId(), '123456789');
        $this->assertEquals($customer->getBirthdate(), '1980-01-01');
        $this->assertEquals($customer->getIp(), '10.0.0.1');

        $this->assertEquals($customer->getName(), 'Lívia Julia Eduarda Barros');
        $this->assertEquals($customer->getEmail(), 'livia.julia.barros@eximiart.com.br');
        $this->assertEquals($customer->getCpfCnpj(), '07459826383');
        $this->assertEquals($customer->getPhone(), '9837924834');
        $this->assertEquals($customer->getIsActive(), true);
        $this->assertEquals($customer->getBusinessName(), 'Lívia Ltda.');

        $this->assertInstanceOf(\Ipag\Sdk\Model\Address::class, $customer->getAddress());
        $this->assertInstanceOf(\Ipag\Sdk\Model\Address::class, $customer->getBillingAddress());
        $this->assertInstanceOf(\Ipag\Sdk\Model\Address::class, $customer->getShippingAddress());

    }

    public function testShouldCreateEmptyCustomerObjectSuccessfully()
    {
        $customer = new \Ipag\Sdk\Model\Customer();

        $this->assertEmpty($customer->getId());
        $this->assertEmpty($customer->getUuid());
        $this->assertEmpty($customer->getTaxReceipt());
        $this->assertEmpty($customer->getTaxId());
        $this->assertEmpty($customer->getBirthdate());
        $this->assertEmpty($customer->getIp());

        $this->assertEmpty($customer->getName());
        $this->assertEmpty($customer->getEmail());
        $this->assertEmpty($customer->getCpfCnpj());
        $this->assertEmpty($customer->getPhone());
        $this->assertEmpty($customer->getBusinessName());
        $this->assertEmpty($customer->getIsActive());
        $this->assertEmpty($customer->getAddress());
        $this->assertEmpty($customer->getBillingAddress());
        $this->assertEmpty($customer->getShippingAddress());

    }

    public function testCreateAndSetEmptyPropertiesCustomerObjectSuccessfully()
    {
        $customer = new \Ipag\Sdk\Model\Customer([
            'id' => '123',
            'uuid' => 'abc123',
            'tax_receipt' => '074.598.263-83',
            'tax_id' => '123456789',
            'birthdate' => '1980-01-01',
            'ip' => '10.0.0.1',
            'name' => 'Lívia Julia Eduarda Barros',
            'email' => 'livia.julia.barros@eximiart.com.br',
            'cpf_cnpj' => '074.598.263-83',
            'phone' => '(98) 3792-4834',
            'business_name' => 'Lívia Ltda.',
            'is_active' => true,
            'address' =>
                [
                    'street' => 'Rua A',
                ],
            'billing_address' =>
                [
                    'street' => 'Rua A',
                ],
            'shipping_address' =>
                [
                    'street' => 'Rua A',
                ],
        ]);

        $customer
            ->setId(null)
            ->setUuid(null)
            ->setTaxReceipt(null)
            ->setTaxId(null)
            ->setBirthdate(null)
            ->setIp(null)
            ->setName(null)
            ->setEmail(null)
            ->setCpfCnpj(null)
            ->setPhone(null)
            ->setIsActive(null)
            ->setBusinessName(null)
            ->setAddress(null)
            ->setBillingAddress(null)
            ->setShippingAddress(null);

        $this->assertEmpty($customer->getId());
        $this->assertEmpty($customer->getUuid());
        $this->assertEmpty($customer->getTaxReceipt());
        $this->assertEmpty($customer->getTaxId());
        $this->assertEmpty($customer->getBirthdate());
        $this->assertEmpty($customer->getIp());

        $this->assertEmpty($customer->getEmail());
        $this->assertEmpty($customer->getCpfCnpj());
        $this->assertEmpty($customer->getPhone());
        $this->assertEmpty($customer->getBusinessName());
        $this->assertEmpty($customer->getIsActive());

        $this->assertEmpty($customer->getAddress());
        $this->assertEmpty($customer->getBillingAddress());
        $this->assertEmpty($customer->getShippingAddress());

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

    public function testShouldThrowAValidationExceptionOnTheCustomerCpfCnpjProperty()
    {
        $customer = new \Ipag\Sdk\Model\Customer();

        $this->expectException(MutatorAttributeException::class);

        $customer->setCpfCnpj('074.598.263-80');
    }

    public function testShouldThrowAValidationExceptionOnTheCustomerTaxReceiptProperty()
    {
        $customer = new \Ipag\Sdk\Model\Customer();

        $this->expectException(MutatorAttributeException::class);

        $customer->setTaxReceipt('074.598.263-80');
    }

    public function testShouldKeepAnElevenDigitCpfOnTheCustomerCpfCnpjAndTaxReceiptProperties()
    {
        // completado com zeros até 14 dígitos, um CPF iniciado em 00 também é um CNPJ válido
        $customer = new \Ipag\Sdk\Model\Customer([
            'cpf_cnpj' => '003.344.769-17',
            'tax_receipt' => '00334476917',
        ]);

        $this->assertEquals('00334476917', $customer->getCpfCnpj());
        $this->assertEquals('00334476917', $customer->getTaxReceipt());
        $this->assertEquals('00334476917', $customer->jsonSerialize()['cpf_cnpj']);
        $this->assertEquals('00334476917', $customer->jsonSerialize()['tax_receipt']);

        $customer
            ->setCpfCnpj('74032971307')
            ->setTaxReceipt('04654733930');

        $this->assertEquals('74032971307', $customer->getCpfCnpj());
        $this->assertEquals('04654733930', $customer->getTaxReceipt());
    }

    public function testShouldKeepAFourteenDigitCnpjOnTheCustomerCpfCnpjAndTaxReceiptProperties()
    {
        $customer = new \Ipag\Sdk\Model\Customer([
            'cpf_cnpj' => '01.234.567/0001-95',
            'tax_receipt' => '01234567000195',
        ]);

        $this->assertEquals('01234567000195', $customer->getCpfCnpj());
        $this->assertEquals('01234567000195', $customer->getTaxReceipt());
    }

    public function testShouldAcceptAnAlphanumericCnpjOnTheCustomerCpfCnpjAndTaxReceiptProperties()
    {
        $customer = new \Ipag\Sdk\Model\Customer([
            'cpf_cnpj' => '12.ABC.345/01DE-35',
            'tax_receipt' => '12.abc.345/01de-35',
        ]);

        $this->assertEquals('12ABC34501DE35', $customer->getCpfCnpj());
        $this->assertEquals('12ABC34501DE35', $customer->getTaxReceipt());
        $this->assertEquals('12ABC34501DE35', $customer->jsonSerialize()['cpf_cnpj']);
        $this->assertEquals('12ABC34501DE35', $customer->jsonSerialize()['tax_receipt']);
    }

    public function testShouldThrowAValidationExceptionOnAnAlphanumericCnpjWithInvalidCheckDigits()
    {
        $customer = new \Ipag\Sdk\Model\Customer();

        $this->expectException(MutatorAttributeException::class);

        $customer->setCpfCnpj('12.ABC.345/01DE-36');
    }

    public function testShouldThrowAValidationExceptionOnTheCustomerBirthdateProperty()
    {
        $customer = new \Ipag\Sdk\Model\Customer();

        $this->expectException(MutatorAttributeException::class);

        $customer->setBirthdate('10/07/2021');

    }

}
