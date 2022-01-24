<?php 
class Export_model extends CI_Model{
	public function employeelist(){
		$query=$this->db->select(['fullname','email','feedback'])
						->from('feedback')
						->get();
						
					return $query->result();
	}
}


?>