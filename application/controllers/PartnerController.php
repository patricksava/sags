<?php
require_once APPPATH.'core/PHPController.php';
require_once APPPATH.'core/associate.php';
require_once APPPATH.'core/partner.php';
require_once APPPATH.'core/payment.php';


class PartnerController extends PHPController{
	public function __construct(){
		parent::__construct();
	
		$this->load->model('generic_model');
		$this->load->model('associate_model');
		$this->load->model('payment_model');
	}
	
	public function NewPartnerSubscription(){
		if(!$this->checkSession())
			redirect("Login/index");
		
		try{
			if(strlen($this->input->post('associateId'))==0)
				throw new Exception("Associado n‹o encontrado.");
			
			$associate = $this->associate_model->getAssociateById($this->input->post("associateId"), 1);
			$associate->setLogin($this->input->post('newPartnerLogin'));
			$associate->setPayment($this->input->post('newPartnerPayment'));
			
			$this->generic_model->openTransaction();
			$this->associate_model->insertNewPartner($associate);
			$this->generic_model->commitTransaction();
			
			redirect("MainController/associateInfo?id=".$associate->getAssociateId());
		}catch (Exception $ex){
			$this->generic_model->rollbackTransaction();
			$this->data->exception = $ex->getMessage();
			$this->data->operator = $this->session->userdata("operator");
			$this->loadView("mainviews/error/genericpage", $this->data);
		}
	}
	
	public function premiumAssociateManagementPage(){
		if(!$this->checkSession())
			redirect("Login/index");
		
		try{
			if(strlen($this->input->get('id'))==0)
				throw new Exception("Associado invalido.");
			
			$partner  = $this->associate_model->getAssociateById($this->input->get('id'));
			$payments = $this->payment_model->getPaymentHistoryByIdAndService($partner->getAssociateId(), SOCIOCASA);
			
			$this->data->payments = $payments;
			$this->data->associate = $partner;
			$this->data->operator = $this->session->userdata("operator");
			$this->loadView("payments/premiumAssociate", $this->data);
		} catch(Exception $ex) {
			$this->data->exception = $ex->getMessage();
			$this->data->operator = $this->session->userdata("operator");
			$this->loadView("mainviews/error/genericpage", $this->data);
		}
	}
}
?>