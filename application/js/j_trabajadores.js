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

//MODAL DE DETALLE DE TRABAJADORES
$(document).on("click", ".btn-view-trabajador", function () {
	valor_id = $(this).val();
	$.ajax({
		url: base_url + "C_trabajadores/index_modal",
		type: "POST",
		dataType: "html",
		data: { id_trabajador: valor_id }, // Verificar
		success: function (data) {
			$("#modal-trabajador .modal-body").html(data);
		},
	});
});

$(document).ready(function () {
	$("#id_datatable_trabajadores tfoot th").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" placeholder="Buscar ' + title + '" /> ');
	});

	var table = $("#id_datatable_trabajadores").dataTable({
		//scrollY: true,
		scrollX: true,
		scrollCollapse: true,
		paging: true,
		searching: true,

		/*------------------*/
		initComplete: function () {
			// Apply the search
			this.api()
				.columns()
				.every(function () {
					var that = this;

					$("input", this.footer()).on("keyup change clear", function () {
						if (that.search() !== this.value) {
							that.search(this.value).draw();
						}
					});
				});
		},

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


// SELECCIONAR TIPO DE DOCUMENTO

var selTipoDocumento = document.getElementById("tipo_documento");

selTipoDocumento.addEventListener("change", function (event) {

	// var ndocumento1 = document.getElementById("num_documento1");
	// var ndocumento2 = document.getElementById("num_documento2");
	var ndocumento = document.getElementById("num_documento");

	if (this.value === "594") {

		// ndocumento1.type = "text";
		// ndocumento2.type = "hidden";
		ndocumento.minLength = "8";
		ndocumento.maxLength = "8";

	} else {

		ndocumento.minLength = "12";
		ndocumento.maxLength = "12";

		// ndocumento1.type = "hidden";
		// ndocumento2.type = "text";
		console.log("está vacío...");
	}

});


// // Accedemos al botón
// var emailInput = document.getElementById('emailInput');

// // evento para el input radio del "si"
// document.getElementById('interesadoPositivo').addEventListener('click', function (e) {
// 	console.log('Vamos a habilitar el input text');
// 	emailInput.disabled = false;
// });

// // evento para el input radio del "no"
// document.getElementById('interesadoNegativo').addEventListener('click', function (e) {
// 	console.log('Vamos a deshabilitar el input text');
// 	emailInput.disabled = true;
// });


// INSERTAR

$("#registrar").on("click", function () {
	debugger;

	var num_documento = $("#num_documento").val();
	var nombres = $("#nombres").val();
	var ape_paterno = $("#ape_paterno").val();
	var ape_materno = $("#ape_materno").val();
	var email = $("#email").val();
	var fecha_nacimiento = $("#fecha_nacimiento").val();
	var lugar_nacimiento = $("#lugar_nacimiento").val();
	var domicilio = $("#domicilio").val();
	var referencia = $("#referencia").val();
	var telefono = $("#telefono").val();
	var celular = $("#celular").val();
	var tipo_trabajador = $("#tipo_trabajador").val();
	var almacen = $("#almacen").val();
	var cargo_trabajador = $("#cargo_trabajador").val();
	var sexo = $("#sexo").val();
	var tipo_documento = $("#tipo_documento").val();
	var nacionalidad = $("#nacionalidad").val();
	var est_civil = $("#est_civil").val();
	var grado_instruccion = $("#grado_instruccion").val();
	var departamento = $("#departamento").val();
	var provincia = $("#provincia").val();
	var distrito = $("#distrito").val();

	// if (
	// 	// // id_trabajador === "" ||
	// 	num_documento === "" ||
	// 	nombres === "" ||
	// 	ape_paterno === "" ||
	// 	ape_materno === "" ||
	// 	email === "" ||
	// 	fecha_nacimiento === "" ||
	// 	lugar_nacimiento === "" ||
	// 	domicilio === "" ||
	// 	referencia === "" ||
	// 	telefono === "" ||
	// 	celular === "" ||
	// 	tipo_trabajador === "0" ||
	// 	local === "0" ||
	// 	cargo === "0" ||
	// 	sexo === "0" ||
	// 	tipo_documento === "0" ||
	// 	nacionalidad === "0" ||
	// 	est_civil === "0" ||
	// 	grado_instruccion === "0" ||
	// 	departamento === "0" ||
	// 	provincia === "0" ||
	// 	distrito === "0"
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
		url: base_url + "C_trabajadores/insertar",
		type: "POST",
		dataType: "json",
		data: {
			num_documento: num_documento,
			nombres: nombres,
			ape_paterno: ape_paterno,
			ape_materno: ape_materno,
			email: email,
			fecha_nacimiento: fecha_nacimiento,
			lugar_nacimiento: lugar_nacimiento,
			domicilio: domicilio,
			referencia: referencia,
			telefono: telefono,
			celular: celular,
			tipo_trabajador: tipo_trabajador,
			almacen: almacen,
			cargo_trabajador: cargo_trabajador,
			sexo: sexo,
			tipo_documento: tipo_documento,
			nacionalidad: nacionalidad,
			est_civil: est_civil,
			grado_instruccion: grado_instruccion,
			departamento: departamento,
			provincia: provincia,
			distrito: distrito,
		},
		success: function (data) {
			debugger;
			window.location.href = base_url + "C_trabajadores";
			debugger;
		},
	});
	// }
});

