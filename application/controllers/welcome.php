<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->library(array('session','auth_lib'));
        $this->load->helper(array('cookie','url'));
    }

    /*Index page */
    public function index() {
		if($this->auth_lib->_isUserLogIn()){
            redirect(base_url()."main");
            die();
        }
        $data['error'] = false;
        $isError = get_cookie("error");
        if($isError){
            $data['error'] = true;
            $data['errorMessage'] = unserialize(get_cookie("error"));
            delete_cookie("error");
        }
        //var_dump(file_get_contents($this->config->item('pubKeyPath')));

        $this->load->view('welcome_message',$data);
    }


   
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */