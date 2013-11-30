<?php
require_once APPPATH.'core/PHPController.php';
require_once APPPATH.'core/operator.php';
class Login extends PHPController{
	
	public function __construct(){
		parent::__construct();
	
		$this->load->model('operator_model', 'opr');
		$this->load->model('payment_model');
		$this->load->model('generic_model');
	}
	
	public function index($error=false){
		if($error){
			$this->data->loginfail = true;
		}
		$this->loadView("login/login", $this->data);
	}
	
	public function login(){
		$login = $this->input->post('login');
		$senha = $this->input->post('password');

		try{
			$operator = $this->opr->loginOperator($login, $senha);
			$this->session->set_userdata("operator", $operator);
			
			$this->createPayments();
			redirect("MainController/adminHome");
		} catch(Exception $ex) {
			$this->index(true);
		}
	}
	
	public function logout(){
		if(!$this->checkSession())
			redirect("Login/index");
		
		$this->session->destroy();
		redirect("Login/index");
	}
	
	private function createPayments(){
		//Dia de criar pagamentos
		if(date('d') == 5){
			try{
				$this->generic_model->openTransaction();
				$this->payment_model->createPaymentsPremium();
				$this->payment_model->createPaymentsClubs();
				$this->payment_model->createPaymentsPackages();
				$this->generic_model->commitTransaction();
			} catch(Exception $ex) {
				$this->generic_model->rollbackTransaction();
				$this->data->exception = $ex->getMessage();
				$this->loadView("mainviews/error/genericpage", $this->data);
			}
		}
	}
}
?>