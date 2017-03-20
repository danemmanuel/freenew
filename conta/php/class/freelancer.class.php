<?php

require_once 'conexao.class.php';

class freelancer{

	private $idfreelancer;
	private $nome;
	private $email;
	private $telefone;
	private $sexo;
	private $datanascimento;
	private $resumo;
	private $senha;
	private $urlavatar;
	private $facebook;
	private $linkedin;
	private $insta;


	public function getId(){
		return $this->idfreelancer;
	}
	public function setId($idfreelancer){
		if(!empty($idfreelancer)) $this->idfreelancer=$idfreelancer;
	}
	public function getNome(){
		return $this->nome;
	}
	public function setNome($nome){
		$this->nome=$nome;
	}
	public function getTelefone(){
		return $this->telefone;
	}
	public function setTelefone($telefone){
		$this->telefone=$telefone;
	}
	public function getEmail(){
		return $this->email;
	}
	public function setEmail($email){
		$this->email=$email;
	}
	public function getSexo(){
		return $this->sexo;
	}
	public function setSexo($sexo){
		$this->sexo=$sexo;
	}
	public function getDatanascimento(){
		return $this->datanascimento;
	}
	public function setDatanascimento($datanascimento){
		$this->datanascimento=$datanascimento;
	}
	public function getResumo(){
		return $this->resumo;
	}
	public function setResumo($resumo){
		$this->resumo=$resumo;
	}
	public function getSenha(){
		return $this->senha;
	}
	public function setSenha($senha){
		$this->senha=$senha;
	}	
	public function getUrlAvatar(){
		return $this->urlavatar;
	}
	public function setUrlAvatar($urlavatar){
		$this->urlavatar=$urlavatar;
	}
	public function getLinkfacebook(){
		return $this->facebook;
	}
	public function setLinkfacebook($facebook){
		$this->facebook=$facebook;
	}
	public function getLinkedin(){
		return $this->linkedin;
	}
	public function setLinkedin($linkedin){
		$this->linkedin=$linkedin;
	}
	public function getInsta(){
		return $this->insta;
	}
	public function setInsta($insta){
		$this->insta=$insta;
	}
	public function inserir(){
		
		
		$conect = new conexao();
		try{
			$stmt = $conect->conn->prepare(
				"INSERT INTO freelancer(nome,email,senha,ativo,urlavatar)
				VALUES(:nome,:email,:senha,'1','avatar/default.png')");
			$stmt->bindValue(":nome",$this->getNome());
			$stmt->bindValue(":email",$this->getEmail());
			$stmt->bindValue(":senha",$this->getSenha());
			return $stmt->execute();
		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}
	public function alterarAvatar(){
		
		$conect = new conexao();
		try{
			$stmt = $conect->conn->prepare(
				"UPDATE freelancer set urlavatar=:urlavatar where idfreelancer=:idfreelancer");
			$stmt->bindValue(":idfreelancer",$this->getId());
			$stmt->bindValue(":urlavatar",$this->getUrlAvatar());
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
				sexo=:sexo,datanascimento=:datanascimento where idfreelancer=:idfreelancer");
			$stmt->bindValue(":idfreelancer",$this->getId());
			$stmt->bindValue(":nome",$this->getNome());
			$stmt->bindValue(":telefone",$this->getTelefone());
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
				"UPDATE freelancer set senha=:senha where idfreelancer=:idfreelancer");
			$stmt->bindValue(":idfreelancer",$this->getId());
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
				"UPDATE freelancer set resumo=:resumo where idfreelancer=:idfreelancer");
			$stmt->bindValue(":idfreelancer",$this->getId());
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
				"UPDATE freelancer SET ativo='0' where idfreelancer=:idfreelancer");
			$stmt->bindValue(":idfreelancer",$this->getId());
			return $stmt->execute();

		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}
	public function apagar(){
		$conect = new conexao();
		try{
			$stmt = $conect->conn->prepare(
				"DELETE from clientes where idfreelancer=:idfreelancer");
			$stmt->bindValue(":idfreelancer",$this->getId());
			return $stmt->execute();
			
		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}
	public function buscarTodos(){
		$conect = new conexao();
		try{
			$stmt = $conect->conn->prepare(
				"SELECT * from freelancer  where ativo='1' ORDER BY idfreelancer DESC LIMIT 4");
			$stmt->execute();
			$r=$stmt->fetchAll();
			$resposta= array();
			
			foreach ($r as $row) {
				$temp= array(
					"idfreelancer"=>$row['idfreelancer'],
					"nome"=>$row['nome'],
					"email"=>$row['email'],
					"resumo"=>$row['resumo'],
					"sexo"=>$row['sexo'],
					"urlavatar"=>$row['urlavatar'],
					"telefone"=>$row['telefone']);
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
				"SELECT * from freelancer  where ativo='1' and idfreelancer=:idfreelancer ORDER BY idfreelancer DESC LIMIT 3");
			$stmt->bindValue(":idfreelancer",$this->getId());
			$stmt->execute();
			$r=$stmt->fetchAll();
			$resposta= array();
			
			foreach ($r as $row) {
				$temp= array(
					"idfreelancer"=>$row['idfreelancer'],
					"nome"=>$row['nome'],
					"email"=>$row['email'],
					"resumo"=>$row['resumo'],
					"sexo"=>$row['sexo'],
					"urlavatar"=>$row['urlavatar'],
					"telefone"=>$row['telefone']);
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
				"SELECT * from freelancer  where ativo='1' and idfreelancer=:idfreelancer");
			$stmt->bindValue(':idfreelancer',$this->getId());
			$stmt->execute();
			$r=$stmt->fetchAll();
			$resposta= array();
			
			foreach ($r as $row) {
				$temp= array(
					"idfreelancer"=>$row['idfreelancer'],
					"nome"=>$row['nome'],
					"resumo"=>$row['resumo'],
					"email"=>$row['email'],
					"sexo"=>$row['sexo'],
					"urlavatar"=>$row['urlavatar'],
					"telefone"=>$row['telefone']);
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
					"SELECT * from freelancer");

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
						"select * from freelancer where idfreelancer=:idfreelancer and ativo='1'");
					$stmt->bindValue(':idfreelancer',$this->getId());
					$stmt->execute();
					$row=$stmt->fetch();
					$r= array(
						"idfreelancer"=>$row['idfreelancer'],
						"nome"=>$row['nome'],
						"telefone"=>$row['telefone'],
						"email"=>$row['email'],
						"sexo"=>$row['sexo'],
						"datanascimento"=>$row['datanascimento'],
						"resumo"=>$row['resumo'],
						"facebook"=>$row['linkfacebook'],
						"linkedin"=>$row['linkedin'],
						"insta"=>$row['insta'],
						"urlavatar"=>$row['urlavatar'],
						"senha"=>$row['senha']);
					return $r;
				}catch(PDOException $e){
					echo $e->getMessage();
				}
			}

