<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');
Class Export extends  CI_controller{
	public function __construct(){
		parent ::__construct();
		$this->load->model('Export_model','export');

	}
	public  function index(){
		$data['title']='Display Feedback Data';
		$data['feedbackinfo']=$this->export->employeelist();
		$this->load->view('users/feedbacklist',$data);
	}
	public function createXLS(){
		$this->load->library("excel");
		$object= new PHPExcel();
		$object->setActiveSheetIndex(0);
		$table_columns=array("Name","Email","Feedback");
		$column=0;
		foreach($table_columns as $field){
			$object->getActiveSheet()->setCellValueByColumnAndRow($column,1,$field);
			$column++;
		}
		$feedbackinfo=$this->export->employeelist();
		$excel_row=2;
		foreach($feedbackinfo as $row){
			$object->getActiveSheet()->setCellValueByColumnAndRow(0,$excel_row,$row->name );
			$object->getActiveSheet()->setCellValueByColumnAndRow(1,$excel_row,$row->email );
			$object->getActiveSheet()->setCellValueByColumnAndRow(2,$excel_row,$row->feedback );
			$excel_row++;

		}
 $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
  header('Content-Type: application/vnd.ms-excel');
  header('Content-Disposition: attachment;filename="Feedback Data.xls"');
  $object_writer->save('php://output');
	}
}