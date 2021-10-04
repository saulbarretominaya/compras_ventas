window.onload = function () {
    for (var i = 0, l = document.getElementsByTagName('input').length; i < l; i++) {
        if (document.getElementsByTagName('input').item(i).type === 'text') {
            document.getElementsByTagName('input').item(i).setAttribute('autocomplete', 'off');
        }
        ;
    }
    ;
};

$(".visualizar_cargos").on("click", function () {
    var cargos = $(this).val();
    var txtcargos = cargos.split("*");
    html = "<p><strong>CODIGO: </strong>" + txtcargos[0] + "</p>",
        html += "<p><strong>DESCRIPCION: </strong>" + txtcargos[1] + "</p>",
        $("#modal-default .modal-body").html(html);
});


$("#listar").dataTable({

    scrollX: true,
    scrollCollapse: true,
    paging: true,
    searching: true,


    language: {
        lengthMenu: "Mostrar _MENU_ registros por pagina",
        zeroRecords: "No se encontraron resultados en su busqueda",
        searchPlaceholder: "Buscar registros",
        info: "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
        infoEmpty: "No existen registros",
        infoFiltered: "(filtrado de un total de _MAX_ registros)",
        search: "Buscar:",
        paginate: {
            first: "Primero",
            last: "Último",
            next: "Siguiente",
            previous: "Anterior",
        },
    },

    order: []
});


$(".btn_registrar").on("click", function () {
    debugger;
    var descripcion = $("#descripcion").val();
    var resultado = "";

    if (descripcion === '') {
        //alert('NO PUEDE DEJARLO VACIO');
        alertify.dialog('alert').set({ transition: 'zoom', message: 'NO PUEDE DEJARLO VACIO', title: 'CARGOS' }).show();
    } else {

        $.ajax({
            async: false,
            url: base_url + "Recursos_humanos/Controller_cargos/verificar_cargo",
            type: "POST",
            dataType: 'json',
            data: {
                descripcion: descripcion
            },
            success: function (data) {
                if (data == null) { //ESA VALIDACION NULL REPRESENTA QUE ESE REGISTRO NO SE ENCUENTRA EN LA BD, X LO TANTO EJECUTA UN METODO INSERTAR
                    resultado = data;
                    //alert('PUEDE INGRESAR EL REGISTRO');
                    $.ajax({
                        async: false,
                        url: base_url + "Recursos_humanos/Controller_cargos/insertar",
                        type: "POST",
                        dataType: 'json',
                        data: {
                            descripcion: descripcion
                        },
                        success: function (data) {
                            window.location.href = base_url + "Recursos_humanos/Controller_cargos";
                            debugger;
                        }
                    });
                } else {
                    resultado = data;
                    //alert('YA SE ENCUENTRA REGISTRADO');
                    alertify.error('YA SE ENCUENTRA REGISTRADO');
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
    debugger;
    var id_cargo = $("#id_cargo").val();
    var descripcion = $("#descripcion").val();
    var resultado = "";

    if (descripcion === '') {
        //alert('NO PUEDE DEJARLO VACIO');
        alertify.dialog('alert').set({ transition: 'zoom', message: 'NO PUEDE DEJARLO VACIO', title: 'CARGOS' }).show();
    } else {

        $.ajax({
            async: false,
            url: base_url + "Recursos_humanos/Controller_cargos/verificar_cargo",
            type: "POST",
            dataType: 'json',
            data: {
                descripcion: descripcion
            },
            success: function (data) {
                if (data == null) { //ESA VALIDACION NULL REPRESENTA QUE ESE REGISTRO NO SE ENCUENTRA EN LA BD, X LO TANTO EJECUTA UN METODO INSERTAR
                    resultado = data;
                    //alert('PUEDE INGRESAR EL REGISTRO');
                    $.ajax({
                        async: false,
                        url: base_url + "Recursos_humanos/Controller_cargos/actualizar",
                        type: "POST",
                        dataType: 'json',
                        data: {
                            id_cargo: id_cargo,
                            descripcion: descripcion
                        },
                        success: function (data) {
                            window.location.href = base_url + "Recursos_humanos/Controller_cargos";
                            debugger;
                        }
                    });
                } else {
                    resultado = data;
                    //alert('YA SE ENCUENTRA REGISTRADO');
                    alertify.error('YA SE ENCUENTRA REGISTRADO');
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







