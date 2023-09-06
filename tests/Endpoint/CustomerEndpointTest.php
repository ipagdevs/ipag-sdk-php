<?php

namespace Ipag\Sdk\Tests\Endpoint;

use GuzzleHttp\Psr7\Response;
use Ipag\Sdk\Exception\HttpException;
use Ipag\Sdk\Http\Resource\CustomerResource;
use Ipag\Sdk\Model\Customer;
use Ipag\Sdk\Tests\IpagClient;

class CustomerEndpointTest extends IpagClient
{
    public function testCreateSuccess()
    {
        $this->instanceClient([new Response(200, [], json_encode((new Customer)->jsonSerialize()))]);

        $c = new Customer([
            'name' => 'Lívia Julia Eduarda Barros',
            'email' => 'livia.julia.barros@eximiart.com.br',
            'cpf_cnpj' => '074.598.263-83',
            'phone' => '(98) 3792-4834',
            'address' => [
                'street' => 'Rua Agenor Vieira',
                'number' => 123,
                'district' => 'São Francisco',
                'city' => 'São Luís',
                'state' => 'MA',
                'zipcode' => '65076-020'
            ]
        ]);

        $customerResource = $this->client->customer()->create($c);

        $this->assertInstanceOf(CustomerResource::class, $customerResource);
    }

    public function testCreateUnprocessableDataClientResourceThrowsException()
    {
        $this->instanceClient([new Response(406)]);

        $this->expectException(HttpException::class);

        $c = new Customer();

        $this->client->customer()->create($c);
    }

    public function testItUnauthorizedActionThrowsException()
    {
        $this->instanceClient([new Response(401)]);

        $this->expectException(HttpException::class);

        $c = new Customer();

        $this->client->customer()->create($c);
    }

}