<?php

require_once 'conexao.class.php';

class areaatuacao{

	private $idareaatuacao;
	private $idfreelancer;
	private $nomearea;
	private $anosexperiencia;
	private $nivelprofissional;
	




	public function getId(){
		return $this->idareaatuacao;
	}
	public function setId($idareaatuacao){
		if(!empty($idareaatuacao)) $this->idareaatuacao=$idareaatuacao;
	}
	public function getIdFreelancer(){
		return $this->idfreelancer;
	}
	public function setIdFreelancer($idfreelancer){
		$this->idfreelancer=$idfreelancer;
	}
	public function getNomearea(){
		return $this->nomearea;
	}
	public function setNomearea($nomearea){
		$this->nomearea=$nomearea;
	}
	public function getAnosexperiencia(){
		return $this->anosexperiencia;
	}
	public function setAnosexperiencia($anosexperiencia){
		$this->anosexperiencia=$anosexperiencia;
	}
	public function getNivelprofissional(){
		return $this->nivelprofissional;
	}
	public function setNivelprofissional($nivelprofissional){
		$this->nivelprofissional=$nivelprofissional;
	}
	
	
	public function inserir(){
		
		
		$conect = new conexao();
		try{
			$stmt = $conect->conn->prepare(
				"INSERT INTO areaatuacao(idfreelancer,anosexperiencia,nomearea,nivelprofissional)
				VALUES(:idfreelancer,:anosexperiencia,:nomearea,:nivelprofissional)");
			$stmt->bindValue(":idfreelancer",$this->getIdFreelancer());
			$stmt->bindValue(":anosexperiencia",$this->getAnosexperiencia());
			$stmt->bindValue(":nomearea",$this->getNomearea());
			$stmt->bindValue(":nivelprofissional",$this->getNivelprofissional());
			return $stmt->execute();
		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}
	public function alterar(){
		
		$conect = new conexao();
		try{
			$stmt = $conect->conn->prepare(
				"UPDATE areaatuacao set anosexperiencia=:anosexperiencia,nomearea=:nomearea,nivelprofissional=:nivelprofissional where idareaatuacao=:idareaatuacao");
			$stmt->bindValue(":idareaatuacao",$this->getId());
			$stmt->bindValue(":anosexperiencia",$this->getAnosexperiencia());
			$stmt->bindValue(":nomearea",$this->getNomearea());
			$stmt->bindValue(":nivelprofissional",$this->getNivelprofissional());
			return $stmt->execute();
		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}
	public function alterarFreelancer(){
		$conect = new conexao();
		try{
			$stmt = $conect->conn->prepare(
				"UPDATE freelancer set nome=:nome,telefone=:telefone,
				email=:email,sexo=:sexo,datanascimento=:datanascimento where idareaatuacao=:idareaatuacao");
			$stmt->bindValue(":idareaatuacao",$this->getId());
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
		    "UPDATE freelancer set senha=:senha where idareaatuacao=:idareaatuacao");
		   $stmt->bindValue(":idareaatuacao",$this->getId());
		   $stmt->bindValue(":senha",$this->getSenha());
		   return $stmt->execute();
		  }catch(PDOException $e){
		   echo $e->getMessage();
		  }
		 }

	public function excluirConta(){
		$conect = new conexao();
		try{
			$stmt = $conect->conn->prepare(
				"DELETE from freelancer where idareaatuacao=:idareaatuacao");
			$stmt->bindValue(":idareaatuacao",$this->getId());
			return $stmt->execute();
			
		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}
	public function apagar(){
		$conect = new conexao();
		try{
			$stmt = $conect->conn->prepare(
				"DELETE from areaatuacao where idareaatuacao=:idareaatuacao");
			$stmt->bindValue(":idareaatuacao",$this->getId());
			return $stmt->execute();
			
		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}
	public function buscarTodos(){
		$conect = new conexao();
		try{
			$stmt = $conect->conn->prepare(
				"SELECT * from areaatuacao where idfreelancer=:idfreelancer");
			$stmt->bindValue(":idfreelancer",$this->getIdFreelancer());
			$stmt->execute();
			$r=$stmt->fetchAll();
			$resposta= array();
			foreach ($r as $row) {
				$temp= array(
					"idareaatuacao"=>$row['idareaatuacao'],
					"idfreelancer"=>$row['idfreelancer'],
					"anosexperiencia"=>$row['anosexperiencia'],
					"nomearea"=>$row['nomearea'],
					"nivelprofissional"=>$row['nivelprofissional']);
				array_push($resposta, $temp);
			}
			return $resposta;
		}catch(PDOException $e){
			echo $e->getMessage();
		}}

		public function buscarCategoria(){
		$conect = new conexao();
		try{
			$stmt = $conect->conn->prepare(
				"SELECT * from areaatuacao where nomearea=:nomearea");
			$stmt->bindValue(":nomearea",$this->getNomearea());
			$stmt->execute();
			$r=$stmt->fetchAll();
			$resposta= array();
			foreach ($r as $row) {
				$temp= array(
					"idfreelancer"=>$row['idfreelancer'],
					"anosexperiencia"=>$row['anosexperiencia'],
					"nomearea"=>$row['nomearea'],
					"nivelprofissional"=>$row['nivelprofissional']);
				array_push($resposta, $temp);
			}
			return $resposta;
		}catch(PDOException $e){
			echo $e->getMessage();
		}}

		public function buscar(){
		$conect = new conexao();
		try{
			$stmt = $conect->conn->prepare(
				"SELECT * from areaatuacao where idfreelancer=:idfreelancer ORDER BY idareaatuacao DESC LIMIT 1");
			$stmt->bindValue(":idfreelancer",$this->getIdFreelancer());
			$stmt->execute();
			$r=$stmt->fetchAll();
			$resposta= array();
			foreach ($r as $row) {
				$temp= array(
					"idareaatuacao"=>$row['idareaatuacao'],
					"idfreelancer"=>$row['idfreelancer'],
					"anosexperiencia"=>$row['anosexperiencia'],
					"nomearea"=>$row['nomearea'],
					"nivelprofissional"=>$row['nivelprofissional']);
				array_push($resposta, $temp);
			}
			return $resposta;
		}catch(PDOException $e){
			echo $e->getMessage();
		}}
		public function buscarAll(){
		$conect = new conexao();
		try{
			$stmt = $conect->conn->prepare(
				"SELECT * from areaatuacao where idfreelancer=:idfreelancer ORDER BY idareaatuacao");
			$stmt->bindValue(":idfreelancer",$this->getIdFreelancer());
			$stmt->execute();
			$r=$stmt->fetchAll();
			$resposta= array();
			foreach ($r as $row) {
				$temp= array(
					"idareaatuacao"=>$row['idareaatuacao'],
					"idfreelancer"=>$row['idfreelancer'],
					"anosexperiencia"=>$row['anosexperiencia'],
					"nomearea"=>$row['nomearea'],
					"nivelprofissional"=>$row['nivelprofissional']);
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
						"select * from freelancer where idareaatuacao=:idareaatuacao");
					$stmt->bindValue(':idareaatuacao',$this->getId());
					$stmt->execute();
					$row=$stmt->fetch();
					$r= array(
						"idareaatuacao"=>$row['idareaatuacao'],
						"nome"=>$row['nome'],
						"telefone"=>$row['telefone'],
						"email"=>$row['email'],
						"areaatuacao"=>$row['areaatuacao'],
						"sexo"=>$row['sexo'],
						"datanascimento"=>$row['datanascimento'],
						"resumo"=>$row['resumo'],
						"nivelprofissional"=>$row['nivelprofissional'],
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
						"select * from freelancer where email=:email and senha=:senha");
					$stmt->bindValue(':email',$this->getEmail());
					$stmt->bindValue(':senha',$this->getSenha());
					$stmt->execute();
					$row=$stmt->fetch();
					$r= array(
						"idareaatuacao"=>$row['idareaatuacao']);
					return $r;
				}catch(PDOException $e){
					echo $e->getMessage();
				}
			}
			
		}
		?>
