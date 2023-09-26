<?php

namespace Ipag\Sdk\Tests\Model;

use PHPUnit\Framework\TestCase;

class ZoopCredentialsTest extends TestCase
{
    public function testShouldCreateZoopCredentialsObjectWithConstructorSuccessfully()
    {
        $zoopCredentials = new \Ipag\Sdk\Support\Credentials\PaymentMethods\ZoopCredentials([
            'marketplace_id' => '123',
            'publishable_key' => '123abc',
            'seller_id' => '321',
        ]);

        $this->assertEquals('123', $zoopCredentials->getMarketplaceId());
        $this->assertEquals('123abc', $zoopCredentials->getPublishableKey());
        $this->assertEquals('321', $zoopCredentials->getSellerId());

    }

    public function testShouldCreateZoopCredentialsObjectAndSetTheValuesSuccessfully()
    {
        $zoopCredentials = (new \Ipag\Sdk\Support\Credentials\PaymentMethods\ZoopCredentials)
            ->setMarketplaceId('123')
            ->setPublishableKey('123abc')
            ->setSellerId('321');

        $this->assertEquals('123', $zoopCredentials->getMarketplaceId());
        $this->assertEquals('123abc', $zoopCredentials->getPublishableKey());
        $this->assertEquals('321', $zoopCredentials->getSellerId());

    }

    public function testShouldCreateEmptyZoopCredentialsObjectSuccessfully()
    {
        $zoopCredentials = new \Ipag\Sdk\Support\Credentials\PaymentMethods\ZoopCredentials;

        $this->assertEmpty($zoopCredentials->getMarketplaceId());
        $this->assertEmpty($zoopCredentials->getPublishableKey());
        $this->assertEmpty($zoopCredentials->getSellerId());

    }

    public function testCreateAndSetEmptyPropertiesZoopCredentialsObjectSuccessfully()
    {
        $zoopCredentials = new \Ipag\Sdk\Support\Credentials\PaymentMethods\ZoopCredentials([
            'marketplace_id' => '123',
            'publishable_key' => '123abc',
            'seller_id' => '321',
        ]);

        $zoopCredentials
            ->setMarketplaceId(null)
            ->setPublishableKey(null)
            ->setSellerId(null);

        $this->assertEmpty($zoopCredentials->getMarketplaceId());
        $this->assertEmpty($zoopCredentials->getPublishableKey());
        $this->assertEmpty($zoopCredentials->getSellerId());

    }
}