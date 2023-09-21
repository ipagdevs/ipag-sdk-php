<?php

namespace Ipag\Sdk\Model;

use Ipag\Sdk\Model\Schema\Mutator;
use Ipag\Sdk\Model\Schema\Schema;
use Ipag\Sdk\Model\Schema\SchemaBuilder;
use Kubinyete\Assertation\Assert;

/**
 * AntifraudSettings Class
 *
 * Classe responsável por representar o recurso Antifraud Settings.
 */
class AntifraudSettings extends Model
{

    /**
     *  @param array $data
     *  array de dados do recurso `AntifraudSettings`
     *
     *  + [`'enabled'`] bool (opcional).
     *  + [`'environment'`] enum {`'production'` | `'test'`} (opcional).
     *  + [`'consult_mode'`] enum {`'auto'` | `'manual'`} (opcional).
     *  + [`'capture_on_approval'`] bool (opcional).
     *  + [`'cancel_on_refused'`] bool (opcional).
     *  + [`'review_score_threshold'`] float (opcional).
     */

    public function __construct(?array $data = [])
    {
        parent::__construct($data);
    }

    protected function schema(SchemaBuilder $schema): Schema
    {
        $schema->bool('enabled')->nullable();
        $schema->enum('environment', ['production', 'test'])->nullable();
        $schema->enum('consult_mode', ['auto', 'manual'])->nullable();
        $schema->bool('capture_on_approval')->nullable();
        $schema->bool('cancel_on_refused')->nullable();
        $schema->float('review_score_threshold')->nullable();

        return $schema->build();
    }

    protected function review_score_threshold(): Mutator
    {
        return new Mutator(
            null,
            fn($value, $ctx) =>
            is_null($value) ? $value :
            (
                Assert::value(floatval($value))->gte(0)->lte(1)->get()
                ?? $ctx->raise('inválido')
            )
        );
    }

    /**
     * Retorna o valor da propriedade `enabled`.
     *
     * @return boolean|null
     */
    public function getEnabled(): ?bool
    {
        return $this->get('enabled');
    }

    /**
     * Seta o valor da propriedade `enabled`.
     *
     * @param boolean|null $enabled
     * @return self
     */
    public function setEnabled(?bool $enabled = null): self
    {
        $this->set('enabled', $enabled);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `environment`.
     *
     * @return string|null
     */
    public function getEnvironment(): ?string
    {
        return $this->get('environment');
    }

    /**
     * Seta o valor da propriedade `environment`.
     *
     * @param string|null $environment
     * @return self
     */
    public function setEnvironment(?string $environment = null): self
    {
        $this->set('environment', $environment);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `consult_mode`.
     *
     * @return string|null
     */
    public function getConsultMode(): ?string
    {
        return $this->get('consult_mode');
    }

    /**
     * Seta o valor da propriedade `consult_mode`.
     *
     * @param string|null $consultMode
     * @return self
     */
    public function setConsultMode(?string $consultMode = null): self
    {
        $this->set('consult_mode', $consultMode);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `capture_on_approval`.
     *
     * @return boolean|null
     */
    public function getCaptureOnApproval(): ?bool
    {
        return $this->get('capture_on_approval');
    }

    /**
     * Seta o valor da propriedade `capture_on_approval`.
     *
     * @param boolean|null $captureOnApproval
     * @return self
     */
    public function setCaptureOnApproval(?bool $captureOnApproval = null): self
    {
        $this->set('capture_on_approval', $captureOnApproval);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `cancel_on_refused`.
     *
     * @return boolean|null
     */
    public function getCancelOnRefused(): ?bool
    {
        return $this->get('cancel_on_refused');
    }

    /**
     * Seta o valor da propriedade `cancel_on_refused`.
     *
     * @param boolean|null $cancelOnRefused
     * @return self
     */
    public function setCancelOnRefused(?bool $cancelOnRefused = null): self
    {
        $this->set('cancel_on_refused', $cancelOnRefused);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `review_score_threshold`.
     *
     * @return float|null
     */
    public function getReviewScoreThreshold(): ?float
    {
        return $this->get('review_score_threshold');
    }

    /**
     * Seta o valor da propriedade `review_score_threshold`.
     *
     * @param float|null $reviewScoreThreshold
     * @return self
     */
    public function setReviewScoreThreshold(?float $reviewScoreThreshold = null): self
    {
        $this->set('review_score_threshold', $reviewScoreThreshold);
        return $this;
    }

}