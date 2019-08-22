<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    /*Index page */
    public function index() {
        $res = array(
            "status" => STATUS_FAILED,
            "desc" => unauthorized
        );
        $this->output
        ->set_status_header(401)
        ->set_content_type('application/json')
        ->set_header("Access-Control-Allow-Origin:".$this->config->item("corsDomain"))
        ->set_header("Access-Control-Allow-Credentials: true")
        ->set_header("Access-Control-Max-Age: 120000")
        ->set_header("Access-Control-Allow-Methods: GET,POST,DELETE,OPTIONS")
        ->set_header("Access-Control-Allow-Headers:Content-Type,Accept")
        ->set_output(json_encode($res));
    }


   
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */