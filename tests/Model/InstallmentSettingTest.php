<?php

namespace Ipag\Sdk\Tests\Model;

use Ipag\Sdk\Model\Schema\Exception\MutatorAttributeException;
use PHPUnit\Framework\TestCase;

class InstallmentSettingTest extends TestCase
{
    public function testShouldCreateInstallmentSettingsObjectWithConstructorSuccessfully()
    {
        $installmentSettings = new \Ipag\Sdk\Model\InstallmentSetting([
            'max_installments' => 12,
            'min_installment_value' => 5,
            'interest' => 0,
            'interest_free_installments' => 12,
            'fixed_installment' => 12,
            'payment_method' => 'creditcard'
        ]);

        $this->assertEquals(12, $installmentSettings->getMaxInstallments());
        $this->assertEquals(5, $installmentSettings->getMinInstallmentValue());
        $this->assertEquals(0, $installmentSettings->getInterest());
        $this->assertEquals(12, $installmentSettings->getInterestFreeInstallments());
        $this->assertEquals(12, $installmentSettings->getFixedInstallment());
        $this->assertEquals('creditcard', $installmentSettings->getPaymentMethod());

    }

    public function testShouldCreateInstallmentSettingsObjectAndSetTheValuesSuccessfully()
    {
        $installmentSettings = (new \Ipag\Sdk\Model\InstallmentSetting)
            ->setMaxInstallments(12)
            ->setMinInstallmentValue(5)
            ->setInterest(0)
            ->setInterestFreeInstallments(12)
            ->setFixedInstallment(12)
            ->setPaymentMethod('creditcard');

        $this->assertEquals(12, $installmentSettings->getMaxInstallments());
        $this->assertEquals(5, $installmentSettings->getMinInstallmentValue());
        $this->assertEquals(0, $installmentSettings->getInterest());
        $this->assertEquals(12, $installmentSettings->getInterestFreeInstallments());
        $this->assertEquals(12, $installmentSettings->getFixedInstallment());
        $this->assertEquals('creditcard', $installmentSettings->getPaymentMethod());

    }

    public function testShouldCreateEmptyInstallmentSettingsObjectSuccessfully()
    {
        $installmentSettings = new \Ipag\Sdk\Model\InstallmentSetting;

        $this->assertEmpty($installmentSettings->getMaxInstallments());
        $this->assertEmpty($installmentSettings->getMinInstallmentValue());
        $this->assertEmpty($installmentSettings->getInterest());
        $this->assertEmpty($installmentSettings->getInterestFreeInstallments());
        $this->assertEmpty($installmentSettings->getFixedInstallment());
        $this->assertEmpty($installmentSettings->getPaymentMethod());

    }

    public function testCreateAndSetEmptyPropertiesInstallmentSettingsObjectSuccessfully()
    {
        $installmentSettings = new \Ipag\Sdk\Model\InstallmentSetting([
            'max_installments' => 12,
            'min_installment_value' => 5,
            'interest' => 0,
            'interest_free_installments' => 12,
            'fixed_installment' => 12,
            'payment_method' => 'creditcard'
        ]);

        $installmentSettings
            ->setMaxInstallments(null)
            ->setMinInstallmentValue(null)
            ->setInterest(null)
            ->setInterestFreeInstallments(null)
            ->setFixedInstallment(null)
            ->setPaymentMethod(null);

        $this->assertEmpty($installmentSettings->getMaxInstallments());
        $this->assertEmpty($installmentSettings->getMinInstallmentValue());
        $this->assertEmpty($installmentSettings->getInterest());
        $this->assertEmpty($installmentSettings->getInterestFreeInstallments());
        $this->assertEmpty($installmentSettings->getFixedInstallment());
        $this->assertEmpty($installmentSettings->getPaymentMethod());

    }

    public function testShouldThrowATypeExceptionOnTheInstallmentSettingMaxInstallmentsProperty()
    {
        $installmentSettings = new \Ipag\Sdk\Model\InstallmentSetting;

        $this->expectException(\TypeError::class);

        $installmentSettings->setMaxInstallments('a');
    }

    public function testShouldThrowAValidationExceptionOnTheInstallmentSettingMaxInstallmentsProperty()
    {
        $installmentSettings = new \Ipag\Sdk\Model\InstallmentSetting;

        $this->expectException(MutatorAttributeException::class);

        $installmentSettings->setMaxInstallments(0);
    }

    public function testShouldThrowATypeExceptionOnTheInstallmentSettingMinInstallmentValueProperty()
    {
        $installmentSetting = new \Ipag\Sdk\Model\InstallmentSetting;

        $this->expectException(\TypeError::class);

        $installmentSetting->setMinInstallmentValue('a');
    }

    public function testShouldThrowAValidationExceptionOnTheInstallmentSettingMinInstallmentValueProperty()
    {
        $installmentSetting = new \Ipag\Sdk\Model\InstallmentSetting;

        $this->expectException(MutatorAttributeException::class);

        $installmentSetting->setMinInstallmentValue(-1);
    }

    public function testShouldThrowATypeExceptionOnTheInstallmentSettingInterestProperty()
    {
        $installmentSetting = new \Ipag\Sdk\Model\InstallmentSetting;

        $this->expectException(\TypeError::class);

        $installmentSetting->setInterest('a');
    }

    public function testShouldThrowAValidationExceptionOnTheInstallmentSettingInterestProperty()
    {
        $installmentSetting = new \Ipag\Sdk\Model\InstallmentSetting;

        $this->expectException(MutatorAttributeException::class);

        $installmentSetting->setInterest(-1);
    }

    public function testShouldThrowATypeExceptionOnTheInstallmentSettingInterestFreeInstallmentsProperty()
    {
        $installmentSetting = new \Ipag\Sdk\Model\InstallmentSetting;

        $this->expectException(\TypeError::class);

        $installmentSetting->setInterestFreeInstallments('a');
    }

    public function testShouldThrowAValidationExceptionOnTheInstallmentSettingInterestFreeInstallmentsProperty()
    {
        $installmentSetting = new \Ipag\Sdk\Model\InstallmentSetting;

        $this->expectException(MutatorAttributeException::class);

        $installmentSetting->setInterestFreeInstallments(0);
    }

    public function testShouldThrowATypeExceptionOnTheInstallmentSettingFixedInstallmentProperty()
    {
        $installmentSetting = new \Ipag\Sdk\Model\InstallmentSetting;

        $this->expectException(\TypeError::class);

        $installmentSetting->setFixedInstallment('a');
    }

    public function testShouldThrowAValidationExceptionOnTheInstallmentSettingFixedInstallmentProperty()
    {
        $installmentSetting = new \Ipag\Sdk\Model\InstallmentSetting;

        $this->expectException(MutatorAttributeException::class);

        $installmentSetting->setFixedInstallment(-1);
    }

}