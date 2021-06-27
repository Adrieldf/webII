function botaoEditar(nomeF, nomeP, desc, foto, qtd, preco, id) {
    var x = document.getElementById("update");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        // x.style.display = "none";
    }
    var x = document.getElementById("insert");
    if (x.style.display === "none") {
        //x.style.display = "block";
    } else {
        x.style.display = "none";
    }
    document.getElementById('txtFornecedorUpdate').value = nomeF;
    document.getElementById('txtProdutoUpdate').value = nomeP;
    document.getElementById('txtQuantidadeUpdate').value = qtd;
    document.getElementById('txtDescricaoUpdate').value = desc;
    document.getElementById('txtValorUpdate').value = preco;
    document.getElementById('txtIdEdit').value = id;
    document.getElementById('foto-produto').src = foto;


}

function escodeBotaoCancelar() {
    var x = document.getElementById("update");
    if (x.style.display === "none") {
        //x.style.display = "block";
    } else {
        x.style.display = "none";
    }
    var x = document.getElementById("insert");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        // x.style.display = "none";
    }


}

$(document).ready(function () {
    $("#btnEditarImagem").click(() => {
        $('#uploadImagem').trigger('click');
    });

    $('#uploadImagem').on('change', function () {
        var file_data = $('#uploadImagem').prop('files')[0];
        //console.log("File", file_data);
        var form_data = new FormData();
        var reader = new FileReader();
       
        reader.onload = function (e) {
            form_data.append('txtIdEdit', $("#txtIdEdit").val());
            form_data.append('foto', e.target.result);

            $.ajax({
                url: 'http://localhost/webII/controller/AtualizaFotoProduto.php', // point to server-side controller method
                dataType: 'text', // what to expect back from the server
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function (response) {
                    window.location = response;
                },
                error: function (response) {
                    console.log("upload failed (?)", response);
                }
            });
        }

        reader.readAsDataURL(file_data);


    });

});