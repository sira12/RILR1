$(document).ready(function () {

   
})

function getContribuyentesTable(){


    var table = $(".tablecbtAdmin").DataTable();
    table.destroy();    
    table = $(".tablecbtAdmin").DataTable({
        processing: true,
        serverSide: true,
        searching: true,
        responsive: true,
        ajax: {
            url: "/getContribuyentesAdmin",
            type: "POST",
            data: {
                _token: $('meta[name="csrf-token"]').attr("content")
            },
        },
        columns: [
            {
                data: "DT_RowIndex",
                name: "DT_RowIndex",
            },
            {
                data: "cuit",
                name: "cuit",
            }, 
            {
                data: "razon_social",
                name: "razon_social",
            },           
            {
                data: "industrias",
                name: "industrias",
            },           
            {
                data: "dniPersona",
                name: "dniPersona",
            },           
            {
                data: "action",
                name: "action",
                orderable: true,
                searchable: true,
            },
        ],
        columnDefs: [],
    });


}


function getSolicitudes(){
    
    $("#save").fadeIn(1000, function() {
        var n = noty({
            text: "<span class='fa fa-spinner'></span> Cargando..!",
            theme: 'defaultTheme',
            layout: 'center',
            type: 'information',
            timeout: 2000,
        });
       
    });                        
    var table = $(".solicitudes_Paneladmin").DataTable();
    table.destroy();
    //$('.yajra-datatable').empty();
    
    table = $(".solicitudes_Paneladmin").DataTable({
        processing: false,
        serverSide: true,
        searching: false,
        responsive: true,
        ajax: {
            url: "/getSolicitudes",
            type: "POST",
            data: {
                _token: $('meta[name="csrf-token"]').attr("content"),
            },
        },
        columns: [
            {
                data: "DT_RowIndex",
                name: "DT_RowIndex",
            },
            {
                data: "cuit_cbt",
                name: "cuit_cbt",
            },
            {
                data: "razon_social_cbt",
                name: "razon_social_cbt",
            },
            {
                data: "documento_psna",
                name: "documento_psna",
            },
            {
                data: "nombre_psna",
                name: "nombre_psna",
            },
            {
                data: "tel_celular_psna",
                name: "tel_celular_psna",
            },
            {
                data: "fecha_de_alta_psna", //
                name: "fecha_de_alta_psna",
            },
            {
                data: "action",
                name: "action",
                orderable: true,
                searchable: true,
            },
        ],
        columnDefs: [],
    });
}

function VerCbt(id){
    
                           
    var table = $(".industrias-cbt").DataTable();
    table.destroy();    
    table = $(".industrias-cbt").DataTable({
        processing: true,
        serverSide: true,
        searching: true,
        responsive: true,
        ajax: {
            url: "/getinds",
            type: "POST",
            data: {
                _token: $('meta[name="csrf-token"]').attr("content"),
                id:id
            },
        },
        columns: [
            {
                data: "DT_RowIndex",
                name: "DT_RowIndex",
            },
            {
                data: "nombre_de_fantasia",
                name: "nombre_de_fantasia",
            }, 
            {
                data: "nombre_de_fantasia",
                name: "nombre_de_fantasia",
            },           
            {
                data: "action",
                name: "action",
                orderable: true,
                searchable: true,
            },
        ],
        columnDefs: [],
    });
}

