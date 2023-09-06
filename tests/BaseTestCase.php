<?php

namespace Ipag\Sdk\Tests;

use Faker\Generator;
use PHPUnit\Framework\TestCase as FrameworkTestCase;

abstract class BaseTestCase extends FrameworkTestCase
{
    protected static ?Generator $globalFaker = null;
    protected ?Generator $faker = null;

    protected function setUp(): void
    {
        $this->faker = self::$globalFaker;
    }

    public static function setUpBeforeClass(): void
    {
        self::$globalFaker = \Faker\Factory::create(getenv('FAKER_LOCALE') ?: \Faker\Factory::DEFAULT_LOCALE);
    }
}
