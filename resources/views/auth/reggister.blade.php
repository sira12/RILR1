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

<meta name="csrf-token" content="{{ csrf_token() }}">

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
                                <li class="breadcrumb-item active" aria-current="page">Si ya posee una cuenta, <a href="{{ route('login') }}">ingrese aqui</a></li>
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

                <form class="form form-material"  name="saveinicio" id="saveinicio" enctype="multipart/form-data" autocomplete="nope">
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
                                            <div class="col-md-4">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">CUIT/CUIL: <span class="symbol required"></span></label>
                                                    <input type="hidden" name="proceso" id="proceso" value="save" />
                                                    <input type="text" class="form-control" pattern="[0-9]+" class="@error('cuit') is-invalid @enderror" name="cuit" id="cuit" maxlength="11" placeholder="Ingrese Nº de CUIT/CUIL" autocomplete="off" />
                                                    <i class="fa fa-bolt form-control-feedback"></i>


                                                    @error('cuit')

                                                    <div class="alert alert-danger alert-dismissable">
                                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                        {{ $message }}
                                                    </div>

                                                    @enderror
                                                </div>

                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Nombre/Razón Social: <span class="symbol required"></span></label>
                                                    <input type="text" class="form-control" class="@error('razonsocial') is-invalid @enderror" name="razonsocial" id="razonsocial" placeholder="Ingrese Nombre/Razón Social" autocomplete="off" required="" aria-required="true" />
                                                    <i class="fa fa-pencil form-control-feedback"></i>

                                                    @error('razonsocial')

                                                    <div class="alert alert-danger alert-dismissable">
                                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                        {{ $message }}
                                                    </div>

                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Personeria: <span class="symbol required"></span></label>
                                                    <i class="fa fa-bars form-control-feedback"></i>
                                                    <select name="tipo_personeria" id="tipo_personeria" class="form-control" required="" aria-required="true">
                                                        <option value=""> -- SELECCIONE -- </option>
                                                        @foreach($personaJuridica as $persona)
                                                        
                                                        <option value="{{$persona->id_persona_juridica}}">{{$persona->persona_juridica}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>




                                        <h3 class="card-subtitle m-0"><i class="fa fa-user"></i> Datos de Contacto</h3>
                                        <hr>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Apellido y Nombre: <span class="symbol required"></span></label>
                                                    <input type="text" class="form-control" class="@error('nombre') is-invalid @enderror" name="nombre" id="nombre" placeholder="Ingrese Apellido y Nombre" autocomplete="off" required="" aria-required="true" />
                                                    <i class="fa fa-bolt form-control-feedback"></i>


                                                    @error('nombre')

                                                    <div class="alert alert-danger alert-dismissable">
                                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                        {{ $message }}
                                                    </div>

                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Provincia <span style="cursor: pointer;" class="mdi mdi-alert-circle text-danger" data-container="body" title="asd"></span><span class="symbol required"></span></label>
                                                   {{--  <input type="hidden" name="id_provincia" id="id_provincia" />
                                                    <input type="text" class="form-control" name="search_provincia" id="search_provincia" placeholder="Ingrese Nombre de provincia" autocomplete="nope" required="" aria-required="true"/> --}}
                                                    <i class="fa fa-search form-control-feedback"></i>
                                                    
                                                    <select name="id_provincia" id="id_provincia" class="form-control" required="" aria-required="true">
                                                        <option value=""> -- SELECCIONE -- </option>
                                                        @foreach($provincias as $prov)
                                                        
                                                        <option value="{{$prov->id_provincia}}">{{$prov->provincia}}</option>
                                                        @endforeach
                                                    </select>
                                                
                                                
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Localidad <span style="cursor: pointer;" class="mdi mdi-alert-circle text-danger" data-container="body"></span><span class="symbol required"></span></label>
                                                    <input type="hidden" name="id_localidad" id="id_localidad" />
                                                    <input  type="text" class="form-control" name="search_localidad" id="search_localidad" disabled placeholder="Ingrese Nombre de localidad" autocomplete="nope" required="" aria-required="true" />
                                                    <i class="fa fa-search form-control-feedback"></i>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Nombre de Barrio: <span style="cursor: pointer;" class="mdi mdi-alert-circle text-danger" data-container="body" title="Notificación: Ingrese Nombre de Barrio y seleccione en el Listado que se mostrará, en caso de no aparecer, escribala y el sistema se encargará de la asignación del mismo."></span><span class="symbol required"></span></label>
                                                    <input type="hidden" name="id_barrio" id="id_barrio" />
                                                    <input  type="text" class="form-control" name="search_barrio" id="search_barrio" disabled placeholder="Ingrese Nombre de Barrio"  required="" aria-required="true"  autocomplete="nope" />
                                                    <i class="fa fa-search form-control-feedback"></i>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Nombre de Calle: <span style="cursor: pointer;" class="mdi mdi-alert-circle text-danger" data-container="body" title="Notificación: Ingrese Nombre de Calle y seleccione en el Listado que se mostrará, en caso de no aparecer, escribala y el sistema se encargará de la asignación del mismo."></span><span class="symbol required"></span></label>
                                                    <input type="hidden" name="id_calle" id="id_calle" />
                                                    <input type="text" class="form-control" name="search_calle" id="search_calle" disabled placeholder="Ingrese Nombre de Calle" required="" aria-required="true"  autocomplete="nope" />
                                                    <i class="fa fa-search form-control-feedback"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">

                                        </div>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">N° Calle: <span style="cursor: pointer;" class="mdi mdi-alert-circle text-danger" data-container="body"></label>

                                                    <input type="number" class="form-control" name="nro_calle" id="nro_calle" placeholder="Ingrese Numero de Calle" autocomplete="off" aria-required="true" />
                                                    <i class="fa fa-pencil form-control-feedback"></i>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">N° Piso: <span style="cursor: pointer;" class="mdi mdi-alert-circle text-danger" data-container="body"></label>

                                                    <input type="number" class="form-control" name="nro_piso" id="nro_piso" placeholder="Ingrese Numero de Piso" autocomplete="off" aria-required="true" />
                                                    <i class="fa fa-pencil form-control-feedback"></i>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">N° de Departamento: <span style="cursor: pointer;" class="mdi mdi-alert-circle text-danger" data-container="body"></label>

                                                    <input type="number" class="form-control" name="nro_departamento" id="nro_departamento" placeholder="Ingrese Numero de Departamento" autocomplete="off" aria-required="true" />
                                                    <i class="fa fa-pencil form-control-feedback"></i>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Referencia: <span style="cursor: pointer;" class="mdi mdi-alert-circle text-danger" data-container="body"></label>
                                                    <input type="text" class="form-control" name="referencia" id="referencia" placeholder="Ingrese una referencia" autocomplete="off" aria-required="true" />
                                                    <i class="fa fa-pencil form-control-feedback"></i>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Relación con la Industria: <span class="symbol required"></span></label>
                                                    <i class="fa fa-bars form-control-feedback"></i>
                                                    <select name="id_tipo_de_afectacion" id="id_tipo_de_afectacion" class="form-control" required="" aria-required="true">
                                                        <option value=""> -- SELECCIONE -- </option>
                                                        @foreach($afectacion as $afect)
                                                        <option value="{{$afect->id_tipo_de_afectacion}}">{{$afect->tipo_de_afectacion}}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
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

                                            <div class="col-md-3">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Nº de Documento: <span class="symbol required"></span></label>
                                                    <input type="text" class="form-control" class="@error('documento') is-invalid @enderror" name="documento" id="documento" placeholder="Ingrese Nº Documento" autocomplete="off" required="" aria-required="true" />
                                                    <i class="fa fa-bolt form-control-feedback"></i>


                                                    @error('documento')

                                                    <div class="alert alert-danger alert-dismissable">
                                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                        {{ $message }}
                                                    </div>

                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Nº de Celular: <span class="symbol required"></span></label>
                                                    <input type="text" class="form-control" class="@error('celular') is-invalid @enderror" name="celular" id="celular" placeholder="Ingrese Nº de Celular" autocomplete="off" required="" aria-required="true" />
                                                    <i class="fa fa-phone form-control-feedback"></i>

                                                    @error('celular')

                                                    <div class="alert alert-danger alert-dismissable">
                                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                        {{ $message }}
                                                    </div>

                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group has-feedback">
                                                    <label  class="control-label">Email Fiscal: <span style="cursor: pointer;" class="mdi mdi-alert-circle text-danger" data-container="body" title="Notificación: Se usará este medio para Remitir Comprobantes, notificaciones, etc"></span><span class="symbol required"></span></label>
                                                    <input autocomplete="off" type="text" class="form-control" class="@error('email_fiscal') is-invalid @enderror" name="email_fiscal" id="email_fiscal" placeholder="Ingrese Correo Electrónico" autocomplete="off" required="" aria-required="true" />
                                                    <i class="fa fa-envelope-o form-control-feedback"></i>

                                                    @error('email-fiscal')

                                                    <div class="alert alert-danger alert-dismissable">
                                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                        {{ $message }}
                                                    </div>

                                                    @enderror

                                                </div>
                                            </div>

                                            


                                        </div>



                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group has-feedback">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="form-group has-feedback">
                                                            <label class="control-label">DNI (frente): <span class="symbol required"></span></label>
                                                            <div class="input-group">
                                                                <div class="form-control" data-trigger="fileinput"><i class="fa fa-file-photo-o fileinput-exists"></i>
                                                                    <span class="fileinput-filename"></span>
                                                                </div>
                                                                <span class="input-group-addon btn btn-success btn-file">
                                                                    <span class="fileinput-new"><i class="fa fa-cloud-upload"></i> Selecciona Archivo</span>
                                                                    <span class="fileinput-exists"><i class="fa fa-file-photo-o"></i> Cambiar</span>
                                                                    <input required type="file" class="btn btn-default" data-original-title="Subir Imagen" data-rel="tooltip" placeholder="Suba su Archivo" name="dniFrente" id="dniFrente" required autocomplete="off" title="Buscar Archivo">
                                                                </span>
                                                                <a href="#" class="input-group-addon btn btn-dark fileinput-exists" data-dismiss="fileinput"><i class="fa fa-trash-o"></i> Quitar</a>
                                                            </div><span class="card-subtitle text-muted">Para Subir el Archivo debe tener en cuenta:<br> * El Archivo a cargar debe ser extension pdf<br> * No debe ser mayor de 2 MB</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group has-feedback">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="form-group has-feedback">
                                                            <label class="control-label">DNI (dorso): <span class="symbol required"></span></label>
                                                            <div class="input-group">
                                                                <div class="form-control" data-trigger="fileinput"><i class="fa fa-file-photo-o fileinput-exists"></i>
                                                                    <span class="fileinput-filename"></span>
                                                                </div>
                                                                <span class="input-group-addon btn btn-success btn-file">
                                                                    <span class="fileinput-new"><i class="fa fa-cloud-upload"></i> Selecciona Archivo</span>
                                                                    <span class="fileinput-exists"><i class="fa fa-file-photo-o"></i> Cambiar</span>
                                                                    <input required type="file" class="btn btn-default" data-original-title="Subir Imagen" data-rel="tooltip" placeholder="Suba su Archivo" name="dniDorso" id="dniDorso" required autocomplete="off" title="Buscar Archivo">
                                                                </span>
                                                                <a href="#" class="input-group-addon btn btn-dark fileinput-exists" data-dismiss="fileinput"><i class="fa fa-trash-o"></i> Quitar</a>
                                                            </div><span class="card-subtitle text-muted">Para Subir el Archivo debe tener en cuenta:<br> * El Archivo a cargar debe ser extension pdf<br> * No debe ser mayor de 2 MB</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group has-feedback">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="form-group has-feedback">
                                                            <label class="control-label">Inscripción en AFIP : <span class="symbol required"></span></label>
                                                            <div class="input-group">
                                                                <div class="form-control" data-trigger="fileinput"><i class="fa fa-file-photo-o fileinput-exists"></i>
                                                                    <span class="fileinput-filename"></span>
                                                                </div>
                                                                <span class="input-group-addon btn btn-success btn-file">
                                                                    <span class="fileinput-new"><i class="fa fa-cloud-upload"></i> Selecciona Archivo</span>
                                                                    <span class="fileinput-exists"><i class="fa fa-file-photo-o"></i> Cambiar</span>
                                                                    <input required type="file" class="btn btn-default" data-original-title="Subir Imagen" data-rel="tooltip" placeholder="Suba su Archivo" name="afip" id="afip" autocomplete="off" title="Buscar Archivo">
                                                                </span>
                                                                <a href="#" class="input-group-addon btn btn-dark fileinput-exists" data-dismiss="fileinput"><i class="fa fa-trash-o"></i> Quitar</a>
                                                            </div><span class="card-subtitle text-muted">Para Subir el Archivo debe tener en cuenta:<br> * El Archivo a cargar debe ser extension pdf<br> * No debe ser mayor de 2 MB</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group has-feedback">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="form-group has-feedback" id="vinculacion_empresa" style="visibility:hidden">
                                                            <label class="control-label">Contrato Social o Etatuto: <span class="symbol required"></span></label>
                                                            <div class="input-group">
                                                                <div class="form-control" data-trigger="fileinput"><i class="fa fa-file-photo-o fileinput-exists"></i>
                                                                    <span class="fileinput-filename"></span>
                                                                </div>
                                                                <span class="input-group-addon btn btn-success btn-file">
                                                                    <span class="fileinput-new"><i class="fa fa-cloud-upload"></i> Selecciona Archivo</span>
                                                                    <span class="fileinput-exists"><i class="fa fa-file-photo-o"></i> Cambiar</span>
                                                                    <input  type="file" class="btn btn-default" data-original-title="Subir Imagen" data-rel="tooltip" placeholder="Suba su Archivo" name="vinculacion" id="vinculacion" autocomplete="off" title="Buscar Archivo">
                                                                </span>
                                                                <a href="#" class="input-group-addon btn btn-dark fileinput-exists" data-dismiss="fileinput"><i class="fa fa-trash-o"></i> Quitar</a>
                                                            </div><span class="card-subtitle text-muted">Para Subir el Archivo debe tener en cuenta:<br> * El Archivo a cargar debe ser extension pdf<br> * No debe ser mayor de 2 MB</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group has-feedback">
                                                    <div class="fileinput fileinput-new"  data-provides="fileinput">
                                                        <div class="form-group has-feedback"  id="apoderado_empresa" style="visibility:hidden">
                                                            <label class="control-label">Constancia Apoderado <span class="symbol required"></span></label>
                                                            <div class="input-group">
                                                                <div class="form-control" data-trigger="fileinput"><i class="fa fa-file-photo-o fileinput-exists"></i>
                                                                    <span class="fileinput-filename"></span>
                                                                </div>
                                                                <span class="input-group-addon btn btn-success btn-file">
                                                                    <span class="fileinput-new"><i class="fa fa-cloud-upload"></i> Selecciona Archivo</span>
                                                                    <span class="fileinput-exists"><i class="fa fa-file-photo-o"></i> Cambiar</span>
                                                                    <input  type="file" class="btn btn-default" data-original-title="Subir Imagen" data-rel="tooltip" placeholder="Suba su Archivo" name="apoderado" id="apoderado" autocomplete="off" title="Buscar Archivo">
                                                                </span>
                                                                <a href="#" class="input-group-addon btn btn-dark fileinput-exists" data-dismiss="fileinput"><i class="fa fa-trash-o"></i> Quitar</a>
                                                            </div><span class="card-subtitle text-muted">Para Subir el Archivo debe tener en cuenta:<br> * El Archivo a cargar debe ser extension pdf<br> * No debe ser mayor de 2 MB</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        

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
                                                        <input class="form-control" class="@error('password') is-invalid @enderror" 
                                                        type="password" placeholder="Ingrese Contraseña" name="password" id="password" 
                                                        autocomplete="off" required="" aria-required="true">
                                                        <span id="span_pass" onclick="mostrarPass('password');">Mostrar</span>
                                                    </div>
                                                    <i class="fa fa-key form-control-feedback"></i>

                                                    @error('password')

                                                    <div class="alert alert-danger alert-dismissable">
                                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                        {{ $message }}
                                                    </div>

                                                    @enderror

                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group has-feedback">
                                                    <div class="campo2">
                                                        <label  class="control-label">Repita Contraseña: <a class="symbol required"></a></label>
                                                        <input type="password" class="form-control" name="password_confirmation" class="@error('password_confirmation') is-invalid @enderror" id="password_confirmation" placeholder="Repita Contraseña" autocomplete="off" required="" aria-required="true" /><span id="span_pass_confirm" onclick="mostrarPass('password_confirmation');">Mostrar</span>
                                                    </div>
                                                    <i class="fa fa-key form-control-feedback"></i>

                                                    @error('password_confirmation')

                                                    <div class="alert alert-danger alert-dismissable">
                                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                        {{ $message }}
                                                    </div>

                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <!--se comenta la captcha por ahora
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group has-feedback">
                                                    <a tabindex="-1" style="border-style: none;" href="#" title="Refrescar Imagen" onClick="document.getElementById('siimage').src = 'assets/captcha/securimage_show.php?sid=' + Math.random(); this.blur(); return false"><img id="siimage" name="siimage" style="border: 1px solid #CCCCCC; margin-right: 5px" src="assets/captcha/securimage_show.php?sid=<?php echo md5(uniqid()) ?>" onClick="this.blur()" alt="CAPTCHA Image" width="170" height="65" align="left"></a>
                                                    <label><a tabindex="-1" style="border-style: none;" href="#" title="Refrescar Imagen" onClick="document.getElementById('siimage').src = 'assets/captcha/securimage_show.php?sid=' + Math.random(); this.blur(); return false"><img src="assets/images/refresh.png" width="12" height="12"></a> Ingrese Código: <span class="symbol required"></span></label><br /><input type="text" class="form-control" name="captcha1" id="captcha1" autocomplete="off" style="width:180px;height:40px;background:#f2f2f2;color:#181818;border-radius:5px 5px 5px 5px;" placeholder="Ingrese Código" required />
                                                </div>
                                            </div>
                                        </div>
                                        <h4 class="text-blue">Ingrese el texto de la imagen (respetando mayúsculas y minúsculas)</h4>
-->
                                        <div class="alert alert-success text-justify" role="alert">
                                            <h5><span class='fa fa-warning'></span> El Registro ingresado sera validado por nuestros Operadores dentro de las 48 hr de ingresado. Dicha resolución será comunicada al email consignado para continuar con la carga de datos.
                                            </h5>
                                        </div>


                                        <div class="text-right">
                                            <button type="submit" name="btn-submit" id="btn-submit" class="btn btn-danger" disabled><span class="fa fa-save"></span> Crear Cuenta</button>
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
    <!-- <script type="text/javascript" src="{{ asset('assets/script/script2.js')}}"></script> -->
    <script type="text/javascript" src="{{ asset('assets/script/validation.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/script/script.js')}}"></script>
    <script src="{{ asset('js/functions.js')}}"></script>
    <link rel="stylesheet" href="{{asset('assets/venobox/venobox/venobox.min.css')}}" />
    <script src="{{asset('assets/venobox/venobox/venobox.min.js')}}"></script>
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
       
       
        var id_provincia
        //var id_localidad
        var id_localidad;

        $(document).ready(function() {

            $("form").attr("autocomplete", "nope");
            $("input").attr("autocomplete", "nope");
            $("#search_provincia").attr("autocomplete", "nope");
            $("#search_localidad").attr("autocomplete", "nope");
            $("#search_barrio").attr("autocomplete", "nope");
            $("#search_calle").attr("autocomplete", "nope");
            




            $("#tipo_personeria").change(function() {

                if ($("#tipo_personeria").val() == 2) {

                    document.getElementById("vinculacion_empresa").style.visibility = "visible";

                   /*  $("#vinculacion").attr('required',true) */
                } else {
                    document.getElementById("vinculacion_empresa").style.visibility = "hidden";
                   /*  $("#vinculacion").attr('required',false) */
                }

            })

        });

        $(document).ready(function() {
            $("#id_tipo_de_afectacion").change(function() {

                if ($("#id_tipo_de_afectacion").val() == 5) {

                    document.getElementById("apoderado_empresa").style.visibility = "visible";
                   /*  $("#apoderado").attr('required',true) */
                } else {
                    document.getElementById("apoderado_empresa").style.visibility = "hidden";
                  /*   $("#apoderado").attr('required',false) */
                }

            })

        });


        $(document).ready(function() {
            $("#id_provincia").change(function() {
               
                if ($("#id_provincia").val() == "") {
                    //limpiar id provincia, id localidad, barrio, calle
                  
                    
                    $('#id_localidad').val("")
                    $('#id_barrio').val("")
                    $('#id_calle').val("")


                    $('#search_localidad').val("");
                    $('#search_barrio').val("");
                    $('#search_calle').val("");


                    //deshabilitar campo calle y barrio
                    $("#search_barrio").prop("disabled", true);
                    $("#search_localidad").prop("disabled", true);
                    $("#search_calle").prop("disabled", true);
                    id_provincia = 0;
                    id_localidad = 0;

                } else {
                    //$("#search_barrio").prop("disabled", false);
                    $("#search_localidad").prop("disabled", false);

                }

            })



            $("#search_localidad").keyup(function() {

                if ($("#search_localidad").val().length < 1) {
                    //limpiar id localidad, barrio, calle

                    $('#id_localidad').val("")
                    $('#id_barrio').val("")
                    $('#id_calle').val("")


                    $('#search_localidad').val("");
                    $('#search_barrio').val("");
                    $('#search_calle').val("");


                    //deshabilitar campo calle y barrio
                    $("#search_barrio").prop("disabled", true);
                    $("#search_calle").prop("disabled", true);

                } else {
                    //$("#search_barrio").prop("disabled", false);
                    $("#search_barrio").prop("disabled", false);
                }


            })



            $("#search_barrio").keyup(function() {

                if ($("#search_barrio").val().length < 1) {
                    //limpiar id localidad, barrio, calle


                    $('#id_barrio').val("")
                    $('#id_calle').val("")

                    $('#search_barrio').val("");
                    $('#search_calle').val("");


                    //deshabilitar campo calle
                    $("#search_calle").prop("disabled", true);

                } else {
                    //$("#search_barrio").prop("disabled", false);
                    $("#search_calle").prop("disabled", false);
                }


            })


            $("#search_calle").keyup(function() {

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
        });



        $(document).ready(function() {

            $("#search_provincia").autocomplete({
                source: function(request, response) {
                    // Fetch data
                    $.ajax({
                        url: "{{url('/provincias')}}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: "{{ csrf_token() }}",
                            search: request.term
                        },
                        success: function(data) {
                            response(data);
                        }
                    });
                },
                select: function(event, ui) {
                    // Set selection
                    $('#search_provincia').val(ui.item.label); // display the selected text
                    $('#id_provincia').val(ui.item.value); // save selected id to input
                    id_provincia = ui.item.value

                    return false;
                }
            });
        });

        $(document).ready(function() {

            $("#search_localidad").autocomplete({
                source: function(request, response) {
                    // Fetch data
                    if($('#id_provincia').val() != ""){
                    $.ajax({
                        url: "{{url('/localidades')}}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: "{{ csrf_token() }}",
                            search: request.term,
                            id_prov: $('#id_provincia').val()
                        },
                        success: function(data) {
                            response(data);
                        }
                    });
                }
                },
                select: function(event, ui) {
                    // Set selection
                    $('#search_localidad').val(ui.item.label); // display the selected text
                    $('#id_localidad').val(ui.item.value); // save selected id to input
                    id_localidad = ui.item.value
                    return false;
                }
            });
        });






        $(document).ready(function() {

            $("#search_barrio").autocomplete({
                source: function(request, response) {
                    // Fetch data
                    if( $('#id_localidad').val() != ""){
                    $.ajax({
                        url: "{{url('/barrios')}}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: "{{ csrf_token() }}",
                            search: request.term,
                            id_loc: id_localidad
                        },
                        success: function(data) {
                            response(data);
                        }
                    });
                }
                },
                select: function(event, ui) {
                    // Set selection
                    $('#search_barrio').val(ui.item.label); // display the selected text
                    $('#id_barrio').val(ui.item.value); // save selected id to input
                    return false;
                }
            });
        });



        $(document).ready(function() {
            $("#search_calle").autocomplete({
                source: function(request, response) {
                    // Fetch data
                    if( $('#id_localidad').val() != ""){
                    $.ajax({
                        url: "{{url('/calles')}}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: "{{ csrf_token() }}",
                            search: request.term,
                            id_loc: id_localidad
                        },
                        success: function(data) {
                            response(data);
                        }
                    });
                }
                },
                select: function(event, ui) {
                    // Set selection
                    $('#search_calle').val(ui.item.label); // display the selected text
                    $('#id_calle').val(ui.item.value); // save selected id to input
                    return false;
                }
            });
        });
    </script>

</body>

</html>