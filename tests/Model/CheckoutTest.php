<?php

namespace Ipag\Sdk\Tests\Model;

use PHPUnit\Framework\TestCase;

class CheckoutTest extends TestCase
{
    public function testShouldCreateCheckoutObjectWithConstructorSuccessfully()
    {
        $checkout = new \Ipag\Sdk\Model\Checkout([
            'customer' => [
                'name' => 'Lívia Julia Eduarda Barros',
            ],
            'installment_setting' => [
                'max_installments' => 12,
            ],
            'order' => [
                'order_id' => '1000077',
            ],
            'products' => [
                [
                    'name' => 'Smart TV LG 55 4K UHD',
                ],
                [
                    'name' => 'Smart TV 50" UHD 4K',
                ],
            ],
            'split_rules' => [
                [
                    "receiver_id" => "1000000",
                ],
                [
                    "receiver_id" => "1000001",
                ],
            ],
            'seller_id' => '100014',
            'expires_in' => 60,
        ]);

        $this->assertInstanceOf(\Ipag\Sdk\Model\Customer::class, $checkout->getCustomer());
        $this->assertEquals('Lívia Julia Eduarda Barros', $checkout->getCustomer()->getName());

        $this->assertInstanceOf(\Ipag\Sdk\Model\InstallmentSetting::class, $checkout->getInstallmentSetting());
        $this->assertEquals(12, $checkout->getInstallmentSetting()->getMaxInstallments());

        $this->assertInstanceOf(\Ipag\Sdk\Model\Order::class, $checkout->getOrder());
        $this->assertEquals('1000077', $checkout->getOrder()->getOrderId());

        $this->assertIsArray($checkout->getProducts());

        $this->assertInstanceOf(\Ipag\Sdk\Model\Product::class, $checkout->getProducts()[0]);
        $this->assertInstanceOf(\Ipag\Sdk\Model\Product::class, $checkout->getProducts()[1]);

        $this->assertEquals('Smart TV LG 55 4K UHD', $checkout->getProducts()[0]->getName());
        $this->assertEquals('Smart TV 50" UHD 4K', $checkout->getProducts()[1]->getName());

        $this->assertIsArray($checkout->getSplitRules());

        $this->assertInstanceOf(\Ipag\Sdk\Model\SplitRules::class, $checkout->getSplitRules()[0]);
        $this->assertInstanceOf(\Ipag\Sdk\Model\SplitRules::class, $checkout->getSplitRules()[1]);

        $this->assertEquals('1000000', $checkout->getSplitRules()[0]->getReceiverId());
        $this->assertEquals('1000001', $checkout->getSplitRules()[1]->getReceiverId());

        $this->assertEquals('100014', $checkout->getSellerId());
        $this->assertEquals(60, $checkout->getExpiresIn());

    }

