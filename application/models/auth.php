<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class auth extends CI_Model {

	function __construct() {
        parent::__construct();
        $this->load->database();
    }

	
	function getUserByToken($token){
		$sql = "select user.id, user.nama as 'nama', user.email, user.phone, merchant.nama as 'merchant', merchant.id as 'merchant_id', usergroup.groupPermission as 'group', regional.id  as 'regionalId',regional
		.nama as 'regionalNama', akseslimit.token from user join akseslimit on akseslimit.user = user.id join usergroup on user.groupPermission = usergroup.id  LEFT OUTER JOIN regional on regional.id = user.regional LEFT OUTER JOIN merchant on regional.merchant = merchant.id  where akseslimit.token ='".$token."' and akseslimit.expiredDate > NOW()";
		$query = $this->db->query($sql);
		if($query->num_rows > 0){
			return $query->row_array();
		}
		return null;
	}

	function getUserByUsernameAndPass($user,$pass){
		$sql = "select user.id, user.nama as 'nama', user.email,user.phone,user.status as 'statUser', regional.nama,regional.status as 'statRegional',merchant.nama, merchant.stat as 'statMerchant' from user join securitydata on user.id = securitydata.user LEFT OUTER JOIN regional ON regional.id = user.regional LEFT OUTER join merchant on merchant.id = regional.merchant where user.email = '".$user."' and securitydata.pass='".$pass."'";
		$query = $this->db->query($sql);
		if($query->num_rows > 0){
			return $query->row_array();
		}
		return null;
	}

	function insertAksesLimit($data){
		$this->db->trans_start();
        $this->db->insert('akseslimit', $data);
        $aksesId = $this->db->insert_id();
        $this->db->trans_complete();
        if($aksesId > 0){
        	return true;
        }
        return false;
	}

	function deleteToken($token){
		$sql = "delete from akseslimit where token = '".$token."'";
		$this->db->query($sql);
	}


	function getidByEmailToken($email,$token){
		$sql = "select user.id from user  join akseslimit on akseslimit.user = user.id where user.email ='".$email."' and akseslimit.token = '".$token."'";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0){
			return $query->row_array();
		}
		return null;
	}

	function getSecurityData($email){
		$sql = "select user.email, user.nama,securitydata.pass,securitydata.id from user join securitydata where user.email='".$email."'";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0){
			return $query->row_array();
		}
		return null;
	}

	function updatePassMember($data,$id){
		$this->db->trans_start();
		$this->db->where('id',$id);
		$this->db->update('securitydata',$data);
		$this->db->trans_complete();
		return $this->db->trans_status();
	}
}

?>