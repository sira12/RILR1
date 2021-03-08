// FUNCION AUTOCOMPLETE 
$(function() {  
    var animales = ["Ardilla roja", "Gato", "Gorila occidental",  
      "Leon", "Oso pardo", "Perro", "Tigre de Bengala"];  
      
    $("#prueba").autocomplete({  
      source: animales  
    });  
});

$(function() {
    $("#search_codigo").autocomplete({
    source: "class/busqueda_autocompleto.php?Busqueda_Codigo_Actividad=si",
       minLength: 1,
       select: function(event, ui) { 
      $('#id_actividad').val(ui.item.id_actividad);
      $('#search_codigo').val(ui.item.nomenclatura_ib);
      $('#search_descripcion').val(ui.item.descripcion);
      $('#detalle_actividad').val(ui.item.nomenclatura_ib +' - '+ ui.item.descripcion);
      }  
  });
});

$(function() {
    $("#search_descripcion").autocomplete({
    source: "class/busqueda_autocompleto.php?Busqueda_Descripcion_Actividad=si",
       minLength: 1,
       select: function(event, ui) { 
      $('#id_actividad').val(ui.item.id_actividad);
      $('#search_codigo').val(ui.item.nomenclatura_ib);
      $('#search_descripcion').val(ui.item.descripcion);
      $('#detalle_actividad').val(ui.item.nomenclatura_ib +' - '+ ui.item.descripcion);
      }  
  });
});

$(function() {
    $("#search_producto").autocomplete({
    source: "class/busqueda_autocompleto.php?Busqueda_Producto=si",
      minLength: 1,
        select: function(event, ui) { 
        $('#id_producto').val(ui.item.id_producto);
      }  
  });
});

$(function() {
    $("#search_materia").autocomplete({
    source: "class/busqueda_autocompleto.php?Busqueda_Materia=si",
       minLength: 1,
       select: function(event, ui) { 
      $('#id_materia_prima').val(ui.item.id_materia_prima);
    }  
  });
});

$(function() {
    $("#search_insumo").autocomplete({
    source: "class/busqueda_autocompleto.php?Busqueda_Insumo=si",
      minLength: 1,
        select: function(event, ui) { 
        $('#id_insumo').val(ui.item.id_insumo);
      }  
  });
});


$(function() {
    $("#search_servicio").autocomplete({
    source: "class/busqueda_autocompleto.php?Busqueda_Servicio=si",
    minLength: 1,
    select: function(event, ui) { 
      $('#id_servicio').val(ui.item.id_servicio);
    }  
  });
});


$(function() {
    $("#search_motivo").autocomplete({
    source: "class/busqueda_autocompleto.php?Busqueda_Motivo=si",
      minLength: 1,
      select: function(event, ui) { 
      $('#id_motivo_ociosidad').val(ui.item.id_motivo_ociosidad);
      }  
  });
});

$(function() {
  $("#search_efluente").autocomplete({
    source: "class/busqueda_autocompleto.php?Busqueda_Efluente=si",
    minLength: 1,
      select: function(event, ui) { 
      $('#id_efluente').val(ui.item.id_efluente);
        }  
    });
 });

$(function() {
    $("#search_sistema").autocomplete({
    source: "class/busqueda_autocompleto.php?Busqueda_Sistema=si",
    minLength: 1,
    select: function(event, ui) { 
    $('#id_sistema_de_calidad').val(ui.item.id_sistema_de_calidad);
    }  
  });
});

$(function() {
    $("#search_promocion").autocomplete({
    source: "class/busqueda_autocompleto.php?Busqueda_Promocion=si",
    minLength: 1,
    select: function(event, ui) { 
    $('#id_promocion_industrial').val(ui.item.id_promocion_industrial);
    }  
  });
});




/*#################### DATOS DE REGISTRO INICIAL ####################*/
$(function() {
    $("#search_provincia").autocomplete({
    source: "class/busqueda_autocompleto.php?Busqueda_Provincia=si",
      minLength: 1,
      select: function(event, ui) { 
      $('#id_provincia').val(ui.item.id_provincia);
      }  
  });
});

