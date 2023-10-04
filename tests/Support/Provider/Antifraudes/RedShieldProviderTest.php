<?php

namespace Ipag\Sdk\Tests\Model;

use PHPUnit\Framework\TestCase;

class RedShieldProviderTest extends TestCase
{
    public function testShouldCreateRedShieldProviderObjectWithConstructorSuccessfully()
    {
        $redShieldProvider = new \Ipag\Sdk\Support\Provider\Antifraudes\RedShieldProvider([
            'token' => '123',
            'entityId' => 'abc',
            'channelId' => '123abc',
            'serviceId' => 'abc123',
        ]);

        $this->assertEquals('redshield', $redShieldProvider->getName());

        $this->assertEquals('123', $redShieldProvider->getCredentials()->getToken());
        $this->assertEquals('abc', $redShieldProvider->getCredentials()->getEntityId());
        $this->assertEquals('123abc', $redShieldProvider->getCredentials()->getChannelId());
        $this->assertEquals('abc123', $redShieldProvider->getCredentials()->getServiceId());

    }

    public function testShouldCreateRedShieldProviderObjectAndSetTheValuesSuccessfully()
    {
        $redShieldProvider = (new \Ipag\Sdk\Support\Provider\Antifraudes\RedShieldProvider())
            ->setCredentials(
                (new \Ipag\Sdk\Support\Credentials\Antifraudes\RedShieldCredentials())
                    ->setToken('123')
                    ->setEntityId('abc')
                    ->setChannelId('123abc')
                    ->setServiceId('abc123')
            );

        $this->assertEquals('redshield', $redShieldProvider->getName());

        $this->assertEquals('123', $redShieldProvider->getCredentials()->getToken());
        $this->assertEquals('abc', $redShieldProvider->getCredentials()->getEntityId());
        $this->assertEquals('123abc', $redShieldProvider->getCredentials()->getChannelId());
        $this->assertEquals('abc123', $redShieldProvider->getCredentials()->getServiceId());

    }

    public function testShouldCreateEmptyRedShieldProviderObjectSuccessfully()
    {
        $redShieldProvider = new \Ipag\Sdk\Support\Provider\Antifraudes\RedShieldProvider();

        $this->assertEquals('redshield', $redShieldProvider->getName());

        $this->assertEmpty($redShieldProvider->getCredentials());

    }

    public function testCreateAndSetEmptyPropertiesRedShieldProviderObjectSuccessfully()
    {
        $redShieldProvider = new \Ipag\Sdk\Support\Provider\Antifraudes\RedShieldProvider([
            'token' => '123',
            'entityId' => 'abc',
            'channelId' => '123abc',
            'serviceId' => 'abc123',
        ]);

        $redShieldProvider
            ->setCredentials(null);

        $this->assertEquals('redshield', $redShieldProvider->getName());

        $this->assertEmpty($redShieldProvider->getCredentials());

    }
}