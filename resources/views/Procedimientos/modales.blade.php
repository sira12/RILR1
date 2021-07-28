<!-- Moodal Ver Detalle Actividad -->
<div id="MyModalDetalleActividad" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title text-white" id="myModalLabel"><i class="fa fa-align-justify"></i> Detalle de Actividad</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="{{asset('assets/images/close.png')}}" /></button>
            </div>
            <div class="modal-body">

                <div id="muestradetalleactividadmodal">



                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-dismiss="modal"><span class="fa fa-times-circle"></span> Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- sample modal Ver Detalle Actividad -->


<!-- Modal para Agregar Actividad -->
<div id="MyModalActividad" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title text-white" id="myModalLabel"><i class="fa fa-align-justify"></i> Actividad Asociada a la Industria</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="{{asset('assets/images/close.png')}}" /></button>
            </div>

            <form class="form form-material" name="saveactividad" id="saveactividad">

                <div class="modal-body">

                    <h4 class="card-subtitle text-muted"> Código de Actividad debe de coincidir con la actividad declarada en AFIP y DGIP</h4>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="form-group has-feedback">
                                <label class="control-label">Descripción de Industria: <span class="symbol required"></span></label>
                                <br /><abbr title="Descripción de Industria"><label id="nombre_de_fantasia"></label></abbr>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label class="control-label">Buscar por Código: <span class="symbol required"></span></label>
                                <input type="hidden" name="seccionactividad" id="seccionactividad" value="">
                                <input type="hidden" name="proceso" id="actividad" value="saveactividades" />
                                <input type="hidden" name="id_rel_industria_actividad" id="id_rel_industria_actividad">
                                <input type="hidden" name="id_industria_modal" id="id_industria_modal"

                                 
                                        @if(isset($id_industria))
                                            value="{{$id_industria}}"
                                        @else 
                                         value=""

                                        @endif     
                                   
                                 >
                                <input type="hidden" name="id_actividad" id="id_actividad" />
                                <input type="text" class="form-control" name="search_codigo" id="search_codigo" placeholder="Realice la búsqueda de Actividad por Código" autocomplete="off" required="" aria-required="true" />
                                <i class="fa fa-search form-control-feedback"></i>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label class="control-label">Buscar por Descripción: <span class="symbol required"></span></label>
                                <input type="text" class="form-control" name="search_descripcion" id="search_descripcion" placeholder="Realice la búsqueda de Actividad por Descripción" autocomplete="off" required="" aria-required="true" />
                                <i class="fa fa-search form-control-feedback"></i>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group has-feedback">
                                <label class="control-label">Detalle de la Actividad Seleccionada: <span class="symbol required"></span></label>
                                <input type="text" class="form-control" name="detalle_actividad" id="detalle_actividad" placeholder="Detalle de Actividad Seleccionada" disabled="" autocomplete="off" required="" aria-required="true" />
                                <i class="fa fa-pencil form-control-feedback"></i>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group has-feedback2">
                                <label class="control-label">Descripción de la Actividad: <span class="symbol required"></span></label>
                                <textarea class="form-control" name="observacion" id="observacion" placeholder="Ingrese Descripción de la Actividad" autocomplete="off" required="" aria-required="true"></textarea>
                                <i class="fa fa-comment form-control-feedback2"></i>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label class="control-label">Fecha de Inicio: <span class="symbol required"></span></label>
                                <input type="text" class="form-control calendariomodal " name="fecha_inicio" id="fecha_inicio" placeholder="Ingrese Fecha de Inicio" autocomplete="off" required="" aria-required="true" />
                                <i class="fa fa-calendar form-control-feedback"></i>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label class="control-label">Es Actividad Principal: <span class="symbol required"></span></label>
                                <i class="fa fa-bars form-control-feedback"></i>
                                <select class="form-control" id="es_actividad_principal" name="es_actividad_principal" required="" aria-required="true">
                                    <option value=""> -- SELECCIONE -- </option>
                                    <option value="S">SI</option>
                                    <option value="N">NO</option>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" name="btn-actividad" id="btn-actividad" class="btn btn-danger"><span class="fa fa-save"></span> Guardar y Cerrar</button>
                    <button style="display:none;" type="button" name="btn-actividad-update" id="btn-actividad-update" class="btn btn-danger"><span class="fa fa-save"></span> Guardar y Cerrar</button>
                    <button class="btn btn-dark" type="button" class="close" id="button-cancelar" data-dismiss="modal" aria-hidden="true"><span class="fa fa-trash-o"></span> Cancelar</button>
                </div>

            </form>

        </div>
    </div>
</div>
<!-- Modal para Agregar Actividad -->











<!-- Modal para Asignar Productos -->
<div id="MyModalAsignaProducto" class="modal fade" tabindex="-1" role="dialog" style="overflow-y: scroll;" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title text-white" id="myModalLabel"><i class="fa fa-align-justify"></i> Productos Asociados a la Actividad</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="{{asset('assets/images/close.png')}}" /></button>
            </div>

            <form class="form form-material" name="saveasignacionproducto" id="saveasignacionproducto">

                <div class="modal-body">

                    <h3 class="card-subtitle text-muted"><i class="fa fa-cube"></i> Asignar Producto</h3>
                    <hr>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="form-group has-feedback">
                                <label class="control-label">Descripción de Actividad: <span class="symbol required"></span></label>
                                <br /><abbr title="Descripción de Actividad"><label id="descripcion"></label></abbr>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label class="control-label">Denominación Genérica del producto[sin marca]: <span style="cursor: pointer;" class="mdi mdi-alert-circle text-danger" data-container="body" title="Notificación: Ingrese Nombre de Producto y seleccione en el Listado que se mostrará, en caso de no aparecer, escribala y el sistema se encargará de la asignación del mismo."></span><span class="symbol required"></span></label>
                            <div class="form-group has-feedback">
                                <input type="hidden" name="seccionactividad" id="seccionactividad" value="">
                                <input type="hidden" name="proceso" id="asignaproducto" value="saveproducto" />
                                <input type="hidden" name="id_rel_actividad_productos" id="id_rel_actividad_productos">
                                <input type="hidden" name="anio_producto" id="anio_producto">
                                <input type="hidden" name="id_rel_industria_actividad" id="id_asignacion_producto">
                                <input type="hidden" name="id_producto" id="id_producto" />
                                <input type="text" class="form-control" name="search_producto" id="search_producto" placeholder="Realice la Búsqueda de Producto o Ingrese Descripción" autocomplete="off" required="" aria-required="true" />
                                <i class="fa fa-search form-control-feedback"></i>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group has-feedback">
                                <label class="control-label">Unidad de Medida: <span class="symbol required"></span></label>
                                <i class="fa fa-bars form-control-feedback"></i>
                                <select class="form-control" id="medida_producto" name="medida_producto" required="true" aria-required="true">

                                    <option value=""> -- SELECCIONE -- </option>

                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group has-feedback">
                                <label class="control-label">Cantidad: <span class="symbol required"></span></label>
                                <input type="text" class="form-control" name="cantidad_producida" id="cantidad_producida" placeholder="Ingrese Cantidad" autocomplete="off" required="" aria-required="true">
                                <i class="fa fa-pencil form-control-feedback"></i>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group has-feedback">
                                <label class="control-label">Porcentaje (%): <span class="symbol required"></span></label>
                                <input type="text" class="form-control" name="porcentaje_sobre_produccion" id="porcentaje_sobre_produccion" placeholder="Ingrese Porcentaje" autocomplete="off" required="" aria-required="true">
                                <i class="mdi mdi-percent form-control-feedback"></i>
                            </div>
                        </div>
                    </div>

                    <h3 class="card-subtitle text-muted"><i class="fa fa-file-text"></i> Ventas (Consignar el dato en Unidades)</h3>
                    <hr>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group has-feedback">
                                <label class="control-label">Cant. de Prod. Vend. en la Provincia: <span class="symbol required"></span></label>
                                <input type="text" class="form-control" name="ventas_en_provincia" id="ventas_en_provincia" placeholder="Ingrese Cant. de Ventas en la Provincia" autocomplete="off" required="" aria-required="true">
                                <i class="fa fa-pencil form-control-feedback"></i>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group has-feedback">
                                <label class="control-label">Cant. de Prod. Vend. en otras Provincias: <span class="symbol required"></span></label>
                                <input type="text" class="form-control" name="ventas_en_otras_provincias" id="ventas_en_otras_provincias" placeholder="Ingrese Cant. de Ventas en Otras Provincias" autocomplete="off" required="" aria-required="true">
                                <i class="fa fa-pencil form-control-feedback"></i>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group has-feedback">
                                <label class="control-label">Cant. de Prod. Vend. en el Exterior: <span class="symbol required"></span></label>
                                <input type="text" class="form-control" name="ventas_internacionales" id="ventas_internacionales" placeholder="Ingrese Cant. de Ventas en el Exterior del Pais" autocomplete="off" required="" aria-required="true">
                                <i class="fa fa-pencil form-control-feedback"></i>
                            </div>
                        </div>
                    </div>

                    <h3 class="card-subtitle m-0"><i class="fa fa-tasks"></i> Detalles de Productos Asignados</h3>
                    <hr>

                    <div id="rowActividad" class="row mt-3">

                        <div class="table-responsive">
                            <table class="table table-bordered yajra-datatable-productos">

                                <thead>
                                    <tr bgcolor="#808080" class="text-white" role="row">
                                        <th>N°</th>
                                        <th>Descripcion</th>
                                        <th>Medida</th>
                                        <th>Cant. Producida</th>
                                        <th>Porc %</th>

                                        <th width="12%">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>


                                </tbody>
                            </table>
                            <span class="card-subtitle">Nota:
                                <i class="mdi mdi-plus-outline text-danger font-16"></i>(Asignar o editar materia prima cargada) - <i class="mdi mdi-table-edit text-danger font-16"></i>(Editar Producto) - <i class="mdi mdi-delete text-danger font-16"></i>(Eliminar Producto)
                            </span>
                        </div>

                    </div>


                </div>


                <div class="modal-footer">
                    <button type="submit" name="btn-asignaproducto" id="btn-asignaproducto" class="btn btn-danger"><span class="fa fa-save"></span> Guardar</button>
                    <button type="button" name="btn-update-producto" id="btn-update-producto" class="btn btn-danger" style="display:none"><span class="fa fa-save"></span> Guardar</button>
                    <button class="btn btn-dark" id="button-cancelar-producto" type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="fa fa-trash-o"></span> Cancelar</button>
                </div>

            </form>

        </div>
    </div>
</div>
<!-- Modal para Asignar Productos -->













