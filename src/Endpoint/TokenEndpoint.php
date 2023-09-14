<?php

namespace Ipag\Sdk\Endpoint;

use Ipag\Sdk\Core\Endpoint;
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
     * @return object
     */
    public function create(Token $token): object
    {
        $response = $this->_POST($token->jsonSerialize());
        return json_decode(json_encode($response->getParsed()), FALSE);
    }

    public function get(string $token): object
    {
        $response = $this->_GET(['token' => $token]);
        return json_decode(json_encode($response->getParsed()), FALSE);
    }

}