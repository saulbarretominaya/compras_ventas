<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_crecimiento_venta extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("Reportes/Indicadores/Model_crecimiento_venta");
    }

    public function index() {

        $fecha_desde = $this->input->post("fecha_desde");
        $fecha_hasta = $this->input->post("fecha_hasta");


        $fecha_desde2 = $this->input->post("fecha_desde2");
        $fecha_hasta2 = $this->input->post("fecha_hasta2");


        $data = array(
            'listar_crecimiento_venta' => $this->Model_crecimiento_venta->listar_con_fechas($fecha_desde, $fecha_hasta),
            'listar_crecimiento_venta2' => $this->Model_crecimiento_venta->listar_con_fechas2($fecha_desde2, $fecha_hasta2),
            'fecha_desde' => $fecha_desde,
            'fecha_hasta' => $fecha_hasta,
            'fecha_desde2' => $fecha_desde2,
            'fecha_hasta2' => $fecha_hasta2,
        );
        $this->load->view("layouts/header");
        $this->load->view("layouts/aside");
        $this->load->view("Reportes/Indicadores/ListarCrecimientoVenta", $data);
    }

    public function insertar_temporal() {

        //$item = $this->input->post("item");
        $fecha = $this->input->post("fecha");
        $monto_total = $this->input->post("monto_total");

        $fecha2 = $this->input->post("fecha2");
        $monto_total2 = $this->input->post("monto_total2");

        $this->Model_crecimiento_venta->EliminarVistaCrecimientoVenta(); //ELIMINAR 

        $this->Model_crecimiento_venta->AutoIncrementVistaCrecimientoVenta(); //AUTOINCREMENT

        $this->detalle($fecha, $monto_total, $fecha2, $monto_total2); //INSERTAR

        $data = array(//LISTAR
            'ListarVistaCrecimientoVenta' => $this->Model_crecimiento_venta->ListarVistaCrecimientoVenta(),
        );
        $this->load->view("layouts/header");
        $this->load->view("layouts/aside");
        $this->load->view("Reportes/Indicadores/ListarVistaCrecimientoVenta", $data);
    }

    protected function detalle($fecha, $monto_total, $fecha2, $monto_total2) {

        for ($i = 0; $i < count($fecha); $i++) {

            $data = array(
                'id_temporal' => '',
                'fecha_reciente' => $fecha[$i],
                'valor_reciente' => $monto_total[$i],
                'fecha_anterior' => $fecha2[$i],
                'valor_anterior' => $monto_total2[$i],
                'resultado' => '',
            );
            $this->Model_crecimiento_venta->insertar_temporal($data);
        }
    }

}
