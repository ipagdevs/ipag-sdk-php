<?php

namespace Ipag\Sdk\Tests\Model;

use Ipag\Sdk\Model\Schema\Exception\MutatorAttributeException;
use PHPUnit\Framework\TestCase;

class SubscriptionTest extends TestCase
{
    public function testShouldCreateSubscriptionPlanObjectWithConstructorSuccessfully()
    {
        $subscription = new \Ipag\Sdk\Model\Subscription([
            'is_active' => true,
            'profile_id' => 'SUB_001',
            'plan_id' => 1,
            'customer_id' => 100001,
            'starting_date' => '2021-07-10',
            'closing_date' => '2021-08-10',
            'callback_url' => 'https://minhaloja.com/callback',
            'creditcard_token' => '123'
        ]);

        $this->assertEquals(true, $subscription->getIsActive());
        $this->assertEquals('SUB_001', $subscription->getProfileId());
        $this->assertEquals(1, $subscription->getPlanId());
        $this->assertEquals(100001, $subscription->getCustomerId());
        $this->assertEquals('2021-07-10', $subscription->getStartingDate());
        $this->assertEquals('2021-08-10', $subscription->getClosingDate());
        $this->assertEquals('https://minhaloja.com/callback', $subscription->getCallbackUrl());
        $this->assertEquals('123', $subscription->getCreditcardToken());

    }

    public function testShouldCreateSubscriptionPlanObjectAndSetTheValuesSuccessfully()
    {
        $subscription = new \Ipag\Sdk\Model\Subscription();

        $subscription
            ->setIsActive(true)
            ->setProfileId('SUB_001')
            ->setPlanId(1)
            ->setCustomerId(100001)
            ->setStartingDate('2021-07-10')
            ->setClosingDate('2021-08-10')
            ->setCallbackUrl('https://minhaloja.com/callback')
            ->setCreditcardToken('123');

        $this->assertEquals(true, $subscription->getIsActive());
        $this->assertEquals('SUB_001', $subscription->getProfileId());
        $this->assertEquals(1, $subscription->getPlanId());
        $this->assertEquals(100001, $subscription->getCustomerId());
        $this->assertEquals('2021-07-10', $subscription->getStartingDate());
        $this->assertEquals('2021-08-10', $subscription->getClosingDate());
        $this->assertEquals('https://minhaloja.com/callback', $subscription->getCallbackUrl());
        $this->assertEquals('123', $subscription->getCreditcardToken());

    }

    public function testShouldCreateSubscriptionPlanEmptyObjectSuccessfully()
    {
        $subscription = new \Ipag\Sdk\Model\Subscription([
            'is_active' => true,
            'profile_id' => 'SUB_001',
            'plan_id' => 1,
            'customer_id' => 100001,
            'starting_date' => '2021-07-10',
            'closing_date' => '2021-08-10',
            'callback_url' => 'https://minhaloja.com/callback',
            'creditcard_token' => '123'
        ]);

        $subscription
            ->setIsActive(null)
            ->setProfileId(null)
            ->setPlanId(null)
            ->setCustomerId(null)
            ->setStartingDate(null)
            ->setClosingDate(null)
            ->setCallbackUrl(null)
            ->setCreditcardToken(null);

        $this->assertEmpty($subscription->getIsActive());
        $this->assertEmpty($subscription->getProfileId());
        $this->assertEmpty($subscription->getPlanId());
        $this->assertEmpty($subscription->getCustomerId());
        $this->assertEmpty($subscription->getStartingDate());
        $this->assertEmpty($subscription->getClosingDate());
        $this->assertEmpty($subscription->getCallbackUrl());
        $this->assertEmpty($subscription->getCreditcardToken());

    }

    public function testShouldThrowTypeExceptionInPlanIdProperty()
    {
        $subscription = new \Ipag\Sdk\Model\Subscription();

        $this->expectException(\TypeError::class);

        $subscription->setPlanId('AAA');

    }

    public function testShouldThrowTypeExceptionInCustomerIdProperty()
    {
        $subscription = new \Ipag\Sdk\Model\Subscription();

        $this->expectException(\TypeError::class);

        $subscription->setCustomerId('AAA');

    }

    public function testShouldThrowMutatorAttributeExceptionInStartingDateProperty()
    {
        $subscription = new \Ipag\Sdk\Model\Subscription();

        $this->expectException(MutatorAttributeException::class);

        $subscription->setStartingDate('10/07/2021');

    }

    public function testShouldThrowMutatorAttributeExceptionInClosingDateProperty()
    {
        $subscription = new \Ipag\Sdk\Model\Subscription();

        $this->expectException(MutatorAttributeException::class);

        $subscription->setClosingDate('10/07/2021');

    }

}