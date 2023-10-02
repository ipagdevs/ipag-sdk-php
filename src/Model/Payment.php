<?php

namespace Ipag\Sdk\Model;

use Ipag\Sdk\Model\Schema\Mutator;
use Ipag\Sdk\Model\Schema\Schema;
use Ipag\Sdk\Model\Schema\SchemaBuilder;
use Kubinyete\Assertation\Assert;

/**
 * Payment Class
 *
 * Classe responsável por representar o recurso Payment.
 *
 */
final class Payment extends Model
{
    /**
     *  @param array $data
     *  array de dados do Payment.
     *
     *  + [`'type'`] string.
     *  + [`'method'`] string.
     *  + [`'installments'`] int.
     *  + [`'capture'`] bool.
     *  + [`'fraud_analysis'`] bool.
     *  + [`'softdescriptor'`] string.
     *  + [`'pix_expires_in'`] int.
     *
     *  + [`'card'`] array (opcional) dos dados do Payment Card.
     *  + &emsp; [`'holder'`] string.
     *  + &emsp; [`'number'`] string.
     *  + &emsp; [`'expiry_month'`] string.
     *  + &emsp; [`'expiry_year'`] string.
     *  + &emsp; [`'cvv'`] string.
     *  + &emsp; [`'token'`] string.
     *  + &emsp; [`'tokenize'`] bool.
     *
     *  + [`'boleto'`] array (opcional) dos dados do Boleto.
     *  + &emsp; [`'due_date'`] string (opcional) {Formato: `Y-m-d H:i:s`}.
     *  + &emsp; [`'instructions'`] array (opcional) dos dados da instruções.
     *  + &emsp;&emsp; [`'instruction'`] string (opcional).
     *  + &emsp;&emsp; `...`
     */
    public function __construct(?array $data = [])
    {
        parent::__construct($data);
    }

    public function schema(SchemaBuilder $schema): Schema
    {
        $schema->string('type')->nullable(); // card, boleto ou pix
        $schema->string('method')->nullable();
        $schema->int('installments')->nullable(); // 1 ~ 12
        $schema->bool('capture')->nullable();
        $schema->bool('fraud_analysis')->nullable();
        $schema->string('softdescriptor')->nullable();
        $schema->int('pix_expires_in')->nullable();

        $schema->has('card', PaymentCard::class)->nullable();
        $schema->has('boleto', Boleto::class)->nullable();

        return $schema->build();
    }

    protected function installments(): Mutator
    {
        return new Mutator(
            null,
            fn($value, $ctx) =>
            is_null($value) ? $value :
            (
                Assert::value(intval($value))->gt(0)->get()
                ?? $ctx->raise('inválido (informe um valor de 1 à 12)')
            )
        );
    }

    /**
     * Retorna o valor da propriedade `type`.
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->get('type');
    }

    /**
     * Seta o valor da propriedade `type`.
     *
     * @param string|null $type
     * @return self
     */
    public function setType(?string $type = null): self
    {
        $this->set('type', $type);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `method`.
     *
     * @return string|null
     */
    public function getMethod(): ?string
    {
        return $this->get('method');
    }

    /**
     * Seta o valor da propriedade `method`.
     *
     * @param string|null $method
     * @return self
     */
    public function setMethod(?string $method = null): self
    {
        $this->set('method', $method);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `installments`.
     *
     * @return integer|null
     */
    public function getInstallments(): ?int
    {
        return $this->get('installments');
    }

    /**
     * Seta o valor da propriedade `installments`.
     *
     * @param integer|null $installments
     * @return self
     */
    public function setInstallments(?int $installments = null): self
    {
        $this->set('installments', $installments);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `capture`.
     *
     * @return boolean|null
     */
    public function getCapture(): ?bool
    {
        return $this->get('capture');
    }

    /**
     * Seta o valor da propriedade `capture`.
     *
     * @param boolean|null $capture
     * @return self
     */
    public function setCapture(?bool $capture = null): self
    {
        $this->set('capture', $capture);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `fraud_analysis`.
     *
     * @return boolean|null
     */
    public function getFraudAnalysis(): ?bool
    {
        return $this->get('fraud_analysis');
    }

    /**
     * Seta o valor da propriedade `fraud_analysis`.
     *
     * @param boolean|null $fraudAnalysis
     * @return self
     */
    public function setFraudAnalysis(?bool $fraudAnalysis = null): self
    {
        $this->set('fraud_analysis', $fraudAnalysis);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `softdescriptor`.
     *
     * @return string|null
     */
    public function getSoftDescriptor(): ?string
    {
        return $this->get('softdescriptor');
    }

    /**
     * Seta o valor da propriedade `softdescriptor`.
     *
     * @param string|null $softDescriptor
     * @return self
     */
    public function setSoftDescriptor(?string $softDescriptor = null): self
    {
        $this->set('softdescriptor', $softDescriptor);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `pix_expires_in`.
     *
     * @return integer|null
     */
    public function getPixExpiresIn(): ?int
    {
        return $this->get('pix_expires_in');
    }

    /**
     * Seta o valor da propriedade `pix_expires_in`.
     *
     * @param integer|null $pixExpiresIn
     * @return self
     */
    public function setPixExpiresIn(?int $pixExpiresIn = null): self
    {
        $this->set('pix_expires_in', $pixExpiresIn);
        return $this;
    }

    /**
     * Retorna o objeto `Card` vinculado ao `Payment`.
     *
     * @return PaymentCard|null
     */
    public function getCard(): ?PaymentCard
    {
        return $this->get('card');
    }

    /**
     * Seta o objeto `Card` vinculado ao `Payment`.
     *
     * @param PaymentCard|null $card
     * @return self
     */
    public function setCard(?PaymentCard $card = null): self
    {
        $this->set('card', $card);
        return $this;
    }

    /**
     * Retorna o objeto `Boleto` vinculado ao `Payment`.
     *
     * @return Boleto|null
     */
    public function getBoleto(): ?Boleto
    {
        return $this->get('boleto');
    }

    /**
     * Seta o objeto `Boleto` vinculado ao `Payment`.
     *
     * @param Boleto|null $boleto
     * @return self
     */
    public function setBoleto(?Boleto $boleto = null): self
    {
        $this->set('boleto', $boleto);
        return $this;
    }

}