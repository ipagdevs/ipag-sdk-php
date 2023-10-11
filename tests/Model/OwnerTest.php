<?php

namespace Ipag\Sdk\Tests\Model;

use Ipag\Sdk\Model\Schema\Exception\MutatorAttributeException;
use PHPUnit\Framework\TestCase;

class OwnerTest extends TestCase
{
    public function testShouldCreateOwnerObjectWithConstructorSuccessfully()
    {
        $owner = new \Ipag\Sdk\Model\Owner([
            'name' => 'Lívia Julia Eduarda Barros',
            'email' => 'livia.julia.barros@eximiart.com.br',
            'cpf' => '074.598.263-83',
            'phone' => '(98) 3792-4834',
            'birthdate' => '1980-01-01',
        ]);

        $this->assertEquals('Lívia Julia Eduarda Barros', $owner->getName());
        $this->assertEquals('livia.julia.barros@eximiart.com.br', $owner->getEmail());
        $this->assertEquals('07459826383', $owner->getCpf());
        $this->assertEquals('9837924834', $owner->getPhone());
        $this->assertEquals('1980-01-01', $owner->getBirthdate());

    }

    public function testShouldCreateOwnerObjectAndSetTheValuesSuccessfully()
    {
        $owner = (new \Ipag\Sdk\Model\Owner())
            ->setName('Lívia Julia Eduarda Barros')
            ->setEmail('livia.julia.barros@eximiart.com.br')
            ->setCpf('074.598.263-83')
            ->setPhone('(98) 3792-4834')
            ->setBirthdate('1980-01-01');

        $this->assertEquals('Lívia Julia Eduarda Barros', $owner->getName());
        $this->assertEquals('livia.julia.barros@eximiart.com.br', $owner->getEmail());
        $this->assertEquals('07459826383', $owner->getCpf());
        $this->assertEquals('9837924834', $owner->getPhone());
        $this->assertEquals('1980-01-01', $owner->getBirthdate());

    }

    public function testShouldCreateEmptyOwnerObjectSuccessfully()
    {
        $owner = new \Ipag\Sdk\Model\Owner();

        $this->assertEmpty($owner->getName());
        $this->assertEmpty($owner->getEmail());
        $this->assertEmpty($owner->getCpf());
        $this->assertEmpty($owner->getPhone());
        $this->assertEmpty($owner->getBirthdate());

    }

    public function testCreateAndSetEmptyPropertiesOwnerObjectSuccessfully()
    {
        $owner = new \Ipag\Sdk\Model\Owner([
            'name' => 'Lívia Julia Eduarda Barros',
            'email' => 'livia.julia.barros@eximiart.com.br',
            'cpf' => '074.598.263-83',
            'phone' => '(98) 3792-4834',
            'birthdate' => '1980-01-01',
        ]);

        $owner
            ->setName(null)
            ->setEmail(null)
            ->setCpf(null)
            ->setPhone(null)
            ->setBirthdate(null);

        $this->assertEmpty($owner->getName());
        $this->assertEmpty($owner->getEmail());
        $this->assertEmpty($owner->getCpf());
        $this->assertEmpty($owner->getPhone());
        $this->assertEmpty($owner->getBirthdate());

    }

    public function testShouldThrowAValidationExceptionOnTheOwnerEmailProperty()
    {
        $owner = new \Ipag\Sdk\Model\Owner();

        $this->expectException(MutatorAttributeException::class);

        $owner->setEmail('livia.julia.barros');
    }

    public function testShouldThrowAValidationExceptionOnTheOwnerCpfProperty()
    {
        $owner = new \Ipag\Sdk\Model\Owner();

        $this->expectException(MutatorAttributeException::class);

        $owner->setCpf('074.598.263-80');
    }

    public function testShouldThrowAValidationExceptionOnTheOwnerPhoneProperty()
    {
        $owner = new \Ipag\Sdk\Model\Owner();

        $this->expectException(MutatorAttributeException::class);

        $owner->setPhone('111');
    }

    public function testShouldThrowAValidationExceptionOnTheOwnerBirthdateProperty()
    {
        $owner = new \Ipag\Sdk\Model\Owner();

        $this->expectException(MutatorAttributeException::class);

        $owner->setBirthdate('10/07/2021');

    }

}