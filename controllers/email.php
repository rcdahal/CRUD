<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');
Class Email extends  CI_controller{
	function index(){
		$data['title']="Email Availability Check ";
		$this->load->view("email_available",$data);
	}
	function check_available(){
		
		  if(!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
			echo '<label class="text-danger"><span class="glyphicon glyphicon-remove">Enter Valid Email Adress</span></label>';
		}else{
			$this->load->model("email_model");
			if($this->email_model->is_available_email($_POST['email'])){
				echo '<label class="text-danger"><span class="glyphicon glyphicon-remove">Email Already Registered</span></label>';
		}else{
			echo '<label class="text-Success"><span class="glyphicon glyphicon-remove">Email Available</span></label>';
		}
		}
	}




}
?>