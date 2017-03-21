<?php 
session_start();
$idfreelancer=NULL;
if (isset($_SESSION['idfreelancer'])) {
  $idfreelancer=$_SESSION['idfreelancer'];
}

require_once 'includes/freelancer.php';

require_once 'conta/php/class/servicos.class.php';
$servicos= new servicos();




?>

<html>
<head>
  <meta charset="UTF-8">

  <!--Import Google Icon Font-->
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/component.css" />
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

    
    <div class="slider">
      <ul class="slides">
        <li>
          <img src="img/slidee.png" alt="slider image"> <!-- random image -->
          <div class="caption center-align">
            <div class="title branco">Os melhores profissionais estão aqui!</div>
            <a href="#modal1"><button class="btn waves-effect waves-light" type="submit" name="action">Encontre profissionais incríveis

            </button></a>
          </div>
        </li>
      </ul>
    </div>

    <!-- Modal Structure -->
    <div id="modal1" class="modal bottom-sheet">
      <div class="modal-content">

       <form action="pesquisar.php" autocomplete="off">
         <div class="input-field col s12">
          <i class="material-icons prefix">textsms</i>
          <input type="text" id="autocomplete-input" name="q" placeholder="Escreva o nome do produto ou serviço..." class="autocomplete2">
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

<section>
  <div class="row">
    <div class="col m12 s12">
      <div class="center title">Novos Freelancers</div>
      <?php 

      require_once 'conta/php/class/areaatuacao.class.php';
      $areaatuacao= new areaatuacao();


      foreach ($resp as $row) {


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

        <?php } ?>
      </div>
    </div>

  </section>

  <section class="fundoazul">
    <div class="row">
      <div class="col m12 s12">
        <div class="col m4 s12">
          <div class="estatisticas">3231</div>
          <div class="numeros">Serviços concluidos</div>
        </div>
        <div class="col m4 s12">
          <div class="estatisticas"><?php $freelancer2->somar(); ?></div>
          <div class="numeros">Profissionais Cadastrados</div>
        </div>
        <div class="col m4 s12">
          <div class="estatisticas">R$ 120.000,00</div>
          <div class="numeros">Pago aos profissionais</div>
        </div>

      </div>
    </div>
    <svg id="gambit-row-separator-2" preserveAspectRatio="none" class="gambit_separator gambit_sep_top gambit-sep-type-clouds2 gambit_sep_loaded" viewBox="0 0 1600 200" style="display: block;" data-height="200">
      <path class="gambit_sep_decor2" style="opacity: 1;fill: #bdc3c7;" d="M712.8,170.7c-4.4-30.3-32.5-51.4-62.9-47c-9.2,1.3-17.6,4.9-24.7,10c-8.9-15-26.1-23.9-44.4-21.2
      c-24.2,3.5-41,25.9-37.5,50.1c0.1,0.8,0.2,1.5,0.4,2.2c-0.7-0.1-1.4-0.2-2.1-0.3c-6.9-5.2-15.2-8.9-24.3-10.5
      c-19.8-3.3-39,4.4-51.2,18.6c-3.1-1.3-6.5-2.3-9.9-2.9c-7.6-1.3-15-0.5-21.8,1.8c-4.3-9.5-13.1-16.8-24.1-18.6
      c-11.6-1.9-22.8,2.6-29.9,11c-5.4-9-13.9-16.1-24.3-19.5c2.7-28.7-17.2-55.1-46.1-59.9c-21.6-3.6-42.3,5.8-54.2,22.4
      c-8.2-9.6-19.7-16.5-33.1-18.7c-28.5-4.7-55.5,13.1-62.8,40.5c-2.8-1.9-6-3.3-9.5-3.9c-3.1-0.5-6.2-0.4-9.1,0.3
      c-4.7-7.5-12.5-13-22-14.6c-10.4-1.7-20.4,1.7-27.5,8.4c-3.4-3.9-8.2-6.7-13.7-7.7c-10.4-1.7-20.3,3.7-24.7,12.7
      c-5.4-3.9-11.7-6.6-18.7-7.8c-8.1-1.3-16-0.4-23.2,2.4c-2.2-5.2-8.3-9.4-13.5-11.8V184h715.1C713.5,179.7,713.4,175.2,712.8,170.7
      z"></path>
      <path class="gambit_sep_decor1" style="opacity: 1;fill: #d2d7d3;" d="M1602,57.4c-11.2,5.2-22.1,14-27.6,24.5c-2.8-0.1-5.6,0.2-8.4,0.9c-3.5,0.8-6.7,2.2-9.6,4
      c-10.5-10.6-26.1-15.6-41.6-11.9c-14.2,3.4-25.2,13.3-30.5,25.8c-6-14.4-21.6-22.7-37.2-19c-10.9,2.6-19.1,10.4-22.8,20.1
      c-13.1-14.8-33.8-22.1-54.4-17.2c-19.6,4.7-34.2,19.1-40,37c-3.4,0-6.8,0.4-10.3,1.2c-7.5,1.8-14,5.3-19.3,10.1
      c-7.6-7.1-18.5-10.4-29.4-7.8c-11.4,2.7-20,11.2-23.3,21.7c-8.4-6.2-19.1-9.4-30-8.5c-8.7-27.5-37.2-44.1-65.8-37.3
      c-21.3,5.1-36.7,21.7-41.3,41.7c-11.3-5.7-24.5-7.5-37.7-4.4c-22.6,5.4-38.7,23.9-42,45.5H1602V57.4z"></path>
      <path class="gambit_sep_main" style="fill: rgb(255, 255, 255);" d="M1576.7,52.7c-24.1,3.4-44.5,18.3-55.3,39.1c-3.2-1.2-6.7-1.8-10.4-1.8c-17.1,0-31,13.9-31,31
      c-12,2.6-22.1,10.1-28.1,20.4c-6.9-25-29.7-43.3-56.9-43.3c-12,0-23.1,3.6-32.4,9.7c-5.2-4.8-12.1-7.7-19.6-7.7
      c-10.5,0-19.7,5.6-24.8,14c-0.1,0-0.1,0-0.2,0c-16.8,0-31.3,9.6-38.4,23.7c-5.1-8.2-14.2-13.7-24.6-13.7c-16,0-29,13-29,29
      c0,6.2,1.9,11.9,5.2,16.6c-6,2-11.1,5.7-14.9,10.6c-13.1-20.6-36.2-34.2-62.4-34.2c-13.8,0-26.7,3.8-37.7,10.3
      c-4.8-10.8-15.7-18.3-28.3-18.3c-17.1,0-31,13.9-31,31c0,1,0.1,2,0.1,3c-5.5-1.3-11.2-2-17.1-2c-3.3,0-6.5,0.2-9.6,0.6
      c-8.3-22.6-30-38.6-55.4-38.6c-26.2,0-48.4,17.1-56.1,40.7c-7.2-5.5-16.2-8.7-25.9-8.7c-2.3,0-4.6,0.2-6.8,0.5
      c-6.4-25.6-29.6-44.5-57.2-44.5c-14.9,0-28.5,5.5-38.8,14.6C779,127.9,766,124,752,124c-33.9,0-62.5,22.8-71.2,54
      c-7.7-7.4-18.2-12-29.8-12c-12.2,0-23.2,5.1-31,13.3c-0.9-31.8-27-57.3-59-57.3c-14.7,0-28.2,5.4-38.5,14.4
      c-7.1-5.2-15.9-8.4-25.5-8.4c-0.8,0-1.5,0-2.3,0.1C482,105.4,457.8,90,430,90c-26.5,0-49.8,14-62.8,34.9
      c-9.6-6.9-21.4-10.9-34.2-10.9c-32.6,0-59,26.4-59,59c0,0.4,0,0.8,0,1.3c-5.7-6.3-13.9-10.3-23-10.3c-8.6,0-16.4,3.5-22,9.2
      c-6.3-15.9-21.8-27.2-40-27.2c-21.3,0-39.1,15.6-42.4,36c-8.7-5.1-18.8-8-29.6-8c-5.7,0-11.1,0.8-16.3,2.3
      c-6-31.9-32.3-56.5-65.1-59.9c0.2-1.8,0.3-3.6,0.3-5.4c0-21.4-17.6-39.1-38-42.4V396h1604V31.1C1591.4,33.8,1579.1,42,1576.7,52.7z
      "></path></svg>

    </section>

    <section>
      <div class="row">
        <div class="col m12 s12">
          <div class="center title" style="margin-top:40px;">Como Funciona?</div>

        </div>
      </div>

      <div class="row">
        <div class="col s12">
          <ul class="tabs">
            <li class="tab"><a class="active" href="#test1">Sou Freelancer</a></li>
            <li class="tab"><a  href="#test2">Sou Cliente</a></li>
          </ul>
        </div>
        <div id="test1" class="col s12"  style="margin-top:40px;">
          <div class="col m4 s12"  style="margin-top:20px;margin-bottom:20px;">
           <div class="center"><i class="large material-icons">work</i></div>
           <div class="center anuncio">Crie seu perfil</div>
           <div class="subanuncio">
             É grátis. Construa o seu perfil em questão de minutos, insira suas habilidades, serviços e muito mais.
           </div>
         </div>

         <div class="col m4 s12" style="margin-top:20px;margin-bottom:20px;">
           <div class="center"><i class="large material-icons">language</i></div>
           <div class="center anuncio">Seja encontrado</div>
           <div class="subanuncio">
            Feche negócios que sejam gratificantes, há milhares de pessoas à procura de seus serviços.
          </div>
        </div>

        <div class="col m4 s12" style="margin-top:20px;margin-bottom:20px;">
         <div class="center"><i class="large material-icons">thumb_up</i></div>
         <div class="center anuncio">Ganhe uma renda extra</div>
         <div class="subanuncio">
          Não dependa mais de recomendações de amigos, faça seu próprio marketing para receber uma renda extra.
        </div>
      </div>
    </div>
    <div id="test2" class="col s12"  style="margin-top:40px;">

      <div class="col m4 s12" style="margin-top:20px;margin-bottom:20px;">
       <div class="center"><i class="large material-icons">search</i></div>
       <div class="center anuncio">Procure profissionais</div>
       <div class="subanuncio">
        Para cada problema, há milhares de profissionais dispostos à solucionar.
      </div>
    </div>

    <div class="col m4 s12" style="margin-top:20px;margin-bottom:20px;">
     <div class="center"><i class="large material-icons">swap_horiz</i></div>
     <div class="center anuncio">Negocie preços</div>
     <div class="subanuncio">
      Faça uma boa negociação para garantir que você economize sem abrir mão da qualidade.
    </div>
  </div>

  <div class="col m4 s12" style="margin-top:20px;margin-bottom:20px;">
   <div class="center"><i class="large material-icons">perm_phone_msg</i></div>
   <div class="center anuncio">Facilite sua vida</div>
   <div class="subanuncio">
    Nós encontraremos todos os profissionais que possam solucionar seu problema, quer ver?
  </div>
  <center><a style="color:#fff"href="#modal1"><button class="btn waves-effect waves-light" style="color:#fff">Escreva o que deseja</a>
  </center>
