<?php 

require_once '../../conta/php/class/freelancer.class.php';

$email=$_POST['email'];
$senha=$_POST['senha'];

$freela=new freelancer();



$freela->setEmail($email);
$freela->setSenha($senha);
$busca=$freela->login();

$idfreelancer=$busca['idfreelancer'];

$ativo=$busca['ativo'];



if (isset($idfreelancer)) {
	

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

		$_SESSION['idfreelancer'] = $idfreelancer;
		header("location:../../");
	}


}else{
	echo "
		<script>
		alert('Usuário não cadastrado!');
		window.location='../../login/f'; 
		</script>

		";
}



?>