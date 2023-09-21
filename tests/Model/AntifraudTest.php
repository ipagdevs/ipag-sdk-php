<?php

namespace Ipag\Sdk\Tests\Model;

use Ipag\Sdk\Model\Schema\Exception\MutatorAttributeException;
use Ipag\Sdk\Model\Schema\Exception\SchemaAttributeParseException;
use PHPUnit\Framework\TestCase;

class AntifraudTest extends TestCase
{
    public function testShouldCreateAntifraudObjectWithConstructorSuccessfully()
    {
        $antifraud = new \Ipag\Sdk\Model\Antifraud(
            [
                "provider" => [
                    "name" => "redshield",
                    "credentials" => [
                        "token" => "xxxxxxxx",
                    ]
                ],
                "settings" => [
                    "enabled" => true,
                ]
            ]
        );

        $this->assertInstanceOf(\Ipag\Sdk\Model\AntifraudProvider::class, $antifraud->getProvider());

        $this->assertEquals("redshield", $antifraud->getProvider()->getName());

        $this->assertIsArray($antifraud->getProvider()->getCredentials());

        $this->assertEquals("xxxxxxxx", $antifraud->getProvider()->getCredentials()['token']);

        $this->assertInstanceOf(\Ipag\Sdk\Model\AntifraudSettings::class, $antifraud->getSettings());

        $this->assertEquals(true, $antifraud->getSettings()->getEnabled());

    }

    public function testShouldCreateAntifraudObjectAndSetTheValuesSuccessfully()
    {
        $antifraud = (new \Ipag\Sdk\Model\Antifraud)
            ->setProvider(
                (new \Ipag\Sdk\Model\AntifraudProvider)
                    ->setName("redshield")
                    ->setCredentials(
                        [
                            "token" => "xxxxxxxx",
                        ]
                    )
            )
            ->setSettings(
                (new \Ipag\Sdk\Model\AntifraudSettings)
                    ->setEnabled(true)
            );

        $this->assertInstanceOf(\Ipag\Sdk\Model\AntifraudProvider::class, $antifraud->getProvider());

        $this->assertEquals("redshield", $antifraud->getProvider()->getName());

        $this->assertIsArray($antifraud->getProvider()->getCredentials());

        $this->assertEquals("xxxxxxxx", $antifraud->getProvider()->getCredentials()['token']);

        $this->assertInstanceOf(\Ipag\Sdk\Model\AntifraudSettings::class, $antifraud->getSettings());

        $this->assertEquals(true, $antifraud->getSettings()->getEnabled());

    }

    public function testShouldCreateEmptyAntifraudObjectSuccessfully()
    {
        $antifraud = new \Ipag\Sdk\Model\Antifraud;

        $this->assertEmpty($antifraud->getProvider());

        $this->assertEmpty($antifraud->getSettings());

    }

    public function testCreateAndSetEmptyPropertiesAntifraudObjectSuccessfully()
    {
        $antifraud = new \Ipag\Sdk\Model\Antifraud(
            [
                "provider" => [
                    "name" => "redshield",
                    "credentials" => [
                        "token" => "xxxxxxxx",
                    ]
                ],
                "settings" => [
                    "enabled" => true,
                ]
            ]
        );

        $antifraud
            ->setProvider(null)
            ->setSettings(null);

        $this->assertEmpty($antifraud->getProvider());

        $this->assertEmpty($antifraud->getSettings());

    }
}