<?php

require_once 'conexao.class.php';

class habilidades{

	private $idhabilidade;
	private $nomehabilidade;
	private $nivel;
	private $idfreelancer;



	public function getId(){
		return $this->idhabilidade;
	}
	public function setId($idhabilidade){
		if(!empty($idhabilidade)) $this->idhabilidade=$idhabilidade;
	}
	public function getIdFreelancer(){
		return $this->idfreelancer;
	}
	public function setIdFreelancer($idfreelancer){
		if(!empty($idfreelancer)) $this->idfreelancer=$idfreelancer;
	}
	public function getNomehabilidade(){
		return $this->nomehabilidade;
	}
	public function setNomehabilidade($nomehabilidade){
		$this->nomehabilidade=$nomehabilidade;
	}
	public function getNivel(){
		return $this->nivel;
	}
	public function setNivel($nivel){
		$this->nivel=$nivel;
	}

	
	public function inserir(){
		
		
		$conect = new conexao();
		try{
			$stmt = $conect->conn->prepare(
				"INSERT INTO habilidades(idfreelancer,nivel,nomehabilidade)
				VALUES(:idfreelancer,:nivel,:nomehabilidade)");
			$stmt->bindValue(":idfreelancer",$this->getIdFreelancer());
			$stmt->bindValue(":nivel",$this->getnivel());
			$stmt->bindValue(":nomehabilidade",$this->getnomehabilidade());
			return $stmt->execute();
		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}
	public function alterar(){
		
		$conect = new conexao();
		try{
			$stmt = $conect->conn->prepare(
				"UPDATE habilidades set nivel=:nivel,nomehabilidade=:nomehabilidade,preco=:preco,tipo=:tipo where idhabilidade=:idhabilidade");
			$stmt->bindValue(":idhabilidade",$this->getId());
			$stmt->bindValue(":nivel",$this->getnivel());
			$stmt->bindValue(":nomehabilidade",$this->getnomehabilidade());
			$stmt->bindValue(":preco",$this->getPreco());
			$stmt->bindValue(":tipo",$this->getTipo());
			return $stmt->execute();
		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}
	public function buscarAll(){
		$conect = new conexao();
		try{
			$stmt = $conect->conn->prepare(
				"SELECT * from habilidades where idfreelancer=:idfreelancer");
			$stmt->bindValue(":idfreelancer",$this->getIdFreelancer());
			$stmt->execute();
			$r=$stmt->fetchAll();
			$resposta= array();
			foreach ($r as $row) {
				$temp= array(
					"idhabilidade"=>$row['idhabilidade'],
					"idfreelancer"=>$row['idfreelancer'],
					"nomehabilidade"=>$row['nomehabilidade'],
					"nivel"=>$row['nivel']);
				array_push($resposta, $temp);
			}
			return $resposta;
		}catch(PDOException $e){
			echo $e->getMessage();
		}}
	public function alterarFreelancer(){
		$conect = new conexao();
		try{
			$stmt = $conect->conn->prepare(
				"UPDATE freelancer set nome=:nome,telefone=:telefone,
				email=:email,sexo=:sexo,datanascimento=:datanascimento where idhabilidade=:idhabilidade");
			$stmt->bindValue(":idhabilidade",$this->getId());
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
				"UPDATE freelancer set senha=:senha where idhabilidade=:idhabilidade");
			$stmt->bindValue(":idhabilidade",$this->getId());
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
				"DELETE from freelancer where idhabilidade=:idhabilidade");
			$stmt->bindValue(":idhabilidade",$this->getId());
			return $stmt->execute();
			
		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}
	public function apagar(){
		$conect = new conexao();
		try{
			$stmt = $conect->conn->prepare(
				"DELETE from habilidades where idhabilidade=:idhabilidade");
			$stmt->bindValue(":idhabilidade",$this->getId());
			return $stmt->execute();
			
		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}
	public function buscarTodos(){
		$conect = new conexao();
		try{
			$stmt = $conect->conn->prepare(
				"SELECT * from habilidades where idfreelancer=:idfreelancer");
			$stmt->bindValue(":idfreelancer",$this->getIdFreelancer());
			$stmt->execute();
			$r=$stmt->fetchAll();
			$resposta= array();
			foreach ($r as $row) {
				$temp= array(
					"idhabilidade"=>$row['idhabilidade'],
					"idfreelancer"=>$row['idfreelancer'],
					"nivel"=>$row['nivel'],
					"nomehabilidade"=>$row['nomehabilidade']);
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
						"select * from habilidades where idhabilidade=:idhabilidade");
					$stmt->bindValue(':idhabilidade',$this->getId());
					$stmt->execute();
					$row=$stmt->fetch();
					$r= array(
						"idhabilidade"=>$row['idhabilidade'],
						"idfreelancer"=>$row['idfreelancer'],
						"nivel"=>$row['nivel'],
						"nomehabilidade"=>$row['nomehabilidade'],
						"tipo"=>$row['tipo'],
						"preco"=>$row['preco']);
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
						"idhabilidade"=>$row['idhabilidade']);
					return $r;
				}catch(PDOException $e){
					echo $e->getMessage();
				}
			}
			
		}
		?>
