$(document).ready(function() {
    $('#checkform').submit(function(e) {
        const regdata = {
            id_user: $('#cich').val(),
            name_user: $('#namech').val(),
            last_user: $('#secondch').val(),
            mail_user: $('#emailch').val(),
            phone_user: $('#numberch').val(),
            pass_user: $('#passch').val()
        }; 
        $.post('backend/reg.php', regdata, function (response) {
            $('#checkform').trigger('reset');
            $('#checkform').css('display','none');
            $('#ch__confirm').css('display','flex');
        });
        e.preventDefault();
    });

    $('#loginform').submit(function(e) {
        const lgdata = {
            id_user: $('#cilg').val(),
            pass_user: $('#passlg').val()
        }; 

        $.get('backend/login.php', lgdata, function (response) {
            $('#loginform').trigger('reset');
            alert(response);
        });
        e.preventDefault();
    });
});