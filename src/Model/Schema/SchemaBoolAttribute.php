<?php

namespace Ipag\Sdk\Model\Schema;

use Ipag\Sdk\Model\Schema\Exception\SchemaAttributeParseException;

class SchemaBoolAttribute extends SchemaAttribute
{
    protected array $positiveMatches;
    protected array $negativeMatches;

    public function __construct(Schema $schema, string $name)
    {
        parent::__construct($schema, $name);
        $this->positiveMatches = [];
        $this->negativeMatches = [];
    }

    public function positives(array $matches): self
    {
        $this->positiveMatches = $matches;
        return $this;
    }

    public function negatives(array $matches): self
    {
        $this->negativeMatches = $matches;
        return $this;
    }

    protected function isNegativeMatch($value): bool
    {
        return array_reduce($this->negativeMatches, fn ($carry, $current) => $carry || $current == $value ? true : false, false);
    }

    protected function isPositiveMatch($value): bool
    {
        return array_reduce($this->positiveMatches, fn ($carry, $current) => $carry || $current == $value ? true : false, false);
    }

    public function parseContextual($value)
    {
        if (is_integer($value)) {
            return boolval($value);
        }

        if (is_bool($value)) {
            return $value;
        }

        if ($this->isNegativeMatch($value)) {
            return false;
        }

        if ($this->isPositiveMatch($value)) {
            return true;
        }

        throw new SchemaAttributeParseException($this, "Provided value '$value' is not a boolean");
    }
}
