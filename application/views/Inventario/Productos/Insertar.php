<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Productos</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">

        <form action="<?php echo base_url() ?>Inventario/Controller_productos/insertar" method="post">
            <div class="col-md-12">
                <div class="card card-primary">
                    <!-- <div class="card-header">
                        <h3 class="card-title"></h3>
                    </div> -->
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nombre">PRODUCTO</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="NOMBRE DEL PRODUCTO">
                                </div>
                                <div class="form-group">
                                    <label for="apepaterno">MARCA</label>
                                    <input type="text" class="form-control" id="apepaterno" name="marca">
                                </div>
                                <div class="form-group">
                                    <label for="apematerno">DESCRIPCION</label>
                                    <textarea class="form-control" rows="5" name="descripcion"></textarea>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="telefono">FECHA</label>
                                    <input type="text" class="form-control" id="telefono" name="fecha">
                                </div>
                                <div class="form-group">
                                    <label for="direccion">PRECIO VENTA</label>
                                    <input type="text" class="form-control" id="direccion" name="precio_venta">
                                </div>
                                <div class="form-group">
                                    <label for="direccion">PRECIO REBAJA</label>
                                    <input type="text" class="form-control" id="direccion" name="precio_rebaja">
                                </div>
                                <div class="form-group">
                                    <label for="telefono">PRECIO COSTO</label>
                                    <input type="text" class="form-control" id="telefono" name="precio_costo">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="direccion">STOCK</label>
                                    <input type="text" class="form-control" id="direccion" name="stock">
                                </div>
                                <div class="form-group">
                                    <label for="">CATEGORIA</label>
                                    <select class="form-select" id="id_cargo" name="id_categoria">
                                        <?php foreach ($multitablas_categorias as $grilla_cargos) : ?>
                                            <option value="<?php echo $grilla_cargos->id_categoria; ?>">
                                                <?php echo $grilla_cargos->ds_categoria; ?>
                                                <!-- Tiene que imprimir! -->
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="" class="col-md-12">&nbsp</label>
                                    <button type="submit" class="btn btn-primary btn-flat ">REGISTRAR</button>
                                    <a href="<?php echo base_url(); ?>Inventario/Controller_productos" class="btn btn-danger">CANCELAR</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </section>
</div>

<aside class="control-sidebar control-sidebar-dark">
</aside>

<footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.1.0
    </div>
</footer>
</div>

<!-- jQuery -->
<script src="<?php echo base_url() ?>librerias/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>librerias/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url() ?>librerias/plugins/bootstrap-5.1.0-dist/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>librerias/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>librerias/dist/js/demo.js"></script>
<!-- Page specific script -->
<script src="<?php echo base_url() ?>librerias/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url() ?>librerias/plugins/inputmask/jquery.inputmask.min.js"></script>
<script src="<?php echo base_url(); ?>librerias/plugins/alertify/alertify.js"></script>
<script type="text/javascript" charset="utf8" src="<?php echo base_url() ?>librerias/plugins/DataTables/datatables.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url() ?>librerias/plugins/select2/js/select2.full.min.js"></script>
<script>
    var base_url = "<?php echo base_url(); ?>";
</script>
<script src="<?php echo base_url(); ?>application/js/productos.js"></script>
</body>

</html>