function VerDatosInd(id){
    $.ajax({
        type: 'POST',
        url: '/ver_ind',
        async: false,
        data:{
            _token: $('meta[name="csrf-token"]').attr('content'),
            id:id
        },
        beforeSend: function() {
            $("#save").fadeOut();
            $("#btn-submit").html('<i class="fa fa-refresh"></i> Cargando..');
        },
        success: function(response) {

            $("#indName").text('Industria: '+response.industria_contribuyente[0].nombre_de_fantasia)

            //Limpiar cbt
            
           //contribuyente
           if(response.industria_contribuyente.length > 0){
            $("#cuit_dj").text(response.industria_contribuyente[0].cuit);
            $("#rs_dj").text(response.industria_contribuyente[0].razon_social);
            $("#rib_dj").text(response.industria_contribuyente[0].regimen_ib);
            $("#nib_dj").text(response.industria_contribuyente[0].numero_de_ib);
            $("#civa_dj").text(
                response.industria_contribuyente[0].condicion_iva
            );
            $("#nj_dj").text(
                response.industria_contribuyente[0].naturaleza_juridica
            );
            $("#ef_dj").text(response.industria_contribuyente[0].email_fiscal);
            $("#cp_dj").text(response.industria_contribuyente[0].CP_Legal);
            $("#fiac_dj").text(
                response.industria_contribuyente[0]
                    .Inicio_de_Actividades_Contribuyente
            );
            $("#ll_dj").text(
                response.industria_contribuyente[0].Localidad_Legal
            );
            $("#dni_dj").text(response.industria_contribuyente[0].documento);
            $("#d_dj").text(
                response.industria_contribuyente[0].persona_declarante
            );
            $("#calidad_dj").text(
                response.industria_contribuyente[0].En_calidad_de
            );
            //industria
            var casa_central =
                response.industria_contribuyente[0].es_casa_central == "S"
                    ? "SI"
                    : "NO";
            var zona_ind =
                response.industria_contribuyente[0].es_zona_industrial == "S"
                    ? "SI"
                    : "NO";
            $("#nei_dj").text(
                response.industria_contribuyente[0].nombre_de_fantasia
            );
            $("#fiae_dj").text(
                response.industria_contribuyente[0].Fecha_inicio_industria
            );
            $("#ecc_dj").text(casa_central);
            $("#ezi_dj").text(zona_ind);
            $("#ntf_dj").text(response.industria_contribuyente[0].tel_fijo);
            $("#ntc_dj").text(response.industria_contribuyente[0].tel_celular);
            $("#cee_dj").text(
                response.industria_contribuyente[0].mail_industria
            );
            $("#lp_dj").text(
                response.industria_contribuyente[0].Localidad_Industria
            );
            $("#pw_dj").text(response.industria_contribuyente[0].pagina_web);
            $("#lu_dj").text(response.industria_contribuyente[0].latitud);
            $("#lonu_dj").text(response.industria_contribuyente[0].longitud);
            $("#cpi_dj").text(response.industria_contribuyente[0].CP_Industria);
           
            }
           
            //actividades ,prod
            $("#tbody_act_prod_dj").empty();
            if(response.act_prod.length > 0){
            $(response.act_prod).each(function (i, v) {
                var p = v.es_actividad_principal == "S" ? "Si" : "No";
                //var m=v.motivo_importacion_Insumo == null ? "--" : v.motivo_importacion_Insumo
                //var d=v.Detalle_de_motivo_de_importacion_Insumo == null ? "--" : v.Detalle_de_motivo_de_importacion_Insumo
                let fecha_fin= v.fecha_fin == "" ? "--" : v.fecha_fin;
                
                $("#tbody_act_prod_dj").append(
                    "<tr>" +
                        "<td>" +
                        v.actividad +
                        "</td>" +
                        "<td>" +
                        p +
                        "</td>" +
                        "<td>" +
                        v.observacion +
                        "</td>" +
                        "<td>" +
                        v.fecha_inicio +
                        "</td>" +
                        "<td>" +
                        fecha_fin+"</td>" +
                        "<td>" +
                        v.Productos_Elaborados +
                        "</td>" +
                        "<td>" +
                        v.Cantidad_producida +
                        "</td>" +
                        "<td>" +
                        v.porcentaje_sobre_produccion +
                        "</td>" +
                        "<td>" +
                        v.ventas_en_provincia +
                        "</td>" +
                        "<td>" +
                        v.ventas_en_otras_provincias +
                        "</td>" +
                        "<td>" +
                        v.ventas_en_el_exterior +
                        "</td>" +
                        "<td>" +
                        v.anio_productos +
                        "</td>" +
                        "</tr>"
                );
            });
            }



            $("#tbody_act_mp_dj").empty()
            if(response.act_mat.length > 0){
            $(response.act_mat).each(function (i, v) {
                var p = v.es_actividad_principal == "S" ? "Si" : "No";
                var mp = v.Es_MP_propia == "S " ? "Si" : "No";
                //var d=v.Detalle_de_motivo_de_importacion_Insumo == null ? "--" : v.Detalle_de_motivo_de_importacion_Insumo
                let fecha_fin= v.fecha_fin == "" ? "--" : v.fecha_fin;
                let motivo_imp=v.motivo_importacion_MP == null ? "--" : v.motivo_importacion_MP
                $("#tbody_act_mp_dj").append(
                    "<tr>" +
                        '<td style="font-size:15px">' +
                        v.actividad +
                        "</td>" +
                        "<td>" +
                        p +
                        "</td>" +
                        "<td>" +
                        v.observacion +
                        "</td>" +
                        '<td style="font-size:15px">' +
                        v.fecha_inicio +
                        "</td>" +
                        "<td>"+fecha_fin+"</td>" +
                        "<td>" +
                        v.Materia_Prima_Utilizada +
                        "</td>" +
                        "<td>" +
                        v.Cantidad_MP_Anual_Utilizada +
                        "</td>" +
                        "<td>" +
                        mp +
                        "</td>" +
                        "<td>" +
                        v.Localidad_Origen_MP +
                        "</td>" +
                        "<td>" +
                        v.Pais_Origen_MP +
                        "</td>" +
                        "<td>" +
                        motivo_imp +
                        "</td>" +
                        "<td>" +
                        v.Detalle_de_motivo_de_importacion_MP +
                        "</td>" +
                        "<td>" +
                        v.anio_MP +
                        "</td>" +
                        "</tr>"
                );
            });
            }


            //insumos
            $("#tbody_insumos_dj").empty();
            if(response.insumos.length > 0){
            $(response.insumos).each(function (i, v) {
                var p = v.Es_insumo_propio == "P" ? "Propio" : "Adquirido";
                var m =
                    v.motivo_importacion_Insumo == null
                        ? "--"
                        : v.motivo_importacion_Insumo;
                var d =
                    v.Detalle_de_motivo_de_importacion_Insumo == null
                        ? "--"
                        : v.Detalle_de_motivo_de_importacion_Insumo;
                $("#tbody_insumos_dj").append(
                    "<tr>" +
                        "<td>" +
                        v.Insumos_utilizados +
                        "</td>" +
                        "<td>" +
                        p +
                        "</td>" +
                        "<td>" +
                        v.Localidad_Origen_Insumo +
                        "</td>" +
                        "<td>" +
                        v.Pais_Origen_Insumo +
                        "</td>" +
                        "<td>" +
                        m +
                        "</td>" +
                        "<td>" +
                        d +
                        "</td>" +
                        "<td>" +
                        v.anio_insumos +
                        "</td>" +
                        "</tr>"
                );
            });
            }



            //servicios
            $("#tbody_servicios_dj").empty()
            if(response.servicios.length > 0){
            $(response.servicios).each(function (i, v) {
                var m =
                    v.motivo_importacion_Servicio == null
                        ? "--"
                        : v.motivo_importacion_Servicio;
                var d =
                    v.Detalle_de_motivo_de_importacion_Servicio == null
                        ? "--"
                        : v.Detalle_de_motivo_de_importacion_Servicio;

                let costo= v.Costo_del_Servicio == null ? "--" : "$"+v.Costo_del_Servicio;
                $("#tbody_servicios_dj").append(
                    "<tr>" +
                        "<td>" +
                        v.Servicio +
                        "</td>" +
                        "<td>" +
                        v.cantidad_consumida +
                        "</td>" +
                        "<td>" +
                      costo +
                        "</td>" +
                        "<td>" +
                        v.frecuencia_de_contratacion_Servicio +
                        "</td>" +
                        "<td>" +
                        v.Localidad_Origen_Servicio +
                        "</td>" +
                        "<td>" +
                        v.Pais_Origen_Servicio +
                        "</td>" +
                        "<td>" +
                        m +
                        "</td>" +
                        "<td>" +
                        d +
                        "</td>" +
                        "<td>" +
                        v.anio_Servicios +
                        "</td>" +
                        "</tr>"
                );
            });
            }
            //tbody_gastos_dj
            $("#tbody_gastos_dj").empty()
            if(response.gastos.length > 0){
            $(response.gastos).each(function (i, v) {
                $("#tbody_gastos_dj").append(
                    "<tr>" +
                        "<td>" +
                        v.Concepto_de_egreso +
                        "</td>" +
                        "<td>$" +
                        v.importe +
                        "</td>" +
                        "<td>" +
                        v.anio_egresos +
                        "</td>" +
                        "</tr>"
                );
            });
            }
            //sit planta

        $("#tbody_situacion_dj").empty();
            if(response.sit.length > 0){
            $(response.sit).each(function (i, v) {
                var m = v.Establecida_en_zona_industrial == 0 ? "No" : "Si";
                //var d=v.Detalle_de_motivo_de_importacion_Servicio == null ? "--" : v.Detalle_de_motivo_de_importacion_Servicio
                $("#tbody_situacion_dj").append(
                    "<tr>" +
                        "<td>" +
                        v.produccion_sobre_capacidad +
                        "%</td>" +
                        "<td>" +
                        v.superficie_lote +
                        "</td>" +
                        "<td>" +
                        v.superficie_planta +
                        "</td>" +
                        "<td>" +
                        m +
                        "</td>" +
                        "<td>$" +
                        v.inversion_anual +
                        "</td>" +
                        "<td>$" +
                        v.inversion_activo_fijo +
                        "</td>" +
                        "<td>" +
                        v.capacidad_instalada +
                        "%</td>" +
                        "<td>" +
                        v.capacidad_ociosa +
                        "%</td>" +
                        "<td>" +
                        v.anio_situacion_De_planta +
                        "</td>" +
                        "</tr>"
                );
            });
            }
            $("#tbody_mot_o_dj").empty();
            if(response.ocios.length > 0){
            $(response.ocios).each(function (i, v) {
                $("#tbody_mot_o_dj").append(
                    "<tr>" +
                        "<td>" +
                        v.motivo_ociosidad +
                        "</td>" +
                        "<td>" +
                        v.anio_ociosidad +
                        "</td>" +
                        "</tr>"
                );
            });
        }
            //tbody_p_ocupado_dj
            $("#tbody_p_ocupado_dj").empty();
            if(response.po.length > 0){
            $(response.po).each(function (i, v) {
                var s = v.sexo == "M" ? "Masculino" : "Femenino";
                //var d=v.Detalle_de_motivo_de_importacion_Servicio == null ? "--" : v.Detalle_de_motivo_de_importacion_Servicio
                $("#tbody_p_ocupado_dj").append(
                    "<tr>" +
                        "<td>" +
                        v.rol_trabajador +
                        "</td>" +
                        "<td>" +
                        v.condicion_laboral +
                        "</td>" +
                        "<td>" +
                        s +
                        "</td>" +
                        "<td>" +
                        v.numero_de_trabajadores +
                        "</td>" +
                        "<td>" +
                        v.anio_rol_trabajadores +
                        "</td>" +
                        "</tr>"
                );
            });
            }
            //tbody_venta_nacional_dj
            $("#tbody_venta_nacional_dj").empty()
            if(response.venta_nacional.length > 0){
            $(response.venta_nacional).each(function (i, v) {
                $("#tbody_venta_nacional_dj").append(
                    "<tr>" +
                        "<td>" +
                        v.Tipo_de_Venta +
                        "</td>" +
                        "<td>" +
                        v.Provincia_Destino_ventas +
                        "</td>" +
                        "<td>" +
                        v.anio_destino_ventas +
                        "</td>" +
                        "</tr>"
                );
            });
            }
            //tbody_venta_nacional_dj
            $("#tbody_venta_inter_dj").empty()
            if(response.venta_inter.length > 0){
            $(response.venta_inter).each(function (i, v) {
                $("#tbody_venta_inter_dj").append(
                    "<tr>" +
                        "<td>" +
                        v.Tipo_de_Venta +
                        "</td>" +
                        "<td>" +
                        v.Pais_Destino_ventas +
                        "</td>" +
                        "<td>" +
                        v.anio_destino_ventas +
                        "</td>" +
                        "</tr>"
                );
            });
        }
            //facturacion
            $("#tbody_facturacion_dj").empty();
            if(response.fact.length > 0){
            $(response.fact).each(function (i, v) {
                $("#tbody_facturacion_dj").append(
                    "<tr>" +
                        "<td>" +
                        v.categoria_pyme +
                        "</td>" +
                        "<td>$" +
                        v.prevision_ingresos_anio_corriente +
                        "</td>" +
                        "<td>" +
                        v.prevision_ingresos_anio_corriente_dolares +
                        "Usd</td>" +
                        "<td>" +
                        v.porcentaje_prevision_mercado_interno +
                        "%</td>" +
                        "<td>" +
                        v.porcentaje_prevision_mercado_externo +
                        "%</td>" +
                        "<td>" +
                        v.Anio_Facturacion +
                        "</td>" +
                        "</tr>"
                );
            });
            }
            //efluente
            $("#tbody_efluentes_dj").empty();
            if(response.efluente.length > 0){
            $(response.efluente).each(function (i, v) {
                $("#tbody_efluentes_dj").append(
                    "<tr>" +
                        "<td>" +
                        v.efluente +
                        "</td>" +
                        "<td>" +
                        v.Tratamiento_del_Efluente +
                        "</td>" +
                        "<td>" +
                        v.Destino_Efluente +
                        "</td>" +
                        "<td>" +
                        v.anio_efluente +
                        "</td>" +
                        "</tr>"
                );
            });
        }
            // certificados
            $("#tbody_certificados_dj").empty()
            if(response.certificados.length > 0){
            $(response.certificados).each(function (i, v) {
                var vi =
                    v.Vigencia_Certificado == "Desde: Hasta:"
                        ? "--"
                        : v.Vigencia_Certificado;
                $("#tbody_certificados_dj").append(
                    "<tr>" +
                        "<td>" +
                        v.certificado +
                        "</td>" +
                        "<td>" +
                        v.Estado_Certificado +
                        "</td>" +
                        "<td>" +
                        vi +
                        "</td>" +
                        "<td>" +
                        v.anio_certificado +
                        "</td>" +
                        "</tr>"
                );
            });
            }   
            //  sistemas de calidad
            $("#tbody_sistemas_dj").empty()
            if(response.sistemas.length > 0){
            $(response.sistemas).each(function (i, v) {
                var vi =
                    v.Vigencia_Sistema_de_calidad == "Desde: Hasta:"
                        ? "--"
                        : v.Vigencia_Sistema_de_calidad;
                $("#tbody_sistemas_dj").append(
                    "<tr>" +
                        "<td>" +
                        v.sistema_de_calidad +
                        "</td>" +
                        "<td>" +
                        v.Estado_Sistema_de_calidad +
                        "</td>" +
                        "<td>" +
                        vi +
                        "</td>" +
                        "<td>" +
                        v.Anio_Sistema_de_calidad +
                        "</td>" +
                        "</tr>"
                );
            });
            }

            $("#tbody_promo_dj").empty()
            if(response.promo.length > 0){
            $(response.promo).each(function (i, v) {
                var vi =
                    v.Vigencia_Promocion_industrial == "Desde: Hasta:" || v.Vigencia_Promocion_industrial== null
                        ? "--"
                        : v.Vigencia_Sistema_de_calidad;
                $("#tbody_promo_dj").append(
                    "<tr>" +
                        "<td>" +
                        v.promocion_industrial +
                        "</td>" +
                        "<td>" +
                        v.Estado_Promocion_industrial +
                        "</td>" +
                        "<td>" +
                        vi +
                        "</td>" +
                        "<td>" +
                        v.Anio_Promocion_industrial +
                        "</td>" +
                        "</tr>"
                );
            });
             }   

             $("#tbody_economia_dj").empty();
             if(response.eco.length > 0){
            $(response.eco).each(function (i, v) {
                $("#tbody_economia_dj").append(
                    "<tr>" +
                        "<td>" +
                        v.sector +
                        "</td>" +
                        "<td>" +
                        v.Anio_Economia_del_conocimiento_sector +
                        "</td>" +
                        "</tr>"
                );
            });
            }
            $("#tbody_perfil_dj").empty
            if(response.perfil.length > 0){
                $(response.perfil).each(function (i, v) {
                    $("#tbody_perfil_dj").append(
                        "<tr>" +
                            "<td>" +
                            v.perfil +
                            "</td>" +
                            "<td>" +
                            v.Anio_Economia_del_conocimiento_perfil +
                            "</td>" +
                            "</tr>"
                    );
                });
            }
        }
    });
}   



