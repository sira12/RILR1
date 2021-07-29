$(document).ready(function () {
    var id_localidad
    var id_localidad2

    var id_provincia1;
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
    });//si seleccio0na uno y despues borra el seleccionado se resetean los inputs

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
    });//si seleccio0na uno y despues borra el seleccionado se resetean los inputs



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
    });//si seleccio0na uno y despues borra el seleccionado se resetean los inputs


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
    });//si seleccio0na uno y despues borra el seleccionado se resetean los inputs



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

            id_pais=null
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

            id_provincia_3=null
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

            id_pais=null
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

            id_provincia_3=null
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

            id_pais=null
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

            id_provincia_3=null
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


});

function cargar_tabla_actividades() {

    var table = $('.yajra-datatable').DataTable();


    table.destroy();
    //$('.yajra-datatable').empty();

    var id_industria = $("#id_industria_modal").val();
    table = $('.yajra-datatable').DataTable({
        processing: false,
        serverSide: true,
        searching: false,
        "ajax": {
            "url": "/listRelAct",
            "type": "POST",
            "data": {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id_industria: id_industria
            },
        },

        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { data: 'fecha_inicio', name: 'fecha_inicio' },
            { data: 'es_actividad_principal', name: 'es_actividad_principal' },
            { data: 'nomenclatura', name: 'nomenclatura' },
            { data: 'nombre_actividad', name: 'nombre_actividad' },
            {
                data: 'action',
                name: 'action',
                orderable: true,
                searchable: true
            },
        ],
        columnDefs: [


            {

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

            },
            {

                targets: 1,
                "data": "fecha_inicio",
                "render": function (data, type, row, meta) {

                    return row.fecha_inicio.replace(/^(\d{4})-(\d{2})-(\d{2})$/g, '$3-$2-$1');

                }
            },
        ]
    })

}

function cargar_tabla_otros() {

    var table = $('.yajra-table-otros').DataTable();


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
                id_industria: id_industria
            },
        },

        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { data: 'servicio_utilizado', name: 'servicio_utilizado' },
            { data: 'frecuencia', name: 'frecuencia' },
            { data: 'costo', name: 'costo' },
            { data: 'anio', name: 'anio' },
            {
                data: 'action',
                name: 'action',
                orderable: true,
                searchable: true
            },
        ],
        columnDefs: [


     
        ]
    })

}
function cargar_tabla_basicos() {

    var table = $('.yajra-table-basicos').DataTable();


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
                id_industria: id_industria
            },
                       
        },
        
        columns: [

            { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { data: 'servicio_utilizado', name: 'servicio_utilizado' },
            { data: 'frecuencia', name: 'frecuencia' },
            { data: 'costo', name: 'costo' },
            { data: 'anio', name: 'anio' },
            {
                data: 'action',
                name: 'action',
                orderable: true,
                searchable: true
            },
        ],
        columnDefs: [


            {

                targets: 1,
                "data": "servicio_utilizado",
                "render": function (data, type, row, meta) {
                    /* DEFINICION DE LAS VARIABLES: 
                     * data: es el origen de dato... lo que segun el columns obtiene.
                     * type: display (no se para que es).
                     * row: todo el object con los valores de toda la fila
                     * meta: el id de fila y columna en DT más las settings de DT */


                     $( "#boton_servicio_basico" ).prop( "disabled", true );
                    
                    return row.servicio_utilizado;
                }

            },
            
     
        ]
    })

   

    

}
function cargar_tabla_insumos() {

    $('.yajra-table-insumos').DataTable().destroy();
    

    var id_industria = $("#id_industria_modal").val();
    $('.yajra-table-insumos').DataTable({
        processing: false,
        serverSide: true,
        searching: false,
        "ajax": {
            "url": "/listInsumos",
            "type": "POST",
            "data": {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id_industria: id_industria
            },
        },

        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { data: 'insumo_utilizado', name: 'insumo_utilizado' },
            { data: 'cantidad', name: 'cantidad' },
            { data: 'unidad', name: 'unidad' },
            { data: 'anio', name: 'anio' },
            {
                data: 'action',
                name: 'action',
                orderable: true,
                searchable: true
            },
        ],
        columnDefs: [


        ],
        
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
    table = $('.yajra-datatable-materia').DataTable({
        paginate: false,
        serverSide: true,
        searching: false,
        "ajax": {
            "url": "/listmatprima",
            "type": "POST",
            "data": {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id_rel_industria_actividad_materia_prima: id_asignacion_producto
            },
        },

        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { data: 'nombre_materia_prima', name: 'nombre_materia_prima' },
            { data: 'cantidad', name: 'cantidad' },
            { data: 'unidad_de_medida', name: 'unidad_de_medida' },


            {
                data: 'action',
                name: 'action',
                orderable: true,
                searchable: true
            },
        ],
        columnDefs: [

        ]
    })

}


