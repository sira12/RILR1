@extends('layouts.index-layout')

@section('content')

@include('menus.menuContribuyente')
<meta name="csrf-token" content="{{ csrf_token() }}" />

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb border-bottom">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-xs-12 align-self-center">
                <h5 class="font-medium text-uppercase mb-0"><i class="fa fa-tasks"></i> Inicio</h5>
            </div>
            <div class="col-lg-6 col-md-6 col-xs-12 align-self-justify">
                
            </div>
            <div class="col-lg-9 col-md-8 col-xs-12 align-self-center">
                <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                    <ol class="breadcrumb mb-0 justify-content-end p-0">

                        <li class="breadcrumb-item active" aria-current="page"></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="page-breadcrumb border-bottom">
        <div class="row">
            
            <div class="col-lg-6 col-md-6 col-xs-12 align-self-justify">
            <h4 class="card-title"><i class="fa fa-building"></i> Trámite de Registro y Estadistica
                    Industrial</h4>
                    <h5 class="card-subtitle" style="font-size: 12px;">Declaración jurada anual (Dec. 1736/68 MHEOP: Dec. 534/77 ME; Dec.
                        100/81 MEO y SP; Dec. 4962/85 MHS y OP) </h5>
                  
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


        <!-- Row -->
        <div class="row">
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-header bg-dark">
                        <h4 class="card-title text-white"><i class="fa fa-building"></i> Establecimientos Industriales </h4>
                    </div>

                    <div class="form-body">

                        <div class="card-body">
{{-- Input para traer datos de contribuyente no tocar --}}
{{-- se lo agarra con la f lanzador--}}
<input type="hidden" value="{{$contribuyente->id_contribuyente}}" id="id_contribuyente_panel_principal">

{{-- fin input --}}
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


                                                    <span class="badge badge-pill badge-warning"> <b>Tramite en proceso</b></span>
                                                    <!--  @if(!$industria->actividad)-->
                                                    <!-- @php
                                                    $proceso=true;
                                                    @endphp
                                                    @else

                                                    <span class="badge badge-pill badge-success">Tramite finalizado</span>
                                                    @php
                                                    $proceso=false;
                                                    @endphp
                                                    @endif -->

                                                </td>
                                                <td>{{$industria->nombre_de_fantasia}}</td>
                                                <td>
                                                    <!-- <span style="cursor: pointer;" title="Ver Trámite" onClick="#"><i class="mdi mdi-eye font-24 text-danger"></i></span>
 -->
                                                    <span style="cursor: pointer;" title="Continuar Trámite" onClick="UpdateTramite('<?php echo $industria->id_industria ?>')"><i class="mdi mdi-table-edit font-24 text-danger"></i></span>

                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="text-left">
                                <!--  @if($proceso == false) -->
                                <a href="{{route('procedimientos')}}"><button id="btn_rg_ei" type="button" class="btn btn-dark"><span class="fa fa-plus-circle"></span> Registrar Nuevo Establecimiento Industrial</button></a>
                                <!--  @else
                                <button type="button" onclick="AlertaTramite('');" class="btn btn-dark"><span class="fa fa-plus-circle"></span> Registrar Nuevo Establecimiento Industrial</button></a>
                                @endif -->
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