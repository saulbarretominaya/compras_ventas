<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Controller_modulos extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata("ingresar_session")) {
            redirect(base_url());
        }
        // $this->load->model("Catalogo/Model_catalogo_clientes");
        $this->load->model("Dashboard/Model_indicadores");
        $this->load->model("Login/Model_Login");
    }

    public function index()
    {

        // $data = array(
        //     'listar_notificacion_clientes' => $this->Model_catalogo_clientes->listar_notificacion_clientes(),
        //     'total_notificacion_clientes' => $this->Model_catalogo_clientes->total_notificacion_clientes(),
        // );

        // $data2 = array(
        //     "cantVentas" => $this->Model_Login->rowCount("ventas"),
        //     "cantUsuarios" => $this->Model_Login->rowCount("usuarios"),
        //     "cantClientes" => $this->Model_Login->rowCount("clientes"),
        //     "cantProductos" => $this->Model_Login->rowCount("productos"),
        //     'periodo1' => $this->Model_indicadores->periodo1()
        // );

        // $this->load->view("layouts/header", $data);
        // $this->load->view("layouts/aside");
        // $this->load->view("Login/Lista_modulos", $data2);
        $this->load->view("layouts/header");
        $this->load->view("layouts/aside");
        $this->load->view("Login/Lista_modulos");
    }

    public function grafico1()
    {
        $year = $this->input->post("year");
        $resultados = $this->Model_indicadores->grafico1($year);
        echo json_encode($resultados);
    }

    public function grafico2()
    {
        $year = $this->input->post("year");
        $resultados = $this->Model_indicadores->grafico2($year);
        echo json_encode($resultados);
    }
}
