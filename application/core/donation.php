<?php
class Donation{
	private $id;
	private $associateId;
	private $description;
	private $value;
	
	public function __construct($id=null, $assId=null, $desc=null, $value=null){
		$this->id = $id;
		$this->associateId = $assId;
		$this->description = $desc;
		$this->value = $value;
	}
	
	public function setId($elem){
		$this->id = $elem;
	}
	public function setAssociateId($elem){
		$this->associateId = $elem;
	}
	public function setDescription($elem){
		$this->description = $elem;
	}
	public function setValue($elem){
		$this->value = $elem;
	}
	
	public function getId(){
		return $this->id;
	}
	public function getAssociateId(){
		return $this->associateId;
	}
	public function getDescription(){
		return $this->description;
	}
	public function getValue(){
		return $this->value;
	}
}
?>