<?php
require_once APPPATH.'core/PHPController.php';
require_once APPPATH.'core/operator.php';
class Login extends PHPController{
	
	public function __construct(){
		parent::__construct();
	
		$this->load->model('operator_model', 'opr');
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
			//print_r($this->session->all_userdata());
			redirect("MainController/adminHome");
		} catch(Exception $ex) {
			$this->index(true);
		}
	}
	
	function logout(){
		$this->session->sess_destroy();
		redirect("Login/index");
	}
}
?>