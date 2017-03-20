<?php 
require_once '../php/class/cliente.class.php';

$cliente=new cliente();
$idcliente=$_SESSION['idcliente'];
$cliente->setId($idcliente);
$result = $cliente->buscarId();








?>