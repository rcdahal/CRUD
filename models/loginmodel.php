<?php
Class loginmodel extends CI_Model{
	public function isvalidate($username,$password){

		$q=$this->db->where(['uname'=>$username,'pass'=>$password])
					->get('user');
					/*echo "<pre>";
					print_r($q);
					/*echo "<pre>";
					echo $q->row()->user_id;
					print_r($q->row()->user_id);*/
					
			if($q->num_rows()){

				return $q->row()->id ;



			}
			else{
				return false;
			}
	}
	public function articlelist($limit,$offset){
		$id=$this->session->userdata('id');
		$q=$this->db->select()
				->from('aeticles')
				->where(['user_id'=>$id])
			    ->get();
				return $q->result();

	}
	public function all_articlelist(){
		$query=$this->db->select()
					->from('aeticles')
					->get();
					return $query->result();
				}
			public function view_articlelist(){
					$id=$this->uri->segment(3);
		     $query=$this->db->select()
		     				->where(['id'=>$id])
							->from('aeticles')
							->get();
					return $query->result();
				}
	public function num_rows(){
		$id=$this->session->userdata('id');
		$q=$this->db->select()
				->from('aeticles')
				->where(['user_id'=>$id])
				->get();
				return $q->num_rows();
	}
	/*public function articlelist(){

		$id=$this->session->userdata('id');
		
		$q=$this->db->select()
				->from('aeticles')
				->where(['user_id'=>$id])
				->get();
				return $q->result();
				



	}*/
	public function add_articles($array){
		return $this->db->insert('aeticles',$array);
	}
	public function del_articles($id){
		return $this->db->delete('aeticles',['id'=>$id]);
	}
	public function edit_articles($id){
		$q=$this->db->select(['article_title','article_body'])
				->where(['id'=>$id])
				->get('aeticles');
				return $q->row();

	}
	public function update_articles(Array $post){
		echo $id=$this->input->post('id');
		print_r($post);

		return $this->db->where(['id'=>$id])
				->update('aeticles',$post);
				
	}
	

	
}

?>