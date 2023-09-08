$(function () {

    $("#form-proposta").submit(function () {

        $.ajax({
            data: {
                action: 'proposta',
                nome: $("#nome").val(),
                email: $("#email").val(),
                telefone: $("#telefone").val(),
                mensagem: $("#mensagem").val(),
                id_veiculo: $("#id_veiculo").val()
            },
            dataType: 'json',
            type: 'post',
            url: 'app/actions/action.php',
            success: function (response) {
                if(response.error === false) {
                    alert("Proposta enviada com sucesso!");
                    $("#form-proposta")[0].reset();
                } else {
                    alert(response.msg);
                }
            }
        });

        return false;

    });

});