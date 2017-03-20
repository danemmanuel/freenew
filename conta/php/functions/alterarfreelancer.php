<?php 

require_once '../class/freelancer.class.php';

$freelancer= new freelancer();

$idfreelancer=$_POST['idfreelancer'];
$nomefreelancer=$_POST['nomefreelancer'];
$datanascimento=$_POST['datanascimento'];
$sexo=$_POST['sexo'];
$telefone=$_POST['telefone'];

$datanova = date("Y-m-d", strtotime($datanascimento));

$array=explode("-",$datanova);

if (empty($telefone)) {
	echo "
	<script>
	alert('Insira seu telefone');
	window.location='../../f/'; 
	</script>

	";
	
}else{

	if ($array[0]>=2002) {
		echo "
		<script>
		alert('É necessário possuir mais de 15 anos');
		window.location='../../f/'; 
		</script>

		";
	}


	else{


		$freelancer->setId($idfreelancer);
		$freelancer->setNome($nomefreelancer);
		$freelancer->setDatanascimento($datanova);
		$freelancer->setSexo($sexo);
		$freelancer->setTelefone($telefone);
		$freelancer->alterarFreelancer();
		echo "
		<script>
		window.location='../../f/'; 
		</script>

		";
	}
}



?>