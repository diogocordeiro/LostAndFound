<!DOCTYPE html>
<html ng-app="login">

<head>

  <?php require 'header.php'; ?>
  
    <!-- Custom Theme CSS -->

    <link href="../static/css/index-logado.css" rel="stylesheet">

</head>

<body>



  <?php require 'top-menu-logado.php'; ?>


    <div class="container-fluid">
      <div class="section text-center section-landing">
        <div class="row">

          <div class="col-md-8 col-md-offset-2">
            <h2 class="title titulo-busca">Busca</h2>
            <h5 class="description descricao-busca">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris.
                 </div>

          <form class="form">

            <div class="col-md-10 col-md-offset-1 ">
              <div class="input-group">

                <input type="text" class="form-control" placeholder="Pesquise Itens. Ex: Casaco">

                <span class="input-group-btn">
                        <button class="btn-busca-responsive  btn btn-default  btn-sm btn-cor-estilo-escuro" type="button">
                            <i class="material-icons">search</i>Buscar
                        </button>

                        <button class="btn-busca-avancada btn-busca-responsive  btn btn-default  btn-sm btn-cor-estilo-escuro" type="button">
                            <i class="material-icons">filter_list</i>Filtro
                        </button>

                    </span>

              </div>

            </div>
          </form>

             </div>

         <div class="container-fluid">

           <div class="row">

             <div class="col-md-4 col-md-offset-2">

               <div class="card card-iformacao-report">

                 <div class="info">
                   <div class="icon icon-primary">
                     <i class="material-icons report-perdido-icon">find_in_page</i>
                   </div>
                   <h4 class="info-title">Reportar Item Perdido</h4>
                   <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. </p>
                 </div>

                 <span class="input-group-btn">
                         <button class="btn-report btn btn-default  btn-lg btn-cor-estilo-escuro" type="button">
                             Criar Report Perda
                         </button>


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
                   <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. </p>
                 </div>

                 <span class="input-group-btn">
                         <button class="btn-report btn btn-default  btn-lg btn-cor-estilo-escuro" type="button">
                          Criar Report Achado
                         </button>


                     </span>


               </div>



             </div>



           </div>

         </div>


         <div class="container-fluid">

           <div class="row">

             <div class="col-md-8 col-md-offset-2">
               <h2 class="title titulo-itens">Itens</h2>
               <h5 class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ut pretium velit, eu aliquam purus. Nulla aliquam mauris et mi vehicula dapibus. Pellentesque id tincidunt nunc. Aliquam interdum enim ac nulla tempus, sit amet maximus nibh cursus. Praesent maximus neque urna, eu bibendum felis placerat rhoncus. Cras tincidunt sollicitudin bibendum. Aliquam pellentesque egestas magna, sed dictum metus tincidunt eu. Maecenas congue, dui sodales hendrerit maximus, ligula risus viverra felis, eu suscipit urna felis quis massa. Etiam feugiat mattis mattis. Praesent eleifend semper nisl, vitae posuere est vulputate at. Cras blandit ac magna at gravida. Vivamus non rhoncus tellus, eu pulvinar mauris. Sed finibus auctor risus in mollis. Nullam auctor luctus justo et elementum. Donec imperdiet eleifend fringilla.
                    </div>



           </div>

         </div>

         <div class="container-fluid">

           <div class="row">

             <div class="col-md-8 col-md-offset-2">

               <button class="btn  btn-default btn-cor-estilo-escuro">Meus Itens

               </button>

             </div>

           </div>

         </div>

       </div>

     </div>

  </body>
  <?php require 'footer.php'; ?>
</html>
