$(function () {

    $(window).scroll(function () {
        if ($(this).scrollTop() > 200) {
            $('.scrollup_fade').fadeIn();
        } else {
            $('.scrollup_fade').fadeOut();
        }
    });
    $('.scrollup_fade').click(function () {
        $('html, body').animate({ scrollTop: 0 }, 1800);
        return false;
    });

    // $(window).scroll(function () {
    //     if ($(this).scrollTop() > 2) {
    //         $(".navbar-default").addClass('shadow');
    //     } else {
    //         $(".navbar-default").removeClass('shadow');
    //     }
    // });

    $("#form-contact").submit(function () {
        $.ajax({
            data: {
                action: 'contato',
                nome: $("#nome").val(),
                empresa: $("#empresa").val(),
                email: $("#email").val(),
                telefone: $("#telefone").val(),
                projeto: $("#projeto").val()
            },
            dataType: 'json',
            type: 'post',
            url: 'app/actions/action.php',
            success: function (response) {
                if(response.error === false) {
                    alert("Mensagem enviada com sucesso!");
                    $("#form-contact")[0].reset();
                } else {
                    alert(response.msg);
                }
            }
        });

        return false;

    });

    var enviar = $("button[type=submit]");
    
    $("#form-rh").on('submit', function () {

        enviar = $(this).find('button[type=submit]');

        var form = $("#form-rh")[0];
        var formData = new FormData(form);

        formData.append('action', "envio-rh");
        formData.append('nome', $("#nome").val());
        formData.append('email', $("#email").val());
        formData.append('telefone', $("#telefone").val());
        formData.append('mensagem', $("#mensagem").val());

        $.ajax({
            url: 'app/actions/action.php',
            data: formData,
            processData: false,
            contentType: false,
            type: 'post',
            beforeSend: function () {
                enviar.html("Enviando <i class='fa fa-refresh fa-spin'></i>");
                enviar.attr('disabled', 'disabled');
            },
            success: function (response) {
                enviar.removeAttr('disabled');
                enviar.html("<i class='fa fa-check'></i> Enviado");
                enviar.attr('disabled', 'disabled');

                if (response.erro === false) {
                    alert("Erro ao enviar Curriculum, tente novamente mais tarde!");
                } else {
                    alert("Curriculum enviado com sucesso!");
                    form.reset();
                }
            }
        });
        return false;
    });   

});