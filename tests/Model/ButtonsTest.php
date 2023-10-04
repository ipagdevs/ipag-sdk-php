<?php

namespace Ipag\Sdk\Tests\Model;

use Ipag\Sdk\Model\Schema\Exception\MutatorAttributeException;
use PHPUnit\Framework\TestCase;

class ButtonsTest extends TestCase
{
    public function testShouldCreateButtonsObjectWithConstructorSuccessfully()
    {
        $buttons = new \Ipag\Sdk\Model\Buttons([
            'enable' => false,
            'one' => 0,
            'two' => 0,
            'three' => 0
        ]);

        $this->assertEquals(false, $buttons->getEnable());
        $this->assertEquals(0, $buttons->getOne());
        $this->assertEquals(0, $buttons->getTwo());
        $this->assertEquals(0, $buttons->getThree());

    }

    public function testShouldCreateButtonsObjectAndSetTheValuesSuccessfully()
    {
        $buttons = (new \Ipag\Sdk\Model\Buttons())
            ->setEnable(false)
            ->setOne(0)
            ->setTwo(0)
            ->setThree(0);

        $this->assertEquals(false, $buttons->getEnable());
        $this->assertEquals(0, $buttons->getOne());
        $this->assertEquals(0, $buttons->getTwo());
        $this->assertEquals(0, $buttons->getThree());

    }

    public function testShouldCreateEmptyButtonsObjectSuccessfully()
    {
        $buttons = new \Ipag\Sdk\Model\Buttons();

        $this->assertEmpty($buttons->getEnable());
        $this->assertEmpty($buttons->getOne());
        $this->assertEmpty($buttons->getTwo());
        $this->assertEmpty($buttons->getThree());

    }

    public function testCreateAndSetEmptyPropertiesButtonsObjectSuccessfully()
    {
        $buttons = new \Ipag\Sdk\Model\Buttons([
            'enable' => false,
            'one' => 0,
            'two' => 0,
            'three' => 0
        ]);

        $buttons
            ->setEnable(null)
            ->setOne(null)
            ->setTwo(null)
            ->setThree(null);

        $this->assertEmpty($buttons->getEnable());
        $this->assertEmpty($buttons->getOne());
        $this->assertEmpty($buttons->getTwo());
        $this->assertEmpty($buttons->getThree());

    }

    public function testShouldThrowATypeExceptionOnTheButtonsOneProperty()
    {
        $buttons = new \Ipag\Sdk\Model\Buttons();

        $this->expectException(\TypeError::class);

        $buttons->setOne('a');
    }

    public function testShouldThrowAValidationExceptionOnTheButtonsOneProperty()
    {
        $buttons = new \Ipag\Sdk\Model\Buttons();

        $this->expectException(MutatorAttributeException::class);

        $buttons->setOne(-1);
    }

    public function testShouldThrowATypeExceptionOnTheButtonsTwoProperty()
    {
        $buttons = new \Ipag\Sdk\Model\Buttons();

        $this->expectException(\TypeError::class);

        $buttons->setTwo('a');
    }

    public function testShouldThrowAValidationExceptionOnTheButtonsTwoProperty()
    {
        $buttons = new \Ipag\Sdk\Model\Buttons();

        $this->expectException(MutatorAttributeException::class);

        $buttons->setTwo(-1);
    }

    public function testShouldThrowATypeExceptionOnTheButtonsThreeProperty()
    {
        $buttons = new \Ipag\Sdk\Model\Buttons();

        $this->expectException(\TypeError::class);

        $buttons->setThree('a');
    }

    public function testShouldThrowAValidationExceptionOnTheButtonsThreeProperty()
    {
        $buttons = new \Ipag\Sdk\Model\Buttons();

        $this->expectException(MutatorAttributeException::class);

        $buttons->setThree(-1);
    }

}