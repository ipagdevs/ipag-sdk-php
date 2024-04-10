<?php

namespace Ipag\Sdk\Tests\Model;

use PHPUnit\Framework\TestCase;
use Ipag\Sdk\Model\Schema\Exception\MutatorAttributeException;

class AddressTest extends TestCase
{
    public function testShouldCreateAddressObjectWithConstructorSuccessfully()
    {
        $address = new \Ipag\Sdk\Model\Address([
            'street' => 'Rua Agenor Vieira',
            'number' => 768,
            'district' => 'São Francisco',
            'city' => 'São Luís',
            'complement' => 'Sala 001',
            'state' => 'MA',
            'zipcode' => '65076-020'
        ]);

        $this->assertEquals($address->getComplement(), 'Sala 001');
        $this->assertEquals($address->getStreet(), 'Rua Agenor Vieira');
        $this->assertEquals($address->getNumber(), '768');
        $this->assertEquals($address->getDistrict(), 'São Francisco');
        $this->assertEquals($address->getCity(), 'São Luís');
        $this->assertEquals($address->getState(), 'MA');
        $this->assertEquals($address->getZipcode(), '65076020');
    }

    public function testShouldCreateAddressObjectAndSetTheValuesSuccessfully()
    {
        $address = (new \Ipag\Sdk\Model\Address())
            ->setStreet('Rua Agenor Vieira')
            ->setNumber('768')
            ->setDistrict('São Francisco')
            ->setComplement('Sala 001')
            ->setCity('São Luís')
            ->setState('MA')
            ->setZipcode('65076020');

        $this->assertEquals($address->getComplement(), 'Sala 001');
        $this->assertEquals($address->getStreet(), 'Rua Agenor Vieira');
        $this->assertEquals($address->getNumber(), '768');
        $this->assertEquals($address->getDistrict(), 'São Francisco');
        $this->assertEquals($address->getCity(), 'São Luís');
        $this->assertEquals($address->getState(), 'MA');
        $this->assertEquals($address->getZipcode(), '65076020');
    }

    public function testShouldCreateEmptyAddressObjectSuccessfully()
    {
        $address = new \Ipag\Sdk\Model\Address();

        $this->assertEmpty($address->getComplement());
        $this->assertEmpty($address->getStreet());
        $this->assertEmpty($address->getNumber());
        $this->assertEmpty($address->getDistrict());
        $this->assertEmpty($address->getCity());
        $this->assertEmpty($address->getState());
        $this->assertEmpty($address->getZipcode());
    }

    public function testCreateAndSetEmptyPropertiesAddressObjectSuccessfully()
    {
        $address = new \Ipag\Sdk\Model\Address([
            'street' => 'Rua Agenor Vieira',
            'number' => 768,
            'district' => 'São Francisco',
            'city' => 'São Luís',
            'complement' => 'Sala 001',
            'state' => 'MA',
            'zipcode' => '65076-020'
        ]);

        $address
            ->setStreet(null)
            ->setNumber(null)
            ->setDistrict(null)
            ->setCity(null)
            ->setState(null)
            ->setZipcode(null)
            ->setComplement(null);

        $this->assertEmpty($address->getComplement());
        $this->assertEmpty($address->getStreet());
        $this->assertEmpty($address->getNumber());
        $this->assertEmpty($address->getDistrict());
        $this->assertEmpty($address->getCity());
        $this->assertEmpty($address->getState());
        $this->assertEmpty($address->getZipcode());
    }

    public function testShouldAcceptAddressNumberPropertyWithLetters()
    {
        $address = new \Ipag\Sdk\Model\Address();

        $address->setNumber('BR 163');

        $this->assertEquals('BR 163', $address->getNumber());
    }
}
