<?php 
require APPPATH . 'libraries/REST_Controller.php';     

class Api extends REST_Controller {    

    public function __construct() {

      header('Access-Control-Allow-Origin: *');

      header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

       parent::__construct();

       $this->load->database();

       $this->load->model("ProductModel", "product");

    }

    public function saveproduct_post(){

      $this->product->save();

      $data["result"] = "success";

      $this->response($data, 200);      

   }

   public function listproducts_post(){

      $data["products"] = $this->product->lists();

      $this->response($data, 200);

   }

   public function deleteproduct_post(){

      $json = file_get_contents('php://input');

      $product = json_decode($json);

      $this->product->delete($product->id);

      $data["result"] = "success";

      $this->response($data, 200);

   }

   public function getproduct_post(){

      $json = file_get_contents('php://input');

      $product = json_decode($json);

      $data["product"] = $this->product->getbyid($product->id);

      $this->response($data, 200);     

   }

}
?>