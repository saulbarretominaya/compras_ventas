var global_productos;
var global_nombre_producto;

window.onload = function () {
    for (var i = 0, l = document.getElementsByTagName('input').length; i < l; i++) {
        if (document.getElementsByTagName('input').item(i).type === 'text') {
            document.getElementsByTagName('input').item(i).setAttribute('autocomplete', 'off');
        }
        ;
    }
    ;
};

//MODAL DE DETALLE DE VENTA
$(document).on("click", ".btn-view-ventas", function () {
    debugger;
    valor_id = $(this).val();
    $.ajax({
        url: base_url + "Movimientos/Controller_ventas/view",
        type: "POST",
        dataType: "html",
        data: {id_venta: valor_id},
        success: function (data) {
            $("#modal-default .modal-body").html(data);
        }
    });
}); 

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




////MODAL DE FACTURACION ELECTRONICA
//$(document).on("click", ".btn-view-enviar_facturacion_electronica", function () {
//    valor_id = $(this).val();
//    debugger;
//    $.ajax({
//        url: base_url + "Movimientos/Controller_ventas/enviar_facturacion_electronica",
//        type: "POST",
//        dataType: "html",
//        data: {id_venta: valor_id},
//        success: function (data) {
//            $("#modal-default1 .modal-body").html(data);
//        }
//    });
//});



//LISTA DE CLIENTES EN FORMATO MODAL
$(document).on("click", ".btn-check", function () {
    usuarios = $(this).val();
    infousuarios = usuarios.split("*");
    $("#id_personal").val(infousuarios[0]);
    $("#ds_nombres").val(infousuarios[1]);
    $("#ruc").val(infousuarios[2]);
    $("#modal-default").modal("hide");
});

//DOS OPCIONES SOLO PARA RADIO BUTTON
$("#boleta").on("click", function () {
    debugger;
    var option = $(this).val();
    if (option !== "") {
        infocomprobante = option.split("*");
        $("#serie").val(infocomprobante[2]);
        //$("#num_comprobante").val(generarnumero(infocomprobante[3]));
        $("#num_comprobante").val(infocomprobante[3]);
        $('#cambio_comprobante').html("<font style='color: #007fff'>BOLETA DE VENTA</font>");

    } else {
        $("#serie").val(null);
        $("#num_comprobante").val(null);

    }
});
$("#factura").on("click", function () {
    debugger;
    var option = $(this).val();
    if (option !== "") {
        infocomprobante = option.split("*");
        $("#serie").val(infocomprobante[2]);
        //$("#num_comprobante").val(generarnumero(infocomprobante[3]));
        $("#num_comprobante").val(infocomprobante[3]);
        $('#cambio_comprobante').html("<font style='color: red'>FACTURA</font>");
    } else {
        $("#serie").val(null);
        $("#num_comprobante").val(null);
    }
});


$('.select_productos').select2({

    language: {
        noResults: function () {
            return "No hay resultado";
        },
        searching: function () {
            return "Buscando..";
        }
    }
});

//LLENA lOS CAMPOS 'TEXT ' AUTOMATICAMENTE 
$("#listar_productos").on("change", function () {

    id = $(this).val();
    option = $(this).children(":selected").attr("id");

    global_productos = option;
    global_nombre_producto = id;

    if (option !== "") {
        infocomprobante = option.split("*");
        $("#precio").val(infocomprobante[4]);
        $("#stock").val(infocomprobante[5]);

    }



});

