$(function () {

    $("#form-compliance").submit(function () {

        var form = $("#form-compliance")[0];
        var formData = new FormData(form);

        formData.append('action', "update-compliance");
        formData.append('conteudo', $("#cke_conteudo").find('iframe').contents().find('body').html());
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
                        text: "Compliance atualizado com sucesso!",
                        type: 'success',
                        showConfirmButton: false
                    });
                    setTimeout(function () {
                        window.location = "compliance";
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

    $("#add-img").on('click', function () {

        var form = $("#form-img")[0];
        var formData = new FormData(form);

        formData.append('action', "insert-img");
        formData.append('id', $("#id").val());

        $.ajax({
            url: '../app/actions/cms/action.php',
            data: formData,
            processData: false,
            contentType: false,
            type: 'post',
            beforeSend: function () {
                $("#add-img").html("<i class='fa fa-spin fa-spinner'></i>");
            },
            success: function () {
                $("#add-img").html("<i class='fa fa-plus'></i>");
                location.reload();
            }
        });

        return false;

    });

    $(".remover").on('click', function () {
        $.ajax({
            data: {
                action: 'remover-img',
                id: $(this).attr("data-id")
            },
            dataType: 'json',
            type: 'post',
            url: '../app/actions/cms/action.php',
            success: function (response) {
                if (response.error === false) {
                    location.reload();
                } else {
                    alert(response.msg);
                }
            }
        });

        return false;

    });

});