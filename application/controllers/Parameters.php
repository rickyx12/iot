<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parameters extends CI_Controller {

 	public function __construct() {
 		parent::__construct();
 		$this->load->helper('url');
 		$this->load->model('parameters_model');
 	}


 	public function create() {

		$data = file_get_contents("php://input");

		$output = explode("&", $data);

		$temp = explode("=", $output[0]);
		$humidity = explode("=", $output[1]);
		$soilMoist = explode("=", $output[2]);
		$pH = explode("=", $output[3]);		
		$soilType = explode("=", $output[4]);
		$soilType1 = explode("=", $output[5]);
		$soilType2 = explode("=", $output[6]);
		$longitude1 = explode("=", $output[7]);
		$longitude2 = explode("=", $output[8]);
		$latitude1 = explode("=", $output[9]);
		$latitude2 = explode("=", $output[10]);

		$data = array(
				$temp[1],
				$humidity[1],
				$soilMoist[1],
				$pH[1],
				$soilType[1],
				$soilType1[1],
				$soilType2[1],
				$longitude1[1].".".$longitude2[1],
				$latitude1[1].".".$latitude2[1],
				date("Y-m-d H:i:s")
			);

		$this->parameters_model->create($data);

		echo "Data Added";
 	}


    public function getLatestParametersJSON() {
        // $this->isLoggedIn();
		$data = $this->parameters_model->getLatestParameters(null,null,null)->result();
        $dataArr = [];

        foreach($data as $d) {
        	$dataArr[$d->id] = array(
        							"details" => $d->details,
        							"temperature" => $d->temp,
        							"humidity" => $d->humidity,
        							"soil_moisture" => $d->soil_moisture,
        							"ph" => $d->ph,
        							"soil_type" => $d->soil_type,
        							"soil_type1" => $d->soil_type1,
        							"soil_type2" => $d->soil_type2
        						);
        }

        echo json_encode($dataArr);            
    }

    public function dataTableJSON() {

            // $this->isLoggedIn();

            $draw = $this->input->get('draw');
            $start = $this->input->get('start');
            $length = $this->input->get('length');
            $search = $this->input->get('search')['value'];

            $data = array(
                "draw" => $draw,
                "recordsTotal" => $this->parameters_model->getLatestParameters(null,null,null)->num_rows(),
                "recordsFiltered" => $this->parameters_model->getLatestParameters(null,null,null)->num_rows(),
                "data" => $this->parameters_model->getLatestParameters($start,$length,$search)->result()
            );
            echo json_encode($data);            
    }

    public function info() {
    	echo phpinfo();
    }

}
