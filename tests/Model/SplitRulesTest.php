<?php

namespace Ipag\Sdk\Tests\Model;

use Ipag\Sdk\Model\Schema\Exception\MutatorAttributeException;
use PHPUnit\Framework\TestCase;

class SplitRulesTest extends TestCase
{
    public function testShouldCreateSplitRulesObjectWithConstructorSuccessfully()
    {
        $splitRules = new \Ipag\Sdk\Model\SplitRules([
            "receiver_id" => "1000000",
            "percentage" => 10.00,
            "amount" => 9.99,
            "charge_processing_fee" => false
        ]);

        $this->assertEquals("1000000", $splitRules->getReceiverId());
        $this->assertEquals(10.00, $splitRules->getPercentage());
        $this->assertEquals(9.99, $splitRules->getAmount());
        $this->assertEquals(false, $splitRules->getChargeProcessingFee());

    }

    public function testShouldCreateSplitRulesObjectAndSetTheValuesSuccessfully()
    {
        $splitRules = (new \Ipag\Sdk\Model\SplitRules())
            ->setReceiverId("1000000")
            ->setPercentage(10.00)
            ->setAmount(9.99)
            ->setChargeProcessingFee(false);

        $this->assertEquals("1000000", $splitRules->getReceiverId());
        $this->assertEquals(10.00, $splitRules->getPercentage());
        $this->assertEquals(9.99, $splitRules->getAmount());
        $this->assertEquals(false, $splitRules->getChargeProcessingFee());

    }

    public function testShouldCreateEmptySplitRulesObjectSuccessfully()
    {
        $splitRules = new \Ipag\Sdk\Model\SplitRules();

        $this->assertEmpty($splitRules->getReceiverId());
        $this->assertEmpty($splitRules->getPercentage());
        $this->assertEmpty($splitRules->getAmount());
        $this->assertEmpty($splitRules->getChargeProcessingFee());

    }

    public function testCreateAndSetEmptyPropertiesSplitRulesObjectSuccessfully()
    {
        $splitRules = new \Ipag\Sdk\Model\SplitRules([
            "receiver_id" => "1000000",
            "percentage" => 10.00,
            "amount" => 9.99,
            "charge_processing_fee" => false
        ]);

        $splitRules
            ->setReceiverId(null)
            ->setPercentage(null)
            ->setAmount(null)
            ->setChargeProcessingFee(null);

        $this->assertEmpty($splitRules->getReceiverId());
        $this->assertEmpty($splitRules->getPercentage());
        $this->assertEmpty($splitRules->getAmount());
        $this->assertEmpty($splitRules->getChargeProcessingFee());

    }

    public function testShouldThrowATypeExceptionOnTheSplitRulesAmountProperty()
    {
        $splitRules = new \Ipag\Sdk\Model\SplitRules();

        $this->expectException(\TypeError::class);

        $splitRules->setAmount('a');
    }

    public function testShouldThrowAValidationExceptionOnTheSplitRulesAmountProperty()
    {
        $splitRules = new \Ipag\Sdk\Model\SplitRules();

        $this->expectException(MutatorAttributeException::class);

        $splitRules->setAmount(-1);
    }

    public function testShouldThrowATypeExceptionOnTheSplitRulesPercentageProperty()
    {
        $splitRules = new \Ipag\Sdk\Model\SplitRules();

        $this->expectException(\TypeError::class);

        $splitRules->setPercentage('a');
    }

    public function testShouldThrowAValidationExceptionOnTheSplitRulesPercentageProperty()
    {
        $splitRules = new \Ipag\Sdk\Model\SplitRules();

        $this->expectException(MutatorAttributeException::class);

        $splitRules->setPercentage(-1);
    }

}