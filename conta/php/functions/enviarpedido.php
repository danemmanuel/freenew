<?php 

 require_once '../class/mensagem.class.php';


$idfreelancer=$_POST['idfreelancer'];
$nome=$_POST['nome'];
$email=$_POST['email'];
$servico=$_POST['servico'];
$msg=$_POST['msg'];

 $mensagem= new mensagem();
 $mensagem->setIdFreelancer($idfreelancer);
 $mensagem->setNome($nome);
 $mensagem->setEmail($email);
 $mensagem->setServico($servico);
 $mensagem->setMensagem($msg);
 $mensagem->inserir();

 ?>