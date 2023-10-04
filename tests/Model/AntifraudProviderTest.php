<?php

namespace Ipag\Sdk\Tests\Model;

use PHPUnit\Framework\TestCase;

class AntifraudProviderTest extends TestCase
{
    public function testShouldCreateAntifraudProviderObjectWithConstructorSuccessfully()
    {
        $antifraudProvider = new \Ipag\Sdk\Model\AntifraudProvider([
            'name' => 'redshield',
            'credentials' => [
                'token' => 'xxxxxxxx',
                'entityId' => 'xxxxxxxx',
                'channelId' => 'xxxxxxxx',
                'serviceId' => 'xxxxxxxx'
            ]
        ]);

        $this->assertEquals('redshield', $antifraudProvider->getName());
        $this->assertEquals('xxxxxxxx', $antifraudProvider->getCredentials()['token']);
        $this->assertEquals('xxxxxxxx', $antifraudProvider->getCredentials()['entityId']);
        $this->assertEquals('xxxxxxxx', $antifraudProvider->getCredentials()['channelId']);
        $this->assertEquals('xxxxxxxx', $antifraudProvider->getCredentials()['serviceId']);

    }

    public function testShouldCreateAntifraudProviderObjectAndSetTheValuesSuccessfully()
    {
        $antifraudProvider = (new \Ipag\Sdk\Model\AntifraudProvider())
            ->setName('redshield')
            ->setCredentials([
                'token' => 'xxxxxxxx',
                'entityId' => 'xxxxxxxx',
                'channelId' => 'xxxxxxxx',
                'serviceId' => 'xxxxxxxx'
            ]);

        $this->assertEquals('redshield', $antifraudProvider->getName());
        $this->assertEquals('xxxxxxxx', $antifraudProvider->getCredentials()['token']);
        $this->assertEquals('xxxxxxxx', $antifraudProvider->getCredentials()['entityId']);
        $this->assertEquals('xxxxxxxx', $antifraudProvider->getCredentials()['channelId']);
        $this->assertEquals('xxxxxxxx', $antifraudProvider->getCredentials()['serviceId']);

    }

    public function testShouldCreateEmptyAntifraudProviderObjectSuccessfully()
    {
        $antifraudProvider = new \Ipag\Sdk\Model\AntifraudProvider();

        $this->assertEmpty($antifraudProvider->getName());
        $this->assertEmpty($antifraudProvider->getCredentials());

    }

    public function testCreateAndSetEmptyPropertiesAntifraudProviderObjectSuccessfully()
    {
        $antifraudProvider = new \Ipag\Sdk\Model\AntifraudProvider([
            'name' => 'redshield',
            'credentials' => [
                'token' => 'xxxxxxxx',
                'entityId' => 'xxxxxxxx',
                'channelId' => 'xxxxxxxx',
                'serviceId' => 'xxxxxxxx'
            ]
        ]);

        $antifraudProvider
            ->setName(null)
            ->setCredentials(null);

        $this->assertEmpty($antifraudProvider->getName());
        $this->assertEmpty($antifraudProvider->getCredentials());

    }
}