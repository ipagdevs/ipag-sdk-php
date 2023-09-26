<?php

namespace Ipag\Sdk\Tests\Model;

use PHPUnit\Framework\TestCase;

class StoneCredentialsTest extends TestCase
{
    public function testShouldCreateStoneCredentialsObjectWithConstructorSuccessfully()
    {
        $stoneCredentials = new \Ipag\Sdk\Support\Credentials\PaymentMethods\StoneCredentials([
            'stone_code' => 'test',
            'stone_sak' => 'test123',
        ]);

        $this->assertEquals('test', $stoneCredentials->getStoneCode());
        $this->assertEquals('test123', $stoneCredentials->getStoneSak());

    }

    public function testShouldCreateStoneCredentialsObjectAndSetTheValuesSuccessfully()
    {
        $stoneCredentials = (new \Ipag\Sdk\Support\Credentials\PaymentMethods\StoneCredentials)
            ->setStoneCode('test')
            ->setStoneSak('test123');

        $this->assertEquals('test', $stoneCredentials->getStoneCode());
        $this->assertEquals('test123', $stoneCredentials->getStoneSak());

    }

    public function testShouldCreateEmptyStoneCredentialsObjectSuccessfully()
    {
        $stoneCredentials = new \Ipag\Sdk\Support\Credentials\PaymentMethods\StoneCredentials;

        $this->assertEmpty($stoneCredentials->getStoneCode());
        $this->assertEmpty($stoneCredentials->getStoneSak());

    }

    public function testCreateAndSetEmptyPropertiesStoneCredentialsObjectSuccessfully()
    {
        $stoneCredentials = new \Ipag\Sdk\Support\Credentials\PaymentMethods\StoneCredentials([
            'stone_code' => 'test',
            'stone_sak' => 'test123',
        ]);

        $stoneCredentials
            ->setStoneCode(null)
            ->setStoneSak(null);

        $this->assertEmpty($stoneCredentials->getStoneCode());
        $this->assertEmpty($stoneCredentials->getStoneSak());

    }
}