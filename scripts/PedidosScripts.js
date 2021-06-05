var nr_pedido = "";

jQuery(document).ready(function ($) {
    preparaEventos($);
});

function preparaEventos($) {
    $(".clickable-row").click(function () {
        $(this).addClass('active').siblings().removeClass('active');
        nr_pedido = jQuery(this).find("td:eq(0)").text();
        buscaItens(nr_pedido);
    });
}

function buscaItens(nr_pedido) {
    $.ajax
        ({
            //Configurações
            type: 'POST',//Método que está sendo utilizado.
            dataType: 'json',//É o tipo de dado que a página vai retornar.
            url: '../controller/BuscaItensPedido.php',//Indica a página que está sendo solicitada.
            data: { nr_pedido: nr_pedido },//Dados para consulta
            //função que será executada quando a solicitação for finalizada.
            success: function (msg) {
                var mydata = eval(msg);
                var quantos = Object.keys(mydata).length;
                $("#div_item").html("<h1>Itens</h1>");
                if (quantos > 0) {
                    var table = $.makeTableItens(mydata);
                    $("#div_item").append(table);
                }
            }
        });
}

$.makeTableAlunos = function (mydata) {
    var table = $('<table class="table table-striped table-advance table-hover">');
    var tblHeader = "<tbody><tr>";
    tblHeader += "<th>Id</th>";
    tblHeader += "<th>Nome</th>";
    tblHeader += "<th>Ações</th></tr>";
    $(tblHeader).appendTo(table);
    $.each(mydata, function (index, value) {
        var TableRow = "<tr>";
        var idAluno = "-1";
        $.each(value, function (key, val) {
            TableRow += "<td>" + val + "</td>";
            if(key=="id") {
                idAluno = val;
            }
        });

        TableRow += "</tr>";
        $(table).append(TableRow);
    });
    return ($(table));
};