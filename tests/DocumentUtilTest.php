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

            'cnpj alfanumérico' => ['12ABC34501DE35', '12ABC34501DE35'],
            'cnpj alfanumérico com máscara' => ['12.ABC.345/01DE-35', '12ABC34501DE35'],
            'cnpj alfanumérico em minúsculas' => ['12.abc.345/01de-35', '12ABC34501DE35'],
            'cnpj alfanumérico só com letras na raiz' => ['ABCDEFGHIJKL80', 'ABCDEFGHIJKL80'],
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

            'cnpj alfanumérico com dv inválido' => ['ABCDEFGHIJKL81'],
            'cnpj alfanumérico com letra no primeiro dv' => ['000000000001P1'],
            'cnpj alfanumérico com letra no segundo dv' => ['0000000000019L'],
            'cnpj alfanumérico com caractere a menos' => ['12.ABC.345/01DE-3'],
            'cnpj alfanumérico com caractere a mais' => ['12.ABC.345/01DE-355'],
            // letras não são mais descartadas: só valem como parte de um CNPJ alfanumérico
            'texto junto do cpf' => ['CPF 074.598.263-83'],
        ];
    }

    /**
     * @dataProvider validCnpjProvider
     */
    public function testShouldReturnTheCnpjWithoutMask($document, string $expected)
    {
        $this->assertSame($expected, DocumentUtil::cnpj($document));
    }

    /**
     * @dataProvider invalidCnpjProvider
     */
    public function testShouldReturnNullForAnInvalidCnpj($document)
    {
        $this->assertNull(DocumentUtil::cnpj($document));
    }

    public function validCnpjProvider(): array
    {
        return [
            'numérico' => ['01.234.567/0001-95', '01234567000195'],
            'numérico iniciado em 000' => ['00000000000191', '00000000000191'],
            'alfanumérico' => ['12.ABC.345/01DE-35', '12ABC34501DE35'],
            'alfanumérico em minúsculas' => ['abcdefghijkl80', 'ABCDEFGHIJKL80'],
        ];
    }

    public function invalidCnpjProvider(): array
    {
        return [
            'cpf' => ['00334476917'],
            'sem os zeros à esquerda' => ['191'],
            'dv inválido' => ['00000000000192'],
            'zerado' => ['00.000.000/0000-00'],
            'letra no dv' => ['000000000001P1'],
            'vazio' => [''],
        ];
    }
}
