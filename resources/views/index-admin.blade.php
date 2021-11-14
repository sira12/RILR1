@extends('layouts.index-layout')

@section('content')

@include('menus.menuAdmin')
<meta name="csrf-token" content="{{ csrf_token() }}" />

<div class="page-wrapper">
   
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
 
    <div class="page-content container-fluid">
     
        <div id="save">
            <!-- error will be shown here ! -->
        </div>     
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

                            <div id="solicitudes">

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

                                                    <span class="badge badge-pill badge-warning"> <b>Tramite pendiente.</b></span>

                                                </td>
                                                <td>{{$industria->nombre_de_fantasia}}</td>
                                                <td>
                                                    <!-- <span style="cursor: pointer;" title="Ver Trámite" onClick="#"><i class="mdi mdi-eye font-24 text-danger"></i></span>-->
                                                    <span style="cursor: pointer;" title="Continuar Trámite" onClick="UpdateTramite('<?php echo $industria->id_industria ?>')"><i class="mdi mdi-table-edit font-24 text-danger"></i></span>

                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

    @endsection