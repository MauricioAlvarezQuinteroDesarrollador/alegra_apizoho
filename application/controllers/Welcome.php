<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct() 
    { 
        parent::__construct();
        
        $this ->load->model('Factura_model');           
           
    }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$datos_vista["facturas"] = $this->filtrarFacturas();
				
		$this->load->view('welcome_message',$datos_vista);
	}

	function filtrarFacturas(){
		$facturas=$this->Factura_model->obtenerFacturas();
		$facturas = array_slice($facturas->invoices, 0, 20);
		//$facturas = array_slice($facturas, 0, 20);

		if(empty($this->input->post('res')))
			return $facturas;
		else if($this->input->post('res')=="ok")
			echo json_encode($facturas);
		else{
			sort($facturas);			
			echo json_encode($facturas);
		}


	}

	function obtenerMayores(){
		$array=array();
		$facturas=$this->Factura_model->obtenerFacturas();
		foreach ($facturas->invoices as $item) {
			if($item->total>100000){
				array_push($array, $item);
			}
		}
		echo json_encode($array);
	}
}
