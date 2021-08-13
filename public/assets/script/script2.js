//SELECCIONAR/DESELECCIONAR TODOS LOS CHECKBOX
$("#checkTodos").change(function () {
  $("input:checkbox").prop('checked', $(this).prop("checked"));
  //$("input[type='checkbox']:checked:enabled").prop('checked', $(this).prop("checked"));
});

// FUNCION PARA LIMPIAR CHECKBOX ACTIVOS
function LimpiarCheckbox() {
  $("input[type='checkbox']:checked:enabled").attr('checked', false);
}

// FUNCION PARA LIMPIAR RADIOS ACTIVOS
function LimpiarRadio() {
  $("input[type='radio']:checked:enabled").attr('checked', false);
  $(".provincias").html("");
  $(".paises").html("");
  $("#observaciones_status").val("");
}

//BUSQUEDA EN CONSULTAS
$(document).ready(function () {
  (function ($) {
    $('#FiltrarContenido').keyup(function () {
      var ValorBusqueda = new RegExp($(this).val(), 'i');
      $('.BusquedaRapida tr').hide();
      $('.BusquedaRapida tr').filter(function () {
        return ValorBusqueda.test($(this).text());
      }).show();
    })
  }(jQuery));
});


// FUNCION PARA OBTENER LATITUD Y LONGITUD DE UBICACION
function CargarCoordenadas() {

  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function (position) {
      document.getElementById("latitud").value = position.coords.latitude;
      document.getElementById("longitud").value = position.coords.longitude;
    }, function (error) {
      swal("Oops", "HA OCURRIDO UN ERROR AL OBTENER LOS DATOS DE GEOLOCALIZACION, INTENTE NUEVAMENTE POR FAVOR!", "error");
      //alert("Código de error: " + error.code);
      // error.code can be:
      //   0: unknown error
      //   1: permission denied
      //   2: position unavailable (error response from locaton provider)
      //   3: timed out
    });
  }
}


function ucfirst(str, force) {
  str = force ? str.toLowerCase() : str;
  return str.replace(/(\b)([a-zA-Z])/,
    function (firstLetter) {
      return firstLetter.toUpperCase();
    });
}

function ucwords(str, force) {
  str = force ? str.toLowerCase() : str;
  return str.replace(/(\b)([a-zA-Z])/g,
    function (firstLetter) {
      return firstLetter.toUpperCase();
    });
}


$(document).ready(function () {
  //La expresión regular encuentra la primer letra de cada palabra dentro de la oracíon ingresada y la transforma en mayúsculas.
  String.prototype.capitalize = function () {
    // \b encuentra los limites de una palabra
    // \w solo los meta-carácter  [a-zA-Z0-9].
    return this.toLowerCase().replace(/\b\w/g, function (m) {
      return m.toUpperCase();
    });
  };
  // Toma la primer letra de todo el texto ingresado y la cambia a mayúsculas y el resto lo pone en minúsculas
  String.prototype.firstLetterUpper = function () {
    return this.charAt(0).toUpperCase() + this.slice(1).toLowerCase();
  };

  var myCapitalizeText = $('.capitalizeText');
  var myFirstLetterText = $('.firstLetterText');
  var myToUpperText = $('.toUpperText');
  var myToLowerText = $('.toLowerText');

  myCapitalizeText.focusout(function () {
    $(this).val($(this).val().capitalize());
  });
  myFirstLetterText.focusout(function () {
    $(this).val($(this).val().firstLetterUpper());
  });
  myToUpperText.focusout(function () {
    $(this).val($(this).val().toUpperCase());
  });
  myToLowerText.focusout(function () {
    $(this).val($(this).val().toLowerCase());
  });
});



/////////////////////////////////// FUNCIONES DE USUARIOS //////////////////////////////////////

// FUNCION PARA MOSTRAR USUARIOS EN VENTANA MODAL
function VerUsuario(codigo) {

  $('#muestrausuariomodal').html('<center><i class="fa fa-spin fa-spinner"></i> Cargando información, por favor espere....</center>');

  var dataString = 'BuscaUsuarioModal=si&codigo=' + codigo;

  $.ajax({
    type: "GET",
    url: "funciones.php",
    data: dataString,
    success: function (response) {
      $('#muestrausuariomodal').empty();
      $('#muestrausuariomodal').append('' + response + '').fadeIn("slow");

    }
  });
}

// FUNCION PARA ACTUALIZAR USUARIOS
function UpdateUsuario(codigo, dni, nombres, id_sexo, id_provincia, search_provincia, id_localidad, search_localidad, direccion, telefono, celular, email, cargo, usuario, nivel, status, proceso) {
  // aqui asigno cada valor a los campos correspondientes
  $("#saveuser #codigo").val(codigo);
  $("#saveuser #dni").val(dni);
  $("#saveuser #nombres").val(nombres);
  $("#saveuser #id_sexo").val(id_sexo);
  $("#saveuser #id_provincia").val(id_provincia);
  $("#saveuser #search_provincia").val(search_provincia);
  $("#saveuser #id_localidad").val(id_localidad);
  $("#saveuser #search_localidad").val(search_localidad);
  $("#saveuser #direccion").val(direccion);
  $("#saveuser #telefono").val(telefono);
  $("#saveuser #celular").val(celular);
  $("#saveuser #email").val(email);
  $("#saveuser #cargo").val(cargo);
  $("#saveuser #usuario").val(usuario);
  $("#saveuser #nivel").val(nivel);
  $("#saveuser #status").val(status);
  $("#saveuser #proceso").val(proceso);
}


/////FUNCION PARA ELIMINAR USUARIOS
function EliminarUsuario(codigo, dni, tipo) {
  swal({
    title: "¿Estás seguro?",
    text: "¿Estás seguro de Eliminar este Usuario?",
    type: "warning",
    showCancelButton: true,
    cancelButtonText: "Cancelar",
    cancelButtonColor: '#d33',
    closeOnConfirm: false,
    confirmButtonText: "Eliminar",
    confirmButtonColor: "#808080"
  }, function () {
    $.ajax({
      type: "GET",
      url: "eliminar.php",
      data: "codigo=" + codigo + "&dni=" + dni + "&tipo=" + tipo,
      success: function (data) {

        if (data == 1) {

          swal("Eliminado!", "Datos eliminados con éxito!", "success");
          $("#usuarios").load("consultas.php?CargaUsuarios=si");

        } else if (data == 2) {

          swal("Oops", "Este Usuario no puede ser Eliminado, tiene registros relacionados!", "error");

        } else {

          swal("Oops", "Usted no tiene Acceso para Eliminar Usuarios, no tienes Privilegios para este Proceso!", "error");

        }

      }
    })
  });
}

// FUNCION PARA BUSCAR LOGS DE ACCESO
$(document).ready(function () {
  //function BuscarPacientes() {
  var consulta;
  //hacemos focus al campo de búsqueda
  $("#blogs").focus();
  //comprobamos si se pulsa una tecla
  $("#blogs").keyup(function (e) {
    //obtenemos el texto introducido en el campo de búsqueda
    consulta = $("#blogs").val();

    if (consulta.trim() === '') {

      $("#logs").html("<center><div class='alert alert-danger'><span class='fa fa-info-circle'></span> POR FAVOR REALICE LA BUSQUEDA CORRECTAMENTE</div></center>");
      return false;

    } else {

      //hace la búsqueda
      $.ajax({
        type: "POST",
        url: "search.php?CargaLogs=si",
        data: "b=" + consulta,
        dataType: "html",
        beforeSend: function () {
          //imagen de carga
          $("#logs").html('<center><i class="fa fa-spin fa-spinner"></i> Por favor espere, cargando registros ......</center>');
        },
        error: function () {
          swal("Oops", "Ha ocurrido un error en la petición Ajax, verifique por favor!", "error");
        },
        success: function (data) {
          $("#logs").empty();
          $("#logs").append(data);
        }
      });
    }
  });
});
















/////////////////////////////////// FUNCIONES DE TIPOS DE DOCUMENTOS  //////////////////////////////////////

// FUNCION PARA ACTUALIZAR TIPOS DE DOCUMENTOS
function UpdateDocumento(coddocumento, documento, descripcion, proceso) {
  // aqui asigno cada valor a los campos correspondientes
  $("#savedocumentos #coddocumento").val(coddocumento);
  $("#savedocumentos #documento").val(documento);
  $("#savedocumentos #descripcion").val(descripcion);
  $("#savedocumentos #proceso").val(proceso);
}

/////FUNCION PARA ELIMINAR TIPOS DE DOCUMENTOS
function EliminarDocumento(coddocumento, tipo) {
  swal({
    title: "¿Estás seguro?",
    text: "¿Estás seguro de Eliminar esta Tipo de Documento?",
    type: "warning",
    showCancelButton: true,
    cancelButtonText: "Cancelar",
    cancelButtonColor: '#d33',
    closeOnConfirm: false,
    confirmButtonText: "Eliminar",
    confirmButtonColor: "#808080"
  }, function () {
    $.ajax({
      type: "GET",
      url: "eliminar.php",
      data: "coddocumento=" + coddocumento + "&tipo=" + tipo,
      success: function (data) {

        if (data == 1) {

          swal("Eliminado!", "Datos eliminados con éxito!", "success");
          $('#documentos').load("consultas?CargaDocumentos=si");

        } else if (data == 2) {

          swal("Oops", "Este Documento no puede ser Eliminado, tiene registros relacionados!", "error");

        } else {

          swal("Oops", "Usted no tiene Acceso para Eliminar Documentos, no tienes Privilegios para este Proceso!", "error");

        }
      }
    })
  });
}









/////////////////////////////////// FUNCIONES DE PAISES //////////////////////////////////////

// FUNCION PARA ACTUALIZAR PAISES
function UpdatePais(id_pais, npais, activo, proceso) {
  // aqui asigno cada valor a los campos correspondientes
  $("#savepaises #id_pais").val(id_pais);
  $("#savepaises #npais").val(npais);
  $("#savepaises #activo").val(activo);
  $("#savepaises #proceso").val(proceso);
}

/////FUNCION PARA ELIMINAR PAISES
function EliminarPais(id_pais, tipo) {
  swal({
    title: "¿Estás seguro?",
    text: "¿Estás seguro de Eliminar este Pais?",
    type: "warning",
    showCancelButton: true,
    cancelButtonText: "Cancelar",
    cancelButtonColor: '#d33',
    closeOnConfirm: false,
    confirmButtonText: "Eliminar",
    confirmButtonColor: "#808080"
  }, function () {
    $.ajax({
      type: "GET",
      url: "eliminar.php",
      data: "id_pais=" + id_pais + "&tipo=" + tipo,
      success: function (data) {

        if (data == 1) {

          swal("Eliminado!", "Datos eliminados con éxito!", "success");
          $('#paises').load("consultas?CargaPaises=si");

        } else if (data == 2) {

          swal("Oops", "Este Pais no puede ser Eliminado, tiene Provincias relacionados!", "error");

        } else {

          swal("Oops", "Usted no tiene Acceso para Eliminar Paises, no tienes Privilegios para este Proceso!", "error");

        }
      }
    })
  });
}











/////////////////////////////////// FUNCIONES DE PROVINCIAS //////////////////////////////////////

// FUNCION PARA ACTUALIZAR PROVINCIAS
function UpdateProvincia(id_provincia, nprovincia, id_pais, activo, proceso) {
  // aqui asigno cada valor a los campos correspondientes
  $("#saveprovincias #id_provincia").val(id_provincia);
  $("#saveprovincias #nprovincia").val(nprovincia);
  $("#saveprovincias #id_pais").val(id_pais);
  $("#saveprovincias #activo").val(activo);
  $("#saveprovincias #proceso").val(proceso);
}

/////FUNCION PARA ELIMINAR PROVINCIAS
function EliminarProvincia(id_provincia, tipo) {
  swal({
    title: "¿Estás seguro?",
    text: "¿Estás seguro de Eliminar esta Provincia de Pais?",
    type: "warning",
    showCancelButton: true,
    cancelButtonText: "Cancelar",
    cancelButtonColor: '#d33',
    closeOnConfirm: false,
    confirmButtonText: "Eliminar",
    confirmButtonColor: "#808080"
  }, function () {
    $.ajax({
      type: "GET",
      url: "eliminar.php",
      data: "id_provincia=" + id_provincia + "&tipo=" + tipo,
      success: function (data) {

        if (data == 1) {

          swal("Eliminado!", "Datos eliminados con éxito!", "success");
          $('#provincias').load("consultas?CargaProvincias=si");

        } else if (data == 2) {

          swal("Oops", "Esta Provincia no puede ser Eliminada, tiene registros relacionados!", "error");

        } else {

          swal("Oops", "Usted no tiene Acceso para Eliminar Provincias, no tienes Privilegios para este Proceso!", "error");

        }
      }
    })
  });
}

////FUNCION PARA MOSTRAR PROVINCIAS POR PAISES
function CargaProvincias(id_pais) {

  $('#id_provincia').html('<center><img src="assets/images/loading.gif" width="30" height="30"/></center>');

  var dataString = 'BuscaProvincias=si&id_pais=' + id_pais;

  $.ajax({
    type: "GET",
    url: "funciones.php",
    data: dataString,
    success: function (response) {
      $('#id_provincia').empty();
      $('#id_provincia').append('' + response + '').fadeIn("slow");
    }
  });
}


////FUNCION PARA MOSTRAR PROVINCIAS POR PAIS #2
function CargaProvincias2(id_pais2) {

  $('#id_provincia2').html('<center><img src="assets/images/loading.gif" width="30" height="30"/></center>');

  var dataString = 'BuscaProvincias2=si&id_pais2=' + id_pais2;

  $.ajax({
    type: "GET",
    url: "funciones.php",
    data: dataString,
    success: function (response) {
      $('#id_provincia2').empty();
      $('#id_provincia2').append('' + response + '').fadeIn("slow");
    }
  });
}

////FUNCION PARA MOSTRAR PROVINCIA POR PAIS
function SelectProvincia(id_pais, id_provincia) {

  $("#id_provincia").load("funciones.php?SeleccionaProvincia=si&id_pais=" + id_pais + "&id_provincia=" + id_provincia);

}











/////////////////////////////////// FUNCIONES DE DEPARTAMENTOS //////////////////////////////////////

// FUNCION PARA ACTUALIZAR DEPARTAMENTOS
function UpdateDepartamento(id_departamento, ndepartamento, id_provincia, activo, proceso) {
  // aqui asigno cada valor a los campos correspondientes
  $("#savedepartamentos #id_departamento").val(id_departamento);
  $("#savedepartamentos #ndepartamento").val(ndepartamento);
  $("#savedepartamentos #id_provincia").val(id_provincia);
  $("#savedepartamentos #activo").val(activo);
  $("#savedepartamentos #proceso").val(proceso);
}

/////FUNCION PARA ELIMINAR DEPARTAMENTOS
function EliminarDepartamento(id_departamento, tipo) {
  swal({
    title: "¿Estás seguro?",
    text: "¿Estás seguro de Eliminar este Departamento de Provincia?",
    type: "warning",
    showCancelButton: true,
    cancelButtonText: "Cancelar",
    cancelButtonColor: '#d33',
    closeOnConfirm: false,
    confirmButtonText: "Eliminar",
    confirmButtonColor: "#808080"
  }, function () {
    $.ajax({
      type: "GET",
      url: "eliminar.php",
      data: "id_departamento=" + id_departamento + "&tipo=" + tipo,
      success: function (data) {

        if (data == 1) {

          swal("Eliminado!", "Datos eliminados con éxito!", "success");
          $('#departamentos').load("consultas?CargaDepartamentos=si");

        } else if (data == 2) {

          swal("Oops", "Este Departamento no puede ser Eliminado, tiene registros relacionados!", "error");

        } else {

          swal("Oops", "Usted no tiene Acceso para Eliminar Departamentos, no tienes Privilegios para este Proceso!", "error");

        }
      }
    })
  });
}

////FUNCION PARA MOSTRAR DEPARTAMENTOS POR PROVINCIAS
function CargaDepartamentos(id_provincia) {

  $('#id_departamento').html('<center><img src="assets/images/loading.gif" width="30" height="30"/></center>');

  var dataString = 'BuscaDepartamentos=si&id_provincia=' + id_provincia;

  $.ajax({
    type: "GET",
    url: "funciones.php",
    data: dataString,
    success: function (response) {
      $('#id_departamento').empty();
      $('#id_departamento').append('' + response + '').fadeIn("slow");
    }
  });
}


////FUNCION PARA MOSTRAR DEPARTAMENTOS POR PROVINCIAS #2
function CargaDepartamentos2(id_provincia2) {

  $('#id_departamento2').html('<center><img src="assets/images/loading.gif" width="30" height="30"/></center>');

  var dataString = 'BuscaDepartamentos2=si&id_provincia2=' + id_provincia2;

  $.ajax({
    type: "GET",
    url: "funciones.php",
    data: dataString,
    success: function (response) {
      $('#id_departamento2').empty();
      $('#id_departamento2').append('' + response + '').fadeIn("slow");
    }
  });
}

////FUNCION PARA MOSTRAR DEPARTAMENTOS POR PROVINCIA
function SelectDepartamento(id_provincia, id_departamento) {

  $("#id_departamento").load("funciones.php?SeleccionaDepartamento=si&id_provincia=" + id_provincia + "&id_departamento=" + id_departamento);

}











/////////////////////////////////// FUNCIONES DE LOCALIDADES //////////////////////////////////////

// FUNCION PARA ACTUALIZAR LOCALIDADES
function UpdateLocalidad(id_localidad, nlocalidad, id_departamento, codigo_postal, activo, proceso) {
  // aqui asigno cada valor a los campos correspondientes
  $("#savelocalidades #id_localidad").val(id_localidad);
  $("#savelocalidades #nlocalidad").val(nlocalidad);
  $("#savelocalidades #id_departamento").val(id_departamento);
  $("#savelocalidades #codigo_postal").val(codigo_postal);
  $("#savelocalidades #activo").val(activo);
  $("#savelocalidades #proceso").val(proceso);
}

/////FUNCION PARA ELIMINAR LOCALIDADES
function EliminarLocalidad(id_localidad, tipo) {
  swal({
    title: "¿Estás seguro?",
    text: "¿Estás seguro de Eliminar esta Localidad del Departamento?",
    type: "warning",
    showCancelButton: true,
    cancelButtonText: "Cancelar",
    cancelButtonColor: '#d33',
    closeOnConfirm: false,
    confirmButtonText: "Eliminar",
    confirmButtonColor: "#808080"
  }, function () {
    $.ajax({
      type: "GET",
      url: "eliminar.php",
      data: "id_localidad=" + id_localidad + "&tipo=" + tipo,
      success: function (data) {

        if (data == 1) {

          swal("Eliminado!", "Datos eliminados con éxito!", "success");
          $('#localidades').load("consultas?CargaLocalidades=si");

        } else if (data == 2) {

          swal("Oops", "Esta Localidad no puede ser Eliminada, tiene registros relacionados!", "error");

        } else {

          swal("Oops", "Usted no tiene Acceso para Eliminar Localidades, no tienes Privilegios para este Proceso!", "error");

        }
      }
    })
  });
}

