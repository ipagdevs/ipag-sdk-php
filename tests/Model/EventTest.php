<?php

namespace Ipag\Sdk\Tests\Model;

use PHPUnit\Framework\TestCase;

class EventTest extends TestCase
{
    public function testShouldCreateEventObjectWithConstructorSuccessfully()
    {
        $event = new \Ipag\Sdk\Model\Event([
            'name' => 'Reveillon - 2022',
            'date' => '2022-01-01 00:00:00',
            'type' => 'party',
            'subtype' => 'Reveillon',
            'venue' => [
                'name' => 'Campo - Clube das Laranjeiras',
            ],
            'tickets' => [
                [
                    'id' => 'EVENT001',
                ],
                [
                    'id' => 'EVENT002',
                ]
            ]
        ]);

        $this->assertEquals('Reveillon - 2022', $event->getName());
        $this->assertEquals('2022-01-01 00:00:00', $event->getDate());
        $this->assertEquals('party', $event->getType());
        $this->assertEquals('Reveillon', $event->getSubtype());

        $this->assertInstanceOf(\Ipag\Sdk\Model\Venue::class, $event->getVenue());
        $this->assertEquals('Campo - Clube das Laranjeiras', $event->getVenue()->getName());

        $this->assertIsArray($event->getTickets());
        $this->assertCount(2, $event->getTickets());

        $this->assertInstanceOf(\Ipag\Sdk\Model\Ticket::class, $event->getTickets()[0]);
        $this->assertEquals('EVENT001', $event->getTickets()[0]->getId());

        $this->assertInstanceOf(\Ipag\Sdk\Model\Ticket::class, $event->getTickets()[1]);
        $this->assertEquals('EVENT002', $event->getTickets()[1]->getId());

    }

    public function testShouldCreateEventObjectAndSetTheValuesSuccessfully()
    {
        $event = (new \Ipag\Sdk\Model\Event())
            ->setName('Reveillon - 2022')
            ->setDate('2022-01-01 00:00:00')
            ->setType('party')
            ->setSubtype('Reveillon')
            ->setVenue(
                (new \Ipag\Sdk\Model\Venue())
                    ->setName('Campo - Clube das Laranjeiras')
            )
            ->setTickets([
                (new \Ipag\Sdk\Model\Ticket)->setId('EVENT001')
            ])
            ->addTicket(
                (new \Ipag\Sdk\Model\Ticket)->setId('EVENT002')
            );

        $this->assertEquals('Reveillon - 2022', $event->getName());
        $this->assertEquals('2022-01-01 00:00:00', $event->getDate());
        $this->assertEquals('party', $event->getType());
        $this->assertEquals('Reveillon', $event->getSubtype());

        $this->assertInstanceOf(\Ipag\Sdk\Model\Venue::class, $event->getVenue());
        $this->assertEquals('Campo - Clube das Laranjeiras', $event->getVenue()->getName());

        $this->assertIsArray($event->getTickets());
        $this->assertCount(2, $event->getTickets());

        $this->assertInstanceOf(\Ipag\Sdk\Model\Ticket::class, $event->getTickets()[0]);
        $this->assertEquals('EVENT001', $event->getTickets()[0]->getId());

        $this->assertInstanceOf(\Ipag\Sdk\Model\Ticket::class, $event->getTickets()[1]);
        $this->assertEquals('EVENT002', $event->getTickets()[1]->getId());

    }

    public function testShouldCreateEmptyEventObjectSuccessfully()
    {
        $event = new \Ipag\Sdk\Model\Event();

        $this->assertEmpty($event->getName());
        $this->assertEmpty($event->getDate());
        $this->assertEmpty($event->getType());
        $this->assertEmpty($event->getSubtype());
        $this->assertEmpty($event->getVenue());
        $this->assertEmpty($event->getTickets());

    }

    public function testCreateAndSetEmptyPropertiesEventObjectSuccessfully()
    {
        $event = new \Ipag\Sdk\Model\Event([
            'name' => 'Reveillon - 2022',
            'date' => '2022-01-01 00:00:00',
            'type' => 'party',
            'subtype' => 'Reveillon',
            'venue' => [
                'name' => 'Campo - Clube das Laranjeiras',
            ],
            'tickets' => [
                [
                    'id' => 'EVENT001',
                ],
                [
                    'id' => 'EVENT002',
                ]
            ]
        ]);

        $event
            ->setName(null)
            ->setDate(null)
            ->setType(null)
            ->setSubtype(null)
            ->setVenue(null)
            ->setTickets(null);

        $this->assertEmpty($event->getName());
        $this->assertEmpty($event->getDate());
        $this->assertEmpty($event->getType());
        $this->assertEmpty($event->getSubtype());
        $this->assertEmpty($event->getVenue());
        $this->assertEmpty($event->getTickets());
    }
}