			public function verificarUser(){
				$conect = new conexao();
				try{
					$stmt = $conect->conn->prepare(
						"select * from freelancer where email=:email");
					$stmt->bindValue(':email',$this->getEmail());
					$stmt->execute();
					$row=$stmt->fetch();
					$r= array(
						"idfreelancer"=>$row['idfreelancer'],
						"email"=>$row['email']);
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
						"idfreelancer"=>$row['idfreelancer'],
						"ativo"=>$row['ativo']);
					return $r;
				}catch(PDOException $e){
					echo $e->getMessage();
				}
			}

			public function alterarLinks(){
				$conect = new conexao();
				try{
					$stmt = $conect->conn->prepare(
						"UPDATE freelancer set linkfacebook=:linkfacebook where idfreelancer=:idfreelancer");
					$stmt->bindValue(":idfreelancer",$this->getId());
					$stmt->bindValue(":linkfacebook",$this->getLinkfacebook());
					return $stmt->execute();
				}catch(PDOException $e){
					echo $e->getMessage();
				}
			}

			public function alterarLinkedin(){
				$conect = new conexao();
				try{
					$stmt = $conect->conn->prepare(
						"UPDATE freelancer set linkedin=:linkedin where idfreelancer=:idfreelancer");
					$stmt->bindValue(":idfreelancer",$this->getId());
					$stmt->bindValue(":linkedin",$this->getLinkedin());
					return $stmt->execute();
				}catch(PDOException $e){
					echo $e->getMessage();
				}
			}

			public function alterarInsta(){
				$conect = new conexao();
				try{
					$stmt = $conect->conn->prepare(
						"UPDATE freelancer set insta=:insta where idfreelancer=:idfreelancer");
					$stmt->bindValue(":idfreelancer",$this->getId());
					$stmt->bindValue(":insta",$this->getInsta());
					return $stmt->execute();
				}catch(PDOException $e){
					echo $e->getMessage();
				}
			}


			
		}
		?>
