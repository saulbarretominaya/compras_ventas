<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Usuarios
                        <a href="<?php echo base_url(); ?>Administracion/Controller_usuarios/enlace_insertar" class="btn btn-primary btn-sm">REGISTRAR</a>
                    </h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-md-12">
                        <table id="listar" class="table table-bordered table-sm table-hover " style="width: 100%;">
                            <thead>
                                <tr>
                                    <th class="text-center">USUARIO</th>
                                    <th class="text-center">NOMBRES COMPLETOS</th>
                                    <th class="text-center">ROL</th>
                                    <th class="text-center">ESTADO</th>
                                    <th class="text-center"></th>
                                    <th class="text-center"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($listar_usuarios)) : ?>
                                    <?php foreach ($listar_usuarios as $grilla_usuarios) : ?>
                                        <?php
                                        switch ($grilla_usuarios->id_estado) {
                                            case "0":
                                                $ds_estado = '<div class="text-center"><span class="label label-danger">DESACTIVADO</span></div>';
                                                break;
                                            case "1":
                                                $ds_estado = '<div class="text-center"><span class="label label-success">ACTIVO</span></div>';
                                                break;
                                        }
                                        ?>
                                        <tr>
                                            <td class="text-center"><?php echo $grilla_usuarios->usuario; ?></td>
                                            <td class="text-center"><?php echo $grilla_usuarios->ds_nombres; ?></td>
                                            <td class="text-center"><?php echo $grilla_usuarios->ds_rol; ?></td>
                                            <td><?php echo $ds_estado; ?></td>
                                            <?php $datamodal_usuarios = $grilla_usuarios->usuario . "*" . $grilla_usuarios->ds_nombres . "*" . $grilla_usuarios->ds_rol . "*" . $grilla_usuarios->ds_estado . "*" ?>
                                            <td class="text-center"><button type="button" class="btn btn-outline-info btn-sm btn-view-usuarios" data-toggle="modal" data-target="#modal-default" value="<?php echo $datamodal_usuarios; ?>"><span class="fas fa-search-plus"></span></button></td>
                                            <td class="text-center"><a href="<?php echo base_url(); ?>Administracion/Controller_usuarios/enlace_actualizar/<?php echo $grilla_usuarios->id_usuario; ?>" class="btn btn btn-outline-warning btn-sm"><span class="far fa-edit"></a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="modal-default" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">INFORMACIÓN</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>One fine body&hellip;</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-lef btn-sm" data-dismiss="modal">CERRAR</button>
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