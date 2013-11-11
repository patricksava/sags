<?php
class Address{
	private $matriculaassociado;
	private $rua;
	private $numero;
	private $complemento;
	private $bairro;
	private $cidade;
	private $estado;
	private $cep;
	
	public function __construct($matrAssoc = null, $rua = null, $numero = null, $complemento = null, $bairro = null, $cidade = null, $estado = null, $cep = null){
		$this->setMatricula($matrAssoc);
		$this->setRua($rua);
		$this->setNumero($numero);
		$this->setComplemento($complemento);
		$this->setBairro($bairro);
		$this->setCidade($cidade);
		$this->setEstado($estado);
		$this->setCEP($cep);
	}
	
	public function printFullAddress(){
		return $this->rua ." ". $this->numero ." ". $this->complemento ." - ". $this->bairro .", ". $this->cidade ." - ". $this->estado;
	}
	
	
	public function setMatricula($elem){
		$this->matriculaassociado = $elem;
	}
	public function setRua($elem){
		$this->rua = $elem;
	}
	public function setNumero($elem){
		$this->numero = $elem;
	}
	public function setComplemento($elem){
		$this->complemento = $elem;
	}
	public function setBairro($elem){
		$this->bairro = $elem;
	}
	public function setCidade($elem){
		$this->cidade = $elem;
	}
	public function setEstado($elem){
		$this->estado = $elem;
	}
	public function setCEP($elem){
		$this->cep = $elem;
	}
	
	public function getMatricula(){
		return $this->matriculaassociado;
	}
	public function getRua(){
		return $this->rua;
	}
	public function getNumero(){
		return $this->numero;
	}
	public function getComplemento(){
		return $this->complemento;
	}
	public function getBairro(){
		return $this->bairro;
	}
	public function getCidade(){
		return $this->cidade;
	}
	public function getEstado(){
		return $this->estado;
	}
	public function getCEP(){
		return $this->cep;
	}
	
	
}
?>