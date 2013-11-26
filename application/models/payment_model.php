<?php
require_once APPPATH."core/payment.php";

class payment_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	
	public function getPaymentHistoryByIdAndService($id, $service){
		$sql = "SELECT * FROM historico_pagamentos($id, '$service')";
		$resultSet = $this->db->query($sql)->result();
		
		if(count($resultSet) == 0)
			throw new Exception("Nada encontrado.");
		
		$payments = array();
		foreach($resultSet as $row){
			$payments[] = new Payment(
						$row->numpagamento,
						$row->serv,
						$row->matr,
						$row->valorpago,
						$row->valorpagar,
						$row->dtpago,
						$row->dtvenc,
						$row->modopag
					);
		}
		
		return $payments;
	}
}
?>
