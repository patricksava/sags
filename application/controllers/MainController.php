<?php
class MainController extends CI_Controller{
	
	public function index(){
		$this->load->view('include/header');
		$this->load->view('login/login');
		$this->load->view('include/footer');
	}
	
}
?>