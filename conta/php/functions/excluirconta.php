<?php 
require_once '../class/freelancer.class.php';
//header("location:../../../index.php");

$idfreelancer=$_POST['idfreelancer'];

$freelancer = new freelancer();
$freelancer->setId($idfreelancer);
$freelancer->excluirConta();

session_start();
session_destroy();
header("location:../../f/");

?>