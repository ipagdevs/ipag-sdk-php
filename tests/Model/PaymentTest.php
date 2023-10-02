<?php

namespace Ipag\Sdk\Tests\Model;

use PHPUnit\Framework\TestCase;

class PaymentTest extends TestCase
{
    public function testShouldCreatePaymentObjectWithConstructorSuccessfully()
    {
        $payment = new \Ipag\Sdk\Model\Payment([
            'type' => 'card',
            'method' => 'visa',
            'installments' => 1,
            'capture' => true,
            'fraud_analysis' => true,
            'softdescriptor' => 'Maria José',
            'pix_expires_in' => 1000,
            'card' => [
                'holder' => 'Maria José',
                'number' => '123456789',
                'expiry_month' => '01',
                'expiry_year' => '28',
                'cvv' => '123',
                'brand' => 'visa',
                'token' => '123456789',
                'tokenize' => true
            ],
            'boleto' => [
                'due_date' => '2020-01-01',
                'instructions' => [
                    [
                        'instruction' => 'blábláblá'
                    ],
                    [
                        'instruction' => 'lálálá'
                    ],
                ]
            ],
        ]);

        $this->assertEquals('card', $payment->getType());
        $this->assertEquals('visa', $payment->getMethod());
        $this->assertEquals(1, $payment->getInstallments());
        $this->assertEquals(true, $payment->getCapture());
        $this->assertEquals(true, $payment->getFraudAnalysis());
        $this->assertEquals('Maria José', $payment->getSoftDescriptor());
        $this->assertEquals(1000, $payment->getPixExpiresIn());

        $this->assertInstanceOf(\Ipag\Sdk\Model\PaymentCard::class, $payment->getCard());

        $this->assertEquals('Maria José', $payment->getCard()->getHolder());
        $this->assertEquals('123456789', $payment->getCard()->getNumber());
        $this->assertEquals('01', $payment->getCard()->getExpiryMonth());
        $this->assertEquals('28', $payment->getCard()->getExpiryYear());
        $this->assertEquals('123', $payment->getCard()->getCvv());
        $this->assertEquals('123456789', $payment->getCard()->getToken());
        $this->assertEquals(true, $payment->getCard()->getTokenize());

        $this->assertInstanceOf(\Ipag\Sdk\Model\Boleto::class, $payment->getBoleto());

        $this->assertEquals('2020-01-01', $payment->getBoleto()->getDueDate());

        $this->assertIsArray($payment->getBoleto()->getInstructions());
        $this->assertCount(2, $payment->getBoleto()->getInstructions());

        $this->assertEquals('blábláblá', $payment->getBoleto()->getInstructions()[0]['instruction']);
        $this->assertEquals('lálálá', $payment->getBoleto()->getInstructions()[1]['instruction']);

    }

