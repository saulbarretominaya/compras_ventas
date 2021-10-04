<!-- La clase Content-wrapper da el formato HTML del Cuerpo -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            VENTAS
            <small>LISTAR</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <a href="<?php echo base_url(); ?>Movimientos/Controller_ventas/enlace_insertar" class="btn btn-primary"><span class="fa fa-plus"></span> REGISTRAR</a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered table-condensed table-hover" id="example1">
                            <thead>
                                <tr>
                                    <th class="text-center">ITEM</th>
                                    <th class="text-center">CODIGO</th>
                                    <th class="text-center">SUB TOTAL</th>
                                    <th class="text-center">IGV</th>
                                    <th class="text-center">MONTO TOTAL</th>
                                    <th class="text-center">FECHA</th>
                                    <th class="text-center">COMPROBANTE</th>
                                    <th class="text-center"></th>
                                    <th class="text-center"></th>
                                    <th class="text-center"></th>
                                    <th class="text-center"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($listar_ventas)) : ?>
                                    <?php foreach ($listar_ventas as $grilla_ventas) : ?>

                                        <?php
                                        switch ($grilla_ventas->id_tcomprobante) {
                                            case "1":
                                                $ds_tipo = '<div class="text-center"><span class="label label-success">FACTURA</span></div>';
                                                break;
                                            case "2":
                                                $ds_tipo = '<div class="text-center"><span class="label label-warning">BOLETA</span></div>';
                                                break;
                                        }
                                        ?>

                                        <tr>
                                            <td class="text-center"><?php echo $grilla_ventas->item; ?></td>
                                            <td class="text-center"><?php echo $grilla_ventas->cod_venta; ?></td>
                                            <td class="text-center"><?php echo $grilla_ventas->subtotal; ?></td>
                                            <td class="text-center"><?php echo $grilla_ventas->igv; ?></td>
                                            <td class="text-center"><?php echo $grilla_ventas->monto_total; ?></td>
                                            <td class="text-center"><?php echo $grilla_ventas->fecha; ?></td>
                                            <td class="text-center"><?php echo $ds_tipo; ?></td>
                                            <td class="text-center"><button type="button" class="btn btn-info btn-xs btn-view-ventas" value="<?php echo $grilla_ventas->id_venta; ?>" data-toggle="modal" data-target="#modal-default"><span class="fa fa-search"></span></button></td>
                                            <td class="text-center"><a href="<?php echo base_url(); ?>Movimientos/Controller_ventas/enviar_facturacion_electronica/<?php echo $grilla_ventas->id_venta; ?>" class="btn btn-success btn-xs"><span class="fa fa-cloud-upload"></span></a></td>

                                            <?php if ($grilla_ventas->id_estado_nota == '0') { ?>
                                                <td class="text-center"><a href="<?php echo base_url(); ?>Movimientos/Controller_ventas/enlace_actualizar/<?php echo $grilla_ventas->id_venta; ?>" class="btn btn-warning btn-xs"><span class="fa fa-pencil"></span></a></td>
                                            <?php } else if ($grilla_ventas->id_estado_nota == '1') { ?>
                                                <td class="text-center"><a class="btn btn-warning btn-xs alerta_nota_creada"><span class="fa fa-pencil"></span></a></td>
                                            <?php } ?>


                                            <?php if ($grilla_ventas->id_estado_anulacion == '0') { ?>
                                                <td class="text-center"><a href="<?php echo base_url(); ?>Movimientos/Controller_ventas/enlace_actualizar_anulacion/<?php echo $grilla_ventas->id_venta; ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a></td>
                                            <?php } else if ($grilla_ventas->id_estado_anulacion == '1') { ?>
                                                <td class="text-center"><a class="btn btn-primary btn-xs alerta_anulacion_creada"><span class="fa fa-trash"></span></a></td>
                                            <?php } ?>
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
<!-- /.content-wrapper -->


<div class="modal fade" id="modal-default">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #D0D0D0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center">DETALLE DE VENTA</h4>
            </div>
            <div class="modal-body">
                <p></p>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<!-- MODAL DE FACTURACION ELECTRONICA-->
<div class="modal fade" id="modal-default1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #D0D0D0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center">ENVIO DE FACTURACION ELECTRONICA</h4>
            </div>
            <!-- <div class="modal-body">
                <p></p>
            </div> -->
            <!--            <div class="modal-footer">
                            <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><span class="fa fa-reply"> CERRAR</span></button>
                            <button type="button" class="btn btn-primary btn-print" value=""><span class="fa fa-print" > DESCARGAR PDF</span></button>
                        </div>-->
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

<script src="<?php echo base_url(); ?>application/js/ventas.js"></script>
<script>
    var base_url = "<?php echo base_url(); ?>";
</script>