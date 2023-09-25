<?php

namespace Ipag\Sdk\Tests\Model;

use Ipag\Sdk\Model\Schema\Exception\MutatorAttributeException;
use Ipag\Sdk\Model\Schema\Exception\SchemaAttributeParseException;
use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase
{
    public function testShouldCreateOrderObjectWithConstructorSuccessfully()
    {
        $order = new \Ipag\Sdk\Model\Order([
            'order_id' => '1000077',
            'amount' => 499.99,
            'created_at' => '2020-08-03 21:45:10',
            'callback_url' => 'https://meusite.com.br/retorno'
        ]);

        $this->assertEquals('1000077', $order->getOrderId());
        $this->assertEquals(499.99, $order->getAmount());
        $this->assertEquals('2020-08-03 21:45:10', $order->getCreatedAt());
        $this->assertEquals('https://meusite.com.br/retorno', $order->getCallbackUrl());

    }

    public function testShouldCreateOrderObjectAndSetTheValuesSuccessfully()
    {
        $order = (new \Ipag\Sdk\Model\Order)
            ->setOrderId('1000077')
            ->setAmount(499.99)
            ->setCreatedAt('2020-08-03 21:45:10')
            ->setCallbackUrl('https://meusite.com.br/retorno');

        $this->assertEquals('1000077', $order->getOrderId());
        $this->assertEquals(499.99, $order->getAmount());
        $this->assertEquals('2020-08-03 21:45:10', $order->getCreatedAt());
        $this->assertEquals('https://meusite.com.br/retorno', $order->getCallbackUrl());

    }

    public function testShouldCreateEmptyOrderObjectSuccessfully()
    {
        $order = new \Ipag\Sdk\Model\Order;

        $this->assertEmpty($order->getOrderId());
        $this->assertEmpty($order->getAmount());
        $this->assertEmpty($order->getCreatedAt());
        $this->assertEmpty($order->getCallbackUrl());

    }

    public function testCreateAndSetEmptyPropertiesOrderObjectSuccessfully()
    {
        $order = new \Ipag\Sdk\Model\Order([
            'order_id' => '1000077',
            'amount' => 499.99,
            'created_at' => '2020-08-03 21:45:10',
            'callback_url' => 'https://meusite.com.br/retorno'
        ]);

        $order
            ->setOrderId(null)
            ->setAmount(null)
            ->setCreatedAt(null)
            ->setCallbackUrl(null);

        $this->assertEmpty($order->getOrderId());
        $this->assertEmpty($order->getAmount());
        $this->assertEmpty($order->getCreatedAt());
        $this->assertEmpty($order->getCallbackUrl());

    }

    public function testShouldThrowATypeExceptionOnTheOrderAmountProperty()
    {
        $order = new \Ipag\Sdk\Model\Order;

        $this->expectException(\TypeError::class);

        $order->setAmount('a');
    }

    public function testShouldThrowAValidationExceptionOnTheOrderAmountProperty()
    {
        $order = new \Ipag\Sdk\Model\Order;

        $this->expectException(MutatorAttributeException::class);

        $order->setAmount(-1);
    }

}