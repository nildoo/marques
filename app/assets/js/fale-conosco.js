$(function () {

    $("#form-contact").submit(function () {
        $.ajax({
            data: {
                action: 'contato',
                nome: $("#nome").val(),
                empresa: $("#empresa").val(),
                telefone: $("#telefone").val(),
                email: $("#email").val(),
                mensagem: $("#mensagem").val()
            },
            dataType: 'json',
            type: 'post',
            url: 'app/actions/action.php',
            success: function (response) {
                if(response.error === false) {
                    alert("Mensagem enviada com sucesso!");
                    $("#form-contact")[0].reset();
                } else {
                    alert(response.msg);
                }
            }
        });

        return false;

    });

});