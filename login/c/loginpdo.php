<?php 

require_once '../../conta/php/class/cliente.class.php';


$email=$_POST['email'];
$senha=$_POST['senha'];

$cliente=new cliente();

$cliente->setEmail($email);
$cliente->setSenha($senha);
$busca=$cliente->login();

$idcliente=$busca['idcliente'];


session_start();

$_SESSION['idcliente'] = $idcliente;
$_SESSION['email'] = $email;
header("location:../../conta/c");

?>