function cargar_tabla_productos() {

    var table = $('.yajra-datatable-productos').DataTable();


    table.destroy();
    //$('.yajra-datatable').empty();

    var id_asignacion_producto = $("#id_asignacion_producto").val();
    table = $('.yajra-datatable-productos').DataTable({
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

        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { data: 'nombre_producto', name: 'nombre_producto' },
            { data: 'unidad_de_medida', name: 'unidad_de_medida' },
            { data: 'cantidad_producida', name: 'cantidad_producida' },
            { data: 'porcentaje_sobre_produccion', name: 'porcentaje_sobre_produccion' },
            {
                data: 'action',
                name: 'action',
                orderable: true,
                searchable: true
            },
        ],
        columnDefs: [

        ]
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

        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { data: 'nombre_producto', name: 'nombre_producto' },
            { data: 'unidad_de_medida', name: 'unidad_de_medida' },
            { data: 'cantidad_producida', name: 'cantidad_producida' },
            { data: 'porcentaje_sobre_produccion', name: 'porcentaje_sobre_produccion' },
            {
                data: 'action',
                name: 'action',
                orderable: true,
                searchable: true
            },
        ],
        columnDefs: [

        ]
    })

}


function cargar_tabla_combustible() {

    var table = $('.yajra-datatable-combustible').DataTable();


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
                id_industria: id_industria
            },
        },
        
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { data: 'servicio_utilizado', name: 'servicio_utilizado' },
            { data: 'frecuencia', name: 'frecuencia' },
            { data: 'unidad', name: 'unidad' },
            { data: 'costo', name: 'costo' },
            { data: 'anio', name: 'anio' },
            {
                data: 'action',
                name: 'action',
                orderable: true,
                searchable: true
            },
        ],
        columnDefs: [

        ]
    })

}

function cargar_tabla_gastos() {

    var table = $('.yajra-table-gastos').DataTable();


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
                id_industria: id_industria
            },
        },
        
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { data: 'egreso', name: 'egreso' },
            { data: 'importe', name: 'importe' },
            { data: 'anio', name: 'anio' },
            {
                data: 'action',
                name: 'action',
                orderable: true,
                searchable: true
            },
        ],
        columnDefs: [

            {

                targets: 1,
                "data": "egreso",
                "render": function (data, type, row, meta) {
                    /* DEFINICION DE LAS VARIABLES: 
                     * data: es el origen de dato... lo que segun el columns obtiene.
                     * type: display (no se para que es).
                     * row: todo el object con los valores de toda la fila
                     * meta: el id de fila y columna en DT más las settings de DT */


                     $( "#agregar_egreso" ).prop( "disabled", true );
                    
                    return row.egreso;
                }

            },

        ]
    })

}


function cargar_tabla_splanta() {


    var table = $('.tabla_splanta').DataTable();


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
                id_industria: id_industria
            },
        },
        
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { data: 'produccion_sobre_capacidad', name: 'produccion_sobre_capacidad' },
            { data: 'superficie_lote', name: 'superficie_lote' },
            { data: 'superficie_planta', name: 'superficie_planta' },
            { data: 'capacidad_instalada', name: 'capacidad_instalada' },
            { data: 'capacidad_ociosa', name: 'capacidad_ociosa' },
            { data: 'anio', name: 'anio' },
            
            {
                data: 'action',
                name: 'action',
                orderable: true,
                searchable: true
            },
        ],
        columnDefs: [

           

        ]
    })

}

function cargar_tabla_motivo_ociosidad() {


    var table = $('.tabla_mo').DataTable();


    table.destroy();
    //$('.yajra-datatable').empty();

    var id_industria = $("#id_industria_modal").val();
    table = $('.tabla_mo').DataTable({
        processing: false,
        serverSide: true,
        searching: false,
        "ajax": {
            "url": "/listRelMO",
            "type": "POST",
            "data": {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id_industria: id_industria
            },
        },
        
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { data: 'motivo_ociosidad', name: 'motivo_ociosidad' },
            
            { data: 'anio', name: 'anio' },
            
            {
                data: 'action',
                name: 'action',
                orderable: true,
                searchable: true
            },
        ],
        columnDefs: [

           

        ]
    })

}

