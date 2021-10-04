var $valorcito;
var $valorcito2;

$('#indicador_nivel_productividad').DataTable({
    dom: 'Bfrtip',
    buttons: [
        {
            extend: 'pdfHtml5',
            // text: '<i class="fa fa-file-pdf-o" style="font-size:10px; color:red"></i>',
            titleAttr: 'Exportar a PDF',
            pageSize: 'A4',
            title: "INDICADOR DE NIVEL DE PRODUCTIVIDAD",
            exportOptions: {
                columns: [0, 1, 2, 3, 4]
            },
            customize: function (doc) {
                doc['styles'] = {
                    tableHeader: {
                        bold: !0,
                        fontSize: 7,
                        color: 'black',
                        fillColor: '#ECEBEB',
                        alignment: 'center'
                    },
                    athleteTable: {
                        alignment: 'center',
                        fontSize: 6
                    },
                    column1: {
                        alignment: 'center'
                    },
                    title: {
                        fontSize: 8,
                        bold: true,
                        margin: [0, 0, 0, 8],
                        alignment: 'center'
                    }

                };
                var cols = [];

                cols[1] = {text: moment().format('DD/MM/YYYY h:mm:ss'), alignment: 'right', margin: [10, 10, 15, 15], fontSize: 5};
                var objHeader = {};
                objHeader['columns'] = cols;
                doc['header'] = objHeader;

                //doc['content']['1'].layout = 'lightHorizontalLines';
                //doc['content']['1'].table.widths = [25, 45, 40, 40, 70, 65, 70, 65, 40];
                doc['content']['1'].table.widths = [70, 70, 120, 120, 70];
                doc['content']['1'].style = 'athleteTable';

                var objFooter = {};
                objFooter['alignment'] = 'center';
                doc["footer"] = function (currentPage, pageCount) {
                    var footer = [
                        {
                            text: '',
                            alignment: 'left',
                            color: 'red',
                            margin: [15, 15, 0, 15]
                        }, {
                            text: 'Pagina ' + currentPage + ' de ' + pageCount,
                            alignment: 'center',
                            color: 'black',
                            fontSize: 5,
                            margin: [0, 15, 0, 15]
                        }, {
                            text: '',
                            alignment: 'center',
                            color: 'blue',
                            margin: [0, 15, 15, 15]
                        }
                    ];
                    objFooter['columns'] = footer;
                    return objFooter;
                };
            }
        },
        {
            extend: 'excelHtml5',
            titleAttr: 'Exportar a XLS',
            pageSize: 'A4',
            title: "INDICADOR DE NIVEL DE PRODUCTIVIDAD",
        }
    ],
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

$('#indicador_crecimiento_ventas').DataTable({
    dom: 'Bfrtip',
    buttons: [
        {
            extend: 'pdfHtml5',
            //text: '<i class="fa fa-file-pdf-o" style="font-size:10px; color:red"></i>',
            titleAttr: 'Exportar a PDF',
            pageSize: 'A4',
            title: "INDICADOR DE CRECIMIENTO DE VENTAS",
            exportOptions: {
                columns: [0, 1, 2, 3, 4,5]
            },
            customize: function (doc) {
                doc['styles'] = {
                    tableHeader: {
                        bold: !0,
                        fontSize: 7,
                        color: 'black',
                        fillColor: '#ECEBEB',
                        alignment: 'center'
                    },
                    athleteTable: {
                        alignment: 'center',
                        fontSize: 6
                    },
                    column1: {
                        alignment: 'center'
                    },
                    title: {
                        fontSize: 8,
                        bold: true,
                        margin: [0, 0, 0, 8],
                        alignment: 'center'
                    }

                };
                var cols = [];

                cols[1] = {text: moment().format('DD/MM/YYYY h:mm:ss'), alignment: 'right', margin: [10, 10, 15, 15], fontSize: 5};
                var objHeader = {};
                objHeader['columns'] = cols;
                doc['header'] = objHeader;

                //doc['content']['1'].layout = 'lightHorizontalLines';
                //doc['content']['1'].table.widths = [25, 45, 40, 40, 70, 65, 70, 65, 40];
                doc['content']['1'].table.widths = [72, 72, 72, 72, 72,72];
                doc['content']['1'].style = 'athleteTable';

                var objFooter = {};
                objFooter['alignment'] = 'center';
                doc["footer"] = function (currentPage, pageCount) {
                    var footer = [
                        {
                            text: '',
                            alignment: 'left',
                            color: 'red',
                            margin: [15, 15, 0, 15]
                        }, {
                            text: 'Pagina ' + currentPage + ' de ' + pageCount,
                            alignment: 'center',
                            color: 'black',
                            fontSize: 5,
                            margin: [0, 15, 0, 15]
                        }, {
                            text: '',
                            alignment: 'center',
                            color: 'blue',
                            margin: [0, 15, 15, 15]
                        }
                    ];
                    objFooter['columns'] = footer;
                    return objFooter;
                };
            }
        },
        {
            extend: 'excelHtml5',
            titleAttr: 'Exportar a XLS',
            pageSize: 'A4',
            title: "INDICADOR DE CRECIMIENTO DE VENTAS",
        }
    ],
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