//DETALLE VENTAS
$("#btn-agregar-solicitud").on("click", function (e) {
    debugger;
    //e.preventDefault();
    //alert(document.getElementById("autocomplete_personal").value);
    //var personal = document.getElementById("autocomplete_personal").getAttribute("data-id");
    //var zonal = document.getElementById("autocomplete_areas").getAttribute("data-id");
    //var productos = document.getElementById("listar_productos").value;

    //var productos = $(this).children(":selected").attr("id");

    var productos = global_productos;
    var cantidad = Number(document.getElementById("cantidad").value);
    var stock = Number(document.getElementById("stock").value);
    var precio = Number(document.getElementById("precio").value);
    var importe = precio * cantidad;
    var total_resta = stock - cantidad;

    var theDiv = $(".is" + id);
    theDiv.slideDown().removeClass("hidden");
    $("#listar_productos option:selected").attr('disabled', 'disabled');

    data = productos + "*";

    if (productos === "0") {
        alertify.alert("REGISTRAR VENTA", "SELECCIONE UN PRODUCTO");
    } else if (cantidad === 0) {
        alertify.alert("REGISTRAR VENTA", "REGISTRE UNA CANTIDAD VALIDA");
    } else if (cantidad > stock) {
        alertify.alert("REGISTRAR VENTA", "SUPERO EL STOCK, INGRESE NUEVAMENTE");
    } else if (cantidad <= -0) {
        alertify.alert("REGISTRAR VENTA", "NO PUEDE INGRESAR NUMEROS NEGATIVOS");
    } else if (data !== "") {

        detalle_solicitud = data.split("*"); //Metodo split, donde la variable detalle_solicitud se convierte en un array
        html = "<tr>";
        html += "<input type='hidden' name='id_producto[]' value='" + detalle_solicitud[0] + "'>";
        html += "<td class='text-center'>" + detalle_solicitud[1] + "</td>";
        html += "<td class='text-center'    value='" + detalle_solicitud[2] + "'>" + detalle_solicitud[2] + "</td>";
        html += "<td class='text-center'>" + detalle_solicitud[3] + "</td>";
        html += "<td class='text-center'>   <input type='hidden' name='precio[]' value='" + detalle_solicitud[4] + "'>" + detalle_solicitud[4] + "</td>";
        html += "<td class='text-center'>   <input type='hidden' name='cantidad[]' value='" + cantidad + "'>" + cantidad + "</td>";
        html += "<td class='text-center'>   <input type='hidden' name='importe[]' value='" + importe + "'>" + importe + "</td>";
        html += "<td><button type='button' class='btn btn-danger eliminar_fila'><span class='fa fa-remove'></span></button></td>"; //BOTON DE ELIMINAR

        //LIMPIAR TODO LOS CAMPOS
        $("#listar_productos").children().removeAttr("selected");
        //$('#listar_productos option')[0].selected = true;
        //$("#listar_productos").select2("val", "0");
        $('#cantidad').val('');


        $("#tbventas tbody").append(html);

        sumarTotalRendicion();


    }
});


function sumarTotalRendicion() {
    var monto_total = 0;
    var igv = 0;
    var sub_total = 0;
    $("#tbventas tbody tr").each(function () {
        var $valorcito = Number($(this).find("td:eq(5)").text());
        console.log("valorcito:" + $valorcito);

        if ($valorcito === '') {
            $(this).find("td:eq(5)").text("0.00");
        }
        monto_total = monto_total + $valorcito;
        sub_total = monto_total / 1.18;
        igv = sub_total * 0.18;

    });
    monto_total = Number(monto_total);
    $("input[name=monto_total").val(monto_total.toFixed(2));
    $("input[name=igv").val(igv.toFixed(2));
    $("input[name=sub_total").val(sub_total.toFixed(2));
}


//PARA ELIMINAR LAS FILAS DEL DETALLE
$(document).on("click", ".eliminar_fila", function () {
    debugger;

    cells = Array.prototype.slice.call(document.getElementById("tbventas").getElementsByTagName("td"));

    value = cells[1].innerHTML; //Aqui le paso la posicion del elemento de la tabla= [0,1,2,3,4,5,6]

    var theDiv = $(".is" + value);
    $("#listar_productos option[value=" + value + "]").removeAttr('disabled');

    $(this).closest("tr").remove();
    sumarTotalRendicion();

});


//NOTA DE CREDITO Y DEBITO!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! DESDE AQUI EMPIEZA

$("#nota_credito_facturas").on("click", function () {
    debugger;
    var option = $(this).val();
    if (option !== "") {
        infocomprobante = option.split("*");
        $("#serie").val(infocomprobante[3]);
        $("#num_comprobante").val(infocomprobante[4]);
        $('#cambio_comprobante').html("<font style='color: red'>NOTA DE CREDITO</font>");
    } else {
        $("#serie").val(null);
        $("#num_comprobante").val(null);
    }
});

$("#nota_debito_facturas").on("click", function () {
    debugger;
    var option = $(this).val();
    if (option !== "") {
        infocomprobante = option.split("*");
        $("#serie").val(infocomprobante[3]);
        $("#num_comprobante").val(infocomprobante[4]);
        $('#cambio_comprobante').html("<font style='color: blue'>NOTA DE DEBITO</font>");
    } else {
        $("#serie").val(null);
        $("#num_comprobante").val(null);
    }
});




$("#nota_credito_boletas").on("click", function () {
    debugger;
    var option = $(this).val();
    if (option !== "") {
        infocomprobante = option.split("*");
        $("#serie").val(infocomprobante[3]);
        $("#num_comprobante").val(infocomprobante[4]);
        $('#cambio_comprobante').html("<font style='color: red'>NOTA DE CREDITO</font>");
    } else {
        $("#serie").val(null);
        $("#num_comprobante").val(null);
    }
});

