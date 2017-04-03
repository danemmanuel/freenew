<?php 

session_start();

$idfreelancer=NULL;
if (isset($_SESSION['idfreelancer'])) {
  $idfreelancer=$_SESSION['idfreelancer'];
}


$idf=$_GET['id'];
require_once 'conta/php/class/freelancer.class.php';
require_once 'includes/freelancer.php';
require_once 'conta/php/class/areaatuacao.class.php';
require_once 'conta/php/class/servicos.class.php';
require_once 'conta/php/class/habilidades.class.php';
require_once 'conta/php/class/cliente.class.php';

$free= new freelancer();
$servicos= new servicos();
$areaatuacao= new areaatuacao();
$habilidades= new habilidades();
$cliente= new cliente();


$free->setId($idf);
$resposta=$free->buscarId();

$areaatuacao->setIdFreelancer($idf);
$area=$areaatuacao->buscarTodos();

$servicos->setIdFreelancer($idf);
$services=$servicos->buscarTodos();

$habilidades->setIdFreelancer($idf);
$habilidade=$habilidades->buscarTodos();

if (isset($_SESSION['idcliente'])) {
  $cliente->setId($_SESSION['idcliente']);
  $respcliente=$cliente->buscarId();
}


$idfree=$resposta['idfreelancer'];
$nomefreelancer=$resposta['nome'];
$email=$resposta['email'];
$datanascimento=$resposta['datanascimento'];
$telefone=$resposta['telefone'];
$resumo=$resposta['resumo'];
$urlavatar=$resposta['urlavatar'];
$linkfacebook=$resposta['facebook'];
$linklinkedin=$resposta['linkedin'];
$linkinsta=$resposta['insta'];

$date = date('Y-m-d');
$anos=($date-$datanascimento);


?>

<html>
<head>

  <!--Import Google Icon Font-->
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/component.css" />
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
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
            <div class="title branco" style="padding-top:50px;"><?php echo $nomefreelancer ?></div>
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


<section style="z-index:999999999999999">

  <div class="row">

    <div class="col m12 s12 center shadow">
      <div class="avatar center">
       <img class="responsive-img circle" src="conta/f/<?php echo $urlavatar ?>">

     </div>

     <div class="idade">
      <?php echo $anos; ?> anos
    </div>
    <div class="iconsocial">

      <?php if ($linkfacebook!=NULL) { ?>
      <a target="_blank" href="<?php echo $linkfacebook; ?>"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
      <?php } ?>

      <?php if ($linklinkedin!=NULL) { ?>
      <a target="_blank" href="<?php echo $linklinkedin; ?>"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
      <?php } ?>

      <?php if ($linkinsta!=NULL) { ?>
      <a target="_blank" href="<?php echo $linklinkedin; ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
      <?php } ?>

      <a target="_blank" href="mailto:<?php echo $email; ?>"><i class="fa fa-envelope" aria-hidden="true"></i></a>

    </div>

    <div class="resume">
      <?php echo $resumo; ?>
    </div>

    <div class="cv">
      
    <a  href="#modal2"> <button class="btn waves-effect waves-light" type="submit">Contrate-me
    </button>
  </a>
</div>

</div>
</div>

</section>



<?php if ($area!=NULL) { ?>
<section>
  <div class="row">
    <div class="col m12 s12 center">
      <div class="title">Area de Atuação</div>

      <?php  foreach ($area as $rowarea) { ?>
      <div class="col m3">
        <div class="card">
          <div class="card-image waves-effect waves-block waves-light">
            <img class="activator" src="img/services.jpg">
          </div>
          <div class="card-content">
            <span class="nomearea activator card-title text-darken-4"><?php echo $rowarea['nomearea'] ?><i class="material-icons right">more_vert</i></span>

          </div>
          <div class="card-reveal">
            <span class="nomearea card-title text-darken-4" ><?php echo $rowarea['nomearea'] ?><i class="material-icons right">close</i></span>
            <p style="text-align:justify; font-size:15px;color:#565656;"><?php  echo $rowarea['nivelprofissional'] ?></p>
            <div class="preco"><?php echo $rowarea['anosexperiencia'] ?> anos de experiência</div>
          </div>
        </div>
      </div>
      <?php }
      ?>
    </div>
  </div>
</section>
<?php } ?>

<?php if ($services!=NULL) { ?>
<img src="img/separator.jpg" style="max-width:100%;">
<section class="services">
  <div class="row">
    <div class="col m12 s12 center">
      <div class="title branco">Meus Serviços</div>

      <?php  foreach ($services as $service) { ?>
      <div class="col m3">
        <div class="card">
          <div class="card-image waves-effect waves-block waves-light">
            <img class="activator" src="img/suitcase.jpg">
          </div>
          <div class="card-content">
            <span class="nomearea activator card-title text-darken-4"><?php echo $service['nomeservico'] ?><i class="material-icons right">more_vert</i></span>

          </div>
          <div class="card-reveal">
            <span class="nomearea card-title text-darken-4" ><?php echo $service['nomeservico'] ?><i class="material-icons right">close</i></span>
            <p style="text-align:justify; font-size:15px;color:#565656;"><?php  echo substr($service['descricao'], 0, 150); ?></p>
            <div class="preco">R$ <?php echo $service['preco'] ?>,00 <?php echo $service['tipo'] ?></div>
          </div>
        </div>
      </div>
      <?php }
      ?>
    </div>
  </div>
</section>
<?php } ?>

