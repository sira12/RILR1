/*Author: Ing. Ruben D. Chirinos R. Tlf: +58 0416-3422924, email: elsaiya@gmail.com

/* FUNCION JQUERY PARA VALIDAR ACCESO DE USUARIOS*/
$('document').ready(function () {

	$("#formlogin").validate({
		rules:
		{
			usuario: { required: true, },
			password: { required: true, },
		},
		messages:
		{
			usuario: { required: "Ingrese Usuario de Acceso" },
			password: { required: "Ingrese Clave de Acceso" },
		},
		submitHandler: function (form) {

			var data = $("#formlogin").serialize();
			var check = $("input[type='radio']:checked:enabled").length;
			var valor = $('#tipo:checked').val();

			if (check == 0) {

				swal("Oops", "POR FAVOR DEBE DE SELECCIONAR SI ES CONTRIBUYENTE!", "error");
				return false;

			} else {

				$.ajax({
					type: 'POST',
					url: '{{ route("login") }}',
					async: false,
					data: data,
					beforeSend: function () {
						$("#login").fadeOut();

						var n = noty({
							text: "<span class='fa fa-refresh'></span> VERIFICANDO INFORMACI&Oacute;N, POR FAVOR ESPERE......",
							theme: 'defaultTheme',
							layout: 'center',
							type: 'information',
							timeout: 1000,
						});
					},
					success: function (response) {
						if (response == 1) {

							$("#login").fadeIn(1000, function () {

								var n = noty({
									text: "<span class='fa fa-warning'></span> POR FAVOR DEBE DE COMPLETAR LOS CAMPOS REQUERIDOS, VERIFIQUE NUEVAMENTE POR FAVOR...!",
									theme: 'defaultTheme',
									layout: 'center',
									type: 'error',
									timeout: 5000,
								});
								$("#btn-login").html('<i class="fa fa-sign-in"></i> Acceder');

							});

						} else if (response == 2) {

							$("#login").fadeIn(1000, function () {

								var n = noty({
									text: "<span class='fa fa-warning'></span> EL USUARIO INGRESADO NO EXISTE, VERIFIQUE NUEVAMENTE POR FAVOR...!",
									theme: 'defaultTheme',
									layout: 'center',
									type: 'error',
									timeout: 5000,
								});
								$("#btn-login").html('<i class="fa fa-sign-in"></i> Acceder');

							});

						} else if (response == 3) {

							$("#login").fadeIn(1000, function () {

								var n = noty({
									text: "<span class='fa fa-warning'></span> ESTE USUARIO SE ENCUENTRA ACTUALMENTE INACTIVO, VERIFIQUE NUEVAMENTE POR FAVOR...!",
									theme: 'defaultTheme',
									layout: 'center',
									type: 'error',
									timeout: 5000,
								});
								$("#btn-login").html('<i class="fa fa-sign-in"></i> Acceder');

							});

						} else if (response == 4) {

							$("#login").fadeIn(1000, function () {

								var n = noty({
									text: "<span class='fa fa-warning'></span> EL PASSWORD INGRESADO ES ERRONEO, VERIFIQUE NUEVAMENTE POR FAVOR...!",
									theme: 'defaultTheme',
									layout: 'center',
									type: 'error',
									timeout: 5000,
								});
								$("#btn-login").html('<i class="fa fa-sign-in"></i> Acceder');

							});

						} else if (response == 5) {

							$("#login").fadeIn(1000, function () {

								var n = noty({
									text: "<span class='fa fa-warning'></span> HA OCURRIDO UN ERROR EN EL PROCESAMIENTO DE LA INFORMACION, VERIFIQUE NUEVAMENTE POR FAVOR...!",
									theme: 'defaultTheme',
									layout: 'center',
									type: 'error',
									timeout: 5000,
								});
								$("#btn-login").html('<i class="fa fa-sign-in"></i> Acceder');

							});

						} else {

							$("#login").fadeIn(1000, function () {

								$("#btn-login").html('<i class="fa fa-sign-in"></i> Acceder');
								setTimeout(' window.location.href = "panel"; ', 500);

							});
						}
					}
				});
				return false;
			}
		}
		/* login submit */
	});
});
/* FUNCION JQUERY PARA VALIDAR ACCESO DE USUARIOS*/


/* FUNCION JQUERY PARA VALIDAR ACCESO DE USUARIOS*/
$('document').ready(function () {

	$("#lockscreen").validate({
		rules:
		{
			usuario: { required: true, },
			password: { required: true, },
		},
		messages:
		{
			usuario: { required: "Ingrese Usuario de Acceso" },
			password: { required: "Ingrese Clave de Acceso" },
		},
		submitHandler: function (form) {

			var data = $("#lockscreen").serialize();

			$.ajax({
				type: 'POST',
				url: 'lockscreen.php',
				async: false,
				data: data,
				beforeSend: function () {
					$("#login").fadeOut(1000);

					var n = noty({
						text: "<span class='fa fa-refresh'></span> VERIFICANDO INFORMACI&Oacute;N, POR FAVOR ESPERE......",
						theme: 'defaultTheme',
						layout: 'center',
						type: 'information',
						timeout: 1000,
					});
					//$("#btn-login").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success: function (response) {
					if (response == 1) {

						$("#login").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> POR FAVOR DEBE DE COMPLETAR LOS CAMPOS REQUERIDOS, VERIFIQUE NUEVAMENTE POR FAVOR...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'error',
								timeout: 5000,
							});
							$("#btn-login").html('<i class="fa fa-sign-in"></i> Acceder');

						});

					} else if (response == 2) {

						$("#login").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> LOS DATOS INGRESADOS NO EXISTEN, VERIFIQUE NUEVAMENTE POR FAVOR...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'error',
								timeout: 5000,
							});
							$("#btn-login").html('<i class="fa fa-sign-in"></i> Acceder');

						});

					} else if (response == 3) {

						$("#login").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> ESTE USUARIO SE ENCUENTRA ACTUALMENTE INACTIVO, VERIFIQUE NUEVAMENTE POR FAVOR...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'error',
								timeout: 5000,
							});
							$("#btn-login").html('<i class="fa fa-sign-in"></i> Acceder');

						});

					} else if (response == 4) {

						$("#login").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> EL PASSWORD INGRESADO ES ERRONEO, VERIFIQUE NUEVAMENTE POR FAVOR...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'error',
								timeout: 5000,
							});
							$("#btn-login").html('<i class="fa fa-sign-in"></i> Acceder');

						});

					} else if (response == 5) {

						$("#login").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> HA OCURRIDO UN ERROR EN EL PROCESAMIENTO DE LA INFORMACION, VERIFIQUE NUEVAMENTE POR FAVOR...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'error',
								timeout: 5000,
							});
							$("#btn-login").html('<i class="fa fa-sign-in"></i> Acceder');

						});

					} else {

						$("#login").fadeIn(1000, function () {

							$("#btn-login").html('<i class="fa fa-sign-in"></i> Acceder');
							setTimeout(' window.location.href = "panel"; ', 500);

						});
					}
				}
			});
			return false;
		}
		/* login submit */
	});
});
/* FUNCION JQUERY PARA VALIDAR ACCESO DE USUARIOS*/



/* FUNCION JQUERY PARA RECUPERAR CONTRASEÑA DE USUARIOS */
$('document').ready(function () {
	/* validation */
	$("#formrecover").validate({
		rules:
		{
			usuario: { required: true, },
			email: { required: true, email: true },
		},
		messages:
		{
			usuario: { required: "Ingrese Usuario de Acceso" },
			email: { required: "Ingrese su Correo Electronico", email: "Ingrese un Correo Electronico Valido" },
		},
		submitHandler: function (form) {

			var data = $("#formrecover").serialize();

			$.ajax({
				type: 'POST',
				url: 'index.php',
				async: false,
				data: data,
				beforeSend: function () {
					$("#recover").fadeOut();

					var n = noty({
						text: "<span class='fa fa-refresh'></span> VERIFICANDO INFORMACI&Oacute;N, POR FAVOR ESPERE......",
						theme: 'defaultTheme',
						layout: 'center',
						type: 'information',
						timeout: 1000,
					});
				},
				success: function (data) {
					if (data == 1) {

						$("#recover").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> POR FAVOR DEBE DE COMPLETAR LOS CAMPOS REQUERIDOS, VERIFIQUE NUEVAMENTE POR FAVOR...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'error',
								timeout: 5000,
							});
							$("#btn-recuperar").html('<span class="fa fa-check-square-o"></span> Recuperar Password');

						});

					} else if (data == 2) {

						$("#recover").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> LOS DATOS INGRESADOS NO FUERON ENCONTRADOS ACTUALMENTE, VERIFIQUE NUEVAMENTE POR FAVOR...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'error',
								timeout: 5000,
							});
							$("#btn-recuperar").html('<span class="fa fa-check-square-o"></span> Recuperar Password');

						});

					} else if (data == 3) {

						$("#recover").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> SU NUEVA CLAVE DE ACCESO NO PUDO SER ENVIADA A SU CORREO, VERIFIQUE E INTENTE NUEVAMENTE POR FAVOR...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'error',
								timeout: 5000,
							});
							$("#btn-recuperar").html('<span class="fa fa-check-square-o"></span> Recuperar Password');

						});

					} else {

						$("#recover").fadeIn(1000, function () {

							$("#formrecover")[0].reset();
							var n = noty({
								text: '<center> ' + data + ' </center>',
								theme: 'defaultTheme',
								layout: 'center',
								type: 'information',
								timeout: 5000,
							});
							$("#btn-recuperar").html('<span class="fa fa-check-square-o"></span> Recuperar Password');

						});
					}
				}
			});
			return false;
		}
		/* form submit */
	});
});
/*  FIN DE FUNCION PARA RECUPERAR CONTRASEÑA DE USUARIOS */


/* FUNCION JQUERY PARA VALIDAR ACTUALIZACION DE CONTRASEÑA */
$('document').ready(function () {
	/* validation */
	$("#updatepassword").validate({
		rules:
		{
			usuario: { required: true },
			password: { required: true, minlength: 8 },
			password2: { required: true, minlength: 8, equalTo: "#txtPassword" },
		},
		messages:
		{
			usuario: { required: "Ingrese Usuario de Acceso" },
			password: { required: "Ingrese su Nuevo Password", minlength: "Ingrese 8 caracteres como minimo" },
			password2: { required: "Repita su Nuevo Password", minlength: "Ingrese 8 caracteres como minimo", equalTo: "Este Password no coincide" },
		},
		submitHandler: function (form) {

			var data = $("#updatepassword").serialize();
			var id = $("#updatepassword").attr("data-id");
			var codigo = id;

			$.ajax({
				type: 'POST',
				url: 'password.php?codigo=' + codigo,
				async: false,
				data: data,
				beforeSend: function () {
					$("#save").fadeOut();
					$("#btn-update").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success: function (data) {
					if (data == 1) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> POR FAVOR DEBE DE COMPLETAR LOS CAMPOS REQUERIDOS, VERIFIQUE NUEVAMENTE POR FAVOR...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'error',
								timeout: 5000,
							});
							$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');

						});

					}
					else if (data == 2) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> NO PUEDE USAR LA CLAVE ACTUAL, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'error',
								timeout: 5000,
							});
							$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');

						});

					} else {

						$("#save").fadeIn(1000, function () {


							$("#updatepassword")[0].reset();
							var n = noty({
								text: '<center> ' + data + ' </center>',
								theme: 'defaultTheme',
								layout: 'center',
								type: 'information',
								timeout: 5000,
							});
							$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
							setTimeout(' window.location.href = "logout"; ', 5000);

						});
					}
				}
			});
			return false;
		}
		/* form submit */
	});
});
/* FIN DE  FUNCION JQUERY PARA VALIDAR ACTUALIZACION DE CONTRASEÑA */


















/* FUNCION JQUERY PARA VALIDAR ACTUALIZACION DE CONFIGURACION GENERAL */
$('document').ready(function () {
	/* validation */
	$("#configuracion").validate({
		rules:
		{
			cuit: { required: true, digits: false },
			nomsucursal: { required: true },
			tlfsucursal: { required: true, digits: false },
			correosucursal: { required: true, email: true },
			search_provincia: { required: false },
			search_localidad: { required: false },
			direcsucursal: { required: true },
		},
		messages:
		{
			cuit: { required: "Ingrese N&deg; de Cuit", digits: "Ingrese solo digitos para N&deg; de Cuit" },
			nomsucursal: { required: "Ingrese Raz&oacute;n Social" },
			tlfsucursal: { required: "Ingrese N&deg; de Tel&eacute;fono", digits: "Ingrese solo digitos para Tel&eacute;fono" },
			correosucursal: { required: "Ingrese Correo Electronico", email: "Ingrese un Correo v&aacute;lido" },
			search_provincia: { required: "Ingrese Provincia" },
			search_localidad: { required: "Ingrese Localidad" },
			direcsucursal: { required: "Ingrese Direcci&oacute;n" },
		},
		submitHandler: function (form) {

			var data = $("#configuracion").serialize();
			var formData = new FormData($("#configuracion")[0]);

			$.ajax({
				type: 'POST',
				url: 'configuracion.php',
				async: false,
				data: formData,
				//necesario para subir archivos via ajax
				cache: false,
				contentType: false,
				processData: false,
				beforeSend: function () {
					$("#save").fadeOut();
					$("#btn-update").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success: function (data) {
					if (data == 1) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> POR FAVOR DEBE DE COMPLETAR LOS CAMPOS REQUERIDOS, VERIFIQUE NUEVAMENTE POR FAVOR...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'error',
								timeout: 5000,
							});
							$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');

						});

					} else {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: '<center> ' + data + ' </center>',
								theme: 'defaultTheme',
								layout: 'center',
								type: 'success',
								timeout: 5000,
							});
							$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');

						});
					}
				}
			});
			return false;
		}
		/* form submit */
	});
});
/* FIN DE  FUNCION JQUERY PARA VALIDAR ACTUALIZACION DE CONFIGURACION GENERAL */

















/* FUNCION JQUERY PARA VALIDAR REGISTRO DE USUARIOS */
$('document').ready(function () {
	jQuery.validator.addMethod("lettersonly", function (value, element) {
		return this.optional(element) || /^[a-zA-ZñÑáéíóúÁÉÍÓÚ,. ]+$/i.test(value);
	});

	/* validation */
	$("#saveuser").validate({
		rules:
		{
			dni: { required: true, digits: true, minlength: 7 },
			nombres: { required: true, lettersonly: true },
			id_sexo: { required: true },
			search_provincia: { required: true },
			search_localidad: { required: true },
			direccion: { required: true },
			telefono: { required: true },
			celular: { required: true },
			email: { required: true, email: true },
			cargo: { required: true },
			usuario: { required: true },
			password: { required: true, minlength: 8 },
			password2: { required: true, minlength: 8, equalTo: "#password" },
			nivel: { required: true },
			status: { required: true },
		},
		messages:
		{
			dni: { required: "Ingrese N&deg; de Documento", digits: "Ingrese solo d&iacute;gitos para N&deg; de Documento", minlength: "Ingrese 7 d&iacute;gitos como m&iacute;nimo" },
			nombres: { required: "Ingrese Nombre de Usuario", lettersonly: "Ingrese solo letras para Nombres" },
			id_sexo: { required: "Seleccione Sexo de Usuario" },
			search_provincia: { required: "Ingrese Provincia" },
			search_localidad: { required: "Ingrese Localidad" },
			direccion: { required: "Ingrese Direcci&oacute;n Domiciliaria" },
			telefono: { required: "Ingrese N&deg; de Tel&eacute;fono" },
			celular: { required: "Ingrese N&deg; de Celular" },
			email: { required: "Ingrese Email de Usuario", email: "Ingrese un Email V&aacute;lido" },
			cargo: { required: "Ingrese Cargo de Usuario" },
			usuario: { required: "Ingrese Usuario de Acceso" },
			password: { required: "Ingrese Password de Acceso", minlength: "Ingrese 8 caracteres como m&iacute;nimo" },
			password2: { required: "Repita Password de Acceso", minlength: "Ingrese 8 caracteres como m&iacute;nimo", equalTo: "Este Password no coincide" },
			nivel: { required: "Seleccione Nivel de Acceso" },
			status: { required: "Seleccione Status de Acceso" },
		},
		submitHandler: function (form) {

			var data = $("#saveuser").serialize();
			var formData = new FormData($("#saveuser")[0]);


			$.ajax({
				type: 'POST',
				url: 'usuarios.php',
				async: false,
				data: formData,
				//necesario para subir archivos via ajax
				cache: false,
				contentType: false,
				processData: false,
				beforeSend: function () {
					$("#save").fadeOut();
					$("#btn-submit").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success: function (data) {
					if (data == 1) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> LOS CAMPOS NO PUEDEN IR VACIOS, VERIFIQUE NUEVAMENTE POR FAVOR...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');

						});
					}
					else if (data == 2) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> YA EXISTE UN USUARIO CON ESTE N&deg; DE DNI, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');

						});
					}
					else if (data == 3) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> ESTE CORREO ELECTR&Oacute;NICO YA SE ENCUENTRA REGISTRADO, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');

						});
					}
					else if (data == 4) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> ESTE USUARIO YA SE ENCUENTRA REGISTRADO, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');

						});
					}
					else {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: '<center> ' + data + ' </center>',
								theme: 'defaultTheme',
								layout: 'center',
								type: 'information',
								timeout: 5000,
							});
							$('#myModalUser').modal('hide');
							$("#saveuser")[0].reset();
							$("#proceso").val("save");
							$("#codigo").val("");
							$('#usuarios').html("");
							$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
							$('#usuarios').append('<center><i class="fa fa-spin fa-spinner"></i> Por favor espere, cargando registros ......</center>').fadeIn("slow");
							setTimeout(function () {
								$('#usuarios').load("consultas?CargaUsuarios=si");
							}, 200);

						});
					}
				}
			});
			return false;
		}
		/* form submit */
	});
});
/*  FIN DE FUNCION PARA VALIDAR REGISTRO DE USUARIOS */

















/* FUNCION JQUERY PARA VALIDAR REGISTRO DE TIPOS DE DOCUMENTOS */
$('document').ready(function () {
	/* validation */
	$("#savedocumentos").validate({
		rules:
		{
			tipo_de_documento: { required: true, },
		},
		messages:
		{
			tipo_de_documento: { required: "Ingrese Nombre de Documento" },
		},
		submitHandler: function (form) {

			var data = $("#savedocumentos").serialize();

			$.ajax({
				type: 'POST',
				url: 'documentos.php',
				async: false,
				data: data,
				beforeSend: function () {
					$("#save").fadeOut();
					$("#btn-submit").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success: function (data) {
					if (data == 1) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> POR FAVOR DEBE DE COMPLETAR LOS CAMPOS REQUERIDOS, VERIFIQUE NUEVAMENTE POR FAVOR...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');

						});
					}
					else if (data == 2) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> ESTE NOMBRE DE DOCUMENTO YA EXISTE, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');

						});
					}
					else {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: '<center> ' + data + ' </center>',
								theme: 'defaultTheme',
								layout: 'center',
								type: 'information',
								timeout: 5000,
							});
							$("#savedocumentos")[0].reset();
							$("#proceso").val("save");
							$('#documentos').html("");
							$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
							$('#documentos').append('<center><i class="fa fa-spin fa-spinner"></i> Por favor espere, cargando registros ......</center>').fadeIn("slow");
							setTimeout(function () {
								$('#documentos').load("consultas?CargaDocumentos=si");
							}, 200);

						});
					}
				}
			});
			return false;
		}
		/* form submit */
	});
});
/*  FIN DE FUNCION PARA VALIDAR REGISTRO DE TIPOS DE DOCUMENTOS */












