@extends('layouts.index-layout')

@section('content')

@include('menus.menuContribuyente')
@include('Actividades.modales')
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
                        <h3 class="card-title"><i class="fa fa-building"></i> Trámite de Registro y Estadistica Industrial</h3>
                        <h4 class="card-subtitle">Declaración jurada anual (Dec. 1736/68 MHEOP: Dec. 534/77 ME; Dec. 100/81 MEO y SP; Dec. 4962/85 MHS y OP) </h4>
                        <hr>

                        <div id="save">
                            <!-- error will be shown here ! -->
                        </div>

                        <div class="form-body">
                            <!--form body-->

                            <div id="secciones" class="mt-3">
                                <!-- Div secciones -->



                                <div class="row-horizon">
                                    <span class="categories selectedGat" id="seccion#1" onclick="CargaFormulario('','');"><i class="fa fa-tasks"></i> Datos Generales</span>
                                    <span class="categories" id="seccion#2" onclick="CargaFormulario('','');"><i class="fa fa-tasks"></i> Actividad</span>
                                    <span class="categories" id="seccion#3" onclick="CargaFormulario('','');"><i class="fa fa-tasks"></i> Insumos y Servicios</span>
                                    <span class="categories" id="seccion#4" onclick="CargaFormulario('','');"><i class="fa fa-tasks"></i> Situación de la Planta</span>
                                    <span class="categories" id="seccion#5" onclick="CargaFormulario('','');"><i class="fa fa-tasks"></i> Ventas y Facturación</span>
                                    <span class="categories" id="seccion#6" onclick="CargaFormulario('','');"><i class="fa fa-tasks"></i> Prevención y Control Ambiental</span>
                                    <span class="categories" id="seccion#7" onclick="CargaFormulario('','');"><i class="fa fa-tasks"></i> Sistemas de Calidad</span>
                                    <span class="categories" id="seccion#8" onclick="CargaFormulario('','');"><i class="fa fa-tasks"></i> Economía del Conocimiento</span>
                                    <span class="categories" id="seccion#9" onclick="CargaFormulario('','');"><i class="fa fa-tasks"></i> Revisión y Confirmación DDJJ</span>
                                </div>

                                <hr>


                                <form class="form-material" method="post" action="#" name="savegeneral" id="savegeneral" enctype="multipart/form-data">
                                    @csrf
                                    <h3 class="card-subtitle mt-3"> Datos Generales</h3>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group has-feedback">
                                                <label class="control-label">Año: <span class="symbol required"></span></label>
                                                (Si bien el certificado será emitido a fecha del año corriente, la información volcada en el formulario debe corresponder al ejercicio inmediato anterior)
                                                <i class="fa fa-bars form-control-feedback"></i>
                                                <select class="form-control" id="id_periodo_fiscal" name="id_periodo_fiscal" disabled="" required="" aria-required="true">

                                                    <option value="{{$per_fiscal->anio}}">{{$per_fiscal->anio}}</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <h3 class="card-subtitle mt-3"> Datos de Establecimiento Industrial</h3>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group has-feedback">
                                                <label class="control-label">Nombre o Razón Social de la Empresa: <span class="symbol required"></span></label>
                                                <input type="hidden" name="secciongeneral" id="secciongeneral" value="">
                                                <input type="hidden" name="proceso" id="proceso" value="updategeneral" value="savegeneral" />
                                                <input type="hidden" name="id_contribuyente" id="id_contribuyente" value="" value="">
                                                <input type="hidden" name="id_persona" id="id_persona" value="" value="">
                                                <input type="hidden" name="id_industria" id="id_industria" value="" value="0">
                                                <input type="hidden" name="id_periodo_de_actividad_de_contribuyente" id="id_periodo_de_actividad_de_contribuyente" value="">
                                                <br><abbr title="Nombre Razón Social de Empresa"></abbr>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group has-feedback">
                                                <label class="control-label">Nº de Cuit: <span class="symbol required"></span></label>
                                                <br><abbr title="Nº de CUIT/CUIL"></abbr>{{$cuit->cuit}}
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group has-feedback">
                                                <label class="control-label">Fecha Inicio Actividad Contribuyente: <span class="symbol required"></span></label>
                                                <input type="text" class="form-control actividades" name="fecha_actividad_contribuyente" id="fecha_actividad_contribuyente" placeholder="Ingrese Fecha Inicio Actividad de Contribuyente" autocomplete="off" value="" required="" aria-required="true" />
                                                <i class="fa fa-calendar form-control-feedback"></i>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group has-feedback">
                                                <label class="control-label">Régimen de Ingresos Brutos: <span class="symbol required"></span></label>
                                                <i class="fa fa-bars form-control-feedback"></i>

                                                <select class="form-control" id="id_regimen_ib" name="id_regimen_ib" required="" aria-required="true">
                                                    <option value=""> -- SELECCIONE -- </option>
                                                    @foreach($regimen as $reg)
                                                        <option value="{{$reg->id_regimen_ib}}">{{$reg->regimen_ib}}</option>
                                                    @endforeach

                                                </select>



                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group has-feedback">
                                                <label class="control-label">Nº de Ingresos Brutos: <span class="symbol required"></span></label>
                                                <input type="text" class="form-control" name="numero_de_ib" id="numero_de_ib" placeholder="Ingrese Nº de Ingresos Brutos" autocomplete="off" value="" required="" aria-required="true" />
                                                <i class="fa fa-pencil form-control-feedback"></i>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group has-feedback">
                                                <label class="control-label">Condición Frente al Iva: <span class="symbol required"></span></label>
                                                <i class="fa fa-bars form-control-feedback"></i>

                                                <select class="form-control" id="id_condicion_iva" name="id_condicion_iva" required="" aria-required="true">
                                                    <option value=""> -- SELECCIONE -- </option>
                                                    @foreach($condicion_iva as $iva)
                                                    <option value="{{$iva->id_condicion_iva}}">{{$iva->condicion_iva}}</option>
                                                    @endforeach
                                                </select>



                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group has-feedback">
                                                <label class="control-label">Naturaleza Juridica: <span class="symbol required"></span></label>
                                                <i class="fa fa-bars form-control-feedback"></i>

                                                <select class="form-control" id="id_naturaleza_juridica" name="id_naturaleza_juridica" required="" aria-required="true">
                                                    <option value=""> -- SELECCIONE -- </option>
                                                    @foreach($naturaleza_juridica as $naturaleza)
                                                    <option value="{{$naturaleza->id_naturaleza_juridica}}">{{$naturaleza->naturaleza_juridica}} </option>
                                                    @endforeach

                                                </select>


                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group has-feedback">
                                                <label class="control-label">Nombre de Establecimiento Industrial <span class="text-blue">(Nombre de Fantasia)</span>: <span class="symbol required"></span></label>
                                                <input type="text" class="form-control" name="nombre_de_fantasia" id="nombre_de_fantasia" placeholder="Ingrese Nombre de Establecimiento Industrial" autocomplete="off" value="" required="" aria-required="true" />
                                                <i class="fa fa-pencil form-control-feedback"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group has-feedback">
                                                <label class="control-label">Fecha de Inicio Actividad en Establecimiento: <span class="symbol required"></span></label>
                                                <input type="text" class="form-control actividades" name="fecha_actividad_industria" id="fecha_actividad_industria" placeholder="Ingrese Fecha Inicio Actividad de Industria" autocomplete="off" value="" required="" aria-required="true" />
                                                <i class="fa fa-calendar form-control-feedback"></i>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group has-feedback">
                                                <label class="control-label">Es Casa Central: <span class="symbol required"></span></label>
                                                <i class="fa fa-bars form-control-feedback"></i>

                                                <select name="es_casa_central" id="es_casa_central" class="form-control" required="" aria-required="true">
                                                    <option value=""> -- SELECCIONE -- </option>
                                                    <option value="SI">SI</option>
                                                    <option value="NO">NO</option>
                                                </select>



                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group has-feedback">
                                                <label class="control-label">Nº de Teléfono Fijo: <span class="symbol required"></span></label>
                                                <input type="text" class="form-control" name="tel_fijo" id="tel_fijo" placeholder="Ingrese Nº de Teléfono Fijo" value="" autocomplete="off" required="" aria-required="true" />
                                                <i class="fa fa-phone form-control-feedback"></i>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group has-feedback">
                                                <label class="control-label">Nº de Celular de Contacto de la Empresa: <span class="symbol required"></span></label>
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
                                                <label class="control-label">Correo Electrónico para el Seguimiento del Trámite: <span class="symbol required"></span></label>
                                                <input type="text" class="form-control" name="email_fiscal" id="email_fiscal" placeholder="Ingrese Correo Electrónico para Trámite" autocomplete="off" value="" value="" required="" aria-required="true" />
                                                <i class="fa fa-envelope-o form-control-feedback"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group has-feedback">
                                                <label class="control-label">Zona de Planta: <span class="symbol required"></span></label>
                                                <i class="fa fa-bars form-control-feedback"></i>



                                                <select class="form-control" id="zona" name="zona" required="" aria-required="true">
                                                    <option value=""> -- SELECCIONE -- </option>
                                                    <option value="NORTE">NORTE</option>
                                                    <option value="SUR">SUR</option>
                                                    <option value="ESTE">ESTE</option>
                                                    <option value="OESTE">OESTE</option>
                                                </select>

                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group has-feedback">
                                                <label class="control-label">Localidad de Planta: <span style="cursor: pointer;" class="mdi mdi-alert-circle text-danger" data-container="body" title="Notificación: Ingrese Nombre de Localidad y seleccione en el Listado que se mostrará, en caso de no aparecer, escribala y el sistema se encargará de la asignación del mismo."></span><span class="symbol required"></span></label>
                                                <input type="hidden" name="id_localidad" id="id_localidad" value="" />
                                                <input type="text" class="form-control" name="buscar_localidad" id="buscar_localidad" placeholder="Ingrese Nombre de Localidad"  value="" required=""  />
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
                                                <input type="text" class="form-control"  disabled name="buscar_calle" id="buscar_calle" placeholder="Ingrese Nombre de Calle" autocomplete="off" value="" required="" aria-required="true" />
                                                <i class="fa fa-search form-control-feedback"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group has-feedback">
                                                <label class="control-label">Zona Administrativa: <span class="symbol required"></span></label>
                                                <i class="fa fa-bars form-control-feedback"></i>



                                                <select class="form-control" id="zona_administracion" name="zona_administracion" required="" aria-required="true">
                                                   <option value=""> -- SELECCIONE -- </option>
                                                    <option value="NORTE">NORTE</option>
                                                    <option value="SUR">SUR</option>
                                                    <option value="ESTE">ESTE</option>
                                                    <option value="OESTE">OESTE</option>
                                                </select>

                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group has-feedback">
                                                <label class="control-label">Localidad Administrativa: <span style="cursor: pointer;" class="mdi mdi-alert-circle text-danger" data-container="body" title="Notificación: Ingrese Nombre de Localidad y seleccione en el Listado que se mostrará, en caso de no aparecer, escribala y el sistema se encargará de la asignación del mismo."></span><span class="symbol required"></span></label>
                                                <input type="hidden" name="localidad_administracion" id="localidad_administracion" value="" />
                                                <input type="text" class="form-control" name="search_localidad2" id="search_localidad2" placeholder="Ingrese Nombre de Localidad" autocomplete="off" value="" required="" aria-required="true" />
                                                <i class="fa fa-search form-control-feedback"></i>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group has-feedback">
                                                <label class="control-label">Barrio Administrativa: <span style="cursor: pointer;" class="mdi mdi-alert-circle text-danger" data-container="body" title="Notificación: Ingrese Nombre de Barrio y seleccione en el Listado que se mostrará, en caso de no aparecer, escribala y el sistema se encargará de la asignación del mismo."></span><span class="symbol required"></span></label>
                                                <input type="hidden" name="barrio_administracion" id="barrio_administracion" value="" />
                                                <input type="text" class="form-control" name="search_barrio2" id="search_barrio2" placeholder="Ingrese Nombre de Barrio" autocomplete="off" value="" required="" aria-required="true" />
                                                <i class="fa fa-search form-control-feedback"></i>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group has-feedback">
                                                <label class="control-label">Calle Administrativa: <span style="cursor: pointer;" class="mdi mdi-alert-circle text-danger" data-container="body" title="Notificación: Ingrese Nombre de Calle y seleccione en el Listado que se mostrará, en caso de no aparecer, escribala y el sistema se encargará de la asignación del mismo."></span><span class="symbol required"></span></label>
                                                <input type="hidden" name="calle_administracion" id="calle_administracion" value="" />
                                                <input type="text" class="form-control" name="search_calle2" id="search_calle2" placeholder="Ingrese Nombre de Calle" autocomplete="off" value="" required="" aria-required="true" />
                                                <i class="fa fa-search form-control-feedback"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group has-feedback">
                                                <label class="control-label">Nº de Teléfono Fijo: <span class="symbol required"></span></label>
                                                <input type="text" class="form-control" name="tel_fijo_administracion" id="tel_fijo_administracion" placeholder="Ingrese Nº de Teléfono Fijo" value="" autocomplete="off" required="" aria-required="true" />
                                                <i class="fa fa-phone form-control-feedback"></i>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group has-feedback">
                                                <label class="control-label">Nº de Celular de Contacto en Administración: <span class="symbol required"></span></label>
                                                <input type="text" class="form-control" name="tel_celular_administracion" id="tel_celular_administracion" placeholder="Ingrese Nº de Celular" autocomplete="off" value="" required="" aria-required="true" />
                                                <i class="fa fa-mobile form-control-feedback"></i>
                                            </div>
                                        </div>
                                    </div>

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
                                                <div><button type="button" id="find_btn" class="btn btn-info waves-effect waves-light" title="Cargar Coordenadas" onClick="CargarCoordenadas()"><span class="fa fa-map-marker"></span> Cargar Coordenadas</button></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group has-feedback">
                                                <label class="control-label">Pagina Web (Ej: http://dominio.com): <span class="symbol required"></span></label>
                                                <input type="url" class="form-control" name="pagina_web" id="pagina_web" placeholder="Ingrese Url de Pagina Web" autocomplete="off" value="" required="" aria-required="true" />
                                                <i class="fa fa-globe form-control-feedback"></i>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group has-feedback">
                                                <label class="control-label">Correo Electrónico de la Empresa: <span class="symbol required"></span></label>
                                                <input type="text" class="form-control" name="email" id="email" placeholder="Ingrese Correo Electrónico de Empresa" autocomplete="off" value="" required="" aria-required="true" />
                                                <i class="fa fa-envelope-o form-control-feedback"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-right">
                                        <button type="submit" name="btn-submit" id="btn-submit" class="btn btn-danger"><span class="fa fa-save"></span> Continuar</button>
                                    </div>

                                </form>

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


