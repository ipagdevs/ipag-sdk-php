<?php

namespace Ipag\Sdk\Model;

use Ipag\Sdk\Model\Schema\Mutator;
use Ipag\Sdk\Model\Schema\Schema;
use Ipag\Sdk\Model\Schema\SchemaBuilder;
use Kubinyete\Assertation\Assert;

/**
 * Antifraud Class
 *
 * Classe responsável por representar o recurso Antifraud.
 */
class Antifraud extends Model
{

  /**
   * @param array|null $data
   * array de dados do recurso `Antifraud`
   *
   *  + [`'provider'`] array (opcional) dos dados do Address.
   *  + &emsp; [`'name'`] string (opcional).
   *  + &emsp; [`'credentials'`] array (opcional).
   *  + [`'settings'`] array (opcional) dos dados do Address.
   *  + &emsp; [`'enabled'`] bool (opcional).
   *  + &emsp; [`'environment'`] enum {`'production'` | `'test'`} (opcional).
   *  + &emsp; [`'consult_mode'`] enum {`'auto'` | `'manual'`} (opcional).
   *  + &emsp; [`'capture_on_approval'`] bool (opcional).
   *  + &emsp; [`'cancel_on_refused'`] bool (opcional).
   *  + &emsp; [`'review_score_threshold'`] float (opcional).
   */
  public function __construct(?array $data = [])
  {
    parent::__construct($data);
  }

  protected function schema(SchemaBuilder $schema): Schema
  {
    $schema->has('provider', AntifraudProvider::class)->nullable();
    $schema->has('settings', AntifraudSettings::class)->nullable();

    return $schema->build();
  }

  /**
   * Retorna o valor da propriedade `provider`.
   *
   * @return AntifraudProvider|null
   */
  public function getProvider(): ?AntifraudProvider
  {
    return $this->get('provider');
  }

  /**
   * Seta o valor da propriedade `provider`.
   *
   * @param AntifraudProvider|null $provider
   * @return self
   */
  public function setProvider(?AntifraudProvider $provider = null): self
  {
    $this->set('provider', $provider);
    return $this;
  }

  /**
   * Retorna o valor da propriedade `settings`.
   *
   * @return AntifraudSettings|null
   */
  public function getSettings(): ?AntifraudSettings
  {
    return $this->get('settings');
  }

  /**
   * Seta o valor da propriedade `settings`.
   *
   * @param AntifraudSettings|null $settings
   * @return self
   */
  public function setSettings(?AntifraudSettings $settings = null): self
  {
    $this->set('settings', $settings);
    return $this;
  }

}