<?php

namespace Ipag\Sdk\Tests\Model;

use Ipag\Sdk\Model\Schema\Exception\MutatorAttributeException;
use PHPUnit\Framework\TestCase;

class PaymentCardTest extends TestCase
{
    public function testShouldCreatePaymentCardObjectWithConstructorSuccessfully()
    {
        $paymentCard = new \Ipag\Sdk\Model\PaymentCard([
            'holder' => 'Frederic Sales',
            'number' => '4024 0071 1251 2933',
            'expiry_month' => '12',
            'expiry_year' => '2023',
            'cvv' => '431',
            'token' => '123abc',
            'tokenize' => true
        ]);

        $this->assertEquals('Frederic Sales', $paymentCard->getHolder());
        $this->assertEquals('4024007112512933', $paymentCard->getNumber());
        $this->assertEquals('12', $paymentCard->getExpiryMonth());
        $this->assertEquals('2023', $paymentCard->getExpiryYear());
        $this->assertEquals('431', $paymentCard->getCvv());
        $this->assertEquals('123abc', $paymentCard->getToken());
        $this->assertEquals(true, $paymentCard->getTokenize());

    }

    public function testShouldCreatePaymentCardObjectAndSetTheValuesSuccessfully()
    {
        $paymentCard = (new \Ipag\Sdk\Model\PaymentCard)
            ->setHolder('Frederic Sales')
            ->setNumber('4024007112512933')
            ->setExpiryMonth('12')
            ->setExpiryYear('2023')
            ->setCvv('123')
            ->setToken('123abc')
            ->setTokenize(true);

        $this->assertEquals('Frederic Sales', $paymentCard->getHolder());
        $this->assertEquals('4024007112512933', $paymentCard->getNumber());
        $this->assertEquals('12', $paymentCard->getExpiryMonth());
        $this->assertEquals('2023', $paymentCard->getExpiryYear());
        $this->assertEquals('123', $paymentCard->getCvv());
        $this->assertEquals('123abc', $paymentCard->getToken());
        $this->assertEquals(true, $paymentCard->getTokenize());

    }

    public function testShouldCreateEmptyPaymentCardObjectSuccessfully()
    {
        $paymentCard = new \Ipag\Sdk\Model\PaymentCard;

        $this->assertEmpty($paymentCard->getHolder());
        $this->assertEmpty($paymentCard->getNumber());
        $this->assertEmpty($paymentCard->getExpiryMonth());
        $this->assertEmpty($paymentCard->getExpiryYear());
        $this->assertEmpty($paymentCard->getCvv());
        $this->assertEmpty($paymentCard->getToken());
        $this->assertEmpty($paymentCard->getTokenize());

    }

    public function testCreateAndSetEmptyPropertiesPaymentCardObjectSuccessfully()
    {
        $paymentCard = new \Ipag\Sdk\Model\PaymentCard([
            'holder' => 'Frederic Sales',
            'number' => '4024 0071 1251 2933',
            'expiry_month' => '12',
            'expiry_year' => '2023',
            'cvv' => '431',
            'token' => '123abc',
            'tokenize' => true
        ]);

        $paymentCard
            ->setHolder(null)
            ->setNumber(null)
            ->setExpiryMonth(null)
            ->setExpiryYear(null)
            ->setCvv(null)
            ->setToken(null)
            ->setTokenize(null);

        $this->assertEmpty($paymentCard->getHolder());
        $this->assertEmpty($paymentCard->getNumber());
        $this->assertEmpty($paymentCard->getExpiryMonth());
        $this->assertEmpty($paymentCard->getExpiryYear());
        $this->assertEmpty($paymentCard->getCvv());
        $this->assertEmpty($paymentCard->getToken());
        $this->assertEmpty($paymentCard->getTokenize());

    }

    public function testShouldThrowAValidationExceptionOnThePaymentCardExpiryMonthProperty()
    {
        $paymentCard = new \Ipag\Sdk\Model\PaymentCard;

        $this->expectException(MutatorAttributeException::class);

        $paymentCard->setExpiryMonth('AA');
    }

    public function testShouldThrowAInvalidRangeExceptionOnThePaymentCardExpiryMonthProperty()
    {
        $paymentCard = new \Ipag\Sdk\Model\PaymentCard;

        $this->expectException(MutatorAttributeException::class);

        $paymentCard->setExpiryMonth('13');
    }

    public function testShouldThrowAValidationExceptionOnThePaymentCardExpiryYearProperty()
    {
        $paymentCard = new \Ipag\Sdk\Model\PaymentCard;

        $this->expectException(MutatorAttributeException::class);

        $paymentCard->setExpiryYear('AA');
    }
    public function testShouldThrowAInvalidRangeExceptionOnThePaymentCardExpiryYearProperty()
    {
        $paymentCard = new \Ipag\Sdk\Model\PaymentCard;

        $this->expectException(MutatorAttributeException::class);

        $paymentCard->setExpiryYear('202');
    }

    public function testShouldThrowAValidationExceptionOnThePaymentCardCvvProperty()
    {
        $paymentCard = new \Ipag\Sdk\Model\PaymentCard;

        $this->expectException(MutatorAttributeException::class);

        $paymentCard->setCvv('AA');
    }
    public function testShouldThrowAInvalidRangeExceptionOnThePaymentCardCvvProperty()
    {
        $paymentCard = new \Ipag\Sdk\Model\PaymentCard;

        $this->expectException(MutatorAttributeException::class);

        $paymentCard->setCvv('43');
    }

}