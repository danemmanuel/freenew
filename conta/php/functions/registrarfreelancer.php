<?php 
require_once '../class/freelancer.class.php';
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$freelancer = new freelancer();
$freelancer -> setNome($nome);
$freelancer -> setEmail($email);
$freelancer -> setSenha($senha);


$result=$freelancer->verificarUser();

$verificaEmail = $result['email'];

if ($verificaEmail==$email) {
	echo "
	<script>
	alert('Este email já é cadastrado no F.ree!');
	window.location='../../../cadastro/f'; 
	</script>

	";
}else{

	
	$freelancer -> inserir();
	echo "
	<script>
	window.location='../../../login/f'; 
	</script>

	";

}


?>