<!-- Modal para Asignar Materia Prima -->
<div id="MyModalAsignaMateria" class="modal fade" tabindex="-1" role="dialog" style="overflow-y: scroll;" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title text-white" id="myModalLabel"><i class="fa fa-tasks"></i> Materia Prima Asociados al Producto</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="{{asset('assets/images/close.png')}}" /></button>
            </div>

            <form class="form form-material" name="saveasignacionmateria" id="saveasignacionmateria" action="#">

                <div class="modal-body">

                    <h3 class="card-subtitle text-muted"><i class="fa fa-cube"></i> Asignar Materia Prima</h3>
                    <hr>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="form-group has-feedback">
                                <label class="control-label">Descripción de Actividad: <span class="symbol required"></span></label>
                                <br /><abbr title="Descripción de Actividad"><label id="descripcion"></label></abbr>
                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-md-12">
                            <label class="control-label">Materia Prima Utilizada: <span style="cursor: pointer;" class="mdi mdi-alert-circle text-danger" data-container="body" title="Notificación: Ingrese Nombre de Materia Prima y seleccione en el Listado que se mostrará, en caso de no aparecer, escribala y el sistema se encargará de la asignación del mismo."></span><span class="symbol required"></span></label>
                            <div class="form-group has-feedback">
                                <input type="hidden" name="seccionactividad" id="seccionactividad" value="">
                                <input type="hidden" name="proceso" id="asignamateria" value="savemateria" />
                                <input type="hidden" name="id_asignacion_materia" id="id_asignacion_materia">

                                <input type="hidden" name="id_rel_industria_actividad_materia_prima" id="id_rel_industria_actividad_materia_prima">
                                <input type="hidden" name="anio_materia" id="anio_materia">
                                <input type="hidden" name="id_materia_prima" id="id_materia_prima" />
                                <input type="text" class="form-control" name="search_materia" id="search_materia" placeholder="Realice la Búsqueda de Materia Prima o Ingrese Descripción" autocomplete="off" required="" aria-required="true" />
                                <i class="fa fa-search form-control-feedback"></i>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group has-feedback">
                                <label class="control-label">Unidad de Medida: <span class="symbol required"></span></label>
                                <i class="fa fa-bars form-control-feedback"></i>
                                <select class="form-control" id="medida_materia" name="medida_materia" required="" aria-required="true">
                                    <option value=""> -- SELECCIONE -- </option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group has-feedback">
                                <label class="control-label">Cantidad Anual Utilizada: <span class="symbol required"></span></label>
                                <input type="text" class="form-control" name="cantidad_materia" id="cantidad_materia" placeholder="Ingrese Cantidad Anual Utilizada" autocomplete="off" required="" aria-required="true">
                                <i class="fa fa-pencil form-control-feedback"></i>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group has-feedback">
                                <label class="control-label">Es Propia o Adquirida: <span class="symbol required"></span></label>
                                <i class="fa fa-bars form-control-feedback"></i>
                                <select class="form-control" id="es_propio_materia" name="es_propio_materia" onchange="pideDatosOrigen()" required="" aria-required="true">
                                    <option value=""> -- SELECCIONE -- </option>
                                    <option value="P">PROPIA</option>
                                    <option value="A">ADQUIRIDA</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <h3 class="card-subtitle text-muted origen"><i class="fa fa-file-text"></i> Origen de la Materia Prima</h3>
                    <span class="card-subtitle text-muted origen">En caso de que la Provincia sea diferente a La Rioja, deberá de seleccionar el Motivo y Detalles de la Importación</span>
                    <hr>

                    <div class="row origen">
                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label class="control-label">Nombre de Pais: <span style="cursor: pointer;" class="mdi mdi-alert-circle text-danger" data-container="body" title="Notificación: Ingrese Nombre de Pais y seleccione en el Listado que se mostrará, en caso de no aparecer, escribala y el sistema se encargará de la asignación del mismo."></span><span class="symbol required"></span></label>
                                <input type="hidden" name="id_pais" id="id_pais" />
                                <input type="text" class="form-control" name="search_pais" id="search_pais" placeholder="Ingrese Nombre de Pais" autocomplete="off" required="" aria-required="true" />
                                <i class="fa fa-search form-control-feedback"></i>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label class="control-label">Nombre de Provincia: <span style="cursor: pointer;" class="mdi mdi-alert-circle text-danger" data-container="body" title="Notificación: Ingrese Nombre de Provincia y seleccione en el Listado que se mostrará, en caso de no aparecer, escribala y el sistema se encargará de la asignación del mismo."></span><span class="symbol required"></span></label>
                                <input type="hidden" name="id_provincia" id="id_provincia" />
                                <input type="text" class="form-control" name="search_provincia" id="search_provincia" placeholder="Ingrese Nombre de Provincia" disabled autocomplete="off" required="" aria-required="true" />
                                <i class="fa fa-search form-control-feedback"></i>
                            </div>
                        </div>
                    </div>

                    <div class="row origen">
                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label class="control-label">Nombre de Localidad: <span style="cursor: pointer;" class="mdi mdi-alert-circle text-danger" data-container="body" title="Notificación: Ingrese Nombre de Localidad y seleccione en el Listado que se mostrará, en caso de no aparecer, escribala y el sistema se encargará de la asignación del mismo."></span><span class="symbol required"></span></label>
                                <input type="hidden" name="id_localidad3" id="id_localidad3" />
                                <input type="text" class="form-control" name="search_localidad32" id="search_localidad32" placeholder="Ingrese Nombre de Localidad" disabled autocomplete="off" required="" aria-required="true" />
                                <i class="fa fa-search form-control-feedback"></i>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label class="control-label">Motivo de la Importación: </label>
                                <i class="fa fa-bars form-control-feedback"></i>
                                <select class="form-control" id="motivo_importacion_materia" name="motivo_importacion_materia" onchange="MotivoImportacionMateria();" required="" aria-required="true">
                                    <option value=""> -- SELECCIONE -- </option>

                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row origen">
                        <div class="col-md-12">
                            <div class="form-group has-feedback2">
                                <label class="control-label">Detalle el Motivo por el cual Importa la materia Prima: </label>
                                <textarea class="form-control" type="text" name="detalles_materia" id="detalles_materia" autocomplete="off" placeholder="Ingrese Detalle el Motivo por el cual Importa la materia Prima" disabled="disabled"></textarea>
                                <i class="fa fa-comment-o form-control-feedback2"></i>
                            </div>
                        </div>
                    </div>

                    <h3 class="card-subtitle m-0"><i class="fa fa-tasks"></i> Detalles de Materia Prima Asignadas</h3>
                    <hr>



                    <div id="rowActividad" class="row mt-3">

                        <div class="table-responsive">
                            <table class="table table-bordered yajra-datatable-materia">

                                <thead>
                                    <tr bgcolor="#808080" class="text-white" role="row">
                                        <th>N°</th>
                                        <th>Materia prima</th>
                                        <th>Cant. Producida</th>
                                        <th>Medida</th>
                                        <th width="12%">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>


                                </tbody>
                            </table>
                            <span class="card-subtitle">Nota:
                                <i class="mdi mdi-plus-outline text-danger font-16"></i>(Asignar o editar materia prima cargada) - <i class="mdi mdi-table-edit text-danger font-16"></i>(Editar Producto) - <i class="mdi mdi-delete text-danger font-16"></i>(Eliminar Producto)
                            </span>
                        </div>

                    </div>


                </div>

                <div class="modal-footer">
                    <button type="submit" name="btn-asignamateria" id="btn-asignamateria" class="btn btn-danger"><span class="fa fa-save"></span> Guardar</button>
                    <button type="button" name="btn-updateMateria" id="btn-updateMateria" style="display:none" class="btn btn-danger"><span class="fa fa-save"></span> Guardar</button>
                    <button class="btn btn-dark" type="button" class="close" data-dismiss="modal" aria-hidden="true" id="btn-cancelar-materia"><span class="fa fa-trash-o"></span> Cancelar</button>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- Modal para Asignar Materia Prima -->













<!-- Modal Ver Detalle Insumo -->
<div id="MyModalDetalleInsumo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title text-white" id="myModalLabel"><i class="fa fa-align-justify"></i> Detalle de Insumo</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="assets/images/close.png" /></button>
            </div>
            <div class="modal-body">

                <div id="muestradetalleinsumomodal"></div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-dismiss="modal"><span class="fa fa-times-circle"></span> Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Ver Detalle Insumo -->


<!-- Modal para Asignar Insumo -->
<div id="MyModalInsumo" class="modal fade" tabindex="-1" role="dialog" style="overflow-y: scroll;" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title text-white" id="myModalLabel"><i class="fa fa-tasks"></i> Insumo Asociado a la Industria</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="{{asset('assets/images/close.png')}}" /></button>
            </div>

            <form class="form form-material" name="saveasignacioninsumo" id="saveasignacioninsumo">

                <div class="modal-body">

                    <h3 class="card-subtitle text-muted"><i class="fa fa-cube"></i> Asignar Insumo</h3>
                    <hr>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="form-group has-feedback">
                                <label class="control-label">Descripción de Industria: <span class="symbol required"></span></label>
                                <br /><abbr title="Descripción de Industria"><label id="nombre_de_fantasia"></label></abbr>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label class="control-label">Insumo Utilizado: <span style="cursor: pointer;" class="mdi mdi-alert-circle text-danger" data-container="body" title="Notificación: Ingrese Nombre de Insumo y seleccione en el Listado que se mostrará, en caso de no aparecer, escribala y el sistema se encargará de la asignación del mismo."></span><span class="symbol required"></span></label>
                            <div class="form-group has-feedback">
                                <input type="hidden" name="seccioninsumo" id="seccioninsumo" value="">
                                <input type="hidden" name="proceso" id="insumo" value="saveinsumo" />
                                <input type="hidden" name="id_rel_industria_insumos" id="id_rel_industria_insumos">
                                <input type="hidden" name="industria_insumo" id="industria_insumo">
                                <input type="hidden" name="anio_insumo" id="anio_insumo">
                                <input type="hidden" name="id_insumo" id="id_insumo" />
                                <input type="text" class="form-control" name="search_insumo" id="search_insumo" placeholder="Realice la Búsqueda de Insumos o Ingrese Descripción" autocomplete="off" required="" aria-required="true" />
                                <i class="fa fa-search form-control-feedback"></i>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group has-feedback">
                                <label class="control-label">Unidad de Medida: <span class="symbol required"></span></label>
                                <i class="fa fa-bars form-control-feedback"></i>
                                <select class="form-control" id="medida_insumo" name="medida_insumo" required="" aria-required="true">
                                    <option value=""> -- SELECCIONE -- </option>


                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group has-feedback">
                                <label class="control-label">Cantidad Anual Utilizada: <span class="symbol required"></span></label>
                                <input type="text" class="form-control" name="cantidad_insumo" id="cantidad_insumo" placeholder="Ingrese Cantidad Anual Utilizada" autocomplete="off" required="" aria-required="true">
                                <i class="fa fa-pencil form-control-feedback"></i>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group has-feedback">
                                <label class="control-label">Es Propia o Adquirida: <span class="symbol required"></span></label>
                                <i class="fa fa-bars form-control-feedback"></i>
                                <select class="form-control" id="es_propio_insumo" onchange="origen('origen_insumo')" name="es_propio_insumo" required="" aria-required="true">
                                    <option value=""> -- SELECCIONE -- </option>
                                    <option value="P">PROPIA</option>
                                    <option value="A">ADQUIRIDA</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <h3 class="card-subtitle text-muted origen_insumo"><i class="fa fa-file-text"></i> Origen del Insumo</h3>
                    <span class="card-subtitle text-muted origen_insumo">En caso de que la Provincia sea diferente a La Rioja, deberá de seleccionar el Motivo y Detalles de la Importación</span>
                    <hr>

                    <div class="row origen_insumo">
                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label class="control-label">Nombre de Pais: <span style="cursor: pointer;" class="mdi mdi-alert-circle text-danger" data-container="body" title="Notificación: Ingrese Nombre de Pais y seleccione en el Listado que se mostrará, en caso de no aparecer, escribala y el sistema se encargará de la asignación del mismo."></span><span class="symbol required"></span></label>
                                <input type="hidden" name="id_pais_insumo" id="id_pais_insumo" />
                                <input type="text" class="form-control" name="search_pais_insumo" id="search_pais_insumo" placeholder="Ingrese Nombre de Pais" autocomplete="off" required="" aria-required="true" />
                                <i class="fa fa-search form-control-feedback"></i>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label class="control-label">Nombre de Provincia: <span style="cursor: pointer;" class="mdi mdi-alert-circle text-danger" data-container="body" title="Notificación: Ingrese Nombre de Provincia y seleccione en el Listado que se mostrará, en caso de no aparecer, escribala y el sistema se encargará de la asignación del mismo."></span><span class="symbol required"></span></label>
                                <input type="hidden" name="id_provincia_insumo" id="id_provincia_insumo" />
                                <input type="text" class="form-control" disabled name="search_provincia_insumo" id="search_provincia_insumo" placeholder="Ingrese Nombre de Provincia" autocomplete="off" required="" aria-required="true" />
                                <i class="fa fa-search form-control-feedback"></i>
                            </div>
                        </div>
                    </div>

                    <div class="row origen_insumo">
                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label class="control-label">Nombre de Localidad: <span style="cursor: pointer;" class="mdi mdi-alert-circle text-danger" data-container="body" title="Notificación: Ingrese Nombre de Localidad y seleccione en el Listado que se mostrará, en caso de no aparecer, escribala y el sistema se encargará de la asignación del mismo."></span><span class="symbol required"></span></label>
                                <input type="hidden" name="id_localidad_insumo" id="id_localidad_insumo" />
                                <input type="text" class="form-control" disabled name="search_localidad_insumo" id="search_localidad_insumo" placeholder="Ingrese Nombre de Localidad" autocomplete="off" required="" aria-required="true" />
                                <i class="fa fa-search form-control-feedback"></i>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label class="control-label">Motivo de la Importación: </label>
                                <i class="fa fa-bars form-control-feedback"></i>
                                <select class="form-control" id="motivo_importacion_insumo" name="motivo_importacion_insumo" onchange="MotivoImportacionInsumo();" required="" aria-required="true">
                                    <option value=""> -- SELECCIONE -- </option>

                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row origen_insumo">
                        <div class="col-md-12">
                            <div class="form-group has-feedback2">
                                <label class="control-label">Detalle el Motivo por el cual Importa el Insumo: </label>
                                <textarea class="form-control" type="text" name="detalles_insumo" id="detalles_insumo" autocomplete="off" placeholder="Ingrese Detalle el Motivo por el cual Importa el Insumo" disabled="disabled"></textarea>
                                <i class="fa fa-comment-o form-control-feedback2"></i>
                            </div>
                        </div>
                    </div>


                </div>

                <div class="modal-footer">
                    <button type="submit" name="btn-insumo" id="btn-insumo" class="btn btn-danger"><span class="fa fa-save"></span> Guardar</button>
                    <button type="button" name="btn-insumo-update" style="display:none" id="btn-insumo-update" class="btn btn-danger"><span class="fa fa-save"></span> Guardar</button>
                    <button class="btn btn-dark" id="btn-cancelar-insumo" type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="fa fa-trash-o"></span> Cancelar</button>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- Modal para Asignar Insumo -->














