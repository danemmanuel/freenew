<?php 

require_once '../class/freelancer.class.php';

$freelancer= new freelancer();

$idfreelancer=$_POST['idfreelancer'];
$resumo=$_POST['resumo'];

$freelancer->setId($idfreelancer);
$freelancer->setResumo($resumo);
$freelancer->alterarResumo();

header("location:../../f/resumo.php");

 ?>