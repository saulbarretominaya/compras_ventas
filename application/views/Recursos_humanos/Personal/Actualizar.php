<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Empleados
                        <button type="button" class="btn btn-warning btn-sm btn_actualizar">ACTUALIZAR</button>
                        <a href="<?php echo base_url(); ?>Recursos_humanos/Controller_personal" class="btn btn-danger btn-sm">CANCELAR</a>
                    </h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <!-- <div class="card-header">
                            <h3 class="card-title">REGISTRAR</h3>
                        </div> -->
                        <form class="form-horizontal">
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="id_personal" value="<?php echo $enlace_actualizar_personal->id_personal; ?>" name="id_personal">CODIGO</label>
                                            <input type="text" class="form-control" id="id_personal" name="id_personal" value="<?php echo $enlace_actualizar_personal->id_personal; ?>" readonly="">
                                        </div>
                                        <div class="form-group">
                                            <label for="nombre">NOMBRES</label>
                                            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $enlace_actualizar_personal->nombre; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="apepaterno">APELLIDO PATERNO</label>
                                            <input type="text" class="form-control" id="apepaterno" name="apepaterno" value="<?php echo $enlace_actualizar_personal->apepaterno; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="apematerno">APELLIDO MATERNO</label>
                                            <input type="text" class="form-control" id="apematerno" name="apematerno" value="<?php echo $enlace_actualizar_personal->apematerno; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">TIPO DE DOCUMENTO</label>
                                            <select class="form-select" id="id_tdocumento" name="id_tdocumento">
                                                <?php foreach ($multitablas_tipo_documentos as $grilla_tipo_documentos) : ?>
                                                    <?php if ($grilla_tipo_documentos->id_tdocumento == $enlace_actualizar_personal->id_tdocumento) : ?>
                                                        <option value="<?php echo $grilla_tipo_documentos->id_tdocumento ?>" selected>
                                                            <!-- Captura la la fila del array de areas -->
                                                            <?php echo $grilla_tipo_documentos->abreviatura; ?>
                                                            <!-- Imprime  -->
                                                        </option>
                                                    <?php else : ?>
                                                        <option value="<?php echo $grilla_tipo_documentos->id_tdocumento ?>">
                                                            <?php echo $grilla_tipo_documentos->abreviatura; ?>
                                                            <!-- Imprime  -->
                                                        </option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="num_documento">NÚMERO DE DOCUMENTO </label>
                                            <input type="text" class="form-control" id="num_documento" name="num_documento" value="<?php echo $enlace_actualizar_personal->num_documento; ?>">
                                        </div>


                                        <!-- Campo "NOMBRE" de la tabla AREAS -->

                                        <!-- Campo "descripcion" de la tabla CARGOS -->
                                        <div class="form-group">
                                            <label for="">CARGO</label>
                                            <select class="form-select" id="id_cargo" name="id_cargo">
                                                <?php foreach ($descripcion_cargos as $grilla_cargos) : ?>
                                                    <?php if ($grilla_cargos->id_cargo == $enlace_actualizar_personal->id_cargo) : ?>
                                                        <option value="<?php echo $grilla_cargos->id_cargo ?>" selected>
                                                            <!-- Captura la la fila del array de areas -->
                                                            <?php echo $grilla_cargos->ds_cargo; ?>
                                                            <!-- Imprime  -->
                                                        </option>
                                                    <?php else : ?>
                                                        <option value="<?php echo $grilla_cargos->id_cargo ?>">
                                                            <?php echo $grilla_cargos->ds_cargo; ?>
                                                            <!-- Imprime  -->
                                                        </option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="telefono">CELULAR</label>
                                            <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $enlace_actualizar_personal->telefono; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">CORREO ELECTRONICO</label>
                                            <input type="text" class="form-control" id="email" name="email" value="<?php echo $enlace_actualizar_personal->email; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="direccion">DIRECCION</label>
                                            <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $enlace_actualizar_personal->direccion; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->





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
<script src="<?php echo base_url(); ?>application/js/personal.js"></script>
</body>

</html>