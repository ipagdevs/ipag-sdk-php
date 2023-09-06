<?php

namespace Ipag\Sdk\Model\Schema\Exception;

use Ipag\Sdk\Model\Schema\SchemaAttribute;

class SchemaAttributeParseException extends SchemaException
{
    public function __construct(SchemaAttribute $attribute, ?string $message = null)
    {
        $attributeName = $attribute->getAbsoluteName();
        $message ??= "Failed to parse attribute {$attribute->getName()}";
        parent::__construct("'{$attributeName}' {$message}");
    }
}
