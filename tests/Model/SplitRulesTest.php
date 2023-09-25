<?php

namespace Ipag\Sdk\Tests\Model;

use Ipag\Sdk\Model\Schema\Exception\MutatorAttributeException;
use Ipag\Sdk\Model\Schema\Exception\SchemaAttributeParseException;
use PHPUnit\Framework\TestCase;

class SplitRulesTest extends TestCase
{
    public function testShouldCreateSellerObjectWithConstructorSuccessfully()
    {
        $splitRules = new \Ipag\Sdk\Model\SplitRules([
            "receiver_id" => "1000000",
            "percentage" => 10.00
        ]);

        $this->assertEquals("1000000", $splitRules->getReceiverId());
        $this->assertEquals(10.00, $splitRules->getPercentage());

    }

    public function testShouldCreateSellerObjectAndSetTheValuesSuccessfully()
    {
        $splitRules = (new \Ipag\Sdk\Model\SplitRules)
            ->setReceiverId("1000000")
            ->setPercentage(10.00);

        $this->assertEquals("1000000", $splitRules->getReceiverId());
        $this->assertEquals(10.00, $splitRules->getPercentage());

    }

    public function testShouldCreateEmptySellerObjectSuccessfully()
    {
        $splitRules = new \Ipag\Sdk\Model\SplitRules;

        $this->assertEmpty($splitRules->getReceiverId());
        $this->assertEmpty($splitRules->getPercentage());

    }

    public function testCreateAndSetEmptyPropertiesSellerObjectSuccessfully()
    {
        $splitRules = new \Ipag\Sdk\Model\SplitRules([
            "receiver_id" => "1000000",
            "percentage" => 10.00
        ]);

        $splitRules
            ->setReceiverId(null)
            ->setPercentage(null);

        $this->assertEmpty($splitRules->getReceiverId());
        $this->assertEmpty($splitRules->getPercentage());

    }

    public function testShouldThrowATypeExceptionOnTheSplitRulesAmountProperty()
    {
        $splitRules = new \Ipag\Sdk\Model\SplitRules;

        $this->expectException(\TypeError::class);

        $splitRules->setAmount('a');
    }

    public function testShouldThrowAValidationExceptionOnTheSplitRulesAmountProperty()
    {
        $splitRules = new \Ipag\Sdk\Model\SplitRules;

        $this->expectException(MutatorAttributeException::class);

        $splitRules->setAmount(-1);
    }

    public function testShouldThrowATypeExceptionOnTheSplitRulesPercentageProperty()
    {
        $splitRules = new \Ipag\Sdk\Model\SplitRules;

        $this->expectException(\TypeError::class);

        $splitRules->setPercentage('a');
    }

    public function testShouldThrowAValidationExceptionOnTheSplitRulesPercentageProperty()
    {
        $splitRules = new \Ipag\Sdk\Model\SplitRules;

        $this->expectException(MutatorAttributeException::class);

        $splitRules->setPercentage(-1);
    }

}