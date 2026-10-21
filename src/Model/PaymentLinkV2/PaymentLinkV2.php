<?php

namespace Ipag\Sdk\Model\PaymentLinkV2;

use Ipag\Sdk\Model\Model;
use Ipag\Sdk\Model\Schema\Mutator;
use Ipag\Sdk\Model\Schema\Schema;
use Ipag\Sdk\Model\Schema\SchemaBuilder;

class PaymentLinkV2 extends Model
{
    public function __construct(?array $data = [])
    {
        parent::__construct($data);
    }

    protected function schema(SchemaBuilder $schema): Schema
    {
        $schema->string('external_code')->nullable();
        $schema->float('amount')->nullable();
        $schema->string('description')->nullable();
        $schema->string('expires_at')->nullable();
        $schema->string('additional_info')->nullable();
        $schema->int('stock_limit')->nullable();
        $schema->has('checkout_settings', CheckoutSettings::class)->nullable();

        return $schema->build();
    }

    public function jsonSerialize(): array
    {
        return array_filter(parent::jsonSerialize(), fn($v) => !is_null($v));
    }

    protected function expires_at(): Mutator
    {
        return new Mutator(
            null,
            function ($value, $ctx) {
                if (is_null($value)) {
                    return null;
                }

                $d = \DateTime::createFromFormat('d/m/Y H:i:s', $value);

                return ($d && $d->format('d/m/Y H:i:s') === $value) ?
                    $value : $ctx->raise('inválido (formato esperado: dd/mm/aaaa hh:mm:ss)');
            }
        );
    }

    public function getExternalCode(): ?string
    {
        return $this->get('external_code');
    }

    public function setExternalCode(?string $externalCode): self
    {
        $this->set('external_code', $externalCode);
        return $this;
    }

    public function getAmount(): ?float
    {
        return $this->get('amount');
    }

    public function setAmount(?float $amount): self
    {
        $this->set('amount', $amount);
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->get('description');
    }

    public function setDescription(?string $description): self
    {
        $this->set('description', $description);
        return $this;
    }

    public function getExpiresAt(): ?string
    {
        return $this->get('expires_at');
    }

    public function setExpiresAt(?string $expiresAt): self
    {
        $this->set('expires_at', $expiresAt);
        return $this;
    }

    public function getAdditionalInfo(): ?string
    {
        return $this->get('additional_info');
    }

    public function setAdditionalInfo(?string $additionalInfo): self
    {
        $this->set('additional_info', $additionalInfo);
        return $this;
    }

    public function getStockLimit(): ?int
    {
        return $this->get('stock_limit');
    }

    public function setStockLimit(?int $stockLimit): self
    {
        $this->set('stock_limit', $stockLimit);
        return $this;
    }

    public function getCheckoutSettings(): ?CheckoutSettings
    {
        return $this->get('checkout_settings');
    }

    public function setCheckoutSettings(?CheckoutSettings $checkoutSettings): self
    {
        $this->set('checkout_settings', $checkoutSettings);
        return $this;
    }
}
