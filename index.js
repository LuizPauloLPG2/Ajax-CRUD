//CRUD
$(document).ready(function () {
    //SELECT
    $(document).off('click.getIdEstudo').on('click.getIdEstudo', '.getIdEstudo', function () {
        
        var id = $(this).data('id');
        
        $.ajax({
            url: "select.php",
            method: "POST",
            data: { id },
            success: response => {
                
                estudo = JSON.parse(response);
                
                $("#id_estudo").val(estudo.id_estudo);
                $("#nome_estudo").val(estudo.nome);
                $("#desc_estudo").val(estudo.descricao);
            }
        });
    }),
    //UPDATE
    $(document).off('click.updateIdEstudo').on('click.updateIdEstudo', '.updateIdEstudo', function () {
        
        var html = "";
        
        var erro = document.querySelector("#erro");
        
        var id = $("#id_estudo").val();
        
        var nome = $("#nome_estudo").val();
        
        var descricao = $("#desc_estudo").val();
        
        $.ajax({
            url: "update.php",
            method: "POST",
            data: {
                id,
                nome,
                descricao
            },
            success: response => {
                if (response === true) {
                    location.reload();
                } else {
                    html = "<div class='alert alert-danger' role='alert'>ERRO</div>";
                    erro.innerHTML = html;
                    return;
                }
            }
        });
    }),
    //DELETE
    $(document).off('click.delIdEstudo').on('click.delIdEstudo', '.delIdEstudo', function () {
        
        var id = $(this).data('id');
        
        var html = "";
        
        var erro = document.querySelector("#erro");
        
        $.ajax({
            url: "delete.php",
            method: "POST",
            data: { id },
            success: response => {
                if (response === true) {
                    location.reload();
                } else {
                    html = "<div class='alert alert-danger' role='alert'>ERRO</div>";
                    erro.innerHTML = html;
                    return;
                }
            }
        });
    }),
    //INSERT
    $(document).off('submit.sendData').on('submit.sendData', '#sendData', function (e) {
        
        e.preventDefault();
        
        var html = "";
        
        var erro = document.querySelector("#erro");
                
        var form = $('#sendData')[0];
        
        var nome = form.nome_estudo.value;
        var desc = form.desc_estudo.value;
        
        if (!nome.trim() || !desc.trim()) {
            html = "<div class='alert alert-danger' role='alert'>CAMPO REQUERIDO</div>";
            erro.innerHTML = html;
            return;
        }
               
        $.ajax({
            url: "insert.php",
            method: "POST",
            data: $('#sendData').serialize(),
            success: response => {
                if (response === true) {
                    location.reload();
                } else {
                    html = "<div class='alert alert-danger' role='alert'>ERRO</div>";
                    erro.innerHTML = html;
                    return;
                }
            } 
        });
    });
});
