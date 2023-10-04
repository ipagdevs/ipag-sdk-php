<?php

namespace Ipag\Sdk\Tests\Model;

use PHPUnit\Framework\TestCase;

class PaymentAntifraudTest extends TestCase
{
    public function testShouldCreatePaymentAntifraudObjectWithConstructorSuccessfully()
    {
        $paymentAntifraud = new \Ipag\Sdk\Model\PaymentAntifraud([
            'fingerprint' => 'abc123',
            'provider' => 'abc'
        ]);

        $this->assertEquals('abc123', $paymentAntifraud->getFingerprint());
        $this->assertEquals('abc', $paymentAntifraud->getProvider());

    }

    public function testShouldCreatePaymentAntifraudObjectAndSetTheValuesSuccessfully()
    {
        $paymentAntifraud = (new \Ipag\Sdk\Model\PaymentAntifraud())
            ->setFingerprint('abc123')
            ->setProvider('abc');

        $this->assertEquals('abc123', $paymentAntifraud->getFingerprint());
        $this->assertEquals('abc', $paymentAntifraud->getProvider());

    }

    public function testShouldCreateEmptyPaymentAntifraudObjectSuccessfully()
    {
        $paymentAntifraud = new \Ipag\Sdk\Model\PaymentAntifraud();

        $this->assertEmpty($paymentAntifraud->getFingerprint());
        $this->assertEmpty($paymentAntifraud->getProvider());

    }

    public function testCreateAndSetEmptyPropertiesPaymentAntifraudObjectSuccessfully()
    {
        $paymentAntifraud = new \Ipag\Sdk\Model\PaymentAntifraud([
            'fingerprint' => 'abc123',
            'provider' => 'abc'
        ]);

        $paymentAntifraud
            ->setFingerprint(null)
            ->setProvider(null);

        $this->assertEmpty($paymentAntifraud->getFingerprint());
        $this->assertEmpty($paymentAntifraud->getProvider());

    }
}