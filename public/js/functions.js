$(document).ready(function () {
    var id_localidad
    var id_localidad2
    var id_provincia1=9;
    var id_provincia2;
    var id_provincia_3
    var id_pais
    //zona planta
    $("#buscar_provincia").autocomplete({
        source: function (request, response) {
            // Fetch data
            $.ajax({
                url: "/provincias",
                type: 'post',
                dataType: "json",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    search: request.term,
                },
                success: function (data) {
                    response(data);
                }
            });
        },
        select: function (event, ui) {
            // Set selection
            $('#buscar_provincia').val(ui.item.label); // display the selected text
            $('#id_provincia').val(ui.item.value); // save selected id to input
            id_provincia1 = ui.item.value
            return false;
        }
    });
    $("#buscar_localidad").autocomplete({
        source: function (request, response) {
            // Fetch data
            $.ajax({
                url: "/localidades",
                type: 'post',
                dataType: "json",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    search: request.term,
                    id_prov: id_provincia1
                },
                success: function (data) {
                    response(data);
                }
            });
        },
        select: function (event, ui) {
            // Set selection
            $('#buscar_localidad').val(ui.item.label); // display the selected text
            $('#id_localidad').val(ui.item.value); // save selected id to input
            id_localidad = ui.item.value
            return false;
        }
    });
    $("#buscar_barrio").autocomplete({
        source: function (request, response) {
            // Fetch data
            $.ajax({
                url: "/barrios",
                type: 'post',
                dataType: "json",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    search: request.term,
                    id_loc: id_localidad
                },
                success: function (data) {
                    response(data);
                }
            });
        },
        select: function (event, ui) {
            // Set selection
            $('#buscar_barrio').val(ui.item.label); // display the selected text
            $('#id_barrio').val(ui.item.value); // save selected id to input
            return false;
        }
    });
    $("#buscar_calle").autocomplete({
        source: function (request, response) {
            // Fetch data
            $.ajax({
                url: "/calles",
                type: 'post',
                dataType: "json",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    search: request.term,
                    id_loc: id_localidad
                },
                success: function (data) {
                    response(data);
                }
            });
        },
        select: function (event, ui) {
            // Set selection
            $('#buscar_calle').val(ui.item.label); // display the selected text
            $('#id_calle').val(ui.item.value); // save selected id to input
            return false;
        }
    });
    $("#buscar_provincia").change(function () {
        if ($("#buscar_provincia").val().length < 1) {
            //limpiar id localidad, barrio, calle
            $('#id_localidad').val("")
            $('#id_barrio').val("")
            $('#id_calle').val("")
            $('#buscar_localidad').val("");
            $('#buscar_barrio').val("");
            $('#buscar_calle').val("");
            //deshabilitar campo calle y barrio
            $("#buscar_localidad").prop("disabled", true);
            $("#buscar_barrio").prop("disabled", true);
            $("#buscar_calle").prop("disabled", true);
        } else {
            //$("#search_barrio").prop("disabled", false);
            $("#buscar_localidad").prop("disabled", false);
        }
    });
    $("#buscar_localidad").change(function () {
        if ($("#buscar_localidad").val().length < 1) {
            //limpiar id localidad, barrio, calle
            $('#id_localidad').val("")
            $('#id_barrio').val("")
            $('#id_calle').val("")
            $('#buscar_localidad').val("");
            $('#buscar_barrio').val("");
            $('#buscar_calle').val("");
            //deshabilitar campo calle y barrio
            $("#buscar_barrio").prop("disabled", true);
            $("#buscar_calle").prop("disabled", true);
        } else {
            //$("#search_barrio").prop("disabled", false);
            $("#buscar_barrio").prop("disabled", false);
        }
    });
    $("#buscar_barrio").change(function () {
        if ($("#buscar_barrio").val().length < 1) {
            //limpiar id localidad, barrio, calle
            $('#id_barrio').val("")
            $('#id_calle').val("")
            $('#buscar_barrio').val("");
            $('#buscar_calle').val("");
            //deshabilitar campo calle
            $("#buscar_calle").prop("disabled", true);
        } else {
            //$("#search_barrio").prop("disabled", false);
            $("#buscar_calle").prop("disabled", false);
        }
    })
    $("#search_calle").change(function () {
        if ($("#search_calle").val().length < 1) {
            //limpiar id localidad, barrio, calle
            $('#id_calle').val("")
            $('#search_calle').val("");
            $("#btn-submit").prop("disabled", true);
        } else {
            //$("#search_barrio").prop("disabled", false);
            $("#search_calle").prop("disabled", false);
            $("#btn-submit").prop("disabled", false);
        }
    })
    //zona legal
    $("#buscar_provincia_legal").autocomplete({
        source: function (request, response) {
            // Fetch data
            $.ajax({
                url: "/provincias",
                type: 'post',
                dataType: "json",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    search: request.term,
                },
                success: function (data) {
                    response(data);
                }
            });
        },
        select: function (event, ui) {
            // Set selection
            $('#buscar_provincia_legal').val(ui.item.label); // display the selected text
            $('#id_provincia_legal').val(ui.item.value); // save selected id to input
            id_provincia2 = ui.item.value
            return false;
        }
    });
    $("#buscar_localidad2").autocomplete({
        source: function (request, response) {
            // Fetch data
            $.ajax({
                url: "/localidades",
                type: 'post',
                dataType: "json",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    search: request.term,
                    id_prov: id_provincia2
                },
                success: function (data) {
                    response(data);
                }
            });
        },
        select: function (event, ui) {
            // Set selection
            $('#buscar_localidad2').val(ui.item.label); // display the selected text
            $('#id_localidad_administracion').val(ui.item.value); // save selected id to input
            id_localidad2 = ui.item.value
            return false;
        }
    });
    $("#buscar_barrio2").autocomplete({
        source: function (request, response) {
            // Fetch data
            $.ajax({
                url: "/barrios",
                type: 'post',
                dataType: "json",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    search: request.term,
                    id_loc: id_localidad2
                },
                success: function (data) {
                    response(data);
                }
            });
        },
        select: function (event, ui) {
            // Set selection
            $('#buscar_barrio2').val(ui.item.label); // display the selected text
            $('#id_barrio_administracion').val(ui.item.value); // save selected id to input
            return false;
        }
    });
    $("#buscar_calle2").autocomplete({
        source: function (request, response) {
            // Fetch data
            $.ajax({
                url: "/calles",
                type: 'post',
                dataType: "json",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    search: request.term,
                    id_loc: id_localidad2
                },
                success: function (data) {
                    response(data);
                }
            });
        },
        select: function (event, ui) {
            // Set selection
            $('#buscar_calle2').val(ui.item.label); // display the selected text
            $('#id_calle_administracion').val(ui.item.value); // save selected id to input
            return false;
        }
    });
    $("#buscar_provincia_legal").change(function () {
        if ($("#buscar_provincia_legal").val().length < 1) {
            //limpiar id localidad, barrio, calle
            $('#id_localidad_administracion').val("")
            $('#id_barrio_administracion').val("")
            $('#id_calle_administracion').val("")
            $('#buscar_localidad2').val("");
            $('#buscar_barrio2').val("");
            $('#buscar_calle2').val("");
            //deshabilitar campo calle y barrio
            $("#buscar_localidad2").prop("disabled", true);
            $("#buscar_barrio2").prop("disabled", true);
            $("#buscar_calle2").prop("disabled", true);
        } else {
            //$("#search_barrio").prop("disabled", false);
            $("#buscar_localidad2").prop("disabled", false);
        }
    });
    $("#buscar_localidad2").change(function () {
        if ($("#buscar_localidad2").val().length < 1) {
            //limpiar id localidad, barrio, calle
            $('#id_localidad_administracion').val("")
            $('#id_barrio_administracion').val("")
            $('#id_calle_administracion').val("")
            $('#buscar_localidad2').val("");
            $('#buscar_barrio2').val("");
            $('#buscar_calle2').val("");
            //deshabilitar campo calle y barrio
            $("#buscar_barrio2").prop("disabled", true);
            $("#buscar_calle2").prop("disabled", true);
        } else {
            //$("#search_barrio").prop("disabled", false);
            $("#buscar_barrio2").prop("disabled", false);
        }
    });
    $("#buscar_barrio2").change(function () {
        if ($("#buscar_barrio2").val().length < 1) {
            //limpiar id localidad, barrio, calle
            $('#id_barrio_administracion').val("")
            $('#id_calle_administracion').val("")
            $('#buscar_barrio2').val("");
            $('#buscar_calle2').val("");
            //deshabilitar campo calle
            $("#buscar_calle2").prop("disabled", true);
        } else {
            //$("#search_barrio").prop("disabled", false);
            $("#buscar_calle2").prop("disabled", false);
        }
    })
    $("#buscar_calle2").change(function () {
        if ($("#buscar_calle2").val().length < 1) {
            //limpiar id localidad, barrio, calle
            $('#id_calle_administracion').val("")
            $('#buscar_calle2').val("");
            //$("#btn-submit").prop("disabled", true);
        } else {
            //$("#buscar_barrio").prop("disabled", false);
            $("#buscar_calle2").prop("disabled", false);
            //$("#btn-submit").prop("disabled", false);
        }
    })
    //buscar actividad ppor codigo//
    $("#search_codigo").autocomplete({
        source: function (request, response) {
            // Fetch data
            $.ajax({
                url: "/actividades",
                type: 'post',
                dataType: "json",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    search: request.term,
                },
                success: function (data) {
                    response(data);
                }
            });
        },
        select: function (event, ui) {
            // Set selection
            $('#id_actividad').val(ui.item.value);
            $('#search_codigo').val(ui.item.label);
            $('#search_descripcion').val(ui.item.actividad);
            $('#detalle_actividad').val(ui.item.label + ' - ' + ui.item.actividad);
            return false;
        }
    });
    $("#search_codigo").change(function () {
        if ($(this).val().length < 1) {
            $('#id_actividad').val("");
            $('#search_descripcion').val("");
            $('#detalle_actividad').val("");
        }
    }); //si seleccio0na uno y despues borra el seleccionado se resetean los inputs
    $("#search_descripcion").autocomplete({
        source: function (request, response) {
            // Fetch data
            $.ajax({
                url: "/actividades",
                type: 'post',
                dataType: "json",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    search: request.term,
                    filtro: 1
                },
                success: function (data) {
                    response(data);
                }
            });
        },
        select: function (event, ui) {
            // Set selection
            $('#id_actividad').val(ui.item.value);
            $('#search_codigo').val(ui.item.actividad);
            $('#search_descripcion').val(ui.item.label);
            $('#detalle_actividad').val(ui.item.actividad + ' - ' + ui.item.label);
            return false;
        }
    });
    $("#search_descripcion").change(function () {
        if ($(this).val().length < 1) {
            $('#id_actividad').val("");
            $('#search_codigo').val("");
            $('#detalle_actividad').val("");
        }
    }); //si seleccio0na uno y despues borra el seleccionado se resetean los inputs
    //buscar producto
    var length_search_producto
    $("#search_producto").autocomplete({
        source: function (request, response) {
            // Fetch data
            $.ajax({
                url: "/buscarProducto",
                type: 'post',
                dataType: "json",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    search: request.term,
                },
                success: function (data) {
                    response(data);
                }
            });
        },
        select: function (event, ui) {
            // Set selection
            $('#id_producto').val(ui.item.value);
            $('#search_producto').val(ui.item.label);
            length_search_producto = ui.item.label.length
            return false;
        }
    });
    $("#search_producto").keyup(function () {
        if ($(this).val().length < length_search_producto) {
            $('#id_producto').val("");
        }
    }); //si seleccio0na uno y despues borra el seleccionado se resetean los inputs
    $("#search_materia").autocomplete({
        source: function (request, response) {
            // Fetch data
            $.ajax({
                url: "/getMateriaPrima",
                type: 'post',
                dataType: "json",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    search: request.term,
                },
                success: function (data) {
                    response(data);
                }
            });
        },
        select: function (event, ui) {
            // Set selection
            $('#id_materia_prima').val(ui.item.value);
            $('#search_materia').val(ui.item.label);
            return false;
        }
    });
    $("#search_materia").change(function () {
        if ($(this).val().length < 1) {
            $('#id_materia_prima').val("");
            $('#search_materia').val("");
        }
    }); //si seleccio0na uno y despues borra el seleccionado se resetean los inputs
    $("#search_pais").autocomplete({
        source: function (request, response) {
            // Fetch data
            $.ajax({
                url: "/getpais",
                type: 'post',
                dataType: "json",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    search: request.term,
                },
                success: function (data) {
                    response(data);
                }
            });
        },
        select: function (event, ui) {
            // Set selection
            $('#search_pais').val(ui.item.label); // display the selected text
            $('#id_pais').val(ui.item.value); // save selected id to input
            id_pais = ui.item.value
            return false;
        }
    });
    $("#search_pais").change(function () {
        if ($("#search_pais").val().length < 1) {
            //limpiar id localidad, barrio, calle
            $('#id_pais').val("")
            $('#id_provincia').val("")
            $('#id_localidad').val("")
            $('#search_localidad3').val("");
            $('#search_provincia').val("");
            //deshabilitar campo calle y barrio
            $("#search_localidad3").prop("disabled", true);
            $("#search_provincia").prop("disabled", true);
        } else {
            //$("#search_barrio").prop("disabled", false);
            $("#search_provincia").prop("disabled", false);
        }
    });
    $("#search_provincia").autocomplete({
        source: function (request, response) {
            // Fetch data
            $.ajax({
                url: "/provincias",
                type: 'post',
                dataType: "json",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    search: request.term,
                    id_pais: id_pais
                },
                success: function (data) {
                    response(data);
                }
            });
        },
        select: function (event, ui) {
            // Set selection
            $('#search_provincia').val(ui.item.label); // display the selected text
            $('#id_provincia').val(ui.item.value); // save selected id to input
            id_provincia_3 = ui.item.value
            return false;
        }
    });
    $("#search_provincia").change(function () {
        if ($("#search_provincia").val().length < 1) {
            //limpiar id localidad, barrio, calle
            $('#id_localidad3').val("")
            $('#search_localidad32').val("");
            //deshabilitar campo calle y barrio
            $("#search_localidad32").prop("disabled", true);
        } else {
            //$("#search_barrio").prop("disabled", false);
            $("#search_localidad32").prop("disabled", false);
        }
    });
    $("#search_localidad32").autocomplete({
        source: function (request, response) {
            // Fetch data
            $.ajax({
                url: "/localidades",
                type: 'post',
                dataType: "json",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    search: request.term,
                    id_prov: id_provincia_3
                },
                success: function (data) {
                    response(data);
                }
            });
        },
        select: function (event, ui) {
            // Set selection
            $('#search_localidad32').val(ui.item.label); // display the selected text
            $('#id_localidad3').val(ui.item.value); // save selected id to input
            return false;
        }
    });
    //############################INSUMOS##################################################
    $("#search_insumo").autocomplete({
        source: function (request, response) {
            // Fetch data
            $.ajax({
                url: "/search_insumo",
                type: 'post',
                dataType: "json",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    search: request.term,
                },
                success: function (data) {
                    response(data);
                }
            });
        },
        select: function (event, ui) {
            // Set selection
            $('#search_insumo').val(ui.item.label); // display the selected text
            $('#id_insumo').val(ui.item.value); // save selected id to input
            return false;
        }
    });
    $("#search_insumo").keyup(function () {
        if ($("#search_insumo").val().length < 1) {
            $('#id_insumo').val("")
        }
    });
    //busqueda paises 
    $("#search_pais_insumo").autocomplete({
        source: function (request, response) {
            // Fetch data
            $.ajax({
                url: "/getpais",
                type: 'post',
                dataType: "json",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    search: request.term,
                },
                success: function (data) {
                    response(data);
                }
            });
        },
        select: function (event, ui) {
            id_pais = null
            // Set selection
            $('#search_pais_insumo').val(ui.item.label); // display the selected text
            $('#id_pais_insumo').val(ui.item.value); // save selected id to input
            id_pais = ui.item.value
            return false;
        }
    });
    $("#search_pais_insumo").change(function () {
        if ($("#search_pais_insumo").val().length < 1) {
            //limpiar id localidad, barrio, calle
            $('#id_pais_insumo').val("")
            $('#id_provincia_insumo').val("")
            $('#id_localidad_insumo').val("")
            $('#search_localidad_insumo').val("");
            $('#search_provincia_insumo').val("");
            //deshabilitar campo calle y barrio
            $("#search_localidad_insumo").prop("disabled", true);
            $("#search_provincia_insumo").prop("disabled", true);
        } else {
            //$("#search_barrio").prop("disabled", false);
            $("#search_provincia_insumo").prop("disabled", false);
        }
    });
    $("#search_provincia_insumo").autocomplete({
        source: function (request, response) {
            // Fetch data
            $.ajax({
                url: "/provincias",
                type: 'post',
                dataType: "json",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    search: request.term,
                    id_pais: id_pais
                },
                success: function (data) {
                    response(data);
                }
            });
        },
        select: function (event, ui) {
            id_provincia_3 = null
            // Set selection
            $('#search_provincia_insumo').val(ui.item.label); // display the selected text
            $('#id_provincia_insumo').val(ui.item.value); // save selected id to input
            id_provincia_3 = ui.item.value
            return false;
        }
    });
    $("#search_provincia_insumo").change(function () {
        if ($("#search_provincia_insumo").val().length < 1) {
            //limpiar id localidad, barrio, calle
            $('#id_localidad_insumo').val("")
            $('#search_localidad_insumo').val("");
            //deshabilitar campo calle y barrio
            $("#search_localidad_insumo").prop("disabled", true);
        } else {
            //$("#search_barrio").prop("disabled", false);
            $("#search_localidad_insumo").prop("disabled", false);
        }
    });
    $("#search_localidad_insumo").autocomplete({
        source: function (request, response) {
            // Fetch data
            $.ajax({
                url: "/localidades",
                type: 'post',
                dataType: "json",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    search: request.term,
                    id_prov: id_provincia_3
                },
                success: function (data) {
                    response(data);
                }
            });
        },
        select: function (event, ui) {
            // Set selection
            $('#search_localidad_insumo').val(ui.item.label); // display the selected text
            $('#id_localidad_insumo').val(ui.item.value); // save selected id to input
            return false;
        }
    });
    //#########################combustible$#####################
    $("#search_pais_combustible").autocomplete({
        source: function (request, response) {
            // Fetch data
            $.ajax({
                url: "/getpais",
                type: 'post',
                dataType: "json",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    search: request.term,
                },
                success: function (data) {
                    response(data);
                }
            });
        },
        select: function (event, ui) {
            id_pais = null
            // Set selection
            $('#search_pais_combustible').val(ui.item.label); // display the selected text
            $('#id_pais_combustible').val(ui.item.value); // save selected id to input
            id_pais = ui.item.value
            return false;
        }
    });
    $("#search_pais_combustible").keyup(function () {
        if ($("#search_pais_combustible").val().length < 1) {
            //limpiar id localidad, barrio, calle
            $('#id_pais_combustible').val("")
            $('#id_provincia_combustible').val("")
            $('#id_localidad_combustible').val("")
            $('#search_localidad_combustible').val("");
            $('#search_provincia_combustible').val("");
            //deshabilitar campo calle y barrio
            $("#search_localidad_combustible").prop("disabled", true);
            $("#search_provincia_combustible").prop("disabled", true);
        } else {
            //$("#search_barrio").prop("disabled", false);
            $("#search_provincia_combustible").prop("disabled", false);
        }
    });
    $("#search_provincia_combustible").autocomplete({
        source: function (request, response) {
            // Fetch data
            $.ajax({
                url: "/provincias",
                type: 'post',
                dataType: "json",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    search: request.term,
                    id_pais: id_pais
                },
                success: function (data) {
                    response(data);
                }
            });
        },
        select: function (event, ui) {
            id_provincia_3 = null
            // Set selection
            $('#search_provincia_combustible').val(ui.item.label); // display the selected text
            $('#id_provincia_combustible').val(ui.item.value); // save selected id to input
            id_provincia_3 = ui.item.value
            return false;
        }
    });
    $("#search_provincia_combustible").keyup(function () {
        if ($("#search_provincia_combustible").val().length < 1) {
            //limpiar id localidad, barrio, calle
            $('#id_localidad_combustible').val("")
            $('#search_localidad_combustible').val("");
            //deshabilitar campo calle y barrio
            $("#search_localidad_combustible").prop("disabled", true);
        } else {
            //$("#search_barrio").prop("disabled", false);
            $("#search_localidad_combustible").prop("disabled", false);
        }
    });
    $("#search_localidad_combustible").autocomplete({
        source: function (request, response) {
            // Fetch data
            $.ajax({
                url: "/localidades",
                type: 'post',
                dataType: "json",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    search: request.term,
                    id_prov: id_provincia_3
                },
                success: function (data) {
                    response(data);
                }
            });
        },
        select: function (event, ui) {
            // Set selection
            $('#search_localidad_combustible').val(ui.item.label); // display the selected text
            $('#id_localidad_combustible').val(ui.item.value); // save selected id to input
            return false;
        }
    });
    // otros
    $("#search_servicio_otros").autocomplete({
        source: function (request, response) {
            // Fetch data
            $.ajax({
                url: "/search_servicio_otros",
                type: 'post',
                dataType: "json",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    search: request.term,
                },
                success: function (data) {
                    response(data);
                }
            });
        },
        select: function (event, ui) {
            // Set selection
            $('#search_servicio_otros').val(ui.item.label); // display the selected text
            $('#id_servicio_otros').val(ui.item.value); // save selected id to input
            return false;
        }
    });
    $("#search_servicio_otros").keyup(function () {
        if ($("#search_servicio_otros").val().length < 1) {
            $('#id_servicio_otros').val("")
        }
    });
    $("#search_pais_otros").autocomplete({
        source: function (request, response) {
            // Fetch data
            $.ajax({
                url: "/getpais",
                type: 'post',
                dataType: "json",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    search: request.term,
                },
                success: function (data) {
                    response(data);
                }
            });
        },
        select: function (event, ui) {
            id_pais = null
            // Set selection
            $('#search_pais_otros').val(ui.item.label); // display the selected text
            $('#id_pais_otros').val(ui.item.value); // save selected id to input
            id_pais = ui.item.value
            return false;
        }
    });
    $("#search_pais_otros").keyup(function () {
        if ($("#search_pais_otros").val().length < 1) {
            //limpiar id localidad, barrio, calle
            $('#id_pais_otros').val("")
            $('#id_provincia_otros').val("")
            $('#id_localidad_otros').val("")
            $('#search_localidad_otros').val("");
            $('#search_provincia_otros').val("");
            //deshabilitar campo calle y barrio
            $("#search_localidad_otros").prop("disabled", true);
            $("#search_provincia_otros").prop("disabled", true);
        } else {
            //$("#search_barrio").prop("disabled", false);
            $("#search_provincia_otros").prop("disabled", false);
        }
    });
    $("#search_provincia_otros").autocomplete({
        source: function (request, response) {
            // Fetch data
            $.ajax({
                url: "/provincias",
                type: 'post',
                dataType: "json",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    search: request.term,
                    id_pais: id_pais
                },
                success: function (data) {
                    response(data);
                }
            });
        },
        select: function (event, ui) {
            id_provincia_3 = null
            // Set selection
            $('#search_provincia_otros').val(ui.item.label); // display the selected text
            $('#id_provincia_otros').val(ui.item.value); // save selected id to input
            id_provincia_3 = ui.item.value
            return false;
        }
    });
    $("#search_provincia_otros").keyup(function () {
        if ($("#search_provincia_otros").val().length < 1) {
            //limpiar id localidad, barrio, calle
            $('#id_localidad_otros').val("")
            $('#search_localidad_otros').val("");
            //deshabilitar campo calle y barrio
            $("#search_localidad_otros").prop("disabled", true);
        } else {
            //$("#search_barrio").prop("disabled", false);
            $("#search_localidad_otros").prop("disabled", false);
        }
    });
    $("#search_localidad_otros").autocomplete({
        source: function (request, response) {
            // Fetch data
            $.ajax({
                url: "/localidades",
                type: 'post',
                dataType: "json",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    search: request.term,
                    id_prov: id_provincia_3
                },
                success: function (data) {
                    response(data);
                }
            });
        },
        select: function (event, ui) {
            // Set selection
            $('#search_localidad_otros').val(ui.item.label); // display the selected text
            $('#id_localidad_otros').val(ui.item.value); // save selected id to input
            return false;
        }
    });
    //efluentes
    $("#search_efluente_e").autocomplete({
        source: function (request, response) {
            // Fetch data
            $.ajax({
                url: "/search_efluente_e",
                type: 'post',
                dataType: "json",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    search: request.term,
                },
                success: function (data) {
                    response(data);
                }
            });
        },
        select: function (event, ui) {
            // Set selection
            $('#search_efluente_e').val(ui.item.label); // display the selected text
            $('#id_efluente_e').val(ui.item.value); // save selected id to input
            return false;
        }
    });
    $("#search_efluente_e").keyup(function () {
        if ($("#search_efluente_e").val().length < 1) {
            $('#id_efluente_e').val("")
        }
    });
});

