<?php

namespace Ipag\Sdk\Tests\Model;

use PHPUnit\Framework\TestCase;

class KondutoCredentialsTest extends TestCase
{
    public function testShouldCreateKondutoCredentialsObjectWithConstructorSuccessfully()
    {
        $kondutoCredentials = new \Ipag\Sdk\Support\Credentials\Antifraudes\KondutoCredentials([
            'apiKey' => '123456',
            'publicKey' => 'abc123',
        ]);

        $this->assertEquals('123456', $kondutoCredentials->getApiKey());
        $this->assertEquals('abc123', $kondutoCredentials->getPublicKey());
    }

    public function testShouldCreateKondutoCredentialsObjectAndSetTheValuesSuccessfully()
    {
        $kondutoCredentials = (new \Ipag\Sdk\Support\Credentials\Antifraudes\KondutoCredentials())
            ->setApiKey('123456')
            ->setPublicKey('abc123');

        $this->assertEquals('123456', $kondutoCredentials->getApiKey());
        $this->assertEquals('abc123', $kondutoCredentials->getPublicKey());

    }

    public function testShouldCreateEmptyKondutoCredentialsObjectSuccessfully()
    {
        $kondutoCredentials = new \Ipag\Sdk\Support\Credentials\Antifraudes\KondutoCredentials();

        $this->assertEmpty($kondutoCredentials->getApiKey());
        $this->assertEmpty($kondutoCredentials->getPublicKey());

    }

    public function testCreateAndSetEmptyPropertiesKondutoCredentialsObjectSuccessfully()
    {
        $kondutoCredentials = new \Ipag\Sdk\Support\Credentials\Antifraudes\KondutoCredentials([
            'apiKey' => '123456',
            'publicKey' => 'abc123',
        ]);

        $kondutoCredentials
            ->setApiKey(null)
            ->setPublicKey(null);

        $this->assertEmpty($kondutoCredentials->getApiKey());
        $this->assertEmpty($kondutoCredentials->getPublicKey());

    }
}