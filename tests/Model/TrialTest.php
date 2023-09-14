<?php

namespace Ipag\Sdk\Tests\Model;

use Ipag\Sdk\Model\Schema\Exception\MutatorAttributeException;
use PHPUnit\Framework\TestCase;

class TrialTest extends TestCase
{
    public function testShouldCreateTrialObjectWithConstructorSuccessfully()
    {
        $trial = new \Ipag\Sdk\Model\Trial([
            'amount' => 0,
            'cycles' => 0
        ]);

        $this->assertEquals(0, $trial->getAmount());
        $this->assertEquals(0, $trial->getCycles());
    }

    public function testShouldCreateTrialObjectAndSetTheValuesSuccessfully()
    {
        $trial = (new \Ipag\Sdk\Model\Trial())
            ->setAmount(2.5)
            ->setCycles(2);

        $this->assertEquals(2.5, $trial->getAmount());
        $this->assertEquals(2, $trial->getCycles());

    }

    public function testShouldCreateEmptyTrialObjectSuccessfully()
    {
        $trial = new \Ipag\Sdk\Model\Trial();

        $this->assertEmpty($trial->getAmount());
        $this->assertEmpty($trial->getCycles());
    }

    public function testCreateAndSetEmptyPropertiesTrialObjectSuccessfully()
    {
        $trial = new \Ipag\Sdk\Model\Trial([
            'amount' => 1.5,
            'cycles' => 1
        ]);

        $trial
            ->setAmount(null)
            ->setCycles(null);

        $this->assertEmpty($trial->getAmount());
        $this->assertEmpty($trial->getCycles());

    }

    public function testShouldThrowATypeExceptionOnTheTrialAmountProperty()
    {
        $trial = new \Ipag\Sdk\Model\Trial();

        $this->expectException(\TypeError::class);

        $trial->setAmount('a');

    }

    public function testShouldThrowATypeExceptionOnTheTrialCyclesProperty()
    {
        $trial = new \Ipag\Sdk\Model\Trial();

        $this->expectException(\TypeError::class);

        $trial->setCycles('a');

    }

    public function testShouldThrowAValidationExceptionOnTheTrialAmountProperty()
    {
        $trial = new \Ipag\Sdk\Model\Trial();

        $this->expectException(MutatorAttributeException::class);

        $trial->setAmount(-1);
    }

    public function testShouldThrowAValidationExceptionOnTheTrialCyclesProperty()
    {
        $trial = new \Ipag\Sdk\Model\Trial();

        $this->expectException(MutatorAttributeException::class);

        $trial->setCycles(-1);
    }

}