////FUNCION PARA MOSTRAR LOCALIDADES POR DEPARTAMENTOS
function CargaLocalidades(id_departamento) {

  $('#id_localidad').html('<center><img src="assets/images/loading.gif" width="30" height="30"/></center>');

  var dataString = 'BuscaLocalidades=si&id_departamento=' + id_departamento;

  $.ajax({
    type: "GET",
    url: "funciones.php",
    data: dataString,
    success: function (response) {
      $('#id_localidad').empty();
      $('#id_localidad').append('' + response + '').fadeIn("slow");
    }
  });
}


////FUNCION PARA MOSTRAR LOCALIDADES POR DEPARTAMENTOS #2
function CargaLocalidades2(id_departamento2) {

  $('#id_localidad2').html('<center><img src="assets/images/loading.gif" width="30" height="30"/></center>');

  var dataString = 'BuscaLocalidades2=si&id_departamento2=' + id_departamento2;

  $.ajax({
    type: "GET",
    url: "funciones.php",
    data: dataString,
    success: function (response) {
      $('#id_localidad2').empty();
      $('#id_localidad2').append('' + response + '').fadeIn("slow");
    }
  });
}

////FUNCION PARA MOSTRAR LOCALIDADES`POR DEPARTAMENTOS
function SelectLocalidad(id_departamento, id_localidad2) {

  $("#id_departamento").load("funciones.php?SeleccionaLocalidad=si&id_departamento=" + id_departamento + "&id_localidad=" + id_localidad);

}













/////////////////////////////////// FUNCIONES DE BARRIOS //////////////////////////////////////

// FUNCION PARA ACTUALIZAR BARRIOS
function UpdateBarrio(id_barrio, nbarrio, id_localidad, activo, proceso) {
  // aqui asigno cada valor a los campos correspondientes
  $("#savebarrios #id_barrio").val(id_barrio);
  $("#savebarrios #nbarrio").val(nbarrio);
  $("#savebarrios #id_localidad").val(id_localidad);
  $("#savebarrios #activo").val(activo);
  $("#savebarrios #proceso").val(proceso);
}

/////FUNCION PARA ELIMINAR BARRIOS
function EliminarBarrio(id_barrio, tipo) {
  swal({
    title: "¿Estás seguro?",
    text: "¿Estás seguro de Eliminar este Barrio de Localidad?",
    type: "warning",
    showCancelButton: true,
    cancelButtonText: "Cancelar",
    cancelButtonColor: '#d33',
    closeOnConfirm: false,
    confirmButtonText: "Eliminar",
    confirmButtonColor: "#808080"
  }, function () {
    $.ajax({
      type: "GET",
      url: "eliminar.php",
      data: "id_barrio=" + id_barrio + "&tipo=" + tipo,
      success: function (data) {

        if (data == 1) {

          swal("Eliminado!", "Datos eliminados con éxito!", "success");
          $('#barrios').load("consultas?CargaBarrios=si");

        } else if (data == 2) {

          swal("Oops", "Este Barrio no puede ser Eliminado, tiene registros relacionados!", "error");

        } else {

          swal("Oops", "Usted no tiene Acceso para Eliminar Barrios, no tienes Privilegios para este Proceso!", "error");

        }
      }
    })
  });
}

////FUNCION PARA MOSTRAR BARRIOS POR LOCALIDADES
function CargaBarrios(id_localidad) {

  $('#id_barrio').html('<center><img src="assets/images/loading.gif" width="30" height="30"/></center>');

  var dataString = 'BuscaBarrios=si&id_localidad=' + id_localidad;

  $.ajax({
    type: "GET",
    url: "funciones.php",
    data: dataString,
    success: function (response) {
      $('#id_barrio').empty();
      $('#id_barrio').append('' + response + '').fadeIn("slow");
    }
  });
}


////FUNCION PARA MOSTRAR BARRIOS POR LOCALIDADES #2
function CargaBarrios2(id_localidad2) {

  $('#id_barrio2').html('<center><img src="assets/images/loading.gif" width="30" height="30"/></center>');

  var dataString = 'BuscaBarrios2=si&id_localidad2=' + id_localidad2;

  $.ajax({
    type: "GET",
    url: "funciones.php",
    data: dataString,
    success: function (response) {
      $('#id_barrio2').empty();
      $('#id_barrio2').append('' + response + '').fadeIn("slow");
    }
  });
}

////FUNCION PARA MOSTRAR BARRIOS POR LOCALIDADES
function SelectBarrio(id_localidad, id_barrio) {

  $("#id_barrio").load("funciones.php?SeleccionaBarrio=si&id_localidad=" + id_localidad + "&id_barrio=" + id_barrio);

}













/////////////////////////////////// FUNCIONES DE CALLES //////////////////////////////////////

// FUNCION PARA ACTUALIZAR CALLES
function UpdateCalle(id_calle, ncalle, id_localidad, activo, proceso) {
  // aqui asigno cada valor a los campos correspondientes
  $("#savecalles #id_calle").val(id_calle);
  $("#savecalles #ncalle").val(ncalle);
  $("#savecalles #id_localidad").val(id_localidad);
  $("#savecalles #activo").val(activo);
  $("#savecalles #proceso").val(proceso);
}

/////FUNCION PARA ELIMINAR CALLES
function EliminarCalle(id_calle, tipo) {
  swal({
    title: "¿Estás seguro?",
    text: "¿Estás seguro de Eliminar esta Calle del Barrio?",
    type: "warning",
    showCancelButton: true,
    cancelButtonText: "Cancelar",
    cancelButtonColor: '#d33',
    closeOnConfirm: false,
    confirmButtonText: "Eliminar",
    confirmButtonColor: "#808080"
  }, function () {
    $.ajax({
      type: "GET",
      url: "eliminar.php",
      data: "id_calle=" + id_calle + "&tipo=" + tipo,
      success: function (data) {

        if (data == 1) {

          swal("Eliminado!", "Datos eliminados con éxito!", "success");
          $('#calles').load("consultas?CargaCalles=si");

        } else if (data == 2) {

          swal("Oops", "Esta Calle no puede ser Eliminada, tiene registros relacionados!", "error");

        } else {

          swal("Oops", "Usted no tiene Acceso para Eliminar Calles, no tienes Privilegios para este Proceso!", "error");

        }
      }
    })
  });
}

////FUNCION PARA MOSTRAR CALLES POR LOCALIDADES
function CargaCalles(id_localidad) {

  $('#id_calle').html('<center><img src="assets/images/loading.gif" width="30" height="30"/></center>');

  var dataString = 'BuscaCalles=si&id_localidad=' + id_localidad;

  $.ajax({
    type: "GET",
    url: "funciones.php",
    data: dataString,
    success: function (response) {
      $('#id_calle').empty();
      $('#id_calle').append('' + response + '').fadeIn("slow");
    }
  });
}


////FUNCION PARA MOSTRAR CALLES POR LOCALIDADES #2
function CargaCalles2(id_localidad2) {

  $('#id_calle2').html('<center><img src="assets/images/loading.gif" width="30" height="30"/></center>');

  var dataString = 'BuscaCalles2=si&id_localidad2=' + id_localidad2;

  $.ajax({
    type: "GET",
    url: "funciones.php",
    data: dataString,
    success: function (response) {
      $('#id_calle2').empty();
      $('#id_calle2').append('' + response + '').fadeIn("slow");
    }
  });
}

////FUNCION PARA MOSTRAR CALLES POR LOCALIDAD
function SelectCalle(id_localidad, id_calle) {

  $("#id_calle").load("funciones.php?SeleccionaBarrio=si&id_localidad=" + id_localidad + "&id_calle=" + id_calle);

}











/////////////////////////////////// FUNCIONES DE PERIODO FISCAL //////////////////////////////////////

// FUNCION PARA ACTUALIZAR PERIODO FISCAL
function UpdatePeriodo(id_periodo_fiscal, anio, fecha_de_inicio_de_reinscripcion, vencimiento_de_reinscripcion, primer_vencimiento_de_reinscripcion, aval_legal, proceso) {
  // aqui asigno cada valor a los campos correspondientes
  $("#saveperiodo #id_periodo_fiscal").val(id_periodo_fiscal);
  $("#saveperiodo #anio").val(anio);
  $("#saveperiodo #vencimiento_de_reinscripcion").val(vencimiento_de_reinscripcion);
  $("#saveperiodo #fecha_de_inicio_de_reinscripcion").val(fecha_de_inicio_de_reinscripcion);
  $("#saveperiodo #primer_vencimiento_de_reinscripcion").val(primer_vencimiento_de_reinscripcion);
  $("#saveperiodo #aval_legal").val(aval_legal);
  $("#saveperiodo #proceso").val(proceso);
}

/////FUNCION PARA ELIMINAR PERIODO FISCAL
function EliminarPeriodo(id_periodo_fiscal, tipo) {
  swal({
    title: "¿Estás seguro?",
    text: "¿Estás seguro de Eliminar este Periodo Fiscal?",
    type: "warning",
    showCancelButton: true,
    cancelButtonText: "Cancelar",
    cancelButtonColor: '#d33',
    closeOnConfirm: false,
    confirmButtonText: "Eliminar",
    confirmButtonColor: "#808080"
  }, function () {
    $.ajax({
      type: "GET",
      url: "eliminar.php",
      data: "id_periodo_fiscal=" + id_periodo_fiscal + "&tipo=" + tipo,
      success: function (data) {

        if (data == 1) {

          swal("Eliminado!", "Datos eliminados con éxito!", "success");
          $('#periodos').load("consultas?CargaPeriodos=si");

        } else if (data == 2) {

          swal("Oops", "Este Periodo Fiscal no puede ser Eliminado, tiene Registros relacionados!", "error");

        } else {

          swal("Oops", "Usted no tiene Acceso para Eliminar Periodo Fiscal, no tienes estos Privilegios!", "error");

        }
      }
    })
  });
}









/////////////////////////////////// FUNCIONES DE SISTEMA DE CALIDAD //////////////////////////////////////

// FUNCION PARA ACTUALIZAR SISTEMA DE CALIDAD
function UpdateSistemaCalidad(id_sistema_de_calidad, descripcion, activo, proceso) {
  // aqui asigno cada valor a los campos correspondientes
  $("#savesistemas #id_sistema_de_calidad").val(id_sistema_de_calidad);
  $("#savesistemas #descripcion").val(descripcion);
  $("#savesistemas #activo").val(activo);
  $("#savesistemas #proceso").val(proceso);
}

/////FUNCION PARA ELIMINAR SISTEMA DE CALIDAD
function EliminarSistemaCalidad(id_sistema_de_calidad, tipo) {
  swal({
    title: "¿Estás seguro?",
    text: "¿Estás seguro de Eliminar este Sistema de Calidad?",
    type: "warning",
    showCancelButton: true,
    cancelButtonText: "Cancelar",
    cancelButtonColor: '#d33',
    closeOnConfirm: false,
    confirmButtonText: "Eliminar",
    confirmButtonColor: "#808080"
  }, function () {
    $.ajax({
      type: "GET",
      url: "eliminar.php",
      data: "id_sistema_de_calidad=" + id_sistema_de_calidad + "&tipo=" + tipo,
      success: function (data) {

        if (data == 1) {

          swal("Eliminado!", "Datos eliminados con éxito!", "success");
          $('#sistemas').load("consultas?CargaSistemas=si");

        } else if (data == 2) {

          swal("Oops", "Este Sistema de Calidad no puede ser Eliminado, tiene Registros relacionados!", "error");

        } else {

          swal("Oops", "Usted no tiene Acceso para Eliminar Sistema de Calidad, no tienes estos Privilegios!", "error");

        }
      }
    })
  });
}













/////////////////////////////////// FUNCIONES DE PROMOCIONES INDUSTRIALES //////////////////////////////////////

// FUNCION PARA ACTUALIZAR PROMOCIONES INDUSTRIALES
function UpdatePromocionIndustrial(id_promocion_industrial, descripcion, activo, proceso) {
  // aqui asigno cada valor a los campos correspondientes
  $("#savepromociones #id_promocion_industrial").val(id_promocion_industrial);
  $("#savepromociones #descripcion").val(descripcion);
  $("#savepromociones #activo").val(activo);
  $("#savepromociones #proceso").val(proceso);
}

/////FUNCION PARA ELIMINAR PROMOCIONES INDUSTRIALES
function EliminarPromocionIndustrial(id_promocion_industrial, tipo) {
  swal({
    title: "¿Estás seguro?",
    text: "¿Estás seguro de Eliminar esta Promocion Industrial?",
    type: "warning",
    showCancelButton: true,
    cancelButtonText: "Cancelar",
    cancelButtonColor: '#d33',
    closeOnConfirm: false,
    confirmButtonText: "Eliminar",
    confirmButtonColor: "#808080"
  }, function () {
    $.ajax({
      type: "GET",
      url: "eliminar.php",
      data: "id_promocion_industrial=" + id_promocion_industrial + "&tipo=" + tipo,
      success: function (data) {

        if (data == 1) {

          swal("Eliminado!", "Datos eliminados con éxito!", "success");
          $('#promociones').load("consultas?CargaPromociones=si");

        } else if (data == 2) {

          swal("Oops", "Esta Promocion Industrial no puede ser Eliminada, tiene Registros relacionados!", "error");

        } else {

          swal("Oops", "Usted no tiene Acceso para Eliminar Promocion Industrial, no tienes estos Privilegios!", "error");

        }
      }
    })
  });
}














/////////////////////////////////// FUNCIONES DE SOLICITUDES //////////////////////////////////////

//FUNCIONES PARA MOSTRAR TIPO DE AFECTACION
function TipoAfectacion(id_tipo_de_afectacion) {

  var dataString = 'MuestraCargaDocumento=si&id_tipo_de_afectacion=' + id_tipo_de_afectacion;
  $.ajax({
    type: "GET",
    url: "funciones.php",
    data: dataString,
    success: function (response) {
      $('#documento_apoderado').empty();
      $('#documento_apoderado').append('' + response + '').fadeIn("slow");
    }
  });
}

////FUNCION RECARGAR SOLICITUDES
function Refrescar() {

  $('#solicitudes').html("");
  $('#solicitudes').append('<center><i class="fa fa-spin fa-spinner"></i> Por favor espere, cargando registros ......</center>').fadeIn("slow");
  setTimeout(function () {
    $('#solicitudes').load("consultas?CargaSolicitudes=si");
  }, 200);
}


// FUNCION PARA MOSTRAR SOLICITUD EN VENTANA MODAL
function VerSolicitud(id_rel_persona_contribuyente) {

  $('#muestrasolicitudmodal').html('<center><i class="fa fa-spin fa-spinner"></i> Cargando información, por favor espere....</center>');

  var dataString = 'BuscaDetalleContribuyenteModal=si&id_rel_persona_contribuyente=' + id_rel_persona_contribuyente;

  $.ajax({
    type: "GET",
    url: "funciones.php",
    data: dataString,
    success: function (response) {
      $('#muestrasolicitudmodal').empty();
      $('#muestrasolicitudmodal').append('' + response + '').fadeIn("slow");

    }
  });
}


// FUNCION PARA VERIFICAR SOLICITUD
function VerificarSolicitud(id_rel_persona_contribuyente, persona, contribuyente, cuit, razon_social, documento, nombre, tel_celular, email_fiscal) {
  // aqui asigno cada valor a los campos correspondientes
  $("#verificasolicitud #id_rel_persona_contribuyente").val(id_rel_persona_contribuyente);
  $("#verificasolicitud #persona").val(persona);
  $("#verificasolicitud #contribuyente").val(contribuyente);
  $("#verificasolicitud #empresa").val(razon_social);
  $("#verificasolicitud #email").val(email_fiscal);
  $("#verificasolicitud #cuit").val(cuit);
  $("#verificasolicitud #razon_social").val(razon_social);
  $("#verificasolicitud #documento").val(documento);
  $("#verificasolicitud #nombre").val(nombre);
  $("#verificasolicitud #tel_celular").val(tel_celular);
  $("#verificasolicitud #email_fiscal").val(email_fiscal);
}


//FUNCIONES PARA MOSTRAR OBSERVACIONES DE SOLICITUD
function MuestraObservacion() {

  var status = $('input:radio[name=status]:checked').val();
  var valor = $("#observaciones_status").val();

  if (status == 1 || status == true) {

    //deshabilitamos
    $("#observaciones_status").val('SU SOLICITUD FUE APROBADA EXITOSAMENTE, DEBE INGRESAR AL SISTEMA CON SU Nº DE CUIT Y PASSWORD INGRESADO EN EL REGISTRO INICIAL');

  } else {

    // habilitamos
    $("#observaciones_status").val('SU SOLICITUD HA SIDO RECHAZADA, POR FAVOR COMUNIQUESE CON INDUSTRIA O DIRIJASE A NUESTRAS INSTALACIONES PARA MAYOR INFORMACIÓN');

  }
}

/////FUNCION PARA ENVIO DE EMAIL PENDEINTES
function EnvioEmail(id_rel_persona_contribuyente, razon_social, email_fiscal, observaciones_status, status_solicitud, tipo) {
  swal({
    title: "¿Estás seguro?",
    text: "¿Estás seguro de Realizar el Envio de Email?",
    type: "warning",
    showCancelButton: true,
    cancelButtonText: "Cancelar",
    cancelButtonColor: '#d33',
    closeOnConfirm: false,
    confirmButtonText: "Continuar",
    confirmButtonColor: "#808080"
  }, function () {
    $.ajax({
      type: "GET",
      url: "eliminar.php",
      data: "id_rel_persona_contribuyente=" + id_rel_persona_contribuyente + "&razon_social=" + razon_social + "&email_fiscal=" + email_fiscal + "&observaciones_status=" + observaciones_status + "&status_solicitud=" + status_solicitud + "&tipo=" + tipo,
      success: function (data) {

        if (data == 1) {

          swal("Envio Exitoso!", "El Email ha sido enviado con éxito!", "success");
          $("#email_pendientes").load("consultas.php?CargaEmailNoEnviados=si");

        } else {

          swal("Oops", "El Email no pudo ser Enviado, intente nuevamente por favor!", "error");

        }

      }
    })
  });
}