/* FUNCION JQUERY PARA VALIDAR REGISTRO DE PAISES */
$('document').ready(function () {
	/* validation */
	$("#savepaises").validate({
		rules:
		{
			npais: { required: true, },
			activo: { required: true, },
		},
		messages:
		{
			npais: { required: "Ingrese NoIngrese Nombre de Pais" },
			activo: { required: "Seleccione Status" },
		},
		submitHandler: function (form) {

			var data = $("#savepaises").serialize();

			$.ajax({
				type: 'POST',
				url: 'paises.php',
				async: false,
				data: data,
				beforeSend: function () {
					$("#save").fadeOut();
					$("#btn-submit").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success: function (data) {
					if (data == 1) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> POR FAVOR DEBE DE COMPLETAR LOS CAMPOS REQUERIDOS, VERIFIQUE NUEVAMENTE POR FAVOR...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');

						});
					}
					else if (data == 2) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> ESTE NOIngrese Nombre de Pais YA EXISTE, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');

						});
					}
					else {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: '<center> ' + data + ' </center>',
								theme: 'defaultTheme',
								layout: 'center',
								type: 'information',
								timeout: 5000,
							});
							$("#savepaises")[0].reset();
							$("#proceso").val("save");
							$('#paises').html("");
							$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
							$('#paises').append('<center><i class="fa fa-spin fa-spinner"></i> Por favor espere, cargando registros ......</center>').fadeIn("slow");
							setTimeout(function () {
								$('#paises').load("consultas?CargaPaises=si");
							}, 200);

						});
					}
				}
			});
			return false;
		}
		/* form submit */
	});
});
/*  FIN DE FUNCION PARA VALIDAR REGISTRO DE PAISES */













/* FUNCION JQUERY PARA VALIDAR REGISTRO DE PROVINCIAS */
$('document').ready(function () {
	/* validation */
	$("#saveprovincias").validate({
		rules:
		{
			nprovincia: { required: true, },
			id_pais: { required: true, },
			activo: { required: true, },
		},
		messages:
		{
			nprovincia: { required: "Ingrese Nombre de Provincia" },
			id_pais: { required: "Seleccione Pais" },
			activo: { required: "Seleccione Status" },
		},
		submitHandler: function (form) {

			var data = $("#saveprovincias").serialize();

			$.ajax({
				type: 'POST',
				url: 'provincias.php',
				async: false,
				data: data,
				beforeSend: function () {
					$("#save").fadeOut();
					$("#btn-submit").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success: function (data) {
					if (data == 1) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> POR FAVOR DEBE DE COMPLETAR LOS CAMPOS REQUERIDOS, VERIFIQUE NUEVAMENTE POR FAVOR...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');

						});
					}
					else if (data == 2) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> ESTE NOMBRE DE PROVINCIA YA EXISTE, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');

						});
					}
					else {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: '<center> ' + data + ' </center>',
								theme: 'defaultTheme',
								layout: 'center',
								type: 'information',
								timeout: 5000,
							});
							$("#saveprovincias")[0].reset();
							$("#proceso").val("save");
							$('#provincias').html("");
							$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
							$('#provincias').append('<center><i class="fa fa-spin fa-spinner"></i> Por favor espere, cargando registros ......</center>').fadeIn("slow");
							setTimeout(function () {
								$('#provincias').load("consultas?CargaProvincias=si");
							}, 200);

						});
					}
				}
			});
			return false;
		}
		/* form submit */
	});
});
/*  FIN DE FUNCION PARA VALIDAR REGISTRO DE PROVINCIAS */














/* FUNCION JQUERY PARA VALIDAR REGISTRO DE DEPARTAMENTOS */
$('document').ready(function () {
	/* validation */
	$("#savedepartamentos").validate({
		rules:
		{
			ndepartamento: { required: true, },
			id_pais: { required: true, },
			id_provincia: { required: true, },
			activo: { required: true, },
		},
		messages:
		{
			ndepartamento: { required: "Ingrese Nombre de Departamento" },
			id_pais: { required: "Seleccione Pais" },
			id_provincia: { required: "Seleccione Provincia" },
			activo: { required: "Seleccione Status" },
		},
		submitHandler: function (form) {

			var data = $("#savedepartamentos").serialize();

			$.ajax({
				type: 'POST',
				url: 'departamentos.php',
				async: false,
				data: data,
				beforeSend: function () {
					$("#save").fadeOut();
					$("#btn-submit").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success: function (data) {
					if (data == 1) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> POR FAVOR DEBE DE COMPLETAR LOS CAMPOS REQUERIDOS, VERIFIQUE NUEVAMENTE POR FAVOR...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');

						});
					}
					else if (data == 2) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> ESTE NOMBRE DE DEPARTAMENTO YA EXISTE, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');

						});
					}
					else {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: '<center> ' + data + ' </center>',
								theme: 'defaultTheme',
								layout: 'center',
								type: 'information',
								timeout: 5000,
							});
							$("#savedepartamentos")[0].reset();
							$("#proceso").val("save");
							$('#departamentos').html("");
							$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
							$('#departamentos').append('<center><i class="fa fa-spin fa-spinner"></i> Por favor espere, cargando registros ......</center>').fadeIn("slow");
							setTimeout(function () {
								$('#departamentos').load("consultas?CargaDepartamentos=si");
							}, 200);

						});
					}
				}
			});
			return false;
		}
		/* form submit */
	});
});
/*  FIN DE FUNCION PARA VALIDAR REGISTRO DE DEPARTAMENTOS */














/* FUNCION JQUERY PARA VALIDAR REGISTRO DE LOCALIDADES */
$('document').ready(function () {
	/* validation */
	$("#savelocalidades").validate({
		rules:
		{
			nlocalidad: { required: true, },
			id_pais: { required: true, },
			id_provincia: { required: true, },
			id_departamento: { required: true, },
			codigo_postal: { required: true, },
			activo: { required: true, },
		},
		messages:
		{
			nlocalidad: { required: "Ingrese Nombre de Localidad" },
			id_pais: { required: "Seleccione Pais" },
			id_provincia: { required: "Seleccione Provincia" },
			id_departamento: { required: "Seleccione Departamento" },
			codigo_postal: { required: "Ingrese Codigo Postal" },
			activo: { required: "Seleccione Status" },
		},
		submitHandler: function (form) {

			var data = $("#savelocalidades").serialize();

			$.ajax({
				type: 'POST',
				url: 'localidades.php',
				async: false,
				data: data,
				beforeSend: function () {
					$("#save").fadeOut();
					$("#btn-submit").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success: function (data) {
					if (data == 1) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> POR FAVOR DEBE DE COMPLETAR LOS CAMPOS REQUERIDOS, VERIFIQUE NUEVAMENTE POR FAVOR...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');

						});
					}
					else if (data == 2) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> ESTE NOMBRE DE LOCALIDAD YA EXISTE, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');

						});
					}
					else {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: '<center> ' + data + ' </center>',
								theme: 'defaultTheme',
								layout: 'center',
								type: 'information',
								timeout: 5000,
							});
							$("#savelocalidades")[0].reset();
							$("#proceso").val("save");
							$('#localidades').html("");
							$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
							$('#localidades').append('<center><i class="fa fa-spin fa-spinner"></i> Por favor espere, cargando registros ......</center>').fadeIn("slow");
							setTimeout(function () {
								$('#localidades').load("consultas?CargaLocalidades=si");
							}, 200);

						});
					}
				}
			});
			return false;
		}
		/* form submit */
	});
});
/*  FIN DE FUNCION PARA VALIDAR REGISTRO DE LOCALIDADES */














/* FUNCION JQUERY PARA VALIDAR REGISTRO DE BARRIOS */
$('document').ready(function () {
	/* validation */
	$("#savebarrios").validate({
		rules:
		{
			nbarrio: { required: true, },
			id_pais: { required: true, },
			id_provincia: { required: true, },
			id_departamento: { required: true, },
			id_localidad: { required: true, },
			activo: { required: true, },
		},
		messages:
		{
			nbarrio: { required: "Ingrese Nombre de Barrio" },
			id_pais: { required: "Seleccione Pais" },
			id_provincia: { required: "Seleccione Provincia" },
			id_departamento: { required: "Seleccione Departamento" },
			id_localidad: { required: "Seleccione Localidad" },
			activo: { required: "Seleccione Status" },
		},
		submitHandler: function (form) {

			var data = $("#savebarrios").serialize();

			$.ajax({
				type: 'POST',
				url: 'barrios.php',
				async: false,
				data: data,
				beforeSend: function () {
					$("#save").fadeOut();
					$("#btn-submit").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success: function (data) {
					if (data == 1) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> POR FAVOR DEBE DE COMPLETAR LOS CAMPOS REQUERIDOS, VERIFIQUE NUEVAMENTE POR FAVOR...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');

						});
					}
					else if (data == 2) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> ESTE NOMBRE DE BARRIO YA EXISTE, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');

						});
					}
					else {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: '<center> ' + data + ' </center>',
								theme: 'defaultTheme',
								layout: 'center',
								type: 'information',
								timeout: 5000,
							});
							$("#savebarrios")[0].reset();
							$("#proceso").val("save");
							$('#barrios').html("");
							$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
							$('#barrios').append('<center><i class="fa fa-spin fa-spinner"></i> Por favor espere, cargando registros ......</center>').fadeIn("slow");
							setTimeout(function () {
								$('#barrios').load("consultas?CargaBarrios=si");
							}, 200);

						});
					}
				}
			});
			return false;
		}
		/* form submit */
	});
});
/*  FIN DE FUNCION PARA VALIDAR REGISTRO DE BARRIOS */















/* FUNCION JQUERY PARA VALIDAR REGISTRO DE CALLES */
$('document').ready(function () {
	/* validation */
	$("#savecalles").validate({
		rules:
		{
			ncalle: { required: true, },
			id_pais: { required: true, },
			id_provincia: { required: true, },
			id_departamento: { required: true, },
			id_localidad: { required: true, },
			activo: { required: true, },
		},
		messages:
		{
			ncalle: { required: "Ingrese Nombre de Calle" },
			id_pais: { required: "Seleccione Pais" },
			id_provincia: { required: "Seleccione Provincia" },
			id_departamento: { required: "Seleccione Departamento" },
			id_localidad: { required: "Seleccione Localidad" },
			activo: { required: "Seleccione Status" },
		},
		submitHandler: function (form) {

			var data = $("#savecalles").serialize();

			$.ajax({
				type: 'POST',
				url: 'calles.php',
				async: false,
				data: data,
				beforeSend: function () {
					$("#save").fadeOut();
					$("#btn-submit").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success: function (data) {
					if (data == 1) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> POR FAVOR DEBE DE COMPLETAR LOS CAMPOS REQUERIDOS, VERIFIQUE NUEVAMENTE POR FAVOR...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');

						});
					}
					else if (data == 2) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> ESTE NOMBRE DE CALLE YA EXISTE, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');

						});
					}
					else {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: '<center> ' + data + ' </center>',
								theme: 'defaultTheme',
								layout: 'center',
								type: 'information',
								timeout: 5000,
							});
							$("#savecalles")[0].reset();
							$("#proceso").val("save");
							$('#calles').html("");
							$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
							$('#calles').append('<center><i class="fa fa-spin fa-spinner"></i> Por favor espere, cargando registros ......</center>').fadeIn("slow");
							setTimeout(function () {
								$('#calles').load("consultas?CargaCalles=si");
							}, 200);

						});
					}
				}
			});
			return false;
		}
		/* form submit */
	});
});
/*  FIN DE FUNCION PARA VALIDAR REGISTRO DE CALLES */

















/* FUNCION JQUERY PARA VALIDAR REGISTRO DE PRODUCTO */
$('document').ready(function () {

	/* validation */
	$("#saveproducto").validate({
		rules:
		{
			descripcion: { required: true, },
		},
		messages:
		{
			descripcion: { required: "Ingrese Descripción de Producto" },
		},
		submitHandler: function (form) {

			var data = $("#saveproducto").serialize();

			$.ajax({
				type: 'POST',
				url: 'procedimientos.php',
				async: false,
				data: data,
				beforeSend: function () {
					$("#save").fadeOut();
					$("#btn-producto").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success: function (data) {
					if (data == 1) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> POR FAVOR DEBE DE COMPLETAR LOS CAMPOS REQUERIDOS, VERIFIQUE NUEVAMENTE POR FAVOR...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-producto").html('<span class="fa fa-save"></span> Guardar y Cerrar');

						});
					}
					else if (data == 2) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> ESTA PRODUCTO YA SE ENCUENTRA REGISTRADO, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-producto").html('<span class="fa fa-save"></span> Guardar y Cerrar');

						});
					}
					else {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: '<center> ' + data + ' </center>',
								theme: 'defaultTheme',
								layout: 'center',
								type: 'information',
								timeout: 5000,
							});
							$('#myModalAddProducto').modal('hide');
							$("#saveproducto")[0].reset();
							$("#btn-producto").html('<span class="fa fa-save"></span> Guardar y Cerrar');
						});
					}
				}
			});
			return false;
		}
		/* form submit */
	});
});
/* FUNCION JQUERY PARA VALIDAR REGISTRO DE PRODUCTO */



















/* FUNCION JQUERY PARA VALIDAR REGISTRO DE PERIODO FISCAL */
$('document').ready(function () {
	/* validation */
	$("#saveperiodo").validate({
		rules:
		{
			anio: { required: true, },
			vencimiento_de_reinscripcion: { required: true, },
			fecha_de_inicio_de_reinscripcion: { required: true, },
			primer_vencimiento_de_reinscripcion: { required: true, },
			aval_legal: { required: true, },
		},
		messages:
		{
			anio: { required: "Ingrese Periodo" },
			vencimiento_de_reinscripcion: { required: "Ingrese Vence Reinscripcion" },
			fecha_de_inicio_de_reinscripcion: { required: "Ingrese Inicio Reinscripcion" },
			primer_vencimiento_de_reinscripcion: { required: "Ingrese Primer Vence Reinscripcion" },
			aval_legal: { required: "Ingrese Aval Legal" },
		},
		submitHandler: function (form) {

			var data = $("#saveperiodo").serialize();

			$.ajax({
				type: 'POST',
				url: 'periodos.php',
				async: false,
				data: data,
				beforeSend: function () {
					$("#save").fadeOut();
					$("#btn-submit").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success: function (data) {
					if (data == 1) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> LOS CAMPOS NO PUEDEN IR VACIOS, VERIFIQUE NUEVAMENTE POR FAVOR...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');

						});
					}
					else if (data == 2) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> ESTE PERIODO FISCAL YA EXISTE, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');

						});
					}
					else {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: '<center> ' + data + ' </center>',
								theme: 'defaultTheme',
								layout: 'center',
								type: 'information',
								timeout: 5000,
							});
							$("#saveperiodo")[0].reset();
							$("#proceso").val("save");
							$("#id_periodo_fiscal").val("");
							$('#periodos').html("");
							$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
							$('#periodos').append('<center><i class="fa fa-spin fa-spinner"></i> Por favor espere, cargando registros ......</center>').fadeIn("slow");
							setTimeout(function () {
								$('#periodos').load("consultas?CargaPeriodos=si");
							}, 200);

						});
					}
				}
			});
			return false;
		}
		/* form submit */
	});
});
/*  FIN DE FUNCION PARA VALIDAR REGISTRO DE PERIODO FISCAL */

















/* FUNCION JQUERY PARA VALIDAR REGISTRO DE SISTEMAS DE CALIDAD */
$('document').ready(function () {
	/* validation */
	$("#savesistemas").validate({
		rules:
		{
			descripcion: { required: true, },
			activo: { required: true, },
		},
		messages:
		{
			descripcion: { required: "Ingrese Nombre de Sistema de Calidad" },
			activo: { required: "Seleccione Status" },
		},
		submitHandler: function (form) {

			var data = $("#savesistemas").serialize();

			$.ajax({
				type: 'POST',
				url: 'sistemas.php',
				async: false,
				data: data,
				beforeSend: function () {
					$("#save").fadeOut();
					$("#btn-submit").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success: function (data) {
					if (data == 1) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> LOS CAMPOS NO PUEDEN IR VACIOS, VERIFIQUE NUEVAMENTE POR FAVOR...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');

						});
					}
					else if (data == 2) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> ESTE SISTEMA DE CALIDAD YA EXISTE, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');

						});
					}
					else {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: '<center> ' + data + ' </center>',
								theme: 'defaultTheme',
								layout: 'center',
								type: 'information',
								timeout: 5000,
							});
							$("#savesistemas")[0].reset();
							$("#proceso").val("save");
							$("#id_sistema_de_calidad").val("");
							$('#sistemas').html("");
							$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
							$('#sistemas').append('<center><i class="fa fa-spin fa-spinner"></i> Por favor espere, cargando registros ......</center>').fadeIn("slow");
							setTimeout(function () {
								$('#sistemas').load("consultas?CargaSistemas=si");
							}, 200);

						});
					}
				}
			});
			return false;
		}
		/* form submit */
	});
});
/*  FIN DE FUNCION PARA VALIDAR REGISTRO DE SISTEMAS DE CALIDAD */



















/* FUNCION JQUERY PARA VALIDAR REGISTRO DE PROMOCIONES INDUSTRIALES */
$('document').ready(function () {
	/* validation */
	$("#savepromociones").validate({
		rules:
		{
			descripcion: { required: true, },
			activo: { required: true, },
		},
		messages:
		{
			descripcion: { required: "Ingrese Nombre de Promocion" },
			activo: { required: "Seleccione Status" },
		},
		submitHandler: function (form) {

			var data = $("#savepromociones").serialize();

			$.ajax({
				type: 'POST',
				url: 'promociones.php',
				async: false,
				data: data,
				beforeSend: function () {
					$("#save").fadeOut();
					$("#btn-submit").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success: function (data) {
					if (data == 1) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> LOS CAMPOS NO PUEDEN IR VACIOS, VERIFIQUE NUEVAMENTE POR FAVOR...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');

						});
					}
					else if (data == 2) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> ESTA PROMOCION INDUSTRIAL YA EXISTE, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');

						});
					}
					else {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: '<center> ' + data + ' </center>',
								theme: 'defaultTheme',
								layout: 'center',
								type: 'information',
								timeout: 5000,
							});
							$("#savepromociones")[0].reset();
							$("#proceso").val("save");
							$("#id_promocion_industrial").val("");
							$('#promociones').html("");
							$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
							$('#promociones').append('<center><i class="fa fa-spin fa-spinner"></i> Por favor espere, cargando registros ......</center>').fadeIn("slow");
							setTimeout(function () {
								$('#promociones').load("consultas?CargaPromociones=si");
							}, 200);

						});
					}
				}
			});
			return false;
		}
		/* form submit */
	});
});
/*  FIN DE FUNCION PARA VALIDAR REGISTRO DE PROMOCIONES INDUSTRIALES */















