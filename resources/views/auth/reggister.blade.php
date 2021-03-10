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
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png') }}">
    <title></title>

    <!-- Menu CSS -->
    <link href="{{ asset('assets/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css') }}" rel="stylesheet">
    <!-- timepicker CSS -->
    <link href="{{ asset('assets/plugins/timepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet">
    <!-- toast CSS -->
    <link href="{{ asset('assets/plugins/bower_components/toast-master/css/jquery.toast.css')}}" rel="stylesheet">
    <!-- Sweet-Alert -->
    <link rel="stylesheet" href="{{ asset('assets/css/sweetalert.css')}}">
    <!-- animation CSS -->
    <link href="{{ asset('assets/css/animate.css')}}" rel="stylesheet">
    <!-- needed css -->
    <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet">
    <!-- color CSS -->
    <link href="{{ asset('assets/css/default.css')}}" id="theme" rel="stylesheet">

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
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-boxed-layout="full" data-header-position="fixed" data-sidebar-position="fixed" class="mini-sidebar">


        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="javascript:void(0)">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="{{ asset('fotos/logo-principal.png')}}" width="170" height="58" alt="Logo Principal" class="dark-logo">
                        </b>
                        <!--End Logo icon -->
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin6">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->

                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>

                        <!-- Reloj start-->
                        <li class="nav-item dropdown mega-dropdown d-none d-lg-block">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark hour card-subtitle" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="hidden-xs"><span id="spanreloj"></span></span>
                            </a>
                        </li>
                        <!-- Reloj end -->

                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">


                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle waves-effect waves-dark pro-pic d-flex mt-2 pr-0 leading-none simple" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                <span class="ml-2 d-lg-block">
                                    <h5 class="card-subtitle mb-0"></h5>
                                    <small class="text-info mb-0"></small>
                                </span>
                            </a>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">

                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->


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
                        <h5 class="font-medium text-uppercase mb-0"><i class="fa fa-tasks"></i> Nuevo Registro</h5>
                    </div>
                    <div class="col-lg-9 col-md-8 col-xs-12 align-self-center">
                        <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                            <ol class="breadcrumb mb-0 justify-content-end p-0">
                                <li class="breadcrumb-item active" aria-current="page">Si ya posee una cuenta, <a href="index">ingrese aqui</a></li>
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

                <form class="form form-material" method="post" action="#" name="saveinicio" id="saveinicio" enctype="multipart/form-data">
                @csrf
                    <!-- Row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header bg-dark">
                                    <h4 class="card-title text-white"><i class="fa fa-tasks"></i> Nuevo Registro</h4>
                                </div>

                                <div id="save">
                                    <!-- error will be shown here ! -->
                                </div>

                                <div class="form-body">

                                    <div class="card-body">

                                        <h3 class="card-subtitle m-0"><i class="fa fa-bank"></i> Datos de la Empresa</h3>
                                        <hr>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">CUIT/CUIL: <span class="symbol required"></span></label>
                                                    <input type="hidden" name="proceso" id="proceso" value="save" />
                                                    <input type="text" class="form-control" name="cuit" id="cuit" placeholder="Ingrese Nº de CUIT/CUIL" autocomplete="off" required="" aria-required="true" />
                                                    <i class="fa fa-bolt form-control-feedback"></i>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Nombre/Razón Social: <span class="symbol required"></span></label>
                                                    <input type="text" class="form-control" name="razonsocial" id="razonsocial" placeholder="Ingrese Nombre/Razón Social" autocomplete="off" required="" aria-required="true" />
                                                    <i class="fa fa-pencil form-control-feedback"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Nombre de Barrio: <span style="cursor: pointer;" class="mdi mdi-alert-circle text-danger" data-container="body" title="Notificación: Ingrese Nombre de Barrio y seleccione en el Listado que se mostrará, en caso de no aparecer, escribala y el sistema se encargará de la asignación del mismo."></span><span class="symbol required"></span></label>
                                                    <input type="hidden" name="id_barrio" id="id_barrio" />
                                                    <input type="text" class="form-control" name="search_barrio" id="search_barrio" onchange="getBarrios(value)" placeholder="Ingrese Nombre de Barrio" autocomplete="off" required="" aria-required="true" />
                                                    <i class="fa fa-search form-control-feedback"></i>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Nombre de Calle: <span style="cursor: pointer;" class="mdi mdi-alert-circle text-danger" data-container="body" title="Notificación: Ingrese Nombre de Calle y seleccione en el Listado que se mostrará, en caso de no aparecer, escribala y el sistema se encargará de la asignación del mismo."></span><span class="symbol required"></span></label>
                                                    <input type="hidden" name="id_calle" id="id_calle" />
                                                    <input type="text" class="form-control" name="search_calle" id="search_calle" placeholder="Ingrese Nombre de Calle" autocomplete="off" required="" aria-required="true" />
                                                    <i class="fa fa-search form-control-feedback"></i>
                                                </div>
                                            </div>
                                        </div>


                                        <h3 class="card-subtitle m-0"><i class="fa fa-user"></i> Datos de Contacto</h3>
                                        <hr>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Apellido y Nombre: <span class="symbol required"></span></label>
                                                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese Apellido y Nombre" autocomplete="off" required="" aria-required="true" />
                                                    <i class="fa fa-bolt form-control-feedback"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Relación con la Industria: <span class="symbol required"></span></label>
                                                    <i class="fa fa-bars form-control-feedback"></i>
                                                    <select name="id_tipo_de_afectacion" id="id_tipo_de_afectacion" <!--onChange="TipoAfectacion(this.form.id_tipo_de_afectacion.value);" class="form-control" required="" aria-required="true">
                                                        <option value=""> -- SELECCIONE -- </option>
                                                        @foreach($afectacion as $afect)
                                                        <option value="{{$afect->id_tipo_de_afectacion}}">{{$afect->tipo_de_afectacion}}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Tipo de Documento: <span class="symbol required"></span></label>
                                                    <i class="fa fa-bars form-control-feedback"></i>
                                                    <select name="id_tipo_de_documento" id="id_tipo_de_documento" class="form-control" required="" aria-required="true">
                                                        <option value=""> -- SELECCIONE -- </option>
                                                        @foreach($tipo_doc as $tipo)
                                                        <option value="{{$tipo->id_tipo_de_documento}}">{{$tipo->tipo_de_documento}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Nº de Documento: <span class="symbol required"></span></label>
                                                    <input type="text" class="form-control" name="documento" id="documento" placeholder="Ingrese Nº Documento" autocomplete="off" required="" aria-required="true" />
                                                    <i class="fa fa-bolt form-control-feedback"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Email Fiscal : <span style="cursor: pointer;" class="mdi mdi-alert-circle text-danger" data-container="body" title="Notificación: Se usará este medio para Remitir Comprobantes, notificaciones, etc"></span><span class="symbol required"></span></label>
                                                    <input type="text" class="form-control" name="email_fiscal" id="email_fiscal" placeholder="Ingrese Correo Electrónico" autocomplete="off" required="" aria-required="true" />
                                                    <i class="fa fa-envelope-o form-control-feedback"></i>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Nº de Celular: <span class="symbol required"></span></label>
                                                    <input type="text" class="form-control" name="tel_celular" id="tel_celular" placeholder="Ingrese Nº de Celular" autocomplete="off" required="" aria-required="true" />
                                                    <i class="fa fa-phone form-control-feedback"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="documento_apoderado"></div>

                                        <h3 class="card-subtitle"><i class="fa fa-envelope-square"></i> Datos de la Cuenta</h3>
                                        <hr>

                                        <div class="alert alert-success text-center" role="alert">
                                            <h4>
                                                <span class='fa fa-warning'></span> Por favor recuerde o guarde en un lugar seguro la siguiente contraseña porque luego será necesaria para ingresar al sistema.
                                            </h4>
                                        </div>


                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group has-feedback">
                                                    <div class="campo">
                                                        <label class="control-label">Ingrese Contraseña: <a class="symbol required"></a></label>
                                                        <input class="form-control" type="password" placeholder="Ingrese Contraseña" name="password" id="password" autocomplete="off" required="" aria-required="true"><span>Mostrar</span>
                                                    </div>
                                                    <i class="fa fa-key form-control-feedback"></i>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group has-feedback">
                                                    <div class="campo2">
                                                        <label class="control-label">Repita Contraseña: <a class="symbol required"></a></label>
                                                        <input type="password" class="form-control" name="password2" id="password2" placeholder="Repita Contraseña" autocomplete="off" required="" aria-required="true" /><span>Mostrar</span>
                                                    </div>
                                                    <i class="fa fa-key form-control-feedback"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group has-feedback">
                                                    <a tabindex="-1" style="border-style: none;" href="#" title="Refrescar Imagen" onClick="document.getElementById('siimage').src = 'assets/captcha/securimage_show.php?sid=' + Math.random(); this.blur(); return false"><img id="siimage" name="siimage" style="border: 1px solid #CCCCCC; margin-right: 5px" src="assets/captcha/securimage_show.php?sid=<?php echo md5(uniqid()) ?>" onClick="this.blur()" alt="CAPTCHA Image" width="170" height="65" align="left"></a>
                                                    <label><a tabindex="-1" style="border-style: none;" href="#" title="Refrescar Imagen" onClick="document.getElementById('siimage').src = 'assets/captcha/securimage_show.php?sid=' + Math.random(); this.blur(); return false"><img src="assets/images/refresh.png" width="12" height="12"></a> Ingrese Código: <span class="symbol required"></span></label><br /><input type="text" class="form-control" name="captcha1" id="captcha1" autocomplete="off" style="width:180px;height:40px;background:#f2f2f2;color:#181818;border-radius:5px 5px 5px 5px;" placeholder="Ingrese Código" required />
                                                </div>
                                            </div>
                                        </div>
                                        <h4 class="text-blue">Ingrese el texto de la imagen (respetando mayúsculas y minúsculas)</h4>

                                        <div class="alert alert-success text-justify" role="alert">
                                            <h5><span class='fa fa-warning'></span> El Registro ingresado sera validado por nuestros Operadores dentro de las 48 hr de ingresado. Dicha resolución será comunicada al email consignado para continuar con la carga de datos.
                                            </h5>
                                        </div>


                                        <div class="text-right">
                                            <button type="submit" name="btn-submit" id="btn-submit" class="btn btn-danger"><span class="fa fa-save"></span> Crear Cuenta</button>
                                            <button class="btn btn-dark" type="reset"><span class="fa fa-trash-o"></span> Limpiar</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Row -->

                </form>


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
    <script src="{{ asset('assets/script/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/js/popper.min.js')}}"></script>
    <script src="{{ asset('assets/js/bootstrap.js')}}"></script>
    <!-- apps -->
    <script src="{{ asset('assets/js/app.min.js')}}"></script>
    <script src="{{ asset('assets/js/app.init.horizontal-fullwidth.js')}}"></script>
    <script src="{{ asset('assets/js/app-style-switcher.js')}}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('assets/js/perfect-scrollbar.js')}}"></script>
    <script src="{{ asset('assets/js/sparkline.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('assets/js/waves.js')}}"></script>
    <!-- Sweet-Alert -->
    <script src="{{ asset('assets/js/sweetalert-dev.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('assets/js/sidebarmenu.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('assets/js/custom.js')}}"></script>

    <!-- Custom file upload -->
    <script src="{{ asset('assets/plugins/fileupload/bootstrap-fileupload.min.js')}}"></script>

    <!-- script jquery -->
    <script type="text/javascript" src="{{ asset('assets/script/titulos.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/inputmask.bundle.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/script/mask.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/script/password.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/script/script2.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/script/validation.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/script/script.js')}}"></script>
    <!-- script jquery -->

    <!-- Calendario -->
    <link rel="stylesheet" href="{{ asset('assets/calendario/jquery-ui.css')}}" />
    <script src="{{ asset('assets/calendario/jquery-ui.js')}}"></script>
    <script src="{{ asset('assets/script/jscalendario.js')}}"></script>
    <script src="{{ asset('assets/script/autocompleto.js')}}"></script>
    <!-- Calendario -->

    <!-- jQuery -->
    <script src="{{ asset('assets/plugins/noty/packaged/jquery.noty.packaged.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/timepicker/jquery-ui-timepicker-addon.js')}}"></script>
    <!-- jQuery -->


    <script type="text/javascript">
       function getBarrios(value){

        $.ajax({
                    url: "{{ url('/barrios') }}",
                    type:'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        value
                    },
                    success: function(data) {
                       response(data)
                    }
                });
       }
    </script>

</body>

</html>