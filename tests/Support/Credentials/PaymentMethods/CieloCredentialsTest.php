<?php

namespace Ipag\Sdk\Tests\Model;

use PHPUnit\Framework\TestCase;

class CieloCredentialsTest extends TestCase
{
    public function testShouldCreateCieloCredentialsObjectWithConstructorSuccessfully()
    {
        $cieloCredentials = new \Ipag\Sdk\Support\Credentials\PaymentMethods\CieloCredentials([
            'merchant_id' => 'test',
            'merchant_key' => 'test123',
        ]);

        $this->assertEquals('test', $cieloCredentials->getMerchantId());
        $this->assertEquals('test123', $cieloCredentials->getMerchantKey());

    }

    public function testShouldCreateCieloCredentialsObjectAndSetTheValuesSuccessfully()
    {
        $cieloCredentials = (new \Ipag\Sdk\Support\Credentials\PaymentMethods\CieloCredentials())
            ->setMerchantId('test')
            ->setMerchantKey('test123');

        $this->assertEquals('test', $cieloCredentials->getMerchantId());
        $this->assertEquals('test123', $cieloCredentials->getMerchantKey());

    }

    public function testShouldCreateEmptyCieloCredentialsObjectSuccessfully()
    {
        $cieloCredentials = new \Ipag\Sdk\Support\Credentials\PaymentMethods\CieloCredentials();

        $this->assertEmpty($cieloCredentials->getMerchantId());
        $this->assertEmpty($cieloCredentials->getMerchantKey());

    }

    public function testCreateAndSetEmptyPropertiesCieloCredentialsObjectSuccessfully()
    {
        $cieloCredentials = new \Ipag\Sdk\Support\Credentials\PaymentMethods\CieloCredentials([
            'merchant_id' => 'test',
            'merchant_key' => 'test123',
        ]);

        $cieloCredentials
            ->setMerchantId(null)
            ->setMerchantKey(null);

        $this->assertEmpty($cieloCredentials->getMerchantId());
        $this->assertEmpty($cieloCredentials->getMerchantKey());

    }
}