/* FUNCION JQUERY PARA VALIDAR REGISTRO INICIAL */
$('document').ready(function () {
	/* validation */
	$("#saveinicio").validate({
		rules:
		{
			cuit: { required: true, minlength: 11, maxlength: 11 },
			razonsocial: { required: true, lettersonly: false },
			search_localidad: { required: true, },
			search_barrio: { required: true, },
			search_calle: { required: true, },
			nombre: { required: true, lettersonly: true },
			id_tipo_de_afectacion: { required: true, },
			id_tipo_de_documento: { required: true, },
			documento: { required: true, maxlength: 8 },
			numero: { required: true, },
			piso: { required: false, },
			depto: { required: false, },
			referencias: { required: false, },
			email_fiscal: { required: true, email: true },
			tel_celular: { required: true, },
			password: { required: true, minlength: 8 },
			password2: { required: true, minlength: 8, equalTo: "#txtPassword" },
			captcha1: { required: true, },
		},
		messages:
		{
			cuit: { required: "Ingrese N&deg; de CUIT/CUIL", minlength: "Ingrese 11 d&iacute;gitos como minimo", maxlength: "Ingrese 11 d&iacute;gitos como m&aacute;ximo" },
			razonsocial: { required: "Ingrese Nombre/Razon Social", lettersonly: "Ingrese solo letras para Nombres" },
			search_localidad: { required: "Ingrese Nombre de Localidad" },
			search_barrio: { required: "Ingrese Nombre de Barrio" },
			search_calle: { required: "Ingrese Nombre de Calle" },
			nombre: { required: "Ingrese Apellido y Nombre", lettersonly: "Ingrese solo letras para Apellidos y Nombres" },
			id_tipo_de_afectacion: { required: "Seleccione Tipo de Afectaci&oacute;n" },
			id_tipo_de_documento: { required: "Seleccione Tipo de Documento" },
			documento: { required: "Ingrese N&deg; de Documento", maxlength: "Ingrese 8 d&iacute;gitos como m&aacute;ximo" },
			numero: { required: "Ingrese Numero" },
			piso: { required: "Ingrese N&deg; de Piso" },
			depto: { required: "Ingrese N&deg; de Departamento" },
			referencias: { required: "Ingrese referencias Domicilio" },
			email_fiscal: { required: "Ingrese Email de Usuario", email: "Ingrese un Email V&aacute;lido" },
			tel_celular: { required: "Ingrese N&deg; de Celular" },
			password: { required: "Ingrese Password de Acceso", minlength: "Ingrese 8 caracteres como m&iacute;nimo" },
			password2: { required: "Repita Password de Acceso", minlength: "Ingrese 8 caracteres como m&iacute;nimo", equalTo: "Este Password no coincide" },
			captcha1: { required: "Ingrese Codigo" },
		},
		submitHandler: function (form) {

			var data = $("#saveinicio").serialize();
			var formData = new FormData($("#saveinicio")[0]);

			$.ajax({
				type: 'POST',
				url: 'registro.php',
				async: false,
				data: formData,
				//necesario para subir archivos via ajax
				cache: false,
				contentType: false,
				processData: false,
				beforeSend: function () {
					$("#save").fadeOut();
					$("#btn-submit").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success: function (data) {
					if (data == 1) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> POR FAVOR DEBE DE COMPLETAR LOS CAMPOS REQUERIDOS, VERIFIQUE NUEVAMENTE POR FAVOR...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							document.getElementById('siimage').src = 'assets/captcha/securimage_show.php?sid=' + Math.random(); this.blur();
							$('#captcha1').val("");
							$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');

						});
					}
					else if (data == 2) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> EL CODIGO DE LA IMAGEN INGRESADA ES INVALIDO, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');

						});
					}
					else if (data == 3) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> POR FAVOR DEBE DE CARGAR LA CONSTANCIA DE VINCULACION, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							document.getElementById('siimage').src = 'assets/captcha/securimage_show.php?sid=' + Math.random(); this.blur();
							$('#captcha1').val("");
							$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');

						});
					}
					else if (data == 4) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> LA CONSTANCIA DE VINCULACION A CARGAR NO CUMPLE CON EL FORMATO EXIGIDO, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							document.getElementById('siimage').src = 'assets/captcha/securimage_show.php?sid=' + Math.random(); this.blur();
							$('#captcha1').val("");
							$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');

						});
					}
					else if (data == 5) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> EL ARCHIVO A CARGAR NO PUEDE SOBREPASAR EL TAMAÑO EXIGIDO, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							document.getElementById('siimage').src = 'assets/captcha/securimage_show.php?sid=' + Math.random(); this.blur();
							$('#captcha1').val("");
							$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');

						});
					}
					else if (data == 6) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> POR FAVOR DEBE DE CARGAR LA INSCRIPCION DE AFIP, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							document.getElementById('siimage').src = 'assets/captcha/securimage_show.php?sid=' + Math.random(); this.blur();
							$('#captcha1').val("");
							$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');

						});
					}
					else if (data == 7) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> LA INSCRIPCION DE AFIP A CARGAR NO CUMPLE CON EL FORMATO EXIGIDO, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							document.getElementById('siimage').src = 'assets/captcha/securimage_show.php?sid=' + Math.random(); this.blur();
							$('#captcha1').val("");
							$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');

						});
					}
					else if (data == 8) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> EL ARCHIVO A CARGAR NO PUEDE SOBREPASAR EL TAMAÑO EXIGIDO, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							document.getElementById('siimage').src = 'assets/captcha/securimage_show.php?sid=' + Math.random(); this.blur();
							$('#captcha1').val("");
							$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');

						});
					}
					else if (data == 9) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> ESTE N&deg; DE CUIT/CUIL YA SE ENCUENTRA REGISTRADO, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							document.getElementById('siimage').src = 'assets/captcha/securimage_show.php?sid=' + Math.random(); this.blur();
							$('#captcha1').val("");
							$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');

						});
					}
					else {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: '<center> ' + data + ' </center>',
								theme: 'defaultTheme',
								layout: 'center',
								type: 'information',
								timeout: 5000,
							});
							$("#saveinicio")[0].reset();
							setTimeout("location.href='index'", 500);
							document.getElementById('siimage').src = 'assets/captcha/securimage_show.php?sid=' + Math.random(); this.blur();
							$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');

						});
					}
				}
			});
			return false;
		}
		/* form submit */
	});
});
/*  FIN DE FUNCION PARA VALIDAR REGISTRO INICIAL */


/* FUNCION JQUERY PARA VALIDAR SOLICITUD */
$('document').ready(function () {
	/* validation */
	$("#verificasolicitud").validate({
		rules:
		{
			observaciones_status: { required: true, },
			status: { required: false, },
		},
		messages:
		{
			observaciones_status: { required: "Ingrese Observaciones" },
			status: { required: "Seleccione Status" },
		},
		submitHandler: function (form) {

			var data = $("#verificasolicitud").serialize();

			if ($('input[type=radio]:checked').length === 0) {

				swal("Oops", "POR FAVOR DEBE DE SELECCIONAR EL STATUS DE SOLICITUD!", "error");
				return false;

			} else {

				$.ajax({
					type: 'POST',
					url: 'panel.php',
					async: false,
					data: data,
					beforeSend: function () {
						$("#save").fadeOut();
						$("#btn-submit").html('<i class="fa fa-refresh"></i> Verificando...');
					},
					success: function (data) {
						if (data == 1) {

							$("#save").fadeIn(1000, function () {

								var n = noty({
									text: "<span class='fa fa-warning'></span> POR FAVOR DEBE DE COMPLETAR LOS CAMPOS REQUERIDOS, VERIFIQUE NUEVAMENTE POR FAVOR...!",
									theme: 'defaultTheme',
									layout: 'center',
									type: 'warning',
									timeout: 5000,
								});
								$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');

							});
						}
						else if (data == 2) {

							$("#save").fadeIn(1000, function () {

								var n = noty({
									text: "<span class='fa fa-warning'></span> HA OCURRIDO UN PROBLEMA CON LA VERIFICACION, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
									theme: 'defaultTheme',
									layout: 'center',
									type: 'warning',
									timeout: 5000,
								});
								$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');

							});
						}
						else if (data == 3) {

							$("#save").fadeIn(1000, function () {

								var n = noty({
									text: "<span class='fa fa-warning'></span> HA OCURRIDO UN PROBLEMA CON EL ENVIO DE INFORMACION AL EMAIL FISCAL DEL CONTRIBUYENTE, VERIFIQUE E INTENTE NUEVAMENTE POR FAVOR ...!",
									theme: 'defaultTheme',
									layout: 'center',
									type: 'warning',
									timeout: 5000,
								});
								$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');

							});
						}
						else {

							$("#save").fadeIn(1000, function () {

								var n = noty({
									text: '<center> ' + data + ' </center>',
									theme: 'defaultTheme',
									layout: 'center',
									type: 'information',
									timeout: 5000,
								});
								$('#myModalSolicitud').modal('hide');
								$("#verificasolicitud")[0].reset();
								$("#proceso").val("save");
								$('#solicitudes').html("");
								$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
								$('#solicitudes').append('<center><i class="fa fa-spin fa-spinner"></i> Por favor espere, cargando registros ......</center>').fadeIn("slow");
								setTimeout(function () {
									$('#solicitudes').load("consultas?CargaSolicitudes=si");
								}, 200);

							});
						}
					}
				});
				return false;
			}
		}
		/* form submit */
	});
});
/*  FIN DE FUNCION PARA VALIDAR SOLICITUD */













/* FUNCION JQUERY PARA VALIDAR update DE DATOS GENERALES contribuyente*/
$('document').ready(function () {
	jQuery.validator.addMethod("lettersonly", function (value, element) {
		return this.optional(element) || /^[a-zA-ZñÑáéíóúÁÉÍÓÚ,. ]+$/i.test(value);
	});

	/* validation */
	$('#saveContribuyente').validate({
		rules:
		{

			//razon_social: { required: true, lettersonly: false },
			fecha_actividad_contribuyente: { required: true, },
			id_regimen_ib: { required: true, },
			numero_de_ib: { required: false, },
			id_condicion_iva: { required: true, },
			id_naturaleza_juridica: { required: true, },
			//email_fiscal: { required: true, email: true },


			zona_administracion: { required: true, },
			buscar_provincia_administracion: { required: true, },
			buscar_localidad2: { required: true, },
			buscar_barrio2: { required: true, },
			buscar_calle2: { required: true, },
			numero_administracion: { required: true, },
			piso_administracion: { required: false, },
			depto_administracion: { required: false, },
			ref_domicilio_administracion: { required: false, },

			//tel_fijo_administracion: { required: false, },
			//tel_celular_administracion: { required: false, },
		},
		messages:
		{

			//razon_social: { required: "Ingrese Nombre o Razon Social de la Empresa", lettersonly: "Ingrese solo letras para Nombres" },
			fecha_actividad_contribuyente: { required: "Ingrese Fecha de Inicio Actividad de Contribuyente" },
			id_regimen_ib: { required: "Seleccione Régimen de Ingresos Brutos" },
			numero_de_ib: { required: "Ingrese Nº de Ingresos Brutos" },
			id_condicion_iva: { required: "Seleccione Condición de Iva" },
			id_naturaleza_juridica: { required: "Seleccione Naturaleza Juridica" },

			//email_fiscal: { required: "Ingrese Email Fiscal", email: "Ingrese un Email V&aacute;lido" },


			zona_administracion: { required: "Seleccione Zona Administrativa" },
			buscar_provincia_administracion: { required: "Ingrese Nombre de Provincia Administrativa" },
			buscar_localidad2: { required: "Ingrese Nombre de Localidad Administrativa" },
			buscar_barrio2: { required: "Ingrese Nombre de Barrio Administrativa" },
			buscar_calle2: { required: "Ingrese Nombre de Calle Administrativa" },
			numero_administracion: { required: "Ingrese Numero" },
			piso_administracion: { required: "Ingrese N&deg; de Piso" },
			depto_administracion: { required: "Ingrese N&deg; de Departamento" },
			ref_domicilio_administracion: { required: "Ingrese referencias Domicilio" },

		},
		submitHandler: function (form) {
			console.log(form)
			var data = $("#saveContribuyente").serialize();
			//var seccion = $("input#secciongeneral").val();
			//var industria = $("input#id_industria").val();

			$.ajax({
				type: 'POST',
				url: '/updateContribuyente',
				data: {
					_token: $('meta[name="csrf-token"]').attr('content'),
					data: data,
				},

				beforeSend: function () {
					$("#save").fadeOut();
					$("#btn-submit").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success: function (data) {

					console.log("respuesta", data);

					if (data.status == 2) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> POR FAVOR DEBE DE COMPLETAR LOS CAMPOS REQUERIDOS, VERIFIQUE NUEVAMENTE POR FAVOR...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-submit").html('<span class="fa fa-save"></span> Continuar');

						});
					}
					else if (data.status == 1) {

						$("#save").fadeIn(1300, function () {

							var n = noty({
								text: "<span class='fa fa-warning'>" + data.msg + "</span>",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-submit").html('<span class="fa fa-save"></span> Continuar');

						});
					}
					else if (data.status == 200) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: '<center> ' + data.msg + ' </center>',
								theme: 'defaultTheme',
								layout: 'center',
								type: 'information',
								timeout: 5000,
							});
							//$('#secciones').load("formularios.php?BuscaFormularioProcedimiento=si&seccion=" + seccion + "&in=" + industria);
							$("#btn-submit").html('<span class="fa fa-save"></span> Guardar datos');
						});
					}
				}
			});
			return false;
		}
		/* form submit */
	});
});
/* FUNCION JQUERY PARA VALIDAR update DE DATOS GENERALES contribuyente */


/* FUNCION JQUERY PARA VALIDAR REGISTRO DE DATOS GENERALES industriales*/
$('document').ready(function () {
	jQuery.validator.addMethod("lettersonly", function (value, element) {
		return this.optional(element) || /^[a-zA-ZñÑáéíóúÁÉÍÓÚ,. ]+$/i.test(value);
	});

	/* validation */
	$('#savegeneral').validate({
		rules:
		{
			id_periodo_fiscal: { required: true, },
			razon_social: { required: true, lettersonly: false },
			fecha_actividad_contribuyente: { required: true, },
			id_regimen_ib: { required: true, },
			numero_de_ib: { required: false, },
			id_condicion_iva: { required: true, },
			id_naturaleza_juridica: { required: true, },
			nombre_de_fantasia: { required: true, lettersonly: false },
			fecha_actividad_industria: { required: true, },
			es_casa_central: { required: true, },
			tel_fijo: { required: false, },
			tel_celular: { required: true, },
			cod_postal: { required: true, },
			email_fiscal: { required: true, email: true },

			zona_planta: { required: true, },
			buscar_localidad: { required: true, },
			buscar_barrio: { required: true, },
			buscar_calle: { required: true, },
			numero_planta: { required: true, },
			piso_planta: { required: false, },
			depto_planta: { required: false, },
			ref_domicilio_planta: { required: false, },

			zona_administracion: { required: true, },
			buscar_provincia_administracion: { required: true, },
			buscar_localidad2: { required: true, },
			buscar_barrio2: { required: true, },
			buscar_calle2: { required: true, },
			numero_administracion: { required: true, },
			piso_administracion: { required: false, },
			depto_administracion: { required: false, },
			ref_domicilio_administracion: { required: false, },

			tel_fijo_administracion: { required: false, },
			tel_celular_administracion: { required: false, },
			direccion_gps: { required: true, },
			latitud: { required: true, },
			longitud: { required: true, },
			pagina_web: { required: false, url: true },
			email: { required: false, email: true },
		},
		messages:
		{
			id_periodo_fiscal: { required: "Seleccione Periodo Fiscal" },
			razon_social: { required: "Ingrese Nombre o Razon Social de la Empresa", lettersonly: "Ingrese solo letras para Nombres" },
			fecha_actividad_contribuyente: { required: "Ingrese Fecha de Inicio Actividad de Contribuyente" },
			id_regimen_ib: { required: "Seleccione Régimen de Ingresos Brutos" },
			numero_de_ib: { required: "Ingrese Nº de Ingresos Brutos" },
			id_condicion_iva: { required: "Seleccione Condición de Iva" },
			id_naturaleza_juridica: { required: "Seleccione Naturaleza Juridica" },
			nombre_de_fantasia: { required: "Ingrese Nombre de Establecimiento", lettersonly: "Ingrese solo letras para Nombres" },
			fecha_actividad_industria: { required: "Ingrese Fecha de Inicio Actividad de Industria" },
			es_casa_central: { required: "Seleccione si Es Casa Central", },
			tel_fijo: { required: "Ingrese Nº de Teléfono Fijo" },
			tel_celular: { required: "Ingrese Nº de Celular de Contacto de Empresa" },
			cod_postal: { required: "Ingrese Codigo Postal" },
			email_fiscal: { required: "Ingrese Email Fiscal", email: "Ingrese un Email V&aacute;lido" },

			zona: { required: "Seleccione Zona de Planta" },
			buscar_localidad: { required: "Ingrese Nombre de Localidad de Planta" },
			buscar_barrio: { required: "Ingrese Nombre de Barrio de Planta" },
			buscar_calle: { required: "Ingrese Nombre de Calle de Planta" },
			numero_planta: { required: "Ingrese Numero" },
			piso_planta: { required: "Ingrese N&deg; de Piso" },
			depto_planta: { required: "Ingrese N&deg; de Departamento" },
			ref_domicilio_planta: { required: "Ingrese referencias Domicilio" },

			zona_administracion: { required: "Seleccione Zona Administrativa" },
			buscar_provincia_administracion: { required: "Ingrese Nombre de Provincia Administrativa" },
			buscar_localidad2: { required: "Ingrese Nombre de Localidad Administrativa" },
			buscar_barrio2: { required: "Ingrese Nombre de Barrio Administrativa" },
			buscar_calle2: { required: "Ingrese Nombre de Calle Administrativa" },
			numero_administracion: { required: "Ingrese Numero" },
			piso_administracion: { required: "Ingrese N&deg; de Piso" },
			depto_administracion: { required: "Ingrese N&deg; de Departamento" },
			ref_domicilio_administracion: { required: "Ingrese referencias Domicilio" },

			tel_fijo_administracion: { required: "Ingrese Nº de Teléfono Fijo" },
			tel_celular_administracion: { required: "Ingrese Nº de Celular de Contacto en Administración" },
			direccion_gps: { required: "Ingrese Dirección GPS" },
			latitud: { required: "Ingrese Coordenadas de Latitud" },
			longitud: { required: "Ingrese Coordenadas de Longitud" },
			pagina_web: { required: "Ingrese Url de Pagina", url: "Ingrese un Dirección de Url V&aacute;lida" },
			email: { required: "Ingrese Email de Empresa", email: "Ingrese un Email V&aacute;lido" },
		},
		submitHandler: function (form) {
			console.log(form)
			var data = $("#savegeneral").serialize();
			var seccion = $("input#secciongeneral").val();
			var industria = $("input#id_industria").val();

			$.ajax({
				type: 'POST',
				url: '/saveGenerales',
				async: false,
				data: {
					_token: $('meta[name="csrf-token"]').attr('content'),
					data: data,
				},
				beforeSend: function () {
					$("#save").fadeOut();
					$("#btn-submit").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success: function (data) {


					$("#id_industria_modal").val(data.id_industria);

					if (data.success == 1) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> POR FAVOR DEBE DE COMPLETAR LOS CAMPOS REQUERIDOS, VERIFIQUE NUEVAMENTE POR FAVOR...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-submit").html('<span class="fa fa-save"></span> Continuar');

						});
					}
					else if (data.status == 2) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> DEBE DE INGRESAR UN EMAIL DIFERENTE AL INGRESADO EN EL FORMULARIO DE REGISTRO INICIAL, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-submit").html('<span class="fa fa-save"></span> Continuar');

						});
					}
					else if (data.status == 3) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> ESTE NOMBRE DE ESTABLECIMIENTO YA SE ENCUENTRA REGISTRADO, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-submit").html('<span class="fa fa-save"></span> Continuar');

						});
					}
					else if (data.status == 200) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: '<center> ' + data.msg + ' </center>',
								theme: 'defaultTheme',
								layout: 'center',
								type: 'information',
								timeout: 5000,
							});

							$("#btn-submit").html('<span class="fa fa-save"></span> Continuar');
						});
					}
				}
			});
			return false;
		}
		/* form submit */
	});
});
/* FUNCION JQUERY PARA VALIDAR REGISTRO DE DATOS GENERALES industriales */

