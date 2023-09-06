<?php

namespace Ipag\Sdk\Model\Schema;

use Ipag\Sdk\Model\Schema\Exception\SchemaAttributeParseException;

class SchemaStringAttribute extends SchemaAttribute
{
    protected int $limit = 0;
    protected int $min = 0;
    protected int $max = 0;
    protected bool $truncate = false;

    public function limit(int $limit): self
    {
        $this->limit = max($limit, 0);
        return $this;
    }

    public function truncate(int $limit): self
    {
        $this->truncate = true;
        return $this->limit($limit);
    }

    public function between(int $min, int $max = 0): self
    {
        if ($max === 0) {
            $this->min = $this->max = max($min, 0);
        } else {
            $this->min = max($min, 0);
            $this->max = max($max, 0);
        }

        return $this;
    }

    public function parseContextual($value)
    {
        if (is_null($value) && $this->isNullable()) {
            return $value;
        }

        if (!is_string($value)) {
            throw new SchemaAttributeParseException($this, "Provided value '$value' is not an string");
        }

        if ($this->limit > 0 && strlen($value) > $this->limit) {
            if (!$this->truncate) {
                throw new SchemaAttributeParseException($this, "Provided value '$value' is exceeding the limit of {$this->limit} characters");
            }

            $value = substr($value, 0, $this->limit);
        }

        $len = strlen($value);
        if ($this->min > 0 && $len < $this->min) {
            throw new SchemaAttributeParseException($this, "Provided value '$value' is shorter than the minimum of {$this->min} characters");
        }

        if ($this->max > 0 && $len > $this->max) {
            throw new SchemaAttributeParseException($this, "Provided value '$value' is longer than the maximum of {$this->max} characters");
        }

        return $value;
    }
}
