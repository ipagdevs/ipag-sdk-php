<?php

namespace Ipag\Sdk\Tests\Model;

use PHPUnit\Framework\TestCase;

class ClearSaleCredentialsTest extends TestCase
{
    public function testShouldCreateClearSaleCredentialsObjectWithConstructorSuccessfully()
    {
        $clearSaleCredentials = new \Ipag\Sdk\Support\Credentials\Antifraudes\ClearSaleCredentials([
            'name' => 'test',
            'password' => 'test123'
        ]);

        $this->assertEquals('test', $clearSaleCredentials->getName());
        $this->assertEquals('test123', $clearSaleCredentials->getPassword());

    }

    public function testShouldCreateClearSaleCredentialsObjectAndSetTheValuesSuccessfully()
    {
        $clearSaleCredentials = (new \Ipag\Sdk\Support\Credentials\Antifraudes\ClearSaleCredentials)
            ->setName('test')
            ->setPassword('test123');

        $this->assertEquals('test', $clearSaleCredentials->getName());
        $this->assertEquals('test123', $clearSaleCredentials->getPassword());

    }

    public function testShouldCreateEmptyClearSaleCredentialsObjectSuccessfully()
    {
        $clearSaleCredentials = new \Ipag\Sdk\Support\Credentials\Antifraudes\ClearSaleCredentials;

        $this->assertEmpty($clearSaleCredentials->getName());
        $this->assertEmpty($clearSaleCredentials->getPassword());

    }

    public function testCreateAndSetEmptyPropertiesClearSaleCredentialsObjectSuccessfully()
    {
        $clearSaleCredentials = new \Ipag\Sdk\Support\Credentials\Antifraudes\ClearSaleCredentials([
            'name' => 'test',
            'password' => 'test123'
        ]);

        $clearSaleCredentials
            ->setName(null)
            ->setPassword(null);

        $this->assertEmpty($clearSaleCredentials->getName());
        $this->assertEmpty($clearSaleCredentials->getPassword());

    }
}