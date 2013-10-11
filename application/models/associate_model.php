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
			if(isset($arrayData['cpf']))
				$sql .= " AND cpf = '". $arrayData['cpf'] ."' ";
			if(isset($arrayData['associateId']))
				$sql .= " AND matriculaassociado = ". $arrayData['associateId'];
		}
		$result = $this->db->query($sql)->result();
		
		if(count($result) > 0){
			foreach($result as $row){
				if(is_null($row->loginsocio))
					$associates[] = new Associate($row->matriculaassociado, $row->nome, $row->cpf, $row->datanascimento, $row->profissao, $row->email);
				else 
					$associates[] = new Partner($row->matriculaassociado, $row->nome, $row->loginsocio, $row->valormensal, $row->dataingresso, $row->cpf, $row->datanascimento, $row->profissao, $row->email);
			}
		}

		return $associates;
	}
	
}

?>
