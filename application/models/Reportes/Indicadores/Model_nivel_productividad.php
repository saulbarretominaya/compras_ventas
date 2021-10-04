
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_nivel_productividad extends CI_Model {

    public function listar() {
        $resultados = $this->db->query("
    SELECT (@rownum:=@rownum+1) AS item,a.fecha,a.monto_total,a.horas_trabajadas,ROUND(monto_total/horas_trabajadas,2) AS nivel_productividad FROM 
    (
    SELECT 
    @rownum:=0,
    CAST(fecha AS DATE) fecha,
    SUM(monto_total) AS monto_total,
    '8' AS horas_trabajadas
    FROM VENTAS
    GROUP BY CAST(fecha AS DATE))a");
    return $resultados->result();
    }

    public function listar_con_fechas($fecha_desde, $fecha_hasta) {
        $resultados = $this->db->query("
    SELECT (@rownum:=@rownum+1) AS item,a.fecha,a.monto_total,a.horas_trabajadas,ROUND(monto_total/horas_trabajadas,2) AS nivel_productividad FROM 
    (
    SELECT 
    @rownum:=0,
    CAST(fecha AS DATE) fecha,
    SUM(monto_total) AS monto_total,
    '8' AS horas_trabajadas
    FROM VENTAS
    GROUP BY CAST(fecha AS DATE))a
    HAVING fecha >='$fecha_desde' AND fecha <='$fecha_hasta'");
    return $resultados->result();
    }

}
