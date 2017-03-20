<?php 

require_once '../class/habilidades.class.php';

$idhabilidade=$_GET['id'];

$habilidades=new habilidades();
$habilidades->setId($idhabilidade);
$habilidades->apagar();

header("location:../../f/habilidades.php");

 ?>