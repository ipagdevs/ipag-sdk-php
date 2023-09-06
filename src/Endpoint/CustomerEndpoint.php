<?php

namespace Ipag\Sdk\Endpoint;

use Ipag\Sdk\Core\Endpoint;
use Ipag\Sdk\Exception\EndpointException;
use Ipag\Sdk\Exception\HttpException;
use Ipag\Sdk\Http\Collection\CustomerCollection;
use Ipag\Sdk\Http\Request\CustomerFiltersRequest;
use Ipag\Sdk\Http\Resource\CustomerResource;
use Ipag\Sdk\Model\Customer;

/**
 * CustomerEndpoint class
 *
 * Classe responsável pelo controle dos endpoints do recurso Customer.
 */
class CustomerEndpoint extends Endpoint
{
    protected string $location = '/service/resources/customers';

    public function create(?Customer $customer = null): CustomerResource
    {
        try {
            if ($customer) {
                $this->resource = (object) $customer;
            }

            if (!$this->resource) {
                throw new EndpointException('Customer resource is required');
            }

            $response = $this->requestPOST($this->resource->jsonSerialize());
            return CustomerResource::parse($response->getParsed());
        } catch (HttpException $e) {
            $response = $e->getResponse();
            $this->logger->error("exception code {$e->getStatusCode()} {$e->getStatusMessage()}", ['exception' => strval($e), 'response' => $response ? $response->getBody() : null]);
            $this->exceptionThrown($e);
        } catch (\Throwable $e) {
            $this->logger->error("exception code {$e->getCode()} {$e->getMessage()}", ['exception' => strval($e)]);
            $this->exceptionThrown($e);
        }
    }

    public function alter(int $id, ?Customer $customer = null): CustomerResource
    {
        try {
            if ($customer) {
                $this->resource = (object) $customer;
            }

            if (!$this->resource) {
                throw new EndpointException('Customer resource is required');
            }

            $response = $this->requestPUT($this->resource->jsonSerialize(), ['id' => $id]);
            return CustomerResource::parse($response->getParsed());
        } catch (HttpException $e) {
            $response = $e->getResponse();
            $this->logger->error("exception code {$e->getStatusCode()} {$e->getStatusMessage()}", ['exception' => strval($e), 'response' => $response ? $response->getBody() : null]);
            $this->exceptionThrown($e);
        } catch (\Throwable $e) {
            $this->logger->error("exception code {$e->getCode()} {$e->getMessage()}", ['exception' => strval($e)]);
            $this->exceptionThrown($e);
        }
    }

    public function consult(string $id): CustomerResource
    {
        $response = $this->requestGET(['id' => $id]);
        return CustomerResource::parse($response->getParsed());
    }

    public function delete(string $id): bool
    {
        $this->requestDELETE(['id' => $id]);
        return true;
    }

    public function List(?CustomerFiltersRequest $filters = null): CustomerCollection
    {
        $response = $this->requestGET([$filters ?? []]);
        return CustomerCollection::parse($response->getParsed());
    }

}