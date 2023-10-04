<?php

namespace Ipag\Sdk\Tests\Model;

use PHPUnit\Framework\TestCase;

class KondutoProviderTest extends TestCase
{
    public function testShouldCreateKondutoProviderObjectWithConstructorSuccessfully()
    {
        $kondutoProvider = new \Ipag\Sdk\Support\Provider\Antifraudes\KondutoProvider([
            'apiKey' => '123',
            'publicKey' => 'abc123',
        ]);

        $this->assertEquals('konduto', $kondutoProvider->getName());

        $this->assertEquals('123', $kondutoProvider->getCredentials()->getApiKey());
        $this->assertEquals('abc123', $kondutoProvider->getCredentials()->getPublicKey());

    }

    public function testShouldCreateKondutoProviderObjectAndSetTheValuesSuccessfully()
    {
        $kondutoProvider = (new \Ipag\Sdk\Support\Provider\Antifraudes\KondutoProvider())
            ->setCredentials(
                (new \Ipag\Sdk\Support\Credentials\Antifraudes\KondutoCredentials())
                    ->setApiKey('123')
                    ->setPublicKey('abc123')
            );

        $this->assertEquals('konduto', $kondutoProvider->getName());

        $this->assertEquals('123', $kondutoProvider->getCredentials()->getApiKey());
        $this->assertEquals('abc123', $kondutoProvider->getCredentials()->getPublicKey());

    }

    public function testShouldCreateEmptyKondutoProviderObjectSuccessfully()
    {
        $kondutoProvider = new \Ipag\Sdk\Support\Provider\Antifraudes\KondutoProvider();

        $this->assertEquals('konduto', $kondutoProvider->getName());

        $this->assertEmpty($kondutoProvider->getCredentials());

    }

    public function testCreateAndSetEmptyPropertiesKondutoProviderObjectSuccessfully()
    {
        $kondutoProvider = new \Ipag\Sdk\Support\Provider\Antifraudes\KondutoProvider([
            'apiKey' => '123',
            'publicKey' => 'abc123',
        ]);

        $kondutoProvider
            ->setCredentials(null);

        $this->assertEquals('konduto', $kondutoProvider->getName());

        $this->assertEmpty($kondutoProvider->getCredentials());

    }
}