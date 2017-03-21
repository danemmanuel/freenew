<?php 

 require_once '../class/mensagem.class.php';


 $idfreelancer=$_POST['idfreelancer'];
$nome=$_POST['nome'];
$email=$_POST['email'];
$telefone=$_POST['telefone'];
$servico=$_POST['servico'];
$msg=$_POST['msg'];

 $mensagem= new mensagem();
 $mensagem->setIdFreelancer($idfreelancer);
 $mensagem->setNome($nome);
 $mensagem->setEmail($email);
 $mensagem->setServico($servico);
 $mensagem->setMensagem($msg);
  $mensagem->setTelefone($telefone);
 $mensagem->inserir();
 header("location:../../../index.php");

 ?>