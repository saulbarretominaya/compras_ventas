<!-- La clase Content-wrapper da el formato HTML del Cuerpo -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            ANULACION DE COMPROBANTE
            <small>Registrar</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="<?php echo base_url() ?>Movimientos/Controller_ventas/insertar_anulacion" method="post" class="form-horizontal" onsubmit="return validarTableSolicitud();">
                            <!--   -->


                            <div class="form-group">
                                <!-- Izquierda-->
                                <div class="col-md-12">
                                    <div class="box box-success">
                                        <div class="box-header with-border">
                                            <h5 class="box-title">
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;">CLIENTE</font>
                                                </font>
                                            </h5>
                                        </div>
                                        <div class="box-body">
                                            <div class="form-group">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <input type="hidden" name="id_venta" id="id_venta" value="<?php echo $recuperar_datos_comprobante_cabecera->id_venta; ?>">
                                                        <input type="hidden" name="id_vendedor" id="" value="<?php echo $this->session->userdata("id_usuario") ?>">

                                                        <label for="" class="col-sm-3">NOMBRE</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="ds_nombres" required="" disabled="" value="<?php echo $recuperar_datos_comprobante_cabecera->ds_cliente; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <input type="hidden" name="id_vendedor" id="" value="<?php echo $this->session->userdata("id_usuario") ?>">
                                                        <label for="" class="col-sm-6">NUM. DOCUMENTO</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" id="ds_nombres" required="" disabled="" value="<?php echo $recuperar_datos_comprobante_cabecera->num_documento; ?>">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="" class="col-sm-3">DIRECCION</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="direccion" id="direccion" disabled="" value="<?php echo $recuperar_datos_comprobante_cabecera->direccion; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="" class="col-sm-6">T. COMPROBANTE</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" name="direccion" id="direccion" disabled="" value="<?php echo $recuperar_datos_comprobante_cabecera->ds_comprobante; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="" class="col-sm-3">SERIE</label>
                                                        <div class="col-sm-4">
                                                            <input type="text" class="form-control" name="serie" readonly="" value="<?php echo $recuperar_datos_comprobante_cabecera->serie; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="" class="col-sm-6">NUM. COMPROBANTE</label>
                                                        <div class="col-sm-4">
                                                            <input type="text" class="form-control" name="direccion" disabled="" value="<?php echo $recuperar_datos_comprobante_cabecera->num_comprobante; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label for="" class="col-sm-2">MOTIVO</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="motivo">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div><!-- Cierre de lado izquierdo-->
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="box box-warning">
                                        <table id="tbventas" class="table table-bordered table-condensed table-hover">
                                            <thead>
                                                <tr>

                                                    <th style="width: 200px" class="text-center">CODIGO</th>
                                                    <th style="width: 200px" class="text-center">PRODUCTO</th>
                                                    <th style="width: 450px" class="text-center">DESCRIPCION</th>
                                                    <th style="width: 110px" class="text-center">PRECIO UNI.</th>
                                                    <th style="width: 100px" class="text-center">CANTIDAD</th>
                                                    <th>IMPORTE</th>

                                                </tr>
                                            </thead>
                                            <div id="container_solicitud_id_remove" name="container_solicitud_id_remove" style="display: none;">
                                            </div>
                                            <!-- <h1>Hola</h1> -->

                                            <tbody>
                                                <?php foreach ($recuperar_datos_comprobante_detalle as $grilla_nota) : ?>
                                                    <tr>
                                                        <input type="hidden" value="<?php echo $grilla_nota->id_producto; ?>" name="id_producto[]">
                                                        <td class="text-center"><?php echo $grilla_nota->cod_producto; ?></td>
                                                        <td class="text-center"><?php echo $grilla_nota->ds_producto; ?></td>
                                                        <td class="text-center"><?php echo $grilla_nota->descripcion; ?></td>
                                                        <td class="text-center"><input type="hidden" name="precio[]" value="<?php echo $grilla_nota->precio; ?>"><?php echo $grilla_nota->precio; ?></td>
                                                        <td class="text-center"><input type="hidden" name="cantidad[]" value="<?php echo $grilla_nota->cantidad; ?>"><?php echo $grilla_nota->cantidad; ?></td>
                                                        <td class="text-center"><input type="hidden" name="importe[]" value="<?php echo $grilla_nota->importe; ?>"><?php echo $grilla_nota->importe; ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <span class="input-group-addon"> S/. SUB TOTAL:</span>
                                        <input type="text" class="form-control" name="sub_total" id="sub_total" readonly="" value="<?php echo $recuperar_datos_comprobante_cabecera->subtotal; ?>">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="input-group">
                                        <span class="input-group-addon"> IGV:</span>
                                        <input type="text" class="form-control" name="igv" id="igv" readonly="" value="<?php echo $recuperar_datos_comprobante_cabecera->igv; ?>">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <span class="input-group-addon"> S/. TOTAL:</span>
                                        <input type="text" class="form-control" name="monto_total" id="monto_total" readonly="" value="<?php echo $recuperar_datos_comprobante_cabecera->monto_total; ?>">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-primary">REGISTRAR</button>
                                </div>
                                <div class="col-md-2">
                                    <a href="<?php echo base_url(); ?>Movimientos/Controller_ventas" class="btn btn-danger">CANCELAR</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script type="application/javascript">
    var arrayFilesRendicion = [];
    var inputFileSelected;
    var clone;

    function getCountInTableRendicion() {
        if ($('#tbventas tr') === null)
            return 1;
        return $('#tbventas tr').length;
    }


    function validarTableSolicitud() {
        console.log("validarTableSolicitud:" + getCountInTableRendicion());
        if (getCountInTableRendicion() === '1' || Number(getCountInTableRendicion()) === 1) {
            alertify.alert("VENTAS", "REGISTRE UN PRODUCTO AL MENOS");
            return false;
        }
        return true;
    }
</script>


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