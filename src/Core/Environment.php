<?php

namespace Ipag\Sdk\Core;

use Ipag\Sdk\Path\CompositePathInterface;
use Ipag\Sdk\Util\PathUtil;
use UnexpectedValueException;

abstract class Environment implements CompositePathInterface
{
    protected string $url;

    protected function __construct(string $url)
    {
        $this->url = rtrim($url, PathUtil::PATH_SEPARATOR);
    }

    protected function getBaseUrl(): string
    {
        return $this->url;
    }

    protected function getUrlPath(string $path): string
    {
        return implode(PathUtil::PATH_SEPARATOR, [$this->getBaseUrl(), ltrim($path, PathUtil::PATH_SEPARATOR)]);
    }

    //

    public function setParent(?CompositePathInterface $parent): void
    {
        throw new UnexpectedValueException("An environment is not supposed to have a parent path");
    }

    public function getParent(): ?CompositePathInterface
    {
        return null;
    }

    public function joinPath(string $relative): string
    {
        return $this->getUrlPath($relative);
    }

    public function getPath(): string
    {
        return $this->getUrlPath('');
    }
}