<!-- Modal Ver Detalle Servicio -->
<div id="MyModalDetalleServicio" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title text-white" id="myModalLabel"><i class="fa fa-align-justify"></i> Detalle de Servicio</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="assets/images/close.png" /></button>
            </div>
            <div class="modal-body">

                <div id="muestradetalleserviciomodal"></div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-dismiss="modal"><span class="fa fa-times-circle"></span> Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Ver Detalle Servicio -->


<!-- Modal para Asignar Servicios Basicos -->
<div id="MyModalServiciosBasicos" class="modal fade" tabindex="-1" role="dialog" style="overflow-y: scroll;" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title text-white" id="myModalLabel"><i class="fa fa-tasks"></i> Servicios Básicos Asociado a la Industria</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="{{asset('assets/images/close.png')}}" /></button>
            </div>

            <form class="form form-material" name="saveserviciobasico" id="saveserviciobasico" action="#">

                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group has-feedback">
                                <input type="hidden" name="seccionserviciobasico" id="seccionserviciobasico" value="">
                                <input type="hidden" name="proceso" id="serviciobasico" value="saveserviciobasico" />
                                <input type="hidden" name="industria_servicio_basico" id="industria_servicio_basico">
                                <input type="hidden" name="anio_basico" id="anio_basico">
                                <input type="hidden" name="zona_local" id="zona_local">
                                <label class="control-label">Descripción de Industria: <span class="symbol required"></span></label>
                                <br /><abbr title="Descripción de Industria"><label id="nombre_de_fantasia"></label></abbr>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="ser_basico" class="table2 display">
                            <thead>
                                
                                    <th>Servicio Básico <span class="symbol required"></span></th>

                                    <th>Importe Total Anual <span class="symbol required"></span></th>
                                
                            </thead>
                            <tbody>



                            </tbody>
                        </table>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" name="btn-serviciobasico" id="btn-serviciobasico" class="btn btn-danger"><span class="fa fa-save"></span> Guardar</button>

                    <button class="btn btn-dark" type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="
                            document.getElementById('serviciobasico').value = 'saveserviciobasico',
                            document.getElementById('industria_servicio_basico').value = '',
                            document.getElementById('anio_basico').value = '',
                            document.getElementById('zona_local').value = '',
                            document.getElementById('cantidad_basica').value = '1',
                            document.getElementById('costo_basico').value = ''
                            "><span class="fa fa-trash-o"></span> Cancelar</button>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- Modal para Asignar Servicios Basicos -->

<!-- Modal para Actualizar Servicios Basicos -->
<div id="MyModalUpdateServicioBasico" class="modal fade" tabindex="-1" role="dialog" style="overflow-y: scroll;" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title text-white" id="myModalLabel"><i class="fa fa-tasks"></i> Actualizar Servicios Básicos Asociado a la Industria</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="{{asset('assets/images/close.png')}}" /></button>
            </div>

            <form class="form form-material" name="updateserviciobasico" id="updateserviciobasico" action="#">

                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group has-feedback">
                                <input type="hidden" name="seccionserviciobasicoupdate" id="seccionserviciobasicoupdate" value="">
                                <input type="hidden" name="proceso" id="serviciobasicoupdate" value="updateserviciobasico" />
                                <input type="hidden" name="id_rel_industria_servicios_basicos" id="id_rel_industria_servicios_basicos">
                                <input type="hidden" name="industria_servicio_basico_update" id="industria_servicio_basico_update">
                                <input type="hidden" name="anio_basico_update" id="anio_basico_update">
                                <label class="control-label">Descripción de Industria: <span class="symbol required"></span></label>
                                <br /><abbr title="Descripción de Industria"><label id="nombre_de_fantasia"></label></abbr>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="ser_basico_2" class="table2 display">
                            <thead>
                                <tr role="row">
                                    <th>Servicio Básico <span class="symbol required"></span></th>
                                    <th>Total Consumo Anual <span class="symbol required"></span></th>
                                    <th>Importe Total Anual <span class="symbol required"></span></th>
                                </tr>
                            </thead>
                            <tbody>


                            </tbody>
                        </table>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" name="btn-serviciobasicoupdate" id="btn-serviciobasicoupdate" class="btn btn-danger"><span class="fa fa-edit"></span> Actualizar</button>

                    <button class="btn btn-dark" type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="
                                document.getElementById('id_rel_industria_servicios_basicos').value = ''
                "><span class="fa fa-trash-o"></span> Cancelar</button>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- Modal para Actualizar Servicios Basicos -->













<!-- Modal para Asignar Combustible -->
<div id="MyModalCombustible" class="modal fade" tabindex="-1" role="dialog" style="overflow-y: scroll;" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title text-white" id="myModalLabel"><i class="fa fa-tasks"></i> Combustible Asociado a la Industria</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="{{asset('assets/images/close.png')}}" /></button>
            </div>

            <form class="form form-material" name="savecombustible" id="savecombustible" action="#">

                <div class="modal-body">

                    <h3 class="card-subtitle text-muted"><i class="fa fa-cube"></i> Asignar Combustible</h3>
                    <hr>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="form-group has-feedback">
                                <label class="control-label">Descripción de Industria: <span class="symbol required"></span></label>
                                <br /><abbr title="Descripción de Industria"><label id="nombre_de_fantasia"></label></abbr>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label class="control-label">Seleccione Combustible: <span class="symbol required"></span></label>
                                <i class="fa fa-bars form-control-feedback"></i>
                                <input type="hidden" name="seccioncombustible" id="seccioncombustible" value="">
                                <input type="hidden" name="proceso" id="combustibles" value="savecombustible" />
                                <input type="hidden" name="id_rel_industria_combustible" id="id_rel_industria_combustible">
                                <input type="hidden" name="industria_combustible" id="industria_combustible">
                                <input type="hidden" name="anio_combustible" id="anio_combustible">
                                <select class="form-control" id="id_servicio_combustible" name="id_servicio_combustible" required="" aria-required="true">
                                    <option value=""> -- SELECCIONE -- </option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label class="control-label">Unidad de Medida: <span class="symbol required"></span></label>
                                <i class="fa fa-bars form-control-feedback"></i>
                                <select class="form-control" id="medida_combustible" name="medida_combustible" required="" aria-required="true">
                                    <option value=""> -- SELECCIONE -- </option>
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="row">


                        <div class="col-md-12">
                            <div class="form-group has-feedback">
                                <label class="control-label">Costo anual del combustible: <span class="symbol required"></span></label>
                                <input type="text" class="form-control" name="costo_combustible" id="costo_combustible" placeholder="Ingrese Costo en Combustible" autocomplete="off" onKeyPress="EvaluateText('%f', this);" onBlur="this.value = NumberFormat(this.value, '2', '.', '')" required="" aria-required="true">
                                <i class="fa fa-tint form-control-feedback"></i>
                            </div>
                        </div>
                    </div>

                    <h3 class="card-subtitle text-muted"><i class="fa fa-file-text"></i> Origen del Combustible</h3>
                    <span class="card-subtitle text-muted">En caso de que la Provincia sea diferente a La Rioja, deberá de seleccionar el Motivo y Detalles de la Importación</span>
                    <hr>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label class="control-label">Nombre de Pais: <span style="cursor: pointer;" class="mdi mdi-alert-circle text-danger" data-container="body" title="Notificación: Ingrese Nombre de Pais y seleccione en el Listado que se mostrará, en caso de no aparecer, escribala y el sistema se encargará de la asignación del mismo."></span><span class="symbol required"></span></label>
                                <input type="hidden" name="id_pais_combustible" id="id_pais_combustible" />
                                <input type="text" class="form-control" name="search_pais_combustible" id="search_pais_combustible" placeholder="Ingrese Nombre de Pais" autocomplete="off" required="" aria-required="true" />
                                <i class="fa fa-search form-control-feedback"></i>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label class="control-label">Nombre de Provincia: <span style="cursor: pointer;" class="mdi mdi-alert-circle text-danger" data-container="body" title="Notificación: Ingrese Nombre de Provincia y seleccione en el Listado que se mostrará, en caso de no aparecer, escribala y el sistema se encargará de la asignación del mismo."></span><span class="symbol required"></span></label>
                                <input type="hidden" name="id_provincia_combustible" id="id_provincia_combustible" />
                                <input type="text" class="form-control" name="search_provincia_combustible" id="search_provincia_combustible" placeholder="Ingrese Nombre de Provincia" autocomplete="off" required="" aria-required="true" />
                                <i class="fa fa-search form-control-feedback"></i>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label class="control-label">Nombre de Localidad: <span style="cursor: pointer;" class="mdi mdi-alert-circle text-danger" data-container="body" title="Notificación: Ingrese Nombre de Localidad y seleccione en el Listado que se mostrará, en caso de no aparecer, escribala y el sistema se encargará de la asignación del mismo."></span><span class="symbol required"></span></label>
                                <input type="hidden" name="id_localidad_combustible" id="id_localidad_combustible" />
                                <input type="text" class="form-control" name="search_localidad_combustible" id="search_localidad_combustible" placeholder="Ingrese Nombre de Localidad" autocomplete="off" required="" aria-required="true" />
                                <i class="fa fa-search form-control-feedback"></i>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label class="control-label">Motivo de la Importación: </label>
                                <i class="fa fa-bars form-control-feedback"></i>
                                <select class="form-control" id="motivo_importacion_combustible" name="motivo_importacion_combustible" onchange="MotivoImportacionCombustible();" required="" aria-required="true">
                                    <option value=""> -- SELECCIONE -- </option>


                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group has-feedback2">
                                <label class="control-label">Detalle el Motivo por el cual Importa el Servicio: </label>
                                <textarea class="form-control" type="text" name="detalles_combustible" id="detalles_combustible" autocomplete="off" placeholder="Ingrese Detalle el Motivo por el cual Importa el Combustible" disabled="disabled"></textarea>
                                <i class="fa fa-comment-o form-control-feedback2"></i>
                            </div>
                        </div>
                    </div>


                </div>

                <div class="modal-footer">
                    <button type="submit" name="btn-combustible" id="btn-combustible" class="btn btn-danger"><span class="fa fa-save"></span> Guardar</button>
                    <button type="button" name="btn-combustible-update" style="display:none" id="btn-combustible-update" class="btn btn-danger"><span class="fa fa-save"></span> Guardar</button>
                    <button class="btn btn-dark" type="button" id="btn-cancelar-combustible" class="close" data-dismiss="modal" aria-hidden="true"><span class="fa fa-trash-o"></span> Cancelar</button>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- Modal para Asignar Combustible -->














