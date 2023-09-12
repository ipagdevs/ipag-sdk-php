<?php

namespace Ipag\Sdk\Tests\Model;

use Ipag\Sdk\Model\Schema\Exception\MutatorAttributeException;
use PHPUnit\Framework\TestCase;

class SubscriptionPlanTest extends TestCase
{
    public function testShouldCreateSubscriptionPlanObjectWithConstructorSuccessfully()
    {
        $subscriptionPlan = new \Ipag\Sdk\Model\SubscriptionPlan([
            "name" => "PLANO GOLD",
            "description" => "Plano Gold com até 4 treinos por semana",
            "amount" => 0,
            "frequency" => "monthly",
            "interval" => 1,
            "cycles" => 0,
            "best_day" => true,
            "pro_rated_charge" => true,
            "grace_period" => 0,
            "callback_url" => "https://sualoja.com.br/ipag/callback",
            "trial" => [
                "amount" => 0,
            ]
        ]);

        $this->assertEquals("PLANO GOLD", $subscriptionPlan->getName());
        $this->assertEquals("Plano Gold com até 4 treinos por semana", $subscriptionPlan->getDescription());
        $this->assertEquals(0, $subscriptionPlan->getAmount());
        $this->assertEquals("monthly", $subscriptionPlan->getFrequency());
        $this->assertEquals(1, $subscriptionPlan->getInterval());
        $this->assertEquals(0, $subscriptionPlan->getCycles());
        $this->assertEquals(true, $subscriptionPlan->getBestDay());
        $this->assertEquals(true, $subscriptionPlan->getProRatedCharge());
        $this->assertEquals(0, $subscriptionPlan->getGracePeriod());
        $this->assertEquals("https://sualoja.com.br/ipag/callback", $subscriptionPlan->getCallbackUrl());

        $this->assertInstanceOf(\Ipag\Sdk\Model\Trial::class, $subscriptionPlan->getTrial());

        $this->assertEquals(0, $subscriptionPlan->getTrial()->getAmount());

    }

    public function testShouldCreateSubscriptionPlanObjectAndSetTheValuesSuccessfully()
    {
        $subscriptionPlan = new \Ipag\Sdk\Model\SubscriptionPlan();
        $subscriptionPlan
            ->setName("PLANO GOLD")
            ->setDescription("Plano Gold com até 4 treinos por semana")
            ->setAmount(99.00)
            ->setFrequency("monthly")
            ->setInterval(1)
            ->setCycles(0)
            ->setBestDay(true)
            ->setProRatedCharge(true)
            ->setGracePeriod(0)
            ->setCallbackUrl("https://sualoja.com.br/ipag/callback");

        $subscriptionPlan->setTrial(new \Ipag\Sdk\Model\Trial);
        $subscriptionPlan->getTrial()->setAmount(0);

        $this->assertEquals("PLANO GOLD", $subscriptionPlan->getName());
        $this->assertEquals("Plano Gold com até 4 treinos por semana", $subscriptionPlan->getDescription());
        $this->assertEquals(99.00, $subscriptionPlan->getAmount());
        $this->assertEquals("monthly", $subscriptionPlan->getFrequency());
        $this->assertEquals(1, $subscriptionPlan->getInterval());
        $this->assertEquals(0, $subscriptionPlan->getCycles());
        $this->assertEquals(true, $subscriptionPlan->getBestDay());
        $this->assertEquals(true, $subscriptionPlan->getProRatedCharge());
        $this->assertEquals(0, $subscriptionPlan->getGracePeriod());
        $this->assertEquals("https://sualoja.com.br/ipag/callback", $subscriptionPlan->getCallbackUrl());

        $this->assertInstanceOf(\Ipag\Sdk\Model\Trial::class, $subscriptionPlan->getTrial());
        $this->assertEquals(0, $subscriptionPlan->getTrial()->getAmount());

    }

