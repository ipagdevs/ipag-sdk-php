<?php

namespace Ipag\Sdk\Model\Schema;

use Ipag\Sdk\Model\Schema\Exception\SchemaAttributeParseException;

class SchemaFloatAttribute extends SchemaAttribute
{
    protected ?float $min = null;
    protected ?float $max = null;

    public function min(?float $min): self
    {
        $this->min = $min;
        return $this;
    }

    public function max(?float $max): self
    {
        $this->max = $max;
        return $this;
    }

    public function parseContextual($value)
    {
        if (is_int($value)) {
            $value = (float)$value;
        }

        if (!is_null($this->min) && $value < $this->min) {
            throw new SchemaAttributeParseException($this, "Provided value '{$value}' is less than the minimum value of {$this->min}");
        }

        if (!is_null($this->max) && $value > $this->max) {
            throw new SchemaAttributeParseException($this, "Provided value '{$value}' is greater than the maximum value of {$this->max}");
        }

        if (is_float($value)) {
            return $value;
        }

        throw new SchemaAttributeParseException($this, "Provided value '$value' is not a floating-point number");
    }
}
