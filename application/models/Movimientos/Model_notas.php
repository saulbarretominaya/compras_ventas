<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_notas extends CI_Model {

    public function listar() {

        $resultados = $this->db->query("
        SELECT
        CONCAT('NOT-',a.id_cre_deb) AS ds_cre_deb,
        id_cre_deb,
        a.id_venta,a.observacion,a.id_tcomprobante,a.subtotal,a.igv,a.monto_total,
        b.nombre AS ds_tcomprobante,
        (CASE WHEN CONCAT(d.nombre,' ',d.apepaterno,' ',d.apematerno) IS NULL THEN d.razon_social ELSE
         CASE WHEN d.razon_social IS NULL THEN CONCAT(d.nombre,' ',d.apepaterno,' ',d.apematerno) END END) ds_cliente,
        d.num_documento,
        CONCAT (a.serie,'-',a.num_comprobante) AS ds_num_comprobante,
        a.fecha
        FROM NOTA_CREDITO_DEBITO a
        JOIN tipo_comprobantes b ON b.id_tcomprobante=a.id_tcomprobante
        JOIN ventas c ON c.id_venta=a.id_venta
        JOIN clientes d ON d.id_cliente=c.id_cliente
       ");
        return $resultados->result();
    }

    public function parametros_cabecera_nota_electronica($id_cre_deb) {
        $resultados = $this->db->query("
        SELECT
	 a.id_cre_deb,
	 a.subtotal,
	 a.igv,
	 a.monto_total,		
	 b.codigo       		AS tipo_de_comprobante,
	 b.serie			AS serie,
	 a.num_comprobante		AS numero,
	 g.id_tdocumento                AS tdocumento,
	 g.num_documento,
          
           (CASE WHEN g.id_tdocumento ='6' THEN razon_social ELSE
			CASE WHEN g.id_tdocumento='1' THEN CONCAT(g.nombre,' ',g.apepaterno,' ',g.apematerno) END END) razon_social,
			
			
            
	  c.direccion                    AS direccion,
	  a.observacion			AS observaciones,
	  c.id_tcomprobante 		AS documento_que_se_modifica_tipo,
	  d.serie 			AS documento_que_se_modifica_serie,
	  c.num_comprobante 		AS documento_que_se_modifica_numero,
	  e.id_tnota_credito		AS tipo_de_nota_de_credito,
	  f.id_tnota_debito		AS tipo_de_nota_de_debito            
            
	  FROM nota_credito_debito a
	  INNER JOIN tipo_comprobantes b ON b.id_tcomprobante=a.id_tcomprobante
	  INNER JOIN ventas c ON c.id_venta=a.id_venta
	  INNER JOIN tipo_comprobantes d ON d.id_tcomprobante=c.id_tcomprobante
          LEFT JOIN tipo_nota_credito e ON e.id_tnota_credito=a.id_tnota_credito
          LEFT JOIN tipo_nota_debito  f ON f.id_tnota_debito=a.id_tnota_debito
          INNER JOIN clientes g ON g.id_cliente=c.`id_cliente`
                
                      
        WHERE a.id_cre_deb='$id_cre_deb'
            ");
        return $resultados->row();
    }

    public function parametros_detalle_nota_electronica($id_cre_deb) {
        $resultados = $this->db->query("
          SELECT
            'NIU' 					AS 'unidad_de_medida',
            b.id_producto 				AS 'codigo',
            b.nombre		 			AS 'descripcion',
            a.cantidad            		        AS 'cantidad',
            ROUND((precio/1.18),2) 			AS 'valor_unitario',
            a.precio 					AS 'precio_unitario',
            ''                                          AS 'descuento',
            ROUND(((precio/1.18)*cantidad),2)           AS 'subtotal',
            '1' 					AS 'tipo_de_igv',
            ROUND(((importe/1.18)*0.18),2) 		AS 'igv',
            a.importe                                   AS 'total',
            'false'                                     AS 'anticipo_regularizacion',
            ''                                          AS 'anticipo_documento_serie',
            ''                                          AS 'anticipo_documento_numero'
            FROM detalle_credito_debito a
            JOIN productos b ON b.id_producto=a.id_producto
            WHERE a.id_cre_deb='$id_cre_deb'
            ");
        return $resultados->result();
    }

}
