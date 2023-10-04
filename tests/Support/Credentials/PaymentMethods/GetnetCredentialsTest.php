<?php

namespace Ipag\Sdk\Tests\Model;

use PHPUnit\Framework\TestCase;

class GetnetCredentialsTest extends TestCase
{
    public function testShouldCreateGetnetCredentialsObjectWithConstructorSuccessfully()
    {
        $getnetCredentials = new \Ipag\Sdk\Support\Credentials\PaymentMethods\GetnetCredentials([
            'establishment_number' => '123',
            'key' => 'test123',
            'user' => 'test',
            'password' => 'test321',
        ]);

        $this->assertEquals('123', $getnetCredentials->getEstablishmentNumber());
        $this->assertEquals('test123', $getnetCredentials->getKey());
        $this->assertEquals('test', $getnetCredentials->getUser());
        $this->assertEquals('test321', $getnetCredentials->getPassword());

    }

    public function testShouldCreateGetnetCredentialsObjectAndSetTheValuesSuccessfully()
    {
        $getnetCredentials = (new \Ipag\Sdk\Support\Credentials\PaymentMethods\GetnetCredentials())
            ->setEstablishmentNumber('123')
            ->setKey('test123')
            ->setUser('test')
            ->setPassword('test321');

        $this->assertEquals('123', $getnetCredentials->getEstablishmentNumber());
        $this->assertEquals('test123', $getnetCredentials->getKey());
        $this->assertEquals('test', $getnetCredentials->getUser());
        $this->assertEquals('test321', $getnetCredentials->getPassword());

    }

    public function testShouldCreateEmptyGetnetCredentialsObjectSuccessfully()
    {
        $getnetCredentials = new \Ipag\Sdk\Support\Credentials\PaymentMethods\GetnetCredentials();

        $this->assertEmpty($getnetCredentials->getEstablishmentNumber());
        $this->assertEmpty($getnetCredentials->getKey());
        $this->assertEmpty($getnetCredentials->getUser());
        $this->assertEmpty($getnetCredentials->getPassword());

    }

    public function testCreateAndSetEmptyPropertiesGetnetCredentialsObjectSuccessfully()
    {
        $getnetCredentials = new \Ipag\Sdk\Support\Credentials\PaymentMethods\GetnetCredentials([
            'establishment_number' => '123',
            'key' => 'test123',
            'user' => 'test',
            'password' => 'test321',
        ]);

        $getnetCredentials
            ->setEstablishmentNumber(null)
            ->setKey(null)
            ->setUser(null)
            ->setPassword(null);

        $this->assertEmpty($getnetCredentials->getEstablishmentNumber());
        $this->assertEmpty($getnetCredentials->getKey());
        $this->assertEmpty($getnetCredentials->getUser());
        $this->assertEmpty($getnetCredentials->getPassword());

    }
}