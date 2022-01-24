<?php 
Class admin extends MY_Controller{
	
	
	
	public function welcome(){
		/*if(!$this->session->userdata('id'))
			return redirect('login');*/
			
		$this->load->model('loginmodel');
		$this->load->library('pagination');
			 $config=[
			 	'base_url'=>base_url('admin/welcome'),
			 	'per_page'=>2,
			 	'total_rows' => $this->loginmodel->num_rows(),
			 ];
			 $this->pagination->initialize($config);
		$article=$this->loginmodel->articlelist($config['per_page'],$this->uri->segment(3));
		$this->load->view('admin/dashboard',['article'=>$article]);
     }
    
     public function logout(){

     	$this->session->unset_userdata('id');
     	return redirect('login');
     }
     public function adduser(){

     	$this->load->view('admin/add_articles');



     }
     public function vew(){
     	$this->load->model('loginmodel');
     	$article=$this->loginmodel->view_articlelist();
		$this->load->view('users/view_articlelist',['article'=>$article]);

     }
     public function uservalidation(){
     	$config=
     		[
     			'upload_path'=>'./upload/',
     			'allowed_types'=>'gif|jpg|png|jpeg|pdf',
     		];
     		
     		$this->load->library('upload',$config);
     	if($this->form_validation->run('add_articles_rules') && $this->upload->do_upload('userfile')){
     		/*echo $this->input->post('user_id');*/
     		$this->load->library('encryption');
     		$post=$this->input->post();

     		
     		$data=$this->upload->data();
			$image_path=base_url("upload/".$data['raw_name'].$data['file_ext']);
     		$post['image_path']=$image_path;
     		$this->load->model('loginmodel');
     		if($this->loginmodel->add_articles($post)){
     			$this->session->set_flashdata('msg','Insert Successfully');
     			$this->session->set_flashdata('msg_class','alert-info');
     			
     		}else{
     			$this->session->set_flashdata('msg','Failed to Insert');
     			$this->session->set_flashdata('msg_class','alert-sucess');
     			
     		}
     		return redirect('admin/welcome');


     	}
     	else{
     		 $error = array('error' => $this->upload->display_errors());

            $this->load->view('admin/add_articles', $error);
     		/*$upload_error=$this->upload->display_errors();
     		$this->load->view('admin/add_articles',compact('upload_error'));*/
     	}
     }
     public function edituser(){
      		$id=$this->input->post('id');
      		$this->load->model('loginmodel');
      		$article=$this->loginmodel->edit_articles($id);
      		$this->load->view('admin/edit_articles',['article'=>$article]);
      		


     }
     public function update_article(){
      /*$this->load->model('loginmodel');
     	     $this->loginmodel->update_article($post);
     	     if($this->loginmodel->update_article())
     	     {
     	     	echo "Successfully";

     	     }else{

     	     }*/

     	    

     	     if($this->form_validation->run('add_articles_rules')){
     		
     		$post=$this->input->post();
     		$this->load->model('loginmodel');
     		if($this->loginmodel->update_articles($post)){
     			$this->session->set_flashdata('msg','Update Successfully');
     			$this->session->set_flashdata('msg_class','alert-info');
     		}else{
     			$this->session->set_flashdata('msg','Failed to Update');
     			$this->session->set_flashdata('msg_class','alert-sucess');
     			
     		}
     		return redirect('admin/welcome');
     	}
     	
     		
     		else{
     		$this->load->view('admin/update_articles');
     	}




     }
     public function delarticles(){
     	$id=$this->input->post('id');
     	$this->load->model('loginmodel');
     		if($this->loginmodel->del_articles($id)){
     			$this->session->set_flashdata('msg','Deleted Successfully');
     			$this->session->set_flashdata('msg_class','alert-info');
     			
     		}else{
     			$this->session->set_flashdata('msg','Failed to Delete ..... Please try again');
     			$this->session->set_flashdata('msg_class','alert-sucess');
     			
     		}
     				return redirect('admin/welcome');



     }
     /* public function __construct(){
		parent::__construct();
		if($this->session->userdata('id'))
			return redirect('login');
	}*/

     public function register(){
     	$this->load->view('admin/register');

     }
     public function sendeml(){

     //	print_r($this->input->post());
	$this->form_validation->set_rules('uname','User name','required|alpha_numeric_spaces');
	$this->form_validation->set_rules('pass','password','required|max_length[12]');
	$this->form_validation->set_rules('fname','First name','required|alpha');
	$this->form_validation->set_rules('lname','Last name','required|alpha');
	$this->form_validation->set_rules('email','Email Address','required|valid_email|is_unique[user.email]');
	$this->form_validation->set_error_delimiters("<div class='text-danger'>","</div>");
	if($this->form_validation->run()){
		  $this->load->library('encryption');
		$post=$this->encryption->encrypt($this->input->post());
     		$this->load->model('registermodel');
     		if($this->registermodel->apply_application($post)){
     			$this->session->set_flashdata('user','Resistration Seccucefully');
     			$this->session->set_flashdata('user_class','alert-info');
			  	
     		}else{
     			$this->session->set_flashdata('user','Failed to Resister');
     			$this->session->set_flashdata('user_class','alert_danger');

			  	
     			
     		}
     		$this->load->view('admin/register');
	
	   /* $uname=$this->input->post('uname');
		$pass=$this->input->post('pass');
		$fname=$this->input->post('fname');
		$lname=$this->input->post('lname');
		$email=$this->input->post('email'); 
		$this->load->model('loginmodel');*/
		$this->load->library('email');
		$this->email->from(set_value('email'),set_value('fname'));
		$this->email->to("rcdahal2056@gmail.com");
		$this->email->subject("Registration Sucessfully");
		$this->email->message("Thank You for Registration");
		$this->email->set_newline("\r\n");

		If(!$this->email->send()){
			show_error($this->email->print_debugger());
		}
		else{
			echo "Your Email has been sent";
		}
		

     }else{
     		$this->load->view('admin/register');
     }
 }
 public function sendemail(){
     
	$this->form_validation->set_rules('uname','User name','required|alpha_numeric_spaces');
	/*$this->form_validation->set_rules('pass','password','required|max_length[12]');
	$this->form_validation->set_rules('fname','First Name','required|alpha');*/
	$this->form_validation->set_error_delimiters("<div class='text-danger''>","</div>");
	$this->form_validation->run();
		/*$uname=$this->input->post('uname');
		$pass=$this->input->post('pass');
		$pass=$this->input->post('fname');
		$this->load->model('loginmodel');
		$login_id=$this->loginmodel->isvalidate($uname,$pass);
		if($login_id){
			
			$this->session->set_userdata('id',$login_id);
			return redirect('admin/welcome');
			
		}
		else{
			return redirect('admin/index');
			
		}


	}
	else{
		$this->load->view('Admin/register');
	
	}*/
	}


}

?>