/* FUNCION JQUERY PARA VALIDAR update DE DATOS GENERALES industriales */
$('document').ready(function () {
	jQuery.validator.addMethod("lettersonly", function (value, element) {
		return this.optional(element) || /^[a-zA-ZñÑáéíóúÁÉÍÓÚ,. ]+$/i.test(value);
	});

	/* validation */
	$('#updategeneral').validate({
		rules:
		{
			id_periodo_fiscal: { required: true, },
			razon_social: { required: true, lettersonly: false },
			fecha_actividad_contribuyente: { required: true, },
			id_regimen_ib: { required: true, },
			numero_de_ib: { required: false, },
			id_condicion_iva: { required: true, },
			id_naturaleza_juridica: { required: true, },
			nombre_de_fantasia: { required: true, lettersonly: false },
			fecha_actividad_industria: { required: true, },
			es_casa_central: { required: true, },
			tel_fijo: { required: false, },
			tel_celular: { required: true, },
			cod_postal: { required: true, },
			email_fiscal: { required: true, email: true },

			zona_planta: { required: true, },
			buscar_localidad: { required: true, },
			buscar_barrio: { required: true, },
			buscar_calle: { required: true, },
			numero_planta: { required: true, },
			piso_planta: { required: false, },
			depto_planta: { required: false, },
			ref_domicilio_planta: { required: false, },

			zona_administracion: { required: true, },
			buscar_provincia_administracion: { required: true, },
			buscar_localidad2: { required: true, },
			buscar_barrio2: { required: true, },
			buscar_calle2: { required: true, },
			numero_administracion: { required: true, },
			piso_administracion: { required: false, },
			depto_administracion: { required: false, },
			ref_domicilio_administracion: { required: false, },

			tel_fijo_administracion: { required: false, },
			tel_celular_administracion: { required: false, },
			direccion_gps: { required: true, },
			latitud: { required: true, },
			longitud: { required: true, },
			pagina_web: { required: false, url: true },
			email: { required: false, email: true },
		},
		messages:
		{
			id_periodo_fiscal: { required: "Seleccione Periodo Fiscal" },
			razon_social: { required: "Ingrese Nombre o Razon Social de la Empresa", lettersonly: "Ingrese solo letras para Nombres" },
			fecha_actividad_contribuyente: { required: "Ingrese Fecha de Inicio Actividad de Contribuyente" },
			id_regimen_ib: { required: "Seleccione Régimen de Ingresos Brutos" },
			numero_de_ib: { required: "Ingrese Nº de Ingresos Brutos" },
			id_condicion_iva: { required: "Seleccione Condición de Iva" },
			id_naturaleza_juridica: { required: "Seleccione Naturaleza Juridica" },
			nombre_de_fantasia: { required: "Ingrese Nombre de Establecimiento", lettersonly: "Ingrese solo letras para Nombres" },
			fecha_actividad_industria: { required: "Ingrese Fecha de Inicio Actividad de Industria" },
			es_casa_central: { required: "Seleccione si Es Casa Central", },
			tel_fijo: { required: "Ingrese Nº de Teléfono Fijo" },
			tel_celular: { required: "Ingrese Nº de Celular de Contacto de Empresa" },
			cod_postal: { required: "Ingrese Codigo Postal" },
			email_fiscal: { required: "Ingrese Email Fiscal", email: "Ingrese un Email V&aacute;lido" },

			zona: { required: "Seleccione Zona de Planta" },
			buscar_localidad: { required: "Ingrese Nombre de Localidad de Planta" },
			buscar_barrio: { required: "Ingrese Nombre de Barrio de Planta" },
			buscar_calle: { required: "Ingrese Nombre de Calle de Planta" },
			numero_planta: { required: "Ingrese Numero" },
			piso_planta: { required: "Ingrese N&deg; de Piso" },
			depto_planta: { required: "Ingrese N&deg; de Departamento" },
			ref_domicilio_planta: { required: "Ingrese referencias Domicilio" },

			zona_administracion: { required: "Seleccione Zona Administrativa" },
			buscar_provincia_administracion: { required: "Ingrese Nombre de Provincia Administrativa" },
			buscar_localidad2: { required: "Ingrese Nombre de Localidad Administrativa" },
			buscar_barrio2: { required: "Ingrese Nombre de Barrio Administrativa" },
			buscar_calle2: { required: "Ingrese Nombre de Calle Administrativa" },
			numero_administracion: { required: "Ingrese Numero" },
			piso_administracion: { required: "Ingrese N&deg; de Piso" },
			depto_administracion: { required: "Ingrese N&deg; de Departamento" },
			ref_domicilio_administracion: { required: "Ingrese referencias Domicilio" },

			tel_fijo_administracion: { required: "Ingrese Nº de Teléfono Fijo" },
			tel_celular_administracion: { required: "Ingrese Nº de Celular de Contacto en Administración" },
			direccion_gps: { required: "Ingrese Dirección GPS" },
			latitud: { required: "Ingrese Coordenadas de Latitud" },
			longitud: { required: "Ingrese Coordenadas de Longitud" },
			pagina_web: { required: "Ingrese Url de Pagina", url: "Ingrese un Dirección de Url V&aacute;lida" },
			email: { required: "Ingrese Email de Empresa", email: "Ingrese un Email V&aacute;lido" },
		},
		submitHandler: function (form) {
			console.log(form)
			var data = $("#updategeneral").serialize();
			var seccion = $("input#secciongeneral").val();
			var industria = $("#industria_id").val();

			console.log(industria)

			$.ajax({
				type: 'POST',
				url: '/updateGenerales',
				async: false,
				data: {
					_token: $('meta[name="csrf-token"]').attr('content'),
					data: data,
					id: industria
				},
				beforeSend: function () {
					$("#save").fadeOut();
					$("#btn-submit-edit").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success: function (data) {
					console.log(data);
					if (data === 1) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> POR FAVOR DEBE DE COMPLETAR LOS CAMPOS REQUERIDOS, VERIFIQUE NUEVAMENTE POR FAVOR...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-submit").html('<span class="fa fa-save"></span> Continuar');

						});
					}
					else if (data == 2) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> DEBE DE INGRESAR UN EMAIL DIFERENTE AL INGRESADO EN EL FORMULARIO DE REGISTRO INICIAL, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-submit").html('<span class="fa fa-save"></span> Continuar');

						});
					}
					else if (data == 3) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> ESTE NOMBRE DE ESTABLECIMIENTO YA SE ENCUENTRA REGISTRADO, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-submit").html('<span class="fa fa-save"></span> Continuar');

						});
					}
					else {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: '<center> ' + data + ' </center>',
								theme: 'defaultTheme',
								layout: 'center',
								type: 'information',
								timeout: 5000,
							});
							$('#secciones').load("formularios.php?BuscaFormularioProcedimiento=si&seccion=" + seccion + "&in=" + industria);
							$("#btn-submit").html('<span class="fa fa-save"></span> Continuar');
						});
					}
				}
			});
			return false;
		}
		/* form submit */
	});
});
/* FUNCION JQUERY PARA VALIDAR REGISTRO DE DATOS GENERALES */



/* FUNCION JQUERY PARA VALIDAR REGISTRO DE ACTIVIDAD DE ESTABLECIMIENTO */


$("#btn-actividad").on('click', function () {

	/* validation */
	$("#saveactividad").validate({
		rules:
		{
			search_codigo: { required: true, },
			search_descripcion: { required: true, },
			observacion: { required: true, },
			fecha_inicio: { required: true, },
			es_actividad_principal: { required: true, },
			//id_naturaleza_juridica: { required: true, },
		},
		messages:
		{
			search_codigo: { required: "Realice la Búsqueda de Actividad por Código" },
			search_descripcion: { required: "Realice la Búsqueda de Actividad por Descripción" },
			observacion: { required: "Ingrese Descripción de la Actividad" },
			fecha_inicio: { required: "Ingrese Fecha de Inicio" },
			es_actividad_principal: { required: "Seleccione Si es Actividad Principal" },
			//id_naturaleza_juridica: { required: "Seleccione Naturaleza Juridica" },
		},
		submitHandler: function (form) {

			var data = $("#saveactividad").serialize();
			var seccion = $("input#seccionactividad").val();
			var industria = $("input#id_industria").val();

			$.ajax({
				type: 'POST',
				url: '/saveActividad',

				data: {
					_token: $('meta[name="csrf-token"]').attr('content'),
					data: data,
				},
				beforeSend: function () {
					$("#save").fadeOut();
					$("#btn-actividad").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success: function (data) {
					if (data == 1) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> POR FAVOR DEBE DE COMPLETAR LOS CAMPOS REQUERIDOS, VERIFIQUE NUEVAMENTE POR FAVOR...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-actividad").html('<span class="fa fa-save"></span> Agregar y Guardar');

						});
					}
					else if (data.status == 2) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> LA FECHA DE ACTIVIDAD NO PUEDE SER MENOR QUE LA FECHA INICIO DE CONTRIBUYENTE, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-actividad").html('<span class="fa fa-save"></span> Agregar y Guardar');

						});
					}
					else if (data.status == 3) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span>" + data.msg,
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-actividad").html('<span class="fa fa-save"></span> Agregar y Guardar');

						});
					}
					else if (data.status == 4) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span>" + data.msg,
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-actividad").html('<span class="fa fa-save"></span> Agregar y Guardar');

						});
					}
					else if (data.status == 200) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: '<center> ' + data.msg + ' </center>',
								theme: 'defaultTheme',
								layout: 'center',
								type: 'information',
								timeout: 5000,
							});
							$('#MyModalActividad').modal('hide');
							//$('#secciones').load("formularios.php?BuscaFormularioProcedimiento=si&seccion=" + seccion + "&in=" + industria);
							//$("#saveactividad")[0].reset();
							//$("#saveactividad #actividad").val("saveactividades");

							//$("#saveactividad #id_industria").val("");


							$("#saveactividad #id_actividad").val("");
							$("#btn-actividad").html('<span class="fa fa-save"></span> Agregar y Guardar');
							cargar_tabla_actividades();
						});
					}
				}
			});
			return false;
		}
		/* form submit */
	});

})





/* FUNCION JQUERY PARA VALIDAR REGISTRO DE ACTIVIDAD DE ESTABLECIMIENTO */


function muestraForm(ref) {

	//muestra mensaje de que cargue la industria antes de proceder 

	console.log($("#id_industria_modal").val());

	if ($("#id_industria_modal").val() < 1) {
		//si no hay industria cargada en actividades mostrar el msj
		if (ref == "actividades") {

			$("#labelActividad").hide();
			$("#buttonActividad").hide();
			$("#rowActividad").hide();

			document.getElementById("pasoAnterior").style.display = "block";
			document.getElementById("pasoAnterior").style.visibility = "visible"
		}


	} else {

		if (ref == "actividades") {

			cargar_tabla_actividades();

		} else if (ref == "insumos") {
			getunidades();
			getMotivo();
			getServicios("sb",1);
			getServicios("com",2);
			getFrecuencia();
			getGastos();

			cargar_tabla_insumos();
			cargar_tabla_basicos();
			cargar_tabla_combustible();
			cargar_tabla_otros();
			cargar_tabla_gastos();
			
		}else if(ref == "splanta"){

			getRolTrabajadores();
			getCondicionLaboral()
			cargar_tabla_splanta();
			trae_motivo_ociosidad(); 
			cargar_tabla_motivo_ociosidad()
			cargar_tabla_p_o_m()
			cargar_tabla_p_o_f()
		}


	}

}













/* FUNCION JQUERY PARA VALIDAR ASIGNACION DE PRODUCTO PARA ACTIVIDAD */
$('document').ready(function () {

	/* validation */
	$("#saveasignacionproducto").validate({
		rules:
		{
			search_producto: { required: true, },
			medida_producto: { required: true, },
			cantidad_producida: { required: true, number: true },
			porcentaje_sobre_produccion: { required: true, number: true },
			ventas_en_provincia: { required: true, number: true },
			ventas_en_otras_provincias: { required: true, number: true },
			ventas_internacionales: { required: true, number: true },
		},
		messages:
		{
			search_producto: { required: "Realice la Búsqueda del Producto o Ingrese Descripción" },
			medida_producto: { required: "Seleccione Unidad Medida" },
			cantidad_producida: { required: "Ingrese Cantidad de Producto", number: "Ingrese solo digitos" },
			porcentaje_sobre_produccion: { required: "Ingrese Porcentaje", number: "Ingrese solo digitos" },
			ventas_en_provincia: { required: "Ingrese Cant. en Ventas en Provincia", number: "Ingrese solo digitos" },
			ventas_en_otras_provincias: { required: "Ingrese Cant. en Ventas en Otras Provincias", number: "Ingrese solo digitos" },
			ventas_internacionales: { required: "Ingrese Cant. en Ventas en el Exterior", number: "Ingrese solo digitos" },
		},
		submitHandler: function (form) {

			var data = $("#saveasignacionproducto").serialize();
			var seccion = $("#seccionactividad").val();
			var id_asignacion = $("#id_asignacion_producto").val();

			$.ajax({
				type: 'POST',
				url: '/saveAsignacionProducto',
				async: false,
				data: {
					_token: $('meta[name="csrf-token"]').attr('content'),
					data: data
				},
				beforeSend: function () {
					$("#save").fadeOut();
					$("#btn-asignaproducto").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success: function (data) {
					if (data.status == 1) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span>" + data.msg,
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-asignaproducto").html('<span class="fa fa-save"></span> Agregar y Guardar');

						});
					}
					else if (data.status == 200) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: '<center> ' + data.msg + ' </center>',
								theme: 'defaultTheme',
								layout: 'center',
								type: 'information',
								timeout: 5000,
							});
							$("#saveasignacionproducto #asignaproducto").val("saveproducto");
							$("#saveasignacionproducto #id_rel_actividad_productos").val("");
							$("#saveasignacionproducto #id_producto").val("");
							$("#saveasignacionproducto #search_producto").val("");
							$("#saveasignacionproducto #medida_producto").val("");
							$("#saveasignacionproducto #cantidad_producida").val("");
							$("#saveasignacionproducto #porcentaje_sobre_produccion").val("");
							$("#saveasignacionproducto #ventas_en_provincia").val("");
							$("#saveasignacionproducto #ventas_en_otras_provincias").val("");
							$("#saveasignacionproducto #ventas_internacionales").val("");

							cargar_tabla_productos()

							$("#btn-asignaproducto").html('<span class="fa fa-save"></span> Agregar y Guardar');
						});
					}
				}
			});
			return false;
		}
		/* form submit */
	});
});
/* FUNCION JQUERY PARA VALIDAR ASIGNACION DE PRODUCTO PARA ACTIVIDAD */





















/* FUNCION JQUERY PARA VALIDAR ASIGNACION MATERIA PRIMA A PRODUCTO */
$('document').ready(function () {

	/* validation */
	$("#saveasignacionmateria").validate({
		rules:
		{
			search_materia: { required: true, },
			medida_materia: { required: true, },
			cantidad_materia: { required: true, number: true },
			es_propio_materia: { required: true, },
			search_pais_materia: { required: true, },
			search_provincia_materia: { required: true, },
			search_localidad_materia: { required: true, },
			motivo_importacion_materia: { required: true, },
			detalles_materia: { required: true, },
		},
		messages:
		{
			search_materia: { required: "Realice la Búsqueda de Materia Prima o Ingrese Descripción" },
			medida_materia: { required: "Seleccione Unidad Medida" },
			cantidad_materia: { required: "Ingrese Cantidad de Materia", number: "Ingrese solo digitos" },
			es_propio_materia: { required: "Seleccione si es Propia o Adquirida" },
			search_pais_materia: { required: "Ingrese Nombre de Pais" },
			search_provincia_materia: { required: "Ingrese Nombre de Provincia" },
			search_localidad_materia: { required: "Ingrese Nombre de Localidad" },
			motivo_importacion_materia: { required: "Ingrese Motivo de Importación" },
			detalles_materia: { required: "Ingrese Detalles de Importación" },
		},
		submitHandler: function (form) {

			var data = $("#saveasignacionmateria").serialize();
			var seccion = $("#seccionactividad").val();
			var id_asignacion = $("#id_asignacion_materia").val();

			$.ajax({
				type: 'POST',
				url: '/saveAsignacionMateria',
				async: false,
				data: {
					_token: $('meta[name="csrf-token"]').attr('content'),
					data: data
				},
				beforeSend: function () {
					$("#save").fadeOut();
					$("#btn-asignamateria").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success: function (data) {
					if (data.status == 1) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span>" + data.msg,
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-asignamateria").html('<span class="fa fa-save"></span> Agregar y Guardar');

						});
					}
					else if (data.status == 200) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: '<center> ' + data.msg + ' </center>',
								theme: 'defaultTheme',
								layout: 'center',
								type: 'information',
								timeout: 5000,
							});
							$("#saveasignacionmateria #asignamateria").val("savemateria");
							$("#muestracondicionmateria").html("");
							$("#saveasignacionmateria #id_rel_actividad_productos_materia_prima").val("");
							$("#saveasignacionmateria #id_materia_prima").val("");

							$("#saveasignacionmateria #search_materia").val("");
							$("#saveasignacionmateria #medida_materia").val("");
							$("#saveasignacionmateria #cantidad_materia").val("");
							$("#saveasignacionmateria #es_propio_materia").val("");
							$("#saveasignacionmateria #motivo_importacion_materia").val("");
							$("#saveasignacionmateria #detalles_materia").val("");
							$("#detalles_materia").attr('disabled', true);

							$("#btn-asignamateria").html('<span class="fa fa-save"></span> Agregar y Guardar');

							$('#search_pais').val(""); // display the selected text
							$('#id_pais').val("");

							$('#search_provincia').val(""); // display the selected text
							$('#id_provincia').val(""); // save selected id to input

							$('#search_localidad32').val(""); // display the selected text
							$('#id_localidad3').val(""); // save selected id to input

							$(".origen").show();

							cargar_tabla_materia();
						});
					}
				}
			});
			return false;
		}
		/* form submit */
	});
});
/* FUNCION JQUERY PARA VALIDAR ASIGNACION MATERIA PRIMA A PRODUCTO */



















/* FUNCION JQUERY PARA VALIDAR ASIGNACION DE INSUMOS */
$('document').ready(function () {

	/* validation */
	$("#saveasignacioninsumo").validate({
		rules:
		{
			search_insumo: { required: true, },
			medida_insumo: { required: true, },
			cantidad_insumo: { required: true, number: true },
			es_propio_insumo: { required: true, },
			search_pais_insumo: { required: true, },
			search_provincia_insumo: { required: true, },
			search_localidad_insumo: { required: true, },
			motivo_importacion_insumo: { required: true, },
			detalles_insumo: { required: true, },
		},
		messages:
		{
			search_insumo: { required: "Realice la Búsqueda de Insumo o Ingrese Descripción" },
			medida_insumo: { required: "Seleccione Unidad Medida" },
			cantidad_insumo: { required: "Ingrese Cantidad de Insumo", number: "Ingrese solo digitos" },
			es_propio_insumo: { required: "Seleccione si es Propia o Adquirida" },
			search_pais_insumo: { required: "Ingrese Nombre de Pais" },
			search_provincia_insumo: { required: "Ingrese Nombre de Provincia" },
			search_localidad_insumo: { required: "Ingrese Nombre de Localidad" },
			motivo_importacion_insumo: { required: "Ingrese Motivo de Importación" },
			detalles_insumo: { required: "Ingrese Detalles de Importación" },
		},
		submitHandler: function (form) {

			var data = $("#saveasignacioninsumo").serialize();
			var seccion = $("#seccioninsumo").val();
			var industria = $("#id_industria_modal").val();

			$.ajax({
				type: 'POST',
				url: '/saveInsumo',
				async: false,
				data: {
					_token: $('meta[name="csrf-token"]').attr('content'),
					id_industria: industria,
					data: data
				},
				beforeSend: function () {
					$("#save").fadeOut();
					$("#btn-insumo").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success: function (response) {
					if (response.status == 1) {



						$("#save").fadeIn(1000, function () {
							var n = noty({
								text: "<span class='fa fa-warning' style='font-size:18px;'></span>" + response.msg,
								theme: 'relax',
								layout: 'topCenter',
								type: 'warning',
								timeout: 5000,

							});
							$("#btn-insumo").html('<span class="fa fa-save"></span> Agregar y Guardar');

						});
					}
					else if (response.status == 200) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: '<center style="font-size:15px;"> ' + response.msg + ' </center>',
								theme: 'relax',
								layout: 'topCenter',
								type: 'information',
								timeout: 5000,
							});
							$('#MyModalInsumo').modal('hide');
							//$('#secciones').load("formularios.php?BuscaFormularioProcedimiento=si&seccion=" + seccion + "&in=" + industria);
							$("#saveasignacioninsumo")[0].reset();
							$("#saveasignacioninsumo #insumo").val("saveinsumo");
							$("#muestracondicioninsumo").html("");
							$("#saveasignacioninsumo #nombre_de_fantasia").text("");
							$("#saveasignacioninsumo #id_rel_industria_insumos").val("");
							$("#saveasignacioninsumo #industria_insumo").val("");
							$("#saveasignacioninsumo #id_insumo").val("");
							$("#saveasignacioninsumo #anio_insumo").val("");
							$("#saveasignacioninsumo #detalles_insumo").attr('disabled', true);
							$("#btn-insumo").html('<span class="fa fa-save"></span> Agregar y Guardar');
							cargar_tabla_insumos();
						});

					}

					return false;
				}
				/* form submit */

			});
		}
	});
});
/* FUNCION JQUERY PARA VALIDAR ASIGNACION DE INSUMOS */



