<?php

namespace Ipag\Sdk\Tests\Model;

use Ipag\Sdk\Model\Schema\Exception\MutatorAttributeException;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testShouldCreateProductObjectWithConstructorSuccessfully()
    {
        $product = new \Ipag\Sdk\Model\Product([
            'name' => 'Smart TV LG 55 4K UHD',
            'unit_price' => 3.999,
            'quantity' => 1,
            'sku' => 'LG55UHD',
            'description' => 'Smart TV LG 55 4K UHD',
        ]);

        $this->assertEquals('Smart TV LG 55 4K UHD', $product->getName());
        $this->assertEquals(3.999, $product->getUnitPrice());
        $this->assertEquals(1, $product->getQuantity());
        $this->assertEquals('LG55UHD', $product->getSku());
        $this->assertEquals('Smart TV LG 55 4K UHD', $product->getDescription());

    }

    public function testShouldCreateProductObjectAndSetTheValuesSuccessfully()
    {
        $product = (new \Ipag\Sdk\Model\Product)
            ->setName('Smart TV LG 55 4K UHD')
            ->setUnitPrice(3.999)
            ->setQuantity(1)
            ->setSku('LG55UHD')
            ->setDescription('Smart TV LG 55 4K UHD');

        $this->assertEquals('Smart TV LG 55 4K UHD', $product->getName());
        $this->assertEquals(3.999, $product->getUnitPrice());
        $this->assertEquals(1, $product->getQuantity());
        $this->assertEquals('LG55UHD', $product->getSku());
        $this->assertEquals('Smart TV LG 55 4K UHD', $product->getDescription());

    }

    public function testShouldCreateEmptyProductObjectSuccessfully()
    {
        $product = new \Ipag\Sdk\Model\Product;

        $this->assertEmpty($product->getName());
        $this->assertEmpty($product->getUnitPrice());
        $this->assertEmpty($product->getQuantity());
        $this->assertEmpty($product->getSku());
        $this->assertEmpty($product->getDescription());

    }

    public function testCreateAndSetEmptyPropertiesProductObjectSuccessfully()
    {
        $product = new \Ipag\Sdk\Model\Product([
            'name' => 'Smart TV LG 55 4K UHD',
            'unit_price' => 3.999,
            'quantity' => 1,
            'sku' => 'LG55UHD',
            'description' => 'Smart TV LG 55 4K UHD',
        ]);

        $product
            ->setName(null)
            ->setUnitPrice(null)
            ->setQuantity(null)
            ->setSku(null)
            ->setDescription(null);

        $this->assertEmpty($product->getName());
        $this->assertEmpty($product->getUnitPrice());
        $this->assertEmpty($product->getQuantity());
        $this->assertEmpty($product->getSku());
        $this->assertEmpty($product->getDescription());

    }

    public function testShouldThrowATypeExceptionOnTheProductUnitPriceProperty()
    {
        $product = new \Ipag\Sdk\Model\Product;

        $this->expectException(\TypeError::class);

        $product->setUnitPrice('a');
    }

    public function testShouldThrowAValidationExceptionOnTheProductUnitPriceProperty()
    {
        $product = new \Ipag\Sdk\Model\Product;

        $this->expectException(MutatorAttributeException::class);

        $product->setUnitPrice(-1);
    }

    public function testShouldThrowATypeExceptionOnTheProductQuantityProperty()
    {
        $product = new \Ipag\Sdk\Model\Product;

        $this->expectException(\TypeError::class);

        $product->setQuantity('a');
    }

    public function testShouldThrowAValidationExceptionOnTheProductQuantityProperty()
    {
        $product = new \Ipag\Sdk\Model\Product;

        $this->expectException(MutatorAttributeException::class);

        $product->setQuantity(0);
    }

}