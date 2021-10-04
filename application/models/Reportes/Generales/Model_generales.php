
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_generales extends CI_Model {

    public function listar_comprobantes_facturas_boletas() {
        $resultados = $this->db->query("
        		SELECT
		a.id_venta as id
		,(CASE WHEN a.`id_tcomprobante` = '1' THEN b.nombre ELSE
		CASE WHEN a.`id_tcomprobante`='2' THEN b.`nombre` END END )AS ds_tcomprobante
		,(CASE WHEN c.id_tdocumento ='6' THEN razon_social ELSE
		CASE WHEN c.id_tdocumento='1' THEN CONCAT(c.nombre,' ',c.apepaterno,' ',c.apematerno) END END) razon_social
		,c.num_documento
		,a.fecha
		,CONCAT(b.serie,'-',a.num_comprobante) AS num_comprobante
		,a.monto_total
		FROM ventas a
		INNER JOIN tipo_comprobantes b ON b.id_tcomprobante=a.id_tcomprobante
		INNER JOIN clientes c ON c.id_cliente=a.id_cliente
		WHERE a.id_estado_venta='1'
        ");
        return $resultados->result();
    }

    public function listar_comprobantes_notas() {
        $resultados = $this->db->query("
        		SELECT 
		a.id_cre_deb as id
		,c.num_documento
		,(CASE WHEN c.id_tdocumento ='6' THEN razon_social ELSE
		CASE WHEN c.id_tdocumento='1' THEN CONCAT(c.nombre,' ',c.apepaterno,' ',c.apematerno) END END) razon_social
		,a.monto_total
		,a.fecha
		,CONCAT(d.serie,'-',a.num_comprobante) AS num_comprobante
		
		FROM nota_credito_debito a
		INNER JOIN ventas b ON b.id_venta=a.id_venta
		INNER JOIN clientes c ON c.id_cliente=b.id_cliente
		INNER JOIN tipo_comprobantes d ON d.id_tcomprobante=a.id_tcomprobante
        ");
        return $resultados->result();
    }

    public function parametros_cabecera_consultar_facturas_boletas_electronicos($a) {
        $resultados = $this->db->query("
SELECT
	a.id_venta
	,(CASE WHEN a.`id_tcomprobante` = '1' THEN b.nombre ELSE
	CASE WHEN a.`id_tcomprobante`='2' THEN b.`nombre` END END )AS ds_tcomprobante
	,(CASE WHEN c.id_tdocumento ='6' THEN razon_social ELSE
	CASE WHEN c.id_tdocumento='1' THEN CONCAT(c.nombre,' ',c.apepaterno,' ',c.apematerno) END END) razon_social
	,c.num_documento
	,a.fecha
	,CONCAT(b.serie,'-',a.num_comprobante) AS num_comprobante
	,a.monto_total
	,b.codigo AS 'tipo_de_comprobante'
	,a.num_comprobante AS 'numero'
	,b.serie AS 'serie'
	
	FROM ventas a
	INNER JOIN tipo_comprobantes b ON b.id_tcomprobante=a.id_tcomprobante
	INNER JOIN clientes c ON c.id_cliente=a.id_cliente
		WHERE a.id_estado_venta='1' AND id_venta='$a'            

        ");
        return $resultados->row();
    }

    public function parametros_cabecera_consultar_notas_electronicos($a) {
        $resultados = $this->db->query("
SELECT 
a.id_cre_deb
,c.num_documento
,(CASE WHEN c.id_tdocumento ='6' THEN razon_social ELSE
CASE WHEN c.id_tdocumento='1' THEN CONCAT(c.nombre,' ',c.apepaterno,' ',c.apematerno) END END) razon_social
,a.monto_total
,a.fecha
,CONCAT(d.serie,'-',a.num_comprobante) AS num_comprobante
,d.codigo AS 'tipo_de_comprobante'
,a.num_comprobante AS 'numero'
,d.serie AS 'serie'

FROM nota_credito_debito a
INNER JOIN ventas b ON b.id_venta=a.id_venta
INNER JOIN clientes c ON c.id_cliente=b.id_cliente
INNER JOIN tipo_comprobantes d ON d.id_tcomprobante=a.id_tcomprobante
                WHERE a.id_cre_deb='$a'        
");
        return $resultados->row();
    }

}
