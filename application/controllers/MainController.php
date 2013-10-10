<?php 
require_once APPPATH.'core/PHPController.php';
require_once APPPATH.'core/operator.php';
class MainController extends PHPController{
	
	public function __construct(){
		parent::__construct();
	}
	
	public function adminHome(){
		if(!$this->checkSession())
			redirect("Login/index");
		
		$this->data->operator = $this->session->userdata("operator");
		$this->loadView("mainviews/home", $this->data);
	}
	
	public function searchAssociate(){
		if(!$this->checkSession())
			redirect("Login/index");
		
		if($this->input->post('is_request')){
			//TO DO: implementar busca de associados
		} else {
			$this->data->operator = $this->session->userdata("operator");
			$this->loadView("mainviews/searchAssociate", $this->data);
		}
	}
}
?>