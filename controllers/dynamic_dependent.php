<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');
Class Dynamic_dependent extends  CI_controller{
	public function __construct(){
		parent ::__construct();
		$this->load->model('dynamic_dependent_model');

	}
	public  function index(){

		$data['country']=$this->dynamic_dependent_model->fetch_country();
		$this->load->view('users/dynamic_dependent',$data);
	}
	function fetch_state(){
		if($this->input->post('country_id')){
			echo $this->dynamic_dependent_model->fetch_state($this->input->post('country_id'));

		}
	}function fetch_city(){
		if($this->input->post('state_id')){
			echo $this->dynamic_dependent_model->fetch_city($this->input->post('state_id'));

		}
	}
}
	?>