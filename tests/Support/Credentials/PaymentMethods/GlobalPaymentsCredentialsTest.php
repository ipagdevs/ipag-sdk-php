<?php

namespace Ipag\Sdk\Tests\Model;

use PHPUnit\Framework\TestCase;

class GlobalPaymentsCredentialsTest extends TestCase
{
    public function testShouldCreateGlobalPaymentsCredentialsObjectWithConstructorSuccessfully()
    {
        $globalPaymentsCredentials = new \Ipag\Sdk\Support\Credentials\PaymentMethods\GlobalPaymentsCredentials([
            'terminal' => 'test',
            'merchant_id' => '123',
            'merchant_key' => 'test123',
        ]);

        $this->assertEquals('test', $globalPaymentsCredentials->getTerminal());
        $this->assertEquals('123', $globalPaymentsCredentials->getMerchantId());
        $this->assertEquals('test123', $globalPaymentsCredentials->getMerchantKey());

    }

    public function testShouldCreateGlobalPaymentsCredentialsObjectAndSetTheValuesSuccessfully()
    {
        $globalPaymentsCredentials = (new \Ipag\Sdk\Support\Credentials\PaymentMethods\GlobalPaymentsCredentials)
            ->setTerminal('test')
            ->setMerchantId('123')
            ->setMerchantKey('test123');

        $this->assertEquals('test', $globalPaymentsCredentials->getTerminal());
        $this->assertEquals('123', $globalPaymentsCredentials->getMerchantId());
        $this->assertEquals('test123', $globalPaymentsCredentials->getMerchantKey());

    }

    public function testShouldCreateEmptyGlobalPaymentsCredentialsObjectSuccessfully()
    {
        $globalPaymentsCredentials = new \Ipag\Sdk\Support\Credentials\PaymentMethods\GlobalPaymentsCredentials;

        $this->assertEmpty($globalPaymentsCredentials->getTerminal());
        $this->assertEmpty($globalPaymentsCredentials->getMerchantId());
        $this->assertEmpty($globalPaymentsCredentials->getMerchantKey());

    }

    public function testCreateAndSetEmptyPropertiesGlobalPaymentsCredentialsObjectSuccessfully()
    {
        $globalPaymentsCredentials = new \Ipag\Sdk\Support\Credentials\PaymentMethods\GlobalPaymentsCredentials([
            'terminal' => 'test',
            'merchant_id' => '123',
            'merchant_key' => 'test123',
        ]);

        $globalPaymentsCredentials
            ->setTerminal(null)
            ->setMerchantId(null)
            ->setMerchantKey(null);

        $this->assertEmpty($globalPaymentsCredentials->getTerminal());
        $this->assertEmpty($globalPaymentsCredentials->getMerchantId());
        $this->assertEmpty($globalPaymentsCredentials->getMerchantKey());

    }
}