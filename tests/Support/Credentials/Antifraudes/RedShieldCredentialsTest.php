<?php

namespace Ipag\Sdk\Tests\Model;

use PHPUnit\Framework\TestCase;

class RedShieldCredentialsTest extends TestCase
{
    public function testShouldCreateRedShieldCredentialsObjectWithConstructorSuccessfully()
    {
        $redShieldCredentials = new \Ipag\Sdk\Support\Credentials\Antifraudes\RedShieldCredentials([
            'token' => 'abcdef',
            'entityId' => '123',
            'channelId' => '321',
            'serviceId' => '213',
        ]);

        $this->assertEquals('abcdef', $redShieldCredentials->getToken());
        $this->assertEquals('123', $redShieldCredentials->getEntityId());
        $this->assertEquals('321', $redShieldCredentials->getChannelId());
        $this->assertEquals('213', $redShieldCredentials->getServiceId());

    }

    public function testShouldCreateRedShieldCredentialsObjectAndSetTheValuesSuccessfully()
    {
        $redShieldCredentials = (new \Ipag\Sdk\Support\Credentials\Antifraudes\RedShieldCredentials())
            ->setToken('abcdef')
            ->setEntityId('123')
            ->setChannelId('321')
            ->setServiceId('213');

        $this->assertEquals('abcdef', $redShieldCredentials->getToken());
        $this->assertEquals('123', $redShieldCredentials->getEntityId());
        $this->assertEquals('321', $redShieldCredentials->getChannelId());
        $this->assertEquals('213', $redShieldCredentials->getServiceId());

    }

    public function testShouldCreateEmptyRedShieldCredentialsObjectSuccessfully()
    {
        $redShieldCredentials = new \Ipag\Sdk\Support\Credentials\Antifraudes\RedShieldCredentials();

        $this->assertEmpty($redShieldCredentials->getToken());
        $this->assertEmpty($redShieldCredentials->getEntityId());
        $this->assertEmpty($redShieldCredentials->getChannelId());
        $this->assertEmpty($redShieldCredentials->getServiceId());

    }

    public function testCreateAndSetEmptyPropertiesRedShieldCredentialsObjectSuccessfully()
    {
        $redShieldCredentials = new \Ipag\Sdk\Support\Credentials\Antifraudes\RedShieldCredentials([
            'token' => 'abcdef',
            'entityId' => '123',
            'channelId' => '321',
            'serviceId' => '213',
        ]);

        $redShieldCredentials
            ->setToken(null)
            ->setEntityId(null)
            ->setChannelId(null)
            ->setServiceId(null);

        $this->assertEmpty($redShieldCredentials->getToken());
        $this->assertEmpty($redShieldCredentials->getEntityId());
        $this->assertEmpty($redShieldCredentials->getChannelId());
        $this->assertEmpty($redShieldCredentials->getServiceId());

    }
}