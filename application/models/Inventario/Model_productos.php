<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_productos extends CI_Model {

    public function listar() {

        $resultados = $this->db->query("
            SELECT (@rownum:=@rownum+1) AS item,
		id_producto,cod_producto,nombre,ds_categoria,marca,descripcion,fecha,precio_venta,stock,ds_estado FROM 
		(SELECT @rownum:=0,id_producto,CONCAT('PRO-',id_producto) AS cod_producto,a.nombre,b.nombre AS ds_categoria,marca,a.descripcion,fecha,precio_venta,stock,
                (CASE WHEN stock>0 THEN 'DISPONIBLE' ELSE 'AGOTADO' END) AS ds_estado 
                FROM productos a 
                LEFT JOIN categorias b ON b.id_categoria=a.id_categoria
                where a.id_estado='1') a
                
        ");
        return $resultados->result();
    }

    public function insertar($data) {
        return $this->db->insert("productos", $data);
    }

    public function enlace_actualizar($id_producto) {
        $resultados = $this->db->query("SELECT (@rownum:=@rownum+1) AS item,
		id_producto,cod_producto,nombre,marca,descripcion,fecha,precio_venta,precio_costo,precio_rebaja,stock,id_estado,ds_estado,id_categoria FROM 
		(SELECT @rownum:=0,id_producto,CONCAT('PRO-',id_producto) AS cod_producto,nombre,marca,descripcion,fecha,precio_venta,precio_costo,precio_rebaja,stock,id_estado,id_categoria,
                (CASE WHEN id_estado='2' THEN 'DISPONIBLE' ELSE CASE WHEN id_estado='3' THEN 'AGOTADO'  END END ) AS ds_estado FROM productos
                ) a
                WHERE id_producto='$id_producto'");
        return $resultados->row();
    }

    public function actualizar($id_producto, $nombre, $marca, $descripcion, $precio_venta, $precio_rebaja, $precio_costo, $stock,$id_categoria) {
        return $this->db->query(" UPDATE productos SET  nombre='$nombre', marca='$marca', descripcion='$descripcion', precio_venta='$precio_venta', precio_rebaja='$precio_rebaja', precio_costo='$precio_costo', stock='$stock',id_categoria='$id_categoria'
                                    WHERE id_producto='$id_producto'");
    }

    
    public function actualizar_estado($id_producto){
        return $this->db->query(" UPDATE productos SET  id_estado='0'
                                    WHERE id_producto='$id_producto'");
        
    }
}