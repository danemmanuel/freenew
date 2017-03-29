<?php 
session_start();


$idfreelancer=NULL;
$idcliente=NULL;

if (isset($_SESSION['idfreelancer'])) {
   $idfreelancer=$_SESSION['idfreelancer'];
}

if (isset($_SESSION['idcliente'])) {
   $idcliente=$_SESSION['idcliente'];
}


require_once '../../conta/php/class/freelancer.class.php';
$freelancer2= new freelancer();
$resp=$freelancer2->buscarTodos();


$freelancer2->setId($idfreelancer);
$resposta=$freelancer2->buscarId();

?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <!--Import Google Icon Font-->
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="../../css/materialize.css"  media="screen,projection"/>
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="../../js/materialize.min.js"></script>
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>

  <?php 

  require_once '../../conta/php/class/freelancer.class.php';
  $freela= new freelancer();
  $freela->setId($idfreelancer);
  $resp2=$freela->buscarId();


if ((isset($_SESSION['idfreelancer'])) or (isset($_SESSION['idcliente']))) { 

    header("location:../../conta");
    ?>


    <?php

  }else{
    ?>
    <nav>
    <div class="nav-wrapper">
     <a href="../../" class="brand-logo center"><img src="../../img/iconfree.png" style="max-width:50px;padding:3px;"></a>
     <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
     <ul class="left hide-on-med-and-down ">
      <li>
         <a href="#modal1" class="waves-effect waves-light btn"><i class="material-icons left">search</i>O que procura?</a>
     </li>
   </ul>

    <ul class="right hide-on-med-and-down">
    <li><a href=""><i class="material-icons left">launch</i>Login</a></li>
    <li><a href="../../cadastro"><i class="material-icons left">mode_edit</i>Cadastre-se</a></li>

  </ul>

  <ul class="side-nav" id="mobile-demo">


      
        <a href="#modal1" class="waves-effect waves-light btn"><i class="material-icons left">search</i>O que procura?</a>
   

  <li><div class="divider"></div></li>
  <li><a href=""><i class="material-icons left">launch</i>Login</a></li>
  <li><a href="../../cadastro"><i class="material-icons left">mode_edit</i>Cadastre-se</a></li>

</ul>
</div>

</nav>

  <div class="container">
    <div class="section" >

      <form action="loginpdo.php" autocomplete="off" method="POST">

        <div class="row" style="margin-top:90px">
          <div class="center title">Login</div>
          <div class="col m6 s12">
            <div class="input-field col m12 s12">
              <i class="material-icons prefix">account_circle</i>
              <input id="icon_prefix" type="email" class="validate" required name="email">
              <label for="icon_prefix" data-error="insira um email valido" data-success="perfeito">Email</label>
            </div>



            <div class="input-field col m12 s12">
              <i class="material-icons prefix">lock</i>
              <input pattern="[a-z A-Z @ 1-9]+" id="icon_telephone" type="password" required name="senha" class="validate">
              <label for="icon_telephone" data-error="insira uma senha valida" data-success="perfeito">Senha</label>
            </div>



            <div class="input-field col m12 s12">
              <button type="submit" class="waves-effect waves-light btn-large">Entrar</button>
            </div>
          </div>
        </div>
      </form>
      
    </div>
  </div>

  <?php
}

?>


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





  <!-- Modal Structure -->
  <div id="modal1" class="modal bottom-sheet">
      <div class="modal-content">

      <form action="../../pesquisar" autocomplete="off">
       <div class="input-field col s12">
        <i class="material-icons prefix">textsms</i>
        <input type="text" id="autocomplete-input" name="q" placeholder="Escreva o nome do produto ou serviço..." class="autocomplete">
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

</body>
<script type="text/javascript">

</script>
<script type="text/javascript"> 
jQuery(window).load(function() { 
  jQuery("#progress").delay(0).fadeOut("slow"); 
}); 

</script>
<script type="text/javascript">

$(document).ready(function () {$('input.autocomplete').autocomplete({
  data: {

    <?php $filtro= file_get_contents("../../includes/filtro.html");
    echo $filtro; ?>
    
  }});});


$(".button-collapse").sideNav();

$('.button-collapse').sideNav({
      menuWidth: 300, // Default is 300
      edge: 'left', // Choose the horizontal origin
      closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
      draggable: true // Choose whether you can drag to open on touch screens
    }
    );

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