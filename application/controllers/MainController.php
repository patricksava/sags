<?php 
require_once APPPATH.'core/PHPController.php';
require_once APPPATH.'core/operator.php';
class MainController extends PHPController{
	
	public function __construct(){
		parent::__construct();
	}
	
	public function adminHome(){
		
		if($this->checkSession()){
			$this->data->operator = $this->session->userdata("operator");
			$this->loadView("mainviews/home", $this->data);
		} else {
			//print_r($this->session->all_userdata());
			redirect("Login/index");
		}
	}
}
?>