<?php 
require_once APPPATH.'core/PHPController.php';
require_once APPPATH.'core/operator.php';
require_once APPPATH.'core/associate.php';
require_once APPPATH.'core/partner.php';

class MainController extends PHPController{
	
	public function __construct(){
		parent::__construct();
		
		$this->load->model('associate_model');
		$this->load->model('address_model');
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
			$address = $this->address_model->getAddressById($this->input->get("id"));
			
			$this->data->associate = $associate;
			$this->data->address = $address;
			
			$this->data->operator = $this->session->userdata("operator");
			$this->loadView("mainviews/associatePage", $this->data);
		} catch (Exception $exception){
			$this->data->operator = $this->session->userdata("operator");
			$this->loadView("mainviews/error/associateNotFound", $this->data);
		}
	}
	
	public function insertNewAssociate(){
		if(!$this->checkSession())
			redirect("Login/index");
		
		try{
			$associate = new Associate();
			$associate->setName((strlen($this->input->post('associateName')) > 0)?$this->input->post('associateName'):null);
			$associate->setBirthDate((strlen($this->input->post('associateBirthDate')) > 0)?$this->input->post('associateBirthDate'):null);
			$associate->setCPF((strlen($this->input->post('associateCPF')) > 0)?$this->input->post('associateCPF'):null);
			$associate->setRG((strlen($this->input->post('associateRG')) > 0)?$this->input->post('associateRG'):null);
			$associate->setExpeditor((strlen($this->input->post('associateExpeditor')) > 0)?$this->input->post('associateExpeditor'):null);
			$associate->setCivilState((strlen($this->input->post('associateEstadoCivil')) > 0)?$this->input->post('associateEstadoCivil'):null);
			$associate->setEmail((strlen($this->input->post('associateEmail')) > 0)?$this->input->post('associateEmail'):null);
			$associate->setOccupation((strlen($this->input->post('associateProfissao')) > 0)?$this->input->post('associateProfissao'):null);
			
			$endereco = new Address();
			$endereco->setRua((strlen($this->input->post('associateRua')) > 0)?$this->input->post('associateRua'):null);
			$endereco->setNumero((strlen($this->input->post('associateNumero')) > 0)?$this->input->post('associateNumero'):null);
			$endereco->setComplemento((strlen($this->input->post('associateComplemento')) > 0)?$this->input->post('associateComplemento'):null);
			$endereco->setBairro((strlen($this->input->post('associateBairro')) > 0)?$this->input->post('associateBairro'):null);
			$endereco->setCidade((strlen($this->input->post('associateCidade')) > 0)?$this->input->post('associateCidade'):null);
			$endereco->setEstado((strlen($this->input->post('associateEstado')) > 0)?$this->input->post('associateEstado'):null);
			$endereco->setCEP((strlen($this->input->post('associateCEP')) > 0)?$this->input->post('associateCEP'):null);
			
			
			$newId = $this->associate_model->insertAssociate($associate);
			
			if($newId > 0){
				if(!$this->address_model->insertAddress($newId, $endereco))
					throw new Exception();
				redirect("MainController/associateInfo?id=$newId");
			}
			else 
				throw new Exception();
			
		} catch(Exception $ex) {
			$this->data->operator = $this->session->userdata("operator");
			$this->loadView("mainviews/error/associateNotInserted", $this->data);
		}
	}
	
}
?>