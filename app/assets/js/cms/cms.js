$(function () {

    $("#menu-toggle").click(function () {
        $("#wrapper").toggleClass("toggled");
    });

    if ($(window).width() <= 768) {
        $("#wrapper").removeClass("toggled");
    }

    $(window).resize(function () {
        if ($(window).width() <= 768) {
            $("#wrapper").removeClass("toggled");
        }
    });

    $("#logout").on('click', function () {
        $.ajax({
            data: {
                action: 'logout'
            },
            dataType: 'json',
            type: 'post',
            url: '../app/actions/cms/action.php',
            success: function () {
                window.location = "login"
            }
        });
        return false;
    })

});