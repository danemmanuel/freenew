<?php

session_start();
require_once '../class/cliente.class.php';
$idusuario=$_SESSION['usuario'];
$nome=$_POST['nome'];
$telefone=$_POST['telefone'];
$email=$_POST['email'];
$endereco=$_POST['endereco'];


$cliente1 = new cliente();
$cliente1->setIdUsuario($idusuario);
$cliente1->setNome($nome);
$cliente1->setTelefone($telefone);
$cliente1->setEmail($email);
$cliente1->setEndereco($endereco);
$cliente1->inserir();


header("location:../clientes.php");

?>