
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_ventas extends CI_Model {

    public function listar() {
        $resultados = $this->db->query("SELECT (@rownum:=@rownum+1) AS item,
id_venta,cod_venta,fecha,igv,subtotal,monto_total,id_estado_venta,id_estado_nota,id_estado_anulacion,id_tcomprobante FROM 
(
SELECT @rownum:=0,id_venta,CONCAT('VEN-',id_venta) AS cod_venta,
fecha,igv,subtotal,monto_total,id_estado_venta,id_estado_nota,id_estado_anulacion,id_tcomprobante
FROM ventas) a");
        return $resultados->result();
    }

    public function insertar($direccion, $sub_total, $igv, $monto_total, $id_tcomprobante, $num_comprobante, $id_cliente, $id_vendedor) {
        return $this->db->query("INSERT INTO VENTAS VALUES ('','$direccion',NOW(),'$sub_total','$igv','$monto_total','$id_tcomprobante','$num_comprobante','$id_cliente','$id_vendedor','1','0','0','');");
    }

    public function lastID() {
        return $this->db->insert_id();
    }

    public function detalle_ventas($data) {
        $this->db->insert("detalle_ventas", $data);
    }

    public function actualizar_stock($id_producto, $cantidad) {
        return $this->db->query("UPDATE productos SET stock =stock-$cantidad WHERE id_producto='$id_producto'");
    }

    public function cabecera($id_venta) {
        $resultados = $this->db->query("
        SELECT (@rownum:=@rownum+1) AS item,
	a.id_venta,a.cod_venta,a.direccion,a.fecha,a.igv,a.subtotal,a.monto_total,
	(ds_cliente),
	ds_vendedor,
	ds_comprobante
        
        FROM 
        (SELECT @rownum:=0,
        a.id_venta,
        CONCAT('VEN-',a.id_venta) AS cod_venta,
        UPPER(a.direccion) direccion,
        a.fecha,
        a.igv,
        a.subtotal,
        a.monto_total,
        (CASE WHEN CONCAT(b.nombre,' ',b.apepaterno,' ',b.apematerno) IS NULL THEN b.razon_social ELSE
         CASE WHEN b.razon_social IS NULL THEN CONCAT(b.nombre,' ',b.apepaterno,' ',b.apematerno) END END) ds_cliente,
        UPPER(CONCAT(d.nombre,' ',d.apepaterno,' ',d.apematerno)) AS ds_vendedor,
        (CASE WHEN a.id_tcomprobante='1' THEN 'FACTURA' ELSE CASE WHEN a.id_tcomprobante='2' THEN 'BOLETA DE VENTA' END END) ds_comprobante
        
        FROM ventas a        
        LEFT JOIN clientes b ON b.id_cliente=a.id_cliente
        LEFT JOIN usuarios c ON c.id_usuario=a.id_usuario
        LEFT JOIN personal d ON d.id_personal=c.id_personal
        WHERE id_venta='$id_venta') a");
        return $resultados->row();
    }

    public function detalle($id_venta) {
        $resultados = $this->db->query("
            SELECT (@rownum:=@rownum+1) AS item,a.id_venta,ds_producto,marca,a.id_producto,a.precio,a.cantidad,a.importe FROM 
            (SELECT @rownum:=0,
            a.id_venta,
            UPPER(b.nombre) ds_producto,
            UPPER(b.marca) marca,
            a.id_producto,
            a.precio,
            a.cantidad,
            a.importe 
            FROM DETALLE_VENTAS  a
            LEFT JOIN PRODUCTOS b ON 
            b.id_producto=a.id_producto
            
            WHERE a.id_venta='$id_venta') a");
        return $resultados->result();
    }

    public function incrementar_comprobante($id_tcomprobante) {
        return $resultados = $this->db->query("
            UPDATE tipo_comprobantes SET num_comprobante=num_comprobante+1
            WHERE id_tcomprobante='$id_tcomprobante'");
    }

    public function parametros_cabecera_factura_electronica($id_venta) {
        $resultados = $this->db->query("
            SELECT
            a.id_venta,
            a.subtotal,
            a.igv,
            a.monto_total,
            b.id_tcomprobante AS tipo,
            b.serie,
            a.num_comprobante AS numero,
            a.direccion,
            c.id_tdocumento AS tdocumento,
            c.num_documento,
          
           (CASE WHEN c.id_tdocumento ='6' THEN razon_social ELSE
			CASE WHEN c.id_tdocumento='1' THEN CONCAT(c.nombre,' ',c.apepaterno,' ',c.apematerno) END END) razon_social
            
            FROM ventas a
            INNER JOIN tipo_comprobantes b ON b.id_tcomprobante=a.id_tcomprobante
            INNER JOIN clientes c ON c.id_cliente=a.id_cliente
            WHERE id_venta='$id_venta'
            ");
        return $resultados->row();
    }

    public function parametros_detalle_factura_electronica($id_venta) {
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
            a.importe                                     AS 'total',
            'false'                                     AS 'anticipo_regularizacion',
            ''                                          AS 'anticipo_documento_serie',
            ''                                          AS 'anticipo_documento_numero'
            FROM DETALLE_VENTAS a
            JOIN productos b ON b.id_producto=a.id_producto
            WHERE a.id_venta='$id_venta'
            ");
        return $resultados->result();
    }

    public function recuperar_datos_comprobante_cabecera($id_venta) {
        $resultados = $this->db->query("
       SELECT
        a.id_venta,
        (CASE WHEN CONCAT(b.nombre,' ',b.apepaterno,' ',b.apematerno) IS NULL THEN b.razon_social ELSE
         CASE WHEN b.razon_social IS NULL THEN CONCAT(b.nombre,' ',b.apepaterno,' ',b.apematerno) END END) ds_cliente,
        b.num_documento,
        UPPER(a.direccion) direccion,        
        e.nombre AS ds_comprobante, 
        e.serie,
        a.num_comprobante,
        a.igv,
        a.subtotal,
        a.monto_total
        FROM ventas a        
        LEFT JOIN clientes b ON b.id_cliente=a.id_cliente
        LEFT JOIN usuarios c ON c.id_usuario=a.id_usuario
        LEFT JOIN personal d ON d.id_personal=c.id_personal
	LEFT JOIN tipo_comprobantes e ON e.id_tcomprobante=a.id_tcomprobante
        WHERE id_venta='$id_venta'");
        return $resultados->row();
    }

    public function recuperar_datos_comprobante_detalle($id_venta) {
        $resultados = $this->db->query("
            SELECT
            a.id_detalle,
            a.id_venta,
            CONCAT('PRO-',a.id_producto) AS cod_producto,
            b.id_producto,
            UPPER(b.nombre) ds_producto,
            b.descripcion,
            a.precio,
            a.cantidad,
            a.importe,
            a.id_estado_stock_producto
            FROM DETALLE_VENTAS  a
            LEFT JOIN PRODUCTOS b ON 
            b.id_producto=a.id_producto
            WHERE a.id_venta='$id_venta' and a.id_estado='1'");
        return $resultados->result();
    }

    ////// DESDE AQUI EMPIEZA LA NOTA DE CREDITO

    public function insertar_nota_credito_debito($id_venta, $observacion, $id_tcomprobante, $serie, $num_comprobante, $sub_total, $igv, $monto_total, $id_tnota_credito, $id_tnota_debito) {
        return $this->db->query("INSERT INTO NOTA_CREDITO_DEBITO VALUES ('','$id_venta','$observacion','$id_tcomprobante','$serie','$num_comprobante','$sub_total','$igv','$monto_total',NOW(),$id_tnota_credito,$id_tnota_debito)");
    }

    public function generar_estado_credito_debito($id_venta) {
        return $this->db->query("UPDATE VENTAS SET id_estado_nota='1' where id_venta='$id_venta'");
    }

    public function detalle_nota_credito_debito($data) {
        $this->db->insert("detalle_credito_debito", $data);
    }

    public function remove_detalle($id_detalle) {
        return $this->db->query("UPDATE DETALLE_VENTAS SET id_estado='0' WHERE id_detalle ='$id_detalle'");
    }

    public function insertar_pdf_nubefact($id_venta, $enlace_del_pdf) {
        return $this->db->query("UPDATE VENTAS SET link_pdf_sunat='$enlace_del_pdf' WHERE id_venta ='$id_venta'");
    }

    public function generar_anulacion($id_venta, $motivo) {
        return $this->db->query("UPDATE VENTAS SET id_estado_anulacion='1' , motivo_anulacion='$motivo' where id_venta='$id_venta'");
    }

}
