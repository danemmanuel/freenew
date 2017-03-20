<?php 

require_once '../class/servicos.class.php';

$idservico=$_GET['idservico'];

$servicos=new servicos();
$servicos->setId($idservico);
$servicos->apagar();

header("location:../../f/servicosoferecidos.php");

 ?>