<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_generales extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("Reportes/Generales/Model_generales");
    }

    public function index() {
        $data = array(
            'listar_comprobantes_facturas_boletas' => $this->Model_generales->listar_comprobantes_facturas_boletas(),
            'listar_comprobantes_notas' => $this->Model_generales->listar_comprobantes_notas(),
        );

        $this->load->view("layouts/header");
        $this->load->view("layouts/aside");
        $this->load->view("Reportes/Generales/Listar_comprobantes", $data);
    }

    public function consultar_facturas_boletas_electronicos() {

        //print("Hola mundo");
        //$a=$_GET['a']; Puedo obtener de esta  1mera manera en PHP
        //$a = $this->input->get("a"); Puedo obtener de esta 2da manera pero con Codeigniter
        //print($a); y con esto imprimo

        $a = $this->input->get("a");
        //$b = $this->input->get("b");

        $data = array(
            "param" => $this->Model_generales->parametros_cabecera_consultar_facturas_boletas_electronicos($a), //filas
        );

        $this->load->view("layouts/header");
        $this->load->view("layouts/aside");
        $this->load->view("Reportes/Generales/Consultar_comprobantes", $data);
    }

    public function consultar_notas_electronicos() {

        $a = $this->input->get("a");

        $data = array(
            "param" => $this->Model_generales->parametros_cabecera_consultar_notas_electronicos($a),
        );

        $this->load->view("layouts/header");
        $this->load->view("layouts/aside");
        $this->load->view("Reportes/Generales/Consultar_comprobantes", $data);
    }

}
