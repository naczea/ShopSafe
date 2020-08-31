$(document).ready(function() {
    $('#checkform').submit(function(e) {
        const regdata = {
            id_edit: $('#cededit').val(),
            mail_edit: $('#emailedit').val(),
            phone_edit: $('#numberedit').val()
        }; 
        $.post('editdata.php', regdata, function (data) {
    
            if( data == 500){
                $('#editdatap').trigger('reset');
                $('#lol').html("Fallo en modificación");
            }else{
                $('#lol').hide();
                $('#checkform').trigger('reset');
                $('#checkform').css('display','none');
                $('#ch__confirm2').css('display','flex');
                $('#ch_confirm2').html(data);
            }
        });
        e.preventDefault();
    });

});
