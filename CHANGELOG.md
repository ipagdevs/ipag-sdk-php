# Changelog

Todas as mudanças notáveis neste projeto serão documentadas neste arquivo.

O formato é baseado em [Keep a Changelog](https://keepachangelog.com/en/1.0.0/), e este projeto adere ao [Versionamento Semântico](https://semver.org/spec/v2.0.0.html).

As versões até `v1.4.1` não têm entrada aqui: consulte as [tags](https://github.com/ipagdevs/ipag-sdk-php/tags) e o histórico de commits.

## v1.5.0 - 2026-10-21

### Adicionado

- Suporte a CNPJ alfanumérico em `Customer` (`cpf_cnpj` e `tax_receipt`), `Seller` (`cpf_cnpj`) e `Holder` (`cpfCnpj`). A Receita Federal atribui esse formato às novas inscrições desde julho de 2026.
  - O CNPJ é aceito com ou sem máscara, em maiúsculas ou minúsculas.
  - Ele é enviado sem máscara e em maiúsculas: `12.abc.345/01de-35` vira `12ABC34501DE35`.
  - Antes, um CNPJ alfanumérico era recusado com `MutatorAttributeException`.

### Alterado

- As letras de um documento deixam de ser descartadas, e um valor com letras só é aceito se for um CNPJ alfanumérico válido. Antes, `CPF 074.598.263-83` era aceito como `07459826383`. Agora ele é recusado.

## v1.4.2 - 2026-10-21

### Corrigido

- `Customer` (`cpf_cnpj` e `tax_receipt`), `Seller` (`cpf_cnpj`) e `Holder` (`cpfCnpj`) não transformam mais um CPF em CNPJ. Um documento com 11 dígitos, com ou sem máscara, passa a ser sempre tratado como CPF e enviado com 11 dígitos. Antes, quando o CPF completado com zeros até 14 dígitos também era um CNPJ válido (todo CPF iniciado em `00` e uma parte dos demais), o SDK enviava esse CNPJ, e a API cadastrava o cliente como pessoa jurídica.
  - **O valor enviado muda** para esses CPFs: `003.344.769-17` passa a ser enviado como `00334476917`, e não mais como `00000334476917`.
  - Um CNPJ informado com 11 dígitos (sem os três primeiros zeros) deixa de ser completado e passa a ser validado como CPF. Envie o CNPJ com os 14 dígitos.
  - Documentos com outros tamanhos seguem com o comportamento anterior. Um exemplo é o CPF passado como `int`, que perde os zeros à esquerda. Para não depender disso, envie o CPF como string de 11 dígitos.
  - A atualização não corrige clientes já cadastrados com o CNPJ errado: segundo a documentação da API, o `cpf_cnpj` não pode ser alterado depois da criação do cliente.
