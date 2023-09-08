$(function () {

    $("#form-indice").submit(function () {

        var form = $("#form-indice")[0];
        var formData = new FormData(form);

        formData.append('action', "insert-indice");
        formData.append('nome', $("#nome").val());
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
                        text: "Indice inserido com sucesso!",
                        type: 'success',
                        showConfirmButton: false
                    });
                    setTimeout(function () {
                        window.location = "indice";
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

    $("#u-form-indice").submit(function () {

        var form = $("#u-form-indice")[0];
        var formData = new FormData(form);

        formData.append('action', "update-indice");
        formData.append('id', $("#id").val());
        formData.append('nome', $("#nome").val());
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
                        text: "Indice alterado com sucesso!",
                        type: 'success',
                        showConfirmButton: false
                    });
                    setTimeout(function () {
                        window.location = "indice";
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
                    action: 'delete-indice',
                    id: $("#id").val()
                },
                dataType: 'json',
                type: 'post',
                url: '../app/actions/cms/action.php',
                success: function (response) {
                    if (response.error === false) {
                        swal({
                            title: 'Sucesso',
                            text: "Indice excluído com sucesso!",
                            type: 'success',
                            showConfirmButton: false
                        });
                        setTimeout(function () {
                            window.location = "indice";
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