function cargar_tabla_p_o_m() {


    var table = $('.tabla_po_m').DataTable();


    table.destroy();
    //$('.yajra-datatable').empty();

    var id_industria = $("#id_industria_modal").val();
    table = $('.tabla_po_m').DataTable({
        processing: false,
        serverSide: true,
        searching: false,
        order: [[ 1,'asc']],
        "ajax": {
            "url": "/listRelTrabajador",
            "type": "POST",
            "data": {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id_industria: id_industria
            },
        },
        
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { data: 'rol_trabajador', name: 'rol_trabajador' },
            { data: 'numero_de_trabajadores', name: 'numero_de_trabajadores' },
            { data: 'condicion_laboral', name: 'condicion_laboral' },
            { data: 'anio', name: 'anio' },            
            {
                data: 'action',
                name: 'action',
                orderable: true,
                searchable: true
            }, 
        ],
        columnDefs: [

            {

                targets: 3,
                "data": "condicion_laboral",
                "render": function (data, type, row, meta) {
                    /* DEFINICION DE LAS VARIABLES: 
                     * data: es el origen de dato... lo que segun el columns obtiene.
                     * type: display (no se para que es).
                     * row: todo el object con los valores de toda la fila
                     * meta: el id de fila y columna en DT más las settings de DT */
                     if(row.condicion_laboral == "Temporal"){
                        var a='<span class="badge badge-primary">'+row.condicion_laboral+'</span>'
                     }else{
                         var a='<span class="badge badge-success">'+row.condicion_laboral+'</span>'
                     }
                     
                    
                    
                    return a; 
                }

            },

        ]
    })

}


function cargar_tabla_p_o_f() {


    var table = $('.tabla_po_f').DataTable();


    table.destroy();
    //$('.yajra-datatable').empty();

    var id_industria = $("#id_industria_modal").val();
    table = $('.tabla_po_f').DataTable({
        processing: false,
        serverSide: true,
        searching: false,
        order: [[ 1,'asc']],
        "ajax": {
            "url": "/listRelTrabajadorF",
            "type": "POST",
            "data": {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id_industria: id_industria
            },
        },
        
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { data: 'rol_trabajador', name: 'rol_trabajador' },
            { data: 'numero_de_trabajadores', name: 'numero_de_trabajadores' },
            { data: 'condicion_laboral', name: 'condicion_laboral' },
            { data: 'anio', name: 'anio' },            
            {
                data: 'action',
                name: 'action',
                orderable: true,
                searchable: true
            }, 
        ],
        columnDefs: [

            {

                targets: 3,
                "data": "condicion_laboral",
                "render": function (data, type, row, meta) {
                    /* DEFINICION DE LAS VARIABLES: 
                     * data: es el origen de dato... lo que segun el columns obtiene.
                     * type: display (no se para que es).
                     * row: todo el object con los valores de toda la fila
                     * meta: el id de fila y columna en DT más las settings de DT */
                     if(row.condicion_laboral == "Temporal"){
                        var a='<span class="badge badge-primary">'+row.condicion_laboral+'</span>'
                     }else{
                         var a='<span class="badge badge-success">'+row.condicion_laboral+'</span>'
                     }
                     
                    
                    
                    return a; 
                }

            },

        ]
    })

}

function cargar_tabla_ventas() {


    var table = $('.table_ventas').DataTable();


    table.destroy();
    //$('.yajra-datatable').empty();

    var id_industria = $("#id_industria_modal").val();
    table = $('.table_ventas').DataTable({
        processing: false,
        serverSide: true,
        searching: false,
        "ajax": {
            "url": "/listVentas",
            "type": "POST",
            "data": {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id_industria: id_industria
            },
        },
        
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { data: 'clasificacion_ventas', name: 'clasificacion_ventas' },
            { data: 'provincias', name: 'provincias' },
            { data: 'paises', name: 'paises' },
            { data: 'anio', name: 'anio' },
            
            {
                data: 'action',
                name: 'action',
                orderable: true,
                searchable: true
            },
        ],
        columnDefs: [

           {

                targets: 2,
                "data": "provincias",
                "render": function (data, type, row, meta) {
                    /* DEFINICION DE LAS VARIABLES: 
                     * data: es el origen de dato... lo que segun el columns obtiene.
                     * type: display (no se para que es).
                     * row: todo el object con los valores de toda la fila
                     * meta: el id de fila y columna en DT más las settings de DT */
                    
                        var provincias="";
                        var cont =row.provincias.length;
                        var cnt=0;
                        row.provincias.forEach( function(element, index) {
                            cnt+=1;
                            provincias+=element.provincia


                            if(cnt < cont){
                                provincias+=","
                            }
                        });
                    
                    
                    return provincias; 
                }

            },
            {

                targets: 3,
                "data": "paises",
                "render": function (data, type, row, meta) {
                    /* DEFINICION DE LAS VARIABLES: 
                     * data: es el origen de dato... lo que segun el columns obtiene.
                     * type: display (no se para que es).
                     * row: todo el object con los valores de toda la fila
                     * meta: el id de fila y columna en DT más las settings de DT */
                    
                    var paises="";
                        var cont =row.paises.length;
                        var cnt=0;
                        row.paises.forEach( function(element, index) {
                            cnt+=1;
                            paises+=element.pais


                            if(cnt < cont){
                                paises+=","
                            }
                        });
                    
                    
                    return paises; 
                }

            },


        ]
    })
}