$("#btn-insumo-update").on('click', function () {
	$("#btn-insumo-update").html('<i class="fa fa-refresh"></i> Verificando...');
	var val = 1;
	if ($("#search_insumo").val() == "") {
		val = 0
		var n = noty({
			text: "<span class='fa fa-warning'></span> Debe Completar la busqueda del insumo",
			theme: 'defaultTheme',
			layout: 'topCenter',
			type: 'warning',
			timeout: 5000,
		});
	} else if ($("#medida_insumo").val() == "") {
		val = 0
		var n = noty({
			text: "<span class='fa fa-warning'></span> Debe seleccionar unidad de medida",
			theme: 'defaultTheme',
			layout: 'topCenter',
			type: 'warning',
			timeout: 5000,
		});

	} else if ($("#cantidad_insumo").val() == "") {
		val = 0
		var n = noty({
			text: "<span class='fa fa-warning'></span> Debe indicar una cantidad",
			theme: 'defaultTheme',
			layout: 'topCenter',
			type: 'warning',
			timeout: 5000,
		});

	} else if ($("#es_propio_insumo").val() == "") {
		val = 0
		var n = noty({
			text: "<span class='fa fa-warning'></span> Debe indicar el origen del insumo",
			theme: 'defaultTheme',
			layout: 'topCenter',
			type: 'warning',
			timeout: 5000,
		});
	} else if ($("#es_propio_insumo").val() == "A") {

		if ($("#search_pais_insumo").val() == "") {
			val = 0
			var n = noty({
				text: "<span class='fa fa-warning'></span> Debe indicar el pais",
				theme: 'defaultTheme',
				layout: 'topCenter',
				type: 'warning',
				timeout: 5000,
			});
		} else if ($("#search_provincia_insumo").val() == "") {
			val = 0
			var n = noty({
				text: "<span class='fa fa-warning'></span> Debe indicar la provincia",
				theme: 'defaultTheme',
				layout: 'topCenter',
				type: 'warning',
				timeout: 5000,
			});
		} else if ($("#search_localidad_insumo").val() == "") {
			val = 0
			var n = noty({
				text: "<span class='fa fa-warning'></span> Debe indicar la localidad",
				theme: 'defaultTheme',
				layout: 'topCenter',
				type: 'warning',
				timeout: 5000,
			});
		}



	}


	if (val == 1) {
		var data = $("#updateasignacioninsumo").serialize();
		var seccion = $("#seccioninsumo").val();
		var industria = $("#id_industria_modal").val();

		$.ajax({
			type: 'POST',
			url: '/updateInsumo',
			async: false,
			data: {
				_token: $('meta[name="csrf-token"]').attr('content'),
				id_industria: industria,
				data: data
			},
			beforeSend: function () {
				$("#save").fadeOut();
				$("#btn-insumo-update").html('<i class="fa fa-refresh"></i> Verificando...');
			},
			success: function (response) {
				if (response.status == 1) {



					$("#save").fadeIn(1000, function () {
						var n = noty({
							text: "<span class='fa fa-warning' style='font-size:18px;'></span>" + response.msg,
							theme: 'relax',
							layout: 'topCenter',
							type: 'warning',
							timeout: 5000,

						});
						$("#btn-insumo-update").html('<span class="fa fa-save"></span> Agregar y Guardar');

					});
				}
				else if (response.status == 200) {

					$("#save").fadeIn(1000, function () {

						var n = noty({
							text: '<center style="font-size:15px;"> ' + response.msg + ' </center>',
							theme: 'relax',
							layout: 'topCenter',
							type: 'information',
							timeout: 5000,
						});
						$('#MyModalInsumo').modal('hide');


					

						// aqui asigno cada valor a los campos correspondientes
						$("#updateasignacioninsumo #id_rel_industria_insumos").val("");
						//$("#updateasignacioninsumo #industria_insumo").val(id_industria);
						//$("#updateasignacioninsumo #nombre_de_fantasia").text(nombre_de_fantasia);
						$("#updateasignacioninsumo #id_insumo").val("");
						$("#updateasignacioninsumo #search_insumo").val("");
						$("#updateasignacioninsumo #medida_insumo").val("");
						$("#updateasignacioninsumo #cantidad_insumo").val("");
						$("#updateasignacioninsumo #es_propio_insumo").val("");


						$("#updateasignacioninsumo #id_pais_insumo").val("");
						$("#updateasignacioninsumo #search_pais_insumo").val("");
						$("#updateasignacioninsumo #id_provincia_insumo").val("");
						$("#updateasignacioninsumo #search_provincia_insumo").val("");
						$("#updateasignacioninsumo #id_localidad_insumo").val("");
						$("#updateasignacioninsumo #search_localidad_insumo").val("");
						$("#updateasignacioninsumo #motivo_importacion_insumo").val("");

						$("#updateasignacioninsumo #detalles_insumo").val("");


						$("#btn-insumo-update").html('<span class="fa fa-save"></span> Agregar y Guardar');

						$("#btn-insumo").show();
      
						$("#btn-insumo-update").hide();
				  

						$("#saveasignacioninsumo").prop('id', 'updateasignacioninsumo');
						$("#updateasignacioninsumo").prop('name', 'updateasignacioninsumo');
						cargar_tabla_insumos();
					});

				}

				return false;
			}
			/* form submit */

		});
	}





})




//btn cancelar insumo


$("#btn-cancelar-insumo").on('click', function () {

	$("#updateasignacioninsumo").prop('id', 'saveasignacioninsumo');
	$("#saveasignacioninsumo").prop('name', 'saveasignacioninsumo');

	$("#btn-insumo").show();

	$("#btn-insumo-update").hide();


	document.getElementById('industria_insumo').value = '',
		document.getElementById('anio_insumo').value = '',
		document.getElementById('id_insumo').value = '',
		document.getElementById('search_insumo').value = '',
		document.getElementById('medida_insumo').value = '',
		document.getElementById('cantidad_insumo').value = '',
		document.getElementById('es_propio_insumo').value = '',
		document.getElementById('id_pais_insumo').value = '',
		document.getElementById('search_pais_insumo').value = '',
		document.getElementById('id_provincia_insumo').value = '',
		document.getElementById('search_provincia_insumo').value = '',
		document.getElementById('id_localidad_insumo').value = '',
		document.getElementById('search_localidad_insumo').value = '',
		document.getElementById('motivo_importacion_insumo').value = '',
		document.getElementById('detalles_insumo').value = ''



});


















/* FUNCION JQUERY PARA VALIDAR ASIGNACION DE SERVICIOS BASICOS */
$('document').ready(function () {

	/* validation */
	$("#saveserviciobasico").validate({
		rules:
		{

			costo_basico: { required: false, number: false },
		},
		messages:
		{

			costo_basico: { required: "Ingrese Costo Asociado", number: "Ingrese solo digitos" },
		},
		submitHandler: function (form) {

			var data = $("#saveserviciobasico").serialize();
			var seccion = $("#seccionserviciobasico").val();
			var industria = $("#id_industria_modal").val();

			$.ajax({
				type: 'POST',
				url: '/saveServicio',
				async: false,
				data: {
					_token: $('meta[name="csrf-token"]').attr('content'),
					data: data,
					id_industria:industria
				},
				beforeSend: function () {
					$("#save").fadeOut();
					$("#btn-serviciobasico").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success: function (data) {
					if (data == 1) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> POR FAVOR DEBE DE COMPLETAR LOS CAMPOS REQUERIDOS, VERIFIQUE NUEVAMENTE POR FAVOR...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-serviciobasico").html('<span class="fa fa-save"></span> Agregar y Guardar');

						});
					}
					else if (data == 2) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> POR FAVOR INGRESE UN IMPORTE TOTAL ANUAL VALIDO, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-serviciobasico").html('<span class="fa fa-save"></span> Agregar y Guardar');

						});
					}
					else if (data == 3) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> YA ESTOS SERVICIOS SE ENCUENTRAN REGISTRADOS ACTUALMENTE EN ESTA INDUSTRIA, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-serviciobasico").html('<span class="fa fa-save"></span> Agregar y Guardar');

						});
					}
					else if (data.status == 200) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: '<center> ' + data.msg + ' </center>',
								theme: 'defaultTheme',
								layout: 'topCenter',
								type: 'information',
								timeout: 5000,
							});
							$('#MyModalServiciosBasicos').modal('hide');
							//$('#secciones').load("formularios.php?BuscaFormularioProcedimiento=si&seccion=" + seccion + "&in=" + industria);
							$("#saveserviciobasico")[0].reset();
							$("#saveserviciobasico #nombre_de_fantasia").text("");
							$("#saveserviciobasico #industria_servicio_basico").val("");
							$("#saveserviciobasico #anio_basico").val("");
							
							$("#btn-serviciobasico").html('<span class="fa fa-save"></span> Agregar y Guardar');
							cargar_tabla_basicos();
						});
					}
				}
			});
			return false;
		}
		/* form submit */
	});
});
/* FUNCION JQUERY PARA VALIDAR ASIGNACION DE SERVICIOS BASICOS */


/* FUNCION JQUERY PARA VALIDAR ACTUALIZAR SERVICIOS BASICOS */
$('document').ready(function () {

	/* validation */
	$("#updateserviciobasico").validate({
		rules:
		{
			cantidad_servicio: { required: false, },
			costo_servicio: { required: false, number: false },
		},
		messages:
		{
			cantidad_servicio: { required: "Ingrese Cantidad Consumida" },
			costo_servicio: { required: "Ingrese Costo Asociado", number: "Ingrese solo digitos" },
		},
		submitHandler: function (form) {

			var data = $("#updateserviciobasico").serialize();
			var seccion = $("#seccionserviciobasicoupdate").val();
			var industria = $("#id_industria_modal").val();

			$.ajax({
				type: 'POST',
				url: '/updateServicio',
				async: false,
				data: {
					_token: $('meta[name="csrf-token"]').attr('content'),
					data:data,
					id_industria:industria
				},
				beforeSend: function () {
					$("#save").fadeOut();
					$("#btn-serviciobasicoupdate").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success: function (data) {
					if (data == 1) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> POR FAVOR DEBE DE COMPLETAR LOS CAMPOS REQUERIDOS, VERIFIQUE NUEVAMENTE POR FAVOR...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-serviciobasicoupdate").html('<span class="fa fa-edit"></span> Actualizar');

						});
					}
					else if (data == 2) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> POR FAVOR INGRESE UN IMPORTE TOTAL ANUAL VALIDO, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-serviciobasicoupdate").html('<span class="fa fa-edit"></span> Actualizar');

						});
					}
					else if(data.status == 200) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: '<center> ' + data.msg + ' </center>',
								theme: 'defaultTheme',
								layout: 'center',
								type: 'information',
								timeout: 5000,
							});
							$('#MyModalUpdateServicioBasico').modal('hide');
							
							$("#updateserviciobasico")[0].reset();
							$("#updateserviciobasico #nombre_de_fantasia").text("");
							$("#updateserviciobasico #id_rel_industria_servicios_basicos").val("");
							$("#updateserviciobasico #industria_servicio_basico_update").val("");
							$("#updateserviciobasico #anio_basico_update").val("");
							$("#btn-serviciobasicoupdate").html('<span class="fa fa-edit"></span> Actualizar');
							cargar_tabla_basicos();
						});
					}
				}
			});
			return false;
		}
		/* form submit */
	});
});
/* FUNCION JQUERY PARA VALIDAR ACTUALIZAR SERVICIOS BASICOS */














/* FUNCION JQUERY PARA VALIDAR ASIGNACION DE COMBUSTIBLE */
$('document').ready(function () {

	/* validation */
	$("#savecombustible").validate({
		rules:
		{
			id_servicio_combustible: { required: true, },
			medida_combustible: { required: true, },
			frecuencia_combustible: { required: true, },
			cantidad_combustible: { required: true, number: true },
			costo_combustible: { required: true, number: true },
			search_pais_combustible: { required: true, },
			search_provincia_combustible: { required: true, },
			search_localidad_combustible: { required: true, },
			motivo_importacion_combustible: { required: true, },
			detalles_combustible: { required: true, },
		},
		messages:
		{
			id_servicio_combustible: { required: "Seleccione Tipo de Combustible" },
			medida_combustible: { required: "Seleccione Unidad de Medida" },
			frecuencia_combustible: { required: "Ingrese Frecuencia de Contratación" },
			cantidad_combustible: { required: "Ingrese Veces de Contratación", number: "Ingrese solo digitos" },
			costo_combustible: { required: "Ingrese Costo de Combustible", number: "Ingrese solo digitos" },
			search_pais_combustible: { required: "Ingrese Nombre de Pais" },
			search_provincia_combustible: { required: "Ingrese Nombre de Provincia" },
			search_localidad_combustible: { required: "Ingrese Nombre de Localidad" },
			motivo_importacion_combustible: { required: "Ingrese Motivo de Importación" },
			detalles_combustible: { required: "Ingrese Detalles de Importación" },
		},
		submitHandler: function (form) {

			var data = $("#savecombustible").serialize();
			var seccion = $("#seccioncombustible").val();
			var industria = $("#id_industria_modal").val();

			$.ajax({
				type: 'POST',
				url: '/saveServicio',
				async: false,
				data: {
					_token: $('meta[name="csrf-token"]').attr('content'),
					data:data,
					id_industria: industria
				},
				beforeSend: function () {
					$("#save").fadeOut();
					$("#btn-combustible").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success: function (data) {
					if (data.status == 1) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span>"+data.msg,
								theme: 'defaultTheme',
								layout: 'topCenter',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-combustible").html('<span class="fa fa-save"></span> Agregar y Guardar');

						});
					}
					else if (data == 2) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> ESTE COMBUSTIBLE YA SE ENCUENTRA REGISTRADO, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-combustible").html('<span class="fa fa-save"></span> Agregar y Guardar');

						});
					}
					else if(data.status == 200){

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: '<center> ' + data.msg + ' </center>',
								theme: 'defaultTheme',
								layout: 'topCenter',
								type: 'information',
								timeout: 5000,
							});
							$('#MyModalCombustible').modal('hide');
							//$('#secciones').load("formularios.php?BuscaFormularioProcedimiento=si&seccion=" + seccion + "&in=" + industria);
							$("#savecombustible")[0].reset();
							$("#savecombustible #combustibles").val("savecombustible");
							$("#savecombustible #nombre_de_fantasia").text("");
							$("#savecombustible #id_rel_industria_combustible").val("");
							$("#savecombustible #industria_combustible").val("");
							$("#savecombustible #anio_combustible").val("");
							$("#btn-combustible").html('<span class="fa fa-save"></span> Agregar y Guardar');
							cargar_tabla_combustible();
						});
					}
				}
			});
			return false;
		}
		/* form submit */
	});
});
/* FUNCION JQUERY PARA VALIDAR ASIGNACION DE COMBUSTIBLE */

//update combustible


$("#btn-combustible-update").on('click',function(){

	/* validation */

	if($("#id_servicio_combustible").val().length < 1){
		var n = noty({
			text: "<span class='fa fa-warning'></span> Debe seleccionar un combustible",
			theme: 'defaultTheme',
			layout: 'topCenter',
			type: 'warning',
			timeout: 5000,
		});
	}else if($("#medida_combustible").val().length < 1){
		var n = noty({
			text: "<span class='fa fa-warning'></span> Debe seleccionar una unidad de medida",
			theme: 'defaultTheme',
			layout: 'topCenter',
			type: 'warning',
			timeout: 5000,
		});
	}else if($("#costo_combustible").val().length < 1){
		var n = noty({
			text: "<span class='fa fa-warning'></span> Debe ingresar un monto anual",
			theme: 'defaultTheme',
			layout: 'topCenter',
			type: 'warning',
			timeout: 5000,
		});
	}else if($("#search_pais_combustible").val().length < 1){
		var n = noty({
			text: "<span class='fa fa-warning'></span>Debe ingresar un pais",
			theme: 'defaultTheme',
			layout: 'topCenter',
			type: 'warning',
			timeout: 5000,
		});
	}else if($("#search_provincia_combustible").val().length < 1){
		var n = noty({
			text: "<span class='fa fa-warning'></span>Debe ingresar una provincia",
			theme: 'defaultTheme',
			layout: 'topCenter',
			type: 'warning',
			timeout: 5000,
		});
	}else if($("#search_localidad_combustible").val().length < 1){
		var n = noty({
			text: "<span class='fa fa-warning'></span>Debe ingresar una localidad",
			theme: 'defaultTheme',
			layout: 'topCenter',
			type: 'warning',
			timeout: 5000,
		});
	}else{


		var data = $("#updatecombustible").serialize();
		var seccion = $("#seccioncombustible").val();
		var industria = $("#id_industria_modal").val();

		$.ajax({
			type: 'POST',
			url: '/updateServicio',
			async: false,
			data: {
				_token: $('meta[name="csrf-token"]').attr('content'),
				data:data,
				id_industria: industria
			},
			beforeSend: function () {
				$("#save").fadeOut();
				$("#btn-combustible-update").html('<i class="fa fa-refresh"></i> Verificando...');
			},
			success: function (data) {
				if (data.status == 1) {

					$("#save").fadeIn(1000, function () {

						var n = noty({
							text: "<span class='fa fa-warning'></span>"+data.msg,
							theme: 'defaultTheme',
							layout: 'topCenter',
							type: 'warning',
							timeout: 5000,
						});
						$("#btn-combustible").html('<span class="fa fa-save"></span> Agregar y Guardar');

					});
				}
				else if (data == 2) {

					$("#save").fadeIn(1000, function () {

						var n = noty({
							text: "<span class='fa fa-warning'></span> ESTE COMBUSTIBLE YA SE ENCUENTRA REGISTRADO, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
							theme: 'defaultTheme',
							layout: 'center',
							type: 'warning',
							timeout: 5000,
						});
						$("#btn-combustible").html('<span class="fa fa-save"></span> Agregar y Guardar');

					});
				}
				else if(data.status == 200){

					$("#save").fadeIn(1000, function () {

						var n = noty({
							text: '<center> ' + data.msg + ' </center>',
							theme: 'defaultTheme',
							layout: 'topCenter',
							type: 'information',
							timeout: 5000,
						});
						$('#MyModalCombustible').modal('hide');

						// aqui asigno cada valor a los campos correspondientes
						$("#updatecombustible #id_rel_industria_combustible").val("");
						//$("#updatecombustible #industria_combustible").val(response[0].id_industria);
						//$("#updatecombustible #nombre_de_fantasia").text(nombre_de_fantasia);
						$("#updatecombustible #id_servicio_combustible").val("");
						$("#updatecombustible #medida_combustible").val("");
						//$("#updatecombustible #frecuencia_combustible").val(response[0].nomfrecuencia);
						//$("#updatecombustible #cantidad_combustible").val(cantidad);
						$("#updatecombustible #costo_combustible").val("");
						$("#updatecombustible #id_pais_combustible").val("");
						$("#updatecombustible #search_pais_combustible").val("");
						$("#updatecombustible #id_provincia_combustible").val("");
						$("#updatecombustible #search_provincia_combustible").val("");
						$("#updatecombustible #id_localidad_combustible").val("");
						$("#updatecombustible #search_localidad_combustible").val("");
						$("#updatecombustible #motivo_importacion_combustible").val("");
						$("#updatecombustible #detalles_combustible").val("");
						
						$("#updatecombustible")[0].reset();
						
						$("#updatecombustible").prop('id', 'savecombustible');
						$("#savecombustible").prop('name', 'savecombustible');

						$("#btn-combustible-update").hide();
						$("#btn-combustible").show();

						cargar_tabla_combustible();
						$("#btn-combustible-update").html('<span class="fa fa-save"></span> Agregar y Guardar');
					});
				}
			}
		});
		return false;

	}
	

		
		
		
	



});

$("#btn-cancelar-combustible").on('click',function(){
	document.getElementById('combustibles').value = 'savecombustible',
	document.getElementById('id_rel_industria_combustible').value = '',
	document.getElementById('industria_combustible').value = '',
	document.getElementById('anio_combustible').value = '',
	document.getElementById('id_servicio_combustible').value = '',
	
	document.getElementById('medida_combustible').value = '',
	document.getElementById('costo_combustible').value = '',
	document.getElementById('id_pais_combustible').value = '',
	document.getElementById('search_pais_combustible').value = '',
	document.getElementById('id_provincia_combustible').value = '',
	document.getElementById('search_provincia_combustible').value = '',
	document.getElementById('id_localidad_combustible').value = '',
	document.getElementById('search_localidad_combustible').value = '',
	document.getElementById('motivo_importacion_combustible').value = '',
	document.getElementById('detalles_combustible').value = ''
                
})

















