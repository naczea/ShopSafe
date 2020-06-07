$(document).ready(function() {
    $('#btnSend').click(function() {
        var error = '';

        // NOMBRE
        if ($('#name').val() == '') {
            error += '<div class="cont_modal">' +
                '<i class="fas fa-times"></i>' +
                '<p>Escriba su nombre</p>' +
                '</div>';
            $('#name').css("background-color", "#b79abc");
        } else {
            $('#name').css("background-color", "#5d9e8c");
        }

        //ASUNTO
        if ($('#affair').val() == '') {
            error += '<div class="cont_modal">' +
                '<i class="fas fa-times"></i>' +
                '<p>Escriba un asunto</p>' +
                '</div>';
            $('#affair').css("background-color", "#b79abc");
        } else {
            $('#affair').css("background-color", "#5d9e8c");
        }

        //MAIL
        if ($('#email').val() == '') {
            error += '<div class="cont_modal">' +
                '<i class="fas fa-times"></i>' +
                '<p>Escriba un correo</p>' +
                '</div>';
            $('#email').css("background-color", "#b79abc");
        } else {
            $('#email').css("background-color", "#5d9e8c");
        }

        //MENSAJE
        if ($('#mesaje').val() == '') {
            error += '<div class="cont_modal">' +
                '<i class="fas fa-times"></i>' +
                '<p>Escriba un mensaje</p>' +
                '</div>';
            $('#mesaje').css("background-color", "#b79abc");
        } else {
            $('#mesaje').css("background-color", "#5d9e8c");
        }


        //SHOW MESAJE
        if (error == '' == false) {
            var menssageModal = '<div class="modal_wrap">' +
                '<div class="mesaje_modal">' +
                error +
                '<span id="btnClose">Cerrar</span>' +
                '</div>' +
                '</div>'
            $('body').append(menssageModal);
        }
        $('#btnClose').click(function() {
            $('.modal_wrap').remove();

        });
    });
});