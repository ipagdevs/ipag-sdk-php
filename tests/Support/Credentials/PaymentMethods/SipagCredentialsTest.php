<?php

namespace Ipag\Sdk\Tests\Model;

use PHPUnit\Framework\TestCase;

class SipagCredentialsTest extends TestCase
{
    public function testShouldCreateSipagCredentialsObjectWithConstructorSuccessfully()
    {
        $sipagCredentials = new \Ipag\Sdk\Support\Credentials\PaymentMethods\SipagCredentials([
            'store_id_subscription' => 'test',
            'store_id' => 'test123',
        ]);

        $this->assertEquals('test', $sipagCredentials->getStoreIdSubscription());
        $this->assertEquals('test123', $sipagCredentials->getStoreId());

    }

    public function testShouldCreateSipagCredentialsObjectAndSetTheValuesSuccessfully()
    {
        $sipagCredentials = (new \Ipag\Sdk\Support\Credentials\PaymentMethods\SipagCredentials)
            ->setStoreIdSubscription('test')
            ->setStoreId('test123');

        $this->assertEquals('test', $sipagCredentials->getStoreIdSubscription());
        $this->assertEquals('test123', $sipagCredentials->getStoreId());

    }

    public function testShouldCreateEmptySipagCredentialsObjectSuccessfully()
    {
        $sipagCredentials = new \Ipag\Sdk\Support\Credentials\PaymentMethods\SipagCredentials;

        $this->assertEmpty($sipagCredentials->getStoreIdSubscription());
        $this->assertEmpty($sipagCredentials->getStoreId());

    }

    public function testCreateAndSetEmptyPropertiesSipagCredentialsObjectSuccessfully()
    {
        $sipagCredentials = new \Ipag\Sdk\Support\Credentials\PaymentMethods\SipagCredentials([
            'store_id_subscription' => 'test',
            'store_id' => 'test123',
        ]);

        $sipagCredentials
            ->setStoreIdSubscription(null)
            ->setStoreId(null);

        $this->assertEmpty($sipagCredentials->getStoreIdSubscription());
        $this->assertEmpty($sipagCredentials->getStoreId());

    }
}