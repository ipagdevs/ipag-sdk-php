<?php

namespace Ipag\Sdk\Model\Collection;

use Ipag\Sdk\Model\Model;
use Ipag\Sdk\Model\Schema\SchemaBuilder;
use Ipag\Sdk\Model\Schema\Schema;

/**
 * CollectionLinks class
 */
final class CollectionLinks extends Model
{
    protected function schema(SchemaBuilder $schema): Schema
    {
        $schema->string("first")->nullable();
        $schema->string("last")->nullable();
        $schema->string("prev")->nullable();
        $schema->string("next")->nullable();

        return $schema->build();
    }
}