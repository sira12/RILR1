
<!--############################## MODAL PARA DETALLE DE SOLICITUD ######################################-->   
<!-- sample modal content -->
<div id="myModalDetalle" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title text-white" id="myModalLabel"><i class="fa fa-align-justify"></i> Detalle de Solicitud</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="assets/images/close.png"/></button>
            </div>
            <div class="modal-body">

            <div id="muestrasolicitudmodal"></div> 

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-dark" data-dismiss="modal"><span class="fa fa-times-circle"></span> Cerrar</button>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!--############################## MODAL PARA DETALLE DE SOLICITUD ######################################--> 



<!--############################## MODAL PARA VERIFICAR SOLICITUD ######################################-->
<!-- sample modal content -->
<div id="myModalSolicitud" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title text-white" id="myModalLabel"><i class="fa fa-save"></i> Gestión de Solicitud</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="assets/images/close.png"/></button>
            </div>
            
            <form class="form form-material" method="post" action="#" name="verificasolicitud" id="verificasolicitud">
                    
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label class="control-label">Nº de Cuit: <span class="symbol required"></span></label>
                                <input type="hidden" name="proceso" id="proceso" value="save"/>
                                <input type="hidden" name="id_rel_persona_contribuyente" id="id_rel_persona_contribuyente">
                                <input type="hidden" name="persona" id="persona">
                                <input type="hidden" name="contribuyente" id="contribuyente">
                                <input type="hidden" name="usr" id="usr">
                                <input type="hidden" name="empresa" id="empresa">
                                <input type="hidden" name="email" id="email">
                                <input type="text" class="form-control" name="cuit" id="cuit" placeholder="Ingrese Nº de Cuit" autocomplete="off" disabled="" aria-required="true"/> 
                                <i class="fa fa-bolt form-control-feedback"></i> 
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label class="control-label">Razón Social: <span class="symbol required"></span></label>
                                <input type="text" class="form-control" name="razon_social" id="razon_social" placeholder="Ingrese Razón Social" autocomplete="off" disabled="" aria-required="true"/>  
                                <i class="fa fa-pencil form-control-feedback"></i> 
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label class="control-label">Nº de Documento: <span class="symbol required"></span></label>
                                <input type="text" class="form-control" name="documento" id="documento" placeholder="Ingrese Nº de Documento" autocomplete="off" disabled="" aria-required="true"/> 
                                <i class="fa fa-bolt form-control-feedback"></i> 
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label class="control-label">Apellidos y Nombres: <span class="symbol required"></span></label>
                                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese Apellidos y Nombres" autocomplete="off" disabled="" aria-required="true"/>  
                                <i class="fa fa-pencil form-control-feedback"></i> 
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label class="control-label">Nº de Celular: <span class="symbol required"></span></label>
                                <input type="text" class="form-control" name="tel_celular" id="tel_celular" placeholder="Ingrese Cargo de Usuario" autocomplete="off" disabled="" aria-required="true"/>  
                                <i class="fa fa-mobile form-control-feedback"></i> 
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label class="control-label">Email Fiscal: <span class="symbol required"></span></label>
                                <input type="text" class="form-control" name="email_fiscal" id="email_fiscal" placeholder="Ingrese Correo Electronico" autocomplete="off" disabled="" aria-required="true"/> 
                                <i class="fa fa-envelope-o form-control-feedback"></i>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Status de Solicitud: <span class="symbol required"></span></label> 
                                <br>
                                <div class="form-check form-check-inline">
                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="name1" name="status" value="1" onclick="MuestraObservacion();" class="custom-control-input">
                                <label class="custom-control-label" for="name1">APROBADA</label>
                                </div>
                                </div>
                                <div class="form-check form-check-inline">
                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="name2" name="status" value="2" onclick="MuestraObservacion();" class="custom-control-input">
                                <label class="custom-control-label" for="name2">RECHAZADA</label>
                                </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6"> 
                            <div class="form-group has-feedback2"> 
                            <label class="control-label">Observaciones: <span class="symbol required"></span></label> 
                            <textarea class="form-control" type="text" name="observaciones_status" id="observaciones_status" autocomplete="off" placeholder="Ingrese Observaciones de Pedido"></textarea>
                            <i class="fa fa-comment-o form-control-feedback2"></i> 
                        </div> 
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Dni Frente:   <a target="_blank" href=""  class="link" id="dnif"><i class="fa fa-eye"></i> Ver Documento</a></label> 
                                <br>
                                <label class="control-label">Dni Dorso:   <a target="_blank" href="" class="" id="dnid"><i class="fa fa-eye"></i> Ver Documento</a></label> 
                                <br>
                                <label class="control-label">Inscripción Afip:   <a target="_blank" href="" class="" id="ia"><i class="fa fa-eye"></i> Ver Documento</a></label> 
                                <br>
                                <div id="const_apod">
                                    <label class="control-label">Constancia Apoderado:   <a target="_blank" href="" class="" id="ca"><i class="fa fa-eye"></i> Ver Documento</a></label> 
                                    <br>
                                </div>
                               <div id="contr_s">
                                <label class="control-label">Contrato Social o Etatuto:   <a target="_blank" href="" class="" id="cse"><i class="fa fa-eye"></i> Ver Documento</a></label> 
                                <br>

                               </div>
                                
                            </div>
                        </div>                        
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" name="btn-submit" id="btn-submit" class="btn btn-danger"><span class="fa fa-save"></span> Guardar</button>
                    <button class="btn btn-dark" type="button" onclick="LimpiarRadio();" data-dismiss="modal" aria-hidden="true"><span class="fa fa-trash-o"></span> Cancelar</button>
                </div>
            </form>

        </div>
    
    </div>
</div>
<!--############################## MODAL PARA VERIFICAR SOLICITUD ######################################-->



<div  id="myModalVerCbt" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="max-width: 99% !important;">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title text-white" id="cbtName"><i class="fa fa-eye"></i> Industrias del Contribuyente</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="assets/images/close.png"/></button>
            </div>
            
           
                        <div class="modal-body" >
                            <div class="table-responsive" >
                                <table style="width:100%;overflow-x: auto" class="table table-striped table-bordered border display industrias-cbt">

                                    <thead>
                                        
                                    <tr role="row">
                                        <th>N°</th>
                                        <th>Estado del tramite</th>
                                        <th>Establecimiento</th>
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


<div  id="myModalVerInd" class="modal fade" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="max-width: 99% !important;">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title text-white" id="indName"><i class="fa fa-save"></i></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="assets/images/close.png"/></button>
            </div>
            
           
                        <div class="modal-body" >

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
                            
                            
                        </div>                        
                   

        </div>
    
    </div>
</div>