<?php

require_once 'conexao.class.php';

class avaliacao{

	private $idavaliacao;
	private $idfreelancer;
	private $idcliente;
	private $comentario;
	private $avaliacao;



	public function getIdAvaliacao(){
		return $this->idavaliacao;
	}
	public function setIdAvaliacao($idavaliacao){
		if(!empty($idavaliacao)) $this->idavaliacao=$idavaliacao;
	}
	public function getIdFreelancer(){
		return $this->idfreelancer;
	}
	public function setIdFreelancer($idfreelancer){
		$this->idfreelancer=$idfreelancer;
	}
	public function getIdCliente(){
		return $this->idcliente;
	}
	public function setIdCliente($idcliente){
		$this->idcliente=$idcliente;
	}
	public function getComentario(){
		return $this->comentario;
	}
	public function setComentario($comentario){
		$this->comentario=$comentario;
	}
	
	public function getAvaliacao(){
		return $this->avaliacao;
	}
	public function setAvaliacao($avaliacao){
		$this->avaliacao=$avaliacao;
	}
	
	
	public function inserir(){
		
		$conect = new conexao();
		try{
			$stmt = $conect->conn->prepare(
				"INSERT INTO avaliacao(idfreelancer,idcliente,comentario,avaliacao)
				VALUES(:idfreelancer,:idcliente,:comentario,:avaliacao)");
			$stmt->bindValue(":idfreelancer",$this->getIdFreelancer());
			$stmt->bindValue(":idcliente",$this->getIdCliente());
			$stmt->bindValue(":comentario",$this->getComentario());
			$stmt->bindValue(":avaliacao",$this->getAvaliacao());

			return $stmt->execute();
		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}
	public function alterarAvatar(){
		
		$conect = new conexao();
		try{
			$stmt = $conect->conn->prepare(
				"UPDATE cliente set urlavatar=:urlavatar where idavaliacao=:idavaliacao");
			$stmt->bindValue(":idavaliacao",$this->getId());
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
				"UPDATE cliente set comentario=:comentario,telefone=:telefone,
				email=:email,sexo=:sexo,datanascimento=:datanascimento where idavaliacao=:idavaliacao");
			$stmt->bindValue(":idavaliacao",$this->getId());
			$stmt->bindValue(":comentario",$this->getcomentario());
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
				"UPDATE cliente set senha=:senha where idavaliacao=:idavaliacao");
			$stmt->bindValue(":idavaliacao",$this->getId());
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
				"UPDATE cliente set resumo=:resumo where idavaliacao=:idavaliacao");
			$stmt->bindValue(":idavaliacao",$this->getId());
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
				"UPDATE cliente SET ativo='0' where idavaliacao=:idavaliacao");
			$stmt->bindValue(":idavaliacao",$this->getId());
			return $stmt->execute();

		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}
	public function apagar(){
		$conect = new conexao();
		try{
			$stmt = $conect->conn->prepare(
				"UPDATE mensagens SET ativo=0 where idavaliacao=:idavaliacao");
			$stmt->bindValue(":idavaliacao",$this->getidavaliacao());
			return $stmt->execute();
			
		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}
	public function buscarTodosf(){
		$conect = new conexao();
		try{
			$stmt = $conect->conn->prepare(
				"SELECT * from avaliacao where idfreelancer=:idfreelancer");
			$stmt->bindValue(":idfreelancer",$this->getIdFreelancer());
			$stmt->execute();
			$r=$stmt->fetchAll();
			$resposta= array();
			foreach ($r as $row) {
				$temp= array(
					"idavaliacao"=>$row['idavaliacao'],
					"idcliente"=>$row['idcliente'],
					"idfreelancer"=>$row['idfreelancer'],
					"comentario"=>$row['comentario'],
					"avaliacao"=>$row['avaliacao']);
				array_push($resposta, $temp);
			}
			return $resposta;
		}catch(PDOException $e){
			echo $e->getMessage();
		}}

		public function buscarTodosCliente(){
			$conect = new conexao();
			try{
				$stmt = $conect->conn->prepare(
					"SELECT * from mensagens where idcliente=:idcliente and ativo=1");
				$stmt->bindValue(":idcliente",$this->getIdCliente());
				$stmt->execute();
				$r=$stmt->fetchAll();
				$resposta= array();
				foreach ($r as $row) {
					$temp= array(
						"idavaliacao"=>$row['idavaliacao'],
						"idfreelancer"=>$row['idfreelancer'],
						"comentario"=>$row['comentario'],
						"email"=>$row['email'],
						"telefone"=>$row['telefone'],
						"avaliacao"=>$row['avaliacao'],
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
						"SELECT * from mensagens where idfreelancer=:idfreelancer and ativo='1'");
					$stmt->bindValue(":idfreelancer",$this->getIdFreelancer());
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

				public function somarCliente(){
					$conect = new conexao();
					try{
						$stmt = $conect->conn->prepare(
							"SELECT * from mensagens where idcliente=:idcliente and ativo='1'");
						$stmt->bindValue(":idcliente",$this->getIdCliente());
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
								"select * from cliente where idavaliacao=:idavaliacao");
							$stmt->bindValue(':idavaliacao',$this->getId());
							$stmt->execute();
							$row=$stmt->fetch();
							$r= array(
								"idavaliacao"=>$row['idavaliacao'],
								"comentario"=>$row['comentario'],
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
								"idavaliacao"=>$row['idavaliacao']);
							return $r;
						}catch(PDOException $e){
							echo $e->getMessage();
						}
					}

				}
				?>
