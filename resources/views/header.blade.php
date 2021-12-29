<!-- ============================================================== -->
<!-- Topbar header - style you can find in pages.scss -->
<!-- ============================================================== -->
<header class="topbar" data-navbarbg="skin6">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">
        <div class="navbar-header" data-logobg="skin6">
            <!-- This is for the sidebar toggle which is visible on mobile only -->
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="fa fa-navicon"></i></a>
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <a class="navbar-brand" href="javascript:void(0)">
                <!-- Logo icon -->
                <b class="logo-icon">
                    <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                    <!-- Dark Logo icon -->


                    <img src="{{asset('fotos/3-transp.png')}}" width="150" height="35" alt="Logo Principal" class="dark-logo">


                </b>
                <!--End Logo icon -->
                <!-- Logo text -->
                <span class="logo-text">
                    <!-- dark Logo text -->
                    <img src="" alt="" class="dark-logo">
                    <!-- Light Logo text
                             <img src="assets/images/logo-icon.png" class="light-logo" alt="homepage">-->
                </span>
            </a>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Toggle which is visible on mobile only -->
            <!-- ============================================================== -->
            <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="mdi mdi-dots-horizontal"></i></a>
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
                    <a class="nav-link dropdown-toggle waves-effect waves-dark hour text-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                <!-- Search -->
                <!-- ============================================================== -->
                <!-- <li class="nav-item search-box">
                    <form class="app-search d-none d-lg-block order-lg-2">
                        <input type="text" class="form-control" placeholder="Búsqueda...">
                        <a href="" class="active"><i class="fa fa-search"></i></a>
                    </form>
                </li> -->

                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle waves-effect waves-dark pro-pic d-flex mt-2 pr-0 leading-none simple" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                        <img src="{{ asset('fotos/avatar.png')}}" width="40" height="40" class="rounded-circle">

                        @if(isset($contribuyente))
                        <span class="ml-2 d-lg-block">
                            <h5 class="text-dark mb-0"> {{$contribuyente->razon_social}}</h5>
                            <small class="text-info mb-0"> {{$contribuyente->cuit}}</small>
                        </span>
                        @endif

                        @if(isset($persona))


                            <span class="ml-2 d-lg-block">
                            <h5 class="text-dark mb-0"> {{$persona[0]->nombre}}</h5>
                            <small class="text-info mb-0"> {{$usuario->roleNames}}</small>
                        </span>
                        @endif
                    </a>

                    <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                        <div class="d-flex no-block align-items-center p-3 mb-2 border-bottom">
                            <div>
                                <img src="{{ asset('fotos/avatar.png')}}" width="80" class="rounded-circle">
                            </div>



                            @if(isset($contribuyente))
                                <div class="ml-2">
                                    <h5 class="mb-0"><abbr title="Nombres/Razón Social"> {{$contribuyente->razon_social}}</abbr></h5>
                                    <p class="mb-0 text-muted"><abbr title="Correo Electrónico"> {{$contribuyente->email_fiscal}}</abbr></p>
                                </div>
                            @endif


                            @if(isset($persona))
                                <div class="ml-2">
                                    <h5 class="mb-0"><abbr title="Nombres/Razón Social"> {{$persona[0]->nombre}}</abbr></h5>
                                    <p class="mb-0 text-muted"><abbr title="Correo Electrónico"> {{$usuario->email}}</abbr></p>
                                </div>
                            @endif


                        </div>

                        <!-- <a class="dropdown-item" href="perfil"><i class="fa fa-user"></i> Ver Perfil</a>
                        <a class="dropdown-item" href="password"><i class="fa fa-edit"></i> Actualizar Password</a>
                        <a class="dropdown-item" href="bloqueo"><i class="fa fa-clock-o"></i> Bloquear Sesión</a> -->
                        <div class="dropdown-divider"></div>

                        <form method="POST" action="{{ route('logout') }}" style="margin: 0px !important;">
                            @csrf

                            <a class="dropdown-item" href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();" class="sidebar-link"><i class="mdi mdi-power">
                                </i><span> Cerrar Sesión</span>
                            </a>


                        </form>
                        <!--  <a class="dropdown-item" href="logout"><i class="fa fa-power-off"></i> Cerrar Sesión</a> -->
                    </div>
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
