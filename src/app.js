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
                $('#lol').html("Cédula Inválida");
            }else if (data == 407){
				$('#checkform').trigger('reset');
                $('#lol').html("Nombre Inválido");
			}else if (data == 408){
				$('#checkform').trigger('reset');
                $('#lol').html("Apellido Inválido");
			}else if (data == 409){
				$('#checkform').trigger('reset');
                $('#lol').html("Celular Inválido");
			}else if (data == 410){
				$('#checkform').trigger('reset');
                $('#lol').html("Password Inválido");
			}else if (data == 411){
				$('#checkform').trigger('reset');
                $('#lol').html("Email Inválido");
			}else if(data == 412){
                $('#checkform').trigger('reset');
                $('#lol').html("Cedula ya registrada");
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



    $('#editdatap').submit(function(e) {
        const regdata = {
            id_edit: $('#idpost').val(),
            mail_edit: $('#emailedit').val(),
            phone_edit: $('#numberedit').val()
        }; 
        
        $.post('backend/editdata.php', regdata, function (data) {
            if( data == 500){
                $('#editdatap').trigger('reset');
                $('#lol').html("Fallo en modificación");
            }else{
                $('#lol').hide();
                $('#editdatap').trigger('reset');
                $('#editdatap').css('display','none');
                $('#ch__confirm2').css('display','flex');
                $('#ch_confirm2').html(data);
            }
        });
        e.preventDefault();
    });
});