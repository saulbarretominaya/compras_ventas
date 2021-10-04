<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_nivel_productividad extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("Reportes/Indicadores/Model_nivel_productividad");
    }

    public function index() {
        $fecha_desde = $this->input->post("fecha_desde");
        $fecha_hasta = $this->input->post("fecha_hasta");

        if ($this->input->post("btn_buscar")) {
            $reportes = $this->Model_nivel_productividad->listar_con_fechas($fecha_desde, $fecha_hasta);
        } else {
            $reportes = $this->Model_nivel_productividad->listar();
        }

        $data = array(
            'listar_nivel_productividad' => $reportes,//$this->Model_nivel_productividad->listar(),
            'fecha_desde' => $fecha_desde,
            'fecha_hasta' => $fecha_hasta
        );
        $this->load->view("layouts/header");
        $this->load->view("layouts/aside");
        $this->load->view("Reportes/Indicadores/ListarNivelProductividad", $data);
    }

}
