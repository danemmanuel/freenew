<?php 

require_once '../class/areaatuacao.class.php';

$idareaatuacao=$_GET['idareaatuacao'];

$areaatuacao=new areaatuacao();
$areaatuacao->setId($idareaatuacao);
$areaatuacao->apagar();

header("location:../../f/perfilprofissional.php");

 ?>