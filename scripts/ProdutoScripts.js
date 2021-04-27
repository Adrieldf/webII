function botaoEditar(nomeF, nomeP, desc, qtd, preco, id) {
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