//﻿var txtUsuario,
//    txtClave,
//    btnAceptar;

function Iniciar() {
    txtUsuario = document.getElementById('txtUsuario');
    txtClave = document.getElementById('txtClave');
    
//    EffectoBoton();
    
//    EfectoImgs();
    
    btnAceptar = document.getElementById('btnAceptar');
    btnAceptar.onclick = function () {
//        LoginAceptar();
    };
    txtUsuario.onkeydown = function (event) {
        if (event.which == 13 || event.keyCode == 13) {
            if (txtUsuario.value == "") {
                Msg.alert('Ingrese su nombre de usuario').run();
                event.preventDefault();
            } else {
                txtClave.focus();
            }
        }
    };
    txtClave.onkeydown = function (event) {
        if (event.which == 13 || event.keyCode == 13) {
            if (txtClave.value == "") {
                Msg.alert('Ingrese su contraseña').run();
                event.preventDefault();
            } else {
                alert("")
            }
        }
    }
};

//function LoginAceptar() {
//    if (LoginValida()) {
//        btnAceptar.disabled = true;
//        txtUsuario.disabled = true;
//        txtClave.disabled = true;
//        Precarga.open();
//        postText("Seguridad/Validar", LoginAcceso, txtUsuario.value + "|" + txtClave.value);
//    }
//}
//
//function LoginValida() {
//    if (txtUsuario.value == "") {
//        Msg.alert('Ingrese su nombre de usuario').run();
//        return false;
//    }
//    if (txtClave.value == "") {
//        Msg.alert('Ingrese su contraseña').run();
//        return false;
//    }
//    return true;
//}
//
//
//function LoginAcceso(data) {
//    btnAceptar.disabled = false;
//    txtUsuario.disabled = false;
//    txtClave.disabled = false;
//    Precarga.close();  
//    var aRpta = data.split('|');//Respuesta Array
//    if (aRpta[0] == '-1') {
//        Msg.error('Error al Conectarse a la Base de Datos').run().then(function () {
//            txtUsuario.focus();
//            if (txtUsuario.select)
//                txtUsuario.select();
//        });
//    }
//    else if (aRpta[0] == '-2') {
//        Msg.error('Usuario y/o Contraseña Incorrecto').run().then(function () {
//            txtUsuario.focus();
//            if (txtUsuario.select)
//                txtUsuario.select();
//        });
//    } else {
//        //var raiz = document.getElementById("hdfRaiz").value;
//        document.location.href = raiz + '';
//    }
//};


window.onload = function () {
    /*var raiz = document.getElementById("hdfRaiz").value;
     var url = raiz;
     //window.sessionStorage.setItem("url", url); */

    EfectoImgs();
}


function EfectoImgs() {
    var imgBg1 = document.createElement('div'),
            imgBg2 = document.createElement('div'),
            imgBg3 = document.createElement('div');
    var t = 3, i = 2, c = 1;
    var body = document.getElementsByTagName('body')[0];

    imgBg1.className = 'container-login-g container-login-g1';
    imgBg2.className = 'container-login-g container-login-g2';
    imgBg3.className = 'container-login-g container-login-g3';

    body.appendChild(imgBg1);
    body.appendChild(imgBg2);
    body.appendChild(imgBg3);


    $('.container-login-g1').fadeIn(-2, function () {
        $('.container-login').fadeIn();
    });

    setInterval(function () {
        $('.container-login-g' + c).fadeOut(2000);
        $('.container-login-g' + i).fadeIn(2000);
        c = i;
        i = (i >= 3) ? 1 : (++i);
    }, 6000);
}
