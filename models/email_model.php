<?php
class email_model extends CI_Model{
	function is_available_email($email){
		$this->db->where('email',$email);
		$query=$this->db->get("user");
		if($query->num_rows()>0){
			return true;
		}
		else{
			return false;
		}
	}
} 
?>