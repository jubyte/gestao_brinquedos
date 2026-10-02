# SISTEMA GESTÃO DE BRINQUEDOS

## Objetivo

O Sistema de Gestão de Brinquedos foi desenvolvido para auxiliar no controle dos brinquedos disponíveis em estoque. O sistema permite cadastrar, visualizar, editar e excluir brinquedos, mantendo suas informações armazenadas em um banco de dados MySQL. Cada brinquedo possui as informações de nome, categoria, faixa etária, preço e quantidade em estoque.

## Tecnologias

O projeto foi desenvolvido utilizando PHP, MySQL, e HTML. Para as operações com o banco de dados são utilizados Prepared Statements. O ambiente de desenvolvimento utiliza o XAMPP, e o projeto foi versionado com Git e GitHub.

## Requisitos

Para executar o sistema, é necessário ter:

- XAMPP
- PHP
- MySQL
- Navegador
- Visual Studio Code

## Instalação e configuração

Primeiramente, coloque a pasta do projeto dentro da pasta `htdocs` do XAMPP. Depois, abra o XAMPP e inicie o **Apache** e **MySQL**.

Acesse o **phpMyAdmin** pelo botão **Admin** do MySQL. Crie um banco de dados chamado `brinquedos`.

Acesse o banco de dados criado e execute o arquivo `database/db.sql` para criar a tabela necessária para o funcionamento do sistema. 

Verifique a configuração da conexão com o banco de dados no arquivo `infra/conexao.php`. Caso necessário, as informações de acesso ao MySQL podem ser alteradas nesse arquivo.

Abra o navegador e acesse o sistema pelo endereço correspondente à pasta do projeto no `localhost`.

## Funcionalidades

* Cadastro de brinquedos.
* Visualização dos brinquedos cadastrados.
* Edição das informações dos brinquedos.
* Exclusão de brinquedos.
* Validação dos dados recebidos.
* Utilização de Prepared Statements nas operações com o banco de dados.
* Tratamento básico de erros durante as operações com o banco de dados.
