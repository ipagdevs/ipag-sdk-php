<?php

namespace Ipag\Sdk\Model;

use Ipag\Sdk\Model\Schema\Schema;
use Ipag\Sdk\Model\Schema\SchemaBuilder;

/**
 * AntifraudProvider Class
 *
 * Classe responsável por representar o recurso Antifraud Provider.
 */
class AntifraudProvider extends Model
{

  /**
   *  @param array $data
   *  array de dados do recurso `AntifraudProvider`
   *
   *  + [`'name'`] string (opcional).
   *  + [`'credentials'`] array (opcional).
   */

  public function __construct(?array $data = [])
  {
    parent::__construct($data);
  }

  protected function schema(SchemaBuilder $schema): Schema
  {
    $schema->string('name')->nullable();
    $schema->any('credentials')->nullable();

    return $schema->build();
  }

  /**
   * Retorna o valor da propriedade `name`.
   *
   * @return string|null
   */
  public function getName(): ?string
  {
    return $this->get('name');
  }

  /**
   * Seta o valor da propriedade `name`.
   *
   * @param string|null $name
   * @return self
   */
  public function setName(?string $name = null): self
  {
    $this->set('name', $name);
    return $this;
  }

  /**
   * Retorna o valor da propriedade `credentials`.
   *
   * @return array|null
   */
  public function getCredentials(): ?array
  {
    return $this->get('credentials');
  }

  /**
   * Seta o valor da propriedade `credentials`.
   *
   * @param array|null $credentials
   * @return self
   */
  public function setCredentials(?array $credentials = null): self
  {
    $this->set('credentials', $credentials);
    return $this;
  }

}