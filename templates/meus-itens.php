<!DOCTYPE html>
<html ng-app="login">

<head>

  <?php require 'header.php'; ?>
    <script type="text/javascript" language="javascript" src="../backend/js/cadastroUsuario.js"></script>

    <!-- Custom Theme CSS -->

    <link href="../static/css/meus-itens.css" rel="stylesheet">

    <script type="text/javascript">
      function Nova() {
        location.href = "index.php"
      }
    </script>

    <script type="text/javascript">

    <!-- Javascript -->
$('[data-toggle="tooltip"]').tooltip();

    </script>

</head>

<body>

  <?php require 'top-menu-logado.php'; ?>

  <div class="container-fluid">
    <div class="section text-center section-landing">
      <div class="row">
          <?php
            require('../backend/funcoes.php');
            require('../backend/conBd.php');

            //Coleta os itens do usuario
            $dados = getItensUsuario(BaseDados::conBdUser(), $_SESSION['Lost_Found']["id"]);

            //Remover Itens
            if (isset($_GET['remove'])) {

              //Valida string
              $idRemove = validarString($_GET['remove']);

              //Coleta o item passado
              $dadosItem = getData(BaseDados::conBdUser(), $tabItens, "id", $idRemove, "s");

              //Caso o item nao exista
              if (count($dadosItem) < 1) {
                echo "<center><br/><br/><br/>Erro: o item não foi encontrado<br/><a href='javascript:history.go(-1);'>voltar</a></center>";
                exit;

              //Caso o item exista
              } else {

                  //Caso o item NAO perteca ao usuario da session
                  if ($dadosItem[0]['idUsuario'] != $_SESSION['Lost_Found']["id"]) {
                    echo "<center><br/><br/><br/>Erro: o item não foi encontrado<br/><a href='javascript:history.go(-1);'>voltar</a></center>";
                    exit;

                  //Caso o item perteca ao usuario da session
                  } else {

                      //Caso o item NAO pertenca a nenhum report (remove o item completamente)
                      if ($dadosItem[0]['idRelAchado'] == 0 && $dadosItem[0]['idRelPerdido'] == 0) {
                        $sucesso = removeItem(BaseDados::conBdUser(), $idRemove, "tudo");

                      //Caso o item pertenca a algum report (remove apenas a referencia entre o item e o usuario)
                      } else {
                          $sucesso = removeItem(BaseDados::conBdUser(), $idRemove, "ref");
                        }

                      if ($sucesso == "sucesso") {
                        echo "<center><br/><br/><br/>Item removido com sucesso<br/><a href='javascript:history.go(-1);'>voltar</a></center>";
                        exit;
                      }
                    }
                }

            }//if remover itens
          ?>
        <h2 class="title titulo-busca">Meus Itens</h2>

        <div class="col-md-8 col-md-offset-2">

        <!-- caso haja itens -->
        <?php if (count($dados) > 0){ ?>

        <table class="table tabela-itens table-striped table-hover">
          <thead>
              <tr>
                  <th class="text-center">#</th>
                  <th class="text-center">Data Cadastro</th>
                  <th class="text-center">Nome</th>
                  <th class="text-center">Marca</th>
                  <th class="text-center">Cor Pedrominante</th>
                  <th class="text-right">Ações</th>
              </tr>
          </thead>
        <tbody>

        <?php for ($i=0; $i<count($dados); $i++) { ?>

          <tr>
              <td class="text-center"><a title="<?php echo $dados[$i]['id'];?>"><?php echo ($i+1);?></a></td>
              <td><?php echo $dados[$i]['dataInsercao'];?></td>
              <td><?php echo $dados[$i]['titulo'];?></td>
              <td><?php echo $dados[$i]['marca'];?></td>
              <td><span style="background-color:#<?php echo $dados[0]['cor1'];?>;color:#000000;padding:6px 8px"><?php/*  echo $dados[$i]['cor1'];?*/></span></td>
              <td class="td-actions text-right">
                <button data-toggle="tooltip" data-placement="bottom" title="Exibir Item" type="button"  class="btn btn-exibir-item btn-simple btn-xs">
                  <a href="item-usuario.php?id=<?php echo $dados[$i]['id'];?>"><i class="material-icons exibir-item-icon">visibility</i></a>
                </button>

                <button data-toggle="tooltip" data-placement="bottom" title="Editar Item"  type="button"  class="btn btn-editar-item btn-simple btn-xs">
                  <a href="form-editar-item.php?id=<?php echo $dados[$i]['id'];?>"><i class="editar-item-icon material-icons">mode_edit</i></a>
                </button>

                <button data-toggle="tooltip" data-placement="bottom" title="Remover Item"  type="button"  class="btn btn-remover-item btn-simple btn-xs">
                  <a href="javascript:if(confirm('Você tem certeza que deseja remover o item?')){window.location = 'meus-itens.php?remove=<?php echo $dados[$i]['id'];?>';}"><i class="material-icons remove-item-icon">remove_circle_outline</i></a>
                </button>
              </td>
          </tr>

        <?php } echo "</tbody>"; ?>

        <!-- caso nao haja itens -->
        <?php } else { ?>

              <table class="table tabela-itens table-striped table-hover">
                <thead>
                  <tr class="text-center"><th>Sem itens</th></tr>
                </thead>

        <?php } ?>

        </table>

        </div>
      </div>
    </div>
  </div>

    <div class="container-fluid">
      <div class="section text-center section-landing">

      <div class="row">

        <div class="col-md-8 col-md-offset-2">

          <a href="form-adicionar-item.php" class="btn  btn-default btn-cor-estilo-escuro teste">Adicionar Item</a>

        </div>


      </div>

      </div>
    </div>




    </body>
      <?php require 'footer.php'; ?>
  </html>
