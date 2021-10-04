/* Variables Globales */
codigo_producto_duplicado = true;
resultado_campo = true;
/*Fin de Variables Globales */



/* Eventos en la tabla detalle  */
$("#id_agregar_tablero").on("click", function (e) {

	validar_detalle_tablero();

	var id_almacen_det = $("#hidden_id_almacen").val();
	var ds_almacen = $("#hidden_ds_almacen").val();
	var id_producto = $("#hidden_id_producto").val();
	var codigo_producto = $("#hidden_codigo_producto").val();
	var descripcion_producto = $("#descripcion_producto").val();
	var id_unidad_medida = $("#hidden_id_unidad_medida").val();
	var ds_unidad_medida = $("#hidden_ds_unidad_medida").val();
	var id_marca_producto = $("#hidden_id_marca_producto").val();
	var ds_marca_producto = $("#hidden_ds_marca_producto").val();
	var precio_unitario = $("#precio_unitario").val();
	var cantidad_unitaria = $("#cantidad_unitaria").val();
	var cantidad_total_producto = $("#hidden_cantidad_total_producto").val();
	var monto_total_producto_visor = $("#hidden_monto_total_producto").val();
	var monto_total_producto = $("#hidden_monto_total_producto").val().replaceAll(",", "");

	if (resultado_campo == true) {
		html = "<tr>";
		html += "    <input type='hidden' name='id_almacen_det[]' 			value='" + id_almacen_det + "'>";
		html += "<td><input type='hidden' name='ds_almacen[]' 				value='" + ds_almacen + "'>" + ds_almacen + "</td>";
		html += "    <input type='hidden' name='id_producto[]' 				value='" + id_producto + "'>";
		html += "<td><input type='hidden' name='codigo_producto[]' 			value='" + codigo_producto + "'>" + codigo_producto + "</td>";
		html += "<td><input type='hidden' name='descripcion_producto[]' 	value='" + descripcion_producto + "'>" + descripcion_producto + "</td>";
		html += "    <input type='hidden' name='id_unidad_medida[]' 		value='" + id_unidad_medida + "'>";
		html += "<td><input type='hidden' name='ds_unidad_medida[]' 		value='" + ds_unidad_medida + "'>" + ds_unidad_medida + "</td>";
		html += "    <input type='hidden' name='id_marca_producto[]' 		value='" + id_marca_producto + "'>";
		html += "<td><input type='hidden' name='ds_marca_producto[]'		value='" + ds_marca_producto + "'>" + ds_marca_producto + "</td>";
		html += "<td><input type='hidden' name='precio_unitario[]' 			value='" + precio_unitario + "'>" + precio_unitario + "</td>";
		html += "<td><input type='hidden' name='cantidad_unitaria[]' 		value='" + cantidad_unitaria + "'>" + cantidad_unitaria + "</td>";
		html += "<td><input type='hidden' name='cantidad_total_producto[]' 	value='" + cantidad_total_producto + "'>" + cantidad_total_producto + "</td>";
		html += "<td><input type='hidden'>" + monto_total_producto_visor + "</td>";
		html += "    <input type='hidden' name='monto_total_producto[]' 	value='" + monto_total_producto + "'>";
		html += "<td><button type='button' class='btn btn-outline-danger btn-sm eliminar_fila'><span class='fas fa-trash-alt'></span></button></td>";
		html += "</tr>";

		$("#id_table_detalle_tableros tbody").append(html);

		sumar_monto_item();

		calcular_margen();
	}
});
$(document).on("click", ".eliminar_fila", function () {

	var id_detalle = $(this).closest("tr").find("#value_id_solicitud").val();
	html =
		"<input type='hidden' id='id_solicitud_to_remove' name ='id_solicitud_to_remove[]' value='" +
		id_detalle +
		"'>";

	$("#container_solicitud_id_remove").append(html);
	$(this).closest("tr").remove();

	sumar_monto_item();
	calcular_margen();
	limpiar_campos();
});
/* Fin de tabla detalle */



