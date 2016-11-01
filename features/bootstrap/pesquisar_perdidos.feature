Feature: Pesquisar intens perdidos

	User Story:
	SENDO um usuário do sistema
	POSSO pesquisar itens
	PARA encontrar itens perdidos ou achados

	Scenario: Pesquisar itens sem estar logado no sistema
	Given que não estou logado no sistema
	And digito um nome para pesquisar 
	When o sistema avisa que preciso estar cadastrado para pesquisar
	Then clico no botão de fazer login ou de cadastro


	Scenario: Pesquisar itens utilizando filtros
	Given que estou logado no sistema
	And digito um nome para pesquisar 
	When preciso de um resultado mais específico
	Then aplico filtros para restringir a minha pesquisa


	Scenario: Pesquisar itens não cadastrados no sistema
	Given que estou logado no sistema
	And digito um nome para pesquisar 
	When o sistema não retorna nenhum resultado na minha pesquisa
	Then preciso modificar as palavras ou os filtros da pesquisa

	Scenario: Pesquisar itens com usuário logado no sistema
	Given que estou logado no sistema
	And digito um nome para pesquisar 
	When carrega a página com os resultados da pesquisa
	Then posso ler todos os resultados da pesquisa

	Scenario: Pesquisar itens por palavra-chave
	Given que estou logado no sistema
	And digito uma palavra-chave no campo de pesquisa 
	When carrega a página com os resultados da pesquisa
	Then posso observar todos os itens relacionados com as palavra-chave