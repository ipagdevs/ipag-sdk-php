<?php

namespace Ipag\Sdk\Model;

use Ipag\Sdk\Model\Schema\Mutator;
use Ipag\Sdk\Model\Schema\Schema;
use Ipag\Sdk\Model\Schema\SchemaBuilder;

/**
 * Customer Card
 *
 * Classe responsável por representar o recurso Card.
 *
 */
final class Card extends Model
{

    /**
     *  @param array $data
     *  array de dados do Card.
     *
     *  + [`'holderName'`] string.
     *  + [`'number'`] string.
     *  + [`'expiryMonth'`] float.
     *  + [`'expiryYear'`] string.
     *  + [`'cvv'`] int.
     */
    public function __construct(?array $data = [])
    {
        parent::__construct($data);
    }

    public function schema(SchemaBuilder $schema): Schema
    {
        $schema->string('holderName')->nullable();
        $schema->string('number')->nullable();
        $schema->string('expiryMonth')->nullable();
        $schema->string('expiryYear')->nullable();
        $schema->string('cvv')->nullable();

        return $schema->build();
    }

    public function getHolderName(): ?string
    {
        return $this->get('holderName');
    }

    public function setHolderName(?string $holderName = null): self
    {
        $this->set('holderName', $holderName);
        return $this;
    }

    public function getNumber(): ?string
    {
        return $this->get('number');
    }

    public function setNumber(?string $number = null): self
    {
        $this->set('number', $number);
        return $this;
    }

    protected function expiryMonth(): Mutator
    {
        return new Mutator(null, fn($value) => strval($value));
    }

    public function getExpiryMonth(): ?string
    {
        return $this->get('expiryMonth');
    }

    public function setExpiryMonth(?string $expiryMonth = null): self
    {
        $this->set('expiryMonth', $expiryMonth);
        return $this;
    }

    protected function expiryYear(): Mutator
    {
        return new Mutator(null, fn($value) => strval($value));
    }

    public function getExpiryYear(): ?string
    {
        return $this->get('expiryYear');
    }

    public function setExpiryYear(?string $expiryYear = null): self
    {
        $this->set('expiryYear', $expiryYear);
        return $this;
    }

    protected function cvv(): Mutator
    {
        return new Mutator(null, fn($value) => strval($value));
    }

    public function getCvv(): ?string
    {
        return $this->get('cvv');
    }

    public function setCvv(?string $cvv = null): self
    {
        $this->set('cvv', $cvv);
        return $this;
    }

}