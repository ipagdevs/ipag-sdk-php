<?php

namespace Ipag\Sdk\Tests\Model;

use Ipag\Sdk\Model\Schema\Exception\MutatorAttributeException;
use PHPUnit\Framework\TestCase;

class VenueTest extends TestCase
{
    public function testShouldCreateVenueObjectWithConstructorSuccessfully()
    {
        $venue = new \Ipag\Sdk\Model\Venue([
            'name' => 'Campo - Clube das Laranjeiras',
            'capacity' => 2000,
            'address' => 'Av. Santos Dumont',
            'city' => 'São Paulo',
            'state' => 'SP'
        ]);

        $this->assertEquals('Campo - Clube das Laranjeiras', $venue->getName());
        $this->assertEquals(2000, $venue->getCapacity());
        $this->assertEquals('Av. Santos Dumont', $venue->getAddress());
        $this->assertEquals('São Paulo', $venue->getCity());
        $this->assertEquals('SP', $venue->getState());

    }

    public function testShouldCreateVenueObjectAndSetTheValuesSuccessfully()
    {
        $venue = (new \Ipag\Sdk\Model\Venue())
            ->setName('Campo - Clube das Laranjeiras')
            ->setCapacity(2000)
            ->setAddress('Av. Santos Dumont')
            ->setCity('São Paulo')
            ->setState('SP');

        $this->assertEquals('Campo - Clube das Laranjeiras', $venue->getName());
        $this->assertEquals(2000, $venue->getCapacity());
        $this->assertEquals('Av. Santos Dumont', $venue->getAddress());
        $this->assertEquals('São Paulo', $venue->getCity());
        $this->assertEquals('SP', $venue->getState());

    }

    public function testShouldCreateEmptyVenueObjectSuccessfully()
    {
        $venue = new \Ipag\Sdk\Model\Venue();

        $this->assertEmpty($venue->getName());
        $this->assertEmpty($venue->getCapacity());
        $this->assertEmpty($venue->getAddress());
        $this->assertEmpty($venue->getCity());
        $this->assertEmpty($venue->getState());

    }

    public function testCreateAndSetEmptyPropertiesVenueObjectSuccessfully()
    {
        $venue = new \Ipag\Sdk\Model\Venue([
            'name' => 'Campo - Clube das Laranjeiras',
            'capacity' => 2000,
            'address' => 'Av. Santos Dumont',
            'city' => 'São Paulo',
            'state' => 'SP'
        ]);

        $venue
            ->setName(null)
            ->setCapacity(null)
            ->setAddress(null)
            ->setCity(null)
            ->setState(null);

        $this->assertEmpty($venue->getName());
        $this->assertEmpty($venue->getCapacity());
        $this->assertEmpty($venue->getAddress());
        $this->assertEmpty($venue->getCity());
        $this->assertEmpty($venue->getState());

    }

    public function testShouldThrowATypeExceptionOnTheVenueCapacityProperty()
    {
        $venues = new \Ipag\Sdk\Model\Venue();

        $this->expectException(\TypeError::class);

        $venues->setCapacity('a');
    }

    public function testShouldThrowAValidationExceptionOnTheVenueCapacityProperty()
    {
        $venues = new \Ipag\Sdk\Model\Venue();

        $this->expectException(MutatorAttributeException::class);

        $venues->setCapacity(0);
    }

}