/////////////////////////////////// FUNCIONES DE CONTRIBUYENTES //////////////////////////////////////

// FUNCION PARA BUSCAR CONTRIBUYENTES
$(document).ready(function () {
  //function BuscarPacientes() {
  var consulta;
  //hacemos focus al campo de búsqueda
  $("#bcontribuyentes").focus();
  //comprobamos si se pulsa una tecla
  $("#bcontribuyentes").keyup(function (e) {
    //obtenemos el texto introducido en el campo de búsqueda
    consulta = $("#bcontribuyentes").val();

    if (consulta.trim() === '') {

      $("#contribuyentes").html("<center><div class='alert alert-danger'><span class='fa fa-info-circle'></span> POR FAVOR REALICE LA BUSQUEDA CORRECTAMENTE</div></center>");
      return false;

    } else {

      //hace la búsqueda
      $.ajax({
        type: "POST",
        url: "search.php?CargaContribuyentes=si",
        data: "b=" + consulta,
        dataType: "html",
        beforeSend: function () {
          //imagen de carga
          $("#contribuyentes").html('<center><i class="fa fa-spin fa-spinner"></i> Por favor espere, cargando registros ......</center>');
        },
        error: function () {
          swal("Oops", "Ha ocurrido un error en la petición Ajax, verifique por favor!", "error");
        },
        success: function (data) {
          $("#contribuyentes").empty();
          $("#contribuyentes").append(data);
        }
      });
    }
  });
});


// FUNCION PARA MOSTRAR CONTRIBUYENTES EN VENTANA MODAL
function VerContribuyente(id_rel_persona_contribuyente) {

  $('#muestracontribuyentemodal').html('<center><i class="fa fa-spin fa-spinner"></i> Cargando información, por favor espere....</center>');

  var dataString = 'BuscaDetalleContribuyenteModal=si&id_rel_persona_contribuyente=' + id_rel_persona_contribuyente;

  $.ajax({
    type: "GET",
    url: "funciones.php",
    data: dataString,
    success: function (response) {
      $('#muestracontribuyentemodal').empty();
      $('#muestracontribuyentemodal').append('' + response + '').fadeIn("slow");

    }
  });
}













/////////////////////////////////// FUNCIONES DE DATOS GENERALES //////////////////////////////////////

//CARGA FORMULARIO PROCEDIMIENTO
function CargaFormulario(seccion, industria) {

  $('#secciones').html('<center><i class="fa fa-spin fa-spinner"></i> Cargando información, por favor espere....</center>');

  var dataString = 'BuscaFormularioProcedimiento=si&seccion=' + seccion + "&in=" + industria;

  $.ajax({
    type: "GET",
    url: "formularios.php",
    data: dataString,
    success: function (response) {
      $('#secciones').empty();
      $('#secciones').append('' + response + '').fadeIn("slow");

    }
  });
}

// FUNCION PARA ALERTA DE TRAMITE EN PROCESO
function AlertaTramite() {

  swal("¿Trámite en Proceso?", "Aún tiene un Trámite en proceso, por favor termine la carga de los formularios para procesar uno Nuevo!", "warning");

}


// FUNCION PARA ACTUALIZAR TRAMITE
function UpdateTramite(id_industria, id_contribuyente) {

  swal({
    title: "¿Estás seguro?",
    text: "¿Estás seguro de Continuar con este Trámite?",
    type: "warning",
    showCancelButton: true,
    cancelButtonText: "Cancelar",
    cancelButtonColor: '#d33',
    closeOnConfirm: false,
    confirmButtonText: "Continuar",
    confirmButtonColor: "#808080"
  }, function (isConfirm) {
    if (isConfirm) {
      console.log(id_industria);
      
     location.href = "/edit/tramite/" + id_industria;
      // handle confirm
    } else {
      // handle all other cases
    }
  })
}














/////////////////////////////////// FUNCIONES DE ACTIVIDADES EN INDUSTRIA //////////////////////////////////////

// FUNCION PARA MOSTRAR ACTIVIDAD EN VENTANA MODAL
function VerActividad(id_rel_industria_actividad) {

  $('#muestradetalleactividadmodal').html('<center><i class="fa fa-spin fa-spinner"></i> Cargando..</center>');
  console.log("id_rel_industria_actividad", id_rel_industria_actividad)

  $.ajax({
    type: "POST",
    url: "/getDetalleActividad",
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
      id: id_rel_industria_actividad
    },
    success: function (response) {
      $('#muestradetalleactividadmodal').empty();
      $('#muestradetalleactividadmodal').append(
        '<table class="table-responsive" border="0" align="center">' +
        '<tr>' +
        '<td><strong>Nombre de Industria:</strong>' + response.nombre_industria + '</td>' +
        '</tr>' +
        ' <tr>' +
        ' <td><strong>Código de Actividad:</strong>' + response.nomenclatura_ib + '</td>' +
        ' </tr>' +
        ' <tr>' +
        ' <td><strong>Descripción de Actividad:</strong>' + response.actividad + '</td>' +
        ' </tr>' +
        ' <tr>' +
        ' <td><strong>Rubro:</strong>' + response.rubro + '</td>' +
        ' </tr>' +
        ' <tr>' +
        ' <td><strong>Es Actividad Principal: </strong>' + response.es_actividad_principal + '</td>' +
        '</tr>' +
        ' <tr>' +
        ' <td><strong>Fecha Inicio Actividad: </strong>' + response.fecha_inicio + '</td>' +
        ' </tr>' +
        '<tr>' +
        ' <td><strong>Fecha Fin Actividad: </strong> ' + response.fecha_fin + '</td>' +
        '</tr>' +
        ' <tr>' +
        ' <td><strong>Observación: </strong>' + response.observacion + '</td>' +
        '</tr>' +
        '</table >').fadeIn("slow");

    }
  });
}


// FUNCION PARA AGREGA ID ACTIVIDAD
function AddIdActividadModal(id_industria, nombre_de_fantasia, actividad_contribuyente) {
  // aqui asigno cada valor a los campos correspondientes
  $("#saveactividad #id_industria").val(id_industria);
  $("#saveactividad #nombre_de_fantasia").text(nombre_de_fantasia);
  $("#saveactividad #fecha_contribuyente").val(actividad_contribuyente);
}

// FUNCION PARA TRAER DATOS PARA ACTUALIZAR ACTIVIDAD
function getActividad(id_rel_industria_actividad) {

  $("#btn-actividad").hide();
  $("#btn-actividad-update").show();

  $("#saveactividad").prop('id', 'updateActividad');
  $("#updateActividad").prop('name', 'updateActividad');


  $.ajax({
    type: "POST",
    url: "/getDetalleActividad",
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
      id: id_rel_industria_actividad
    },
    success: function (response) {
      // aqui asigno cada valor a los campos correspondientes
      $("#id_rel_industria_actividad").val(response.id_rel_industria_actividad);
      //$("#id_industria").val(response.id_industria);
      $("#nombre_de_fantasia").text(response.nombre_industria);
      $("#id_actividad").val(response.id_actividad);
      $("#search_codigo").val(response.nomenclatura_ib);
      $("#search_descripcion").val(response.actividad);
      $("#detalle_actividad").val(response.nomenclatura_ib + ' - ' + response.actividad);
      $("#es_actividad_principal").val(response.es_actividad_principal);
      $("#fecha_inicio").val(response.fecha_inicio.replace(/^(\d{4})-(\d{2})-(\d{2})$/g, '$3-$2-$1'));
      $("#observacion").val(response.observacion);
      //$("#fecha_contribuyente").val(response.actividad_contribuyente);
      //$("#updateActividad #actividad").val(response.proceso);
    }
  })



}

$("#button-cancelar").on('click', function () {

  $("#btn-actividad-update").hide();
  $("#btn-actividad").show();


  if ($("#updateActividad").length > 0) {
    // hacer algo aquí si el elemento existe
    $("#updateActividad").prop('id', 'saveactividad');
    $("#saveactividad").prop('name', 'saveactividad');
  }




  //document.getElementById('actividad').value = 'saveactividades'
  document.getElementById('id_industria').value = ''
  document.getElementById('id_rel_industria_actividad').value = ''
  document.getElementById('id_actividad').value = ''
  document.getElementById('search_codigo').value = ''
  document.getElementById('search_descripcion').value = ''
  document.getElementById('detalle_actividad').value = ''
  document.getElementById('observacion').value = ''
  document.getElementById('fecha_inicio').value = ''
  document.getElementById('es_actividad_principal').value = ''


})
$("#button-cancelar-producto").on('click', function () {

  $("#btn-update-producto").hide();//oculto boton actualizar producto
  $("#btn-asignaproducto").show();//muestro el de asignar

  if ($("#updatesignacionproducto").length > 0) {
    // hacer algo aquí si el elemento existe

    //cambio el id del form y el nombre #se lo deja original
    $("#updatesignacionproducto").prop('id', 'saveasignacionproducto');
    $("#saveasignacionproducto").prop('name', 'saveasignacionproducto');

  }

  //se restablecen todos los valores del form
  document.getElementById('id_rel_actividad_productos').value = ''
  document.getElementById('id_asignacion_producto').value = ''
  document.getElementById('anio_producto').value = ''
  document.getElementById('id_producto').value = ''
  document.getElementById('search_producto').value = ''
  document.getElementById('medida_producto').value = ''
  document.getElementById('cantidad_producida').value = ''
  document.getElementById('porcentaje_sobre_produccion').value = ''
  document.getElementById('ventas_en_provincia').value = ''
  document.getElementById('ventas_en_otras_provincias').value = ''
  document.getElementById('ventas_internacionales').value = ''

})


$("#btn-actividad-update").on('click', function () {


  if ($("#search_codigo").val() == "") {
    var n = noty({
      text: "<span class='fa fa-warning'></span> Debe Completar la busqueda por codigo",
      theme: 'defaultTheme',
      layout: 'center',
      type: 'warning',
      timeout: 5000,
    });
  } else if ($("#search_descripcion").val() == "") {
    var n = noty({
      text: "<span class='fa fa-warning'></span> Debe Completar la busqueda por descripción",
      theme: 'defaultTheme',
      layout: 'center',
      type: 'warning',
      timeout: 5000,
    });
  } else if ($("#observacion").val() == "") {
    var n = noty({
      text: "<span class='fa fa-warning'></span> Debe ingresar una observación",
      theme: 'defaultTheme',
      layout: 'center',
      type: 'warning',
      timeout: 5000,
    });
  } else if ($("#fecha_inicio").val() == "") {
    var n = noty({
      text: "<span class='fa fa-warning'></span> Debe ingresar una fecha de inicio de Actividad",
      theme: 'defaultTheme',
      layout: 'center',
      type: 'warning',
      timeout: 5000,
    });
  } else if ($("#es_actividad_principal").val() == "") {
    var n = noty({
      text: "<span class='fa fa-warning'></span> Debe indicar si la actividad es principal o secundaria",
      theme: 'defaultTheme',
      layout: 'center',
      type: 'warning',
      timeout: 5000,
    });
  } else {

    let data = $("#updateActividad").serialize();


    $.ajax({
      type: 'POST',
      url: '/updateActividad',
      data: {
        _token: $('meta[name="csrf-token"]').attr('content'),
        data: data,
      },
      success: function (data) {
        if (data == 1) {

          $("#save").fadeIn(1000, function () {

            var n = noty({
              text: "<span class='fa fa-warning'></span> POR FAVOR DEBE DE COMPLETAR LOS CAMPOS REQUERIDOS, VERIFIQUE NUEVAMENTE POR FAVOR..!",
              theme: 'defaultTheme',
              layout: 'center',
              type: 'warning',
              timeout: 5000,
            });
            $("#btn-actividad-update").html('<span class="fa fa-save"></span> Guardar y Cerrar');

          });
        }
        else if (data.status == 2) {

          $("#save").fadeIn(1000, function () {

            var n = noty({
              text: "<span class='fa fa-warning'></span>" + data.msg,
              theme: 'defaultTheme',
              layout: 'center',
              type: 'warning',
              timeout: 5000,
            });
            $("#btn-actividad-update").html('<span class="fa fa-save"></span> Guardar y Cerrar');

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
            $("#btn-actividad-update").html('<span class="fa fa-save"></span> Guardar y Cerrar');

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
            $("#btn-actividad-update").html('<span class="fa fa-save"></span> Guardar y Cerrar');

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

            //limpio el form
            document.getElementById('id_rel_industria_actividad').value = ''
            document.getElementById('id_actividad').value = ''
            document.getElementById('search_codigo').value = ''
            document.getElementById('search_descripcion').value = ''
            document.getElementById('detalle_actividad').value = ''
            document.getElementById('observacion').value = ''
            document.getElementById('fecha_inicio').value = ''
            document.getElementById('es_actividad_principal').value = ''

            //reestablesco los valores por defecto del form y botones
            $("#updateActividad").prop('id', 'saveactividad');
            $("#saveactividad").prop('name', 'saveactividad');
            $("#btn-actividad-update").hide();
            $("#btn-actividad").show();



            $("#btn-actividad-update").html('<span class="fa fa-save"></span> Guardar y Cerrar');
            //recargo la tabla de actividades
            cargar_tabla_actividades();
          });
        }
      }
    });
    return false;

  }









})



/////FUNCION PARA ELIMINAR ACTIVIDAD
function EliminarActividad(id_rel_industria_actividad) {
  swal({
    title: "¿Estás seguro?",
    text: "¿Estás seguro de Eliminar esta Actividad del Establecimiento? Esto también eliminará los productos y materia prima asociados a esta actividad",
    type: "warning",
    showCancelButton: true,
    cancelButtonText: "Cancelar",
    cancelButtonColor: '#d33',
    closeOnConfirm: false,
    confirmButtonText: "Eliminar",
    confirmButtonColor: "#808080"
  }, function () {
    $.ajax({
      type: "POST",
      url: "/eliminarActividad",
      data: {
        _token: $('meta[name="csrf-token"]').attr('content'),
        id: id_rel_industria_actividad
      },

      success: function (data) {

        if (data.status == 200) {

          swal("Eliminado!", "Datos eliminados con éxito!", "success");
          cargar_tabla_actividades()

        } else if (data == 2) {

          swal("Oops", "Esta Actividad no puede ser Eliminada, tiene registros relacionados!", "error");

        } else {

          swal("Oops", "Usted no tiene Acceso para Eliminar Actividad de Establecimiento, no tienes Privilegios para este Proceso!", "error");

        }
      }
    })
  });
}
//funcion para dar de baja la actividad
function BajaActividad(id) {
  swal({
    title: "¿Estás seguro?",
    text: "¿Estás seguro de dar de baja esta Actividad del Establecimiento?",
    type: "warning",
    showCancelButton: true,
    cancelButtonText: "Cancelar",
    cancelButtonColor: '#d33',
    closeOnConfirm: false,
    confirmButtonText: "Dar de baja",
    confirmButtonColor: "#808080"
  }, function () {
    $.ajax({
      type: "POST",
      url: "/BajaActividad",
      data: {
        _token: $('meta[name="csrf-token"]').attr('content'),
        id: id
      },

      success: function (data) {

        if (data.status == 200) {

          swal("Genial!", "La actividad se dio de baja con éxito!", "success");
          cargar_tabla_actividades()

        } else if (data == 2) {

          swal("Oops", "Esta Actividad no puede ser Eliminada, tiene registros relacionados!", "error");

        } else {

          swal("Oops", "Usted no tiene Acceso para Eliminar Actividad de Establecimiento, no tienes Privilegios para este Proceso!", "error");

        }
      }
    })
  });
}















/////////////////////////////////// FUNCIONES ASIGNACION DE PRODUCTOS EN ACTIVIDADES //////////////////////////////////////

// FUNCION PARA ASIGNAR PRODUCTOS A ACTIVIDAD
function AddProductoActividad(id_rel_industria_actividad, descripcion, anio) {
  // aqui asigno cada valor a los campos correspondientes
  $("#saveasignacionproducto #id_asignacion_producto").val(id_rel_industria_actividad);
  $("#saveasignacionproducto #descripcion").text(descripcion);


  $('#div_productos').html('<center><i class="fa fa-spin fa-spinner"></i> Cargando información, por favor espere....</center>');

  $.ajax({
    type: "post",
    url: "/getUnidades",
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
    },
    success: function (response) {
      $(response).each(function (i, v) { // indice, valor
        $("#medida_producto").append('<option value="' + v.value + '">' + v.label + '</option>');
      })
    }
  });

  cargar_tabla_productos();
}


// FUNCION PARA ACTUALIZAR PRODUCTO ASIGNADO
function Update_Producto(id_rel_actividad_productos) {

  $.ajax({
    type: "post",
    url: "/getDatosProducto",
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
      id_producto: id_rel_actividad_productos
    },
    success: function (response) {


      // aqui asigno cada valor a los campos correspondientes
      $("#saveasignacionproducto #id_rel_actividad_productos").val(response[0].id_rel_actividad_producto);

      $("#saveasignacionproducto #id_producto").val(response[0].id_producto);
      $("#saveasignacionproducto #search_producto").val(response[0].nomproducto);
      $("#saveasignacionproducto #medida_producto").val(response[0].id_unidad_de_medida);
      $("#saveasignacionproducto #cantidad_producida").val(response[0].cantidad_producida);
      $("#saveasignacionproducto #porcentaje_sobre_produccion").val(response[0].porcentaje_sobre_produccion);
      $("#saveasignacionproducto #ventas_en_provincia").val(response[0].ventas_en_provincia);
      $("#saveasignacionproducto #ventas_en_otras_provincias").val(response[0].ventas_en_otras_provincias);
      $("#saveasignacionproducto #ventas_internacionales").val(response[0].ventas_internacionales);
      $("#saveasignacionproducto #anio_producto").val(response[0].anio);

      $("#btn-update-producto").show();
      $("#btn-asignaproducto").hide();

      $("#saveasignacionproducto").prop('id', 'updatesignacionproducto');
      $("#updatesignacionproducto").prop('name', 'updatesignacionproducto');




    }
  });




}