<!-- Modal para Asignar Otros Servicios -->
<div id="MyModalOtros" class="modal fade" tabindex="-1" role="dialog" style="overflow-y: scroll;" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title text-white" id="myModalLabel"><i class="fa fa-tasks"></i> Otros Servicios Asociado a la Industria</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="{{asset('assets/images/close.png')}}" /></button>
            </div>

            <form class="form form-material" name="saveotros" id="saveotros" action="#">

                <div class="modal-body">

                    <h3 class="card-subtitle text-muted"><i class="fa fa-cube"></i> Asignar Otros Servicios</h3>
                    <hr>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="form-group has-feedback">
                                <label class="control-label">Descripción de Industria: <span class="symbol required"></span></label>
                                <br /><abbr title="Descripción de Industria"><label id="nombre_de_fantasia"></label></abbr>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label class="control-label">Servicio Utilizado: <span style="cursor: pointer;" class="mdi mdi-alert-circle text-danger" data-container="body" title="Notificación: Ingrese Nombre de Servicio y seleccione en el Listado que se mostrará, en caso de no aparecer, escribala y el sistema se encargará de la asignación del mismo."></span><span class="symbol required"></span></label>
                            <div class="form-group has-feedback">
                                <input type="hidden" name="seccionotros" id="seccionotros" value="">
                                <input type="hidden" name="proceso" id="otros" value="saveotros" />
                                <input type="hidden" name="id_rel_industria_otros" id="id_rel_industria_otros">
                                <input type="hidden" name="industria_otros" id="industria_otros">
                                <input type="hidden" name="anio_otros" id="anio_otros">
                                <input type="hidden" name="id_servicio_otros" id="id_servicio_otros" />
                                <input type="text" class="form-control" name="search_servicio_otros" id="search_servicio_otros" placeholder="Realice la Búsqueda de Servicio o Ingrese Descripción" autocomplete="off" required="" aria-required="true" />
                                <i class="fa fa-search form-control-feedback"></i>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label class="control-label">Costo anual del servicio: <span class="symbol required"></span></label>
                                <input type="text" class="form-control" name="costo_otros" id="costo_otros" placeholder="Ingrese Costo Involucrado en Frecuencia" autocomplete="off" onKeyPress="EvaluateText('%f', this);" onBlur="this.value = NumberFormat(this.value, '2', '.', '')" required="" aria-required="true">
                                <i class="fa fa-tint form-control-feedback"></i>
                            </div>
                        </div>
                    </div>


                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label class="control-label">Frecuencia de Contratación: <span class="symbol required"></span></label>
                                <i class="fa fa-bars form-control-feedback"></i>
                                <select class="form-control" id="frecuencia_otros" name="frecuencia_otros" required="" aria-required="true">
                                    <option value=""> -- SELECCIONE -- </option>

                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label class="control-label">Cantidad de Veces en la Frecuencia: <span class="symbol required"></span></label>
                                <input type="text" class="form-control" name="cantidad_otros" id="cantidad_otros" placeholder="Ingrese Cantidad de Veces" autocomplete="off" required="" aria-required="true">
                                <i class="fa fa-pencil form-control-feedback"></i>
                            </div>
                        </div>




                    </div>



                    <h3 class="card-subtitle text-muted"><i class="fa fa-file-text"></i> Origen del Servicio</h3>
                    <span class="card-subtitle text-muted">En caso de que la Provincia sea diferente a La Rioja, deberá de seleccionar el Motivo y Detalles de la Importación</span>
                    <hr>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label class="control-label">Nombre de Pais: <span style="cursor: pointer;" class="mdi mdi-alert-circle text-danger" data-container="body" title="Notificación: Ingrese Nombre de Pais y seleccione en el Listado que se mostrará, en caso de no aparecer, escribala y el sistema se encargará de la asignación del mismo."></span><span class="symbol required"></span></label>
                                <input type="hidden" name="id_pais_otros" id="id_pais_otros" value="" />
                                <input type="text" class="form-control" name="search_pais_otros" id="search_pais_otros" placeholder="Ingrese Nombre de Pais" autocomplete="off" value="" required="" aria-required="true" />
                                <i class="fa fa-search form-control-feedback"></i>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label class="control-label">Nombre de Provincia: <span style="cursor: pointer;" class="mdi mdi-alert-circle text-danger" data-container="body" title="Notificación: Ingrese Nombre de Provincia y seleccione en el Listado que se mostrará, en caso de no aparecer, escribala y el sistema se encargará de la asignación del mismo."></span><span class="symbol required"></span></label>
                                <input type="hidden" name="id_provincia_otros" id="id_provincia_otros" value="" />
                                <input type="text" class="form-control" name="search_provincia_otros" id="search_provincia_otros" placeholder="Ingrese Nombre de Provincia" autocomplete="off" value="" required="" aria-required="true" />
                                <i class="fa fa-search form-control-feedback"></i>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label class="control-label">Nombre de Localidad: <span style="cursor: pointer;" class="mdi mdi-alert-circle text-danger" data-container="body" title="Notificación: Ingrese Nombre de Localidad y seleccione en el Listado que se mostrará, en caso de no aparecer, escribala y el sistema se encargará de la asignación del mismo."></span><span class="symbol required"></span></label>
                                <input type="hidden" name="id_localidad_otros" id="id_localidad_otros" />
                                <input type="text" class="form-control" name="search_localidad_otros" id="search_localidad_otros" placeholder="Ingrese Nombre de Localidad" autocomplete="off" required="" aria-required="true" />
                                <i class="fa fa-search form-control-feedback"></i>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label class="control-label">Motivo de la Importación: </label>
                                <i class="fa fa-bars form-control-feedback"></i>
                                <select class="form-control" id="motivo_importacion_otros" name="motivo_importacion_otros" onchange="MotivoImportacionOtros();" required="" aria-required="true">
                                    <option value=""> -- SELECCIONE -- </option>



                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group has-feedback2">
                                <label class="control-label">Detalle el Motivo por el cual Importa el Servicio: </label>
                                <textarea class="form-control" type="text" name="detalles_otros" id="detalles_otros" autocomplete="off" placeholder="Ingrese Detalle el Motivo por el cual Importa el Servicio" disabled="disabled"></textarea>
                                <i class="fa fa-comment-o form-control-feedback2"></i>
                            </div>
                        </div>
                    </div>


                </div>

                <div class="modal-footer">
                    <button type="submit" name="btn-otros" id="btn-otros" class="btn btn-danger"><span class="fa fa-save"></span> Guardar</button>
                    <button type="button" name="btn-otros-update" style="display:none;" id="btn-otros-update" class="btn btn-danger"><span class="fa fa-save"></span> Guardar</button>
                    <button class="btn btn-dark" id="btn-cancelar-otros" type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="fa fa-trash-o"></span> Cancelar</button>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- Modal para Asignar Otros Servicios -->















<!-- Modal para Asignar Egresos Devengados -->
<div id="MyModalDevengados" class="modal fade" tabindex="-1" role="dialog" style="overflow-y: scroll;" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title text-white" id="myModalLabel"><i class="fa fa-tasks"></i> Gastos Generados Asociado a la Industria</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="{{asset('assets/images/close.png')}}" /></button>
            </div>

            <form class="form form-material" name="savedevengados" id="savedevengados" action="#">

                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group has-feedback">
                                <input type="hidden" name="secciondevengados" id="secciondevengados" value="">
                                <input type="hidden" name="proceso" id="devengados" value="savedevengados" />
                                <input type="hidden" name="industria_devengados" id="industria_devengados">
                                <input type="hidden" name="anio_devengado" id="anio_devengado">
                                <input type="hidden" name="zona_devengado" id="zona_devengado">
                                
                                <br /><abbr title="Descripción de Industria"><label id="nombre_de_fantasia"></label></abbr>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="gastos_generados" class="table2 display">
                            <thead>
                                <tr role="row">
                                    <th>Servicios <span class="symbol required"></span></th>

                                    <th>Importe Total Anual <span class="symbol required"></span></th>
                                </tr>
                            </thead>
                            <tbody>

                                

                            </tbody>
                        </table>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" name="btn-devengados" id="btn-devengados" class="btn btn-danger"><span class="fa fa-save"></span> Guardar</button>
                    <button class="btn btn-dark" type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="
                document.getElementById('devengados').value = 'savedevengados';
                
                "><span class="fa fa-trash-o"></span> Cancelar</button>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- Modal para Asignar Egresos Devengados -->

<!-- Modal para Actualizar Egresos Devengados -->
<div id="MyModalUpdateDevengado" class="modal fade" tabindex="-1" role="dialog" style="overflow-y: scroll;" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title text-white" id="myModalLabel"><i class="fa fa-tasks"></i> Actualizar Gasto Generado Asociado a la Industria</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="{{asset('assets/images/close.png')}}" /></button>
            </div>

            <form class="form form-material" name="updatedevengados" id="updatedevengados" action="#">

                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group has-feedback">
                                <input type="hidden" name="secciondevengadosupdate" id="secciondevengadosupdate" value="">
                                <input type="hidden" name="proceso" id="devengadosupdate" value="updatedevengados" />
                                <input type="hidden" name="id_rel_industria_devengados_update" id="id_rel_industria_devengados_update">
                                <input type="hidden" name="industria_devengados_update" id="industria_devengados_update">
                                <input type="hidden" name="anio_devengado_update" id="anio_devengado_update">
                                
                                <br /><abbr title="Descripción de Industria"><label id="nombre_de_fantasia"></label></abbr>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="updatedevengado" class="table2 display">
                            <thead>
                                <tr role="row">
                                    <th>Servicio <span class="symbol required"></span></th>
                                  
                                    <th>Importe Total Anual <span class="symbol required"></span></th>
                                </tr>
                            </thead>
                            <tbody>

                                
                            </tbody>
                        </table>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" name="btn-egresosupdate" id="btn-egresosupdate" class="btn btn-danger"><span class="fa fa-edit"></span> Actualizar</button>
                    <button class="btn btn-dark" type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="
                document.getElementById('id_rel_industria_devengados_update').value = '';
                
               
                "><span class="fa fa-trash-o"></span> Cancelar</button>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- Modal para Actualizar Egresos Devengados -->
















<!-- Modal Ver Detalle Situacion de Planta -->
<div id="MyModalDetalleSituacion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title text-white" id="myModalLabel"><i class="fa fa-align-justify"></i> Detalle de Situación de Planta</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="{{asset('assets/images/close.png')}}" /></button>
            </div>
            <div class="modal-body">

                <div id="muestradetallesituacionmodal"></div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-dismiss="modal"><span class="fa fa-times-circle"></span> Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Ver Detalle Situacion de Planta -->

<!-- Modal para Asignar Situacion de Planta -->
<div id="MyModalSituacion" class="modal fade" tabindex="-1" role="dialog" style="overflow-y: scroll;" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title text-white" id="myModalLabel"><i class="fa fa-tasks"></i> Situación de Planta</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="{{asset('assets/images/close.png')}}" /></button>
            </div>

            <form class="form form-material" name="savesituacion" id="savesituacion" action="#">

                <div class="modal-body">

                    <h3 class="card-subtitle text-muted"><i class="fa fa-cube"></i> Situación de Planta</h3>
                    <hr>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="form-group has-feedback">
                                <label class="control-label">Descripción de Industria: <span class="symbol required"></span></label>
                                <br /><abbr title="Descripción de Industria"><label id="nombre_de_fantasia"></label></abbr>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label class="control-label">Porcentaje de Producción según Capacidad Instalada: <span class="symbol required"></span></label>
                            <div class="form-group has-feedback">
                                <input type="hidden" name="seccionsituacion" id="seccionsituacion" value="">
                                <input type="hidden" name="proceso" id="situacion" value="savesituacion" />
                                <input type="hidden" name="id_situacion_de_planta" id="id_situacion_de_planta">
                                <input type="hidden" name="industria_situacion" id="industria_situacion">
                                <input type="hidden" name="anio_situacion" id="anio_situacion">
                                <input type="text" class="form-control" name="produccion_sobre_capacidad" id="produccion_sobre_capacidad" placeholder="Ingrese Porcentaje de Producción" onKeyPress="EvaluateText('%f', this);" onBlur="this.value = NumberFormat(this.value, '2', '.', '')" autocomplete="off" required="" aria-required="true" />
                                <i class="mdi mdi-percent form-control-feedback"></i>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label class="control-label">Superficie de Lote Industrial Ocupado (m2): <span class="symbol required"></span></label>
                                <input type="text" class="form-control" name="superficie_lote" id="superficie_lote" placeholder="Ingrese Superficie de Lote Industrial Ocupado" autocomplete="off" required="" aria-required="true">
                                <i class="fa fa-pencil form-control-feedback"></i>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label class="control-label">Superficie Ocupada por la Planta (m2): <span class="symbol required"></span></label>
                                <input type="text" class="form-control" name="superficie_planta" id="superficie_planta" placeholder="Ingrese Superficie de Lote Planta Ocupado" autocomplete="off" required="" aria-required="true">
                                <i class="fa fa-pencil form-control-feedback"></i>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Radiación en Parques o Áreas Industriales: <span class="symbol required"></span></label>
                                <br>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="name1" name="es_zona_industrial" value="1" checked="" class="custom-control-input">
                                    <label class="custom-control-label" for="name1">SI</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="name2" name="es_zona_industrial" value="0" class="custom-control-input">
                                    <label class="custom-control-label" for="name2">NO</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">En el Año Declarado realizó Inversiones en la Planta: <span class="symbol required"></span></label>
                                <br>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="name3" name="declara_inversion" value="1" class="custom-control-input" onclick="DeclaroInversion();">
                                    <label class="custom-control-label" for="name3">SI</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="name4" name="declara_inversion" value="0" checked="" class="custom-control-input" onclick="DeclaroInversion();">
                                    <label class="custom-control-label" for="name4">NO</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 inversion_i" style="display:none">
                            <div class="form-group has-feedback">
                                <label class="control-label">Importe de Inversión: <span class="symbol required"></span></label>
                                <input type="text" class="form-control" name="inversion_anual" id="inversion_anual" placeholder="Ingrese Importe de Inversión" onKeyPress="EvaluateText('%f', this);" onBlur="this.value = NumberFormat(this.value, '2', '.', '')" autocomplete="off" required="" aria-required="true">
                                <i class="fa fa-pencil form-control-feedback"></i>
                            </div>
                        </div>

                        <div class="col-md-3 inversion_i" style="display:none">
                            <div class="form-group has-feedback">
                                <label class="control-label">Inversión Activo Fijo: <span class="symbol required"></span></label>
                                <input type="text" class="form-control" name="inversion_activo_fijo" id="inversion_activo_fijo" placeholder="Ingrese Inversión Activo Fijo" onKeyPress="EvaluateText('%f', this);" onBlur="this.value = NumberFormat(this.value, '2', '.', '')" autocomplete="off"  required="" aria-required="true">
                                <i class="fa fa-pencil form-control-feedback"></i>
                            </div>
                        </div>
                    </div>

                    <h3 class="card-subtitle text-muted"><i class="fa fa-file-text"></i> Capacidad Productiva</h3>
                    <hr>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label class="control-label">Porcentaje de Capacidad Instalada en Uso de la Planta: <span class="symbol required"></span></label>
                                <input type="text" class="form-control" name="capacidad_instalada" id="capacidad_instalada" placeholder="Ingrese Porcentaje de Capacidad Instalada" onKeyPress="EvaluateText('%f', this);" onBlur="this.value = NumberFormat(this.value, '2', '.', '')" autocomplete="off" required="" aria-required="true" />
                                <i class="mdi mdi-percent form-control-feedback"></i>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label class="control-label">Porcentaje de Capacidad Ociosa de la Planta: <span class="symbol required"></span></label>
                                <input type="text" class="form-control" name="capacidad_ociosa" id="capacidad_ociosa" placeholder="Ingrese Porcentaje de Capacidad Ociosa" onKeyPress="EvaluateText('%f', this);" onBlur="this.value = NumberFormat(this.value, '2', '.', '')" autocomplete="off" required="" aria-required="true" />
                                <i class="mdi mdi-percent form-control-feedback"></i>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" name="btn-situacion" id="btn-situacion" class="btn btn-danger"><span class="fa fa-save"></span> Guardar</button>
                    <button type="button" name="btn-situacion-update" id="btn-situacion-update" style="display:none;" class="btn btn-danger"><span class="fa fa-save"></span>Actualizar</button>
                    <button class="btn btn-dark" type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="
                        document.getElementById('situacion').value = 'savesituacion',
                        document.getElementById('id_situacion_de_planta').value = '',
                        document.getElementById('industria_situacion').value = '',
                        
                        document.getElementById('produccion_sobre_capacidad').value = '',
                        document.getElementById('superficie_lote').value = '',
                        document.getElementById('superficie_planta').value = '',
                        
                        document.getElementById('inversion_anual').value = '',
                        document.getElementById('inversion_activo_fijo').value = '',
                        document.getElementById('capacidad_instalada').value = '',
                        document.getElementById('capacidad_ociosa').value = ''
                        "><span class="fa fa-trash-o"></span> Cancelar</button>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- Modal para Asignar Situacion de Planta -->














