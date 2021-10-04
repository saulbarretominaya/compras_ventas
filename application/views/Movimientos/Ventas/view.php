<div class="row">
    <!--    <div class="col-xs-4 text-left">
            <b>NUM. SOLICITUD: </b><?php echo $cabecera->id_solicitud; ?><br>
            <b>NUM. VIÁTICO: </b><?php echo $cabecera->id_viatico; ?><br>
    <!--<?php if ($cabecera->fec_pago <> null) : ?>
                                            <b>FECHA PAGOO: </b><?php echo $cabecera->fec_pago; ?>   
    <?php endif; ?> -->
</div>
<div class="col-xs-12 text-center">
    <b></b><br>
    <br>
    Tel. <br>
    Página web:<a href=""></a>
</div>

<!--</div> <br>-->


<!-- /.box-header -->
<div class="row">
    <div class="col-xs-6">
        <b>VENTA: </b><?php echo $cabecera->cod_venta; ?><br>
        <b>CLIENTE: </b><?php echo $cabecera->ds_cliente; ?><br>
        <b>DIRECCIÓN: </b><?php echo $cabecera->direccion; ?><br>
    </div>
    <div class="col-xs-6">
        <div class="form-group">
            <b><span style="background-color: #D0D0D0">TIPO DE COMPROBANTE: </span></b><?php echo $cabecera->ds_comprobante; ?><br>
            <b>FECHA VENTA: </b><?php echo $cabecera->fecha; ?><br>
            <b>VENDEDOR: </b><?php echo $cabecera->ds_vendedor; ?><br>
        </div>
    </div>
</div>
<br>



<div class="row">
    <div class="col-xs-12">
        <table class="table table-bordered table-condensed table-hover" style="text-align: center;">
            <thead>
                <tr>
                    <th class="text-center">Nº</th>
                    <th class="text-center">PRODUCTO</th>
                    <th class="text-center">DESCRIPCION</th>
                    <th class="text-center">CANTIDAD</th>
                    <th class="text-center">PRECIO UNIT.</th>
                    <th class="text-center">IMPORTE</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($detalle as $grilla_detalle) : ?>
                    <tr>
                        <td class="text-center"><?php echo $grilla_detalle->item; ?></td>
                        <td class="text-center"><?php echo $grilla_detalle->ds_producto; ?></td>
                        <td class="text-center"><?php echo $grilla_detalle->marca; ?></td>
                        <td class="text-center"><?php echo $grilla_detalle->cantidad; ?></td>
                        <td class="text-center"><?php echo $grilla_detalle->precio; ?></td>
                        <td class="text-center"><?php echo $grilla_detalle->importe; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

            <tfoot>
                <tr>
                    <td colspan="5" class="text-right"><strong>SUB TOTAL</strong></td>
                    <td class="text-center"><?php echo $cabecera->subtotal; ?></td>
                </tr>
                <tr>
                    <td colspan="5" class="text-right"><strong>IGV</strong></td>
                    <td class="text-center"><?php echo $cabecera->igv; ?></td>
                </tr>
                <tr>
                    <td colspan="5" class="text-right"><strong>S/. TOTAL:</strong></td>
                    <th class="text-center" style="background-color: #D0D0D0"><?php echo $cabecera->monto_total; ?></th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<div class="row">
    <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><span class="fa fa-reply"> CERRAR</span></button>
        <a href="<?php echo base_url(); ?>Reportes/Ventas/Controller_reportes/reporte_modal/<?php echo $cabecera->id_venta; ?>" class="btn btn-primary" download=""><span class="fa fa-print"></span> DESCARGAR VENTA</a>
    </div>
</div>