<?php

namespace Ipag\Sdk\Model\Schema;

use Ipag\Sdk\Model\Schema\Exception\SchemaAttributeParseException;

class SchemaEnumAttribute extends SchemaAttribute
{
    protected array $values;

    public function __construct(Schema $schema, string $name)
    {
        parent::__construct($schema, $name);
        $this->values = [];
    }

    public function values(array $values): self
    {
        $this->values = $values;
        return $this;
    }

    private function matchesLoose($value)
    {
        return array_reduce($this->values, fn ($x, $y) => $x ?? ($y == $value ? $y : null), null);
    }

    private function matchesStrict($value)
    {
        return array_reduce($this->values, fn ($x, $y) => $x ?? ($y === $value ? $y : null), null);
    }

    public function parseContextual($value)
    {
        $value = $this->matchesLoose($value);
        if (!is_null($value)) {
            return $value;
        }

        $many = $this->getValuesVerbose();
        throw new SchemaAttributeParseException($this, "Provided value is not one of {$many}");
    }

    private function getValuesVerbose(): string
    {
        return implode(', ', $this->values);
    }

    public static function from(Schema $schema, string $name): self
    {
        return parent::from($schema, $name);
    }
}
