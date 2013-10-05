<?php
include_once APPPATH.'core/operator.php';
class MainController extends CI_Controller{
	public $operator;
	public $data;
	
	public function __construct(){
		parent::__construct();
		
		$this->load->model('operator_model', 'opr');
	}
	
	public function index(){
		$this->load->view('include/header', $this->data);
		$this->load->view('login/login');
		$this->load->view('include/footer');
	}
	
	public function login(){
		$login = $this->input->post('login');
		$senha = $this->input->post('password');
		
		try{
			$operator = $this->opr->loginOperator($login, $senha);
			
			$data['operator'] = $operator;
			
			$this->load->view('include/header', $this->data);
			$this->load->view('mainviews/home', $this->data);
			$this->load->view('include/footer');
		} catch(Exception $ex) {
			$this->index();
		}
	}
	
}
?>