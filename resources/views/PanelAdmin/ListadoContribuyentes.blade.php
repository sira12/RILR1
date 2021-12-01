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
                        <h4 class="card-title text-white"><i class="fa fa-tasks"></i> Listado de Contribuyentes <a href="javascript:void(0)" class="pull-right text-white" onClick="getSolicitudes();"><i class="mdi mdi-refresh"></i> Refrescar</a></h4>
                    </div>

                    <div class="form-body">

                        <div class="card-body">

                            <div class="row">
                                

                                <div class="col-md-7">
                                    
                                </div>
                            </div>

                            <div >
                                <div class="table-responsive">
                                    <table style="width:100%;overflow-x: auto" class="table table-striped table-bordered border display ">

                                        <thead>
                                        <tr role="row">
                                        <th>N°</th>
                                        <th>Cuit</th>
                                        <th>Razón Social</th>
                                        <th>Nombres y Apellidos</th>
                                        <th>DNI</th>
                                        <th>Acciones</th>
                                        </tr>
                                        </thead>
                                        <tbody >

                                            @foreach ($contribuyentes as $index=>$cbt )
                                                <tr>
                                                    <td>{{$index+1}}</td>
                                                    <td>{{$cbt->cuit}}</td>
                                                    <td>{{$cbt->razon_social}}</td>
                                                    <td>{{$cbt->nombrePersona}}</td>
                                                    <td>{{$cbt->dniPersona}}</td>
                                                    <td><span style="cursor: pointer;" data-placement="left" title="Ver Industrias" data-original-title="" data-href="#" data-toggle="modal" data-target="#myModalVerCbt" data-backdrop="static" data-keyboard="false" onclick="VerCbt({{$cbt->id_contribuyente}})"><i class="mdi mdi-eye font-22 text-danger"></i></span></td>
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