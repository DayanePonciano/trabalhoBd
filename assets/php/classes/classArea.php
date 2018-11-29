<?php

require_once "database.php";

class classArea{
	private $idarea;
	private $nome;


	public function __construct() {
		$database = new Database();
		$dbSet = $database->dbSet();
		$this->conn = $dbSet;
	}

	function setId($value){
		$this->idarea = $value;
	}
	function setNome($value){
		$this->nome = $value;
	}


	public function insert(){
		try{
			$stmt = $this->conn->prepare("INSERT INTO `area` (`nome`,  `idarea`) VALUES (:nome, :idarea)");
			$stmt->bindParam(":nome", $this->nome);
			$stmt->bindParam(":idarea", $this->idarea);
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}

		public function delete(){
		try{
			$stmt = $this->conn->prepare("DELETE FROM `area` WHERE `idarea` = :id");
			$stmt->bindParam(":id", $this->idarea);
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}

		public function edit(){
		try{
			$stmt = $this->conn->prepare("UPDATE `area` SET `nome` = :nome WHERE `idarea` = :id");
			$stmt->bindParam(":id", $this->idarea);
			$stmt->bindParam(":nome", $this->nome);
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}

	public function view(){
		$stmt = $this->conn->prepare("SELECT * FROM `area` WHERE `idarea` = :id");
		$stmt->bindParam(":id", $this->idarea);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_OBJ);
		return $row;
	}

		public function index(){
		$stmt = $this->conn->prepare("SELECT * FROM `area` ORDER BY `idarea`");
		$stmt->execute();
		return $stmt;
	}

}
	

?>
