<?php

namespace Ipag\Sdk\Tests\Model;

use Ipag\Sdk\Model\Schema\Exception\MutatorAttributeException;
use PHPUnit\Framework\TestCase;

class CardTest extends TestCase
{
    public function testShouldCreateCardObjectWithConstructorSuccessfully()
    {
        $card = new \Ipag\Sdk\Model\Card([
            'holderName' => 'Frederic Sales',
            'number' => '4024 0071 1251 2933',
            'expiryMonth' => '12',
            'expiryYear' => '2023',
            'cvv' => '431',
            'token' => '123abc',
            'tokenize' => true
        ]);

        $this->assertEquals('Frederic Sales', $card->getHolderName());
        $this->assertEquals('4024007112512933', $card->getNumber());
        $this->assertEquals('12', $card->getExpiryMonth());
        $this->assertEquals('2023', $card->getExpiryYear());
        $this->assertEquals('431', $card->getCvv());
        $this->assertEquals('123abc', $card->getToken());
        $this->assertEquals(true, $card->getTokenize());

    }

    public function testShouldCreateCardObjectAndSetTheValuesSuccessfully()
    {
        $card = (new \Ipag\Sdk\Model\Card())
            ->setHolderName('Frederic Sales')
            ->setNumber('4024 0071 1251 2933')
            ->setExpiryMonth('02')
            ->setExpiryYear('2023')
            ->setCvv('431')
            ->setToken('123abc')
            ->setTokenize(true);

        $this->assertEquals('Frederic Sales', $card->getHolderName());
        $this->assertEquals('4024007112512933', $card->getNumber());
        $this->assertEquals('02', $card->getExpiryMonth());
        $this->assertEquals('2023', $card->getExpiryYear());
        $this->assertEquals('431', $card->getCvv());
        $this->assertEquals('123abc', $card->getToken());
        $this->assertEquals(true, $card->getTokenize());

    }

    public function testShouldCreateEmptyCardObjectSuccessfully()
    {
        $card = new \Ipag\Sdk\Model\Card();

        $this->assertEmpty($card->getHolderName());
        $this->assertEmpty($card->getNumber());
        $this->assertEmpty($card->getExpiryMonth());
        $this->assertEmpty($card->getExpiryYear());
        $this->assertEmpty($card->getCvv());
        $this->assertEmpty($card->getToken());
        $this->assertEmpty($card->getTokenize());

    }

    public function testCreateAndSetEmptyPropertiesCardObjectSuccessfully()
    {
        $card = new \Ipag\Sdk\Model\Card([
            'holderName' => 'Frederic Sales',
            'number' => '4024 0071 1251 2933',
            'expiryMonth' => '02',
            'expiryYear' => '2023',
            'cvv' => '431',
            'token' => '123abc',
            'tokenize' => true
        ]);

        $card
            ->setHolderName(null)
            ->setNumber(null)
            ->setExpiryMonth(null)
            ->setExpiryYear(null)
            ->setCvv(null)
            ->setToken(null)
            ->setTokenize(null);

        $this->assertEmpty($card->getHolderName());
        $this->assertEmpty($card->getNumber());
        $this->assertEmpty($card->getExpiryMonth());
        $this->assertEmpty($card->getExpiryYear());
        $this->assertEmpty($card->getCvv());

    }

    public function testShouldThrowAValidationExceptionOnTheCardExpiryMonthProperty()
    {
        $card = new \Ipag\Sdk\Model\Card();

        $this->expectException(MutatorAttributeException::class);

        $card->setExpiryMonth('AA');
    }

    public function testShouldThrowAInvalidRangeExceptionOnTheCardExpiryMonthProperty()
    {
        $card = new \Ipag\Sdk\Model\Card();

        $this->expectException(MutatorAttributeException::class);

        $card->setExpiryMonth('13');
    }

    public function testShouldThrowAValidationExceptionOnTheCardExpiryYearProperty()
    {
        $card = new \Ipag\Sdk\Model\Card();

        $this->expectException(MutatorAttributeException::class);

        $card->setExpiryYear('AA');
    }
    public function testShouldThrowAInvalidRangeExceptionOnTheCardExpiryYearProperty()
    {
        $card = new \Ipag\Sdk\Model\Card();

        $this->expectException(MutatorAttributeException::class);

        $card->setExpiryYear('202');
    }

    public function testShouldThrowAValidationExceptionOnTheCardCvvProperty()
    {
        $card = new \Ipag\Sdk\Model\Card();

        $this->expectException(MutatorAttributeException::class);

        $card->setCvv('AA');
    }
    public function testShouldThrowAInvalidRangeExceptionOnTheCardCvvProperty()
    {
        $card = new \Ipag\Sdk\Model\Card();

        $this->expectException(MutatorAttributeException::class);

        $card->setCvv('43');
    }

}