<!-- Modal Ver Detalle Motivo Ociosidad -->
<div id="MyModalDetalleMotivo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title text-white" id="myModalLabel"><i class="fa fa-align-justify"></i> Detalle de Motivo Ociosidad</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="{{asset('assets/images/close.png')}}" /></button>
            </div>
            <div class="modal-body">

                <div id="muestradetallemotivomodal"></div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-dismiss="modal"><span class="fa fa-times-circle"></span> Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Ver Detalle Motivo Ociosidad -->

<!-- Modal para Asignar Motivo Ociosidad -->
<div id="MyModalMotivo" class="modal fade" tabindex="-1" role="dialog" style="overflow-y: scroll;" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title text-white" id="myModalLabel"><i class="fa fa-tasks"></i> Ociosidad Capacidad Productiva</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="{{asset('assets/images/close.png')}}" /></button>
            </div>

            <form class="form form-material" name="savemotivoasignado" id="savemotivoasignado" action="#">

                <div class="modal-body">

                   

                    <div class="row selectMotivo">
                        <div class="col-md-12">
                            <label class="control-label">Motivo Ociosidad: <span style="cursor: pointer;" class="mdi mdi-alert-circle text-danger" data-container="body" title="Notificación: Ingrese Descripción de Motivo Ociosidad y seleccione en el Listado que se mostrará, en caso de no aparecer, escribala y el sistema se encargará de la asignación del mismo."></span><span class="symbol required"></span></label>
                            <div class="form-group has-feedback">
                                <input type="hidden" name="seccionmotivo" id="seccionmotivo" value="">
                                <input type="hidden" name="proceso" id="motivo" value="savemotivo" />
                                <input type="hidden" name="id_rel_industria_motivo_ociosidad" id="id_rel_industria_motivo_ociosidad">
                                <input type="hidden" name="industria_motivo" id="industria_motivo">
                                <input type="hidden" name="anio_motivo" id="anio_motivo">
                                
                                <select class="form-control" id="id_motivo_ociosidad" name="id_motivo_ociosidad" required="" aria-required="true">
                                    <option value=""> -- SELECCIONE -- </option>
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                    <label  for="check_otro">El motivo no existe en el listado anterior:</label>
                                    <input type="checkbox" id="check_otro" name="check_otro" >
                            </div>
                        </div>
                    </div>

                    <div class="row motivoNuevo" style="display:none">
                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label class="control-label">Ingrese nombre del motivo<span class="symbol required"></span></label>
                                <input type="text" class="form-control" name="motivo_nuevo" placeholder="Nombre del motivo" id="motivo_nuevo" autocomplete="off" required="" aria-required="true" />
                                <i class="mdi mdi-pencil form-control-feedback"></i>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" name="btn-motivo" id="btn-motivo" class="btn btn-danger"><span class="fa fa-save"></span> Guardar</button>
                    <button type="button" style="display:none" name="btn-motivo-update" id="btn-motivo-update" class="btn btn-danger"><span class="fa fa-save"></span> Actualizar</button>
                    <button class="btn btn-dark" type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="
                document.getElementById('motivo').value = 'savemotivo',
                document.getElementById('id_rel_industria_motivo_ociosidad').value = '',
                document.getElementById('industria_motivo').value = '',
                document.getElementById('anio_motivo').value = '',
                document.getElementById('id_motivo_ociosidad').value = ''
               
                "><span class="fa fa-trash-o"></span> Cancelar</button>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- Modal para Asignar Motivo Ociosidad -->















<!-- Modal Ver Detalle Personal Ocupado -->
<div id="MyModalDetallePersonal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title text-white" id="myModalLabel"><i class="fa fa-align-justify"></i> Detalle de Personal Ocupado</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="{{asset('assets/images/close.png')}}" /></button>
            </div>
            <div class="modal-body">

                <div id="muestradetallepersonalmodal"></div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-dismiss="modal"><span class="fa fa-times-circle"></span> Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Ver Detalle Personal Ocupado -->

<!-- Modal para Asignar Personal Ocupado -->
<div id="MyModalPersonal" class="modal fade" tabindex="-1" role="dialog" style="overflow-y: scroll;" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title text-white" id="myModalLabel"><i class="fa fa-tasks"></i> Personal Ocupado Asociado a la Industria</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="{{asset('assets/images/close.png')}}" /></button>
            </div>

            <form class="form form-material" name="savepersonal" id="savepersonal" action="#">

                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group has-feedback">
                                <label class="control-label">Roles de Trabajadores: <span class="symbol required"></span></label>
                                <i class="fa fa-bars form-control-feedback"></i>
                                <input type="hidden" name="seccionpersonal" id="seccionpersonal" value="">
                                <input type="hidden" name="proceso" id="personal" value="savepersonal" />
                                <input type="hidden" name="industria_personal" id="industria_personal">
                                <input type="hidden" name="anio_personal" id="anio_personal">
                                <select class="form-control" id="rol_trabajador" name="rol_trabajador" required="" aria-required="true">
                                    <option value=""> -- SELECCIONE -- </option>

                                   

                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="p_o" class="table2 display" border="0">
                            <thead id="thead_p_o">
                                
                            </thead>
                            <tbody>


                                

                            </tbody>
                        </table>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" name="btn-personal" id="btn-personal" class="btn btn-danger"><span class="fa fa-save"></span> Guardar</button>
                    <button class="btn btn-dark" type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="
                document.getElementById('personal').value = 'savepersonal',
                document.getElementById('industria_personal').value = '',
                document.getElementById('anio_personal').value = '',
                document.getElementById('rol_trabajador').value = '',
                document.getElementById('femenino').value = '1',
                document.getElementById('masculino').value = ''
                "><span class="fa fa-trash-o"></span> Cancelar</button>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- Modal para Asignar Personal Ocupado -->

<!-- Modal para Actualizar Personal Ocupado -->
<div id="MyModalUpdatePersonal" class="modal fade" tabindex="-1" role="dialog" style="overflow-y: scroll;" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title text-white" id="myModalLabel"><i class="fa fa-tasks"></i> Actualizar Personal Ocupado Asociado a la Industria</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="{{asset('assets/images/close.png')}}" /></button>
            </div>

            <form class="form form-material" name="updatepersonal" id="updatepersonal" action="#">

                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group has-feedback">
                                <input type="hidden" name="seccionpersonalupdate" id="seccionpersonalupdate" value="">
                                <input type="hidden" name="proceso" id="personalupdate" value="updatepersonal" />
                                <input type="hidden" name="id_rel_industria_personal_update" id="id_rel_industria_personal_update">
                                <input type="hidden" name="anio_personal_update" id="anio_personal_update">
                               
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group has-feedback">
                                <label class="control-label">Rol de Trabajador: <span class="symbol required"></span></label>
                                <br /><abbr title="Rol de Trabajador"><label id="rol_trabajador"></label></abbr>
                            </div>
                        </div>
                    </div>


                    <div class="table-responsive">
                        <table id="p_o_update" class="table2 display" border="0">
                            <thead id="thead_p_o_update">
                                
                            </thead>
                            <tbody>


                                

                            </tbody>
                        </table>
                    </div>

                    <!--<div id="detallespersonal"></div>-->

                </div>

                <div class="modal-footer">
                    <button type="submit" name="btn-personalupdate" id="btn-personalupdate" class="btn btn-danger"><span class="fa fa-edit"></span> Actualizar</button>
                    <button class="btn btn-dark" type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="
                document.getElementById('id_rel_industria_personal_update').value = '',
                document.getElementById('anio_personal_update').value = ''
                "><span class="fa fa-trash-o"></span> Cancelar</button>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- Modal para Actualizar Personal Ocupado -->


















<!-- Modal Ver Detalle Ventas -->
<div id="MyModalDetalleVenta" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title text-white" id="myModalLabel"><i class="fa fa-align-justify"></i> Detalle de Ventas</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="{{asset('assets/images/close.png')}}" /></button>
            </div>
            <div class="modal-body">

                <div id="muestradetalleventamodal"></div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-dismiss="modal"><span class="fa fa-times-circle"></span> Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Ver Detalle Ventas -->

<!-- Modal para Asignar Ventas -->
<div id="MyModalVenta" class="modal fade" tabindex="-1" role="dialog" style="overflow-y: scroll;" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title text-white" id="myModalLabel"><i class="fa fa-tasks"></i> Ventas Asociada a la Industria</h4>
               
            </div>

            <form class="form form-material" name="saveventa" id="saveventa" action="#">

                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group has-feedback">
                                
                                <input type="hidden" name="seccionventa" id="seccionventa" value="">
                                <input type="hidden" name="id_destino_ventas" id="id_destino_ventas"  />
                                <input type="hidden" name="industria_venta" id="industria_venta">
                                <input type="hidden" name="anio_venta" id="anio_venta">
                                <abbr title="Descripción de Industria"><label id="nombre_de_fantasia"></label></abbr>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group has-feedback">
                                <label class="control-label">Clasificacion de Venta: <span class="symbol required"></span></label>
                                <i class="fa fa-bars form-control-feedback"></i>
                                <select class="form-control" id="clasif_venta" name="clasif_venta" required="true" aria-required="true">

                                    <option value=""> -- SELECCIONE -- </option>

                                </select>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="form-group has-feedback">
                                <label class="control-label">Ventas en Provincias: <span class="symbol required"></span></label>
                              <br>
                                <select  style="width: 50%" id="ventas_provincias" name="ventas_provincias[]" multiple="multiple" required="true" aria-required="true">

                                
                                </select>  
                            </div>   
                        </div>

                        <div class="col-md-12">
                            <div class="form-group has-feedback">
                                <label class="control-label">Ventas en Paises Extranjeros: <span class="symbol required"></span></label>
                                <br>
                                <select  style="width: 50%" id="ventas_paises" name="ventas_paises[]" multiple="multiple" required="true" aria-required="true">

                                
                                </select>  
                            </div>   
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                        <button type="submit" name="btn-venta" id="btn-venta" class="btn btn-danger"><span class="fa fa-save"></span> Guardar</button>
                        <button type="button" style="display:none; " name="btn-venta-update" id="btn-venta-update" class="btn btn-danger"><span class="fa fa-save"></span> Guardar</button>
                        <button type="button" class="btn btn-dark" class="close" data-dismiss="modal" aria-hidden="true" id="btn-cancelar-venta" onclick="btn_cancelar_venta()"><span class="fa fa-trash-o"></span> Cancelar</button>
                         <button id="btn-cerrar-venta" type="button" style="display:none; " class="btn btn-dark" class="close" data-dismiss="modal" aria-hidden="true" onclick="btn_cancelar_venta()"><span class="fa fa-trash-o"></span> Cerrar</button>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- Modal para Asignar Ventas -->