function cargar_tabla_efluentes() {
    var table = $('.table_efluente').DataTable();
    table.destroy();
    //$('.yajra-datatable').empty();
    var id_industria = $("#id_industria_modal").val();
    var periodo_fiscal = $("#anio_periodo_fiscal").val();
    table = $('.table_efluente').DataTable({
        processing: false,
        serverSide: true,
        searching: false,
        "ajax": {
            "url": "/listRelEfluentes",
            "type": "POST",
            "data": {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id_industria: id_industria,
                p_f: periodo_fiscal
            },
        },
        columns: [{
            data: 'DT_RowIndex',
            name: 'DT_RowIndex'
        }, {
            data: 'efluente',
            name: 'efluente'
        }, {
            data: 'tratamiento',
            name: 'tratamiento'
        }, {
            data: 'destino',
            name: 'destino'
        }, {
            data: 'anio',
            name: 'anio'
        }, {
            data: 'action',
            name: 'action',
            orderable: true,
            searchable: true
        },],
    })
}

function cargar_tabla_actividades() {
    console.log("periodo ", $("#anio_periodo_fiscal").val())
    var table = $('.yajra-datatable').DataTable();
    table.destroy();
    //$('.yajra-datatable').empty();
    var id_industria = $("#id_industria_modal").val();
    table = $('.yajra-datatable').DataTable({
        processing: false,
        serverSide: true,
        searching: false,
        responsive: true,
        width: '100%',
        "ajax": {
            "url": "/listRelAct",
            "type": "POST",
            "data": {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id_industria: id_industria,
                periodo: $("#anio_periodo_fiscal").val()
            },
        },
        columns: [{
            data: 'DT_RowIndex',
            name: 'DT_RowIndex'
        }, {
            data: 'fecha_inicio',
            name: 'fecha_inicio'
        }, {
            data: 'es_actividad_principal',
            name: 'es_actividad_principal'
        }, {
            data: 'nomenclatura',
            name: 'nomenclatura'
        }, {
            data: 'nombre_actividad',
            name: 'nombre_actividad'
        }, {
            data: 'action',
            name: 'action',
            orderable: true,
            searchable: true
        },],
        columnDefs: [{
            targets: 2,
            "data": "es_actividad_principal",
            "render": function (data, type, row, meta) {
                /* DEFINICION DE LAS VARIABLES: 
                 * data: es el origen de dato... lo que segun el columns obtiene.
                 * type: display (no se para que es).
                 * row: todo el object con los valores de toda la fila
                 * meta: el id de fila y columna en DT más las settings de DT */
                var caracter = "";
                if (row.es_actividad_principal == "N") {
                    caracter = "No"
                } else {
                    caracter = "Si"
                }
                return caracter;
            }
        }, {
            targets: 1,
            "data": "fecha_inicio",
            "render": function (data, type, row, meta) {
                return row.fecha_inicio.replace(/^(\d{4})-(\d{2})-(\d{2})$/g, '$3-$2-$1');
            }
        },]
    })
}

