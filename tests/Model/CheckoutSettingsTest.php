<?php

namespace Ipag\Sdk\Tests\Model;

use Ipag\Sdk\Model\Schema\Exception\MutatorAttributeException;
use Ipag\Sdk\Model\Schema\Exception\SchemaAttributeParseException;
use PHPUnit\Framework\TestCase;

class CheckoutSettingsTest extends TestCase
{
    public function testShouldCreateCheckoutSettingsObjectWithConstructorSuccessfully()
    {
        $checkoutSettings = new \Ipag\Sdk\Model\CheckoutSettings([
            'max_installments' => 12,
            'interest_free_installments' => 12,
            'min_installment_value' => 0.00,
            'interest' => 0.00,
            'fixed_installment' => 12,
            'payment_method' => 'all'
        ]);

        $this->assertEquals(12, $checkoutSettings->getMaxInstallments());
        $this->assertEquals(12, $checkoutSettings->getInterestFreeInstallments());
        $this->assertEquals(0.00, $checkoutSettings->getMinInstallmentValue());
        $this->assertEquals(0.00, $checkoutSettings->getInterest());
        $this->assertEquals(12, $checkoutSettings->getFixedInstallment());
        $this->assertEquals('all', $checkoutSettings->getPaymentMethod());

    }

    public function testShouldCreateCheckoutSettingsObjectAndSetTheValuesSuccessfully()
    {
        $checkoutSettings = (new \Ipag\Sdk\Model\CheckoutSettings)
            ->setMaxInstallments(12)
            ->setInterestFreeInstallments(12)
            ->setMinInstallmentValue(0.00)
            ->setInterest(0.00)
            ->setFixedInstallment(12)
            ->setPaymentMethod('all');

        $this->assertEquals(12, $checkoutSettings->getMaxInstallments());
        $this->assertEquals(12, $checkoutSettings->getInterestFreeInstallments());
        $this->assertEquals(0.00, $checkoutSettings->getMinInstallmentValue());
        $this->assertEquals(0.00, $checkoutSettings->getInterest());
        $this->assertEquals(12, $checkoutSettings->getFixedInstallment());
        $this->assertEquals('all', $checkoutSettings->getPaymentMethod());

    }

    public function testShouldCreateEmptyCheckoutSettingsObjectSuccessfully()
    {
        $checkoutSettings = new \Ipag\Sdk\Model\CheckoutSettings;

        $this->assertEmpty($checkoutSettings->getMaxInstallments());
        $this->assertEmpty($checkoutSettings->getInterestFreeInstallments());
        $this->assertEmpty($checkoutSettings->getMinInstallmentValue());
        $this->assertEmpty($checkoutSettings->getInterest());
        $this->assertEmpty($checkoutSettings->getFixedInstallment());
        $this->assertEmpty($checkoutSettings->getPaymentMethod());

    }

    public function testCreateAndSetEmptyPropertiesCheckoutSettingsObjectSuccessfully()
    {
        $checkoutSettings = new \Ipag\Sdk\Model\CheckoutSettings([
            'max_installments' => 12,
            'interest_free_installments' => 12,
            'min_installment_value' => 0.00,
            'interest' => 0.00,
            'fixed_installment' => 12,
            'payment_method' => 'all'
        ]);

        $checkoutSettings
            ->setMaxInstallments(null)
            ->setInterestFreeInstallments(null)
            ->setMinInstallmentValue(null)
            ->setInterest(null)
            ->setFixedInstallment(null)
            ->setPaymentMethod(null);

        $this->assertEmpty($checkoutSettings->getMaxInstallments());
        $this->assertEmpty($checkoutSettings->getInterestFreeInstallments());
        $this->assertEmpty($checkoutSettings->getMinInstallmentValue());
        $this->assertEmpty($checkoutSettings->getInterest());
        $this->assertEmpty($checkoutSettings->getFixedInstallment());
        $this->assertEmpty($checkoutSettings->getPaymentMethod());

    }

    public function testShouldThrowATypeExceptionOnTheCheckoutSettingsMaxInstallmentsProperty()
    {
        $checkoutSettings = new \Ipag\Sdk\Model\CheckoutSettings;

        $this->expectException(\TypeError::class);

        $checkoutSettings->setMaxInstallments('a');
    }

    public function testShouldThrowAValidationExceptionOnTheCheckoutSettingsMaxInstallmentsProperty()
    {
        $checkoutSettings = new \Ipag\Sdk\Model\CheckoutSettings;

        $this->expectException(MutatorAttributeException::class);

        $checkoutSettings->setMaxInstallments(0);
    }

    public function testShouldThrowATypeExceptionOnTheCheckoutSettingsInterestFreeInstallmentsProperty()
    {
        $checkoutSettings = new \Ipag\Sdk\Model\CheckoutSettings;

        $this->expectException(\TypeError::class);

        $checkoutSettings->setInterestFreeInstallments('a');
    }

    public function testShouldThrowAValidationExceptionOnTheCheckoutSettingsInterestFreeInstallmentsProperty()
    {
        $checkoutSettings = new \Ipag\Sdk\Model\CheckoutSettings;

        $this->expectException(MutatorAttributeException::class);

        $checkoutSettings->setInterestFreeInstallments(0);
    }

    public function testShouldThrowATypeExceptionOnTheCheckoutSettingsMinInstallmentValueProperty()
    {
        $checkoutSettings = new \Ipag\Sdk\Model\CheckoutSettings;

        $this->expectException(\TypeError::class);

        $checkoutSettings->setMinInstallmentValue('a');
    }

    public function testShouldThrowAValidationExceptionOnTheCheckoutSettingsMinInstallmentValueProperty()
    {
        $checkoutSettings = new \Ipag\Sdk\Model\CheckoutSettings;

        $this->expectException(MutatorAttributeException::class);

        $checkoutSettings->setMinInstallmentValue(-1);
    }

    public function testShouldThrowATypeExceptionOnTheCheckoutSettingsInterestProperty()
    {
        $checkoutSettings = new \Ipag\Sdk\Model\CheckoutSettings;

        $this->expectException(\TypeError::class);

        $checkoutSettings->setInterest('a');
    }

    public function testShouldThrowAValidationExceptionOnTheCheckoutSettingsInterestProperty()
    {
        $checkoutSettings = new \Ipag\Sdk\Model\CheckoutSettings;

        $this->expectException(MutatorAttributeException::class);

        $checkoutSettings->setInterest(-1);
    }

    public function testShouldThrowATypeExceptionOnTheCheckoutSettingsFixedInstallmentProperty()
    {
        $checkoutSettings = new \Ipag\Sdk\Model\CheckoutSettings;

        $this->expectException(\TypeError::class);

        $checkoutSettings->setFixedInstallment('a');
    }

    public function testShouldThrowAValidationExceptionOnTheCheckoutSettingsFixedInstallmentProperty()
    {
        $checkoutSettings = new \Ipag\Sdk\Model\CheckoutSettings;

        $this->expectException(MutatorAttributeException::class);

        $checkoutSettings->setFixedInstallment(-1);
    }

    public function testShouldThrowAValidationExceptionOnTheCheckoutSettingsPaymentMethodProperty()
    {
        $checkoutSettings = new \Ipag\Sdk\Model\CheckoutSettings;

        $this->expectException(SchemaAttributeParseException::class);

        $checkoutSettings->setPaymentMethod('none');
    }

}