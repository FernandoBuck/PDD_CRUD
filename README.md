# PDD_CRUD

## Introdução

Esse sistema é uma proposta de desenvolvimento CRUD onde deve ser permitido que um ou mais usuários cadastrem clientes em um banco de dados MySQL usando um sistema em PHP.
Os clientes devem possuir um nome, uma data de nascimento, um RG, um CPF, um telefone e um ou mais endereços.

## Utilização

Para abrir a pagina inicial do sistema execute o arquivo *index.php*, você deve ser direcionado à uma tela de login. Na versão atual o usuário deve ser cadastrado manualmente no banco de dados. Há um usuário cadatrado para testes, caso seja utilizado o database, disponibilizado nesse repositório, chamado *pdd_crud.sql*. O usuário teste tem login "Fernando" e senha "123".<br />
Para se conectar ao banco de dados você precisará importar o arquivo *pdd_crud.sql* ao seu banco de dados MySQL e alterar as variáveis de conexão ao banco de dados, para fazer isso você deve abrir o arquivo *data-entity.php*, com um editor de texto, e alterar as seguintes variáveis:<br />
  
   **private $host
	private $user
	private $password*
	
  
  Informando os dados de conexão ao seu banco de dados, onde **$host** deve receber seu host adress, **$user** deve receber o usuário do banco de dados e **$password** a senha desse usuário.<br />
  De volta à página *index.php* você poderá tentar clicar no botão de login sem digitar nenhuma informação ou digitar um login e senha incorreto, para receber uma mensagem de usuário e/ou senha inválido. Usando o cadastro base, ou cadastrando novos usuários no banco de daos, você logar no sistema e ser redirecionao à primeira página do sistema, a de cadastro de novos clientes que também exibe todos os clientes cadastrados e seus respctivos dados, execeto seus endereços.<br />
  Na página de cadastro de cliente você poderá cadastrar novos clientes e seu primeiro endereço nessa página, preenchendos todos os campos do formulário e clicando no botão "enviar", o campo complemento é o único que não é necessário.<br />
  Você pode excluir o cadastro de um cliente clicando no botão "Exluir" na mesma linha que o cadastro dele, isso fará com que todos os endereços cadastrados para esse usuário sejam exluídos também. <br />
  Você pode editar o cadastro de um cliente, ver seus endereços cadastrados e cadastrar novos endereços para esse cliente, clicando no botão "Editar" na linha do cliente que deseja fazer uma ação. assim você será redirecionado à página de alteração de cadastro e consulta de endereço do cliente.<br />
  Na página de alteração de cadastro do cliente você terá um formulário com todos os dados do cliente preenchidos e seus enderços listados em uma tabela. Você pode alterar dados de cadastro do seu cliente apagando o dado antigo, escrevendo um novo e clicando no botão "SALVAR", caso deixe algum dado em branco você não consiguirá salvar as alterações.<br />
  Você pode excluir endereços cadastrados pelo cliente clicando no botão "Excluir", mas caso o cliente tenha apenas um endereço, você não conseguira excluir e receberá a mensagem que cada cliente deve ter pelo menos um endereço.<br />
  Você pode alterar o cadastro de um endereço e clicando no botão "Editar", assim você será redirecionado à uma tela com o formulário do endereço preenchido, altere o dado desejado e clique no botão "EDITAR", para que os dados sejam salvos. Clicando no botão "Voltar" você será redirecionado à página de alteração de cliente.<br />
  Você pode adicionar um novo endereço ao cliente clicando no botão "Adicionar endereço", você será redirecionado à um formulário em branco, preencha todos os campos e clique no botão "ADICIONAR" para cadastrar o novo endereço. Então clique no botão voltar para voltar à tela de altração do usuário.<br />
  Você terá o botão "Logout" em qualquer momento da aplicação que estiver logado para retornar à página de login.<br />
  
  ## Database pdd_crud
  
  O database disponibilizado para esse projeto contem as seguintes tabelas e atributos:
  
  * cliente
  	* nome - Nome do cliente
	* data_nasc - Data de nascimento do cliente
	* cpf - CPF do cliente, não pode se repetir.
	* tel - Telefone do cliente. 
	* rg - RG do cliente e chave primaria da tabela, também age como chave estrangeria na tabela endereco.
	
  * endereco
  	* id_endereco - Chave primaria do endereço, auto increment.
	* logradouro - Rua e número da casa do cliente.
	* bairro - Bairro do cliente.
	* complemento - Complemento para referencia do endereço do cliente.
	* cidade - Cidade do endereço.
	* estado - Estado do endereço.
	* cep - CEP do endereço.
	* rg_cliente - Chave estrangeira com a tabela cliente, serve para que, quando um cliente é deletado, todos os registros de endereços deste cliente também sejam deletados.
	
  * usuario
  	* id - Chave primaria da tabela e auto increment.
	* login - Login para acesso do usuário.
	* senha - Senha para acesso do usuário.
	
  ## Abstração do banco de dados para PHP
  
    
