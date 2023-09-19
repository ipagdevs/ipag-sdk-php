<?php

namespace Ipag\Sdk\Tests\Model;

use Ipag\Sdk\Model\Schema\Exception\MutatorAttributeException;
use Ipag\Sdk\Model\Schema\Exception\SchemaAttributeParseException;
use PHPUnit\Framework\TestCase;

class ChargeTest extends TestCase
{
    public function testShouldCreateChargeObjectWithConstructorSuccessfully()
    {
        $charge = new \Ipag\Sdk\Model\Charge([
            'amount' => 150.50,
            'description' => 'Cobrança referente a negociação de débito pendente na Empresa X',
            'due_date' => '2020-10-30',
            'frequency' => 1,
            'interval' => 'month',
            'type' => 'charge',
            'last_charge_date' => '2020-10-30',
            'callback_url' => 'https://api.ipag.test/retorno_charge',
            'auto_debit' => false,
            'installments' => 12,
            'is_active' => true,
            'products' => [1, 2, 3],
            'customer' => [
                'name' => 'Maria Francisca',
            ],
            'checkout_settings' => [
                'max_installments' => 12,
            ]
        ]);

        $this->assertEquals(150.50, $charge->getAmount());
        $this->assertEquals('Cobrança referente a negociação de débito pendente na Empresa X', $charge->getDescription());
        $this->assertEquals('2020-10-30', $charge->getDueDate());
        $this->assertEquals(1, $charge->getFrequency());
        $this->assertEquals('month', $charge->getInterval());
        $this->assertEquals('charge', $charge->getType());
        $this->assertEquals('2020-10-30', $charge->getLastChargeDate());
        $this->assertEquals('https://api.ipag.test/retorno_charge', $charge->getCallbackUrl());
        $this->assertEquals(false, $charge->getAutoDebit());
        $this->assertEquals(12, $charge->getInstallments());
        $this->assertEquals(true, $charge->getIsActive());

        $this->assertIsArray($charge->getProducts());
        $this->assertEquals([1, 2, 3], $charge->getProducts());

        $this->assertInstanceOf(\Ipag\Sdk\Model\Customer::class, $charge->getCustomer());
        $this->assertEquals('Maria Francisca', $charge->getCustomer()->getName());

        $this->assertInstanceOf(\Ipag\Sdk\Model\CheckoutSettings::class, $charge->getCheckoutSettings());
        $this->assertEquals(12, $charge->getCheckoutSettings()->getMaxInstallments());

    }

    public function testShouldCreateChargeObjectAndSetTheValuesSuccessfully()
    {
        $charge = (new \Ipag\Sdk\Model\Charge)
            ->setAmount(150.50)
            ->setDescription('Cobrança referente a negociação de débito pendente na Empresa X')
            ->setDueDate('2020-10-30')
            ->setFrequency(1)
            ->setInterval('month')
            ->setType('charge')
            ->setLastChargeDate('2020-10-30')
            ->setCallbackUrl('https://api.ipag.test/retorno_charge')
            ->setAutoDebit(false)
            ->setInstallments(12)
            ->setIsActive(true)
            ->setProducts([1, 2, 3])
            ->setCustomer(
                (new \Ipag\Sdk\Model\Customer)
                    ->setName('Maria Francisca')
            )
            ->setCheckoutSettings(
                (new \Ipag\Sdk\Model\CheckoutSettings)
                    ->setMaxInstallments(12)
            );

        $this->assertEquals(150.50, $charge->getAmount());
        $this->assertEquals('Cobrança referente a negociação de débito pendente na Empresa X', $charge->getDescription());
        $this->assertEquals('2020-10-30', $charge->getDueDate());
        $this->assertEquals(1, $charge->getFrequency());
        $this->assertEquals('month', $charge->getInterval());
        $this->assertEquals('charge', $charge->getType());
        $this->assertEquals('2020-10-30', $charge->getLastChargeDate());
        $this->assertEquals('https://api.ipag.test/retorno_charge', $charge->getCallbackUrl());
        $this->assertEquals(false, $charge->getAutoDebit());
        $this->assertEquals(12, $charge->getInstallments());
        $this->assertEquals(true, $charge->getIsActive());

        $this->assertIsArray($charge->getProducts());
        $this->assertEquals([1, 2, 3], $charge->getProducts());

        $this->assertInstanceOf(\Ipag\Sdk\Model\Customer::class, $charge->getCustomer());
        $this->assertEquals('Maria Francisca', $charge->getCustomer()->getName());

        $this->assertInstanceOf(\Ipag\Sdk\Model\CheckoutSettings::class, $charge->getCheckoutSettings());
        $this->assertEquals(12, $charge->getCheckoutSettings()->getMaxInstallments());

    }

