<?php

namespace Ipag\Sdk\Endpoint;

use Ipag\Sdk\Core\Endpoint;
use Ipag\Sdk\Http\Response;
use Ipag\Sdk\Model\Antifraud;

/**
 * EstablishmentAntifraudEndpoint class
 *
 * Classe responsável pelo controle dos endpoints do recurso Establishment Antifraud.
 *
 */

class EstablishmentAntifraudEndpoint extends Endpoint
{
    protected string $location = '/service/v2/establishments';

    /**
     * Endpoint para configuração de antifraude
     *
     * @param Antifraud $antifraud
     * @param string $establishment_id
     * @return Response
     */
    public function config(Antifraud $antifraud, string $establishment_id): Response
    {
        return $this->_POST(
            $antifraud->jsonSerialize(),
            [],
            [],
            "/{$establishment_id}/antifraud_settings"
        );
    }

}