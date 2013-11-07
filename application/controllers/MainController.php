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
	
	public function insertAssociateForm(){
		if(!$this->checkSession())
			redirect("Login/index");
		
		$this->data->operator = $this->session->userdata("operator");
		$this->loadView("mainviews/insertAssociateForm", $this->data);
	}
	
	public function searchAssociate(){
		if(!$this->checkSession())
			redirect("Login/index");
		
		if($this->input->post('is_request')){
			$arrayData = null;
			$arrayData['associateName'] = (strlen($this->input->post('associateName')) > 0)?$this->input->post('associateName'):null;
			$arrayData['associateCPF'] = (strlen($this->input->post('associateCPF')) > 0)?$this->input->post('associateCPF'):null;
			$arrayData['associateId'] = (strlen($this->input->post('associateId')) > 0)?$this->input->post('associateId'):null;
			
 			$associates = $this->associate_model->getAssociatesByVariableData($arrayData);
 			
			$this->data->associates = $associates;
			$this->data->operator = $this->session->userdata("operator");
 			$this->loadView("mainviews/searchAssociate", $this->data);
		} else {
			$this->data->operator = $this->session->userdata("operator");
			$this->loadView("mainviews/searchAssociate", $this->data);
		}
	}
	
	public function associateInfo(){
		if(!$this->checkSession())
			redirect("Login/index");
		
		try{
			$associate = $this->associate_model->getAssociateById($this->input->get("id"));
			
			$this->data->associate = $associate;
			$this->data->operator = $this->session->userdata("operator");
			$this->loadView("mainviews/associatePage", $this->data);
		} catch (Exception $exception){
			$this->data->operator = $this->session->userdata("operator");
			$this->loadView("mainviews/error/associateNotFound", $this->data);
		}
	}
	
}
?>