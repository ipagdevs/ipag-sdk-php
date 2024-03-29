<?php

namespace Ipag\Sdk\Tests\Model;

use PHPUnit\Framework\TestCase;
use Ipag\Sdk\Model\Schema\Exception\MutatorAttributeException;

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
            "callback_url" => "https://ipag-sdk.requestcatcher.com/callback",
            "installments" => 3,
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
        $this->assertEquals("https://ipag-sdk.requestcatcher.com/callback", $subscriptionPlan->getCallbackUrl());
        $this->assertEquals(3, $subscriptionPlan->getInstallments());

        $this->assertInstanceOf(\Ipag\Sdk\Model\Trial::class, $subscriptionPlan->getTrial());

        $this->assertEquals(0, $subscriptionPlan->getTrial()->getAmount());
    }

    public function testShouldCreateSubscriptionPlanObjectAndSetTheValuesSuccessfully()
    {
        $subscriptionPlan = (new \Ipag\Sdk\Model\SubscriptionPlan())
            ->setName("PLANO GOLD")
            ->setDescription("Plano Gold com até 4 treinos por semana")
            ->setAmount(99.00)
            ->setFrequency("monthly")
            ->setInterval(1)
            ->setCycles(0)
            ->setBestDay(true)
            ->setProRatedCharge(true)
            ->setGracePeriod(0)
            ->setCallbackUrl("https://ipag-sdk.requestcatcher.com/callback")
            ->setInstallments(6)
            ->setTrial(
                (new \Ipag\Sdk\Model\Trial())
                    ->setAmount(0)
            );

        $this->assertEquals("PLANO GOLD", $subscriptionPlan->getName());
        $this->assertEquals("Plano Gold com até 4 treinos por semana", $subscriptionPlan->getDescription());
        $this->assertEquals(99.00, $subscriptionPlan->getAmount());
        $this->assertEquals("monthly", $subscriptionPlan->getFrequency());
        $this->assertEquals(1, $subscriptionPlan->getInterval());
        $this->assertEquals(0, $subscriptionPlan->getCycles());
        $this->assertEquals(true, $subscriptionPlan->getBestDay());
        $this->assertEquals(true, $subscriptionPlan->getProRatedCharge());
        $this->assertEquals(0, $subscriptionPlan->getGracePeriod());
        $this->assertEquals("https://ipag-sdk.requestcatcher.com/callback", $subscriptionPlan->getCallbackUrl());
        $this->assertEquals(6, $subscriptionPlan->getInstallments());

        $this->assertInstanceOf(\Ipag\Sdk\Model\Trial::class, $subscriptionPlan->getTrial());
        $this->assertEquals(0, $subscriptionPlan->getTrial()->getAmount());
    }

    public function testShouldCreateEmptySubscriptionPlanObjectSuccessfully()
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

    public function testCreateAndSetEmptyPropertiesSubscriptionPlanObjectSuccessfully()
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
            "callback_url" => "https://ipag-sdk.requestcatcher.com/callback",
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

    public function testShouldThrowATypeExceptionOnTheSubscriptionPlanAmountProperty()
    {
        $subscriptionPlan = new \Ipag\Sdk\Model\SubscriptionPlan();

        $this->expectException(\TypeError::class);

        $subscriptionPlan->setAmount('a');
    }

    public function testShouldThrowATypeExceptionOnTheSubscriptionPlanIntervalProperty()
    {
        $subscriptionPlan = new \Ipag\Sdk\Model\SubscriptionPlan();

        $this->expectException(\TypeError::class);

        $subscriptionPlan->setInterval('a');
    }

    public function testShouldThrowATypeExceptionOnTheSubscriptionPlanCyclesProperty()
    {
        $subscriptionPlan = new \Ipag\Sdk\Model\SubscriptionPlan();

        $this->expectException(\TypeError::class);

        $subscriptionPlan->setCycles('a');
    }

    public function testShouldThrowAValidationExceptionOnTheSubscriptionPlanAmountProperty()
    {
        $subscriptionPlan = new \Ipag\Sdk\Model\SubscriptionPlan();

        $this->expectException(MutatorAttributeException::class);

        $subscriptionPlan->setAmount(-1);
    }
    public function testShouldThrowAValidationExceptionOnTheSubscriptionPlanIntervalProperty()
    {
        $subscriptionPlan = new \Ipag\Sdk\Model\SubscriptionPlan();

        $this->expectException(MutatorAttributeException::class);

        $subscriptionPlan->setInterval(0);
    }

    public function testShouldThrowAValidationExceptionOnTheSubscriptionPlanCyclesProperty()
    {
        $subscriptionPlan = new \Ipag\Sdk\Model\SubscriptionPlan();

        $this->expectException(MutatorAttributeException::class);

        $subscriptionPlan->setCycles(-1);
    }
}
