Feature: Reportar perda

	User Story:
	SENDO um usuário do sistema
	POSSO reportar a perda de um item
	PARA informar que o item foi perdido e deixar que outros usuários que talvez achem possam me contatar para devolver meu item


	Scenario: Reportar a perda de um item cadastrado preciamente no sistema
	Given que estou logado no sistema
	And quero reportar a perda de um dos meus itens cadastrados 
	When entro na área de reportar item perdido
	Then escolho um dos meus itens
	And adiciono informações relacionadas a perda do item
	Then espero outros usuários entrarem em contato


	Scenario: Reportar perda de um item não cadastrado no sistema
	Given que estou logado no sistema
	And quero reportar a perda de um item que não foi cadastrado 
	When entro na área de reportar item perdido
	Then insiro informações sobre meu item
	And adiciono informações relacionadas a perda do item
	Then espero outros usuários entrarem em contato

	Scenario: Registrar perda de item com dados válidos
	Given que estou logado no sistema
	And quero reportar a perda de um item que não foi cadastrado 
	When entro na área de reportar item perdido
	Then insiro informações válidas sobre meu item
	And finalizo o registro com sucesso
	
	Scenario: Registrar perda de item com dados inválidos
	Given que estou logado no sistema
	And quero reportar a perda de um item que não foi cadastrado 
	When entro na área de reportar item perdido
	Then insiro informações inválidas sobre meu item
	And o sistema pede para eu corrigir as informações inválidas
	
