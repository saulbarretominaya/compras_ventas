
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_ventas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("Movimientos/Model_ventas");
        $this->load->model("Multitablas/Model_multitablas");
    }

    public function index() {
        $data = array(
            'listar_ventas' => $this->Model_ventas->listar(),
        );

        $this->load->view("layouts/header");
        $this->load->view("layouts/aside");
        $this->load->view("Movimientos/Ventas/Listar", $data);
    }

    public function enlace_insertar() {
        $data = array(
            'multitablas_productos' => $this->Model_multitablas->multitablas_productos(),
            'multitablas_clientes' => $this->Model_multitablas->multitablas_clientes(),
            'multitablas_comprobantes_boletas' => $this->Model_multitablas->multitablas_comprobantes_boletas(),
            'multitablas_comprobantes_facturas' => $this->Model_multitablas->multitablas_comprobantes_facturas(),
        );
        $this->load->view("layouts/header");
        $this->load->view("layouts/aside");
        $this->load->view("Movimientos/Ventas/Insertar", $data);
    }

    public function insertar() {
        //CABECERA
        $id_cliente = $this->input->post("id_cliente");
        $direccion = $this->input->post("direccion");
        $igv = $this->input->post("igv");
        $sub_total = $this->input->post("sub_total");
        $monto_total = $this->input->post("monto_total");
        $id_vendedor = $this->input->post("id_vendedor");
        $num_comprobante = $this->input->post("num_comprobante");

        //TIPO_COMPROBANTE AUMENTA LA BOLETA O FACTURA
        $id_tcomprobante = $this->input->post("id_tcomprobante");

        //DETALLE
        $id_producto = $this->input->post("id_producto");
        $precio = $this->input->post("precio");
        $cantidad = $this->input->post("cantidad");
        $importe = $this->input->post("importe");


        if ($this->Model_ventas->insertar($direccion, $sub_total, $igv, $monto_total, $id_tcomprobante, $num_comprobante, $id_cliente, $id_vendedor)) {
            $id_venta = $this->Model_ventas->lastID();
            $id_tcomprobante = $this->Model_ventas->incrementar_comprobante($id_tcomprobante);
            $this->detalle_ventas($id_venta, $id_producto, $precio, $cantidad, $importe);
            $this->actualizar_stock($id_producto, $cantidad); //disminuir stock
            redirect(base_url() . "Movimientos/Controller_ventas");
        } /* else {
          redirect(base_url() . "Logistica/Controller_ventas/enlace_insertar");
          } */
    }

    protected function detalle_ventas($id_venta, $id_producto, $precio, $cantidad, $importe) {

        for ($i = 0; $i < count($id_producto); $i++) {

            $data = array(
                'id_venta' => $id_venta,
                'id_producto' => $id_producto[$i],
                'precio' => $precio[$i],
                'cantidad' => $cantidad[$i],
                'importe' => $importe[$i],
                'id_estado' => '1',
                'id_estado_stock_producto' => '1',
            );
            $this->Model_ventas->detalle_ventas($data);
        }
    }

    protected function actualizar_stock($id_producto, $cantidad) {
        for ($i = 0; $i < count($id_producto); $i++) { //RECORRER NO OLVIDARSE JAMAS!!!!!
            $this->Model_ventas->actualizar_stock($id_producto[$i], $cantidad[$i]);
        }
    }

    public function view() {
        $id_venta = $this->input->post("id_venta");
        $data = array(
            "cabecera" => $this->Model_ventas->cabecera($id_venta),
            "detalle" => $this->Model_ventas->detalle($id_venta),
        );
        $this->load->view("Movimientos/Ventas/view", $data);
    }

    public function enviar_facturacion_electronica($id_venta) {
        $data = array(
            "param" => $this->Model_ventas->parametros_cabecera_factura_electronica($id_venta), //filas
            "param2" => $this->Model_ventas->parametros_detalle_factura_electronica($id_venta), //resultado
        );
        $this->load->view("layouts/header");
        $this->load->view("layouts/aside");
        $this->load->view("Movimientos/Ventas/Facturacion", $data);
    }

    // NOTA DE CREDITO DE AQUI HACIA ABAJO

    public function enlace_actualizar($id_venta) {

        $data = array(
            'multitablas_productos' => $this->Model_multitablas->multitablas_productos(),
            'multitablas_clientes' => $this->Model_multitablas->multitablas_clientes(),
            //FACTURAS
            'multitablas_comprobantes_nota_credito_facturas' => $this->Model_multitablas->multitablas_comprobantes_nota_credito_facturas(),
            'multitablas_comprobantes_nota_debito_facturas' => $this->Model_multitablas->multitablas_comprobantes_nota_debito_facturas(),
            //BOLETAS
            'multitablas_comprobantes_nota_credito_boletas' => $this->Model_multitablas->multitablas_comprobantes_nota_credito_boletas(),
            'multitablas_comprobantes_nota_debito_boletas' => $this->Model_multitablas->multitablas_comprobantes_nota_debito_boletas(),
            'recuperar_datos_comprobante_cabecera' => $this->Model_ventas->recuperar_datos_comprobante_cabecera($id_venta),
            'recuperar_datos_comprobante_detalle' => $this->Model_ventas->recuperar_datos_comprobante_detalle($id_venta),
            'multitablas_tipo_nota_credito' => $this->Model_multitablas->multitablas_tipo_nota_credito(),
            'multitablas_tipo_nota_debito' => $this->Model_multitablas->multitablas_tipo_nota_debito(),
        );

        $this->load->view("layouts/header");
        $this->load->view("layouts/aside");
        $this->load->view("Movimientos/Ventas/NotaCredito", $data);
    }

    public function insertar_nota_credito_debito() {
        //CABECERA
        $id_venta = $this->input->post("id_venta");
        $observacion = $this->input->post("observacion");
        $serie = $this->input->post("serie");
        $num_comprobante = $this->input->post("num_comprobante");
        $sub_total = $this->input->post("sub_total");
        $igv = $this->input->post("igv");
        $monto_total = $this->input->post("monto_total");
        //TIPO_COMPROBANTE AUMENTA LA BOLETA O FACTURA
        $id_tcomprobante = $this->input->post("id_tcomprobante");


        $id_tnota_credito = $this->input->post("id_tnota_credito");
        $id_tnota_debito = $this->input->post("id_tnota_debito");


        if ($id_tnota_credito === '') {
            $id_tnota_credito = 'NULL';
        }

        if ($id_tnota_debito === '') {
            $id_tnota_debito = 'NULL';
        }

        //DETALLE DE LA NOTA DE CREDITO Y DEBITO
        $id_producto = $this->input->post("id_producto");
        $precio = $this->input->post("precio");
        $cantidad = $this->input->post("cantidad");
        $importe = $this->input->post("importe");
        //Ids a Eliminar

        $detalles_remove = $this->input->post("id_solicitud_to_remove");
        $detalles_remove = $this->input->post("id_estado_stock_producto");

        if ($this->Model_ventas->insertar_nota_credito_debito($id_venta, $observacion, $id_tcomprobante, $serie, $num_comprobante, $sub_total, $igv, $monto_total, $id_tnota_credito, $id_tnota_debito)) {

            $id_cre_deb = $this->Model_ventas->lastID();
            $id_tcomprobante = $this->Model_ventas->incrementar_comprobante($id_tcomprobante);
            $this->detalle_nota_credito_debito($id_cre_deb, $id_producto, $precio, $cantidad, $importe);
            $this->Model_ventas->generar_estado_credito_debito($id_venta);
            $this->actualizar_stock($id_producto, $cantidad); //disminuir stock

            if ($detalles_remove != null) {
                $this->remove_detalle($detalles_remove);
            }

            redirect(base_url() . "Movimientos/Controller_ventas");
        }
    }

    protected function detalle_nota_credito_debito($id_cre_deb, $id_producto, $precio, $cantidad, $importe) {

        for ($i = 0; $i < count($id_producto); $i++) {

            $data = array(
                'id_cre_deb' => $id_cre_deb,
                'id_producto' => $id_producto[$i],
                'precio' => $precio[$i],
                'cantidad' => $cantidad[$i],
                'importe' => $importe[$i],
            );
            $this->Model_ventas->detalle_nota_credito_debito($data);
        }
    }

    protected function remove_detalle($id_detallle_viatico) {
        for ($i = 0; $i < count($id_detallle_viatico); $i++) {
            $this->Model_ventas->remove_detalle($id_detallle_viatico[$i]);
        }
    }

    //ANULACION!!!!!!!!!

    public function enlace_actualizar_anulacion($id_venta) {

        $data = array(
            'multitablas_productos' => $this->Model_multitablas->multitablas_productos(),
            'multitablas_clientes' => $this->Model_multitablas->multitablas_clientes(),
            //FACTURAS
            'multitablas_comprobantes_nota_credito_facturas' => $this->Model_multitablas->multitablas_comprobantes_nota_credito_facturas(),
            'multitablas_comprobantes_nota_debito_facturas' => $this->Model_multitablas->multitablas_comprobantes_nota_debito_facturas(),
            //BOLETAS
            'multitablas_comprobantes_nota_credito_boletas' => $this->Model_multitablas->multitablas_comprobantes_nota_credito_boletas(),
            'multitablas_comprobantes_nota_debito_boletas' => $this->Model_multitablas->multitablas_comprobantes_nota_debito_boletas(),
            'recuperar_datos_comprobante_cabecera' => $this->Model_ventas->recuperar_datos_comprobante_cabecera($id_venta),
            'recuperar_datos_comprobante_detalle' => $this->Model_ventas->recuperar_datos_comprobante_detalle($id_venta),
            'multitablas_tipo_nota_credito' => $this->Model_multitablas->multitablas_tipo_nota_credito(),
            'multitablas_tipo_nota_debito' => $this->Model_multitablas->multitablas_tipo_nota_debito(),
        );

        $this->load->view("layouts/header");
        $this->load->view("layouts/aside");
        $this->load->view("Movimientos/Ventas/Anulacion", $data);
    }

    public function insertar_anulacion() {
        //CABECERA
        $id_venta = $this->input->post("id_venta");
        $motivo = $this->input->post("motivo");
        

        $this->Model_ventas->generar_anulacion($id_venta,$motivo);


        redirect(base_url() . "Movimientos/Controller_ventas");
    }

}
