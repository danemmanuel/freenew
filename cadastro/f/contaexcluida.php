<?php
session_start();
if(isset($_SESSION['idfreelancer'])){

header("location:../../conta/f");
}else{  ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Land.io UI Kit | Codrops</title>
  <meta name="description" content="A free HTML template and UI Kit built on Bootstrap" />
  <meta name="keywords" content="free html template, bootstrap, ui kit, sass" />
  <meta name="author" content="Peter Finlan and Taty Grassini Codrops" />
  <link rel="apple-touch-icon" sizes="57x57" href="../../img/favicon/apple-touch-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="../../img/favicon/apple-touch-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="../../img/favicon/apple-touch-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="../../img/favicon/apple-touch-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="../../img/favicon/apple-touch-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="../../img/favicon/apple-touch-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="../../img/favicon/apple-touch-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="../../img/favicon/apple-touch-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="../../img/favicon/apple-touch-icon-180x180.png">
  <link rel="icon" type="image/png" href="../../img/favicon/favicon-32x32.png" sizes="32x32">
  <link rel="icon" type="image/png" href="../../img/favicon/android-chrome-192x192.png" sizes="192x192">
  <link rel="icon" type="image/png" href="../../img/favicon/favicon-96x96.png" sizes="96x96">
  <link rel="icon" type="image/png" href="../../img/favicon/favicon-16x16.png" sizes="16x16">
  <link rel="manifest" href="../../img/favicon/manifest.json">
  <link rel="shortcut icon" href="../../img/favicon/favicon.ico">
  <meta name="msapplication-TileColor" content="#663fb5">
  <meta name="msapplication-TileImage" content="img/favicon/mstile-144x144.png">
  <meta name="msapplication-config" content="img/favicon/browserconfig.xml">
  <meta name="theme-color" content="#663fb5">
  <!-- Only needed Bootstrap bits + custom CSS in one file -->
  <link rel="stylesheet" href="../../css/landio.css">
</head>

<body class="bg-faded p-t-2">
  <div class="container">
    <h3 class="p-y-1 text-xs-center">Detectamos que você já possuia uma conta na <strong> F.ree</strong> porém em algum momento você à excluiu

      <br> Realize um novo cadastro com um email diferente

    </h3>
  </div>

    <!-- WHITE navigation
    ================================================== -->



    <hr class="invisible">


    <div class="container">
      <div class="row">
        <div class="col-md-6 col-xl-6">

          <!-- Forms
          ================================================== -->
          <form  action="../../conta/php/functions/registrarfreelancer.php" method="POST">
            <div class="form-group has-icon-left form-control-name">
              <label class="sr-only" for="inputName">Seu nome</label>
              <input required type="text" class="form-control form-control-lg" id="inputName" name="nome" placeholder="Seu nome">
            </div>
            <div class="form-group has-icon-left form-control-email">
              <label class="sr-only" for="inputEmail">Seu email</label>
              <input required type="email" class="form-control form-control-lg" id="inputEmail" name="email" placeholder="Seu email" autocomplete="off">
            </div>
            <div class="form-group has-icon-left form-control-password">
              <label class="sr-only" for="inputPassword">Sua senha</label>
              <input required type="password" class="form-control form-control-lg" id="inputPassword" name="senha" placeholder="Sua senha" autocomplete="off">
            </div>

            <button type="submit" class="btn btn-primary btn-block">Cadastrar!</button>
            <p style="text-align:center;padding:5px;">Já é cadastrado? <a href="../../login/f">Entre</a></p>
          </form>

        </div>
        <div class="col-md-6 col-xl-6">

          <!-- SOCIAL buttons
          ================================================== -->

          <a href="#" class="btn btn-social btn-block bg-facebook">
            <span class="icon-facebook"></span> Cadastrar com Facebook
          </a>
          <hr class="invisible">
          <a href="#" class="btn btn-social btn-block bg-google">
            <span class="icon-google"></span> Cadastrar com Google
          </a>
          <hr class="invisible">
          <a href="#" class="btn btn-social btn-block bg-linkedin">
            <span class="icon-linkedin"></span> Cadastrar com LinkedIn
          </a>

          <hr class="invisible">

          <div class="text-xs-center">

          </div>

          <hr class="invisible">

        </div>

        <div class="clearfix hidden-xl-up"></div>

        <div class="col-md-4">

          <hr class="invisible">

        </div>

        <div class="clearfix hidden-md-up"></div>


      </div>
    </div>

    <hr class="invisible">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="../js/landio.min.js"></script>
  </body>
  </html>
  <?php 
  
}
?>
