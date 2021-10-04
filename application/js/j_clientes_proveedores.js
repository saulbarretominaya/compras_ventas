$("#datemask").inputmask("dd/mm/yyyy", { placeholder: "dd/mm/yyyy" });
//Datemask2 mm/dd/yyyy
$("#datemask2").inputmask("mm/dd/yyyy", { placeholder: "mm/dd/yyyy" });
//Money Euro
$("[data-mask]").inputmask();

$(document).ready(function () {
	$(":input").inputmask();
	/*
 or    Inputmask().mask(document.querySelectorAll("input"));*/
});

$(document).ready(function () {
	// $("#id_datatable_clientes_proveedores tfoot th").each(function () {
	// 	var title = $(this).text();
	// 	$(this).html('<input type="text" placeholder="Buscar ' + title + '" /> ');
	// });

	var table = $("#id_datatable_clientes_proveedores").dataTable({
		//scrollY: true,
		scrollX: true,
		scrollCollapse: true,
		paging: true,
		searching: true,

		// /*------------------*/
		// initComplete: function () {
		// 	// Apply the search
		// 	this.api()
		// 		.columns()
		// 		.every(function () {
		// 			var that = this;

		// 			$("input", this.footer()).on("keyup change clear", function () {
		// 				if (that.search() !== this.value) {
		// 					that.search(this.value).draw();
		// 				}
		// 			});
		// 		});
		// },

		/*------------------*/

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
	});
});

// INSERTAR

$("#registrar").on("click", function () {
	debugger;

	var origen = $("#origen").val();
	var condicion = $("#condicion").val();
	var tipo_persona = $("#tipo_persona").val();
	var tipo_persona_sunat = $("#tipo_persona_sunat").val();
	var tipo_documento = $("#tipo_documento").val();
	var num_documento = $("#num_documento").val();
	var nombres = $("#nombres").val();
	var ape_paterno = $("#ape_paterno").val();
	var ape_materno = $("#ape_materno").val();
	var razon_social = $("#razon_social").val();
	var direccion_fiscal = $("#direccion_fiscal").val();
	var direccion_alm1 = $("#direccion_alm1").val();
	var direccion_alm2 = $("#direccion_alm2").val();
	var departamento = $("#departamento").val();
	var provincia = $("#provincia").val();
	var distrito = $("#distrito").val();
	var telefono = $("#telefono").val();
	var celular = $("#celular").val();
	var tipo_giro = $("#tipo_giro").val();
	var condicion_pago = $("#condicion_pago").val();
	var linea_credito_soles = $("#linea_credito_soles").val();
	var credito_unitario_soles = $("#credito_unitario_soles").val();
	var disponible_soles = $("#disponible_soles").val();
	var linea_credito_dolares = $("#linea_credito_dolares").val();
	var credito_unitario_dolares = $("#credito_unitario_dolares").val();
	var disponible_dolares = $("#disponible_dolares ").val();
	var linea_opcional = $("#linea_opcional").val();
	var linea_opcional_unitaria = $("#linea_opcional_unitaria").val();
	var linea_disponible = $("#linea_disponible ").val();
	var email = $("#email").val();
	var contacto_registro = $("#contacto_registro").val();
	var estado_cliente = $("#estado_cliente").val();
	var email_cobranza = $("#email_cobranza").val();
	var contacto_cobranza = $("#contacto_cobranza").val();
	var tipo_cliente_pago = $("#tipo_cliente_pago").val();

	// if (
	// 	// // id_trabajador === "" ||
	// 	origen === "0" ||
	// 	condicion === "0" ||
	// 	tipo_persona === "0" ||
	// 	tipo_persona_sunat === "0" ||
	// 	tipo_documento === "0" ||
	// 	num_documento === "" ||
	// 	nombres === "" ||
	// 	ape_paterno === "" ||
	// 	ape_materno === "" ||
	// 	razon_social === "" ||
	// 	direccion_fiscal === "" ||
	// 	direccion_alm1 === "" ||
	// 	direccion_alm2 === "" ||
	// 	departamento === "0" ||
	// 	provincia === "0" ||
	// 	distrito === "0" ||
	// 	telefono === "" ||
	// 	celular === "" ||
	// 	tipo_giro === "0" ||
	// 	condicion_pago === "0" ||
	// 	// vendedor === "0" ||
	// 	linea_credito_soles === "" ||
	// 	credito_unitario_soles === "" ||
	// 	disponible_soles === "" ||
	// 	linea_credito_dolares === "" ||
	// 	credito_unitario_dolares === "" ||
	// 	disponible_dolares === "" ||
	// 	email === "" ||
	// 	contacto_registro === "" ||
	// 	// estado === "0" ||
	// 	email_cobranza === "" ||
	// 	contacto_cobranza === "" ||
	// 	tipo_cliente_pago === "0"
	// ) {
	// 	//alert('NO PUEDE DEJARLO VACIO');
	// 	alertify
	// 		.dialog("alert")
	// 		.set({
	// 			transition: "zoom",
	// 			message: "SEÑOR UD NO ENTIENDE QUE NO PUEDE QUEDAR VACIO",
	// 			title: "TRABAJADORES",
	// 		})
	// 		.show();
	// } else {
	$.ajax({
		async: false,
		url: base_url + "C_clientes_proveedores/insertar",
		type: "POST",
		dataType: "json",
		data: {
			origen: origen,
			condicion: condicion,
			tipo_persona: tipo_persona,
			tipo_persona_sunat: tipo_persona_sunat,
			tipo_documento: tipo_documento,
			num_documento: num_documento,
			nombres: nombres,
			ape_paterno: ape_paterno,
			ape_materno: ape_materno,
			razon_social: razon_social,
			direccion_fiscal: direccion_fiscal,
			direccion_alm1: direccion_alm1,
			direccion_alm2: direccion_alm2,
			departamento: departamento,
			provincia: provincia,
			distrito: distrito,
			telefono: telefono,
			celular: celular,
			tipo_giro: tipo_giro,
			condicion_pago: condicion_pago,
			linea_credito_soles: linea_credito_soles,
			credito_unitario_soles: credito_unitario_soles,
			disponible_soles: disponible_soles,
			linea_credito_dolares: linea_credito_dolares,
			credito_unitario_dolares: credito_unitario_dolares,
			disponible_dolares: disponible_dolares,
			linea_opcional: linea_opcional,
			linea_opcional_unitaria: linea_opcional_unitaria,
			linea_disponible: linea_disponible,
			email: email,
			contacto_registro: contacto_registro,
			estado_cliente: estado_cliente,
			email_cobranza: email_cobranza,
			contacto_cobranza: contacto_cobranza,
			tipo_cliente_pago: tipo_cliente_pago,
		},
		success: function (data) {
			debugger;
			window.location.href = base_url + "C_clientes_proveedores";
			debugger;
		},
	});
	// }
});

