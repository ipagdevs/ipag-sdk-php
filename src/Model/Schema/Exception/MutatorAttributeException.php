<?php

namespace Ipag\Sdk\Model\Schema\Exception;

use Throwable;

/**
 * @codeCoverageIgnore
 */
class MutatorAttributeException extends MutatorException
{
    public function __construct(string $attribute, ?string $message = null, ?Throwable $previous = null)
    {
        $attributeName = $attribute;
        $message ??= "Failed to validate/mutate attribute";
        parent::__construct("'{$attributeName}' {$message}");
    }
}