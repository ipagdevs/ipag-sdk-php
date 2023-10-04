<?php

namespace Ipag\Sdk\Tests\Model;

use PHPUnit\Framework\TestCase;

class RedeCredentialsTest extends TestCase
{
    public function testShouldCreateRedeCredentialsObjectWithConstructorSuccessfully()
    {
        $redeCredentials = new \Ipag\Sdk\Support\Credentials\PaymentMethods\RedeCredentials([
            'erede_key' => 'test',
            'pv' => 'test123',
        ]);

        $this->assertEquals('test', $redeCredentials->getEredeKey());
        $this->assertEquals('test123', $redeCredentials->getPv());

    }

    public function testShouldCreateRedeCredentialsObjectAndSetTheValuesSuccessfully()
    {
        $redeCredentials = (new \Ipag\Sdk\Support\Credentials\PaymentMethods\RedeCredentials())
            ->setEredeKey('test')
            ->setPv('test123');

        $this->assertEquals('test', $redeCredentials->getEredeKey());
        $this->assertEquals('test123', $redeCredentials->getPv());

    }

    public function testShouldCreateEmptyRedeCredentialsObjectSuccessfully()
    {
        $redeCredentials = new \Ipag\Sdk\Support\Credentials\PaymentMethods\RedeCredentials();

        $this->assertEmpty($redeCredentials->getEredeKey());
        $this->assertEmpty($redeCredentials->getPv());

    }

    public function testCreateAndSetEmptyPropertiesRedeCredentialsObjectSuccessfully()
    {
        $redeCredentials = new \Ipag\Sdk\Support\Credentials\PaymentMethods\RedeCredentials([
            'erede_key' => 'test',
            'pv' => 'test123',
        ]);

        $redeCredentials
            ->setEredeKey(null)
            ->setPv(null);

        $this->assertEmpty($redeCredentials->getEredeKey());
        $this->assertEmpty($redeCredentials->getPv());

    }
}