<!-- Modal Listado de Provincias -->
<div id="myModalProvincias" class="modal fade" tabindex="-1" role="dialog" style="overflow-y: scroll;" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title text-white" id="myModalLabel"><i class="fa fa-align-justify"></i> Listado de Provincias</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="{{asset('assets/images/close.png')}}" /></button>
            </div>
            <div class="modal-body">

                <div id="div2">
                    <div class="table-responsive">
                        <table id="datatable" class="table2 table-striped table-bordered border display">

                            <thead>
                                <tr role="row">
                                    <th><i class="mdi mdi-check-circle"></i></th>
                                    <th>Provincias</th>
                                </tr>
                            </thead>
                            <tbody class="BusquedaRapida">

                                <tr role="row" class="odd">
                                    <td>
                                        <div class="custom-control custom-radio">
                                            <input type="hidden" name="contador" id="contador">
                                            <input type="hidden" name="num" id="num">
                                            <input type="radio" class="custom-control-input" name="check[]" id="check_<" value=">">
                                            <label class="custom-control-label text-success" for="check_>"></label>
                                        </div>
                                    </td>
                                    <td></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" onClick="AgregarProvincia(document.getElementById('check_').value,document.getElementById('contador').value,document.getElementById('num').value)" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-check"></span> Seleccionar</button>
                <button type="button" class="btn btn-dark" data-dismiss="modal"><span class="fa fa-times-circle"></span> Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Listado de Provincias -->

<!-- Modal Listado de Paises -->
<div id="myModalPaises" class="modal fade" tabindex="-1" role="dialog" style="overflow-y: scroll;" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title text-white" id="myModalLabel"><i class="fa fa-align-justify"></i> Listado de Paises</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="{{asset('assets/images/close.png')}}" /></button>
            </div>
            <div class="modal-body">

                <div id="div2">
                    <div class="table-responsive">
                        <table id="datatable" class="table2 table-striped table-bordered border display">

                            <thead>
                                <tr role="row">
                                    <th><i class="mdi mdi-check-circle"></i></th>
                                    <th>Paises</th>
                                </tr>
                            </thead>
                            <tbody class="BusquedaRapida">


                                <tr role="row" class="odd">
                                    <td>
                                        <div class="custom-control custom-radio">
                                            <input type="hidden" name="contador2" id="contador2">
                                            <input type="hidden" name="num2" id="num2">
                                            <input type="radio" class="custom-control-input" name="check2[]" id="check2_" value="">
                                            <label class="custom-control-label text-success" for="check2_"></label>
                                        </div>
                                    </td>
                                    <td></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" onClick="AgregarPais(document.getElementById('check2_').value,document.getElementById('contador2').value,document.getElementById('num2').value)" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-check"></span> Seleccionar</button>
                <button type="button" onClick="LimpiarCheckbox();" class="btn btn-dark" data-dismiss="modal"><span class="fa fa-times-circle"></span> Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Listado de Paises -->


<!-- Modal Listado de Provincias Update -->
<div id="myModalProvinciasUpdate" class="modal fade" tabindex="-1" role="dialog" style="overflow-y: scroll;" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title text-white" id="myModalLabel"><i class="fa fa-align-justify"></i> Listado de Provincias</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="{{asset('assets/images/close.png')}}" /></button>
            </div>
            <div class="modal-body">

                <form class="form form-material" method="post" action="#" name="provinciasupdate" id="provinciasupdate">

                    <div id="div2">
                        <div class="table-responsive">
                            <table id="datatable" class="table2 table-striped table-bordered border display">

                                <thead>
                                    <tr role="row">
                                        <th><i class="mdi mdi-check-circle"></i></th>
                                        <th>Provincias</th>
                                    </tr>
                                </thead>
                                <tbody class="BusquedaRapida">


                                    <tr role="row" class="odd">
                                        <td>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="check3[]" id="check3_" value="">
                                                <label class="custom-control-label text-success" for="check3_"></label>
                                            </div>
                                        </td>
                                        <td></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" onClick="AgregarProvinciaUpdate()" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-check"></span> Seleccionar</button>
                <button type="button" class="btn btn-dark" data-dismiss="modal"><span class="fa fa-times-circle"></span> Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Listado de Provincias Update -->

<!-- Modal Listado de Paises Update -->
<div id="myModalPaisesUpdate" class="modal fade" tabindex="-1" role="dialog" style="overflow-y: scroll;" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title text-white" id="myModalLabel"><i class="fa fa-align-justify"></i> Listado de Paises</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="{{asset('assets/images/close.png')}}" /></button>
            </div>
            <div class="modal-body">

                <form class="form form-material" method="post" action="#" name="paisesupdate" id="paisesupdate">

                    <div id="div2">
                        <div class="table-responsive">
                            <table id="datatable" class="table2 table-striped table-bordered border display">

                                <thead>
                                    <tr role="row">
                                        <th><i class="mdi mdi-check-circle"></i></th>
                                        <th>Paises</th>
                                    </tr>
                                </thead>
                                <tbody class="BusquedaRapida">


                                    <tr role="row" class="odd">
                                        <td>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="check4[]" id="check4_" value="">
                                                <label class="custom-control-label text-success" for="check4_"></label>
                                            </div>
                                        </td>
                                        <td></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" onClick="AgregarPaisUpdate()" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-check"></span> Seleccionar</button>
                <button type="button" onClick="LimpiarCheckbox();" class="btn btn-dark" data-dismiss="modal"><span class="fa fa-times-circle"></span> Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Listado de Paises Update -->













<!-- Modal Ver Detalle Facturacion -->
<div id="MyModalDetalleFacturacion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title text-white" id="myModalLabel"><i class="fa fa-align-justify"></i> Detalle de Facturación</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="{{asset('assets/images/close.png')}}" /></button>
            </div>
            <div class="modal-body">

                <div id="muestradetallefacturacionmodal"></div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-dismiss="modal"><span class="fa fa-times-circle"></span> Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Ver Detalle Facturacion -->

<!-- Modal para Asignar Facturacion -->
<div id="MyModalFacturacion" class="modal fade" tabindex="-1" role="dialog" style="overflow-y: scroll;" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title text-white" id="myModalLabel"><i class="fa fa-tasks"></i> Facturación Asociada a la Industria</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="{{asset('assets/images/close.png')}}" /></button>
            </div>

            <form class="form form-material" name="savefacturacion" id="savefacturacion" action="#">

                <div class="modal-body">

                    <h3 class="card-subtitle text-muted"><i class="fa fa-cube"></i> Facturación</h3> <span class="card-subtitle text-muted">(Los montos declarados por actividad deben coincidir con los declarados ante AFIP y ATER)</span>
                    <hr>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="form-group has-feedback">
                               
                                <input type="hidden" name="seccionfacturacion" id="seccionfacturacion" value="">
                                <input type="hidden" name="proceso" id="facturacion" value="savefacturacion" />
                                <input type="hidden" name="id_facturacion" id="id_facturacion">
                                <input type="hidden" name="industria_facturacion" id="industria_facturacion">
                                <input type="hidden" name="anio_facturacion" id="anio_facturacion">
                               
                            </div>
                        </div>
                    </div>

                    <h3 class="card-subtitle text-muted"><i class="fa fa-file-text"></i> Clasificación de Ingresos</h3><br>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group has-feedback">
                                
                               
                                <select class="form-control" id="clasif_ingreso" name="clasif_ingreso" required="" aria-required="true">
                                    <option value=""> -- SELECCIONE -- </option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <br>

                    <h3 class="card-subtitle text-muted"><i class="fa fa-file-text"></i> Información Impositiva y Niveles de Facturación</h3>
                    <hr>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label class="control-label">Facturación Anual en Año Corriente (Pesos): <span class="symbol required"></span></label>
                                <input type="text" class="form-control" name="prevision_ingresos_anio_corriente" id="prevision_ingresos_anio_corriente" placeholder="Ingrese Facturación Anual en Año Corriente (Pesos)" onKeyPress="EvaluateText('%f', this);" onBlur="this.value = NumberFormat(this.value, '2', '.', '')" autocomplete="off" required="" aria-required="true" />
                                <i class="mdi mdi-currency-usd form-control-feedback"></i>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label class="control-label">Facturación Anual en Año Corriente (USD): <span class="symbol required"></span></label>
                                <input type="text" class="form-control" name="prevision_ingresos_anio_corriente_dolares" id="prevision_ingresos_anio_corriente_dolares" placeholder="Ingrese Facturación Anual en Año Corriente (USD)" onKeyPress="EvaluateText('%f', this);" onBlur="this.value = NumberFormat(this.value, '2', '.', '')" autocomplete="off" required="" aria-required="true" />
                                <i class="mdi mdi-cash-usd form-control-feedback"></i>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label class="control-label">Facturación Mercado Interno (%): <span class="symbol required"></span></label>
                                <input type="text" class="form-control" name="porcentaje_prevision_mercado_interno" id="porcentaje_prevision_mercado_interno" placeholder="Ingrese Facturación Mercado Interno (%)" onKeyPress="EvaluateText('%f', this);" onBlur="this.value = NumberFormat(this.value, '2', '.', '')" autocomplete="off" required="" aria-required="true" />
                                <i class="mdi mdi-percent form-control-feedback"></i>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label class="control-label">Facturación Mercado Externo (%): <span class="symbol required"></span></label>
                                <input type="text" class="form-control" name="porcentaje_prevision_mercado_externo" id="porcentaje_prevision_mercado_externo" placeholder="Ingrese Facturación Mercado Externo (%)" onKeyPress="EvaluateText('%f', this);" onBlur="this.value = NumberFormat(this.value, '2', '.', '')" autocomplete="off" required="" aria-required="true" />
                                <i class="mdi mdi-percent form-control-feedback"></i>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" name="btn-facturacion" id="btn-facturacion" class="btn btn-danger"><span class="fa fa-save"></span> Guardar</button>
                    <button type="button" style="display: none; " name="btn-facturacion-update" id="btn-facturacion-update" class="btn btn-danger"><span class="fa fa-save"></span> Guardar</button>
                    <button class="btn btn-dark" type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="
                document.getElementById('facturacion').value = 'savefacturacion',
                document.getElementById('id_facturacion').value = '',
                document.getElementById('industria_facturacion').value = '',
                document.getElementById('anio_facturacion').value = '',
                document.getElementById('prevision_ingresos_anio_corriente').value = '',
                document.getElementById('prevision_ingresos_anio_corriente_dolares').value = '',
                document.getElementById('porcentaje_prevision_mercado_interno').value = '',
                document.getElementById('porcentaje_prevision_mercado_externo').value = ''
                "><span class="fa fa-trash-o"></span> Cancelar</button>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- Modal para Asignar Facturacion -->
















<!-- Modal Ver Detalle Efluente -->
<div id="MyModalDetalleEfluente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title text-white" id="myModalLabel"><i class="fa fa-align-justify"></i> Detalle de Efluente</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="{{asset('assets/images/close.png')}}" /></button>
            </div>
            <div class="modal-body">

                <div id="muestradetalleefluentemodal"></div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-dismiss="modal"><span class="fa fa-times-circle"></span> Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Ver Detalle Efluente -->