    public function testShouldCreateEmptyChargeObjectSuccessfully()
    {
        $charge = new \Ipag\Sdk\Model\Charge;

        $this->assertEmpty($charge->getAmount());
        $this->assertEmpty($charge->getDescription());
        $this->assertEmpty($charge->getDueDate());
        $this->assertEmpty($charge->getFrequency());
        $this->assertEmpty($charge->getInterval());
        $this->assertEmpty($charge->getType());
        $this->assertEmpty($charge->getLastChargeDate());
        $this->assertEmpty($charge->getCallbackUrl());
        $this->assertEmpty($charge->getAutoDebit());
        $this->assertEmpty($charge->getInstallments());
        $this->assertEmpty($charge->getIsActive());

        $this->assertEmpty($charge->getProducts());

        $this->assertEmpty($charge->getCustomer());

        $this->assertEmpty($charge->getCheckoutSettings());

    }

    public function testCreateAndSetEmptyPropertiesChargeObjectSuccessfully()
    {
        $charge = new \Ipag\Sdk\Model\Charge([
            'amount' => 150.50,
            'description' => 'Cobrança referente a negociação de débito pendente na Empresa X',
            'due_date' => '2020-10-30',
            'frequency' => 1,
            'interval' => 'month',
            'type' => 'charge',
            'last_charge_date' => '2020-10-30',
            'callback_url' => 'https://api.ipag.test/retorno_charge',
            'auto_debit' => false,
            'installments' => 12,
            'is_active' => true,
            'products' => [1, 2, 3],
            'customer' => [
                'name' => 'Maria Francisca',
            ],
            'checkout_settings' => [
                'max_installments' => 12,
            ]
        ]);

        $charge
            ->setAmount(null)
            ->setDescription(null)
            ->setDueDate(null)
            ->setFrequency(null)
            ->setInterval(null)
            ->setType(null)
            ->setLastChargeDate(null)
            ->setCallbackUrl(null)
            ->setAutoDebit(null)
            ->setInstallments(null)
            ->setIsActive(null)
            ->setProducts(null)
            ->setCustomer(null)
            ->setCheckoutSettings(null);

        $this->assertEmpty($charge->getAmount());
        $this->assertEmpty($charge->getDescription());
        $this->assertEmpty($charge->getDueDate());
        $this->assertEmpty($charge->getFrequency());
        $this->assertEmpty($charge->getInterval());
        $this->assertEmpty($charge->getType());
        $this->assertEmpty($charge->getLastChargeDate());
        $this->assertEmpty($charge->getCallbackUrl());
        $this->assertEmpty($charge->getAutoDebit());
        $this->assertEmpty($charge->getInstallments());
        $this->assertEmpty($charge->getIsActive());

        $this->assertEmpty($charge->getProducts());

        $this->assertEmpty($charge->getCustomer());

        $this->assertEmpty($charge->getCheckoutSettings());

    }

    public function testShouldThrowATypeExceptionOnTheChargeAmountProperty()
    {
        $charge = new \Ipag\Sdk\Model\Charge;

        $this->expectException(\TypeError::class);

        $charge->setAmount('a');
    }

    public function testShouldThrowAValidationExceptionOnTheChargeAmountProperty()
    {
        $charge = new \Ipag\Sdk\Model\Charge;

        $this->expectException(MutatorAttributeException::class);

        $charge->setAmount(-1);
    }

    public function testShouldThrowATypeExceptionOnTheChargeFrequencyProperty()
    {
        $charge = new \Ipag\Sdk\Model\Charge;

        $this->expectException(\TypeError::class);

        $charge->setFrequency('a');
    }

    public function testShouldThrowAValidationExceptionOnTheChargeFrequencyProperty()
    {
        $charge = new \Ipag\Sdk\Model\Charge;

        $this->expectException(MutatorAttributeException::class);

        $charge->setFrequency(0);
    }

    public function testShouldThrowAValidationExceptionOnTheChargeIntervalProperty()
    {
        $charge = new \Ipag\Sdk\Model\Charge;

        $this->expectException(SchemaAttributeParseException::class);

        $charge->setInterval('a');
    }

    public function testShouldThrowAValidationExceptionOnTheChargeTypeProperty()
    {
        $charge = new \Ipag\Sdk\Model\Charge;

        $this->expectException(SchemaAttributeParseException::class);

        $charge->setType('a');
    }

    public function testShouldThrowATypeExceptionOnTheChargeInstallmentsProperty()
    {
        $charge = new \Ipag\Sdk\Model\Charge;

        $this->expectException(\TypeError::class);

        $charge->setInstallments('a');
    }

    public function testShouldThrowAValidationExceptionOnTheChargeInstallmentsProperty()
    {
        $charge = new \Ipag\Sdk\Model\Charge;

        $this->expectException(MutatorAttributeException::class);

        $charge->setInstallments(0);
    }

    public function testShouldThrowATypeExceptionOnTheChargeProductsProperty()
    {
        $charge = new \Ipag\Sdk\Model\Charge;

        $this->expectException(\TypeError::class);

        $charge->setProducts(1);
    }

}