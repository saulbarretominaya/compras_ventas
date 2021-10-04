<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_notas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("Movimientos/Model_notas");
    }

    public function index() {
        $data = array(
            'listar_nota' => $this->Model_notas->listar(),
        );

        $this->load->view("layouts/header");
        $this->load->view("layouts/aside");
        $this->load->view("Movimientos/Notas/Listar", $data);
    }

    public function enviar_nota_electronica($id_cre_deb) {

        $data = array(
            "param" => $this->Model_notas->parametros_cabecera_nota_electronica($id_cre_deb), //filas
            "param2" =>$this->Model_notas->parametros_detalle_nota_electronica($id_cre_deb), //resultado
        );
        $this->load->view("layouts/header");
        $this->load->view("layouts/aside");
        $this->load->view("Movimientos/Notas/FormatoNota", $data);
    }

}
