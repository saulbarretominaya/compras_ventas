<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Cargos
                        <button type="button" class="btn btn-primary btn-sm btn_registrar">REGISTRAR</button>
                        <a href="<?php echo base_url(); ?>Recursos_humanos/Controller_cargos" class="btn btn-danger btn-sm">CANCELAR</a>
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <!-- <div class="card-header">
                            <h3 class="card-title">REGISTRAR</h3>
                        </div> -->
                        <form class="form-horizontal">
                            <div class="card-body">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="descripcion">CARGO</label>
                                        <input type="text" class="form-control" placeholder="Ingrese Cargo" id="descripcion" name="descripcion" style="text-transform:uppercase">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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
<script src="<?php echo base_url(); ?>application/js/cargos.js"></script>
</body>

</html>