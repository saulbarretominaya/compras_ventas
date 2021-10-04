<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_clientes extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("Movimientos/Model_clientes");
//        $this->load->model("Planeamiento/Model_areas");
//        $this->load->model("Recursos_humanos/Model_cargos");
        $this->load->model("Multitablas/Model_multitablas");
    }

    public function index() {
        $data = array(
            'listar_clientes' => $this->Model_clientes->listar(),
        );
        $this->load->view("layouts/header");
        $this->load->view("layouts/aside");
        $this->load->view("Movimientos/Clientes/Listar", $data);
    }

    public function enlace_insertar() {
        #Capturo el dato del combo box de tabla detalle - areas y tipo_personal
        $data = array(
//            'nombre_areas' => $this->Model_areas->nombre(),
//            'descripcion_cargos' => $this->Model_cargos->listar(),
//            'multitablas_tipo_personal' => $this->Model_multitablas->multitablas_tipo_personal(),
            'multitablas_tipo_documentos' => $this->Model_multitablas->multitablas_tipo_documentos(),
        );

        $this->load->view("layouts/header");
        $this->load->view("layouts/aside");
        $this->load->view("Movimientos/Clientes/Insertar", $data);
    }

    public function insertar() {
        $nombre = $this->input->post("nombre");
        $apepaterno = $this->input->post("apepaterno");
        $apematerno = $this->input->post("apematerno");
        $telefono = $this->input->post("telefono");
        $email = $this->input->post("email");
        $direccion = $this->input->post("direccion");
        $id_tdocumento = $this->input->post("id_tdocumento");
        $num_documento = $this->input->post("num_documento");
        $razon_social = $this->input->post("razon_social");

        $data = array(
            'nombre' => $nombre,
            'apepaterno' => $apepaterno,
            'apematerno' => $apematerno,
            'telefono' => $telefono,
            'email' => $email,
            'direccion' => $direccion,
            'id_tdocumento' => $id_tdocumento,
            'num_documento' => $num_documento,
            'razon_social' => $razon_social,
            'id_estado' => '1',
        );

        $this->Model_clientes->insertar($data);

        echo json_encode($data);
    }

    public function enlace_actualizar($id_clientes) {
        $data = array(
            'enlace_actualizar_personal' => $this->Model_clientes->enlace_actualizar($id_clientes),
            'multitablas_tipo_documentos' => $this->Model_multitablas->multitablas_tipo_documentos(),
        );

        $this->load->view("layouts/header");
        $this->load->view("layouts/aside");
        $this->load->view("Movimientos/Clientes/Actualizar.php", $data);
    }

    public function actualizar() {
        $id_personal = $this->input->post("id_personal");
        $nombre = $this->input->post("nombre");
        $apepaterno = $this->input->post("apematerno");
        $apematerno = $this->input->post("apepaterno");
        $telefono = $this->input->post("telefono");
        $email = $this->input->post("email");
        $direccion = $this->input->post("direccion");
        $id_tdocumento = $this->input->post("id_tdocumento");
        $num_documento = $this->input->post("num_documento");
        $razon_social = $this->input->post("razon_social");
        
        $data = array(
            'nombre' => $nombre,
            'apematerno' => $apepaterno,
            'apepaterno' => $apematerno,
            'telefono' => $telefono,
            'email' => $email,
            'direccion' => $direccion,
            'razon_social' => $razon_social,
            'id_tdocumento' => $id_tdocumento,
            'num_documento' => $num_documento,
        );

       $this->Model_clientes->actualizar($id_personal, $data);
        echo json_encode($data);
    }

    public function eliminar($id_cargo) {

        $this->Model_clientes->actualizar_estado($id_cargo);
        redirect(base_url() . "Movimientos/Controller_clientes");
    }
    
    
    public function verificar_personal() {
        $num_documento = $this->input->post("num_documento"); //captura el parametro que le enviamos
        $data = $this->Model_clientes->verificar_cargo($num_documento); // le paso el parametro al metodo verificar_Cargo que se encuentra en el MODELO
        echo json_encode($data);
    }

    public function verificar_dni_actualizar() {
        $id_personal = $this->input->post("id_personal"); //captura el parametro que le enviamos
        $num_documento = $this->input->post("num_documento"); //captura el parametro que le enviamos
        $data = $this->Model_clientes->verificar_dni_actualizar($id_personal, $num_documento); // le paso el parametro al metodo verificar_Cargo que se encuentra en el MODELO
        echo json_encode($data);
    }

}
