<?php
include_once APPPATH.'core/operator.php';
class PHPController extends CI_Controller{
	public $data;
	
	public function __construct(){
		parent::__construct();
		//$this->load->library('session');
	}
	
	public function loadView($viewName, $data){
		$this->load->view('include/header', $data);
		$this->load->view($viewName, $data);
		$this->load->view('include/footer');
	}
	
	public function checkSession(){
		//print_r($this->session->userdata('operator'));
		if(!is_object($this->session->userdata('operator')))
			return false;
		return true;
	}
}
?>
