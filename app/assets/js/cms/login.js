$("#form-login-cms").submit(function () {

    var btn_login = $("#form-login-cms button[type=submit]");

    $.ajax({
        data: {
            action: 'login',
            email: $("#email").val(),
            senha: $("#senha").val()
        },
        dataType: "json",
        url: "../app/actions/cms/action.php",
        type: "post",
        beforeSend: function () {
            btn_login.html("Verificando");
            btn_login.addClass('disabled');
        },
        success: function (response) {
            if (response.error === false) {
                btn_login.html("Redirecionando");
                window.location = "painel";
            } else {
                btn_login.removeClass('disabled');
                btn_login.html("Entrar");
                alert(response.msg);
            }
        }
    });

    return false;

});