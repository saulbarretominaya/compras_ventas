<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>librerias/login/fontawesome-all.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>librerias/login/login.css">

</head>
<div class="container-login-c">
    <div class="container-login">
        <div class="login-logo">
            <img src="" class="img-responsive">
        </div>
        <div class="login-title">
            <b style="color: white;">INICIO DE SESIÓN</b>
        </div>
        <div class="login-form">
            <div class="login-user-photo">
                <img src="<?php echo base_url(); ?>librerias/login/img/profile-login.png" class="img-responsive">
            </div>
            <form action="<?php echo base_url(); ?>Controller_login/ingresar" method="post">
                <input id="txtUsuario" class="frm-control frm-control-lg" type="text" placeholder="USUARIO:" name="usuario">
                <hr>
                <input id="txtClave" class="frm-control frm-control-lg" type="password" placeholder="CONTRASEÑA:" name="contraseña">
                <hr>
                <button type="submit" class="btn btn-2 btn-lg btn-eff-1 btn-block">INGRESAR</button>
            </form>
            <div class="login-title">
                <?php if ($this->session->flashdata("error_session")) : ?>
                    <div style="background-color: red; color: white">
                        <?php echo $this->session->flashdata("error_session") ?></div>
                <?php elseif ($this->session->flashdata("error_estado")) : ?>
                    <div style="background-color: orange; color: white">
                        <?php echo $this->session->flashdata("error_estado") ?></div>

                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url(); ?>librerias/login/General.js"></script>
<script src="<?php echo base_url(); ?>librerias/login/login.js"></script>
<script src="<?php echo base_url(); ?>librerias/login/plugin/jquery-3.3.1.min.js"></script>

</html>