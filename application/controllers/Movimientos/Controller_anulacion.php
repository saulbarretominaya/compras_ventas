<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_anulacion extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("Movimientos/Model_anulacion");
    }

    public function index() {
        $data = array(
            'listar_anulacion' => $this->Model_anulacion->listar(),
        );

        $this->load->view("layouts/header");
        $this->load->view("layouts/aside");
        $this->load->view("Movimientos/Anulacion/Listar", $data);
    }

    public function enviar_anulacion_electronica($id) {

        $data = array(
            "param" => $this->Model_anulacion->parametros_cabecera_nota_electronica($id), //filas
            
        );
        $this->load->view("layouts/header");
        $this->load->view("layouts/aside");
        $this->load->view("Movimientos/Anulacion/FormatoAnulacion", $data);
    }
    
     public function consultar_anulacion_electronica($id) {

        $data = array(
            "param" => $this->Model_anulacion->parametros_cabecera_nota_electronica($id), //filas
            
        );
        $this->load->view("layouts/header");
        $this->load->view("layouts/aside");
        $this->load->view("Movimientos/Anulacion/ConsultarAnulacion", $data);
    }

}
