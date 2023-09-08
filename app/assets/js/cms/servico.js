$(function () {

    $("#form-servico").submit(function () {

        var form = $("#form-servico")[0];
        var formData = new FormData(form);

        formData.append('action', "insert-service");
        formData.append('titulo', $("#titulo").val());
        formData.append('valor', $("#valor").val());
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
                        text: "Serviço inserido com sucesso!",
                        type: 'success',
                        showConfirmButton: false
                    });
                    setTimeout(function () {
                        window.location = "servicos";
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

    $("#u-form-service").submit(function () {

        var form = $("#u-form-service")[0];
        var formData = new FormData(form);

        formData.append('action', "update-service");
        formData.append('id', $("#id").val());
        formData.append('titulo', $("#titulo").val());
        formData.append('valor', $("#valor").val());
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
                        text: "Serviço alterado com sucesso!",
                        type: 'success',
                        showConfirmButton: false
                    });
                    setTimeout(function () {
                        window.location = "servicos";
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
                    action: 'delete-service',
                    id: $("#id").val()
                },
                dataType: 'json',
                type: 'post',
                success: function (response) {
                    if (response.error === false) {
                        swal({
                            title: 'Sucesso',
                            text: "Serviço excluído com sucesso!",
                            type: 'warning',
                            showConfirmButton: false
                        });
                        setTimeout(function () {
                            window.location = "servicos";
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