function cargar_tabla_otros() {
    var table = $('.yajra-table-otros').DataTable();
    var periodo_fiscal = $("#anio_periodo_fiscal").val();
    table.destroy();
    //$('.yajra-datatable').empty();
    var id_industria = $("#id_industria_modal").val();
    table = $('.yajra-table-otros').DataTable({
        processing: false,
        serverSide: true,
        searching: false,
        "ajax": {
            "url": "/listRelotros",
            "type": "POST",
            "data": {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id_industria: id_industria,
                p_f: periodo_fiscal
            },
        },
        columns: [{
            data: 'DT_RowIndex',
            name: 'DT_RowIndex'
        }, {
            data: 'servicio_utilizado',
            name: 'servicio_utilizado'
        }, {
            data: 'frecuencia',
            name: 'frecuencia'
        }, {
            data: 'costo',
            name: 'costo'
        }, {
            data: 'anio',
            name: 'anio'
        }, {
            data: 'action',
            name: 'action',
            orderable: true,
            searchable: true
        },],
        columnDefs: []
    })
}

function cargar_tabla_basicos() {
    var table = $('.yajra-table-basicos').DataTable();
    var periodo_fiscal = $("#anio_periodo_fiscal").val();
    table.destroy();
    //$('.yajra-datatable').empty();
    var id_industria = $("#id_industria_modal").val();
    table = $('.yajra-table-basicos').DataTable({
        processing: false,
        serverSide: true,
        searching: false,
        "ajax": {
            "url": "/listRelbasico",
            "type": "POST",
            "data": {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id_industria: id_industria,
                p_f: periodo_fiscal
            },
        },
        columns: [{
            data: 'DT_RowIndex',
            name: 'DT_RowIndex'
        }, {
            data: 'servicio_utilizado',
            name: 'servicio_utilizado'
        }, {
            data: 'frecuencia',
            name: 'frecuencia'
        }, {
            data: 'cantidad_consumida',
            name: 'cantidad_consumida'
        }, {
            data: 'anio',
            name: 'anio'
        }, {
            data: 'action',
            name: 'action',
            orderable: true,
            searchable: true
        },],
        columnDefs: [{
            targets: 1,
            "data": "servicio_utilizado",
            "render": function (data, type, row, meta) {
                /* DEFINICION DE LAS VARIABLES: 
                 * data: es el origen de dato... lo que segun el columns obtiene.
                 * type: display (no se para que es).
                 * row: todo el object con los valores de toda la fila
                 * meta: el id de fila y columna en DT más las settings de DT */
                $("#boton_servicio_basico").prop("disabled", true);
                return row.servicio_utilizado;
            }
        },]
    })
}

function cargar_tabla_insumos() {
    $('.yajra-table-insumos').DataTable().destroy();
    var id_industria = $("#id_industria_modal").val();
    var periodo_fiscal = $("#anio_periodo_fiscal").val();
    $('.yajra-table-insumos').DataTable({
        processing: false,
        serverSide: true,
        searching: false,
        "ajax": {
            "url": "/listInsumos",
            "type": "POST",
            "data": {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id_industria: id_industria,
                p_f: periodo_fiscal
            },
        },
        columns: [{
            data: 'DT_RowIndex',
            name: 'DT_RowIndex'
        }, {
            data: 'insumo_utilizado',
            name: 'insumo_utilizado'
        }, {
            data: 'cantidad',
            name: 'cantidad'
        }, {
            data: 'unidad',
            name: 'unidad'
        }, {
            data: 'anio',
            name: 'anio'
        }, {
            data: 'action',
            name: 'action',
            orderable: true,
            searchable: true
        },],
        columnDefs: [],
        createdRow: function (row, data, dataIndex) {
            $(row).addClass('odd');
            $(row).attr('role', 'row');
        },
    })
}

function cargar_tabla_materia() {
    var table = $('.yajra-datatable-materia').DataTable();
    table.destroy();
    //$('.yajra-datatable').empty();
    var id_asignacion_producto = $("#id_rel_industria_actividad_materia_prima").val();
    var periodo_fiscal = $("#anio_periodo_fiscal").val();
    table = $('.yajra-datatable-materia').DataTable({
        paginate: false,
        serverSide: true,
        searching: false,
        "ajax": {
            "url": "/listmatprima",
            "type": "POST",
            "data": {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id_rel_industria_actividad_materia_prima: id_asignacion_producto,
                p_f: periodo_fiscal
            },
        },
        columns: [{
            data: 'DT_RowIndex',
            name: 'DT_RowIndex'
        }, {
            data: 'nombre_materia_prima',
            name: 'nombre_materia_prima'
        }, {
            data: 'cantidad',
            name: 'cantidad'
        }, {
            data: 'id_unidad_de_medida',
            name: 'id_unidad_de_medida'
        }, {
            data: 'action',
            name: 'action',
            orderable: true,
            searchable: true
        },],
        columnDefs: []
    })
}

function cargar_tabla_productos() {
    var table = $('.yajra-datatable-productos').DataTable();
    table.destroy();
    //$('.yajra-datatable').empty();
    var id_asignacion_producto = $("#id_asignacion_producto").val();
    var periodo_fiscal = $("#anio_periodo_fiscal").val();
    table = $('.yajra-datatable-productos').DataTable({
        paginate: false,
        serverSide: true,
        searching: false,
        "ajax": {
            "url": "/listRelActProd",
            "type": "POST",
            "data": {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id_asignacion_producto: id_asignacion_producto,
                p_f: periodo_fiscal
            },
        },
        columns: [{
            data: 'DT_RowIndex',
            name: 'DT_RowIndex'
        }, {
            data: 'nombre_producto',
            name: 'nombre_producto'
        }, {
            data: 'unidad_de_medida',
            name: 'unidad_de_medida'
        }, {
            data: 'cantidad_producida',
            name: 'cantidad_producida'
        }, {
            data: 'porcentaje_sobre_produccion',
            name: 'porcentaje_sobre_produccion'
        }, {
            data: 'action',
            name: 'action',
            orderable: true,
            searchable: true
        },],
        columnDefs: []
    })
}

