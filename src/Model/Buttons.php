<?php

namespace Ipag\Sdk\Model;

use Ipag\Sdk\Model\Schema\Mutator;
use Ipag\Sdk\Model\Schema\Schema;
use Ipag\Sdk\Model\Schema\SchemaBuilder;
use Kubinyete\Assertation\Assert;

/**
 * Buttons Class
 *
 * Classe responsável por representar o recurso Buttons.
 */
class Buttons extends Model
{
    /**
     *  @param array $data
     *  array de dados do Buttons.
     *
     *  + [`'enable'`] bool (opcional).
     *  + [`'one'`] float (opcional).
     *  + [`'two'`] float (opcional).
     *  + [`'three'`] float (opcional).
     *  + [`'description'`] string (opcional).
     *  + [`'header'`] string (opcional).
     *  + [`'subHeader'`] string (opcional).
     *  + [`'expireAt'`] string (opcional) {Formato: `Y-m-d H:i:s`}.
     */
    public function __construct(?array $data = [])
    {
        parent::__construct($data);
    }

    protected function schema(SchemaBuilder $schema): Schema
    {
        $schema->bool('enable')->nullable();
        $schema->float('one')->nullable();
        $schema->float('two')->nullable();
        $schema->float('three')->nullable();
        $schema->string('description')->nullable();
        $schema->string('header')->nullable();
        $schema->string('subHeader')->nullable();
        $schema->string('expireAt')->nullable();

        return $schema->build();
    }

    public function getEnable(): ?bool
    {
        return $this->get('enable');
    }

    public function setEnable(?bool $enable): self
    {
        $this->set('enable', $enable);
        return $this;
    }

    public function getOne(): ?float
    {
        return $this->get('one');
    }

    public function setOne(?float $one): self
    {
        $this->set('one', $one);
        return $this;
    }

    public function getTwo(): ?float
    {
        return $this->get('two');
    }

    public function setTwo(?float $two): self
    {
        $this->set('two', $two);
        return $this;
    }

    public function getThree(): ?float
    {
        return $this->get('three');
    }

    public function setThree(?float $three): self
    {
        $this->set('three', $three);
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->get('description');
    }

    public function setDescription(?string $description): self
    {
        $this->set('description', $description);
        return $this;
    }

    public function getHeader(): ?string
    {
        return $this->get('header');
    }

    public function setHeader(?string $header): self
    {
        $this->set('header', $header);
        return $this;
    }

    public function getSubHeader(): ?string
    {
        return $this->get('subHeader');
    }

    public function setSubHeader(?string $subHeader): self
    {
        $this->set('subHeader', $subHeader);
        return $this;
    }

    public function getExpireAt(): ?string
    {
        return $this->get('expireAt');
    }

    public function setExpireAt(?string $expireAt): self
    {
        $this->set('expireAt', $expireAt);
        return $this;
    }

}