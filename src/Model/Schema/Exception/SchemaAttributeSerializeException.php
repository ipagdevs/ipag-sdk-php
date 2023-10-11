<?php

namespace Ipag\Sdk\Model\Schema\Exception;

use Ipag\Sdk\Model\Schema\SchemaAttribute;

/**
 * @codeCoverageIgnore
 */
class SchemaAttributeSerializeException extends SchemaException
{
    public function __construct(SchemaAttribute $attribute, ?string $message = null)
    {
        $attributeName = $attribute->getAbsoluteName();
        $message ??= "Failed to serialize attribute {$attribute->getName()}";
        parent::__construct("'{$attributeName}' {$message}");
    }
}