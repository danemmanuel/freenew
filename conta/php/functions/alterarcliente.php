<?php 

require_once '../class/cliente.class.php';

$cliente= new cliente();

$idcliente=$_POST['idcliente'];
$nomecliente=$_POST['nomecliente'];
$emailcliente=$_POST['emailcliente'];
$datanascimento=$_POST['datanascimento'];
$sexo=$_POST['sexo'];
$telefone=$_POST['telefone'];

$datanova = date("Y-m-d", strtotime($datanascimento));

$array=explode("-",$datanova);

if (empty($telefone)) {
	echo "
	<script>
	alert('Insira seu telefone');
	window.location='../../c/'; 
	</script>

	";
	
}else{

	if ($array[0]>=2002) {
		echo "
		<script>
		alert('É necessário possuir mais de 15 anos');
		window.location='../../c/'; 
		</script>

		";
	}
	else{

		$cliente->setId($idcliente);
		$cliente->setNome($nomecliente);
		$cliente->setEmail($emailcliente);
		$cliente->setDatanascimento($datanova);
		$cliente->setSexo($sexo);
		$cliente->setTelefone($telefone);
		$cliente->alterarcliente();
		echo "<script>
		alert('Dados atualizados!');
		window.location='../../c/'; 
		</script>";
	}
}

#header("location:../../c");



?>