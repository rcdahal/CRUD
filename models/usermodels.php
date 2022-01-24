<?php 
Class Usermodel extends CI_controller{
	public function getUserdata(){
		return[
			['Firstname'=>'ram','account'=>'31412'],
			['Firstname'=>'shyam','account'=>'3124'],


		];
	}
}