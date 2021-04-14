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
                                        <form class="form-material" method="post" action="#" name="saveContribuyente"
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
                                                <div class="col-md-3">
                                                    <div class="form-group has-feedback">
                                                        <label class="control-label">Nº de Cuit: <span
                                                                class="symbol required"></span></label>
                                                        <br><abbr title="Nº de CUIT/CUIL"></abbr>{{$cuit->cuit}}
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
                                            </div>


                                            <div class="row">
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
   p
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
                                            </div>


                                            <div class="row">
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
                                            </div>

                                            <div class="row">

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
                                            </div>
                                            <div class="row">
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
                                            </div>

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
                                                               value="" required="" aria-required="true"/>
                                                        <i class="fa fa-mobile form-control-feedback"></i>
                                                    </div>
                                                </div>
                                            </div>


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


