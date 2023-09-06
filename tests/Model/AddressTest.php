<?php

namespace Ipag\Sdk\Tests\Model;

use Ipag\Sdk\Model\Address;
use Ipag\Sdk\Model\Schema\Exception\MutatorAttributeException;
use PHPUnit\Framework\TestCase;

class AddressTest extends TestCase
{
    public function testCreateAndSetAddressConstruct()
    {
        $address = new Address([
            'street' => 'Rua Agenor Vieira',
            'number' => 768,
            'district' => 'São Francisco',
            'city' => 'São Luís',
            'state' => 'MA',
            'zipcode' => '65076-020'
        ]);

        $this->assertEquals($address->getStreet(), 'Rua Agenor Vieira');
        $this->assertEquals($address->getNumber(), '768');
        $this->assertEquals($address->getDistrict(), 'São Francisco');
        $this->assertEquals($address->getCity(), 'São Luís');
        $this->assertEquals($address->getState(), 'MA');
        $this->assertEquals($address->getZipcode(), '65076020');

    }

    public function testCreateAndSetAddress()
    {
        $address = new Address();
        $address->setStreet('Rua Agenor Vieira');
        $address->setNumber('768');
        $address->setDistrict('São Francisco');
        $address->setCity('São Luís');
        $address->setState('MA');
        $address->setZipcode('65076020');

        $this->assertEquals($address->getStreet(), 'Rua Agenor Vieira');
        $this->assertEquals($address->getNumber(), '768');
        $this->assertEquals($address->getDistrict(), 'São Francisco');
        $this->assertEquals($address->getCity(), 'São Luís');
        $this->assertEquals($address->getState(), 'MA');
        $this->assertEquals($address->getZipcode(), '65076020');

    }

    public function testCreateAddressEmpty()
    {
        $address = new Address();

        $this->assertEmpty($address->getStreet());
        $this->assertEmpty($address->getNumber());
        $this->assertEmpty($address->getDistrict());
        $this->assertEmpty($address->getCity());
        $this->assertEmpty($address->getState());
        $this->assertEmpty($address->getZipcode());
    }

    public function testCreateAndSetEmptyAddress()
    {
        $address = new Address([
            'street' => 'Rua Agenor Vieira',
            'number' => 768,
            'district' => 'São Francisco',
            'city' => 'São Luís',
            'state' => 'MA',
            'zipcode' => '65076-020'
        ]);

        $address->setStreet(null);
        $address->setNumber(null);
        $address->setDistrict(null);
        $address->setCity(null);
        $address->setState(null);
        $address->setZipcode(null);

        $this->assertEmpty($address->getStreet());
        $this->assertEmpty($address->getNumber());
        $this->assertEmpty($address->getDistrict());
        $this->assertEmpty($address->getCity());
        $this->assertEmpty($address->getState());
        $this->assertEmpty($address->getZipcode());

    }

    public function testItInvalidNumberAddress()
    {
        $address = new Address();

        $this->expectException(MutatorAttributeException::class);

        $address->setNumber('abc');

    }

}