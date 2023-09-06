<?php

namespace Ipag\Sdk\Http\Resource;

use Ipag\Sdk\Model\Customer;
use Ipag\Sdk\Model\Model;
use Ipag\Sdk\Model\Schema\Schema;
use Ipag\Sdk\Model\Schema\SchemaBuilder;

final class CustomerResource extends Model
{
    protected function schema(SchemaBuilder $schema): Schema
    {
        $schema->int('id')->nullable()->isHidden();
        $schema->string('uuid')->nullable()->isHidden();
        $schema->string('resource')->nullable();
        $schema->has('attributes', Customer::class)->nullable();

        return $schema->build();
    }

    public function getId(): int
    {
        return $this->get('id');
    }

    public function getUuid(): int
    {
        return $this->get('uuid');
    }
    public function getResource(): int
    {
        return $this->get('resource');
    }

    public function getAttributes(): Customer
    {
        return $this->get('attributes');
    }
}