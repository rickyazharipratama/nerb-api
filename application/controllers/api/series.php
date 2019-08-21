<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class series extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->library(array('request_lib'));
        $this->load->helper(array('url'));
        $this->load->config("custom_config");
    }


    //REQUEST GET
    // page
    // lang
    public function tvOnAir(){
        $res = null;
        if($this->input->get() == false){
            $res = array(
                "status" => STATUS_FAILED,
                "desc" => DESC_INVALID_REQUEST,
                "statusCode"=> STATUS_CODE_BAD_REQUEST
            );
        }else if($this->input->get('page') == false || $this->input->get("lang") == false){
            $res = array(
                "status" => STATUS_FAILED,
                "desc" => DESC_INVALID_REQUEST,
                "statusCode"=> STATUS_CODE_BAD_REQUEST
            );
        }else{
            $data = array(
                "api_key" => $this->config->item("moviedbApiKey"),
                "language" => $this->input->get("lang"),
                "page" => $this->input->get("page")
            );
            $res = $this->request_lib->doGet($data,API_TV_ON_AIR);
        }
        $out = array(
            'status' => $res['status'],
            'desc' => $res['desc'],
            'content' => $res['content']
        );
        $this->output
            ->set_status_header($res['statusCode'])
            ->set_content_type('application/json')
            ->set_header("Access-Control-Allow-Origin:".$this->config->item("corsDomain"))
            ->set_header("Access-Control-Allow-Credentials: true")
            ->set_header("Access-Control-Max-Age: 120000")
            ->set_header("Access-Control-Allow-Methods: GET,POST,DELETE,OPTIONS")
            ->set_header("Access-Control-Allow-Headers:Content-Type,Accept")
            ->set_output(json_encode($out));
    }


    public function latestSeries(){
        $res = null;
        if($this->input->get() == false){
            $res = array(
                "status" => STATUS_FAILED,
                "desc" => DESC_INVALID_REQUEST,
                "statusCode"=> STATUS_CODE_BAD_REQUEST
            );
        }else if($this->input->get("lang") == false){
            $res = array(
                "status" => STATUS_FAILED,
                "desc" => DESC_INVALID_REQUEST,
                "statusCode"=> STATUS_CODE_BAD_REQUEST
            );
        }else{
            $data = array(
                "api_key" => $this->config->item("moviedbApiKey"),
                "language" => $this->input->get("lang")
            );
            $res = $this->request_lib->doGet($data,API_TV_LATEST_SERIES);
        }
        $out = array(
            'status' => $res['status'],
            'desc' => $res['desc'],
            'content' => $res['content']
        );
        $this->output
            ->set_status_header($res['statusCode'])
            ->set_content_type('application/json')
            ->set_header("Access-Control-Allow-Origin:".$this->config->item("corsDomain"))
            ->set_header("Access-Control-Allow-Credentials: true")
            ->set_header("Access-Control-Max-Age: 120000")
            ->set_header("Access-Control-Allow-Methods: GET,POST,DELETE,OPTIONS")
            ->set_header("Access-Control-Allow-Headers:Content-Type,Accept")
            ->set_output(json_encode($out));
    }


    //REQUEST GET
    // page
    // lang
    public function popularSeries(){
        $res = null;
        if($this->input->get() == false){
            $res = array(
                "status" => STATUS_FAILED,
                "desc" => DESC_INVALID_REQUEST,
                "statusCode"=> STATUS_CODE_BAD_REQUEST
            );
        }else if($this->input->get('page') == false || $this->input->get("lang") == false){
            $res = array(
                "status" => STATUS_FAILED,
                "desc" => DESC_INVALID_REQUEST,
                "statusCode"=> STATUS_CODE_BAD_REQUEST
            );
        }else{
            $data = array(
                "api_key" => $this->config->item("moviedbApiKey"),
                "language" => $this->input->get("lang"),
                "page" => $this->input->get("page")
            );
            $res = $this->request_lib->doGet($data,API_TV_POPULAR);
        }
        $out = array(
            'status' => $res['status'],
            'desc' => $res['desc'],
            'content' => $res['content']
        );
        $this->output
            ->set_status_header($res['statusCode'])
            ->set_content_type('application/json')
            ->set_header("Access-Control-Allow-Origin:".$this->config->item("corsDomain"))
            ->set_header("Access-Control-Allow-Credentials: true")
            ->set_header("Access-Control-Max-Age: 120000")
            ->set_header("Access-Control-Allow-Methods: GET,POST,DELETE,OPTIONS")
            ->set_header("Access-Control-Allow-Headers:Content-Type,Accept")
            ->set_output(json_encode($out));
    }


    //REQUEST GET
    // page
    // lang
    public function topRatedSeries(){
        $res = null;
        if($this->input->get() == false){
            $res = array(
                "status" => STATUS_FAILED,
                "desc" => DESC_INVALID_REQUEST,
                "statusCode"=> STATUS_CODE_BAD_REQUEST
            );
        }else if($this->input->get('page') == false || $this->input->get("lang") == false){
            $res = array(
                "status" => STATUS_FAILED,
                "desc" => DESC_INVALID_REQUEST,
                "statusCode"=> STATUS_CODE_BAD_REQUEST
            );
        }else{
            $data = array(
                "api_key" => $this->config->item("moviedbApiKey"),
                "language" => $this->input->get("lang"),
                "page" => $this->input->get("page")
            );
            $res = $this->request_lib->doGet($data,API_TV_TOP_RATED);
        }
        $out = array(
            'status' => $res['status'],
            'desc' => $res['desc'],
            'content' => $res['content']
        );
        $this->output
            ->set_status_header($res['statusCode'])
            ->set_content_type('application/json')
            ->set_header("Access-Control-Allow-Origin:".$this->config->item("corsDomain"))
            ->set_header("Access-Control-Allow-Credentials: true")
            ->set_header("Access-Control-Max-Age: 120000")
            ->set_header("Access-Control-Allow-Methods: GET,POST,DELETE,OPTIONS")
            ->set_header("Access-Control-Allow-Headers:Content-Type,Accept")
            ->set_output(json_encode($out));
    }


    //GET
    //seriesId
    //lang
    public function seriesDetail(){
        $res = null;
        if($this->input->get() == false){
            $res = array(
                "status" => STATUS_FAILED,
                "desc" => DESC_INVALID_REQUEST,
                "statusCode"=> STATUS_CODE_BAD_REQUEST
            );
        }else if($this->input->get('seriesId') == false || $this->input->get("lang") == false){
            $res = array(
                "status" => STATUS_FAILED,
                "desc" => DESC_INVALID_REQUEST,
                "statusCode"=> STATUS_CODE_BAD_REQUEST
            );
        }else{
            $data = array(
                "api_key" => $this->config->item("moviedbApiKey"),
                "language" => $this->input->get("lang"),
            );
            $res = $this->request_lib->doGet($data,str_replace("__id__",$this->input->get("seriesId"),API_TV_DETAIL));
        }
        $out = array(
            'status' => $res['status'],
            'desc' => $res['desc'],
            'content' => $res['content']
        );
        $this->output
            ->set_status_header($res['statusCode'])
            ->set_content_type('application/json')
            ->set_header("Access-Control-Allow-Origin:".$this->config->item("corsDomain"))
            ->set_header("Access-Control-Allow-Credentials: true")
            ->set_header("Access-Control-Max-Age: 120000")
            ->set_header("Access-Control-Allow-Methods: GET,POST,DELETE,OPTIONS")
            ->set_header("Access-Control-Allow-Headers:Content-Type,Accept")
            ->set_output(json_encode($out));
    }

    //GET
    //seriesId
    public function seriesKeyword(){
        $res = null;
        if($this->input->get() == false){
            $res = array(
                "status" => STATUS_FAILED,
                "desc" => DESC_INVALID_REQUEST,
                "statusCode"=> STATUS_CODE_BAD_REQUEST
            );
        }else if($this->input->get('seriesId') == false){
            $res = array(
                "status" => STATUS_FAILED,
                "desc" => DESC_INVALID_REQUEST,
                "statusCode"=> STATUS_CODE_BAD_REQUEST
            );
        }else{
            $data = array(
                "api_key" => $this->config->item("moviedbApiKey")
            );
            $res = $this->request_lib->doGet($data,str_replace("__id__",$this->input->get("seriesId"),API_TV_KEYWORDS));
        }
        $out = array(
            'status' => $res['status'],
            'desc' => $res['desc'],
            'content' => $res['content']
        );
        $this->output
            ->set_status_header($res['statusCode'])
            ->set_content_type('application/json')
            ->set_header("Access-Control-Allow-Origin:".$this->config->item("corsDomain"))
            ->set_header("Access-Control-Allow-Credentials: true")
            ->set_header("Access-Control-Max-Age: 120000")
            ->set_header("Access-Control-Allow-Methods: GET,POST,DELETE,OPTIONS")
            ->set_header("Access-Control-Allow-Headers:Content-Type,Accept")
            ->set_output(json_encode($out));
    }

    //REQUEST GET
    // page
    // lang
    // series Id
    public function recommendationBySeries(){
        $res = null;
        if($this->input->get() == false){
            $res = array(
                "status" => STATUS_FAILED,
                "desc" => DESC_INVALID_REQUEST,
                "statusCode"=> STATUS_CODE_BAD_REQUEST
            );
        }else if($this->input->get('page') == false || $this->input->get("lang") == false || $this->input->get("seriesId") == false){
            $res = array(
                "status" => STATUS_FAILED,
                "desc" => DESC_INVALID_REQUEST,
                "statusCode"=> STATUS_CODE_BAD_REQUEST
            );
        }else{
            $data = array(
                "api_key" => $this->config->item("moviedbApiKey"),
                "language" => $this->input->get("lang"),
                "page" => $this->input->get("page")
            );
            $res = $this->request_lib->doGet($data,str_replace("__id__",$this->input->get("seriesId"),API_TV_RECOMMENDATIONS));
        }
        $out = array(
            'status' => $res['status'],
            'desc' => $res['desc'],
            'content' => $res['content']
        );
        $this->output
            ->set_status_header($res['statusCode'])
            ->set_content_type('application/json')
            ->set_header("Access-Control-Allow-Origin:".$this->config->item("corsDomain"))
            ->set_header("Access-Control-Allow-Credentials: true")
            ->set_header("Access-Control-Max-Age: 120000")
            ->set_header("Access-Control-Allow-Methods: GET,POST,DELETE,OPTIONS")
            ->set_header("Access-Control-Allow-Headers:Content-Type,Accept")
            ->set_output(json_encode($out));
    }


    //REQUEST GET
    // page
    // lang
    // series Id
    public function reviewsBySeries(){
        $res = null;
        if($this->input->get() == false){
            $res = array(
                "status" => STATUS_FAILED,
                "desc" => DESC_INVALID_REQUEST,
                "statusCode"=> STATUS_CODE_BAD_REQUEST
            );
        }else if($this->input->get('page') == false || $this->input->get("lang") == false || $this->input->get("seriesId") == false){
            $res = array(
                "status" => STATUS_FAILED,
                "desc" => DESC_INVALID_REQUEST,
                "statusCode"=> STATUS_CODE_BAD_REQUEST
            );
        }else{
            $data = array(
                "api_key" => $this->config->item("moviedbApiKey"),
                "language" => $this->input->get("lang"),
                "page" => $this->input->get("page")
            );
            $res = $this->request_lib->doGet($data,str_replace("__id__",$this->input->get("seriesId"),API_TV_REVIEWS));
        }
        $out = array(
            'status' => $res['status'],
            'desc' => $res['desc'],
            'content' => $res['content']
        );
        $this->output
            ->set_status_header($res['statusCode'])
            ->set_content_type('application/json')
            ->set_header("Access-Control-Allow-Origin:".$this->config->item("corsDomain"))
            ->set_header("Access-Control-Allow-Credentials: true")
            ->set_header("Access-Control-Max-Age: 120000")
            ->set_header("Access-Control-Allow-Methods: GET,POST,DELETE,OPTIONS")
            ->set_header("Access-Control-Allow-Headers:Content-Type,Accept")
            ->set_output(json_encode($out));
    }

    //REQUEST GET
    // page
    // lang
    // series Id
    public function similarBySeries(){
        $res = null;
        if($this->input->get() == false){
            $res = array(
                "status" => STATUS_FAILED,
                "desc" => DESC_INVALID_REQUEST,
                "statusCode"=> STATUS_CODE_BAD_REQUEST
            );
        }else if($this->input->get('page') == false || $this->input->get("lang") == false || $this->input->get("seriesId") == false){
            $res = array(
                "status" => STATUS_FAILED,
                "desc" => DESC_INVALID_REQUEST,
                "statusCode"=> STATUS_CODE_BAD_REQUEST
            );
        }else{
            $data = array(
                "api_key" => $this->config->item("moviedbApiKey"),
                "language" => $this->input->get("lang"),
                "page" => $this->input->get("page")
            );
            $res = $this->request_lib->doGet($data,str_replace("__id__",$this->input->get("seriesId"),API_TV_SIMILAR));
        }
        $out = array(
            'status' => $res['status'],
            'desc' => $res['desc'],
            'content' => $res['content']
        );
        $this->output
            ->set_status_header($res['statusCode'])
            ->set_content_type('application/json')
            ->set_header("Access-Control-Allow-Origin:".$this->config->item("corsDomain"))
            ->set_header("Access-Control-Allow-Credentials: true")
            ->set_header("Access-Control-Max-Age: 120000")
            ->set_header("Access-Control-Allow-Methods: GET,POST,DELETE,OPTIONS")
            ->set_header("Access-Control-Allow-Headers:Content-Type,Accept")
            ->set_output(json_encode($out));
    }

    
    //REQUEST GET
    // lang
    // series Id
    public function trailerBySeries(){
        $res = null;
        if($this->input->get() == false){
            $res = array(
                "status" => STATUS_FAILED,
                "desc" => DESC_INVALID_REQUEST,
                "statusCode"=> STATUS_CODE_BAD_REQUEST
            );
        }else if($this->input->get("lang") == false || $this->input->get("seriesId") == false){
            $res = array(
                "status" => STATUS_FAILED,
                "desc" => DESC_INVALID_REQUEST,
                "statusCode"=> STATUS_CODE_BAD_REQUEST
            );
        }else{
            $data = array(
                "api_key" => $this->config->item("moviedbApiKey"),
                "language" => $this->input->get("lang")
            );
            $res = $this->request_lib->doGet($data,str_replace("__id__",$this->input->get("seriesId"),API_TV_TRAILERS));
        }
        $out = array(
            'status' => $res['status'],
            'desc' => $res['desc'],
            'content' => $res['content']
        );
        $this->output
            ->set_status_header($res['statusCode'])
            ->set_content_type('application/json')
            ->set_header("Access-Control-Allow-Origin:".$this->config->item("corsDomain"))
            ->set_header("Access-Control-Allow-Credentials: true")
            ->set_header("Access-Control-Max-Age: 120000")
            ->set_header("Access-Control-Allow-Methods: GET,POST,DELETE,OPTIONS")
            ->set_header("Access-Control-Allow-Headers:Content-Type,Accept")
            ->set_output(json_encode($out));
    }

    //REQUEST GET
    // lang
    // series Id
    //seasonId
    public function seasonBySeries(){
        $res = null;
        if($this->input->get() == false){
            $res = array(
                "status" => STATUS_FAILED,
                "desc" => DESC_INVALID_REQUEST,
                "statusCode"=> STATUS_CODE_BAD_REQUEST
            );
        }else if($this->input->get("lang") == false || $this->input->get("seriesId") == false || $this->input->get("seasonId") == false){
            $res = array(
                "status" => STATUS_FAILED,
                "desc" => DESC_INVALID_REQUEST,
                "statusCode"=> STATUS_CODE_BAD_REQUEST
            );
        }else{
            $data = array(
                "api_key" => $this->config->item("moviedbApiKey"),
                "language" => $this->input->get("lang")
            );
            $res = $this->request_lib->doGet($data,str_replace("__season__", $this->input->get("seasonId"), str_replace("__id__",$this->input->get("seriesId"),API_TV_SEASON_BY_SERIES)));
        }
        $out = array(
            'status' => $res['status'],
            'desc' => $res['desc'],
            'content' => $res['content']
        );
        $this->output
            ->set_status_header($res['statusCode'])
            ->set_content_type('application/json')
            ->set_header("Access-Control-Allow-Origin:".$this->config->item("corsDomain"))
            ->set_header("Access-Control-Allow-Credentials: true")
            ->set_header("Access-Control-Max-Age: 120000")
            ->set_header("Access-Control-Allow-Methods: GET,POST,DELETE,OPTIONS")
            ->set_header("Access-Control-Allow-Headers:Content-Type,Accept")
            ->set_output(json_encode($out));
    }

    //REQUEST GET
    // lang
    // series Id
    //seasonId
    public function seriesCreditBySeason(){
        $res = null;
        if($this->input->get() == false){
            $res = array(
                "status" => STATUS_FAILED,
                "desc" => DESC_INVALID_REQUEST,
                "statusCode"=> STATUS_CODE_BAD_REQUEST
            );
        }else if($this->input->get("lang") == false || $this->input->get("seriesId") == false || $this->input->get("seasonId") == false){
            $res = array(
                "status" => STATUS_FAILED,
                "desc" => DESC_INVALID_REQUEST,
                "statusCode"=> STATUS_CODE_BAD_REQUEST
            );
        }else{
            $data = array(
                "api_key" => $this->config->item("moviedbApiKey"),
                "language" => $this->input->get("lang")
            );
            $res = $this->request_lib->doGet($data,str_replace("__season__", $this->input->get("seasonId"), str_replace("__id__",$this->input->get("seriesId"),API_TV_CREDIT_BY_SEASON)));
        }
        $out = array(
            'status' => $res['status'],
            'desc' => $res['desc'],
            'content' => $res['content']
        );
        $this->output
            ->set_status_header($res['statusCode'])
            ->set_content_type('application/json')
            ->set_header("Access-Control-Allow-Origin:".$this->config->item("corsDomain"))
            ->set_header("Access-Control-Allow-Credentials: true")
            ->set_header("Access-Control-Max-Age: 120000")
            ->set_header("Access-Control-Allow-Methods: GET,POST,DELETE,OPTIONS")
            ->set_header("Access-Control-Allow-Headers:Content-Type,Accept")
            ->set_output(json_encode($out));
    }

    //REQUEST GET
    // lang
    // series Id
    //seasonId
    public function seriesTrailerBySeason(){
        $res = null;
        if($this->input->get() == false){
            $res = array(
                "status" => STATUS_FAILED,
                "desc" => DESC_INVALID_REQUEST,
                "statusCode"=> STATUS_CODE_BAD_REQUEST
            );
        }else if($this->input->get("lang") == false || $this->input->get("seriesId") == false || $this->input->get("seasonId") == false){
            $res = array(
                "status" => STATUS_FAILED,
                "desc" => DESC_INVALID_REQUEST,
                "statusCode"=> STATUS_CODE_BAD_REQUEST
            );
        }else{
            $data = array(
                "api_key" => $this->config->item("moviedbApiKey"),
                "language" => $this->input->get("lang")
            );
            $res = $this->request_lib->doGet($data,str_replace("__season__", $this->input->get("seasonId"), str_replace("__id__",$this->input->get("seriesId"),API_TV_TRAILERS_BY_SEASON)));
        }
        $out = array(
            'status' => $res['status'],
            'desc' => $res['desc'],
            'content' => $res['content']
        );
        $this->output
            ->set_status_header($res['statusCode'])
            ->set_content_type('application/json')
            ->set_header("Access-Control-Allow-Origin:".$this->config->item("corsDomain"))
            ->set_header("Access-Control-Allow-Credentials: true")
            ->set_header("Access-Control-Max-Age: 120000")
            ->set_header("Access-Control-Allow-Methods: GET,POST,DELETE,OPTIONS")
            ->set_header("Access-Control-Allow-Headers:Content-Type,Accept")
            ->set_output(json_encode($out));
    }

}