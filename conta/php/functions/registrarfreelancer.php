<?php 
require_once '../class/freelancer.class.php';
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$datanascimento = $_POST['datanascimento'];

$telefone = $_POST['telefone'];

$datanova = date("Y-m-d", strtotime($datanascimento));


$freelancer = new freelancer();
$freelancer -> setNome($nome);
$freelancer -> setEmail($email);
$freelancer -> setSenha($senha);
$freelancer -> setDatanascimento($datanova);
$freelancer -> setTelefone($telefone);


$result=$freelancer->verificarUser();

$verificaEmail = $result['email'];

if ($verificaEmail==$email) {
	echo "
	<script>
	alert('Este email já é cadastrado no F.ree!');
	
	</script>

	";
	header("location:../../../login/f/");
}else{

	
	$freelancer -> inserir();
	echo "
	<script>
	window.location='../../../login/f'; 
	</script>

	";

}


?>