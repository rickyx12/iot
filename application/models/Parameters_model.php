<?php

class Parameters_model extends CI_Model {

    public function __construct() {
            $this->load->database();
    }

	public function create($data) {
		$sql = "INSERT INTO parameters(temp,humidity,soil_moisture,ph,soil_type,soil_type1,soil_type2,longitude,latitude,details) VALUES (?,?,?,?,?,?,?,?,?,?)";
		$this->db->query($sql, $data);			
	}

	public function getLatestParameters($start,$limit,$search) {

		$start1 = $this->db->escape_str($start);
		$limit1 = $this->db->escape_str($limit);
		$search1 = $this->db->escape_str($search);

		if($limit > 0 || $limit != '') {
			if($search1 != "") {

				$sql = "SELECT temp,humidity,soil_moisture,ph,soil_type,soil_type1,soil_type2,longitude,latitude,details  
						FROM parameters 
						WHERE (soil_type LIKE '".$search1."%' OR soil_type1 LIKE '".$search1."' OR soil_type2 LIKE '".$search1."')
						ORDER BY details DESC 
						LIMIT ".$start1.",".$limit1;
				
				return $this->db->query($sql);	

			}else {

				$sql = "SELECT temp,humidity,soil_moisture,ph,soil_type,soil_type1,soil_type2,longitude,latitude,details 
						FROM parameters 
						ORDER BY details DESC 
						LIMIT ".$start1.",".$limit1;
			}
		}else {

			$sql = "SELECT * FROM parameters ORDER BY details DESC LIMIT 0,10 ";	
		}

		return $this->db->query($sql);
	}


	public function getTemperature($start,$limit,$search) {

		$start1 = $this->db->escape_str($start);
		$limit1 = $this->db->escape_str($limit);
		$search1 = $this->db->escape_str($search);
		
		if($limit > 0 || $limit != '') {
			if($search1 != "") {
				
				$sql = "
				SELECT temp,soil_type,soil_type1,soil_type2,details,longitude,latitude 
				FROM parameters 
				WHERE details
				LIKE '".$search1."%' 
				AND status = 1 
				ORDER BY details DESC 
				LIMIT ".$start1.",".$limit1;
			
			}else {
				
				$sql = "
				SELECT temp,soil_type,soil_type1,soil_type2,details,longitude,latitude 
				FROM parameters 
				WHERE status = 1 
				ORDER BY details DESC 
				LIMIT ".$start1.",".$limit1;	
			}	
		}else {
			$sql = "SELECT temp,soil_type,soil_type1,soil_type2,details,longitude,latitude FROM parameters";
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
				SELECT humidity,soil_type,soil_type1,soil_type2,details,longitude,latitude 
				FROM parameters 
				WHERE details
				LIKE '".$search1."%' 
				AND status = 1 
				ORDER BY details DESC 
				LIMIT ".$start1.",".$limit1;
			
			}else {
				
				$sql = "
				SELECT humidity,soil_type,soil_type1,soil_type2,details,longitude,latitude 
				FROM parameters 
				WHERE status = 1 
				ORDER BY details DESC 
				LIMIT ".$start1.",".$limit1;	
			}	
		}else {
			$sql = "SELECT humidity,soil_type,soil_type1,soil_type2,details,longitude,latitude FROM parameters";
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
				SELECT soil_moisture,soil_type,soil_type1,soil_type2,details,longitude,latitude 
				FROM parameters 
				WHERE details
				LIKE '".$search1."%' 
				AND status = 1 
				ORDER BY details DESC 
				LIMIT ".$start1.",".$limit1;
			
			}else {
				
				$sql = "
				SELECT soil_moisture,soil_type,soil_type1,soil_type2,details,longitude,latitude 
				FROM parameters 
				WHERE status = 1 
				ORDER BY details DESC 
				LIMIT ".$start1.",".$limit1;	
			}	
		}else {
			$sql = "SELECT soil_moisture,soil_type,soil_type1,soil_type2,details,longitude,latitude FROM parameters";
		}
		return $this->db->query($sql);
	}


	public function getPh($start,$limit,$search) {

		$start1 = $this->db->escape_str($start);
		$limit1 = $this->db->escape_str($limit);
		$search1 = $this->db->escape_str($search);
		
		if($limit > 0 || $limit != '') {
			if($search1 != "") {
				
				$sql = "
				SELECT ph,soil_type,soil_type1,soil_type2,details,longitude,latitude 
				FROM parameters 
				WHERE details
				LIKE '".$search1."%' 
				AND status = 1 
				ORDER BY details DESC 
				LIMIT ".$start1.",".$limit1;
			
			}else {
				
				$sql = "
				SELECT ph,soil_type,soil_type1,soil_type2,details,longitude,latitude 
				FROM parameters 
				WHERE status = 1 
				ORDER BY details DESC 
				LIMIT ".$start1.",".$limit1;	
			}	
		}else {
			$sql = "SELECT ph,soil_type,soil_type1,soil_type2,details FROM parameters";
		}
		return $this->db->query($sql);
	}

}