$("#btn-update-producto").on('click', function () {


  if ($("#search_producto").val() == "") {
    var n = noty({
      text: "<span class='fa fa-warning'></span> Debe Completar la busqueda del producto",
      theme: 'defaultTheme',
      layout: 'center',
      type: 'warning',
      timeout: 5000,
    });
  } else if ($("#cantidad_producida").val() == "") {
    var n = noty({
      text: "<span class='fa fa-warning'></span> Debe ingresar una cantidad producida",
      theme: 'defaultTheme',
      layout: 'center',
      type: 'warning',
      timeout: 5000,
    });
  } else if ($("#porcentaje_sobre_produccion").val() == "") {
    var n = noty({
      text: "<span class='fa fa-warning'></span> Debe ingresar un procentaje",
      theme: 'defaultTheme',
      layout: 'center',
      type: 'warning',
      timeout: 5000,
    });
  } else if ($("#ventas_en_provincia").val() == "") {
    var n = noty({
      text: "<span class='fa fa-warning'></span> Debe indicar ventas en provincia",
      theme: 'defaultTheme',
      layout: 'center',
      type: 'warning',
      timeout: 5000,
    });
  } else if ($("#ventas_en_otras_provincias").val() == "") {
    var n = noty({
      text: "<span class='fa fa-warning'></span> Debe indicar ventas en otras provincias",
      theme: 'defaultTheme',
      layout: 'center',
      type: 'warning',
      timeout: 5000,
    });
  } else if ($("#ventas_internacionales").val() == "") {
    var n = noty({
      text: "<span class='fa fa-warning'></span> Debe indicar ventas internacionales",
      theme: 'defaultTheme',
      layout: 'center',
      type: 'warning',
      timeout: 5000,
    });
  } else {

    let data = $("#updatesignacionproducto").serialize();


    $.ajax({
      type: 'POST',
      url: '/updateRelActProd',
      data: {
        _token: $('meta[name="csrf-token"]').attr('content'),
        data: data,
      },
      success: function (data) {
        if (data.status == 200) {

          $("#save").fadeIn(1000, function () {

            var n = noty({
              text: '<center> ' + data.msg + ' </center>',
              theme: 'defaultTheme',
              layout: 'center',
              type: 'information',
              timeout: 5000,
            });

            // aqui asigno cada valor a los campos correspondientes
            $("#id_rel_actividad_productos").val('')

            $("#id_producto").val('')
            $("#search_producto").val('')
            $("#medida_producto").val('')
            $("#cantidad_producida").val('')
            $("#porcentaje_sobre_produccion").val('')
            $("#ventas_en_provincia").val('')
            $("#ventas_en_otras_provincias").val('')
            $("#ventas_internacionales").val('')
            $("#anio_producto").val('')

            $("#btn-update-producto").hide();
            $("#btn-asignaproducto").show();



            $("#updatesignacionproducto").prop('id', 'saveasignacionproducto');
            $("#saveasignacionproducto").prop('name', 'saveasignacionproducto');



            $("#btn-actividad-update").html('<span class="fa fa-save"></span> Guardar y Cerrar');
            //recargo la tabla de actividades
            cargar_tabla_productos();
          });
        } else if (data.status == 1) {
          $("#save").fadeIn(1000, function () {

            var n = noty({
              text: '<center> ' + data.msg + ' </center>',
              theme: 'defaultTheme',
              layout: 'center',
              type: 'information',
              timeout: 5000,
            });

          });
        }
      }
    });
    return false;

  }









})



/////FUNCION PARA ELIMINAR PRODUCTO ASIGNADO EN ACTIVIDAD
function EliminarProductoAsignado(id_rel_actividad_productos) {
  swal({
    title: "¿Estás seguro?",
    text: "¿Estás seguro de Eliminar este Producto Asignado a la Actividad?",
    type: "warning",
    showCancelButton: true,
    cancelButtonText: "Cancelar",
    cancelButtonColor: '#d33',
    closeOnConfirm: false,
    confirmButtonText: "Eliminar",
    confirmButtonColor: "#808080"
  }, function () {
    $.ajax({
      type: "POST",
      url: "/eliminarProductoAsignado",
      data: {
        _token: $('meta[name="csrf-token"]').attr('content'),
        id_rel_act_producto: id_rel_actividad_productos,
      },
      success: function (data) {

        if (data.status == 200) {

          swal("Eliminado!", "Datos eliminados con éxito!", "success");

          cargar_tabla_productos()

        } else if (data == 2) {

          swal("Oops", "Esta Producto no puede ser Eliminado, tiene registros relacionados!", "error");

        } else {

          swal("Oops", "Usted no tiene Acceso para Eliminar Producto Asignados, no tienes Privilegios para este Proceso!", "error");

        }
      }
    })
  });
}
















/////////////////////////////////// FUNCIONES ASIGNACION DE MATERIA PRIMA A PRODUCTOS //////////////////////////////////////

// FUNCION PARA MOSTRAR CONDICION DE MATERIA PRIMA
function CondicionMateria(id_rel_materia_prima, es_propio_materia) {

  $('#muestracondicionmateria').html('');

  var dataString = 'BuscaCondicionMateria=si&id_rel_materia_prima=' + id_rel_materia_prima + "&condicion_materia=" + es_propio_materia;

  $.ajax({
    type: "GET",
    url: "funciones.php",
    data: dataString,
    success: function (response) {
      $('#muestracondicionmateria').empty();
      $('#muestracondicionmateria').append('' + response + '').fadeIn("slow");

    }
  });
}

//FUNCIONES PARA ACTIVAR-DESACTIVAR DETALLE DE IMPORTACION EN MATERIA PRIMA
function MotivoImportacionMateria() {

  var valor = $("#motivo_importacion_materia").val();

  if (valor === '4' || valor === true) {

    //habilitamos
    $("#detalle_materia_div").show();

  } else {

    // deshabilitamos
     $("#detalle_materia_div").hide();

  }
}

//muestra u oculta formulario dependiendo el origen de la materia prima
function pideDatosOrigen() {

  var valor = $("#es_propio_materia").val();

  if (valor == "A") {
    $(".origen").show();
  } else {
    $(".origen").hide();
  }
}

//mustra form de origen segun el modal desde el que se esté llamando
function origen(ref) {

  if (ref == 'origen_insumo') {
    var valor = $("#es_propio_insumo").val();
  }

  if (valor == "A") {
    $("." + ref + "").show();
  } else {
    $("." + ref + "").hide();
  }
}


//ACTIVA INPUT DETALLES IMPORTACION EN METERIA PRIMA
function ActivaDetallesMateriaPrima(detalles) {

  if (detalles === "0" || detalles === true) {

    $("#detalles_materia").attr('disabled', true);

  } else {

    // deshabilitamos

    $("#detalles_materia").attr('disabled', false);

  }
}

// FUNCION PARA ASIGNAR MATERIA PRIMA A PRODUCTO
function AddMateriaActividad(id_rel_industria_actividad_materia_prima) {

  $("#saveasignacionmateria #id_rel_industria_actividad_materia_prima").val(id_rel_industria_actividad_materia_prima);

  $.ajax({
    type: "post",
    url: "/motivoImportacion",
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
    },
    success: function (response) {
      $(response).each(function (i, v) {
        $("#motivo_importacion_materia").append('<option value="' + v.value + '">' + v.label + '</option>');
      })
    }
  });


  $.ajax({
    type: "post",
    url: "/getUnidades",
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
    },
    success: function (response) {
      $(response).each(function (i, v) {
        $("#medida_materia").append('<option value="' + v.value + '">' + v.label + '</option>');
      })
    }
  });

  cargar_tabla_materia();

}


// FUNCION PARA ACTUALIZAR PRODUCTO ASIGNADO
function UpdateMateriaPrima(id) {


  $("#saveasignacionmateria").prop('id', 'updateAsignacionMateria');
  $("#updateAsignacionMateria").prop('name', 'updateAsignacionMateria');

  $.ajax({
    type: "post",
    url: "/getRelMatPrima",
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
      id_materia: id
    },
    success: function (response) {
      console.log(response[0]);
      // aqui asigno cada valor a los campos correspondientes
      //$("#updateAsignacionMateria #id_rel_actividad_productos_materia_prima").val(id_rel_actividad_productos_materia_prima);
      $("#updateAsignacionMateria #id_asignacion_materia").val(response[0].id_rel_actividad_materia_prima);
      $("#updateAsignacionMateria #id_materia_prima").val(response[0].id_materia_prima);
      $("#updateAsignacionMateria #search_materia").val(response[0].materia_prima);
      $("#updateAsignacionMateria #medida_materia").val(response[0].unidad_de_medida);
      $("#updateAsignacionMateria #cantidad_materia").val(response[0].cantidad);
      $("#updateAsignacionMateria #es_propio_materia").val(response[0].es_propio);
      $("#updateAsignacionMateria #id_pais").val(response[0].id_pais);
      $("#updateAsignacionMateria #search_pais").val(response[0].pais);
      $("#updateAsignacionMateria #id_provincia").val(response[0].id_provincia);
      $("#updateAsignacionMateria #search_provincia").val(response[0].provincia);
      $("#updateAsignacionMateria #id_localidad3").val(response[0].id_localidad);
      $("#updateAsignacionMateria #search_localidad32").val(response[0].localidad);
      $("#updateAsignacionMateria #motivo_importacion_materia").val(response[0].id_motivo_importacion == null ? "" : response[0].id_motivo_importacion);
      $("#updateAsignacionMateria #detalles_materia").val(response[0].detalles);
      $("#updateAsignacionMateria #anio_materia").val(response[0].anio);


      response[0].es_propio == "P" ? $(".origen").hide() : $(".origen").show()

      $("#btn-asignamateria").hide()
      $("#btn-updateMateria").show()

      //$("#updateAsignacionMateria #asignamateria").val(proceso);
      //(response.id_localidad == "134" ? $("#motivo_importacion_materia").attr('disabled', true) : $("#motivo_importacion_materia").attr('disabled', false)); 
    }
  })






}


$("#btn-updateMateria").on('click', function () {


  if ($("#search_materia").val() == "") {
    var n = noty({
      text: "<span class='fa fa-warning'></span> Debe Completar la busqueda de la materia prima",
      theme: 'defaultTheme',
      layout: 'center',
      type: 'warning',
      timeout: 5000,
    });
  } else if ($("#cantidad_materia").val() == "") {
    var n = noty({
      text: "<span class='fa fa-warning'></span> Debe ingresar una cantidad utilizada",
      theme: 'defaultTheme',
      layout: 'center',
      type: 'warning',
      timeout: 5000,
    });
  } else if ($("#es_propio_materia").val() == "A") {


    if ($("#search_pais").val() == "") {
      var n = noty({
        text: "<span class='fa fa-warning'></span> Debe ingresar un pais",
        theme: 'defaultTheme',
        layout: 'center',
        type: 'warning',
        timeout: 5000,
      });
    }


    if ($("#search_provincia").val() == "") {
      var n = noty({
        text: "<span class='fa fa-warning'></span> Debe ingresar una provincia",
        theme: 'defaultTheme',
        layout: 'center',
        type: 'warning',
        timeout: 5000,
      });
    }

    if ($("#search_localidad32").val() == "") {
      var n = noty({
        text: "<span class='fa fa-warning'></span> Debe ingresar una localidad",
        theme: 'defaultTheme',
        layout: 'center',
        type: 'warning',
        timeout: 5000,
      });
    }

  } else {

    let data = $("#updateAsignacionMateria").serialize();


    $.ajax({
      type: 'POST',
      url: '/updateRelActMat',
      data: {
        _token: $('meta[name="csrf-token"]').attr('content'),
        data: data,
      },
      success: function (data) {
        if (data.status == 200) {

          $("#save").fadeIn(1000, function () {

            var n = noty({
              text: '<center> ' + data.msg + ' </center>',
              theme: 'defaultTheme',
              layout: 'center',
              type: 'information',
              timeout: 5000,
            });

            // aqui asigno cada valor a los campos correspondientes
            $("#updateAsignacionMateria #id_asignacion_materia").val("");
            $("#updateAsignacionMateria #id_materia_prima").val("");
            $("#updateAsignacionMateria #search_materia").val("");
            $("#updateAsignacionMateria #medida_materia").val("");
            $("#updateAsignacionMateria #cantidad_materia").val("");
            $("#updateAsignacionMateria #es_propio_materia").val("");
            $("#updateAsignacionMateria #id_pais").val("");
            $("#updateAsignacionMateria #search_pais").val("");
            $("#updateAsignacionMateria #id_provincia").val("");
            $("#updateAsignacionMateria #search_provincia").val("");
            $("#updateAsignacionMateria #id_localidad3").val("");
            $("#updateAsignacionMateria #search_localidad32").val("");
            $("#updateAsignacionMateria #motivo_importacion_materia").val("");
            $("#updateAsignacionMateria #detalles_materia").val("");
            $("#updateAsignacionMateria #anio_materia").val("");

            $(".origen").show()

            $("#btn-asignamateria").show()
            $("#btn-updateMateria").hide()



            $("#updatesignacionproducto").prop('id', 'saveasignacionproducto');
            $("#saveasignacionproducto").prop('name', 'saveasignacionproducto');

            //recargo la tabla de actividades
            cargar_tabla_materia();
          });
        } else if (data.status == 1) {
          $("#save").fadeIn(1000, function () {

            var n = noty({
              text: '<center> ' + data.msg + ' </center>',
              theme: 'defaultTheme',
              layout: 'center',
              type: 'information',
              timeout: 5000,
            });

          });
        }
      }
    });
    return false;

  }









})


$("#btn-cancelar-materia").on('click', function () {



  $("#updateAsignacionMateria #id_asignacion_materia").val("");
  $("#updateAsignacionMateria #id_materia_prima").val("");
  $("#updateAsignacionMateria #search_materia").val("");
  $("#updateAsignacionMateria #medida_materia").val("");
  $("#updateAsignacionMateria #cantidad_materia").val("");
  $("#updateAsignacionMateria #es_propio_materia").val("");
  $("#updateAsignacionMateria #id_pais").val("");
  $("#updateAsignacionMateria #search_pais").val("");
  $("#updateAsignacionMateria #id_provincia").val("");
  $("#updateAsignacionMateria #search_provincia").val("");
  $("#updateAsignacionMateria #id_localidad3").val("");
  $("#updateAsignacionMateria #search_localidad32").val("");
  $("#updateAsignacionMateria #motivo_importacion_materia").val("");
  $("#updateAsignacionMateria #detalles_materia").val("");
  $("#updateAsignacionMateria #anio_materia").val("");

  $(".origen").show()

  $("#btn-asignamateria").show()
  $("#btn-updateMateria").hide()



  $("#updatesignacionproducto").prop('id', 'saveasignacionproducto');
  $("#saveasignacionproducto").prop('name', 'saveasignacionproducto');

});



/////FUNCION PARA ELIMINAR PRODUCTO ASIGNADO EN ACTIVIDAD
function EliminarMateriaPrimaAsignada(id_rel_actividad_productos_materia_prima) {
  swal({
    title: "¿Estás seguro?",
    text: "¿Estás seguro de Eliminar este Producto Asignado a la Actividad?",
    type: "warning",
    showCancelButton: true,
    cancelButtonText: "Cancelar",
    cancelButtonColor: '#d33',
    closeOnConfirm: false,
    confirmButtonText: "Eliminar",
    confirmButtonColor: "#808080"
  }, function () {
    $.ajax({
      type: "post",
      url: "/eliminarMateriaPrima",
      data: {
        _token: $('meta[name="csrf-token"]').attr('content'),
        id_materia: id_rel_actividad_productos_materia_prima
      },
      success: function (data) {

        if (data.status == 200) {

          swal("Eliminado!", "Datos eliminados con éxito!", "success");
          cargar_tabla_materia()

        } else {

          swal("Oops", "Usted no tiene Acceso para Eliminar Materia Prima Asignada, no tienes Privilegios para este Proceso!", "error");

        }
      }
    })
  });
}


















/////////////////////////////////// FUNCIONES ASIGNACION DE INSUMOS A ACTIVIDAD //////////////////////////////////////

// FUNCION PARA AGREGA ID ACTIVIDAD EN INSUMO
function AddIdActividadInsumoModal(id_industria, nombre_de_fantasia, anio) {
  // aqui asigno cada valor a los campos correspondientes
  $("#saveasignacioninsumo #industria_insumo").val(id_industria);
  $("#saveasignacioninsumo #nombre_de_fantasia").text(nombre_de_fantasia);
  $("#saveasignacioninsumo #anio_insumo").val(anio);
}

// FUNCION PARA MOSTRAR CONDICION DE INSUMO
function CondicionInsumo(id_rel_insumo, es_propio_insumo) {

  $('#muestracondicioninsumo').html('');

  var dataString = 'BuscaCondicionInsumo=si&id_rel_industria_insumos=' + id_rel_insumo + "&condicion_insumo=" + es_propio_insumo;

  $.ajax({
    type: "GET",
    url: "funciones.php",
    data: dataString,
    success: function (response) {
      $('#muestracondicioninsumo').empty();
      $('#muestracondicioninsumo').append('' + response + '').fadeIn("slow");
    }
  });
}

//FUNCIONES PARA ACTIVAR-DESACTIVAR DETALLE DE IMPORTACION EN INSUMO
function MotivoImportacionInsumo() {

  var valor = $("#motivo_importacion_insumo").val();

  if (valor === '4' || valor === true) {

    //deshabilitamos
    $("#origen_insumo_div").show();

  } else {

    // habilitamos
    $("#origen_insumo_div").hide();

  }
}


// FUNCION PARA MOSTRAR INSUMO ASIGNADO EN VENTANA MODAL
function VerInsumoAsignado(id_rel_industria_insumos) {

  $('#muestradetalleinsumomodal').html('<center><i class="fa fa-spin fa-spinner"></i> Cargando información, por favor espere....</center>');

  

  $.ajax({
    type: "POST",
    url: "/getInsumo",
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
      id_rel_insumo:id_rel_industria_insumos
    },
    success: function (response) {


      var motivo= response[0].motivo_importacion ?  response[0].motivo_importacion : "***"
      var detalle= response[0].detalles == "" || response[0].detalles == null ? "***" : response[0].detalles == ""

      var propia = response[0].es_propio =="P" ? "Propio" : "Adquirido"
      $('#muestradetalleinsumomodal').empty();
      $('#muestradetalleinsumomodal').append(

        '<table class="table-responsive" border="0" align="center">' +
        '<tbody>'+
        '<tr>' +
        '<td><strong>Insumo utilizado:</strong>' + response[0].insumo + '</td>' +
        '</tr>' +
        ' <tr>' +
        ' <td><strong>Unidad de medida:</strong>' + response[0].unidad_de_medida + '</td>' +
        ' </tr>' +
        ' <tr>' +
        ' <td><strong>cantidad:</strong>' + response[0].cantidad + '</td>' +
        ' </tr>' +
        ' <tr>' +
        ' <td><strong>Propia o adquirida:</strong>' + propia+ '</td>' +
        ' </tr>' +
        ' <tr>' +
        ' <td><strong>Pais: </strong>' + response[0].pais + '</td>' +
        '</tr>' +
        ' <tr>' +
        ' <td><strong>Provincia: </strong>' + response[0].provincia + '</td>' +
        ' </tr>' +
        '<tr>' +
        ' <td><strong>Localidad: </strong> ' + response[0].localidad+ '</td>' +
        '</tr>' +
        ' <tr>' +
        ' <td><strong>Motivo de importacion: </strong>' + motivo + '</td>' +
        '</tr>' +
        ' <tr>' +
        ' <td><strong>Detalles: </strong>' + detalle + '</td>' +
        '</tr>' +
        ' <tr>' +
        ' <td><strong>Año: </strong>' + response[0].anio + '</td>' +
        '</tr>' +
        '</tbody>'+
        '</table >'


      ).fadeIn("slow");

    }
  });
}

