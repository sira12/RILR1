<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">

                <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span class="hide-menu">MENU</span></li>

                <li class="sidebar-item waves-effect"><a href="{{route('panel')}}" class="sidebar-link"><i class="mdi mdi-home"></i><span class="hide-menu"> Inicio</span></a></li>
                <li class="sidebar-item waves-effect"><a href="{{route('datosGenerales',$id_contribuyente)}}" class="sidebar-link"><i class="mdi mdi-account"></i><span class="hide-menu"> Datos Generales</span></a></li>

                <li class="sidebar-item waves-effect"><a href="#" class="sidebar-link"><i class="mdi mdi-comment-multiple-outline"></i><span class="hide-menu"> Consultas</span></a></li>

                <li class="sidebar-item waves-effect"><a href="#" class="sidebar-link"><i class="mdi mdi-folder-multiple"></i><span class="hide-menu"> Encuentas</span></a></li>

                <li class="sidebar-item waves-effect"><a href="#" class="sidebar-link"><i class="mdi mdi-calendar-multiple-check"></i><span class="hide-menu"> Eventos</span></a></li>

                <li class="sidebar-item waves-effect"><a href="#" class="sidebar-link"><i class="mdi mdi-file-multiple"></i><span class="hide-menu"> Mis Trámites</span></a></li>

                <li class="sidebar-item waves-effect">

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}" style="margin: 0px !important;">
                        @csrf

                        <a href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();" class="sidebar-link"><i class="mdi mdi-power">
                            </i><span class="hide-menu"> Cerrar Sesión</span>
                        </a>


                    </form>

                </li>

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
