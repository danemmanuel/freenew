<?php

$contratante=$_GET['contratante'];
$contratado=$_GET['contratado'];
$servico=$_GET['servico'];
$valor=$_GET['valor'];


$documentTemplate = '
<!doctype html> 
<html> 
<head>
</head> 
<body>
</body> 
</html>';

require_once("dompdf/dompdf_config.inc.php");

if ( get_magic_quotes_gpc() )
	$documentTemplate = stripslashes($documentTemplate);

$dompdf = new DOMPDF();
$dompdf->load_html($documentTemplate);
$dompdf->set_paper("A4", "portrail");
$dompdf->render();

// enviar documento destino para download
$dompdf->stream(
	"saida.pdf", /* Nome do arquivo de saída */
	array(
		"Attachment" => false /* Para download, altere para true */
		)
	);

exit(0);

?>