//ACTIVA INPUT DETALLES IMPORTACION EN INSUMOS
function ActivaDetallesInsumo(detalles) {

  if (detalles === "0" || detalles === true) {

    $("#detalles_insumo").attr('disabled', true);

  } else {

    // deshabilitamos

    $("#detalles_insumo").attr('disabled', false);

  }
}

// FUNCION PARA ACTUALIZAR INSUMO ASIGNADO
function UpdateInsumoAsignado(id_rel_industria_insumos) {

  $.ajax({
    type: "POST",
    url: "/getInsumo",
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
      id_rel_insumo:id_rel_industria_insumos
    },
    success: function (response) {

      $("#btn-insumo").hide();
      
      $("#btn-insumo-update").show();

     

      $("#saveasignacioninsumo").prop('id', 'updateasignacioninsumo');
      $("#updateasignacioninsumo").prop('name', 'updateasignacioninsumo');

       // aqui asigno cada valor a los campos correspondientes
        $("#updateasignacioninsumo #id_rel_industria_insumos").val(response[0].id_rel_industria_insumo);
        //$("#updateasignacioninsumo #industria_insumo").val(id_industria);
        //$("#updateasignacioninsumo #nombre_de_fantasia").text(nombre_de_fantasia);
        $("#updateasignacioninsumo #id_insumo").val(response[0].id_insumo);
        $("#updateasignacioninsumo #search_insumo").val(response[0].insumo);
        $("#updateasignacioninsumo #medida_insumo").val(response[0].id_unidad_de_medida);
        $("#updateasignacioninsumo #cantidad_insumo").val(response[0].cantidad);
        $("#updateasignacioninsumo #es_propio_insumo").val(response[0].es_propio);


        $("#updateasignacioninsumo #id_pais_insumo").val(response[0].id_pais);
        $("#updateasignacioninsumo #search_pais_insumo").val(response[0].pais);
        $("#updateasignacioninsumo #id_provincia_insumo").val(response[0].id_provincia);
        $("#updateasignacioninsumo #search_provincia_insumo").val(response[0].provincia);
        $("#updateasignacioninsumo #id_localidad_insumo").val(response[0].id_localidad);
        $("#updateasignacioninsumo #search_localidad_insumo").val(response[0].localidad);
       

        if(response[0].es_propio=="P"){

          $(".origen_insumo").hide();

        }else{
          $(".origen_insumo").show();

          $("#updateasignacioninsumo #motivo_importacion_insumo").val(response[0].id_motivo_importacion);

          $("#updateasignacioninsumo #detalles_insumo").val(response[0].detalles);

         
        }
       
    }
  });

 
}


/////FUNCION PARA ELIMINAR INSUMO ASIGNADO
function EliminarInsumoAsignado(id_rel_industria_insumos) {
  swal({
    title: "¿Estás seguro?",
    text: "¿Estás seguro de Eliminar este Insumo de la Industria?",
    type: "warning",
    showCancelButton: true,
    cancelButtonText: "Cancelar",
    cancelButtonColor: '#d33',
    closeOnConfirm: false,
    confirmButtonText: "Eliminar",
    confirmButtonColor: "#808080"
  }, function () {
    $.ajax({
      type: "POST",
      url: "/deleteRelInsumo",
      data:{
        _token: $('meta[name="csrf-token"]').attr('content'),
        id_rel_insumo:id_rel_industria_insumos
      },
      success: function (data) {

        if (data.status == 200) {

          swal("Eliminado!", "Datos eliminados con éxito!", "success");
          cargar_tabla_insumos();

        } else {

          swal("Oops", "Usted no tiene Acceso para Eliminar Insumos Asignados, no tienes Privilegios para este Proceso!", "error");

        }
      }
    })
  });
}












function getGastos() {
 
  $.ajax({
    type: "post",
    url: "/getGastos",
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
    },
    success: function (response) {


      
        $("#gastos_generados").find("tr").remove(); 
        var coma =",";
        var punto="."

        var flot="%f"
       
        $(response).each(function (i, v) {
        
          $('#gastos_generados').append(

            '<tr role="row" class="odd">'+
            '<td><input type="hidden" name="id_gasto[]"  value="'+v.id_egreso+'" /><label>'+v.egreso+'</label></td>'+

                                              
            '<td class="text-center"><input type="text" class="form-control" name="costo_gasto[]" value="0,00"  placeholder="Ingrese Importe Total Anual" autocomplete="off" onKeyPress="EvaluateText(\'' + flot + '\',this);" onBlur="this.value=Number_Format(this.value, 2,\'' + coma + '\',\'' + punto + '\')" style="width:100%;height:40px;background:#f0f9fc;border-radius:5px 5px 5px 5px;"></td>'
            +'</tr>'

          );


        
          })
      

      
    }
});
}






/////////////////////////////////// FUNCIONES ASIGNACION DE SERVICIOS A ACTIVIDAD //////////////////////////////////////


//funcion para cargar servicios en modal
function getServicios( ref,id_clasif) {
  // aqui asigno cada valor a los campos correspondientes
  /*  $("#saveserviciobasico #industria_servicio_basico").val(id_industria);
   $("#saveserviciobasico #nombre_de_fantasia").text(nombre_de_fantasia);
   $("#saveserviciobasico #zona_local").val(zona);
   $("#saveserviciobasico #anio_basico").val(anio); */



  $.ajax({
    type: "post",
    url: "/ser_basicos",
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
      id:id_clasif
    },
    success: function (response) {


      if(ref == "sb"){
        $("#ser_basico").find("tr").remove(); 
        var coma =",";
        var punto="."

        var flot="%f"
       
        $(response).each(function (i, v) {
        
          $('#ser_basico').append(

            '<tr role="row" class="odd">'+
            '<td><input type="hidden" name="id_servicio_basico[]"  value="'+v.id_servicio+'" /><label>'+v.servicio+'</label></td>'+

                                              
            '<td class="text-center"><input type="text" class="form-control" name="costo_basico[]" value="0,00" placeholder="Ingrese Importe Total Anual" autocomplete="off" onKeyPress="EvaluateText(\'' + flot + '\',this);" onBlur="this.value=Number_Format(this.value, 2,\'' + coma + '\',\'' + punto + '\')" style="width:100%;height:40px;background:#f0f9fc;border-radius:5px 5px 5px 5px;"></td>'
            +'</tr>'

          );


        
          })
      }else if(ref == "com"){

          //id_servicio_combustible

          $(response).each(function (i, v) { // indice, valor
                $("#id_servicio_combustible").append('<option value="' + v.id_servicio + '">' + v.servicio + '</option>');
                
            })

      }

      
    }
});
}

// FUNCION PARA ACTUALIZAR SERVICIOS BASICOS
function UpdateServicioBasicoAsignado(id_rel_industria_servicios) {

  $.ajax({
    type: "post",
    url: "/getServicio",
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
      id:id_rel_industria_servicios
    },
    success: function (response) {

     

      $("#ser_basico_2").find("tr").remove(); 
        var coma =",";
        var punto="."

        var flot="%f"
       
        $(response).each(function (i, v) {
        console.log(v)
          $('#ser_basico_2').append(

            '<tr role="row" class="odd">'+
            '<td><input type="hidden" name="id_servicio_basico[]"  value="'+v.id_servicio+'" /><label>'+v.servicio+'</label></td>'+

                                              
            '<td class="text-center"><input type="text" class="form-control" name="costo_basico[]" value="'+v.costo+'"  placeholder="Ingrese Importe Total Anual" autocomplete="off" onKeyPress="EvaluateText(\'' + flot + '\',this);" onBlur="this.value=Number_Format(this.value, 2,\'' + coma + '\',\'' + punto + '\')" style="width:100%;height:40px;background:#f0f9fc;border-radius:5px 5px 5px 5px;"></td>'
            +'</tr>'

          );

          })

        $("#updateserviciobasico #id_rel_industria_servicios_basicos").val(id_rel_industria_servicios);
        //$("#updateserviciobasico #industria_servicio_basico_update").val(id_industria);
        //$("#updateserviciobasico #nombre_de_fantasia").text(nombre_de_fantasia);
        //$("#updateserviciobasico #nombre_servicio").val(nomservicio);
        //$("#updateserviciobasico #costo_servicio").val(costo);
        //$("#updateserviciobasico #anio_basico_update").val(anio);


    }
  })
              // aqui asigno cada valor a los campos correspondientes
 
}




// FUNCION PARA AGREGA ID ACTIVIDAD EN COMBUSTIBLE
function AddIdCombustibleModal(id_industria, nombre_de_fantasia, anio) {
              // aqui asigno cada valor a los campos correspondientes
              $("#savecombustible #industria_combustible").val(id_industria);
  $("#savecombustible #nombre_de_fantasia").text(nombre_de_fantasia);
  $("#savecombustible #anio_combustible").val(anio);
}

//FUNCIONES PARA ACTIVAR-DESACTIVAR DETALLE DE IMPORTACION EN COMBUSTIBLE
function MotivoImportacionCombustible() {

  var valor = $("#motivo_importacion_combustible").val();

  if (valor === '4' || valor === true) {

              //deshabilitamos
              $("#motivo_servicio_div").show();

  } else {

              // habilitamos
              $("#motivo_servicio_div").hide();

  }
}

//ACTIVA INPUT DETALLES IMPORTACION EN COMBUSTIBLE
function ActivaDetallesCombustible(detalles) {

  var valor = $("#detalles").val();

  if (detalles === "0" || detalles === true) {

              $("#detalles_combustible").attr('disabled', true);

  } else {

              // deshabilitamos

              $("#detalles_combustible").attr('disabled', false);

  }
}

// FUNCION PARA ACTUALIZAR COMBUSTIBLE ASIGNADO
function UpdateCombustibleAsignado(id_rel_industria_servicios) {


  $.ajax({
    type: "post",
    url: "/getServicio",
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
      id:id_rel_industria_servicios
    },
    success: function (response) {

      $("#btn-combustible-update").show();
						$("#btn-combustible").hide();

      $("#savecombustible").prop('id', 'updatecombustible');
      $("#updatecombustible").prop('name', 'updatecombustible');
       // aqui asigno cada valor a los campos correspondientes
      $("#updatecombustible #id_rel_industria_combustible").val(response[0].id_rel_industria_servicio);
      //$("#updatecombustible #industria_combustible").val(response[0].id_industria);
      //$("#updatecombustible #nombre_de_fantasia").text(nombre_de_fantasia);
      $("#updatecombustible #id_servicio_combustible").val(response[0].id_servicio);
      $("#updatecombustible #medida_combustible").val(response[0].id_unidad_de_medida);
      //$("#updatecombustible #frecuencia_combustible").val(response[0].nomfrecuencia);
      //$("#updatecombustible #cantidad_combustible").val(cantidad);
      $("#updatecombustible #costo_combustible").val(response[0].costo);
      $("#updatecombustible #id_pais_combustible").val(response[0].id_pais);
      $("#updatecombustible #search_pais_combustible").val(response[0].pais);
      $("#updatecombustible #id_provincia_combustible").val(response[0].id_provincia);
      $("#updatecombustible #search_provincia_combustible").val(response[0].provincia);
      $("#updatecombustible #id_localidad_combustible").val(response[0].id_localidad);
      $("#updatecombustible #search_localidad_combustible").val(response[0].localidad);
      $("#updatecombustible #motivo_importacion_combustible").val(response[0].id_motivo_importacion);
      $("#updatecombustible #detalles_combustible").val(response[0].detalles);
      //$("#updatecombustible #anio_combustible").val(anio);
      //$("#updatecombustible #combustibles").val(proceso);
      response[0].detalles ? $("#detalles_combustible").attr('disabled', false) : $("#detalles_combustible").attr('disabled', true);
    }
  })
  
 
}





// FUNCION PARA AGREGA ID ACTIVIDAD EN OTROS SERVICIOS
function AddIdOtrosModal(id_industria, nombre_de_fantasia, anio) {
              // aqui asigno cada valor a los campos correspondientes
              $("#saveotros #industria_otros").val(id_industria);
  $("#saveotros #nombre_de_fantasia").text(nombre_de_fantasia);
  $("#saveotros #anio_otros").val(anio);
}

// FUNCION PARA MOSTRAR CONDICION DE INSUMO
function CondicionOtrosServicios(id_rel_otros, servicio_contratado) {

  //var dataString = 'BuscaCondicionOtrosServicios=si&id_rel_servicios='+id_rel_otros+"&condicion_otros="+servicio_contratado;
  var dataString = 'BuscaCondicionOtrosServicios=si&id_rel_industria_servicios=' + id_rel_otros + "&condicion_otros=" + servicio_contratado;

  $.ajax({
              type: "GET",
    url: "funciones.php",
    data: dataString,
    success: function (response) {
              $('#muestracondicionotros').empty();
      $('#muestracondicionotros').append('' + response + '').fadeIn("slow");
    }
  });
}

//FUNCIONES PARA ACTIVAR-DESACTIVAR DETALLE DE IMPORTACION EN OTROS SERVICIOS
function MotivoImportacionOtros() {

  var valor = $("#motivo_importacion_otros").val();

  if (valor === '4' || valor === true) {

              //deshabilitamos
              $("#motivo_otros").show();

  } else {

              // habilitamos
              $("#motivo_otros").hide();

  }
}

//ACTIVA INPUT DETALLES IMPORTACION EN OTROS SERVICIOS
function ActivaDetallesOtros(detalles) {

  var valor = $("#detalles").val();

  if (detalles === "0" || detalles === true) {

              $("#detalles_otros").attr('disabled', true);

  } else {

              // deshabilitamos

              $("#detalles_otros").attr('disabled', false);

  }
}

// FUNCION PARA ACTUALIZAR OTROS SERVICIOS ASIGNADO
function UpdateOtrosAsignado(id_rel_industria_servicios) {
  // aqui asigno cada valor a los campos correspondientes

  $.ajax({
    type: "POST",
    url: "/getServicio",
    data: {
       _token: $('meta[name="csrf-token"]').attr('content'),
      id:id_rel_industria_servicios
    },
    success: function (response) {
      
      $("#btn-otros-update").show();
      $("#btn-otros").hide();

      $("#saveotros").prop('id', 'updateotros');
      $("#updateotros").prop('name', 'updateotros');


      $("#updateotros #id_rel_industria_otros").val(response[0].id_rel_industria_servicio);
      //$("#updateotros #industria_otros").val(id_industria);
      //$("#updateotros #nombre_de_fantasia").text(nombre_de_fantasia);
      $("#updateotros #id_servicio_otros").val(response[0].id_servicio);
      $("#updateotros #search_servicio_otros").val(response[0].servicio);

      $("#updateotros #costo_otros").val(response[0].costo);
      $("#updateotros #frecuencia_otros").val(response[0].id_frecuencia_de_contratacion);
      $("#updateotros #cantidad_otros").val(response[0].cantidad_consumida);
      //$("#updateotros #servicio_contratado").val(servicio_contratado);
      $("#updateotros #id_pais_otros").val(response[0].id_pais);
      $("#updateotros #search_pais_otros").val(response[0].pais);
      $("#updateotros #id_provincia_otros").val(response[0].id_provincia);
      $("#updateotros #search_provincia_otros").val(response[0].provincia);
      $("#updateotros #id_localidad_otros").val(response[0].id_localidad);
      $("#updateotros #search_localidad_otros").val(response[0].localidad);
      $("#updateotros #motivo_importacion_otros").val(response[0].id_motivo_importacion);
      $("#updateotros #detalles_otros").val(response[0].detalles);
      //$("#updateotros #anio_otros").val(anio);
      //$("#updateotros #otros").val(proceso);
      //(id_localidad == "134" ? $("#motivo_importacion_otros").attr('disabled', true) : $("#motivo_importacion_otros").attr('disabled', false));
      response[0].detalles ? $("#detalles_otros").attr('disabled', false) : $("#detalles_otros").attr('disabled', true);
    }
  });
  
}









// FUNCION PARA AGREGA ID ACTIVIDAD EN EGRESOS DEVENGADOS
function AddIdActividadDevengadosModal(id_industria, nombre_de_fantasia, zona, anio) {
              // aqui asigno cada valor a los campos correspondientes
              $("#savedevengados #industria_devengados").val(id_industria);
  $("#savedevengados #nombre_de_fantasia").text(nombre_de_fantasia);
  $("#savedevengados #zona_devengado").val(zona);
  $("#savedevengados #anio_devengado").val(anio);
}

// FUNCION PARA ACTUALIZAR EGRESO DEVENGADO
function UpdateDevengadoAsignado(id_rel_industria_servicios) {

  $.ajax({
              type: "POST",
    url: "/getDevengados",
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
      id:id_rel_industria_servicios
    },
    success: function (response) {


      $("#updatedevengado").find("tr").remove(); 
        var coma =",";
        var punto="."

        var flot="%f"
       
        $(response).each(function (i, v) {
        
          $('#updatedevengado').append(

            '<tr role="row" class="odd">'+
            '<td><input type="hidden" name="id_egreso[]"  value="'+v.id_egreso+'" /><label>'+v.egreso+'</label></td>'+

                                              
            '<td class="text-center"><input type="text" class="form-control" name="costo_egreso[]" value="'+v.importe+'"  placeholder="Ingrese Importe Total Anual" autocomplete="off" onKeyPress="EvaluateText(\'' + flot + '\',this);" onBlur="this.value=Number_Format(this.value, 2,\'' + coma + '\',\'' + punto + '\')" style="width:100%;height:40px;background:#f0f9fc;border-radius:5px 5px 5px 5px;"></td>'
            +'</tr>'

          );


        
          })


        // aqui asigno cada valor a los campos correspondientes
            $("#updatedevengados #id_rel_industria_devengados_update").val(response[0].id_rel_industria_egreso);
           
  
            $("#updatedevengados #nombre_egreso").val(response[0].egreso);
          


    }
  })




            
}

