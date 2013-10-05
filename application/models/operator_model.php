<?php

require_once APPPATH.'core/operator.php';

class Operator_model extends CI_Model{
	
	public function __construct() {
		parent::__construct();
	}
	
	public function loginOperator($login, $senha){
		$op = null;
		
		$query = "SELECT * FROM operador WHERE login = '".$login."' AND senha = '".$senha."'";
		$rows = $this->db->query($query);
		
		if($rows->num_rows() == 0){
			throw new Exception("Login e/ou Senha incorretos");
		}
		
		$row = $rows->row();
		$op = new Operator($row->login, $row->senha, $row->nome);
		
		return $op;
	}
	
}
?>