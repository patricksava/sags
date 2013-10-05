<?php
class Operator{
	private $login;
	private $password;
	private $name;
	
	public function __construct($login, $password, $name = null){
		$this->login = $login;
		$this->password = $password;
		$this->name = $name;
	}
	
	public function setName($name){
		$this->name = $name;
	}
	public function getName(){
		return $this->name;
	}
	
}
?>