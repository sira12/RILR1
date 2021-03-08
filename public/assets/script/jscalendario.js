/*$(function () {
   $('input').filter('.expira').datepicker({*/
$('body').on('focus',".expira", function(){
   $(this).datepicker({
     closeText: 'Cerrar',
     prevText: '<Anterior',
     nextText: 'Siguiente>',
     currentText: 'Hoy',
     monthNamesShort: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
     monthNames: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
     dayNames: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
     dayNamesShort: ['Dom','Lun','Mar','Mie','Juv','Vie','Sab'],
     dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
     weekHeader: 'Sm',
     dateFormat: 'dd-mm-yy',
     //firstDay: 1,
     minDate: 0,
    //maxDate: 0,
    changeMonth: true,
    changeYear: true,
    yearRange: new Date().getFullYear() + ':2050'
  });
$('#ui-datepicker-div').appendTo($('.modal'));
});



$('body').on('focus',".calendariomodal", function(){
   $(this).datepicker({
    closeText: 'Cerrar',
    prevText: '<Anterior',
    nextText: 'Siguiente>',
    currentText: 'Hoy',
    monthNamesShort: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
    monthNames: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
    dayNames: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
    dayNamesShort: ['Dom','Lun','Mar','Mie','Juv','Vie','Sab'],
    dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
    weekHeader: 'Sm',
    dateFormat: 'dd-mm-yy',
    firstDay: 1,
    maxDate: 0,
    changeMonth: true,
    changeYear: true,
    yearRange: '1900:' + new Date().getFullYear()
  });
$('#ui-datepicker-div').appendTo($('#MyModalActividad'));
});


$('body').on('focus',".calendario", function(){
   $(this).datepicker({
    closeText: 'Cerrar',
    prevText: '<Anterior',
    nextText: 'Siguiente>',
    currentText: 'Hoy',
    monthNamesShort: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
    monthNames: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
    dayNames: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
    dayNamesShort: ['Dom','Lun','Mar','Mie','Juv','Vie','Sab'],
    dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
    weekHeader: 'Sm',
    dateFormat: 'dd-mm-yy',
    firstDay: 1,
    maxDate: 0,
    changeMonth: true,
    changeYear: true,
    yearRange: '1900:' + new Date().getFullYear()
  });
$('#ui-datepicker-div').appendTo($('.modal'));
});



$('body').on('focus',".actividades", function(){
   $(this).datepicker({
    closeText: 'Cerrar',
    prevText: '<Anterior',
    nextText: 'Siguiente>',
    currentText: 'Hoy',
    monthNamesShort: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
    monthNames: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
    dayNames: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
    dayNamesShort: ['Dom','Lun','Mar','Mie','Juv','Vie','Sab'],
    dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
    weekHeader: 'Sm',
    dateFormat: 'dd-mm-yy',
    firstDay: 1,
    maxDate: 0,
    changeMonth: true,
    changeYear: true,
    yearRange: '1900:' + new Date().getFullYear()
  });
});

$('body').on('focus',".calendario2", function(){
   $(this).datepicker({
     closeText: 'Cerrar',
     prevText: '<Anterior',
     nextText: 'Siguiente>',
     currentText: 'Hoy',
     monthNamesShort: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
     monthNames: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
     dayNames: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
     dayNamesShort: ['Dom','Lun','Mar','Mie','Juv','Vie','Sab'],
     dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
     weekHeader: 'Sm',
     dateFormat: 'dd-mm-yy',
     firstDay: 1,
     //maxDate: 0,
    changeMonth: true,
    changeYear: true,
    yearRange: '1900:' + ':2050'
  });
});

