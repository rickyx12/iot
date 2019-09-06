<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SoilMoisture extends CI_Controller {

 	public function __construct() {
 		parent::__construct();
 		$this->load->helper('url');
 		$this->load->model('parameters_model');
 	}

	public function index() {

                $data = array(
                        "page" => "soilMoist-nav"
                );                

        	$this->load->view('includes/header',$data);
        	$this->load->view('soilMoisture/index');
        	$this->load->view('includes/footer');
        }

        public function dataTableJSON() {

                // $this->isLoggedIn();

                $draw = $this->input->get('draw');
                $start = $this->input->get('start');
                $length = $this->input->get('length');
                $search = $this->input->get('search')['value'];

                $data = array(
                    "draw" => $draw,
                    "recordsTotal" => $this->parameters_model->getSoilMoisture(null,null,null)->num_rows(),
                    "recordsFiltered" => $this->parameters_model->getSoilMoisture(null,null,null)->num_rows(),
                    "data" => $this->parameters_model->getSoilMoisture($start,$length,$search)->result()
                );
                echo json_encode($data);            
        }

}
