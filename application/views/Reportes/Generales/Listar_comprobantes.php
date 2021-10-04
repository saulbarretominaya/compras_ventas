<!-- La clase Content-wrapper da el formato HTML del Cuerpo -->
<div class="content-wrapper">
    <section class="content">
        <h4>REPORTE DE FACTURAS Y BOLETAS EMITIDAS</h4>
        <div class="box box-solid">
            <div class="box-body">

                <div class="col-md-12">
                    <table class="table table-bordered table-condensed table-hover" id="example1">
                        <thead>
                            <tr>
                                <th class="text-center">CLIENTE</th>
                                <th class="text-center">NUM. DOCUMENTO</th>
                                <th class="text-center">CREACION</th>
                                <th class="text-center">NUM. COMPROBANTE</th>
                                <th class="text-center">TOTAL</th>
                                <th class="text-center"></th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($listar_comprobantes_facturas_boletas)) : ?>
                                <?php foreach ($listar_comprobantes_facturas_boletas as $grilla_facturas_boletas) : ?>
                                    <tr>
                                        <td class="text-center"><?php echo $grilla_facturas_boletas->razon_social; ?></td>
                                        <td class="text-center"><?php echo $grilla_facturas_boletas->num_documento; ?></td>
                                        <td class="text-center"><?php echo $grilla_facturas_boletas->fecha; ?></td>
                                        <td class="text-center"><?php echo $grilla_facturas_boletas->num_comprobante; ?></td>
                                        <td class="text-center"><?php echo $grilla_facturas_boletas->monto_total; ?></td>
                                        <td class="text-center"><a href="<?php echo base_url(); ?>Reportes/Generales/Controller_generales/consultar_facturas_boletas_electronicos?a=<?php echo $grilla_facturas_boletas->id; ?>"><span class="fa fa-cloud-download"></span></a></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.box-body -->
        </div>

        <h4>REPORTE DE NOTA CREDITO Y DEBITO EMITIDAS</h4>

        <div class="box box-solid">
            <div class="box-body">
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered table-condensed table-hover" id="example1">
                            <thead>
                                <tr>
                                    <th class="text-center">CLIENTE</th>
                                    <th class="text-center">NUM. DOCUMENTO</th>
                                    <th class="text-center">CREACION</th>
                                    <th class="text-center">NUM. COMPROBANTE</th>
                                    <th class="text-center">TOTAL</th>
                                    <th class="text-center"></th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($listar_comprobantes_notas)) : ?>
                                    <?php foreach ($listar_comprobantes_notas as $grilla_notas) : ?>
                                        <tr>
                                            <td class="text-center"><?php echo $grilla_notas->razon_social; ?></td>
                                            <td class="text-center"><?php echo $grilla_notas->num_documento; ?></td>
                                            <td class="text-center"><?php echo $grilla_notas->fecha; ?></td>
                                            <td class="text-center"><?php echo $grilla_notas->num_comprobante; ?></td>
                                            <td class="text-center"><?php echo $grilla_notas->monto_total; ?></td>
                                            <td class="text-center"><a href="<?php echo base_url(); ?>Reportes/Generales/Controller_generales/consultar_notas_electronicos?a=<?php echo $grilla_notas->id; ?>"><span class="fa fa-cloud-download"></span></a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
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