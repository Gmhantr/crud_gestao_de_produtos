# Mini Sistema de Gestão de Produtos

Sobre o Projeto

Este projeto consiste em um mini sistema de gestão de produtos
desenvolvido para aplicar conceitos de Programação Orientada a Objetos,
relacionamento entre objetos, armazenamento em banco de dados e
autenticação de usuários.

O sistema permite que usuários autenticados realizem o gerenciamento de
produtos, fornecedores e uma cesta de compras.

O projeto foi desenvolvido utilizando PHP, MySQL, JavaScript e AJAX.

------------------------------------------------------------------------

Tecnologias Utilizadas

Front-end

-   HTML5
-   CSS3
-   JavaScript
-   AJAX (Fetch API)

Back-end

-   PHP
-   PDO
-   Programação Orientada a Objetos (POO)

Banco de Dados

-   MySQL

Responsável pelo armazenamento das informações do sistema.

Ferramentas

-   Visual Studio Code
-   XAMPP
-   PHPMyAdmin
-   DBDiagram.io

------------------------------------------------------------------------

Funcionalidades do Sistema

Cadastro e Autenticação de Usuários

O sistema possui cadastro de usuários contendo:

-   Nome;
-   Email;
-   Senha.

As senhas são armazenadas utilizando hash SHA-256, evitando o
armazenamento de senhas em texto puro.

Após realizar a autenticação, o usuário possui acesso às funcionalidades
do sistema.

------------------------------------------------------------------------

Cadastro de Fornecedores

Permite:

-   Cadastrar fornecedores;
-   Editar informações;
-   Excluir fornecedores;
-   Consultar fornecedores cadastrados.

Dados armazenados:

-   Nome;
-   CNPJ;
-   Telefone;
-   Email;
-   Endereço.

------------------------------------------------------------------------

Cadastro de Produtos

Permite:

-   Cadastrar produtos;
-   Editar informações;
-   Excluir produtos;
-   Consultar produtos cadastrados.

Dados armazenados:

-   Nome;
-   Descrição;
-   Preço;
-   Estoque;
-   Fornecedor relacionado.

Cada produto possui um fornecedor responsável através do relacionamento
entre as tabelas.

------------------------------------------------------------------------

Cesta de Produtos

O sistema possui uma área onde o usuário pode visualizar produtos
disponíveis.

Funcionamento:

-   Os produtos são exibidos com checkbox;
-   O usuário seleciona os produtos desejados;
-   O sistema realiza uma validação da seleção;
-   Após a validação, os produtos são adicionados à cesta.

Cada produto selecionado representa apenas uma unidade.

Não existe controle de quantidade dentro da cesta.

------------------------------------------------------------------------

Carrinho / Cesta

A cesta apresenta:

-   Produtos selecionados pelo usuário;
-   Quantidade de produtos selecionados;
-   Valor total dos produtos.

O sistema calcula automaticamente o resumo da compra.

------------------------------------------------------------------------

Funcionamento do AJAX

O AJAX é utilizado para atualizar dados sem necessidade de atualizar a
página.

Fluxo:

Usuário | JavaScript (Fetch) | PHP | Banco MySQL | Resposta JSON |
Atualização da interface

É utilizado nas áreas de gerenciamento de produtos, fornecedores e
atualização das informações exibidas.

------------------------------------------------------------------------

Banco de Dados

O banco possui as seguintes entidades:

Usuarios

Armazena os dados dos usuários do sistema.

Campos:

-   id
-   nome
-   email
-   senha_hash
-   criado_em

Fornecedores

Armazena os fornecedores cadastrados.

Campos:

-   id
-   nome
-   cnpj
-   telefone
-   email
-   endereco

Produtos

Armazena os produtos cadastrados.

Campos:

-   id
-   nome
-   descricao
-   preco
-   estoque
-   fornecedor_id

Cesta

Representa a cesta pertencente ao usuário.

Campos:

-   id
-   usuario_id
-   criado_em

Itens_Cesta

Relaciona os produtos selecionados na cesta.

Campos:

-   id
-   cesta_id
-   produto_id

------------------------------------------------------------------------

DER - Diagrama Entidade Relacionamento

COLOCAR AQUI A IMAGEM DO DER GERADO NO DBDIAGRAM.IO

Relacionamentos:

Usuario 1:N Cesta

Fornecedor 1:N Produto

Cesta 1:N Itens_Cesta

Produto 1:N Itens_Cesta


------------------------------------------------------------------------


------------------------------------------------------------------------

Tratamento de Erros

O sistema possui validações para:

-   Email duplicado;
-   CNPJ duplicado;
-   Erros de conexão com banco;
-   Dados inválidos;
-   Exclusão de fornecedores com produtos relacionados;
-   Validação da seleção de produtos para cesta.

------------------------------------------------------------------------

Como Executar o Projeto

1 - Instalar o XAMPP

Instale o XAMPP contendo:

-   Apache;
-   MySQL;
-   PHP.

2 - Colocar o projeto no servidor local

Copiar a pasta do projeto para:

C:

3 - Criar o banco de dados

Abrir o PHPMyAdmin.

Criar o banco e executar o script SQL das tabelas.

4 - Configurar conexão

Editar o arquivo:

php/conexao.php

Configurar:

-   Nome do banco;
-   Usuário;
-   Senha.

5 - Executar

Iniciar Apache e MySQL no XAMPP.

Acessar:

http://localhost/nome_do_projeto

------------------------------------------------------------------------

Autor

Desenvolvido por:

Gustavo Pacheco Delazari

Curso: Sistemas de Informação
