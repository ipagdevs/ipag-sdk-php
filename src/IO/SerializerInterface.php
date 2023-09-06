<?php

namespace Ipag\Sdk\IO;

interface SerializerInterface
{
    function serialize(array $data): string;
    function unserialize(string $data): array;
    function getContentType(): ?string;
}
