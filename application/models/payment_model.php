<?php
require_once APPPATH."core/payment.php";
require_once APPPATH."core/club.php";

class payment_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	
	public function getPaymentHistoryByIdAndService($id, $service){
		$sql = "SELECT * FROM historico_pagamentos($id, '$service')";
		$resultSet = $this->db->query($sql)->result_array();
		
		if(count($resultSet) == 0)
			return null;
		
		$payments = array();
		foreach($resultSet as $row)
			$payments[] = $this->createNewPayment($row);
		
		return $payments;
	}
	
	public function getPaymentByNumber($number){
		$sql = "SELECT numpagamento, codServico as serv, matriculaassociado as matr, valorpago, valorpagar, 
					datapagamento as dtpago, datavencimento as dtvenc, modopagamento as modopag, loginoperador as loginop
				FROM mensalidade WHERE numpagamento = $number";
		$resultSet = $this->db->query($sql);
		
		if($resultSet->num_rows()>0){
			$row = $resultSet->result_array();
			return $this->createNewPayment($row[0]);
		}
		else
			throw new Exception("Mensalidade nao encontrada");
	}
	
	public function registerPayment($numPayment, $paidValue, $loginOp, $paymentMode){
		$sql = "UPDATE mensalidade 
				SET valorpago = ?, modopagamento = ?, loginoperador = ?, datapagamento = now()
				WHERE numpagamento = ?";

		$result = $this->db->query($sql, array($paidValue, $paymentMode, $loginOp, $numPayment));

		if($result)
			return true;
		else
			throw new Exception("Falha na insercao dos valores do pagamento");
	}
	
	public function insertFirstPaymentClub($id, $club){
		$sql = "INSERT INTO mensalidade (matriculaassociado, codservico, valorpagar, datavencimento)
				VALUES (?,?,?,(now()+'5days'::interval)::date)";
		$result = $this->db->query($sql, array($id, $club->getClubPaymentCode(), $club->getPrice()));
		if($result)
			return true;
		else 
			throw new Exception("Falha ao registrar primeiro boleto");
	}
	
	public function createPaymentsPremium(){
		$sql = "SELECT gera_boletos_socios()";
		$result = $this->db->query($sql);
		if($result->num_rows()>0)
			return true;
		else
			throw new Exception("Falha na cria‹o dos pagamentos dos socios da casa");
	}
	
	public function createPaymentsClubs(){
		$this->createPaymentsClubBook();
		$this->createPaymentsClubArt();
	}
	
	public function createPaymentsPackages(){
		//TODO: implementar criacao de pagamentos de cesta!
	}
	
	private function createPaymentsClubBook(){
		$sql = "SELECT gera_boletos_clube_livro()";
		$result = $this->db->query($sql);
	
		if($result->num_rows()>0)
			return true;
		else
			throw new Exception("Falha na cria‹o dos pagamentos do clube do livro");
	}
	
	private function createPaymentsClubArt(){
		$sql = "SELECT gera_boletos_clube_artes()";
		$result = $this->db->query($sql);
	
		if($result->num_rows()>0)
			return true;
		else
			throw new Exception("Falha na cria‹o dos pagamentos do clube de arte");
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
				$arrayValues['modopag'], 
				$arrayValues['loginop']
		);
	}
}
?>
