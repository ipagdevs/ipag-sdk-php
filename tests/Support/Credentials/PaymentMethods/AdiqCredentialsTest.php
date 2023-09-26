<?php

namespace Ipag\Sdk\Tests\Model;

use PHPUnit\Framework\TestCase;

class AdiqCredentialsTest extends TestCase
{
    public function testShouldCreateAdiqCredentialsObjectWithConstructorSuccessfully()
    {
        $adiqCredentials = new \Ipag\Sdk\Support\Credentials\PaymentMethods\AdiqCredentials([
            'client_id' => 'test',
            'client_secret' => 'test123',
        ]);

        $this->assertEquals('test', $adiqCredentials->getClientId());
        $this->assertEquals('test123', $adiqCredentials->getClientSecret());

    }

    public function testShouldCreateAdiqCredentialsObjectAndSetTheValuesSuccessfully()
    {
        $adiqCredentials = (new \Ipag\Sdk\Support\Credentials\PaymentMethods\AdiqCredentials)
            ->setClientId('test')
            ->setClientSecret('test123');

        $this->assertEquals('test', $adiqCredentials->getClientId());
        $this->assertEquals('test123', $adiqCredentials->getClientSecret());

    }

    public function testShouldCreateEmptyAdiqCredentialsObjectSuccessfully()
    {
        $adiqCredentials = new \Ipag\Sdk\Support\Credentials\PaymentMethods\AdiqCredentials;

        $this->assertEmpty($adiqCredentials->getClientId());
        $this->assertEmpty($adiqCredentials->getClientSecret());

    }

    public function testCreateAndSetEmptyPropertiesAdiqCredentialsObjectSuccessfully()
    {
        $adiqCredentials = new \Ipag\Sdk\Support\Credentials\PaymentMethods\AdiqCredentials([
            'client_id' => 'test',
            'client_secret' => 'test123',
        ]);

        $adiqCredentials
            ->setClientId(null)
            ->setClientSecret(null);

        $this->assertEmpty($adiqCredentials->getClientId());
        $this->assertEmpty($adiqCredentials->getClientSecret());

    }
}