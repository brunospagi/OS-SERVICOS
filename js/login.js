$(document).ready(function () {

    $('#form-login').submit(function (evento) {
        evento.preventDefault();
        $('#alerta-form').addClass('hide');

        var dados = {
            usuario: $('#login').val(),
            senha: $('#senha').val()
        };

        $.post('/model/login.php', dados, function (retorno) {

            var status = JSON.parse(retorno);

            if (status.status != 'ok') {
                //não encontrado
                $('#alerta-form').html(status.msg);
                $('#alerta-form').removeClass('hide');
            } else {

                if (status.tipo == 'admin') {
                    location.href = "admin.php";
                } else {
                    location.href = "index.php";
                }
            }
        });
    });
});
$(document).ready(function () {

    $('#btn-criar-cadastro').click(function () {
        // Valida o form 
        $('#modal-cadastro .modal-body .form-group').removeClass('has-error');
        $('#alerta-form-cadastro').addClass('hide');
        var valido = true;
        if($('#usuario-senha').val() != $('#usuario-senha-valida').val() ){
            
            $('#alerta-form-cadastro').html('Sua senha esta diferente.');
            $('#alerta-form-cadastro').removeClass('hide');
            valido = false;
        }


        if ($('#usuario-nome').val() == "" || $('#usuario-email').val() == "" || $('#usuario-senha').val() == "" || $('#usuario-senha-valida').val() == "") {
            $('#usuario-nome').parent().parent().addClass('has-error');
            valido = false;
        }
        

        // Envia o form
        if (valido == true) {

            var dados = {
                nome: $('#usuario-nome').val(),
                email: $('#usuario-email').val(),
                senha: $('#usuario-senha').val()
            };

            $.post('/model/criar-usuario.php', dados, function (retorno) {
                var json = JSON.parse(retorno);
                console.log(json);

                if (json.status == 'ok') {

                    $('#alerta-form-cadastro').removeClass('hide');
                    $('#alerta-form-cadastro').html('json.msg');

                } else if (json.status == 'erro') {

                    $('#alerta-form-cadastro').removeClass('hide');
                    $('#alerta-form-cadastro').html('123');
                }
            });
        }
    });
});