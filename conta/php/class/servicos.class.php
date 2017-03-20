<?php

require_once 'conexao.class.php';

class servicos{

	private $idservico;
	private $descricao;
	private $nomeservico;
	private $preco;
	private $idfreelancer;
	private $tipo;
	private $chave;




	public function getId(){
		return $this->idservico;
	}
	public function setId($idservico){
		if(!empty($idservico)) $this->idservico=$idservico;
	}
	public function getIdFreelancer(){
		return $this->idfreelancer;
	}
	public function setIdFreelancer($idfreelancer){
		if(!empty($idfreelancer)) $this->idfreelancer=$idfreelancer;
	}
	public function getDescricao(){
		return $this->descricao;
	}
	public function setDescricao($descricao){
		$this->descricao=$descricao;
	}
	public function getNomeServico(){
		return $this->nomeservico;
	}
	public function setNomeServico($nomeservico){
		$this->nomeservico=$nomeservico;
	}
	public function getPreco(){
		return $this->preco;
	}
	public function setPreco($preco){
		$this->preco=$preco;
	}
	public function getTipo(){
		return $this->tipo;
	}
	public function setTipo($tipo){
		$this->tipo=$tipo;
	}
	public function getChave(){
		return $this->chave;
	}
	public function setChave($chave){
		$this->chave=$chave;
	}
	
	
	public function inserir(){
		
		
		$conect = new conexao();
		try{
			$stmt = $conect->conn->prepare(
				"INSERT INTO servicos(idfreelancer,nomeservico,descricao,preco,tipo)
				VALUES(:idfreelancer,:nomeservico,:descricao,:preco,:tipo)");
			$stmt->bindValue(":idfreelancer",$this->getIdFreelancer());
			$stmt->bindValue(":nomeservico",$this->getNomeServico());
			$stmt->bindValue(":descricao",$this->getDescricao());
			$stmt->bindValue(":preco",$this->getPreco());
			$stmt->bindValue(":tipo",$this->getTipo());
			return $stmt->execute();
		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}
	public function alterar(){
		
		$conect = new conexao();
		try{
			$stmt = $conect->conn->prepare(
				"UPDATE servicos set nomeservico=:nomeservico,descricao=:descricao,preco=:preco,tipo=:tipo where idservico=:idservico");
			$stmt->bindValue(":idservico",$this->getId());
			$stmt->bindValue(":nomeservico",$this->getNomeServico());
			$stmt->bindValue(":descricao",$this->getDescricao());
			$stmt->bindValue(":preco",$this->getPreco());
			$stmt->bindValue(":tipo",$this->getTipo());
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
				email=:email,sexo=:sexo,datanascimento=:datanascimento where idservico=:idservico");
			$stmt->bindValue(":idservico",$this->getId());
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
				"UPDATE freelancer set senha=:senha where idservico=:idservico");
			$stmt->bindValue(":idservico",$this->getId());
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
				"DELETE from freelancer where idservico=:idservico");
			$stmt->bindValue(":idservico",$this->getId());
			return $stmt->execute();
			
		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}
	public function apagar(){
		$conect = new conexao();
		try{
			$stmt = $conect->conn->prepare(
				"DELETE from servicos where idservico=:idservico");
			$stmt->bindValue(":idservico",$this->getId());
			return $stmt->execute();
			
		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}
	public function buscarTodos(){
		$conect = new conexao();
		try{
			$stmt = $conect->conn->prepare(
				"SELECT * from servicos where idfreelancer=:idfreelancer");
			$stmt->bindValue(":idfreelancer",$this->getIdFreelancer());
			$stmt->execute();
			$r=$stmt->fetchAll();
			$resposta= array();
			foreach ($r as $row) {
				$temp= array(
					"idservico"=>$row['idservico'],
					"idfreelancer"=>$row['idfreelancer'],
					"nomeservico"=>$row['nomeservico'],
					"descricao"=>$row['descricao'],
					"tipo"=>$row['tipo'],
					"preco"=>$row['preco']);
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
				"SELECT * from servicos where idfreelancer=:idfreelancer LIMIT 5");
			$stmt->bindValue(":idfreelancer",$this->getIdFreelancer());
			$stmt->execute();
			$r=$stmt->fetchAll();
			$resposta= array();
			foreach ($r as $row) {
				$temp= array(
					"idservico"=>$row['idservico'],
					"idfreelancer"=>$row['idfreelancer'],
					"nomeservico"=>$row['nomeservico'],
					"descricao"=>$row['descricao'],
					"tipo"=>$row['tipo'],
					"preco"=>$row['preco']);
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
				"SELECT * from servicos where idfreelancer=:idfreelancer");
			$stmt->bindValue(":idfreelancer",$this->getIdFreelancer());
			$stmt->execute();
			$r=$stmt->fetchAll();
			$resposta= array();
			foreach ($r as $row) {
				$temp= array(
					"idservico"=>$row['idservico'],
					"idfreelancer"=>$row['idfreelancer'],
					"nomeservico"=>$row['nomeservico'],
					"descricao"=>$row['descricao'],
					"tipo"=>$row['tipo'],
					"preco"=>$row['preco']);
				array_push($resposta, $temp);
			}
			return $resposta;
		}catch(PDOException $e){
			echo $e->getMessage();
		}}

		public function buscaChave(){
		$conect = new conexao();
		try{
			$stmt = $conect->conn->prepare(
				"SELECT * from servicos where nomeservico like :chave");
			$stmt->bindValue(":chave", '%'. $this->getChave() .'%');
			$stmt->execute();
			$r=$stmt->fetchAll();
			$resposta= array();
			foreach ($r as $row) {
				$temp= array(
					"idservico"=>$row['idservico'],
					"idfreelancer"=>$row['idfreelancer'],
					"nomeservico"=>$row['nomeservico'],
					"descricao"=>$row['descricao'],
					"tipo"=>$row['tipo'],
					"preco"=>$row['preco']);
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
						"select * from servicos where idservico=:idservico");
					$stmt->bindValue(':idservico',$this->getId());
					$stmt->execute();
					$row=$stmt->fetch();
					$r= array(
						"idservico"=>$row['idservico'],
						"idfreelancer"=>$row['idfreelancer'],
						"nomeservico"=>$row['nomeservico'],
						"descricao"=>$row['descricao'],
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
						"idservico"=>$row['idservico']);
					return $r;
				}catch(PDOException $e){
					echo $e->getMessage();
				}
			}
			
		}
		?>
