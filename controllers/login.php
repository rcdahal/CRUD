<?php 
Class login extends MY_Controller{
	
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('id'))
			return redirect('admin/welcome');
	}
	
	public function index(){
		/*$this->load->library('encryption');
		$msg="My Name Is Shyam Giri";
		$encryt=$this->encryption->encrypt($msg);
		echo $encryt;
		echo '<br>';
		$dncryt=$this->encryption->decrypt($encryt);		echo '<br>';

				echo $dncryt;

		echo '<br>';
		exit();
	*/
	$this->form_validation->set_rules('uname','User name','required|alpha');
	$this->form_validation->set_rules('pass','password','required|max_length[12]');
	$this->form_validation->set_error_delimiters("<div class='text-danger''>","</div>");
	if($this->form_validation->run()){
		
		$uname=$this->input->post('uname');
		$pass=$this->input->post('pass');
		$this->load->model('loginmodel');
		$login_id=$this->loginmodel->isvalidate($uname,$pass);
		
		if($login_id){
			
			$this->session->set_userdata('id',$login_id);
			return redirect('admin/welcome');
			
		}
		else{
			$this->session->set_flashdata('Login_failed','Invalid Username/Password');
			return redirect('login');
			
		}


	}
	else{
		$this->load->view('Admin/Login');
	
	}
	}
}
?>