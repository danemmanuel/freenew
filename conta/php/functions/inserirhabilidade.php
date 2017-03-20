<?php 

require_once '../class/habilidades.class.php';

$habilidades= new habilidades();

$idfreelancer=$_POST['idfreelancer'];
$nomehabilidade=$_POST['nomehabilidade'];
$nivel=$_POST['nivel'];

if ($nivel=="Selecione...") {
	echo "
	<script>
	alert('É necessário inserir um nivel para a habilidade!');
	window.location='../../f/habilidades.php'; 
	</script>

	";
}
if($nivel!="Selecione..."){
	$habilidades->setIdFreelancer($idfreelancer);
	$habilidades->setNomehabilidade($nomehabilidade);
	$habilidades->setNivel($nivel);
	$habilidades->inserir();
	echo "
	<script>
	window.location='../../f/habilidades.php'; 
	</script>

	";
}



?>