<?php

namespace Ipag\Sdk\Tests;

use Ipag\Sdk\Util\DocumentUtil;

class DocumentUtilTest extends BaseTestCase
{
    /**
     * @dataProvider validCpfCnpjProvider
     */
    public function testShouldReturnTheCpfCnpjWithoutMask($document, string $expected)
    {
        $this->assertSame($expected, DocumentUtil::cpfCnpj($document));
    }

    /**
     * @dataProvider invalidCpfCnpjProvider
     */
    public function testShouldReturnNullForAnInvalidCpfCnpj($document)
    {
        $this->assertNull(DocumentUtil::cpfCnpj($document));
    }

    public function validCpfCnpjProvider(): array
    {
        return [
            // completados com zeros até 14 dígitos, estes CPFs também são CNPJs válidos
            'cpf iniciado em 00' => ['00334476917', '00334476917'],
            'cpf iniciado em 00 com máscara' => ['003.344.769-17', '00334476917'],
            'cpf iniciado em um único 0' => ['04654733930', '04654733930'],
            'cpf sem zero à esquerda' => ['74032971307', '74032971307'],

            'cpf sem colisão' => ['60863754295', '60863754295'],
            'cnpj iniciado em 0' => ['01234567000195', '01234567000195'],
            'cnpj com máscara' => ['01.234.567/0001-95', '01234567000195'],
            'cnpj iniciado em 000' => ['00012345678030', '00012345678030'],

            // fora de 11 e 14 dígitos, o valor continua sendo completado com zeros
            'cnpj sem o zero à esquerda' => ['1234567000195', '01234567000195'],
            'cpf sem o zero à esquerda' => ['4114856790', '04114856790'],
            'cpf como int' => [4114856790, '04114856790'],
        ];
    }

    public function invalidCpfCnpjProvider(): array
    {
        return [
            'cpf com dv inválido' => ['074.598.263-80'],
            'cpf iniciado em 00 com dv inválido' => ['00334476918'],
            // com 11 dígitos é CPF, mesmo que completado com zeros vire o CNPJ válido 00012345678030
            'cnpj sem os três zeros à esquerda' => ['12345678030'],
            'cnpj com dv inválido' => ['01234567000196'],
            'dígitos repetidos' => ['11111111111'],
            'vazio' => [''],
        ];
    }
}
