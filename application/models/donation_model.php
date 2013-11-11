<?php
require_once APPPATH.'core/donation.php';

class donation_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	
	public function insertNewDonation($donation){
		$sql = "INSERT INTO doacao (matriculaassociado, descricao, valor) VALUES (?,?,?)";
		$arrayValues = array($donation->getAssociateId(), $donation->getDescription(), $donation->getValue());
		if($this->db->query($sql, $arrayValues))
			return true;
		else 
			throw new Exception("Falha ao registrar doacao");
	}
}
?>