<?php
require_once APPPATH.'core/PHPController.php';
require_once APPPATH.'core/associate.php';
require_once APPPATH.'core/partner.php';
require_once APPPATH."core/payment.php";

class PaymentController extends PHPController{
	public function __construct(){
		parent::__construct();
		
		$this->load->model('generic_model');
		$this->load->model('payment_model');
	}
	
	public function confirmPayment(){
		if(!$this->checkSession())
			redirect("Login/index");
		
		try{
			if(strlen($this->input->get('number'))==0)
				throw new Exception("Informacoes incompletas.");
			
			$payment = $this->payment_model->getPaymentByNumber($this->input->get('number'));
			$this->data->operator = $this->session->userdata("operator");
			$this->data->payment = $payment;
			$this->loadView("payment/confirmPayment", $this->data);
		}catch(Exception $ex){
			$this->data->exception = $ex->getMessage();
			$this->data->operator = $this->session->userdata("operator");
			$this->loadView("mainviews/error/genericpage", $this->data);
		}
	}
}
?>