# PDD_CRUD

## Introdução

Esse sistema é uma proposta de desenvolvimento CRUD onde deve ser permitido que um ou mais usuários cadastrem clientes em um banco de dados MySQL usando um sistema em PHP.
Os clientes devem possuir um nome, uma data de nascimento, um RG, um CPF, um telefone e um ou mais endereços.

## Utilização

Para abrir a pagina inicial do sistema execute o arquivo index.php, você deve ser direcionado à uma tela de login. Na versão atual o usuário deve ser cadastrado manualmente no banco de dados. Há um usuário cadatrado para testes, caso seja utilizado o database, disponibilizado nesse repositório, chamado *pdd_crud.sql*. O usuário teste tem login "Fernando" e senha "123".
Para se conectar ao banco de dados você precisará importar o arquivo *pdd_crud.sql* ao seu banco de dados MySQL e alterar as variáveis de conexão ao banco de dados, para fazer isso você deve abrir o arquivo *data-entity.php*, com um editor de texto, e alterar as seguintes variáveis:
  
   **private $host
	private $user
	private $password*
	
  
  Informando os dados de conexão ao seu banco de dados, onde **$host** deve receber seu host adress, **$user** deve receber o usuário do banco de dados e **$password** a senha desse usuário.
  
  ## Database pdd_crud
  
  O database disponibilizado para esse projeto contem as seguintes tabelas:
  
  *cliente
      *endereco
  *usuario
