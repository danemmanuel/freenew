<?php 

$id=$_GET['id'];

require_once '../class/mensagem.class.php';
$mensagem= new mensagem();



$mensagem->setIDChamado($id);
$all=$mensagem->buscarTodos();

foreach ($all as $row) { 

	if ($row['tipo']==1) {
		echo "<b>Suporte:</b>";
		echo $row['mensagem']."<br>";
	}elseif ($row['tipo']==0) {
		echo "<b>Cliente:</b>";
		echo $row['mensagem']."<br>";
	}


	


} 

?>