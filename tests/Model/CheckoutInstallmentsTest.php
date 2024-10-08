<?php

namespace Ipag\Sdk\Tests\Model;

use Ipag\Sdk\Model\Schema\Exception\MutatorAttributeException;
use Ipag\Sdk\Model\Schema\Exception\SchemaAttributeParseException;
use PHPUnit\Framework\TestCase;

class CheckoutInstallmentsTest extends TestCase
{
    public function testShouldCreateCheckoutInstallmentsObjectWithConstructorSuccessfully()
    {
        $checkoutInstallments = new \Ipag\Sdk\Model\CheckoutInstallments([
            'amount' => 100.00,
            'max_installment' => 12,
            'installments_without_interest' => 3,
            'installment_min_amount' => 5.00,
            'installment_tax' => 2.24,
        ]);

        $this->assertEquals(100.00, $checkoutInstallments->getAmount());
        $this->assertEquals(12, $checkoutInstallments->getMaxInstallment());
        $this->assertEquals(3, $checkoutInstallments->getInstallmentsWithoutInterest());
        $this->assertEquals(5.00, $checkoutInstallments->getInstallmentMinAmount());
        $this->assertEquals(2.24, $checkoutInstallments->getInstallmentTax());

    }

    public function testShouldCreateCheckoutInstallmentsObjectAndSetTheValuesSuccessfully()
    {
        $checkoutInstallments = (new \Ipag\Sdk\Model\CheckoutInstallments())
            ->setAmount(100.00)
            ->setMaxInstallment(12)
            ->setInstallmentsWithoutInterest(3)
            ->setInstallmentMinAmount(5.00)
            ->setInstallmentTax(2.24);

        $this->assertEquals(100.00, $checkoutInstallments->getAmount());
        $this->assertEquals(12, $checkoutInstallments->getMaxInstallment());
        $this->assertEquals(3, $checkoutInstallments->getInstallmentsWithoutInterest());
        $this->assertEquals(5.00, $checkoutInstallments->getInstallmentMinAmount());
        $this->assertEquals(2.24, $checkoutInstallments->getInstallmentTax());

    }

    public function testShouldCreateEmptyCheckoutInstallmentsObjectSuccessfully()
    {
        $checkoutInstallments = new \Ipag\Sdk\Model\CheckoutInstallments();

        $this->assertEmpty($checkoutInstallments->getAmount());
        $this->assertEmpty($checkoutInstallments->getMaxInstallment());
        $this->assertEmpty($checkoutInstallments->getInstallmentsWithoutInterest());
        $this->assertEmpty($checkoutInstallments->getInstallmentMinAmount());
        $this->assertEmpty($checkoutInstallments->getInstallmentTax());

    }

    public function testCreateAndSetEmptyPropertiesCheckoutInstallmentsObjectSuccessfully()
    {
        $checkoutInstallments = new \Ipag\Sdk\Model\CheckoutInstallments([
            'amount' => 100.00,
            'max_installment' => 12,
            'installments_without_interest' => 3,
            'installment_min_amount' => 5.00,
            'installment_tax' => 2.24,
        ]);

        $checkoutInstallments
            ->setAmount(null)
            ->setMaxInstallment(null)
            ->setInstallmentsWithoutInterest(null)
            ->setInstallmentMinAmount(null)
            ->setInstallmentTax(null);

        $this->assertEmpty($checkoutInstallments->getAmount());
        $this->assertEmpty($checkoutInstallments->getMaxInstallment());
        $this->assertEmpty($checkoutInstallments->getInstallmentsWithoutInterest());
        $this->assertEmpty($checkoutInstallments->getInstallmentMinAmount());
        $this->assertEmpty($checkoutInstallments->getInstallmentTax());

    }
}