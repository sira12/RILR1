@extends('layouts.index-layout')

@section('content')

@include('menus.menuAdmin')
@include('PanelAdmin.modales')

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
    
 
    <div class="page-content container-fluid">
     
        <div id="save">
            <!-- error will be shown here ! -->
        </div>     
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-dark">
                        <h4 class="card-title text-white"><i class="fa fa-tasks"></i> Solicitudes <a href="javascript:void(0)" class="pull-right text-white" onClick="getSolicitudes();"><i class="mdi mdi-refresh"></i> Refrescar</a></h4>
                    </div>

                    <div class="form-body">

                        <div class="card-body">

                            <!-- <div class="row">

                                <div class="col-md-7">

                                    <div class="btn-group m-b-20">
                                        <a class="btn waves-effect waves-light btn-light" href="reportepdf?tipo=<?php echo encrypt("SOLICITUDES") ?>" target="_blank" rel="noopener noreferrer" data-toggle="tooltip" data-placement="bottom" title="Exportar Pdf"><span class="fa fa-file-pdf-o text-dark"></span> Pdf</a>

                                        <a class="btn waves-effect waves-light btn-light" href="reporteexcel?documento=<?php echo encrypt("EXCEL") ?>&tipo=<?php echo encrypt("SOLICITUDES") ?>" data-toggle="tooltip" data-placement="bottom" title="Exportar Excel"><span class="fa fa-file-excel-o text-dark"></span> Excel</a>

                                        <a class="btn waves-effect waves-light btn-light" href="reporteexcel?documento=<?php echo encrypt("WORD") ?>&tipo=<?php echo encrypt("SOLICITUDES") ?>" data-toggle="tooltip" data-placement="bottom" title="Exportar Word"><span class="fa fa-file-word-o text-dark"></span> Word</a>
                                    </div>
                                </div>
                            </div> -->

                            <div >

                                <div class="table-responsive">
                                    <table style="width:100%;overflow-x: auto" class="table table-striped table-bordered border display solicitudes_Paneladmin">

                                        <thead>
                                        <tr role="row">
                                        <th>N°</th>
                                       
                                        <th>Cuit</th>
                                        <th>Razón Social</th>
                                        <th>N° de Documento</th>
                                        <th>Nombres y Apellidos</th>
                                        <th>Nº de Teléfono</th>
                                        <th>Fecha</th>
                                        <th>Acciones</th>
                                        </tr>
                                        </thead>
                                        <tbody >

                                                                                        
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