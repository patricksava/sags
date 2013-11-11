<?php
class generic_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	
	public function openTransaction(){
		$this->db->query("Begin Transaction");
	}
	
	public function commitTransaction(){
		$this->db->query("Commit");
	}
	
	public function rollbackTransaction(){
		$this->db->query("Rollback");
	}
}
?>