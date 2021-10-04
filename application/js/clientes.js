window.onload = function () {

    for (var i = 0, l = document.getElementsByTagName('input').length; i < l; i++) {
        if (document.getElementsByTagName('input').item(i).type === 'text') {
            document.getElementsByTagName('input').item(i).setAttribute('autocomplete', 'off');
        }
        ;
    }
    ;
};



window.addEventListener("load", function () {
    debugger;
    miformulario.num_documento.addEventListener("keypress", soloNumeros, false);
});

//Solo permite introducir numeros.
function soloNumeros(e) {
    debugger;
    var key = window.event ? e.which : e.keyCode;
    if (key < 48 || key > 57) {
        e.preventDefault();
    }
}


$("#id_tdocumento").on("change", function () {
    debugger;

    var valor = $("#id_tdocumento").val();

    if (valor == '1') {
        alert("DNI");
        $("#num_documento").attr('maxlength','8');
    } else if (valor == '2') {
        alert("CARNET EXT.");
        $("#num_documento").attr('maxlength','12');
    } else if (valor == '6') {
        alert('RUC');
        $("#num_documento").attr('maxlength','11');
    }

});


//declaracion de variables globales 
var resultado_campo = false;
debugger;

//MODAL DE CLIENTES
$(".btn-view-clientes").on("click", function () {
    var personal = $(this).val();
    var infopersonal = personal.split("*");
    html = "<p><strong>CODIGO: </strong>" + infopersonal[0] + "</p>",
            html += "<p><strong>NOMBRES COMPLETOS: </strong>" + infopersonal[1] + "</p>",
            html += "<p><strong>TIPO DE DOC.: </strong>" + infopersonal[2] + "</p>",
            html += "<p><strong>NUMERO DOC.: </strong>" + infopersonal[3] + "</p>",
            html += "<p><strong>TELEFONO: </strong>" + infopersonal[4] + "</p>",
            html += "<p><strong>CORREO: </strong>" + infopersonal[5] + "</p>";
    $("#modal-default .modal-body").html(html);
});
//DATA TABLE
$('#example1').DataTable({
    "language": {
        "lengthMenu": "Mostrar _MENU_ registros por pagina",
        "zeroRecords": "No se encontraron resultados en su busqueda",
        "searchPlaceholder": "Buscar registros",
        "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
        "infoEmpty": "No existen registros",
        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
        "search": "Buscar:",
        "paginate": {
            "first": "Primero",
            "last": "Último",
            "next": "Siguiente",
            "previous": "Anterior"
        }
    }
});

function validar_campos() {
    var nombre = $("#nombre").val();
    var apepaterno = $("#apepaterno").val();
    var apematerno = $("#apematerno").val();
    var num_documento = $("#num_documento").val();

    if (nombre == '') {

        $("#nombre").attr({
            placeholder: " INGRESE NOMBRE",
        });
        $("#nombre").focus();
        resultado_campo = false;

    } else if (apepaterno == '') {

        $("#apepaterno").attr({
            placeholder: "INGRESE APE. PATERNO",
        });
        $("#apepaterno").focus();
        resultado_campo = false;

    } else if (apematerno == '') {

        $("#apematerno").attr({
            placeholder: "INGRESE APE. MATERNO",
        });
        $("#apematerno").focus();
        resultado_campo = false;
    } else if (num_documento == '') {

        $("#num_documento").attr({
            placeholder: "INGRESE DNI",
        });
        $("#num_documento").focus();
        resultado_campo = false;
    } else {
        resultado_campo = true;
    }
}
$(".btn_registrar").on("click", function () {
    var nombre = $("#nombre").val();
    var apepaterno = $("#apepaterno").val();
    var apematerno = $("#apematerno").val();
    var telefono = $("#telefono").val();
    var email = $("#email").val();
    var direccion = $("#direccion").val();
    var id_tdocumento = $("#id_tdocumento").val();
    var num_documento = $("#num_documento").val();
//    var id_cargo = $("#id_cargo").val();

    debugger;
    validar_campos();

    var resultado = "";

    if (resultado_campo == true) {
        $.ajax({
            async: false,
            url: base_url + "Movimientos/Controller_clientes/verificar_personal",
            type: "POST",
            dataType: 'json',
            data: {
                num_documento: num_documento
            },
            success: function (data) {
                debugger;
                if (data == null) { //ESA VALIDACION NULL REPRESENTA QUE ESE REGISTRO NO SE ENCUENTRA EN LA BD, X LO TANTO EJECUTA UN METODO INSERTAR
                    resultado = data;
                    alert('PUEDE INGRESAR EL REGISTRO');
                    debugger;
                    $.ajax({
                        async: false,
                        url: base_url + "Movimientos/Controller_clientes/insertar",
                        type: "POST",
                        dataType: 'json',
                        data: {
                            nombre: nombre,
                            apepaterno: apepaterno,
                            apematerno: apematerno,
                            telefono: telefono,
                            email: email,
                            direccion: direccion,
                            id_tdocumento: id_tdocumento,
                            num_documento: num_documento,
//                            id_cargo: id_cargo
                        },
                        success: function (data) {
                            debugger;
                            window.location.href = base_url + "Movimientos/Controller_clientes";
                            debugger;
                        }
                    });
                } else {
                    resultado = data;
                    //alert('YA SE ENCUENTRA REGISTRADO');
                    alertify.error('YA SE EXISTE ESE DNI');
                }

                //window.location.href = base_url+"Recursos_humanos/Controller_cargos/enlace_insertar";
                //echo json_encode($data);
            }

        });
        var myJSON = JSON.stringify(resultado);
        //alert(myJSON);
        debugger;
    }
});

$(".btn_actualizar").on("click", function () {
    var id_personal = $("#id_personal").val();
    var nombre = $("#nombre").val();
    var apepaterno = $("#apepaterno").val();
    var apematerno = $("#apematerno").val();
    var telefono = $("#telefono").val();
    var email = $("#email").val();
    var direccion = $("#direccion").val();
    var id_tdocumento = $("#id_tdocumento").val();
    var num_documento = $("#num_documento").val();
    var id_cargo = $("#id_cargo").val();

    debugger;
    validar_campos();

    var resultado = "";

    if (resultado_campo == true) {
        debugger;
        $.ajax({
            async: false,
            url: base_url + "Movimientos/Controller_clientes/verificar_dni_actualizar",
            type: "POST",
            dataType: 'json',
            data: {
                id_personal: id_personal,
                num_documento: num_documento
            },
            success: function (data) {
                debugger;
                if (data != null) {
                    resultado = data;
                    debugger;
                    alert('PUEDE ACTUALIZAR EL REGISTRO');
                    $.ajax({
                        async: false,
                        url: base_url + "Movimientos/Controller_clientes/actualizar",
                        type: "POST",
                        dataType: 'json',
                        data: {
                            id_personal: id_personal,
                            nombre: nombre,
                            apepaterno: apepaterno,
                            apematerno: apematerno,
                            telefono: telefono,
                            email: email,
                            direccion: direccion,
                            id_tdocumento: id_tdocumento,
                            num_documento: num_documento,
                            id_cargo: id_cargo
                        },
                        success: function (data) {
                            debugger;
                            window.location.href = base_url + "Movimientos/Controller_clientes";
                            debugger;
                        }
                    });
                } else {
                    debugger;
                    resultado = data;
                    alert('VERIFICAR EN LA BASE DE DATOS SI ALGUIEN COINCIDE');
                    $.ajax({
                        async: false,
                        url: base_url + "Movimientos/Controller_clientes/verificar_personal",
                        type: "POST",
                        dataType: 'json',
                        data: {
                            num_documento: num_documento
                        },
                        success: function (data) {
                            debugger;
                            if (data == null) { // SI SE EQUIVOCAN DE DNI PUEDEN ACTUALIZAR, PERO SI YA EXISTE TE TRAERA DATOS Y NO PASARA ESTA VALIDACION
                                resultado = data;
                                alert('PUEDE INGRESAR EL REGISTRO');
                                $.ajax({
                                    async: false,
                                    url: base_url + "Movimientos/Controller_clientes/actualizar",
                                    type: "POST",
                                    dataType: 'json',
                                    data: {
                                        id_personal: id_personal,
                                        nombre: nombre,
                                        apepaterno: apepaterno,
                                        apematerno: apematerno,
                                        telefono: telefono,
                                        email: email,
                                        direccion: direccion,
                                        id_tdocumento: id_tdocumento,
                                        num_documento: num_documento,
                                        id_cargo: id_cargo
                                    },
                                    success: function (data) {
                                        window.location.href = base_url + "Movimientos/Controller_clientes";
                                        debugger;
                                    }
                                });
                            } else {
                                debugger;
                                resultado = data;
                                alertify.error('OTRO PERSONAL YA TIENE ESE DNI');
                            }

                        }
                    });
                }
            }
        });
        var myJSON = JSON.stringify(resultado);
        //alert(myJSON);
        debugger;
    }

});


$("#id_tdocumento").on("change", function () {

    var id_tdocumento = document.getElementById('id_tdocumento');
    var id_tdocumento_select = id_tdocumento.options[id_tdocumento.selectedIndex].text;

    if (id_tdocumento_select == "RUC") {
        document.getElementById('nombre').disabled = true;
        document.getElementById('apepaterno').disabled = true;
        document.getElementById('apematerno').disabled = true;

        document.getElementById('razon_social').disabled = false;
    } else if (id_tdocumento_select == "DNI") {
        document.getElementById('razon_social').disabled = true;

        document.getElementById('nombre').disabled = false;
        document.getElementById('apepaterno').disabled = false;
        document.getElementById('apematerno').disabled = false;
    } else if (id_tdocumento_select == "CARNET EXT.") {
        document.getElementById('razon_social').disabled = true;

        document.getElementById('nombre').disabled = false;
        document.getElementById('apepaterno').disabled = false;
        document.getElementById('apematerno').disabled = false;
    }




});

