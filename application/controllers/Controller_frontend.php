
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_frontend extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("Frontend/Model_frontend");
    }

    public function index() {
        $data = array(
            'listar_productos' => $this->Model_frontend->listar(),
        );

        $this->load->view("Frontend/Catalogo/Listar", $data);
    }

    public function view() {
        $id_producto = $this->input->post("id_producto");
        $data = array(
            "cabecera" => $this->Model_frontend->cabecera($id_producto),
        );
        $this->load->view("Frontend/Catalogo/view",$data);
    }

}
