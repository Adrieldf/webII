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
                $("#div_carrinho").html("<div class='form-group row'></div>");
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

//$.makeTableCarrinho = function (imagem, descricao, valor) {
$.makeTableCarrinho = function (mydata) {

    var table = $('<table class="table table-striped table-advance table-hover">');
    var tblHeader = "<tbody><tr>";

    tblHeader += "<th class='consulta-produto-col1'>Imagem</th>";
    tblHeader += "<th class='consulta-produto-col2'>Descrição</th>";
    tblHeader += "<th class='consulta-produto-col3'>Quantidade</th>";
    $(tblHeader).appendTo(table);
    cabecalho = 1;
    valorTotal = 0;
    $.each(mydata, function (index, value) {
        var TableRow = "<tr>";
        var id = "-1";
        $.each(value, function (key, val) {
            if (key == "imagem") {
                TableRow += '<td style="width:40px;display:block"><img height="130" width="130" src="' + val + '"/></td>"';
            }
            else if(key == 'descricao'){
                TableRow += "<td>" + val + "</td>";
            }
            else if(key == 'quantidade'){
                TableRow += "<td>" + val + "</td>";
            }
            else{

            }
        });

        TableRow += "</tr>";
        $(table).append(TableRow);
    });
    //document.getElementById('valorTotal').textContent = "R$" +  valorTotal;
    return ($(table));
}

function finalizaPedido(){
    $.ajax
        ({
            //Configurações
            type: 'POST',//Método que está sendo utilizado.
            dataType: 'json',//É o tipo de dado que a página vai retornar.
            url: '../controller/finalizaPedido.php',//Indica a página que está sendo solicitada.
            data: { id: 1 },//Dados para consulta
            //função que será executada quando a solicitação for finalizada.
            success: function (msg) {
                window.location = "../view/consulta-produtos.php";
            },
            error: function (jqXhr, textStatus, errorMessage) {
                //alert(errorMessage);
                window.location = "../view/consulta-produtos.php";
            }
        });
}