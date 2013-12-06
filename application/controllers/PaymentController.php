<?php
require_once APPPATH.'core/PHPController.php';
require_once APPPATH.'core/associate.php';
require_once APPPATH.'core/partner.php';
require_once APPPATH.'core/payment.php';

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
			$this->loadView("payments/confirmPayment", $this->data);
		}catch(Exception $ex){
			$this->data->exception = $ex->getMessage();
			$this->data->operator = $this->session->userdata("operator");
			$this->loadView("mainviews/error/genericpage", $this->data);
		}
	}
	
	public function registerPayment(){
		if(!$this->checkSession())
			redirect("Login/index");
		
		try{
			if(strlen($this->input->post('paymentNumber'))==0)
				throw new Exception("Falha no procedimento.");
			
			$operator = $this->session->userdata("operator");
			if(!($this->input->post("login") == $operator->getLogin() && $this->input->post("passwrd") == $operator->getPassword()))
				throw new Exception("Erro de autenticacao, favor tentar novamente.");
			
			$numeroPagamento = $this->input->post("paymentNumber");
			$valorPago = $this->input->post("paidValue");
			
			$paymentMode = $this->input->post("paymentmode");
			if(strlen($paymentMode)==0)
				$paymentMode = MODO_PAGAMENTO_ESPECIE;		
				
			$this->generic_model->openTransaction();
			$this->payment_model->registerPayment($numeroPagamento, $valorPago, $operator->getLogin(), $paymentMode);
			$this->generic_model->commitTransaction();
			
			$this->data->operator = $operator;
			$this->data->associateId = $this->input->post('associateId');
			$this->loadView("payments/paymentSucceded", $this->data);
		} catch(Exception $ex) {
			$this->generic_model->rollbackTransaction();
			$this->data->exception = $ex->getMessage();
			$this->data->operator = $this->session->userdata("operator");
			$this->loadView("mainviews/error/genericpage", $this->data);
		}
	}
}
?>