<?php
class Club{
	private $clubcode;
	private $month;
	private $year;
	private $price;
	private $title;
	
	public function __construct($clubcode, $month, $year, $price = null, $title = null){
		$this->clubcode = $clubcode;
		$this->month = $month;
		$this->year = $year;
		$this->price = $price;
		$this->title = $title;
	}
	
	public function setClubCode($elem){
		$this->clubcode = $elem;
	}
	public function setMonth($elem){
		$this->month = $elem;
	}
	public function setYear($elem){
		$this->year = $elem;
	}
	public function setPrice($elem){
		$this->price = $elem;
	}
	public function setTitle($elem){
		$this->title = $elem;
	}
	
	public function getClubCode(){
		return $this->clubcode;
	}
	public function getMonth(){
		return $this->month;
	}
	public function getYear(){
		return $this->year;
	}
	public function getPrice(){
		return $this->price;
	}
	public function getTitle(){
		return $this->title;
	}
}
?>