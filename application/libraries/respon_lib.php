<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class respon_lib{
	private $_ci;
	
	public function __construct(){
		$this->_ci = & get_instance();
		$this->_ci->load->config('custom_config');
		date_default_timezone_set("Asia/Jakarta");
	}

	public function errorMessage($data,$from){
		$mes = array();
		switch ($data['status']) {
			case STATUS_INVALID :
				if($from == FROM_LOGIN){
					$mes['head'] = HEAD_INVALID_LOGIN;
					$mes['desc'] = $data['description'];
				}else{

				}
				break;

			case STATUS_INVALID_PARAMETER:
					if($from == FROM_CASHOUT){
						$mes['head'] = HEAD_NON_UPGRADE_LAYANAN;
						$mes['desc'] = DESC_NON_UPGRADE_LAYANAN;
					}else{
						$mes['head'] = "Maaf, Terjadi Kesalahan";
						$mes['desc'] = MESSAGE_GENERAL_ERROR;
					}
				break;
			case STATUS_OTP_VALIDATION_FAILED_INVALID_OTP:
				$mes['head'] = HEAD_TRX_FAILED;
				$mes['desc'] = DESC_INVALID_OTP;
				break;
			case STATUS_INVALID_CREDENTIAL :
				$mes['head'] = HEAD_ERROR_RESET_PIN;
				$mes['desc'] = DESC_INVALID_CREDENTIALS;
				break;
			case STATUS_NOT_ENOUGH_KREDIT :
				$mes['head'] = HEAD_NOT_ENOUGH_CREDIT;
				$mes['desc'] = $data['description'];
				break;
			case STATUS_BLOCKED :
				 $mes['head'] = HEAD_BLOCKED;
				 $mes['desc'] = $data['description'];
				break;
			case STATUS_USER_NOT_FOUND :
				$mes['head'] = HEAD_USER_NOT_FOUND;
				$mes['desc'] = DESC_USER_NOT_FOUND;
				break;
			default:
				$mes['head'] = "Maaf, Terjadi kesalahan";
				$mes['desc'] = MESSAGE_GENERAL_ERROR;
				break;
		}
		return $mes;
	}

	public function stringDate($time){
		$getYear = substr($time,0,4);
		$getMonth = $this->getRealMonth(substr($time,5,2));
		$getDay = substr($time,8,2); 
		$getHour = substr($time,11,2);
		$getMinute = substr($time,14,2);
		$getSecond = substr($time,17,2);

		return $getDay." ".$getMonth." ".$getYear." ".$getHour.":".$getMinute.":".$getSecond;
	}


	private function getRealMonth($month){
		$bulan = "";
 	switch($month){
 		case '01' :
 				$bulan = "Januari";
 				break;
 		case '02' :
 				$bulan = "Februari";
 				break;
 		case '03' :
 				$bulan = "Maret";
 				break;
 		case '04' :
 				$bulan = "April";
 				break;
 		case '05' :
 				$bulan = "Mei";
 				break;
 		case '06' :
 				$bulan = "Juni";
 				break;
 		case '07' :
 				$bulan = "Juli";
 				break;
 		case '08' :
 				$bulan = "Agustus";
 				break;
 		case '09' :
 				$bulan = "September";
 				break;
 		case '10' :
 				$bulan = "Oktober";
 				break;
 		case '11' :
 				$bulan = "November";
 				break;
 		case '12' :
 				$bulan = "Desember";
 				break;	
 		default :
 				$bulan = "unknown";
 				break;
 	}

 		return $bulan;
	}
}