    public function testShouldCreateSubscriptionPlanEmptyObjectSuccessfully()
    {
        $subscriptionPlan = new \Ipag\Sdk\Model\SubscriptionPlan();

        $this->assertEmpty($subscriptionPlan->getName());
        $this->assertEmpty($subscriptionPlan->getDescription());
        $this->assertEmpty($subscriptionPlan->getAmount());
        $this->assertEmpty($subscriptionPlan->getFrequency());
        $this->assertEmpty($subscriptionPlan->getInterval());
        $this->assertEmpty($subscriptionPlan->getCycles());
        $this->assertEmpty($subscriptionPlan->getBestDay());
        $this->assertEmpty($subscriptionPlan->getProRatedCharge());
        $this->assertEmpty($subscriptionPlan->getGracePeriod());
        $this->assertEmpty($subscriptionPlan->getCallbackUrl());

        $this->assertEmpty($subscriptionPlan->getTrial());

    }

    public function testShouldCreateSubscriptionPlanObjectAndSetNullPropertiesSuccessfully()
    {
        $subscriptionPlan = new \Ipag\Sdk\Model\SubscriptionPlan([
            "name" => "PLANO GOLD",
            "description" => "Plano Gold com até 4 treinos por semana",
            "amount" => 99.00,
            "frequency" => "monthly",
            "interval" => 1,
            "cycles" => 0,
            "best_day" => true,
            "pro_rated_charge" => true,
            "grace_period" => 0,
            "callback_url" => "https://sualoja.com.br/ipag/callback",
            "trial" => [
                "amount" => 0,
                "cycles" => 0
            ]
        ]);

        $subscriptionPlan
            ->setName(null)
            ->setDescription(null)
            ->setAmount(null)
            ->setFrequency(null)
            ->setInterval(null)
            ->setCycles(null)
            ->setBestDay(null)
            ->setProRatedCharge(null)
            ->setGracePeriod(null)
            ->setCallbackUrl(null);

        $subscriptionPlan->setTrial(null);

        $this->assertEmpty($subscriptionPlan->getName());
        $this->assertEmpty($subscriptionPlan->getDescription());
        $this->assertEmpty($subscriptionPlan->getAmount());
        $this->assertEmpty($subscriptionPlan->getFrequency());
        $this->assertEmpty($subscriptionPlan->getInterval());
        $this->assertEmpty($subscriptionPlan->getCycles());
        $this->assertEmpty($subscriptionPlan->getBestDay());
        $this->assertEmpty($subscriptionPlan->getProRatedCharge());
        $this->assertEmpty($subscriptionPlan->getGracePeriod());
        $this->assertEmpty($subscriptionPlan->getCallbackUrl());

        $this->assertEmpty($subscriptionPlan->getTrial());

    }

    public function testShouldThrowTypeExceptionInAmountProperty()
    {
        $subscriptionPlan = new \Ipag\Sdk\Model\SubscriptionPlan();

        $this->expectException(\TypeError::class);

        $subscriptionPlan->setAmount('a');
    }

    public function testShouldThrowTypeExceptionInIntervalProperty()
    {
        $subscriptionPlan = new \Ipag\Sdk\Model\SubscriptionPlan();

        $this->expectException(\TypeError::class);

        $subscriptionPlan->setInterval('a');
    }

    public function testShouldThrowTypeExceptionCyclesProperty()
    {
        $subscriptionPlan = new \Ipag\Sdk\Model\SubscriptionPlan();

        $this->expectException(\TypeError::class);

        $subscriptionPlan->setCycles('a');
    }

    public function testShouldThrowTheExceptionAmountOfTheMutatorAttributeException()
    {
        $subscriptionPlan = new \Ipag\Sdk\Model\SubscriptionPlan();

        $this->expectException(MutatorAttributeException::class);

        $subscriptionPlan->setAmount(-1);
    }
    public function testShouldThrowTheExceptionIntervalOfTheMutatorAttributeException()
    {
        $subscriptionPlan = new \Ipag\Sdk\Model\SubscriptionPlan();

        $this->expectException(MutatorAttributeException::class);

        $subscriptionPlan->setInterval(0);
    }

    public function testShouldThrowTheExceptionCyclesOfTheMutatorAttributeException()
    {
        $subscriptionPlan = new \Ipag\Sdk\Model\SubscriptionPlan();

        $this->expectException(MutatorAttributeException::class);

        $subscriptionPlan->setCycles(-1);
    }

}