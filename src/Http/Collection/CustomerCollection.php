<?php

namespace Ipag\Sdk\Http\Collection;

use Ipag\Sdk\Model\Collection\CollectionLinks;
use Ipag\Sdk\Model\Collection\CollectionMeta;
use Ipag\Sdk\Model\Customer;
use Ipag\Sdk\Model\Model;
use Ipag\Sdk\Model\Schema\SchemaBuilder;
use Ipag\Sdk\Model\Schema\Schema;

final class CustomerCollection extends Model
{
    protected function schema(SchemaBuilder $schema): Schema
    {
        $schema->hasMany('data', Customer::class);
        $schema->has('links', CollectionLinks::class);
        $schema->has('meta', CollectionMeta::class);

        return $schema->build();
    }

}