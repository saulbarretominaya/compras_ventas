<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_usuarios extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("Administracion/Model_usuarios");
        $this->load->model("Multitablas/Model_multitablas");
    }

    #LISTAR

    public function index() {
        $data = array(
            'listar_usuarios' => $this->Model_usuarios->listar(),
        );
        $this->load->view("layouts/header");
        $this->load->view("layouts/aside");
        $this->load->view("Administracion/Usuarios/Listar", $data);
    }

    public function enlace_insertar() {

        $data = array(
            'multitablas_roles' => $this->Model_multitablas->multitablas_roles(),
            'multitablas_personal' => $this->Model_multitablas->multitablas_personal(),
        );
        $this->load->view("layouts/header");
        $this->load->view("layouts/aside");
        $this->load->view("Administracion/Usuarios/Insertar", $data);
       
    }

    public function insertar() {
        $usuario = $this->input->post("usuario");
        $contraseña = $this->input->post("contraseña");
        $id_personal = $this->input->post("id_personal");
        $id_rol = $this->input->post("id_rol");

        $data = array(
            'usuario' => $usuario,
            'contraseña' => $contraseña,
            'id_personal' => $id_personal,
            'id_rol' => $id_rol,
            'id_estado' => '1',
        );

        if ($this->Model_usuarios->insertar($data)) {
            redirect(base_url() . "Administracion/Controller_usuarios");
        }
    }

    #ENLACE UPDATE AREAS

    public function enlace_actualizar($id_usuario) {
        $data = array(
            'enlace_actualizar_usuarios' => $this->Model_usuarios->enlace_actualizar($id_usuario),
            'multitablas_roles' => $this->Model_multitablas->multitablas_roles(),
            'multitablas_personal' => $this->Model_multitablas->multitablas_personal(),
            'multitablas_estados' => $this->Model_multitablas->multitablas_estados(),
        );

        $this->load->view("layouts/header");
        $this->load->view("layouts/aside");
        $this->load->view("Administracion/Usuarios/Actualizar", $data);
       
    }

    public function actualizar() {
        $id_usuario = $this->input->post("id_usuario");
        $usuario = $this->input->post("usuario");
        $contraseña = $this->input->post("contraseña");
        $id_personal = $this->input->post("id_personal");
        $id_rol = $this->input->post("id_rol");
        $id_estado = $this->input->post("id_estado");

        $data = array(
            'usuario' => $usuario,
            'contraseña' => $contraseña,
            'id_personal' => $id_personal,
            'id_rol' => $id_rol,
            'id_estado' => $id_estado,
        );

        if ($this->Model_usuarios->actualizar($id_usuario, $data)) {
            redirect(base_url() . "Administracion/Controller_usuarios");
        } else {
            $this->session->set_flashdata("error", "No se pudo actualizar la informacion");
            redirect(base_url() . "Administracion/Controller_usuarios/enlace_actualizar/" . $id_usuario);
        }
    }

    /*
      #DELETE
      public function eliminar($id_area){
      $data= array(
      'estado'=>'0',
      );
      $this->Model_areas->actualizar($id_area,$data);
      echo "Maestros_generales/Controller_areas";
      }
     */
}
