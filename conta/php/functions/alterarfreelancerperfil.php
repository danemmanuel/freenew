<?php 

require_once '../class/freelancer.class.php';

$freelancer= new freelancer();

$idfreelancer=$_POST['idfreelancer'];
$areaatuacao=$_POST['areaatuacao'];
$nivelprofissional=$_POST['nivelprofissional'];
$anosexperiencia=$_POST['anosexperiencia'];


$freelancer->setId($idfreelancer);
$freelancer->setAreaatuacao($areaatuacao);
$freelancer->setNivelProfissional($nivelprofissional);
$freelancer->setAnosExperiencia($anosexperiencia);
$freelancer->alterarDadosProfissionais();

header("location:../../freelancer/perfilprofissional.php");



?>