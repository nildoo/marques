$(function () {

    $("#form-institucional").submit(function () {

        var form = $("#form-institucional")[0];
        var formData = new FormData(form);

        formData.append('action', "update-about");
        formData.append('empresa', $("#cke_empresa").find('iframe').contents().find('body').html());
        formData.append('missao', $("#cke_missao").find('iframe').contents().find('body').html());
        formData.append('visao', $("#cke_visao").find('iframe').contents().find('body').html());
        formData.append('valores', $("#cke_valores").find('iframe').contents().find('body').html());
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
                        text: "Quem Somos atualizado com sucesso!",
                        type: 'success',
                        showConfirmButton: false
                    });
                    setTimeout(function () {
                        window.location = "quem-somos";
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

        return false;
    });

});