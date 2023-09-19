<?php

namespace Ipag\Sdk\Tests\Model;

use Ipag\Sdk\Model\Schema\Exception\MutatorAttributeException;
use PHPUnit\Framework\TestCase;

class PaymentLinkTest extends TestCase
{
    public function testShouldCreatePaymentLinkObjectWithConstructorSuccessfully()
    {
        $paymentLink = new \Ipag\Sdk\Model\PaymentLink([
            'external_code' => '131',
            'amount' => 0,
            'description' => 'LINK DE PAGAMENTO SUPER BACANA',
            'expireAt' => '2020-12-30 23:00:00',
            'buttons' => [
                'enable' => false,
            ],
            'checkout_settings' => [
                'max_installments' => 12,
            ],
        ]);

        $this->assertEquals('131', $paymentLink->getExternalCode());
        $this->assertEquals(0, $paymentLink->getAmount());
        $this->assertEquals('LINK DE PAGAMENTO SUPER BACANA', $paymentLink->getDescription());
        $this->assertEquals('2020-12-30 23:00:00', $paymentLink->getExpireAt());

        $this->assertInstanceOf(\Ipag\Sdk\Model\Buttons::class, $paymentLink->getButtons());
        $this->assertEquals(false, $paymentLink->getButtons()->getEnable());

        $this->assertInstanceOf(\Ipag\Sdk\Model\CheckoutSettings::class, $paymentLink->getCheckoutSettings());
        $this->assertEquals(12, $paymentLink->getCheckoutSettings()->getMaxInstallments());

    }

    public function testShouldCreatePaymentLinkObjectAndSetTheValuesSuccessfully()
    {
        $paymentLink = (new \Ipag\Sdk\Model\PaymentLink)
            ->setExternalCode('131')
            ->setAmount(0)
            ->setDescription('LINK DE PAGAMENTO SUPER BACANA')
            ->setExpireAt('2020-12-30 23:00:00')
            ->setButtons(
                (new \Ipag\Sdk\Model\Buttons)
                    ->setEnable(false)
            )
            ->setCheckoutSettings(
                (new \Ipag\Sdk\Model\CheckoutSettings)
                    ->setMaxInstallments(12)
            );

        $this->assertEquals('131', $paymentLink->getExternalCode());
        $this->assertEquals(0, $paymentLink->getAmount());
        $this->assertEquals('LINK DE PAGAMENTO SUPER BACANA', $paymentLink->getDescription());
        $this->assertEquals('2020-12-30 23:00:00', $paymentLink->getExpireAt());

        $this->assertInstanceOf(\Ipag\Sdk\Model\Buttons::class, $paymentLink->getButtons());
        $this->assertEquals(false, $paymentLink->getButtons()->getEnable());

        $this->assertInstanceOf(\Ipag\Sdk\Model\CheckoutSettings::class, $paymentLink->getCheckoutSettings());
        $this->assertEquals(12, $paymentLink->getCheckoutSettings()->getMaxInstallments());

    }

    public function testShouldCreateEmptyPaymentLinkObjectSuccessfully()
    {
        $paymentLink = new \Ipag\Sdk\Model\PaymentLink;

        $this->assertEmpty($paymentLink->getExternalCode());
        $this->assertEmpty($paymentLink->getAmount());
        $this->assertEmpty($paymentLink->getDescription());
        $this->assertEmpty($paymentLink->getExpireAt());

        $this->assertEmpty($paymentLink->getButtons());

        $this->assertEmpty($paymentLink->getCheckoutSettings());

    }

    public function testCreateAndSetEmptyPropertiesPaymentLinkObjectSuccessfully()
    {
        $paymentLink = new \Ipag\Sdk\Model\PaymentLink([
            'external_code' => '131',
            'amount' => 0,
            'description' => 'LINK DE PAGAMENTO SUPER BACANA',
            'expireAt' => '2020-12-30 23:00:00',
            'buttons' => [
                'enable' => false,
            ],
            'checkout_settings' => [
                'max_installments' => 12,
            ],
        ]);

        $paymentLink
            ->setExternalCode(null)
            ->setAmount(null)
            ->setDescription(null)
            ->setExpireAt(null)
            ->setButtons(null)
            ->setCheckoutSettings(null);

        $this->assertEmpty($paymentLink->getExternalCode());
        $this->assertEmpty($paymentLink->getAmount());
        $this->assertEmpty($paymentLink->getDescription());
        $this->assertEmpty($paymentLink->getExpireAt());

        $this->assertEmpty($paymentLink->getButtons());

        $this->assertEmpty($paymentLink->getCheckoutSettings());

    }

    public function testShouldThrowATypeExceptionOnThePaymentLinkAmountProperty()
    {
        $paymentLink = new \Ipag\Sdk\Model\PaymentLink;

        $this->expectException(\TypeError::class);

        $paymentLink->setAmount('a');
    }

    public function testShouldThrowAValidationExceptionOnThePaymentLinkAmountProperty()
    {
        $paymentLink = new \Ipag\Sdk\Model\PaymentLink;

        $this->expectException(MutatorAttributeException::class);

        $paymentLink->setAmount(-1);
    }

}