<?php


require_once(realpath(dirname(__FILE__) . '/../../../config.php'));

class conexao{
	private $host= servidor;
	private $user=usuario;
	private $db=banco;
	private $pass=senha;
	public $conn;

	public function __construct(){
		try{
			$this->conn = new PDO("mysql:host=".$this->host.";dbname=".$this->db,$this->user,$this->pass);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return true;
		}catch(PDOException $e){
			echo "ERRO: ".$e->getMessage();
			return false;
		}
	}
}
?>