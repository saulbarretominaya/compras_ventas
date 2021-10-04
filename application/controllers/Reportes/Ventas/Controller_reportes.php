<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_reportes extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("Movimientos/Model_ventas");
    }

    public function reporte_modal($id_venta) {
        
        $data = array(
            "cabecera" => $this->Model_ventas->cabecera($id_venta),
            "detalle" => $this->Model_ventas->detalle($id_venta),
        );
        
//        print_r($data); 
//        //die();
        
        $this->load->view("Reportes/Ventas/reporte_modal",$data);
    }

}