    public function testShouldCreateCheckoutObjectAndSetTheValuesSuccessfully()
    {
        $checkout = (new \Ipag\Sdk\Model\Checkout())
            ->setCustomer(
                (new \Ipag\Sdk\Model\Customer)
                    ->setName('Lívia Julia Eduarda Barros')
            )
            ->setInstallmentSetting(
                (new \Ipag\Sdk\Model\InstallmentSetting)
                    ->setMaxInstallments(12)
            )
            ->setOrder(
                (new \Ipag\Sdk\Model\Order)
                    ->setOrderId('1000077')
            )
            ->addProduct(
                (new \Ipag\Sdk\Model\Product())
                    ->setName('Smart TV LG 55 4K UHD')
            )
            ->addProduct(
                (new \Ipag\Sdk\Model\Product())
                    ->setName('Smart TV 50" UHD 4K')
            )
            ->addSplitRule(
                (new \Ipag\Sdk\Model\SplitRules)
                    ->setReceiverId('1000000')
            )
            ->addSplitRule(
                (new \Ipag\Sdk\Model\SplitRules)
                    ->setReceiverId('1000001')
            )
            ->setSellerId('100014')
            ->setExpiresIn(60);

        $this->assertInstanceOf(\Ipag\Sdk\Model\Customer::class, $checkout->getCustomer());
        $this->assertEquals('Lívia Julia Eduarda Barros', $checkout->getCustomer()->getName());

        $this->assertInstanceOf(\Ipag\Sdk\Model\InstallmentSetting::class, $checkout->getInstallmentSetting());
        $this->assertEquals(12, $checkout->getInstallmentSetting()->getMaxInstallments());

        $this->assertInstanceOf(\Ipag\Sdk\Model\Order::class, $checkout->getOrder());
        $this->assertEquals('1000077', $checkout->getOrder()->getOrderId());

        $this->assertIsArray($checkout->getProducts());

        $this->assertInstanceOf(\Ipag\Sdk\Model\Product::class, $checkout->getProducts()[0]);
        $this->assertInstanceOf(\Ipag\Sdk\Model\Product::class, $checkout->getProducts()[1]);

        $this->assertEquals('Smart TV LG 55 4K UHD', $checkout->getProducts()[0]->getName());
        $this->assertEquals('Smart TV 50" UHD 4K', $checkout->getProducts()[1]->getName());

        $this->assertIsArray($checkout->getSplitRules());

        $this->assertInstanceOf(\Ipag\Sdk\Model\SplitRules::class, $checkout->getSplitRules()[0]);
        $this->assertInstanceOf(\Ipag\Sdk\Model\SplitRules::class, $checkout->getSplitRules()[1]);

        $this->assertEquals('1000000', $checkout->getSplitRules()[0]->getReceiverId());
        $this->assertEquals('1000001', $checkout->getSplitRules()[1]->getReceiverId());

        $this->assertEquals('100014', $checkout->getSellerId());
        $this->assertEquals(60, $checkout->getExpiresIn());

    }

    public function testShouldCreateEmptyCheckoutObjectSuccessfully()
    {
        $checkout = new \Ipag\Sdk\Model\Checkout;

        $this->assertEmpty($checkout->getCustomer());
        $this->assertEmpty($checkout->getInstallmentSetting());
        $this->assertEmpty($checkout->getOrder());
        $this->assertEmpty($checkout->getProducts());
        $this->assertEmpty($checkout->getSplitRules());
        $this->assertEmpty($checkout->getSellerId());
        $this->assertEmpty($checkout->getExpiresIn());

        $this->assertIsArray($checkout->getProducts());
        $this->assertIsArray($checkout->getSplitRules());

    }

    public function testCreateAndSetEmptyPropertiesCheckoutObjectSuccessfully()
    {
        $checkout = new \Ipag\Sdk\Model\Checkout([
            'customer' => [
                'name' => 'Lívia Julia Eduarda Barros',
            ],
            'installment_setting' => [
                'max_installments' => 12,
            ],
            'order' => [
                'order_id' => '1000077',
            ],
            'products' => [
                [
                    'name' => 'Smart TV LG 55 4K UHD',
                ],
                [
                    'name' => 'Smart TV 50" UHD 4K',
                ],
            ],
            'split_rules' => [
                [
                    "receiver_id" => "1000000",
                ],
                [
                    "receiver_id" => "1000001",
                ],
            ],
            'seller_id' => '100014',
            'expires_in' => 60,
        ]);

        $checkout
            ->setCustomer(null)
            ->setInstallmentSetting(null)
            ->setOrder(null)
            ->setProducts([])
            ->setSplitRules([])
            ->setSellerId(null)
            ->setExpiresIn(null);

        $this->assertEmpty($checkout->getCustomer());
        $this->assertEmpty($checkout->getInstallmentSetting());
        $this->assertEmpty($checkout->getOrder());
        $this->assertEmpty($checkout->getProducts());
        $this->assertEmpty($checkout->getSplitRules());
        $this->assertEmpty($checkout->getSellerId());
        $this->assertEmpty($checkout->getExpiresIn());

        $this->assertIsArray($checkout->getProducts());
        $this->assertIsArray($checkout->getSplitRules());

    }

}