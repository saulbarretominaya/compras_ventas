$(".btn-view-usuarios").on("click", function () {
    var usuarios = $(this).val();
    var infousuarios = usuarios.split("*");
    html = "<p><strong>USUARIO: </strong>" + infousuarios[0] + "</p>",
        html += "<p><strong>NOMBRE COMPLETO: </strong>" + infousuarios[1] + "</p>",
        html += "<p><strong>ROL: </strong>" + infousuarios[2] + "</p>",
        html += "<p><strong>ESTADO: </strong>" + infousuarios[3] + "</p>",
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

$("#listar_usuarios").dataTable({

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

    "ordering": false
});

$(document).on("click", ".btn_check", function () {
    debugger;
    usuarios = $(this).val();
    infousuarios = usuarios.split("*");
    $("#id_personal").val(infousuarios[0]);
    $("#ds_nombres").val(infousuarios[1]);
    $("#ruc").val(infousuarios[2]);
    $("#modal-default").modal("hide");
});

