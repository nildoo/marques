$(function () {

    $("#form-equipe").submit(function () {

        var form = $("#form-equipe")[0];
        var formData = new FormData(form);

        formData.append('action', "cadastrar-equipe");
        formData.append('nome', $("#nome").val());
        formData.append('tipo', $("#tipo").val());
        formData.append('oab', $("#oab").val());
        formData.append('link', $("#link").val());
        formData.append('experiencia', $("#cke_experiencia").find('iframe').contents().find('body').html());
        $.ajax({
            url: '../app/actions/cms/action.php',
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            type: 'post',
            success: function (response) {
                if (response.error === false) {
                    swal({
                        title: 'Sucesso',
                        text: "Colaborador Inserido com sucesso!",
                        type: 'success',
                        showConfirmButton: false
                    });
                    setTimeout(function () {
                        window.location = "equipe";
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

    $("#u-form-equipe").submit(function () {

        var form = $("#u-form-equipe")[0];
        var formData = new FormData(form);

        formData.append('action', "alterar-equipe");
        formData.append('id', $("#id").val());
        formData.append('nome', $("#nome").val());
        formData.append('tipo', $("#tipo").val());
        formData.append('oab', $("#oab").val());
        formData.append('link', $("#link").val());
        formData.append('experiencia', $("#cke_experiencia").find('iframe').contents().find('body').html());
        $.ajax({
            url: '../app/actions/cms/action.php',
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            type: 'post',
            success: function (response) {
                if (response.error === false) {
                    swal({
                        title: 'Sucesso',
                        text: "Colaborador Alterado com sucesso!",
                        type: 'success',
                        showConfirmButton: false
                    });
                    setTimeout(function () {
                        window.location = "equipe";
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
                url: '../app/actions/cms/action.php',
                data: {
                    action: 'remover-equipe',
                    id: $("#id").val()
                },
                dataType: 'json',
                type: 'post',
                success: function (response) {
                    if (response.error === false) {
                        swal({
                            title: 'Sucesso',
                            text: "Colaborador excluído com sucesso!",
                            type: 'warning',
                            showConfirmButton: false
                        });
                        setTimeout(function () {
                            window.location = "equipe";
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