/* FUNCION JQUERY PARA VALIDAR ASIGNACION DE OTROS SERVICIOS */
$('document').ready(function () {

	/* validation */
	$("#saveotros").validate({
		rules:
		{
			search_servicio_otros: { required: true, },
			servicio_contratado: { required: true, },
			frecuencia_otros: { required: true, },
			cantidad_otros: { required: true, number: true },
			costo_otros: { required: true, number: true },
			search_pais_otros: { required: true, },
			search_provincia_otros: { required: true, },
			search_localidad_otros: { required: true, },
			motivo_importacion_otros: { required: true, },
			detalles_otros: { required: true, },
		},
		messages:
		{
			search_servicio: { required: "Ingrese Nombre o Descripción de Servicio" },
			servicio_contratado: { required: "Seleccione Servicio Contratado" },
			frecuencia_otros: { required: "Ingrese Frecuencia de Contratación" },
			cantidad_otros: { required: "Ingrese Veces de Contratación", number: "Ingrese solo digitos" },
			costo_otros: { required: "Ingrese Costo de Combustible", number: "Ingrese solo digitos" },
			search_pais_servicio: { required: "Ingrese Nombre de Pais" },
			search_provincia_servicio: { required: "Ingrese Nombre de Provincia" },
			search_localidad_servicio: { required: "Ingrese Nombre de Localidad" },
			motivo_importacion_otros: { required: "Ingrese Motivo de Importación" },
			detalles_otros: { required: "Ingrese Detalles de Importación" },
		},
		submitHandler: function (form) {

			var data = $("#saveotros").serialize();
			var seccion = $("#seccionotros").val();
			var industria = $("#id_industria_modal").val();

			$.ajax({
				type: 'POST',
				url: '/saveServicio',
				async: false,
				data: {
					_token: $('meta[name="csrf-token"]').attr('content'),
					data:data,
					id_industria: industria
				},
				beforeSend: function () {
					$("#save").fadeOut();
					$("#btn-otros").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success: function (data) {
					if (data.status == 1) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span>"+data.msg,
								theme: 'defaultTheme',
								layout: 'topCenter',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-otros").html('<span class="fa fa-save"></span> Agregar y Guardar');

						});
					}
					else if (data == 2) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> ESTE SERVICIO YA SE ENCUENTRA REGISTRADO, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-otros").html('<span class="fa fa-save"></span> Agregar y Guardar');

						});
					}
					else if(data.status ==200) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: '<center> ' + data.msg + ' </center>',
								theme: 'defaultTheme',
								layout: 'topCenter',
								type: 'information',
								timeout: 5000,
							});
							$('#MyModalOtros').modal('hide');
							//$('#secciones').load("formularios.php?BuscaFormularioProcedimiento=si&seccion=" + seccion + "&in=" + industria);
							$("#saveotros")[0].reset();
							$("#saveotros #otros").val("saveotros");
							$("#muestracondicionotros").html("");
							$("#saveotros #nombre_de_fantasia").text("");
							$("#saveotros #id_rel_industria_otros").val("");
							$("#saveotros #industria_otros").val("");
							$("#saveotros #anio_otros").val("");
							$("#saveotros #id_servicio").val("");
							$("#saveotros #detalles_otros").attr('disabled', true);
							$("#btn-otros").html('<span class="fa fa-save"></span> Agregar y Guardar');
							
							cargar_tabla_otros();
						});
					}
				}
			});
			return false;
		}
		/* form submit */
	});
});
/* FUNCION JQUERY PARA VALIDAR ASIGNACION DE OTROS SERVICIOS */


//update otros

$("#btn-otros-update").on('click',function(){

	if($("#search_servicio_otros").val().length < 1){
		var n = noty({
			text: "<span class='fa fa-warning'></span> Debe seleccionar un servicio",
			theme: 'defaultTheme',
			layout: 'topCenter',
			type: 'warning',
			timeout: 5000,
		});
	}else if($("#costo_otros").val().length < 1){
		var n = noty({
			text: "<span class='fa fa-warning'></span> Debe indicar un costo",
			theme: 'defaultTheme',
			layout: 'topCenter',
			type: 'warning',
			timeout: 5000,
		});
	}else if($("#search_pais_otros").val().length < 1){
		var n = noty({
			text: "<span class='fa fa-warning'></span>Debe ingresar un pais",
			theme: 'defaultTheme',
			layout: 'topCenter',
			type: 'warning',
			timeout: 5000,
		});
	}else if($("#search_provincia_otros").val().length < 1){
		var n = noty({
			text: "<span class='fa fa-warning'></span>Debe ingresar una provincia",
			theme: 'defaultTheme',
			layout: 'topCenter',
			type: 'warning',
			timeout: 5000,
		});
	}else if($("#search_localidad_otros").val().length < 1){
		var n = noty({
			text: "<span class='fa fa-warning'></span>Debe ingresar una localidad",
			theme: 'defaultTheme',
			layout: 'topCenter',
			type: 'warning',
			timeout: 5000,
		});
	}else{
	var data = $("#updateotros").serialize();
	var seccion = $("#seccionotros").val();
	var industria = $("#id_industria_modal").val();

	$.ajax({
		type: 'POST',
		url: '/updateServicio',
		async: false,
		data: {
			_token: $('meta[name="csrf-token"]').attr('content'),
			data:data,
			id_industria: industria
		},
		beforeSend: function () {
			$("#save").fadeOut();
			$("#btn-otros").html('<i class="fa fa-refresh"></i> Verificando...');
		},
		success: function (data) {
			if (data.status == 1) {

				$("#save").fadeIn(1000, function () {

					var n = noty({
						text: "<span class='fa fa-warning'></span>"+data.msg,
						theme: 'defaultTheme',
						layout: 'topCenter',
						type: 'warning',
						timeout: 5000,
					});
					$("#btn-otros").html('<span class="fa fa-save"></span> Agregar y Guardar');

				});
			}
			else if (data == 2) {

				$("#save").fadeIn(1000, function () {

					var n = noty({
						text: "<span class='fa fa-warning'></span> ESTE SERVICIO YA SE ENCUENTRA REGISTRADO, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
						theme: 'defaultTheme',
						layout: 'center',
						type: 'warning',
						timeout: 5000,
					});
					$("#btn-otros-update").html('<span class="fa fa-save"></span> Agregar y Guardar');

				});
			}
			else if(data.status ==200) {

				$("#save").fadeIn(1000, function () {

					var n = noty({
						text: '<center> ' + data.msg + ' </center>',
						theme: 'defaultTheme',
						layout: 'topCenter',
						type: 'information',
						timeout: 5000,
					});
					$('#MyModalOtros').modal('hide');
					//$('#secciones').load("formularios.php?BuscaFormularioProcedimiento=si&seccion=" + seccion + "&in=" + industria);
					
					$("#btn-otros-update").hide();
			      $("#btn-otros").show();

			     


			      $("#updateotros #id_rel_industria_otros").val("");
			      //$("#updateotros #industria_otros").val(id_industria);
			      //$("#updateotros #nombre_de_fantasia").text(nombre_de_fantasia);
			      $("#updateotros #id_servicio_otros").val("");
			      $("#updateotros #search_servicio_otros").val("");

			      $("#updateotros #costo_otros").val("");
			      //$("#updateotros #servicio_contratado").val(servicio_contratado);
			      $("#updateotros #id_pais_servicio").val("");
			      $("#updateotros #search_pais_otros").val("");
			      $("#updateotros #id_provincia_otros").val("");
			      $("#updateotros #search_provincia_otros").val("");
			      $("#updateotros #id_localidad_otros").val("");
			      $("#updateotros #search_localidad_otros").val("");
			      $("#updateotros #motivo_importacion_otros").val("");
			      $("#updateotros #detalles_otros").val("");

			       $("#updateotros").prop('id', 'saveotros');
			      $("#saveotros").prop('name', 'saveotros');



					/*$("#updateotros")[0].reset();
					$("#updateotros #otros").val("saveotros");
					$("#muestracondicionotros").html("");
					$("#updateotros #nombre_de_fantasia").text("");
					$("#updateotros #id_rel_industria_otros").val("");
					$("#updateotros #industria_otros").val("");
					$("#updateotros #anio_otros").val("");
					$("#updateotros #id_servicio").val("");
					$("#updateotros #detalles_otros").attr('disabled', true);*/
					$("#btn-otros-update").html('<span class="fa fa-save"></span> Agregar y Guardar');
					cargar_tabla_otros();
				});
			}
		}
	});
}
})

//boton cancelar otros

$("#btn-cancelar-otros").on('click',function(){

	 $("#btn-otros-update").hide();
     $("#btn-otros").show();

     $("#updateotros").prop('id', 'saveotros');
     $("#saveotros").prop('name', 'saveotros');

	document.getElementById('otros').value = 'saveotros',
    document.getElementById('id_rel_industria_otros').value = '',
    document.getElementById('anio_otros').value = '',
    document.getElementById('industria_otros').value = '',
    document.getElementById('id_servicio_otros').value = '',
    document.getElementById('search_servicio_otros').value = '',
    document.getElementById('costo_otros').value = '',
    document.getElementById('id_pais_otros').value = '',
    document.getElementById('search_pais_otros').value = '',
    document.getElementById('id_provincia_otros').value = '',
    document.getElementById('search_provincia_otros').value = '',
    document.getElementById('id_localidad_otros').value = '',
    document.getElementById('search_localidad_otros').value = '',
    document.getElementById('motivo_importacion_otros').value = '',
    document.getElementById('detalles_otros').value = ''
})


















/* FUNCION JQUERY PARA VALIDAR ASIGNACION DE EGRESOS DEVENGADOS */
$('document').ready(function () {

	/* validation */
	$("#savedevengados").validate({
		rules:
		{
			
			costo_devengado: { required: false, number: false },
		},
		messages:
		{
			
			costo_devengado: { required: "Ingrese Costo Asociado", number: "Ingrese solo digitos" },
		},
		submitHandler: function (form) {

			var data = $("#savedevengados").serialize();
			var seccion = $("#secciondevengados").val();
			var industria = $("#id_industria_modal").val();

			$.ajax({
				type: 'POST',
				url: '/saveDevengados',
				async: false,
				data: {
					_token: $('meta[name="csrf-token"]').attr('content'),
					data:data,
					id_industria: industria
				},
				beforeSend: function () {
					$("#save").fadeOut();
					$("#btn-devengados").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success: function (data) {
					if (data == 1) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> POR FAVOR DEBE DE COMPLETAR LOS CAMPOS REQUERIDOS, VERIFIQUE NUEVAMENTE POR FAVOR...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-devengados").html('<span class="fa fa-save"></span> Agregar y Guardar');

						});
					}
					else if (data == 2) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> POR FAVOR INGRESE UN IMPORTE TOTAL ANUAL VALIDO, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-devengados").html('<span class="fa fa-save"></span> Agregar y Guardar');

						});
					}
					else if (data == 3) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> ESTE GASTO GENERADO YA SE ENCUENTRA REGISTRADO, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-devengados").html('<span class="fa fa-save"></span> Agregar y Guardar');

						});
					}
					else if(data.status==200){

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: '<center> ' + data.msg + ' </center>',
								theme: 'defaultTheme',
								layout: 'topCenter',
								type: 'information',
								timeout: 5000,
							});
							$('#MyModalDevengados').modal('hide');
							
							$("#savedevengados")[0].reset();
							$("#savedevengados #nombre_de_fantasia").text("");
							
							
							
							$("#btn-devengados").html('<span class="fa fa-save"></span> Agregar y Guardar');
							cargar_tabla_gastos();
						});
					}
				}
			});
			return false;
		}
		/* form submit */
	});
});
/* FUNCION JQUERY PARA VALIDAR ASIGNACION DE EGRESOS DEVENGADOS */


/* FUNCION JQUERY PARA VALIDAR ACTUALIZAR EGRESO DEVENGADO */
$('document').ready(function () {

	/* validation */
	$("#updatedevengados").validate({
		rules:
		{
		
			costo_egreso: { required: false, number: false },
		},
		messages:
		{
			
			costo_egreso: { required: "Ingrese Costo Asociado", number: "Ingrese solo digitos" },
		},
		submitHandler: function (form) {

			var data = $("#updatedevengados").serialize();
			var seccion = $("#secciondevengadosupdate").val();
			var industria = $("#id_industria_modal").val();

			$.ajax({
				type: 'POST',
				url: '/updateDevengados',
				async: false,
				data: {
					_token: $('meta[name="csrf-token"]').attr('content'),
					data:data,
					id_industria: industria
				},
				beforeSend: function () {
					$("#save").fadeOut();
					$("#btn-egresosupdate").html('<i class="fa fa-edit"></i> Verificando...');
				},
				success: function (data) {
					if (data.status == 1) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span>"+data.msg,
								theme: 'defaultTheme',
								layout: 'topCenter',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-egresosupdate").html('<span class="fa fa-edit"></span> Actualizar');

						});
					}
					else if (data == 2) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> POR FAVOR INGRESE UN IMPORTE TOTAL ANUAL VALIDO, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-egresosupdate").html('<span class="fa fa-edit"></span> Actualizar');

						});
					}
					else if(data.status == 200) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: '<center> ' + data.msg + ' </center>',
								theme: 'defaultTheme',
								layout: 'topCenter',
								type: 'information',
								timeout: 5000,
							});
							$('#MyModalUpdateDevengado').modal('hide');
							
							$("#updatedevengados")[0].reset();
							
							$("#updatedevengados #id_rel_industria_devengados_update").val("");
							
						
							$("#btn-egresosupdate").html('<span class="fa fa-edit"></span> Actualizar');

							cargar_tabla_gastos();
						});
					}
				}
			});
			return false;
		}
		/* form submit */
	});
});
/* FUNCION JQUERY PARA VALIDAR ACTUALIZAR EGRESO DEVENGADO */


















/* FUNCION JQUERY PARA VALIDAR ASIGNACION DE SITUACION DE PLANTA */
$('document').ready(function () {

	/* validation */
	$("#savesituacion").validate({
		rules:
		{
			produccion_sobre_capacidad: { required: true, number: true },
			superficie_lote: { required: true, },
			superficie_planta: { required: true, },
			es_zona_industrial: { required: true, },
			declara_inversion: { required: true, },
			inversion_anual: { required: true, number: true },
			inversion_activo_fijo: { required: true, number: true },
			capacidad_instalada: { required: true, number: true },
			capacidad_ociosa: { required: true, number: true },
		},
		messages:
		{
			produccion_sobre_capacidad: { required: "Ingrese Porcentaje de Producción", number: "Ingrese solo digitos" },
			superficie_lote: { required: "Ingrese Superficie de Lote Industrial" },
			superficie_planta: { required: "Ingrese Superficie de Lote Planta" },
			es_zona_industrial: { required: "Seleccione si es Zona Industrial" },
			declara_inversion: { required: "Seleccione Declara Inversión" },
			inversion_anual: { required: "Ingrese Importe de Inversión", number: "Ingrese solo digitos" },
			inversion_activo_fijo: { required: "Ingrese Inversión Activo Fijo", number: "Ingrese solo digitos" },
			capacidad_instalada: { required: "Ingrese Porcentaje de Capacidad Instalada", number: "Ingrese solo digitos" },
			capacidad_ociosa: { required: "Ingrese Porcentaje de Capacidad Ociosa", number: "Ingrese solo digitos" },
		},
		submitHandler: function (form) {

			var data = $("#savesituacion").serialize();
			var seccion = $("#seccionsituacion").val();
			var industria = $("#id_industria_modal").val();

			$.ajax({
				type: 'POST',
				url: '/savesituacion',
				async: false,
				data: {

					_token: $('meta[name="csrf-token"]').attr('content'),
					data:data,
					id_industria:industria
				},
				beforeSend: function () {
					$("#save").fadeOut();
					$("#btn-situacion").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success: function (data) {
					if (data.msg == 1) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span>"+data.msg,
								theme: 'defaultTheme',
								layout: 'topCenter',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-situacion").html('<span class="fa fa-save"></span> Agregar y Guardar');

						});
					}
					else if (data == 2) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> POR FAVOR INGRESE UN VALOR VALIDO EN IMPORTE E INVERSIÓN, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-situacion").html('<span class="fa fa-save"></span> Agregar y Guardar');

						});
					}
					else if (data == 3) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> ESTA SITUACION DE PLANTA YA SE ENCUENTRA REGISTRADA, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-situacion").html('<span class="fa fa-save"></span> Agregar y Guardar');

						});
					}
					else if(data.status == 200) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: '<center> ' + data.msg + ' </center>',
								theme: 'defaultTheme',
								layout: 'topCenter',
								type: 'information',
								timeout: 5000,
							});
							$('#MyModalSituacion').modal('hide');
							//$('#secciones').load("formularios.php?BuscaFormularioProcedimiento=si&seccion=" + seccion + "&in=" + industria);
							$("#savesituacion")[0].reset();
							$("#savesituacion #situacion").val("savesituacion");
							$("#savesituacion #nombre_de_fantasia").text("");
							$("#savesituacion #id_situacion_de_planta").val("");
							$("#savesituacion #industria_situacion").val("");
							//$("#savesituacion #anio_situacion").val("");
							//$("#savesituacion #inversion_anual").attr('disabled', true);
							//$("#savesituacion #inversion_activo_fijo").attr('disabled', true);
							$("#btn-situacion").html('<span class="fa fa-save"></span> Agregar y Guardar');

							cargar_tabla_splanta();
						});
					}
				}
			});
			return false;
		}
		/* form submit */
	});
});
/* FUNCION JQUERY PARA VALIDAR ASIGNACION DE SITUACION DE PLANTA */

// update situacion


$("#btn-situacion-update").on('click',function(){

	if($("#produccion_sobre_capacidad").val().length < 1){

		var n = noty({
			text: "<span class='fa fa-warning'></span>Ingrese Porcentaje de producción",
			theme: 'defaultTheme',
			layout: 'topCenter',
			type: 'warning',
			timeout: 5000,
		});

	}else if($("#superficie_lote").val().length < 1){
		var n = noty({
			text: "<span class='fa fa-warning'></span>Ingrese Superficie de lote",
			theme: 'defaultTheme',
			layout: 'topCenter',
			type: 'warning',
			timeout: 5000,
		});
	}else if($("#superficie_planta").val().length < 1){
		var n = noty({
			text: "<span class='fa fa-warning'></span>Ingrese Superficie de planta",
			theme: 'defaultTheme',
			layout: 'topCenter',
			type: 'warning',
			timeout: 5000,
		});
	}else if($("#declara_inversion").val() == 1){

		if($("#inversion_anual").val().length < 1){
				var n = noty({
				text: "<span class='fa fa-warning'></span>Ingrese Importe de inversion",
				theme: 'defaultTheme',
				layout: 'topCenter',
				type: 'warning',
				timeout: 5000,
			});
		}

		if($("#inversion_activo_fijo").val().length < 1){
				var n = noty({
				text: "<span class='fa fa-warning'></span>Ingrese inversion activo fijo",
				theme: 'defaultTheme',
				layout: 'topCenter',
				type: 'warning',
				timeout: 5000,
			});
		}


	}else if($("#capacidad_instalada").val().length < 1){
		var n = noty({
				text: "<span class='fa fa-warning'></span>Ingrese porcentaje de capacidad instalada",
				theme: 'defaultTheme',
				layout: 'topCenter',
				type: 'warning',
				timeout: 5000,
			});
	}else if($("#capacidad_ociosa").val().length < 1){
		var n = noty({
				text: "<span class='fa fa-warning'></span>Ingrese porcentaje de capacidad ociosa",
				theme: 'defaultTheme',
				layout: 'topCenter',
				type: 'warning',
				timeout: 5000,
			});
	}else{




			var data = $("#updatesituacion").serialize();
			var seccion = $("#seccionsituacion").val();
			var industria = $("#id_industria_modal").val();

			$.ajax({
				type: 'POST',
				url: '/updatesituacion',
				async: false,
				data: {

					_token: $('meta[name="csrf-token"]').attr('content'),
					data:data,
					id_industria:industria
				},
				beforeSend: function () {
					$("#save").fadeOut();
					$("#btn-situacion-update").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success: function (data) {
					if (data.msg == 1) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span>"+data.msg,
								theme: 'defaultTheme',
								layout: 'topCenter',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-situacion").html('<span class="fa fa-save"></span> Agregar y Guardar');

						});
					}
					else if (data == 2) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> POR FAVOR INGRESE UN VALOR VALIDO EN IMPORTE E INVERSIÓN, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-situacion").html('<span class="fa fa-save"></span> Agregar y Guardar');

						});
					}
					else if (data == 3) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> ESTA SITUACION DE PLANTA YA SE ENCUENTRA REGISTRADA, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-situacion").html('<span class="fa fa-save"></span> Agregar y Guardar');

						});
					}
					else if(data.status == 200) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: '<center> ' + data.msg + ' </center>',
								theme: 'defaultTheme',
								layout: 'topCenter',
								type: 'information',
								timeout: 5000,
							});
							$('#MyModalSituacion').modal('hide');
							//$('#secciones').load("formularios.php?BuscaFormularioProcedimiento=si&seccion=" + seccion + "&in=" + industria);
							$("#updatesituacion")[0].reset();
							$("#updatesituacion #situacion").val("savesituacion");
							//$("#updatesituacion #nombre_de_fantasia").text("");
							$("#updatesituacion #id_situacion_de_planta").val("");
							$("#updatesituacion #industria_situacion").val("");
							//$("#updatesituacion #anio_situacion").val("");
							//$("#updatesituacion #inversion_anual").attr('disabled', true);
							//$("#updatesituacion #inversion_activo_fijo").attr('disabled', true);
							$("#btn-situacion").html('<span class="fa fa-save"></span> Agregar y Guardar');
							cargar_tabla_splanta();
						});
					}
				}
			});
			return false;




	}


})

















