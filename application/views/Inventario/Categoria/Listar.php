    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Categoria
                            <a href="<?php echo base_url(); ?>Inventario/Controller_categoria/enlace_insertar" class="btn btn-primary btn-sm">REGISTRAR</a>
                        </h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12">
                            <table id="listar" class="table table-bordered table-sm table-hover" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th class="text-center">ITEM</th>
                                        <th class="text-center">CODIGO</th>
                                        <th class="text-center">NOMBRE</th>
                                        <th class="text-center">DESCRIPCIÓN</th>
                                        <th class="text-center"></th>
                                        <th class="text-center"></th>
                                        <th class="text-center"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($listar_categorias as $grilla_categorias) : ?>
                                        <tr>
                                            <td class="text-center" style="width: 30px;"><?php echo $grilla_categorias->item; ?></td>
                                            <td class="text-center" style="width: 30px;"><?php echo $grilla_categorias->cod_categoria; ?></td>
                                            <td class="text-center" style="width: 100px;"><?php echo $grilla_categorias->nombre; ?></td>
                                            <td class="text-center" style="width: 200px;"><?php echo $grilla_categorias->descripcion; ?></td>
                                            <?php $datamodal_cargos = $grilla_categorias->cod_categoria . "*" . $grilla_categorias->nombre . "*" . $grilla_categorias->descripcion; ?>
                                            <td class="text-center" style="width: 25px;"><button type="button" class="btn btn-outline-info btn-sm visualizar_categorias" data-toggle="modal" data-target="#modal-default" value="<?php echo $datamodal_cargos ?>"><span class="fas fa-search-plus"></span></button></td>
                                            <td class="text-center" style="width: 25px;"><a href="<?php echo base_url(); ?>Inventario/Controller_categoria/enlace_actualizar/<?php echo $grilla_categorias->id_categoria; ?>" class="btn btn-outline-warning btn-sm"><span class="far fa-edit"></span> </a></td>

                                            <?php if ($this->session->userdata('ds_rol') == 'ADMINISTRADOR') { ?>
                                                <td class="text-center" style="width: 15px;"><a href="<?php echo base_url(); ?>Inventario/Controller_categoria/eliminar/<?php echo $grilla_categorias->id_categoria; ?>" class="btn btn-outline-danger btn-sm"><span class="fas fa-trash-alt"></a></td>
                                            <?php } ?>
                                        </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="modal fade" id="modal-default" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">INFORMACIÓN</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>One fine body&hellip;</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-lef btn-sm" data-dismiss="modal">CERRAR</button>
                </div>
            </div>
        </div>
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
    <script src="<?php echo base_url(); ?>application/js/categorias.js"></script>
    </body>

    </html>