$(function() {
    $("#search_localidad").autocomplete({
    source: "class/busqueda_autocompleto.php?Busqueda_Localidad_Provincia=si",
      minLength: 1,
      select: function(event, ui) { 
      $('#id_localidad').val(ui.item.id_localidad);
      }  
  });
});

$(function() {
    $("#search_barrio").autocomplete({
    source: "class/busqueda_autocompleto.php?Busqueda_Barrio=si",
      minLength: 1,
      select: function(event, ui) { 
      $('#id_barrio').val(ui.item.id_barrio);
      }  
  });
});

$(function() {
    $("#search_calle").autocomplete({
    source: "class/busqueda_autocompleto.php?Busqueda_Calle=si",
      minLength: 1,
      select: function(event, ui) { 
      $('#id_calle').val(ui.item.id_calle);
      }  
  });
});
/*#################### DATOS DE REGISTRO INICIAL ####################*/







/*#################### DATOS DE PLANTA ####################*/
$(function() {
    $("#search_localidad_planta").autocomplete({
    source: "class/busqueda_autocompleto.php?Busqueda_Localidad=si",
      minLength: 1,
      select: function(event, ui) { 
      $('#id_localidad_planta').val(ui.item.id_localidad);
      }  
  });
});

$(function() {
    $("#search_barrio_planta").autocomplete({
    source: "class/busqueda_autocompleto.php?Busqueda_Barrio=si",
      minLength: 1,
      select: function(event, ui) { 
      $('#id_barrio_planta').val(ui.item.id_barrio);
      }  
  });
});

$(function() {
    $("#search_calle_planta").autocomplete({
    source: "class/busqueda_autocompleto.php?Busqueda_Calle=si",
      minLength: 1,
      select: function(event, ui) { 
      $('#id_calle_planta').val(ui.item.id_calle);
      }  
  });
});
/*#################### DATOS DE PLANTA ####################*/


/*#################### DATOS DE ADMINISTRACION ####################*/
$(function() {
    $("#search_provincia_administracion").autocomplete({
    source: "class/busqueda_autocompleto.php?Busqueda_Provincia=si",
      minLength: 1,
      select: function(event, ui) { 
      $('#id_provincia_administracion').val(ui.item.id_provincia);
    }  
  });
});

$(function() {
    $("#search_localidad_administracion").autocomplete({
    source: "class/busqueda_autocompleto.php?Busqueda_Localidad=si",
      minLength: 1,
      select: function(event, ui) { 
      $('#id_localidad_administracion').val(ui.item.id_localidad);
      }  
  });
});

$(function() {
    $("#search_barrio_administracion").autocomplete({
    source: "class/busqueda_autocompleto.php?Busqueda_Barrio=si",
      minLength: 1,
      select: function(event, ui) { 
      $('#id_barrio_administracion').val(ui.item.id_barrio);
      }  
  });
});

$(function() {
    $("#search_calle_administracion").autocomplete({
    source: "class/busqueda_autocompleto.php?Busqueda_Calle=si",
      minLength: 1,
      select: function(event, ui) { 
      $('#id_calle_administracion').val(ui.item.id_calle);
      }  
  });
});
/*#################### DATOS DE ADMINISTRACION ####################*/







/*#################### DATOS DE MATERIA PRIMA ####################*/
$(function() {
  $("#search_pais_materia").autocomplete({
    source: "class/busqueda_autocompleto.php?Busqueda_Pais=si",
    minLength: 1,
      select: function(event, ui) { 
      $('#id_pais_materia').val(ui.item.id_pais);
      }  
    });
 });

$(function() {
    $("#search_provincia_materia").autocomplete({
    source: "class/busqueda_autocompleto.php?Busqueda_Provincia=si",
      minLength: 1,
      select: function(event, ui) { 
     $('#id_provincia_materia').val(ui.item.id_provincia);
    }  
  });
});

$(function() {
    $("#search_localidad_materia").autocomplete({
    source: "class/busqueda_autocompleto.php?Busqueda_Localidad=si",
      minLength: 1,
      select: function(event, ui) { 
      $('#id_localidad_materia').val(ui.item.id_localidad);
      (ui.item.id_localidad == "134" ? $("#motivo_importacion_materia").attr('disabled', true) : $("#motivo_importacion_materia").attr('disabled', false));  
      }  
    });
 });
