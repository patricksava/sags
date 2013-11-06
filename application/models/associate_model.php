<?php
require_once APPPATH.'core/associate.php';
require_once APPPATH.'core/partner.php';

class Associate_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();
	}
	
	public function getAssociatesByVariableData($arrayData){
		$associates = array();
		
		$sql = "SELECT * FROM Associado as a, Endereco as en WHERE  a.matriculaassociado = en.matriculaassociado ";
		if(is_array($arrayData)){
			if(isset($arrayData['associateName']))
				$sql .= " AND nome ilike'%". $arrayData['associateName'] ."%' ";
			if(isset($arrayData['associateCPF']))
				$sql .= " AND cpf = '". $arrayData['associateCPF'] ."' ";
			if(isset($arrayData['associateId']))
				$sql .= " AND matriculaassociado = ". $arrayData['associateId'];
		}
		$result = $this->db->query($sql)->result();
		
		if(count($result) > 0){
			foreach($result as $row){
				if(is_null($row->loginsocio)){
					$associates[] = $this->createNewAssociate($row);
				}
				else {
					$associates[] = $this->createNewPartner($row);
				}
			}
		}	

		return $associates;
	}
	
	public function getAssociateById($id){
		$sql = "Select * From Associado Where matriculaassociado = $id";
		$result = $this->db->query($sql)->result();
		if(count($result) > 0){
			foreach($result as $row){
				if(is_null($row->loginsocio))
					$associate = $this->createNewAssociate($row);
				else 
					$associate = $this->createNewPartner($row);
			}
			return $associate;
		} else 
			throw new Exception("Associate not found");
		
	}
	
	public function createNewAssociate($row){
		return new Associate(
				$row->matriculaassociado, 
				$row->nome, 
				$row->cpf, 
				$row->datanascimento, 
				$row->profissao, 
				$row->email, 
				$row->estadocivil, 
				$row->identidade, 
				$row->orgaoident
			);
	}
	
	public function createNewPartner($row){
		return new Partner(
				$row->matriculaassociado, 
				$row->nome, 
				$row->loginsocio, 
				$row->valormensal, 
				$row->dataingresso, 
				$row->cpf, 
				$row->datanascimento, 
				$row->profissao, 
				$row->email, 
				$row->estadocivil, 
				$row->identidade, 
				$row->orgaoident
			);
	}
}

?>
