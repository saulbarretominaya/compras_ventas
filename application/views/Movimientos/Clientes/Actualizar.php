<!-- La clase Content-wrapper da el formato HTML del Cuerpo -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            CLIENTES
            <small>ACTUALIZAR</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="id_personal" value="<?php echo $enlace_actualizar_personal->id_cliente; ?>" name="id_personal">CODIGO</label>
                                <input type="text" class="form-control" id="id_personal" name="id_personal" value="<?php echo $enlace_actualizar_personal->id_cliente; ?>" readonly="">
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
                                <select class="form-control" id="id_tdocumento" name="id_tdocumento">
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
                            <div class="form-group">
                                <label for="num_documento">RAZON SOCIAL</label>
                                <input type="text" class="form-control" id="razon_social" name="razon_social" value="<?php echo $enlace_actualizar_personal->razon_social; ?>">
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
                            <div class="form-group">
                                <label for="" class="col-md-12">&nbsp</label>
                                <button type="button" class="btn btn-warning btn-flat btn_actualizar">ACTUALIZAR</button>
                                <a href="<?php echo base_url(); ?>Movimientos/Controller_clientes" class="btn btn-danger">CANCELAR</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->




<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 2.5.0
    </div>
    <strong>Copyright &copy; 2019-2020 <a href="https://adminlte.io"> </a>.</strong> SWPVFE
</footer>

<script src="<?php echo base_url(); ?>assets/template/jquery/jquery.min.js"></script>
<!-- Highcharts-->
<script src="<?php echo base_url(); ?>assets/template/highcharts/highcharts.js"></script>
<script src="<?php echo base_url(); ?>assets/template/highcharts/exporting.js"></script>
<script src="<?php echo base_url(); ?>assets/template/highcharts/export-data.js"></script>
<script src="<?php echo base_url(); ?>assets/template/jquery-print/jquery.print.js"></script>

<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/template/bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>assets/template/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- JQUERY-->
<script src="<?php echo base_url(); ?>assets/template/jquery-ui/jquery-ui.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url(); ?>assets/template/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url(); ?>assets/template/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url(); ?>assets/template/input-mask/jquery.inputmask.extensions.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>assets/template/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/template/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/template/dist/js/demo.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>assets/template/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- DataTables Export -->
<script src="<?php echo base_url(); ?>assets/template/datatables-export/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template/datatables-export/js/buttons.flash.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template/datatables-export/js/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template/datatables-export/js/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template/datatables-export/js/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>assets/template/datatables-export/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template/datatables-export/js/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template/alertify/alertify.js"></script>
<script src="<?php echo base_url(); ?>assets/template/moment/moment.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url(); ?>assets/template/select2/dist/js/select2.full.min.js"></script>

<script src="<?php echo base_url(); ?>application/js/clientes.js"></script>

<script>
    var base_url = "<?php echo base_url(); ?>";
</script>