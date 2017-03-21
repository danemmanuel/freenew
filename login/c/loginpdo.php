<?php 

require_once '../../conta/php/class/cliente.class.php';

$email=$_POST['email'];
$senha=$_POST['senha'];

$cliente=new cliente();


$cliente->setEmail($email);
$cliente->setSenha($senha);
$busca=$cliente->login();

$idcliente=$busca['idcliente'];

$ativo=$busca['ativo'];



if (isset($idcliente)) {
	

	session_start();

	if($ativo=="0"){
		echo "
		<script>
		alert('Esta conta foi excluida! Cadastre-se com outro email');
		window.location='../../cadastro/f'; 
		</script>

		";
	}

	elseif($ativo=="1"){

		$_SESSION['idcliente'] = $idcliente;
		header("location:../../");
	}


}else{
	echo "
		<script>
		alert('Usuário não cadastrado!');
		window.location='../../login/c'; 
		</script>

		";
}



?>