<?php 

require_once '../class/freelancer.class.php';

$freelancer= new freelancer();

$idfreelancer=$_POST['idfreelancer'];
$nomeservico=$_POST['nomeservico'];
$descricao=$_POST['descricao'];
$preco=$_POST['preco'];
$tipo=$_POST['tipo'];


$freelancer->setIdFreelancer($idfreelancer);
$freelancer->setNomeServico($nomeservico);
$freelancer->setDescricao($descricao);
$freelancer->setPreco($preco);
$freelancer->setTipo($tipo);
$freelancer->inserir();

header("location:../../freelancer/freelanceroferecidos.php");

 ?>