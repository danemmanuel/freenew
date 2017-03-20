<?php 

require_once 'conta/php/class/freelancer.class.php';
$freela= new freelancer();
$freela->setId($idfreelancer);
$resp2=$freela->buscarId();


if (isset($idfreelancer)) { ?>

<nav>
  <div class="nav-wrapper">
    <a href="index.php" class="brand-logo center"><img src="img/iconfree.png" style="max-width:50px;padding:3px;"></a>
    <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
    <ul class="left hide-on-med-and-down">
      <li>
       <a href="#modal1" class="waves-effect waves-light btn"><i class="material-icons left">search</i>O que procura?</a>
      </li>

    </ul>


    <ul class="right hide-on-med-and-down">
      <li><a href="conta/f"><i class="material-icons left">dashboard</i>Minha Conta</a></li>
      <li><a href="conta/f/sair.php"><i class="material-icons left">trending_flat</i>Sair</a></li>

    </ul>

    <ul class="side-nav" id="mobile-demo">
      <li><div class="userView">
        <div class="background">
          <img src="img/office.jpg">
        </div>
        <a href="#!user"><img class="circle" src="conta/f/<?php  echo $resp2['urlavatar']; ?>"></a>
        <a href="#!name"><span class="white-text name"><?php  echo $resp2['nome']; ?></span></a>
        <a href="#!email"><span class="white-text email"><?php  echo $resp2['email']; ?></span></a>
      </div></li>

         <a href="#modal1" class="waves-effect waves-light btn"><i class="material-icons left">search</i>O que procura?</a>

    <li><div class="divider"></div></li>

    <li><a href="conta/f"><i class="material-icons left">dashboard</i>Minha Conta</a></li>
   <li><a href="conta/f/sair.php"><i class="material-icons left">trending_flat</i>Sair</a></li>
    
    <li><div class="divider"></div></li>
    <li><a class="subheader">Subheader</a></li>

    <!-- <li>   <a class="waves-effect waves-light btn" href="#modal1">Modal</a></li> -->


  </ul>




</div>
</nav>
<?php

}else{
  ?>
  <nav>
    <div class="nav-wrapper">
     <a href="index.php" class="brand-logo center"><img src="img/iconfree.png" style="max-width:50px;padding:3px;"></a>
     <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
     <ul class="left hide-on-med-and-down ">
      <li>
         <a href="#modal1" class="waves-effect waves-light btn"><i class="material-icons left">search</i>O que procura?</a>
     </li>
   </ul>

   <ul class="right hide-on-med-and-down">
    <li><a href="login"><i class="material-icons left">launch</i>Login</a></li>
    <li><a href="cadastro"><i class="material-icons left">mode_edit</i>Cadastre-se</a></li>
  </ul>

  <ul class="side-nav" id="mobile-demo">


      
        <a href="#modal1" class="waves-effect waves-light btn"><i class="material-icons left">search</i>O que procura?</a>
   

  <li><div class="divider"></div></li>
  <li><a href="login"><i class="material-icons left">launch</i>Login</a></li>
  <li><a href="cadastro"><i class="material-icons left">mode_edit</i>Cadastre-se</a></li>



</ul>
<!-- Dropdown Structure -->




</div>
</nav>
<?php
}

?>
<script type="text/javascript">
$(document).ready(function () {$('input.autocomplete').autocomplete({
  data: {
    "Apple": null,
    "Microsoft": null,
    "Google": null
  }});});

</script>
