<!-- La clase Content-wrapper da el formato HTML del Cuerpo -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            CLIENTES
            <small>LISTAR</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-2">
                        <a href="<?php echo base_url(); ?>Movimientos/Controller_clientes/enlace_insertar" class="btn btn-primary"><span class="fa fa-plus"></span> REGISTRAR</a>
                    </div>
                    <div class="col-md-3">
                        <a href="<?php echo base_url(); ?>Movimientos/Controller_ventas/enlace_insertar" class="btn btn-warning"><span class="fa fa-shopping-cart"></span> IR A REGISTRAR UNA VENTA</a>
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
                                    <th class="text-center">DENOMINACION</th>
                                    <th class="text-center">TIPO DOCUMENTO</th>
                                    <th class="text-center">NUMERO DOCUMENTO</th>
                                    <th class="text-center">TELEFONO</th>
                                    <th class="text-center">CORREO</th>
                                    <th class="text-center"></th>
                                    <th class="text-center"></th>
                                    <th class="text-center"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($listar_clientes as $grilla_clientes) : ?>
                                    <tr>
                                        <td class="text-center"><?php echo $grilla_clientes->id_cliente; ?></td>
                                        <td class="text-center"><?php echo $grilla_clientes->cod_cliente; ?></td>
                                        <td class="text-center"><?php echo $grilla_clientes->ds_nombres; ?></td>
                                        <td class="text-center"><?php echo $grilla_clientes->abreviatura; ?></td>
                                        <td class="text-center"><?php echo $grilla_clientes->num_documento; ?></td>
                                        <td class="text-center"><?php echo $grilla_clientes->telefono; ?></td>
                                        <td class="text-center"><?php echo $grilla_clientes->email; ?></td>
                                        <?php $datamodal_clientes = $grilla_clientes->cod_cliente . "*" . $grilla_clientes->ds_nombres . "*" . $grilla_clientes->abreviatura . "*" . $grilla_clientes->num_documento . "*" . $grilla_clientes->telefono . "*" . $grilla_clientes->email . "*" ?>
                                        <td class="text-center"><button type="button" class="btn btn-info btn-view-clientes btn-xs" data-toggle="modal" data-target="#modal-default" value="<?php echo $datamodal_clientes; ?>"><span class="fa fa-search"></span></button></td>
                                        <td class="text-center"><a href="<?php echo base_url(); ?>Movimientos/Controller_clientes/enlace_actualizar/<?php echo $grilla_clientes->id_cliente; ?>" class="btn btn-warning btn-xs"><span class="fa fa-pencil"></a></td>
                                        <?php if ($this->session->userdata('ds_rol') == 'ADMINISTRADOR') { ?>
                                            <td class="text-center" style="width: 15px;"><a href="<?php echo base_url(); ?>Movimientos/Controller_clientes/eliminar/<?php echo $grilla_clientes->id_cliente; ?>" class="btn btn-danger btn-remove btn-xs"><span class="fa fa-trash"></a></td>
                                        <?php } ?>
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
                <h4 class="modal-title">CLIENTES</h4>
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

<script src="<?php echo base_url(); ?>application/js/clientes.js"></script>