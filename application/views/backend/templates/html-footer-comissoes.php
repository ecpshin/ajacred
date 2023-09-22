</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url('assets/jquery/jquery-3.2.1.min.js') ?>"></script>
<!-- JQuery Mask -->
<script src="<?= base_url('assets/jquery-mask/jquery.mask.min.js') ?>"></script>
<!-- Popper min -->
<script src="<?= base_url('assets/popper/popper.min.js') ?>"></script>
<!-- Popper-utils min -->
<script src="<?= base_url('assets/popper/popper-utils.min.js') ?>"></script>
<!-- dataTables js -->
<script src="<?= base_url('assets/DataTables/datatables.min.js') ?>" type="text/javascript"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url('assets/jquery/jquery.overlayScrollbars.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/plugins/js/adminlte.min.js') ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/plugins/js/demo.js') ?>"></script>

<script src="<?= base_url('assets/plugins/js/pt-br.js') ?>" type="text/javascript"></script>

<script type="text/javascript">
    $("#agente").change(function() {

        var inicio = $("#inicio").val();
        var final = $("#final").val();
        var agente = $("#agente").val();
        var data = {
                    inicio: inicio, 
                    final: final, 
                    agente: agente
                    };
                    alert(inicio + '-' + final + '-' + agente);
        $.post('http://ajcred.ddns.net:8080/contratos/virtualizando', data, function(dados){
            alert(dados);
        });

    });


</script>
</body>

</html>