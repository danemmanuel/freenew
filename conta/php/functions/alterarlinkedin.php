<?php 

require_once '../class/freelancer.class.php';

$freelancer= new freelancer();

$idfreelancer=$_POST['idfreelancer'];
$linkedin=$_POST['linkedin'];

echo $idfreelancer;



$freelancer->setId($idfreelancer);
$freelancer->setLinkedin($linkedin);
$freelancer->alterarLinkedin();

header("location:../../f/links.php");





?>