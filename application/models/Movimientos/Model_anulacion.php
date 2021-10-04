<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_anulacion extends CI_Model {

    public function listar() {

        $resultados = $this->db->query("
        SELECT
        a.id_venta,
        (CASE WHEN a.`id_tcomprobante` = '1' THEN b.nombre ELSE
        CASE WHEN a.`id_tcomprobante`='2' THEN b.`nombre` END END )AS ds_tcomprobante,		
        CONCAT(b.serie,'-',a.num_comprobante) AS num_comprobante,
        c.num_documento,
        (CASE WHEN c.id_tdocumento ='6' THEN razon_social ELSE
        CASE WHEN c.id_tdocumento='1' THEN CONCAT(c.nombre,' ',c.apepaterno,' ',c.apematerno) END END) razon_social,
        a.motivo_anulacion,
        a.id_estado_anulacion

        FROM ventas a
        INNER JOIN tipo_comprobantes b ON b.id_tcomprobante=a.id_tcomprobante
        INNER JOIN clientes c ON c.id_cliente=a.id_cliente
        WHERE a.id_estado_anulacion='1'
       ");
        return $resultados->result();
    }

    public function parametros_cabecera_nota_electronica($id) {
        $resultados = $this->db->query("
        SELECT
        a.id_venta,
        (CASE WHEN a.`id_tcomprobante` = '1' THEN b.nombre ELSE
        CASE WHEN a.`id_tcomprobante`='2' THEN b.`nombre` END END )AS ds_tcomprobante,		
        CONCAT(b.serie,'-',a.num_comprobante) AS num_comprobante,
        c.num_documento,
        (CASE WHEN c.id_tdocumento ='6' THEN razon_social ELSE
        CASE WHEN c.id_tdocumento='1' THEN CONCAT(c.nombre,' ',c.apepaterno,' ',c.apematerno) END END) razon_social,
        a.motivo_anulacion,
        a.id_estado_anulacion,
        b.codigo 		AS 'tipo_de_comprobante', 
        b.serie 		AS 'serie',
        a.num_comprobante 	AS 'numero',
        a.motivo_anulacion 	AS 'motivo'

        FROM ventas a
        INNER JOIN tipo_comprobantes b ON b.id_tcomprobante=a.id_tcomprobante
        INNER JOIN clientes c ON c.id_cliente=a.id_cliente
        WHERE a.id_estado_anulacion='1' AND a.id_venta='$id'
            ");
        return $resultados->row();
    }


}
