$(function () {

    $("#form-perfil").submit(function () {

        var permissao = [];
        $("input[type=radio][name='permissao[]']:checked").each(function () {
            permissao.push($(this).val());
        });

        $.ajax({
            url: '../app/actions/cms/action.php',
            data: {
                action: "insert-perfil",
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
                        text: "Usuário Cadastrado com sucesso!",
                        type: 'success',
                        showConfirmButton: false
                    });
                    setTimeout(function () {
                        window.location = "usuarios";
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

    $("#u-form-perfil").submit(function () {

        var permissao = [];
        $("input[type=radio][name='permissao[]']:checked").each(function () {
            permissao.push($(this).val());
        });

        $.ajax({
            url: '../app/actions/cms/action.php',
            data: {
                action: 'update-perfil',
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
                        window.location = "usuarios";
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

    $("#remover").on('click', function () {

        if (confirm('Deseja realmente excluir?')) {

            $.ajax({
                data: {
                    action: 'delete-perfil',
                    id: $("#id").val()
                },
                dataType: 'json',
                type: 'post',
                url: '../app/actions/cms/action.php',
                success: function (response) {
                    if (response.error === false) {
                        swal({
                            title: 'Excluir',
                            text: "Usuário Excluído com sucesso!",
                            type: 'warning',
                            showConfirmButton: false
                        });
                        setTimeout(function () {
                            window.location = "usuarios";
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
        }
        return false;
    });

});