<?php

namespace Ipag\Sdk\Tests\Model;

use PHPUnit\Framework\TestCase;

class BinCredentialsTest extends TestCase
{
    public function testShouldCreateBinCredentialsObjectWithConstructorSuccessfully()
    {
        $binCredentials = new \Ipag\Sdk\Support\Credentials\PaymentMethods\BinCredentials([
            'store_id_subscription' => '123',
            'store_id' => 'abc123',
        ]);

        $this->assertEquals('123', $binCredentials->getStoreIdSubscription());
        $this->assertEquals('abc123', $binCredentials->getStoreId());

    }

    public function testShouldCreateBinCredentialsObjectAndSetTheValuesSuccessfully()
    {
        $binCredentials = (new \Ipag\Sdk\Support\Credentials\PaymentMethods\BinCredentials)
            ->setStoreIdSubscription('123')
            ->setStoreId('abc123');

        $this->assertEquals('123', $binCredentials->getStoreIdSubscription());
        $this->assertEquals('abc123', $binCredentials->getStoreId());

    }

    public function testShouldCreateEmptyBinCredentialsObjectSuccessfully()
    {
        $binCredentials = new \Ipag\Sdk\Support\Credentials\PaymentMethods\BinCredentials;

        $this->assertEmpty($binCredentials->getStoreIdSubscription());
        $this->assertEmpty($binCredentials->getStoreId());

    }

    public function testCreateAndSetEmptyPropertiesBinCredentialsObjectSuccessfully()
    {
        $binCredentials = new \Ipag\Sdk\Support\Credentials\PaymentMethods\BinCredentials([
            'store_id_subscription' => '123',
            'store_id' => 'abc123',
        ]);

        $binCredentials
            ->setStoreIdSubscription(null)
            ->setStoreId(null);

        $this->assertEmpty($binCredentials->getStoreIdSubscription());
        $this->assertEmpty($binCredentials->getStoreId());

    }
}