$('body').on('focus',".certificado", function(){
   $(this).datepicker({
     closeText: 'Cerrar',
     prevText: '<Anterior',
     nextText: 'Siguiente>',
     currentText: 'Hoy',
     monthNamesShort: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
     monthNames: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
     dayNames: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
     dayNamesShort: ['Dom','Lun','Mar','Mie','Juv','Vie','Sab'],
     dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
     weekHeader: 'Sm',
     dateFormat: 'dd-mm-yy',
     firstDay: 1,
     //maxDate: 0,
    changeMonth: true,
    changeYear: true,
    yearRange: '1900:' + ':2050'
  });
$('#ui-datepicker-div').appendTo($('#MyModalCertificado'));
});


$('body').on('focus',".calidad", function(){
   $(this).datepicker({
     closeText: 'Cerrar',
     prevText: '<Anterior',
     nextText: 'Siguiente>',
     currentText: 'Hoy',
     monthNamesShort: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
     monthNames: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
     dayNames: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
     dayNamesShort: ['Dom','Lun','Mar','Mie','Juv','Vie','Sab'],
     dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
     weekHeader: 'Sm',
     dateFormat: 'dd-mm-yy',
     firstDay: 1,
     //maxDate: 0,
    changeMonth: true,
    changeYear: true,
    yearRange: '1900:' + ':2050'
  });
$('#ui-datepicker-div').appendTo($('#MyModalSistema'));
});


$(function () {
  $.datepicker.setDefaults($.datepicker.regional["es"]);
    $("#desde").datepicker({
     closeText: 'Cerrar',
     prevText: '<Anterior',
     nextText: 'Siguiente>',
     currentText: 'Hoy',
     monthNamesShort: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
     monthNames: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
     dayNames: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
     dayNamesShort: ['Dom','Lun','Mar','Mie','Juv','Vie','Sab'],
     dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
     weekHeader: 'Sm',
     dateFormat: 'dd-mm-yy',
     firstDay: 1,
     isRTL: false,
     showMonthAfterYear: false,
     changeMonth: true,
     changeYear: true,
     yearSuffix: '',
     onClose: function (selectedDate) {
      $("#hasta").datepicker("option", "minDate", selectedDate);
    }
  });

$("#hasta").datepicker({
     closeText: 'Cerrar',
     prevText: '<Anterior',
     nextText: 'Siguiente>',
     currentText: 'Hoy',
     monthNamesShort: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
     monthNames: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
     dayNames: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
     dayNamesShort: ['Dom','Lun','Mar','Mie','Juv','Vie','Sab'],
     dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
     weekHeader: 'Sm',
     dateFormat: 'dd-mm-yy',
     firstDay: 1,
     isRTL: false,
     showMonthAfterYear: false,
     changeMonth: true,
     changeYear: true,
     yearSuffix: '',
     onClose: function (selectedDate) {
      $("#desde").datepicker("option", "maxDate", selectedDate);
    }
  });
});

$(function () {
  $.datepicker.setDefaults($.datepicker.regional["es"]);
    $(".desde").datepicker({
     closeText: 'Cerrar',
     prevText: '<Anterior',
     nextText: 'Siguiente>',
     currentText: 'Hoy',
     monthNamesShort: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
     monthNames: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
     dayNames: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
     dayNamesShort: ['Dom','Lun','Mar','Mie','Juv','Vie','Sab'],
     dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
     weekHeader: 'Sm',
     dateFormat: 'dd-mm-yy',
     firstDay: 1,
     isRTL: false,
     showMonthAfterYear: false,
     changeMonth: true,
     changeYear: true,
     yearSuffix: '',
     onClose: function (selectedDate) {
      $(".hasta").datepicker("option", "minDate", selectedDate);
    }
  });

$(".hasta").datepicker({
     closeText: 'Cerrar',
     prevText: '<Anterior',
     nextText: 'Siguiente>',
     currentText: 'Hoy',
     monthNamesShort: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
     monthNames: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
     dayNames: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
     dayNamesShort: ['Dom','Lun','Mar','Mie','Juv','Vie','Sab'],
     dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
     weekHeader: 'Sm',
     dateFormat: 'dd-mm-yy',
     firstDay: 1,
     isRTL: false,
     showMonthAfterYear: false,
     changeMonth: true,
     changeYear: true,
     yearSuffix: '',
     onClose: function (selectedDate) {
      $(".desde").datepicker("option", "maxDate", selectedDate);
    }
  });
});


