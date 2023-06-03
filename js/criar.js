$(document).ready(function(){
 
    $('#btn-criar').click(function (){
       // Valida o form 
       $('#modal-abrir .modal-body .form-group').removeClass('has-error');
       $('#alerta-form').addClass('hide');
       var valido = true;
       
       if ($('#solicitacao').val() == "")
       {
           $('#solicitacao').parent().parent().addClass('has-error');
           valido = false;
       }
       
       // Envia o form
       if (valido == true){
           
            var dados = {
                solicitacao: $('#solicitacao').val(),
                departamento: $('#departamento').val()
            };
           
            $.post('/model/criar-os.php', dados, function(retorno){
                var json = JSON.parse(retorno);
                console.log(json);
               
                if(json.status == 'ok')
                {
                   
                   $('#modal-abrir').modal('hide');
                   window.location.reload();
                   
                }else if(json.status == 'erro'){
                   
                   $('#alerta-form').removeClass('hide');
                   $('#alerta-form').html(json.msg);
                }               
            });
        }
    });
    
    $('#modal-abrir').on('show.bs.modal', function(){
        $('#modal-abrir .modal-body .form-group').removeClass('has-error');
        $('#modal-abrir .modal-body .form-group input').val('');
        $('#modal-abrir .modal-body .form-group textarea').val('');
        $('#alerta-form').addClass('hide');
    });
    
});