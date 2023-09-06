<?php

namespace Ipag\Sdk\Path;

interface CompositePathInterface
{
    function setParent(?CompositePathInterface $parent): void;
    function getParent(): ?CompositePathInterface;
    function joinPath(string $relative): string;
    function getPath(): string;
}
