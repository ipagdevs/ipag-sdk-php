<?php

namespace Ipag\Sdk\Tests\Model;

use Ipag\Sdk\Model\Schema\Exception\MutatorAttributeException;
use Ipag\Sdk\Model\Schema\Exception\SchemaAttributeParseException;
use PHPUnit\Framework\TestCase;

class VoucherTest extends TestCase
{
    public function testShouldCreateVoucherObjectWithConstructorSuccessfully()
    {
        $voucher = new \Ipag\Sdk\Model\Voucher([
            'order' => [
                'order_id' => '1000077',
            ],
            'seller' => [
                'cpf_cnpj' => '074.598.263-83'
            ],
            'customer' => [
                'name' => 'FULANO DA SILVA',
            ],
        ]);

        $this->assertInstanceOf(\Ipag\Sdk\Model\Order::class, $voucher->getOrder());
        $this->assertEquals('1000077', $voucher->getOrder()->getOrderId());

        $this->assertInstanceOf(\Ipag\Sdk\Model\Seller::class, $voucher->getSeller());
        $this->assertEquals('07459826383', $voucher->getSeller()->getCpfCnpj());

        $this->assertInstanceOf(\Ipag\Sdk\Model\Customer::class, $voucher->getCustomer());
        $this->assertEquals('FULANO DA SILVA', $voucher->getCustomer()->getName());

    }

    public function testShouldCreateVoucherObjectAndSetTheValuesSuccessfully()
    {
        $voucher = (new \Ipag\Sdk\Model\Voucher)
            ->setOrder(
                (new \Ipag\Sdk\Model\Order)
                    ->setOrderId(
                        '1000077'
                    )
            )
            ->setSeller(
                (new \Ipag\Sdk\Model\Seller)
                    ->setCpfCnpj(
                        '074.598.263-83'
                    )
            )
            ->setCustomer(
                (new \Ipag\Sdk\Model\Customer)
                    ->setName(
                        'FULANO DA SILVA'
                    )
                    ->setAddress(
                        (new \Ipag\Sdk\Model\Address)
                            ->setStreet('Av. Brasil')
                    )
            );

        $this->assertInstanceOf(\Ipag\Sdk\Model\Order::class, $voucher->getOrder());
        $this->assertEquals('1000077', $voucher->getOrder()->getOrderId());

        $this->assertInstanceOf(\Ipag\Sdk\Model\Seller::class, $voucher->getSeller());
        $this->assertEquals('07459826383', $voucher->getSeller()->getCpfCnpj());

        $this->assertInstanceOf(\Ipag\Sdk\Model\Customer::class, $voucher->getCustomer());
        $this->assertEquals('FULANO DA SILVA', $voucher->getCustomer()->getName());

        $this->assertInstanceOf(\Ipag\Sdk\Model\Address::class, $voucher->getCustomer()->getAddress());
        $this->assertEquals('Av. Brasil', $voucher->getCustomer()->getAddress()->getStreet());

    }

    public function testShouldCreateEmptyVoucherObjectSuccessfully()
    {
        $voucher = new \Ipag\Sdk\Model\Voucher;

        $this->assertEmpty($voucher->getOrder());
        $this->assertEmpty($voucher->getSeller());
        $this->assertEmpty($voucher->getCustomer());

    }

    public function testCreateAndSetEmptyPropertiesVoucherObjectSuccessfully()
    {
        $voucher = new \Ipag\Sdk\Model\Voucher([
            'order' => [
                'order_id' => '1000077',
            ],
            'seller' => [
                'cpf_cnpj' => '074.598.263-83'
            ],
            'customer' => [
                'name' => 'FULANO DA SILVA',
            ],
        ]);

        $voucher
            ->setOrder(null)
            ->setSeller(null)
            ->setCustomer(null);

        $this->assertEmpty($voucher->getOrder());
        $this->assertEmpty($voucher->getSeller());
        $this->assertEmpty($voucher->getCustomer());

    }
}