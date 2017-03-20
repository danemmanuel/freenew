<?php 
require_once '../php/class/freelancer.class.php';

$freelancer=new freelancer();
$idfreelancer=$_SESSION['idfreelancer'];
$freelancer->setId($idfreelancer);
$result = $freelancer->buscarId();

$nomefreelancer=$result['nome'];
$email=$result['email'];
$telefone=$result['telefone'];
$datanascimento=$result['datanascimento'];
$sexo=$result['sexo'];
$senha=$result['senha'];
$areaatuacao=$result['areaatuacao'];


$datanova = date("d-m-Y", strtotime($datanascimento));


?>