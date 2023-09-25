<?php

namespace Ipag\Sdk\Endpoint;

use Ipag\Sdk\Core\Endpoint;
use Ipag\Sdk\Http\Response;
use Ipag\Sdk\Model\Token;

/**
 * TokenEndpoint class
 *
 * Classe responsável pelo controle dos endpoints do recurso Token.
 */
class TokenEndpoint extends Endpoint
{
    protected string $location = '/service/resources/card_tokens';

    /**
     * Endpoint para criar um recurso `Token Card`
     *
     * @param Token $token
     * @return Response
     */
    public function create(Token $token): Response
    {
        return $this->_POST($token->jsonSerialize());
    }

    /**
     * Endpoint para consultar um recurso `Token Card`
     *
     * @param string $token
     * @return Response
     */
    public function get(string $token): Response
    {
        return $this->_GET(['token' => $token]);
    }

}