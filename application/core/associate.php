<?php

class Associate {
	private $associateId;
	private $name;
	private $cpf;
	private $occupation;
	private $birthDate;
	private $email;
	private $civilState;
	private $rg;
	private $expeditor;
	
	// CONSTRUCTORS
	public function __construct($associateId = null, $name = null, $cpf = null, $occupation = null, $birthDate = null, $email = null, $civilState = null, $rg = null, $expeditor = null){
		$this->setAssociateId($associateId);
		$this->setName($name);
		$this->setCPF($cpf);
		$this->setOccupation($occupation);
		$this->setBirthDate($birthDate);
		$this->setEmail($email);
		$this->setCivilState($civilState);
		$this->setRG($rg);
		$this->setExpeditor($expeditor);
	}
	
	// GETTERS
	public function getAssociateId(){
		return $this->associateId;
	}
	public function getName(){
		return $this->name;
	}
	public function getCPF(){
		return $this->cpf;
	}
	public function getOccupation(){
		return $this->occupation;
	}
	public function getBirthDate(){
		return $this->birthDate;
	}
	public function getEmail(){
		return $this->email;
	}
	public function getCivilState(){
		return $this->civilState;
	}
	public function getRG(){
		return $this->rg;
	}
	public function getExpeditor(){
		return $this->expeditor;
	}
	
	// SETTERS
	public function setAssociateId($element){
		$this->associateId = $element;
	}
	public function setName($element){
		$this->name = $element;
	}
	public function setCPF($element){
		$this->cpf = $element;
	}
	public function setOccupation($element){
		$this->occupation = $element;
	}
	public function setBirthDate($element){
		$this->birthDate = $element;
	}
	public function setEmail($element){
		$this->email = $element;
	}
	public function setCivilState($element){
		$this->civilState = $element;
	}
	public function setRG($element){
		$this->rg = $element;
	}
	public function setExpeditor($element){
		$this->expeditor = $element;
	}
}
?>
