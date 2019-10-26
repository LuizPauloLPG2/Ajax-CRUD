//CRUD
$(document).ready(function () {
    //SELECT
    $(".getIdEstudo").on("click", function () {
        var id = this.dataset.id;
        $.ajax({
            url: "select.php",
            data: {
                id: id
            }
        }).done(function (request) {
            estudo = JSON.parse(request);
            $("#id_estudo").val(estudo.id_estudo);
            $("#nome_estudo").val(estudo.nome);
            $("#desc_estudo").val(estudo.descricao);
        });
    }),
    //UPDATE
    $(".updateIdEstudo").on("click", function () {
        var html = "";
        var erro = document.querySelector("#erro");
        var id = $("#id_estudo").val();
        var nome = $("#nome_estudo").val();
        var descricao = $("#desc_estudo").val();
        $.ajax({
            url: "update.php",
            data: {
                id: id,
                nome: nome,
                descricao: descricao
            }
        }).done(function (data) {
            if (data === "true") {
                location.reload();
            } else {
                html = "<div class='alert alert-danger' role='alert'>ERRO</div>";
                erro.innerHTML = html;
                return false;
            }
        });
    }),
    //DELETE
    $(".delIdEstudo").on("click", function () {
        var id = this.dataset.id;
        var html = "";
        var erro = document.querySelector("#erro");
        $.ajax({
            url: "delete.php",
            data: {
                id: id
            }
        }).done(function (data) {
            if (data === "true") {
                location.reload();
            } else {
                html = "<div class='alert alert-danger' role='alert'>ERRO</div>";
                erro.innerHTML = html;
                return false;
            }
        });
    }),
    //INSERT
    $("#sendData").on("submit", function (e) {
        var html = "";
        var erro = document.querySelector("#erro");
        
        e.preventDefault();
        
        var form = $('#sendData')[0];
        
        var nome = form.nome_estudo.value;
        var desc = form.desc_estudo.value;
        
        if (nome === "" || desc === "") {
            html = "<div class='alert alert-danger' role='alert'>CAMPO REQUERIDO</div>";
            erro.innerHTML = html;
            return false;
        }
        var formulario = $('#sendData').serialize();
        
        $.ajax({
            url: "insert.php",
            method: "POST",
            data: formulario
        }).done(function (data) {
            if (data === "true") {
                location.reload();
            } else {
                html = "<div class='alert alert-danger' role='alert'>ERRO</div>";
                erro.innerHTML = html;
                return false;
            }
        });
    });
});