/* FUNCION JQUERY PARA VALIDAR ASIGNACION DE MOTIVO OCIOSIDAD */
$('document').ready(function () {
	/* validation */
	$("#savemotivoasignado").validate({
		rules:
		{
			search_motivo: { required: true, },
		},
		messages:
		{
			search_motivo: { required: "Realice la Búsqueda de Motivo Ociosidad o Ingrese Descripción" },
		},
		submitHandler: function (form) {

			var data = $("#savemotivoasignado").serialize();
			var seccion = $("#seccionmotivo").val();
			var industria = $("#id_industria_modal").val();

			$.ajax({
				type: 'POST',
				url: '/saveMotivo',
				async: false,
				data: {
					_token: $('meta[name="csrf-token"]').attr('content'),
					data:data,
					id_industria:industria
				},
				beforeSend: function () {
					$("#save").fadeOut();
					$("#btn-motivo").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success: function (data) {
					if (data.status == 1) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span>"+data.msg,
								theme: 'defaultTheme',
								layout: 'topCenter',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-motivo").html('<span class="fa fa-save"></span> Agregar y Guardar');

						});
					}
					else if (data == 2) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> ESTE MOTIVO DE OCIOSIDAD YA SE ENCUENTRA REGISTRADO, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-motivo").html('<span class="fa fa-save"></span> Agregar y Guardar');

						});
					}
					else if(data.status ==200) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: '<center> ' + data.msg + ' </center>',
								theme: 'defaultTheme',
								layout: 'topCenter',
								type: 'information',
								timeout: 5000,
							});
							$('#MyModalMotivo').modal('hide');
							//$('#secciones').load("formularios.php?BuscaFormularioProcedimiento=si&seccion=" + seccion + "&in=" + industria);
							$("#savemotivoasignado")[0].reset();
							$("#savemotivoasignado #motivo").val("savemotivo");
							$("#savemotivoasignado #nombre_de_fantasia").text("");
							$("#savemotivoasignado #id_rel_industria_motivo_ociosidad").val("");
							$("#savemotivoasignado #industria_motivo").val("");
							$("#savemotivoasignado #anio_motivo").val("");
							$("#savemotivoasignado #id_motivo_ociosidad").val("");
							$("#btn-motivo").html('<span class="fa fa-save"></span> Agregar y Guardar');
							cargar_tabla_motivo_ociosidad();
							trae_motivo_ociosidad(); 



							$(".selectMotivo").show();
        					$(".motivoNuevo").hide();
						});
					}
				}
			});
			return false;
		}
		/* form submit */
	});
});
/* FUNCION JQUERY PARA VALIDAR ASIGNACION DE MOTIVO OCIOSIDAD */

//update motivo

$("#btn-motivo-update").on('click',function(){
var guardar =1
	if($('#check_otro').val() == "true"){

		if($("#motivo_nuevo").val().length < 1){
			guardar=0;
			var n = noty({
				text: "<span class='fa fa-warning'></span>Ingrese el nombre del motivo",
				theme: 'defaultTheme',
				layout: 'topCenter',
				type: 'warning',
				timeout: 5000,
			});

		}

	}else if($("#id_motivo_ociosidad").val() == ""){
		guardar=0;
		var n = noty({
				text: "<span class='fa fa-warning'></span>Seleccione motivo de ociosidad",
				theme: 'defaultTheme',
				layout: 'topCenter',
				type: 'warning',
				timeout: 5000,
			});
	}



	if(guardar == 1){


		var data = $("#updatemotivoasignado").serialize();
			var seccion = $("#seccionmotivo").val();
			var industria = $("#id_industria_modal").val();

			$.ajax({
				type: 'POST',
				url: '/updateMotivo',
				async: false,
				data: {
					_token: $('meta[name="csrf-token"]').attr('content'),
					data:data,
					id_industria:industria
				},
				beforeSend: function () {
					$("#save").fadeOut();
					$("#btn-motivo-update").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success: function (data) {
					if (data.status == 1) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span>"+data.msg,
								theme: 'defaultTheme',
								layout: 'topCenter',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-motivo-update").html('<span class="fa fa-save"></span> Actualizar');

						});
					}
					else if (data == 2) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> ESTE MOTIVO DE OCIOSIDAD YA SE ENCUENTRA REGISTRADO, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-motivo").html('<span class="fa fa-save"></span> Agregar y Guardar');

						});
					}
					else if(data.status == 200){

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: '<center> ' + data.msg + ' </center>',
								theme: 'defaultTheme',
								layout: 'topCenter',
								type: 'information',
								timeout: 5000,
							});
							$('#MyModalMotivo').modal('hide');
							//$('#secciones').load("formularios.php?BuscaFormularioProcedimiento=si&seccion=" + seccion + "&in=" + industria);
							$("#updatemotivoasignado")[0].reset();
							$("#updatemotivoasignado #motivo").val("savemotivo");
							$("#updatemotivoasignado #nombre_de_fantasia").text("");
							$("#updatemotivoasignado #id_rel_industria_motivo_ociosidad").val("");
							$("#updatemotivoasignado #industria_motivo").val("");
							$("#updatemotivoasignado #anio_motivo").val("");
							$("#updatemotivoasignado #id_motivo_ociosidad").val("");
							$("#btn-motivo-update").html('<span class="fa fa-save"></span> Actualizar');
							cargar_tabla_motivo_ociosidad();
							trae_motivo_ociosidad(); 

							$("#btn-motivo-update").hide();
		                    $("#btn-motivo").show();

		                    $("#updatemotivoasignado").prop('id', 'savemotivoasignado');
		                    $("#savemotivoasignado").prop('name', 'savemotivoasignado');



							$(".selectMotivo").show();
        					$(".motivoNuevo").hide();
						});
					}
				}
			});
			return false;


	}


})

















/* FUNCION JQUERY PARA VALIDAR ASIGNACION DE PERSONAL OCUPADO */
$('document').ready(function () {
	/* validation */
	$("#savepersonal").validate({
		rules:
		{
			rol_trabajador: { required: true },
		},
		messages:
		{
			rol_trabajador: { required: "Seleccione Rol de Trabajador" },
		},
		submitHandler: function (form) {

			var data = $("#savepersonal").serialize();
			var seccion = $("#seccionpersonal").val();
			var industria = $("#id_industria_modal").val();

			$.ajax({
				type: 'POST',
				url: '/savePersonalOcupado',
				async: false,
				data: {

					_token: $('meta[name="csrf-token"]').attr('content'),
					data:data,
					id_industria:industria

				},
				beforeSend: function () {
					$("#save").fadeOut();
					$("#btn-personal").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success: function (data) {
					if (data.status == 1) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span>"+data.msg,
								theme: 'defaultTheme',
								layout: 'topCenter',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-personal").html('<span class="fa fa-save"></span> Agregar y Guardar');

						});
					}
					else if (data == 2) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> NO PUEDEN EXISTIR CAMPOS VACIOS, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-personal").html('<span class="fa fa-save"></span> Agregar y Guardar');

						});
					}
					else if (data == 3) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> ESTAS CONDICIONES LABORALES DEL PERSONAL YA SE ENCUENTRA REGISTRADO, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-personal").html('<span class="fa fa-save"></span> Agregar y Guardar');

						});
					}
					else if(data.status==200){

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: '<center> ' + data.msg + ' </center>',
								theme: 'defaultTheme',
								layout: 'topCenter',
								type: 'information',
								timeout: 5000,
							});
							$('#MyModalPersonal').modal('hide');
							//$('#secciones').load("formularios.php?BuscaFormularioProcedimiento=si&seccion=" + seccion + "&in=" + industria);
							$("#savepersonal")[0].reset();
							
							$("#savepersonal #industria_personal").val("");
							$("#savepersonal #anio_personal").val("");
							$("#btn-personal").html('<span class="fa fa-save"></span> Agregar y Guardar');
							cargar_tabla_p_o_m()
							cargar_tabla_p_o_f()
						});
					}
				}
			});
			return false;
		}
		/* form submit */
	});
});
/* FUNCION JQUERY PARA VALIDAR ASIGNACION DE PERSONAL OCUPADO */

/* FUNCION JQUERY PARA VALIDAR ACTUALIZAR PERSONAL OCUPADO */
$('document').ready(function () {
	/* validation */
	$("#updatepersonal").validate({
		rules:
		{
			cantidad_servicio: { required: false, },
			costo_servicio: { required: false, number: false },
		},
		messages:
		{
			cantidad_servicio: { required: "Ingrese Cantidad Consumida" },
			costo_servicio: { required: "Ingrese Costo Asociado", number: "Ingrese solo digitos" },
		},
		submitHandler: function (form) {

			var data = $("#updatepersonal").serialize();
			var seccion = $("#seccionpersonalupdate").val();
			var industria = $("#id_industria_modal").val();

			$.ajax({
				type: 'POST',
				url: '/updateRelPersonal',
				async: false,
				data: {

					_token: $('meta[name="csrf-token"]').attr('content'),
					data:data,
					id_industria:industria
				},
				beforeSend: function () {
					$("#save").fadeOut();
					$("#btn-personalupdate").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success: function (data) {
					if (data.status == 1) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span>"+data.msg,
								theme: 'defaultTheme',
								layout: 'topCenter',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-personalupdate").html('<span class="fa fa-edit"></span> Actualizar');

						});
					}else if(data.status == 200 ){

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: '<center> ' + data.msg + ' </center>',
								theme: 'defaultTheme',
								layout: 'topCenter',
								type: 'information',
								timeout: 5000,
							});
							$('#MyModalUpdatePersonal').modal('hide');
							$("#updatepersonal")[0].reset();
							$("#updatepersonal #id_rel_industria_personal_update").val("");
							$("#updatepersonal #anio_personal_update").val("");
							$("#updatepersonal #rol_trabajador").text("");
							
							$("#btn-personalupdate").html('<span class="fa fa-edit"></span> Actualizar');
							cargar_tabla_p_o_m()
							cargar_tabla_p_o_f()
						});
					}
				}
			});
			return false;
		}
		/* form submit */
	});
});
/* FUNCION JQUERY PARA VALIDAR ACTUALIZAR PERSONAL OCUPADO */

















/* FUNCION JQUERY PARA VALIDAR ASIGNACION DE VENTAS */
$('document').ready(function () {
	/* validation */
	$("#saveventa").validate({
		rules:
		{
			id_clasificacion_ventas: { required: true, },
		},
		messages:
		{
			id_clasificacion_ventas: { required: "Seleccione Clasificación" },
		},
		submitHandler: function (form) {

			var data = $("#saveventa").serialize();
			var seccion = $("#seccionventa").val();
			var industria = $("#industria_venta").val();

			$.ajax({
				type: 'POST',
				url: 'procedimientos.php',
				async: false,
				data: data,
				beforeSend: function () {
					$("#save").fadeOut();
					$("#btn-venta").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success: function (data) {
					if (data == 1) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> POR FAVOR DEBE DE COMPLETAR LOS CAMPOS REQUERIDOS, VERIFIQUE NUEVAMENTE POR FAVOR...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-venta").html('<span class="fa fa-save"></span> Agregar y Guardar');

						});
					}
					else if (data == 2) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> SELECCIONE OPCIÓN EN CADA DESCRIPCIÓN EN VENTA, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-venta").html('<span class="fa fa-save"></span> Agregar y Guardar');

						});
					}
					else if (data == 3) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> SELECCIONE LA PROVINCIA PARA VENTAS, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-venta").html('<span class="fa fa-save"></span> Agregar y Guardar');

						});
					}
					else if (data == 4) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> SELECCIONE EL PAIS PARA VENTAS, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-venta").html('<span class="fa fa-save"></span> Agregar y Guardar');

						});
					}
					else if (data == 5) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> ESTA CLASIFICACIÓN YA SE ENCUENTRA REGISTRADA, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-venta").html('<span class="fa fa-save"></span> Agregar y Guardar');

						});
					}
					else {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: '<center> ' + data + ' </center>',
								theme: 'defaultTheme',
								layout: 'center',
								type: 'information',
								timeout: 5000,
							});
							$('#MyModalVenta').modal('hide');
							$('#secciones').load("formularios.php?BuscaFormularioProcedimiento=si&seccion=" + seccion + "&in=" + industria);
							$("#saveventa")[0].reset();
							$("#saveventa #nombre_de_fantasia").text("");
							$("#saveventa #industria_venta").val("");
							$("#saveventa #anio_venta").val("");
							$("input[type='checkbox']:checked:enabled").attr('checked', false);
							$("input[type='radio']:checked:enabled").attr('checked', false);
							$(".provincias").html("");
							$(".paises").html("");
							$("#btn-venta").html('<span class="fa fa-save"></span> Agregar y Guardar');
						});
					}
				}
			});
			return false;
		}
		/* form submit */
	});
});
/* FUNCION JQUERY PARA VALIDAR ASIGNACION DE VENTAS */

/* FUNCION JQUERY PARA VALIDAR ACTUALIZAR VENTAS */
$('document').ready(function () {
	/* validation */
	$("#updateventa").validate({
		rules:
		{
			id_clasificacion_ventas: { required: true, },
		},
		messages:
		{
			id_clasificacion_ventas: { required: "Seleccione Clasificación" },
		},
		submitHandler: function (form) {

			var data = $("#updateventa").serialize();
			var seccion = $("#seccionventaupdate").val();
			var industria = $("#industria_venta_update").val();

			$.ajax({
				type: 'POST',
				url: 'procedimientos.php',
				async: false,
				data: data,
				beforeSend: function () {
					$("#save").fadeOut();
					$("#btn-ventaupdate").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success: function (data) {
					if (data == 1) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> POR FAVOR DEBE DE COMPLETAR LOS CAMPOS REQUERIDOS, VERIFIQUE NUEVAMENTE POR FAVOR...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-ventaupdate").html('<span class="fa fa-edit"></span> Actualizar');

						});
					}
					else if (data == 2) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> SELECCIONE LA PROVINCIA PARA VENTAS, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-ventaupdate").html('<span class="fa fa-edit"></span> Actualizar');

						});
					}
					else if (data == 3) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> SELECCIONE EL PAIS PARA VENTAS, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-ventaupdate").html('<span class="fa fa-edit"></span> Actualizar');

						});
					}
					else if (data == 5) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> ESTA CLASIFICACIÓN YA SE ENCUENTRA REGISTRADA, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-ventaupdate").html('<span class="fa fa-edit"></span> Actualizar');

						});
					}
					else {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: '<center> ' + data + ' </center>',
								theme: 'defaultTheme',
								layout: 'center',
								type: 'information',
								timeout: 5000,
							});
							$('#MyModalUpdateVenta').modal('hide');
							$('#secciones').load("formularios.php?BuscaFormularioProcedimiento=si&seccion=" + seccion + "&in=" + industria);
							$("#updateventa")[0].reset();
							$("#updateventa #nombre_de_fantasia").text("");
							$("#updateventa #id_destino_ventas").val("");
							$("#updateventa #industria_venta_update").val("");
							$("#updateventa #anio_venta_update").val("");
							$("input[type='checkbox']:checked:enabled").attr('checked', false);
							$("input[type='radio']:checked:enabled").attr('checked', false);
							$(".provincias").html("");
							$(".paises").html("");
							$("#btn-ventaupdate").html('<span class="fa fa-edit"></span> Actualizar');
						});
					}
				}
			});
			return false;
		}
		/* form submit */
	});
});
/* FUNCION JQUERY PARA VALIDAR ACTUALIZAR VENTAS */
















/* FUNCION JQUERY PARA VALIDAR ASIGNACION DE FACTURACION */
$('document').ready(function () {
	/* validation */
	$("#savefacturacion").validate({
		rules:
		{
			prevision_ingresos_anio_corriente: { required: true, number: true },
			prevision_ingresos_anio_corriente_dolares: { required: true, number: true },
			porcentaje_prevision_mercado_interno: { required: true, number: true },
			porcentaje_prevision_mercado_externo: { required: true, number: true },
		},
		messages:
		{
			prevision_ingresos_anio_corriente: { required: "Ingrese Facturación Anual en Año Corriente (Pesos)", number: "Ingrese solo digitos" },
			prevision_ingresos_anio_corriente_dolares: { required: "Ingrese Facturación Anual en Año Corriente (USD)", number: "Ingrese solo digitos" },
			porcentaje_prevision_mercado_interno: { required: "Ingrese Facturación Mercado Interno (%)", number: "Ingrese solo digitos" },
			porcentaje_prevision_mercado_externo: { required: "Ingrese Facturación Mercado Externo (%)", number: "Ingrese solo digitos" },
		},
		submitHandler: function (form) {

			var data = $("#savefacturacion").serialize();
			var seccion = $("#seccionfacturacion").val();
			var industria = $("#industria_facturacion").val();

			$.ajax({
				type: 'POST',
				url: 'procedimientos.php',
				async: false,
				data: data,
				beforeSend: function () {
					$("#save").fadeOut();
					$("#btn-facturacion").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success: function (data) {
					if (data == 1) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> POR FAVOR DEBE DE COMPLETAR LOS CAMPOS REQUERIDOS, VERIFIQUE NUEVAMENTE POR FAVOR...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-facturacion").html('<span class="fa fa-save"></span> Agregar y Guardar');

						});
					}
					else if (data == 2) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> ESTA FACTURACIÓN YA SE ENCUENTRA REGISTRADA, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-facturacion").html('<span class="fa fa-save"></span> Agregar y Guardar');

						});
					}
					else {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: '<center> ' + data + ' </center>',
								theme: 'defaultTheme',
								layout: 'center',
								type: 'information',
								timeout: 5000,
							});
							$('#MyModalFacturacion').modal('hide');
							$('#secciones').load("formularios.php?BuscaFormularioProcedimiento=si&seccion=" + seccion + "&in=" + industria);
							$("#savefacturacion")[0].reset();
							$("#muestraingresos").html("");
							$("#savefacturacion #facturacion").val("savefacturacion");
							$("#savefacturacion #nombre_de_fantasia").text("");
							$("#savefacturacion #id_facturacion").val("");
							$("#savefacturacion #industria_facturacion").val("");
							$("#savefacturacion #anio_facturacion").val("");
							$("#btn-facturacion").html('<span class="fa fa-save"></span> Agregar y Guardar');
						});
					}
				}
			});
			return false;
		}
		/* form submit */
	});
});
/* FUNCION JQUERY PARA VALIDAR ASIGNACION DE FACTURACION */




