function cargar_tabla_materia_utilizada() {
    var table = $('.yajra-datatable-materia-actividad').DataTable();
    table.destroy();
    //$('.yajra-datatable').empty();
    var id_asignacion_producto = $("#id_asignacion_producto").val();
    table.DataTable({
        paginate: false,
        serverSide: true,
        searching: false,
        "ajax": {
            "url": "/listRelActProd",
            "type": "POST",
            "data": {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id_asignacion_producto: id_asignacion_producto
            },
        },
        columns: [{
            data: 'DT_RowIndex',
            name: 'DT_RowIndex'
        }, {
            data: 'nombre_producto',
            name: 'nombre_producto'
        }, {
            data: 'unidad_de_medida',
            name: 'unidad_de_medida'
        }, {
            data: 'cantidad_producida',
            name: 'cantidad_producida'
        }, {
            data: 'porcentaje_sobre_produccion',
            name: 'porcentaje_sobre_produccion'
        }, {
            data: 'action',
            name: 'action',
            orderable: true,
            searchable: true
        },],
        columnDefs: []
    })
}

function cargar_tabla_combustible() {
    var table = $('.yajra-datatable-combustible').DataTable();
    var periodo_fiscal = $("#anio_periodo_fiscal").val();
    table.destroy();
    //$('.yajra-datatable').empty();
    var id_industria = $("#id_industria_modal").val();
    table = $('.yajra-datatable-combustible').DataTable({
        processing: false,
        serverSide: true,
        searching: false,
        "ajax": {
            "url": "/listRelcombustible",
            "type": "POST",
            "data": {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id_industria: id_industria,
                p_f: periodo_fiscal
            },
        },
        columns: [{
            data: 'DT_RowIndex',
            name: 'DT_RowIndex'
        }, {
            data: 'servicio_utilizado',
            name: 'servicio_utilizado'
        }, {
            data: 'frecuencia',
            name: 'frecuencia'
        }, {
            data: 'unidad',
            name: 'unidad'
        }, {
            data: 'costo',
            name: 'costo'
        }, {
            data: 'anio',
            name: 'anio'
        }, {
            data: 'action',
            name: 'action',
            orderable: true,
            searchable: true
        },],
        columnDefs: []
    })
}

function cargar_tabla_gastos() {
    var table = $('.yajra-table-gastos').DataTable();
    var periodo_fiscal = $("#anio_periodo_fiscal").val();
    table.destroy();
    //$('.yajra-datatable').empty();
    var id_industria = $("#id_industria_modal").val();
    table = $('.yajra-table-gastos').DataTable({
        processing: false,
        serverSide: true,
        searching: false,
        "ajax": {
            "url": "/listRelGastos",
            "type": "POST",
            "data": {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id_industria: id_industria,
                p_f: periodo_fiscal
            },
        },
        columns: [{
            data: 'DT_RowIndex',
            name: 'DT_RowIndex'
        }, {
            data: 'egreso',
            name: 'egreso'
        }, {
            data: 'importe',
            name: 'importe'
        }, {
            data: 'anio',
            name: 'anio'
        }, {
            data: 'action',
            name: 'action',
            orderable: true,
            searchable: true
        },],
        columnDefs: [{
            targets: 1,
            "data": "egreso",
            "render": function (data, type, row, meta) {
                /* DEFINICION DE LAS VARIABLES: 
                 * data: es el origen de dato... lo que segun el columns obtiene.
                 * type: display (no se para que es).
                 * row: todo el object con los valores de toda la fila
                 * meta: el id de fila y columna en DT más las settings de DT */
                $("#agregar_egreso").prop("disabled", true);
                return row.egreso;
            }
        },]
    })
}

function cargar_tabla_splanta() {
    var table = $('.tabla_splanta').DataTable();
    var periodo_fiscal = $("#anio_periodo_fiscal").val();
    table.destroy();
    //$('.yajra-datatable').empty();
    var id_industria = $("#id_industria_modal").val();
    table = $('.tabla_splanta').DataTable({
        processing: false,
        serverSide: true,
        searching: false,
        "ajax": {
            "url": "/listRelPlanta",
            "type": "POST",
            "data": {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id_industria: id_industria,
                p_f: periodo_fiscal
            },
        },
        columns: [{
            data: 'DT_RowIndex',
            name: 'DT_RowIndex'
        }, {
            data: 'produccion_sobre_capacidad',
            name: 'produccion_sobre_capacidad'
        }, {
            data: 'superficie_lote',
            name: 'superficie_lote'
        }, {
            data: 'superficie_planta',
            name: 'superficie_planta'
        }, {
            data: 'capacidad_instalada',
            name: 'capacidad_instalada'
        }, {
            data: 'capacidad_ociosa',
            name: 'capacidad_ociosa'
        }, {
            data: 'anio',
            name: 'anio'
        }, {
            data: 'action',
            name: 'action',
            orderable: true,
            searchable: true
        },],
        columnDefs: []
    })
}

function cargar_tabla_motivo_ociosidad() {
    var table = $('.tabla_mo').DataTable();
    table.destroy();
    //$('.yajra-datatable').empty();
    var id_industria = $("#id_industria_modal").val();
    var periodo_fiscal = $("#anio_periodo_fiscal").val();
    table = $('.tabla_mo').DataTable({
        processing: false,
        serverSide: true,
        searching: false,
        "ajax": {
            "url": "/listRelMO",
            "type": "POST",
            "data": {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id_industria: id_industria,
                p_f: periodo_fiscal
            },
        },
        columns: [{
            data: 'DT_RowIndex',
            name: 'DT_RowIndex'
        }, {
            data: 'motivo_ociosidad',
            name: 'motivo_ociosidad'
        }, {
            data: 'anio',
            name: 'anio'
        }, {
            data: 'action',
            name: 'action',
            orderable: true,
            searchable: true
        },],
        columnDefs: []
    })
}

function cargar_tabla_p_o_m() {
    var table = $('.tabla_po_m').DataTable();
    table.destroy();
    //$('.yajra-datatable').empty();
    var id_industria = $("#id_industria_modal").val();
    var periodo_fiscal = $("#anio_periodo_fiscal").val();
    table = $('.tabla_po_m').DataTable({
        processing: false,
        serverSide: true,
        searching: false,
        order: [
            [1, 'asc']
        ],
        "ajax": {
            "url": "/listRelTrabajador",
            "type": "POST",
            "data": {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id_industria: id_industria,
                p_f: periodo_fiscal
            },
        },
        columns: [{
            data: 'DT_RowIndex',
            name: 'DT_RowIndex'
        }, {
            data: 'rol_trabajador',
            name: 'rol_trabajador'
        }, {
            data: 'numero_de_trabajadores',
            name: 'numero_de_trabajadores'
        }, {
            data: 'condicion_laboral',
            name: 'condicion_laboral'
        }, {
            data: 'anio',
            name: 'anio'
        }, {
            data: 'action',
            name: 'action',
            orderable: true,
            searchable: true
        },],
        columnDefs: [{
            targets: 3,
            "data": "condicion_laboral",
            "render": function (data, type, row, meta) {
                /* DEFINICION DE LAS VARIABLES: 
                 * data: es el origen de dato... lo que segun el columns obtiene.
                 * type: display (no se para que es).
                 * row: todo el object con los valores de toda la fila
                 * meta: el id de fila y columna en DT más las settings de DT */
                if (row.condicion_laboral == "Temporal") {
                    var a = '<span class="badge badge-primary">' + row.condicion_laboral + '</span>'
                } else {
                    var a = '<span class="badge badge-success">' + row.condicion_laboral + '</span>'
                }
                return a;
            }
        },]
    })
}

function cargar_tabla_p_o_f() {
    var table = $('.tabla_po_f').DataTable();
    table.destroy();
    //$('.yajra-datatable').empty();
    var id_industria = $("#id_industria_modal").val();
    var periodo_fiscal = $("#anio_periodo_fiscal").val();
    table = $('.tabla_po_f').DataTable({
        processing: false,
        serverSide: true,
        searching: false,
        order: [
            [1, 'asc']
        ],
        "ajax": {
            "url": "/listRelTrabajadorF",
            "type": "POST",
            "data": {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id_industria: id_industria,
                p_f: periodo_fiscal
            },
        },
        columns: [{
            data: 'DT_RowIndex',
            name: 'DT_RowIndex'
        }, {
            data: 'rol_trabajador',
            name: 'rol_trabajador'
        }, {
            data: 'numero_de_trabajadores',
            name: 'numero_de_trabajadores'
        }, {
            data: 'condicion_laboral',
            name: 'condicion_laboral'
        }, {
            data: 'anio',
            name: 'anio'
        }, {
            data: 'action',
            name: 'action',
            orderable: true,
            searchable: true
        },],
        columnDefs: [{
            targets: 3,
            "data": "condicion_laboral",
            "render": function (data, type, row, meta) {
                /* DEFINICION DE LAS VARIABLES: 
                 * data: es el origen de dato... lo que segun el columns obtiene.
                 * type: display (no se para que es).
                 * row: todo el object con los valores de toda la fila
                 * meta: el id de fila y columna en DT más las settings de DT */
                if (row.condicion_laboral == "Temporal") {
                    var a = '<span class="badge badge-primary">' + row.condicion_laboral + '</span>'
                } else {
                    var a = '<span class="badge badge-success">' + row.condicion_laboral + '</span>'
                }
                return a;
            }
        },]
    })
}

function cargar_tabla_ventas() {
    var table = $('.table_ventas').DataTable();
    table.destroy();
    //$('.yajra-datatable').empty();
    var id_industria = $("#id_industria_modal").val();
    var periodo_fiscal = $("#anio_periodo_fiscal").val();
    table = $('.table_ventas').DataTable({
        processing: false,
        serverSide: true,
        searching: false,
        "ajax": {
            "url": "/listVentas",
            "type": "POST",
            "data": {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id_industria: id_industria,
                p_f: periodo_fiscal
            },
        },
        columns: [{
            data: 'DT_RowIndex',
            name: 'DT_RowIndex'
        }, {
            data: 'clasificacion_ventas',
            name: 'clasificacion_ventas'
        }, {
            data: 'provincias',
            name: 'provincias'
        }, {
            data: 'paises',
            name: 'paises'
        }, {
            data: 'anio',
            name: 'anio'
        }, {
            data: 'action',
            name: 'action',
            orderable: true,
            searchable: true
        },],
        columnDefs: [{
            targets: 2,
            "data": "provincias",
            "render": function (data, type, row, meta) {
                /* DEFINICION DE LAS VARIABLES: 
                 * data: es el origen de dato... lo que segun el columns obtiene.
                 * type: display (no se para que es).
                 * row: todo el object con los valores de toda la fila
                 * meta: el id de fila y columna en DT más las settings de DT */
                var provincias = "";
                var cont = row.provincias.length;
                var cnt = 0;
                row.provincias.forEach(function (element, index) {
                    cnt += 1;
                    provincias += element.provincia
                    if (cnt < cont) {
                        provincias += ","
                    }
                });
                return provincias;
            }
        }, {
            targets: 3,
            "data": "paises",
            "render": function (data, type, row, meta) {
                /* DEFINICION DE LAS VARIABLES: 
                 * data: es el origen de dato... lo que segun el columns obtiene.
                 * type: display (no se para que es).
                 * row: todo el object con los valores de toda la fila
                 * meta: el id de fila y columna en DT más las settings de DT */
                var paises = "";
                var cont = row.paises.length;
                var cnt = 0;
                row.paises.forEach(function (element, index) {
                    cnt += 1;
                    paises += element.pais
                    if (cnt < cont) {
                        paises += ","
                    }
                });
                return paises;
            }
        },]
    })
}

