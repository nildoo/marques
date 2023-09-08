$(function () {

    $("#form-banner").submit(function () {

        var form = $("#form-banner")[0];
        var formData = new FormData(form);

        formData.append('action', "insert-banner");
        formData.append('titulo', $("#titulo").val());
        formData.append('publicado', $("#publicado").prop('checked'));
        formData.append('conteudo', $("#conteudo").val());
        formData.append('link', $("#link").val());
        formData.append('target', $("#target").val());
        formData.append('button', $("#button").val());

        $.ajax({
            url: '../app/actions/cms/action.php',
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            type: 'post',
            success: function (response) {
                if (response.error === false) {
                    alert("Conteúdo inserido com Sucesso!");
                    window.location = "banner";
                } else {
                    alert(response.msg);
                }
            }
        });

        return false;

    });

    $("#u-form-banner").submit(function () {

        var form = $("#form-banner")[0];
        var formData = new FormData(form);

        formData.append('action', "update-banner");
        formData.append('id', $("#id").val());
        formData.append('titulo', $("#titulo").val());
        formData.append('publicado', $("#publicado").prop('checked'));
        formData.append('conteudo', $("#conteudo").val());
        formData.append('link', $("#link").val());
        formData.append('target', $("#target").val());
        formData.append('button', $("#button").val());

        $.ajax({
            url: '../app/actions/cms/action.php',
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            type: 'post',
            success: function (response) {
                if (response.error === false) {
                    alert("Conteúdo alterado com Sucesso!");
                    window.location = "banner";
                } else {
                    alert(response.msg);
                }
            }
        });

        return false;

    });

    $("#remover").on('click', function () {

        if (confirm('Deseja realmente excluir?')) {

            $.ajax({
                data: {
                    action: 'delete-banner',
                    id: $("#id").val(),
                },
                dataType: 'json',
                type: 'post',
                url: '../app/actions/cms/action.php',
                success: function (response) {
                    if (response.error === false) {
                        alert("Conteúdo removido com Sucesso!");
                        window.location = "banner";
                    } else {
                        alert(response.msg);
                    }
                }
            });
        }
        return false;

    });

});