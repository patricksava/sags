<?php
require_once APPPATH.'core/PHPController.php';
require_once APPPATH.'core/associate.php';
require_once APPPATH.'core/partner.php';
require_once APPPATH.'core/cestabasica.php';

class CestaBasicaController extends PHPController{
	public function __construct(){
		parent::__construct();
	
		$this->load->model('generic_model');
		$this->load->model('associate_model');
		$this->load->model('cestabasica_model');
	}

	public function associateDonationManagementPage(){
		if(!$this->checkSession())
			redirect("Login/index");
		
		try{
			$assocId = $this->input->get("id");
			if(strlen($assocId) == 0)
				throw new Exception("Associado invalido");
			
			$associado = $this->associate_model->getAssociateById($assocId);
			$donations = $this->cestabasica_model->getDonationsByAssociate($associado);
			
			$this->data->associate = $associado;
			$this->data->donations = $donations;
			$this->data->operator  = $this->session->userdata("operator");
			$this->loadView("cesta/associateView", $this->data);
		} catch(Exception $ex) {
			$this->data->exception = $ex->getMessage();
			$this->data->operator = $this->session->userdata("operator");
			$this->loadView("mainviews/error/genericpage", $this->data);
		}
	}
	
	public function newDonationByAssociate(){
		if(!$this->checkSession())
			redirect("Login/index");
		
		try{
			$assocId =  $this->input->post("idassoc");
			$codCesta = $this->input->post("codcesta");
			$quantity = $this->input->post("quantity");
			
			$this->generic_model->openTransaction();
			$this->cestabasica_model->insertAssociateDonation($assocId, $codCesta, $quantity);
			$this->generic_model->commitTransaction();
				
			redirect("CestaBasicaController/associateDonationManagementPage?id=".$assocId);
		} catch (Exception $ex) {
			$this->generic_model->rollbackTransaction();
			$this->data->exception = $ex->getMessage();
			$this->data->operator = $this->session->userdata("operator");
			$this->loadView("mainviews/error/genericpage", $this->data);
		}
	}
	
	public function updateDonationsQuantity(){
		if(!$this->checkSession())
			redirect("Login/index");
		
		try{
			$assocId =  $this->input->post("idassoc");
			$codCesta = $this->input->post("codcesta");
			$quantity = $this->input->post("quantity");
			
			$this->generic_model->openTransaction();
			$this->cestabasica_model->updateAssociateDonation($assocId, $codCesta, $quantity);
			$this->generic_model->commitTransaction();
			
			redirect("CestaBasicaController/associateDonationManagementPage?id=".$assocId);
		} catch (Exception $ex) {
			$this->generic_model->rollbackTransaction();
			$this->data->exception = $ex->getMessage();
			$this->data->operator = $this->session->userdata("operator");
			$this->loadView("mainviews/error/genericpage", $this->data);
		}
	}
	
}
?>