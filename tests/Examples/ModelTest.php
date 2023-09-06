<?php

namespace Ipag\Sdk\Tests;

use DateTime;
use Ipag\Sdk\Model\Model;
use Ipag\Sdk\Model\Schema\Mutator;
use Ipag\Sdk\Model\Schema\Schema;
use Ipag\Sdk\Model\Schema\SchemaBuilder;

class User extends Model
{
    protected function schema(SchemaBuilder $schema): Schema
    {
        $schema->int('id')->default(1)->nullable();
        $schema->date('created_at')->format('Y-m-d')->nullable();
        $schema->enum('groups', ['admin', 'user'])->array()->array()->nullable();
        $schema->has('child', User::class)->many()->nullable();
        return $schema->build();
    }

    protected function id(): Mutator
    {
        return new Mutator(
            null,
            fn($x, $ctx) => $x > 0 ? $x : $ctx->raise('Um ID nao pode ser menor ou igual a zero')
        );
    }

    public function getId(): int
    {
        return $this->get('id');
    }
}

class ModelTest extends BaseTestCase
{
    public function testCanParseModel()
    {
        $model = User::parse([
            'id' => 2,
            'created_at' => '2022-08-27',
            'groups' => [['admin'], ['user']],
            'child' => [
                [
                    'id' => 99,
                    'created_at' => null,
                    'child' => [
                        [
                            'id' => 3,
                            'created_at' => new DateTime()
                        ]
                    ]
                ],
                [
                    'id' => 100,
                ]
            ]
        ]);

        $this->assertInstanceOf(User::class, $model);

        $this->assertIsArray($model->jsonSerialize());

    }
}