<?php 

require_once '../class/areaatuacao.class.php';

$idareaatuacao=$_POST['idarea'];
$nomearea=$_POST['areaatuacao'];
$nivelprofissional=$_POST['nivelprofissional'];
$anosexperiencia=$_POST['anosexperiencia'];


$areaatuacao=new areaatuacao();
$areaatuacao->setId($idareaatuacao);
$areaatuacao->setNomearea($nomearea);
$areaatuacao->setNivelprofissional($nivelprofissional);
$areaatuacao->setAnosexperiencia($anosexperiencia);
$areaatuacao->alterar();

header("location:../../freelancer/perfilprofissional.php");

 ?>