<?php 
Class Usermodel extends CI_controller{
	public function getUserdata(){
		$this->load->library('test');
		$this->test->dbdetails();
		$this->load->database();
		$q=$this->db->get("Users");

		$result=$q->result();
		echo "<pre>";
		print_r($result);
		return $q->result_array();

	}
}