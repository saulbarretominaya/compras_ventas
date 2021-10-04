<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_indicadores extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database('default', TRUE);
    }

    //primero se ejecuta el grafico
    public function grafico1($year) {
        $resultados = $this->db->query("
            
        SELECT mes, ROUND((monto_total/horas_trabajadas),2) AS nivel_productividad  FROM ( 
        SELECT  MONTH(fecha) AS mes, SUM(monto_total) AS monto_total, SUM(horas_trabajadas) AS horas_trabajadas FROM (
	SELECT
		fecha,
		SUM(monto_total) AS monto_total,
		'8' AS horas_trabajadas
		FROM VENTAS
		GROUP BY fecha)a
		WHERE fecha >='$year-01-01' AND fecha <='$year-12-31'
        GROUP BY mes)b
        
        ");
        return $resultados->result();
    }

    //despues el periodo
    public function periodo1() {
        $resultados = $this->db->query("
        SELECT 
        YEAR(fecha) AS periodo
        FROM ventas
        GROUP BY periodo
        ORDER BY periodo DESC");
        return $resultados->result();
    }

    //primero se ejecuta el grafico
//public function grafico2($year) {
//    $resultados = $this->db->query("
//    SELECT clientes_nuevos,100-clientes_nuevos AS clientes_perdidos FROM 
//(SELECT ROUND(((COUNT(b.id_catalogo_cliente)*100)/(COUNT(a.id_catalogo_cliente)*100)*100),2) AS clientes_nuevos
//FROM catalogo_clientes a
//LEFT JOIN clientes b ON b.id_catalogo_cliente=a.id_catalogo_cliente)a");
//    return $resultados->result();
//}


    public function grafico2($year) {
        $resultados = $this->db->query("
    	SELECT
		(SELECT COUNT(id_estado_atencion) FROM catalogo_clientes WHERE id_estado_atencion='0') AS clientes_pendientes,
		(SELECT COUNT(id_estado_atencion) FROM catalogo_clientes WHERE id_estado_atencion='1') AS clientes_atendidos,
		(SELECT COUNT(id_estado_atencion) FROM catalogo_clientes WHERE id_estado_derivacion='1') AS clientes_derivados
	FROM catalogo_clientes
	LIMIT 1");
        return $resultados->result();
    }

}
