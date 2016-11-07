<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @Given que estou logado no sistema
     */
    public function queEstouLogadoNoSistema()
    {
        throw new PendingException();
    }

    /**
     * @Given desejo adicionar um novo item
     */
    public function desejoAdicionarUmNovoItem()
    {
        throw new PendingException();
    }

    /**
     * @When deixo um campo obrigatório em branco
     */
    public function deixoUmCampoObrigatorioEmBranco()
    {
        throw new PendingException();
    }

    /**
     * @Then devo preenche-lo para adicionar o novo item
     */
    public function devoPreencheLoParaAdicionarONovoItem()
    {
        throw new PendingException();
    }

    /**
     * @When preencho todos os campos obrigatórios
     */
    public function preenchoTodosOsCamposObrigatorios()
    {
        throw new PendingException();
    }

    /**
     * @Then clico em salvar
     */
    public function clicoEmSalvar()
    {
        throw new PendingException();
    }

    /**
     * @Then adicono um novo item
     */
    public function adiconoUmNovoItem()
    {
        throw new PendingException();
    }

    /**
     * @Given desejo alterar informações de um item
     */
    public function desejoAlterarInformacoesDeUmItem()
    {
        throw new PendingException();
    }

    /**
     * @Then devo preenche-lo para salvar as alterações do item
     */
    public function devoPreencheLoParaSalvarAsAlteracoesDoItem()
    {
        throw new PendingException();
    }

    /**
     * @When preencho todos os campos orbigatórios
     */
    public function preenchoTodosOsCamposOrbigatorios()
    {
        throw new PendingException();
    }

    /**
     * @Then posso salvar as alterações feitas
     */
    public function possoSalvarAsAlteracoesFeitas()
    {
        throw new PendingException();
    }

    /**
     * @Given altero minhas informações pessoais de contato
     */
    public function alteroMinhasInformacoesPessoaisDeContato()
    {
        throw new PendingException();
    }

    /**
     * @When saio da página antes de salvar as alterações feitas
     */
    public function saioDaPaginaAntesDeSalvarAsAlteracoesFeitas()
    {
        throw new PendingException();
    }

    /**
     * @Then perco todas as mudanças feitas
     */
    public function percoTodasAsMudancasFeitas()
    {
        throw new PendingException();
    }

    /**
     * @Then preciso refazer as alterações desejadas
     */
    public function precisoRefazerAsAlteracoesDesejadas()
    {
        throw new PendingException();
    }

    /**
     * @When clico em :arg1 as alterações feitas
     */
    public function clicoEmAsAlteracoesFeitas($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then meu cadastro de usuário é alterado
     */
    public function meuCadastroDeUsuarioEAlterado()
    {
        throw new PendingException();
    }

    /**
     * @Given altero minhas informações pessoais de contato com dados inválidos
     */
    public function alteroMinhasInformacoesPessoaisDeContatoComDadosInvalidos()
    {
        throw new PendingException();
    }

    /**
     * @Then o sistema informa que há dados inválidos
     */
    public function oSistemaInformaQueHaDadosInvalidos()
    {
        throw new PendingException();
    }

    /**
     * @Then preciso modificar essas informações
     */
    public function precisoModificarEssasInformacoes()
    {
        throw new PendingException();
    }

    /**
     * @Then posso salvar as alterações corretas
     */
    public function possoSalvarAsAlteracoesCorretas()
    {
        throw new PendingException();
    }

    /**
     * @Given que estou realizando meu cadastro no sistema
     */
    public function queEstouRealizandoMeuCadastroNoSistema()
    {
        throw new PendingException();
    }

    /**
     * @Given digito todas as informações corretamente
     */
    public function digitoTodasAsInformacoesCorretamente()
    {
        throw new PendingException();
    }

    /**
     * @When aperto para no botão de cadastro
     */
    public function apertoParaNoBotaoDeCadastro()
    {
        throw new PendingException();
    }

    /**
     * @Then deve ler uma mensagem confirmando meu cadastro
     */
    public function deveLerUmaMensagemConfirmandoMeuCadastro()
    {
        throw new PendingException();
    }

    /**
     * @Given O que estou realizando meu cadasminha senha
     */
    public function oQueEstouRealizandoMeuCadasminhaSenha()
    {
        throw new PendingException();
    }

    /**
     * @When O digito menos de :arg1 caracteres
     */
    public function oDigitoMenosDeCaracteres($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then O devo modificar minha escolha e criar uma senha com mais de :arg1 caracteres
     */
    public function oDevoModificarMinhaEscolhaECriarUmaSenhaComMaisDeCaracteres($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Given vou escolher minha senha
     */
    public function vouEscolherMinhaSenha()
    {
        throw new PendingException();
    }

    /**
     * @When digito apenas letras ou apenas números
     */
    public function digitoApenasLetrasOuApenasNumeros()
    {
        throw new PendingException();
    }

    /**
     * @Then devo modificar minha escolha e criar uma senha com números e letras
     */
    public function devoModificarMinhaEscolhaECriarUmaSenhaComNumerosELetras()
    {
        throw new PendingException();
    }

    /**
     * @When digito uma senha com mais de :arg1 caracteres, contendo letras e números
     */
    public function digitoUmaSenhaComMaisDeCaracteresContendoLetrasENumeros($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then devo receber uma mensagem confirmando que a senha está corretamente escolhida
     */
    public function devoReceberUmaMensagemConfirmandoQueASenhaEstaCorretamenteEscolhida()
    {
        throw new PendingException();
    }

    /**
     * @Given vou escolher informar meu e-mail
     */
    public function vouEscolherInformarMeuEMail()
    {
        throw new PendingException();
    }

    /**
     * @When digito um e-mail que é considerado inválido
     */
    public function digitoUmEMailQueEConsideradoInvalido()
    {
        throw new PendingException();
    }

    /**
     * @Then devo corrigir e escolher um endereço de e-mail válido
     */
    public function devoCorrigirEEscolherUmEnderecoDeEMailValido()
    {
        throw new PendingException();
    }

    /**
     * @Given vou escolher informar minha data de nascimento
     */
    public function vouEscolherInformarMinhaDataDeNascimento()
    {
        throw new PendingException();
    }

    /**
     * @When digito uma data que é considerada inválida
     */
    public function digitoUmaDataQueEConsideradaInvalida()
    {
        throw new PendingException();
    }

    /**
     * @Then devo corrigir e escolher uma data válida
     */
    public function devoCorrigirEEscolherUmaDataValida()
    {
        throw new PendingException();
    }

    /**
     * @Given O que estou realizando meu cadastro no sistema
     */
    public function oQueEstouRealizandoMeuCadastroNoSistema()
    {
        throw new PendingException();
    }

    /**
     * @Given vou informar o e-mail para o para meu cadastro
     */
    public function vouInformarOEMailParaOParaMeuCadastro()
    {
        throw new PendingException();
    }

    /**
     * @When informo um e-mail que já existe
     */
    public function informoUmEMailQueJaExiste()
    {
        throw new PendingException();
    }

    /**
     * @Then devo corrigir e escolher um e-mail que aindan não foi utilizado
     */
    public function devoCorrigirEEscolherUmEMailQueAindanNaoFoiUtilizado()
    {
        throw new PendingException();
    }

    /**
     * @Given quero finalizar um report de item, que não criei
     */
    public function queroFinalizarUmReportDeItemQueNaoCriei()
    {
        throw new PendingException();
    }

    /**
     * @When clico em finalizar report
     */
    public function clicoEmFinalizarReport()
    {
        throw new PendingException();
    }

    /**
     * @Then sou impedido de finalizar, por não ter criado o report
     */
    public function souImpedidoDeFinalizarPorNaoTerCriadoOReport()
    {
        throw new PendingException();
    }

    /**
     * @Given quero finalizar um report de item, que criei
     */
    public function queroFinalizarUmReportDeItemQueCriei()
    {
        throw new PendingException();
    }

    /**
     * @Then o sistema pergunta se realmente quero finalizar
     */
    public function oSistemaPerguntaSeRealmenteQueroFinalizar()
    {
        throw new PendingException();
    }

    /**
     * @Then clico em sim
     */
    public function clicoEmSim()
    {
        throw new PendingException();
    }

    /**
     * @Given que finalizar um report de item, que criei
     */
    public function queFinalizarUmReportDeItemQueCriei()
    {
        throw new PendingException();
    }

    /**
     * @When clico, sem querer, em finalizar report
     */
    public function clicoSemQuererEmFinalizarReport()
    {
        throw new PendingException();
    }

    /**
     * @Then clico em não
     */
    public function clicoEmNao()
    {
        throw new PendingException();
    }

    /**
     * @Given que não estou logado no sistema
     */
    public function queNaoEstouLogadoNoSistema()
    {
        throw new PendingException();
    }

    /**
     * @Given quero finalizar uma report de item
     */
    public function queroFinalizarUmaReportDeItem()
    {
        throw new PendingException();
    }

    /**
     * @Then o sistema informar que preciso me cadastrar ou logar para continuar
     */
    public function oSistemaInformarQuePrecisoMeCadastrarOuLogarParaContinuar()
    {
        throw new PendingException();
    }

    /**
     * @Given que sou um usuário que não estou cadastrado no sistema
     */
    public function queSouUmUsuarioQueNaoEstouCadastradoNoSistema()
    {
        throw new PendingException();
    }

    /**
     * @Given desejo fazer login no sistema
     */
    public function desejoFazerLoginNoSistema()
    {
        throw new PendingException();
    }

    /**
     * @When clico em entrar
     */
    public function clicoEmEntrar()
    {
        throw new PendingException();
    }

    /**
     * @Then devo realizar meu cadastro no sistema
     */
    public function devoRealizarMeuCadastroNoSistema()
    {
        throw new PendingException();
    }

    /**
     * @Given que sou um usuário do sistema
     */
    public function queSouUmUsuarioDoSistema()
    {
        throw new PendingException();
    }

    /**
     * @Given vou acessar o sistema
     */
    public function vouAcessarOSistema()
    {
        throw new PendingException();
    }

    /**
     * @When digito meu nome de usuário
     */
    public function digitoMeuNomeDeUsuario()
    {
        throw new PendingException();
    }

    /**
     * @When digito minha senha errada
     */
    public function digitoMinhaSenhaErrada()
    {
        throw new PendingException();
    }

    /**
     * @Then devo digitar a senha correta para ter acesso ao sistema
     */
    public function devoDigitarASenhaCorretaParaTerAcessoAoSistema()
    {
        throw new PendingException();
    }

    /**
     * @When informo todos os meus dados corretamente
     */
    public function informoTodosOsMeusDadosCorretamente()
    {
        throw new PendingException();
    }

    /**
     * @Then devo clicar em “login”
     */
    public function devoClicarEmLogin()
    {
        throw new PendingException();
    }

    /**
     * @Then terei acesso ao sistema
     */
    public function tereiAcessoAoSistema()
    {
        throw new PendingException();
    }

    /**
     * @Given desejo entrar em contato com um usuário que pode ter encontrado um item que perdi
     */
    public function desejoEntrarEmContatoComUmUsuarioQuePodeTerEncontradoUmItemQuePerdi()
    {
        throw new PendingException();
    }

    /**
     * @When encontro resultados para minhas pesquisas
     */
    public function encontroResultadosParaMinhasPesquisas()
    {
        throw new PendingException();
    }

    /**
     * @Then posso escolher um item
     */
    public function possoEscolherUmItem()
    {
        throw new PendingException();
    }

    /**
     * @Then postar um comentário na página daquele intem
     */
    public function postarUmComentarioNaPaginaDaqueleIntem()
    {
        throw new PendingException();
    }

    /**
     * @Then espero uma resposta do outro usuário
     */
    public function esperoUmaRespostaDoOutroUsuario()
    {
        throw new PendingException();
    }

    /**
     * @Then postar um comentário vazio na página no item
     */
    public function postarUmComentarioVazioNaPaginaNoItem()
    {
        throw new PendingException();
    }

    /**
     * @Then o sistema irá mostrar uma mensagem pedindo para escrever algo antes de postar
     */
    public function oSistemaIraMostrarUmaMensagemPedindoParaEscreverAlgoAntesDePostar()
    {
        throw new PendingException();
    }

    /**
     * @Given desejo responder um comentário feito na página de um item
     */
    public function desejoResponderUmComentarioFeitoNaPaginaDeUmItem()
    {
        throw new PendingException();
    }

    /**
     * @When clico no botão de :arg1 daquele comentário
     */
    public function clicoNoBotaoDeDaqueleComentario($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then digito minha resposta
     */
    public function digitoMinhaResposta()
    {
        throw new PendingException();
    }

    /**
     * @Then posto minha resposta
     */
    public function postoMinhaResposta()
    {
        throw new PendingException();
    }

    /**
     * @Given desejo postar um comentário na página de um item
     */
    public function desejoPostarUmComentarioNaPaginaDeUmItem()
    {
        throw new PendingException();
    }

    /**
     * @When digito o comentário e clico e postar comentário
     */
    public function digitoOComentarioEClicoEPostarComentario()
    {
        throw new PendingException();
    }

    /**
     * @Then uma mensagem pede que eu faça meu cadastro ou login no sistema
     */
    public function umaMensagemPedeQueEuFacaMeuCadastroOuLoginNoSistema()
    {
        throw new PendingException();
    }

    /**
     * @Given desejo apagar um comentário feito na página de um item
     */
    public function desejoApagarUmComentarioFeitoNaPaginaDeUmItem()
    {
        throw new PendingException();
    }

    /**
     * @When clico no botão de apagar comentário
     */
    public function clicoNoBotaoDeApagarComentario()
    {
        throw new PendingException();
    }

    /**
     * @Then uma mensagem pede para eu confirmar a remoção
     */
    public function umaMensagemPedeParaEuConfirmarARemocao()
    {
        throw new PendingException();
    }

    /**
     * @Then eu clico em sim
     */
    public function euClicoEmSim()
    {
        throw new PendingException();
    }

    /**
     * @Given digito um nome para pesquisar
     */
    public function digitoUmNomeParaPesquisar()
    {
        throw new PendingException();
    }

    /**
     * @When o sistema avisa que preciso estar cadastrado para pesquisar
     */
    public function oSistemaAvisaQuePrecisoEstarCadastradoParaPesquisar()
    {
        throw new PendingException();
    }

    /**
     * @Then clico no botão de fazer login ou de cadastro
     */
    public function clicoNoBotaoDeFazerLoginOuDeCadastro()
    {
        throw new PendingException();
    }

    /**
     * @When preciso de um resultado mais específico
     */
    public function precisoDeUmResultadoMaisEspecifico()
    {
        throw new PendingException();
    }

    /**
     * @Then aplico filtros para restringir a minha pesquisa
     */
    public function aplicoFiltrosParaRestringirAMinhaPesquisa()
    {
        throw new PendingException();
    }

    /**
     * @When o sistema não retorna nenhum resultado na minha pesquisa
     */
    public function oSistemaNaoRetornaNenhumResultadoNaMinhaPesquisa()
    {
        throw new PendingException();
    }

    /**
     * @Then preciso modificar as palavras ou os filtros da pesquisa
     */
    public function precisoModificarAsPalavrasOuOsFiltrosDaPesquisa()
    {
        throw new PendingException();
    }

    /**
     * @When carrega a página com os resultados da pesquisa
     */
    public function carregaAPaginaComOsResultadosDaPesquisa()
    {
        throw new PendingException();
    }

    /**
     * @Then posso ler todos os resultados da pesquisa
     */
    public function possoLerTodosOsResultadosDaPesquisa()
    {
        throw new PendingException();
    }

    /**
     * @Given digito uma palavra-chave no campo de pesquisa
     */
    public function digitoUmaPalavraChaveNoCampoDePesquisa()
    {
        throw new PendingException();
    }

    /**
     * @Then posso observar todos os itens relacionados com as palavra-chave
     */
    public function possoObservarTodosOsItensRelacionadosComAsPalavraChave()
    {
        throw new PendingException();
    }

    /**
     * @Given que quero acessar o sistema
     */
    public function queQueroAcessarOSistema()
    {
        throw new PendingException();
    }

    /**
     * @Given esqueci minha senha
     */
    public function esqueciMinhaSenha()
    {
        throw new PendingException();
    }

    /**
     * @When clico em recuperar senha
     */
    public function clicoEmRecuperarSenha()
    {
        throw new PendingException();
    }

    /**
     * @Then informo um e-mail não cadastrado no sistema
     */
    public function informoUmEMailNaoCadastradoNoSistema()
    {
        throw new PendingException();
    }

    /**
     * @Then peço uma nova senha
     */
    public function pecoUmaNovaSenha()
    {
        throw new PendingException();
    }

    /**
     * @Then preciso informar um e-mail cadastrado
     */
    public function precisoInformarUmEMailCadastrado()
    {
        throw new PendingException();
    }

    /**
     * @Then informo um e-mail cadastrado no sistema
     */
    public function informoUmEMailCadastradoNoSistema()
    {
        throw new PendingException();
    }

    /**
     * @Then recebo um e-mail com instruções para recuperar minha senha
     */
    public function receboUmEMailComInstrucoesParaRecuperarMinhaSenha()
    {
        throw new PendingException();
    }

    /**
     * @Given clico sem querer no botão de remover item
     */
    public function clicoSemQuererNoBotaoDeRemoverItem()
    {
        throw new PendingException();
    }

    /**
     * @When o sistema perguntar se realmente desejo remover o item
     */
    public function oSistemaPerguntarSeRealmenteDesejoRemoverOItem()
    {
        throw new PendingException();
    }

    /**
     * @Then clico em “não” para cancelar a remoção do item
     */
    public function clicoEmNaoParaCancelarARemocaoDoItem()
    {
        throw new PendingException();
    }

    /**
     * @Given clico no botão de remover item
     */
    public function clicoNoBotaoDeRemoverItem()
    {
        throw new PendingException();
    }

    /**
     * @Then clico em “sim” para confirmar a remoção do item
     */
    public function clicoEmSimParaConfirmarARemocaoDoItem()
    {
        throw new PendingException();
    }

    /**
     * @Given quero reportar que achei um item
     */
    public function queroReportarQueAcheiUmItem()
    {
        throw new PendingException();
    }

    /**
     * @When entro na área de reportar item achado
     */
    public function entroNaAreaDeReportarItemAchado()
    {
        throw new PendingException();
    }

    /**
     * @Then adiciono informações relacionadas ao item achado
     */
    public function adicionoInformacoesRelacionadasAoItemAchado()
    {
        throw new PendingException();
    }

    /**
     * @Then adiciono informações relacionadas ao local que o item foi achado
     */
    public function adicionoInformacoesRelacionadasAoLocalQueOItemFoiAchado()
    {
        throw new PendingException();
    }

    /**
     * @Then espero outros usuários entrarem em contato
     */
    public function esperoOutrosUsuariosEntraremEmContato()
    {
        throw new PendingException();
    }

    /**
     * @Then adiciono informações inválidas relacionadas ao item achado
     */
    public function adicionoInformacoesInvalidasRelacionadasAoItemAchado()
    {
        throw new PendingException();
    }

    /**
     * @Then tento salvar o registro
     */
    public function tentoSalvarORegistro()
    {
        throw new PendingException();
    }

    /**
     * @Then o sistema pede que eu informe dados válidos sobre o item
     */
    public function oSistemaPedeQueEuInformeDadosValidosSobreOItem()
    {
        throw new PendingException();
    }

    /**
     * @Then adiciono informações válidas relacionadas ao item achado
     */
    public function adicionoInformacoesValidasRelacionadasAoItemAchado()
    {
        throw new PendingException();
    }

    /**
     * @Then o sistema salva as informações fornecidas
     */
    public function oSistemaSalvaAsInformacoesFornecidas()
    {
        throw new PendingException();
    }

    /**
     * @Given quero reportar a perda de um dos meus itens cadastrados
     */
    public function queroReportarAPerdaDeUmDosMeusItensCadastrados()
    {
        throw new PendingException();
    }

    /**
     * @When entro na área de reportar item perdido
     */
    public function entroNaAreaDeReportarItemPerdido()
    {
        throw new PendingException();
    }

    /**
     * @Then escolho um dos meus itens
     */
    public function escolhoUmDosMeusItens()
    {
        throw new PendingException();
    }

    /**
     * @Then adiciono informações relacionadas a perda do item
     */
    public function adicionoInformacoesRelacionadasAPerdaDoItem()
    {
        throw new PendingException();
    }

    /**
     * @Given quero reportar a perda de um item que não foi cadastrado
     */
    public function queroReportarAPerdaDeUmItemQueNaoFoiCadastrado()
    {
        throw new PendingException();
    }

    /**
     * @Then insiro informações sobre meu item
     */
    public function insiroInformacoesSobreMeuItem()
    {
        throw new PendingException();
    }

    /**
     * @Then insiro informações válidas sobre meu item
     */
    public function insiroInformacoesValidasSobreMeuItem()
    {
        throw new PendingException();
    }

    /**
     * @Then finalizo o registro com sucesso
     */
    public function finalizoORegistroComSucesso()
    {
        throw new PendingException();
    }

    /**
     * @Then insiro informações inválidas sobre meu item
     */
    public function insiroInformacoesInvalidasSobreMeuItem()
    {
        throw new PendingException();
    }

    /**
     * @Then o sistema pede para eu corrigir as informações inválidas
     */
    public function oSistemaPedeParaEuCorrigirAsInformacoesInvalidas()
    {
        throw new PendingException();
    }
}
