<?php 
session_start();
$idfreelancer=NULL;
if (isset($_SESSION['idfreelancer'])) {
  $idfreelancer=$_SESSION['idfreelancer'];
}

$q=$_GET['q'];

require_once 'includes/freelancer.php';

require_once 'conta/php/class/servicos.class.php';
$servicos= new servicos();
$servicos->setChave($q);
$chave=$servicos->buscaChave();



?>

<html>
<head>
  <meta charset="UTF-8">

  <!--Import Google Icon Font-->
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>


  <div id="progress" class="preloader-wrapper big active">
    <div class="spinner-layer spinner-blue-only">
      <div class="circle-clipper left">
        <div class="circle"></div>
      </div><div class="gap-patch">
      <div class="circle"></div></div>
      <div class="circle-clipper right">
        <div class="circle"></div></div>
      </div>
    </div>


    <?php 

    require_once 'includes/nav.php';
    ?>

    


    <!-- Modal Structure -->
    <div id="modal1" class="modal bottom-sheet">
      <div class="modal-content">

       <form action="" autocomplete="off">
         <div class="input-field col s12">
          <i class="material-icons prefix">textsms</i>
          <input pattern="[a-z A-Z âêîôûãõáéíóú]+" required type="text" id="autocomplete-input" name="q" placeholder="Escreva o nome do produto ou serviço..." class="autocomplete2">
        </div>


      </div>
      <div class="modal-footer">
        <button class="left btn waves-effect waves-light" type="submit">Pesquisar
          <i class="material-icons left">search</i>
        </button>

      </div>
    </form>

  </div>
</div>

<div class="row">
        <div class="col m12 s12">
          <div class="center title" style="margin-top:100px;">Profissionais que ofereçam <?php echo $q ?></div>

<?php if ($chave!=NULL) { ?>


<?php 


require_once 'conta/php/class/areaatuacao.class.php';
$areaatuacao= new areaatuacao();

$areaatuacao->buscarCategoria();

foreach ($chave as $lin) {
  $freelancer2->setId($lin['idfreelancer']);
  $buscarcategoria=$freelancer2->buscarAll();
  if ($buscarcategoria!=NULL) {



    foreach ($buscarcategoria as $row) {


      ?>
      
          <div class="col m3 s12">
            <div class="card">
              <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" src="conta/f/<?php echo $row['urlavatar'] ?>">
              </div>
              <div class="card-content">
                <span class="card-title activator grey-text text-darken-4"><?php echo $row['nome'] ?><i class="material-icons right">more_vert</i></span>

              </div>
              <div class="card-reveal">
                <?php 

                $idf=$row['idfreelancer'];
                $areaatuacao->setIdFreelancer($idf);
                $resp4=$areaatuacao->buscar();

                foreach ($resp4 as $row4) { ?>
                <span class="nomearea card-title text-darken-4"><?php  echo $row4['nomearea']; ?><i class="material-icons right">close</i></span>



                <?php } ?>

                <div class="resumo"><?php echo substr($row['resumo'], 0, 150); ?> [...]</div>
                <div class="nomearea">O que posso oferecer?</div>
                <div class="xip">
                  <?php

                  $servicos->setIdFreelancer($idf);
                  $services=$servicos->buscar();

                  foreach ($services as $rowservice) { ?>
                  <div class="chip">
                    <?php echo $rowservice['nomeservico']; ?>
                  </div>

                  <?php }

                  ?>
                </div>
                <a href="profissional.php?id=<?php echo $row['idfreelancer'] ?>"><button class="btn-large waves-effect waves-light" type="submit" name="action">Visualizar Perfil

                </button></a>
              </div>
            </div>
          </div>


          <?php } }else{ ?>
          <div class="row">
            <div class="col m12 s12 center">
             
              <a href="#modal1" class="waves-effect waves-light btn">Pesquise por outra coisa</a>

            </div>
          </div>
          <?php


        } } ?>


      </div>
    </div>
    <?php } else {?>

    <div class="row">
      <div class="col m12 s12 center">
        <div class="center title" style="margin-top:100px;">Infelizmente não há pessoas que oferecam <?php echo $q ?> :(</div>
        <a href="#modal1" class="waves-effect waves-light btn">Pesquise por outra coisa</a>

      </div>
    </div>
    <?php } ?>




  </body>



  <script type="text/javascript"> 

  $(document).ready(function () {$('input.autocomplete2').autocomplete({
    data: {
      <?php $filtro= file_get_contents("includes/filtro.html");
      echo $filtro; ?>
    }});});

  jQuery(window).load(function() { 
    jQuery("#progress").delay(0).fadeOut("slow"); 
  }); 

  </script>
  <script type="text/javascript">
  $(document).ready(function () {
    $('.slider').slider({full_width: true});
  });

  $(".button-collapse").sideNav();

  $('.button-collapse').sideNav({
      menuWidth: 300, // Default is 300
      edge: 'left', // Choose the horizontal origin
      closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
      draggable: true // Choose whether you can drag to open on touch screens
    }
    );
  $(document).ready(function() {
    $('select').material_select();
  });

  $('.dropdown-button').dropdown({
    inDuration: 300,
    outDuration: 225,
      constrainWidth: false, // Does not change width of dropdown to that of the activator
      hover: false, // Activate on hover
      gutter: 0, // Spacing from edge
      belowOrigin: false, // Displays dropdown below the button
      alignment: 'left', // Displays dropdown with edge aligned to the left of button
      stopPropagation: false // Stops event propagation
    }
    );

  $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
  });



  </script>
  </html>