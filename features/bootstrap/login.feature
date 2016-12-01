Feature: Login


	User Story:
	SENDO um usuário do sistema
	POSSO realizar meu login no sistema
	PARA utilizar o serviço de lost and found

	Scenario: Acessar o sistema com dados de usuários não cadastrados
	Given que sou um usuário que não tenho e-mail cadastrado no sistema
	When digito uma senha qualquer
	Then devo ver a mensagem de erro

	Scenario: Acessar o sistema com a senha errada
	Given que sou um usuário que tem e-mail cadastrado no sistema
	When digito uma senha errada 
	Then devo ver a mensagem de erro

	Scenario: Fazer login com os dados corretos
	Given que sou um usuário que tem o e-mail cadastrado no sistema
	When digito a senha correta
	Then devo ver a mensagem de sucesso

