$(function () {

    $("#u-form-perfil").submit(function () {

        var permissao = [];
        $("input[type=radio][name='permissao[]']:checked").each(function () {
           permissao.push($(this).val());
        });

        $.ajax({
            url: '../app/actions/cms/action.php',
            data: {
                action: 'alterar-perfil',
                id: $("#id").val(),
                nome: $("#nome").val(),
                email: $("#email").val(),
                senha: $("#senha").val(),
                permissao: permissao
            },
            dataType: 'json',
            type: 'post',
            success: function (response) {
                if (response.error === false) {
                    swal({
                        title: 'Sucesso',
                        text: "Usuário alterado com sucesso!",
                        type: 'success',
                        showConfirmButton: false
                    });
                    setTimeout(function () {
                        window.location = "painel";
                    }, 1000)
                } else {
                    swal({
                        title: "Erro!",
                        type: "danger",
                        text: response.msg
                    });
                }
            }
        });
        return false;
    });

});