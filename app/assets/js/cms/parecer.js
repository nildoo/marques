$(function () {

    $("#form-parecer").submit(function () {

        var tag = [];
        $("input[type=checkbox][name='tag[]']:checked").each(function () {
            tag.push($(this).val());
        });

        $.ajax({
            url: '../app/actions/cms/action.php',
            data: {
                action: "cadastrar-parecer",
                titulo: $("#titulo").val(),
                conteudo: $("#cke_conteudo").find('iframe').contents().find('body').html(),
                tag: tag
            },
            dataType: 'json',
            type: 'post',
            success: function (response) {
                if (response.error === false) {
                    swal({
                        title: 'Sucesso',
                        text: "Parecer Cadastrado com sucesso!",
                        type: 'success',
                        showConfirmButton: false
                    });
                    setTimeout(function () {
                        window.location = "pareceres";
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

    $("#u-form-parecer").submit(function () {

        var tag = [];
        $("input[type=checkbox][name='tag[]']:checked").each(function () {
            tag.push($(this).val());
        });

        $.ajax({
            url: '../app/actions/cms/action.php',
            data: {
                action: "alterar-parecer",
                id: $("#id").val(),
                titulo: $("#titulo").val(),
                conteudo: $("#cke_conteudo").find('iframe').contents().find('body').html(),
                tag: tag
            },
            dataType: 'json',
            type: 'post',
            success: function (response) {
                if (response.error === false) {
                    swal({
                        title: 'Sucesso',
                        text: "Parecer Alterado com sucesso!",
                        type: 'success',
                        showConfirmButton: false
                    });
                    setTimeout(function () {
                        window.location = "pareceres";
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
                    action: 'remover-parecer',
                    id: $("#id").val()
                },
                dataType: 'json',
                type: 'post',
                url: '../app/actions/cms/action.php',
                success: function (response) {
                    if (response.error === false) {
                        swal({
                            title: 'Excluir',
                            text: "Parecer Excluído com sucesso!",
                            type: 'warning',
                            showConfirmButton: false
                        });
                        setTimeout(function () {
                            window.location = "pareceres";
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