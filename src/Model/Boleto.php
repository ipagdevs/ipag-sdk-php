<?php

namespace Ipag\Sdk\Model;

use Ipag\Sdk\Model\Schema\Mutator;
use Ipag\Sdk\Model\Schema\Schema;
use Ipag\Sdk\Model\Schema\SchemaBuilder;

/**
 * Boleto Class
 *
 * Classe responsável por representar o recurso Boleto.
 *
 */
final class Boleto extends Model
{
    /**
     *  @param array $data
     *  array de dados do Card.
     *
     *  + [`'due_date'`] string (opcional) {Formato: `Y-m-d H:i:s`}.
     *  + [`'instructions'`] array (opcional) dos dados da instruções.
     *  + &emsp; [`'instruction'`] string (opcional).
     *  + &emsp; `...`
     */
    public function __construct(?array $data = [])
    {
        parent::__construct($data);
    }

    public function schema(SchemaBuilder $schema): Schema
    {
        $schema->string('due_date')->nullable();
        $schema->any('instructions')->default([])->nullable();

        return $schema->build();
    }

    protected function due_date(): Mutator
    {
        return new Mutator(
            null,
            function ($value, $ctx) {
                $d = \DateTime::createFromFormat('Y-m-d', $value);

                return is_null($value) ||
                    ($d && $d->format('Y-m-d') === $value) ?
                    $value : $ctx->raise('inválido');
            }
        );
    }

    /**
     * Retorna o valor da propriedade `due_date`.
     *
     * @return string|null
     */
    public function getDueDate(): ?string
    {
        return $this->get('due_date');
    }

    /**
     * Seta o valor da propriedade `due_date`.
     *
     * @param string|null $due_date
     * @return self
     */
    public function setDueDate(?string $due_date = null): self
    {
        $this->set('due_date', $due_date);
        return $this;
    }

    /**
     * Retorna o array `Instructions` associado ao `Boleto`.
     *
     * @return array|null
     */
    public function getInstructions(): ?array
    {
        return $this->get('instructions');
    }

    /**
     * Seta o array `Instructions` associado ao `Boleto`.
     *
     * @param array $instructions
     * @return self
     */
    public function setInstructions(array $instructions = []): self
    {
        $this->set('instructions', $instructions);
        return $this;
    }

    /**
     * Adiciona uma instrução ao `Boleto`.
     *
     * @param string $instruction
     * @return self
     */
    public function addInstruction(string $instruction): self
    {
        $this->set(
            'instructions',
            array_merge(
                $this->get('instructions'),
                [
                    ['instruction' => $instruction]
                ]
            )
        );

        return $this;
    }

}