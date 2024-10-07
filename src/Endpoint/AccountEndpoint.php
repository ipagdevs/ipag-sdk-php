<?php

namespace Ipag\Sdk\Endpoint;

use Ipag\Sdk\Core\Endpoint;
use Ipag\Sdk\Http\Response;

class AccountEndpoint extends Endpoint
{
    protected string $location = '/service/v2/account';

    public function myFees(): Response
    {
        return $this->_GET([], [], '/my-fees');
    }

}