<!-- Modal para Asignar Efluente -->
<div id="MyModalEfluente" class="modal fade" tabindex="-1" role="dialog" style="overflow-y: scroll;" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title text-white" id="myModalLabel"><i class="fa fa-tasks"></i> Efluentes Asociado a la Industria</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="{{asset('assets/images/close.png')}}" /></button>
            </div>

            <form class="form form-material" name="saveefluente" id="saveefluente" action="#">

                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group has-feedback">
                                <label class="control-label">Descripción de Industria: <span class="symbol required"></span></label>
                                <br /><abbr title="Descripción de Industria"><label id="nombre_de_fantasia"></label></abbr>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label class="control-label">Descripción Residuo: <span style="cursor: pointer;" class="mdi mdi-alert-circle text-danger" data-container="body" title="Notificación: Ingrese Nombre de Efluente y seleccione en el Listado que se mostrará, en caso de no aparecer, escribala y el sistema se encargará de la asignación del mismo."></span><span class="symbol required"></span></label>
                            <div class="form-group has-feedback">
                                <input type="hidden" name="seccionefluente" id="seccionefluente" value="">
                                <input type="hidden" name="proceso" id="efluente" value="saveefluente" />
                                <input type="hidden" name="id_rel_industria_efluente" id="id_rel_industria_efluente">
                                <input type="hidden" name="industria_efluente" id="industria_efluente">
                                <input type="hidden" name="anio_efluente" id="anio_efluente">
                                <input type="hidden" name="id_efluente" id="id_efluente" />
                                <input type="text" class="form-control" name="search_efluente" id="search_efluente" placeholder="Realice la Búsqueda de Efluente o Ingrese Descripción" autocomplete="off" required="" aria-required="true" />
                                <i class="fa fa-search form-control-feedback"></i>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label class="control-label">Tratamiento Residuo (Breve explicación del sistema utilizado): <span class="symbol required"></span></label>
                                <input type="text" class="form-control" name="tratamiento_residuo" id="tratamiento_residuo" placeholder="Ingrese Tratamiento Residuo" autocomplete="off" required="" aria-required="true">
                                <i class="fa fa-pencil form-control-feedback"></i>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label class="control-label">Destino Final: <span class="symbol required"></span></label>
                                <input type="text" class="form-control" name="destino" id="destino" placeholder="Ingrese Destino Final" autocomplete="off" required="" aria-required="true">
                                <i class="fa fa-pencil form-control-feedback"></i>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" name="btn-efluente" id="btn-efluente" class="btn btn-danger"><span class="fa fa-save"></span> Guardar</button>
                    <button class="btn btn-dark" type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="
                document.getElementById('efluente').value = 'saveefluente',
                document.getElementById('id_rel_industria_efluente').value = '',
                document.getElementById('industria_efluente').value = '',
                document.getElementById('anio_efluente').value = '',
                document.getElementById('id_efluente').value = '',
                document.getElementById('search_efluente').value = '',
                document.getElementById('tratamiento_residuo').value = '',
                document.getElementById('destino').value = ''
                "><span class="fa fa-trash-o"></span> Cancelar</button>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- Modal para Asignar Efluente -->
















<!-- Modal Ver Detalle Certificado -->
<div id="MyModalDetalleCertificado" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title text-white" id="myModalLabel"><i class="fa fa-align-justify"></i> Detalle de Certificado</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="{{asset('assets/images/close.png')}}" /></button>
            </div>
            <div class="modal-body">

                <div id="muestradetallecertificadomodal"></div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-dismiss="modal"><span class="fa fa-times-circle"></span> Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Ver Detalle Certificado -->

<!-- Modal para Asignar Certificado -->
<div id="MyModalCertificado" class="modal fade" tabindex="-1" role="dialog" style="overflow-y: scroll;" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title text-white" id="myModalLabel"><i class="fa fa-tasks"></i> Certificados Asociado a la Industria</h4>
                <button type="button" onclick="LimpiarRadio();" class="close" data-dismiss="modal" aria-hidden="true"><img src="{{asset('assets/images/close.png')}}" /></button>
            </div>

            <form class="form form-material" name="savecertificado" id="savecertificado" action="#">

                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group has-feedback">
                                <label class="control-label">Descripción de Industria: <span class="symbol required"></span></label>
                                <br /><abbr title="Descripción de Industria"><label id="nombre_de_fantasia"></label></abbr>
                                <input type="hidden" name="seccioncertificado" id="seccioncertificado" value="">
                                <input type="hidden" name="proceso" id="certificado" value="savecertificado" />
                                <input type="hidden" name="industria_certificado" id="industria_certificado">
                                <input type="hidden" name="anio_certificado" id="anio_certificado">
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="default_order" class="table2 display" border="0">
                            <thead>
                                <tr role="row">
                                    <th>Documentación <span class="symbol required"></span></th>
                                    <th>No Posee </th>
                                    <th>En Trámite </th>
                                    <th>Posee </th>
                                    <th>Fecha Inicial</th>
                                    <th>Fecha Final</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr role="row" class="odd">
                                    <td><input type="hidden" name="id_certificado[]" id="id_certificado" value="" /><label></label></td>

                                    <td class="text-center">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" name="checkbox[]" id="name1_" value="NO POSEE" class="custom-control-input" onClick="ProcesarCertificado('NO POSEE',);">
                                            <label class="custom-control-label" for="name1_"></label>
                                        </div>
                                    </td>

                                    <td class="text-center">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" name="checkbox[]" id="name2_" value="EN TRAMITE" class="custom-control-input" onClick="ProcesarCertificado('EN TRAMITE',);">
                                            <label class="custom-control-label" for="name2_"></label>
                                        </div>
                                    </td>

                                    <td class="text-center">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" name="checkbox[]" id="name3_" value="POSEE" class="custom-control-input" onClick="ProcesarCertificado('POSEE',);">
                                            <label class="custom-control-label" for="name3_"></label>
                                        </div>
                                    </td>

                                    <td class="text-center"><input type="text" class="form-control certificado" name="inicio_certificado[]" id="inicio_certificado_" placeholder="Ingrese Fecha Inicial" autocomplete="off" style="width:100%;height:40px;background:#f0f9fc;border-radius:5px 5px 5px 5px;" onClick="Calendario();" disabled="" title="Ingrese Fecha Inicial" required="" aria-required="true"></td>

                                    <td class="text-center"><input type="text" class="form-control certificado" name="fin_certificado[]" id="fin_certificado_" placeholder="Ingrese Fecha Final" autocomplete="off" style="width:100%;height:40px;background:#f0f9fc;border-radius:5px 5px 5px 5px;" onClick="Calendario();" disabled="" title="Ingrese Fecha Final" required="" aria-required="true"></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" name="btn-certificado" id="btn-certificado" class="btn btn-danger"><span class="fa fa-save"></span> Guardar</button>
                    <button type="button" onclick="LimpiarRadio();" class="btn btn-dark" class="close" data-dismiss="modal" aria-hidden="true" onclick="
                document.getElementById('industria_certificado').value = '',
                document.getElementById('anio_certificado').value = '',
                document.getElementById('inicio_certificado').value = '',
                document.getElementById('fin_certificado').value = ''
                "><span class="fa fa-trash-o"></span> Cancelar</button>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- Modal para Asignar Certificado -->

<!-- Modal para Actualizar Certificado -->
<div id="MyModalUpdateCertificado" class="modal fade" tabindex="-1" role="dialog" style="overflow-y: scroll;" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title text-white" id="myModalLabel"><i class="fa fa-tasks"></i> Actualizar Certificado Asociado a la Industria</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="{{asset('assets/images/close.png')}}" /></button>
            </div>

            <form class="form form-material" name="updatecertificado" id="updatecertificado" action="#">

                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group has-feedback">
                                <input type="hidden" name="seccioncertificadoupdate" id="seccioncertificadoupdate" value="">
                                <input type="hidden" name="proceso" id="certificadoupdate" value="updatecertificado" />
                                <input type="hidden" name="id_rel_industria_certificado" id="id_rel_industria_certificado">
                                <input type="hidden" name="industria_certificado_update" id="industria_certificado_update">
                                <input type="hidden" name="anio_certificado_update" id="anio_certificado_update">
                                <label class="control-label">Descripción de Industria: <span class="symbol required"></span></label>
                                <br /><abbr title="Descripción de Industria"><label id="nombre_de_fantasia"></label></abbr>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group has-feedback">
                                <label class="control-label">Documentación: <span class="symbol required"></span></label>
                                <br /><abbr title="Documentación"><label id="nombre_certificado"></label></abbr>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group has-feedback">
                                <label class="control-label">Status de Certificado: <span class="symbol required"></span></label>
                                <i class="fa fa-bars form-control-feedback"></i>
                                <select class="form-control" id="estado_certificado" name="estado_certificado" onChange="ProcesarCertificadoUpdate(this.form.estado_certificado.value);" required="" aria-required="true">
                                    <option value=""> -- SELECCIONE -- </option>
                                    <option value="NO POSEE">NO POSEE</option>
                                    <option value="EN TRAMITE">EN TRÁMITE</option>
                                    <option value="POSEE">POSEE</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label class="control-label">Fecha Inicial: <span class="symbol required"></span></label>
                                <input type="text" class="form-control desde" name="inicio_certificado" id="inicio_certificado" placeholder="Ingrese Fecha Inicial" autocomplete="off" disabled="" required="" aria-required="true" />
                                <i class="fa fa-calendar form-control-feedback"></i>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label class="control-label">Fecha Final: <span class="symbol required"></span></label>
                                <input type="text" class="form-control hasta" name="fin_certificado" id="fin_certificado" placeholder="Ingrese Fecha Final" autocomplete="off" disabled="" required="" aria-required="true" />
                                <i class="fa fa-calendar form-control-feedback"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" name="btn-certificadoupdate" id="btn-certificadoupdate" class="btn btn-danger"><span class="fa fa-edit"></span> Actualizar</button>
                    <button class="btn btn-dark" type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="
                document.getElementById('id_rel_industria_certificado').value = '',
                document.getElementById('industria_certificado_update').value = '',
                document.getElementById('anio_certificado_update').value = '',
                document.getElementById('estado_certificado').value = '',
                document.getElementById('inicio_certificado').value = '',
                document.getElementById('fin_certificado').value = ''
                "><span class="fa fa-trash-o"></span> Cancelar</button>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- Modal para Actualizar Certificado -->






















<!-- Modal Ver Detalle Sistema de Calidad -->
<div id="MyModalDetalleSistema" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title text-white" id="myModalLabel"><i class="fa fa-align-justify"></i> Detalle de Sistema de Calidad</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="{{asset('assets/images/close.png')}}" /></button>
            </div>
            <div class="modal-body">

                <div id="muestradetallesistemamodal"></div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-dismiss="modal"><span class="fa fa-times-circle"></span> Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Ver Detalle Sistema de Calidad -->

<!-- Modal para Asignar Sistema de Calidad -->
<div id="MyModalSistema" class="modal fade" tabindex="-1" role="dialog" style="overflow-y: scroll;" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title text-white" id="myModalLabel"><i class="fa fa-tasks"></i> Sistema de Calidad Asociado a la Industria</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="{{asset('assets/images/close.png')}}" /></button>
            </div>

            <form class="form form-material" name="savesistema" id="savesistema" action="#">

                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group has-feedback">
                                <label class="control-label">Descripción de Industria: <span class="symbol required"></span></label>
                                <br /><abbr title="Descripción de Industria"><label id="nombre_de_fantasia"></label></abbr>
                                <input type="hidden" name="seccionsistema" id="seccionsistema" value="">
                                <input type="hidden" name="proceso" id="sistema" value="savesistema" />
                                <input type="hidden" name="industria_sistema" id="industria_sistema">
                                <input type="hidden" name="anio_sistema" id="anio_sistema">
                            </div>
                        </div>
                    </div>

                    <div id="div2">
                        <div class="table-responsive">
                            <table id="default_order" class="table2 display" border="0">
                                <thead>
                                    <tr role="row">
                                        <th>Norma de Calidad <span class="symbol required"></span></th>
                                        <th>No Posee </th>
                                        <th>En Trámite </th>
                                        <th>Posee </th>
                                        <th>Fecha Inicial</th>
                                        <th>Fecha Final</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr role="row" class="odd">
                                        <td><input type="hidden" name="id_sistema_de_calidad[]" id="id_sistema_de_calidad" value="" /><label></label></td>

                                        <td class="text-center">
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="checkbox[]" id="name4_" value="NO POSEE" class="custom-control-input" onClick="ProcesarSistema('NO POSEE',);" checked="checked">
                                                <label class="custom-control-label" for="name4_"></label>
                                            </div>
                                        </td>

                                        <td class="text-center">
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="checkbox[]" id="name5_" value="EN TRAMITE" class="custom-control-input" onClick="ProcesarSistema('EN TRAMITE',);">
                                                <label class="custom-control-label" for="name5_"></label>
                                            </div>
                                        </td>

                                        <td class="text-center">
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="checkbox[]" id="name6_" value="POSEE" class="custom-control-input" onClick="ProcesarSistema('POSEE',);">
                                                <label class="custom-control-label" for="name6_"></label>
                                            </div>
                                        </td>

                                        <td class="text-center"><input type="text" class="form-control calidad" name="inicio_sistema[]" id="inicio_sistema_" placeholder="Ingrese Fecha Inicial" autocomplete="off" style="width:100%;height:40px;background:#f0f9fc;border-radius:5px 5px 5px 5px;" disabled="" title="Ingrese Fecha Inicial" required="" aria-required="true"></td>

                                        <td class="text-center"><input type="text" class="form-control calidad" name="fin_sistema[]" id="fin_sistema_" placeholder="Ingrese Fecha Final" autocomplete="off" style="width:100%;height:40px;background:#f0f9fc;border-radius:5px 5px 5px 5px;" disabled="" title="Ingrese Fecha Final" required="" aria-required="true"></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" name="btn-sistema" id="btn-sistema" class="btn btn-danger"><span class="fa fa-save"></span> Guardar</button>
                    <button class="btn btn-dark" type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="
                document.getElementById('industria_sistema').value = '',
                document.getElementById('anio_sistema').value = '',
                document.getElementById('inicio_sistema').value = '',
                document.getElementById('fin_sistema').value = ''
                "><span class="fa fa-trash-o"></span> Cancelar</button>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- Modal para Asignar Sistema de Calidad -->

