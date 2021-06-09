<?php
require_once("class/class.php");
if (isset($_SESSION['acceso'])) {
    if ($_SESSION['acceso'] == "administrador" || $_SESSION["acceso"] == "operador" || $_SESSION["acceso"] == "contribuyente") {

        $tra = new Login();
        $ses = $tra->ExpiraSession();

        $c = new Login();
        $c = $c->VerificaContribuyente();

        if (isset($_POST["proceso"]) and $_POST["proceso"] == "save") {
            $reg = $tra->VerificarSolicitud();
            exit;
        }
?>
        <!DOCTYPE html>
        <html dir="ltr" lang="en">

        <head>
            <meta http-equiv="content-type" content="text/html; charset=UTF-8">
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="">
            <meta name="author" content="Ing. Ruben Chirinos">
            <!-- Favicon icon -->
            <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
            <title></title>

            <!-- Menu CSS -->
            <link href="assets/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
            <!-- toast CSS -->
            <link href="assets/plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
            <!-- Datatables CSS -->
            <link href="assets/plugins/datatables/dataTables.bootstrap4.css" rel="stylesheet">
            <!-- Sweet-Alert -->
            <link rel="stylesheet" href="assets/css/sweetalert.css">
            <!-- animation CSS -->
            <link href="assets/css/animate.css" rel="stylesheet">
            <!-- needed css -->
            <link href="assets/css/style.css" rel="stylesheet">
            <!-- color CSS -->
            <link href="assets/css/default.css" id="theme" rel="stylesheet">

            <!-- FullCalendar -->
            <link href="assets/css/fullcalendar.min.css" rel="stylesheet" />
            <link href="assets/css/calendar.css" rel="stylesheet" />
            <!-- FullCalendar -->

            <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
            <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

        </head>

        <body onLoad="muestraReloj()" class="fix-header">

            <!-- ============================================================== -->
            <!-- Preloader - style you can find in spinners.css -->
            <!-- ============================================================== -->
            <div class="preloader">
                <svg class="circular" viewBox="25 25 50 50">
                    <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
                </svg>
            </div>

            <!-- ============================================================== -->
            <!-- Main wrapper - style you can find in pages.scss -->
            <!-- ============================================================== -->
            <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-boxed-layout="full" data-boxed-layout="boxed" data-header-position="fixed" data-sidebar-position="fixed" class="mini-sidebar">


                <!--############################## MODAL PARA DETALLE DE SOLICITUD ######################################-->
                <!-- sample modal content -->
                <div id="myModalDetalle" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-dark">
                                <h4 class="modal-title text-white" id="myModalLabel"><i class="fa fa-align-justify"></i> Detalle de Solicitud</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="assets/images/close.png" /></button>
                            </div>
                            <div class="modal-body">

                                <div id="muestrasolicitudmodal"></div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-dark" data-dismiss="modal"><span class="fa fa-times-circle"></span> Cerrar</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
                <!--############################## MODAL PARA DETALLE DE SOLICITUD ######################################-->



                <!--############################## MODAL PARA VERIFICAR SOLICITUD ######################################-->
                <!-- sample modal content -->
                <div id="myModalSolicitud" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header bg-dark">
                                <h4 class="modal-title text-white" id="myModalLabel"><i class="fa fa-save"></i> Gestión de Solicitud</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="assets/images/close.png" /></button>
                            </div>

                            <form class="form form-material" method="post" action="#" name="verificasolicitud" id="verificasolicitud">

                                <div class="modal-body">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group has-feedback">
                                                <label class="control-label">Nº de Cuit: <span class="symbol required"></span></label>
                                                <input type="hidden" name="proceso" id="proceso" value="save" />
                                                <input type="hidden" name="id_rel_persona_contribuyente" id="id_rel_persona_contribuyente">
                                                <input type="hidden" name="persona" id="persona">
                                                <input type="hidden" name="contribuyente" id="contribuyente">
                                                <input type="hidden" name="empresa" id="empresa">
                                                <input type="hidden" name="email" id="email">
                                                <input type="text" class="form-control" name="cuit" id="cuit" placeholder="Ingrese Nº de Cuit" autocomplete="off" disabled="" aria-required="true" />
                                                <i class="fa fa-bolt form-control-feedback"></i>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group has-feedback">
                                                <label class="control-label">Razón Social: <span class="symbol required"></span></label>
                                                <input type="text" class="form-control" name="razon_social" id="razon_social" placeholder="Ingrese Razón Social" autocomplete="off" disabled="" aria-required="true" />
                                                <i class="fa fa-pencil form-control-feedback"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group has-feedback">
                                                <label class="control-label">Nº de Documento: <span class="symbol required"></span></label>
                                                <input type="text" class="form-control" name="documento" id="documento" placeholder="Ingrese Nº de Documento" autocomplete="off" disabled="" aria-required="true" />
                                                <i class="fa fa-bolt form-control-feedback"></i>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group has-feedback">
                                                <label class="control-label">Apellidos y Nombres: <span class="symbol required"></span></label>
                                                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese Apellidos y Nombres" autocomplete="off" disabled="" aria-required="true" />
                                                <i class="fa fa-pencil form-control-feedback"></i>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group has-feedback">
                                                <label class="control-label">Nº de Celular: <span class="symbol required"></span></label>
                                                <input type="text" class="form-control" name="tel_celular" id="tel_celular" placeholder="Ingrese Cargo de Usuario" autocomplete="off" disabled="" aria-required="true" />
                                                <i class="fa fa-mobile form-control-feedback"></i>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group has-feedback">
                                                <label class="control-label">Email Fiscal: <span class="symbol required"></span></label>
                                                <input type="text" class="form-control" name="email_fiscal" id="email_fiscal" placeholder="Ingrese Correo Electronico" autocomplete="off" disabled="" aria-required="true" />
                                                <i class="fa fa-envelope-o form-control-feedback"></i>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Status de Solicitud: <span class="symbol required"></span></label>
                                                <br>
                                                <div class="form-check form-check-inline">
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="name1" name="status" value="<?php echo "1"; ?>" onclick="MuestraObservacion();" class="custom-control-input">
                                                        <label class="custom-control-label" for="name1">APROBADA</label>
                                                    </div>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="name2" name="status" value="<?php echo "2"; ?>" onclick="MuestraObservacion();" class="custom-control-input">
                                                        <label class="custom-control-label" for="name2">RECHAZADA</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="form-group has-feedback2">
                                                <label class="control-label">Observaciones: <span class="symbol required"></span></label>
                                                <textarea class="form-control" type="text" name="observaciones_status" id="observaciones_status" autocomplete="off" placeholder="Ingrese Observaciones de Pedido"></textarea>
                                                <i class="fa fa-comment-o form-control-feedback2"></i>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <button type="submit" name="btn-submit" id="btn-submit" class="btn btn-danger"><span class="fa fa-save"></span> Guardar</button>
                                    <button class="btn btn-dark" type="button" onclick="LimpiarRadio();" data-dismiss="modal" aria-hidden="true"><span class="fa fa-trash-o"></span> Cancelar</button>
                                </div>
                            </form>

                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!--############################## MODAL PARA VERIFICAR SOLICITUD ######################################-->



                <!-- INICIO DE MENU -->
                <?php include('menu.php'); ?>
                <!-- FIN DE MENU -->


                <!-- ============================================================== -->
                <!-- Page wrapper  -->
                <!-- ============================================================== -->
                <div class="page-wrapper">
                    <!-- ============================================================== -->
                    <!-- Bread crumb and right sidebar toggle -->
                    <!-- ============================================================== -->
                    <div class="page-breadcrumb border-bottom">
                        <div class="row">
                            <div class="col-lg-3 col-md-4 col-xs-12 align-self-center">
                                <h5 class="font-medium text-uppercase mb-0"><i class="fa fa-tasks"></i> Inicio</h5>
                            </div>
                            <div class="col-lg-9 col-md-8 col-xs-12 align-self-center">
                                <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                                    <ol class="breadcrumb mb-0 justify-content-end p-0">
                                        <li class="breadcrumb-item">Control</li>
                                        <li class="breadcrumb-item active" aria-current="page"><?php echo $_SESSION['acceso'] == '  CONTRIBUYENTE' ? "Establecimientos" : "Solicitudes"; ?></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Bread crumb and right sidebar toggle -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Container fluid  -->
                    <!-- ============================================================== -->
                    <div class="page-content container-fluid">
                        <!-- ============================================================== -->
                        <!-- Start Page Content -->
                        <!-- ============================================================== -->

                        <div id="save">
                            <!-- error will be shown here ! -->
                        </div>

                        <?php if ($_SESSION['acceso'] == "administrador" || $_SESSION["acceso"] == "operador") { ?>

                            <!-- Row -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header bg-dark">
                                            <h4 class="card-title text-white"><i class="fa fa-tasks"></i> Solicitudes <a href="javascript:void(0)" class="pull-right text-white" onClick="Refrescar();"><i class="mdi mdi-refresh"></i> Refrescar</a></h4>
                                        </div>

                                        <div class="form-body">

                                            <div class="card-body">

                                                <div class="row">

                                                    <div class="col-md-7">

                                                        <div class="btn-group m-b-20">
                                                            <a class="btn waves-effect waves-light btn-light" href="reportepdf?tipo=<?php echo encrypt("SOLICITUDES") ?>" target="_blank" rel="noopener noreferrer" data-toggle="tooltip" data-placement="bottom" title="Exportar Pdf"><span class="fa fa-file-pdf-o text-dark"></span> Pdf</a>

                                                            <a class="btn waves-effect waves-light btn-light" href="reporteexcel?documento=<?php echo encrypt("EXCEL") ?>&tipo=<?php echo encrypt("SOLICITUDES") ?>" data-toggle="tooltip" data-placement="bottom" title="Exportar Excel"><span class="fa fa-file-excel-o text-dark"></span> Excel</a>

                                                            <a class="btn waves-effect waves-light btn-light" href="reporteexcel?documento=<?php echo encrypt("WORD") ?>&tipo=<?php echo encrypt("SOLICITUDES") ?>" data-toggle="tooltip" data-placement="bottom" title="Exportar Word"><span class="fa fa-file-word-o text-dark"></span> Word</a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="solicitudes"></div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Row -->

                        <?php } else { ?>

                            <!-- Row -->
                            <div class="row">
                                <div class="col-lg-9">
                                    <div class="card">
                                        <div class="card-header bg-dark">
                                            <h4 class="card-title text-white"><i class="fa fa-building"></i> Establecimientos Industriales </h4>
                                        </div>

                                        <div class="form-body">

                                            <div class="card-body">

                                                <div class="row">
                                                    <div class="table-responsive">
                                                        <table id="default_order" class="table table-striped table-bordered border display">

                                                            <thead>
                                                                <tr role="row">
                                                                    <th>N°</th>
                                                                    <th>Tipo</th>
                                                                    <th>Establecimiento</th>
                                                                    <th>Acciones</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="BusquedaRapida">

                                                                <?php
                                                                $new = new Login();
                                                                $estab = $new->ListarSeccionGeneralxCuit();
                                                                if ($estab == "") {

                                                                    echo "";
                                                                } else {

                                                                    $a = 1;
                                                                    for ($i = 0; $i < sizeof($estab); $i++) {
                                                                ?>
                                                                        <tr role="row" class="odd">
                                                                            <td><?php echo $a++; ?></td>
                                                                            <td><?php echo "ESTABLECIMIENTO INDUSTRIAL EN TRÁMITE"; ?></td>
                                                                            <td><?php echo $estab[$i]['nombre_de_fantasia']; ?> (<?php echo $estab[$i]['ref_domicilio'] . "-" . $estab[$i]['nlocalidad']; ?>)</td>
                                                                            <td>
                                                                                <span style="cursor: pointer;" title="Ver Trámite" onClick="#"><i class="mdi mdi-eye font-24 text-danger"></i></span>

                                                                                <span style="cursor: pointer;" title="Continuar Trámite" onClick="UpdateTramite('<?php echo encrypt($estab[$i]["id_industria"]); ?>','<?php echo encrypt($estab[$i]["contribuyente"]); ?>')"><i class="mdi mdi-file-multiple font-24 text-danger"></i></span>

                                                                            </td>
                                                                        </tr>
                                                                <?php }
                                                                } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                                <div class="text-left">
                                                    <?php if ($c == "" || $c[0]["proceso"] == 1) { ?>
                                                        <a href="procedimientos"><button type="button" class="btn btn-dark"><span class="fa fa-plus-circle"></span> Registrar Nuevo Establecimiento Industrial</button></a>
                                                    <?php } else { ?>
                                                        <button type="button" onclick="AlertaTramite('<?php echo encrypt($c[0]["id_industria"]); ?>');" class="btn btn-dark"><span class="fa fa-plus-circle"></span> Registrar Nuevo Establecimiento Industrial</button></a>
                                                    <?php } ?>
                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <!--</div>

                        <?php } ?>

                        <!-- ============================================================== -->
                        <!-- End PAge Content -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Right sidebar -->
                        <!-- ============================================================== -->
                        <!-- .right-sidebar -->
                        <!-- ============================================================== -->
                        <!-- End Right sidebar -->
                        <!-- ============================================================== -->
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Container fluid  -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- footer -->
                    <!-- ============================================================== -->
                    <footer class="footer text-center">
                        <i class="fa fa-copyright"></i> <span class="current-year"></span>.
                    </footer>
                    <!-- ============================================================== -->
                    <!-- End footer -->
                    <!-- ============================================================== -->
                </div>
                <!-- ============================================================== -->
                <!-- End Page wrapper  -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Wrapper -->
            <!-- ============================================================== -->


            <!-- ============================================================== -->
            <!-- All Jquery -->
            <!-- ============================================================== -->
            <script src="assets/script/jquery.min.js"></script>
            <script src="assets/js/bootstrap.js"></script>
            <!-- apps -->
            <script src="assets/js/app.min.js"></script>
            <script src="assets/js/app.init.horizontal-fullwidth.js"></script>
            <script src="assets/js/app-style-switcher.js"></script>
            <!-- slimscrollbar scrollbar JavaScript -->
            <script src="assets/js/perfect-scrollbar.js"></script>
            <script src="assets/js/sparkline.js"></script>
            <!--Wave Effects -->
            <script src="assets/js/waves.js"></script>
            <!-- Sweet-Alert -->
            <script src="assets/js/sweetalert-dev.js"></script>
            <!--Menu sidebar -->
            <script src="assets/js/sidebarmenu.js"></script>
            <!--Custom JavaScript -->
            <script src="assets/js/custom.js"></script>

            <!-- FullCalendar -->
            <script src='assets/js/moment.min.js'></script>
            <script src='assets/plugins/fullcalendar/fullcalendar.min.js'></script>
            <script src='assets/plugins/fullcalendar/locale/es.js'></script>
            <!-- FullCalendar -->

            <!-- script jquery -->
            <script type="text/javascript" src="assets/script/titulos.js"></script>
            <script type="text/javascript" src="assets/script/script2.js"></script>
            <script type="text/javascript" src="assets/script/validation.min.js"></script>
            <script type="text/javascript" src="assets/script/script.js"></script>
            <link rel="stylesheet" href="assets/calendario/jquery-ui.css" />
            <script src="assets/calendario/jquery-ui.js"></script>
            <!-- script jquery -->

            <!-- jQuery -->
            <script src="assets/plugins/noty/packaged/jquery.noty.packaged.min.js"></script>
            <script type="text/jscript">
                $('#solicitudes').append('<center><i class="fa fa-spin fa-spinner"></i> Por favor espere, cargando registros ......</center>').fadeIn("slow");
                setTimeout(function() {
                    $('#solicitudes').load("consultas?CargaSolicitudes=si");
                }, 2000);
            </script>

            <script type="text/jscript">
                $('#cargacalendario').append('<center><i class="fa fa-spin fa-spinner"></i> Por Favor Espere, Cargando Calendario ......</center>').fadeIn("slow");
                setTimeout(function() {
                    $('#cargacalendario').load("calendario");
                }, 1000);
            </script>
            <!-- jQuery -->


        </body>

        </html>

    <?php } else { ?>
        <script type='text/javascript' language='javascript'>
            alert('NO TIENES PERMISO PARA ACCEDER A ESTA PAGINA.\nCONSULTA CON EL ADMINISTRADOR PARA QUE TE DE ACCESO')
            document.location.href = 'panel'
        </script>
    <?php }
} else { ?>
    <script type='text/javascript' language='javascript'>
        alert('NO TIENES PERMISO PARA ACCEDER AL SISTEMA.\nDEBERA DE INICIAR SESION')
        document.location.href = 'logout'
    </script>
<?php } ?>