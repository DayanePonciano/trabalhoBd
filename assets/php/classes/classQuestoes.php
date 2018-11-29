<?php

require_once 'database.php';

class classQuestoes{
	private $id;
	private $question;
	private $answer;
	private $option1;
 	private $option2;
 	private $option3;
 	private $option4;
 	private $simulados_idmocks;

	public function __construct() {
		$database = new Database();
		$dbSet = $database->dbSet();
		$this->conn = $dbSet;
	}

	function setId($value){
		$this->id = $value;
	}

	function setQuestao($value){
		$this->question= $value;
	}

	function setResposta($value){
		$this->answer = $value;
	}

	function setOpcao1($value){
		$this->option1 = $value;
	}
	function setOpcao2($value){
		$this->option2 = $value;
	}
	function setOpcao3($value){
		$this->option3 = $value;
	}
	function setOpcao4($value){
		$this->option4 = $value;
	}
	function setSimulado($value){
		$this->simulados_idmocks = $value;
	}
	

	public function insert(){
		try{
			$stmt = $this->conn->prepare("INSERT INTO `questoes`( `question`, `answer`,`option1`, `option2`, `option3`, `option4`, `simulados_idmocks` ) VALUES (:question, :answer,:option1, :option2, :option3, :option4, :simulados_idmocks)");
			$stmt->bindParam(":question", $this->question);
			$stmt->bindParam(":answer", $this->answer);
			$stmt->bindParam(":option1", $this->option1);
			$stmt->bindParam(":option2", $this->option2);
			$stmt->bindParam(":option3", $this->option3);
			$stmt->bindParam(":option4", $this->option4);
			$stmt->bindParam(":simulados_idmocks", $this->simulados_idmocks);

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
		$stmt = $this->conn->prepare("SELECT * FROM `questoes` ORDER BY `id`");
		$stmt->execute();
		return $stmt;
	}

	

}	

?>
