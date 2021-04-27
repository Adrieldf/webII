function botaoEditar(nome, desc, tel, email, cep, rua, n, comp, bairro, cidade, est, id) {
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
    document.getElementById('txtNomeUpdate').value = nome;
    document.getElementById('txtDescricaoUpdate').value = desc;
    document.getElementById('txtTelefoneUpdate').value = tel;
    document.getElementById('txtEmailUpdate').value = email;
    document.getElementById('txtCepUpdate').value = cep;
    document.getElementById('txtRuaUpdate').value = rua;
    document.getElementById('txtNumeroUpdate').value = n;
    document.getElementById('txtComplementoUpdate').value = comp;
    document.getElementById('txtBairroUpdate').value = bairro;
    document.getElementById('txtCidadeUpdate').value = cidade;
    document.getElementById('txtEstadoUpdate').value = est;
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