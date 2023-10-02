<?php

namespace Ipag\Sdk\Model;

use Ipag\Sdk\Model\Schema\Schema;
use Ipag\Sdk\Model\Schema\SchemaBuilder;

/**
 * Ticket Class
 *
 * Classe responsável por representar o recurso Ticket.
 *
 */
final class Ticket extends Model
{
    /**
     *  @param array $data
     *  array de dados do Ticket.
     *
     *  + [`'id'`] string (opcional).
     *  + [`'category'`] string (opcional).
     *  + [`'premium'`] bool (opcional).
     *  + [`'section'`] string (opcional).
     *
     *  + [`'attendee'`] array (opcional) dos dados do Attendee.
     *  + &emsp; [`'document'`] string (opcional).
     *  + &emsp; [`'dob'`] string (opcional) {Formato: `Y-m-d`}.
     */
    public function __construct(?array $data = [])
    {
        parent::__construct($data);
    }

    public function schema(SchemaBuilder $schema): Schema
    {
        $schema->string('id')->nullable();
        $schema->string('category')->nullable();
        $schema->bool('premium')->nullable();
        $schema->string('section')->nullable();

        $schema->has('attendee', Attendee::class)->nullable();

        return $schema->build();
    }

    /**
     * Retorna o valor da propriedade `id`.
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->get('id');
    }

    /**
     * Seta o valor da propriedade `id`.
     *
     * @param string|null $id
     * @return self
     */
    public function setId(?string $id = null): self
    {
        $this->set('id', $id);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `category`.
     *
     * @return string|null
     */
    public function getCategory(): ?string
    {
        return $this->get('category');
    }

    /**
     * Seta o valor da propriedade `category`.
     *
     * @param string|null $category
     * @return self
     */
    public function setCategory(?string $category = null): self
    {
        $this->set('category', $category);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `premium`.
     *
     * @return boolean|null
     */
    public function getPremium(): ?bool
    {
        return $this->get('premium');
    }

    /**
     * Seta o valor da propriedade `premium`.
     *
     * @param boolean|null $premium
     * @return self
     */
    public function setPremium(?bool $premium = null): self
    {
        $this->set('premium', $premium);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `section`.
     *
     * @return string|null
     */
    public function getSection(): ?string
    {
        return $this->get('section');
    }

    /**
     * Seta o valor da propriedade `section`.
     *
     * @param string|null $section
     * @return self
     */
    public function setSection(?string $section = null): self
    {
        $this->set('section', $section);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `attendee`.
     *
     * @return Attendee|null
     */
    public function getAttendee(): ?Attendee
    {
        return $this->get('attendee');
    }

    /**
     * Seta o valor da propriedade `attendee`.
     *
     * @param Attendee|null $attendee
     * @return self
     */
    public function setAttendee(?Attendee $attendee = null): self
    {
        $this->set('attendee', $attendee);
        return $this;
    }

}