</div>

</div>

</div>

</section>
<img src="img/separator.jpg" style="width:100%;">

<section class="fundoazul " style="margin-top:-50px;">
  <div class="center title branco" style="margin-top:40px;">Perguntas frequentes</div>
  <div class="row" style="margin-left:10%;margin-right:10%;">
    <div class="col m6 s12">
      <ul class="collapsible" data-collapsible="accordion">
        
        <li>
          <div class="collapsible-header">
            <i class="material-icons">zoom_in</i>Que tipo de trabalho pode ser feito?
          </div>
          <div class="collapsible-body">
            <span>
              Absolutamente qualquer serviço/produto que envolva remuneração.
            </span>
          </div>
        </li>
        
        <li>
          
          <div class="collapsible-header">
            <i class="material-icons">zoom_in</i>Como faço para encontrar o profissional certo?
          </div>
          <div class="collapsible-body">
            <span>
             Entre em contato com o profissional que ofereça o serviço/produto que deseja, extraia o máximo de informação que puder
             no momento da negociação e utilize seus dados para saber se o profissional se encaixa de fato em sua necessidade.
            </span>
          </div>

        </li>

        <li>
          
          <div class="collapsible-header">
            <i class="material-icons">zoom_in</i>Como funciona o pagamento ao profissional
          </div>
          <div class="collapsible-body">
            <span>
              Toda a parte de pagamentos deixamos em sua mão para que negocie com o profissional a melhor forma para ambos.
              Não queremos que a plataforma restrinja o pagamento à determinadas formas, estamos aqui
              para melhorar a vida das pessoas :)
            </span>
          </div>

        </li>
      </ul>
    </div>
  </div>
</section>

  <!-- <svg id="bigTriangleColor" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100" viewBox="0 0 100 102" preserveAspectRatio="none">
    <path d="M0 0 L50 100 L100 0 Z"></path>
  </svg> -->

  <?php 
  require_once 'includes/footer.html';
  ?>

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

$(document).ready(function(){
  $('ul.tabs').tabs();
});

</script>
</html>