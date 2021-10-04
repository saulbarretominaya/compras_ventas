<!-- La clase Content-wrapper da el formato HTML del Cuerpo -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            CALCULAR CRECIMIENTO DE VENTAS
            <small>LISTAR</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <hr>


                <div class="col-md-12">
                    <form action="<?php echo current_url(); ?>" method="post" class="form-horizontal">
                        <div class="form-group">
                            <label for="" class="col-md-2 control-label">DESDE:</label>
                            <div class="col-md-4">
                                <input type="date" class="form-control" id="" name="fecha_desde" value="<?php echo !empty($fecha_desde) ? $fecha_desde : ''; ?>">
                            </div>

                            <label for="" class="col-md-2 control-label">HASTA:</label>
                            <div class="col-md-4">
                                <input type="date" class="form-control" id="" name="fecha_hasta" value="<?php echo !empty($fecha_hasta) ? $fecha_hasta : ''; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-2 control-label">DESDE:</label>
                            <div class="col-md-4">
                                <input type="date" class="form-control" id="" name="fecha_desde2" value="<?php echo !empty($fecha_desde2) ? $fecha_desde2 : ''; ?>">
                            </div>

                            <label for="" class="col-md-2 control-label">HASTA:</label>
                            <div class="col-md-4">
                                <input type="date" class="form-control" id="" name="fecha_hasta2" value="<?php echo !empty($fecha_hasta2) ? $fecha_hasta2 : ''; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <center>
                                <div class="col-md-12">
                                    <input type="submit" name="btn_buscar" value="BUSCAR" class="btn btn-primary">
                                    <a href="<?php echo base_url(); ?>Reportes/Indicadores/Controller_crecimiento_venta" class="btn btn-danger">RESTABLECER</a>
                                </div>
                            </center>
                        </div>
                    </form>
                </div>

                <form action="<?php echo base_url() ?>Reportes/Indicadores/Controller_crecimiento_venta/insertar_temporal" method="post" class="form-horizontal">

                    <div class="col-md-6">

                        <table id="table1" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">FECHA</th>
                                    <th class="text-center">MONTO TOTAL</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($listar_crecimiento_venta as $grilla_crecimiento_venta) : ?>
                                    <tr>
                                        <td class="text-center"> <input name="fecha[]" type="hidden" value="<?php echo $grilla_crecimiento_venta->fecha; ?>"><?php echo $grilla_crecimiento_venta->fecha; ?></td>
                                        <td class="text-center"> <input name="monto_total[]" type="hidden" value="<?php echo $grilla_crecimiento_venta->monto_total_venta; ?>"><?php echo $grilla_crecimiento_venta->monto_total_venta; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>


                    <div class="col-md-6">
                        <table id="tbventas" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">FECHA</th>
                                    <th class="text-center">MONTO TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($listar_crecimiento_venta2 as $grilla_crecimiento_venta2) : ?>
                                    <tr>
                                        <td class="text-center"> <input name="fecha2[]" type="hidden" value="<?php echo $grilla_crecimiento_venta2->fecha; ?>"><?php echo $grilla_crecimiento_venta2->fecha; ?></td>
                                        <td class="text-center"> <input name="monto_total2[]" type="hidden" value="<?php echo $grilla_crecimiento_venta2->monto_total_venta; ?>"><?php echo $grilla_crecimiento_venta2->monto_total_venta; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <center>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-success">CALCULAR</button>
                        </div>
                    </center>
                </form>

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