<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_multitablas extends CI_Model {

    public function multitablas_tipo_ruta() {
        $this->db->select("id_truta,nombre as ds_truta");
        $this->db->from("tipo_rutas");
        $resultados = $this->db->get();
        return $resultados->result();
    }

    public function multitablas_conceptos() {
        $this->db->select("id_concepto,nombre as ds_concepto");
        $this->db->from("conceptos");
        $resultados = $this->db->get();
        return $resultados->result();
    }

    public function multitablas_roles() {
        $resultados = $this->db->query("select id_rol,nombre as ds_rol from roles");
        return $resultados->result();
    }

    public function multitablas_personal() {
        $resultados = $this->db->query("SELECT a.id_personal, 
        CONCAT(a.apepaterno,' ',a.apematerno,' ',a.nombre) AS ds_nombres
        FROM personal a");
        return $resultados->result();
    }

    public function multitablas_estados() {
        $resultados = $this->db->query("select id_estado, nombre as ds_estado from estados where id_estado in(0,1)");
        return $resultados->result();
    }

    public function multitablas_tipo_documentos() {
        $this->db->select("a.id_tdocumento,a.abreviatura,a.descripcion");
        $this->db->from("tipo_documentos a");
        $resultados = $this->db->get();
        return $resultados->result();
    }

    public function multitablas_categorias() {
        $resultados = $this->db->query("select id_categoria,nombre as ds_categoria from categorias");
        return $resultados->result();
    }

    public function multitablas_productos() {
        $resultados = $this->db->query("
                SELECT id_producto,CONCAT('PRO-',id_producto) AS cod_producto,nombre AS ds_producto,descripcion,precio_venta,stock 
                FROM productos
                where stock>0;");
        return $resultados->result();
    }

    //Tabla tipo emision Factura, Boleta, DJS
    public function multitablas_tipo_emision_rendicion() {
        $this->db->select("a.id, a.nombre");
        $this->db->from("tipo_emision_rendicion a");
        $resultados = $this->db->get();
        return $resultados->result();
    }

    //PAra Combo Box - Solo para Listas
//    public function multitablas_comprobantes() {
//              $resultados = $this->db->query("SELECT id_tcomprobante,nombre,serie,num_comprobante FROM tipo_comprobantes");
//        return $resultados->result();
//    }

    public function multitablas_comprobantes_facturas() {
        $resultados = $this->db->query(" 
            SELECT 
            id_tcomprobante,codigo,nombre,serie,num_comprobante+1 AS num_comprobante 
            FROM tipo_comprobantes 
            WHERE id_tcomprobante='1' AND NOMBRE='Factura' AND descripcion='Venta'");
        return $resultados->result();
    }

    public function multitablas_comprobantes_boletas() {
        $resultados = $this->db->query("
        SELECT 
        id_tcomprobante,codigo,nombre,serie,num_comprobante+1 AS num_comprobante 
        FROM tipo_comprobantes 
        WHERE id_tcomprobante='2' AND NOMBRE='Boleta' AND descripcion='Venta'");
        return $resultados->result();
    }

    //ESTO ES PARA FACTURAS DESPUES DE HABER GENERADO UNA VENTA
    public function multitablas_comprobantes_nota_credito_facturas() {
        $resultados = $this->db->query("
        SELECT id_tcomprobante,codigo,nombre,serie,num_comprobante+1 AS num_comprobante 
        FROM tipo_comprobantes 
        WHERE id_tcomprobante='3' AND nombre='Nota Credito' AND descripcion='Factura'");
        return $resultados->result();
    }

    public function multitablas_comprobantes_nota_debito_facturas() {
        $resultados = $this->db->query(" 
        SELECT id_tcomprobante,codigo,nombre,serie,num_comprobante+1 AS num_comprobante 
        FROM tipo_comprobantes 
        WHERE id_tcomprobante='4' AND nombre='Nota Debito' AND descripcion='Factura'");
        return $resultados->result();
    }
    //FIN
    
    //ESTO ES PARA BOLETAS DESPUES DE HABER GENERADO UNA VENTA
    public function multitablas_comprobantes_nota_credito_boletas() {
        $resultados = $this->db->query("
        SELECT id_tcomprobante,codigo,nombre,serie,num_comprobante+1 AS num_comprobante 
        FROM tipo_comprobantes 
        WHERE id_tcomprobante='5' AND nombre='Nota Credito' AND descripcion='Boleta'");
        return $resultados->result();
    }

    public function multitablas_comprobantes_nota_debito_boletas() {
        $resultados = $this->db->query(" 
        SELECT id_tcomprobante,codigo,nombre,serie,num_comprobante+1 AS num_comprobante 
        FROM tipo_comprobantes 
        WHERE id_tcomprobante='6' AND nombre='Nota Debito' AND descripcion='Boleta'");
        return $resultados->result();
    }
    
    //FIN
    
    
    

    public function multitablas_clientes() {
        $resultados = $this->db->query("SELECT  (@rownum:=@rownum+1) AS item,
	a.id_cliente,cod_cliente,ds_nombres,a.telefono,a.direccion,a.num_documento,abreviatura,a.email FROM
	(SELECT @rownum:=0,a.id_cliente,
	CONCAT('CLI-',id_cliente) AS cod_cliente,
	
        
        (CASE WHEN b.abreviatura='RUC' THEN a.razon_social ELSE
	CASE WHEN b.abreviatura='DNI' THEN CONCAT(a.nombre,' ',a.apepaterno,' ',a.apematerno) END END) ds_nombres,

        a.telefono,a.direccion,a.num_documento,b.abreviatura,a.email
        FROM clientes a
        LEFT JOIN tipo_documentos b ON b.id_tdocumento=a.id_tdocumento) a");
        return $resultados->result();
    }

    public function multitablas_tipo_nota_credito() {
        $resultados = $this->db->query("SELECT id_tnota_credito, nombre AS ds_nota_credito  FROM tipo_nota_credito;");
        return $resultados->result();
    }
    
    public function multitablas_tipo_nota_debito() {
        $resultados = $this->db->query("SELECT id_tnota_debito, nombre AS ds_nota_debito  FROM tipo_nota_debito;");
        return $resultados->result();
    }

}
