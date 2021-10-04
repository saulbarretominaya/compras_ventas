
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_login extends CI_Controller {

    public function __construct() { //Crea el metodo constructor para al modelo al modelo_login.
        parent::__construct();
        $this->load->model("Login/Model_login");
    }

    public function index() {
        if ($this->session->userdata("ingresar_session")) {
            redirect(base_url() . "Menu_principal/Controller_modulos"); //CUANDO YA INICIO SESION, CARGA DIRECTO LOS MODULOS
        } else {
            $this->load->view("Login/Inicio_sesion"); // OJO: ARRANCA EL LOGIN PRIMERO.
        }
    }

    #Login del Usuario

    public function ingresar() {
        $usuario = $this->input->post("usuario");
        $contraseña = $this->input->post("contraseña");
        $res = $this->Model_login->ingresar($usuario, $contraseña);
        //echo "'<script>console.log(\"$res\")</script>'";

        if (!$res) {
            $this->session->set_flashdata("error_session", "El usuario y/o contraseña son incorrectos");
            redirect(base_url().'Controller_login');
        } else if ($res->id_estado == '0') {
            $this->session->set_flashdata("error_estado", "El usuario esta desactivado");
            redirect(base_url().'Controller_login');
        } else {
            $data = array(
                'ds_sesion' => $res->ds_sesion,
                'id_usuario' => $res->id_usuario,
//                'codrol' => $res->codrol,
                'ds_rol' => $res->ds_rol, //EL PARAMETRO DS_ROL ES EL QUE PERMITE LOS PRIVILEGIOS PARA LOS MODULOS.
//                'monto_actual' => $res->monto_actual,
                'ingresar_session' => TRUE
            );
            $this->session->set_userdata($data); // 9. Luego pasamos el metodo set_userdata() para establecer la variable de sesion.  
            redirect(base_url() . "Menu_principal/Controller_modulos"); // 10. Luego lo redireccion al Controller_modulos
        }
    }

    #Metodo para cerra la sesion del usuario, que se encuentra en la vista Layout header, linea 51.

    public function cerrar_login() {
        $this->session->sess_destroy();
        redirect(base_url());
    }

}
