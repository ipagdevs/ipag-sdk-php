<?php

namespace Ipag\Sdk\Model\Schema;

use Ipag\Sdk\Model\Schema\Exception\SchemaAttributeParseException;
use Ipag\Sdk\Util\StringUtil;

class SchemaAttribute
{
    protected Schema $schema;
    protected string $name;
    protected ?string $visibleName;
    protected bool $nullable;
    protected bool $hidden;
    protected $default;
    protected $hasDefault;

    public function __construct(Schema $schema, string $name)
    {
        $this->schema = $schema;
        $this->name = $name;
        $this->visibleName = null;
        $this->nullable = false;
        $this->hidden = false;

        $this->default = null;
        $this->hasDefault = false;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setVisibleName(string $name): self
    {
        $this->visibleName = $name;
        return $this;
    }

    public function getVisibleName(): string
    {
        return $this->visibleName ?? $this->getName();
    }

    public function getAbsoluteName(): string
    {
        return implode('.', [$this->getSchema()->getName(), $this->getVisibleName()]);
    }

    public function getType(): string
    {
        return StringUtil::classBasename(get_class($this));
    }

    public function getSchema(): Schema
    {
        return $this->schema;
    }

    public function getDefault()
    {
        return $this->default;
    }

    public function isNullable(): bool
    {
        return $this->nullable;
    }

    public function isHidden(): bool
    {
        return $this->hidden;
    }

    public function hasDefault(): bool
    {
        return $this->hasDefault;
    }

    //

    public function nullable(bool $value = true): self
    {
        $this->nullable = $value;
        return $this;
    }

    public function hidden(bool $value = true): self
    {
        $this->hidden = $value;
        return $this;
    }

    public function default($value): self
    {
        $this->default = $value;
        $this->hasDefault = true;
        return $this;
    }

    public function array(): SchemaArrayAttribute
    {
        return $this->schema->array($this->getName(), $this);
    }

    public function list(): SchemaArrayAttribute
    {
        return $this->array();
    }

    //

    public function parse($value)
    {
        if (is_null($value) && $this->isNullable()) {
            return $value;
        }

        return $this->parseContextual($value);
    }

    public function parseContextual($value)
    {
        return $value;
    }

    public function tryParse($value)
    {
        try {
            return $this->parse($value);
        } catch (SchemaAttributeParseException $e) {
            return null;
        }
    }

    public function serialize($value)
    {
        return $value;
    }

    public function copy(): self
    {
        return clone $this;
    }

    //

    public static function from(Schema $schema, string $name): self
    {
        return new static($schema, $name);
    }
}
