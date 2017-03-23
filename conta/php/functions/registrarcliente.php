<?php 
require_once '../class/cliente.class.php';
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$telefone = $_POST['telefone'];

$cliente = new cliente();
$cliente -> setNome($nome);
$cliente -> setEmail($email);
$cliente -> setSenha($senha);
$cliente -> setTelefone($telefone);
$cliente -> inserir();
header("location:../../../login/c");

 ?>