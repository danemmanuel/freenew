<?php 

require_once '../class/servicos.class.php';

$idservico=$_POST['idservico'];
$nomeservico=$_POST['nomeservico'];
$descricao=$_POST['descricao'];
$preco=$_POST['preco'];

$servicos=new servicos();
$servicos->setId($idservico);
$servicos->setNomeServico($nomeservico);
$servicos->setDescricao($descricao);
$servicos->setPreco($preco);
$servicos->alterar();

header("location:../../freelancer/servicosoferecidos.php");

 ?>