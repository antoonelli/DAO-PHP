<?php 
class Sql extends PDO {
	private $conn;

	public function __construct(){

		try {
			if (is_null($this->conn)) {
				$this->conn = new PDO("mysql:host=localhost;dbname=escola", "root", "");
			}else{
				return $this->conn;
			}
			
		} catch (PDOException $e) {
			echo 'Erro ao conectar no banco '. $e->getMessage();;
		}

	
	}

	private function setParams($statment, $parameters = array()){
		foreach ($parameters as $key => $value) {
			$this->setParam($statment,$key, $value);		
		}
	}

	private function setParam($statment, $key, $value){
		$statment->bindParam($key, $value);
	}

	public function query($rawQuery, $params = array()){
		$stmt = $this->conn->prepare($rawQuery);

		$this->setParams($stmt, $params);

		$stmt->execute();

		return $stmt;

	}

	public function select($rawQuery, $params = array()):array
	{
		$stmt = $this->query($rawQuery, $params);

		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}




}


	?>






