Feature: Negociar

	User Story:
	SENDO um usuário do sistema
	POSSO iniciar uma negociação com outro usuário
	PARA reaver um item ou devolver um item


	Scenario: Postar comentário na página de report do item estando logado
	Given que estou logado no sistema
	And desejo entrar em contato com um usuário que pode ter encontrado um item que perdi 
	When encontro resultados para minhas pesquisas
	Then posso escolher um item 
	And postar um comentário na página daquele intem
	Then espero uma resposta do outro usuário

	Scenario: Tentar postar comentário com campo vazio
	Given que estou logado no sistema
	And desejo entrar em contato com um usuário que pode ter encontrado um item que perdi 
	When encontro resultados para minhas pesquisas
	Then posso escolher um item 
	And postar um comentário vazio na página no item
	Then o sistema irá mostrar uma mensagem pedindo para escrever algo antes de postar

	Scenario: Responder comentário na página de report do item
	Given que estou logado no sistema
	And desejo responder um comentário feito na página de um item
	When clico no botão de "responder" daquele comentário
	Then digito minha resposta 
	And posto minha resposta

	Scenario: Tentar postar comentário sem estar logado
	Given que não estou logado no sistema
	And desejo postar um comentário na página de um item
	When digito o comentário e clico e postar comentário
	Then uma mensagem pede que eu faça meu cadastro ou login no sistema

	Scenario: Tentar apagar comentário na página de report do item sem estar logado
	Given que não estou logado no sistema
	And desejo apagar um comentário feito na página de um item
	When clico no botão de apagar comentário
	Then uma mensagem pede que eu faça meu cadastro ou login no sistema

	Scenario: Tentar postar comentário estando logado
	Given que estou logado no sistema
	And desejo apagar um comentário feito na página de um item
	When clico no botão de apagar comentário
	Then uma mensagem pede para eu confirmar a remoção
	And eu clico em sim
	