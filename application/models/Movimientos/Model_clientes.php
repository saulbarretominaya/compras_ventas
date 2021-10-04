<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_clientes extends CI_Model {

    public function listar() {

        $resultados = $this->db->query("
            SELECT  (@rownum:=@rownum+1) AS item,
	a.id_cliente,cod_cliente,ds_nombres,a.telefono,a.direccion,a.num_documento,abreviatura,a.email,razon_social FROM
	(SELECT @rownum:=0,a.id_cliente,
	CONCAT('CLI-',id_cliente) AS cod_cliente,

	(CASE WHEN b.abreviatura='RUC' THEN a.razon_social ELSE
	CASE WHEN b.abreviatura='DNI' THEN CONCAT(a.nombre,' ',a.apepaterno,' ',a.apematerno) ELSE
	CASE WHEN a.id_tdocumento IS NULL THEN CONCAT(a.nombre,' ',a.apepaterno,' ',a.apematerno) END END END ) ds_nombres,
	
	
        a.telefono,a.direccion,a.num_documento,b.abreviatura,a.email,razon_social
        FROM clientes a
        LEFT JOIN tipo_documentos b ON b.id_tdocumento=a.id_tdocumento
        WHERE a.id_estado=1
        ) a
       ");
        return $resultados->result();
    }

    public function insertar($data) {
        return $this->db->insert("clientes", $data);
    }

    public function enlace_actualizar($id_personal) {
        $this->db->where("id_cliente", $id_personal);
        $resultado = $this->db->get("clientes");
        return $resultado->row();
    }

    public function actualizar($id_personal, $data) {
        $this->db->where("id_cliente", $id_personal);
        return $this->db->update("clientes", $data);
    }

    public function actualizar_estado($id_cliente) {
        return $this->db->query(" UPDATE clientes SET  id_estado='0'
                                    WHERE id_cliente='$id_cliente'");
    }
    
     public function verificar_cargo($num_documento) {
        $resultados = $this->db->query("SELECT * from clientes WHERE num_documento='$num_documento'");
        return $resultados->row();
    }
    
    public function verificar_dni_actualizar($id_personal,$num_documento) {
        $resultados = $this->db->query("SELECT * FROM clientes WHERE id_cliente='$id_personal' AND num_documento='$num_documento'");
        return $resultados->row();
    }

}
