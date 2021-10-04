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

$(".visualizar_categorias").on("click", function () {
    var areas = $(this).val();
    var infopersonal = areas.split("*");
    html = "<p><strong>CODIGO: </strong>" + infopersonal[0] + "</p>",
        html += "<p><strong>NOMBRE: </strong>" + infopersonal[1] + "</p>",
        html += "<p><strong>CATEGORIA: </strong>" + infopersonal[2] + "</p>",
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
