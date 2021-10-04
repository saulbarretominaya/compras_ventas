<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Usuarios</h1>
                </div>
            </div>
        </div>
    </section>


    <section class="content">
        <form action="<?php echo base_url(); ?>Administracion/Controller_usuarios/insertar" method="POST" class="form-horizontal">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">SELECCIONAR PERSONAL</h3>
                    </div>
                    <div class="card-body">
                        <label for="">PERSONAL</label>
                        <div class="input-group">
                            <input type="hidden" name="id_personal" id="id_personal">
                            <input type="text" class="form-control" disabled="disabled" id="ds_nombres">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal-default"><span class="fa fa-search"></span> Buscar</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">DATOS DEL USUARIO</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="col-md-8">
                                        <label for="">USUARIO</label>
                                        <input class="form-control" type="text" class="form-control" id="" name="usuario" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-8">
                                        <label for="">CONTRASEÑA</label>
                                        <input class="form-control" type="password" class="form-control" id="" name="contraseña" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="col-md-8">
                                        <label for="">ROL</label>
                                        <select class="form-select" id="id_cargo" name="id_rol">
                                            <?php foreach ($multitablas_roles as $grilla_roles) : ?>
                                                <option value="<?php echo $grilla_roles->id_rol; ?>">
                                                    <?php echo $grilla_roles->ds_rol; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-12">&nbsp</label>
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary">REGISTRAR</button>
                                        <a href="<?php echo base_url(); ?>Administracion/Controller_usuarios" class="btn btn-danger">CANCELAR</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>
</form>
</section>
</div>

<div class="modal fade" id="modal-default" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">INFORMACIÓN</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- <table id="listar" class="table table-bordered table-sm table-hover"> -->
                <table id="listar_usuarios" class="table table-bordered table-sm table-hover table-responsive">
                    <thead>
                        <tr>
                            <th></th>
                            <th style="width: 150px;">Codigo</th>
                            <th style="width: 750px;">Nombre Completo</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($multitablas_personal)) : ?>
                            <?php foreach ($multitablas_personal as $grilla_personal) : ?>
                                <tr>
                                    <?php $dataareas =
                                        $grilla_personal->id_personal . "*" .
                                        $grilla_personal->ds_nombres; ?>
                                    <td> <button type="button" class="btn btn-outline-success btn-sm btn_check" data-toggle="modal" data-target="#modal-default" value="<?php echo $dataareas; ?>"><span class="fas fa-check"></span></button> </td>
                                    <td><?php echo $grilla_personal->id_personal; ?></td>
                                    <td><?php echo $grilla_personal->ds_nombres; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<aside class="control-sidebar control-sidebar-dark">
</aside>

<footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.1.0
    </div>
</footer>
</div>

<!-- jQuery -->
<script src="<?php echo base_url() ?>librerias/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>librerias/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url() ?>librerias/plugins/bootstrap-5.1.0-dist/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>librerias/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>librerias/dist/js/demo.js"></script>
<!-- Page specific script -->
<script src="<?php echo base_url() ?>librerias/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url() ?>librerias/plugins/inputmask/jquery.inputmask.min.js"></script>
<script src="<?php echo base_url(); ?>librerias/plugins/alertify/alertify.js"></script>
<script type="text/javascript" charset="utf8" src="<?php echo base_url() ?>librerias/plugins/DataTables/datatables.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url() ?>librerias/plugins/select2/js/select2.full.min.js"></script>
<script>
    var base_url = "<?php echo base_url(); ?>";
</script>
<script src="<?php echo base_url(); ?>application/js/usuarios.js"></script>
</body>

</html>