<?php 

require_once '../class/freelancer.class.php';

$freelancer= new freelancer();

$idfreelancer=$_POST['idfreelancer'];
$insta=$_POST['insta'];

echo $idfreelancer;


$freelancer->setId($idfreelancer);
$freelancer->setInsta($insta);
$freelancer->alterarInsta();

header("location:../../f/links.php");





?>