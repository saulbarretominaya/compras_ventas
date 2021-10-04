<!-- La clase Content-wrapper da el formato HTML del Cuerpo -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            NOTA DE CREDITO / DEBITO
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
                        <form action="<?php echo base_url() ?>Movimientos/Controller_ventas/insertar_nota_credito_debito" method="post" class="form-horizontal" onsubmit="return validarTableSolicitud();">
                            <!--   -->
                            <div class="form-group">
                                <!-- Izquierda-->
                                <div class="col-md-9">
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
                                                <div class="col-md-3">

                                                    <?php if ($recuperar_datos_comprobante_cabecera->ds_comprobante == 'Factura') { ?>

                                                        <div class="radio">
                                                            <?php foreach ($multitablas_comprobantes_nota_credito_facturas as $nota_credito_facturas) : ?>
                                                                <?php $split_nota_credito_facturas = $nota_credito_facturas->id_tcomprobante . "*" . $nota_credito_facturas->codigo . "*" . $nota_credito_facturas->nombre . "*" . $nota_credito_facturas->serie . "*" . $nota_credito_facturas->num_comprobante; ?>
                                                            <?php endforeach; ?>
                                                            <label class="col-xs-6">
                                                                <input type="radio" name="id_tcomprobante" id="nota_credito_facturas" value="<?php echo $split_nota_credito_facturas ?>" required="">Credito
                                                            </label>
                                                            <?php foreach ($multitablas_comprobantes_nota_debito_facturas as $nota_debito_facturas) : ?>
                                                                <?php $split_nota_debito_facturas = $nota_debito_facturas->id_tcomprobante . "*" . $nota_debito_facturas->codigo . "*" . $nota_debito_facturas->nombre . "*" . $nota_debito_facturas->serie . "*" . $nota_debito_facturas->num_comprobante; ?>
                                                            <?php endforeach; ?>
                                                            <label class="col-xs-6">
                                                                <input type="radio" name="id_tcomprobante" id="nota_debito_facturas" value="<?php echo $split_nota_debito_facturas ?>">Debito
                                                            </label>
                                                        </div>

                                                    <?php } else if ($recuperar_datos_comprobante_cabecera->ds_comprobante == 'Boleta') { ?>

                                                        <div class="radio">
                                                            <?php foreach ($multitablas_comprobantes_nota_credito_boletas as $nota_credito_boletas) : ?>
                                                                <?php $split_nota_credito_boletas = $nota_credito_boletas->id_tcomprobante . "*" . $nota_credito_boletas->codigo . "*" . $nota_credito_boletas->nombre . "*" . $nota_credito_boletas->serie . "*" . $nota_credito_boletas->num_comprobante; ?>
                                                            <?php endforeach; ?>
                                                            <label class="col-xs-6">
                                                                <input type="radio" name="id_tcomprobante" id="nota_credito_boletas" value="<?php echo $split_nota_credito_boletas ?>" required="">Credito
                                                            </label>
                                                            <?php foreach ($multitablas_comprobantes_nota_debito_boletas as $nota_debito_boletas) : ?>
                                                                <?php $split_nota_debito_boletas = $nota_debito_boletas->id_tcomprobante . "*" . $nota_debito_boletas->codigo . "*" . $nota_debito_boletas->nombre . "*" . $nota_debito_boletas->serie . "*" . $nota_debito_boletas->num_comprobante; ?>
                                                            <?php endforeach; ?>
                                                            <label class="col-xs-6">
                                                                <input type="radio" name="id_tcomprobante" id="nota_debito_boletas" value="<?php echo $split_nota_debito_boletas ?>">Debito
                                                            </label>
                                                        </div>

                                                    <?php } ?>

                                                </div>
                                                <div class="col-md-5">
                                                    <input type="hidden" name="id_venta" id="id_venta" value="<?php echo $recuperar_datos_comprobante_cabecera->id_venta; ?>">
                                                    <input type="hidden" name="id_vendedor" id="" value="<?php echo $this->session->userdata("id_usuario") ?>">
                                                    <input type="text" class="form-control" id="ds_nombres" required="" disabled="" value="<?php echo $recuperar_datos_comprobante_cabecera->ds_cliente; ?>">

                                                </div>
                                                <div class="col-md-4">
                                                    <input type="hidden" name="id_vendedor" id="" value="<?php echo $this->session->userdata("id_usuario") ?>">
                                                    <input type="text" class="form-control" id="ds_nombres" required="" disabled="" value="<?php echo $recuperar_datos_comprobante_cabecera->num_documento; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="col-sm-3">DIRECCION</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="direccion" id="direccion" disabled="" value="<?php echo $recuperar_datos_comprobante_cabecera->direccion; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="" class="col-sm-3">T. DE COMPROBANTE</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="direccion" id="direccion" disabled="" value="<?php echo $recuperar_datos_comprobante_cabecera->ds_comprobante; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="col-sm-3">SERIE</label>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" name="serie" readonly="" value="<?php echo $recuperar_datos_comprobante_cabecera->serie; ?>">
                                                </div>
                                                <label for="" class="col-sm-4">NUMERO COMPROBANTE</label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" name="direccion" disabled="" value="<?php echo $recuperar_datos_comprobante_cabecera->num_comprobante; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="col-sm-3">OBSERVACION</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="observacion">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- Cierre de lado izquierdo-->
                                <!--Columna Derecha -->
                                <div class="col-md-3">
                                    <!-- Horizontal Form -->
                                    <div class="box box-info">
                                        <div class="box-header with-border" style="background-color: #007fff">
                                            <center>
                                                <h3 class="box-title">
                                                    <font style="color: white">RUC Nº 207897898945</font>
                                                </h3>
                                            </center>
                                        </div>
                                        <div class="box-body">
                                            <center><label id="cambio_comprobante">
                                                    <font style="color: red">NOTA DE CREDITO</font>
                                                </label></center>
                                            <div class="form-group">
                                                <div class="col-md-5">
                                                    <label for="">SERIE</label>
                                                    <input type="text" class="form-control " id="serie" readonly="" value="">

                                                </div>
                                                <div class="col-md-7">
                                                    <label for="">NºCOMPROBANTE</label>
                                                    <input type="text" class="form-control " id="num_comprobante" readonly="" value="" name="num_comprobante">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label for="">TIPO NOTA DE CREDITO</label>
                                                    <select class="form-control" id="id_tnota_credito" name="id_tnota_credito">
                                                        <option value="">SELECCIONAR</option>
                                                        <?php foreach ($multitablas_tipo_nota_credito as $grilla_tipo_nota_credito) : ?>
                                                            <option value="<?php echo $grilla_tipo_nota_credito->id_tnota_credito; ?>">
                                                                <?php echo $grilla_tipo_nota_credito->ds_nota_credito; ?>
                                                                <!-- Tiene que imprimir! -->
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label for="">TIPO NOTA DE DEBITO</label>
                                                    <select class="form-control" id="id_tnota_debito" name="id_tnota_debito">
                                                        <option value="">SELECCIONAR</option>
                                                        <?php foreach ($multitablas_tipo_nota_debito as $grilla_tipo_nota_debito) : ?>
                                                            <option value="<?php echo $grilla_tipo_nota_debito->id_tnota_debito; ?>">
                                                                <?php echo $grilla_tipo_nota_debito->ds_nota_debito; ?>
                                                                <!-- Tiene que imprimir! -->
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>




                            <div class="form-group">
                                <div class="col-md-12">
                                    <!-- Horizontal Form -->
                                    <div class="box box-info">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;">PRODUCTO</font>
                                                </font>
                                            </h3>
                                        </div>
                                        <div class="box-body">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <select id="listar_productos" style="color: #007fff; background-color: #cccccc; " class="form-control">
                                                            <option value="">SELECCIONE</option>
                                                            <?php foreach ($multitablas_productos as $grilla_personal) : ?>
                                                                <?php $split = $grilla_personal->id_producto . "*" . $grilla_personal->cod_producto . "*" . $grilla_personal->ds_producto . "*" . $grilla_personal->descripcion . "*" . $grilla_personal->precio_venta . "*" . $grilla_personal->stock; ?>
                                                                <option value="<?php echo $grilla_personal->ds_producto ?>" id="<?php echo $split ?>"><?php echo $grilla_personal->ds_producto; ?></option>
                                                            <?php endforeach; ?>

                                                            <!--                                                            <option value="">CARRO</option>
                                                                                                                        <option value="PELOTA">PELOTA</option>-->
                                                        </select>
                                                    </div>
                                                    <label for="" class="col-sm-1">PRECIO</label>
                                                    <div class="col-sm-2">
                                                        <input type="text" class="form-control input-sm" value="" readonly="" id="precio">
                                                    </div>
                                                    <label for="" class="col-sm-1">STOCK</label>
                                                    <div class="col-sm-1">
                                                        <input type="text" class="form-control input-sm" id="stock" readonly="">
                                                    </div>
                                                    <label for="" class="col-sm-1">CANTIDAD</label>
                                                    <div class="col-sm-2">
                                                        <input type="number" class="form-control input-sm" id="cantidad">
                                                    </div>
                                                    <div class="col-md-1">
                                                        <div class="form-group">
                                                            <button id="btn-agregar-nota" type="button" class="btn btn-success btn-flat btn-block btn-sm"><span class="fa fa-plus"></span></button>
                                                        </div>
                                                    </div>

                                                    <!--                                                    <div class="isNurse">Nurse <a href="#" class="remove" rel="PELOTAS">remove</a></div>-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- -->
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
                                                    <th></th>
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
                                                        <td>
                                                            <button type='button' class='btn btn-danger btn-remove-detalle-solicitud-encache eliminar_fila'><span class='fa fa-remove'></span></button>
                                                            <input type="hidden" name="value_id_solicitud" id="value_id_solicitud" value="<?php echo $grilla_nota->id_detalle; ?>">
                                                        </td>
                                                        <input type="hidden" name="value_id_estado_stock_producto" id="value_id_estado_stock_producto" value="<?php echo $grilla_nota->id_estado_stock_producto; ?>">
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