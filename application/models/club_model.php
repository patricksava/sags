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
		if($result->num_rows()>0){
			$temp = $result->result_array();
			$club = $this->createClub($temp[0]);
		}
		else 
			$club = $this->createClub(array('codclube'=>$club, 'mes'=>$month, 'ano'=>$year, 'valor'=>0, 'titulo'=>'Nao definido'));
		
		return $club;
	}
	
	public function getLast5ProductsClubBook(){
		$sql = "SELECT * FROM clube_livro_ultimos_5_meses";
		$result = $this->db->query($sql);
		$club = null;
		if($result->num_rows()>0)
			foreach($result->result_array() as $row){
				$club[] = $this->createClub($row);
				$club[count($club)-1]->setParticipants($row['count']);
			}
	
		return $club;
	}
	
	public function getLast5ProductsClubArt(){
		$sql = "SELECT * FROM clube_arte_ultimos_5_meses";
		$result = $this->db->query($sql);
		$club = null;
		if($result->num_rows()>0)
			foreach($result->result_array() as $row){
				$club[] = $this->createClub($row);
				$club[count($club)-1]->setParticipants($row['count']);
			}
	
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
	
	public function insertNewProduct($club){
		$sql = "INSERT INTO dadosclube VALUES(?,?,?,?,?)";
		$arrValues = array($club->getClubCode(), $club->getMonth(), $club->getYear(), $club->getPrice(), $club->getTitle());
		$result = $this->db->query($sql, $arrValues);
		if($result)
			return true;
		else
			throw new Exception("Falha ao inserir novo produto do clube");
	}
	
	public function createClub($arr){
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