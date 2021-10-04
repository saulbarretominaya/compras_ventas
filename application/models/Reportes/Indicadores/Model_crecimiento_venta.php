
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_crecimiento_venta extends CI_Model {

    public function listar() {
        $resultados = $this->db->query("
        SELECT @rownum:=0 as item,
                a.id_venta,
                a.fecha,
                b.cantidad,	
                c.precio_venta,
                c.precio_venta*b.cantidad  AS monto_total_venta,
                c.precio_costo,	
                c.precio_costo*b.cantidad  AS monto_total_costo,
                c.nombre AS nombre_producto
        FROM ventas a
        JOIN detalle_ventas b ON b.id_venta=a.id_venta
        JOIN productos c ON c.id_producto=b.id_producto");
        return $resultados->result();
    }

public function listar_con_fechas($fecha_desde, $fecha_hasta) {
        $resultados = $this->db->query("
       SELECT 
	fecha,
	SUM(monto_total) AS monto_total_venta
	FROM ventas
	GROUP BY fecha
	HAVING fecha >='$fecha_desde' AND fecha <='$fecha_hasta' ");
    return $resultados->result();
    }
    
    public function listar_con_fechas2($fecha_desde, $fecha_hasta) {
        $resultados = $this->db->query("
       SELECT 
	fecha,
	SUM(monto_total) AS monto_total_venta
	FROM ventas
	GROUP BY fecha
	HAVING fecha >='$fecha_desde' AND fecha <='$fecha_hasta' ");
    return $resultados->result();
    }

    public function insertar_temporal($data) {
        $this->db->insert("temporal", $data);
    }

    public function EliminarVistaCrecimientoVenta() {
        return $this->db->query("delete FROM temporal");
    }

    public function AutoIncrementVistaCrecimientoVenta() {
        return $this->db->query("ALTER TABLE temporal  AUTO_INCREMENT =1; ");
    }

    public function ListarVistaCrecimientoVenta() {
        $resultados = $this->db->query("
        SELECT
        id_temporal,fecha_reciente,valor_reciente,fecha_anterior,valor_anterior, 
        ROUND(((valor_reciente/valor_anterior)-1)*100,2) AS resultado
        FROM temporal");
        return $resultados->result();
    }

}
