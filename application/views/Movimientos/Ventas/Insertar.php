<!-- La clase Content-wrapper da el formato HTML del Cuerpo -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            VENTAS
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
                        <form action="<?php echo base_url() ?>Movimientos/Controller_ventas/insertar" method="post" class="form-horizontal" onsubmit="return validarTableSolicitud();">
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
                                                    <div class="radio">
                                                        <?php foreach ($multitablas_comprobantes_boletas as $boletas) : ?>
                                                            <?php $split_boletas = $boletas->codigo . "*" . $boletas->nombre . "*" . $boletas->serie . "*" . $boletas->num_comprobante; ?>
                                                        <?php endforeach; ?>
                                                        <label class="col-xs-6">
                                                            <input type="radio" name="id_tcomprobante" id="boleta" value="<?php echo $split_boletas ?>" required="">Boleta
                                                        </label>
                                                        <?php foreach ($multitablas_comprobantes_facturas as $facturas) : ?>
                                                            <?php $split_facturas = $facturas->codigo . "*" . $facturas->nombre . "*" . $facturas->serie . "*" . $facturas->num_comprobante; ?>
                                                        <?php endforeach; ?>
                                                        <label class="col-xs-6">
                                                            <input type="radio" name="id_tcomprobante" id="factura" value="<?php echo $split_facturas ?>">Factura
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <a href="<?php echo base_url(); ?>Movimientos/Controller_clientes/enlace_insertar" class="btn btn-warning"><span class="fa fa-user-plus"></span></a>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="hidden" name="id_vendedor" id="" value="<?php echo $this->session->userdata("id_usuario") ?>">
                                                    <input type="text" class="form-control" id="ds_nombres" required="" placeholder="NOMBRE DEL CLIENTE" onkeypress="return false;">

                                                </div>
                                                <div class="col-md-4">
                                                    <div class="input-group">
                                                        <input type="hidden" name="id_cliente" id="id_personal">
                                                        <input type="text" class="form-control" id="ruc" placeholder="TIPO DE DOC." required="" onkeypress="return false;">
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-success" type="button" data-toggle="modal" data-target="#modal-default"><span class="fa fa-search"></span> Buscar</button>
                                                        </span>
                                                    </div><!-- /input-group -->
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="col-sm-3">DIRECCION</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="direccion" id="direccion" required>
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
                                                    <font style="color: #007fff">BOLETA DE VENTA</font>
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
                                                            <button id="btn-agregar-solicitud" type="button" class="btn btn-success btn-flat btn-block btn-sm"><span class="fa fa-plus"></span></button>
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
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <span class="input-group-addon"> S/. SUB TOTAL:</span>
                                        <input type="text" class="form-control" name="sub_total" id="sub_total" readonly="" value="">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="input-group">
                                        <span class="input-group-addon"> IGV:</span>
                                        <input type="text" class="form-control" name="igv" id="igv" readonly="" value="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <span class="input-group-addon"> S/. TOTAL:</span>
                                        <input type="text" class="form-control" name="monto_total" id="monto_total" readonly="" value="">
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

<div class="modal fade" id="modal-default">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">LISTA DE CLIENTES</h4>
            </div>
            <div class="modal-body">
                <table id="example1" class="table table-bordered table-condensed table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">CODIGO</th>
                            <th class="text-center">NOMBRE COMPLETO</th>
                            <th class="text-center">TIPO DE DOCUMENTO</th>
                            <th class="text-center">NUM. DOCUMENTO</th>
                            <th class="text-center">OPCION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($multitablas_clientes)) : ?>
                            <?php foreach ($multitablas_clientes as $grilla_clientes) : ?>
                                <tr>
                                    <td class="text-center"><?php echo $grilla_clientes->cod_cliente; ?></td>
                                    <td class="text-center"><?php echo $grilla_clientes->ds_nombres; ?></td>
                                    <td class="text-center"><?php echo $grilla_clientes->abreviatura; ?></td>
                                    <td class="text-center"><?php echo $grilla_clientes->num_documento; ?></td>
                                    <?php $dataareas = $grilla_clientes->id_cliente . "*" . $grilla_clientes->ds_nombres . "*" . $grilla_clientes->num_documento; ?>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-info btn-check btn-xs" value="<?php echo $dataareas; ?>"><span class="fa fa-check"></span></button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
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