// FUNCION PARA MOSTRAR SERVICIO ASIGNADO EN VENTANA MODAL
function VerServicioAsignado(id_rel_industria_servicios, ref="servicios") {

    $('#muestradetalleserviciomodal').html('<center><i class="fa fa-spin fa-spinner"></i> Cargando información, por favor espere....</center>');

    var url= ref=="servicios"? "/getServicio" : "/getDevengados"

  $.ajax({
              type: "POST",
    url: url,
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
      id:id_rel_industria_servicios
    },
    success: function (response) {
              $('#muestradetalleserviciomodal').empty();

      if(ref == "servicios"){
        var detalle= response[0].detalles == null || response[0].detalles == "" ? "***" : response[0].detalles 
        var motivo= response[0].motivo_importacion == null ? "***" :  response[0].motivo_importacion 
        $('#muestradetalleserviciomodal').append(

          '<table class="table-responsive" border="0" align="center">' +
          '<tr>' +
          '<td><strong>Nombre de Servicio:</strong>' + response[0].servicio + '</td>' +
          '</tr>' +
          ' <tr>' +
          ' <td><strong>Costo:</strong> $' + response[0].costo + '</td>' +
          ' </tr>' +
          ' <tr>' +
          ' <td><strong>Pais:</strong>' +  response[0].pais + '</td>' +
          ' </tr>' +
          ' <tr>' +
          ' <td><strong>Provincia:</strong>' +  response[0].provincia + '</td>' +
          ' </tr>' +
          ' <tr>' +
          ' <td><strong>Localidad: </strong>' +  response[0].localidad + '</td>' +
          '</tr>' +
          ' <tr>' +
          ' <td><strong>Motivo de Importacion: </strong>' + motivo + '</td>' +
          ' </tr>' +
          '<tr>' +
          ' <td><strong>Detalles: </strong> ' +  detalle + '</td>' +
          '</tr>' +
          ' <tr>' +
          ' <td><strong>Año: </strong>' +  response[0].anio + '</td>' +
          '</tr>' +
          '</table >'

        ).fadeIn("slow");
      }else{


        $('#muestradetalleserviciomodal').append(

          '<table class="table-responsive" border="0" align="center">' +
          '<tr>' +
          '<td><strong>Nombre de Servicio:</strong>' + response[0].egreso + '</td>' +
          '</tr>' +
          ' <tr>' +
          ' <td><strong>Importe:</strong> $' + response[0].importe + '</td>' +
          ' </tr>' +
         
          '</table >'

        ).fadeIn("slow");


      }
      

    }
  });
}


/////FUNCION PARA ELIMINAR SERVICIO ASIGNADO
function EliminarServicioAsignado(id_rel_industria_servicios) {
              swal({
                title: "¿Estás seguro?",
                text: "¿Estás seguro de Eliminar este Servicio de la Industria?",
                type: "warning",
                showCancelButton: true,
                cancelButtonText: "Cancelar",
                cancelButtonColor: '#d33',
                closeOnConfirm: false,
                confirmButtonText: "Eliminar",
                confirmButtonColor: "#808080"
              }, function () {
                $.ajax({
                  type: "POST",
                  url: "/deleteServicio",
                  data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    id:id_rel_industria_servicios
                  },
                  success: function (data) {

                    if (data.status == 200) {

                      swal("Eliminado!", "Datos eliminados con éxito!", "success");
                      cargar_tabla_combustible();
                      cargar_tabla_otros();
                      //$('#secciones').load("formularios.php?BuscaFormularioProcedimiento=si&seccion=" + seccion + "&in=" + id_industria);

                    } else {

                      swal("Oops", "Usted no tiene Acceso para Eliminar Servicios Asignados, no tienes Privilegios para este Proceso!", "error");

                    }
                  }
                })
              });
}




















/////////////////////////////////// FUNCIONES SITUACION DE PLANTA //////////////////////////////////////

// FUNCION PARA AGREGA ID ACTIVIDAD EN SITUACION DE PLANTA
function AddIdSituacionModal(id_industria, nombre_de_fantasia, anio) {
              // aqui asigno cada valor a los campos correspondientes
              $("#savesituacion #industria_situacion").val(id_industria);
  $("#savesituacion #nombre_de_fantasia").text(nombre_de_fantasia);
  $("#savesituacion #anio_situacion").val(anio);
}

//FUNCIONES PARA ACTIVAR-DESACTIVAR IMPORTE DE INVERSIONES
function DeclaroInversion() {

  var valor = $('input:radio[name=declara_inversion]:checked').val();
  //var valor = $("#declara_inversion").val();

  if (valor === '1' || valor === true) {

              //deshabilitamos
      $(".inversion_i").show();
   

  } else {

              // habilitamos
              $(".inversion_i").hide();
    

  }
}


// FUNCION PARA MOSTRAR SITUACION DE PLANTA ASIGNADO EN VENTANA MODAL
function VerSituacion(id_situacion_de_planta) {
/*





*/
$.ajax({
    type: "POST",
    url: "/getSituacion",
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
      id:id_situacion_de_planta
    },
    success: function (response) {

            $('#muestradetallesituacionmodal').empty();

            var z_i= response[0].es_zona_industrial == "1" ? "Si" :"No"

            var inv= response[0].inversion_activo_fijo == "0.00" ? "No" :"Si"

      $('#muestradetallesituacionmodal').append(

          '<table class="table-responsive" border="0" align="center">'+
           ' <tbody>'+
             
           ' <tr>'+
              '<td><strong>Porcentaje de Producción según Capacidad Instalada:</strong> '+response[0].capacidad_instalada+'%</td>'+
            '</tr>'+
            '<tr>'+
            '  <td><strong>Superficie de Lote Industrial Ocupado (m2):</strong>'+response[0].superficie_lote+'(m2)</td>'+
           ' </tr>'+
            '<tr>'+
             ' <td><strong>Superficie Ocupada por la Planta (m2):</strong> '+response[0].superficie_planta+'(m2)</td>'+
           ' </tr>'+
           ' <tr>'+
             ' <td><strong>Radiación en Parques o Áreas Industriales: </strong> '+z_i+'</td>'+
           ' </tr>'+
          '  <tr>'+
              '<td><strong>En el Año Declarado realizó Inversiones en la Planta:</strong> '+inv+'</td>'+
           ' </tr>'+
            '<tr>'+
             ' <td><strong>Importe de Inversión:</strong> '+response[0].inversion_anual+'</td>'+
           ' </tr>'+
           '<tr>'+
            '<td><strong>Inversión Activo Fijo:</strong> '+response[0].inversion_activo_fijo+'</td>'+
         ' </tr>'+
         ' <tr>'+
           ' <td><strong>Porcentaje de Capacidad Ociosa de la Planta:</strong> '+response[0].capacidad_ociosa+'%</td>'+
         ' </tr>'+
          '<tr>'+
            '<td><strong>Porcentaje de Capacidad Instalada en Uso de la Planta:</strong>'+response[0].capacidad_instalada+' %</td>'+
          '</tr>'+
          '<tr>'+
           ' <td><strong>Año:</strong> '+response[0].anio+'</td>'+
          '</tr>'+
        '</tbody></table>'
        ).fadeIn("slow");

    }
  });
             
  
}

//ACTIVA INPUT DETALLES IMPORTACION EN SITUACION DE PLANTA
function ActivaDeclaraInversion(valor) {

  if (valor === "1" || valor === true) {

              $("#inversion_anual").attr('disabled', false);
    $("#inversion_activo_fijo").attr('disabled', false);

  } else {

              // habilitamos
              $("#inversion_anual").attr('disabled', true);
    $("#inversion_activo_fijo").attr('disabled', true);

  }
}

// FUNCION PARA ACTUALIZAR SITUACION DE PLANTA ASIGNADO
function UpdateSituacion(id_situacion_de_planta) {

   $.ajax({
    type: "POST",
    url: "/getSituacion",
    data: {
      _token: $('meta[name="csrf-token"]').attr('content'),
      id:id_situacion_de_planta
    },
    success: function (response) {

              $("#btn-situacion-update").show();
              $("#btn-situacion").hide();

              $("#savesituacion").prop('id', 'updatesituacion');
              $("#updatesituacion").prop('name', 'updatesituacion');
            
            // aqui asigno cada valor a los campos correspondientes
              $("#updatesituacion #id_situacion_de_planta").val(response[0].id_situacion_de_planta);
              //$("#updatesituacion #industria_situacion").val(id_industria);
              //$("#updatesituacion #nombre_de_fantasia").text(nombre_de_fantasia);
              $("#updatesituacion #produccion_sobre_capacidad").val(response[0].produccion_sobre_capacidad);
              $("#updatesituacion #superficie_lote").val(response[0].superficie_lote);
              $("#updatesituacion #superficie_planta").val(response[0].superficie_planta);
              $("#updatesituacion #es_zona_industrial").val((response[0].es_zona_industrial == '1') ? $("#updatesituacion #name1").attr('checked', true) : $("#updatesituacion #name2").attr('checked', true));
              $("#updatesituacion #declara_inversion").val((response[0].inversion_activo_fijo != "" || response[0].inversion_anual != ""  ) ? $("#updatesituacion #name3").attr('checked', true) : $("#updatesituacion #name4").attr('checked', true));
              $("#updatesituacion #inversion_anual").val(response[0].inversion_anual);
              $("#updatesituacion #inversion_activo_fijo").val(response[0].inversion_activo_fijo);
              $("#updatesituacion #capacidad_instalada").val(response[0].capacidad_instalada);
              $("#updatesituacion #capacidad_ociosa").val(response[0].capacidad_ociosa);
              /*$("#updatesituacion #anio_situacion").val(anio);
              $("#updatesituacion #situacion").val(proceso);*/

              

              (response[0].inversion_activo_fijo != "" || response[0].inversion_anual != "" )? $(".inversion_i").show() : $(".inversion_i").hide()

    }
  });




              
}


/////FUNCION PARA ELIMINAR SITUACION DE PLANTA ASIGNADO
function EliminarSituacion(id_situacion_de_planta) {
              swal({
                title: "¿Estás seguro?",
                text: "¿Estás seguro de Eliminar esta Situación de Planta?",
                type: "warning",
                showCancelButton: true,
                cancelButtonText: "Cancelar",
                cancelButtonColor: '#d33',
                closeOnConfirm: false,
                confirmButtonText: "Eliminar",
                confirmButtonColor: "#808080"
              }, function () {
                $.ajax({
                  type: "POST",
                  url: "/deleteSituacion",
                  data: {
                       _token: $('meta[name="csrf-token"]').attr('content'),
                        id:id_situacion_de_planta
                  },
                  success: function (data) {

                    if (data.status == 200) {

                      swal("Eliminado!", "Datos eliminados con éxito!", "success");
                      cargar_tabla_splanta();
                      //$('#secciones').load("formularios.php?BuscaFormularioProcedimiento=si&seccion=" + seccion + "&in=" + id_industria);

                    } else {

                      swal("Oops", "Usted no tiene Acceso para Eliminar Situación de Planta, no tienes Privilegios para este Proceso!", "error");

                    }
                  }
                })
              });
}

















/////////////////////////////////// FUNCIONES ASIGNACION DE MOTIVO OCIOSIDAD //////////////////////////////////////

// FUNCION PARA AGREGA ID ACTIVIDAD EN MOTIVO OCIOSIDAD
function AddIdMotivoModal(id_industria, nombre_de_fantasia, anio) {
              // aqui asigno cada valor a los campos correspondientes
              $("#savemotivoasignado #industria_motivo").val(id_industria);
  $("#savemotivoasignado #nombre_de_fantasia").text(nombre_de_fantasia);
  $("#savemotivoasignado #anio_motivo").val(anio);
}

// FUNCION PARA MOSTRAR MOTIVO OCIOSIDAD EN VENTANA MODAL
function VerMotivo(id_rel_industria_motivo_ociosidad) {

          /*   */

    $.ajax({
        type: "POST",
        url: "/getMotivo",
        data: {
             _token: $('meta[name="csrf-token"]').attr('content'),
              id:id_rel_industria_motivo_ociosidad
        },
        success: function (response) {

           $('#muestradetallemotivomodal').empty();
          $('#muestradetallemotivomodal').append(


           ' <table class="table-responsive" border="0" align="center">'+
           '   <tbody>'+
              '<tr>'+
                '<td><strong>Descripción de Motivo Ociosidad:</strong> '+response[0].motivo_ociosidad+'</td>'+
             ' </tr>'+
             ' <tr>'+
                '<td><strong>Año:</strong> '+response[0].anio+'</td>'+
             ' </tr>'+
           ' </tbody></table>'



            ).fadeIn("slow");
       
        }
      })

 
}

// FUNCION PARA ACTUALIZAR MOTIVO OCIOSIDAD
function UpdateMotivo(id_rel_industria_motivo_ociosidad) {


              $.ajax({
                  type: "POST",
                  url: "/getMotivo",
                  data: {
                       _token: $('meta[name="csrf-token"]').attr('content'),
                        id:id_rel_industria_motivo_ociosidad
                  },
                  success: function (data) {

                    $("#btn-motivo-update").show();
                    $("#btn-motivo").hide();

                    $("#savemotivoasignado").prop('id', 'updatemotivoasignado');
                    $("#updatemotivoasignado").prop('name', 'updatemotivoasignado');

                    // aqui asigno cada valor a los campos correspondientes
                  $("#updatemotivoasignado #id_rel_industria_motivo_ociosidad").val(data[0].id_rel_industria_motivo_ociosidad);
                  
                 
                  $("#updatemotivoasignado #id_motivo_ociosidad").val(data[0].id_motivo_ociosidad);
                 
                  }
                })
              
}


/////FUNCION PARA ELIMINAR MOTIVO OCIOSIDAD ASIGNADO
function EliminarMotivo(id_rel_industria_motivo_ociosidad) {
              swal({
                title: "¿Estás seguro?",
                text: "¿Estás seguro de Eliminar este Motivo de Ociosidad?",
                type: "warning",
                showCancelButton: true,
                cancelButtonText: "Cancelar",
                cancelButtonColor: '#d33',
                closeOnConfirm: false,
                confirmButtonText: "Eliminar",
                confirmButtonColor: "#808080"
              }, function () {
                $.ajax({
                  type: "POST",
                  url: "/deleteRelMotivo",
                  data: {
                     _token: $('meta[name="csrf-token"]').attr('content'),
                      id:id_rel_industria_motivo_ociosidad
                  },
                  success: function (data) {

                    if (data.status == 200) {

                      swal("Eliminado!", "Datos eliminados con éxito!", "success");
                      cargar_tabla_motivo_ociosidad();

                    } else {

                      swal("Oops", "Usted no tiene Acceso para Eliminar Motivo de Ociosidad Asignados, no tienes Privilegios para este Proceso!", "error");

                    }
                  }
                })
              });
}

















/////////////////////////////////// FUNCIONES ASIGNACION DE PERSONAL OCUPADO //////////////////////////////////////

// FUNCION PARA AGREGA ID ACTIVIDAD EN PERSONAL OCUPADO
function AddIdPersonalModal(id_industria, nombre_de_fantasia, anio) {
              // aqui asigno cada valor a los campos correspondientes
              $("#savepersonal #industria_personal").val(id_industria);
  $("#savepersonal #nombre_de_fantasia").text(nombre_de_fantasia);
  $("#savepersonal #anio_personal").val(anio);
}


// FUNCION PARA MOSTRAR PERSONAL OCUPADO EN VENTANA MODAL
function VerPersonal(id) {

              $('#muestradetallepersonalmodal').html('<center><i class="fa fa-spin fa-spinner"></i> Cargando información, por favor espere....</center>');

   $.ajax({
    type: "POST",
    url: "/getRelPersonal",
    data: {
       _token: $('meta[name="csrf-token"]').attr('content'),
       id:id
    },
    success: function (response) {

           $('#muestradetallepersonalmodal').empty();

          var sexo= response[0].sexo =="M" ? "Masculino" : "Femenino"

          $('#muestradetallepersonalmodal').append(


           '<table class="table-responsive" border="0" align="center">'+
             ' <tbody><tr>'+
                '<td><strong>Rol de Trabajador:</strong> '+response[0].rol_trabajador+'</td>'+
             ' </tr>'+
             ' <tr>'+
                '<td><strong>Condicion Laboral:</strong> '+response[0].condicion_laboral+'</td>'+
              '</tr>'+
               ' <tr>'+
                '<td><strong>Sexo:</strong> '+sexo+'</td>'+
              '</tr>'+
               ' <tr>'+
                '<td><strong>Cantidad de Trabajadores:</strong> '+response[0].numero_de_trabajadores+'</td>'+
              '</tr>'+
             ' <tr>'+
               ' <td><strong>Año:</strong> '+response[0].anio+'</td>'+
             ' </tr>'+
            '</tbody></table>'

            ).fadeIn("slow");


              




             

    }
  });

}

// FUNCION PARA ACTUALIZAR PERSONAL OCUPADO
function UpdatePersonal(id) {

              // aqui asigno cada valor a los campos correspondientes
             

  $('#detallespersonal').html('<center><i class="fa fa-spin fa-spinner"></i> Cargando información, por favor espere....</center>');

  $.ajax({
    type: "POST",
    url: "/getRelPersonal",
    data: {
       _token: $('meta[name="csrf-token"]').attr('content'),
       id:id
    },
    success: function (response) {

              $("#updatepersonal #id_rel_industria_personal_update").val(response[0].id_rel_industria_trabajadores);
             
              $("#updatepersonal #rol_trabajador").text(response[0].rol_trabajador);
              //$("#updatepersonal #anio_personal_update").val(anio);
              

              $("#p_o_update").find("tr").remove();


              var sexo= response[0].sexo == "M" ? "masculino" : "femenino"



            $('#thead_p_o_update').append(

                '<tr role="row">'+
                    '<th>Condición Laboral <span class="symbol required"></span></th>'+
                    '<th>'+sexo+'<span class="symbol required"></span></th>'+  
                '</tr>'

            )
            
       
            $(response).each(function (i, v) {
            
                $('#p_o_update').append(

                    '<tr role="row" class="odd">'+
                        '<td><input type="hidden" name="id_condicion_laboral[]" value="'+v.id_condicion_laboral+'" />'+v.condicion_laboral+'</label></td>'+

                        '<td class="text-center"><input type="number" min="0" value="'+v.numero_de_trabajadores+'" class="form-control" name="'+sexo+'[]"  placeholder="Ingrese Cantidad '+sexo+'" autocomplete="off" style="width:100%;height:40px;background:#f0f9fc;border-radius:5px 5px 5px 5px;"></td>'+
                    '</tr>'



                );
            })      

    }
  });
}

