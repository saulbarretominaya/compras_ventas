
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_usuarios extends CI_Model {

    public function listar() {
        $resultados = $this->db->query("SELECT a.id_usuario,a.usuario,a.id_estado,
	(CASE WHEN a.id_estado='0' THEN 'DESACTIVADO' ELSE CASE WHEN a.id_estado='1' THEN 'ACTIVO'  END END ) AS ds_estado,
       CONCAT (b.apepaterno,' ',b.apematerno,' ',b.nombre) AS ds_nombres,c.nombre AS ds_rol
       FROM usuarios a
       JOIN personal b ON b.id_personal = a.id_personal
       JOIN roles c ON c.id_rol = a.id_rol");

        return $resultados->result();
    }

    public function insertar($data) {
        return $this->db->insert("usuarios", $data);
    }

    public function enlace_actualizar($id_usuario) {

        $resultados = $this->db->query("SELECT a.id_usuario,a.usuario,a.contraseña,a.id_estado,
        CONCAT(b.apepaterno,' ',b.apematerno,' ',b.nombre) AS ds_nombres,c.nombre AS ds_rol,
        b.id_personal,
        c.id_rol
        FROM usuarios a
        JOIN personal b ON b.id_personal = a.id_personal
        JOIN roles c ON c.id_rol = a.id_rol
        WHERE a.id_usuario='$id_usuario'");
        return $resultados->row();
    }

    public function actualizar($id_usuario, $data) {
        $this->db->where("id_usuario", $id_usuario);
        return $this->db->update("usuarios", $data);
    }

}
