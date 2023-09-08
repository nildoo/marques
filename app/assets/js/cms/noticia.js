$(function () {

    $("#form-noticia").submit(function () {

        var form = $("#form-noticia")[0];
        var formData = new FormData(form);

        formData.append('action', "insert-blog");
        formData.append('titulo', $("#titulo").val());
        formData.append('conteudo', $(".quill-editor-full").find('div').html());
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
                    alert("Conteúdo inserido com Sucesso!");
                    window.location = "noticias";
                } else {
                    alert(response.msg);
                }
            }
        });
        return false;
    });

    $("#u-form-noticia").submit(function () {

        var form = $("#u-form-noticia")[0];
        var formData = new FormData(form);

        formData.append('action', "update-blog");
        formData.append('id', $("#id").val());
        formData.append('titulo', $("#titulo").val());
        formData.append('conteudo', $("#conteudo").find('div').html());
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
                    alert("Conteúdo alterado com Sucesso!");
                    window.location = "noticias";
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
                url: '../app/actions/cms/action.php',
                data: {
                    action: 'delete-blog',
                    id: $("#id").val()
                },
                dataType: 'json',
                type: 'post',
                success: function (response) {
                    if (response.error === false) {
                        alert("Conteúdo excluído com Sucesso!");
                        window.location = "noticias";
                    } else {
                        alert(response.msg);
                    }
                }
            });
        }
        return false;
    });

});