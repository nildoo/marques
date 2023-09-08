$(function () {

    $("#u-form-config").submit(function () {

        $.ajax({
            url: '../app/actions/cms/action.php',
            data: {
                action: 'alterar-config',
                titulo: $("#titlesite").val(),
                endereco: $("#address").val(),
                bairro: $("#district").val(),
                cidade: $("#city").val(),
                uf: $("#state").val(),
                cep: $("#zipcode").val(),
                obs: $("#obs").val(),
                caixaPostal: $("#pobox").val(),
                site: $("#site").val(),
                email: $("#email").val(),
                telefone: $("#phone").val(),
                telefone2: $("#phonetwo").val(),
                whatsapp: $("#whatsapp").val(),
                inf: $("#maps").val(),
                well: $('#cke_well').find('iframe').contents().find('body').html(),
                service: $('#cke_service').find('iframe').contents().find('body').html(),
                contact: $('#cke_contact').find('iframe').contents().find('body').html(),
                key_word: $("#metakeyword").val(),
                description: $("#metadescription").val(),
                facebook: $("#facebook").val(),
                instagram: $("#instagram").val(),
                adwords: $("#adwords").val(),
                analytics: $("#analytics").val(),
                pixel: $("#pixel").val(),
               },
            dataType: 'json',
            type: 'post',
            success: function (response) {
                if (response.error === false) {
                    alert("Dados alterados com sucesso!");
                    location.reload();
                } else {
                    alert(response.msg);
                }
            }
        });

        return false;
    });

});