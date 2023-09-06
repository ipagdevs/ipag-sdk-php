<?php

namespace Ipag\Sdk\Model\Schema;

use Closure;
use Ipag\Sdk\Model\Model;
use Ipag\Sdk\Model\Schema\Exception\SchemaAttributeParseException;

class SchemaRelationAttribute extends SchemaAttribute
{
    protected string $relationClass;
    protected bool $many;

    public function __construct(Schema $schema, string $name, string $class)
    {
        parent::__construct($schema, $name);
        $this->relationClass = $class;
        $this->many = false;
    }

    //

    public function getAbsoluteName(): string
    {
        $path = parent::getAbsoluteName();
        $path .= $this->isCollection() ? '[]' : '';
        return $path;
    }

    private function getRelationClass(): string
    {
        return $this->relationClass;
    }

    private function newRelationClass(): Model
    {
        $relationClass = $this->getRelationClass();
        $instance = new $relationClass();

        if (!$instance instanceof Model) {
            throw new SchemaAttributeParseException($this, "Could not create a new relation instance, should be a Model-based class");
        }

        return $instance;
    }

    private function getFactory(): Closure
    {
        $relationClass = $this->getRelationClass();

        return function ($e) use ($relationClass) {
            if ($e instanceof $relationClass) {
                return $e;
            }

            if (!is_array($e)) {
                throw new SchemaAttributeParseException($this, "Provided value '{$e}' cannot be parsed into {$relationClass}.");
            }

            return $this->newRelationClass()
                ->setIdentifier($this->getName())
                ->setSchemaName($this->getAbsoluteName())
                ->fill($e);
        };
    }

    //

    public function isCollection(): bool
    {
        return $this->many;
    }

    public function many(bool $value = true): self
    {
        $this->many = $value;
        return $this;
    }

    //

    public function parseContextual($value)
    {
        $factory = $this->getFactory();

        if ($this->isCollection()) {
            if (!is_iterable($value)) {
                throw new SchemaAttributeParseException($this, "Provided value '$value' is not an iterable, expected a collection.");
            }

            if (!is_array($value)) {
                $value = iterator_to_array($value);
            }

            if (!array_is_list($value)) {
                throw new SchemaAttributeParseException($this, "Provided value is not a list.");
            }

            return array_map($factory, $value);
        }

        if (is_array($value) || is_object($value)) {
            return $factory($value);
        }

        throw new SchemaAttributeParseException($this, "Provided value '$value' cannot be parsed.");
    }

    public function serialize($value)
    {
        if (is_null($value)) {
            return null;
        }

        if (is_iterable($value)) {
            if (!is_array($value)) {
                $value = iterator_to_array($value);
            }

            return array_map(fn(Model $model) => $model->jsonSerialize(), $value);
        }

        return $value->jsonSerialize();
    }

    //

    public static function from(Schema $schema, string $name, string $class = Model::class): self
    {
        return new static($schema, $name, $class);
    }
}