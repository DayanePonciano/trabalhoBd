<?php

require_once "database.php";

class classSimulados{
	private $idmocks;
	private $nome;
	private $area_idarea;
	private $data;
 

	public function __construct() {
		$database = new Database();
		$dbSet = $database->dbSet();
		$this->conn = $dbSet;
	}

	function setId($value){
		$this->idmocks = $value;
	}

	function setNome($value){
		$this->nome = $value;
	}

	function setArea($value){
		$this->area_idarea = $value;
	}

	function setData($value){
		$this->data = $value;
	}

	

	public function insert(){
		try{
			$stmt = $this->conn->prepare("INSERT INTO `simulados`(`idmocks`, `nome`, `area_idarea`, `data`) VALUES (:idmocks, :nome, :area_idarea :data");
			$stmt->bindParam(":idmocks", $this->idmocks);
			$stmt->bindParam(":nome", $this->nome);
			$stmt->bindParam(":area_idarea", $this->area_idarea);
			$stmt->bindParam(":data", $this->data);
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}


		public function edit(){
		try{
			$stmt = $this->conn->prepare("UPDATE `simulados` SET `quantidade` = :quantidade, `data` = :data, `produtos_id` = :produtos_id");
			$stmt->bindParam(":quantidade", $this->quantidade);
			$stmt->bindParam(":data", $this->data);
			$stmt->bindParam(":produtos_id", $this->produtos_id);
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}



		public function delete(){
		try{
			$stmt = $this->conn->prepare("DELETE FROM `simulados` WHERE `idmocks` = :id");
			$stmt->bindParam(":id", $this->idmocks);
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}

	public function view(){
		$stmt = $this->conn->prepare("SELECT * FROM `simulados` WHERE `idmocks` = :id");
		$stmt->bindParam(":id", $this->idmocks);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_OBJ);
		return $row;
	}

		public function index(){
		$stmt = $this->conn->prepare("SELECT * FROM `simulados` ORDER BY `idmocks`");
		$stmt->execute();
		return $stmt;
	}

	

}	

?>