// FUNCION PARA MOSTRAR SOLICITUD EN VENTANA MODAL
function VerSolicitud(cuit,rs,documento,email_fiscal,fecha,celular,nombre) {

    $('#muestrasolicitudmodal').html('<center><i class="fa fa-spin fa-spinner"></i> Cargando información, por favor espere..</center>');
    $('#muestrasolicitudmodal').empty();
    $('#muestrasolicitudmodal').append(
        '<table class="table-responsive" border="0" align="center">' +
        '<tr>' +
        '<td><strong>Cuit:</strong>' + cuit + '</td>' +
        '</tr>' +
        ' <tr>' +
        ' <td><strong>Razón Social:</strong>' + rs + '</td>' +
        ' </tr>' +
        ' <tr>' +
        ' <td><strong>DNI:</strong>' + documento + '</td>' +
        ' </tr>' +
         ' <tr>' +
        ' <td><strong>Nombre y Apellido: </strong>' + nombre + '</td>' +
        ' </tr>' +
        ' <tr>' +
        ' <td><strong>Email Fiscal:</strong>' + email_fiscal+ '</td>' +
        ' </tr>' +
        ' <tr>' +
        ' <td><strong>Fecha de Registro: </strong>' + fecha + '</td>' +
        '</tr>' +
        ' <tr>' +
        ' <td><strong>Telefono Celular: </strong>' + celular + '</td>' +
        ' </tr>' +
        '</table >').fadeIn("slow");
   
  }
  
  
  // FUNCION PARA VERIFICAR SOLICITUD
  function VerificarSolicitud(id_rel_persona_contribuyente,cuit,rs,documento,email_fiscal,fecha,celular,nombre,persona,
    id_usr,id_cbt,pdf_frente,pdf_dorso,pdf_cbt,pdf_vinc,pdf_poder) {
    // aqui asigno cada valor a los campos correspondientes
    $("#verificasolicitud #id_rel_persona_contribuyente").val(id_rel_persona_contribuyente);
    $("#verificasolicitud #persona").val(persona);
    $("#verificasolicitud #usr").val(id_usr);
    $("#verificasolicitud #contribuyente").val(id_cbt);
    // $("#verificasolicitud #empresa").val(rs);
    $("#verificasolicitud #email").val(email_fiscal);
    $("#verificasolicitud #cuit").val(cuit);
    $("#verificasolicitud #razon_social").val(rs);
    $("#verificasolicitud #documento").val(documento);
    $("#verificasolicitud #nombre").val(nombre);
    $("#verificasolicitud #tel_celular").val(celular);
    $("#verificasolicitud #email_fiscal").val(email_fiscal);


    var getUrl = window.location;
    $("#dnif").attr("href",getUrl.origin +"/storage/"+pdf_frente);
    $("#dnid").attr("href",getUrl.origin +"/storage/"+pdf_dorso);
    $("#ia").attr("href",getUrl.origin +"/storage/"+pdf_cbt);

    if(pdf_poder != "" && pdf_poder != null){
        $("#const_apod").show()
        $("#ca").attr("href",getUrl.origin +"/storage/"+pdf_poder);
    }else{
        $("#const_apod").hide()
    }

    if(pdf_vinc != "" && pdf_vinc != null){
        console.log('hola')
        $("#contr_s").show()
        $("#cse").attr("href",getUrl.origin +"/storage/"+pdf_vinc);
    }else{
        $("#contr_s").hide()
    }
   



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

  $('document').ready(function() {
    /* validation */
    $("#verificasolicitud").validate({
        rules: {
            observaciones_status: {
                required: true,
            },
            status: {
                required: true,
            },
        },
        messages: {
            observaciones_status: {
                required: "Ingrese Observaciones"
            },
            status: {
                required: "Seleccione Status"
            },
        },
        submitHandler: function(form) {
            var data = $("#verificasolicitud").serialize();
            if ($('input[type=radio]:checked').length === 0) {
                swal("Oops", "POR FAVOR DEBE DE SELECCIONAR EL ESTADO DE SOLICITUD!", "error");
                return false;
            } else {
                $.ajax({
                    type: 'POST',
                    url: '/s_aprove',
                    async: false,
                    data:{
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        data: data,
                    },
                    beforeSend: function() {
                        $("#save").fadeOut();
                        $("#btn-submit").html('<i class="fa fa-refresh"></i> Verificando...');
                    },
                    success: function(data) {
                        if (data == 1) {
                            $("#save").fadeIn(1000, function() {
                                var n = noty({
                                    text: "<span class='fa fa-warning'></span> POR FAVOR DEBE DE COMPLETAR LOS CAMPOS REQUERIDOS, VERIFIQUE NUEVAMENTE POR FAVOR...!",
                                    theme: 'defaultTheme',
                                    layout: 'center',
                                    type: 'warning',
                                    timeout: 5000,
                                });
                                $("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
                            });
                        } else if (data == 2) {
                            $("#save").fadeIn(1000, function() {
                                var n = noty({
                                    text: "<span class='fa fa-warning'></span> HA OCURRIDO UN PROBLEMA CON LA VERIFICACION, VERIFIQUE NUEVAMENTE POR FAVOR ...!",
                                    theme: 'defaultTheme',
                                    layout: 'center',
                                    type: 'warning',
                                    timeout: 5000,
                                });
                                $("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
                            });
                        } else if (data.status == 400) {
                            $("#save").fadeIn(1000, function() {
                                var n = noty({
                                    text: "<span class='fa fa-warning'></span> HA OCURRIDO UN PROBLEMA, VERIFIQUE E INTENTE NUEVAMENTE POR FAVOR..!",
                                    theme: 'defaultTheme',
                                    layout: 'center',
                                    type: 'warning',
                                    timeout: 5000,
                                });
                                $("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
                            });
                        } else if(data.status == 200) {
                            $("#save").fadeIn(1000, function() {
                                var n = noty({
                                    text: '<center> ' + data.msg + ' </center>',
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


