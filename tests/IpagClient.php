<?php

namespace Ipag\Sdk\Tests;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use Ipag\Sdk\Core\IpagEnvironment;
use Ipag\Sdk\Mock\IpagClientMock;

abstract class IpagClient extends BaseTestCase
{
    public IpagClientMock $client;

    protected function instanceClient(?array $responsesGuzzle = []): void
    {
        $mock = new MockHandler(
            $responsesGuzzle
        );

        $handlerStack = HandlerStack::create($mock);

        $this->client = new IpagClientMock(
            'test',
            'AAA-AAAAAA-AAAAAAA-AAAAAAAAA-AAAA',
            IpagEnvironment::LOCAL,
            '2',
            [
                'handler' => $handlerStack
            ]
        );
    }
}