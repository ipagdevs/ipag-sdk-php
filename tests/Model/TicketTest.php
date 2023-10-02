<?php

namespace Ipag\Sdk\Tests\Model;

use Ipag\Sdk\Model\Schema\Exception\MutatorAttributeException;
use PHPUnit\Framework\TestCase;

class TicketTest extends TestCase
{
    public function testShouldCreateTicketObjectWithConstructorSuccessfully()
    {
        $ticket = new \Ipag\Sdk\Model\Ticket([
            'id' => 'EVENT001',
            'category' => 'regular',
            'premium' => false,
            'section' => 'Pista',
            'attendee' => [
                'document' => '972.089.620-57',
            ]
        ]);

        $this->assertEquals('EVENT001', $ticket->getId());
        $this->assertEquals('regular', $ticket->getCategory());
        $this->assertEquals(false, $ticket->getPremium());
        $this->assertEquals('Pista', $ticket->getSection());

        $this->assertInstanceOf(\Ipag\Sdk\Model\Attendee::class, $ticket->getAttendee());
        $this->assertEquals('972.089.620-57', $ticket->getAttendee()->getDocument());

    }

    public function testShouldCreateTicketObjectAndSetTheValuesSuccessfully()
    {
        $ticket = (new \Ipag\Sdk\Model\Ticket)
            ->setId('EVENT001')
            ->setCategory('regular')
            ->setPremium(false)
            ->setSection('Pista')
            ->setAttendee(
                (new \Ipag\Sdk\Model\Attendee)
                    ->setDocument('972.089.620-57')
            );

        $this->assertEquals('EVENT001', $ticket->getId());
        $this->assertEquals('regular', $ticket->getCategory());
        $this->assertEquals(false, $ticket->getPremium());
        $this->assertEquals('Pista', $ticket->getSection());

        $this->assertInstanceOf(\Ipag\Sdk\Model\Attendee::class, $ticket->getAttendee());
        $this->assertEquals('972.089.620-57', $ticket->getAttendee()->getDocument());

    }

    public function testShouldCreateEmptyTicketObjectSuccessfully()
    {
        $ticket = new \Ipag\Sdk\Model\Ticket;

        $this->assertEmpty($ticket->getId());
        $this->assertEmpty($ticket->getCategory());
        $this->assertEmpty($ticket->getPremium());
        $this->assertEmpty($ticket->getSection());
        $this->assertEmpty($ticket->getAttendee());

    }

    public function testCreateAndSetEmptyPropertiesTicketObjectSuccessfully()
    {
        $ticket = new \Ipag\Sdk\Model\Ticket([
            'id' => 'EVENT001',
            'category' => 'regular',
            'premium' => false,
            'section' => 'Pista',
            'attendee' => [
                'document' => '972.089.620-57',
            ]
        ]);

        $ticket
            ->setId(null)
            ->setCategory(null)
            ->setPremium(null)
            ->setSection(null)
            ->setAttendee(null);

        $this->assertEmpty($ticket->getId());
        $this->assertEmpty($ticket->getCategory());
        $this->assertEmpty($ticket->getPremium());
        $this->assertEmpty($ticket->getSection());
        $this->assertEmpty($ticket->getAttendee());

    }
}