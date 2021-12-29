@extends('layouts.index-layout')

@section('content')

@include('menus.menuAdmin')
@include('PanelAdmin.modales')

<meta name="csrf-token" content="{{ csrf_token() }}" />

<div class="page-wrapper" >
   
    <div class="page-breadcrumb border-bottom">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-xs-12 align-self-center">
                <h5 class="font-medium text-uppercase mb-0"><i class="fa fa-tasks"></i> Usuarios</h5>
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
                        <h4 class="card-title text-white"><i class="fa fa-tasks"></i> Usuarios <a href="javascript:void(0)" class="pull-right text-white" onClick="getUsuariosAdminTable();"><i class="mdi mdi-refresh"></i> Refrescar</a></h4>
                    </div>

                    <div class="form-body">

                        <div class="card-body">

                            <div class="row">
                                

                                <div class="col-md-7">
                                    <div class="btn-group m-b-20">
                                        <button type="button" class="btn btn-success btn-light" data-placement="left" title="Nuevo Usuario" data-original-title="" data-href="#" data-toggle="modal" data-target="#myModalUser" data-backdrop="static" data-keyboard="false"><i class="fa fa-plus"></i> Nuevo</button>
                                    </div>    
                                </div>
                            </div>

                            <div >
                                <div class="table-responsive">
                                    <table style="width:100%;overflow-x: auto" class="table table-striped table-bordered border display tableUsuariosAdmin">

                                        <thead>
                                        <tr role="row">
                                        <th class="sorting">N°</th>
                                        <th>N° de Documento</th>
                                        <th>Nombres y Apellidos</th>
                                        <th>N° de Teléfono</th>
                                        <th>Email</th>
                                        <th>Rol</th>
                                        <th>Estado</th>
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