$("#nota_debito_boletas").on("click", function () {
    debugger;
    var option = $(this).val();
    if (option !== "") {
        infocomprobante = option.split("*");
        $("#serie").val(infocomprobante[3]);
        $("#num_comprobante").val(infocomprobante[4]);
        $('#cambio_comprobante').html("<font style='color: blue'>NOTA DE DEBITO</font>");
    } else {
        $("#serie").val(null);
        $("#num_comprobante").val(null);
    }
});




//DETALLE DE NOTA
$("#btn-agregar-nota").on("click", function (e) {
    debugger;
    e.preventDefault();
    //alert(document.getElementById("autocomplete_personal").value);
    //var personal = document.getElementById("autocomplete_personal").getAttribute("data-id");
    //var zonal = document.getElementById("autocomplete_areas").getAttribute("data-id");
    //var productos = document.getElementById("listar_productos").value;

    //var productos = $(this).children(":selected").attr("id");

    var productos = global_productos;
    var cantidad = Number(document.getElementById("cantidad").value);
    var stock = Number(document.getElementById("stock").value);
    var precio = Number(document.getElementById("precio").value);
    var importe = precio * cantidad;
    var total_resta = stock - cantidad;

    var theDiv = $(".is" + id);
    theDiv.slideDown().removeClass("hidden");
    $("#listar_productos option:selected").attr('disabled', 'disabled');

    data = productos + "*";

    if (productos === "0") {
        alertify.alert("REGISTRAR NOTA", "SELECCIONE UN PRODUCTO");
    } else if (cantidad === 0) {
        alertify.alert("REGISTRAR NOTA", "REGISTRE UNA CANTIDAD VALIDA");
    } else if (cantidad > stock) {
        alertify.alert("REGISTRAR NOTA", "SUPERO EL STOCK, INGRESE NUEVAMENTE");
    } else if (cantidad <= -0) {
        alertify.alert("REGISTRAR NOTA", "NO PUEDE INGRESAR NUMEROS NEGATIVOS");
    } else if (data !== "") {

        detalle_solicitud = data.split("*"); //Metodo split, donde la variable detalle_solicitud se convierte en un array
        html = "<tr>";
        html += "<input type='hidden' name='id_producto[]' value='" + detalle_solicitud[0] + "'>";
        html += "<td class='text-center'>" + detalle_solicitud[1] + "</td>";
        html += "<td class='text-center'    value='" + detalle_solicitud[2] + "'>" + detalle_solicitud[2] + "</td>";
        html += "<td class='text-center'>" + detalle_solicitud[3] + "</td>";
        html += "<td class='text-center'>   <input type='hidden' name='precio[]' value='" + detalle_solicitud[4] + "'>" + detalle_solicitud[4] + "</td>";
        html += "<td class='text-center'>   <input type='hidden' name='cantidad[]' value='" + cantidad + "'>" + cantidad + "</td>";
        html += "<td class='text-center'>   <input type='hidden' name='importe[]' value='" + importe + "'>" + importe + "</td>";
        html += "<td><button type='button' class='btn btn-danger eliminar_fila'><span class='fa fa-remove'></span></button></td>"; //BOTON DE ELIMINAR

        //LIMPIAR TODO LOS CAMPOS
        $("#listar_productos").children().removeAttr("selected");
        //$('#listar_productos option')[0].selected = true;
        //$("#listar_productos").select2("val", "0");
        $('#cantidad').val('');


        $("#tbventas tbody").append(html);

        sumarTotalRendicion();


    }
});


//PARA ELIMINAR EL ID DEL DETALLE DE LA NOTA
$(document).on("click", ".btn-remove-detalle-solicitud-encache", function () {
    debugger;
    var id_detalle = ($(this).closest("tr").find('#value_id_solicitud').val());
    var id_estado_stock_producto = "2";
    
    html = "<td><input type='hidden' id='id_solicitud_to_remove' name ='id_solicitud_to_remove[]' class='form-control text-center' readonly='' value='" + id_detalle + "'></td>\n\
           <td><input type='hidden' id='id_estado_stock_producto' name ='id_estado_stock_producto[]' class='form-control text-center' readonly='' value='" + id_estado_stock_producto + "'></td>";
    
    
    $("#container_solicitud_id_remove").append(html);
    $(this).closest("tr").remove();
});


$("a.alerta_nota_creada").on("click", function () {
    debugger;
    alertify.success('LA NOTA DE CREDITO HA SIDO CREADA');
});

$("a.alerta_anulacion_creada").on("click", function () {
    debugger;
    alertify.success('LA ANULACION HA SIDO CREADA');
});

