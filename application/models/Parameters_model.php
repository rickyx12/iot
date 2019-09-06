<?php

class Parameters_model extends CI_Model {

    public function __construct() {
            $this->load->database();
    }

	public function create($data) {
		$sql = "INSERT INTO parameters(temp,humidity,soil_moisture,details) VALUES (?,?,?,?)";
		$this->db->query($sql, $data);			
	}

	public function getLatestParameters() {

		$sql = "SELECT * FROM parameters ORDER BY details DESC LIMIT 0,10 ";
		return $this->db->query($sql);	
	}


	public function getTemperature($start,$limit,$search) {

		$start1 = $this->db->escape_str($start);
		$limit1 = $this->db->escape_str($limit);
		$search1 = $this->db->escape_str($search);
		
		if($limit > 0 || $limit != '') {
			if($search1 != "") {
				
				$sql = "
				SELECT temp,details 
				FROM parameters 
				WHERE details
				LIKE '".$search1."%' 
				AND status = 1 
				ORDER BY details DESC 
				LIMIT ".$start1.",".$limit1;
			
			}else {
				
				$sql = "
				SELECT temp,details 
				FROM parameters 
				WHERE status = 1 
				ORDER BY details DESC 
				LIMIT ".$start1.",".$limit1;	
			}	
		}else {
			$sql = "SELECT temp,details FROM parameters";
		}
		return $this->db->query($sql);
	}


	public function getHumidity($start,$limit,$search) {

		$start1 = $this->db->escape_str($start);
		$limit1 = $this->db->escape_str($limit);
		$search1 = $this->db->escape_str($search);
		
		if($limit > 0 || $limit != '') {
			if($search1 != "") {
				
				$sql = "
				SELECT humidity,details 
				FROM parameters 
				WHERE details
				LIKE '".$search1."%' 
				AND status = 1 
				ORDER BY details DESC 
				LIMIT ".$start1.",".$limit1;
			
			}else {
				
				$sql = "
				SELECT humidity,details 
				FROM parameters 
				WHERE status = 1 
				ORDER BY details DESC 
				LIMIT ".$start1.",".$limit1;	
			}	
		}else {
			$sql = "SELECT humidity,details FROM parameters";
		}
		return $this->db->query($sql);
	}


	public function getSoilMoisture($start,$limit,$search) {

		$start1 = $this->db->escape_str($start);
		$limit1 = $this->db->escape_str($limit);
		$search1 = $this->db->escape_str($search);
		
		if($limit > 0 || $limit != '') {
			if($search1 != "") {
				
				$sql = "
				SELECT soil_moisture,details 
				FROM parameters 
				WHERE details
				LIKE '".$search1."%' 
				AND status = 1 
				ORDER BY details DESC 
				LIMIT ".$start1.",".$limit1;
			
			}else {
				
				$sql = "
				SELECT soil_moisture,details 
				FROM parameters 
				WHERE status = 1 
				ORDER BY details DESC 
				LIMIT ".$start1.",".$limit1;	
			}	
		}else {
			$sql = "SELECT soil_moisture,details FROM parameters";
		}
		return $this->db->query($sql);
	}

}