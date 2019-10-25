<?php 


class Usuario{

	private $idusuario;
	private $deslogin;
	private $dessenha;

	public function setIdusuario($value){
		$this->idusuario = $value; 
	}
	public function getIdusuario(){
		return $this->idusuario;
	}

	public function setDeslogin($value){
		$this->deslogin = $value; 
	}
	public function getDeslogin(){
		return $this->deslogin;
	}
	public function setIdessenha($value){
		$this->dessenha = $value; 
	}
	public function getIdessenha(){
		return $this->dessenha;
	}
	public function loadById($id){
		$sql = new Sql();

		$results = $sql->select("SELECT * FROM login WHERE id =:ID", array(
			":ID"=>$id
		));

		if (count($results) > 0) {
			$row = $results[0];

			$this->setIdusuario($row['id']);
			$this->setDeslogin($row['login']);
			$this->setIdessenha($row['senha']);

		}
	}
	public function retornaloadById(){

		return json_encode(array(
		
		"id"=>$this->getIdusuario(),
		"login"=>$this->getDeslogin(),
		"senha"=>$this->getIdessenha()


		));

	}

	
}












 ?>