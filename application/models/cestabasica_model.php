<?php 
require_once APPPATH.'core/associate.php';
require_once APPPATH.'core/partner.php';
require_once APPPATH.'core/cestabasica.php';

class Cestabasica_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}
	
	public function getDonationsByAssociate($associate){
		$sql = "SELECT * FROM doa WHERE matriculaassociado = {$associate->getAssociateId()}";
		$result = $this->db->query($sql);
		$donations = null;

		if($result->num_rows()>0)
			foreach($result->result() as $res)
				$donations[] = $this->createNewDonationInfo($res);
		
		return $donations;
	}
	
	public function insertAssociateDonation($assocId, $codcesta, $quant){
		$sql = "INSERT INTO doa VALUES (?,?,?)";
		$result = $this->db->query($sql, array($assocId, $codcesta, $quant));
		if($result)
			return true;
		else 
			throw new Exception("Falha ao inserir novo pedido de cesta basica");
	}
	
	public function updateAssociateDonation($assocId, $codcesta, $quant){
		if($quant > 0){
			$sql = "UPDATE doa SET quantidade = ? WHERE matriculaassociado = ? AND codcesta = ?";
			$result = $this->db->query($sql, array($quant, $assocId, $codcesta));
		} else {
			$sql = "DELETE FROM doa WHERE matriculaassociado = ? AND codcesta = ?";
			$result = $this->db->query($sql, array($assocId, $codcesta));
		}
		
		if($result)
			return true;
		else
			throw new Exception("Falha ao inserir novo pedido de cesta basica");
	}
	
	public function createNewDonationInfo($res){
		return new CestaBasica(
				$res->codcesta,
				$res->matriculaassociado,
				null,
				$res->quantidade,
				null,
				null
			);
	}
	
}
?>