/////FUNCION PARA ELIMINAR PERSONAL OCUPADO
function EliminarPersonal(industria, rol_trabajador, anio, seccion, tipo) {
              swal({
                title: "¿Estás seguro?",
                text: "¿Estás seguro de Eliminar este Personal Ocupado?",
                type: "warning",
                showCancelButton: true,
                cancelButtonText: "Cancelar",
                cancelButtonColor: '#d33',
                closeOnConfirm: false,
                confirmButtonText: "Eliminar",
                confirmButtonColor: "#808080"
              }, function () {
                $.ajax({
                  type: "GET",
                  url: "eliminar.php",
                  data: "industria=" + industria + "&rol_trabajador=" + rol_trabajador + "&anio=" + anio + "&tipo=" + tipo,
                  success: function (data) {

                    if (data == 1) {

                      swal("Eliminado!", "Datos eliminados con éxito!", "success");
                      $('#secciones').load("formularios.php?BuscaFormularioProcedimiento=si&seccion=" + seccion + "&in=" + industria);

                    } else {

                      swal("Oops", "Usted no tiene Acceso para Eliminar Efluente, no tienes Privilegios para este Proceso!", "error");

                    }
                  }
                })
              });
}















/////////////////////////////////// FUNCIONES ASIGNACION DE VENTAS //////////////////////////////////////

// FUNCION PARA ASIGNAR CONTADOR EN MODAL PROVINCIAS
function AsignaContadorProvincia(contador, num) {
              // aqui asigno cada valor a los campos correspondientes
              $("#contador").val(contador);
  $("#num").val(num);
}

// FUNCION PARA ASIGNAR CONTADOR EN MODAL PAISES
function AsignaContadorPais(contador2, num2) {
              // aqui asigno cada valor a los campos correspondientes
              $("#contador2").val(contador2);
  $("#num2").val(num2);
}

// FUNCION PARA AGREGA ID ACTIVIDAD EN VENTA
function AddIdVentaModal(id_industria, nombre_de_fantasia, anio) {
              // aqui asigno cada valor a los campos correspondientes
              $("#saveventa #industria_venta").val(id_industria);
  $("#saveventa #nombre_de_fantasia").text(nombre_de_fantasia);
  $("#saveventa #anio_venta").val(anio);
}

// FUNCION PARA LIMIAR ID DE RADIO
function Limpiar(i) {

              $("#provincia2_" + i).html('');
  $("#pais2_" + i).html('');
}

// FUNCION PARA MOSTRAR VENTA ASIGNADA EN VENTANA MODAL
function VerVenta(id_destino_ventas) {

            $.ajax({
    type: "POST",
    url: "/getVenta",
    data: {
       _token: $('meta[name="csrf-token"]').attr('content'),
      id:id_destino_ventas
    },
    success: function (response) {

      var val =[]; 
      var val_p=[]
      $(response.destino_pais).each(function (i, v) { // indice, valor

          val[i]=""+ v.id_pais+""
        
      })

       $(response.destino_provincia).each(function (i, v) { // indice, valor

          val_p[i]=""+ v.id_provincia+""
        
      })

       $("#btn-venta-update").hide();
      $("#btn-venta").hide();
      $("#btn-cancelar-venta").hide();
       $("#btn-cerrar-venta").show();


        //$("#saveventa").prop('id', 'updateventa'); btn-cerrar-venta
        //$("#updateventa").prop('name', 'updateventa');


         $("#clasif_venta").val(response.id_clasificacion_ventas)
         $("#updateventa #id_destino_ventas").val(response.id_destino_ventas);

         $("#clasif_venta").prop('disabled',true)

      
    $('#ventas_provincias').prop('disabled',true)
         $('#ventas_paises').prop('disabled',true)
        $('#ventas_provincias').val(val_p);
        $('#ventas_provincias').select2();
        $('#ventas_provincias').trigger('change');

        $('#ventas_paises').val(val);
        $('#ventas_paises').select2();
        $('#ventas_paises').trigger('change');



    }
  });   
}

// FUNCION PARA ACTUALIZAR VENTA ASIGNADA
function UpdateVenta(id_destino_ventas) {

              // aqui asigno cada valor a los campos correspondientes
  //
  //$("#updateventa #industria_venta_update").val(id_industria);
  //$("#updateventa #nombre_de_fantasia").text(nombre_de_fantasia);
  //$("#updateventa #clasificacion_venta").text(clasificacion_venta);
  //$("#updateventa #anio_venta_update").val(anio);

  $('#detalles_venta').html('<center><i class="fa fa-spin fa-spinner"></i> Cargando información, por favor espere....</center>');

  //var dataString = 'BuscaDetallesVentaUpdate=si&id_destino_ventas=' + id_destino_ventas;

  $.ajax({
    type: "POST",
    url: "/getVenta",
    data: {
       _token: $('meta[name="csrf-token"]').attr('content'),
      id:id_destino_ventas
    },
    success: function (response) {

      var val =[]; 
      var val_p=[]
      $(response.destino_pais).each(function (i, v) { // indice, valor

          val[i]=""+ v.id_pais+""
        
      })

       $(response.destino_provincia).each(function (i, v) { // indice, valor

          val_p[i]=""+ v.id_provincia+""
        
      })

       $("#btn-venta-update").show();
        $("#btn-venta").hide();

        $("#saveventa").prop('id', 'updateventa');
        $("#updateventa").prop('name', 'updateventa');


         $("#clasif_venta").val(response.id_clasificacion_ventas)
         $("#updateventa #id_destino_ventas").val(response.id_destino_ventas);

      
    
        $('#ventas_provincias').val(val_p);
        $('#ventas_provincias').select2();
        $('#ventas_provincias').trigger('change');

        $('#ventas_paises').val(val);
        $('#ventas_paises').select2();
        $('#ventas_paises').trigger('change');

    }
  });
}


// FUNCION PARA ASIGNAR OTRAS PROVINCIA PARA ACTUALIZAR
function AgregarProvinciaUpdate() {

              $('#provincia2').html('<center><i class="fa fa-spin fa-spinner"></i> Procesando información, por favor espere....</center>');

  var check = $("#check3").val();
  var dataString = $("#provinciasupdate").serialize();
  var url = 'funciones.php?MuestraProvinciasUpdate=si';

  $.ajax({
              type: "GET",
    url: url,
    data: dataString,
    success: function (response) {
              $('#pais2').html("");
      $('#provincia2').empty();
      $('#provincia2').append('' + response + '').fadeIn("slow");
    }
  });
}

// FUNCION PARA ASIGNAR OTROS PAISES PARA ACTUALIZAR
function AgregarPaisUpdate() {

              $('#pais2').html('<center><i class="fa fa-spin fa-spinner"></i> Procesando información, por favor espere....</center>');

  var check = $("#check4").val();
  var dataString = $("#paisesupdate").serialize();
  var url = 'funciones.php?MuestraPaisesUpdate=si';

  $.ajax({
              type: "GET",
    url: url,
    data: dataString,
    success: function (response) {
              $('#provincia2').html("");
      $('#pais2').empty();
      $('#pais2').append('' + response + '').fadeIn("slow");
    }
  });
}

/////FUNCION PARA ELIMINAR VENTAS ASIGNADO
function EliminarVenta(id_destino_ventas, id_industria, seccion, tipo) {
              swal({
                title: "¿Estás seguro?",
                text: "¿Estás seguro de Eliminar esta Venta de la Industria?",
                type: "warning",
                showCancelButton: true,
                cancelButtonText: "Cancelar",
                cancelButtonColor: '#d33',
                closeOnConfirm: false,
                confirmButtonText: "Eliminar",
                confirmButtonColor: "#808080"
              }, function () {
                $.ajax({
                  type: "GET",
                  url: "eliminar.php",
                  data: "id_destino_ventas=" + id_destino_ventas + "&tipo=" + tipo,
                  success: function (data) {

                    if (data == 1) {

                      swal("Eliminado!", "Datos eliminados con éxito!", "success");
                      $('#secciones').load("formularios.php?BuscaFormularioProcedimiento=si&seccion=" + seccion + "&in=" + id_industria);

                    } else {

                      swal("Oops", "Usted no tiene Acceso para Eliminar Ventas, no tienes Privilegios para este Proceso!", "error");

                    }
                  }
                })
              });
}
















/////////////////////////////////// FUNCIONES ASIGNACION DE FACTURACION //////////////////////////////////////

// FUNCION PARA AGREGA ID ACTIVIDAD EN FACTURACION
function AddIdFacturacionModal(id_industria, nombre_de_fantasia, anio) {
              // aqui asigno cada valor a los campos correspondientes
              $("#savefacturacion #industria_facturacion").val(id_industria);
  $("#savefacturacion #nombre_de_fantasia").text(nombre_de_fantasia);
  $("#savefacturacion #anio_facturacion").val(anio);
}

// FUNCION PARA SUMAR PORCENTAJE EN FACTURACION
function SumaPorcentaje() {

              interno = $("#porcentaje_prevision_mercado_interno").val();
  externo = $("#porcentaje_prevision_mercado_externo").val();
  suma = parseFloat(interno) + parseFloat(externo);

  if (suma > 100) {

              swal("Oops", "LA SUMATORIA DE AMBOS PORCENTAJE NO PUEDE SOBREPASAR EL 100%, VERIFIQUE NUEVAMENTE POR FAVOR!", "error");
    $("#porcentaje_prevision_mercado_interno").focus();
    $("#porcentaje_prevision_mercado_interno").val("");
    $("#porcentaje_prevision_mercado_externo").val("");
    return false;

  }
}


// FUNCION PARA MOSTRAR FACTURACION ASIGNADO EN VENTANA MODAL
function VerFacturacion(id_facturacion) {

              $('#muestradetallefacturacionmodal').html('<center><i class="fa fa-spin fa-spinner"></i> Cargando información, por favor espere....</center>');

  var dataString = 'BuscaDetalleFacturacionModal=si&id_facturacion=' + id_facturacion;

  $.ajax({
              type: "GET",
    url: "funciones.php",
    data: dataString,
    success: function (response) {
              $('#muestradetallefacturacionmodal').empty();
      $('#muestradetallefacturacionmodal').append('' + response + '').fadeIn("slow");

    }
  });
}

// FUNCION PARA VERIFICAR CATEGORIA DE INGRESO
function VerificaIngreso(id_facturacion) {

              $('#muestraingresos').html('<center><i class="fa fa-spin fa-spinner"></i> Cargando información, por favor espere....</center>');

  var dataString = 'VerificaCategoriaIngreso=si&id_facturacion=' + id_facturacion;

  $.ajax({
              type: "GET",
    url: "funciones.php",
    data: dataString,
    success: function (response) {
              $('#muestraingresos').empty();
      $('#muestraingresos').append('' + response + '').fadeIn("slow");

    }
  });
}

// FUNCION PARA ACTUALIZAR FACTURACION ASIGNADO
function UpdateFacturacion(id_facturacion) {
              // aqui asigno cada valor a los campos correspondientes
  /**/

  $.ajax({
    type: "POST",
    url: "/getFac",
    data: {
       _token: $('meta[name="csrf-token"]').attr('content'),
      id:id_facturacion
    },
    success: function (response) {

      $("#savefacturacion").prop('id', 'updatefacturacion');
      $("#updatefacturacion").prop('name', 'updatefacturacion');

      $("#btn-facturacion").hide()
      $("#btn-facturacion-update").show()

      $("#updatefacturacion #id_facturacion").val(response[0].id_facturacion);
      //$("#savefacturacion #industria_facturacion").val(id_industria);
      //$("#savefacturacion #nombre_de_fantasia").text(nombre_de_fantasia);
      $("#updatefacturacion #prevision_ingresos_anio_corriente").val(response[0].prevision_ingresos_anio_corriente);
      $("#updatefacturacion #prevision_ingresos_anio_corriente_dolares").val(response[0].prevision_ingresos_anio_corriente_dolares);
      $("#updatefacturacion #porcentaje_prevision_mercado_interno").val(response[0].porcentaje_prevision_mercado_interno);
      $("#updatefacturacion #porcentaje_prevision_mercado_externo").val(response[0].porcentaje_prevision_mercado_externo);
      $("#updatefacturacion #anio_facturacion").val(response[0].anio);
      $("#updatefacturacion #categoria_ingresos_"+response[0].id_categoria_ingresos+"").prop('checked',true);
    
              

    }
  });





}

/////FUNCION PARA ELIMINAR FACTURACION ASIGNADO
function EliminarFacturacion(id_facturacion) {
              swal({
                title: "¿Estás seguro?",
                text: "¿Estás seguro de Eliminar esta Facturación de la Industria?",
                type: "warning",
                showCancelButton: true,
                cancelButtonText: "Cancelar",
                cancelButtonColor: '#d33',
                closeOnConfirm: false,
                confirmButtonText: "Eliminar",
                confirmButtonColor: "#808080"
              }, function () {
                $.ajax({
                  type: "POST",
                  url: "/deleteFac",
                  data: {
                     _token: $('meta[name="csrf-token"]').attr('content'),
                    id:id_facturacion
                  },
                success: function (data) {

                    if (data.status == 200) {

                      swal("Eliminado!", "Datos eliminados con éxito!", "success");
                      //$('#secciones').load("formularios.php?BuscaFormularioProcedimiento=si&seccion=" + seccion + "&in=" + id_industria);
                      cargar_tabla_fact();
                    } else {

                      swal("Oops", "Usted no tiene Acceso para Eliminar Facturaciones, no tienes Privilegios para este Proceso!", "error");

                    }
                  }
                })
              });
}
















/////////////////////////////////// FUNCIONES ASIGNACION DE EFLUENTES //////////////////////////////////////

// FUNCION PARA AGREGA ID ACTIVIDAD EN EFLUENTES
function AddIdEfluenteModal(id_industria, nombre_de_fantasia, anio) {
              // aqui asigno cada valor a los campos correspondientes
              
}


// FUNCION PARA MOSTRAR EFLUENTES ASIGNADO EN VENTANA MODAL
function VerEfluente(id_rel_industria_efluente) {

              $('#muestradetalleefluentemodal').html('<center><i class="fa fa-spin fa-spinner"></i> Cargando información, por favor espere....</center>');

  var dataString = 'BuscaDetalleEfluenteModal=si&id_rel_industria_efluente=' + id_rel_industria_efluente;

  $.ajax({
              type: "GET",
    url: "funciones.php",
    data: dataString,
    success: function (response) {
              $('#muestradetalleefluentemodal').empty();
      $('#muestradetalleefluentemodal').append('' + response + '').fadeIn("slow");

    }
  });
}

// FUNCION PARA ACTUALIZAR EFLUENTES ASIGNADO
function UpdateEfluente(id_rel_industria_efluente) {

  $.ajax({
          type: "POST",
          url: "/getEfluente",
          data: {
             _token: $('meta[name="csrf-token"]').attr('content'),
            id:id_rel_industria_efluente
          },
        success: function (data) {

        

            $("#saveefluente").prop('id', 'updateefluente');
            $("#updateefluente").prop('name', 'updateefluente');

            $("#btn-efluente").hide()
            $("#btn-efluente-update").show()

            // aqui asigno cada valor a los campos correspondientes
            $("#updateefluente #id_rel_industria_efluente").val(data[0].id_rel_industria_efluente);
           
            $("#updateefluente #id_efluente_e").val(data[0].id_efluente);
            $("#updateefluente #search_efluente_e").val(data[0].efluente);
            $("#updateefluente #tratamiento_residuo").val(data[0].tratamiento);
            $("#updateefluente #destino").val(data[0].destino);

           
          }
        })
  
 
}

/////FUNCION PARA ELIMINAR EFLUENTES ASIGNADO
function EliminarEfluente(id_rel_industria_efluente) {
              swal({
                title: "¿Estás seguro?",
                text: "¿Estás seguro de Eliminar este Efluente de la Industria?",
                type: "warning",
                showCancelButton: true,
                cancelButtonText: "Cancelar",
                cancelButtonColor: '#d33',
                closeOnConfirm: false,
                confirmButtonText: "Eliminar",
                confirmButtonColor: "#808080"
              }, function () {
                $.ajax({
                  type: "POST",
                  url: "/deleteRelEfluente",
                  data:{
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    id:id_rel_industria_efluente
                  },
                  success: function (data) {

                    if (data.status== 200) {

                      swal("Eliminado!", "Datos eliminados con éxito!", "success");
                      cargar_tabla_efluentes()

                    } else {

                      swal("Oops", "Usted no tiene Acceso para Eliminar Efluente, no tienes Privilegios para este Proceso!", "error");

                    }
                  }
                })
              });
}
















/////////////////////////////////// FUNCIONES ASIGNACION DE CERTIFICADO //////////////////////////////////////

// FUNCION PARA AGREGA ID ACTIVIDAD EN CERTIFICADO
function AddIdCertificadoModal(id_industria, nombre_de_fantasia, actividad_contribuyente, anio) {
              // aqui asigno cada valor a los campos correspondientes
              $("#savecertificado #industria_certificado").val(id_industria);
  $("#savecertificado #nombre_de_fantasia").text(nombre_de_fantasia);
  $("#savecertificado #fecha_contribuyente_certificado").val(actividad_contribuyente);
  $("#savecertificado #anio_certificado").val(anio);
}

// FUNCION PARA VERIFICAR RADIO PARA REGISTRAR
function ProcesarCertificado(estado_certificado, i) {

  var check=0; 


  
  if (estado_certificado === 'POSEE' || estado_certificado === true) {

              //deshabilitamos
    $("#inicio_certificado_" + i).attr('disabled', false);
    $("#fin_certificado_" + i).attr('disabled', false);

  } else {

              // habilitamos
              $("#inicio_certificado_" + i).attr('disabled', true);
    $("#fin_certificado_" + i).attr('disabled', true);
  }

}


//ACTIVA INPUT CERTIFICADO Y FECHA DE CERTIFICADO
function ActivaRadioCertificado(estado_certificado) {

  if (estado_certificado === "POSEE" || estado_certificado === true) {

              $("#inicio_certificado").attr('disabled', false);
    $("#fin_certificado").attr('disabled', false);

  } else {

              // habilitamos
              $("#inicio_certificado").attr('disabled', true);
    $("#fin_certificado").attr('disabled', true);

  }
}

// FUNCION PARA VERIFICAR RADIO PARA ACTUALIZAR
function ProcesarCertificadoUpdate(estado_certificado) {

  if (estado_certificado === 'POSEE' || estado_certificado === true) {

              //deshabilitamos
              $("#inicio_certificado").attr('disabled', false);
    $("#fin_certificado").attr('disabled', false);

  } else {

              // habilitamos
              $("#inicio_certificado").attr('disabled', true);
    $("#fin_certificado").attr('disabled', true);
  }

}

