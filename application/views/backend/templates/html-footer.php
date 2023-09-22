</div>
<!-- ./wrapper -->

<!-- jQuery 
<script src="<?= base_url('assets/file-export/jquery-3.5.1.js')?>"></script>
-->
<script src="<?= base_url('assets/jquery/jquery-3.4.1.min.js') ?>"></script>
<!-- JQuery Mask -->
<script src="<?= base_url('assets/jquery-mask/jquery.mask.min.js')?>"></script>
<script src="../../../../assets/jquery-mask/jquery.maskMoney.min.js"></script>
<!-- Popper min -->
<script src="<?= base_url('assets/popper/popper.min.js')?>"></script>
<!-- Popper-utils min -->
<script src="<?= base_url('assets/popper/popper-utils.min.js')?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
<!-- dataTables js -->
<script src="<?=base_url('assets/file-export/jquery.dataTables.min.js')?>"></script>
<script src="<?=base_url('assets/file-export/dataTables.buttons.min.js')?>"></script>
<script src="<?=base_url('assets/file-export/jszip.min.js')?>"></script>
<script src="<?=base_url('assets/file-export/pdfmake.min.js')?>"></script>
<script src="<?=base_url('assets/file-export/vfs_fonts.js')?>"></script>
<script src="<?=base_url('assets/file-export/buttons.html5.min.js')?>"></script>
<script src="<?=base_url('assets/file-export/buttons.print.min.js')?>"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url('assets/jquery/jquery.overlayScrollbars.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/adminlte/js/adminlte.min.js') ?>"></script>

<script src="<?= base_url('assets/js/scripts.js')?>" type="text/javascript"></script>
<script type="text/javascript">
    
    $("#search").blur(function(){
        var cpf = $("#search").val();

        $.post('<?=base_url('buscas/searching_client')?>', {cpf: cpf}, function(cpf){
            $("#id-cliente").val(cpf.id_cliente);
            $("#cliente").val(cpf.nome);
        }, 'json');
        
    });
    
    $("#txt-banco").blur(function(){
        var codigo = $("#txt-banco").val();
        $.post('<?=base_url('buscas/searching_bank')?>', {codigo: codigo}, function(codigo){
            $("#txt-banco").val(codigo.codigo + '-' + codigo.banco);
        }, 'json');
        
    });
    
    $(function(){
        $(".valores").maskMoney({
            prefix: 'R$ ',
            thousands: '.',
            decimal: ',',
            symbolStay: false
        });
        
        $(".valor").maskMoney({
            thousands: '.',
            decimal: ','            
        });
    });
    
    function aosair(){        
        var referencia = $('#referente').val();        
        var total = $('#valor-total').val();
        var liquido = $('#valor-liquido').val();
        var percent = $('#valor-percentual').val();       
        
        total = parseFloat(substitui(total));
        liquido = parseFloat(substitui(liquido));       
        percent = parseFloat(substitui(percent));
        
        var calculo = 0.0;
        
        if(referencia==='LIQUIDO'){
            calculo=(percent/100) * liquido;
            calculo = calculo.toFixed(2).toString().replace('.', ',');            
            document.getElementById('valor-comissao').value = calculo;  
        } else {
            calculo=(percent/100) * total;
            calculo = calculo.toFixed(2).toString().replace('.', ',');
            document.getElementById('valor-comissao').value = calculo;
        }
    };
    function apagar(valor){
        return valor.replace('R$ ', '');
    };
    
    function substitui(valor){
        valor = apagar(valor);
        valor = valor.replace('.', '');
        valor = valor.replace(',', '.');
        return valor;
    };
</script>    
</body>
</html>


