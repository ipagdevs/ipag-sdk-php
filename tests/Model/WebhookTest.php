<?php

namespace Ipag\Sdk\Tests\Model;

use PHPUnit\Framework\TestCase;

class WebhookTest extends TestCase
{
    public function testShouldCreateWebhookObjectWithConstructorSuccessfully()
    {
        $webhook = new \Ipag\Sdk\Model\Webhook([
            'http_method' => 'POST',
            'url' => 'https://minhaloja.com.br/callback',
            'description' => 'Webhook para receber notificações de atualização das transações',
            'actions' => [
                \Ipag\Sdk\Core\IpagEnvironment::webhook()::PAYMENT_LINK_PAYMENT_SUCCEEDED,
                \Ipag\Sdk\Core\IpagEnvironment::webhook()::PAYMENT_LINK_PAYMENT_FAILED,
            ]
        ]);

        $this->assertEquals('POST', $webhook->getHttpMethod());
        $this->assertEquals('https://minhaloja.com.br/callback', $webhook->getUrl());
        $this->assertEquals('Webhook para receber notificações de atualização das transações', $webhook->getDescription());
        $this->assertEquals([
            \Ipag\Sdk\Core\IpagEnvironment::webhook()::PAYMENT_LINK_PAYMENT_SUCCEEDED,
            \Ipag\Sdk\Core\IpagEnvironment::webhook()::PAYMENT_LINK_PAYMENT_FAILED,
        ], $webhook->getActions());
    }

    public function testShouldCreateWebhookObjectAndSetTheValuesSuccessfully()
    {
        $webhook = (new \Ipag\Sdk\Model\Webhook)
            ->setHttpMethod('POST')
            ->setUrl('https://minhaloja.com.br/callback')
            ->setDescription('Webhook para receber notificações de atualização das transações')
            ->setActions([
                \Ipag\Sdk\Core\IpagEnvironment::webhook()::PAYMENT_LINK_PAYMENT_SUCCEEDED,
                \Ipag\Sdk\Core\IpagEnvironment::webhook()::PAYMENT_LINK_PAYMENT_FAILED,
            ]);

        $this->assertEquals('POST', $webhook->getHttpMethod());
        $this->assertEquals('https://minhaloja.com.br/callback', $webhook->getUrl());
        $this->assertEquals('Webhook para receber notificações de atualização das transações', $webhook->getDescription());
        $this->assertEquals([
            \Ipag\Sdk\Core\IpagEnvironment::webhook()::PAYMENT_LINK_PAYMENT_SUCCEEDED,
            \Ipag\Sdk\Core\IpagEnvironment::webhook()::PAYMENT_LINK_PAYMENT_FAILED,
        ], $webhook->getActions());

    }

    public function testShouldCreateEmptyWebhookObjectSuccessfully()
    {
        $webhook = new \Ipag\Sdk\Model\Webhook;

        $this->assertEmpty($webhook->getHttpMethod());
        $this->assertEmpty($webhook->getUrl());
        $this->assertEmpty($webhook->getDescription());
        $this->assertEmpty($webhook->getActions());

    }

    public function testCreateAndSetEmptyPropertiesWebhookObjectSuccessfully()
    {
        $webhook = new \Ipag\Sdk\Model\Webhook([
            'http_method' => 'POST',
            'url' => 'https://minhaloja.com.br/callback',
            'description' => 'Webhook para receber notificações de atualização das transações',
            'actions' => [
                \Ipag\Sdk\Core\IpagEnvironment::webhook()::PAYMENT_LINK_PAYMENT_SUCCEEDED,
                \Ipag\Sdk\Core\IpagEnvironment::webhook()::PAYMENT_LINK_PAYMENT_FAILED,
            ]
        ]);

        $webhook
            ->setHttpMethod(null)
            ->setUrl(null)
            ->setDescription(null)
            ->setActions(null);

        $this->assertEmpty($webhook->getHttpMethod());
        $this->assertEmpty($webhook->getUrl());
        $this->assertEmpty($webhook->getDescription());
        $this->assertEmpty($webhook->getActions());

    }

    public function testShouldThrowATypeExceptionOnTheWebhookActionsProperty()
    {
        $webhook = new \Ipag\Sdk\Model\Webhook;

        $this->expectException(\TypeError::class);

        $webhook->setActions(1);

    }

}