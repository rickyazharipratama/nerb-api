<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class authentication{
    private $_ci;

    public function __construct(){
        $this->_ci = & get_instance();
        $this->_ci->load->config('custom_config');
        date_default_timezone_set("Asia/Jakarta");
    }

    public function isPaired($token){
        $date = gmdate("YmdHi");
        $pass = $this->_ci->config->item("pairingSession");
        $sess =  hash('sha256', $pass."-".$date);
        // var_dump($pass."-".$date);
        // var_dump($sess);
        // var_dump($token);
        //exit;
        if(strtoupper($sess) == strtoupper($token)){
            return true;
        }
        return false;
    }
}