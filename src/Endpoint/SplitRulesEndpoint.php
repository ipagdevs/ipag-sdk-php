<?php

namespace Ipag\Sdk\Endpoint;

use Ipag\Sdk\Core\Endpoint;
use Ipag\Sdk\Model\SplitRules;

/**
 * SplitRulesEndpoint class
 *
 * Classe responsável pelo controle dos endpoints do recurso Split Rules.
 */
class SplitRulesEndpoint extends Endpoint
{
    protected string $location = '/service/resources/split_rules';

    public function create(SplitRules $splitRules, int $transaction_id): object
    {
        $response = $this->_POST($splitRules->jsonSerialize(), ['transaction' => $transaction_id]);
        return json_decode(json_encode($response->getParsed()), FALSE);
    }

    public function get(int $split_rule_id, int $transaction_id): object
    {
        $response = $this->_GET([
            'split_rule_id' => $split_rule_id,
            'transaction_id' => $transaction_id
        ]);
        return json_decode(json_encode($response->getParsed()), FALSE);
    }

    public function list(int $transaction_id): object
    {
        $response = $this->_GET(['transaction' => $transaction_id]);
        return json_decode(json_encode($response->getParsed()), FALSE);
    }

    public function delete(int $split_rule_id, int $transaction_id): bool
    {
        $this->_DELETE([
            'split_rule_id' => $split_rule_id,
            'transaction_id' => $transaction_id
        ]);
        return true;
    }

}