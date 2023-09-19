<?php

namespace Ipag\Sdk\Tests\Model;

use Ipag\Sdk\Model\Schema\Exception\SchemaAttributeParseException;
use PHPUnit\Framework\TestCase;

class BankTest extends TestCase
{
    public function testShouldCreateBankObjectWithConstructorSuccessfully()
    {
        $bank = new \Ipag\Sdk\Model\Bank([
            'code' => '001',
            'agency' => '1234',
            'account' => '123456',
            'type' => 'checkings',
            'external_id' => 'teste@teste.com'
        ]);

        $this->assertEquals('001', $bank->getCode());
        $this->assertEquals('1234', $bank->getAgency());
        $this->assertEquals('123456', $bank->getAccount());
        $this->assertEquals('checkings', $bank->getType());
        $this->assertEquals('teste@teste.com', $bank->getExternalId());

    }

    public function testShouldCreateBankObjectAndSetTheValuesSuccessfully()
    {
        $bank = (new \Ipag\Sdk\Model\Bank)
            ->setCode('001')
            ->setAgency('1234')
            ->setAccount('123456')
            ->setType('checkings')
            ->setExternalId('teste@teste.com');

        $this->assertEquals('001', $bank->getCode());
        $this->assertEquals('1234', $bank->getAgency());
        $this->assertEquals('123456', $bank->getAccount());
        $this->assertEquals('checkings', $bank->getType());
        $this->assertEquals('teste@teste.com', $bank->getExternalId());

    }

    public function testShouldCreateEmptyBankObjectSuccessfully()
    {
        $bank = new \Ipag\Sdk\Model\Bank;

        $this->assertEmpty($bank->getCode());
        $this->assertEmpty($bank->getAgency());
        $this->assertEmpty($bank->getAccount());
        $this->assertEmpty($bank->getType());
        $this->assertEmpty($bank->getExternalId());

    }

    public function testCreateAndSetEmptyPropertiesBankObjectSuccessfully()
    {
        $bank = new \Ipag\Sdk\Model\Bank([
            'code' => '001',
            'agency' => '1234',
            'account' => '123456',
            'type' => 'checkings',
            'external_id' => 'teste@teste.com'
        ]);

        $bank
            ->setCode(null)
            ->setAgency(null)
            ->setAccount(null)
            ->setType(null)
            ->setExternalId(null);

        $this->assertEmpty($bank->getCode());
        $this->assertEmpty($bank->getAgency());
        $this->assertEmpty($bank->getAccount());
        $this->assertEmpty($bank->getType());
        $this->assertEmpty($bank->getExternalId());

    }

    public function testShouldThrowAValidationExceptionOnTheBankTypeProperty()
    {
        $bank = new \Ipag\Sdk\Model\Bank;

        $this->expectException(SchemaAttributeParseException::class);

        $bank->setType('a');
    }

}