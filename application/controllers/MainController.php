<?php 
require_once APPPATH.'core/PHPController.php';
require_once APPPATH.'core/operator.php';
require_once APPPATH.'core/associate.php';
require_once APPPATH.'core/partner.php';

class MainController extends PHPController{
	
	public function __construct(){
		parent::__construct();
		
		$this->load->model('associate_model');
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
			$arrayData = null;
			$arrayData['associateName'] = (strlen($this->input->post('associateName')) > 0)?$this->input->post('associateName'):null;
			
 			$associates = $this->associate_model->getAssociatesByVariableData($arrayData);
 			
			$this->data->associates = $associates;
			$this->data->operator = $this->session->userdata("operator");
 			$this->loadView("mainviews/searchAssociate", $this->data);
		} else {
			$this->data->operator = $this->session->userdata("operator");
			$this->loadView("mainviews/searchAssociate", $this->data);
		}
	}
}
?>