function cargar_tabla_fact() {
    var table = $('.table_facturacion').DataTable();
    table.destroy();
    //$('.yajra-datatable').empty();
    var id_industria = $("#id_industria_modal").val();
    var periodo_fiscal = $("#anio_periodo_fiscal").val();
    table = $('.table_facturacion').DataTable({
        processing: false,
        serverSide: true,
        searching: false,
        "ajax": {
            "url": "/listFact",
            "type": "POST",
            "data": {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id_industria: id_industria,
                p_f: periodo_fiscal
            },
        },
        columns: [{
            data: 'DT_RowIndex',
            name: 'DT_RowIndex'
        }, {
            data: 'prevision_ingresos_anio_corriente',
            name: 'prevision_ingresos_anio_corriente'
        }, {
            data: 'prevision_ingresos_anio_corriente_dolares',
            name: 'prevision_ingresos_anio_corriente_dolares'
        }, {
            data: 'porcentaje_prevision_mercado_interno',
            name: 'porcentaje_prevision_mercado_interno'
        }, {
            data: 'porcentaje_prevision_mercado_externo',
            name: 'porcentaje_prevision_mercado_externo'
        }, {
            data: 'categoria',
            name: 'categoria'
        }, {
            data: 'anio',
            name: 'anio'
        }, {
            data: 'action',
            name: 'action',
            orderable: true,
            searchable: true
        },],
        columnDefs: []
    })
}

function cargar_tabla_cert() {
    var table = $('.table_certificados_list').DataTable();
    table.destroy();
    //$('.yajra-datatable').empty();
    var id_industria = $("#id_industria_modal").val();
    var periodo_fiscal = $("#anio_periodo_fiscal").val();
    table = $('.table_certificados_list').DataTable({
        processing: false,
        serverSide: true,
        searching: false,
        "ajax": {
            "url": "/lisRelCert",
            "type": "POST",
            "data": {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id_industria: id_industria,
                p_f: periodo_fiscal
            },
        },
        columns: [{
            data: 'DT_RowIndex',
            name: 'DT_RowIndex'
        }, {
            data: 'certificado',
            name: 'certificado'
        }, {
            data: 'estado',
            name: 'estado'
        }, {
            data: 'fecha_inicio',
            name: 'fecha_inicio'
        }, {
            data: 'fecha_fin',
            name: 'fecha_fin'
        }, {
            data: 'anio',
            name: 'anio'
        }, {
            data: 'action',
            name: 'action',
            orderable: true,
            searchable: true
        },],
        columnDefs: []
    })
}

function cargar_tabla_sc() {
    var table = $('.table_sc').DataTable();
    table.destroy();
    //$('.yajra-datatable').empty();
    var id_industria = $("#id_industria_modal").val();
    var periodo_fiscal = $("#anio_periodo_fiscal").val();
    table = $('.table_sc').DataTable({
        processing: false,
        serverSide: true,
        searching: false,
        "ajax": {
            "url": "/lisRelSc",
            "type": "POST",
            "data": {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id_industria: id_industria,
                p_f: periodo_fiscal
            },
        },
        columns: [{
            data: 'DT_RowIndex',
            name: 'DT_RowIndex'
        }, {
            data: 'sistema_de_calidad',
            name: 'sistema_de_calidad'
        }, {
            data: 'estado',
            name: 'estado'
        }, {
            data: 'fecha_inicio',
            name: 'fecha_inicio'
        }, {
            data: 'fecha_fin',
            name: 'fecha_fin'
        }, {
            data: 'anio',
            name: 'anio'
        }, {
            data: 'action',
            name: 'action',
            orderable: true,
            searchable: true
        },],
        columnDefs: []
    })
}

function cargar_tabla_promo() {
    var table = $('.table_promo').DataTable();
    table.destroy();
    //$('.yajra-datatable').empty();
    var id_industria = $("#id_industria_modal").val();
    var periodo_fiscal = $("#anio_periodo_fiscal").val();
    table = $('.table_promo').DataTable({
        processing: false,
        serverSide: true,
        searching: false,
        "ajax": {
            "url": "/lisRelPromo",
            "type": "POST",
            "data": {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id_industria: id_industria,
                p_f: periodo_fiscal
            },
        },
        columns: [{
            data: 'DT_RowIndex',
            name: 'DT_RowIndex'
        }, {
            data: 'promocion_industrial',
            name: 'promocion_industrial'
        }, {
            data: 'estado',
            name: 'estado'
        }, {
            data: 'fecha_inicio',
            name: 'fecha_inicio'
        }, {
            data: 'fecha_fin',
            name: 'fecha_fin'
        }, {
            data: 'anio',
            name: 'anio'
        }, {
            data: 'action',
            name: 'action',
            orderable: true,
            searchable: true
        },],
        columnDefs: []
    })
}

function cargar_tabla_economia() {
    var table = $('.table_economia').DataTable();
    table.destroy();
    //$('.yajra-datatable').empty();
    var id_industria = $("#id_industria_modal").val();
    var periodo_fiscal = $("#anio_periodo_fiscal").val();
    table = $('.table_economia').DataTable({
        processing: false,
        serverSide: true,
        searching: false,
        "ajax": {
            "url": "/lisReleco",
            "type": "POST",
            "data": {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id_industria: id_industria,
                p_f: periodo_fiscal
            },
        },
        columns: [{
            data: 'DT_RowIndex',
            name: 'DT_RowIndex'
        }, {
            data: 'sector',
            name: 'sector'
        }, {
            data: 'anio',
            name: 'anio'
        }, {
            data: 'action',
            name: 'action',
            orderable: true,
            searchable: true
        },],
        columnDefs: []
    })
}

function cargar_tabla_perfil() {
    var table = $('.table_perfil').DataTable();
    table.destroy();
    //$('.yajra-datatable').empty();
    var id_industria = $("#id_industria_modal").val();
    var periodo_fiscal = $("#anio_periodo_fiscal").val();
    table = $('.table_perfil').DataTable({
        processing: false,
        serverSide: true,
        searching: false,
        "ajax": {
            "url": "/lisRelPerfil",
            "type": "POST",
            "data": {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id_industria: id_industria,
                p_f: periodo_fiscal
            },
        },
        columns: [{
            data: 'DT_RowIndex',
            name: 'DT_RowIndex'
        }, {
            data: 'perfil',
            name: 'perfil'
        }, {
            data: 'anio',
            name: 'anio'
        }, {
            data: 'action',
            name: 'action',
            orderable: true,
            searchable: true
        },],
        columnDefs: []
    })
}

function cargar_clasif_ingresos() {
    $.ajax({
        type: "post",
        url: "/ClasifIngresos",
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
        },
        success: function (response) {
            $('#clasif_ingreso').find("tr").remove();
            $('#clasif_ingreso_2').append('<tr role="row" class="text-left"><th>Categoria</th><th>Nivel de Ingresos</th><th>Corresponde</th></tr></thead>');
            $(response).each(function (i, v) {
                $('#clasif_ingreso').append('<tr role="row" class="text-left">' + ' <td>' + v.categoria + '</td>' + ' <td>Desde $' + v.monto_minimo + ' - Hasta$' + v.monto_maximo + '</td>' + '  <td>' + '  <div class="custom-control custom-radio custom-control-inline">' + '   <input type="radio" id="categoria_ingresos_' + v.id_categoria_ingreso + '" name="categoria_ingresos" value="' + v.id_categoria_ingreso + '" class="custom-control-input c_fac">' + ' <label class="custom-control-label" for="categoria_ingresos_' + v.id_categoria_ingreso + '"></label>' + '</div>' + ' </td>' + ' </tr>');
            })
        }
    });
}

function btn_cancelar_fac() {
    $("#updatefacturacion").prop('id', 'savefacturacion');
    $("#savefacturacion").prop('name', 'savefacturacion');
    $("#btn-facturacion").show()
    $("#btn-facturacion-update").hide()
    $("#savefacturacion #id_facturacion").val('');
    //$("#savefacturacion #industria_facturacion").val(id_industria);
    //$("#savefacturacion #nombre_de_fantasia").text(nombre_de_fantasia);
    $("#savefacturacion #prevision_ingresos_anio_corriente").val('');
    $("#savefacturacion #prevision_ingresos_anio_corriente_dolares").val('');
    $("#savefacturacion #porcentaje_prevision_mercado_interno").val('');
    $("#savefacturacion #porcentaje_prevision_mercado_externo").val('');
    $("#savefacturacion #anio_facturacion").val();
    $("#savefacturacion .c_fac").prop('checked', false);
}

function btn_cancelar_venta() {
    $("#updateventa #id_destino_ventas").val("");
    $("#updateventa #industria_venta_update").val("");
    $("#btn-venta-update").hide();
    $("#btn-venta").show();
    $("#btn-cancelar-venta").show();
    $("#btn-cerrar-venta").hide();
    $("#updateventa").prop('id', 'saveventa');
    $("#saveventa").prop('name', 'saveventa');
    $("#clasif_venta").val("")
    $("#updateventa #id_destino_ventas").val("");
    $('#ventas_provincias').val("");
    $('#ventas_provincias').select2();
    $('#ventas_provincias').trigger('change');
    $("#clasif_venta").prop('disabled', false)
    $('#ventas_provincias').prop('disabled', false)
    $('#ventas_paises').prop('disabled', false)
    $('#ventas_paises').val("");
    $('#ventas_paises').select2();
    $('#ventas_paises').trigger('change');
}
//moostrar forms
$(document).ready(function () {
    $('#secciones section').hide();
    $('#secciones section:first').show();
    $('.row-horizon span').click(function () {
        $('#secciones section').hide();
        $('.row-horizon span').removeClass('selectedGat')
        $(this).addClass('selectedGat');
        let active = $(this).attr('href');
        $(active).show()
        return false;
    })
});
//visor de archivos
$(document).ready(function () {
    $('.venobox').venobox();
});
$(document).ready(function () {
    //set initial state.
    $("#check_otro").change(function () {
        $('#check_otro').val(this.checked);
        if ($('#check_otro').val() == "true") {
            $(".selectMotivo").hide("slow");
            $("#id_motivo_ociosidad").val("");
            $(".motivoNuevo").show("fast");
        } else {
            $(".selectMotivo").show("fast");
            $(".motivoNuevo").hide("slow");
        }
    });
});

