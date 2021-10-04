<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_categoria extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("Inventario/Model_categoria");
    }

    public function index() {
        $data = array(
            'listar_categorias' => $this->Model_categoria->listar(),
        );
        $this->load->view("layouts/header");
        $this->load->view("layouts/aside");
        $this->load->view("Inventario/Categoria/Listar", $data);
        
    }

    public function enlace_insertar() {
        $this->load->view("layouts/header");
        $this->load->view("layouts/aside");
        $this->load->view("Inventario/Categoria/Insertar");
        
    }

    public function insertar() {
        $nombre = $this->input->post("nombre");
        $descripcion = $this->input->post("descripcion");
        $this->form_validation->set_rules("descripcion", "Descripcion", "required|is_unique[categorias.descripcion]");
         $this->form_validation->set_rules("nombre", "Nombre", "required|is_unique[categorias.nombre]");

        if ($this->form_validation->run()) {
            $data = array(
                'nombre' => $nombre,
                'descripcion' => $descripcion,
                 'id_estado' => '1',
            );

            if ($this->Model_categoria->insertar($data)) {
                redirect(base_url() . "Inventario/Controller_categoria");
            } else {
                $this->session->set_flashdata("error", "No se pudo guardar la informacion");
                redirect(base_url() . "Inventario/Controller_categoria/enlace_insertar");
            }
        } else {
            $this->enlace_insertar();
        }
    }

    public function enlace_actualizar($id_categoria) {
        $data = array(
            'enlace_actualizar_categoria' => $this->Model_categoria->enlace_actualizar($id_categoria),
        );

        $this->load->view("layouts/header");
        $this->load->view("layouts/aside");
        $this->load->view("Inventario/Categoria/Actualizar", $data);
    
    }

    public function actualizar() {
        $id_categoria = $this->input->post("id_categoria");
        $nombre = $this->input->post("nombre");
        $descripcion = $this->input->post("descripcion");

        if ($this->Model_categoria->actualizar($id_categoria, $nombre, $descripcion)) {
            redirect(base_url() . "Inventario/Controller_categoria");
        } else {
            $this->session->set_flashdata("error", "No se pudo actualizar la informacion");
            redirect(base_url() . "Inventario/Controller_categoria/enlace_actualizar/" . $id_categoria, $nombre, $descripcion);
        }
    }

        public function eliminar($id_categoria) {
        
        $this->Model_categoria->actualizar_estado($id_categoria);
        redirect(base_url() . "Inventario/Controller_categoria");

    }
    
//      public function verificar_categoria() {
//        $descripcion = $this->input->post("descripcion"); //captura el parametro que le enviamos
//        $data = $this->Model_cargos->verificar_cargo($descripcion); // le paso el parametro al metodo verificar_Cargo que se encuentra en el MODELO
//        echo json_encode($data);
//    }
    
    

}
