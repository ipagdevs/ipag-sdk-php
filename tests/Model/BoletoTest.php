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
                'Instruções 1',
                'Instruções 2',
                'Instruções 3',
            ]
        ]);

        $this->assertEquals('2018-07-31', $boleto->getDueDate());

        $this->assertIsArray($boleto->getInstructions());

        $this->assertEquals('Instruções 1', $boleto->getInstructions()[0]);
        $this->assertEquals('Instruções 2', $boleto->getInstructions()[1]);
        $this->assertEquals('Instruções 3', $boleto->getInstructions()[2]);

    }

    public function testShouldCreateBoletoObjectAndSetTheValuesSuccessfully()
    {
        $boleto = (new \Ipag\Sdk\Model\Boleto)
            ->setDueDate('2018-07-31')
            ->setInstructions([
                'Instruções 1',
                'Instruções 2',
                'Instruções 3'
            ]);

        $this->assertEquals('2018-07-31', $boleto->getDueDate());

        $this->assertIsArray($boleto->getInstructions());

        $this->assertEquals('Instruções 1', $boleto->getInstructions()[0]);
        $this->assertEquals('Instruções 2', $boleto->getInstructions()[1]);
        $this->assertEquals('Instruções 3', $boleto->getInstructions()[2]);

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
                'Instruções 1',
                'Instruções 2',
                'Instruções 3',
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