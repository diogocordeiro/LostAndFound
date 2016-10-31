Feature: Cadastro de usuário


	User Story:
	NÃO SENDO um usuário do sistema
	POSSO realizar meu cadastro no sistema
	PARA reportar algum item perdido ou achado

	Scenario: Cadastrar usuário com todas as informações corretas
	Given que estou realizando meu cadastro no sistema
	And digito todas as informações corretamente
	When aperto para no botão de cadastro
	Then deve ler uma mensagem confirmando meu cadastro

	Scenario: Informar senha com menos de 8 caracteres
	Given O que estou realizando meu cadasminha senha
	When O digito menos de 8 caracteres
	Then O devo modificar minha escolha e criar uma senha com mais de 8 caracteres

	Scenario: Informar uma senha apenas com números ou apenas com letras
	Given que estou realizando meu cadastro no sistema
	And vou escolher minha senha
	When digito apenas letras ou apenas números
	Then devo modificar minha escolha e criar uma senha com números e letras

	Scenario: Informar uma senha com mais de 8 caracteres, contendo letras e números
	Given que estou realizando meu cadastro no sistema
	And vou escolher minha senha
	When digito uma senha com mais de 8 caracteres, contendo letras e números
	Then devo receber uma mensagem confirmando que a senha está corretamente escolhida

	Scenario: Cadastrar usuário com e-mail inválido
	Given que estou realizando meu cadastro no sistema
	And vou escolher informar meu e-mail
	When digito um e-mail que é considerado inválido
	Then devo corrigir e escolher um endereço de e-mail válido

	Scenario: Cadastrar usuário com data nascimento inválida
	GivenO que estou realizando meu cadastro no sistema
	And vou escolher informar minha data de nascimento
	When digito uma data que é considerada inválida
	Then devo corrigir e escolher uma data válida

	Scenario: Cadastrar usuário com nome de e-mail já existente
	Given O que estou realizando meu cadastro no sistema
	And vou informar o e-mail para o para meu cadastro
	When informo um e-mail que já existe 
	Then devo corrigir e escolher um e-mail que aindan não foi utilizado
