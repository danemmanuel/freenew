<?php 
session_start(); 
$email = $_POST['email'];
$entrar = $_POST['entrar'];
$senha = $_POST['senha'];
$connect = mysql_connect('localhost','root','');
$db = mysql_select_db('free');
$idusuario=mysql_query("SELECT idfreelancer FROM freelancer where email='$email' AND senha = '$senha'");
if (isset($entrar)) {
   
    $verifica = mysql_query("SELECT * FROM freelancer WHERE email = '$email' AND senha = '$senha'") or die("erro ao selecionar");
    
    if (mysql_num_rows($verifica)<=0){
        header("location:index.php");
        die();
    }else{
        $_SESSION['usuario'] = $idusuario;
        echo $_SESSION['usuario'];
        header('location:../conta');
    }
}
?>


