<!DOCTYPE html>
<html ng-app="login">

<head>

  <?php require 'header.php'; ?>
    <script type="text/javascript" language="javascript" src="../backend/js/cadastroUsuario.js"></script>

    <!-- Custom Theme CSS -->

    <link href="../static/css/meus-reports.css" rel="stylesheet">

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

            require('../backend/Report.php');
            require('../backend/conBd.php'); 
            require('../backend/nomesTabelas.php');
            require('../backend/funcoes.php');

            //Coleta os reports do usuario
            $dados = [];
            $achados = getReportsUsuario(BaseDados::conBdUser(), $_SESSION['Lost_Found']["id"], $tabAchados);
            $perdidos = getReportsUsuario(BaseDados::conBdUser(), $_SESSION['Lost_Found']["id"], $tabPerdidos);
            
            if (count($achados) > 0) {
              for ($i=0; $i<count($achados); $i++) { 
                array_push($dados, $achados[$i]);
              }
            }

            if (count($perdidos) > 0) {
              for ($i=0; $i<count($perdidos); $i++) { 
                array_push($dados, $perdidos[$i]);
              }
            }

            //Remover Itens
            if (isset($_GET['remove'])) {

              //Valida string
              $idRemove = validarString($_GET['remove']);

              //Coleta o report passado
              $dadosReportA = getData(BaseDados::conBdUser(), $tabAchados, "id", $idRemove, "s");
              $dadosReportP = getData(BaseDados::conBdUser(), $tabPerdidos, "id", $idRemove, "s");

              //Caso o report nao exista
              if (count($dadosReportA) < 1 && count($dadosReportP) < 1) {
                echo "<center><br/><br/><br/>Erro: o Report não foi encontrado<br/><a href='javascript:history.go(-1);'>voltar</a></center>";
                exit;

              //Caso o report exista
              } else {

                  $dadosReport = null;
                  $tabRemover = null;

                  if (count($dadosReportA) == 1) {
                    $dadosReport = $dadosReportA;
                    $tabRemover = $tabAchados;
                  } elseif (count($dadosReportP) == 1) {
                      $dadosReport = $dadosReportP;
                      $tabRemover = $tabPerdidos;
                    }

                  
                  //Caso o report NAO perteca ao usuario da session
                  if ($dadosReport[0]['idUsuario'] != $_SESSION['Lost_Found']["id"]) {
                    echo "<center><br/><br/><br/>Erro: o Report não foi encontrado<br/><a href='javascript:history.go(-1);'>voltar</a></center>";
                    exit;

                  //Caso o report perteca ao usuario da session
                  } else {

                      //Coleta os dados do item do report
                      $dadosItemReport = getData(BaseDados::conBdUser(), $tabItens, "id", $dadosReport[0]['idItem'], "s");

                      //Caso o item do report NAO pertenca a nenhum usuario (remove o report e o item completamente)
                      if ($dadosItemReport[0]['idUsuario'] == 0
                       && $dadosItemReport[0]['idRelAchado'] == 0
                        && $dadosItemReport[0]['idRelPerdido'] == 0) {
                        require('../backend/Item.php');

                        $sucessoItem = removeItem(BaseDados::conBdUser(), $dadosItemReport[0]['id'], "tudo", $dadosItemReport[0]['enderFoto']);

                        if ($sucessoItem == "sucesso") {
                          $sucessoReport = removeReport(BaseDados::conBdUser(), $dadosReport[0]['id'], $tabRemover);
                        } else {
                            echo "Erro: ao deletar o item do Report.";
                          }

                      //Caso o item do report pertenca a algum usuario (remover apenas o report)
                      } else {
                          require('../backend/Item.php');
                          $sucessoReport = removeReport(BaseDados::conBdUser(), $dadosReport[0]['id'], $tabRemover, $dadosItemReport[0]['id']);
                        }

                      //Caso o report seja removido com sucesso
                      if ($sucessoReport == "sucesso") {
                        echo "<center><br/><br/><br/>Report removido com sucesso.<br/><a href='javascript:history.go(-1);'>voltar</a></center>";
                        exit;
                      } else {
                          echo "<center><br/><br/><br/>Report não removido.<br/><a href='javascript:history.go(-1);'>voltar</a></center>";
                          exit;
                        }
                    }
                }//else report exista

            }//if remover itens
          ?>
        <h2 class="title titulo-busca">Meus Reports</h2>

        <div class="col-md-8 col-md-offset-2">

        <!-- caso haja reports -->
        <?php if (count($dados) > 0){ ?>
        <table class="table tabela-itens table-striped table-hover">
          <thead>
              <tr>
                  <th class="text-center">#</th>
                  <th class="text-center">Data Criação</th>
                  <th class="text-center">Nome</th>
                  <th class="text-center">Local</th>
                  <th class="text-right">Ações</th>
              </tr>
          </thead>
        <tbody>


        <?php for ($i=0; $i<count($dados); $i++) { ?>

          <tr>
              <td class="text-center"><a title="<?php echo $dados[$i]['id'];?>"><?php echo ($i+1);?></a></td>
              <td><?php echo $dados[$i]['dataCadastro'];?></td>
              <td><?php echo $dados[$i]['titulo'];?></td>
              <td><?php echo $dados[$i]['mapsLocal'];?></td>
              <td class="td-actions text-right">
                <button data-toggle="tooltip" data-placement="bottom" title="Exibir Item" type="button"  class="btn btn-exibir-item btn-simple btn-xs">
                  <a href="report-usuario.php?id=<?php echo $dados[$i]['id'];?>"><i class="material-icons exibir-item-icon">visibility</i></a>
                </button>

                <button data-toggle="tooltip" data-placement="bottom" title="Editar Item"  type="button"  class="btn btn-editar-item btn-simple btn-xs">
                  <a href="form-editar-report.php?id=<?php echo $dados[$i]['id'];?>"><i class="editar-item-icon material-icons">mode_edit</i></a>
                </button>

                <button data-toggle="tooltip" data-placement="bottom" title="Remover Item"  type="button"  class="btn btn-remover-item btn-simple btn-xs">
                  <a href="javascript:if(confirm('Você tem certeza que deseja remover o Report?')){window.location = 'meus-reports.php?remove=<?php echo $dados[$i]['id'];?>';}"><i class="remover-item-icon material-icons ">remove_circle_outline</i></a>
                </button>
              </td>
          </tr>

        <?php } echo "</tbody>"; ?>

        <!-- caso nao haja reports -->
        <?php } else { ?>

              <table class="table tabela-itens table-striped table-hover">
                <thead>
                  <tr class="text-center"><th>Sem Reports</th></tr>
                </thead>

        <?php } ?>

        </table>

        </div>
      </div>
    </div>
  </div>

  <br/><br/><br/><br/>

  </body>
  
  <?php require 'footer.php'; ?>
  
  </html>
