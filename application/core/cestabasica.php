<?php
class CestaBasica{
	private $matricula;
	private $codcesta;
	private $preco;
	private $quantidade;
	private $mes;
	private $ano;
	
	public function __construct($codcesta, $mat = null, $price = null, $quant = null, $mes = null, $ano = null){
		$this->codcesta = $codcesta;
		$this->matricula = $mat;
		$this->preco = $price;
		$this->quantidade = $quant;
		$this->mes = $mes;
		$this->ano = $ano;
	}
	
	public function setMatricula($elem){
		$this->matricula = $elem;
	}
	public function setCodCesta($elem){
		$this->codcesta = $elem;
	}
	public function setPreco($elem){
		$this->preco = $elem;
	}
	public function setQuantidade($elem){
		$this->quantidade = $elem;
	}
	public function setMes($elem){
		$this->mes = $elem;
	}
	public function setAno($elem){
		$this->ano = $elem;
	}
	
	
	public function getMatricula(){
		return $this->matricula;
	}
	public function getCodCesta(){
		return $this->codcesta;
	}
	public function getPreco(){
		return $this->preco;
	}
	public function getQuantidade(){
		return $this->quantidade;
	}
	public function getMes(){
		return $this->mes;
	}
	public function getAno(){
		return $this->ano;
	}
}
?>