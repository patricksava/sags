<?php
require_once APPPATH.'core/associate.php';
class Partner extends Associate{
	private $loginPartner;
	private $monthlyPayment;
	private $inicialDate;
	
	public function __construct($associateId, $name, $loginPartner, $monthlyPayment, 
			$inicialDate = null, $cpf = null, $occupation = null, $birthDate = null, 
			$email = null, $civilState = null, $rg = null, $expeditor = null){
		
		parent::__construct(
			$associateId, 
			$name, 
			$cpf, 
			$occupation, 
			$birthDate, 
			$email, 
			$civilState, 
			$rg, 
			$expeditor
		);
		$this->setLogin($loginPartner);
		$this->setPayment($monthlyPayment);
		$this->setInicialDate($inicialDate);
	}
	
	//GETTERS
	public function getLogin(){
		return $this->loginPartner;
	}
	public function getPayment(){
		return $this->monthlyPayment;
	}
	public function getInicialDate(){
		return $this->inicialDate;
	}
	
	//SETTERS
	public function setLogin($element){
		$element = $this->loginPartner;
	}
	public function setPayment($element){
		$element = $this->monthlyPayment;
	}
	public function setInicialDate($element){
		$element = $this->inicialDate;
	}
}
?>