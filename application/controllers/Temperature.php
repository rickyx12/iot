<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Temperature extends CI_Controller {

 	public function __construct() {
 		parent::__construct();
 		$this->load->helper('url');
 		$this->load->model('parameters_model');
 	}

	public function index() {

                $data = array(
                        "page" => "temperature-nav"
                );                

        	$this->load->view('includes/header',$data);
        	$this->load->view('temperature/index');
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
                    "recordsTotal" => $this->parameters_model->getTemperature(null,null,null)->num_rows(),
                    "recordsFiltered" => $this->parameters_model->getTemperature(null,null,null)->num_rows(),
                    "data" => $this->parameters_model->getTemperature($start,$length,$search)->result()
                );
                echo json_encode($data);            
        }

}
