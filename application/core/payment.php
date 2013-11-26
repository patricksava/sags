<?php
class Payment {
	private $paymentNumber;
	private $serviceCode;
	private $associateId;
	private $valueGiven;
	private $valueExpected;
	private $dateOfPayment;
	private $dateLimit;
	private $paymentMode;
	
	public function __construct($numpag = null, $servico = null, $matr = null, 
			$vpago = null, $vpagar = null, $dtpago = null, 
			$dtvenc = null, $modpag = null){
		$this->setPaymentNumber($numpag);
		$this->setServiceCode($servico);
		$this->setAssociateId($matr);
		$this->setValuePaid($vpago);
		$this->setValueExpected($vpagar);
		$this->setDatePaid($dtpago);
		$this->setDateLimit($dtvenc);
		$this->setPaymentMode($modpag);
	}
	
	public function setPaymentNumber($elem){
		$this->paymentNumber = $elem;
	}
	public function setServiceCode($elem){
		$this->serviceCode = $elem;
	}
	public function setAssociateId($elem){
		$this->associateId = $elem;
	}
	public function setValuePaid($elem){
		$this->valueGiven = $elem;
	}
	public function setValueExpected($elem){
		$this->valueExpected = $elem;
	}
	public function setDatePaid($elem){
		$this->dateOfPayment = $elem;
	}
	public function setDateLimit($elem){
		$this->dateLimit = $elem;
	}
	public function setPaymentMode($elem){
		$this->paymentMode = $elem;
	}
	
	
	public function getPaymentNumber(){
		return $this->paymentNumber;
	}
	public function getServiceCode(){
		return $this->serviceCode;
	}
	public function getAssociateId(){
		return $this->associateId;
	}
	public function getValuePaid(){
		return $this->valueGiven;
	}
	public function getValueExpected(){
		return $this->valueExpected;
	}
	public function getDatePaid(){
		return $this->dateOfPayment;
	}
	public function getDateLimit(){
		return $this->dateLimit;
	}
	public function getPaymentMode(){
		return $this->paymentMode;
	}
	
	
	public function isPaid(){
		if(!is_null($this->getDatePaid()))
			return true;
		else 
			return false;
	}
}
?>