/* CRUD */
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
	"ordering": false
});
$("#insertar").on("click", function () {

	validar_insertar();
	if (resultado_campo == true) {

		//Cabecera
		var codigo_tablero = $("#codigo_tablero").val();
		var descripcion_tablero = $("#descripcion_tablero").val();
		var cantidad_tablero = $("#cantidad_tablero").val();
		var id_sunat = $("#id_sunat").val();
		var id_marca_tablero = $("#id_marca_tablero").val();
		var id_modelo_tablero = $("#id_modelo_tablero").val();
		var id_moneda = $("#id_moneda").val();
		var id_almacen = $("#id_almacen").val();
		var precio_tablero = $("#precio_tablero").val().replaceAll(",", "");
		var porcentaje_margen = $("#porcentaje_margen").val();
		var precio_margen = $("#precio_margen").val().replaceAll(",", "");
		var precio_unitario_por_tablero = $("#precio_unitario_por_tablero").val().replaceAll(",", "");
		var total_tablero = $("#total_tablero").val().replaceAll(",", "");
		debugger;
		//Detalle
		var id_almacen_det = Array.prototype.slice.call(document.getElementsByName("id_almacen_det[]")).map((o) => o.value);
		var ds_almacen = Array.prototype.slice.call(document.getElementsByName("ds_almacen[]")).map((o) => o.value);
		var id_producto = Array.prototype.slice.call(document.getElementsByName("id_producto[]")).map((o) => o.value);
		var codigo_producto = Array.prototype.slice.call(document.getElementsByName("codigo_producto[]")).map((o) => o.value);
		var descripcion_producto = Array.prototype.slice.call(document.getElementsByName("descripcion_producto[]")).map((o) => o.value);
		var id_unidad_medida = Array.prototype.slice.call(document.getElementsByName("id_unidad_medida[]")).map((o) => o.value);
		var ds_unidad_medida = Array.prototype.slice.call(document.getElementsByName("ds_unidad_medida[]")).map((o) => o.value);
		var id_marca_producto = Array.prototype.slice.call(document.getElementsByName("id_marca_producto[]")).map((o) => o.value);
		var ds_marca_producto = Array.prototype.slice.call(document.getElementsByName("ds_marca_producto[]")).map((o) => o.value);
		var precio_unitario = Array.prototype.slice.call(document.getElementsByName("precio_unitario[]")).map((o) => o.value);
		var cantidad_unitaria = Array.prototype.slice.call(document.getElementsByName("cantidad_unitaria[]")).map((o) => o.value);
		var cantidad_total_producto = Array.prototype.slice.call(document.getElementsByName("cantidad_total_producto[]")).map((o) => o.value);
		var monto_total_producto = Array.prototype.slice.call(document.getElementsByName("monto_total_producto[]")).map((o) => o.value);



		$.ajax({
			async: false,
			url: base_url + "C_tableros/insertar",
			type: "POST",
			dataType: "json",
			data: {
				//Cabecera
				codigo_tablero: codigo_tablero,
				descripcion_tablero: descripcion_tablero,
				cantidad_tablero: cantidad_tablero,
				id_sunat: id_sunat,
				id_marca_tablero: id_marca_tablero,
				id_modelo_tablero: id_modelo_tablero,
				id_moneda: id_moneda,
				id_almacen: id_almacen,
				precio_tablero: precio_tablero,
				porcentaje_margen: porcentaje_margen,
				precio_margen: precio_margen,
				precio_unitario_por_tablero: precio_unitario_por_tablero,
				total_tablero: total_tablero,
				//Detalle
				id_almacen_det: id_almacen_det,
				ds_almacen: ds_almacen,
				id_producto: id_producto,
				codigo_producto: codigo_producto,
				descripcion_producto: descripcion_producto,
				id_unidad_medida: id_unidad_medida,
				ds_unidad_medida: ds_unidad_medida,
				id_marca_producto: id_marca_producto,
				ds_marca_producto: ds_marca_producto,
				precio_unitario: precio_unitario,
				cantidad_unitaria: cantidad_unitaria,
				cantidad_total_producto: cantidad_total_producto,
				monto_total_producto: monto_total_producto

			},
			success: function (data) {
				debugger;
				window.location.href = base_url + "C_tableros";
				debugger;
			},
		});
	};
});
/*Fin CRUD*/