function getTramite() {
    console.log("modal", $("#id_industria_modal").val())
    $.ajax({
        type: "get",
        url: "/tramite/" + $("#id_industria_modal").val(),
        success: function (response) {

            $(response.periodo_fiscal).each(function (i, v) {
                $('#anio_periodo_fiscal').append('<option value="' + v.anio + '">' + v.anio + '</option>');
            })


            $(".mostrar_info_industria").show();
            $("#savegeneral").prop('id', 'updategeneral');
            $("#updategeneral").prop('name', 'updategeneral');
            $("#btn-submit-save-generales").hide()
            $("#btn-update-generales").show()


            $("#nombre_industria_fantasia").text(response.industria.nombre_de_fantasia);
            $("#nombre_de_fantasia").val(response.industria.nombre_de_fantasia)
            $("#fecha_actividad_industria").val(moment(response.industria.fecha_inicio).format('DD-MM-YYYY'));
            $("#es_casa_central").val(response.industria.es_casa_central)
            $("#zona_industrial").val(response.industria.es_zona_industrial)
            $("#tel_fijo").val(response.industria.tel_fijo)
            $("#tel_celular").val(response.industria.tel_celular)
            $("#cod_postal").val(response.industria.cod_postal)
            $("#zona").val(response.industria.id_punto_cardinal)
            $("#id_provincia").val(response.industria.id_provincia_planta)
            $("#buscar_provincia").val(response.industria.provincia_planta)
            $("#id_localidad").val(response.industria.id_localidad)
            $("#buscar_localidad").val(response.industria.localidad_planta)
            $("#id_barrio").val(response.industria.id_barrio_planta)
            $("#buscar_barrio").val(response.industria.barrio_planta)
            $("#id_calle").val(response.industria.id_calle_planta)
            $("#buscar_calle").val(response.industria.calle_planta)
            $("#nro_calle_panta").val(response.industria.nro_calle_planta)
            $("#nro_piso_planta").val(response.industria.piso_planta)
            $("#nro_departamento_planta").val(response.industria.numero)
            $("#referencia_planta").val(response.industria.referencia_planta)
            $("#latitud").val(response.industria.latitud)
            $("#longitud").val(response.industria.longitud)
            $("#pagina_web").val(response.industria.pagina_web)
            $("#email").val(response.industria.email)
        }
    });
}

function lanzador() {
    muestraReloj();

    //si se encuentra seteado el id de la industria es por que se está editando
    if ($("#id_industria_modal").val() != undefined && $("#id_industria_modal").val() != "") {
        getTramite()
    }
    ;
}

function getClasificacionVentas() {
    $.ajax({
        type: "post",
        url: "/getCVentas",
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
        },
        success: function (response) {
            $("#clasif_venta").find("option").remove();
            $('#clasif_venta').append('<option value="">-- SELECCIONE --</option>');
            $(response).each(function (i, v) {
                $('#clasif_venta').append('<option value="' + v.id_clasificacion_ventas + '">' + v.clasificacion_ventas + '</option>');
            })
        }
    });
}

function getProvinciasVentas() {
    $.ajax({
        type: "post",
        url: "/getPVentas",
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
        },
        success: function (response) {
            $("#ventas_provincias").find("option").remove();
            $('#ventas_provincias').select2({
                width: 'resolve',
                theme: "classic"
            });
            //$('#ventas_provincias').append('<option value="">-- SELECCIONE --</option>');
            $(response).each(function (i, v) {
                $('#ventas_provincias').append('<option value="' + v.id_provincia + '">' + v.provincia + '</option>');
            })
        }
    });
}

function getPaisesVentas() {
    $.ajax({
        type: "post",
        url: "/getPaisesVentas",
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
        },
        success: function (response) {
            $("#ventas_paises").find("option").remove();
            $('#ventas_paises').select2({
                width: 'resolve',
                theme: "classic"
            });
            //$('#ventas_provincias').append('<option value="">-- SELECCIONE --</option>');
            $(response).each(function (i, v) {
                $('#ventas_paises').append('<option value="' + v.id_pais + '">' + v.pais + '</option>');
            })
        }
    });
}

function getCondicionLaboral() {
    $.ajax({
        type: "post",
        url: "/getCondicionLaboral",
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
        },
        success: function (response) {
            $("#p_o").find("tr").remove();
            $('#thead_p_o').append('<tr role="row">' + '<th>Condición Laboral <span class="symbol required"></span></th>' + '<th>Masculino <span class="symbol required"></span></th>' + '<th>Femenino <span class="symbol required"></span></th>' + '</tr>')
            $(response).each(function (i, v) {
                $('#p_o').append('<tr role="row" class="odd">' + '<td><input type="hidden" name="id_condicion_laboral[]" value="' + v.id_condicion_laboral + '" />' + v.condicion_laboral + '</label></td>' + '<td class="text-center"><input type="number" min="0" value="0" class="form-control" name="masculino[]"  placeholder="Ingrese Cantidad Masculino" autocomplete="off" style="width:100%;height:40px;background:#f0f9fc;border-radius:5px 5px 5px 5px;"></td>' + '<td class="text-center"><input type="number" min="0" value="0" class="form-control" name="femenino[]"  placeholder="Ingrese Cantidad Femenino" autocomplete="off" style="width:100%;height:40px;background:#f0f9fc;border-radius:5px 5px 5px 5px;"></td>' + '</tr>');
            })
        }
    });
}

function getRolTrabajadores() {
    $.ajax({
        type: "post",
        url: "/getRolTrabajadores",
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
        },
        success: function (response) {
            $("#rol_trabajador option").remove();
            $("#rol_trabajador").append('<option value="">' + "--SELECCIONE--" + '</option>');
            $(response).each(function (i, v) { // indice, valor
                $("#rol_trabajador").append('<option value="' + v.id_rol_trabajador + '">' + v.rol_trabajador + '</option>');
            })
        }
    });
}

function trae_motivo_ociosidad() {
    $.ajax({
        type: "post",
        url: "/traeMotivos_ociosidad",
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
        },
        success: function (response) {
            $("#id_motivo_ociosidad option").remove();
            $("#id_motivo_ociosidad").append('<option value="">' + "--SELECCIONE--" + '</option>');
            $(response).each(function (i, v) { // indice, valor
                $("#id_motivo_ociosidad").append('<option value="' + v.id_motivo_ociosidad + '">' + v.motivo_ociosidad + '</option>');
            })
        }
    });
}

function getunidades() {
    $.ajax({
        type: "post",
        url: "/getUnidades",
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
        },
        success: function (response) {
            $("#medida_combustible option").remove();
            $("#medida_combustible").append('<option value="">' + "--SELECCIONE--" + '</option>');
            $("#medida_insumo option").remove();
            $("#medida_insumo").append('<option value="">' + "--SELECCIONE--" + '</option>');
            $(response).each(function (i, v) { // indice, valor
                $("#medida_insumo").append('<option value="' + v.value + '">' + v.label + '</option>');
                $("#medida_combustible").append('<option value="' + v.value + '">' + v.label + '</option>');
            })
        }
    });
}

function getFrecuencia() {
    $.ajax({
        type: "post",
        url: "/getFrecuencia",
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
        },
        success: function (response) {
            $("#frecuencia_otros option").remove();
            $("#frecuencia_otros").append('<option value="">' + "--SELECCIONE--" + '</option>');
            $(response).each(function (i, v) { // indice, valor
                $("#frecuencia_otros").append('<option value="' + v.value + '">' + v.label + '</option>');
            })
        }
    });
}

function getMotivo() {
    $.ajax({
        type: "post",
        url: "/motivoImportacion",
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
        },
        success: function (response) {
            $("#motivo_importacion_insumo option").remove();
            $("#motivo_importacion_insumo").append('<option value="">' + "--SELECCIONE--" + '</option>');
            $("#motivo_importacion_combustible option").remove();
            $("#motivo_importacion_combustible").append('<option value="">' + "--SELECCIONE--" + '</option>');
            $("#motivo_importacion_otros option").remove();
            $("#motivo_importacion_otros").append('<option value="">' + "--SELECCIONE--" + '</option>');
            $(response).each(function (i, v) {
                $("#motivo_importacion_insumo").append('<option value="' + v.value + '">' + v.label + '</option>');
                $("#motivo_importacion_combustible").append('<option value="' + v.value + '">' + v.label + '</option>');
                $("#motivo_importacion_otros").append('<option value="' + v.value + '">' + v.label + '</option>');
            })
        }
    });
}

function btn_cancelar_ef() {
    $("#id_rel_industria_efluente").val("");
    $("#id_efluente_e").val("");
    $("#search_efluente_e").val("");
    $("#tratamiento_residuo").val("");
    $("#destino").val("");
}

function getCertificados() {
    $.ajax({
        type: "post",
        url: "/getCertificados",
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
        },
        success: function (response) {
            $(".table_certificado_modal").find("tr").remove();
            $('#thead_c').append('<tr role="row">' + '<th>Certificado <span class="symbol required"></span></th>' + ' <th>No Posee </th>' + '  <th>En Trámite </th>' + ' <th>Posee </th>' + '  <th>Fecha Inicial</th>' + ' <th>Fecha Final</th>' + ' </tr>')
            $(response).each(function (i, v) {
                $('.table_certificado_modal').append('<tr role="row" class="odd">' + '<td><input type="hidden" name="id_certificado[]" id="id_certificado_' + v.id_certificado + '" value="' + v.id_certificado + '"><label>' + v.certificado + '</label></td>' + ' <td class="text-center"><div class="custom-control custom-radio custom-control-inline">' + '<input type="radio" name="checkbox[' + i + ']" id="name1_' + v.id_certificado + '" value="NO POSEE" class="custom-control-input" onclick="ProcesarCertificado(\'NO POSEE\',' + v.id_certificado + ');">' + '<label class="custom-control-label" for="name1_' + v.id_certificado + '"></label>' + '</div></td>' + '<td class="text-center"><div class="custom-control custom-radio custom-control-inline">' + '<input type="radio" name="checkbox[' + i + ']" id="name2_' + v.id_certificado + '" value="EN TRAMITE" class="custom-control-input" onclick="ProcesarCertificado(\'EN TRAMITE\',' + v.id_certificado + ');">' + '<label class="custom-control-label" for="name2_' + v.id_certificado + '"></label>' + '</div></td>' + '<td class="text-center"><div class="custom-control custom-radio custom-control-inline">' + '<input type="radio" name="checkbox[' + i + ']" id="name3_' + v.id_certificado + '" value="POSEE" class="custom-control-input" onclick="ProcesarCertificado(\'POSEE\',' + v.id_certificado + ');">' + '<label class="custom-control-label" for="name3_' + v.id_certificado + '"></label>' + '</div></td>' + ' <td class="text-center"><input type="text" class="form-control certificado" name="inicio_certificado[' + i + ']" id="inicio_certificado_' + v.id_certificado + '" placeholder="Ingrese Fecha Inicial" autocomplete="off" style="width:100%;height:40px;background:#f0f9fc;border-radius:5px 5px 5px 5px;"  disabled="" title="Ingrese Fecha Inicial" required="" aria-required="true"></td>' + ' <td class="text-center"><input type="text" class="form-control certificado" name="fin_certificado[' + i + ']" id="fin_certificado_' + v.id_certificado + '" placeholder="Ingrese Fecha Final" autocomplete="off" style="width:100%;height:40px;background:#f0f9fc;border-radius:5px 5px 5px 5px;" disabled="" title="Ingrese Fecha Final" required="" aria-required="true"></td>' + ' </tr>');
            })
        }
    });
}

