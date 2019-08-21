<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class request_lib{
	private $_ci;
	
	public function __construct(){
		$this->_ci = & get_instance();
		$this->_ci->load->config('custom_config');
		date_default_timezone_set("Asia/Jakarta");
	}


	public function doPost($data,$endpoint){

		log_message("INFO","==========================================================================");
		log_message("INFO","                          REQUEST BY POST                                 ");
		log_message("INFO","--------------------------------------------------------------------------");
		log_message("INFO","Endpoint     : ".$endpoint);
		log_message("INFO","Request      : ".http_build_query($data));
		log_message("INFO","==========================================================================");


		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $endpoint);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
		curl_setopt($ch, CURLOPT_HTTPHEADER,$this->generateHeader());
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 85);
        curl_setopt($ch, CURLOPT_SSLVERSION, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 85);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		$hasil = curl_exec($ch);
		$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		if($hasil === false){
			$res = array(
					'status'=>STATUS_FAILED,
					'desc'=>$this->handleGeneralError($ch),
					'content'=> null
			);
		}else{
			if($httpCode === 200){			
				$res = array(
					'status' => STATUS_SUCCESS,
					'desc' => STATUS_SUCCESS
				);
			}else{
				$res = array(
					'status' => STATUS_FAILED,
					'desc' => STATUS_FAILED
				);
			}
			$res['content'] = json_decode($hasil, true);
		}
		$res['statusCode'] = $httpCode;
		curl_close($ch);
		log_message("INFO","==========================================================================");
		log_message("INFO","                           RESPON BY POST                                 ");
		log_message("INFO","--------------------------------------------------------------------------");
		log_message("INFO","Endpoint     : ".$endpoint);
		log_message("INFO","Respon      : ".http_build_query($res));
		log_message("INFO","==========================================================================");
		return $res;
	}


	public function doGet($data,$ep){
		$header = array(
			"cache-control: no-cache",
			"content-type: application/x-www-form-urlencoded"
		);
		$endpoint = $ep;
		if($data != null){
			$endpoint .="?".http_build_query($data);
		}
		log_message("INFO","==========================================================================");
		log_message("INFO","                           REQUEST BY GET                                 ");
		log_message("INFO","--------------------------------------------------------------------------");
		log_message("INFO","Endpoint     : ".$endpoint);
		log_message("INFO","==========================================================================");
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $endpoint);
		curl_setopt($ch, CURLOPT_HTTPHEADER,$this->generateHeader());
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 85);
        curl_setopt($ch, CURLOPT_SSLVERSION, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 85);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		$hasil = curl_exec($ch);
		$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		if($hasil === false){
			$res = array(
				'status'=>STATUS_FAILED,
				'desc'=>$this->handleGeneralError($ch)
			);
		}else{
			if($httpCode === 200){			
				$res = array(
					'status' => STATUS_SUCCESS,
					'desc' => STATUS_SUCCESS
				);
			}else{
				$res = array(
					'status' => STATUS_FAILED,
					'desc' => STATUS_FAILED
				);
			}
			$res['content'] = json_decode($hasil, true);
		}
		$res['statusCode'] = $httpCode;
		curl_close($ch);
		log_message("INFO","==========================================================================");
		log_message("INFO","                           RESPON BY GET                                 ");
		log_message("INFO","--------------------------------------------------------------------------");
		log_message("INFO","Endpoint     : ".$endpoint);
		log_message("INFO","Respon       : ".http_build_query($res));
		log_message("INFO","==========================================================================");
		return $res;
	}


	private function handleGeneralError($ch){
		$errno = curl_errno($ch);
		curl_close($ch);
		log_message("ERROR","==========================================================================");
		log_message("ERROR","                           REQUEST BY GET                                 ");
		log_message("ERROR","--------------------------------------------------------------------------");
		log_message("ERROR","Curl error number     : ".$errno);
		log_message("ERROR","Curl error        	  : ");
		log_message("ERROR","==========================================================================");
		$error = CURL_GENERAL_ERROR;
		switch($errno){

			case 6 :
				$error = CURL_COULDNT_CONNECT;
				break;
			case 7 :
				$error = CURL_COULDNT_CONNECT;
				break;
			case 28 :
				$error = CURL_TIMEOUT;
				break;
		}
		return $error;
	}

	private function generateHeader(){
		return array(
			"content-type: application/x-www-form-urlencoded",
			"accept: application/json",
		);
	}

}