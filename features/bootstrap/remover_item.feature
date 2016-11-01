Feature: Remover itens


	User Story:
	SENDO um usuário do sistema
	POSSO remover itens
	PARA apagar itens que não precisam mais estar no sistema

	Scenario: Remover um item por engano
	Given que estou logado no sistema
	And clico sem querer no botão de remover item 
	When o sistema perguntar se realmente desejo remover o item
	Then clico em “não” para cancelar a remoção do item

	Scenario: Remover um item que realmente deseja
	Given que estou logado no sistema
	And clico no botão de remover item 
	When o sistema perguntar se realmente desejo remover o item
	Then clico em “sim” para confirmar a remoção do item

	Scenario: Cancelar a remoção de um item
	Given que estou logado no sistema
	And clico no botão de remover item 
	When o sistema perguntar se realmente desejo remover o item
	Then clico em “não” para cancelar a remoção do item

