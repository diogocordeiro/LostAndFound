Feature: Recuperar senha

	User Story:
	SENDO um usuário do sistema 
	POSSO solicitar recuperação de senha
	PARA conseguir acessar novamente o sistema


	Scenario: Informar e-mail não cadastrado no sistema
	Given que quero acessar o sistema
	And esqueci minha senha 
	When clico em recuperar senha
	Then informo um e-mail não cadastrado no sistema
	And peço uma nova senha
	Then preciso informar um e-mail cadastrado
	
	Scenario: Informar e-mail correto
	Given que quero acessar o sistema
	And esqueci minha senha 
	When clico em recuperar senha
	Then informo um e-mail cadastrado no sistema
	And peço uma nova senha
	Then recebo um e-mail com instruções para recuperar minha senha
	