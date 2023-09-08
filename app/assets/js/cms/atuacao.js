$(function () {

    $("#form-atuacao").submit(function () {

        var form = $("#form-atuacao")[0];
        var formData = new FormData(form);

        formData.append('action', "insert-atuacao");
        formData.append('titulo', $("#titulo").val());
        formData.append('conteudo', $("#cke_conteudo").find('iframe').contents().find('body').html());
        formData.append('publicado', $("#publicado").prop('checked'));
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
                        text: "Atuação inserida com sucesso!",
                        type: 'success',
                        showConfirmButton: false
                    });
                    setTimeout(function () {
                        window.location = "atuacao";
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

    $("#u-form-atuacao").submit(function () {

        var form = $("#u-form-atuacao")[0];
        var formData = new FormData(form);

        formData.append('action', "update-atuacao");
        formData.append('id', $("#id").val());
        formData.append('titulo', $("#titulo").val());
        formData.append('conteudo', $("#cke_conteudo").find('iframe').contents().find('body').html());
        formData.append('publicado', $("#publicado").prop('checked'));
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
                        text: "Atuação alterada com sucesso!",
                        type: 'success',
                        showConfirmButton: false
                    });
                    setTimeout(function () {
                        window.location = "atuacao";
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
                    action: 'delete-atuacao',
                    id: $("#id").val()
                },
                dataType: 'json',
                type: 'post',
                success: function (response) {
                    if (response.error === false) {
                        swal({
                            title: 'Sucesso',
                            text: "Atuação excluída com sucesso!",
                            type: 'success',
                            showConfirmButton: false
                        });
                        setTimeout(function () {
                            window.location = "atuacao";
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