    public function testShouldCreatePaymentObjectAndSetTheValuesSuccessfully()
    {
        $payment = (new \Ipag\Sdk\Model\Payment())
            ->setType('card')
            ->setMethod('visa')
            ->setInstallments(1)
            ->setCapture(true)
            ->setFraudAnalysis(true)
            ->setSoftDescriptor('Maria José')
            ->setPixExpiresIn(1000)
            ->setCard(
                (new \Ipag\Sdk\Model\PaymentCard)
                    ->setHolder('Maria José')
                    ->setNumber('123456789')
                    ->setExpiryMonth('01')
                    ->setExpiryYear('28')
                    ->setCvv('123')
                    ->setToken('123456789')
                    ->setTokenize(true)
            )
            ->setBoleto(
                (new \Ipag\Sdk\Model\Boleto)
                    ->setDueDate('2020-01-01')
                    ->setInstructions(
                        [
                            [
                                'instruction' => 'blábláblá'
                            ],
                            [
                                'instruction' => 'lálálá'
                            ],
                        ]

                    )
            );

        $this->assertEquals('card', $payment->getType());
        $this->assertEquals('visa', $payment->getMethod());
        $this->assertEquals(1, $payment->getInstallments());
        $this->assertEquals(true, $payment->getCapture());
        $this->assertEquals(true, $payment->getFraudAnalysis());
        $this->assertEquals('Maria José', $payment->getSoftDescriptor());
        $this->assertEquals(1000, $payment->getPixExpiresIn());

        $this->assertInstanceOf(\Ipag\Sdk\Model\PaymentCard::class, $payment->getCard());

        $this->assertEquals('Maria José', $payment->getCard()->getHolder());
        $this->assertEquals('123456789', $payment->getCard()->getNumber());
        $this->assertEquals('01', $payment->getCard()->getExpiryMonth());
        $this->assertEquals('28', $payment->getCard()->getExpiryYear());
        $this->assertEquals('123', $payment->getCard()->getCvv());
        $this->assertEquals('123456789', $payment->getCard()->getToken());
        $this->assertEquals(true, $payment->getCard()->getTokenize());

        $this->assertInstanceOf(\Ipag\Sdk\Model\Boleto::class, $payment->getBoleto());

        $this->assertEquals('2020-01-01', $payment->getBoleto()->getDueDate());

        $this->assertIsArray($payment->getBoleto()->getInstructions());
        $this->assertCount(2, $payment->getBoleto()->getInstructions());

        $this->assertEquals('blábláblá', $payment->getBoleto()->getInstructions()[0]['instruction']);
        $this->assertEquals('lálálá', $payment->getBoleto()->getInstructions()[1]['instruction']);

    }

    public function testShouldCreateEmptyPaymentObjectSuccessfully()
    {
        $payment = new \Ipag\Sdk\Model\Payment;

        $this->assertEmpty($payment->getType());
        $this->assertEmpty($payment->getMethod());
        $this->assertEmpty($payment->getInstallments());
        $this->assertEmpty($payment->getCapture());
        $this->assertEmpty($payment->getFraudAnalysis());
        $this->assertEmpty($payment->getSoftDescriptor());
        $this->assertEmpty($payment->getPixExpiresIn());

        $this->assertEmpty($payment->getCard());
        $this->assertEmpty($payment->getBoleto());

    }

    public function testCreateAndSetEmptyPropertiesPaymentObjectSuccessfully()
    {
        $payment = new \Ipag\Sdk\Model\Payment([
            'type' => 'card',
            'method' => 'visa',
            'installments' => 1,
            'capture' => true,
            'fraud_analysis' => true,
            'softdescriptor' => 'Maria José',
            'pix_expires_in' => 1000,
            'card' => [
                'holder' => 'Maria José',
                'number' => '123456789',
                'expiry_month' => '01',
                'expiry_year' => '28',
                'cvv' => '123',
                'brand' => 'visa',
                'token' => '123456789',
                'tokenize' => true
            ],
            'boleto' => [
                'due_date' => '2020-01-01',
                'instructions' => [
                    [
                        'instruction' => 'blábláblá'
                    ],
                    [
                        'instruction' => 'lálálá'
                    ],
                ]
            ],
        ]);

        $payment
            ->setType(null)
            ->setMethod(null)
            ->setInstallments(null)
            ->setCapture(null)
            ->setFraudAnalysis(null)
            ->setSoftDescriptor(null)
            ->setPixExpiresIn(null)
            ->setCard(null)
            ->setBoleto(null);

        $this->assertEmpty($payment->getType());
        $this->assertEmpty($payment->getMethod());
        $this->assertEmpty($payment->getInstallments());
        $this->assertEmpty($payment->getCapture());
        $this->assertEmpty($payment->getFraudAnalysis());
        $this->assertEmpty($payment->getSoftDescriptor());
        $this->assertEmpty($payment->getPixExpiresIn());

        $this->assertEmpty($payment->getCard());
        $this->assertEmpty($payment->getBoleto());

    }

}