$("#actualizar_trabajadores").on("click", function () {
	debugger;

	var id_trabajador = $("#id_trabajador").val();
	var num_documento = $("#num_documento").val();
	var nombres = $("#nombres").val();
	var ape_paterno = $("#ape_paterno").val();
	var ape_materno = $("#ape_materno").val();
	var email = $("#email").val();
	var fecha_nacimiento = $("#fecha_nacimiento").val();
	var lugar_nacimiento = $("#lugar_nacimiento").val();
	var domicilio = $("#domicilio").val();
	var referencia = $("#referencia").val();
	var telefono = $("#telefono").val();
	var celular = $("#celular").val();
	var tipo_trabajador = $("#tipo_trabajador").val();
	var almacen = $("#almacen").val();
	var cargo_trabajador = $("#cargo_trabajador").val();
	var sexo = $("#sexo").val();
	var tipo_documento = $("#tipo_documento").val();
	var nacionalidad = $("#nacionalidad").val();
	var est_civil = $("#est_civil").val();
	var grado_instruccion = $("#grado_instruccion").val();
	var departamento = $("#departamento").val();
	var provincia = $("#provincia").val();
	var distrito = $("#distrito").val();
	var resultado = "";

	// if (
	// 	id_trabajador === "" ||
	// 	num_documento === "" ||
	// 	nombres === "" ||
	// 	ape_paterno === "" ||
	// 	ape_materno === "" ||
	// 	email === "" ||
	// 	fecha_nacimiento === "" ||
	// 	lugar_nacimiento === "" ||
	// 	domicilio === "" ||
	// 	referencia === "" ||
	// 	telefono === "" ||
	// 	celular === "" ||
	// 	tipo_trabajador === "" ||
	// 	local === "" ||
	// 	cargo === "" ||
	// 	sexo === "" ||
	// 	tipo_documento === "" ||
	// 	nacionalidad === "" ||
	// 	est_civil === "" ||
	// 	grado_instruccion === "" ||
	// 	departamento === "" ||
	// 	provincia === "" ||
	// 	distrito === ""
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
		url: base_url + "C_trabajadores/verificar_trabajador",
		type: "POST",
		dataType: "json",

		data: {
			id_trabajador: id_trabajador,
			num_documento: num_documento,
			nombres: nombres,
			ape_paterno: ape_paterno,
			ape_materno: ape_materno,
			email: email,
			fecha_nacimiento: fecha_nacimiento,
			lugar_nacimiento: lugar_nacimiento,
			domicilio: domicilio,
			referencia: referencia,
			telefono: telefono,
			celular: celular,
			tipo_trabajador: tipo_trabajador,
			almacen: almacen,
			cargo_trabajador: cargo_trabajador,
			sexo: sexo,
			tipo_documento: tipo_documento,
			nacionalidad: nacionalidad,
			est_civil: est_civil,
			grado_instruccion: grado_instruccion,
			departamento: departamento,
			provincia: provincia,
			distrito: distrito,
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
				url: base_url + "C_trabajadores/actualizar",
				type: "POST",
				dataType: "json",
				data: {
					id_trabajador: id_trabajador,
					num_documento: num_documento,
					nombres: nombres,
					ape_paterno: ape_paterno,
					ape_materno: ape_materno,
					email: email,
					fecha_nacimiento: fecha_nacimiento,
					lugar_nacimiento: lugar_nacimiento,
					domicilio: domicilio,
					referencia: referencia,
					telefono: telefono,
					celular: celular,
					tipo_trabajador: tipo_trabajador,
					almacen: almacen,
					cargo_trabajador: cargo_trabajador,
					sexo: sexo,
					tipo_documento: tipo_documento,
					nacionalidad: nacionalidad,
					est_civil: est_civil,
					grado_instruccion: grado_instruccion,
					departamento: departamento,
					provincia: provincia,
					distrito: distrito,
				},
				success: function (data) {
					window.location.href = base_url + "C_trabajadores";
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
