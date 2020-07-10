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
        
        $.post('backend/reg.php', regdata, function (data) {
            if( data == 406){
                $('#checkform').trigger('reset');
                $('#lol').html("Cédula inválida");
            }else{
                $('#lol').hide();
                $('#checkform').trigger('reset');
                $('#checkform').css('display','none');
                $('#ch__confirm').css('display','flex');
                $('#ch_confirm').html(data);
            }
        });
        e.preventDefault();
    });
});