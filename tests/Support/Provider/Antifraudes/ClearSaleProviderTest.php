<?php

namespace Ipag\Sdk\Tests\Model;

use PHPUnit\Framework\TestCase;

class ClearSaleProviderTest extends TestCase
{
    public function testShouldCreateClearSaleProviderObjectWithConstructorSuccessfully()
    {
        $clearSaleProvider = new \Ipag\Sdk\Support\Provider\Antifraudes\ClearSaleProvider([
            'name' => 'test',
            'password' => 'test123'
        ]);

        $this->assertEquals('clearsale', $clearSaleProvider->getName());

        $this->assertInstanceOf(\Ipag\Sdk\Support\Credentials\Antifraudes\ClearSaleCredentials::class, $clearSaleProvider->getCredentials());

        $this->assertEquals('test', $clearSaleProvider->getCredentials()->getName());
        $this->assertEquals('test123', $clearSaleProvider->getCredentials()->getPassword());

    }

    public function testShouldCreateClearSaleProviderObjectAndSetTheValuesSuccessfully()
    {
        $clearSaleProvider = (new \Ipag\Sdk\Support\Provider\Antifraudes\ClearSaleProvider())
            ->setCredentials(
                (new \Ipag\Sdk\Support\Credentials\Antifraudes\ClearSaleCredentials())
                    ->setName('test')
                    ->setPassword('test123')
            );

        $this->assertEquals('clearsale', $clearSaleProvider->getName());

        $this->assertInstanceOf(\Ipag\Sdk\Support\Credentials\Antifraudes\ClearSaleCredentials::class, $clearSaleProvider->getCredentials());

        $this->assertEquals('test', $clearSaleProvider->getCredentials()->getName());
        $this->assertEquals('test123', $clearSaleProvider->getCredentials()->getPassword());

    }

    public function testShouldCreateEmptyClearSaleProviderObjectSuccessfully()
    {
        $clearSaleProvider = new \Ipag\Sdk\Support\Provider\Antifraudes\ClearSaleProvider();

        $this->assertEquals('clearsale', $clearSaleProvider->getName());

        $this->assertEmpty($clearSaleProvider->getCredentials());

    }

    public function testCreateAndSetEmptyPropertiesClearSaleProviderObjectSuccessfully()
    {
        $clearSaleProvider = new \Ipag\Sdk\Support\Provider\Antifraudes\ClearSaleProvider([
            'name' => 'test',
            'password' => 'test123'
        ]);

        $clearSaleProvider
            ->setCredentials(null);

        $this->assertEquals('clearsale', $clearSaleProvider->getName());

        $this->assertEmpty($clearSaleProvider->getCredentials());

    }
}