// FUNCION PARA MOSTRAR CERTIFICADO ASIGNADO EN VENTANA MODAL
function VerCertificado(id_rel_industria_certificado) {

              $('#muestradetallecertificadomodal').html('<center><i class="fa fa-spin fa-spinner"></i> Cargando información, por favor espere....</center>');

  var dataString = 'BuscaDetalleCertificadoModal=si&id_rel_industria_certificado=' + id_rel_industria_certificado;

  $.ajax({
              type: "GET",
    url: "funciones.php",
    data: dataString,
    success: function (response) {
              $('#muestradetallecertificadomodal').empty();
      $('#muestradetallecertificadomodal').append('' + response + '').fadeIn("slow");

    }
  });
}

// FUNCION PARA ACTUALIZAR CERTIFICADO ASIGNADO
function UpdateCertificado(id_rel_industria_certificado) {



      $.ajax({
          type: "POST",
          url: "/getRelcert",
          data:{
            _token: $('meta[name="csrf-token"]').attr('content'),
            id:id_rel_industria_certificado
          },
          success: function (data) {

              console.log(data[0].certificado)
               // aqui asigno cada valor a los campos correspondientes
            $("#updatecertificado #id_rel_industria_certificado").val(data[0].id_rel_industria_certificado);
              //$("#updatecertificado #industria_certificado_update").val(data[0].id_industria);
              //$("#updatecertificado #nombre_de_fantasia").text(nombre_de_fantasia);
              $("#updatecertificado #nombre_certificado").text(data[0].certificado);
            $("#updatecertificado #estado_certificado").val(data[0].estado);
            $("#updatecertificado #inicio_certificado").val(data[0].fecha_inicio);
            $("#updatecertificado #fin_certificado").val(data[0].fecha_fin);
             // $("#updatecertificado #fecha_contribuyente_certificado_update").val(data[0].actividad_contribuyente);
            //$("#updatecertificado #anio_certificado_update").val(data[0].anio);
           
          }
        })

             
}

/////FUNCION PARA ELIMINAR CERTIFICADO ASIGNADO
function EliminarCertificado(id_rel_industria_certificado) {
              swal({
                title: "¿Estás seguro?",
                text: "¿Estás seguro de Eliminar este Certificado de la Industria?",
                type: "warning",
                showCancelButton: true,
                cancelButtonText: "Cancelar",
                cancelButtonColor: '#d33',
                closeOnConfirm: false,
                confirmButtonText: "Eliminar",
                confirmButtonColor: "#808080"
              }, function () {
                $.ajax({
                  type: "POST",
                  url: "/deleteRelCert",
                  data:{
                      _token: $('meta[name="csrf-token"]').attr('content'),
                      id:id_rel_industria_certificado
                  },
                  success: function (data) {

                    if (data.status == 200) {

                      swal("Eliminado!", "Datos eliminados con éxito!", "success");
                      cargar_tabla_cert();

                    } else {

                      swal("Oops", "Usted no tiene Acceso para Eliminar Certificado, no tienes Privilegios para este Proceso!", "error");

                    }
                  }
                })
              });
}




















/////////////////////////////////// FUNCIONES ASIGNACION DE SISTEMA DE CALIDAD //////////////////////////////////////

// FUNCION PARA AGREGA ID ACTIVIDAD EN SISTEMA DE CALIDAD
function AddIdSistemaModal(id_industria, nombre_de_fantasia, anio) {
              // aqui asigno cada valor a los campos correspondientes
              $("#savesistema #industria_sistema").val(id_industria);
  $("#savesistema #nombre_de_fantasia").text(nombre_de_fantasia);
  $("#savesistema #anio_sistema").val(anio);
}

// FUNCION PARA VERIFICAR RADIO PARA REGISTRAR
function ProcesarSistema(estado_sistema, i) {

  if (estado_sistema === 'POSEE' || estado_sistema === true) {

              //deshabilitamos
              $("#inicio_sistema_" + i).attr('disabled', false);
    $("#fin_sistema_" + i).attr('disabled', false);

  } else {

              // habilitamos
              $("#inicio_sistema_" + i).attr('disabled', true);
    $("#fin_sistema_" + i).attr('disabled', true);
  }

}


//ACTIVA INPUT EN FECHA EN SISTEMA
function ActivaRadioSistema(estado_sistema) {

  if (estado_sistema === "POSEE" || estado_sistema === true) {

              $("#inicio_sistema").attr('disabled', false);
    $("#fin_sistema").attr('disabled', false);

  } else {

              // habilitamos
              $("#inicio_sistema").attr('disabled', true);
    $("#fin_sistema").attr('disabled', true);

  }
}

// FUNCION PARA VERIFICAR RADIO PARA ACTUALIZAR
function ProcesarSistemaUpdate(estado_sistema) {

  if (estado_sistema === 'POSEE' || estado_sistema === true) {

              //deshabilitamos
              $("#inicio_sistema").attr('disabled', false);
    $("#fin_sistema").attr('disabled', false);

  } else {

              // habilitamos
              $("#inicio_sistema").attr('disabled', true);
    $("#fin_sistema").attr('disabled', true);
  }
}


// FUNCION PARA MOSTRAR SISTEMA DE CALIDAD ASIGNADO EN VENTANA MODAL
function VerSistema(id_rel_industria_sistema) {

              $('#muestradetallesistemamodal').html('<center><i class="fa fa-spin fa-spinner"></i> Cargando información, por favor espere....</center>');

  var dataString = 'BuscaDetalleSistemaModal=si&id_rel_industria_sistema=' + id_rel_industria_sistema;

  $.ajax({
              type: "GET",
    url: "funciones.php",
    data: dataString,
    success: function (response) {
              $('#muestradetallesistemamodal').empty();
      $('#muestradetallesistemamodal').append('' + response + '').fadeIn("slow");

    }
  });
}

// FUNCION PARA ACTUALIZAR SISTEMA DE CALIDAD ASIGNADO
function UpdateSistema(id_rel_industria_sistema) {


   $.ajax({
          type: "POST",
          url: "/getRelSc",
          data:{
            _token: $('meta[name="csrf-token"]').attr('content'),
            id:id_rel_industria_sistema
          },
          success: function (data) {

              // aqui asigno cada valor a los campos correspondientes
              $("#updatesistema #id_rel_industria_sistema").val(data[0].id_rel_industria_sistema);
              //$("#updatesistema #industria_sistema_update").val(id_industria);
              //$("#updatesistema #nombre_de_fantasia").text(nombre_de_fantasia);
              $("#updatesistema #nombre_sistema").text(data[0].sistema_de_calidad);
              $("#updatesistema #estado_sistema").val(data[0].estado);
              $("#updatesistema #inicio_sistema").val(data[0].fecha_inicio);
              $("#updatesistema #fin_sistema").val(data[0].fecha_fin);
              //$("#updatesistema #anio_sistema_update").val(anio);

              if(data[0].estado == "POSEE"){
                $("#updatesistema #inicio_sistema").prop("disabled",false)
                $("#updatesistema #fin_sistema").prop("disabled",false)
              }else{
                $("#updatesistema #inicio_sistema").prop("disabled",true)
                $("#updatesistema #fin_sistema").prop("disabled",true)

              }
             
             
           
          }
        })


              
}

/////FUNCION PARA ELIMINAR SISTEMA DE CALIDAD ASIGNADO
function EliminarSistema(id_rel_industria_sistema) {
              swal({
                title: "¿Estás seguro?",
                text: "¿Estás seguro de Eliminar esta Norma de Calidad de la Industria?",
                type: "warning",
                showCancelButton: true,
                cancelButtonText: "Cancelar",
                cancelButtonColor: '#d33',
                closeOnConfirm: false,
                confirmButtonText: "Eliminar",
                confirmButtonColor: "#808080"
              }, function () {
                $.ajax({
                  type: "post",
                  url: "/deleteRelSc",
                  data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    id:id_rel_industria_sistema
                  },
                  success: function (data) {

                    if (data.status == 200) {

                      swal("Eliminado!", "Datos eliminados con éxito!", "success");
                      cargar_tabla_sc() 

                    } else {

                      swal("Oops", "Usted no tiene Acceso para Eliminar Norma de Calidad, no tienes Privilegios para este Proceso!", "error");

                    }
                  }
                })
              });
}


















/////////////////////////////////// FUNCIONES ASIGNACION DE PROMOCIONES //////////////////////////////////////

// FUNCION PARA AGREGA ID ACTIVIDAD EN PROMOCIONES
function AddIdPromocionModal(id_industria, nombre_de_fantasia, anio) {
              // aqui asigno cada valor a los campos correspondientes
              $("#savepromocion #industria_promocion").val(id_industria);
  $("#savepromocion #nombre_de_fantasia").text(nombre_de_fantasia);
  $("#savepromocion #anio_promocion").val(anio);
}

// FUNCION PARA VERIFICAR RADIO PARA REGISTRAR
function ProcesarPromocion(estado_promocion, i) {

  if (estado_promocion === 'POSEE' || estado_promocion === true) {

              //deshabilitamos
              $("#inicio_promocion_" + i).attr('disabled', false);
    $("#fin_promocion_" + i).attr('disabled', false);

  } else {

              // habilitamos
              $("#inicio_promocion_" + i).attr('disabled', true);
    $("#fin_promocion_" + i).attr('disabled', true);
  }

}


//ACTIVA INPUT EN FECHA DE PROMOCION
function ActivaRadioPromocion(estado_promocion) {

  if (estado_promocion === "POSEE" || estado_promocion === true) {

              $("#inicio_promocion").attr('disabled', false);
    $("#fin_promocion").attr('disabled', false);

  } else {

              // habilitamos
              $("#inicio_promocion").attr('disabled', true);
    $("#fin_promocion").attr('disabled', true);

  }
}

// FUNCION PARA VERIFICAR RADIO PARA ACTUALIZAR
function ProcesarPromocionUpdate(estado_promocion) {

  if (estado_promocion === 'POSEE' || estado_promocion === true) {

              //deshabilitamos
              $("#inicio_promocion").attr('disabled', false);
    $("#fin_promocion").attr('disabled', false);

  } else {

              // habilitamos
              $("#inicio_promocion").attr('disabled', true);
    $("#fin_promocion").attr('disabled', true);
  }
}

// FUNCION PARA MOSTRAR PROMOCIONES ASIGNADO EN VENTANA MODAL
function VerPromocion(id_rel_industria_promocion_industrial) {

              $('#muestradetallepromocionmodal').html('<center><i class="fa fa-spin fa-spinner"></i> Cargando información, por favor espere....</center>');

  var dataString = 'BuscaDetallePromocionModal=si&id_rel_industria_promocion_industrial=' + id_rel_industria_promocion_industrial;

  $.ajax({
              type: "GET",
    url: "funciones.php",
    data: dataString,
    success: function (response) {
              $('#muestradetallepromocionmodal').empty();
      $('#muestradetallepromocionmodal').append('' + response + '').fadeIn("slow");

    }
  });
}

// FUNCION PARA ACTUALIZAR PROMOCIONES ASIGNADO


// FUNCION PARA ACTUALIZAR CERTIFICADO ASIGNADO
function UpdatePromocion(id_rel_industria_promocion_industrial) {

   $.ajax({
          type: "POST",
          url: "/getRelPromo",
          data:{
            _token: $('meta[name="csrf-token"]').attr('content'),
            id:id_rel_industria_promocion_industrial
          },
          success: function (data) {


     // aqui asigno cada valor a los campos correspondientes
              $("#updatepromocion #id_rel_industria_promocion_industrial").val(data[0].id_rel_industria_promocion_industrial);
              //$("#updatepromocion #industria_promocion_update").val(id_industria);
              //$("#updatepromocion #nombre_de_fantasia").text(nombre_de_fantasia);
              $("#updatepromocion #nombre_promocion").text(data[0].promocion_industrial);
              $("#updatepromocion #estado_promocion").val(data[0].estado);
              $("#updatepromocion #inicio_promocion").val(data[0].fecha_inicio);
              $("#updatepromocion #fin_promocion").val(data[0].fecha_fin);
              //$("#updatepromocion #anio_promocion_update").val(anio);

            

              if(data[0].estado == "POSEE"){
                $("#updatepromocion #inicio_promocion").prop("disabled",false)
                $("#updatepromocion #fin_promocion").prop("disabled",false)
              }else{
                $("#updatepromocion #inicio_promocion").prop("disabled",true)
                $("#updatepromocion #fin_promocion").prop("disabled",true)

              }
             
             
           
          }
        })


             
}


/////FUNCION PARA ELIMINAR PROMOCIONES ASIGNADO
function EliminarPromocion(id_rel_industria_promocion_industrial) {
              swal({
                title: "¿Estás seguro?",
                text: "¿Estás seguro de Eliminar esta Promoción Industrial?",
                type: "warning",
                showCancelButton: true,
                cancelButtonText: "Cancelar",
                cancelButtonColor: '#d33',
                closeOnConfirm: false,
                confirmButtonText: "Eliminar",
                confirmButtonColor: "#808080"
              }, function () {
                $.ajax({
                  type: "post",
                  url: "/deleteRelPromo",
                  data:{
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    id:id_rel_industria_promocion_industrial
                  },
                  success: function (data) {

                    if (data.status == 200) {

                      swal("Eliminado!", "Datos eliminados con éxito!", "success");
                     cargar_tabla_promo()

                    } else {

                      swal("Oops", "Usted no tiene Acceso para Eliminar Promociones Industriales, no tienes Privilegios para este Proceso!", "error");

                    }
                  }
                })
              });
}

















/////////////////////////////////// FUNCIONES ASIGNACION DE ECONOMIA DEL CONOCIMIENTO //////////////////////////////////////

// FUNCION PARA AGREGA ID ACTIVIDAD EN ECONOMIA DEL CONOCIMIENTO
function AddIdEconomiaModal(id_industria, nombre_de_fantasia, anio) {
              // aqui asigno cada valor a los campos correspondientes
              $("#saveeconomia #industria_economia").val(id_industria);
  $("#saveeconomia #nombre_de_fantasia").text(nombre_de_fantasia);
  $("#saveeconomia #anio_economia").val(anio);
}


// FUNCION PARA MOSTRAR ECONOMIA DEL CONOCIMIENTO ASIGNADO EN VENTANA MODAL
function VerEconomia(id_economia) {

              $('#muestradetalleeconomiamodal').html('<center><i class="fa fa-spin fa-spinner"></i> Cargando información, por favor espere....</center>');

  var dataString = 'BuscaDetalleEconomiaModal=si&id_economia=' + id_economia;

  $.ajax({
              type: "GET",
    url: "funciones.php",
    data: dataString,
    success: function (response) {
              $('#muestradetalleeconomiamodal').empty();
      $('#muestradetalleeconomiamodal').append('' + response + '').fadeIn("slow");

    }
  });
}


// FUNCION PARA VERIFICAR TIPOS DE SECTORES
function VerificaEconomia(id_economia) {

              $('#muestraeconomia').html('<center><i class="fa fa-spin fa-spinner"></i> Cargando información, por favor espere....</center>');

  var dataString = 'ProcesaEconomia=si&id_economia=' + id_economia;

  $.ajax({
              type: "GET",
    url: "funciones.php",
    data: dataString,
    success: function (response) {
              $('#muestraeconomia').empty();
      $('#muestraeconomia').append('' + response + '').fadeIn("slow");
    }
  });
}

// FUNCION PARA ACTIVA OTRO SECTOR
function ActivaSector(sector) {

  //var valor = $("input[type='checkbox']:checked:enabled").val();
  //var valor = $('input:checkbox[name=sectores]:checked:enabled').val();
  //var valor = $(".sectores:checked:enabled").val();

  if (sector === "7" || sector === true) {

              // deshabilitamos
              $("#otro_sector").attr('disabled', false);

  } else {

              // habilitamos
              $("#otro_sector").attr('disabled', true);

  }
}


// FUNCION PARA ACTIVA OTRO PERSONAL
function ActivaPersonal(personal) {

  if (personal === "11" || personal === true) {

              // habilitamos
              $("#otro_personal").attr('disabled', false);

  } else {

              // deshabilitamos
              $("#otro_personal").attr('disabled', true);

  }
}


// FUNCION PARA ACTUALIZAR ECONOMIA DEL CONOCIMIENTO ASIGNADO
function UpdateEconomia(id_economia, id_industria, nombre_de_fantasia, anio, proceso) {
              // aqui asigno cada valor a los campos correspondientes
              $("#saveeconomia #id_economia").val(id_economia);
  $("#saveeconomia #industria_economia").val(id_industria);
  $("#saveeconomia #nombre_de_fantasia").text(nombre_de_fantasia);
  $("#saveeconomia #anio_economia").val(anio);
  $("#saveeconomia #economia").val(proceso);
}

/////FUNCION PARA ELIMINAR ECONOMIA DEL CONOCIMIENTO ASIGNADO
function EliminarEconomia(id_economia) {
              swal({
                title: "¿Estás seguro?",
                text: "¿Estás seguro de Eliminar esta Economia de Conocimiento?",
                type: "warning",
                showCancelButton: true,
                cancelButtonText: "Cancelar",
                cancelButtonColor: '#d33',
                closeOnConfirm: false,
                confirmButtonText: "Eliminar",
                confirmButtonColor: "#808080"
              }, function () {
                $.ajax({
                  type: "post",
                  url: "/deleteRelEconomia",
                  data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    id:id_economia
                  },
                  success: function (data) {

                    if (data.status == 200) {

                      swal("Eliminado!", "Datos eliminados con éxito!", "success");
                     cargar_tabla_economia();

                    } else {

                      swal("Oops", "Usted no tiene Acceso para Eliminar Economia de Conocimiento, no tienes Privilegios para este Proceso!", "error");

                    }
                  }
                })
              });
}



function EliminarPerfil(id_perfil) {
              swal({
                title: "¿Estás seguro?",
                text: "¿Estás seguro de Eliminar este Perfil de Conocimiento?",
                type: "warning",
                showCancelButton: true,
                cancelButtonText: "Cancelar",
                cancelButtonColor: '#d33',
                closeOnConfirm: false,
                confirmButtonText: "Eliminar",
                confirmButtonColor: "#808080"
              }, function () {
                $.ajax({
                  type: "post",
                  url: "/deleteRelPerfil",
                  data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    id:id_perfil
                  },
                  success: function (data) {

                    if (data.status == 200) {

                      swal("Eliminado!", "Datos eliminados con éxito!", "success");
                     cargar_tabla_perfil();

                    } else {

                      swal("Oops", "Usted no tiene Acceso para Eliminar Economia de Conocimiento, no tienes Privilegios para este Proceso!", "error");

                    }
                  }
                })
              });
}
