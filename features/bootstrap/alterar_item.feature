Feature: Alterar itens


	User Story:
	SENDO um usuário do sistema
	POSSO alterar itens
	PARA modificar as informações dos itens salvos


	Scenario: Salvar alterações dos itens sem preencher todos os campos obrigatórios.
	Given que estou logado no sistema
	And desejo alterar informações de um item 
	When deixo um campo obrigatório em branco
	Then devo preenche-lo para salvar as alterações do item

	Scenario: Salvar alterações dos itens com todos os dados orbrigatórios preenchidos
	Given que estou logado no sistema
	And desejo alterar informações de um item 
	When preencho todos os campos orbigatórios
	Then posso salvar as alterações feitas


