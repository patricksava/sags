<?php
require_once APPPATH.'core/PHPController.php';
require_once APPPATH.'core/associate.php';
require_once APPPATH.'core/partner.php';
require_once APPPATH.'core/donation.php';

class DonationController extends PHPController{
	public function __construct(){
		parent::__construct();
	
		$this->load->model('generic_model');
		$this->load->model('associate_model');
		$this->load->model('donation_model');
	}
	
	public function associateDonationForm(){
		if(!$this->checkSession())
			redirect("Login/index");
		try{
			$this->data->operator = $this->session->userdata("operator");
			$this->data->associate = $this->associate_model->getAssociateById($this->input->get("id"));
			$this->loadView("donation/associateForm", $this->data);
		} catch (Exception $ex){
			$this->data->operator = $this->session->userdata("operator");
			$this->loadView("mainviews/error/associateNotFound", $this->data);
		}
	}
	public function registerAssociateDonation(){
		if(!$this->checkSession())
			redirect("Login/index");
		
		try{
			$donation = new Donation(
						null, 
						$this->input->post("donationAssociateId"), 
						$this->input->post("donationDescription"), 
						$this->input->post("donationValue")
					);
			$this->generic_model->openTransaction();
			$this->donation_model->insertNewDonation($donation);
			$this->generic_model->commitTransaction();
			$this->data->operator = $this->session->userdata("operator");
			$this->loadView("donation/donationRegistered", $this->data);
		}catch(Exception $ex){
			$this->generic_model->rollbackTransaction();
			$this->data->exception = $ex->getMessage();
			$this->data->operator = $this->session->userdata("operator");
			$this->loadView("mainviews/error/genericpage", $this->data);
		}
	}
	
	public function donationForm(){
		if(!$this->checkSession())
			redirect("Login/index");
		
		$this->data->operator = $this->session->userdata("operator");
		$this->loadView("donation/donationForm", $this->data);
	}
	
	public function registerDonation(){
		if(!$this->checkSession())
			redirect("Login/index");
		
		$valorEst = $this->input->post("donationValue");
		$descricao = $this->input->post("donationDescription");
		
		$doacao = new Donation(null, null, $descricao, $valorEst);
		
		$this->donation_model->insertDonationWithoutAssociateId($doacao);
		
		$this->data->operator = $this->session->userdata("operator");
		$this->loadView("donation/donationRegistered", $this->data);
	}
}
?>