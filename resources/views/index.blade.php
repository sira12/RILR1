@extends('layouts.index-layout')

@section('content')

@include('menus.menuContribuyente')

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
                        <li class="breadcrumb-item active" aria-current="page"></li>
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


        {{-- <!-- Row --> tabla admin usuarios
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
                           --}}


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
                                                <th>Estado del tramite</th>
                                                <th>Establecimiento</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody class="BusquedaRapida">
                                        @php
                                                        $proceso=false;
                                                        @endphp
                                       @foreach($industrias as $clave => $industria)
                                            <tr role="row" class="odd">
                                                <td>{{$clave +1}}</td>
                                                <td>
                                                        
                                                    @if(!$industria->id_rel_industria_actividad)

                                                        <span class="badge badge-pill badge-warning"> <b>Tramite en proceso</b></span>
                                                        @php
                                                        $proceso=true;
                                                        @endphp
                                                    @else

                                                        <span class="badge badge-pill badge-success">Tramite finalizado</span>
                                                        @php
                                                            $proceso=false;
                                                        @endphp
                                                    @endif

                                                </td>
                                                <td>{{$industria->nombre_de_fantasia}}</td>
                                                <td>
                                                    <span style="cursor: pointer;" title="Ver Trámite" onClick="#"><i class="mdi mdi-eye font-24 text-danger"></i></span>

                                                    <span style="cursor: pointer;" title="Continuar Trámite" onClick="UpdateTramite('<?php echo $industria->id_industria ?>')"><i class="mdi mdi-file-multiple font-24 text-danger"></i></span>

                                                </td>
                                            </tr>
                                       @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="text-left">
                                @if($proceso == false)
                                <a href="{{route('procedimientos')}}"><button type="button" class="btn btn-dark"><span class="fa fa-plus-circle"></span> Registrar Nuevo Establecimiento Industrial</button></a>
                                @else
                                <button type="button" onclick="AlertaTramite('');" class="btn btn-dark"><span class="fa fa-plus-circle"></span> Registrar Nuevo Establecimiento Industrial</button></a>
                                @endif
                            </div>

                        </div>

                    </div>

                </div>
            </div>
            <!--</div>-->



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

    </div>

    @endsection
