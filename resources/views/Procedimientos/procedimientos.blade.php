@extends('layouts.index-layout')

@section('content')

@include('menus.menuContribuyente')
@include('Procedimientos.modales')
<meta name="csrf-token" content="{{ csrf_token() }}" />
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
                        <h4 class="card-subtitle" style="font-size: 15px;">Declaración jurada anual (Dec. 1736/68 MHEOP: Dec. 534/77 ME; Dec.
                            100/81 MEO y SP; Dec. 4962/85 MHS y OP) </h4>
                        <hr>

                        <div id="save">
                            <!-- error will be shown here ! -->
                        </div>

                        <h3 class="card-title mostrar_info_industria" style="display:none"><i class="fa fa-building"></i> Nombre de la industria: <span id="nombre_industria_fantasia"></span></h3>

                        <div class="form-body">
                            <div class="row mostrar_info_industria" style="display:none">
                                <div class="col-md-12">
                                    <div class="form-group has-feedback">
                                        <label class="control-label">Año declarado: <span class="symbol required"></span></label>
                                        (Los valores declarados en los formularios corresponden al periodo anterior)
                                        <i class="fa fa-bars form-control-feedback"></i>
                                        <select class="form-control" id="anio_periodo_fiscal" name="anio_periodo_fiscal" required="" aria-required="true">

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!--form body-->
                            <div class="row-horizon scrollmenu">
                                <span id="span_generales" class="categories selectedGat" href="#datosGenerales" onclick="muestraForm('generales')"><i class="fa fa-tasks"></i> Datos Generales</span>
                                <span class="categories" href="#act" onclick="muestraForm('actividades')"><i class="fa fa-tasks"></i> Actividad</span>
                                <span class="categories" href="#insumos" onclick="muestraForm('insumos');"><i class="fa fa-tasks"></i> Insumos y Servicios</span>
                                <span class="categories" href="#splanta" onclick="muestraForm('splanta');"><i class="fa fa-tasks"></i> Situación de la Planta</span>
                                <span class="categories" href="#vyf" onclick="muestraForm('vyf');"><i class="fa fa-tasks"></i> Ventas y Facturación</span>
                                <span class="categories" href="#pyca" onclick="muestraForm('pyca');"><i class="fa fa-tasks"></i> Prevención y Control Ambiental</span>
                                <span class="categories" href="#sc" onclick="muestraForm('sc');"><i class="fa fa-tasks"></i> Sistemas de Calidad</span>
                                <span class="categories" href="#ec" onclick="muestraForm('ec');"><i class="fa fa-tasks"></i> Economía del Conocimiento</span>
                                <span class="categories" href="#ddjj" onclick="muestraForm('ddjj');"><i class="fa fa-tasks"></i> Revisión y Confirmación DDJJ</span>
                            </div>

                            <div id="secciones" class="mt-3">
                                <!-- Div secciones -->

                                <hr>

                                <section id="datosGenerales">
                                    <form class="form-material" method="post" action="#" name="savegeneral" id="savegeneral" enctype="multipart/form-data">
                                        @csrf




                                        <h3 class="card-subtitle mt-3"> Datos de Establecimiento Industrial</h3>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group has-feedback">

                                                    <input type="hidden" name="secciongeneral" id="secciongeneral" value="">
                                                    <input type="hidden" name="proceso" id="proceso" value="updategeneral" value="savegeneral" />
                                                    <input type="hidden" name="id_contribuyente" id="id_contribuyente" value="{{$id_contribuyente}}" value="">
                                                    <input type="hidden" name="id_persona" id="id_persona" value="{{$id_persona}}" value="">
                                                    <input type="hidden" name="id_industria" id="id_industria" value="" value="0">
                                                    <input type="hidden" name="id_periodo_de_actividad_de_contribuyente" id="id_periodo_de_actividad_de_contribuyente" value="">
                                                    <abbr title="Nombre Razón Social de Empresa"></abbr>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group has-feedback">

                                                <input type="text" class="form-control actividades" name="fecha_actividad_contribuyente" id="fecha_actividad_contribuyente" placeholder="Ingrese Fecha Inicio Actividad de Contribuyente" autocomplete="off" @if($contribuyente->fecha_inicio_de_actividades)
                                                value="{{\Carbon\Carbon::parse($contribuyente->fecha_inicio_de_actividades)->format('d-m-Y')}}"
                                                @else
                                                value=""
                                                @endif
                                                aria-required="true"

                                                hidden/>

                                            </div>
                                        </div>

                                        <!--<div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group has-feedback">
                                                        <label class="control-label">Nº de Cuit: <span
                                                                class="symbol required"></span></label>
                                                        <br><abbr title="Nº de CUIT/CUIL"></abbr>
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group has-feedback">
                                                        <label class="control-label">Fecha Inicio Actividad
                                                            Contribuyente:
                                                            <span class="symbol required"></span></label>
                                                        <input type="text" class="form-control actividades"
                                                               name="fecha_actividad_contribuyente"
                                                               id="fecha_actividad_contribuyente"
                                                               placeholder="Ingrese Fecha Inicio Actividad de Contribuyente"
                                                               autocomplete="off" value="" required=""
                                                               aria-required="true"/>
                                                        <i class="fa fa-calendar form-control-feedback"></i>
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group has-feedback">
                                                        <label class="control-label">Régimen de Ingresos Brutos: <span
                                                                class="symbol required"></span></label>
                                                        <i class="fa fa-bars form-control-feedback"></i>

                                                        <select class="form-control" id="id_regimen_ib"
                                                                name="id_regimen_ib"
                                                                required="" aria-required="true">
                                                            <option value=""> -- SELECCIONE --</option>
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
                                                               id="numero_de_ib"
                                                               placeholder="Ingrese Nº de Ingresos Brutos"
                                                               autocomplete="off" value="" required=""
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
                                                                name="id_condicion_iva" required=""
                                                                aria-required="true">
                                                            <option value=""> -- SELECCIONE --</option>
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
                                                            <option value=""> -- SELECCIONE --</option>
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
                                                    <label class="control-label">Nombre de Establecimiento
                                                        Industrial
                                                        <span class="text-blue">(Nombre de Fantasia)</span>: <span class="symbol required"></span></label>
                                                    <input type="text" class="form-control" name="nombre_de_fantasia" id="nombre_de_fantasia" placeholder="Ingrese Nombre de Establecimiento Industrial" autocomplete="off" value="" required="" aria-required="true" />
                                                    <i class="fa fa-pencil form-control-feedback"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Fecha de Inicio Actividad en
                                                        Establecimiento: <span class="symbol required"></span></label>
                                                    <input type="text" class="form-control actividades" name="fecha_actividad_industria" id="fecha_actividad_industria" placeholder="Ingrese Fecha Inicio Actividad de Industria" autocomplete="off" value="" required="" aria-required="true" />
                                                    <i class="fa fa-calendar form-control-feedback"></i>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Es Casa Central? <span class="symbol required"></span></label>
                                                    <i class="fa fa-bars form-control-feedback"></i>

                                                    <select name="es_casa_central" id="es_casa_central" class="form-control" required="" aria-required="true">
                                                        <option value=""> -- SELECCIONE --</option>
                                                        <option value="S">SI</option>
                                                        <option value="N">NO</option>
                                                    </select>

                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Es Zona industrial?: <span class="symbol required"></span></label>
                                                    <i class="fa fa-bars form-control-feedback"></i>

                                                    <select name="zona_industrial" id="zona_industrial" class="form-control" required="" aria-required="true">
                                                        <option value=""> -- SELECCIONE --</option>
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
                                                    <input type="text" class="form-control" name="tel_fijo" id="tel_fijo" placeholder="Ingrese Nº de Teléfono Fijo" value="" autocomplete="off" required="" aria-required="true" />
                                                    <i class="fa fa-phone form-control-feedback"></i>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Nº de Celular de Contacto de la
                                                        Empresa: <span class="symbol required"></span></label>
                                                    <input type="text" class="form-control" name="tel_celular" id="tel_celular" placeholder="Ingrese Nº de Celular" autocomplete="off" value="" required="" aria-required="true" />
                                                    <i class="fa fa-mobile form-control-feedback"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Código Postal: <span class="symbol required"></span></label>
                                                    <input type="text" class="form-control" name="cod_postal" id="cod_postal" placeholder="Ingrese Código Postal" autocomplete="off" value="" required="" aria-required="true" />
                                                    <i class="fa fa-pencil form-control-feedback"></i>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Correo Electrónico fiscal:<span style="cursor: pointer;" class="mdi mdi-alert-circle text-danger" data-container="body" title="Notificación: Esta será la dirección electrónica constituida a fines de remitir notificaciones y comunicados oficiales  "></span>
                                                        <span class="symbol required"></span></label>
                                                    <input type="text" class="form-control" name="email_fiscal" id="email_fiscal" placeholder="Ingrese Correo Electrónico para Trámite" autocomplete="off" value="{{$contribuyente->email_fiscal}}" value="" required="" aria-required="true" disabled />
                                                    <i class="fa fa-envelope-o form-control-feedback"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Zona de Planta: <span class="symbol required"></span></label>
                                                    <i class="fa fa-bars form-control-feedback"></i>


                                                    <select class="form-control" id="zona" name="zona" required="" aria-required="true">
                                                        <option value=""> -- SELECCIONE --</option>
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
                                                    <label class="control-label">Provincia de Planta: <span class="symbol required"></span></label>
                                                    <input type="hidden" name="id_provincia" id="id_provincia" value="" />
                                                    <input type="text" class="form-control" name="buscar_provincia" id="buscar_provincia" placeholder="Ingrese Nombre de Provincia" value="" required="" aria-required="true" />
                                                    <i class="fa fa-search form-control-feedback"></i>
                                                </div>
                                            </div>


                                            <div class="col-md-3">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Localidad de Planta: <span style="cursor: pointer;" class="mdi mdi-alert-circle text-danger" data-container="body" title="Notificación: Ingrese Nombre de Localidad y seleccione en el Listado que se mostrará, en caso de no aparecer, escribala y el sistema se encargará de la asignación del mismo."></span><span class="symbol required"></span></label>
                                                    <input type="hidden" name="id_localidad" id="id_localidad" value="" />
                                                    <input type="text" class="form-control" disabled name="buscar_localidad" id="buscar_localidad" placeholder="Ingrese Nombre de Localidad" value="" required="" aria-required="true" />
                                                    <i class="fa fa-search form-control-feedback"></i>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Barrio de Planta: <span style="cursor: pointer;" class="mdi mdi-alert-circle text-danger" data-container="body" title="Notificación: Ingrese Nombre de Barrio y seleccione en el Listado que se mostrará, en caso de no aparecer, escribala y el sistema se encargará de la asignación del mismo."></span><span class="symbol required"></span></label>
                                                    <input type="hidden" name="id_barrio" id="id_barrio" value="" />
                                                    <input type="text" class="form-control" disabled name="buscar_barrio" id="buscar_barrio" placeholder="Ingrese Nombre de Barrio" autocomplete="off" value="" required="" aria-required="true" />
                                                    <i class="fa fa-search form-control-feedback"></i>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Calle de Planta: <span style="cursor: pointer;" class="mdi mdi-alert-circle text-danger" data-container="body" title="Notificación: Ingrese Nombre de Calle y seleccione en el Listado que se mostrará, en caso de no aparecer, escribala y el sistema se encargará de la asignación del mismo."></span><span class="symbol required"></span></label>
                                                    <input type="hidden" name="id_calle" id="id_calle" value="" />
                                                    <input type="text" class="form-control" disabled name="buscar_calle" id="buscar_calle" placeholder="Ingrese Nombre de Calle" autocomplete="off" value="" required="" aria-required="true" />
                                                    <i class="fa fa-search form-control-feedback"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">N° Calle: <span style="cursor: pointer;" data-container="body"></label>

                                                    <input type="number" class="form-control" name="nro_calle_panta" id="nro_calle_panta" placeholder="Ingrese Numero de Calle" autocomplete="off" aria-required="true" />
                                                    <i class="fa fa-pencil form-control-feedback"></i>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">N° Piso: <span style="cursor: pointer;" data-container="body"></label>

                                                    <input type="number" class="form-control" name="nro_piso_planta" id="nro_piso_planta" placeholder="Ingrese Numero de Piso" autocomplete="off" aria-required="true" />
                                                    <i class="fa fa-pencil form-control-feedback"></i>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">N° de Departamento: <span style="cursor: pointer;" data-container="body"></label>

                                                    <input type="number" class="form-control" name="nro_departamento_planta" id="nro_departamento_planta" placeholder="Ingrese Numero de Departamento" autocomplete="off" aria-required="true" />
                                                    <i class="fa fa-pencil form-control-feedback"></i>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Referencia: <span style="cursor: pointer;" data-container="body"></label>
                                                    <input type="text" class="form-control" name="referencia_planta" id="referencia_planta" placeholder="Ingrese una referencia" autocomplete="off" aria-required="true" />
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
                                                                name="zona_administracion" required=""
                                                                aria-required="true">
                                                            <option value=""> -- SELECCIONE --</option>
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
                                                               id="id_provincia_legal" value=""/>
                                                        <input type="text" class="form-control"
                                                               name="buscar_provincia_legal" id="buscar_provincia_legal"
                                                               placeholder="Ingrese Nombre de Provincia" value=""
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
                                                               id="id_localidad_administracion" value=""/>
                                                        <input type="text" class="form-control" disabled
                                                               name="buscar_localidad2" id="buscar_localidad2"
                                                               placeholder="Ingrese Nombre de Localidad"
                                                               autocomplete="off"
                                                               value="" required="" aria-required="true"/>
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
                                                               id="id_barrio_administracion" value=""/>
                                                        <input type="text" class="form-control" disabled
                                                               name="buscar_barrio2" id="buscar_barrio2"
                                                               placeholder="Ingrese Nombre de Barrio" autocomplete="off"
                                                               value="" required="" aria-required="true"/>
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
                                                               id="id_calle_administracion" value=""/>
                                                        <input type="text" class="form-control" disabled
                                                               name="buscar_calle2" id="buscar_calle2"
                                                               placeholder="Ingrese Nombre de Calle" autocomplete="off"
                                                               value="" required="" aria-required="true"/>
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
                                                               id="nro_calle_legal"
                                                               placeholder="Ingrese Numero de Calle"
                                                               autocomplete="off" aria-required="true"/>
                                                        <i class="fa fa-pencil form-control-feedback"></i>
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group has-feedback">
                                                        <label class="control-label">N° Piso: <span
                                                                style="cursor: pointer;"

                                                                data-container="body"></label>

                                                        <input type="number" class="form-control" name="nro_piso_legal"
                                                               id="nro_piso_legal" placeholder="Ingrese Numero de Piso"
                                                               autocomplete="off" aria-required="true"/>
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
                                                               autocomplete="off" aria-required="true"/>
                                                        <i class="fa fa-pencil form-control-feedback"></i>
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group has-feedback">
                                                        <label class="control-label">Referencia: <span
                                                                style="cursor: pointer;"

                                                                data-container="body"></label>
                                                        <input type="text" class="form-control" name="referencia_legal"
                                                               id="referencia_legal"
                                                               placeholder="Ingrese una referencia"
                                                               autocomplete="off" aria-required="true"/>
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
                                                               name="tel_fijo_administracion"
                                                               id="tel_fijo_administracion"
                                                               placeholder="Ingrese Nº de Teléfono Fijo" value=""
                                                               autocomplete="off" required="" aria-required="true"/>
                                                        <i class="fa fa-phone form-control-feedback"></i>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group has-feedback">
                                                        <label class="control-label">Nº de Celular de Contacto en
                                                            Administración: <span
                                                                class="symbol required"></span></label>
                                                        <input type="text" class="form-control"
                                                               name="tel_celular_administracion"
                                                               id="tel_celular_administracion"
                                                               placeholder="Ingrese Nº de Celular" autocomplete="off"
                                                               value="" required="" aria-required="true"/>
                                                        <i class="fa fa-mobile form-control-feedback"></i>
                                                    </div>
                                                </div>
                                            </div>-->

                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Latitud de Ubicación: <span class="symbol required"></span></label>
                                                    <input type="text" class="form-control" name="latitud" id="latitud" placeholder="Ingrese Latitud de Ubicación" autocomplete="off" value="" required="" aria-required="true" />
                                                    <i class="fa fa-map-marker form-control-feedback"></i>
                                                </div>
                                            </div>

                                            <div class="col-md-5">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Longitud de Ubicación: <span class="symbol required"></span></label>
                                                    <input type="text" class="form-control" name="longitud" id="longitud" placeholder="Ingrese Longitud de Ubicación" autocomplete="off" value="" required="" aria-required="true" />
                                                    <i class="fa fa-map-marker form-control-feedback"></i>
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label"> </label><br>
                                                    <div>
                                                        <button type="button" id="find_btn" class="btn btn-info waves-effect waves-light" title="Cargar Coordenadas" onClick="CargarCoordenadas()"><span class="fa fa-map-marker"></span> Cargar Coordenadas
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Pagina Web (Ej:
                                                        http://dominio.com):
                                                        <span class="symbol required"></span></label>
                                                    <input type="url" class="form-control" name="pagina_web" id="pagina_web" placeholder="Ingrese Url de Pagina Web" autocomplete="off" value="" required="" aria-required="true" />
                                                    <i class="fa fa-globe form-control-feedback"></i>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Correo Electrónico de la Empresa:
                                                        <span class="symbol required"></span></label>
                                                    <input type="text" class="form-control" name="email" id="email" placeholder="Ingrese Correo Electrónico de Empresa" autocomplete="off" value="" required="" aria-required="true" />
                                                    <i class="fa fa-envelope-o form-control-feedback"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-right">
                                            <button type="submit" name="btn-submit" id="btn-submit-save-generales" class="btn btn-danger"><span class="fa fa-save"></span>
                                                Guardar
                                            </button>

                                            <button type="button" style="display:none" name="btn-update-generales" id="btn-update-generales" class="btn btn-danger"><span class="fa fa-save"></span>
                                                Guardar
                                            </button>
                                        </div>

                                    </form>
                                </section>


                                <section id="act">

                                    <div class='alert alert-danger' id="div_info_actividad" style="display: none;">
                                        <center><span class='fa fa-info-circle'></span> Por favor debe realizar la carga de la industria</center>
                                    </div>

                                    <div id="info_actividad">

                                        <h3 id="labelActividad" class="card-subtitle mt-3"> Actividad</h3>


                                        <div id="buttonActividad" class="text-right">
                                            <button type="button" class="btn btn-info" data-placement="left" title="Agregar Nueva Actividad" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalActividad" data-backdrop="static" data-keyboard="false">
                                                <i class="fa fa-plus-square"></i> Agregar Nueva Actividad
                                            </button>
                                        </div>


                                        <div id="rowActividad" class="row mt-3">

                                            <div class="table-responsive">
                                                <table class="table table-bordered yajra-datatable">

                                                    <thead>
                                                        <tr bgcolor="#808080" class="text-white" role="row">
                                                            <th>N°</th>
                                                            <th>Fecha Inicio</th>
                                                            <th>Act. Principal</th>
                                                            <th>Nomenclatura</th>
                                                            <th>Actividad (Debe de coincidir con la actividad declarada en AFIP y DGIP)</th>

                                                            <th width="12%">Acciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>


                                                    </tbody>
                                                </table>


                                                <span class="card-subtitle">Nota:
                                                    <i class="mdi mdi-eye text-danger font-16"></i>(Ver Actividad) - <i class="mdi mdi-plus-outline text-danger font-16"></i>(Asignar Producto) - <i class="mdi mdi-table-edit text-danger font-16"></i>(Editar Actividad) - <i class="mdi mdi-basket-fill font-16 text-danger"></i>(Asignar o editar Materia prima) - <i class="mdi mdi-arrow-down-bold-circle-outline font-16 text-danger"></i>(Dar de baja actividad) <i class="mdi mdi-delete text-danger font-16"></i>(Eliminar Actividad)
                                                </span>
                                            </div>

                                        </div>

                                    </div>



                                </section>



                                <section id="insumos">



                                    <!-- ###################################### CONSULTA DE INSUMOS ###################################### -->


                                    <div class='alert alert-danger' id="div_info_insumos" style="display: none;">
                                        <center><span class='fa fa-info-circle'></span>Por favor debe realizar la carga de la industria</center>
                                    </div>


                                    <div id="info_insumos">


                                        <h3 class="card-subtitle mt-3"> Insumos</h3>


                                        <div class="text-right">
                                            <button type="button" class="btn btn-info" data-placement="left" title="Agregar Nuevo Insumo" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalInsumo" data-backdrop="static" data-keyboard="false" onClick="AddIdActividadInsumoModal('')"><i class="fa fa-plus-square"></i> Agregar Insumos</button>
                                        </div>


                                        <div class="row mt-3"><span class="card-subtitle">Detalle los 5 principales Insumos utilizados en el proceso de Industrialización</span>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-deredbor border display  yajra-table-insumos">

                                                <thead>
                                                    <tr bgcolor="#808080" class="text-white" role="row">
                                                        <th>N°</th>
                                                        <th>Insumo Utilizado</th>
                                                        <th>Cantidad</th>
                                                        <th>Unidad de Medida</th>
                                                        <th>Año</th>
                                                        <th width="12%">Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="BusquedaRapida">

                                                </tbody>
                                            </table>
                                            <span class="card-subtitle">Nota:
                                                <i class="mdi mdi-eye text-danger font-16"></i>(Ver Insumo) - <i class="mdi mdi-table-edit text-danger font-16"></i>(Editar Insumo) - <i class="mdi mdi-delete text-danger font-16"></i>(Eliminar Insumo)
                                            </span>
                                        </div>

                                        <hr>




                                        <!-- ###################################### CONSULTA DE SERVICIOS BASICOS ###################################### -->

                                        <h3 class="card-subtitle mt-3"> Servicios Básicos</h3>


                                        <div class="text-right">
                                            <button id="boton_servicio_basico" type="button" class="btn btn-info" data-placement="left" title="Agregar Nuevo Servicio" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalServiciosBasicos" data-backdrop="static" data-keyboard="false"><i class="fa fa-plus-square"></i> Agregar Servicios Básicos</button>
                                        </div>


                                        <div class="row mt-3"><span class="card-subtitle">Servicios Básicos (Agua, Energia Electrica, Gas-oil, Gas, Telefonia, Internet.)</span></div>
                                        <div class="table-responsive">
                                            <table class="table table-deredbor border display yajra-table-basicos">

                                                <thead>
                                                    <tr bgcolor="#808080" class="text-white" role="row">
                                                        <th>N°</th>
                                                        <th>Servicio Utilizado</th>
                                                        <th>Frecuencia</th>

                                                        <th>Cantidad Consumida</th>
                                                        <th>Año</th>
                                                        <th width="12%">Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="BusquedaRapida">




                                                </tbody>
                                            </table>
                                            <span class="card-subtitle">Nota:
                                                <i class="mdi mdi-eye text-danger font-16"></i>(Ver Servicio) - <i class="mdi mdi-table-edit text-danger font-16"></i>(Editar Servicio)
                                            </span>
                                        </div>



                                        <hr>

                                        <!-- ###################################### CONSULTA DE COMBUSTIBLE ###################################### -->

                                        <h3 class="card-subtitle mt-3"> Combustible</h3>


                                        <div class="text-right">
                                            <button type="button" class="btn btn-info" data-placement="left" title="Agregar Nuevo Combustible" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalCombustible" data-backdrop="static" data-keyboard="false" onClick="AddIdCombustibleModal('')"><i class="fa fa-plus-square"></i> Agregar Combustible</button>
                                        </div>


                                        <div class="row mt-3"><span class="card-subtitle">Tipo de Combustible utilizado (Diesel, Leña, GNC, Nafta, Fuel Oil, Carbón, BLP, Biocombustible, Otro.)</span>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-deredbor border display yajra-datatable-combustible">

                                                <thead>
                                                    <tr bgcolor="#808080" class="text-white" role="row">
                                                        <th>N°</th>
                                                        <th>Tipo</th>
                                                        <th>Frecuencia</th>
                                                        <th>Unidad Medida</th>
                                                        <th>Costo</th>
                                                        <th>Año</th>
                                                        <th width="12%">Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="BusquedaRapida">




                                                </tbody>
                                            </table>
                                            <span class="card-subtitle">Nota:
                                                <i class="mdi mdi-eye text-danger font-16"></i>(Ver Servicio) - <i class="mdi mdi-table-edit text-danger font-16"></i>(Editar Servicio) - <i class="mdi mdi-delete text-danger font-16"></i>(Eliminar Servicio)
                                            </span>
                                        </div>



                                        <hr>


                                        <!-- ###################################### CONSULTA DE OTROS SERVICIOS ###################################### -->

                                        <h3 class="card-subtitle mt-3"> Otros Servicios</h3>


                                        <div class="text-right">

                                            <button type="button" class="btn btn-info" data-placement="left" title="Agregar Nuevo Servicio" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalOtros" data-backdrop="static" data-keyboard="false" onClick="AddIdOtrosModal('')"><i class="fa fa-plus-square"></i> Agregar Otros Servicios</button>
                                        </div>


                                        <div class="row mt-3"><span class="card-subtitle">Otros Servicios Utilizados por la Planta (Servicios tercerizados, mano de obra indirecta, etc.)</span>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-deredbor border display yajra-table-otros">

                                                <thead>
                                                    <tr bgcolor="#808080" class="text-white" role="row">
                                                        <th>N°</th>
                                                        <th>Servicio Utilizado</th>
                                                        <th>Frecuencia</th>
                                                        <th>Costo</th>
                                                        <th>Año</th>
                                                        <th width="12%">Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="BusquedaRapida">



                                                </tbody>
                                            </table>
                                            <span class="card-subtitle">Nota:
                                                <i class="mdi mdi-eye text-danger font-16"></i>(Ver Servicio) - <i class="mdi mdi-table-edit text-danger font-16"></i>(Editar Servicio) - <i class="mdi mdi-delete text-danger font-16"></i>(Eliminar Servicio)
                                            </span>
                                        </div>



                                        <hr>


                                        <!-- ###################################### CONSULTA DE EGRESOS DEVENGADOS ###################################### -->

                                        <h3 class="card-subtitle mt-3"> Gastos Generados</h3>


                                        <div class="text-right">

                                            <button id="agregar_egreso" type="button" class="btn btn-info" data-placement="left" title="Agregar Nuevo Egreso" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalDevengados" data-backdrop="static" data-keyboard="false" onClick="AddIdActividadDevengadosModal('')"><i class="fa fa-plus-square"></i> Agregar Gasto Generado</button>
                                        </div>


                                        <div class="row mt-3"><span class="card-subtitle">Gastos Generados (Sueldos, Contribuciones, Pagos, Costo y Alquileres.)</span>

                                            <div class="table-responsive">
                                                <table class="table table-deredbor border display yajra-table-gastos">

                                                    <thead>
                                                        <tr bgcolor="#808080" class="text-white" role="row">
                                                            <th>N°</th>
                                                            <th>Servicio Utilizado</th>
                                                            <th>Costo</th>
                                                            <th>Año</th>
                                                            <th width="12%">Acciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="BusquedaRapida">




                                                    </tbody>
                                                </table>
                                                <span class="card-subtitle">Nota:
                                                    <i class="mdi mdi-eye text-danger font-16"></i>(Ver Servicio) - <i class="mdi mdi-table-edit text-danger font-16"></i>(Editar Servicio)
                                                </span>
                                            </div>

                                        </div>


                                    </div>






                                </section>


                                <section id="splanta">

                                    <!-- ###################################### CONSULTA DE SITUACION DE PLANA ###################################### -->


                                    <div class='alert alert-danger' id="div_info_sp" style="display: none;">
                                        <center><span class='fa fa-info-circle'></span>Por favor debe realizar la carga de la industria</center>
                                    </div>


                                    <div id="info_sp">

                                        <h3 class="card-subtitle mt-3"> Situación de Planta</h3>



                                        <div class="text-right">
                                            <button type="button" class="btn btn-info" data-placement="left" title="Agregar Nueva Situación de Planta" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalSituacion" data-backdrop="static" data-keyboard="false" onClick="AddIdSituacionModal('')"><i class="fa fa-plus-square"></i> Agregar Situación</button>
                                        </div>


                                        <div class="table-responsive mt-3 ">
                                            <table class="table table-deredbor border display tabla_splanta">

                                                <thead>
                                                    <tr bgcolor="#808080" class="text-white" role="row">
                                                        <th>N°</th>
                                                        <th>Porc. de Producción</th>
                                                        <th>Sup. de Lote Industrial</th>
                                                        <th>Sup. Ocupada por Planta</th>
                                                        <th>Porc. de Capacidad Instalada</th>
                                                        <th>Porc. de Capacidad Ociosa</th>
                                                        <th>Año</th>
                                                        <th width="12%">Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="BusquedaRapida">


                                                </tbody>
                                            </table>
                                            <span class="card-subtitle">Nota:
                                                <i class="mdi mdi-eye text-danger font-16"></i>(Ver Situación) - <i class="mdi mdi-table-edit text-danger font-16"></i>(Editar Situación) - <i class="mdi mdi-delete text-danger font-16"></i>(Eliminar Situación)
                                            </span>
                                        </div>



                                        <hr>


                                        <!-- ###################################### CONSULTA DE OCIOSIDAD ###################################### -->

                                        <h3 class="card-subtitle mt-3"> Motivo Ociosidad</h3>



                                        <div class="text-right">
                                            <button type="button" class="btn btn-info" data-placement="left" title="Agregar Nuevo Motivo Ociosidad" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalMotivo" data-backdrop="static" data-keyboard="false" onClick="AddIdMotivoModal('')"><i class="fa fa-plus-square"></i> Agregar Motivo Ociosidad</button>
                                        </div>


                                        <div class="row mt-3"><span class="card-subtitle">Motivo Ociosidad (Ej: Falta de Maquinarias, Falta de Personal, Alta Carga Impositiva, Costo Energía Eléctrica, otros)</span>

                                            <div class="table-responsive">
                                                <table class="table table-deredbor border display tabla_mo">

                                                    <thead>
                                                        <tr bgcolor="#808080" class="text-white" role="row">
                                                            <th>N°</th>
                                                            <th>Descripción de Motivo Ociosidad</th>
                                                            <th>Año</th>
                                                            <th width="12%">Acciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="BusquedaRapida">




                                                    </tbody>
                                                </table>
                                                <span class="card-subtitle">Nota:
                                                    <i class="mdi mdi-eye text-danger font-16"></i>(Ver Motivo Ociosidad) - <i class="mdi mdi-table-edit text-danger font-16"></i>(Editar Motivo Ociosidad) - <i class="mdi mdi-delete text-danger font-16"></i>(Eliminar Motivo Ociosidad)
                                                </span>
                                            </div>

                                        </div>

                                        <hr>

                                        <!-- ###################################### CONSULTA DE PERSONAL ###################################### -->

                                        <h3 class="card-subtitle mt-3"> Personal Ocupado</h3>


                                        <div class="text-right">
                                            <button type="button" class="btn btn-info" data-placement="left" title="Agregar Personal Ocupado" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalPersonal" data-backdrop="static" data-keyboard="false" onClick="AddIdPersonalModal('')"><i class="fa fa-plus-square"></i> Agregar Personal Ocupado</button>
                                        </div>

                                        <div class="row">

                                            <div class=" col-sm">
                                                <h3> <span class="badge badge-success">Masculino</span></h3>

                                                <table class="table table-deredbor border display tabla_po_m" style="width: 100%; margin:0px !important">

                                                    <thead>
                                                        <tr bgcolor="#808080" class="text-white" role="row">
                                                            <th>N°</th>
                                                            <th>Rol de Trabajador</th>
                                                            <th>Cantidad</th>
                                                            <th>Condicion Laboral</th>

                                                            <th>Año</th>
                                                            <th width="12%">Acciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="BusquedaRapida">




                                                    </tbody>
                                                </table>
                                                <span class="card-subtitle">Nota:
                                                    <i class="mdi mdi-eye text-danger font-16"></i>(Ver Personal) - <i class="mdi mdi-table-edit text-danger font-16"></i>(Editar Personal)
                                                </span>
                                            </div>

                                            <div class=" col-sm">
                                                <h3> <span class="badge badge-success">Femenino</span></h3>
                                                <table class="table table-deredbor border display tabla_po_f" style="width: 100%; margin:0px !important">

                                                    <thead>
                                                        <tr bgcolor="#808080" class="text-white" role="row">
                                                            <th>N°</th>
                                                            <th>Rol de Trabajador</th>
                                                            <th>Cantidad</th>
                                                            <th>Condicion Laboral</th>

                                                            <th>Año</th>
                                                            <th width="12%">Acciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="BusquedaRapida">




                                                    </tbody>
                                                </table>
                                                <span class="card-subtitle">Nota:
                                                    <i class="mdi mdi-eye text-danger font-16"></i>(Ver Personal) - <i class="mdi mdi-table-edit text-danger font-16"></i>(Editar Personal)
                                                </span>
                                            </div>

                                        </div>


                                        <hr>


                                    </div>


                                </section>


                                <section id="vyf">


                                    <!-- ###################################### CONSULTA DE VENTAS ###################################### -->


                                    <div class='alert alert-danger' id="div_info_vyf" style="display: none;">
                                        <center><span class='fa fa-info-circle'></span>Por favor debe realizar la carga de la industria</center>
                                    </div>

                                    <div id="info_vyf">

                                        <h3 class="card-subtitle mt-3"> Ventas</h3>


                                        <div class="text-right">
                                            <button type="button" class="btn btn-info" data-placement="left" title="Agregar Nueva Venta" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalVenta" data-backdrop="static" data-keyboard="false" onClick="AddIdVentaModal('')"><i class="fa fa-plus-square"></i> Agregar Venta</button>
                                        </div>


                                        <div class="table-responsive mt-3">
                                            <table class="table table-deredbor border display table_ventas">

                                                <thead>
                                                    <tr bgcolor="#808080" class="text-white" role="row">
                                                        <th>N°</th>
                                                        <th>Clasificación de Venta</th>
                                                        <th>Provincias</th>
                                                        <th>Paises</th>
                                                        <th>Año</th>
                                                        <th width="12%">Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="BusquedaRapida">



                                                </tbody>
                                            </table>
                                            <span class="card-subtitle">Nota:
                                                <i class="mdi mdi-eye text-danger font-16"></i>(Ver Venta) - <i class="mdi mdi-table-edit text-danger font-16"></i>(Editar Venta)
                                            </span>
                                        </div>



                                        <hr>

                                        <!-- ###################################### CONSULTA DE FACTURACION ###################################### -->

                                        <h3 class="card-subtitle mt-3"> Facturación </h3>


                                        <div class="text-right">
                                            <button type="button" class="btn btn-info" data-placement="left" title="Agregar Facturación" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalFacturacion" data-backdrop="static" data-keyboard="false" onClick="AddIdFacturacionModal('');"><i class="fa fa-plus-square"></i> Agregar Facturación</button>
                                        </div>


                                        <div class="table-responsive mt-3">
                                            <table class="table table-deredbor border display table_facturacion">

                                                <thead>
                                                    <tr bgcolor="#808080" class="text-white" role="row">
                                                        <th>N°</th>
                                                        <th>Facturación Anual en Pesos Arg.</th>
                                                        <th>Facturación Anual en USD</th>
                                                        <th>Porc. Mercado Interno</th>
                                                        <th>Porc. Mercado Externo</th>
                                                        <th>Clasificacion</th>
                                                        <th>Año</th>
                                                        <th width="12%">Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="BusquedaRapida">




                                                </tbody>
                                            </table>
                                            <span class="card-subtitle">Nota:
                                                <i class="mdi mdi-eye text-danger font-16"></i>(Ver Facturación) - <i class="mdi mdi-table-edit text-danger font-16"></i>(Editar Facturación) - <i class="mdi mdi-delete text-danger font-16"></i>(Eliminar Facturación)
                                            </span>
                                        </div>



                                        <hr>

                                    </div>


                                </section>

                                <section id="pyca">

                                    <!-- ###################################### CONSULTA DE EFLUENTES ###################################### -->

                                    
                                    <div class='alert alert-danger' id="div_info_pyca" style="display: none;">
                                        <center><span class='fa fa-info-circle'></span>Por favor debe realizar la carga de la industria</center>
                                    </div>


                                    <div id="info_pyca">
                                    <h3 class="card-subtitle mt-3"> Efluentes</h3>



                                        <div class="text-right">
                                            <button type="button" class="btn btn-info" data-placement="left" title="Agregar Nuevo Efluente" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalEfluente" data-backdrop="static" data-keyboard="false" onClick="AddIdEfluenteModal('')"><i class="fa fa-plus-square"></i> Agregar Efluente</button>
                                        </div>


                                        <div class="row mt-3"><span class="card-subtitle">Indique los efluentes industriales involucrados en la actividad declarada</span>

                                            <div class="table-responsive">
                                                <table class="table table-deredbor border display table_efluente">

                                                    <thead>
                                                        <tr bgcolor="#808080" class="text-white" role="row">
                                                            <th>N°</th>
                                                            <th>Efluente</th>
                                                            <th>Tratamiento Residuo</th>
                                                            <th>Destino Final</th>
                                                            <th>Año</th>
                                                            <th width="12%">Acciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="BusquedaRapida">




                                                    </tbody>
                                                </table>
                                                <span class="card-subtitle">Nota:
                                                    <i class="mdi mdi-eye text-danger font-16"></i>(Ver Efluente) - <i class="mdi mdi-table-edit text-danger font-16"></i>(Editar Efluente) - <i class="mdi mdi-delete text-danger font-16"></i>(Eliminar Efluente)
                                                </span>
                                            </div>

                                        </div>

                                        <hr>

                                        <!-- ###################################### CONSULTA DE CERTIFICADOS ###################################### -->

                                        <h3 class="card-subtitle mt-3"> Certificados </h3>


                                        <div class='alert alert-danger' style="display:none">
                                            <center><span class='fa fa-info-circle'></span> POR FAVOR REALICE LA CARGA DE DATOS GENERALES PARA ASIGNAR CERTIFICADOS</center>
                                        </div>

                                        <div class="text-right">
                                            <button type="button" class="btn btn-info" data-placement="left" title="Agregar Certificados" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalCertificado" data-backdrop="static" data-keyboard="false" onClick="AddIdCertificadoModal('')"><i class="fa fa-plus-square"></i> Agregar Certificado</button>
                                        </div>


                                        <div class="table-responsive mt-3">
                                            <table class="table table-deredbor border display table_certificados_list">

                                                <thead>
                                                    <tr bgcolor="#808080" class="text-white" role="row">
                                                        <th>N°</th>
                                                        <th>Certificado</th>
                                                        <th>Estado</th>
                                                        <th>Fecha Inicial</th>
                                                        <th>Fecha Final</th>
                                                        <th>Año</th>
                                                        <th width="12%">Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="BusquedaRapida">




                                                </tbody>
                                            </table>
                                            <span class="card-subtitle">Nota:
                                                <i class="mdi mdi-eye text-danger font-16"></i>(Ver Certificado) - <i class="mdi mdi-table-edit text-danger font-16"></i>(Editar Certificado) - <i class="mdi mdi-delete text-danger font-16"></i>(Eliminar Certificado)
                                            </span>
                                        </div>


                                    </div>



                                </section>

                                <section id="sc">




                                    <div class='alert alert-danger' id="div_info_sc" style="display: none;">
                                        <center><span class='fa fa-info-circle'></span>Por favor debe realizar la carga de la industria</center>
                                    </div>


                                    <div id="info_sc">


                                        <h3 class="card-subtitle mt-3"> Sistemas de Calidad </h3>

                                        <div class="text-right">
                                            <button type="button" class="btn btn-info" data-placement="left" title="Agregar Norma de Calidad" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalSistema" data-backdrop="static" data-keyboard="false" onClick="AddIdSistemaModal('')"><i class="fa fa-plus-square"></i> Agregar Norma de Calidad</button>
                                        </div>


                                        <div class="row mt-3"><span class="card-subtitle">Identifique, si tuviere, las Normas de Calidad Nacionales y/o Internacionales implementadas</span>
                                            <div class="table-responsive">
                                                <table class="table table-deredbor border display table_sc">

                                                    <thead>
                                                        <tr bgcolor="#808080" class="text-white" role="row">
                                                            <th>Nº</th>
                                                            <th>Norma de Calidad</th>
                                                            <th>Estado</th>
                                                            <th>Fecha Inicial</th>
                                                            <th>Fecha Final</th>
                                                            <th>Año</th>
                                                            <th width="12%">Acciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="BusquedaRapida">



                                                    </tbody>
                                                </table>
                                                <span class="card-subtitle">Nota:
                                                    <i class="mdi mdi-eye text-danger font-16"></i>(Ver Sistema) - <i class="mdi mdi-table-edit text-danger font-16"></i>(Editar Sistema) - <i class="mdi mdi-delete text-danger font-16"></i>(Eliminar Sistema)
                                                </span>
                                            </div>

                                        </div>

                                        <hr>

                                        <!-- ###################################### CONSULTA DE PROMOCIONES ###################################### -->

                                        <h3 class="card-subtitle mt-3"> Promociones </h3>


                                        <div class="text-right">
                                            <button type="button" class="btn btn-info" data-placement="left" title="Agregar Promoción" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalPromocion" data-backdrop="static" data-keyboard="false" onClick="AddIdPromocionModal('')"><i class="fa fa-plus-square"></i> Agregar Promoción</button>
                                        </div>


                                        <div class="table-responsive mt-3">
                                            <table class="table table-deredbor border display table_promo">

                                                <thead>
                                                    <tr bgcolor="#808080" class="text-white" role="row">
                                                        <th>Nº</th>
                                                        <th>Descripción de Promoción</th>
                                                        <th>Estado</th>
                                                        <th>Fecha Inicial</th>
                                                        <th>Fecha Final</th>
                                                        <th>Año</th>
                                                        <th width="12%">Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="BusquedaRapida">



                                                </tbody>
                                            </table>
                                            <span class="card-subtitle">Nota:
                                                <i class="mdi mdi-eye text-danger font-16"></i>(Ver Promoción) - <i class="mdi mdi-table-edit text-danger font-16"></i>(Editar Promoción) - <i class="mdi mdi-delete text-danger font-16"></i>(Eliminar Promoción)
                                            </span>
                                        </div>



                                        <hr>
                                    </div>



                                </section>


                                <section id="ec">


                                    <!-- ###################################### CONSULTA DE ECONOMIA DEL CONOCIMIENTO ###################################### -->



                                    <div class='alert alert-danger' id="div_info_ec" style="display: none;">
                                        <center><span class='fa fa-info-circle'></span>Por favor debe realizar la carga de la industria</center>
                                    </div>



                                    <div id="info_ec">
                                        <h3 class="card-subtitle mt-3"> Economía del Conocimiento </h3>


                                        <div class="text-right">
                                            <button type="button" class="btn btn-info" data-placement="left" title="Agregar Norma de Calidad" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalEconomia" data-backdrop="static" data-keyboard="false" onClick="AddIdEconomiaModal('')"><i class=" fa fa-plus-square"></i> Agregar Economía</button>
                                        </div>

                                        <div class="table-responsive mt-3">
                                            <table class="table table-deredbor border display table_economia">

                                                <thead>
                                                    <tr bgcolor="#808080" class="text-white" role="row">
                                                        <th>Nº</th>
                                                        <th>Inversión en Sector</th>
                                                        <th>Año</th>
                                                        <th width="12%">Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="BusquedaRapida">




                                                </tbody>
                                            </table>
                                            <span class="card-subtitle">Nota:
                                                <i class="mdi mdi-eye text-danger font-16"></i>(Ver Economía) - <i class="mdi mdi-table-edit text-danger font-16"></i>(Editar Economía) - <i class="mdi mdi-delete text-danger font-16"></i>(Eliminar Economía)
                                            </span>
                                        </div>



                                        <hr>





                                        <!-- ###################################### Perfil ###################################### -->

                                        <h3 class="card-subtitle mt-3"> Perfil asociado a la industria </h3>



                                        <div class="text-right">
                                            <button type="button" class="btn btn-info" data-placement="left" title="Agregar Perfil" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalPerfil" data-backdrop="static" data-keyboard="false" onClick="AddIdEconomiaModal('')"><i class=" fa fa-plus-square"></i> Agregar Perfil</button>
                                        </div>


                                        <div class="table-responsive mt-3">
                                            <table class="table table-deredbor border display table_perfil ">

                                                <thead>
                                                    <tr bgcolor="#808080" class="text-white" role="row">
                                                        <th>Nº</th>
                                                        <th>Perfil</th>
                                                        <th>Año</th>
                                                        <th width="12%">Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="BusquedaRapida">




                                                </tbody>
                                            </table>
                                            <span class="card-subtitle">Nota:
                                                <i class="mdi mdi-delete text-danger font-16"></i>(Eliminar Perfil)
                                            </span>
                                        </div>



                                        <hr>

                                    </div>





                                </section>

                                <section id="ddjj">

                                    <div class="card">
                                        <div class="card-header">
                                            Datos del Contribuyente
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group has-feedback">
                                                        <label class="control-label">Nº de Cuit:</label>
                                                        <br><abbr title="Nº de CUIT/CUIL"></abbr><span id="cuit_dj"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group has-feedback">
                                                        <label class="control-label">Razon social:</label>
                                                        <br><abbr title="Nº de CUIT/CUIL"></abbr> <span id="rs_dj"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group has-feedback">
                                                        <label class="control-label">Regimen de Ingresos Brutos:</label>
                                                        <br><abbr title="Nº de CUIT/CUIL"></abbr><span id="rib_dj"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group has-feedback">
                                                        <label class="control-label">Nº de Ingresos Brutos:</label>
                                                        <br><abbr title="Nº de CUIT/CUIL"></abbr><span id="nib_dj"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group has-feedback">
                                                        <label class="control-label">Condición Frente al Iva:</label>
                                                        <br><abbr title="Nº de CUIT/CUIL"></abbr><span id="civa_dj"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group has-feedback">
                                                        <label class="control-label">Naturaleza Juridica:</label>
                                                        <br><abbr title="Nº de CUIT/CUIL"></abbr> <span id="nj_dj"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group has-feedback">
                                                        <label class="control-label">Email Fiscal :</label>
                                                        <br><abbr title="Nº de CUIT/CUIL"></abbr><span id="ef_dj"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group has-feedback">
                                                        <label class="control-label">Código Postal:</label>
                                                        <br><abbr title="Nº de CUIT/CUIL"></abbr><span id="cp_dj"></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group has-feedback">
                                                        <label class="control-label">Fecha Inicio Actividad Contribuyente:</label>
                                                        <br><abbr title="Nº de CUIT/CUIL"></abbr><span id="fiac_dj"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group has-feedback">
                                                        <label class="control-label">Localidad legal:</label>
                                                        <br><abbr title="Nº de CUIT/CUIL"></abbr> <span id="ll_dj"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group has-feedback">
                                                        <label class="control-label">Dni:</label>
                                                        <br><abbr title="Nº de CUIT/CUIL"></abbr><span id="dni_dj"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group has-feedback">
                                                        <label class="control-label">Declarante:</label>
                                                        <br><abbr title="Nº de CUIT/CUIL"></abbr><span id="d_dj"></span>
                                                    </div>
                                                </div>


                                            </div>

                                            <div class="row">

                                                <div class="col-md-3">
                                                    <div class="form-group has-feedback">
                                                        <label class="control-label">En calidad de:</label>
                                                        <br><abbr title="Nº de CUIT/CUIL"></abbr><span id="calidad_dj"></span>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            Datos de la industria
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group has-feedback">
                                                        <label class="control-label">Nombre de Establecimiento Industrial (Nombre de Fantasia): </label>
                                                        <br><abbr></abbr><span id="nei_dj"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group has-feedback">
                                                        <label class="control-label">Fecha de Inicio Actividad en Establecimiento:</label>
                                                        <br><abbr></abbr><span id="fiae_dj"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group has-feedback">
                                                        <label class="control-label">Es casa central?:</label>
                                                        <br><abbr></abbr><span id="ecc_dj"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group has-feedback">
                                                        <label class="control-label">Es Zona industrial?: </label>
                                                        <br><abbr></abbr> <span id="ezi_dj"></span>
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group has-feedback">
                                                        <label class="control-label">Nº de Teléfono Fijo:</label>
                                                        <br><abbr></abbr><span id="ntf_dj"></span>
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group has-feedback">
                                                        <label class="control-label">Nº de Celular de Contacto de la Empresa: </label>
                                                        <br><abbr></abbr><span id="ntc_dj"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group has-feedback">
                                                        <label class="control-label">Correo Electrónico de la Empresa:</label>
                                                        <br><abbr></abbr> <span id="cee_dj"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group has-feedback">
                                                        <label class="control-label">Localidad de Planta:</label>
                                                        <br><abbr></abbr><span id="lp_dj"></span>
                                                    </div>
                                                </div>


                                            </div>

                                            <div class="row">

                                                <div class="col-md-3">
                                                    <div class="form-group has-feedback">
                                                        <label class="control-label">Pagina Web: </label>
                                                        <br><abbr></abbr><span id="pw_dj"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group has-feedback">
                                                        <label class="control-label">Latitud de Ubicación: </label>
                                                        <br><abbr></abbr><span id="lu_dj"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group has-feedback">
                                                        <label class="control-label">Longitud de Ubicación: </label>
                                                        <br><abbr></abbr> <span id="lonu_dj"></span>
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group has-feedback">
                                                        <label class="control-label">Código Postal: </label>
                                                        <br><abbr></abbr> <span id="cpi_dj"></span>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">


                                        <div class="card">
                                            <div class="card-header">
                                                Actividades y Productos
                                            </div>

                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Actividad</th>
                                                        <th scope="col">Es Actividad principal?</th>
                                                        <th scope="col">Obs.</th>
                                                        <th scope="col">Fecha inicio</th>
                                                        <th scope="col">Fecha fin</th>
                                                        <th scope="col">Producto elaborado</th>
                                                        <th scope="col">Cantidad producida</th>
                                                        <th scope="col">Porcentaje de producción</th>
                                                        <th scope="col">Ventas en provincia</th>
                                                        <th scope="col">Ventas en otras provincias</th>
                                                        <th scope="col">Ventas en el exterior</th>
                                                        <th scope="col">Año</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbody_act_prod_dj">

                                                </tbody>
                                            </table>



                                        </div>


                                        <div class="card">
                                            <div class="card-header">
                                                Actividades y Materia prima
                                            </div>

                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Actividad</th>
                                                        <th scope="col">Es Act. principal?</th>
                                                        <th scope="col">Obs.</th>
                                                        <th scope="col">Fecha inicio</th>
                                                        <th scope="col">Fecha fin</th>
                                                        <th scope="col">M.P Elaborada</th>
                                                        <th scope="col">Cantidad de M.P anual utilizada</th>
                                                        <th scope="col">Propia?</th>
                                                        <th scope="col">Loc. origen</th>
                                                        <th scope="col">Pais origen</th>
                                                        <th scope="col">Motivo Import.</th>
                                                        <th scope="col">Detalle Motivo</th>
                                                        <th scope="col">Año</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbody_act_mp_dj">

                                                </tbody>
                                            </table>



                                        </div>






                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            Insumos de la industria
                                        </div>

                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Insumo</th>
                                                    <th scope="col">Es propio?</th>
                                                    <th scope="col">Localidad origen del insumo</th>
                                                    <th scope="col">Pais origen del insumo</th>
                                                    <th scope="col">Motivo de importacion</th>
                                                    <th scope="col">Detalle del motivo de importacion</th>
                                                    <th scope="col">Año</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbody_insumos_dj">

                                            </tbody>
                                        </table>



                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            Servicios de la industria
                                        </div>

                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Servicio</th>
                                                    <th scope="col">Cantidad Consumida</th>
                                                    <th scope="col">Costo del servicio</th>
                                                    <th scope="col">Frecuencia de contratacion</th>
                                                    <th scope="col">Localidad origen del servicio</th>
                                                    <th scope="col">Pais origen del servicio</th>
                                                    <th scope="col">Motivo de importacion</th>
                                                    <th scope="col">Detalle del motivo de importacion</th>
                                                    <th scope="col">Año</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbody_servicios_dj">

                                            </tbody>
                                        </table>



                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            Gastos
                                        </div>

                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Concepto</th>
                                                    <th scope="col">Importe</th>

                                                    <th scope="col">Año</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbody_gastos_dj">

                                            </tbody>
                                        </table>



                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            Situacion de planta
                                        </div>

                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">% de producción</th>
                                                    <th scope="col">Sup. Lote</th>
                                                    <th scope="col">Sup. Planta</th>
                                                    <th scope="col">Z. industrial?</th>
                                                    <th scope="col">Inv. Anual</th>
                                                    <th scope="col">Inv Activo Fijo</th>
                                                    <th scope="col">Cap. Inst.</th>
                                                    <th scope="col">Cap.Ociosa</th>
                                                    <th scope="col">Año</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbody_situacion_dj">

                                            </tbody>
                                        </table>



                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            Motivo Ociosidad
                                        </div>

                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Motivo</th>

                                                    <th scope="col">Año</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbody_mot_o_dj">

                                            </tbody>
                                        </table>



                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            Personal ocupado
                                        </div>

                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Rol</th>
                                                    <th scope="col">Condicion Laboral</th>
                                                    <th scope="col">Sexo</th>
                                                    <th scope="col">N° de Trabajadores</th>

                                                    <th scope="col">Año</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbody_p_ocupado_dj">

                                            </tbody>
                                        </table>



                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            Ventas Internacionales
                                        </div>

                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Tipo de venta</th>
                                                    <th scope="col">Pais</th>
                                                    <th scope="col">Año</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbody_venta_inter_dj">

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            Ventas Nacionales
                                        </div>

                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Tipo de venta</th>
                                                    <th scope="col">Provincia</th>
                                                    <th scope="col">Año</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbody_venta_nacional_dj">

                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            Facturación
                                        </div>

                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Clasificacion</th>
                                                    <th scope="col">Facturación Anual (Pesos) </th>
                                                    <th scope="col">Facturación Anual (USD) </th>
                                                    <th scope="col">Facturación Mercado Interno (%)</th>
                                                    <th scope="col">Facturación Mercado Externo (%)</th>
                                                    <th scope="col">Año</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbody_facturacion_dj">

                                            </tbody>
                                        </table>
                                    </div>


                                    <div class="card">
                                        <div class="card-header">
                                            Efluentes
                                        </div>

                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Efluente</th>
                                                    <th scope="col">Tratamiento</th>
                                                    <th scope="col">Destino</th>
                                                    <th scope="col">Año</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbody_efluentes_dj">

                                            </tbody>
                                        </table>



                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            Certificados de la industria
                                        </div>

                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Certificado</th>
                                                    <th scope="col">Estado</th>
                                                    <th scope="col">Vigencia del certificado</th>
                                                    <th scope="col">Año</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbody_certificados_dj">

                                            </tbody>
                                        </table>



                                    </div>


                                    <div class="card">
                                        <div class="card-header">
                                            Sistemas de calidad de la industria
                                        </div>

                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th width="25%" scope="col">Sistema de calidad</th>
                                                    <th width="25%" scope="col">Estado</th>
                                                    <th width="25%" scope="col">Vigencia </th>
                                                    <th width="25%" scope="col">Año</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbody_sistemas_dj">

                                            </tbody>
                                        </table>



                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            Promocion industrial
                                        </div>

                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th width="25%" scope="col">Descripción</th>
                                                    <th width="25%" scope="col">Estado</th>
                                                    <th width="25%" scope="col">Vigencia</th>
                                                    <th width="25%" scope="col">Año</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbody_promo_dj">

                                            </tbody>
                                        </table>



                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            Economia del conocimiento
                                        </div>

                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th width="25%" scope="col">Sector</th>
                                                    <th width="25%" scope="col">Año</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbody_economia_dj">

                                            </tbody>
                                        </table>



                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            Perfil
                                        </div>

                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th width="25%" scope="col">Perfil</th>
                                                    <th width="25%" scope="col">Año</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbody_perfil_dj">

                                            </tbody>
                                        </table>



                                    </div>

                                </section>


                            </div><!-- Div secciones -->


                        </div><!-- div form body-->
                    </div>


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
</div>


@endsection