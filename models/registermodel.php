<?php 
Class registermodel extends CI_Model{
	public function apply_application($array){
		return $this->db->insert('user',$array);
	}

}
?>