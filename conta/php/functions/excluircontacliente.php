<?php 
require_once '../class/cliente.class.php';
//header("location:../../../index.php");

$idcliente=$_POST['idcliente'];

$cliente = new cliente();
$cliente->setId($idcliente);
$cliente->excluirConta();

session_start();
session_destroy();
header("location:../../c/");

?>