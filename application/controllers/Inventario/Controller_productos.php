<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_productos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("Inventario/Model_productos");
        $this->load->model("Multitablas/Model_multitablas");
    }

    public function index() {
        $data = array(
            'listar_personal' => $this->Model_productos->listar(),
        );
        $this->load->view("layouts/header");
        $this->load->view("layouts/aside");
        $this->load->view("Inventario/Productos/Listar", $data);
       
    }

    public function enlace_insertar() {
        $data = array(
            'multitablas_categorias' => $this->Model_multitablas->multitablas_categorias(),
        );

        $this->load->view("layouts/header");
        $this->load->view("layouts/aside");
        $this->load->view("Inventario/Productos/Insertar", $data);
       
    }

    public function insertar() {

        $nombre = $this->input->post("nombre");
        $marca = $this->input->post("marca");
        $descripcion = $this->input->post("descripcion");
        $precio_venta = $this->input->post("precio_venta");
        $precio_rebaja = $this->input->post("precio_rebaja");
        $precio_costo = $this->input->post("precio_costo");
        $stock = $this->input->post("stock");
        $id_categoria = $this->input->post("id_categoria");

        $data = array(
            'nombre' => $nombre,
            'marca' => $marca,
            'descripcion' => $descripcion,
            'precio_venta' => $precio_venta,
            'precio_rebaja' => $precio_rebaja,
            'precio_costo' => $precio_costo,
            'stock' => $stock,
            'id_categoria' => $id_categoria,
             'id_estado' => '1',
        );

        if ($this->Model_productos->insertar($data)) {
            redirect(base_url() . "Inventario/Controller_productos");
        }
    }

    public function enlace_actualizar($id_producto) {
        $data = array(
            'enlace_actualizar_personal' => $this->Model_productos->enlace_actualizar($id_producto),
            'multitablas_categorias' => $this->Model_multitablas->multitablas_categorias(),
        );

        $this->load->view("layouts/header");
        $this->load->view("layouts/aside");
        $this->load->view("Inventario/Productos/Actualizar", $data);
    
    }

    public function actualizar() {
        $id_producto = $this->input->post("id_producto");
        $nombre = $this->input->post("nombre");
        $marca = $this->input->post("marca");
        $descripcion = $this->input->post("descripcion");
        $precio_venta = $this->input->post("precio_venta");
        $precio_rebaja = $this->input->post("precio_rebaja");
        $precio_costo = $this->input->post("precio_costo");
        $stock = $this->input->post("stock");

        $id_categoria = $this->input->post("id_categoria");

        if ($this->Model_productos->actualizar($id_producto, $nombre, $marca, $descripcion, $precio_venta, $precio_rebaja, $precio_costo, $stock, $id_categoria)) {
            redirect(base_url() . "Inventario/Controller_productos");
        } else {
            $this->session->set_flashdata("error", "No se pudo actualizar la informacion");
            redirect(base_url() . "Inventario/Controller_productos/enlace_actualizar/" . $id_producto);
        }
    }

    public function eliminar($id_producto) {
        
        $this->Model_productos->actualizar_estado($id_producto);
        redirect(base_url() . "Inventario/Controller_productos");

    }

}