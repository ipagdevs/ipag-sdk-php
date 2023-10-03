<?php

namespace Ipag\Sdk\Model;

use Ipag\Sdk\Model\Schema\Schema;
use Ipag\Sdk\Model\Schema\SchemaBuilder;

/**
 * Event Class
 *
 * Classe responsável por representar o recurso Event.
 *
 */
final class Event extends Model
{
    /**
     *  @param array $data
     *  array de dados do Event.
     *
     *  + [`'name'`] string (opcional).
     *  + [`'date'`] string (opcional).
     *  + [`'type'`] string (opcional).
     *  + [`'subtype'`] string (opcional).
     *
     *  + [`'venue'`] array (opcional) dos dados do Venue.
     *  + &emsp; [`'name'`] string (opcional).
     *  + &emsp; [`'capacity'`] int (opcional).
     *  + &emsp; [`'address'`] string (opcional).
     *  + &emsp; [`'city'`] string (opcional).
     *  + &emsp; [`'state'`] string (opcional).
     *
     *  + [`'tickets'`] array (opcional) dos dados do `Ticket`.
     *  + &emsp; [`'id'`] string (opcional).
     *  + &emsp; [`'category'`] string (opcional).
     *  + &emsp; [`'premium'`] bool (opcional).
     *  + &emsp; [`'section'`] string (opcional).
     *
     *  + &emsp; [`'attendee'`] array (opcional) dos dados do Attendee.
     *  + &emsp; &emsp; [`'document'`] string (opcional).
     *  + &emsp; &emsp; [`'dob'`] string (opcional) {Formato: `Y-m-d`}.
     */
    public function __construct(?array $data = [])
    {
        parent::__construct($data);
    }

    public function schema(SchemaBuilder $schema): Schema
    {
        $schema->string('name')->nullable();
        $schema->string('date')->nullable();
        $schema->string('type')->nullable();
        $schema->string('subtype')->nullable();

        $schema->has('venue', Venue::class)->nullable();
        $schema->hasMany('tickets', Ticket::class)->nullable();

        return $schema->build();
    }

    /**
     * Retorna o valor da propriedade `name`.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->get('name');
    }

    /**
     * Seta o valor da propriedade `name`.
     *
     * @param string|null $name
     * @return self
     */
    public function setName(?string $name = null): self
    {
        $this->set('name', $name);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `date`.
     *
     * @return string|null
     */
    public function getDate(): ?string
    {
        return $this->get('date');
    }

    /**
     * Seta o valor da propriedade `date`.
     *
     * @param string|null $date
     * @return self
     */
    public function setDate(?string $date = null): self
    {
        $this->set('date', $date);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `type`.
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->get('type');
    }

    /**
     * Seta o valor da propriedade `type`.
     *
     * @param string|null $type
     * @return self
     */
    public function setType(?string $type = null): self
    {
        $this->set('type', $type);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `subtype`.
     *
     * @return string|null
     */
    public function getSubtype(): ?string
    {
        return $this->get('subtype');
    }

    /**
     * Seta o valor da propriedade `subtype`.
     *
     * @param string|null $subtype
     * @return self
     */
    public function setSubtype(?string $subtype = null): self
    {
        $this->set('subtype', $subtype);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `venue`.
     *
     * @return Venue|null
     */
    public function getVenue(): ?Venue
    {
        return $this->get('venue');
    }

    /**
     * Seta o valor da propriedade `venue`.
     *
     * @param Venue|null $venue
     * @return self
     */
    public function setVenue(?Venue $venue = null): self
    {
        $this->set('venue', $venue);
        return $this;
    }

    /**
     * Retorna o array `tickets` referente ao recurso `Event`.
     *
     * @return array|null
     */
    public function getTickets(): ?array
    {
        return $this->get('tickets');
    }

    /**
     * Seta o array `tickets` referente ao recurso `Event`.
     *
     * @param array|null $tickets
     * @return self
     */
    public function setTickets(?array $tickets = null): self
    {
        $this->set('tickets', $tickets);
        return $this;
    }

    /**
     * Adiciona um novo objeto `Ticket` ao recurso `Event`.
     *
     * @param Ticket $ticket
     * @return self
     */
    public function addTicket(Ticket $ticket): self
    {
        $this->set(
            'tickets',
            [
                ...$this->get('tickets'),
                $ticket
            ]
        );

        return $this;
    }

}