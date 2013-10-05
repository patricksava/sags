<?php 
include_once APPPATH.'core/operator.php';
class MainController extends CI_Controller{
	public $operator;
	public $data;
	
	public function __construct(){
		parent::__construct();
		
		$this->load->model('operator_model', 'opr');
		$this->load->library('session');
	}
	
	function __destruct(){
		//$this->session->sess_destroy();
	}
	
	public function loadView($viewName, $data){
		$this->load->view('include/header', $data);
		$this->load->view($viewName, $data);
		$this->load->view('include/footer');
	}
	
	public function checkSession(){
		if(!is_object($this->session->userdata('operator')))
			return false;
		return true;
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
			
			$this->operator = $operator;
			$this->session->set_userdata("operator", $operator);
			
			//print_r($this->session->all_userdata());
			$this->adminHome();
		} catch(Exception $ex) {
			$this->index(true);
		}
	}
	
	public function adminHome(){
		if($this->checkSession()){
			$this->data->operator = $this->operator;
			$this->loadView("mainviews/home", $this->data);
		} else {
			$this->index();
		}
	}

	function logout(){
		$this->session->sess_destroy();
		$this->index(false);
	}
}
?>