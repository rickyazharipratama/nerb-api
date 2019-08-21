<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class movies extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->library(array('request_lib'));
        $this->load->helper(array('url'));
        $this->load->config("custom_config");
    }



    //REQUEST GET
    // page
    // lang
    public function movieNowPlaying(){
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
            $res = $this->request_lib->doGet($data,API_MOVIE_NOW_PLAYING);
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

    public function latestMovie(){
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
            $res = $this->request_lib->doGet($data,API_LATEST_MOVIE);
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
    public function popularMovie(){
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
            $res = $this->request_lib->doGet($data,API_POPULAR_MOVIE);
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
    public function topRatedMovie(){
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
            $res = $this->request_lib->doGet($data,API_TOP_RATED);
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
    public function upcoming(){
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
            $res = $this->request_lib->doGet($data,API_TOP_RATED);
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
    //movieId
    //lang
    public function getMovieTrailers(){
        $res = null;
        if($this->input->get() == false){
            $res = array(
                "status" => STATUS_FAILED,
                "desc" => DESC_INVALID_REQUEST,
                "statusCode"=> STATUS_CODE_BAD_REQUEST
            );
        }else if($this->input->get('movieId') == false || $this->input->get("lang") == false){
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
            $res = $this->request_lib->doGet($data,str_replace("__id__",$this->input->get("movieId"),API_MOVIE_TRAILERS));
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
    //movieId
    //lang
    public function getRecomendationByMovie(){
        $res = null;
        if($this->input->get() == false){
            $res = array(
                "status" => STATUS_FAILED,
                "desc" => DESC_INVALID_REQUEST,
                "statusCode"=> STATUS_CODE_BAD_REQUEST
            );
        }else if($this->input->get('movieId') == false || $this->input->get("lang") == false){
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
            $res = $this->request_lib->doGet($data,str_replace("__id__",$this->input->get("movieId"),API_MOVIE_RECOMENDATION));
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
    //movieId
    //lang
    //page
    public function getSimilarByMovie(){
        $res = null;
        if($this->input->get() == false){
            $res = array(
                "status" => STATUS_FAILED,
                "desc" => DESC_INVALID_REQUEST,
                "statusCode"=> STATUS_CODE_BAD_REQUEST
            );
        }else if($this->input->get('movieId') == false || $this->input->get("lang") == false || $this->input->get("page") == false){
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
            $res = $this->request_lib->doGet($data,str_replace("__id__",$this->input->get("movieId"),API_MOVIE_SIMILAR));
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
    //movieId
    //lang
    //page
    public function movieReviews(){
        $res = null;
        if($this->input->get() == false){
            $res = array(
                "status" => STATUS_FAILED,
                "desc" => DESC_INVALID_REQUEST,
                "statusCode"=> STATUS_CODE_BAD_REQUEST
            );
        }else if($this->input->get('movieId') == false || $this->input->get("lang") == false || $this->input->get("page") == false){
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
            $res = $this->request_lib->doGet($data,str_replace("__id__",$this->input->get("movieId"),API_MOVIE_REVIEWS));
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
    //movieId
    //lang
    public function movieDetails(){
        $res = null;
        if($this->input->get() == false){
            $res = array(
                "status" => STATUS_FAILED,
                "desc" => DESC_INVALID_REQUEST,
                "statusCode"=> STATUS_CODE_BAD_REQUEST
            );
        }else if($this->input->get('movieId') == false || $this->input->get("lang") == false){
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
            $res = $this->request_lib->doGet($data,str_replace("__id__",$this->input->get("movieId"),API_MOVIE_DETAILS));
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
    //movieId
    public function movieCredits(){
        $res = null;
        if($this->input->get() == false){
            $res = array(
                "status" => STATUS_FAILED,
                "desc" => DESC_INVALID_REQUEST,
                "statusCode"=> STATUS_CODE_BAD_REQUEST
            );
        }else if($this->input->get('movieId') == false){
            $res = array(
                "status" => STATUS_FAILED,
                "desc" => DESC_INVALID_REQUEST,
                "statusCode"=> STATUS_CODE_BAD_REQUEST
            );
        }else{
            $data = array(
                "api_key" => $this->config->item("moviedbApiKey"),
            );
            $res = $this->request_lib->doGet($data,str_replace("__id__",$this->input->get("movieId"),API_MOVIE_CREDITS));
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
    //movieId
    public function movieKeyword(){
        $res = null;
        if($this->input->get() == false){
            $res = array(
                "status" => STATUS_FAILED,
                "desc" => DESC_INVALID_REQUEST,
                "statusCode"=> STATUS_CODE_BAD_REQUEST
            );
        }else if($this->input->get('movieId') == false){
            $res = array(
                "status" => STATUS_FAILED,
                "desc" => DESC_INVALID_REQUEST,
                "statusCode"=> STATUS_CODE_BAD_REQUEST
            );
        }else{
            $data = array(
                "api_key" => $this->config->item("moviedbApiKey"),
            );
            $res = $this->request_lib->doGet($data,str_replace("__id__",$this->input->get("movieId"),API_MOVIE_KEYWORDS));
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