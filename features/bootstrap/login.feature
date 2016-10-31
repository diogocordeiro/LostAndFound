Feature: Login


	User Story:
	SENDO um usuário do sistema
	POSSO realizar meu login no sistema
	PARA utilizar o serviço de lost and found

	Scenario: Acessar o sistema com dados de usuários não cadastrados
	Given que sou um usuário que não estou cadastrado no sistema
	And desejo fazer login no sistema
	When clico em entrar
	Then devo realizar meu cadastro no sistema

	Scenario: Acessar o sistema com a senha errada
	Given que sou um usuário do sistema
	And vou acessar o sistema
	When digito meu nome de usuário 
	And digito minha senha errada
	Then devo digitar a senha correta para ter acesso ao sistema

	Scenario: Fazer login com os dados corretos
	Given que sou um usuário do sistema
	And vou acessar o sistema
	When informo todos os meus dados corretamente
	Then devo clicar em “login”
	And terei acesso ao sistema
