var nr_pedido = "";

jQuery(document).ready(function ($) {
    preparaEventos($);
});

function preparaEventos($) {
    $(".clickable-row").click(function () {
        
        $(this).addClass('active').siblings().removeClass('active');
        nr_pedido   = jQuery(this).find("td:eq(0)").text();
        cliente     = jQuery(this).find("td:eq(1)").text();
        dataPedido  = jQuery(this).find("td:eq(2)").text();
        dataEntrega = jQuery(this).find("td:eq(3)").text();
        valor       = jQuery(this).find("td:eq(4)").text();
        situacao    = jQuery(this).find("td:eq(5)").text();
        buscaItens(nr_pedido);
        botaoEditar(nr_pedido,cliente,valor,dataPedido, dataEntrega, situacao);
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
                $("#div_item").html("<div class='form-group row'><label for='pedido' class='col-sm-3 col-form-label'>Pedido selecionado: </label><div class='col-sm-2'><input type='text' class='form-control' id='txtIdEdit' name='txtIdEdit' value='"+nr_pedido+"' readonly></div></div>");
                if (quantos > 0) {
                    var table = $.makeTableItens(mydata);
                    $("#div_item").append(table);
                }
            },
            error: function(jqXhr, textStatus, errorMessage){
                alert(errorMessage);
            }
        });
}

$.makeTableItens = function (mydata) {
    var table = $('<table class="table table-striped table-advance table-hover">');
    var tblHeader = "<tbody><tr>";
    tblHeader += "<th class='consulta-pedido-item-col1'>Imagem</th>";
    tblHeader += "<th class='consulta-pedido-item-col2'>Descrição</th>";
    tblHeader += "<th class='consulta-pedido-item-col3'>Quantidade</th>";
    tblHeader += "<th class='consulta-pedido-item-col4'>Valor unitário</th>";
    tblHeader += "<th class='consulta-pedido-item-col5'>Valor total</th></tr>";
    $(tblHeader).appendTo(table);
    $.each(mydata, function (index, value) {
        var TableRow = "<tr>";
        var id = "-1";
        $.each(value, function (key, val) {
            TableRow += "<td>" + val + "</td>";
            if(key=="id") {
                id = val;
            }
        });

        TableRow += "</tr>";
        $(table).append(TableRow);
    });
    return ($(table));
};

function botaoEditar(pedido,cliente,valor,dataPedido, dataEntrega, situacao){
    var x = document.getElementById("update");
    if (x.style.display === "none") {
        x.style.display = "block";
    }
    var x = document.getElementById("div_item");
    if (x.style.display === "none") {
        x.style.display = "block";
    }

    document.getElementById('pedido').value = pedido;
    document.getElementById('cliente').value = cliente;
    document.getElementById('valor').value = valor;
    document.getElementById('dataPedido').value = dataPedido;
    document.getElementById('dataEntrega').value = dataEntrega;
    document.getElementById('situacao').value = situacao;
}