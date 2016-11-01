Feature: Alterar informações pessoais de usuário

	User Story:
	SENDO um usuário do sistema
	POSSO alterar/adicionar informações pessoais da minha conta
	PARA facilitar o contato


	Scenario:  Sair da página sem salvar alterações feitas no cadastro
	Given que estou logado no sistema
	And altero minhas informações pessoais de contato 
	When saio da página antes de salvar as alterações feitas
	Then perco todas as mudanças feitas
	And preciso refazer as alterações desejadas

	Scenario:  Salvar alterações feitas na edição de perfil do usuário
	Given que estou logado no sistema
	And altero minhas informações pessoais de contato 
	When clico em "salvar" as alterações feitas
	Then meu cadastro de usuário é alterado

	Scenario:  Tentar salvar alterações no perfil de usuário com dados inválidos
	Given que estou logado no sistema
	And altero minhas informações pessoais de contato com dados inválidos
	When clico em "salvar" as alterações feitas
	Then o sistema informa que há dados inválidos
	And preciso modificar essas informações
	Then posso salvar as alterações corretas