function getSc() {
    $.ajax({
        type: "post",
        url: "/getSc",
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
        },
        success: function (response) {
            $("#tbody_sa_modal").find("tr").remove();
            $(response).each(function (i, v) {
                $('#tbody_sa_modal').append('<tr>' + '<td><input type="hidden" name="id_sistema_de_calidad[]"  value="' + v.id_sistema_de_calidad + '"><label>' + v.sistema_de_calidad + '</label></td>' + '<td class="text-center"><div class="custom-control custom-radio custom-control-inline">' + '<input type="radio" name="checkbox[' + i + ']" id="name4_' + v.id_sistema_de_calidad + '" value="NO POSEE" class="custom-control-input" onclick="ProcesarSistema(\'NO POSEE\',' + v.id_sistema_de_calidad + ');">' + '<label class="custom-control-label" for="name4_' + v.id_sistema_de_calidad + '"></label>' + '</div></td>' + '<td class="text-center"><div class="custom-control custom-radio custom-control-inline">' + ' <input type="radio" name="checkbox[' + i + ']" id="name5_' + v.id_sistema_de_calidad + '" value="EN TRAMITE" class="custom-control-input" onclick="ProcesarSistema(\'EN TRAMITE\',' + v.id_sistema_de_calidad + ');">' + '<label class="custom-control-label" for="name5_' + v.id_sistema_de_calidad + '"></label>' + ' </div></td>' + ' <td class="text-center"><div class="custom-control custom-radio custom-control-inline">' + ' <input type="radio" name="checkbox[' + i + ']" id="name6_' + v.id_sistema_de_calidad + '" value="POSEE" class="custom-control-input" onclick="ProcesarSistema(\'POSEE\',' + v.id_sistema_de_calidad + ');">' + '<label class="custom-control-label" for="name6_' + v.id_sistema_de_calidad + '"></label>' + ' </div></td>' + ' <td class="text-center"><input type="text" class="form-control calidad" name="inicio_sistema[' + i + ']" id="inicio_sistema_' + v.id_sistema_de_calidad + '" placeholder="Ingrese Fecha Inicial" autocomplete="off" style="width:100%;height:40px;background:#f0f9fc;border-radius:5px 5px 5px 5px;" title="Ingrese Fecha Inicial" required="" aria-required="true" disabled="disabled"></td>' + '<td class="text-center"><input type="text" class="form-control calidad" name="fin_sistema[' + i + ']" id="fin_sistema_' + v.id_sistema_de_calidad + '" placeholder="Ingrese Fecha Final" autocomplete="off" style="width:100%;height:40px;background:#f0f9fc;border-radius:5px 5px 5px 5px;" title="Ingrese Fecha Final" required="" aria-required="true" disabled="disabled"></td>' + '</tr>');
            })
        }
    });
}

function getPromocion() {
    $.ajax({
        type: "post",
        url: "/getPromo",
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
        },
        success: function (response) {
            $("#tbody_promo").find("tr").remove();
            $(response).each(function (i, v) {
                $('#tbody_promo').append('<tr>' + '<td><input type="hidden" name="id_promocion_industrial[]"  value="' + v.id_promocion_industrial + '"><label>' + v.promocion_industrial + '</label></td>' + '<td class="text-center"><div class="custom-control custom-radio custom-control-inline">' + '<input type="radio" name="checkbox[' + i + ']" id="name7_' + v.id_promocion_industrial + '" value="NO POSEE" class="custom-control-input" onclick="ProcesarPromocion(\'NO POSEE\',' + v.id_promocion_industrial + ');">' + '<label class="custom-control-label" for="name7_' + v.id_promocion_industrial + '"></label>' + '</div></td>' + '<td class="text-center"><div class="custom-control custom-radio custom-control-inline">' + ' <input type="radio" name="checkbox[' + i + ']" id="name8_' + v.id_promocion_industrial + '" value="EN TRAMITE" class="custom-control-input" onclick="ProcesarPromocion(\'EN TRAMITE\',' + v.id_promocion_industrial + ');">' + '<label class="custom-control-label" for="name8_' + v.id_promocion_industrial + '"></label>' + ' </div></td>' + ' <td class="text-center"><div class="custom-control custom-radio custom-control-inline">' + ' <input type="radio" name="checkbox[' + i + ']" id="name9_' + v.id_promocion_industrial + '" value="POSEE" class="custom-control-input" onclick="ProcesarPromocion(\'POSEE\',' + v.id_promocion_industrial + ');">' + '<label class="custom-control-label" for="name9_' + v.id_promocion_industrial + '"></label>' + ' </div></td>' + ' <td class="text-center"><input type="text" class="form-control calendario2" name="inicio_promocion[' + i + ']" id="inicio_promocion_' + v.id_promocion_industrial + '" placeholder="Ingrese Fecha Inicial" autocomplete="off" style="width:100%;height:40px;background:#f0f9fc;border-radius:5px 5px 5px 5px;" title="Ingrese Fecha Inicial" required="" aria-required="true" disabled="disabled"></td>' + '<td class="text-center"><input type="text" class="form-control calendario2" name="fin_promocion[' + i + ']" id="fin_promocion_' + v.id_promocion_industrial + '" placeholder="Ingrese Fecha Final" autocomplete="off" style="width:100%;height:40px;background:#f0f9fc;border-radius:5px 5px 5px 5px;" title="Ingrese Fecha Final" required="" aria-required="true" disabled="disabled"></td>' + '</tr>');
            })
        }
    });
}

function getSP() {
    //esta funcion trae sectores y personal
    $.ajax({
        type: "post",
        url: "/getSP",
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
        },
        success: function (response) {
            $("#tbody_sector").find("tr").remove();
            /*$("#tbody_personal").find("tr").remove();*/
            $(response).each(function (i, v) {
                $('#tbody_sector').append('<tr role="row" class="text-left">' + '<td>' + v.sector + '</td>' + ' <td>' + ' <div class="custom-control custom-radio custom-control-inline">' + '<input type="checkbox" name="sectores[' + i + ']" id="s' + v.id_economia_del_conocimiento_sector + '" value="' + v.id_economia_del_conocimiento_sector + '" class="custom-control-input cb_sector">' + '  <label class="custom-control-label" for="s' + v.id_economia_del_conocimiento_sector + '"></label>' + '  </div>' + '  </td>' + ' </tr>');
            })
            /* $(response.personal).each(function (i, v) {
                $('#tbody_personal').append(

                 ' <tr role="row" class="text-left">'+
                    '<td>'+v.personal+'</td>'+
                    '<td>'+
                       ' <div class="custom-control custom-radio custom-control-inline">'+
                           ' <input type="checkbox" name="personal['+i+']" id="p'+v.id_personal+'" value="'+v.id_personal+'" class="custom-control-input">'+
                           ' <label class="custom-control-label" for="p'+v.id_personal+'"></label>'+
                       ' </div>'+
                   ' </td>'+
                '</tr>'
                );
            })    */
        }
    });
}
$(document).ready(function () {
    //set initial state.
    $("#cb_otro_sector").change(function () {
        $('#cb_otro_sector').val(this.checked);
        if ($('#cb_otro_sector').val() == "true") {
            $("#_sect").hide("slow");
            $("#div_otro_sector").show("fast");
            $(".cb_sector").prop("checked", false)
        } else {
            $("#_sect").show("fast");
            $("#div_otro_sector").hide("slow");
            $("#otro_sector").val("");
        }
    });
});

function getPerfil() {
    //esta funcion trae perfiles
    $.ajax({
        type: "post",
        url: "/getPerfil",
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
        },
        success: function (response) {
            $("#tbody_sector").find("tr").remove();
            /*$("#tbody_personal").find("tr").remove();*/
            $(response).each(function (i, v) {
                $('#tbody_perfil').append('<tr role="row" class="text-left">' + '<td>' + v.perfil + '</td>' + ' <td>' + ' <div class="custom-control custom-radio custom-control-inline">' + '<input type="checkbox" name="perfiles[' + i + ']" id="p' + v.id_economia_del_conocimiento_perfil + '" value="' + v.id_economia_del_conocimiento_perfil + '" class="custom-control-input cb_perfil">' + '  <label class="custom-control-label" for="p' + v.id_economia_del_conocimiento_perfil + '"></label>' + '  </div>' + '  </td>' + ' </tr>');
            })
        }
    });
}
$(document).ready(function () {
    //set initial state.
    $("#cb_otro_perfil").change(function () {
        $('#cb_otro_perfil').val(this.checked);
        if ($('#cb_otro_perfil').val() == "true") {
            $("#_perfil").hide("slow");
            $("#div_otro_perfil").show("fast");
            $(".cb_perfil").prop("checked", false)
        } else {
            $("#_perfil").show("fast");
            $("#div_otro_perfil").hide("slow");
            $("#otro_perfil").val("");
        }
    });
});

