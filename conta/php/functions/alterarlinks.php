<?php 

require_once '../class/freelancer.class.php';

$freelancer= new freelancer();

$idfreelancer=$_POST['idfreelancer'];
$facebook=$_POST['facebook'];

echo $idfreelancer;



$freelancer->setId($idfreelancer);
$freelancer->setLinkfacebook($facebook);
$freelancer->alterarLinks();

header("location:../../f/links.php");





?>