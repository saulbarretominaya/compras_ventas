<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_personal extends CI_Model
{

    public function listar()
    {

        $resultados = $this->db->query("
            SELECT  (@rownum:=@rownum+1) AS item,
            a.id_personal,cod_personal,ds_nombres,a.telefono,a.direccion,a.num_documento,abreviatura,ds_cargo FROM
            (SELECT @rownum:=0,a.id_personal,
            CONCAT('PER-',id_personal) AS cod_personal,
            CONCAT(a.nombre,' ',a.apepaterno,' ',a.apematerno) AS ds_nombres,
            a.telefono,a.direccion,a.num_documento,b.abreviatura,c.descripcion AS ds_cargo
            FROM personal a
            LEFT JOIN tipo_documentos b ON b.id_tdocumento=a.id_tdocumento
            LEFT JOIN cargos c ON c.id_cargo=a.id_cargo
            where a.id_estado=1
            ) a
       ");
        return $resultados->result();
    }

    public function insertar($data)
    {
        return $this->db->insert("personal", $data);
    }

    public function enlace_actualizar($id_personal)
    {
        $this->db->where("id_personal", $id_personal);
        $resultado = $this->db->get("personal");
        return $resultado->row();
    }

    public function actualizar($id_personal, $data)
    {
        $this->db->where("id_personal", $id_personal);
        return $this->db->update("personal", $data);
    }

    public function actualizar_estado($id_personal)
    {
        return $this->db->query(" UPDATE personal SET  id_estado='0'
                                    WHERE id_personal='$id_personal'");
    }

    public function verificar_cargo($num_documento)
    {
        $resultados = $this->db->query("SELECT * from personal WHERE num_documento='$num_documento'");
        return $resultados->row();
    }

    public function verificar_dni_actualizar($id_personal, $num_documento)
    {
        $resultados = $this->db->query("SELECT * FROM personal WHERE id_personal='$id_personal' AND num_documento='$num_documento'");
        return $resultados->row();
    }
}
