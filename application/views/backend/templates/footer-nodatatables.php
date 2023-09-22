</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url('assets/jquery/jquery-3.4.1.min.js') ?>"></script>
<!-- JQuery Mask -->
<script src="<?= base_url('assets/jquery-mask/jquery.mask.min.js')?>"></script>
<!-- Popper min -->
<script src="<?= base_url('assets/popper/popper.min.js')?>"></script>
<!-- Popper-utils min -->
<script src="<?= base_url('assets/popper/popper-utils.min.js')?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url('assets/jquery/jquery.overlayScrollbars.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/plugins/js/adminlte.min.js') ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/plugins/js/demo.js') ?>"></script>

<script src="<?= base_url('assets/plugins/js/pt-br.js')?>" type="text/javascript"></script>
<script>
    $(document).ready(function(){
        $('.cpf').mask('000.000.000-00',{reverse: true});
        $('.cep').mask('00000-000',{reverse: true});
        $('.phone').mask('(99)99999-9999');
        $('[data-toggle="tooltip"]').tooltip();
    });
    
</script>
</body>
</html>