function cargar_tabla_fact() {


    var table = $('.table_facturacion').DataTable();
    table.destroy();
    //$('.yajra-datatable').empty();

    var id_industria = $("#id_industria_modal").val();
    table = $('.table_facturacion').DataTable({
        processing: false,
        serverSide: true,
        searching: false,
        "ajax": {
            "url": "/listFact",
            "type": "POST",
            "data": {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id_industria: id_industria
            },
        },
        
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { data: 'prevision_ingresos_anio_corriente', name: 'prevision_ingresos_anio_corriente' },
            { data: 'prevision_ingresos_anio_corriente_dolares', name: 'prevision_ingresos_anio_corriente_dolares' },
            { data: 'porcentaje_prevision_mercado_interno', name: 'porcentaje_prevision_mercado_interno' },
            { data: 'porcentaje_prevision_mercado_externo', name: 'porcentaje_prevision_mercado_externo' },
            { data: 'categoria', name: 'categoria' },
            { data: 'anio', name: 'anio' },
            
            {
                data: 'action',
                name: 'action',
                orderable: true,
                searchable: true
            },
        ],
        columnDefs: [

           

        ]
    })}

function cargar_clasif_ingresos(){

    $.ajax({
        type: "post",
        url: "/ClasifIngresos",
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
        },
        success: function (response) {


            $("#clasif_ingreso").find("option").remove();


             $('#clasif_ingreso').append('<option value="">-- SELECCIONE --</option>');
       
            $(response).each(function (i, v) {
      
            
                $('#clasif_ingreso').append('<option value="' + v.id_categoria_ingreso + '">' + v.categoria +" | Desde: $"+ v.monto_minimo+"   | Hasta: $"+v.monto_maximo +'</option>');
            })           
            
        }
    }); 

}

function btn_cancelar_venta(){
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

         $("#clasif_venta").prop('disabled',false)

      
         $('#ventas_provincias').prop('disabled',false)
         $('#ventas_paises').prop('disabled',false)

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




$(document).ready(function() {
    //set initial state.
    

    $("#check_otro").change(function(){

    $('#check_otro').val(this.checked);

  

    if($('#check_otro').val() == "true"){
       
         $(".selectMotivo").hide("slow");
         $("#id_motivo_ociosidad").val("");
         $(".motivoNuevo").show( "fast");
    }else{
        $(".selectMotivo").show("fast");
        $(".motivoNuevo").hide("slow");
    }


});

});
function getTramite(){

     

    if($("#id_industria_modal").val() != undefined && $("#id_industria_modal").val() !="" ){
        console.log("modal",$("#id_industria_modal").val())


        $.ajax({
            type: "get",
            url: "/tramite/"+$("#id_industria_modal").val(),
            success: function (response) {
                
                
            }
        });



    }
}

function lanzador(){
    muestraReloj(); 

    getTramite();
   
}




function getClasificacionVentas(){
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



function getProvinciasVentas(){
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

function getPaisesVentas(){
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


            $('#thead_p_o').append(

                '<tr role="row">'+
                    '<th>Condición Laboral <span class="symbol required"></span></th>'+
                    '<th>Masculino <span class="symbol required"></span></th>'+
                    '<th>Femenino <span class="symbol required"></span></th>'+
                '</tr>'

            )
            
       
            $(response).each(function (i, v) {
            
                $('#p_o').append(

                    '<tr role="row" class="odd">'+
                        '<td><input type="hidden" name="id_condicion_laboral[]" value="'+v.id_condicion_laboral+'" />'+v.condicion_laboral+'</label></td>'+

                        '<td class="text-center"><input type="number" min="0" value="0" class="form-control" name="masculino[]"  placeholder="Ingrese Cantidad Masculino" autocomplete="off" style="width:100%;height:40px;background:#f0f9fc;border-radius:5px 5px 5px 5px;"></td>'+

                        '<td class="text-center"><input type="number" min="0" value="0" class="form-control" name="femenino[]"  placeholder="Ingrese Cantidad Femenino" autocomplete="off" style="width:100%;height:40px;background:#f0f9fc;border-radius:5px 5px 5px 5px;"></td>'+
                    '</tr>'



                );
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

                 
               
                $("#rol_trabajador").append('<option value="' + v.id_rol_trabajador+ '">' + v.rol_trabajador + '</option>');
            })
        }
    });
}


function trae_motivo_ociosidad(){
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



