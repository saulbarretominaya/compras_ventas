<!-- La clase Content-wrapper da el formato HTML del Cuerpo -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            EMISION DE FACTURACIÓN ELECTRÓNICA
        </h1>
    </section>
    <!-- Main content -->

    <?php
    // RUTA para enviar documentos
    $ruta = "https://api.nubefact.com/api/v1/1af4aa5e-4251-4de0-aacb-76ae0b4e1d01";
    //TOKEN para enviar documentos
    $token = "eb2216d218fa4b95986bfdb14ff206b24db3365b4a7441caad3877a8db5591fb";

    $data = array(
        "operacion" => "generar_comprobante",
        "tipo_de_comprobante" => $param->tipo, //PARA FACTURAS 1, PARA BOLETAS 2
        "serie" => $param->serie, //PARA FACTURAS FFF1, PARA BOLETAS BBB1
        "numero" => $param->numero, //CORRELATIVO
        "sunat_transaction" => "1",
        "cliente_tipo_de_documento" => $param->tdocumento,
        "cliente_numero_de_documento" => $param->num_documento, //"20600695771",
        "cliente_denominacion" => $param->razon_social,
        "cliente_direccion" => $param->direccion, //"CALLE LIBERTAD 116 MIRAFLORES - LIMA - PERU",
        "cliente_email" => "",
        "cliente_email_1" => "",
        "cliente_email_2" => "",
        "fecha_de_emision" => date('d-m-Y'),
        "fecha_de_vencimiento" => "",
        "moneda" => "1",
        "tipo_de_cambio" => "",
        "porcentaje_de_igv" => "18.00",
        "descuento_global" => "",
        "descuento_global" => "",
        "total_descuento" => "",
        "total_anticipo" => "",
        "total_gravada" => $param->subtotal, //"500",
        "total_inafecta" => "",
        "total_exonerada" => "",
        "total_igv" => $param->igv, //"90"
        "total_gratuita" => "",
        "total_otros_cargos" => "",
        "total" => $param->monto_total, //"590",
        "percepcion_tipo" => "",
        "percepcion_base_imponible" => "",
        "total_percepcion" => "",
        "total_incluido_percepcion" => "",
        "detraccion" => "false",
        "observaciones" => "",
        "documento_que_se_modifica_tipo" => "",
        "documento_que_se_modifica_serie" => "",
        "documento_que_se_modifica_numero" => "",
        "tipo_de_nota_de_credito" => "",
        "tipo_de_nota_de_debito" => "",
        "enviar_automaticamente_a_la_sunat" => "true",
        "enviar_automaticamente_al_cliente" => "false",
        "codigo_unico" => "",
        "condiciones_de_pago" => "",
        "medio_de_pago" => "",
        "placa_vehiculo" => "",
        "orden_compra_servicio" => "",
        "tabla_personalizada_codigo" => "",
        "formato_de_pdf" => "",
        "items" => $param2
    );

    //print_r($data);
    //echo json_encode($data);

    $data_json = json_encode($data);

    //Invocamos el servicio de NUBEFACT
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $ruta);
    curl_setopt(
        $ch,
        CURLOPT_HTTPHEADER,
        array(
            'Authorization: Token token="' . $token . '"',
            'Content-Type: application/json',
        )
    );
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $respuesta = curl_exec($ch);
    curl_close($ch);

    ?>
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <a href="<?php echo base_url(); ?>Movimientos/Controller_ventas" class="btn btn-primary"><span class="fa fa-reply"></span> VOLVER</a>
                    </div>
                </div>
                <hr>
                <?php
                $leer_respuesta = json_decode($respuesta, true);
                if (isset($leer_respuesta['errors'])) {
                    //Mostramos los errores si los hay
                    echo $leer_respuesta['errors'];
                } else {
                    //Mostramos la respuesta
                ?>
                    <!--    <form action="<?php echo base_url(); ?>Movimientos/Controller_ventas/insertar_pdf_nubefact" method="post">-->
                    <h2>RESPUESTA DE SUNAT</h2>
                    <table border="1" style="border-collapse: collapse">
                        <tbody>
                            <tr>
                                <th>tipo:</th>
                                <td><?php echo $leer_respuesta['tipo_de_comprobante']; ?></td>
                            </tr>
                            <tr>
                                <th>serie:</th>
                                <td><?php echo $leer_respuesta['serie']; ?></td>
                            </tr>
                            <tr>
                                <th>numero:</th>
                                <td><?php echo $leer_respuesta['numero']; ?></td>
                            </tr>
                            <tr>
                                <th>enlace:</th>
                                <td><?php echo $leer_respuesta['enlace']; ?></td>
                            </tr>
                            <tr>
                                <th>aceptada_por_sunat:</th>
                                <td><?php echo $leer_respuesta['aceptada_por_sunat']; ?></td>
                            </tr>
                            <tr>
                                <th>sunat_description:</th>
                                <td><?php echo $leer_respuesta['sunat_description']; ?></td>
                            </tr>
                            <tr>
                                <th>sunat_note:</th>
                                <td><?php echo $leer_respuesta['sunat_note']; ?></td>
                            </tr>
                            <tr>
                                <th>sunat_responsecode:</th>
                                <td><?php echo $leer_respuesta['sunat_responsecode']; ?></td>
                            </tr>
                            <tr>
                                <th>sunat_soap_error:</th>
                                <td><?php echo $leer_respuesta['sunat_soap_error']; ?></td>
                            </tr>
                            <tr>
                                <th>pdf_zip_base64:</th>
                                <td><?php echo $leer_respuesta['pdf_zip_base64']; ?></td>
                            </tr>
                            <tr>
                                <th>xml_zip_base64:</th>
                                <td><?php echo $leer_respuesta['xml_zip_base64']; ?></td>
                            </tr>
                            <tr>
                                <th>cdr_zip_base64:</th>
                                <td><?php echo $leer_respuesta['cdr_zip_base64']; ?></td>
                            </tr>
                            <tr>
                                <th>codigo_hash:</th>
                                <td><?php echo $leer_respuesta['cadena_para_codigo_qr']; ?></td>
                            </tr>
                            <tr>
                                <th>codigo_hash:</th>
                                <td><?php echo $leer_respuesta['codigo_hash']; ?></td>
                            </tr>
                            <tr>
                                <th>enlace_del_pdf:</th>
                                <td><?php echo $leer_respuesta['enlace_del_pdf']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <!--        <input type="hidden" name="enlace_del_pdf" value="<?php echo $leer_respuesta['enlace_del_pdf']; ?>"> 
        <input type="hidden" name="id_venta" value="<?php echo $param->id_venta; ?>"> 
        <button type="submit" class="btn btn-primary btn-flat ">VOLVER AL MODULO DE VENTAS</button>-->
                    <!--    </form>-->
                <?php
                }

                ?>


            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>

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