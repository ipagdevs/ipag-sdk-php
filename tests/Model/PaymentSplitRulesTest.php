<?php

namespace Ipag\Sdk\Tests\Model;

use Ipag\Sdk\Model\Schema\Exception\MutatorAttributeException;
use PHPUnit\Framework\TestCase;

class PaymentSplitRulesTest extends TestCase
{
    public function testShouldCreatePaymentSplitRulesObjectWithConstructorSuccessfully()
    {
        $paymentSplitRules = new \Ipag\Sdk\Model\PaymentSplitRules([
            'seller_id' => '10000',
            'amount' => 99.9,
            'percentage' => 3.0,
            'liable' => true,
            'charge_processing_fee' => true,
            'hold_receivables' => true,
        ]);

        $this->assertEquals('10000', $paymentSplitRules->getSellerId());
        $this->assertEquals(99.9, $paymentSplitRules->getAmount());
        $this->assertEquals(3.0, $paymentSplitRules->getPercentage());
        $this->assertEquals(true, $paymentSplitRules->getLiable());
        $this->assertEquals(true, $paymentSplitRules->getChargeProcessingFee());
        $this->assertEquals(true, $paymentSplitRules->getHoldReceivables());

    }

    public function testShouldCreatePaymentSplitRulesObjectAndSetTheValuesSuccessfully()
    {
        $paymentSplitRules = (new \Ipag\Sdk\Model\PaymentSplitRules())
            ->setSellerId('10000')
            ->setAmount(99.9)
            ->setPercentage(3.0)
            ->setLiable(true)
            ->setChargeProcessingFee(true)
            ->setHoldReceivables(true);

        $this->assertEquals('10000', $paymentSplitRules->getSellerId());
        $this->assertEquals(99.9, $paymentSplitRules->getAmount());
        $this->assertEquals(3.0, $paymentSplitRules->getPercentage());
        $this->assertEquals(true, $paymentSplitRules->getLiable());
        $this->assertEquals(true, $paymentSplitRules->getChargeProcessingFee());
        $this->assertEquals(true, $paymentSplitRules->getHoldReceivables());

    }

    public function testShouldCreateEmptyPaymentSplitRulesObjectSuccessfully()
    {
        $paymentSplitRules = new \Ipag\Sdk\Model\PaymentSplitRules();

        $this->assertEmpty($paymentSplitRules->getSellerId());
        $this->assertEmpty($paymentSplitRules->getAmount());
        $this->assertEmpty($paymentSplitRules->getPercentage());
        $this->assertEmpty($paymentSplitRules->getLiable());
        $this->assertEmpty($paymentSplitRules->getChargeProcessingFee());
        $this->assertEmpty($paymentSplitRules->getHoldReceivables());

    }

    public function testCreateAndSetEmptyPropertiesPaymentSplitRulesObjectSuccessfully()
    {
        $paymentSplitRules = new \Ipag\Sdk\Model\PaymentSplitRules([
            'seller_id' => '10000',
            'amount' => 99.9,
            'percentage' => 3.0,
            'liable' => true,
            'charge_processing_fee' => true,
            'hold_receivables' => true,
        ]);

        $paymentSplitRules
            ->setSellerId(null)
            ->setAmount(null)
            ->setPercentage(null)
            ->setLiable(null)
            ->setChargeProcessingFee(null)
            ->setHoldReceivables(null);

        $this->assertEmpty($paymentSplitRules->getSellerId());
        $this->assertEmpty($paymentSplitRules->getAmount());
        $this->assertEmpty($paymentSplitRules->getPercentage());
        $this->assertEmpty($paymentSplitRules->getLiable());
        $this->assertEmpty($paymentSplitRules->getChargeProcessingFee());
        $this->assertEmpty($paymentSplitRules->getHoldReceivables());

    }

    public function testShouldThrowATypeExceptionOnThePaymentSplitRulesAmountProperty()
    {
        $paymentSplitRules = new \Ipag\Sdk\Model\PaymentSplitRules();

        $this->expectException(\TypeError::class);

        $paymentSplitRules->setAmount('a');
    }

    public function testShouldThrowAValidationExceptionOnThePaymentSplitRulesAmountProperty()
    {
        $paymentSplitRules = new \Ipag\Sdk\Model\PaymentSplitRules();

        $this->expectException(MutatorAttributeException::class);

        $paymentSplitRules->setAmount(-1);
    }

    public function testShouldThrowATypeExceptionOnThePaymentSplitRulesPercentageProperty()
    {
        $paymentSplitRules = new \Ipag\Sdk\Model\PaymentSplitRules();

        $this->expectException(\TypeError::class);

        $paymentSplitRules->setPercentage('a');
    }

    public function testShouldThrowAValidationExceptionOnThePaymentSplitRulesPercentageProperty()
    {
        $paymentSplitRules = new \Ipag\Sdk\Model\PaymentSplitRules();

        $this->expectException(MutatorAttributeException::class);

        $paymentSplitRules->setPercentage(-1);
    }

}