/*  Ventanas Modal */
$(document).on("click", ".js_modal_detalle_tablero", function () {

	valor_id = $(this).val();
	$.ajax({
		url: base_url + "C_tableros/index_modal",
		type: "POST",
		dataType: "html",
		data: {
			id_tablero: valor_id
		},
		success: function (data) {
			$("#id_target_tablero .modal-content").html(data);
		}
	});
});
$(document).on("click", ".js_seleccionar_modal_producto", function () {

	productos = $(this).val();
	split_productos = productos.split("*");
	$("#hidden_id_almacen").val(split_productos[0]);
	$("#hidden_ds_almacen").val(split_productos[1]);
	$("#hidden_id_producto").val(split_productos[2]);
	$("#hidden_codigo_producto").val(split_productos[3]);
	$("#descripcion_producto").val(split_productos[4]);
	$("#hidden_id_unidad_medida").val(split_productos[5]);
	$("#hidden_ds_unidad_medida").val(split_productos[6]);
	$("#hidden_id_marca_producto").val(split_productos[7]);
	$("#hidden_ds_marca_producto").val(split_productos[8]);
	$("#precio_unitario").val(split_productos[9]);
	$("#opcion_target_producto").modal("hide");
});
$(document).ready(function () {

	/* Modal 1 */
	$("#id_datatable_productos thead #dtable_ds_almacen").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:150px;" placeholder="' + title + '" /> ');
	});
	$("#id_datatable_productos thead #dtable_codigo").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:300px;" placeholder="' + title + '" /> ');
	});
	$("#id_datatable_productos thead #dtable_descripcion_producto").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:400px;" placeholder="' + title + '" /> ');
	});
	$("#id_datatable_productos thead #dtable_ds_unidad_medida").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:50px;" placeholder="' + title + '" /> ');
	});
	$("#id_datatable_productos thead #dtable_ds_marca_producto").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:150px;" placeholder="' + title + '" /> ');
	});
	$("#id_datatable_productos thead #dtable_ds_grupo").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:300px;" placeholder="' + title + '" /> ');
	});
	$("#id_datatable_productos thead #dtable_ds_moneda").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:100px;" placeholder="' + title + '" /> ');
	});
	$("#id_datatable_productos thead #dtable_precio_unitario").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" class="border-0" style="width:150px;" placeholder="' + title + '" /> ');
	});
	$("#id_datatable_productos").dataTable({

		initComplete: function () {
			this.api()
				.columns()
				.every(function () {
					var that = this;

					$("input", this.header()).on("keyup change clear", function () {
						if (that.search() !== this.value) {
							that.search(this.value).draw();
						}
					});
				});
		},

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
	/*Fin Modal 1 */


});
/* Fin de Modal*/



/* Input's de Calculo */
$("#cantidad_unitaria").on("keyup", function () {
	calcular_importes();
});
$("#cantidad_tablero").on("keyup", function () {
	calcular_importes();
});
$("#porcentaje_margen").on("keyup", function () {
	calcular_margen();
});
/* Fin de Input's */



/* Replace */
$("#cantidad_tablero").on({
	"focus": function (event) {
		$(event.target).select();
	},
	"keyup": function (event) {
		$(event.target).val(function (index, value) {
			return value.replace(/\D/g, "")
				.replace(/^0*/, '');
			// .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
		});
	}
});
$("#porcentaje_margen").on({
	"focus": function (event) {
		$(event.target).select();
	},
	"keyup": function (event) {
		$(event.target).val(function (index, value) {
			return value.replace(/\D/g, "")
				.replace(/^0*/, '');
			// .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
		});
	}
});
$("#cantidad_unitaria").on({
	"focus": function (event) {
		$(event.target).select();
	},
	"keyup": function (event) {
		$(event.target).val(function (index, value) {
			return value.replace(/\D/g, "")
				.replace(/^0*/, '');
			// .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
		});
	}
});
/* Fin Replace */



