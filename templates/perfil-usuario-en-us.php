<!DOCTYPE html>
<html ng-app="login">

<head>

  <?php require 'header.php'; ?>

    <!-- Custom Theme CSS -->

    <link href="../static/css/index-logado.css" rel="stylesheet">
    <link href="../static/css/perfil-usuario.css" rel="stylesheet">

</head>

<body>

  <?php require 'top-menu-logado-en-us.php'; ?>

    <!-- coletar informacoes no banco -->
    <?php
    require('../backend/funcoes.php');
    require('../backend/conBd.php');

    $dados = getPerfil(BaseDados::conBdUser(), $_SESSION['Lost_Found']["id"]);
  ?>

      <div class="container-fluid">

        <div class="section text-center section-landing">

          <div class="row">

            <div class="col-md-10 col-md-offset-1">

              <div class="card card-content">

                <h2 class="title titulo-adicionar-item">Perfil</h2>

                <div class="row">

                  <div class="col-md-4 col-md-offset-1">

                    <img src="../usuarios/fotos/<?php echo $dados[0]['imagemPerfil'];?>" class="img-circle img-responsive img-raised">

                  </div>

                  <div class="col-md-6 ">

                    <div class="card card-content-item">

                      <div class="row">

                        <div class="col-md-4 col-md-offset-1">

                          <dl class="dl-horizontal">
                            <dt>E-mail: </dt>
                            <dd class="dd-conteudo-email">
                              <?php echo $dados[0]['email'];?>
                            </dd>

                            <br>
                            <br>

                            <dt>Birth Date: </dt>
                            <dd class="dd-conteudo-data">
                              <?php echo $dados[0]['dNascimento'];?>
                            </dd>

                            <br>
                            <br>

                            <dt>Password: </dt>
                            <!-- <dd class="dd-conteudo-senha"><a data-toggle="modal" data-target="#modalAlterarSenha" href="#">Alterar</a></dd> -->
                            <dd class="dd-conteudo-senha"><a href="../backend/Senha.php?tipo=on">Change</a></dd>
                            <!-- MODAL ONDE APARECE O FORM PARA COLOCAR EMAIL DE ALTERAR SENHA  -->
                          <div class="modal fade" id="modalAlterarSenha" tabindex="-1" role="dialog" aria-labelledby="modalAlterarSenhaLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h4 class="modal-title" id="modalAlterarSenhaLabel">Change Password</h4>
                                  </div>
                                  <div class="modal-body">
<!--
                                    <h5>Digite seu e-mail para receber as instruções de alteração de senha.</h5>

                                    <form action="../backend/Senha.php?tipo=on" method="POST">

                                      <div class="form-group">
                                        <div class="section text-center section-landing">

                                          <div class="input-group">
                                            <span class="input-group-addon">
                      											<i class="material-icons">email</i>
                      										</span>
                                            <input type="email" class="form-control input-lg " id="email" name="email" ng-model="email" placeholder="Email..." required />
                                          </div>


                                        </div>

                                      </div>
                                  <div class="modal-footer">

                                    <div class="section text-center section-landing">
                                        <input id="btnEnviar" value="Enviar" class="btn btn-default btn-lg btn-cor-estilo-escuro" type="submit" />
                                    </div>


                                  </div>
                                    </form> -->
                                  </div>

                                </div>
                              </div>
                            </div> <!--FIM DO MODAL-->

                            <br>
                            <br>

                            <dt>First Name: </dt>
                            <dd class="dd-conteudo">
                              <?php echo $dados[0]['nome'];?>
                            </dd>

                            <br>
                            <br>

                            <dt>Last Name: </dt>
                            <dd class="dd-conteudo-sobrenome">
                              <?php echo $dados[0]['sobrenome'];?>
                            </dd>

                            <br>
                            <br>


                            <dt>Gender : </dt>
                            <dd class="dd-conteudo">
                              <?php
                              if($dados[0]['sexo'] == 1){
                                echo "Female";
                              } else {
                                  echo "Male";
                                }
                          ?>
                            </dd>

                            <br>
                            <br>

                            <dt>City: </dt>
                            <dd class="dd-conteudo">
                              <?php echo $dados[0]['cidade'];?>
                            </dd>

                            <br>
                            <br>

                            <dt>Country: </dt>
                            <dd class="dd-conteudo-pais">
                              <?php echo $dados[0]['pais'];?>
                            </dd>

                            <br>
                            <br>

                            <dt>Cell phone: </dt>
                            <dd class="dd-conteudo-telefone">
                              <?php echo $dados[0]['celular'];?>
                            </dd>

                            <br>
                            <br>

                            <dt>Telephone: </dt>
                            <dd class="dd-conteudo-telefone">
                              <?php echo $dados[0]['telefone'];?>
                            </dd>

                            <br>
                            <br>

                            <dt>Facebook: </dt>
                            <dd class="dd-conteudo">
                              <?php echo $dados[0]['facebook'];?>
                            </dd>

                            <br>
                            <br>

                          </dl>

                        </div>

                      </div>

                    </div>

                    <div class="footer text-center">
                      <a class="btn-editar btn-salvar btn btn-default  btn-lg btn-cor-estilo-escuro" href="form-editar-perfil.php">Edit Profile</a>
                    </div>

                  </div>



                </div>



              </div>



            </div>

          </div>

        </div>

      </div>



</body>

<?php require 'footer-en-us.php'; ?>

</html>