<?php if ($habilidade!=NULL) { ?>
<section>
  <div class="row">
    <div class="col m12 s12 center">
      <div class="title">Habilidades</div>

      <?php 
      foreach ($habilidade as $skill) { ?>
      <div class="chip">
        <?php echo $skill['nomehabilidade']; ?>: <?php echo $skill['nivel']; ?>
      </div>

      <?php } ?>
    </div>
  </div>
</section>
<?php } ?>







  <!-- <svg id="bigTriangleColor" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100" viewBox="0 0 100 102" preserveAspectRatio="none">
    <path d="M0 0 L50 100 L100 0 Z"></path>
  </svg> -->



  <!-- Modal Structure -->
  <div id="modal2" class="modal">
    <div class="modal-content">
      <div style="text-align:right"><a href="">
        <a href=""><i class="fa fa-close" aria-hidden="true"></i></a>
      </a></div>

      <?php if (isset($_SESSION['idcliente'])) { ?>

      <form action="conta/php/functions/enviarpedido.php" autocomplete="off" method="POST">
        <input type="hidden" name="idfreelancer" value="<?php echo $idfree ?>">
        <div class="col m6 s12">
          
          <div class="input-field col m12 s12">
            <i class="material-icons prefix">account_circle</i>
            <input id="icon_prefix" type="text" class="validate" value="<?php echo $respcliente['nome'] ?>"  required name="nome">
            <label for="icon_prefix" data-error="insira um nome válido" data-success="perfeito">Seu Nome</label>
          </div>

          <div class="input-field col m12 s12">
            <i class="material-icons prefix">email</i>
            <input id="icon_prefix" type="email" class="validate" value="<?php echo $respcliente['email'] ?>" required name="email">
            <label for="icon_prefix" data-error="insira um email valido" data-success="perfeito">Seu Email</label>
          </div>

          <div class="input-field col m12 s12">
            <i class="material-icons prefix">phone</i>
            <input id="txtTelefone" type="tel" class="validate" value="<?php echo $respcliente['telefone'] ?>" required name="telefone">
            <label for="icon_prefix" data-error="insira um telefone válido" data-success="perfeito">Seu Telefonoe</label>
          </div>

          <div class="input-field col s12">
            <i class="material-icons prefix">work</i>
            <select name="servico">
              <option value="" disabled selected>Qual serviço está procurando?</option>
              <?php 

              foreach ($services as $service) { ?>
              <option value="<?php  echo $service['nomeservico'] ?>"> <?php echo $service['nomeservico']?></option>
              <?php }
              ?>
              
            </select>
          </div>
          
          <div class="input-field col m12 s12">
            <i class="material-icons prefix">textsms</i>
            <textarea name="msg" placeholder="Descreva sua necessidade..." id="icon_prefix2" class="materialize-textarea"></textarea>

          </div>
          
          <button type="submit" class="waves-effect waves-light btn-large">Enviar Pedido</button>

        </div>

      </form>


      <?php }else{ ?>

      <form action="conta/php/functions/enviarpedido.php" autocomplete="off" method="POST">
        <input type="hidden" name="idfreelancer" value="<?php echo $idfree ?>">
        <div class="col m6 s12">
          <div class="input-field col m12 s12">
            <i class="material-icons prefix">account_circle</i>
            
            <input id="icon_prefix" type="text" class="validate" required name="nome">
            <label for="icon_prefix" data-error="insira um email valido" data-success="perfeito">Seu Nome</label>
          </div>

          <div class="input-field col m12 s12">
            <i class="material-icons prefix">email</i>
            <input id="icon_prefix" type="email" class="validate" required name="email">
            <label for="icon_prefix" data-error="insira um email valido" data-success="perfeito">Seu Email</label>
          </div>
          <div class="input-field col m12 s12">
            <i class="material-icons prefix">phone</i>
            <input id="txtTelefone" type="number" class="validate" required name="telefone">
            <label for="icon_prefix" data-error="insira um email valido" data-success="perfeito">Seu Telefonoe</label>
          </div>

          <div class="input-field col s12">
            <i class="material-icons prefix">work</i>
            <select name="servico">
              <option value="" disabled selected>Qual serviço está procurando?</option>
              <?php 

              foreach ($services as $service) { ?>
              <option value="<?php  echo $service['nomeservico'] ?>"> <?php echo $service['nomeservico']?></option>
              <?php }
              ?>
              
            </select>
          </div>
          
          <div class="input-field col m12 s12">
            <i class="material-icons prefix">textsms</i>
            <textarea name="msg" placeholder="Descreva sua necessidade..." id="icon_prefix2" class="materialize-textarea"></textarea>

          </div>
          
          <button type="submit" class="waves-effect waves-light btn-large">Enviar Pedido</button>

        </div>

      </form>
      

      <?php } ?>




    </div>
  </div>

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



</script>
</html>