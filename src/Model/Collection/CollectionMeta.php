<?php

namespace Ipag\Sdk\Model\Collection;

use Ipag\Sdk\Model\Model;
use Ipag\Sdk\Model\Schema\SchemaBuilder;
use Ipag\Sdk\Model\Schema\Schema;

/**
 * CollectionMeta class
 *
 * @codeCoverageIgnore
 */
final class CollectionMeta extends Model
{
    protected function schema(SchemaBuilder $schema): Schema
    {
        $schema->int("current_page")->nullable();
        $schema->int("last_page")->nullable();
        $schema->int("from")->nullable();
        $schema->int("to")->nullable();
        $schema->int("per_page")->nullable();
        $schema->int("total")->nullable();

        return $schema->build();
    }
}