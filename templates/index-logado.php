<!DOCTYPE html>
<html ng-app="login">

<head>

  <?php require 'header.php'; ?>

    <!-- Custom Theme CSS -->

    <link href="../static/css/index-logado.css" rel="stylesheet">
    <style type="text/css">

      #div-resultados{

        background-color: #ECEFF1;
        border: 1px solid #000000;
        padding: 5px 8px;
        border-radius: 10px;
        margin: 20px;
      }

    </style>

</head>

<body>

  <?php require 'top-menu-logado.php'; ?>

    <div class="container-fluid">
      <div class="section text-center section-landing">
        <div class="row">

          <div class="col-md-8 col-md-offset-2">
            <h2 class="title titulo-busca">Busca</h2>
            <h5 class="description descricao-busca">Perdeu algo? faça uma busca e veja os reports de itens econtrados por outros usuários. Achou algo? pesquise os possiveis donos do item encontrado.
                 </div>

          <form class="form" id="form-search-reports">

            <div class="col-md-10 col-md-offset-2 ">
              <div class="input-group">

                <input type="text" name="stringBusca" id="stringBusca" class="form-control" placeholder="Escolha o filtro e pesquise Reports...">

                <span class="input-group-btn">
                 <!-- <button class="btn-busca-responsive  btn btn-default  btn-sm btn-cor-estilo-escuro" type="button">
                      <i class="material-icons">search</i>Buscar
                  </button>-->
                </span>

                <div class="row">
                  <div class="col-md-5">
                    <select class="form-control" name="filtroBusca" id="filtroBusca">
                      <option value="">Escolha o filtro</option>
                      <option value="data">Por data</option>
                      <option value="identificador">Por identificador</option>
                      <option value="local">Por local</option>
                      <option value="marca">Por marca</option>
                      <option value="titulo">Por título</option>
                    </select>
                  </div>
                </div>

              </div>

            </div>
          </form>
            <script type="text/javascript" language="javascript" src="../backend/js/buscarReports.js"></script>
        </div>



         <div class="container-fluid">

           <div class="row">
             <div class="col-md-8 col-md-offset-2" id="resultados-pesquisa"></div>
           </div>

           <div class="row">

             <div class="col-md-4 col-md-offset-2">

               <div class="card card-iformacao-report">

                 <div class="info">
                   <div class="icon icon-primary">
                     <i class="material-icons report-perdido-icon">find_in_page</i>
                   </div>
                   <h4 class="info-title">Reportar Item Perdido</h4>
                   <p>Ao criar um report de item perdido, outros usuarios poderão iteragir nesta pagina prestar informações caso achem o seu item. </p>
                 </div>

                 <span class="input-group-btn">
                         <a href="form-report-perido.php" class="btn-report btn btn-default  btn-lg btn-cor-estilo-escuro" type="button">
                             Criar Report Perda
                         </a>


                     </span>

               </div>

             </div>
             <div class="col-md-4 col-md-offset">

               <div class="card card-iformacao-report">

                 <div class="info">
                   <div class="icon icon-primary">
                     <i class="material-icons location-icon">location_on</i>
                   </div>
                   <h4 class="info-title">Reportar Item Econtrado</h4>
                   <p>Ao criar um report de item achado, outros usuarios poderão iteragir nesta pagina prestar informações caso tenha perdido o item informado por você. </p>
                 </div>

                 <span class="input-group-btn">
                         <a href="form-report-achado.php" class="btn-report btn btn-default  btn-lg btn-cor-estilo-escuro" type="button">
                          Criar Report Achado
                        </a>


                     </span>


               </div>



             </div>



           </div>

         </div>


         <div class="container-fluid">

           <div class="row">

             <div class="col-md-8 col-md-offset-2">
               <h2 class="title titulo-itens">Itens</h2>
               <h5 class="description">Você pode manter um cadastrar seus itens previamente no sistema, com esse cadastro será mais fácil na hora de reportar sua perda tendo em vista que os dados dos itens já constam no sistema. Outro diferencial de cadastrar previamente os itens é que se um report de perda é criado a partir de um item que já estava cadastrado no sistema a página deste report vai ter um selo especial identificando isso.
                    </div>



           </div>

         </div>

         <div class="container-fluid">

           <div class="row">

             <div class="col-md-8 col-md-offset-2">

               <a href="meus-itens.php" class="btn  btn-default btn-cor-estilo-escuro">Meus Itens

               </a>

             </div>

           </div>

         </div>

       </div>

     </div>

  </body>
  <?php require 'footer.php'; ?>
</html>
