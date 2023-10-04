<?php

namespace Ipag\Sdk\Tests\Model;

use Ipag\Sdk\Model\Schema\Exception\MutatorAttributeException;
use PHPUnit\Framework\TestCase;

class AttendeeTest extends TestCase
{
    public function testShouldCreateAttendeeObjectWithConstructorSuccessfully()
    {
        $attendee = new \Ipag\Sdk\Model\Attendee([
            'document' => '444.631.330-41',
            'dob' => '1992-03-28'
        ]);

        $this->assertEquals('444.631.330-41', $attendee->getDocument());
        $this->assertEquals('1992-03-28', $attendee->getDob());

    }

    public function testShouldCreateAttendeeObjectAndSetTheValuesSuccessfully()
    {
        $attendee = (new \Ipag\Sdk\Model\Attendee())
            ->setDocument('444.631.330-41')
            ->setDob('1992-03-28');

        $this->assertEquals('444.631.330-41', $attendee->getDocument());
        $this->assertEquals('1992-03-28', $attendee->getDob());

    }

    public function testShouldCreateEmptyAttendeeObjectSuccessfully()
    {
        $attendee = new \Ipag\Sdk\Model\Attendee();

        $this->assertEmpty($attendee->getDocument());
        $this->assertEmpty($attendee->getDob());

    }

    public function testCreateAndSetEmptyPropertiesAttendeeObjectSuccessfully()
    {
        $attendee = new \Ipag\Sdk\Model\Attendee([
            'document' => '444.631.330-41',
            'dob' => '1992-03-28'
        ]);

        $attendee
            ->setDocument(null)
            ->setDob(null);

        $this->assertEmpty($attendee->getDocument());
        $this->assertEmpty($attendee->getDob());

    }

    public function testShouldThrowAValidationExceptionOnTheAttendeeDobProperty()
    {
        $attendee = new \Ipag\Sdk\Model\Attendee();

        $this->expectException(MutatorAttributeException::class);

        $attendee->setDob('10/07/2021');

    }

}