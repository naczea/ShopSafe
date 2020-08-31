function ocultar(id) {
    document.getElementById(id).style.display = 'none';
}

function mostrar(id) {
    document.getElementById(id).style.display = 'flex';
}

function back_color(id) {
    document.getElementById(id).style.backgroundColor = 'rgba(255,255,255,0.4)';
}

function changelg(data){
    if(data){
        document.getElementById('userform').style.display = 'none';
        document.getElementById('nav__user__form').style.display = 'flex';
        document.getElementById('op__user__form').style.display = 'flex';
        document.getElementById('lg_user').style.backgroundColor = '#4B79A1';
        document.getElementById('lg_store').style.backgroundColor = '#dde1e7';
        document.getElementById('lg_user').style.width = '42%';
        document.getElementById('lg_store').style.width = '58%';
        document.getElementById('nav__store__form').style.display = 'none';
        document.getElementById('op__store__form').style.display = 'none';
        document.getElementById('storeform').style.display = 'flex';

    }else{
        document.getElementById('userform').style.display = 'flex';
        document.getElementById('nav__user__form').style.display = 'none';
        document.getElementById('op__user__form').style.display = 'none';
        document.getElementById('lg_user').style.backgroundColor = '#dde1e7';
        document.getElementById('lg_store').style.backgroundColor = '#4B79A1';
        document.getElementById('lg_user').style.width = '58%';
        document.getElementById('lg_store').style.width = '42%';
        document.getElementById('nav__store__form').style.display = 'flex';
        document.getElementById('op__store__form').style.display = 'flex';
        document.getElementById('storeform').style.display = 'none';
    }
}

function sumar(id){
    let number = $(id).val();
    number++;
    $(id).val(number);
}

function restar(id){
    let number = $(id).val();
    if(number!=0){
        number--;
        $(id).val(number);
    }
}

function showcart(id1,id2){
    document.getElementById(id1).style.display = 'none';
    setTimeout(function() {
        document.getElementById(id2).style.display = 'inline';
    }, 800);
}

function addcart(data){
    let number2 = parseInt(document.getElementById('contador').innerText);
    if(data){
        number2++;
        document.getElementById('contador').innerText = number2;
    }else{
        if(number2!=0){
            number2--;
            document.getElementById('contador').innerText = number2;
        }
    }
}

function showprod(id1,id2,id3,id4,id5,id6,id7,id8,id9,id10){
    document.getElementById(id1).style.display = 'flex';
    document.getElementById(id2).style.display = 'none';
    document.getElementById(id3).style.display = 'none';
    document.getElementById(id4).style.display = 'none';
    document.getElementById(id5).style.display = 'none';
    document.getElementById(id6).style.backgroundColor = '#FF7192';
    document.getElementById(id7).style.backgroundColor = 'inherit';
    document.getElementById(id8).style.backgroundColor = 'inherit';
    document.getElementById(id9).style.backgroundColor = 'inherit';
    document.getElementById(id10).style.backgroundColor = 'inherit';
}

// CERRAR SESION

document.getElementById('checkout').addEventListener('click', function(){
    window.location.href = '../index.html';
});

// EDITAR DATOS PERSONALES

document.getElementById('p123').addEventListener('click', function(){
    mostrar('peredit');
    ocultar('checkout');
});

document.getElementById('p456').addEventListener('click', function(){
    mostrar('activityt');
    ocultar('checkout');
});

document.getElementById('p789').addEventListener('click', function(){
    mostrar('sugui');
    ocultar('checkout');
});

document.getElementById('p101').addEventListener('click', function(){
    mostrar('formui');
    ocultar('checkout');
});


document.getElementById('btndropmain').addEventListener('click', function(){
    mostrar('drop');
});

document.getElementById('droprt').addEventListener('click', function(){
    ocultar('drop');
});


// ELIMINAR CUENTA

document.getElementById('dropconfirm').addEventListener('click', function(){
    window.location.href = '../index.html';
});


//OLVIDASTE LA CONTRA

function nueva2(){
    document.getElementById('passlg').value= "";
    document.getElementById('passlg').placeholder = "Respuesta de recuperación";
}