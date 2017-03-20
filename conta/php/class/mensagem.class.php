<?php

require_once 'conexao.class.php';

class mensagem{

	private $idmensagem;
	private $idfreelancer;
	private $nome;
	private $email;
	private $servico;
	private $mensagem;


	public function getIdMensagem(){
		return $this->idmensagem;
	}
	public function setIdMensagem($idmensagem){
		if(!empty($idmensagem)) $this->idmensagem=$idmensagem;
	}
	public function getIdFreelancer(){
		return $this->idfreelancer;
	}
	public function setIdFreelancer($idfreelancer){
		$this->idfreelancer=$idfreelancer;
	}
	public function getNome(){
		return $this->nome;
	}
	public function setNome($nome){
		$this->nome=$nome;
	}
	public function getEmail(){
		return $this->email;
	}
	public function setEmail($email){
		$this->email=$email;
	}
	public function getServico(){
		return $this->servico;
	}
	public function setServico($servico){
		$this->servico=$servico;
	}
	public function getMensagem(){
		return $this->mensagem;
	}
	public function setMensagem($mensagem){
		$this->mensagem=$mensagem;
	}
	
	
	public function inserir(){
		
		$conect = new conexao();
		try{
			$stmt = $conect->conn->prepare(
				"INSERT INTO mensagens(idfreelancer,nome,email,servico,mensagem)
				VALUES(:idfreelancer,:nome,:email,:servico,:mensagem)");
			$stmt->bindValue(":idfreelancer",$this->getIdFreelancer());
			$stmt->bindValue(":nome",$this->getNome());
			$stmt->bindValue(":email",$this->getEmail());
			$stmt->bindValue(":servico",$this->getServico());
			$stmt->bindValue(":mensagem",$this->getMensagem());

			return $stmt->execute();
		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}
	public function alterarAvatar(){
		
		$conect = new conexao();
		try{
			$stmt = $conect->conn->prepare(
				"UPDATE cliente set urlavatar=:urlavatar where idmensagem=:idmensagem");
			$stmt->bindValue(":idmensagem",$this->getId());
			$stmt->bindValue(":urlavatar",$this->getUrlAvatar());
			return $stmt->execute();
		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}
	public function alterarcliente(){
		$conect = new conexao();
		try{
			$stmt = $conect->conn->prepare(
				"UPDATE cliente set nome=:nome,telefone=:telefone,
				email=:email,sexo=:sexo,datanascimento=:datanascimento where idmensagem=:idmensagem");
			$stmt->bindValue(":idmensagem",$this->getId());
			$stmt->bindValue(":nome",$this->getNome());
			$stmt->bindValue(":telefone",$this->getTelefone());
			$stmt->bindValue(":email",$this->getEmail());
			$stmt->bindValue(":sexo",$this->getSexo());
			$stmt->bindValue(":datanascimento",$this->getDatanascimento());
			return $stmt->execute();
		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}


	public function alterarSenha(){
		$conect = new conexao();
		try{
			$stmt = $conect->conn->prepare(
				"UPDATE cliente set senha=:senha where idmensagem=:idmensagem");
			$stmt->bindValue(":idmensagem",$this->getId());
			$stmt->bindValue(":senha",$this->getSenha());
			return $stmt->execute();
		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	public function alterarResumo(){
		$conect = new conexao();
		try{
			$stmt = $conect->conn->prepare(
				"UPDATE cliente set resumo=:resumo where idmensagem=:idmensagem");
			$stmt->bindValue(":idmensagem",$this->getId());
			$stmt->bindValue(":resumo",$this->getResumo());
			return $stmt->execute();
		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	public function excluirConta(){
		$conect = new conexao();
		try{
			$stmt = $conect->conn->prepare(
				"UPDATE cliente SET ativo='0' where idmensagem=:idmensagem");
			$stmt->bindValue(":idmensagem",$this->getId());
			return $stmt->execute();
						
		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}
	public function apagar(){
		$conect = new conexao();
		try{
			$stmt = $conect->conn->prepare(
				"DELETE from clientes where idmensagem=:idmensagem");
			$stmt->bindValue(":idmensagem",$this->getId());
			return $stmt->execute();
			
		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}
	public function buscarTodos(){
		$conect = new conexao();
		try{
			$stmt = $conect->conn->prepare(
				"SELECT * from mensagens where idfreelancer=:idfreelancer");
			$stmt->bindValue(":idfreelancer",$this->getIdFreelancer());
			$stmt->execute();
			$r=$stmt->fetchAll();
			$resposta= array();
			foreach ($r as $row) {
				$temp= array(
					"idmensagem"=>$row['idmensagem'],
					"idfreelancer"=>$row['idfreelancer'],
					"nome"=>$row['nome'],
					"email"=>$row['email'],
					"mensagem"=>$row['mensagem'],
					"servico"=>$row['servico']);
				array_push($resposta, $temp);
			}
			return $resposta;
		}catch(PDOException $e){
			echo $e->getMessage();
		}}
		public function somar(){
			$conect = new conexao();
			try{
				$stmt = $conect->conn->prepare(
					"SELECT * from clientes where idusuario=:idusuario");
				$stmt->bindValue(":idusuario",$this->getIdUsuario());
				$stmt->execute();
				$r=$stmt->fetchAll();
				$i=0;
				foreach ($r as $row) {
					$i++;
				}
				
				echo $i;
			}catch(PDOException $e){
				echo $e->getMessage();
			}}
			
			public function buscarId(){
				$conect = new conexao();
				try{
					$stmt = $conect->conn->prepare(
						"select * from cliente where idmensagem=:idmensagem");
					$stmt->bindValue(':idmensagem',$this->getId());
					$stmt->execute();
					$row=$stmt->fetch();
					$r= array(
						"idmensagem"=>$row['idmensagem'],
						"nome"=>$row['nome'],
						"telefone"=>$row['telefone'],
						"email"=>$row['email'],
						"sexo"=>$row['sexo'],
						"datanascimento"=>$row['datanascimento'],
						"urlavatar"=>$row['urlavatar'],
						"senha"=>$row['senha']);
					return $r;
				}catch(PDOException $e){
					echo $e->getMessage();
				}
			}

			public function login(){
				$conect = new conexao();
				try{
					$stmt = $conect->conn->prepare(
						"select * from cliente where email=:email and senha=:senha and ativo='1'");
					$stmt->bindValue(':email',$this->getEmail());
					$stmt->bindValue(':senha',$this->getSenha());
					$stmt->execute();
					$row=$stmt->fetch();
					$r= array(
						"idmensagem"=>$row['idmensagem']);
					return $r;
				}catch(PDOException $e){
					echo $e->getMessage();
				}
			}
			
		}
		?>
