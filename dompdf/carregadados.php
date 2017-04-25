<?php 
if (isset($_GET['id'])) {
	$id=$_GET['id'];
}
require_once '../conta/php/class/freelancer.class.php';

$freelancer= new freelancer();

$freelancer->setId($id);
$respfreelancer = $freelancer->buscarId();


$nomefreelancer = $respfreelancer['nome'];

$documentTemplate='<!doctype html> 
<html> 
<head>
</head> 
<body>

<div class="titulo center">'.$nomefreelancer.'</div>
</body> 
</html>';

require_once("dompdf/autoload.inc.php");


$dompdf=new DOMPDF();
$dompdf->load_html($documentTemplate);
$dompdf->set_paper("A4", "portrail");
$dompdf->render();

$f;
$l;
if(headers_sent($f,$l))
{
	echo $f,'<br/>',$l,'<br/>';
	die('now detect line');
}

$dompdf->stream("freelancer.pdf", 
	array("Attachment"=>false));

exit(0);

?>