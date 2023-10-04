<?php

namespace Ipag\Sdk\Tests\Model;

use Ipag\Sdk\Model\Schema\Exception\MutatorAttributeException;
use PHPUnit\Framework\TestCase;

class PaymentSubscriptionTest extends TestCase
{
    public function testShouldCreatePaymentSubscriptionObjectWithConstructorSuccessfully()
    {
        $paymentSubscription = new \Ipag\Sdk\Model\PaymentSubscription([
            'frequency' => 1,
            'interval' => 'month',
            'start_date' => '2019-01-01',
            'amount' => 100.9,
            'installments' => 1,
            'cycles' => 1
        ]);

        $this->assertEquals(1, $paymentSubscription->getFrequency());
        $this->assertEquals('month', $paymentSubscription->getInterval());
        $this->assertEquals('2019-01-01', $paymentSubscription->getStartDate());
        $this->assertEquals(100.9, $paymentSubscription->getAmount());
        $this->assertEquals(1, $paymentSubscription->getInstallments());
        $this->assertEquals(1, $paymentSubscription->getCycles());

    }

    public function testShouldCreatePaymentSubscriptionObjectAndSetTheValuesSuccessfully()
    {
        $paymentSubscription = (new \Ipag\Sdk\Model\PaymentSubscription())
            ->setFrequency(1)
            ->setInterval('month')
            ->setStartDate('2019-01-01')
            ->setAmount(100.9)
            ->setInstallments(1)
            ->setCycles(1);

        $this->assertEquals(1, $paymentSubscription->getFrequency());
        $this->assertEquals('month', $paymentSubscription->getInterval());
        $this->assertEquals('2019-01-01', $paymentSubscription->getStartDate());
        $this->assertEquals(100.9, $paymentSubscription->getAmount());
        $this->assertEquals(1, $paymentSubscription->getInstallments());
        $this->assertEquals(1, $paymentSubscription->getCycles());

    }

    public function testShouldCreateEmptyPaymentSubscriptionObjectSuccessfully()
    {
        $paymentSubscription = new \Ipag\Sdk\Model\PaymentSubscription();

        $this->assertEmpty($paymentSubscription->getFrequency());
        $this->assertEmpty($paymentSubscription->getInterval());
        $this->assertEmpty($paymentSubscription->getStartDate());
        $this->assertEmpty($paymentSubscription->getAmount());
        $this->assertEmpty($paymentSubscription->getInstallments());
        $this->assertEmpty($paymentSubscription->getCycles());

    }

    public function testCreateAndSetEmptyPropertiesPaymentSubscriptionObjectSuccessfully()
    {
        $paymentSubscription = new \Ipag\Sdk\Model\PaymentSubscription([
            'frequency' => 1,
            'interval' => 'month',
            'start_date' => '2019-01-01',
            'amount' => 100.9,
            'installments' => 1,
            'cycles' => 1
        ]);

        $paymentSubscription
            ->setFrequency(null)
            ->setInterval(null)
            ->setStartDate(null)
            ->setAmount(null)
            ->setInstallments(null)
            ->setCycles(null);

        $this->assertEmpty($paymentSubscription->getFrequency());
        $this->assertEmpty($paymentSubscription->getInterval());
        $this->assertEmpty($paymentSubscription->getStartDate());
        $this->assertEmpty($paymentSubscription->getAmount());
        $this->assertEmpty($paymentSubscription->getInstallments());
        $this->assertEmpty($paymentSubscription->getCycles());

    }

    public function testShouldThrowATypeExceptionOnThePaymentSubscriptionFrequencyProperty()
    {
        $paymentSubscription = new \Ipag\Sdk\Model\PaymentSubscription();

        $this->expectException(\TypeError::class);

        $paymentSubscription->setFrequency('a');
    }

    public function testShouldThrowAValidationExceptionOnThePaymentSubscriptionFrequencyProperty()
    {
        $paymentSubscription = new \Ipag\Sdk\Model\PaymentSubscription();

        $this->expectException(MutatorAttributeException::class);

        $paymentSubscription->setFrequency(0);
    }

    public function testShouldThrowATypeExceptionOnThePaymentSubscriptionAmountProperty()
    {
        $paymentSubscription = new \Ipag\Sdk\Model\PaymentSubscription();

        $this->expectException(\TypeError::class);

        $paymentSubscription->setAmount('a');
    }

    public function testShouldThrowAValidationExceptionOnThePaymentSubscriptionAmountProperty()
    {
        $paymentSubscription = new \Ipag\Sdk\Model\PaymentSubscription();

        $this->expectException(MutatorAttributeException::class);

        $paymentSubscription->setAmount(-1);
    }

    public function testShouldThrowATypeExceptionOnThePaymentSubscriptionInstallmentsProperty()
    {
        $paymentSubscription = new \Ipag\Sdk\Model\PaymentSubscription();

        $this->expectException(\TypeError::class);

        $paymentSubscription->setInstallments('a');
    }

    public function testShouldThrowAValidationExceptionOnThePaymentSubscriptionInstallmentsProperty()
    {
        $paymentSubscription = new \Ipag\Sdk\Model\PaymentSubscription();

        $this->expectException(MutatorAttributeException::class);

        $paymentSubscription->setInstallments(-1);
    }

    public function testShouldThrowATypeExceptionOnThePaymentSubscriptionCyclesProperty()
    {
        $paymentSubscription = new \Ipag\Sdk\Model\PaymentSubscription();

        $this->expectException(\TypeError::class);

        $paymentSubscription->setCycles('a');
    }

    public function testShouldThrowAValidationExceptionOnThePaymentSubscriptionCyclesProperty()
    {
        $paymentSubscription = new \Ipag\Sdk\Model\PaymentSubscription();

        $this->expectException(MutatorAttributeException::class);

        $paymentSubscription->setCycles(-1);
    }

}