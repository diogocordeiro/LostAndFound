Feature: Finalizar resport com sucesso
	User Story:
	SENDO o usuário do sistema que criou o report
	POSSO finalizar um report
	PARA informar que a negociação foi encerrada com sucesso.

	Scenario: Tentar finalizar um report que eu não criei
	Given que estou logado no sistema
	And quero finalizar um report de item, que não criei
	When clico em finalizar report
	Then sou impedido de finalizar, por não ter criado o report

	Scenario: Finalizar um report sendo o dono e estando logado no sistema
	Given que estou logado no sistema
	And quero finalizar um report de item, que criei
	When clico em finalizar report
	Then o sistema pergunta se realmente quero finalizar
	And clico em sim

	Scenario: Finalizar um report sendo o dono e estando logado no sistema
	Given que estou logado no sistema
	And quero finalizar um report de item, que criei
	When clico em finalizar report
	Then o sistema pergunta se realmente quero finalizar
	And clico em sim

	Scenario: Tentar finalizar um report por engano
	Given que estou logado no sistema
	And que finalizar um report de item, que criei
	When clico, sem querer, em finalizar report
	Then o sistema pergunta se realmente quero finalizar
	And clico em não

	Scenario: Tentar finalizar um report por engano sem estar logado no sistema
	Given que não estou logado no sistema
	And quero finalizar uma report de item
	When clico em finalizar report
	Then o sistema informar que preciso me cadastrar ou logar para continuar
	