$(function () {
  $.datepicker.setDefaults($.datepicker.regional["es"]);
    $("#inicio").datepicker({
     closeText: 'Cerrar',
     prevText: '<Anterior',
     nextText: 'Siguiente>',
     currentText: 'Hoy',
     monthNamesShort: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
     monthNames: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
     dayNames: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
     dayNamesShort: ['Dom','Lun','Mar','Mie','Juv','Vie','Sab'],
     dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
     weekHeader: 'Sm',
     dateFormat: 'dd-mm-yy',
     firstDay: 1,
     isRTL: false,
     showMonthAfterYear: false,
     changeMonth: true,
     changeYear: true,
     yearSuffix: '',
     onClose: function (selectedDate) {
      $("#fin").datepicker("option", "minDate", selectedDate);
    }
  });

$("#fin").datepicker({
     closeText: 'Cerrar',
     prevText: '<Anterior',
     nextText: 'Siguiente>',
     currentText: 'Hoy',
     monthNamesShort: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
     monthNames: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
     dayNames: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
     dayNamesShort: ['Dom','Lun','Mar','Mie','Juv','Vie','Sab'],
     dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
     weekHeader: 'Sm',
     dateFormat: 'dd-mm-yy',
     firstDay: 1,
     isRTL: false,
     showMonthAfterYear: false,
     changeMonth: true,
     changeYear: true,
     yearSuffix: '',
     onClose: function (selectedDate) {
      $("#inicio").datepicker("option", "maxDate", selectedDate);
    }
  });
});


/*####################### CALENDARIO PARA INICIO ACTIVIDAD CONTRIBUYENTE Y ESTABLECIMIENTO*/
$(function () {
  $.datepicker.setDefaults($.datepicker.regional["es"]);
    $("#fecha_actividad_contribuyente").datepicker({
     closeText: 'Cerrar',
     prevText: '<Anterior',
     nextText: 'Siguiente>',
     currentText: 'Hoy',
     monthNamesShort: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
     monthNames: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
     dayNames: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
     dayNamesShort: ['Dom','Lun','Mar','Mie','Juv','Vie','Sab'],
     dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
     weekHeader: 'Sm',
     dateFormat: 'dd-mm-yy',
     firstDay: 1,
     isRTL: false,
     showMonthAfterYear: false,
     changeMonth: true,
     changeYear: true,
     yearSuffix: '',
     onClose: function (selectedDate) {
      $("#fecha_actividad_industria").datepicker("option", "minDate", selectedDate);
    }
  });

$("#fecha_actividad_industria").datepicker({
     closeText: 'Cerrar',
     prevText: '<Anterior',
     nextText: 'Siguiente>',
     currentText: 'Hoy',
     monthNamesShort: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
     monthNames: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
     dayNames: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
     dayNamesShort: ['Dom','Lun','Mar','Mie','Juv','Vie','Sab'],
     dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
     weekHeader: 'Sm',
     dateFormat: 'dd-mm-yy',
     firstDay: 1,
     isRTL: false,
     showMonthAfterYear: false,
     changeMonth: true,
     changeYear: true,
     yearSuffix: '',
     onClose: function (selectedDate) {
      $("#fecha_actividad_contribuyente").datepicker("option", "maxDate", selectedDate);
    }
  });
});



//RELOJ TIMEPICKER
$('body').on('focus',".hora", function(){
  $(this).timepicker({defaultTIme: true});
});

$('body').on('focus',"#hour", function(){
  $(this).timepicker({defaultTIme: true});
});

$('body').on('focus',"#hora_desde", function(){
  $(this).timepicker({showMeridian: false});
});

$('body').on('focus',"#hora_hasta", function(){
  $(this).timepicker({showMeridian: false});
});