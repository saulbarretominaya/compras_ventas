
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_categoria extends CI_Model {

    public function listar() {
        $resultados = $this->db->query("SELECT (@rownum:=@rownum+1) AS item,
	id_categoria,cod_categoria,nombre,descripcion FROM 
        (SELECT @rownum:=0,id_categoria,CONCAT('CAT-',id_categoria) AS cod_categoria,nombre,descripcion 
        FROM categorias
        where id_estado=1
) a");
        return $resultados->result();
    }

    public function insertar($data) {
        return $this->db->insert("categorias", $data);
    }

    public function enlace_actualizar($id_categoria) {
        $resultados = $this->db->query("SELECT id_categoria,
                                        nombre,
                                        descripcion,
                                        CONCAT('CAT-',id_categoria) AS cod_categoria FROM categorias
                                        WHERE  id_categoria='$id_categoria'");
        return $resultados->row();
    }

    public function actualizar($id_categoria, $nombre, $descripcion) {
        return $this->db->query("UPDATE categorias SET nombre='$nombre',descripcion='$descripcion'
                          WHERE  id_categoria='$id_categoria'");
    }

    public function actualizar_estado($id_categoria) {
        return $this->db->query(" UPDATE categorias SET  id_estado='0'
                                    WHERE id_categoria='$id_categoria'");
    }

}
