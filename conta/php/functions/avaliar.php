<?php 

require_once '../class/avaliacao.class.php';
require_once '../class/mensagem.class.php';

$avaliacao= new avaliacao();
$mensagem= new mensagem();

$id=$_POST['idmensagem'];
$idfreelancer=$_POST['idfreelancer'];
$idcliente=$_POST['idcliente'];
$comentario=$_POST['comentario'];
$fb=$_POST['fb'];

$mensagem->setIdMensagem($id);
$mensagem->apagar();

$avaliacao->setIdAvaliacao($id);
$avaliacao->setIdFreelancer($idfreelancer);
$avaliacao->setIdCliente($idcliente);
$avaliacao->setComentario($comentario);
$avaliacao->setAvaliacao($fb);
$avaliacao->inserir();

header("location:../../c/projetos.php");






?>