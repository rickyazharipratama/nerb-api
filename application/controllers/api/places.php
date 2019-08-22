<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class places extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->library(array('request_lib','authentication'));
        $this->load->helper(array('url'));
        $this->load->config("custom_config");
    }

    //get
    //category
    public function getCategories(){
        $res=[];
        $resCode = 200;
        if($this->input->get("token") == false){
            $resCode = 400;
            $res = array(
                "status" => STATUS_FAILED,
                "desc" => "bad request"
            );
        }else{
            $token = $this->input->get("token");
            if($this->authentication->isPaired($token)){
                $res = array(
                    "status"=>STATUS_SUCCESS,
                    "desc"=>"Berhasil",
                    "result"=> json_decode($this->config->item("categories"))
                );
            }else{
                $resCode = 401;
                $res = array(
                    "status"=>STATUS_FAILED,
                    "desc"=>"unauthorized"
                );
            }
        }
        $this->output
            ->set_status_header($resCode)
            ->set_content_type('application/json')
            ->set_header("Access-Control-Allow-Origin:".$this->config->item("corsDomain"))
            ->set_header("Access-Control-Allow-Credentials: true")
            ->set_header("Access-Control-Max-Age: 120000")
            ->set_header("Access-Control-Allow-Methods: GET,POST,DELETE,OPTIONS")
            ->set_header("Access-Control-Allow-Headers:Content-Type,Accept")
            ->set_output(json_encode($res));
    }

    //get
    //places-category
    public function getCategoryPlace(){
        $res=[];
        $resCode = 200;
        if($this->input->get("token") == false){
            $resCode = 400;
            $res = array(
                "status" => STATUS_FAILED,
                "desc" => "bad request"
            );
        }else{
            $token = $this->input->get("token");
            if($this->authentication->isPaired($token)){
                $res = array(
                    "status"=>STATUS_SUCCESS,
                    "desc"=>"Berhasil",
                    "result"=> json_decode($this->config->item("places"))
                );
            }else{
                $resCode = 401;
                $res = array(
                    "status"=>STATUS_FAILED,
                    "desc"=>"unauthorized"
                );
            }
        }
        $this->output
            ->set_status_header($resCode)
            ->set_content_type('application/json')
            ->set_header("Access-Control-Allow-Origin:".$this->config->item("corsDomain"))
            ->set_header("Access-Control-Allow-Credentials: true")
            ->set_header("Access-Control-Max-Age: 120000")
            ->set_header("Access-Control-Allow-Methods: GET,POST,DELETE,OPTIONS")
            ->set_header("Access-Control-Allow-Headers:Content-Type,Accept")
            ->set_output(json_encode($res));
    }

    //get
    //places-category
    //params
        //token
        //next - optional
        //cat - optional
        //in
    public function getListPlace(){
        $res=[];
        $statusCode = 200;
        $endpoint = null;
        if($this->input->get("token") == false){
            $statusCode = 400;
            $res = array(
                "status" => STATUS_FAILED,
                "desc" => "bad request"
            );
        }else{
            $token = $this->input->get('token');
            if($this->authentication->isPaired($token)){
                if($this->input->get('next') == false){
                    if($this->input->get('in') == false){
                        $res = array(
                            "status" => STATUS_FAILED,
                            "desc" => "bad request"
                        );
                    }else{
                        $cat = null;
                        $data = array(
                            "app_id" => $this->config->item("appId"),
                            "app_code" => $this->config->item("appCode"),
                            "in" => $this->input->get("in")
                        );
                        $endpoint = BASE_URL.API_DISCOVER_PLACES;
                        if($this->input->get("cat") != false){
                            $data["cat"] = $this->input->get("cat");
                        }
                        $result = $this->request_lib->doGet($data,$endpoint);
                        if($result['status'] == STATUS_SUCCESS){
                            $res = array(
                                "status" => $result['status'],
                                "desc"=> $result['desc'],
                                "result" => $result['content']
                            );
                            $statusCode = $result['statusCode'];
                        }else{
                            $res = array(
                                "status" => $result['status'],
                                "desc"=> $result['desc']
                            );
                            $statusCode = $result['statusCode'];
                        }
                    }
                }else{
                    $endpoint = urldecode($this->input->get('next'));
                    $result = $this->request_lib->doGet(null,$endpoint);
                    if($result['status'] == STATUS_SUCCESS){
                        $res = array(
                            "status" => $result['status'],
                            "desc"=> $result['desc'],
                            "result"=> $result['content']
                        );
                        $statusCode = $result['statusCode'];
                    }else{
                        $res = array(
                            "status" => $result['status'],
                            "desc"=> $result['desc'],
                            "result" => $result['content']
                        );
                        $statusCode = $result['statusCode'];
                    }
                }
            }else{
                $statusCode = 401;
                $res = array(
                    "status"=>STATUS_FAILED,
                    "desc"=>"unauthorized"
                );
            }
        }
        $this->output
            ->set_status_header($statusCode)
            ->set_content_type('application/json')
            ->set_header("Access-Control-Allow-Origin:".$this->config->item("corsDomain"))
            ->set_header("Access-Control-Allow-Credentials: true")
            ->set_header("Access-Control-Max-Age: 120000")
            ->set_header("Access-Control-Allow-Methods: GET,POST,DELETE,OPTIONS")
            ->set_header("Access-Control-Allow-Headers:Content-Type,Accept")
            ->set_output(json_encode($res));
    }
}