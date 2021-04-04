$(document).ready(function () {
    var id_localidad
    var id_localidad2


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
                    id_loc:id_localidad

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
                    id_loc:id_localidad

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


     //zona administrativa

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
                    id_loc:id_localidad2

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
                    id_loc:id_localidad2

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

     $("#buscar_localidad2").change(function () {

        if ($("#buscar_localidad2").val().length < 1) {
            //limpiar id localidad, barrio, calle
            console.log("asdasd");

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
            console.log("asdasd");


            $('#id_calle_administracion').val("")


            $('#buscar_calle2').val("");
            //$("#btn-submit").prop("disabled", true);

        } else {
            //$("#buscar_barrio").prop("disabled", false);
            $("#buscar_calle2").prop("disabled", false);
            //$("#btn-submit").prop("disabled", false);
        }


    })

    //zona administrativa

    $("#buscar_localidad").change(function () {

        if ($("#buscar_localidad").val().length < 1) {
            //limpiar id localidad, barrio, calle
            console.log("asdasd");

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
            console.log("asdasd");


            $('#id_calle').val("")


            $('#search_calle').val("");
            $("#btn-submit").prop("disabled", true);

        } else {
            //$("#search_barrio").prop("disabled", false);
            $("#search_calle").prop("disabled", false);
            $("#btn-submit").prop("disabled", false);
        }


    })


});
