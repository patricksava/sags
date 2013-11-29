<?php
require_once APPPATH.'core/club.php';

class Club_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}
	
	public function getClubInfo($club, $month, $year){
		$sql = "SELECT * FROM dadosclube WHERE codclube = ? AND mes = ? AND ano = ?";
		$result = $this->db->query($sql, array($club, $month, $year));
		$club = null;
		if($result->num_rows()>0)
			$club = $this->createClub($result->result_array());
		else 
			$club = $this->createClub(array('codclube'=>$club, 'mes'=>$month, 'ano'=>$year, 'valor'=>0, 'titulo'=>'Nao definido'));
		
		return $club;
	}
	
	public function registerInBookClub($id){
		$sql = "INSERT INTO frequenta(matriculaassociado, codclube, mes, ano) VALUES (?,?,?,?)";
		$result = $this->db->query($sql, array($id, 'Clube Livro', date('m'), date('Y')));
		
		if($result)
			return true;
		else
			throw new Exception("Falha ao cadastrar participante");
	}
	
	public function registerInArtClub($id){
		$sql = "INSERT INTO frequenta(matriculaassociado, codclube, mes, ano) VALUES (?,?,?,?)";
		$result = $this->db->query($sql, array($id, 'Clube Arte', date('m'), date('Y')));
	
		if($result)
			return true;
		else
			throw new Exception("Falha ao cadastrar participante");
	}
	
	public function createClub($res){
		foreach($res as $arr)
			return new Club(
					$arr['codclube'],
					$arr['mes'],
					$arr['ano'],
					$arr['valor'],
					$arr['titulo']
				);
	}
}
?>