<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_cargos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("Recursos_humanos/Model_cargos");
    }

    public function index() {
        $data = array(
            'listar_cargos' => $this->Model_cargos->listar(),
        );
        $this->load->view("layouts/header");
        $this->load->view("layouts/aside");
        $this->load->view("Recursos_humanos/Cargos/Listar", $data);
    }

    public function enlace_insertar() {
        $this->load->view("layouts/header");
        $this->load->view("layouts/aside");
        $this->load->view("Recursos_humanos/Cargos/Insertar");
    }

    public function insertar() {
        $descripcion = $this->input->post("descripcion");

        $data = array(
            'descripcion' => $descripcion,
            'id_estado' => '1'
        );

        $this->Model_cargos->insertar($data);

        echo json_encode($data);
    }

    public function enlace_actualizar($id_cargo) {
        $data = array(
            'enlace_actualizar_cargos' => $this->Model_cargos->enlace_actualizar($id_cargo),
        );

        $this->load->view("layouts/header");
        $this->load->view("layouts/aside");
        $this->load->view("Recursos_humanos/Cargos/Actualizar.php", $data);
    }

    public function actualizar() {
        $id_cargo = $this->input->post("id_cargo");
        $descripcion = $this->input->post("descripcion");

        $data = array(
            $this->Model_cargos->actualizar($id_cargo, $descripcion));

        echo json_encode($data);

//        if ($this->Model_cargos->actualizar($id_cargo, $descripcion)) {
//            redirect(base_url() . "Recursos_humanos/Controller_cargos");
//        } else {
//            $this->session->set_flashdata("error", "No se pudo actualizar la informacion");
//            redirect(base_url() . "Recursos_humanos/Controller_cargos/enlace_actualizar/" . $id_cargo);
//        }
    }

    public function eliminar($id_cargo) {

        $this->Model_cargos->actualizar_estado($id_cargo);
        redirect(base_url() . "Recursos_humanos/Controller_cargos");
    }

    public function verificar_cargo() {
        $descripcion = $this->input->post("descripcion"); //captura el parametro que le enviamos
        $data = $this->Model_cargos->verificar_cargo($descripcion); // le paso el parametro al metodo verificar_Cargo que se encuentra en el MODELO
        echo json_encode($data);
    }
    

}
