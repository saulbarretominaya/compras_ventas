
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_login extends CI_Model {

    public function ingresar($usuario, $contraseña) {
        $resultados = $this->db->query("SELECT 	a.*,
                                        b.nombre AS ds_rol,
                                        a.id_estado,
                                        CONCAT(c.apepaterno,' ',c.apematerno,' ',c.nombre)AS ds_sesion
                                        FROM usuarios a
                                        JOIN roles b ON b.id_rol=a.id_rol
                                        JOIN personal c ON c.id_personal=a.id_personal
                                        WHERE a.usuario='$usuario' AND a.contraseña ='$contraseña'");
        return $resultados->row();
    }
    
    public function rowCount($tabla){
		if ($tabla != "ventas") {
			$this->db->where("id_estado","1");
		}
		$resultados = $this->db->get($tabla);
		return $resultados->num_rows();
	}

    

}