/* Funciones */
function calcular_importes() {

	var cantidad_unitaria = Number($("#cantidad_unitaria").val());
	var precio_unitario = Number($("#precio_unitario").val());
	var cantidad_tablero = Number($("#cantidad_tablero").val());

	var monto_item = Number(cantidad_unitaria * precio_unitario);
	var cantidad_total_producto = Number(cantidad_unitaria * cantidad_tablero);
	var monto_total_producto = Number(monto_item * cantidad_tablero);


	if (isNaN(monto_item)) {
		console.log("Is Nan Rentabilidad")
	} else {

		/* Monto Item */
		let inputNum = monto_item;
		inputNum = inputNum.toString()
		inputNum = inputNum.split('.')
		if (!inputNum[1]) {
			inputNum[1] = '00'
		}
		let separados
		if (inputNum[0].length > 3) {
			let uno = inputNum[0].length % 3
			if (uno === 0) {
				separados = []
			} else {
				separados = [inputNum[0].substring(0, uno)]
			}
			let posiciones = parseInt(inputNum[0].length / 3)
			for (let i = 0; i < posiciones; i++) {
				let pos = ((i * 3) + uno)
				console.log(uno, pos)
				separados.push(inputNum[0].substring(pos, (pos + 3)))
			}
		} else {
			separados = [inputNum[0]]
		}
		monto_item_final = separados.join(',') + '.' + inputNum[1];


		$("input[name=monto_item]").val(monto_item_final);

		/* Fin de Monto Item */

	}

	if (isNaN(monto_total_producto)) {
		console.log("Is Nan Rentabilidad")
	} else {

		/* Monto Item */
		let inputNum = monto_total_producto;
		inputNum = inputNum.toString()
		inputNum = inputNum.split('.')
		if (!inputNum[1]) {
			inputNum[1] = '00'
		}
		let separados
		if (inputNum[0].length > 3) {
			let uno = inputNum[0].length % 3
			if (uno === 0) {
				separados = []
			} else {
				separados = [inputNum[0].substring(0, uno)]
			}
			let posiciones = parseInt(inputNum[0].length / 3)
			for (let i = 0; i < posiciones; i++) {
				let pos = ((i * 3) + uno)
				console.log(uno, pos)
				separados.push(inputNum[0].substring(pos, (pos + 3)))
			}
		} else {
			separados = [inputNum[0]]
		}
		monto_total_producto_final = separados.join(',') + '.' + inputNum[1];

		$("input[name=hidden_cantidad_total_producto]").val(cantidad_total_producto);
		$("input[name=hidden_monto_total_producto]").val(monto_total_producto_final);
		/* Fin de Monto Item */

	}

}
function sumar_monto_item() {
	var monto_total = 0;

	$("#id_table_detalle_tableros tbody tr").each(function () {
		var valorcito = $(this).find("td:eq(8)").text();
		valor = Number(valorcito.replace(/,/g, ''));
		monto_total = monto_total + valor;

		if (isNaN(monto_total)) {
			console.log("Is Nan Rentabilidad")
		} else {

			/* Monto Item */
			let inputNum = monto_total;
			inputNum = inputNum.toString()
			inputNum = inputNum.split('.')
			if (!inputNum[1]) {
				inputNum[1] = '00'
			}
			let separados
			if (inputNum[0].length > 3) {
				let uno = inputNum[0].length % 3
				if (uno === 0) {
					separados = []
				} else {
					separados = [inputNum[0].substring(0, uno)]
				}
				let posiciones = parseInt(inputNum[0].length / 3)
				for (let i = 0; i < posiciones; i++) {
					let pos = ((i * 3) + uno)
					console.log(uno, pos)
					separados.push(inputNum[0].substring(pos, (pos + 3)))
				}
			} else {
				separados = [inputNum[0]]
			}
			monto_item_final = separados.join(',') + '.' + inputNum[1];
			/* Fin de Monto Item */
		}

		$("input[name=precio_tablero").val(monto_item_final);

	});

}
function calcular_margen() {

	var cantidad_tablero = $("#cantidad_tablero").val();
	var precio_tablero = $("#precio_tablero").val();
	valor = Number(precio_tablero.replace(/,/g, ''));
	var porcentaje_margen = Number($("#porcentaje_margen").val());
	var precio_margen = (valor * porcentaje_margen) / 100;
	var total_tablero = precio_margen + valor;
	var precio_unitario_por_tablero = total_tablero / cantidad_tablero;


	if (isNaN(total_tablero)) {
		console.log("Is Nan Rentabilidad")
	} else {

		/* Total Tablero */
		let inputNum = total_tablero;
		inputNum = inputNum.toString()
		inputNum = inputNum.split('.')
		if (!inputNum[1]) {
			inputNum[1] = '00'
		}
		let separados
		if (inputNum[0].length > 3) {
			let uno = inputNum[0].length % 3
			if (uno === 0) {
				separados = []
			} else {
				separados = [inputNum[0].substring(0, uno)]
			}
			let posiciones = parseInt(inputNum[0].length / 3)
			for (let i = 0; i < posiciones; i++) {
				let pos = ((i * 3) + uno)
				console.log(uno, pos)
				separados.push(inputNum[0].substring(pos, (pos + 3)))
			}
		} else {
			separados = [inputNum[0]]
		}
		monto_final_tablero = separados.join(',') + '.' + inputNum[1];
		/* Fin Total Tablero */

	}

	if (isNaN(precio_margen)) {
		console.log("Is Nan Rentabilidad")
	} else {

		/* Precio Margen */
		let inputNum = precio_margen;
		inputNum = inputNum.toString()
		inputNum = inputNum.split('.')
		if (!inputNum[1]) {
			inputNum[1] = '00'
		}
		let separados
		if (inputNum[0].length > 3) {
			let uno = inputNum[0].length % 3
			if (uno === 0) {
				separados = []
			} else {
				separados = [inputNum[0].substring(0, uno)]
			}
			let posiciones = parseInt(inputNum[0].length / 3)
			for (let i = 0; i < posiciones; i++) {
				let pos = ((i * 3) + uno)
				console.log(uno, pos)
				separados.push(inputNum[0].substring(pos, (pos + 3)))
			}
		} else {
			separados = [inputNum[0]]
		}
		monto_final_precio_margen = separados.join(',') + '.' + inputNum[1];
		/* Fin Precio Margen */

	}

	if (isNaN(precio_unitario_por_tablero)) {
		console.log("Is Nan Rentabilidad")
	} else {

		/* precio_unitario_por_tablero*/
		let inputNum = precio_unitario_por_tablero;
		inputNum = inputNum.toString()
		inputNum = inputNum.split('.')
		if (!inputNum[1]) {
			inputNum[1] = '00'
		}
		let separados
		if (inputNum[0].length > 3) {
			let uno = inputNum[0].length % 3
			if (uno === 0) {
				separados = []
			} else {
				separados = [inputNum[0].substring(0, uno)]
			}
			let posiciones = parseInt(inputNum[0].length / 3)
			for (let i = 0; i < posiciones; i++) {
				let pos = ((i * 3) + uno)
				console.log(uno, pos)
				separados.push(inputNum[0].substring(pos, (pos + 3)))
			}
		} else {
			separados = [inputNum[0]]
		}
		monto_final_precio_unitario_por_tablero = separados.join(',') + '.' + inputNum[1];
		/* precio_unitario_por_tablero */

	}

	$("input[name=precio_margen]").val(monto_final_precio_margen);
	$("input[name=total_tablero]").val(monto_final_tablero);
	$("input[name=precio_unitario_por_tablero]").val(monto_final_precio_unitario_por_tablero);

}
function limpiar_campos() {

	debugger;
	var count = $('#id_table_detalle_tableros tr').length;

	if (count == 1) {
		$("input[name=porcentaje_margen]").val("");
		$("input[name=precio_tablero]").val("");
		$("input[name=total_tablero]").val("");
		$("input[name=precio_unitario_por_tablero]").val("");
		$("input[name=precio_margen]").val("");
		$("#cantidad_tablero").attr("readonly", false);
	}

}
function validar_insertar() {

	var count = $('#id_table_detalle_tableros tr').length;
	var codigo_tablero = $("#codigo_tablero").val();
	var id_sunat = $("#id_sunat").val();
	var descripcion_tablero = $("#descripcion_tablero").val();
	var descripcion_producto = $("#descripcion_producto").val();
	var id_marca_tablero = $("#id_marca_tablero").val();
	var id_modelo_tablero = $("#id_modelo_tablero").val();
	var id_moneda = $("#id_moneda").val();
	var id_almacen = $("#id_almacen").val();
	var precio_unitario = $("#precio_unitario").val();
	var cantidad_unitaria = $("#cantidad_unitaria").val();
	var monto_item = $("#monto_item").val();

	if (count == "1") {
		alertify.dialog('alert').set({ transition: 'zoom', message: 'Debe registrar al menos 1 producto en el detalle de tablero', title: 'CATALOGO' }).show();
		resultado_campo = false;
	}
	else if (codigo_tablero == "") {
		alert("Registrar Codigo Tablero")
		resultado_campo = false;
	}
	else if (id_sunat == "0") {
		alert("Seleccione un Codigo Sunat")
		resultado_campo = false;
	}
	else if (descripcion_tablero == "") {
		alert("Registre la Descripcion Tablero")
		resultado_campo = false;
	}



	/*************/
	else if (id_marca_tablero == "0") {
		alert("Seleccione Marca Tablero")
		resultado_campo = false;
	} else if (id_modelo_tablero == "0") {
		alert("Seleccione Modelo Tablero")
		resultado_campo = false;
	} else if (id_moneda == "0") {
		alert("Seleccione Tipo Moneda")
		resultado_campo = false;
	} else if (id_almacen == "0") {
		alert("Seleccione Almacen")
		resultado_campo = false;
	}



	else if (descripcion_producto == "") {
		alert("Seleccione un Producto")
		resultado_campo = false;
	}
	else if (precio_unitario == "") {
		alert("Precio Vacio")
		resultado_campo = false;
	}

	else if (cantidad_unitaria == "") {
		alert("Cantidad Vacio")
		resultado_campo = false;
	}
	else if (monto_item == "") {
		alert("Monto Item Vacio")
		resultado_campo = false;
	}

	else {
		resultado_campo = true;
	}
};
function validar_detalle_tablero() {

	$("#id_table_detalle_tableros tbody tr").each(function () {

		var valorcito = $(this).find("td:eq(1)").text();
		valor = valorcito.replace(/ /g, '');
		var hidden_codigo_producto = $("#hidden_codigo_producto").val();

		if (valor == hidden_codigo_producto) {
			codigo_producto_duplicado = false;
			return false;
		}

	});


	var descripcion_producto = $("#descripcion_producto").val();
	var precio_unitario = $("#precio_unitario").val();
	var cantidad_unitaria = $("#cantidad_unitaria").val();
	var cantidad_tablero = $("#cantidad_tablero").val();
	var monto_item = $("#monto_item").val();

	if (descripcion_producto == "") {
		alert("Seleccione un Producto")
		resultado_campo = false;
	}
	else if (precio_unitario == "") {
		alert("Precio Vacio")
		resultado_campo = false;
	}
	else if (cantidad_unitaria == "") {
		alert("Cantidad Vacio")
		resultado_campo = false;
	}
	else if (cantidad_tablero == "") {
		alert("Ingrese el Numero Tableros")
		resultado_campo = false;
	}
	else if (monto_item == "") {
		alert("Monto Item Vacio")
		resultado_campo = false;
	}
	else if (codigo_producto_duplicado == false) {
		alert("El codigo: " + valor + ", ya existe en la tabla detalle");
		resultado_campo = false;
		codigo_producto_duplicado = true;
	}
	else {
		resultado_campo = true;
		if (cantidad_tablero != "") {
			$("#cantidad_tablero").attr("readonly", true);
		} else {
			$("#cantidad_tablero").attr("readonly", false);
		}
	}
};
/* Fin Funciones */




/* Otros */
$(".select2").select2({
	theme: "bootstrap4"
});
/* Fin de Otros */