<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_personal extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("Recursos_humanos/Model_personal");

        $this->load->model("Recursos_humanos/Model_cargos");
        $this->load->model("Multitablas/Model_multitablas");
    }

    public function index() {
        $data = array(
            'listar_personal' => $this->Model_personal->listar(),
        );
        $this->load->view("layouts/header");
        $this->load->view("layouts/aside");
        $this->load->view("Recursos_humanos/Personal/Listar", $data);
    }

    public function enlace_insertar() {
        #Capturo el dato del combo box de tabla detalle - areas y tipo_personal
        $data = array(
//           
            'descripcion_cargos' => $this->Model_cargos->listar(),
//     
            'multitablas_tipo_documentos' => $this->Model_multitablas->multitablas_tipo_documentos(),
        );

        $this->load->view("layouts/header");
        $this->load->view("layouts/aside");
        $this->load->view("Recursos_humanos/Personal/Insertar", $data);
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
        $id_cargo = $this->input->post("id_cargo");


        $data = array(
            'nombre' => $nombre,
            'apepaterno' => $apepaterno,
            'apematerno' => $apematerno,
            'telefono' => $telefono,
            'email' => $email,
            'direccion' => $direccion,
            'id_tdocumento' => $id_tdocumento,
            'num_documento' => $num_documento,
//            'id_area' => $id_area,
            'id_cargo' => $id_cargo,
//            'id_tpersonal' => $id_tpersonal,
            'id_estado' => '1',
        );

        $this->Model_personal->insertar($data);

        echo json_encode($data);

//        if ($this->Model_personal->insertar($data)) {
//            redirect(base_url() . "Recursos_humanos/Controller_personal");
//        }
    }

    public function enlace_actualizar($id_personal) {
        $data = array(
            'enlace_actualizar_personal' => $this->Model_personal->enlace_actualizar($id_personal),
//            'nombre_areas' => $thi s->Model_areas->nombre(),
            'descripcion_cargos' => $this->Model_cargos->listar(),
//            'multitablas_tipo_personal' => $this->Model_multitablas->multitablas_tipo_personal(),
            'multitablas_tipo_documentos' => $this->Model_multitablas->multitablas_tipo_documentos(),
        );

        $this->load->view("layouts/header");
        $this->load->view("layouts/aside");
        $this->load->view("Recursos_humanos/Personal/Actualizar.php", $data);
    }

    public function actualizar() {
        $id_personal = $this->input->post("id_personal");
        $nombre = $this->input->post("nombre");
        $apepaterno = $this->input->post("apematerno");
        $apematerno = $this->input->post("apepaterno");
        $telefono = $this->input->post("telefono");
        $email = $this->input->post("email");
        $direccion = $this->input->post("direccion");
        //$id_area = $this->input->post("id_area");
        $id_cargo = $this->input->post("id_cargo");
        //$id_tpersonal = $this->input->post("id_tpersonal");
        $id_tdocumento = $this->input->post("id_tdocumento");
        $num_documento = $this->input->post("num_documento");

        $data = array(
            'nombre' => $nombre,
            'apematerno' => $apepaterno,
            'apepaterno' => $apematerno,
            'telefono' => $telefono,
            'email' => $email,
            'direccion' => $direccion,
            //'id_area' => $id_area,
            'id_cargo' => $id_cargo,
            //  'id_tpersonal' => $id_tpersonal,
            'id_tdocumento' => $id_tdocumento,
            'num_documento' => $num_documento,
        );

        $this->Model_personal->actualizar($id_personal, $data);
        echo json_encode($data);



    }

    public function eliminar($id_personal) {

        $this->Model_personal->actualizar_estado($id_personal);
        redirect(base_url() . "Recursos_humanos/Controller_personal");
    }

    public function verificar_personal() {
        $num_documento = $this->input->post("num_documento"); //captura el parametro que le enviamos
        $data = $this->Model_personal->verificar_cargo($num_documento); // le paso el parametro al metodo verificar_Cargo que se encuentra en el MODELO
        echo json_encode($data);
    }

    public function verificar_dni_actualizar() {
        $id_personal = $this->input->post("id_personal"); //captura el parametro que le enviamos
        $num_documento = $this->input->post("num_documento"); //captura el parametro que le enviamos
        $data = $this->Model_personal->verificar_dni_actualizar($id_personal, $num_documento); // le paso el parametro al metodo verificar_Cargo que se encuentra en el MODELO
        echo json_encode($data);
    }

}
