$(function () {

    $("#form-cliente").submit(function () {

        var form = $("#form-cliente")[0];
        var formData = new FormData(form);

        formData.append('action', "insert-client");
        formData.append('titulo', $("#titulo").val());
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
                        text: "Cliente inserido com sucesso!",
                        type: 'success',
                        showConfirmButton: false
                    });
                    setTimeout(function () {
                        window.location = "clientes";
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

    $("#u-form-cliente").submit(function () {

        var form = $("#u-form-cliente")[0];
        var formData = new FormData(form);

        formData.append('action', "update-client");
        formData.append('id', $("#id").val());
        formData.append('titulo', $("#titulo").val());
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
                        text: "Cliente alterado com sucesso!",
                        type: 'success',
                        showConfirmButton: false
                    });
                    setTimeout(function () {
                        window.location = "clientes";
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
                    action: 'delete-client',
                    id: $("#id").val()
                },
                dataType: 'json',
                type: 'post',
                success: function (response) {
                    if (response.error === false) {
                        swal({
                            title: 'Sucesso',
                            text: "Cliente excluído com sucesso!",
                            type: 'warning',
                            showConfirmButton: false
                        });
                        setTimeout(function () {
                            window.location = "clientes";
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