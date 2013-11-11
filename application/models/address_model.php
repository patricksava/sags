<?php

require_once APPPATH.'core/address.php';

class Address_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	
	public function getAddressById($id){
		$sql = "SELECT * FROM endereco WHERE matriculaassociado = $id";
		
		$result = $this->db->query($sql);
		if($result->num_rows() > 0)
			return $this->createNewAddress($result->first_row());
		else 
			return false;
	}
	
	public function insertAddress($id, $address){
		$sql = "INSERT INTO endereco(matriculaassociado, rua, numero, complemento, bairro, cidade, estado, cep) 
				VALUES(?,?,?,?,?,?,?,?)";
		$arrayValues = array(
					$id, 
					$address->getRua(),
					$address->getNumero(),
					$address->getComplemento(),
					$address->getBairro(),
					$address->getCidade(),
					$address->getEstado(),
					$address->getCEP()
				);
		
		if($this->db->query($sql, $arrayValues))
			return true;
		else
			throw new Exception("Falha na insercao do endereco");
	}
	
	public function createNewAddress($row){
		return new Address(
				$row->matriculaassociado,
				$row->rua,
				$row->numero,
				$row->complemento,
				$row->bairro,
				$row->cidade,
				$row->estado,
				$row->cep
		);
	}
}
?>