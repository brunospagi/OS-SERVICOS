$(document).ready(function () {

    $('#filtro-status, #filtro-departamento').change(function (evento) {

        var dados = {
            status: $('#filtro-status').val(),
            departamento: $('#filtro-departamento').val(),
            num: $(this).val()
        };
        carregaOS(dados);
    });

    $('#pesquisa').keyup(function () {
        
        var dados = {
            num: $(this).val()
        };
        carregaOS(dados);
    });
});