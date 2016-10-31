Feature: Adicionar novos itens


	User Story:
	SENDO um usuário do sistema
	POSSO adicionar novos itens
	PARA informar e deixar salvo itens que posso vir a perder


	Scenario: Adicionar itens sem preencher os campos obrigatórios.
	Given que estou logado no sistema
	And desejo adicionar um novo item 
	When deixo um campo obrigatório em branco
	Then devo preenche-lo para adicionar o novo item

	Scenario: Adicionar itens com todos os itens obrigatórios preenchidos
	Given que estou logado no sistema
	And desejo adicionar um novo item
	When preencho todos os campos obrigatórios
	Then clico em salvar
	And adicono um novo item