/*#################### DATOS DE MATERIA PRIMA ####################*/








/*#################### DATOS DE INSUMOS ####################*/
$(function() {
  $("#search_pais_insumo").autocomplete({
    source: "class/busqueda_autocompleto.php?Busqueda_Pais=si",
    minLength: 1,
      select: function(event, ui) { 
      $('#id_pais_insumo').val(ui.item.id_pais);
      }  
    });
 });

$(function() {
    $("#search_provincia_insumo").autocomplete({
    source: "class/busqueda_autocompleto.php?Busqueda_Provincia=si",
      minLength: 1,
      select: function(event, ui) { 
     $('#id_provincia_insumo').val(ui.item.id_provincia);
    }  
  });
});

$(function() {
    $("#search_localidad_insumo").autocomplete({
    source: "class/busqueda_autocompleto.php?Busqueda_Localidad=si",
      minLength: 1,
      select: function(event, ui) { 
      $('#id_localidad_insumo').val(ui.item.id_localidad);
      (ui.item.id_localidad == "134" ? $("#motivo_importacion_insumo").attr('disabled', true) : $("#motivo_importacion_insumo").attr('disabled', false));  
      }  
    });
 });
/*#################### DATOS DE INSUMOS ####################*/









/*#################### DATOS DE COMBUSTIBLE ####################*/
$(function() {
  $("#search_pais_combustible").autocomplete({
    source: "class/busqueda_autocompleto.php?Busqueda_Pais=si",
    minLength: 1,
      select: function(event, ui) { 
      $('#id_pais_combustible').val(ui.item.id_pais);
      }  
    });
 });

$(function() {
    $("#search_provincia_combustible").autocomplete({
    source: "class/busqueda_autocompleto.php?Busqueda_Provincia=si",
      minLength: 1,
      select: function(event, ui) { 
     $('#id_provincia_combustible').val(ui.item.id_provincia);
    }  
  });
});

$(function() {
    $("#search_localidad_combustible").autocomplete({
    source: "class/busqueda_autocompleto.php?Busqueda_Localidad=si",
      minLength: 1,
      select: function(event, ui) { 
      $('#id_localidad_combustible').val(ui.item.id_localidad);
      (ui.item.id_localidad == "134" ? $("#motivo_importacion_combustible").attr('disabled', true) : $("#motivo_importacion_combustible").attr('disabled', false));  
      } 
    });
 });
/*#################### DATOS DE COMBUSTIBLE ####################*/







/*#################### DATOS DE SERVICIOS ####################*/
$(function() {
  $("#search_pais_servicio").autocomplete({
    source: "class/busqueda_autocompleto.php?Busqueda_Pais=si",
    minLength: 1,
      select: function(event, ui) { 
      $('#id_pais_servicio').val(ui.item.id_pais);
      }  
    });
 });

$(function() {
    $("#search_provincia_servicio").autocomplete({
    source: "class/busqueda_autocompleto.php?Busqueda_Provincia=si",
      minLength: 1,
      select: function(event, ui) { 
     $('#id_provincia_servicio').val(ui.item.id_provincia);
    }  
  });
});

$(function() {
    $("#search_localidad_servicio").autocomplete({
    source: "class/busqueda_autocompleto.php?Busqueda_Localidad=si",
      minLength: 1,
      select: function(event, ui) { 
      $('#id_localidad_servicio').val(ui.item.id_localidad);
      (ui.item.id_localidad == "134" ? $("#motivo_importacion_otros").attr('disabled', true) : $("#motivo_importacion_otros").attr('disabled', false));  
      }  
    });
 });
/*#################### DATOS DE SERVICIOS ####################*/





//funcion autocompleto para busqueda de barrios
/*$(document).ready(function() {

  $("#search_barrio").autocomplete({
    source: function( request, response ) {
      $.ajax({
        url: "class/search_barrio.php",
        dataType: "json",
        data: {
          term:request.term,
          id:$('#id_localidad').val(),
          nombre:$('#search_localidad').val()
        },
        success: function(data) {
         
          response( $.map(data, function(item) {
            
            return {
              label: item.label,
              value: item.value
            }
            $('#id_barrio').val("2");//aqui es donde quiero asignar el valor al input

          }));
        }
      });
    }
  });

});*/