function trae_views_ddjj() {
    $.ajax({
        type: "post",
        url: "/getViewsddjj",
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            id: $("#id_industria_modal").val()
        },
        dataType: 'json',
        success: function (response) {
          
            var getUrl = window.location;
            $("#btn_export_dj").attr("href", getUrl.origin+"/djDownload/"+response.nombre_pdf+"/"+response.industria_contribuyente[0].cuit)

            //contribuyente
            $("#cuit_dj").text(response.industria_contribuyente[0].cuit)
            $("#rs_dj").text(response.industria_contribuyente[0].razon_social)
            $("#rib_dj").text(response.industria_contribuyente[0].regimen_ib)
            $("#nib_dj").text(response.industria_contribuyente[0].numero_de_ib)
            $("#civa_dj").text(response.industria_contribuyente[0].condicion_iva)
            $("#nj_dj").text(response.industria_contribuyente[0].naturaleza_juridica)
            $("#ef_dj").text(response.industria_contribuyente[0].email_fiscal)
            $("#cp_dj").text(response.industria_contribuyente[0].CP_Legal)
            $("#fiac_dj").text(response.industria_contribuyente[0].Inicio_de_Actividades_Contribuyente)
            $("#ll_dj").text(response.industria_contribuyente[0].Localidad_Legal)
            $("#dni_dj").text(response.industria_contribuyente[0].documento)
            $("#d_dj").text(response.industria_contribuyente[0].persona_declarante)
            $("#calidad_dj").text(response.industria_contribuyente[0].En_calidad_de)
            //industria
            var casa_central = response.industria_contribuyente[0].es_casa_central == "S" ? "SI" : "NO"
            var zona_ind = response.industria_contribuyente[0].es_zona_industrial == "S" ? "SI" : "NO"
            $("#nei_dj").text(response.industria_contribuyente[0].nombre_de_fantasia)
            $("#fiae_dj").text(response.industria_contribuyente[0].Fecha_inicio_industria)
            $("#ecc_dj").text(casa_central)
            $("#ezi_dj").text(zona_ind)
            $("#ntf_dj").text(response.industria_contribuyente[0].tel_fijo)
            $("#ntc_dj").text(response.industria_contribuyente[0].tel_celular)
            $("#cee_dj").text(response.industria_contribuyente[0].mail_industria)
            $("#lp_dj").text(response.industria_contribuyente[0].Localidad_Industria)
            $("#pw_dj").text(response.industria_contribuyente[0].pagina_web)
            $("#lu_dj").text(response.industria_contribuyente[0].latitud)
            $("#lonu_dj").text(response.industria_contribuyente[0].longitud)
            $("#cpi_dj").text(response.industria_contribuyente[0].CP_Industria)
            //actividades ,prod
            $(response.act_prod).each(function (i, v) {
                var p = v.es_actividad_principal == "S" ? "Si" : "No"
                //var m=v.motivo_importacion_Insumo == null ? "--" : v.motivo_importacion_Insumo
                //var d=v.Detalle_de_motivo_de_importacion_Insumo == null ? "--" : v.Detalle_de_motivo_de_importacion_Insumo 
                $('#tbody_act_prod_dj').append('<tr>' + '<td>' + v.actividad + '</td>' + '<td>' + p + '</td>' + '<td>' + v.observacion + '</td>' + '<td>' + v.fecha_inicio + '</td>' + '<td></td>' + '<td>' + v.Productos_Elaborados + '</td>' + '<td>' + v.Cantidad_producida + '</td>' + '<td>' + v.porcentaje_sobre_produccion + '</td>' + '<td>' + v.ventas_en_provincia + '</td>' + '<td>' + v.ventas_en_otras_provincias + '</td>' + '<td>' + v.ventas_en_el_exterior + '</td>' + '<td>' + v.anio_productos + '</td>' + '</tr>');
            })
            $(response.act_mat).each(function (i, v) {
                var p = v.es_actividad_principal == "S" ? "Si" : "No"
                var mp = v.Es_MP_propia == "S " ? "Si" : "No"
                //var d=v.Detalle_de_motivo_de_importacion_Insumo == null ? "--" : v.Detalle_de_motivo_de_importacion_Insumo 
                $('#tbody_act_mp_dj').append('<tr>' + '<td style="font-size:15px">' + v.actividad + '</td>' + '<td>' + p + '</td>' + '<td>' + v.observacion + '</td>' + '<td style="font-size:15px">' + v.fecha_inicio + '</td>' + '<td></td>' + '<td>' + v.Materia_Prima_Utilizada + '</td>' + '<td>' + v.Cantidad_MP_Anual_Utilizada + '</td>' + '<td>' + mp + '</td>' + '<td>' + v.Localidad_Origen_MP + '</td>' + '<td>' + v.Pais_Origen_MP + '</td>' + '<td>' + v.motivo_importacion_MP + '</td>' + '<td>' + v.Detalle_de_motivo_de_importacion_MP + '</td>' + '<td>' + v.anio_MP + '</td>' + '</tr>');
            })
            //insumos
            $(response.insumos).each(function (i, v) {
                var p = v.Es_insumo_propio == "P" ? "Propio" : "Adquirido"
                var m = v.motivo_importacion_Insumo == null ? "--" : v.motivo_importacion_Insumo
                var d = v.Detalle_de_motivo_de_importacion_Insumo == null ? "--" : v.Detalle_de_motivo_de_importacion_Insumo
                $('#tbody_insumos_dj').append('<tr>' + '<td>' + v.Insumos_utilizados + '</td>' + '<td>' + p + '</td>' + '<td>' + v.Localidad_Origen_Insumo + '</td>' + '<td>' + v.Pais_Origen_Insumo + '</td>' + '<td>' + m + '</td>' + '<td>' + d + '</td>' + '<td>' + v.anio_insumos + '</td>' + '</tr>');
            })
            //servicios
            $(response.servicios).each(function (i, v) {
                var m = v.motivo_importacion_Servicio == null ? "--" : v.motivo_importacion_Servicio
                var d = v.Detalle_de_motivo_de_importacion_Servicio == null ? "--" : v.Detalle_de_motivo_de_importacion_Servicio
                $('#tbody_servicios_dj').append('<tr>' + '<td>' + v.Servicio + '</td>' + '<td>' + v.cantidad_consumida + '</td>' + '<td>' + v.Costo_del_Servicio + '</td>' + '<td>' + v.frecuencia_de_contratacion_Servicio + '</td>' + '<td>' + v.Localidad_Origen_Servicio + '</td>' + '<td>' + v.Pais_Origen_Servicio + '</td>' + '<td>' + m + '</td>' + '<td>' + d + '</td>' + '<td>' + v.anio_Servicios + '</td>' + '</tr>');
            })
            //tbody_gastos_dj
            $(response.gastos).each(function (i, v) {
                $('#tbody_gastos_dj').append('<tr>' + '<td>' + v.Concepto_de_egreso + '</td>' + '<td>$' + v.importe + '</td>' + '<td>' + v.anio_egresos + '</td>' + '</tr>');
            })
            //sit planta 
            $(response.sit).each(function (i, v) {
                var m = v.Establecida_en_zona_industrial == 0 ? "No" : "Si"
                //var d=v.Detalle_de_motivo_de_importacion_Servicio == null ? "--" : v.Detalle_de_motivo_de_importacion_Servicio 
                $('#tbody_situacion_dj').append('<tr>' + '<td>' + v.produccion_sobre_capacidad + '%</td>' + '<td>' + v.superficie_lote + '</td>' + '<td>' + v.superficie_planta + '</td>' + '<td>' + m + '</td>' + '<td>$' + v.inversion_anual + '</td>' + '<td>$' + v.inversion_activo_fijo + '</td>' + '<td>' + v.capacidad_instalada + '%</td>' + '<td>' + v.capacidad_ociosa + '%</td>' + '<td>' + v.anio_situacion_De_planta + '</td>' + '</tr>');
            })
            $(response.ocios).each(function (i, v) {
                $('#tbody_mot_o_dj').append('<tr>' + '<td>' + v.motivo_ociosidad + '</td>' + '<td>' + v.anio_ociosidad + '</td>' + '</tr>');
            })
            //tbody_p_ocupado_dj
            $(response.po).each(function (i, v) {
                var s = v.sexo == "M" ? "Masculino" : "Femenino"
                //var d=v.Detalle_de_motivo_de_importacion_Servicio == null ? "--" : v.Detalle_de_motivo_de_importacion_Servicio 
                $('#tbody_p_ocupado_dj').append('<tr>' + '<td>' + v.rol_trabajador + '</td>' + '<td>' + v.condicion_laboral + '</td>' + '<td>' + s + '</td>' + '<td>' + v.numero_de_trabajadores + '</td>' + '<td>' + v.anio_rol_trabajadores + '</td>' + '</tr>');
            })
            //tbody_venta_nacional_dj
            $(response.venta_nacional).each(function (i, v) {
                $('#tbody_venta_nacional_dj').append('<tr>' + '<td>' + v.Tipo_de_Venta + '</td>' + '<td>' + v.Provincia_Destino_ventas + '</td>' + '<td>' + v.anio_destino_ventas + '</td>' + '</tr>');
            })
            //tbody_venta_nacional_dj
            $(response.venta_inter).each(function (i, v) {
                $('#tbody_venta_inter_dj').append('<tr>' + '<td>' + v.Tipo_de_Venta + '</td>' + '<td>' + v.Pais_Destino_ventas + '</td>' + '<td>' + v.anio_destino_ventas + '</td>' + '</tr>');
            })
            //facturacion
            $(response.fact).each(function (i, v) {
                $('#tbody_facturacion_dj').append('<tr>' + '<td>' + v.categoria_pyme + '</td>' + '<td>$' + v.prevision_ingresos_anio_corriente + '</td>' + '<td>' + v.prevision_ingresos_anio_corriente_dolares + 'Usd</td>' + '<td>' + v.porcentaje_prevision_mercado_interno + '%</td>' + '<td>' + v.porcentaje_prevision_mercado_externo + '%</td>' + '<td>' + v.Anio_Facturacion + '</td>' + '</tr>');
            })
            //efluente
            $(response.efluente).each(function (i, v) {
                $('#tbody_efluentes_dj').append('<tr>' + '<td>' + v.efluente + '</td>' + '<td>' + v.Tratamiento_del_Efluente + '</td>' + '<td>' + v.Destino_Efluente + '</td>' + '<td>' + v.anio_efluente + '</td>' + '</tr>');
            })
            // certificados
            $(response.certificados).each(function (i, v) {
                var vi = v.Vigencia_Certificado == "Desde: Hasta:" ? "--" : v.Vigencia_Certificado
                $('#tbody_certificados_dj').append('<tr>' + '<td>' + v.certificado + '</td>' + '<td>' + v.Estado_Certificado + '</td>' + '<td>' + vi + '</td>' + '<td>' + v.anio_certificado + '</td>' + '</tr>');
            })
            //  sistemas de calidad 
            $(response.sistemas).each(function (i, v) {
                var vi = v.Vigencia_Sistema_de_calidad == "Desde: Hasta:" ? "--" : v.Vigencia_Sistema_de_calidad
                $('#tbody_sistemas_dj').append('<tr>' + '<td>' + v.sistema_de_calidad + '</td>' + '<td>' + v.Estado_Sistema_de_calidad + '</td>' + '<td>' + vi + '</td>' + '<td>' + v.Anio_Sistema_de_calidad + '</td>' + '</tr>');
            })
            $(response.promo).each(function (i, v) {
                var vi = v.Vigencia_Promocion_industrial == "Desde: Hasta:" ? "--" : v.Vigencia_Sistema_de_calidad
                $('#tbody_promo_dj').append('<tr>' + '<td>' + v.promocion_industrial + '</td>' + '<td>' + v.Estado_Promocion_industrial + '</td>' + '<td>' + vi + '</td>' + '<td>' + v.Anio_Promocion_industrial + '</td>' + '</tr>');
            })
            $(response.eco).each(function (i, v) {
                $('#tbody_economia_dj').append('<tr>' + '<td>' + v.sector + '</td>' + '<td>' + v.Anio_Economia_del_conocimiento_sector + '</td>' + '</tr>');
            })
            $(response.perfil).each(function (i, v) {
                $('#tbody_perfil_dj').append('<tr>' + '<td>' + v.perfil + '</td>' + '<td>' + v.Anio_Economia_del_conocimiento_perfil + '</td>' + '</tr>');
            })
        }
    });
}
$(document).ready(function () {
    $("#anio_periodo_fiscal").on('change', function () {
        //.prop('selected', true)
        //$('.selDiv option[value="SEL1"]')
        //$("#periodofiscal").children("option").filter(":selected").prop('selected', false)
        //$("#periodofiscal").find('option:selected').attr('selected', false);
        //$('this option').removeAttr( "selected" )
        //$('#periodofiscal  option[value="'+$(this).val()+'"]').attr('selected', true)
        console.log($(this).val())
        $('#anio_periodo_fiscal').val($(this).val())
        $("#span_generales").click();
    })
})

/*  $(document).ready(function () {
    $("#btn_export_dj").on('click', function () {

        $.ajax({
            type: "post",
            url: "/getViewsddjj",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id: $("#id_industria_modal").val(),
                var_control:"export"
            },
            responseType: 'arraybuffer',
            success: function (data) {
                 
            }  
            });



    })
})  */

function mostrarPass(ref) {
   

    var tipo = document.getElementById(ref);
    if (tipo.type == "password") {
        $("#" + ref + "").attr('type', 'text');

        if (ref == "password") {
            $("#span_pass").text('Ocultar')
        } else {
            $("#span_pass_confirm").text('Ocultar')
        }
    } else {
        $("#" + ref + "").attr('type', 'password');
        if (ref == "password") {
            $("#span_pass").text('Mostrar')
        } else {
            $("#span_pass_confirm").text('Mostrar')
        }
    }
}

function alertDj(){
    swal("Oops", "Está seccion está en desarrollo, disculpe las molestias.", "warning");
}