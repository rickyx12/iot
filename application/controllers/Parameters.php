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

		$data = array(
				$temp[1],
				$humidity[1],
				$soilMoist[1]
			);

		$this->parameters_model->create($data);

		echo "Data Added";
 	}


    public function getLatestParametersJSON() {
        // $this->isLoggedIn();
		$data = $this->parameters_model->getLatestParameters()->result();
        $dataArr = [];

        foreach($data as $d) {
        	$dataArr[$d->id] = array(
        							"details" => $d->details,
        							"temperature" => $d->temp,
        							"humidity" => $d->humidity,
        							"soil_moisture" => $d->soil_moisture
        						);
        }

        echo json_encode($dataArr);            
    }

    public function info() {
    	echo phpinfo();
    }

}
