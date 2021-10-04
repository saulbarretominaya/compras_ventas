<!-- La clase Content-wrapper da el formato HTML del Cuerpo -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            NIVEL DE PRODUCTIVIDAD
            <small>LISTAR</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <form action="<?php echo current_url(); ?>" method="post" class="form-horizontal">
                        <div class="form-group">
                            <label for="" class="col-md-1 control-label">DESDE:</label>
                            <div class="col-md-2">
                                <input type="date" class="form-control" id="" name="fecha_desde" value="<?php echo !empty($fecha_desde) ? $fecha_desde : ''; ?>">
                            </div>

                            <label for="" class="col-md-1 control-label">HASTA:</label>
                            <div class="col-md-2">
                                <input type="date" class="form-control" id="" name="fecha_hasta" value="<?php echo !empty($fecha_hasta) ? $fecha_hasta : ''; ?>">
                            </div>

                            <div class="col-md-6">
                                <input type="submit" name="btn_buscar" value="BUSCAR" class="btn btn-primary">
                                <a href="<?php echo base_url(); ?>reportes/indicadores/Controller_nivel_productividad" class="btn btn-danger">RESTABLECER</a>
                            </div>
                        </div>
                    </form>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table id="indicador_nivel_productividad" class="table table-bordered table-condensed table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">ITEM</th>
                                    <th class="text-center">FECHA</th>
                                    <th class="text-center">TOTAL DE VENTAS REALIZADAS</th>
                                    <th class="text-center">VENDEDOR POR HORAS TRABAJADAS</th>
                                    <th class="text-center">PV</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($listar_nivel_productividad as $grilla_nivel_productividad) : ?>
                                    <tr>
                                        <td class="text-center"><?php echo $grilla_nivel_productividad->item; ?></td>
                                        <td class="text-center"><?php echo $grilla_nivel_productividad->fecha; ?></td>
                                        <td class="text-center"><?php echo $grilla_nivel_productividad->monto_total; ?></td>
                                        <td class="text-center"><?php echo $grilla_nivel_productividad->horas_trabajadas; ?></td>
                                        <td class="text-center"><?php echo $grilla_nivel_productividad->nivel_productividad; ?></td>
                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
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

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">CATEGORIAS</h4>
            </div>
            <div class="modal-body">
                <p>One fine body&hellip;</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->



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

<script src="<?php echo base_url(); ?>application/js/reportes.js"></script>