<?php

namespace Ipag\Sdk\Model\Schema;

use Closure;

final class Mutator
{
    public ?Closure $getter;
    public ?Closure $setter;

    public function __construct(?Closure $getter = null, ?Closure $setter = null)
    {
        $this->getter = $getter;
        $this->setter = $setter;
    }
}
