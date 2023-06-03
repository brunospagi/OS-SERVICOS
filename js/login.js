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