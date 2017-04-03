<?php 

require_once '../class/mensagem.class.php';

$mensagem= new mensagem();

$id=$_GET['id'];

$mensagem->setIdMensagem($id);
$mensagem->apagar();

header("location:../../f/mensagens.php");


 ?>