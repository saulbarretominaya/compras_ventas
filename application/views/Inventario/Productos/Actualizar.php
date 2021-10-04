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
        <form action="<?php echo base_url() ?>Inventario/Controller_productos/actualizar" method="post">
            <div class="col-md-12">
                <div class="card card-primary">
                    <!-- <div class="card-header">
                        <h3 class="card-title"></h3>
                    </div> -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="hidden" class="form-control" id="" name="id_producto" value="<?php echo $enlace_actualizar_personal->id_producto; ?>">
                                    <label for="" value="" name="">CODIGO</label>
                                    <input type="text" class="form-control" id="" name="" value="<?php echo $enlace_actualizar_personal->cod_producto; ?>" readonly="">
                                </div>
                                <div class="form-group">
                                    <label for="nombre">NOMBRES</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $enlace_actualizar_personal->nombre; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="marca">MARCA</label>
                                    <input type="text" class="form-control" id="marca" name="marca" value="<?php echo $enlace_actualizar_personal->marca; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="descripcion">DESCRIPCION</label>
                                    <textarea class="form-control" name="descripcion" rows="5"><?php echo $enlace_actualizar_personal->descripcion; ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="fecha">FECHA </label>
                                    <input type="text" class="form-control" id="fecha" name="fecha" value="<?php echo $enlace_actualizar_personal->fecha; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="precio_venta">PRECIO DE VENTA </label>
                                    <input type="text" class="form-control" id="precio_venta" name="precio_venta" value="<?php echo $enlace_actualizar_personal->precio_venta; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="precio_rebaja">PRECIO REBAJA </label>
                                    <input type="text" class="form-control" id="precio_rebaja" name="precio_rebaja" value="<?php echo $enlace_actualizar_personal->precio_rebaja; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="precio_costo">PRECIO DE COSTO </label>
                                    <input type="text" class="form-control" id="precio_costo" name="precio_costo" value="<?php echo $enlace_actualizar_personal->precio_costo; ?>">
                                </div>


                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="stock">STOCK</label>
                                    <input type="text" class="form-control" id="stock" name="stock" value="<?php echo $enlace_actualizar_personal->stock; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">CATEGORIA</label>
                                    <select class="form-control" id="id_categoria" name="id_categoria">
                                        <?php foreach ($multitablas_categorias as $grilla_tipo_personal) : ?>
                                            <?php if ($grilla_tipo_personal->id_categoria == $enlace_actualizar_personal->id_categoria) : ?>
                                                <option value="<?php echo $grilla_tipo_personal->id_categoria ?>" selected=>
                                                    <?php echo $grilla_tipo_personal->ds_categoria; ?>
                                                </option>
                                            <?php else : ?>
                                                <option value="<?php echo $grilla_tipo_personal->id_categoria ?>">
                                                    <?php echo $grilla_tipo_personal->ds_categoria; ?>
                                                </option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <!-- 
                                <div class="form-group">
                                    <label for="telefono">SUBIR IMAGEN</label>
                                    <input type="text"class="form-control" id="telefono" name="telefono" value="">
                                </div> -->
                                <div class="form-group">
                                    <label for="" class="col-md-12">&nbsp</label>
                                    <button type="submit" class="btn btn-warning btn-flat ">ACTUALIZAR</button>
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