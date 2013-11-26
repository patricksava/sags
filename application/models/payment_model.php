<?php
require_once APPPATH."core/payment.php";

class payment_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	
	public function getPaymentHistoryByIdAndService($id, $service){
		$sql = "SELECT * FROM historico_pagamentos($id, '$service')";
		$resultSet = $this->db->query($sql)->result_array();
		
		if(count($resultSet) == 0)
			throw new Exception("Nada encontrado.");
		
		$payments = array();
		foreach($resultSet as $row)
			$payments[] = $this->createNewPayment($row);
		
		return $payments;
	}
	
	public function getPaymentByNumber($number){
		$sql = "SELECT numpagamento, codServico as serv, matriculaassociado as matr, valorpago, valorpagar, 
					datapagamento as dtpago, datavencimento as dtvenc, modopagamento as modopag 
				FROM mensalidade WHERE numpagamento = $number";
		$resultSet = $this->db->query($sql);
		
		if($resultSet->num_rows()>0){
			$row = $resultSet->result_array();
			return $this->createNewPayment($row[0]);
		}
		else
			throw new Exception("Mensalidade nao encontrada");
	}
	
	public function registerPayment($numPayment, $paidValue, $paymentMode){
		$sql = "UPDATE mensalidade 
				SET valorpago = ?, modopagamento = ?,datapagamento = now()
				WHERE numpagamento = ?";
		$result = $this->db->query($sql, array($paidValue, $paymentMode, $numPayment));
		
		if($result)
			return true;
		else
			throw new Exception("Falha na insercao dos valores do pagamento");
	}
	
	public function createNewPayment($arrayValues){
		return new Payment(
				$arrayValues['numpagamento'],
				$arrayValues['serv'],
				$arrayValues['matr'],
				$arrayValues['valorpago'],
				$arrayValues['valorpagar'],
				$arrayValues['dtpago'],
				$arrayValues['dtvenc'],
				$arrayValues['modopag']
		);
	}
}
?>
