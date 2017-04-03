<?php 
require_once '../class/freelancer.class.php';

//header("location:../../f/alterarsenha.php");

$idfreelancer=$_POST['idfreelancer'];

$senhaantiga=$_POST['antigasenha'];
$novasenha=$_POST['novasenha'];

$freelancer = new freelancer();
$freelancer->setId($idfreelancer);
$resp=$freelancer->buscarId();
echo $resp['senha'];

if ($senhaantiga==$resp['senha']) {
	$freelancer->setSenha($novasenha);
	$freelancer->alterarSenha();

	echo "
	<script type='text/javascript'>
	alert('Sua senha foi alterada!');
	</script>

	<script>
	window.location='../../f/alterarsenha.php'; 
	</script>
	";


}else{

	echo "
	<script type='text/javascript'>
	alert('A senha atual está errada');
	</script>

	<script>
	window.location='../../f/alterarsenha.php'; 
	</script>
	";

}

?>

