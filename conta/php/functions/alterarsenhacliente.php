<?php 
require_once '../class/cliente.class.php';
header("location:../../c/alterarsenha.php");

$idcliente=$_POST['idcliente'];
$senhaantiga=$_POST['antigasenha'];
$novasenha=$_POST['novasenha'];

$cliente = new cliente();
$cliente->setId($idcliente);
$cliente->setSenha($novasenha);
$cliente->alterarSenha();


 ?>