/* FUNCION JQUERY PARA VALIDAR ASIGNACION DE EFLUENTES */
$('document').ready(function () {
	/* validation */
	$("#saveefluente").validate({
		rules:
		{
			search_efluente: { required: true, },
			tratamiento_residuo: { required: true, },
			destino: { required: true, },
		},
		messages:
		{
			search_efluente: { required: "Ingrese Nombre o Descripción de Residuo" },
			tratamiento_residuo: { required: "Ingrese Tratamiento Residuo" },
			destino: { required: "Ingrese Destino Final " },
		},
		submitHandler: function (form) {

			var data = $("#saveefluente").serialize();
			var seccion = $("#seccionefluente").val();
			var industria = $("#industria_efluente").val();

			$.ajax({
				type: 'POST',
				url: 'procedimientos.php',
				async: false,
				data: data,
				beforeSend: function () {
					$("#save").fadeOut();
					$("#btn-efluente").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success: function (data) {
					if (data == 1) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> POR FAVOR DEBE DE COMPLETAR LOS CAMPOS REQUERIDOS, VERIFIQUE NUEVAMENTE POR FAVOR...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-efluente").html('<span class="fa fa-save"></span> Agregar y Guardar');

						});
					}
					else if (data == 2) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> ESTE RESIDUO YA SE ENCUENTRA REGISTRADO, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-efluente").html('<span class="fa fa-save"></span> Agregar y Guardar');

						});
					}
					else {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: '<center> ' + data + ' </center>',
								theme: 'defaultTheme',
								layout: 'center',
								type: 'information',
								timeout: 5000,
							});
							$('#MyModalEfluente').modal('hide');
							$('#secciones').load("formularios.php?BuscaFormularioProcedimiento=si&seccion=" + seccion + "&in=" + industria);
							$("#saveefluente")[0].reset();
							$("#saveefluente #efluente").val("saveefluente");
							$("#saveefluente #nombre_de_fantasia").text("");
							$("#saveefluente #id_rel_industria_efluente").val("");
							$("#saveefluente #industria_efluente").val("");
							$("#saveefluente #anio_efluente").val("");
							$("#saveefluente #id_efluente").val("");
							$("#btn-efluente").html('<span class="fa fa-save"></span> Agregar y Guardar');
						});
					}
				}
			});
			return false;
		}
		/* form submit */
	});
});
/* FUNCION JQUERY PARA VALIDAR ASIGNACION DE EFLUENTES */

















/* FUNCION JQUERY PARA VALIDAR ASIGNACION DE CERTIFICADOS */
$('document').ready(function () {
	/* validation */
	$("#savecertificado").validate({
		rules:
		{
			inicio_certificado: { required: true, },
			fin_certificado: { required: true, },
		},
		messages:
		{
			inicio_certificado: { required: "Ingrese Fecha Inicial" },
			fin_certificado: { required: "Ingrese Fecha Final" },
		},
		submitHandler: function (form) {

			var data = $("#savecertificado").serialize();
			var seccion = $("#seccioncertificado").val();
			var industria = $("#industria_certificado").val();

			$.ajax({
				type: 'POST',
				url: 'procedimientos.php',
				async: false,
				data: data,
				beforeSend: function () {
					$("#save").fadeOut();
					$("#btn-certificado").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success: function (data) {
					if (data == 1) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> POR FAVOR DEBE DE COMPLETAR LOS CAMPOS REQUERIDOS, VERIFIQUE NUEVAMENTE POR FAVOR...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-certificado").html('<span class="fa fa-save"></span> Agregar y Guardar');

						});
					}
					else if (data == 2) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> SELECCIONE UN ESTADO PARA CADA CERTIFICADO, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-certificado").html('<span class="fa fa-save"></span> Agregar y Guardar');

						});
					}
					else if (data == 3) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> LA FECHA DE CERTIFICADO INICIAL NO PUEDE SER MENOR QUE LA FECHA INICIO DE CONTRIBUYENTE, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-certificado").html('<span class="fa fa-save"></span> Agregar y Guardar');

						});
					}
					else if (data == 4) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> EL CERTIFICADO INICIAL NO PUEDE SER MAYOR AL CERTIFICADO FINAL, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-certificado").html('<span class="fa fa-save"></span> Agregar y Guardar');

						});
					}
					else if (data == 5) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> ESTE CERTIFICADO YA SE ENCUENTRA REGISTRADO, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-certificado").html('<span class="fa fa-save"></span> Agregar y Guardar');

						});
					}
					else {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: '<center> ' + data + ' </center>',
								theme: 'defaultTheme',
								layout: 'center',
								type: 'information',
								timeout: 5000,
							});
							$('#MyModalCertificado').modal('hide');
							$('#secciones').load("formularios.php?BuscaFormularioProcedimiento=si&seccion=" + seccion + "&in=" + industria);
							$("#savecertificado")[0].reset();
							$("#savecertificado #nombre_de_fantasia").text("");
							$("#savecertificado #industria_certificado").val("");
							$("#savecertificado #fecha_contribuyente_certificado").val("");
							$("#savecertificado #anio_certificado").val("");
							$("#btn-certificado").html('<span class="fa fa-save"></span> Agregar y Guardar');
						});
					}
				}
			});
			return false;
		}
		/* form submit */
	});
});
/* FUNCION JQUERY PARA VALIDAR ASIGNACION DE CERTIFICADOS */

/* FUNCION JQUERY PARA VALIDAR ACTUALIZAR CERTIFICADO */
$('document').ready(function () {
	/* validation */
	$("#updatecertificado").validate({
		rules:
		{
			inicio_certificado: { required: true, },
			fin_certificado: { required: true, },
		},
		messages:
		{
			inicio_certificado: { required: "Ingrese Fecha Inicial" },
			fin_certificado: { required: "Ingrese Fecha Final" },
		},
		submitHandler: function (form) {

			var data = $("#updatecertificado").serialize();
			var seccion = $("#seccioncertificadoupdate").val();
			var industria = $("#industria_certificado_update").val();

			$.ajax({
				type: 'POST',
				url: 'procedimientos.php',
				async: false,
				data: data,
				beforeSend: function () {
					$("#save").fadeOut();
					$("#btn-certificadoupdate").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success: function (data) {
					if (data == 1) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> POR FAVOR DEBE DE COMPLETAR LOS CAMPOS REQUERIDOS, VERIFIQUE NUEVAMENTE POR FAVOR...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-certificadoupdate").html('<span class="fa fa-edit"></span> Actualizar');

						});
					}
					else if (data == 2) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> INGRESE FECHA INICIAL, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-certificadoupdate").html('<span class="fa fa-edit"></span> Actualizar');

						});
					}
					else if (data == 3) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> INGRESE FECHA FINAL, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-certificadoupdate").html('<span class="fa fa-edit"></span> Actualizar');

						});
					}
					else if (data == 4) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> LA FECHA DE CERTIFICADO INICIAL NO PUEDE SER MENOR QUE LA FECHA INICIO DE CONTRIBUYENTE, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-certificadoupdate").html('<span class="fa fa-edit"></span> Actualizar');

						});
					}
					else if (data == 5) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> EL CERTIFICADO INICIAL NO PUEDE SER MAYOR AL CERTIFICADO FINAL, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-certificadoupdate").html('<span class="fa fa-edit"></span> Actualizar');

						});
					}
					else {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: '<center> ' + data + ' </center>',
								theme: 'defaultTheme',
								layout: 'center',
								type: 'information',
								timeout: 5000,
							});
							$('#MyModalUpdateCertificado').modal('hide');
							$('#secciones').load("formularios.php?BuscaFormularioProcedimiento=si&seccion=" + seccion + "&in=" + industria);
							$("#updatecertificado")[0].reset();
							$("#updatecertificado #nombre_de_fantasia").text("");
							$("#updatecertificado #nombre_certificado").text("");
							$("#updatecertificado #id_rel_industria_certificado").val("");
							$("#updatecertificado #industria_certificado_update").val("");
							$("#updatecertificado #fecha_contribuyente_certificado_update").val("");
							$("#updatecertificado #anio_certificado_update").val("");
							$("#btn-certificadoupdate").html('<span class="fa fa-edit"></span> Actualizar');
						});
					}
				}
			});
			return false;
		}
		/* form submit */
	});
});
/* FUNCION JQUERY PARA VALIDAR ACTUALIZAR CERTIFICADO */



















/* FUNCION JQUERY PARA VALIDAR ASIGNACION DE NORMA DE CALIDAD */
$('document').ready(function () {
	/* validation */
	$("#savesistema").validate({
		rules:
		{
			inicio_sistema: { required: true, },
			fin_sistema: { required: true, },
		},
		messages:
		{
			inicio_sistema: { required: "Ingrese Fecha Inicial" },
			fin_sistema: { required: "Ingrese Fecha Final" },
		},
		submitHandler: function (form) {

			var data = $("#savesistema").serialize();
			var seccion = $("#seccionsistema").val();
			var industria = $("#industria_sistema").val();

			$.ajax({
				type: 'POST',
				url: 'procedimientos.php',
				async: false,
				data: data,
				beforeSend: function () {
					$("#save").fadeOut();
					$("#btn-sistema").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success: function (data) {
					if (data == 1) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> POR FAVOR DEBE DE COMPLETAR LOS CAMPOS REQUERIDOS, VERIFIQUE NUEVAMENTE POR FAVOR...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-sistema").html('<span class="fa fa-save"></span> Agregar y Guardar');

						});
					}
					else if (data == 2) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> SELECCIONE UN ESTADO PARA CADA NORMA DE CALIDAD, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-sistema").html('<span class="fa fa-save"></span> Agregar y Guardar');

						});
					}
					else if (data == 3) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> LA NORMA DE CALIDAD INICIAL NO PUEDE SER MAYOR A LA NORMA DE CALIDAD FINAL, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-certificado").html('<span class="fa fa-save"></span> Agregar y Guardar');

						});
					}
					else if (data == 4) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> ESTA NORMA YA SE ENCUENTRA REGISTRADA, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-sistema").html('<span class="fa fa-save"></span> Agregar y Guardar');

						});
					}
					else {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: '<center> ' + data + ' </center>',
								theme: 'defaultTheme',
								layout: 'center',
								type: 'information',
								timeout: 5000,
							});
							$('#MyModalSistema').modal('hide');
							$('#secciones').load("formularios.php?BuscaFormularioProcedimiento=si&seccion=" + seccion + "&in=" + industria);
							$("#savesistema")[0].reset();
							$("#savesistema #sistema").val("savesistema");
							$("#savesistema #nombre_de_fantasia").text("");
							$("#savesistema #industria_sistema").val("");
							$("#savesistema #anio_sistema").val("");
							$("#btn-sistema").html('<span class="fa fa-save"></span> Agregar y Guardar');
						});
					}
				}
			});
			return false;
		}
		/* form submit */
	});
});
/* FUNCION JQUERY PARA VALIDAR ASIGNACION DE NORMA DE CALIDAD */

/* FUNCION JQUERY PARA VALIDAR ACTUALIZAR NORMA DE CALIDAD */
$('document').ready(function () {
	/* validation */
	$("#updatesistema").validate({
		rules:
		{
			inicio_sistema: { required: true, },
			fin_sistema: { required: true, },
		},
		messages:
		{
			inicio_sistema: { required: "Ingrese Fecha Inicial" },
			fin_sistema: { required: "Ingrese Fecha Final" },
		},
		submitHandler: function (form) {

			var data = $("#updatesistema").serialize();
			var seccion = $("#seccionsistemaupdate").val();
			var industria = $("#industria_sistema_update").val();

			$.ajax({
				type: 'POST',
				url: 'procedimientos.php',
				async: false,
				data: data,
				beforeSend: function () {
					$("#save").fadeOut();
					$("#btn-sistemaupdate").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success: function (data) {
					if (data == 1) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> POR FAVOR DEBE DE COMPLETAR LOS CAMPOS REQUERIDOS, VERIFIQUE NUEVAMENTE POR FAVOR...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-sistemaupdate").html('<span class="fa fa-edit"></span> Actualizar');

						});
					}
					else if (data == 2) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> INGRESE FECHA INICIAL, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-sistemaupdate").html('<span class="fa fa-edit"></span> Actualizar');

						});
					}
					else if (data == 3) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> INGRESE FECHA FINAL, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-sistemaupdate").html('<span class="fa fa-edit"></span> Actualizar');

						});
					}
					else {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: '<center> ' + data + ' </center>',
								theme: 'defaultTheme',
								layout: 'center',
								type: 'information',
								timeout: 5000,
							});
							$('#MyModalUpdateSistema').modal('hide');
							$('#secciones').load("formularios.php?BuscaFormularioProcedimiento=si&seccion=" + seccion + "&in=" + industria);
							$("#updatesistema")[0].reset();
							$("#updatesistema #nombre_de_fantasia").text("");
							$("#updatesistema #nombre_sistema").text("");
							$("#updatesistema #id_rel_industria_sistema").val("");
							$("#updatesistema #industria_sistema_update").val("");
							$("#updatesistema #anio_sistema_update").val("");
							$("#btn-sistemaupdate").html('<span class="fa fa-edit"></span> Actualizar');
						});
					}
				}
			});
			return false;
		}
		/* form submit */
	});
});
/* FUNCION JQUERY PARA VALIDAR ACTUALIZAR NORMA DE CALIDAD */






















/* FUNCION JQUERY PARA VALIDAR ASIGNACION DE PROMOCIONES */
$('document').ready(function () {
	/* validation */
	$("#savepromocion").validate({
		rules:
		{
			inicio_promocion: { required: true, },
			fin_promocion: { required: true, },
		},
		messages:
		{
			inicio_promocion: { required: "Ingrese Fecha Inicial" },
			fin_promocion: { required: "Ingrese Fecha Final" },
		},
		submitHandler: function (form) {

			var data = $("#savepromocion").serialize();
			var seccion = $("#seccionpromocion").val();
			var industria = $("#industria_promocion").val();

			$.ajax({
				type: 'POST',
				url: 'procedimientos.php',
				async: false,
				data: data,
				beforeSend: function () {
					$("#save").fadeOut();
					$("#btn-promocion").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success: function (data) {
					if (data == 1) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> POR FAVOR DEBE DE COMPLETAR LOS CAMPOS REQUERIDOS, VERIFIQUE NUEVAMENTE POR FAVOR...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-promocion").html('<span class="fa fa-save"></span> Agregar y Guardar');

						});
					}
					else if (data == 2) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> SELECCIONE UN ESTADO PARA CADA PROMOCION, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-promocion").html('<span class="fa fa-save"></span> Agregar y Guardar');

						});
					}
					else if (data == 3) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> ESTA PROMOCION YA SE ENCUENTRA REGISTRADA, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-certificado").html('<span class="fa fa-save"></span> Agregar y Guardar');

						});
					}
					else {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: '<center> ' + data + ' </center>',
								theme: 'defaultTheme',
								layout: 'center',
								type: 'information',
								timeout: 5000,
							});
							$('#MyModalPromocion').modal('hide');
							$('#secciones').load("formularios.php?BuscaFormularioProcedimiento=si&seccion=" + seccion + "&in=" + industria);
							$("#savepromocion")[0].reset();
							$("#savepromocion #promocion").val("savepromocion");
							$("#savepromocion #nombre_de_fantasia").text("");
							$("#savepromocion #industria_promocion").val("");
							$("#savepromocion #anio_promocion").val("");
							$("#btn-promocion").html('<span class="fa fa-save"></span> Agregar y Guardar');
						});
					}
				}
			});
			return false;
		}
		/* form submit */
	});
});
/* FUNCION JQUERY PARA VALIDAR ASIGNACION DE PROMOCIONES */

/* FUNCION JQUERY PARA VALIDAR ACTUALIZAR PROMOCIONES */
$('document').ready(function () {
	/* validation */
	$("#updatepromocion").validate({
		rules:
		{
			inicio_promocion: { required: true, },
			fin_promocion: { required: true, },
		},
		messages:
		{
			inicio_promocion: { required: "Ingrese Fecha Inicial" },
			fin_promocion: { required: "Ingrese Fecha Final" },
		},
		submitHandler: function (form) {

			var data = $("#updatepromocion").serialize();
			var seccion = $("#seccionpromocionupdate").val();
			var industria = $("#industria_promocion_update").val();

			$.ajax({
				type: 'POST',
				url: 'procedimientos.php',
				async: false,
				data: data,
				beforeSend: function () {
					$("#save").fadeOut();
					$("#btn-promocionupdate").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success: function (data) {
					if (data == 1) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> POR FAVOR DEBE DE COMPLETAR LOS CAMPOS REQUERIDOS, VERIFIQUE NUEVAMENTE POR FAVOR...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-promocionupdate").html('<span class="fa fa-edit"></span> Actualizar');

						});
					}
					else if (data == 2) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> INGRESE FECHA INICIAL, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-promocionupdate").html('<span class="fa fa-edit"></span> Actualizar');

						});
					}
					else if (data == 3) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> INGRESE FECHA FINAL, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-promocionupdate").html('<span class="fa fa-edit"></span> Actualizar');

						});
					}
					else {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: '<center> ' + data + ' </center>',
								theme: 'defaultTheme',
								layout: 'center',
								type: 'information',
								timeout: 5000,
							});
							$('#MyModalUpdatePromocion').modal('hide');
							$('#secciones').load("formularios.php?BuscaFormularioProcedimiento=si&seccion=" + seccion + "&in=" + industria);
							$("#updatepromocion")[0].reset();
							$("#updatepromocion #nombre_de_fantasia").text("");
							$("#updatepromocion #nombre_promocion").text("");
							$("#updatepromocion #id_rel_industria_promocion_industrial").val("");
							$("#updatepromocion #industria_promocion_update").val("");
							$("#updatepromocion #anio_promocion_update").val("");
							$("#btn-promocionupdate").html('<span class="fa fa-edit"></span> Actualizar');
						});
					}
				}
			});
			return false;
		}
		/* form submit */
	});
});
/* FUNCION JQUERY PARA VALIDAR ACTUALIZAR PROMOCIONES */


















/* FUNCION JQUERY PARA VALIDAR ASIGNACION DE ECONOMIA DEL CONOCIMIENTO */
$('document').ready(function () {
	/* validation */
	$("#saveeconomia").validate({
		rules:
		{
			otro_sector: { required: true, },
			otro_personal: { required: true, },
		},
		messages:
		{
			otro_sector: { required: "Ingrese Otros Sectores" },
			otro_personal: { required: "Ingrese Otros Personal" },
		},
		submitHandler: function (form) {

			var data = $("#saveeconomia").serialize();
			var seccion = $("#seccioneconomia").val();
			var industria = $("#industria_economia").val();

			$.ajax({
				type: 'POST',
				url: 'procedimientos.php',
				async: false,
				data: data,
				beforeSend: function () {
					$("#save").fadeOut();
					$("#btn-economia").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success: function (data) {
					if (data == 1) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> POR FAVOR DEBE DE COMPLETAR LOS CAMPOS REQUERIDOS, VERIFIQUE NUEVAMENTE POR FAVOR...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-economia").html('<span class="fa fa-save"></span> Agregar y Guardar');

						});
					}
					else if (data == 2) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> POR FAVOR DEBE DE SELECCIONAR AL MENOS UN (SI) EN SECTORES A INVERTIR, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-economia").html('<span class="fa fa-save"></span> Agregar y Guardar');

						});
					}
					else if (data == 3) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> POR FAVOR DEBE DE SELECCIONAR AL MENOS UN (SI) EN PERSONAL VINCULADO, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-economia").html('<span class="fa fa-save"></span> Agregar y Guardar');

						});
					}
					else if (data == 4) {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: "<span class='fa fa-warning'></span> ESTA ECONOMIA DEL CONOCIMIENTO YA SE ENCUENTRA REGISTRADA, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
								theme: 'defaultTheme',
								layout: 'center',
								type: 'warning',
								timeout: 5000,
							});
							$("#btn-economia").html('<span class="fa fa-save"></span> Agregar y Guardar');

						});
					}
					else {

						$("#save").fadeIn(1000, function () {

							var n = noty({
								text: '<center> ' + data + ' </center>',
								theme: 'defaultTheme',
								layout: 'center',
								type: 'information',
								timeout: 5000,
							});
							$('#MyModalEconomia').modal('hide');
							$('#secciones').load("formularios.php?BuscaFormularioProcedimiento=si&seccion=" + seccion + "&in=" + industria);
							$("#saveeconomia")[0].reset();
							$("#saveeconomia #economia").val("saveeconomia");
							$("#saveeconomia #nombre_de_fantasia").text("");
							$("#saveeconomia #id_economia").val("");
							$("#saveeconomia #industria_economia").val("");
							$("#saveeconomia #anio_economia").val("");
							$("#btn-economia").html('<span class="fa fa-save"></span> Agregar y Guardar');
						});
					}
				}
			});
			return false;
		}
		/* form submit */
	});
});
/* FUNCION JQUERY PARA VALIDAR ASIGNACION DE ECONOMIA DEL CONOCIMIENTO */
