<?php

namespace Ipag\Sdk\Tests\Model;

use PHPUnit\Framework\TestCase;

class WebhookTest extends TestCase
{
    public function testShouldCreateWebhookObjectWithConstructorSuccessfully()
    {
        $webhook = new \Ipag\Sdk\Model\Webhook([
            'http_method' => 'POST',
            'url' => 'https://ipag-sdk.requestcatcher.com/webhook',
            'description' => 'Webhook para receber notificações de atualização das transações',
            'actions' => [
                \Ipag\Sdk\Core\Enums\Webhooks::PAYMENT_LINK_PAYMENT_SUCCEEDED,
                \Ipag\Sdk\Core\Enums\Webhooks::PAYMENT_LINK_PAYMENT_FAILED,
            ]
        ]);

        $this->assertEquals('POST', $webhook->getHttpMethod());
        $this->assertEquals('https://ipag-sdk.requestcatcher.com/webhook', $webhook->getUrl());
        $this->assertEquals('Webhook para receber notificações de atualização das transações', $webhook->getDescription());
        $this->assertEquals([
            \Ipag\Sdk\Core\Enums\Webhooks::PAYMENT_LINK_PAYMENT_SUCCEEDED,
            \Ipag\Sdk\Core\Enums\Webhooks::PAYMENT_LINK_PAYMENT_FAILED,
        ], $webhook->getActions());
    }

    public function testShouldCreateWebhookObjectAndSetTheValuesSuccessfully()
    {
        $webhook = (new \Ipag\Sdk\Model\Webhook())
            ->setHttpMethod('POST')
            ->setUrl('https://ipag-sdk.requestcatcher.com/webhook')
            ->setDescription('Webhook para receber notificações de atualização das transações')
            ->setActions([
                \Ipag\Sdk\Core\Enums\Webhooks::PAYMENT_LINK_PAYMENT_SUCCEEDED,
                \Ipag\Sdk\Core\Enums\Webhooks::PAYMENT_LINK_PAYMENT_FAILED,
            ]);

        $this->assertEquals('POST', $webhook->getHttpMethod());
        $this->assertEquals('https://ipag-sdk.requestcatcher.com/webhook', $webhook->getUrl());
        $this->assertEquals('Webhook para receber notificações de atualização das transações', $webhook->getDescription());
        $this->assertEquals([
            \Ipag\Sdk\Core\Enums\Webhooks::PAYMENT_LINK_PAYMENT_SUCCEEDED,
            \Ipag\Sdk\Core\Enums\Webhooks::PAYMENT_LINK_PAYMENT_FAILED,
        ], $webhook->getActions());

    }

    public function testShouldCreateEmptyWebhookObjectSuccessfully()
    {
        $webhook = new \Ipag\Sdk\Model\Webhook();

        $this->assertEmpty($webhook->getHttpMethod());
        $this->assertEmpty($webhook->getUrl());
        $this->assertEmpty($webhook->getDescription());
        $this->assertEmpty($webhook->getActions());

    }

    public function testCreateAndSetEmptyPropertiesWebhookObjectSuccessfully()
    {
        $webhook = new \Ipag\Sdk\Model\Webhook([
            'http_method' => 'POST',
            'url' => 'https://ipag-sdk.requestcatcher.com/webhook',
            'description' => 'Webhook para receber notificações de atualização das transações',
            'actions' => [
                \Ipag\Sdk\Core\Enums\Webhooks::PAYMENT_LINK_PAYMENT_SUCCEEDED,
                \Ipag\Sdk\Core\Enums\Webhooks::PAYMENT_LINK_PAYMENT_FAILED,
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
        $webhook = new \Ipag\Sdk\Model\Webhook();

        $this->expectException(\TypeError::class);

        $webhook->setActions(1);

    }

}