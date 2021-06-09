@extends('layouts.index-layout')

@section('content')

    @include('menus.menuContribuyente')
    @include('Procedimientos.modales')
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
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
                    <h5 class="font-medium text-uppercase mb-0"><i class="fa fa-tasks"></i> Inicio</h5>
                </div>
                <div class="col-lg-9 col-md-8 col-xs-12 align-self-center">
                    <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                        <ol class="breadcrumb mb-0 justify-content-end p-0">
                            <li class="breadcrumb-item">Control</li>
                            <li class="breadcrumb-item active" aria-current="page">Establecimientos</li>
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

            <!-- Row -->
            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title"><i class="fa fa-building"></i> Trámite de Registro y Estadistica
                                Industrial</h3>
                            <h4 class="card-subtitle">Declaración jurada anual (Dec. 1736/68 MHEOP: Dec. 534/77 ME; Dec.
                                100/81 MEO y SP; Dec. 4962/85 MHS y OP) </h4>
                            <hr>

                            <div id="save">
                                <!-- error will be shown here ! -->
                            </div>

                            <div class="form-body">
                                <!--form body-->
                                <div class="row-horizon">
                                        <span class="categories selectedGat"
                                              href="#datosGenerales"><i class="fa fa-tasks"></i> Datos Generales</span>
                                    <span class="categories" href="#act"><i
                                            class="fa fa-tasks"></i> Actividad</span>
                                    <span class="categories" id="seccion#3"><i
                                            class="fa fa-tasks"></i> Insumos y Servicios</span>
                                    <span class="categories" id="seccion#4" onclick="CargaFormulario('','');"><i
                                            class="fa fa-tasks"></i> Situación de la Planta</span>
                                    <span class="categories" id="seccion#5" onclick="CargaFormulario('','');"><i
                                            class="fa fa-tasks"></i> Ventas y Facturación</span>
                                    <span class="categories" id="seccion#6" onclick="CargaFormulario('','');"><i
                                            class="fa fa-tasks"></i> Prevención y Control Ambiental</span>
                                    <span class="categories" id="seccion#7" onclick="CargaFormulario('','');"><i
                                            class="fa fa-tasks"></i> Sistemas de Calidad</span>
                                    <span class="categories" id="seccion#8" onclick="CargaFormulario('','');"><i
                                            class="fa fa-tasks"></i> Economía del Conocimiento</span>
                                    <span class="categories" id="seccion#9" onclick="CargaFormulario('','');"><i
                                            class="fa fa-tasks"></i> Revisión y Confirmación DDJJ</span>
                                </div>

                                <div id="secciones" class="mt-3">
                                    <!-- Div secciones -->

                                    <hr>

                                    <section id="datosGenerales">
                                        <form class="form-material" method="post" action="#" name="updategeneral"
                                          id="updategeneral" enctype="multipart/form-data">
                                        @csrf
                                        <h3 class="card-subtitle mt-3"> Datos Generales</h3>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Año: <span
                                                            class="symbol required"></span></label>
                                                    (Si bien el certificado será emitido a fecha del año corriente, la
                                                    información volcada en el formulario debe corresponder al ejercicio
                                                    inmediato anterior)
                                                    <i class="fa fa-bars form-control-feedback"></i>
                                                    <select class="form-control" id="periodofiscal"
                                                            name="periodo_fiscal" required="" aria-required="true">

                                                        <option value="{{$per_fiscal->id_periodo_fiscal}}"
                                                                selected>{{$per_fiscal->anio}}</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <h3 class="card-subtitle mt-3"> Datos de Establecimiento Industrial</h3>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group has-feedback">

                                                    <input type="hidden" name="secciongeneral" id="secciongeneral"
                                                           value="">
                                                    <input type="hidden" name="proceso" id="proceso"
                                                           value="updategeneral" value="savegeneral"/>
                                                    <input type="hidden" name="id_contribuyente" id="id_contribuyente"
                                                           value="{{$id_contribuyente}}" value="">
                                                    <input type="hidden" name="id_persona" id="id_persona"
                                                           value="{{$id_persona}}" value="">
                                                    <input type="hidden" name="id_industria" id="industria_id" value="{{$mi_industria[0]->id_industria}}"
                                                           >
                                                    <input type="hidden" name="id_periodo_de_actividad_de_contribuyente"
                                                           id="id_periodo_de_actividad_de_contribuyente" value="">
                                                    <abbr title="Nombre Razón Social de Empresa"></abbr>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control actividades"
                                               name="fecha_actividad_contribuyente"
                                               id="fecha_actividad_contribuyente"
                                               placeholder="Ingrese Fecha Inicio Actividad de Contribuyente"
                                               autocomplete="off" value="{{\Carbon\Carbon::parse($mi_industria[0]->fecha_inicio_de_actividades)->format('d-m-Y')}}" required=""
                                               aria-required="true" hidden/>
                                        <!--<div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Nº de Cuit: <span
                                                            class="symbol required"></span></label>
                                                    <br><abbr title="Nº de CUIT/CUIL"></abbr>{{$cuit->cuit}}
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Fecha Inicio Actividad Contribuyente:
                                                        <span class="symbol required"></span></label>
                                                    <input type="text" class="form-control actividades"
                                                           name="fecha_actividad_contribuyente"
                                                           id="fecha_actividad_contribuyente"
                                                           placeholder="Ingrese Fecha Inicio Actividad de Contribuyente"
                                                           autocomplete="off" value="{{\Carbon\Carbon::parse($mi_industria[0]->fecha_inicio_de_actividades)->format('d-m-Y')}}" required=""
                                                           aria-required="true"/>
                                                    <i class="fa fa-calendar form-control-feedback"></i>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Régimen de Ingresos Brutos: <span
                                                            class="symbol required"></span></label>
                                                    <i class="fa fa-bars form-control-feedback"></i>

                                                    <select class="form-control" id="id_regimen_ib" name="id_regimen_ib"
                                                            required="" aria-required="true">
                                                        <option value="{{$mi_industria[0]->id_regimen_ib}}"> {{$mi_industria[0]->regimen_ib}}</option>
                                                        @foreach($regimen as $reg)
                                                            <option
                                                                value="{{$reg->id_regimen_ib}}">{{$reg->regimen_ib}}</option>
                                                        @endforeach

                                                    </select>


                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Nº de Ingresos Brutos: <span
                                                            class="symbol required"></span></label>
                                                    <input type="text" class="form-control" name="numero_de_ib"
                                                           id="numero_de_ib" placeholder="Ingrese Nº de Ingresos Brutos"
                                                           autocomplete="off" value="{{$mi_industria[0]->numero_de_ib}}" required=""
                                                           aria-required="true"/>
                                                    <i class="fa fa-pencil form-control-feedback"></i>
                                                </div>
                                            </div>
                                        </div>-->


                                        <!--<div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Condición Frente al Iva: <span
                                                            class="symbol required"></span></label>
                                                    <i class="fa fa-bars form-control-feedback"></i>

                                                    <select class="form-control" id="id_condicion_iva"
                                                            name="id_condicion_iva" required="" aria-required="true">
                                                        <option value="{{$mi_industria[0]->id_condicion_iva}}">{{$mi_industria[0]->condicion_iva}}</option>
                                                        @foreach($condicion_iva as $iva)
                                                            <option
                                                                value="{{$iva->id_condicion_iva}}">{{$iva->condicion_iva}}</option>
                                                        @endforeach
                                                    </select>


                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Naturaleza Juridica: <span
                                                            class="symbol required"></span></label>
                                                    <i class="fa fa-bars form-control-feedback"></i>

                                                    <select class="form-control" id="id_naturaleza_juridica"
                                                            name="id_naturaleza_juridica" required=""
                                                            aria-required="true">
                                                        <option value="{{$mi_industria[0]->id_naturaleza_juridica}}"> {{$mi_industria[0]->naturaleza_juridica}}</option>
                                                        @foreach($naturaleza_juridica as $naturaleza)
                                                            <option
                                                                value="{{$naturaleza->id_naturaleza_juridica}}">{{$naturaleza->naturaleza_juridica}} </option>
                                                        @endforeach

                                                    </select>


                                                </div>
                                            </div>
                                        </div>-->

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Nombre de Establecimiento Industrial
                                                        <span class="text-blue">(Nombre de Fantasia)</span>: <span
                                                            class="symbol required"></span></label>
                                                    <input type="text" class="form-control" name="nombre_de_fantasia"
                                                           id="nombre_de_fantasia"
                                                           placeholder="Ingrese Nombre de Establecimiento Industrial"
                                                           autocomplete="off" value="{{$mi_industria[0]->nombre_de_fantasia}}" required=""
                                                           aria-required="true"/>
                                                    <i class="fa fa-pencil form-control-feedback"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Fecha de Inicio Actividad en
                                                        Establecimiento: <span class="symbol required"></span></label>
                                                    <input type="text" class="form-control actividades"
                                                           name="fecha_actividad_industria"
                                                           id="fecha_actividad_industria"
                                                           placeholder="Ingrese Fecha Inicio Actividad de Industria"
                                                           autocomplete="off" value="{{\Carbon\Carbon::parse($mi_industria[0]->fecha_inicio)->format('d-m-Y')}}" required=""
                                                           aria-required="true"/>
                                                    <i class="fa fa-calendar form-control-feedback"></i>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Es Casa Central? <span
                                                            class="symbol required"></span></label>
                                                    <i class="fa fa-bars form-control-feedback"></i>

                                                    <select name="es_casa_central" id="es_casa_central"
                                                            class="form-control" required="" aria-required="true">
                                                        <option value="{{$mi_industria[0]->es_casa_central}}"> @if($mi_industria[0]->es_casa_central == 'S') SI @else NO @endif</option>
                                                        <option value="S">SI</option>
                                                        <option value="N">NO</option>
                                                    </select>

                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Es Zona industrial?: <span
                                                            class="symbol required"></span></label>
                                                    <i class="fa fa-bars form-control-feedback"></i>

                                                    <select name="zona_industrial" id="zona_industrial"
                                                            class="form-control" required="" aria-required="true">
                                                        <option value="{{$mi_industria[0]->es_zona_industrial}}"> @if($mi_industria[0]->es_zona_industrial == 'S') SI @else NO @endif</option>
                                                        <option value="S">SI</option>
                                                        <option value="N">NO</option>
                                                    </select>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Nº de Teléfono Fijo:</label>
                                                    <input type="text" class="form-control" name="tel_fijo"
                                                           id="tel_fijo" placeholder="Ingrese Nº de Teléfono Fijo"
                                                           value="{{$mi_industria[0]->tel_fijo}}" autocomplete="off" required=""
                                                           aria-required="true"/>
                                                    <i class="fa fa-phone form-control-feedback"></i>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Nº de Celular de Contacto de la
                                                        Empresa: <span class="symbol required"></span></label>
                                                    <input type="text" class="form-control" name="tel_celular"
                                                           id="tel_celular" placeholder="Ingrese Nº de Celular"
                                                           autocomplete="off" value="{{$mi_industria[0]->tel_celular}}" required=""
                                                           aria-required="true"/>
                                                    <i class="fa fa-mobile form-control-feedback"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Código Postal: <span
                                                            class="symbol required"></span></label>
                                                    <input type="text" class="form-control" name="cod_postal"
                                                           id="cod_postal" placeholder="Ingrese Código Postal"
                                                           autocomplete="off" value="{{$mi_industria[0]->cod_postal}}" required=""
                                                           aria-required="true"/>
                                                    <i class="fa fa-pencil form-control-feedback"></i>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Correo Electrónico fiscal:<span
                                                            style="cursor: pointer;"
                                                            class="mdi mdi-alert-circle text-danger"
                                                            data-container="body"
                                                            title="Notificación: Esta será la dirección electrónica constituida a fines de remitir notificaciones y comunicados oficiales  "></span>
                                                        <span class="symbol required"></span></label>
                                                    <input type="text" class="form-control" name="email_fiscal"
                                                           id="email_fiscal"
                                                           placeholder="Ingrese Correo Electrónico para Trámite"
                                                           autocomplete="off" value="{{$mi_industria[0]->email_fiscal}}" required=""
                                                           aria-required="true" disabled/>
                                                    <i class="fa fa-envelope-o form-control-feedback"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Zona de Planta: <span
                                                            class="symbol required"></span></label>
                                                    <i class="fa fa-bars form-control-feedback"></i>


                                                    <select class="form-control" id="zona" name="zona" required=""
                                                            aria-required="true">
                                                        <option value="{{$mi_industria[0]->id_punto_planta}}">{{$mi_industria[0]->punto_planta}}</option>
                                                        @foreach($zona as $z)
                                                            <option value="{{$z->id_punto_cardinal}}">
                                                                {{$z->punto_cardinal}}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">

                                            <div class="col-md-3">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Provincia de Planta: <span
                                                            class="symbol required"></span></label>
                                                    <input type="hidden" name="id_provincia" id="id_provincia"
                                                           value="{{$mi_industria[0]->id_provincia_planta}}"/>
                                                    <input type="text" class="form-control" name="buscar_provincia"
                                                           id="buscar_provincia"
                                                           placeholder="Ingrese Nombre de Provincia" value="{{$mi_industria[0]->provincia_planta}}"
                                                           required="" aria-required="true"/>
                                                    <i class="fa fa-search form-control-feedback"></i>
                                                </div>
                                            </div>


                                            <div class="col-md-3">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Localidad de Planta: <span
                                                            style="cursor: pointer;"
                                                            class="mdi mdi-alert-circle text-danger"
                                                            data-container="body"
                                                            title="Notificación: Ingrese Nombre de Localidad y seleccione en el Listado que se mostrará, en caso de no aparecer, escribala y el sistema se encargará de la asignación del mismo."></span><span
                                                            class="symbol required"></span></label>
                                                    <input type="hidden" name="id_localidad" id="id_localidad"
                                                           value="{{$mi_industria[0]->id_localidad_planta}}"/>
                                                    <input type="text" class="form-control" disabled
                                                           name="buscar_localidad" id="buscar_localidad"
                                                           placeholder="Ingrese Nombre de Localidad" value="{{$mi_industria[0]->localidad_planta}}"
                                                           required="" aria-required="true"/>
                                                    <i class="fa fa-search form-control-feedback"></i>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Barrio de Planta: <span
                                                            style="cursor: pointer;"
                                                            class="mdi mdi-alert-circle text-danger"
                                                            data-container="body"
                                                            title="Notificación: Ingrese Nombre de Barrio y seleccione en el Listado que se mostrará, en caso de no aparecer, escribala y el sistema se encargará de la asignación del mismo."></span><span
                                                            class="symbol required"></span></label>
                                                    <input type="hidden" name="id_barrio" id="id_barrio" value="{{$mi_industria[0]->id_barrio_planta}}"/>
                                                    <input type="text" class="form-control" disabled
                                                           name="buscar_barrio" id="buscar_barrio"
                                                           placeholder="Ingrese Nombre de Barrio" autocomplete="off"
                                                           value="{{$mi_industria[0]->barrio_planta}}" required="" aria-required="true"/>
                                                    <i class="fa fa-search form-control-feedback"></i>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Calle de Planta: <span
                                                            style="cursor: pointer;"
                                                            class="mdi mdi-alert-circle text-danger"
                                                            data-container="body"
                                                            title="Notificación: Ingrese Nombre de Calle y seleccione en el Listado que se mostrará, en caso de no aparecer, escribala y el sistema se encargará de la asignación del mismo."></span><span
                                                            class="symbol required"></span></label>
                                                    <input type="hidden" name="id_calle" id="id_calle" value="{{$mi_industria[0]->id_calle_planta}}"/>
                                                    <input type="text" class="form-control" disabled name="buscar_calle"
                                                           id="buscar_calle" placeholder="Ingrese Nombre de Calle"
                                                           autocomplete="off" value="{{$mi_industria[0]->calle_planta}}" required=""
                                                           aria-required="true"/>
                                                    <i class="fa fa-search form-control-feedback"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">N° Calle: <span
                                                            style="cursor: pointer;"

                                                            data-container="body"></label>

                                                    <input type="number" class="form-control" name="nro_calle_panta"
                                                           id="nro_calle_panta" placeholder="Ingrese Numero de Calle"
                                                           autocomplete="off" aria-required="true" value="{{$mi_industria[0]->nro_calle_planta}}"/>
                                                    <i class="fa fa-pencil form-control-feedback"></i>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">N° Piso: <span style="cursor: pointer;"

                                                                                                data-container="body"></label>

                                                    <input type="number" class="form-control" name="nro_piso_planta"
                                                           id="nro_piso_planta" placeholder="Ingrese Numero de Piso"
                                                           autocomplete="off" aria-required="true" value="{{$mi_industria[0]->piso_planta}}"/>
                                                    <i class="fa fa-pencil form-control-feedback"></i>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">N° de Departamento: <span
                                                            style="cursor: pointer;"

                                                            data-container="body"></label>

                                                    <input type="number" class="form-control"
                                                           name="nro_departamento_planta" id="nro_departamento_planta"
                                                           placeholder="Ingrese Numero de Departamento"
                                                           autocomplete="off" aria-required="true" value="{{$mi_industria[0]->depto_planta}}"/>
                                                    <i class="fa fa-pencil form-control-feedback"></i>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Referencia: <span
                                                            style="cursor: pointer;"

                                                            data-container="body"></label>
                                                    <input type="text" class="form-control" name="referencia_planta"
                                                           id="referencia_planta" placeholder="Ingrese una referencia"
                                                           autocomplete="off" aria-required="true" value="{{$mi_industria[0]->referencia_planta}}"/>
                                                    <i class="fa fa-pencil form-control-feedback"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <!--<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Zona legal: <span
                                                            class="symbol required"></span></label>
                                                    <i class="fa fa-bars form-control-feedback"></i>


                                                    <select class="form-control" id="zona_administracion"
                                                            name="zona_administracion" required="" aria-required="true">
                                                        <option value="{{$mi_industria[0]->id_punto_legal}}"> {{$mi_industria[0]->punto_legal}}</option>
                                                        @foreach($zona as $z)
                                                            <option value="{{$z->id_punto_cardinal}}">
                                                                {{$z->punto_cardinal}}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>
                                        </div>-->

                                        <!--<div class="row">

                                            <div class="col-md-3">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Provincia Legal:<span
                                                            class="symbol required"></span></label>
                                                    <input type="hidden" name="id_provincia_legal"
                                                           id="id_provincia_legal" value="{{$mi_industria[0]->id_provincia_legal}}"/>
                                                    <input type="text" class="form-control"
                                                           name="buscar_provincia_legal" id="buscar_provincia_legal"
                                                           placeholder="Ingrese Nombre de Provincia" value="{{$mi_industria[0]->provincia_legal}}"
                                                           required="" aria-required="true"/>
                                                    <i class="fa fa-search form-control-feedback"></i>
                                                </div>
                                            </div>


                                            <div class="col-md-3">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Localidad legal: <span
                                                            style="cursor: pointer;"
                                                            class="mdi mdi-alert-circle text-danger"
                                                            data-container="body"
                                                            title="Notificación: Ingrese Nombre de Localidad y seleccione en el Listado que se mostrará, en caso de no aparecer, escribala y el sistema se encargará de la asignación del mismo."></span><span
                                                            class="symbol required"></span></label>
                                                    <input type="hidden" name="id_localidad_administracion"
                                                           id="id_localidad_administracion" value="{{$mi_industria[0]->id_localidad_legal}}"/>
                                                    <input type="text" class="form-control" disabled
                                                           name="buscar_localidad2" id="buscar_localidad2"
                                                           placeholder="Ingrese Nombre de Localidad" autocomplete="off"
                                                           value="{{$mi_industria[0]->localidad_legal}}" required="" aria-required="true"/>
                                                    <i class="fa fa-search form-control-feedback"></i>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Barrio legal: <span
                                                            style="cursor: pointer;"
                                                            class="mdi mdi-alert-circle text-danger"
                                                            data-container="body"
                                                            title="Notificación: Ingrese Nombre de Barrio y seleccione en el Listado que se mostrará, en caso de no aparecer, escribala y el sistema se encargará de la asignación del mismo."></span><span
                                                            class="symbol required"></span></label>
                                                    <input type="hidden" name="id_barrio_administracion"
                                                           id="id_barrio_administracion" value="{{$mi_industria[0]->id_barrio_legal}}"/>
                                                    <input type="text" class="form-control" disabled
                                                           name="buscar_barrio2" id="buscar_barrio2"
                                                           placeholder="Ingrese Nombre de Barrio" autocomplete="off"
                                                           value="{{$mi_industria[0]->barrio_legal}}" required="" aria-required="true"/>
                                                    <i class="fa fa-search form-control-feedback"></i>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Calle legal: <span
                                                            style="cursor: pointer;"
                                                            class="mdi mdi-alert-circle text-danger"
                                                            data-container="body"
                                                            title="Notificación: Ingrese Nombre de Calle y seleccione en el Listado que se mostrará, en caso de no aparecer, escribala y el sistema se encargará de la asignación del mismo."></span><span
                                                            class="symbol required"></span></label>
                                                    <input type="hidden" name="id_calle_administracion"
                                                           id="id_calle_administracion" value="{{$mi_industria[0]->id_calle_legal}}"/>
                                                    <input type="text" class="form-control" disabled
                                                           name="buscar_calle2" id="buscar_calle2"
                                                           placeholder="Ingrese Nombre de Calle" autocomplete="off"
                                                           value="{{$mi_industria[0]->calle_legal}}" required="" aria-required="true"/>
                                                    <i class="fa fa-search form-control-feedback"></i>
                                                </div>
                                            </div>
                                        </div>-->
                                        <!--<div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">N° Calle: <span
                                                            style="cursor: pointer;"

                                                            data-container="body"></label>

                                                    <input type="number" class="form-control" name="nro_calle_legal"
                                                           id="nro_calle_legal" placeholder="Ingrese Numero de Calle"
                                                           autocomplete="off" aria-required="true" value="{{$mi_industria[0]->nro_calle_legal}}"/>
                                                    <i class="fa fa-pencil form-control-feedback"></i>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">N° Piso: <span style="cursor: pointer;"

                                                                                                data-container="body"></label>

                                                    <input type="number" class="form-control" name="nro_piso_legal"
                                                           id="nro_piso_legal" placeholder="Ingrese Numero de Piso"
                                                           autocomplete="off" aria-required="true" value="{{$mi_industria[0]->piso_legal}}"/>
                                                    <i class="fa fa-pencil form-control-feedback"></i>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">N° de Departamento: <span
                                                            style="cursor: pointer;"

                                                            data-container="body"></label>

                                                    <input type="number" class="form-control"
                                                           name="nro_departamento_legal" id="nro_departamento_legal"
                                                           placeholder="Ingrese Numero de Departamento"
                                                           autocomplete="off" aria-required="true" value="{{$mi_industria[0]->depto_legal}}"/>
                                                    <i class="fa fa-pencil form-control-feedback"></i>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Referencia: <span
                                                            style="cursor: pointer;"

                                                            data-container="body"></label>
                                                    <input type="text" class="form-control" name="referencia_legal"
                                                           id="referencia_legal" placeholder="Ingrese una referencia"
                                                           autocomplete="off" aria-required="true" value="{{$mi_industria[0]->referencia_legal}}"/>
                                                    <i class="fa fa-pencil form-control-feedback"></i>
                                                </div>
                                            </div>
                                        </div>-->

                                        <!--<div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Nº de Teléfono Fijo: <span
                                                            class="symbol required"></span></label>
                                                    <input type="text" class="form-control"
                                                           name="tel_fijo_administracion" id="tel_fijo_administracion"
                                                           placeholder="Ingrese Nº de Teléfono Fijo" value="{{$tel_fijo_legal}}"
                                                           autocomplete="off" required="" aria-required="true"/>
                                                    <i class="fa fa-phone form-control-feedback"></i>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Nº de Celular de Contacto en
                                                        Administración: <span class="symbol required"></span></label>
                                                    <input type="text" class="form-control"
                                                           name="tel_celular_administracion"
                                                           id="tel_celular_administracion"
                                                           placeholder="Ingrese Nº de Celular" autocomplete="off"
                                                           value="{{$tel_celular_legal}}" required="" aria-required="true"/>
                                                    <i class="fa fa-mobile form-control-feedback"></i>
                                                </div>
                                            </div>
                                        </div>-->

                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Latitud de Ubicación: <span
                                                            class="symbol required"></span></label>
                                                    <input type="text" class="form-control" name="latitud" id="latitud"
                                                           placeholder="Ingrese Latitud de Ubicación" autocomplete="off"
                                                           value="{{$mi_industria[0]->latitud}}" required="" aria-required="true"/>
                                                    <i class="fa fa-map-marker form-control-feedback"></i>
                                                </div>
                                            </div>

                                            <div class="col-md-5">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Longitud de Ubicación: <span
                                                            class="symbol required"></span></label>
                                                    <input type="text" class="form-control" name="longitud"
                                                           id="longitud" placeholder="Ingrese Longitud de Ubicación"
                                                           autocomplete="off" value="{{$mi_industria[0]->longitud}}" required=""
                                                           aria-required="true"/>
                                                    <i class="fa fa-map-marker form-control-feedback"></i>
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label"> </label><br>
                                                    <div>
                                                        <button type="button" id="find_btn"
                                                                class="btn btn-info waves-effect waves-light"
                                                                title="Cargar Coordenadas"
                                                                onClick="CargarCoordenadas()"><span
                                                                class="fa fa-map-marker"></span> Cargar Coordenadas
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Pagina Web (Ej: http://dominio.com):
                                                        <span class="symbol required"></span></label>
                                                    <input type="url" class="form-control" name="pagina_web"
                                                           id="pagina_web" placeholder="Ingrese Url de Pagina Web"
                                                           autocomplete="off" value="{{$mi_industria[0]->pagina_web}}" required=""
                                                           aria-required="true"/>
                                                    <i class="fa fa-globe form-control-feedback"></i>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Correo Electrónico de la Empresa: <span
                                                            class="symbol required"></span></label>
                                                    <input type="text" class="form-control" name="email" id="email"
                                                           placeholder="Ingrese Correo Electrónico de Empresa"
                                                           autocomplete="off" value="{{$mi_industria[0]->email}}" required=""
                                                           aria-required="true"/>
                                                    <i class="fa fa-envelope-o form-control-feedback"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-right">
                                            <button type="submit" name="btn-submit-edit" id="btn-submit-edit"
                                                    class="btn btn-danger"><span class="fa fa-save"></span> Guardar
                                            </button>
                                        </div>

                                    </form>
                                    </section>

                                    <section id="act">

                                        <h3 class="card-subtitle mt-3"> Actividad</h3>


                                        <div class="text-right">
                                            <button type="button" class="btn btn-info" data-placement="left"
                                                    title="Agregar Nueva Actividad" data-original-title="" data-href="#"
                                                    data-toggle="modal" data-target="#MyModalActividad"
                                                    data-backdrop="static" data-keyboard="false"
                                                    >
                                                <i class="fa fa-plus-square"></i> Agregar Nueva Actividad
                                            </button>
                                        </div>


                                        <div class="row mt-3">

                                            <div class="table-responsive">
                                                <table id="default_order" class="table table-deredbor border display">

                                                    <thead>
                                                    <tr bgcolor="#808080" class="text-white" role="row">
                                                        <th>Fecha Inicio</th>
                                                        <th>Carácter</th>
                                                        <th>Actividad (Debe de coincidir con la actividad declarada en
                                                            AFIP y DGIP)
                                                        </th>
                                                        <th width="12%">Acciones</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody class="BusquedaRapida">


                                                    <tr role="row" class="odd">
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td>
                                                            <span style="cursor: pointer;" data-placement="left"
                                                                  title="Ver Actividad" data-original-title=""
                                                                  data-href="#" data-toggle="modal"
                                                                  data-target="#MyModalDetalleActividad"
                                                                  data-backdrop="static" data-keyboard="false"
                                                                  onClick=""><i
                                                                    class="mdi mdi-eye font-22 text-danger"></i></span>

                                                            <span style="cursor: pointer;" data-placement="left"
                                                                  title="Asignar o Editar Producto Cargado"
                                                                  data-original-title="" data-href="#"
                                                                  data-toggle="modal"
                                                                  data-target="#MyModalAsignaProducto"
                                                                  onClick=""><i
                                                                    class="mdi mdi-plus-outline font-22 text-danger"></i></span>

                                                            <span style="cursor: pointer;" data-placement="left"
                                                                  title="Actualizar Actividad" data-original-title=""
                                                                  data-href="#" data-toggle="modal"
                                                                  data-target="#MyModalActividad" data-backdrop="static"
                                                                  data-keyboard="false"
                                                                  ><i
                                                                    class="mdi mdi-table-edit font-22 text-danger"></i></span>

                                                            <span style="cursor: pointer;" title="Eliminar Actividad"
                                                                  ><i
                                                                    class="mdi mdi-delete font-22 text-danger"></i></span>
                                                        </td>
                                                    </tr>

                                                    </tbody>
                                                </table>
                                                <span class="card-subtitle">Nota:
                        <i class="mdi mdi-eye text-danger font-16"></i>(Ver Actividad) - <i
                                                        class="mdi mdi-plus-outline text-danger font-16"></i>(Asignar Producto) - <i
                                                        class="mdi mdi-table-edit text-danger font-16"></i>(Editar Actividad) - <i
                                                        class="mdi mdi-delete text-danger font-16"></i>(Eliminar Actividad)
                    </span>
                                            </div>

                                        </div>
                                    </section>




                                </div><!-- Div secciones -->


                            </div><!-- div form body-->


                        </div>
                    </div>
                </div>

            </div>
            <!-- End Row -->


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
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->

@endsection