<!-- Modal para Actualizar Sistema de Calidad -->
<div id="MyModalUpdateSistema" class="modal fade" tabindex="-1" role="dialog" style="overflow-y: scroll;" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title text-white" id="myModalLabel"><i class="fa fa-tasks"></i> Actualizar Sistema Asociado a la Industria</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="{asset('assets/images/close.png')}}" /></button>
            </div>

            <form class="form form-material" name="updatesistema" id="updatesistema" action="#">

                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group has-feedback">
                                <input type="hidden" name="seccionsistemaupdate" id="seccionsistemaupdate" value="">
                                <input type="hidden" name="proceso" id="sistemaupdate" value="updatesistema" />
                                <input type="hidden" name="id_rel_industria_sistema" id="id_rel_industria_sistema">
                                <input type="hidden" name="industria_sistema_update" id="industria_sistema_update">
                                <input type="hidden" name="anio_sistema_update" id="anio_sistema_update">
                                <label class="control-label">Descripción de Industria: <span class="symbol required"></span></label>
                                <br /><abbr title="Descripción de Industria"><label id="nombre_de_fantasia"></label></abbr>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group has-feedback">
                                <label class="control-label">Norma de Calidad: <span class="symbol required"></span></label>
                                <br /><abbr title="Documentación"><label id="nombre_sistema"></label></abbr>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group has-feedback">
                                <label class="control-label">Status de Certificado: <span class="symbol required"></span></label>
                                <i class="fa fa-bars form-control-feedback"></i>
                                <select class="form-control" id="estado_sistema" name="estado_sistema" onChange="ProcesarSistemaUpdate(this.form.estado_sistema.value);" required="" aria-required="true">
                                    <option value=""> -- SELECCIONE -- </option>
                                    <option value="NO POSEE">NO POSEE</option>
                                    <option value="EN TRAMITE">EN TRÁMITE</option>
                                    <option value="POSEE">POSEE</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label class="control-label">Fecha Inicial: <span class="symbol required"></span></label>
                                <input type="text" class="form-control desde" name="inicio_sistema" id="inicio_sistema" placeholder="Ingrese Fecha Inicial" autocomplete="off" disabled="" required="" aria-required="true" />
                                <i class="fa fa-calendar form-control-feedback"></i>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label class="control-label">Fecha Final: <span class="symbol required"></span></label>
                                <input type="text" class="form-control hasta" name="fin_sistema" id="fin_sistema" placeholder="Ingrese Fecha Final" autocomplete="off" disabled="" required="" aria-required="true" />
                                <i class="fa fa-calendar form-control-feedback"></i>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" name="btn-sistemaupdate" id="btn-sistemaupdate" class="btn btn-danger"><span class="fa fa-edit"></span> Actualizar</button>
                    <button class="btn btn-dark" type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="
                document.getElementById('id_rel_industria_sistema').value = '',
                document.getElementById('industria_sistema_update').value = '',
                document.getElementById('anio_sistema_update').value = '',
                document.getElementById('estado_sistema').value = '',
                document.getElementById('inicio_sistema').value = '',
                document.getElementById('fin_sistema').value = ''
                "><span class="fa fa-trash-o"></span> Cancelar</button>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- Modal para Actualizar Sistema de Calidad -->




















<!-- Modal Ver Detalle Promociones -->
<div id="MyModalDetallePromocion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title text-white" id="myModalLabel"><i class="fa fa-align-justify"></i> Detalle de Promoción</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="{{asset('assets/images/close.png')}}" /></button>
            </div>
            <div class="modal-body">

                <div id="muestradetallepromocionmodal"></div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-dismiss="modal"><span class="fa fa-times-circle"></span> Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Ver Detalle Promociones -->

<!-- Modal para Asignar Promociones -->
<div id="MyModalPromocion" class="modal fade" tabindex="-1" role="dialog" style="overflow-y: scroll;" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title text-white" id="myModalLabel"><i class="fa fa-tasks"></i> Promociones Industriales Asociado a la Industria</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="{{asset('assets/images/close.png')}}" /></button>
            </div>

            <form class="form form-material" name="savepromocion" id="savepromocion" action="#">

                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group has-feedback">
                                <label class="control-label">Descripción de Industria: <span class="symbol required"></span></label>
                                <br /><abbr title="Descripción de Industria"><label id="nombre_de_fantasia"></label></abbr>
                                <input type="hidden" name="seccionpromocion" id="seccionpromocion" value="">
                                <input type="hidden" name="proceso" id="promocion" value="savepromocion" />
                                <input type="hidden" name="industria_promocion" id="industria_promocion">
                                <input type="hidden" name="anio_promocion" id="anio_promocion">
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="default_order" class="table2 display" border="0">
                            <thead>
                                <tr role="row">
                                    <th>Promoción Industrial <span class="symbol required"></span></th>
                                    <th>No Posee </th>
                                    <th>En Trámite </th>
                                    <th>Posee </th>
                                    <th>Fecha Inicial</th>
                                    <th>Fecha Final</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr role="row" class="odd">
                                    <td><input type="hidden" name="id_promocion_industrial[]" id="id_promocion_industrial" value="" /><label></label></td>

                                    <td class="text-center">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" name="checkbox[]" id="name7_" value="NO POSEE" class="custom-control-input">
                                            <label class="custom-control-label" for="name7_" onClick="ProcesarPromocion('NO POSEE',);"></label>
                                        </div>
                                    </td>

                                    <td class="text-center">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" name="checkbox[]" id="name8_" value="EN TRAMITE" class="custom-control-input" onClick="ProcesarPromocion('EN TRAMITE',);">
                                            <label class="custom-control-label" for="name8_"></label>
                                        </div>
                                    </td>

                                    <td class="text-center">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" name="checkbox[]" id="name9_" value="POSEE" class="custom-control-input" onClick="ProcesarPromocion('POSEE',);">
                                            <label class="custom-control-label" for="name9_"></label>
                                        </div>
                                    </td>

                                    <td class="text-center"><input type="text" class="form-control calendario" name="inicio_promocion[]" id="inicio_promocion_" placeholder="Ingrese Fecha Inicial" autocomplete="off" style="width:100%;height:40px;background:#f0f9fc;border-radius:5px 5px 5px 5px;" disabled="" title="Ingrese Fecha Inicial" required="" aria-required="true"></td>

                                    <td class="text-center"><input type="text" class="form-control calendario" name="fin_promocion[]" id="fin_promocion_" placeholder="Ingrese Fecha Final" autocomplete="off" style="width:100%;height:40px;background:#f0f9fc;border-radius:5px 5px 5px 5px;" disabled="" title="Ingrese Fecha Final" required="" aria-required="true"></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" name="btn-promocion" id="btn-promocion" class="btn btn-danger"><span class="fa fa-save"></span> Guardar</button>
                    <button class="btn btn-dark" type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="
                document.getElementById('industria_promocion').value = '',
                document.getElementById('anio_promocion').value = '',
                document.getElementById('inicio_promocion').value = '',
                document.getElementById('fin_promocion').value = ''
                "><span class="fa fa-trash-o"></span> Cancelar</button>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- Modal para Asignar Promociones -->

<!-- Modal para Actualizar Promociones -->
<div id="MyModalUpdatePromocion" class="modal fade" tabindex="-1" role="dialog" style="overflow-y: scroll;" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title text-white" id="myModalLabel"><i class="fa fa-tasks"></i> Actualizar Promocón Industrial Asociado a la Industria</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="assets/images/close.png" /></button>
            </div>

            <form class="form form-material" name="updatepromocion" id="updatepromocion" action="#">

                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group has-feedback">
                                <input type="hidden" name="seccionpromocionupdate" id="seccionpromocionupdate" value="">
                                <input type="hidden" name="proceso" id="promocionupdate" value="updatepromocion" />
                                <input type="hidden" name="id_rel_industria_promocion_industrial" id="id_rel_industria_promocion_industrial">
                                <input type="hidden" name="industria_promocion_update" id="industria_promocion_update">
                                <input type="hidden" name="anio_promocion_update" id="anio_promocion_update">
                                <label class="control-label">Descripción de Industria: <span class="symbol required"></span></label>
                                <br /><abbr title="Descripción de Industria"><label id="nombre_de_fantasia"></label></abbr>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group has-feedback">
                                <label class="control-label">Promoción Industrial: <span class="symbol required"></span></label>
                                <br /><abbr title="Documentación"><label id="nombre_promocion"></label></abbr>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group has-feedback">
                                <label class="control-label">Status de Certificado: <span class="symbol required"></span></label>
                                <i class="fa fa-bars form-control-feedback"></i>
                                <select class="form-control" id="estado_promocion" name="estado_promocion" onChange="ProcesarPromocionUpdate(this.form.estado_promocion.value);" required="" aria-required="true">
                                    <option value=""> -- SELECCIONE -- </option>
                                    <option value="NO POSEE">NO POSEE</option>
                                    <option value="EN TRAMITE">EN TRÁMITE</option>
                                    <option value="POSEE">POSEE</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label class="control-label">Fecha Inicial: <span class="symbol required"></span></label>
                                <input type="text" class="form-control desde" name="inicio_promocion" id="inicio_promocion" placeholder="Ingrese Fecha Inicial" autocomplete="off" disabled="" required="" aria-required="true" />
                                <i class="fa fa-calendar form-control-feedback"></i>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label class="control-label">Fecha Final: <span class="symbol required"></span></label>
                                <input type="text" class="form-control hasta" name="fin_promocion" id="fin_promocion" placeholder="Ingrese Fecha Final" autocomplete="off" disabled="" required="" aria-required="true" />
                                <i class="fa fa-calendar form-control-feedback"></i>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" name="btn-promocionupdate" id="btn-promocionupdate" class="btn btn-danger"><span class="fa fa-edit"></span> Actualizar</button>
                    <button class="btn btn-dark" type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="
                document.getElementById('id_rel_industria_promocion_industrial').value = '',
                document.getElementById('industria_promocion_update').value = '',
                document.getElementById('anio_promocion_update').value = '',
                document.getElementById('estado_promocion').value = '',
                document.getElementById('inicio_promocion').value = '',
                document.getElementById('fin_promocion').value = ''
                "><span class="fa fa-trash-o"></span> Cancelar</button>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- Modal para Actualizar Promociones -->



















<!-- Modal Ver Detalle Economia del Conocimiento -->
<div id="MyModalDetalleEconomia" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title text-white" id="myModalLabel"><i class="fa fa-align-justify"></i> Detalle de Economia del Conocimiento</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="{{asset('assets/images/close.png')}}" /></button>
            </div>
            <div class="modal-body">

                <div id="muestradetalleeconomiamodal"></div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-dismiss="modal"><span class="fa fa-times-circle"></span> Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Ver Detalle Economia del Conocimiento -->

<!-- Modal para Asignar Economia del Conocimiento -->
<div id="MyModalEconomia" class="modal fade" tabindex="-1" role="dialog" style="overflow-y: scroll;" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title text-white" id="myModalLabel"><i class="fa fa-tasks"></i> Economia del Conocimiento Asociado a la Industria</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="{{asset('assets/images/close.png')}}" /></button>
            </div>

            <form class="form form-material" name="saveeconomia" id="saveeconomia" action="#">

                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group has-feedback">
                                <label class="control-label">Descripción de Industria: <span class="symbol required"></span></label>
                                <input type="hidden" name="seccioneconomia" id="seccioneconomia" value="">
                                <input type="hidden" name="proceso" id="economia" value="saveeconomia" />
                                <input type="hidden" name="id_economia" id="id_economia">
                                <input type="hidden" name="industria_economia" id="industria_economia">
                                <input type="hidden" name="anio_economia" id="anio_economia">
                                <br /><abbr title="Descripción de Industria"><label id="nombre_de_fantasia"></label></abbr>
                            </div>
                        </div>
                    </div>

                    <div id="muestraeconomia"></div>

                </div>

                <div class="modal-footer">
                    <button type="submit" name="btn-economia" id="btn-economia" class="btn btn-danger"><span class="fa fa-save"></span> Guardar</button>
                    <button class="btn btn-dark" type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="
                document.getElementById('economia').value = 'saveeconomia',
                document.getElementById('id_economia').value = '',
                document.getElementById('industria_economia').value = '',
                document.getElementById('anio_economia').value = '',
                document.getElementById('otro_sector').value = '',
                document.getElementById('otro_personal').value = ''
                "><span class="fa fa-trash-o"></span> Cancelar</button>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- Modal para Asignar Economia del Conocimiento -->