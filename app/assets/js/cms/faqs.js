$(function () {

    $("#form-faqs").submit(function () {

        $.ajax({
            url: '../app/actions/cms/action.php',
            dataType: 'json',
            data: {
                action: 'insert-faqs',
                indice: $("#indice").val(),
                ask: $("#ask").val(),
                answer: $("#cke_answer").find('iframe').contents().find('body').html()
            },
            type: 'post',
            success: function (response) {
                if (response.error === false) {
                    swal({
                        title: 'Sucesso',
                        text: "Pergunta inserida com sucesso!",
                        type: 'success',
                        showConfirmButton: false
                    });
                    setTimeout(function () {
                        window.location = "faqs";
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

    $("#u-form-faqs").submit(function () {

        $.ajax({

            data: {
                action: 'update-faqs',
                id: $("#id").val(),
                indice: $("#indice").val(),
                ask: $("#ask").val(),
                answer: $("#cke_answer").find('iframe').contents().find('body').html()
            },
            dataType: 'json',
            type: 'post',
            url: '../app/actions/cms/action.php',
            success: function (response) {
                if (response.error === false) {
                    swal({
                        title: 'Sucesso',
                        text: "Pergunta alterada com sucesso!",
                        type: 'success',
                        showConfirmButton: false
                    });
                    setTimeout(function () {
                        window.location = "faqs";
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
                dataType: 'json',
                data: {
                    action: 'delete-faqs',
                    id: $("#id").val()
                },
                type: 'post',
                success: function (response) {
                    if (response.error === false) {
                        swal({
                            title: 'Sucesso',
                            text: "Pergunta excluída com sucesso!",
                            type: 'success',
                            showConfirmButton: false
                        });
                        setTimeout(function () {
                            window.location = "faqs";
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