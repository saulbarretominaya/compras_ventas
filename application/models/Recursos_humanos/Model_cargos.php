
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_cargos extends CI_Model {

    public function listar() {
        $resultados = $this->db->query("
            SELECT id_cargo,descripcion as ds_cargo 
            from cargos
            where id_estado=1;
       ");
        return $resultados->result();
    }

    public function insertar($data) {
        return $this->db->insert("cargos", $data);
    }

    public function enlace_actualizar($id_cargo) {
        $this->db->where("id_cargo", $id_cargo);
        $resultados = $this->db->get("cargos");
        return $resultados->row();
    }
    
    public function actualizar($id_cargo, $descripcion) {
        return $this->db->query("UPDATE cargos SET descripcion='$descripcion'
                          WHERE  id_cargo='$id_cargo'");
    }

    public function actualizar_estado($id_cargo) {
        return $this->db->query(" UPDATE cargos SET  id_estado='0'
                                    WHERE id_cargo='$id_cargo'");
    }

    public function verificar_cargo($descripcion) {
        $resultados = $this->db->query("SELECT * from cargos WHERE descripcion='$descripcion'");
        return $resultados->row();
    }

}
