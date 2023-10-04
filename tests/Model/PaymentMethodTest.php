<?php

namespace Ipag\Sdk\Tests\Model;

use Ipag\Sdk\Model\Schema\Exception\MutatorAttributeException;
use PHPUnit\Framework\TestCase;

class PaymentMethodTest extends TestCase
{
    public function testShouldCreatePaymentMethodObjectWithConstructorSuccessfully()
    {
        $paymentMethod = new \Ipag\Sdk\Model\PaymentMethod([
            'acquirer' => 'stone',
            'priority' => 100,
            'environment' => 'test',
            'capture' => true,
            'retry' => true,
            'credentials' => [
                'stone_code' => 'xxxxx',
                'stone_sak' => 'xxxxxx'
            ],
        ]);

        $this->assertEquals('stone', $paymentMethod->getAcquirer());
        $this->assertEquals(100, $paymentMethod->getPriority());
        $this->assertEquals('test', $paymentMethod->getEnvironment());
        $this->assertEquals(true, $paymentMethod->getCapture());
        $this->assertEquals(true, $paymentMethod->getRetry());

        $this->assertIsArray($paymentMethod->getCredentials());

        $this->assertEquals('xxxxx', $paymentMethod->getCredentials()['stone_code']);
        $this->assertEquals('xxxxxx', $paymentMethod->getCredentials()['stone_sak']);

    }

    public function testShouldCreatePaymentMethodObjectAndSetTheValuesSuccessfully()
    {
        $paymentMethod = (new \Ipag\Sdk\Model\PaymentMethod())
            ->setAcquirer('stone')
            ->setPriority(100)
            ->setEnvironment('test')
            ->setCapture(true)
            ->setRetry(true)
            ->setCredentials([
                'stone_code' => 'xxxxx',
                'stone_sak' => 'xxxxxx'
            ]);

        $this->assertEquals('stone', $paymentMethod->getAcquirer());
        $this->assertEquals(100, $paymentMethod->getPriority());
        $this->assertEquals('test', $paymentMethod->getEnvironment());
        $this->assertEquals(true, $paymentMethod->getCapture());
        $this->assertEquals(true, $paymentMethod->getRetry());

        $this->assertIsArray($paymentMethod->getCredentials());

        $this->assertEquals('xxxxx', $paymentMethod->getCredentials()['stone_code']);
        $this->assertEquals('xxxxxx', $paymentMethod->getCredentials()['stone_sak']);

    }

    public function testShouldCreateEmptyPaymentMethodObjectSuccessfully()
    {
        $paymentMethod = new \Ipag\Sdk\Model\PaymentMethod();

        $this->assertEmpty($paymentMethod->getAcquirer());
        $this->assertEmpty($paymentMethod->getPriority());
        $this->assertEmpty($paymentMethod->getEnvironment());
        $this->assertEmpty($paymentMethod->getCapture());
        $this->assertEmpty($paymentMethod->getRetry());
        $this->assertEmpty($paymentMethod->getCredentials());

    }

    public function testCreateAndSetEmptyPropertiesPaymentMethodObjectSuccessfully()
    {
        $paymentMethod = new \Ipag\Sdk\Model\PaymentMethod([
            'acquirer' => 'stone',
            'priority' => 100,
            'environment' => 'test',
            'capture' => true,
            'retry' => true,
            'credentials' => [
                'stone_code' => 'xxxxx',
                'stone_sak' => 'xxxxxx'
            ],
        ]);

        $paymentMethod
            ->setAcquirer(null)
            ->setPriority(null)
            ->setEnvironment(null)
            ->setCapture(null)
            ->setRetry(null)
            ->setCredentials(null);

        $this->assertEmpty($paymentMethod->getAcquirer());
        $this->assertEmpty($paymentMethod->getPriority());
        $this->assertEmpty($paymentMethod->getEnvironment());
        $this->assertEmpty($paymentMethod->getCapture());
        $this->assertEmpty($paymentMethod->getRetry());
        $this->assertEmpty($paymentMethod->getCredentials());

    }

    public function testShouldThrowATypeExceptionOnThePaymentMethodPriorityProperty()
    {
        $paymentMethod = new \Ipag\Sdk\Model\PaymentMethod();

        $this->expectException(\TypeError::class);

        $paymentMethod->setPriority('a');
    }

    public function testShouldThrowAValidationExceptionOnThePaymentMethodPriorityProperty()
    {
        $paymentMethod = new \Ipag\Sdk\Model\PaymentMethod();

        $this->expectException(MutatorAttributeException::class);

        $paymentMethod->setPriority(-1);
    }

}