<?php 

require_once '../class/areaatuacao.class.php';

$areaatuacao= new areaatuacao();

$idfreelancer=$_POST['idfreelancer'];
$nomearea=$_POST['nomearea'];
$nivelprofissional=$_POST['nivelprofissional'];
$anosexperiencia=$_POST['anosexperiencia'];



if ($nomearea=="Selecione...") {
	echo "
	<script>
	alert('É necessário inserir uma área de atuação!');
	window.location='../../f/perfilprofissional.php'; 
	</script>

	";
}
if ($nivelprofissional=="Selecione...") {
	echo "
	<script>
	alert('É necessário inserir um nivel profissional!');
	window.location='../../f/perfilprofissional.php'; 
	</script>

	";
}
if (($nomearea!="Selecione...") and ($nivelprofissional!="Selecione...")){

	$areaatuacao->setIdFreelancer($idfreelancer);
	$areaatuacao->setNomearea($nomearea);
	$areaatuacao->setNivelprofissional($nivelprofissional);
	$areaatuacao->setAnosexperiencia($anosexperiencia);
	$areaatuacao->inserir();

	echo "
	<script>
	window.location='../../f/perfilprofissional.php'; 
	</script>

	";
}



?>