$("#actualizar_clientes_proveedores").on("click", function () {
	debugger;

	var id_cliente_proveedor = $("#id_cliente_proveedor").val();
	var origen = $("#origen").val();
	var condicion = $("#condicion").val();
	var tipo_persona = $("#tipo_persona").val();
	var tipo_persona_sunat = $("#tipo_persona_sunat").val();
	var tipo_documento = $("#tipo_documento").val();
	var num_documento = $("#num_documento").val();
	var nombres = $("#nombres").val();
	var ape_paterno = $("#ape_paterno").val();
	var ape_materno = $("#ape_materno").val();
	var razon_social = $("#razon_social").val();
	var direccion_fiscal = $("#direccion_fiscal").val();
	var direccion_alm1 = $("#direccion_alm1").val();
	var direccion_alm2 = $("#direccion_alm2").val();
	var departamento = $("#departamento").val();
	var provincia = $("#provincia").val();
	var distrito = $("#distrito").val();
	var telefono = $("#telefono").val();
	var celular = $("#celular").val();
	var tipo_giro = $("#tipo_giro").val();
	var condicion_pago = $("#condicion_pago").val();
	var linea_credito_soles = $("#linea_credito_soles").val();
	var credito_unitario_soles = $("#credito_unitario_soles").val();
	var disponible_soles = $("#disponible_soles").val();
	var linea_credito_dolares = $("#linea_credito_dolares").val();
	var credito_unitario_dolares = $("#credito_unitario_dolares").val();
	var disponible_dolares = $("#disponible_dolares ").val();
	var linea_opcional = $("#linea_opcional").val();
	var linea_opcional_unitaria = $("#linea_opcional_unitaria").val();
	var linea_disponible = $("#linea_disponible ").val();
	var email = $("#email").val();
	var contacto_registro = $("#contacto_registro").val();
	var estado_cliente = $("#estado_cliente").val();
	var email_cobranza = $("#email_cobranza").val();
	var contacto_cobranza = $("#contacto_cobranza").val();
	var tipo_cliente_pago = $("#tipo_cliente_pago").val();

	// 	if (
	// 		origen === "0" ||
	// 		condicion === "0" ||
	// 		tipo_persona === "0" ||
	// 		tipo_persona_sunat === "0" ||
	// 		tipo_documento === "0" ||
	// 		num_documento === "" ||
	// 		nombres === "" ||
	// 		ape_paterno === "" ||
	// 		ape_materno === "" ||
	// 		razon_social === "" ||
	// 		direccion_fiscal === "" ||
	// 		direccion_alm1 === "" ||
	// 		direccion_alm2 === "" ||
	// 		departamento === "0" ||
	// 		provincia === "0" ||
	// 		distrito === "0" ||
	// 		telefono === "" ||
	// 		celular === "" ||
	// 		tipo_giro === "0" ||
	// 		condicion_pago === "0" ||
	// 		// vendedor === "0" ||
	// 		linea_credito_soles === "" ||
	// 		credito_unitario_soles === "" ||
	// 		disponible_soles === "" ||
	// 		linea_credito_dolares === "" ||
	// 		credito_unitario_dolares === "" ||
	// 		disponible_dolares === "" ||
	// 		email === "" ||
	// 		contacto_registro === "" ||
	// 		// estado === "0" ||
	// 		email_cobranza === "" ||
	// 		contacto_cobranza === "" ||
	// 		tipo_cliente_pago === "0"
	// 	) {
	// 		//alert('NO PUEDE DEJARLO VACIO');
	// 		alertify
	// 			.dialog("alert")
	// 			.set({
	// 				transition: "zoom",
	// 				message: "SEÑOR UD NO ENTIENDE QUE NO PUEDE QUEDAR VACIO",
	// 				title: "TRABAJADORES",
	// 			})
	// 			.show();
	// 	} else {
	$.ajax({
		async: false,
		url: base_url + "C_clientes_proveedores/verificar_cliente_proveedor",
		type: "POST",
		dataType: "json",

		data: {
			id_cliente_proveedor: id_cliente_proveedor,
			origen: origen,
			condicion: condicion,
			tipo_persona: tipo_persona,
			tipo_persona_sunat: tipo_persona_sunat,
			tipo_documento: tipo_documento,
			num_documento: num_documento,
			nombres: nombres,
			ape_paterno: ape_paterno,
			ape_materno: ape_materno,
			razon_social: razon_social,
			direccion_fiscal: direccion_fiscal,
			direccion_alm1: direccion_alm1,
			direccion_alm2: direccion_alm2,
			departamento: departamento,
			provincia: provincia,
			distrito: distrito,
			telefono: telefono,
			celular: celular,
			tipo_giro: tipo_giro,
			condicion_pago: condicion_pago,
			linea_credito_soles: linea_credito_soles,
			credito_unitario_soles: credito_unitario_soles,
			disponible_soles: disponible_soles,
			linea_credito_dolares: linea_credito_dolares,
			credito_unitario_dolares: credito_unitario_dolares,
			disponible_dolares: disponible_dolares,
			linea_opcional: linea_opcional,
			linea_opcional_unitaria: linea_opcional_unitaria,
			linea_disponible: linea_disponible,
			email: email,
			contacto_registro: contacto_registro,
			estado_cliente: estado_cliente,
			email_cobranza: email_cobranza,
			contacto_cobranza: contacto_cobranza,
			tipo_cliente_pago: tipo_cliente_pago,
		},

		success: function (data) {
			console.log(data);
			debugger;
			// if (data == null) {
			// 	//ESA VALIDACION NULL REPRESENTA QUE ESE REGISTRO NO SE ENCUENTRA EN LA BD, X LO TANTO EJECUTA UN METODO INSERTAR
			// 	resultado = data;
			// 	alert("PUEDE INGRESAR EL REGISTRO");
			$.ajax({
				async: false,
				url: base_url + "C_clientes_proveedores/actualizar",
				type: "POST",
				dataType: "json",
				data: {
					id_cliente_proveedor: id_cliente_proveedor,
					origen: origen,
					condicion: condicion,
					tipo_persona: tipo_persona,
					tipo_persona_sunat: tipo_persona_sunat,
					tipo_documento: tipo_documento,
					num_documento: num_documento,
					nombres: nombres,
					ape_paterno: ape_paterno,
					ape_materno: ape_materno,
					razon_social: razon_social,
					direccion_fiscal: direccion_fiscal,
					direccion_alm1: direccion_alm1,
					direccion_alm2: direccion_alm2,
					departamento: departamento,
					provincia: provincia,
					distrito: distrito,
					telefono: telefono,
					celular: celular,
					tipo_giro: tipo_giro,
					condicion_pago: condicion_pago,
					linea_credito_soles: linea_credito_soles,
					credito_unitario_soles: credito_unitario_soles,
					disponible_soles: disponible_soles,
					linea_credito_dolares: linea_credito_dolares,
					credito_unitario_dolares: credito_unitario_dolares,
					disponible_dolares: disponible_dolares,
					linea_opcional: linea_opcional,
					linea_opcional_unitaria: linea_opcional_unitaria,
					linea_disponible: linea_disponible,
					email: email,
					contacto_registro: contacto_registro,
					estado_cliente: estado_cliente,
					email_cobranza: email_cobranza,
					contacto_cobranza: contacto_cobranza,
					tipo_cliente_pago: tipo_cliente_pago,
				},
				success: function (data) {
					window.location.href = base_url + "C_clientes_proveedores";
					debugger;
				},
			});
			// } else {
			// 	resultado = data;
			// 	//alert('YA SE ENCUENTRA REGISTRADO');
			// 	alertify.error("ESTO ES EL COLMO SEÑORES");
			// }

			//window.location.href = base_url+"Recursos_humanos/Controller_cargos/enlace_insertar";
			//echo json_encode($data);
		},
	});

	debugger;

	var myJSON = JSON.stringify(resultado);
	//alert(myJSON);
	// }
});
