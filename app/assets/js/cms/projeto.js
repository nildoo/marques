$(function () {

    $("#form-projeto").submit(function () {

        var form = $("#form-projeto")[0];
        var formData = new FormData(form);

        formData.append('action', "insert-projeto");
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
                        text: "Projeto inserido com sucesso!",
                        type: 'success',
                        showConfirmButton: false
                    });
                    setTimeout(function () {
                        window.location = "projetos";
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

    $("#u-form-projeto").submit(function () {

        var form = $("#u-form-projeto")[0];
        var formData = new FormData(form);

        formData.append('action', "update-projeto");
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
                        text: "Projeto alterado com sucesso!",
                        type: 'success',
                        showConfirmButton: false
                    });
                    setTimeout(function () {
                        window.location = "projetos";
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
                    action: 'delete-projeto',
                    id: $("#id").val()
                },
                dataType: 'json',
                type: 'post',
                success: function (response) {
                    if (response.error === false) {
                        swal({
                            title: 'Sucesso',
                            text: "Projeto excluído com sucesso!",
                            type: 'warning',
                            showConfirmButton: false
                        });
                        setTimeout(function () {
                            window.location = "projetos";
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