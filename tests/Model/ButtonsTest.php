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
            'three' => 0,
            'description' => 'Test description',
            'header' => 'Test header',
            'subHeader' => 'Test sub header',
            'expireAt' => '2020-12-25 23:59:59',
        ]);

        $this->assertEquals(false, $buttons->getEnable());
        $this->assertEquals(0, $buttons->getOne());
        $this->assertEquals(0, $buttons->getTwo());
        $this->assertEquals(0, $buttons->getThree());
        $this->assertEquals('Test description', $buttons->getDescription());
        $this->assertEquals('Test header', $buttons->getHeader());
        $this->assertEquals('Test sub header', $buttons->getSubHeader());
        $this->assertEquals('2020-12-25 23:59:59', $buttons->getExpireAt());

    }

    public function testShouldCreateButtonsObjectAndSetTheValuesSuccessfully()
    {
        $buttons = (new \Ipag\Sdk\Model\Buttons())
            ->setEnable(false)
            ->setOne(0)
            ->setTwo(0)
            ->setThree(0)
            ->setDescription('Test description')
            ->setHeader('Test header')
            ->setSubHeader('Test sub header')
            ->setExpireAt('2020-12-25 23:59:59');

        $this->assertEquals(false, $buttons->getEnable());
        $this->assertEquals(0, $buttons->getOne());
        $this->assertEquals(0, $buttons->getTwo());
        $this->assertEquals(0, $buttons->getThree());
        $this->assertEquals('Test description', $buttons->getDescription());
        $this->assertEquals('Test header', $buttons->getHeader());
        $this->assertEquals('Test sub header', $buttons->getSubHeader());
        $this->assertEquals('2020-12-25 23:59:59', $buttons->getExpireAt());

    }

    public function testShouldCreateEmptyButtonsObjectSuccessfully()
    {
        $buttons = new \Ipag\Sdk\Model\Buttons();

        $this->assertEmpty($buttons->getEnable());
        $this->assertEmpty($buttons->getOne());
        $this->assertEmpty($buttons->getTwo());
        $this->assertEmpty($buttons->getThree());
        $this->assertEmpty($buttons->getDescription());
        $this->assertEmpty($buttons->getHeader());
        $this->assertEmpty($buttons->getSubHeader());
        $this->assertEmpty($buttons->getExpireAt());

    }

    public function testCreateAndSetEmptyPropertiesButtonsObjectSuccessfully()
    {
        $buttons = new \Ipag\Sdk\Model\Buttons([
            'enable' => false,
            'one' => 0,
            'two' => 0,
            'three' => 0,
            'description' => 'Test description',
            'header' => 'Test header',
            'subHeader' => 'Test sub header',
            'expireAt' => '2020-12-25 23:59:59',
        ]);

        $buttons
            ->setEnable(null)
            ->setOne(null)
            ->setTwo(null)
            ->setThree(null)
            ->setDescription(null)
            ->setHeader(null)
            ->setSubHeader(null)
            ->setExpireAt(null);

        $this->assertEmpty($buttons->getEnable());
        $this->assertEmpty($buttons->getOne());
        $this->assertEmpty($buttons->getTwo());
        $this->assertEmpty($buttons->getThree());
        $this->assertEmpty($buttons->getDescription());
        $this->assertEmpty($buttons->getHeader());
        $this->assertEmpty($buttons->getSubHeader());
        $this->assertEmpty($buttons->getExpireAt());

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