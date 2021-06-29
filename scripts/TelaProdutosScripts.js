var cabecalho = 0;
var carrinho = [];
function adicionaAoCarrinho(imagem, descricao, valor, id) {
    var x = document.getElementById("footer");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        //x.style.display = "none";
    }
    buscaItemCarrinho(id);
    /*var table = $.makeTableCarrinho(imagem, descricao, valor);
    $("#div_carrinho").append(table);*/
}

function buscaItemCarrinho(id) {
    $.ajax
        ({
            //Configurações
            type: 'POST',//Método que está sendo utilizado.
            dataType: 'json',//É o tipo de dado que a página vai retornar.
            url: '../controller/BuscaItemCarrinho.php',//Indica a página que está sendo solicitada.
            data: { id: id },//Dados para consulta
            //função que será executada quando a solicitação for finalizada.
            success: function (msg) {
                var mydata = eval(msg);
                var quantos = Object.keys(mydata).length;
                $("#div_carrinho").html("<div class='form-group row'><label for='pedido' class='col-sm-3 col-form-label'>Pedido selecionado: </label><div class='col-sm-2'><input type='text' class='form-control' id='txtIdEdit' name='txtIdEdit' value='" + nr_pedido + "' readonly></div></div>");
                if (quantos > 0) {
                    var table = $.makeTableCarrinho(mydata);
                    $("#div_carrinho").append(table);
                }
            },
            error: function (jqXhr, textStatus, errorMessage) {
                alert(errorMessage);
            }
        });
}

$.makeTableCarrinho = function (imagem, descricao, valor) {
    /*
    var table = $('<table class="table table-striped table-advance table-hover">');
    var tblHeader = "<tbody><tr>";
    if (cabecalho == 0) {
        tblHeader += "<th class='consulta-produto-col1'>Imagem</th>";
        tblHeader += "<th class='consulta-produto-col2'>Descrição</th>";
        tblHeader += "<th class='consulta-produto-col3'>Valor</th>";
        $(tblHeader).appendTo(table);
        cabecalho = 1;
    }

    var TableRow = "<tr>";
    TableRow += '<td class="consulta-produto-col1" style="width:50px;display:block"><img height="100" width="100" src="' + imagem + '"/></td>"';
    TableRow += "<td class='consulta-produto-col2'>" + descricao + "</td>";
    TableRow += "<td class='consulta-produto-col3'>" + valor + "</td>";
    TableRow += "</tr>";
    $(table).append(TableRow);

    return ($(table));*/
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
            if (key == "imagem") {
                TableRow += '<td style="width:50px;display:block"><img height="150" width="150" src="' + val + '"/></td>"';
            }
            else {
                TableRow += "<td>" + val + "</td>";
            }
        });

        TableRow += "</tr>";
        $(table).append(TableRow);
    });
    return ($(table));
}