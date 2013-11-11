<?php
class Telephone_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	
	public function getTelephonesById($id){
		$sql = "SELECT telefone FROM telefone WHERE matriculaassociado = $id";
		
		$result = $this->db->query($sql);
		
		if($result->num_rows()==0)
			return null;
		
		$telefones = null;
		foreach($result->result() as $row){
			$telefones[] = $row->telefone;
		}
		
		return $telefones;
	}
	
	public function insertTelephones($id, $arrayTelephones){
		$sql = " INSERT INTO telefone (matriculaassociado, telefone) VALUES ";
		foreach($arrayTelephones as $telefone){
			$sql.= " ($id, '$telefone'),";
		}
		$sql = substr($sql, 0 ,strlen($sql)-1);
		
		if($this->db->query($sql))
			return true;
		else 
			throw new Exception("Falha na insercao dos telefones");
	}
}
?>