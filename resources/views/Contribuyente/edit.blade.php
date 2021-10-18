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


                            <div id="save">
                                <!-- error will be shown here ! -->
                            </div>

                            <div class="form-body">
                                <!--form body-->
                                <div class="row-horizons">
                                        <span class="categories selectedGat"
                                        ><i class="fa fa-tasks"></i> Datos del Contribuyente</span>
                                </div>

                                <div id="secciones" class="mt-3">
                                    <!-- Div secciones -->
                                    <hr>
                                    <section id="datosContribuyente">
                                        <form class="form-material"  name="saveContribuyente"
                                              id="saveContribuyente" enctype="multipart/form-data">
                                            @csrf

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group has-feedback">


                                                        <input type="hidden" name="id_contribuyente"
                                                               id="id_contribuyente"
                                                               value="{{$id_contribuyente}}" value="">

                                                        <input type="hidden" name="id_industria" id="id_industria"
                                                               value=""
                                                               value="0">
                                                        <input type="hidden"
                                                               name="id_periodo_de_actividad_de_contribuyente"
                                                               id="id_periodo_de_actividad_de_contribuyente" value="">
                                                        <br><abbr title="Nombre Razón Social de Empresa"></abbr>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group has-feedback">
                                                        <label class="control-label">Nº de Cuit: <span
                                                                class="symbol required"></span></label>
                                                        <br><abbr
                                                            title="Nº de CUIT/CUIL"></abbr>{{$contribuyente->cuit}}
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group has-feedback">
                                                        <label class="control-label">Razon Social<span
                                                                class="symbol required"></span></label>
                                                        <input type="text" class="form-control" name="razon_social"
                                                               id="razon_social"
                                                               placeholder="Ingrese Razon Social"
                                                               autocomplete="off"
                                                               value="{{$contribuyente->razon_social}}" required=""
                                                               aria-required="true"/>
                                                        <i class="fa fa-pencil form-control-feedback"></i>
                                                    </div>
                                                </div>

                                                <!--<div class="col-md-4">
                                                    <div class="form-group has-feedback">
                                                        <label class="control-label">Personeria: <span
                                                                class="symbol required"></span></label>
                                                        <i class="fa fa-bars form-control-feedback"></i>

                                                        <select class="form-control" id="persona_juridica"
                                                                name="persona_juridica"
                                                                required="" aria-required="true">


                                                            <option
                                                                value="{{$contribuyente->id_persona_juridica}}">{{$contribuyente->persona_juridica}}</option>
                                                            @foreach($persona_juridica as $per)
                                                                <option
                                                                    value="{{$per->id_persona_juridica}}">{{$per->persona_juridica}}</option>
                                                            @endforeach


                                                        </select>


                                                    </div>
                                                </div>-->


                                            </div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group has-feedback">
                                                        <label class="control-label">Fecha Inicio Actividad
                                                            Contribuyente:
                                                            <span class="symbol required"></span></label>
                                                        <input type="text" class="form-control actividades"
                                                               name="fecha_actividad_contribuyente"
                                                               id="fecha_actividad_contribuyente"
                                                               placeholder="Ingrese Fecha Inicio Actividad de Contribuyente"
                                                               autocomplete="off"
                                                               @if($contribuyente->fecha_inicio_de_actividades)
                                                               value="{{\Carbon\Carbon::parse($contribuyente->fecha_inicio_de_actividades)->format('d-m-Y')}}"
                                                               @else
                                                               value=""
                                                               @endif
                                                               required=""
                                                               aria-required="true"/>
                                                        <i class="fa fa-calendar form-control-feedback"></i>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group has-feedback">
                                                        <label class="control-label">Régimen de Ingresos Brutos: <span
                                                                class="symbol required"></span></label>
                                                        <i class="fa fa-bars form-control-feedback"></i>

                                                        <select class="form-control" id="id_regimen_ib"
                                                                name="id_regimen_ib"
                                                                required="" aria-required="true">


                                                            <option
                                                                value="{{$contribuyente->id_regimen_ib}}">{{$contribuyente->regimen}}</option>
                                                            @foreach($regimen as $reg)
                                                                <option
                                                                    value="{{$reg->id_regimen_ib}}">{{$reg->regimen_ib}}</option>
                                                            @endforeach


                                                        </select>


                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group has-feedback">
                                                        <label class="control-label">Nº de Ingresos Brutos: <span
                                                                class="symbol required"></span></label>
                                                        <input type="text" class="form-control" name="numero_de_ib"
                                                               id="numero_de_ib"
                                                               placeholder="Ingrese Nº de Ingresos Brutos"
                                                               autocomplete="off"
                                                               value="{{$contribuyente->numero_de_ib}}" required=""
                                                               aria-required="true"/>
                                                        <i class="fa fa-pencil form-control-feedback"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group has-feedback">
                                                        <label class="control-label">Condición Frente al Iva: <span
                                                                class="symbol required"></span></label>
                                                        <i class="fa fa-bars form-control-feedback"></i>

                                                        <select class="form-control" id="id_condicion_iva"
                                                                name="id_condicion_iva" required=""
                                                                aria-required="true">
                                                            <option
                                                                value="{{$contribuyente->id_condicion_iva}}">{{$contribuyente->condicion}}</option>

                                                            @foreach($condicion_iva as $iva)
                                                                <option
                                                                    value="{{$iva->id_condicion_iva}}">{{$iva->condicion_iva}}</option>
                                                            @endforeach
                                                            p
                                                        </select>


                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group has-feedback">
                                                        <label class="control-label">Naturaleza Juridica: <span
                                                                class="symbol required"></span></label>
                                                        <i class="fa fa-bars form-control-feedback"></i>

                                                        <select class="form-control" id="id_naturaleza_juridica"
                                                                name="id_naturaleza_juridica" required=""
                                                                aria-required="true">
                                                            <option
                                                                value="{{$contribuyente->id_naturaleza_juridica}}">{{$contribuyente->naturaleza}}</option>

                                                            @foreach($naturaleza_juridica as $naturaleza)
                                                                <option
                                                                    value="{{$naturaleza->id_naturaleza_juridica}}">{{$naturaleza->naturaleza_juridica}} </option>
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Email Fiscal : <span style="cursor: pointer;" class="mdi mdi-alert-circle text-danger" data-container="body" title="Notificación: Se usará este medio para Remitir Comprobantes, notificaciones, etc"></span><span class="symbol required"></span></label>
                                                    <input type="text"  value="{{$contribuyente->email_fiscal}}" class="form-control"  name="email_fiscal" id="email_fiscal" placeholder="Ingrese Correo Electrónico" autocomplete="off" required="" aria-required="true" />
                                                    <i class="fa fa-envelope-o form-control-feedback"></i>
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
                                                               autocomplete="off" value="{{$contribuyente->cod_postal}}"
                                                               required=""
                                                               aria-required="true"/>
                                                        <i class="fa fa-pencil form-control-feedback"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group has-feedback">
                                                        <label class="control-label">Zona legal: <span
                                                                class="symbol required"></span></label>
                                                        <i class="fa fa-bars form-control-feedback"></i>


                                                        <select class="form-control" id="zona_administracion"
                                                                name="zona_administracion" required=""
                                                                aria-required="true">
                                                            <option
                                                                value="{{$contribuyente->id_punto_cardinal}}"> {{$contribuyente->punto_cardinal}}</option>

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
                                                        <label class="control-label">Provincia Legal:<span
                                                                class="symbol required"></span></label>
                                                        <input type="hidden" name="id_provincia_legal"
                                                               id="id_provincia_legal"
                                                               value="{{$contribuyente->id_prov}}"/>
                                                        <input type="text" class="form-control"
                                                               name="buscar_provincia_legal" id="buscar_provincia_legal"
                                                               placeholder="Ingrese Nombre de Provincia"
                                                               value="{{$contribuyente->provincia}}"
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
                                                               id="id_localidad_administracion"
                                                               value="{{$contribuyente->id_localidad}}"/>
                                                        <input type="text" class="form-control" disabled
                                                               name="buscar_localidad2" id="buscar_localidad2"
                                                               placeholder="Ingrese Nombre de Localidad"
                                                               autocomplete="off"
                                                               value="{{$contribuyente->loc}}" required=""
                                                               aria-required="true"/>
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
                                                               id="id_barrio_administracion"
                                                               value="{{$contribuyente->id_barrio}}"/>
                                                        <input type="text" class="form-control" disabled
                                                               name="buscar_barrio2" id="buscar_barrio2"
                                                               placeholder="Ingrese Nombre de Barrio" autocomplete="off"
                                                               value="{{$contribuyente->barrio}}" required=""
                                                               aria-required="true"/>
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
                                                               id="id_calle_administracion"
                                                               value="{{$contribuyente->id_calle}}"/>
                                                        <input type="text" class="form-control" disabled
                                                               name="buscar_calle2" id="buscar_calle2"
                                                               placeholder="Ingrese Nombre de Calle" autocomplete="off"
                                                               value="{{$contribuyente->calle}}" required=""
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

                                                        <input type="number" class="form-control" name="nro_calle_legal"
                                                               id="nro_calle_legal"
                                                               value="{{$contribuyente->numero}}"
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
                                                               autocomplete="off" aria-required="true"
                                                               value="{{$contribuyente->piso}}"/>
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
                                                               autocomplete="off" aria-required="true"
                                                               value="{{$contribuyente->depto}}"
                                                        />
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
                                                               autocomplete="off" aria-required="true"
                                                               value="{{$contribuyente->referencias_domicilio}}"
                                                        />
                                                        <i class="fa fa-pencil form-control-feedback"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--
                                            <div class="row">
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
                                                               value="" required=""
                                                               aria-required="true"/>
                                                        <i class="fa fa-mobile form-control-feedback"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            -->


                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group has-feedback">
                                                        @if($contribuyente->constancia_afip)

                                                            <span style="color: rgb(15, 141, 4); font-size:12px"><b>Tienes un documento ya registrado</b></span>
                                                            <span class="input-group-addon btn btn-primary btn-file">
                                                                    <a class="" target="_blank"
                                                                       href="{{asset("storage/".$contribuyente->constancia_afip)}}"><span
                                                                            style="color:white; margin-left: 2px;"><i
                                                                                class="fa fa-eye"></i>Ver</span>
                                                                    </a>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>


                                            <!--<div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group has-feedback">
                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                            <div class="form-group has-feedback">
                                                                <label class="control-label">Inscripción en AFIP : <span
                                                                        class="symbol required"></span></label>
                                                                <div class="input-group">
                                                                    <div class="form-control" data-trigger="fileinput">
                                                                        <i class="fa fa-file-photo-o fileinput-exists"></i>
                                                                        <span class="fileinput-filename"></span>
                                                                    </div>
                                                                    <span
                                                                        class="input-group-addon btn btn-success btn-file">
                                                                    <span class="fileinput-new"><i
                                                                            class="fa fa-cloud-upload"></i> Cambiar archivo</span>
                                                                    <span class="fileinput-exists"><i
                                                                            class="fa fa-file-photo-o"></i> Cambiar</span>
                                                                    <input type="file" class="btn btn-default"
                                                                           data-original-title="Subir Imagen"
                                                                           data-rel="tooltip"
                                                                           placeholder="Suba su Archivo" name="afip"
                                                                           id="afip" autocomplete="off"
                                                                           title="Buscar Archivo">
                                                                </span>
                                                                    <br>

                                                                    <a href="#"
                                                                       class="input-group-addon btn btn-dark fileinput-exists"
                                                                       data-dismiss="fileinput"><i
                                                                            class="fa fa-trash-o"></i> Quitar</a>

                                                                </div>
                                                                <span class="card-subtitle text-muted">Para Subir el Archivo debe tener en cuenta:<br> * El Archivo a cargar debe ser extension.jpg,png,pdf<br> * No debe ser mayor de 5000 KB (5 MB)</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>-->


                                            <div class="text-right">
                                                <button type="submit" name="btn-submit" id="btn-submit"
                                                        class="btn btn-danger"><span class="fa fa-save"></span>
                                                    Guardar datos
                                                </button>
                                            </div>

                                        </form>

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


