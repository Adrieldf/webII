var cabecalho = 0;
function adicionaAoCarrinho(imagem, descricao, valor) {
    var x = document.getElementById("footer");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        //x.style.display = "none";
    }
    var table = $.makeTableCarrinho(imagem, descricao, valor);
    $("#div_carrinho").append(table);
}

$.makeTableCarrinho = function (imagem, descricao, valor) {

    var table = $('<table class="table table-striped table-advance table-hover">');
    var tblHeader = "<tbody><tr>";
    if (cabecalho == 0) {
        tblHeader += "<th class='consulta-produto-col1'>Imagem</th>";
        tblHeader += "<th class='consulta-produto-col2'>Descrição</th>";
        tblHeader += "<th class='consulta-produto-col3'>Quantidade</th>";
        $(tblHeader).appendTo(table);
        cabecalho = 1;
    }

    var TableRow = "<tr>";
    TableRow += '<td class="consulta-produto-col1" style="width:50px;display:block"><img height="100" width="100" src="' + imagem + '"/></td>"';
    TableRow += "<td class='consulta-produto-col2'>" + descricao + "</td>";
    TableRow += "<td class='consulta-produto-col3'>" + valor + "</td>";
    TableRow += "</tr>";
    $(table).append(TableRow);

    return ($(table));
}