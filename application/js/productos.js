window.onload = function () {
    debugger;
    for (var i = 0, l = document.getElementsByTagName('input').length; i < l; i++) {
        if (document.getElementsByTagName('input').item(i).type === 'text') {
            document.getElementsByTagName('input').item(i).setAttribute('autocomplete', 'off');
        }
        ;
    }
    ;
};

//MODAL DE PRODUCTOS
$(".visualizar_productos").on("click", function () {
    var personal = $(this).val();
    var infopersonal = personal.split("*");
    html = "<p><strong>ITEM: </strong>" + infopersonal[0] + "</p>",
        html += "<p><strong>CODIGO: </strong>" + infopersonal[1] + "</p>",
        html += "<p><strong>NOMBRE: </strong>" + infopersonal[2] + "</p>",
        html += "<p><strong>MARCA: </strong>" + infopersonal[3] + "</p>",
        html += "<p><strong>DESCRIPCION: </strong>" + infopersonal[4] + "</p>",
        html += "<p><strong>FECHA: </strong>" + infopersonal[5] + "</p>",
        html += "<p><strong>PRECIO VENTA: </strong>" + infopersonal[6] + "</p>";
    html += "<p><strong>STOCK: </strong>" + infopersonal[7] + "</p>";
    html += "<p><strong>ESTADO: </strong>" + infopersonal[8] + "</p>";
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



