var ids = null;
var ids2 = null;
function searchstore(id){
    ids = id; 
    $.ajax({
        url: '../backend/getstore.php',
        type: 'POST',
        data: { id },
        success: function(response) {
            let data = JSON.parse(response);
            let template = '';
            let storetype = '';
            data.forEach(data => {
                if(data.type_store == 1){
                    storetype = 'MERCADO';
                }
                if(data.type_store == 2){
                    storetype = 'PELUQERIA';
                }
                if(data.type_store == 3){
                    storetype = 'RESTAURANTE';
                }
                template += `
                <p><span>Servicio:</span> ${storetype}</p>
                <img src="data:image/jpg;base64,${data.logo_store}" alt="">
                <p><span>Establecimiento:</span> ${data.name_store}</p>
                <p><span>Ubicación:</span> ${data.adress_store}</p>
                <p><span>Horarios:</span> 10:00 a 18:00</p>`
            });
            $('#continfo').html(template);
        }
    })
}

function searchstore2(id){
    console.log(id);
    $.ajax({
        url: '../backend/getstore.php',
        type: 'POST',
        data: { id },
        success: function(response) {
            console.log(response);
            let data = JSON.parse(response);
            let template = '';
            data.forEach(data => {
                template += `
                <img src="data:image/jpg;base64,${data.logo_store}" alt="">`
            });
            $('#datastore').html(template);
        }
    })
}
