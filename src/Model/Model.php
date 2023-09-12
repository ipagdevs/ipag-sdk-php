<?php

namespace Ipag\Sdk\Model;

use Ipag\Sdk\Model\Schema\Exception\MutatorAttributeException;
use Ipag\Sdk\Model\Schema\Exception\SchemaAttributeParseException;
use Ipag\Sdk\Model\Schema\Mutator;
use Ipag\Sdk\Model\Schema\MutatorContext;
use Ipag\Sdk\Model\Schema\Schema;
use Ipag\Sdk\Model\Schema\SchemaAttribute;
use Ipag\Sdk\Model\Schema\SchemaBuilder;
use Ipag\Sdk\Model\Schema\SchemaRelationAttribute;
use Ipag\Sdk\Model\SerializableModelInterface;
use Ipag\Sdk\Util\ClassUtil;
use UnexpectedValueException;

abstract class Model implements SerializableModelInterface
{
    private Schema $schema;
    private array $data;
    private array $relations;
    private string $identifier;
    private array $mutators;

    public function __construct(array $data = [], array $relations = [], ?string $name = null)
    {
        if (is_numeric(key($data)))
            throw new \Exception('Dados mal formatados passado para o construtor da classe ' . ClassUtil::basename(static::class));

        $this->data = $data;
        $this->relations = $relations;
        $this->identifier = $name ?? ClassUtil::basename(static::class);
        $this->schema = new Schema($this->identifier);

        $this->schema($this->schema->builder());
        $this->schemaLoadDefaults();

        $this->fill($data);
    }

    //

    protected abstract function schema(SchemaBuilder $schema): Schema;

    //

    public function getIdentifier(): string
    {
        return $this->identifier;
    }

    public function setIdentifier(string $name): self
    {
        $this->identifier = $name;
        return $this;
    }

    public function setSchemaName(string $name): self
    {
        $this->schema->setName($name);
        return $this;
    }

    public function fill(array $data): self
    {
        foreach ($data as $key => $value) {
            $this->set($key, $value);
        }

        return $this;
    }

    protected function set(string $attribute, $value): self
    {
        $attributeSchema = $this->schema->query($attribute);
        $mutator = $this->loadMutator($attribute);

        $value = $mutator && $mutator->setter ? $mutator->setter->__invoke($value, new MutatorContext($this, $attribute, $attributeSchema)) : $value;

        if ($attributeSchema) {
            if ($attributeSchema instanceof SchemaRelationAttribute) {
                return $this->setRelation($attribute, $attributeSchema->parse($value));
            }

            return $this->setRawAttribute($attribute, $attributeSchema->parse($value));
        }

        return $this->setRawAttribute($attribute, $value);
    }

    protected function get(string $attribute)
    {
        $attributeSchema = $this->schema->query($attribute);

        if ($attributeSchema && $attributeSchema instanceof SchemaRelationAttribute) {
            return $this->getRelation($attribute);
        }

        $value = $this->getRawAttribute($attribute);
        $mutator = $this->loadMutator($attribute);

        return $mutator && $mutator->getter ? $mutator->getter->__invoke($value, new MutatorContext($this, $attribute, $attributeSchema)) : $value;
    }

    public function jsonSerialize(): array
    {
        $serialized = [];

        foreach ($this->schema->getAttributes() as $schema) {
            /** @var SchemaAttribute $schema */
            if ($schema->isHidden()) {
                continue;
            }

            $serialized[$schema->getName()] = $schema->serialize($this->get($schema->getName()));
        }

        return $serialized;
    }

    //

    protected function getRawAttribute(string $name)
    {
        return $this->data[$name] ?? null;
    }

    protected function setRawAttribute(string $name, $value): self
    {
        $this->data[$name] = $value;
        return $this;
    }

    protected function setRawAttributes(array $values): self
    {
        foreach ($values as $name => $value) {
            $this->setRawAttribute($name, $value);
        }

        return $this;
    }

    protected function setRelation(string $name, $value): self
    {
        $this->relations[$name] = $value;
        return $this;
    }

    protected function getRelation(string $name)
    {
        return $this->relations[$name] ?? null;
    }

    protected function schemaLoadDefaults(): void
    {
        foreach ($this->schema->getAttributes() as $schema) {
            /** @var SchemaAttribute $schema */
            if ($schema->hasDefault()) {
                $this->set($schema->getName(), $schema->getDefault());
            }
        }
    }

    protected function loadMutator(string $name): ?Mutator
    {
        $mutator = $this->mutators[$name] ?? null;

        if (!$mutator && is_callable([$this, $name])) {
            $mutator = call_user_func([$this, $name]);

            if (!$mutator instanceof Mutator) {
                throw new UnexpectedValueException("Expected value from mutator '$name' to be instance of Mutator");
            } else {
                $this->mutators[$name] = $mutator;
            }
        }

        return $mutator;
    }

    //

    public static function parse(array $data): self
    {
        $model = new static();
        return $model->fill($data);
    }

    public static function tryParse(array $data): ?self
    {
        try {
            return self::parse($data);
        } catch (SchemaAttributeParseException | MutatorAttributeException $e) {
            return null;
        }
    }
}