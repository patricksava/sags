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