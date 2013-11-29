<?php
require_once APPPATH.'core/PHPController.php';
require_once APPPATH.'core/associate.php';
require_once APPPATH.'core/payment.php';
require_once APPPATH.'core/club.php';

class ClubController extends PHPController{
	public function __construct(){
		parent::__construct();

		$this->load->model('generic_model');
		$this->load->model('payment_model');
		$this->load->model('club_model');
		$this->load->model('associate_model');
	}
	
	public function clubManagementPage(){
		if(!$this->checkSession())
			redirect("Login/index");
		
		try{
			if(strlen($this->input->get('id'))==0)
				throw new Exception("Informacoes incompletas.");
			
			$associate = $this->associate_model->getAssociateById($this->input->get('id'));

			$this->data->clubArt = $this->club_model->getClubInfo('Clube Arte', date('m'), date('Y'));
			$this->data->clubBook = $this->club_model->getClubInfo('Clube Livro', date('m'), date('Y'));

			$this->data->paymentsCBA = $this->payment_model->getPaymentHistoryByIdAndService($associate->getAssociateId(), 'CBA');
			$this->data->paymentsCBL = $this->payment_model->getPaymentHistoryByIdAndService($associate->getAssociateId(), 'CBL');
			
			$this->data->associate = $associate;
			$this->data->operator = $this->session->userdata('operator');
			
			$this->loadView("clubs/associateFullView", $this->data);
		} catch(Exception $ex) {
			$this->data->exception = $ex->getMessage();
			$this->data->operator = $this->session->userdata("operator");
			$this->loadView("mainviews/error/genericpage", $this->data);
		}
	}
}
?>