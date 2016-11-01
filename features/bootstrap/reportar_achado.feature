Feature: Reportar achado

	User Story:
	SENDO um usuário do sistema
	POSSO reportar que achei um item
	PARA informar que o item foi achado e deixar que outros usuários vejam e se o dono quiser contatar para que seja devolvido



	Scenario: Reportar um item encontrado
	Given que estou logado no sistema
	And quero reportar que achei um item 
	When entro na área de reportar item achado
	Then adiciono informações relacionadas ao item achado
	And adiciono informações relacionadas ao local que o item foi achado
	Then espero outros usuários entrarem em contato
	
	Scenario: Registrar um achado com dados inválidos
	Given que estou logado no sistema
	And quero reportar que achei um item 
	When entro na área de reportar item achado
	Then adiciono informações inválidas relacionadas ao item achado
	And tento salvar o registro
	Then o sistema pede que eu informe dados válidos sobre o item

	Scenario: Registrar um achado com dados inválidos
	Given que estou logado no sistema
	And quero reportar que achei um item 
	When entro na área de reportar item achado
	Then adiciono informações válidas relacionadas ao item achado
	And tento salvar o registro
	Then o sistema salva as informações fornecidas


