<?php

namespace Ipag\Sdk\Tests\Model;

use Ipag\Sdk\Model\Schema\Exception\MutatorAttributeException;
use PHPUnit\Framework\TestCase;

class BoletoTest extends TestCase
{
    public function testShouldCreateBoletoObjectWithConstructorSuccessfully()
    {
        $boleto = new \Ipag\Sdk\Model\Boleto([
            'due_date' => '2018-07-31',
            'instructions' => [
                ['instruction' => 'Instruções 1'],
                ['instruction' => 'Instruções 2'],
                ['instruction' => 'Instruções 3'],
            ]
        ]);

        $this->assertEquals('2018-07-31', $boleto->getDueDate());

        $this->assertIsArray($boleto->getInstructions());

        $this->assertEquals('Instruções 1', $boleto->getInstructions()[0]['instruction']);
        $this->assertEquals('Instruções 2', $boleto->getInstructions()[1]['instruction']);
        $this->assertEquals('Instruções 3', $boleto->getInstructions()[2]['instruction']);

    }

    public function testShouldCreateBoletoObjectAndSetTheValuesSuccessfully()
    {
        $boleto = (new \Ipag\Sdk\Model\Boleto)
            ->setDueDate('2018-07-31')
            ->setInstructions([
                ['instruction' => 'Instruções 1'],
                ['instruction' => 'Instruções 2'],
                ['instruction' => 'Instruções 3'],
            ]);

        $this->assertEquals('2018-07-31', $boleto->getDueDate());

        $this->assertIsArray($boleto->getInstructions());

        $this->assertEquals('Instruções 1', $boleto->getInstructions()[0]['instruction']);
        $this->assertEquals('Instruções 2', $boleto->getInstructions()[1]['instruction']);
        $this->assertEquals('Instruções 3', $boleto->getInstructions()[2]['instruction']);

    }

    public function testShouldCreateEmptyBoletoObjectSuccessfully()
    {
        $boleto = new \Ipag\Sdk\Model\Boleto;

        $this->assertEmpty($boleto->getDueDate());

        $this->assertEmpty($boleto->getInstructions());

    }

    public function testCreateAndSetEmptyPropertiesBoletoObjectSuccessfully()
    {
        $boleto = new \Ipag\Sdk\Model\Boleto([
            'due_date' => '2018-07-31',
            'instructions' => [
                ['instruction' => 'Instruções 1'],
                ['instruction' => 'Instruções 2'],
                ['instruction' => 'Instruções 3'],
            ]
        ]);

        $boleto
            ->setDueDate(null)
            ->setInstructions([]);

        $this->assertEmpty($boleto->getDueDate());

        $this->assertEmpty($boleto->getInstructions());

    }

    public function testShouldThrowAValidationExceptionOnTheBoletoDueDateProperty()
    {
        $boleto = new \Ipag\Sdk\Model\Boleto();

        $this->expectException(MutatorAttributeException::class);

        $boleto->setDueDate('10/07/2021');

    }

}