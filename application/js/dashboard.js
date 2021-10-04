$(function () {
    var year = (new Date).getFullYear();

    namesMonth = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Setiembre", "Octubre", "Noviembre", "Diciembre"],
            $.ajax({
                url: base_url + "Menu_principal/Controller_modulos/grafico1",
                type: "POST",
                data: {year: year},
                dataType: "json",
                success: function (data) {

                    var meses = new Array();
                    var montos = new Array();
                    $.each(data, function (key, value) {
                        meses.push(namesMonth[value.mes - 1]);
                        valor = Number(value.nivel_productividad);
                        montos.push(valor);
                    });

                    Highcharts.chart('eficacia', {
                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'Nivel de Productividad'
                        },
                        subtitle: {
                            text: 'Año:' + year
                        },
                        xAxis: {
                            categories: meses,
                            crosshair: true
                        },
                        yAxis: {
                            min: 0,
                            title: {
                                text: '@Elaboración propia',
                                type: 'datetime'
                            }
                        },
                        tooltip: {
                            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                            pointFormat: '<tr><td style="color:{series.color};padding:0"></td>' +
                                    '<td style="padding:0"><b>{point.y:.2f} Mensual Pv</b></td></tr>',
                            footerFormat: '</table>',
                            shared: true,
                            useHTML: true
                        },

                        exporting: {
                            buttons: {
                                contextButton: {
                                    menuItems: [
                                        {
                                            textKey: 'downloadPDF',
                                            text: 'DESCARGAR PDF',
                                            onclick: function () {
                                                this.exportChart({
                                                    type: 'application/pdf'
                                                });
                                            }
                                        }
                                    ]
                                }
                            }
                        },

                        plotOptions: {
                            column: {
                                pointPadding: 0.2,
                                borderWidth: 0
                            }
                        },
                        series: [{
                                name: 'Meses',
                                colorByPoint: true, //para los colores de barras
                                data: montos

                            }]
                    });
                }
            });
});

$(function () {
    $("#year").on("change", function () {
        year = $(this).val();
        debugger;
        namesMonth = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Setiembre", "Octubre", "Noviembre", "Diciembre"],
                $.ajax({
                    url: base_url + "Menu_principal/Controller_modulos/grafico1",
                    type: "POST",
                    data: {year: year},
                    dataType: "json",
                    success: function (data) {
                        debugger;
                        var meses = new Array();
                        var montos = new Array();
                        $.each(data, function (key, value) {
                            meses.push(namesMonth[value.mes - 1]);
                            valor = Number(value.nivel_productividad);
                            montos.push(valor);
                        });

                        Highcharts.chart('eficacia', {
                            chart: {
                                type: 'column'
                            },
                            title: {
                                text: 'Nivel de Productividad'
                            },
                            subtitle: {
                                text: 'Año:' + year
                            },
                            xAxis: {
                                categories: meses,
                                crosshair: true
                            },
                            yAxis: {
                                min: 0,
                                title: {
                                    text: '@Elaboración propia'
                                }
                            },
                            tooltip: {
                                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                                pointFormat: '<tr><td style="color:{series.color};padding:0"></td>' +
                                        '<td style="padding:0"><b>{point.y:.1f}Mensual Pv</b></td></tr>',
                                footerFormat: '</table>',
                                shared: true,
                                useHTML: true
                            },

                            exporting: {
                                buttons: {
                                    contextButton: {
                                        menuItems: [
                                            {
                                                textKey: 'downloadPDF',
                                                text: 'DESCARGAR PDF',
                                                onclick: function () {
                                                    this.exportChart({
                                                        type: 'application/pdf'
                                                    });
                                                }
                                            }
                                        ]
                                    }
                                }
                            },

                            plotOptions: {
                                column: {
                                    pointPadding: 0.2,
                                    borderWidth: 0
                                }
                            },
                            series: [{
                                    name: 'Meses',
                                    colorByPoint: true, //para los colores de barras
                                    data: montos

                                }]
                        });

                    }

                });
    });
});



//Torta
$(function () {
    var year = (new Date).getFullYear();

    $.ajax({
        url: base_url + "Menu_principal/Controller_modulos/grafico2",
        type: "POST",
        data: {year: year},
        dataType: "json",
        success: function (data) {
            debugger;
            var cli_atendidos = ""; // = new Array();
            var cli_pendientes = "";
            var cli_derivados = "";
            $.each(data, function (key, value) {
                debugger;
                clientes_atendidos = Number(value.clientes_atendidos);
                clientes_pendientes = Number(value.clientes_pendientes);
                clientes_derivados = Number(value.clientes_derivados);


                //cli_nuevos.push(clientes_nuevos);
                //cli_perdidos.push(clientes_perdidos);
                cli_atendidos = clientes_atendidos;
                cli_pendientes = clientes_pendientes;
                cli_derivados = clientes_derivados;

            });
            debugger;
            Highcharts.chart('container', {
                chart: {
                    type: 'pie',
                    options3d: {
                        enabled: true,
                        alpha: 45,
                        beta: 0
                    }
                },
                title: {
                    text: 'Atencion de Clientes'
                },
                accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.2f}%</b>'
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        depth: 35,
                        dataLabels: {
                            enabled: true,
                            format: '{point.name}'
                        }
                    }
                },
                exporting: {
                    buttons: {
                        contextButton: {
                            menuItems: [
                                {
                                    textKey: 'downloadPDF',
                                    text: 'DESCARGAR PDF',
                                    onclick: function () {
                                        this.exportChart({
                                            type: 'application/pdf'
                                        });
                                    }
                                }
                            ]
                        }
                    }
                },
                series: [{
                        type: 'pie',
                        name: 'Browser share',
                        data: [
//                            {
//                                name: 'Clientes Derivados',
//                                y: cli_derivados,
//                                sliced: true,
//                                selected: true
//                            },
                            ['Clientes Derivados', cli_derivados],
                            ['Clientes Atendidos', cli_atendidos],
                            ['Clientes Pendientes', cli_pendientes],
                        ]
                    }]
            });
            debugger;

        }

    });








});




