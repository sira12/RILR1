<?php
require_once("class/class.php");
if (isset($_SESSION['acceso'])) {
    if ($_SESSION['acceso'] == "administrador" || $_SESSION["acceso"]=="operador" || $_SESSION["acceso"]=="secretaria" || $_SESSION["acceso"]=="contribuyente") {

$tra = new Login();
$ses = $tra->ExpiraSession();

$pa = new Login();
$pa = $pa->SelecPaisesPorId();
$codpa = ($pa == '' ? "" : $pa[0]['id_pais']);
$nompa = ($pa == '' ? "" : $pa[0]['npais']);

$pro = new Login();
$pro = $pro->SelecProvinciasPorId();
$codpro = ($pro == '' ? "" : $pro[0]['id_provincia']);
$nompro = ($pro == '' ? "" : $pro[0]['nprovincia']);

$c = new Login();
$c = $c->VerificaContribuyente();

if(isset($_POST["proceso"]) and $_POST["proceso"]=="savegeneral")
{
$reg = $tra->RegistrarDatosGenerales();
exit;
}
elseif(isset($_POST["proceso"]) and $_POST["proceso"]=="updategeneral")
{
$reg = $tra->ActualizarDatosGenerales();
exit;
}
elseif(isset($_POST["proceso"]) and $_POST["proceso"]=="saveactividades")
{
$reg = $tra->RegistrarActividad();
exit;
}
elseif(isset($_POST["proceso"]) and $_POST["proceso"]=="updateactividades")
{
$reg = $tra->ActualizarActividad();
exit;
}
elseif(isset($_POST["proceso"]) and $_POST["proceso"]=="saveproducto")
{
$reg = $tra->RegistrarProducto();
exit;
}
elseif(isset($_POST["proceso"]) and $_POST["proceso"]=="updateproducto")
{
$reg = $tra->ActualizarProducto();
exit;
} 
elseif(isset($_POST["proceso"]) and $_POST["proceso"]=="savemateria")
{
$reg = $tra->RegistrarMateriaPrima();
exit;
}
elseif(isset($_POST["proceso"]) and $_POST["proceso"]=="updatemateria")
{
$reg = $tra->ActualizarMateriaPrima();
exit;
}   
elseif(isset($_POST["proceso"]) and $_POST["proceso"]=="saveinsumo")
{
$reg = $tra->RegistrarInsumo();
exit;
}
elseif(isset($_POST["proceso"]) and $_POST["proceso"]=="updateinsumo")
{
$reg = $tra->ActualizarInsumo();
exit;
}   
elseif(isset($_POST["proceso"]) and $_POST["proceso"]=="saveserviciobasico")
{
$reg = $tra->RegistrarServicioBasico();
exit;
}
elseif(isset($_POST["proceso"]) and $_POST["proceso"]=="updateserviciobasico")
{
$reg = $tra->ActualizarServicioBasico();
exit;
}      
elseif(isset($_POST["proceso"]) and $_POST["proceso"]=="savecombustible")
{
$reg = $tra->RegistrarCombustible();
exit;
}
elseif(isset($_POST["proceso"]) and $_POST["proceso"]=="updatecombustible")
{
$reg = $tra->ActualizarCombustible();
exit;
}      
elseif(isset($_POST["proceso"]) and $_POST["proceso"]=="saveotros")
{
$reg = $tra->RegistrarOtrosServicios();
exit;
}
elseif(isset($_POST["proceso"]) and $_POST["proceso"]=="updateotros")
{
$reg = $tra->ActualizarOtrosServicios();
exit;
}     
elseif(isset($_POST["proceso"]) and $_POST["proceso"]=="savedevengados")
{
$reg = $tra->RegistrarEgresosDevengados();
exit;
}
elseif(isset($_POST["proceso"]) and $_POST["proceso"]=="updatedevengados")
{
$reg = $tra->ActualizarEgresosDevengados();
exit;
}      
elseif(isset($_POST["proceso"]) and $_POST["proceso"]=="savesituacion")
{
$reg = $tra->RegistrarSituacionPlanta();
exit;
}
elseif(isset($_POST["proceso"]) and $_POST["proceso"]=="updatesituacion")
{
$reg = $tra->ActualizarSituacionPlanta();
exit;
}        
elseif(isset($_POST["proceso"]) and $_POST["proceso"]=="savemotivo")
{
$reg = $tra->RegistrarMotivoOciosidad();
exit;
}
elseif(isset($_POST["proceso"]) and $_POST["proceso"]=="updatemotivo")
{
$reg = $tra->ActualizarMotivoOciosidad();
exit;
}         
elseif(isset($_POST["proceso"]) and $_POST["proceso"]=="savepersonal")
{
$reg = $tra->RegistrarPersonalOcupado();
exit;
}
elseif(isset($_POST["proceso"]) and $_POST["proceso"]=="updatepersonal")
{
$reg = $tra->ActualizarPersonalOcupado();
exit;
}         
elseif(isset($_POST["proceso"]) and $_POST["proceso"]=="saveventas")
{
$reg = $tra->RegistrarVentas();
exit;
}
elseif(isset($_POST["proceso"]) and $_POST["proceso"]=="updateventas")
{
$reg = $tra->ActualizarVentas();
exit;
}            
elseif(isset($_POST["proceso"]) and $_POST["proceso"]=="savefacturacion")
{
$reg = $tra->RegistrarFacturacion();
exit;
}
elseif(isset($_POST["proceso"]) and $_POST["proceso"]=="updatefacturacion")
{
$reg = $tra->ActualizarFacturacion();
exit;
}            
elseif(isset($_POST["proceso"]) and $_POST["proceso"]=="saveefluente")
{
$reg = $tra->RegistrarEfluente();
exit;
}
elseif(isset($_POST["proceso"]) and $_POST["proceso"]=="updateefluente")
{
$reg = $tra->ActualizarEfluente();
exit;
}             
elseif(isset($_POST["proceso"]) and $_POST["proceso"]=="savecertificado")
{
$reg = $tra->RegistrarCertificado();
exit;
}
elseif(isset($_POST["proceso"]) and $_POST["proceso"]=="updatecertificado")
{
$reg = $tra->ActualizarCertificado();
exit;
}             
elseif(isset($_POST["proceso"]) and $_POST["proceso"]=="savesistema")
{
$reg = $tra->RegistrarSistema();
exit;
}
elseif(isset($_POST["proceso"]) and $_POST["proceso"]=="updatesistema")
{
$reg = $tra->ActualizarSistema();
exit;
}            
elseif(isset($_POST["proceso"]) and $_POST["proceso"]=="savepromocion")
{
$reg = $tra->RegistrarPromociones();
exit;
}
elseif(isset($_POST["proceso"]) and $_POST["proceso"]=="updatepromocion")
{
$reg = $tra->ActualizarPromociones();
exit;
}             
elseif(isset($_POST["proceso"]) and $_POST["proceso"]=="saveeconomia")
{
$reg = $tra->RegistrarEconomia();
exit;
}
elseif(isset($_POST["proceso"]) and $_POST["proceso"]=="updateeconomia")
{
$reg = $tra->ActualizarEconomia();
exit;
}     
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Ing. Ruben Chirinos">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title></title>

    <!-- Menu CSS -->
    <link href="assets/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="assets/plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- Datatables CSS -->
    <link href="assets/plugins/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Sweet-Alert -->
    <link rel="stylesheet" href="assets/css/sweetalert.css">
    <!-- animation CSS -->
    <link href="assets/css/animate.css" rel="stylesheet">
    <!-- needed css -->
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="assets/css/default.css" id="theme" rel="stylesheet">
    <!--Bootstrap Horizontal CSS -->
    <link href="assets/css/bootstrap-horizon.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body onLoad="muestraReloj()" class="fix-header">
    
   <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>

    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-boxed-layout="full" data-boxed-layout="boxed" data-header-position="fixed" data-sidebar-position="fixed" class="mini-sidebar"> 
                   
    

    <!-- Moodal Ver Detalle Actividad -->
    <div id="MyModalDetalleActividad" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h4 class="modal-title text-white" id="myModalLabel"><i class="fa fa-align-justify"></i> Detalle de Actividad</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="assets/images/close.png"/></button>
                </div>
                <div class="modal-body">

                    <div id="muestradetalleactividadmodal"></div> 

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
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="assets/images/close.png"/></button>
                </div>
            
        <form class="form form-material" name="saveactividad" id="saveactividad" action="#">

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
                        <input type="hidden" name="seccionactividad" id="seccionactividad" value="<?php echo encrypt('2'); ?>">
                        <input type="hidden" name="proceso" id="actividad" value="saveactividades"/>
                        <input type="hidden" name="id_rel_industria_actividad" id="id_rel_industria_actividad">
                        <input type="hidden" name="id_industria" id="id_industria">
                        <input type="hidden" name="id_actividad" id="id_actividad"/>
                        <input type="text" class="form-control" name="search_codigo" id="search_codigo" placeholder="Realice la búsqueda de Actividad por Código" autocomplete="off" required="" aria-required="true"/> 
                        <i class="fa fa-search form-control-feedback"></i> 
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label class="control-label">Buscar por Descripción: <span class="symbol required"></span></label>
                        <input type="text" class="form-control" name="search_descripcion" id="search_descripcion" placeholder="Realice la búsqueda de Actividad por Descripción" autocomplete="off" required="" aria-required="true"/>  
                        <i class="fa fa-search form-control-feedback"></i> 
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group has-feedback">
                        <label class="control-label">Detalle de la Actividad Seleccionada: <span class="symbol required"></span></label>
                        <input type="text" class="form-control" name="detalle_actividad" id="detalle_actividad" placeholder="Detalle de Actividad Seleccionada" disabled="" autocomplete="off" required="" aria-required="true"/> 
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
                        <input type="text" class="form-control calendariomodal" name="fecha_inicio" id="fecha_inicio" placeholder="Ingrese Fecha de Inicio" autocomplete="off" required="" aria-required="true"/> 
                        <i class="fa fa-calendar form-control-feedback"></i> 
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label class="control-label">Es Actividad Principal: <span class="symbol required"></span></label>
                        <i class="fa fa-bars form-control-feedback"></i>
                        <select class="form-control" id="es_actividad_principal" name="es_actividad_principal" required="" aria-required="true">
                            <option value=""> -- SELECCIONE -- </option>
                            <option value="SI">SI</option>
                            <option value="NO">NO</option>
                        </select> 
                    </div>
                </div>
            </div>

        </div>
                
        <div class="modal-footer">
            <button type="submit" name="btn-actividad" id="btn-actividad" class="btn btn-danger"><span class="fa fa-save"></span> Guardar y Cerrar</button>
    <button class="btn btn-dark" type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="
                document.getElementById('actividad').value = 'saveactividades',
                document.getElementById('id_industria').value = '',
                document.getElementById('id_rel_industria_actividad').value = '',
                document.getElementById('id_actividad').value = '',
                document.getElementById('search_codigo').value = '',
                document.getElementById('search_descripcion').value = '',
                document.getElementById('detalle_actividad').value = '',
                document.getElementById('observacion').value = '',
                document.getElementById('fecha_inicio').value = '',
                document.getElementById('es_actividad_principal').value = ''
                "><span class="fa fa-trash-o"></span> Cancelar</button>
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
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="assets/images/close.png"/></button>
                </div>
            
        <form class="form form-material" name="saveasignacionproducto" id="saveasignacionproducto" action="#">

        <div class="modal-body">

            <h3 class="card-subtitle text-muted"><i class="fa fa-cube"></i> Asignar Producto</h3><hr>

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
                        <input type="hidden" name="seccionactividad" id="seccionactividad" value="<?php echo encrypt('2'); ?>">
                        <input type="hidden" name="proceso" id="asignaproducto" value="saveproducto"/>
                        <input type="hidden" name="id_rel_actividad_productos" id="id_rel_actividad_productos">
                        <input type="hidden" name="anio_producto" id="anio_producto">
                        <input type="hidden" name="id_rel_industria_actividad" id="id_asignacion_producto">
                        <input type="hidden" name="id_producto" id="id_producto"/>
                        <input type="text" class="form-control" name="search_producto" id="search_producto" placeholder="Realice la Búsqueda de Producto o Ingrese Descripción" autocomplete="off" required="" aria-required="true"/> 
                        <i class="fa fa-search form-control-feedback"></i> 
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-4">
                    <div class="form-group has-feedback">
                        <label class="control-label">Unidad de Medida: <span class="symbol required"></span></label>
                        <i class="fa fa-bars form-control-feedback"></i>
                        <select class="form-control" id="medida_producto" name="medida_producto" required="" aria-required="true">
                        <option value=""> -- SELECCIONE -- </option>
                        <?php
                        $unidad = new Login();
                        $unidad = $unidad->ListarUnidadesMedida();
                        if($unidad==""){ 
                            echo "";
                        } else {
                        for($i=0;$i<sizeof($unidad);$i++){ ?>
                        <option value="<?php echo $unidad[$i]['id_unidad_de_medida'] ?>"><?php echo $unidad[$i]['descripcion'] ?></option>
                        <?php } } ?>
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

            <h3 class="card-subtitle text-muted"><i class="fa fa-file-text"></i> Ventas (Consignar el dato en Unidades)</h3><hr>

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

            <h3 class="card-subtitle m-0"><i class="fa fa-tasks"></i> Detalles de Productos Asignados</h3><hr>

            <div id="div_productos"></div>

        </div>
        

        <div class="modal-footer">
            <button type="submit" name="btn-asignaproducto" id="btn-asignaproducto" class="btn btn-danger"><span class="fa fa-save"></span> Guardar</button>
    <button class="btn btn-dark" type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="
                document.getElementById('asignaproducto').value = 'saveproducto',
                document.getElementById('id_rel_actividad_productos').value = '',
                document.getElementById('id_asignacion_producto').value = '',
                document.getElementById('anio_producto').value = '',
                document.getElementById('id_producto').value = '',
                document.getElementById('search_producto').value = '',
                document.getElementById('medida_producto').value = '',
                document.getElementById('cantidad_producida').value = '',
                document.getElementById('porcentaje_sobre_produccion').value = '',
                document.getElementById('ventas_en_provincia').value = '',
                document.getElementById('ventas_en_otras_provincias').value = '',
                document.getElementById('ventas_internacionales').value = ''
                "><span class="fa fa-trash-o"></span> Cancelar</button>
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
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="assets/images/close.png"/></button>
            </div>
            
        <form class="form form-material" name="saveasignacionmateria" id="saveasignacionmateria" action="#">
                
       <div class="modal-body">

            <h3 class="card-subtitle text-muted"><i class="fa fa-cube"></i> Asignar Materia Prima</h3><hr>

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
                    <div class="form-group has-feedback">
                    <label class="control-label">Descripción de Producto: <span class="symbol required"></span></label>
                    <br /><abbr title="Descripción de Producto"><label id="nomproducto"></label></abbr>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <label class="control-label">Materia Prima Utilizada: <span style="cursor: pointer;" class="mdi mdi-alert-circle text-danger" data-container="body" title="Notificación: Ingrese Nombre de Materia Prima y seleccione en el Listado que se mostrará, en caso de no aparecer, escribala y el sistema se encargará de la asignación del mismo."></span><span class="symbol required"></span></label>
                    <div class="form-group has-feedback">
                        <input type="hidden" name="seccionactividad" id="seccionactividad" value="<?php echo encrypt('2'); ?>">
                        <input type="hidden" name="proceso" id="asignamateria" value="savemateria"/>
                        <input type="hidden" name="id_rel_actividad_productos" id="id_asignacion_materia">
                        <input type="hidden" name="id_rel_actividad_productos_materia_prima" id="id_rel_actividad_productos_materia_prima">
                        <input type="hidden" name="anio_materia" id="anio_materia">
                        <input type="hidden" name="id_materia_prima" id="id_materia_prima"/>
                        <input type="text" class="form-control" name="search_materia" id="search_materia" placeholder="Realice la Búsqueda de Materia Prima o Ingrese Descripción" autocomplete="off" required="" aria-required="true"/> 
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
                        <?php
                        $unidad = new Login();
                        $unidad = $unidad->ListarUnidadesMedida();
                        if($unidad==""){ 
                            echo "";
                        } else {
                        for($i=0;$i<sizeof($unidad);$i++){ ?>
                        <option value="<?php echo $unidad[$i]['id_unidad_de_medida'] ?>"><?php echo $unidad[$i]['descripcion'] ?></option>
                        <?php } } ?>
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
                        <select class="form-control" id="es_propio_materia" name="es_propio_materia" required="" aria-required="true">
                        <option value=""> -- SELECCIONE -- </option>
                        <option value="PROPIA">PROPIA</option>
                        <option value="ADQUIRIDA">ADQUIRIDA</option>
                        </select>  
                    </div>
                </div>
            </div>

            <h3 class="card-subtitle text-muted"><i class="fa fa-file-text"></i> Origen de la Materia Prima</h3>
            <span class="card-subtitle text-muted">En caso de que la Provincia sea diferente a La Rioja, deberá de seleccionar el Motivo y Detalles de la Importación</span><hr>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label class="control-label">Nombre de Pais: <span style="cursor: pointer;" class="mdi mdi-alert-circle text-danger" data-container="body" title="Notificación: Ingrese Nombre de Pais y seleccione en el Listado que se mostrará, en caso de no aparecer, escribala y el sistema se encargará de la asignación del mismo."></span><span class="symbol required"></span></label>
                        <input type="hidden" name="id_pais" id="id_pais"/>
                        <input type="text" class="form-control" name="search_pais" id="search_pais" placeholder="Ingrese Nombre de Pais" autocomplete="off" required="" aria-required="true"/>  
                        <i class="fa fa-search form-control-feedback"></i> 
                    </div>
                </div>  

                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label class="control-label">Nombre de Provincia: <span style="cursor: pointer;" class="mdi mdi-alert-circle text-danger" data-container="body" title="Notificación: Ingrese Nombre de Provincia y seleccione en el Listado que se mostrará, en caso de no aparecer, escribala y el sistema se encargará de la asignación del mismo."></span><span class="symbol required"></span></label>
                        <input type="hidden" name="id_provincia" id="id_provincia"/>
                        <input type="text" class="form-control" name="search_provincia" id="search_provincia" placeholder="Ingrese Nombre de Provincia" autocomplete="off" required="" aria-required="true"/>  
                        <i class="fa fa-search form-control-feedback"></i> 
                    </div>
                </div>
            </div>

            <div class="row">       
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label class="control-label">Nombre de Localidad: <span style="cursor: pointer;" class="mdi mdi-alert-circle text-danger" data-container="body" title="Notificación: Ingrese Nombre de Localidad y seleccione en el Listado que se mostrará, en caso de no aparecer, escribala y el sistema se encargará de la asignación del mismo."></span><span class="symbol required"></span></label>
                        <input type="hidden" name="id_localidad3" id="id_localidad3"/>
                        <input type="text" class="form-control" name="search_localidad3" id="search_localidad3" placeholder="Ingrese Nombre de Localidad" autocomplete="off" required="" aria-required="true"/>  
                        <i class="fa fa-search form-control-feedback"></i> 
                    </div>
                </div>  

                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label class="control-label">Motivo de la Importación: </label>
                        <i class="fa fa-bars form-control-feedback"></i>
                        <select class="form-control" id="motivo_importacion_materia" name="motivo_importacion_materia" onchange="MotivoImportacionMateria();" required="" aria-required="true">
                        <option value=""> -- SELECCIONE -- </option>
                        <?php
                        $motivo = new Login();
                        $motivo = $motivo->ListarMotivosImportacion();
                        if($motivo==""){ 
                            echo "";
                        } else {
                            for($i=0;$i<sizeof($motivo);$i++){ ?>
                                <option value="<?php echo $motivo[$i]['id_motivo_importacion'] ?>"><?php echo $motivo[$i]['descripcion'] ?></option>
                            <?php } } ?>
                        </select> 
                    </div>
                </div>                      
            </div>

            <div class="row">
                <div class="col-md-12"> 
                    <div class="form-group has-feedback2"> 
                    <label class="control-label">Detalle el Motivo por el cual Importa la materia Prima: </label> 
                    <textarea class="form-control" type="text" name="detalles_materia" id="detalles_materia" autocomplete="off" placeholder="Ingrese Detalle el Motivo por el cual Importa la materia Prima" disabled="disabled"></textarea>
                    <i class="fa fa-comment-o form-control-feedback2"></i> 
                    </div>   
                </div>
            </div>

            <h3 class="card-subtitle m-0"><i class="fa fa-tasks"></i> Detalles de Materia Prima Asignadas</h3><hr>

            <div id="div_materiaprima"></div>

        </div>

            <div class="modal-footer">
                <button type="submit" name="btn-asignamateria" id="btn-asignamateria" class="btn btn-danger"><span class="fa fa-save"></span> Guardar</button>
            <button class="btn btn-dark" type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="
                document.getElementById('asignamateria').value = 'savemateria',
                document.getElementById('id_asignacion_materia').value = '',
                document.getElementById('anio_materia').value = '',
                document.getElementById('id_producto').value = '',
                document.getElementById('id_materia_prima').value = '',
                document.getElementById('search_materia').value = '',
                document.getElementById('medida_materia').value = '',
                document.getElementById('cantidad_materia').value = '',
                document.getElementById('es_propio_materia').value = '',
                document.getElementById('id_pais').value = '',    
                document.getElementById('search_pais').value = '',  
                document.getElementById('id_provincia').value = '',                  
                document.getElementById('search_provincia').value = '',
                document.getElementById('id_localidad3').value = '',    
                document.getElementById('search_localidad3').value = '',
                document.getElementById('motivo_importacion_materia').value = '',
                document.getElementById('detalles_materia').value = ''
                "><span class="fa fa-trash-o"></span> Cancelar</button>
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
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="assets/images/close.png"/></button>
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
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="assets/images/close.png"/></button>
            </div>
            
        <form class="form form-material" name="saveasignacioninsumo" id="saveasignacioninsumo" action="#">
                
       <div class="modal-body">

            <h3 class="card-subtitle text-muted"><i class="fa fa-cube"></i> Asignar Insumo</h3><hr>

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
                        <input type="hidden" name="seccioninsumo" id="seccioninsumo" value="<?php echo encrypt('3'); ?>">
                        <input type="hidden" name="proceso" id="insumo" value="saveinsumo"/>
                        <input type="hidden" name="id_rel_industria_insumos" id="id_rel_industria_insumos">
                        <input type="hidden" name="industria_insumo" id="industria_insumo">
                        <input type="hidden" name="anio_insumo" id="anio_insumo">
                        <input type="hidden" name="id_insumo" id="id_insumo"/>
                        <input type="text" class="form-control" name="search_insumo" id="search_insumo" placeholder="Realice la Búsqueda de Insumos o Ingrese Descripción" autocomplete="off" required="" aria-required="true"/> 
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
                        <?php
                        $unidad = new Login();
                        $unidad = $unidad->ListarUnidadesMedida();
                        if($unidad==""){ 
                            echo "";
                        } else {
                        for($i=0;$i<sizeof($unidad);$i++){ ?>
                        <option value="<?php echo $unidad[$i]['id_unidad_de_medida'] ?>"><?php echo $unidad[$i]['descripcion'] ?></option>
                        <?php } } ?>
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
                        <select class="form-control" id="es_propio_insumo" name="es_propio_insumo" required="" aria-required="true">
                        <option value=""> -- SELECCIONE -- </option>
                        <option value="PROPIA">PROPIA</option>
                        <option value="ADQUIRIDA">ADQUIRIDA</option>
                        </select>  
                    </div>
                </div>
            </div>

            <h3 class="card-subtitle text-muted"><i class="fa fa-file-text"></i> Origen del Insumo</h3>
            <span class="card-subtitle text-muted">En caso de que la Provincia sea diferente a La Rioja, deberá de seleccionar el Motivo y Detalles de la Importación</span><hr>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label class="control-label">Nombre de Pais: <span style="cursor: pointer;" class="mdi mdi-alert-circle text-danger" data-container="body" title="Notificación: Ingrese Nombre de Pais y seleccione en el Listado que se mostrará, en caso de no aparecer, escribala y el sistema se encargará de la asignación del mismo."></span><span class="symbol required"></span></label>
                        <input type="hidden" name="id_pais2" id="id_pais2"/>
                        <input type="text" class="form-control" name="search_pais2" id="search_pais2" placeholder="Ingrese Nombre de Pais" autocomplete="off" required="" aria-required="true"/>  
                        <i class="fa fa-search form-control-feedback"></i> 
                    </div>
                </div>  

                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label class="control-label">Nombre de Provincia: <span style="cursor: pointer;" class="mdi mdi-alert-circle text-danger" data-container="body" title="Notificación: Ingrese Nombre de Provincia y seleccione en el Listado que se mostrará, en caso de no aparecer, escribala y el sistema se encargará de la asignación del mismo."></span><span class="symbol required"></span></label>
                        <input type="hidden" name="id_provincia2" id="id_provincia2"/>
                        <input type="text" class="form-control" name="search_provincia2" id="search_provincia2" placeholder="Ingrese Nombre de Provincia" autocomplete="off" required="" aria-required="true"/>  
                        <i class="fa fa-search form-control-feedback"></i> 
                    </div>
                </div>
            </div>

            <div class="row">       
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label class="control-label">Nombre de Localidad: <span style="cursor: pointer;" class="mdi mdi-alert-circle text-danger" data-container="body" title="Notificación: Ingrese Nombre de Localidad y seleccione en el Listado que se mostrará, en caso de no aparecer, escribala y el sistema se encargará de la asignación del mismo."></span><span class="symbol required"></span></label>
                        <input type="hidden" name="id_localidad4" id="id_localidad4"/>
                        <input type="text" class="form-control" name="search_localidad4" id="search_localidad4" placeholder="Ingrese Nombre de Localidad" autocomplete="off" required="" aria-required="true"/>  
                        <i class="fa fa-search form-control-feedback"></i> 
                    </div>
                </div>  

                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label class="control-label">Motivo de la Importación: </label>
                        <i class="fa fa-bars form-control-feedback"></i>
                        <select class="form-control" id="motivo_importacion_insumo" name="motivo_importacion_insumo" onchange="MotivoImportacionInsumo();" required="" aria-required="true">
                        <option value=""> -- SELECCIONE -- </option>
                        <?php
                        $motivo = new Login();
                        $motivo = $motivo->ListarMotivosImportacion();
                        if($motivo==""){ 
                            echo "";
                        } else {
                            for($i=0;$i<sizeof($motivo);$i++){ ?>
                                <option value="<?php echo $motivo[$i]['id_motivo_importacion'] ?>"><?php echo $motivo[$i]['descripcion'] ?></option>
                            <?php } } ?>
                        </select> 
                    </div>
                </div>                      
            </div>

            <div class="row">
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
            <button class="btn btn-dark" type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="
                document.getElementById('insumo').value = 'saveinsumo',
                document.getElementById('industria_insumo').value = '',
                document.getElementById('anio_insumo').value = '',
                document.getElementById('id_insumo').value = '',
                document.getElementById('search_insumo').value = '',
                document.getElementById('medida_insumo').value = '',
                document.getElementById('cantidad_insumo').value = '',
                document.getElementById('es_propio_insumo').value = '',
                document.getElementById('id_pais2').value = '',    
                document.getElementById('search_pais2').value = '',  
                document.getElementById('id_provincia2').value = '',                  
                document.getElementById('search_provincia2').value = '',
                document.getElementById('id_localidad4').value = '',    
                document.getElementById('search_localidad4').value = '',
                document.getElementById('motivo_importacion_insumo').value = '',
                document.getElementById('detalles_insumo').value = ''
                "><span class="fa fa-trash-o"></span> Cancelar</button>
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
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="assets/images/close.png"/></button>
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
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="assets/images/close.png"/></button>
            </div>
            
        <form class="form form-material" name="saveserviciobasico" id="saveserviciobasico" action="#">
                
       <div class="modal-body">

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group has-feedback">
                    <input type="hidden" name="seccionserviciobasico" id="seccionserviciobasico" value="<?php echo encrypt('3'); ?>">
                    <input type="hidden" name="proceso" id="serviciobasico" value="saveserviciobasico"/>
                    <input type="hidden" name="industria_servicio_basico" id="industria_servicio_basico">
                    <input type="hidden" name="anio_basico" id="anio_basico">
                    <input type="hidden" name="zona_local" id="zona_local">
                    <label class="control-label">Descripción de Industria: <span class="symbol required"></span></label>
                    <br /><abbr title="Descripción de Industria"><label id="nombre_de_fantasia"></label></abbr>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table id="default_order" class="table2 display">
                    <thead>
                    <tr role="row">
                    <th>Servicio Básico <span class="symbol required"></span></th>
                    <th>Total Consumo Anual <span class="symbol required"></span></th>
                    <th>Importe Total Anual <span class="symbol required"></span></th>
                    </tr>
                    </thead>
                    <tbody>
            <?php 
            $basico = new Login();
            $basico = $basico->ListarServiciosBasicos();
            if($basico==""){
                echo "";    
            } else {
            $a=1;
            for($i=0;$i<sizeof($basico);$i++){ 
            ?>
                    <tr role="row" class="odd">
                    <td><input type="hidden" name="id_servicio_basico[]" id="id_servicio_basico" value="<?php echo $basico[$i]['id_servicio']; ?>" /><label><?php echo $basico[$i]['descripcion']; ?></label></td>

                    <td class="text-center"><input type="te" class="form-control" name="cantidad_basica[]" id="cantidad_basica" value="1" placeholder="Ingrese Total Consumo Anual" autocomplete="off" style="width:100%;height:40px;background:#f0f9fc;border-radius:5px 5px 5px 5px;" disabled="disabled"></td>

                    <td class="text-center"><input type="text" class="form-control" name="costo_basico[]" id="costo_basico" placeholder="Ingrese Importe Total Anual" autocomplete="off" onKeyPress="EvaluateText('%f', this);" onBlur="this.value = Number_Format(this.value, '2', ',', '.')" style="width:100%;height:40px;background:#f0f9fc;border-radius:5px 5px 5px 5px;"></td>
                    </tr>
            <?php } } ?>
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
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="assets/images/close.png"/></button>
            </div>
            
        <form class="form form-material" name="updateserviciobasico" id="updateserviciobasico" action="#">
                
       <div class="modal-body">

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group has-feedback">
                    <input type="hidden" name="seccionserviciobasicoupdate" id="seccionserviciobasicoupdate" value="<?php echo encrypt('3'); ?>">
                    <input type="hidden" name="proceso" id="serviciobasicoupdate" value="updateserviciobasico"/>
                    <input type="hidden" name="id_rel_industria_servicios_basicos" id="id_rel_industria_servicios_basicos">
                    <input type="hidden" name="industria_servicio_basico_update" id="industria_servicio_basico_update">
                    <input type="hidden" name="anio_basico_update" id="anio_basico_update">
                    <label class="control-label">Descripción de Industria: <span class="symbol required"></span></label>
                    <br /><abbr title="Descripción de Industria"><label id="nombre_de_fantasia"></label></abbr>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table id="default_order" class="table2 display">
                    <thead>
                    <tr role="row">
                    <th>Servicio Básico <span class="symbol required"></span></th>
                    <th>Total Consumo Anual <span class="symbol required"></span></th>
                    <th>Importe Total Anual <span class="symbol required"></span></th>
                    </tr>
                    </thead>
                    <tbody>
        
                    <tr role="row" class="odd">
                    <td><label id="nombre_servicio"></label></td>

                    <td class="text-center"><input type="te" class="form-control" name="cantidad_servicio" id="cantidad_servicio" value="1" placeholder="Ingrese Total Consumo Anual" autocomplete="off" style="width:100%;height:40px;background:#f0f9fc;border-radius:5px 5px 5px 5px;" disabled="disabled"></td>

                    <td class="text-center"><input type="text" class="form-control" name="costo_servicio" id="costo_servicio" placeholder="Ingrese Importe Total Anual" autocomplete="off" onKeyPress="EvaluateText('%f', this);" onBlur="this.value = Number_Format(this.value, '2', ',', '.')" style="width:100%;height:40px;background:#f0f9fc;border-radius:5px 5px 5px 5px;"></td>
                    </tr>
                    </tbody>
                </table>
            </div>

        </div>

            <div class="modal-footer">
                <button type="submit" name="btn-serviciobasicoupdate" id="btn-serviciobasicoupdate" class="btn btn-danger"><span class="fa fa-edit"></span> Actualizar</button>
            <button class="btn btn-dark" type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="
                document.getElementById('id_rel_industria_servicios_basicos').value = '',
                document.getElementById('anio_basico_update').value = '',
                document.getElementById('cantidad_servicio').value = '1',
                document.getElementById('costo_servicio').value = ''
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
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="assets/images/close.png"/></button>
            </div>
            
        <form class="form form-material" name="savecombustible" id="savecombustible" action="#">
                
       <div class="modal-body">

            <h3 class="card-subtitle text-muted"><i class="fa fa-cube"></i> Asignar Combustible</h3><hr>

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
                        <input type="hidden" name="seccioncombustible" id="seccioncombustible" value="<?php echo encrypt('3'); ?>">
                        <input type="hidden" name="proceso" id="combustibles" value="savecombustible"/>
                        <input type="hidden" name="id_rel_industria_combustible" id="id_rel_industria_combustible">
                        <input type="hidden" name="industria_combustible" id="industria_combustible">
                        <input type="hidden" name="anio_combustible" id="anio_combustible">
                        <select class="form-control" id="id_servicio_combustible" name="id_servicio_combustible"  required="" aria-required="true">
                        <option value=""> -- SELECCIONE -- </option>
                        <?php
                        $combustible = new Login();
                        $combustible = $combustible->ListarCombustibles();
                        if($combustible==""){ 
                            echo "";
                        } else {
                            for($i=0;$i<sizeof($combustible);$i++){ ?>
                                <option value="<?php echo $combustible[$i]['id_servicio'] ?>"><?php echo $combustible[$i]['descripcion'] ?></option>
                            <?php } } ?>
                        </select> 
                    </div>
                </div>   

                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label class="control-label">Unidad de Medida: <span class="symbol required"></span></label>
                        <i class="fa fa-bars form-control-feedback"></i>
                        <select class="form-control" id="medida_combustible" name="medida_combustible" required="" aria-required="true">
                        <option value=""> -- SELECCIONE -- </option>
                        <?php
                        $unidad = new Login();
                        $unidad = $unidad->ListarUnidadesMedida();
                        if($unidad==""){ 
                            echo "";
                        } else {
                        for($i=0;$i<sizeof($unidad);$i++){ ?>
                        <option value="<?php echo $unidad[$i]['id_unidad_de_medida'] ?>"><?php echo $unidad[$i]['descripcion'] ?></option>
                        <?php } } ?>
                        </select> 
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-4">
                    <div class="form-group has-feedback">
                        <label class="control-label">Frecuencia de Contratación: <span class="symbol required"></span></label>
                        <input type="text" class="form-control" name="frecuencia_combustible" id="frecuencia_combustible" placeholder="Ingrese Frecuencia de Contratación" autocomplete="off" value="ANUAL" style="background:#f0f9fc;" disabled="disabled" required="" aria-required="true">
                        <i class="fa fa-pencil form-control-feedback"></i> 
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group has-feedback">
                        <label class="control-label">Cantidad de Veces en la Frecuencia: <span class="symbol required"></span></label>
                        <input type="text" class="form-control" name="cantidad_combustible" id="cantidad_combustible" placeholder="Ingrese Cantidad de Veces" autocomplete="off" value="1" style="background:#f0f9fc;"disabled="disabled" required="" aria-required="true">
                        <i class="fa fa-pencil form-control-feedback"></i> 
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group has-feedback">
                        <label class="control-label">Costo Involucrado para la Frecuencia: <span class="symbol required"></span></label>
                        <input type="text" class="form-control" name="costo_combustible" id="costo_combustible" placeholder="Ingrese Costo en Combustible" autocomplete="off" onKeyPress="EvaluateText('%f', this);" onBlur="this.value = NumberFormat(this.value, '2', '.', '')" required="" aria-required="true">
                        <i class="fa fa-tint form-control-feedback"></i> 
                    </div>
                </div>
            </div>

            <h3 class="card-subtitle text-muted"><i class="fa fa-file-text"></i> Origen del Combustible</h3>
            <span class="card-subtitle text-muted">En caso de que la Provincia sea diferente a La Rioja, deberá de seleccionar el Motivo y Detalles de la Importación</span><hr>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label class="control-label">Nombre de Pais: <span style="cursor: pointer;" class="mdi mdi-alert-circle text-danger" data-container="body" title="Notificación: Ingrese Nombre de Pais y seleccione en el Listado que se mostrará, en caso de no aparecer, escribala y el sistema se encargará de la asignación del mismo."></span><span class="symbol required"></span></label>
                        <input type="hidden" name="id_pais3" id="id_pais3"/>
                        <input type="text" class="form-control" name="search_pais3" id="search_pais3" placeholder="Ingrese Nombre de Pais" autocomplete="off" required="" aria-required="true"/>  
                        <i class="fa fa-search form-control-feedback"></i> 
                    </div>
                </div>  

                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label class="control-label">Nombre de Provincia: <span style="cursor: pointer;" class="mdi mdi-alert-circle text-danger" data-container="body" title="Notificación: Ingrese Nombre de Provincia y seleccione en el Listado que se mostrará, en caso de no aparecer, escribala y el sistema se encargará de la asignación del mismo."></span><span class="symbol required"></span></label>
                        <input type="hidden" name="id_provincia3" id="id_provincia3"/>
                        <input type="text" class="form-control" name="search_provincia3" id="search_provincia3" placeholder="Ingrese Nombre de Provincia" autocomplete="off" required="" aria-required="true"/>  
                        <i class="fa fa-search form-control-feedback"></i> 
                    </div>
                </div>
            </div>

            <div class="row">       
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label class="control-label">Nombre de Localidad: <span style="cursor: pointer;" class="mdi mdi-alert-circle text-danger" data-container="body" title="Notificación: Ingrese Nombre de Localidad y seleccione en el Listado que se mostrará, en caso de no aparecer, escribala y el sistema se encargará de la asignación del mismo."></span><span class="symbol required"></span></label>
                        <input type="hidden" name="id_localidad5" id="id_localidad5"/>
                        <input type="text" class="form-control" name="search_localidad5" id="search_localidad5" placeholder="Ingrese Nombre de Localidad" autocomplete="off" required="" aria-required="true"/>  
                        <i class="fa fa-search form-control-feedback"></i> 
                    </div>
                </div>  

                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label class="control-label">Motivo de la Importación: </label>
                        <i class="fa fa-bars form-control-feedback"></i>
                        <select class="form-control" id="motivo_importacion_combustible" name="motivo_importacion_combustible" onchange="MotivoImportacionCombustible();" required="" aria-required="true">
                        <option value=""> -- SELECCIONE -- </option>
                        <?php
                        $motivo = new Login();
                        $motivo = $motivo->ListarMotivosImportacion();
                        if($motivo==""){ 
                            echo "";
                        } else {
                            for($i=0;$i<sizeof($motivo);$i++){ ?>
                                <option value="<?php echo $motivo[$i]['id_motivo_importacion'] ?>"><?php echo $motivo[$i]['descripcion'] ?></option>
                            <?php } } ?>
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
            <button class="btn btn-dark" type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="
                document.getElementById('combustibles').value = 'savecombustible',
                document.getElementById('id_rel_industria_combustible').value = '',
                document.getElementById('industria_combustible').value = '',
                document.getElementById('anio_combustible').value = '',
                document.getElementById('id_servicio_combustible').value = '',
                document.getElementById('frecuencia_combustible').value = 'ANUAL',
                document.getElementById('cantidad_combustible').value = '1',
                document.getElementById('costo_combustible').value = '',    
                document.getElementById('id_pais3').value = '',    
                document.getElementById('search_pais3').value = '',  
                document.getElementById('id_provincia3').value = '',                  
                document.getElementById('search_provincia3').value = '',
                document.getElementById('id_localidad5').value = '',    
                document.getElementById('search_localidad5').value = '',
                document.getElementById('motivo_importacion_combustible').value = '',
                document.getElementById('detalles_combustible').value = ''
                "><span class="fa fa-trash-o"></span> Cancelar</button>
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
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="assets/images/close.png"/></button>
            </div>
            
        <form class="form form-material" name="saveotros" id="saveotros" action="#">
                
       <div class="modal-body">

            <h3 class="card-subtitle text-muted"><i class="fa fa-cube"></i> Asignar Otros Servicios</h3><hr>

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
                    <label class="control-label">Servicio Utilizado: <span style="cursor: pointer;" class="mdi mdi-alert-circle text-danger" data-container="body" title="Notificación: Ingrese Nombre de Servicio y seleccione en el Listado que se mostrará, en caso de no aparecer, escribala y el sistema se encargará de la asignación del mismo."></span><span class="symbol required"></span></label>
                    <div class="form-group has-feedback">
                        <input type="hidden" name="seccionotros" id="seccionotros" value="<?php echo encrypt('3'); ?>">
                        <input type="hidden" name="proceso" id="otros" value="saveotros"/>
                        <input type="hidden" name="id_rel_industria_otros" id="id_rel_industria_otros">
                        <input type="hidden" name="industria_otros" id="industria_otros">
                        <input type="hidden" name="anio_otros" id="anio_otros">
                        <input type="hidden" name="id_servicio" id="id_servicio"/>
                        <input type="text" class="form-control" name="search_servicio" id="search_servicio" placeholder="Realice la Búsqueda de Servicio o Ingrese Descripción" autocomplete="off" required="" aria-required="true"/> 
                        <i class="fa fa-search form-control-feedback"></i> 
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-4">
                    <div class="form-group has-feedback">
                        <label class="control-label">Frecuencia de Contratación: <span class="symbol required"></span></label>
                        <i class="fa fa-bars form-control-feedback"></i>
                        <select class="form-control" id="frecuencia_otros" name="frecuencia_otros" required="" aria-required="true">
                        <option value=""> -- SELECCIONE -- </option>
                        <?php
                        $frecuencia = new Login();
                        $frecuencia = $frecuencia->ListarFrecuenciasContratacion();
                        if($frecuencia==""){ 
                            echo "";
                        } else {
                        for($i=0;$i<sizeof($frecuencia);$i++){ ?>
                        <option value="<?php echo $frecuencia[$i]['id_frecuencia_de_contratacion'] ?>"><?php echo $frecuencia[$i]['frecuencia_de_contratacion'] ?></option>
                        <?php } } ?>
                        </select> 
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group has-feedback">
                        <label class="control-label">Cantidad de Veces en la Frecuencia: <span class="symbol required"></span></label>
                        <input type="text" class="form-control" name="cantidad_otros" id="cantidad_otros" placeholder="Ingrese Cantidad de Veces" autocomplete="off" required="" aria-required="true">
                        <i class="fa fa-pencil form-control-feedback"></i> 
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group has-feedback">
                        <label class="control-label">Costo Involucrado para la Frecuencia: <span class="symbol required"></span></label>
                        <input type="text" class="form-control" name="costo_otros" id="costo_otros" placeholder="Ingrese Costo Involucrado en Frecuencia" autocomplete="off" onKeyPress="EvaluateText('%f', this);" onBlur="this.value = NumberFormat(this.value, '2', '.', '')" required="" aria-required="true">
                        <i class="fa fa-tint form-control-feedback"></i> 
                    </div>
                </div>
            </div>

            <h3 class="card-subtitle text-muted"><i class="fa fa-file-text"></i> Origen del Servicio</h3>
            <span class="card-subtitle text-muted">En caso de que la Provincia sea diferente a La Rioja, deberá de seleccionar el Motivo y Detalles de la Importación</span><hr>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label class="control-label">Nombre de Pais: <span style="cursor: pointer;" class="mdi mdi-alert-circle text-danger" data-container="body" title="Notificación: Ingrese Nombre de Pais y seleccione en el Listado que se mostrará, en caso de no aparecer, escribala y el sistema se encargará de la asignación del mismo."></span><span class="symbol required"></span></label>
                        <input type="hidden" name="id_pais4" id="id_pais4" value="<?php echo $codpa; ?>"/>
                        <input type="text" class="form-control" name="search_pais4" id="search_pais4" placeholder="Ingrese Nombre de Pais" autocomplete="off" value="<?php echo $nompa; ?>" required="" aria-required="true"/>  
                        <i class="fa fa-search form-control-feedback"></i> 
                    </div>
                </div>  

                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label class="control-label">Nombre de Provincia: <span style="cursor: pointer;" class="mdi mdi-alert-circle text-danger" data-container="body" title="Notificación: Ingrese Nombre de Provincia y seleccione en el Listado que se mostrará, en caso de no aparecer, escribala y el sistema se encargará de la asignación del mismo."></span><span class="symbol required"></span></label>
                        <input type="hidden" name="id_provincia4" id="id_provincia4" value="<?php echo $codpro; ?>"/>
                        <input type="text" class="form-control" name="search_provincia4" id="search_provincia4" placeholder="Ingrese Nombre de Provincia" autocomplete="off" value="<?php echo $nompro; ?>" required="" aria-required="true"/>  
                        <i class="fa fa-search form-control-feedback"></i> 
                    </div>
                </div>
            </div>

            <div class="row">       
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label class="control-label">Nombre de Localidad: <span style="cursor: pointer;" class="mdi mdi-alert-circle text-danger" data-container="body" title="Notificación: Ingrese Nombre de Localidad y seleccione en el Listado que se mostrará, en caso de no aparecer, escribala y el sistema se encargará de la asignación del mismo."></span><span class="symbol required"></span></label>
                        <input type="hidden" name="id_localidad6" id="id_localidad6"/>
                        <input type="text" class="form-control" name="search_localidad6" id="search_localidad6" placeholder="Ingrese Nombre de Localidad" autocomplete="off" required="" aria-required="true"/>  
                        <i class="fa fa-search form-control-feedback"></i> 
                    </div>
                </div>  

                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label class="control-label">Motivo de la Importación: </label>
                        <i class="fa fa-bars form-control-feedback"></i>
                        <select class="form-control" id="motivo_importacion_otros" name="motivo_importacion_otros" onchange="MotivoImportacionOtros();" required="" aria-required="true">
                        <option value=""> -- SELECCIONE -- </option>
                        <?php
                        $motivo = new Login();
                        $motivo = $motivo->ListarMotivosImportacion();
                        if($motivo==""){ 
                            echo "";
                        } else {
                            for($i=0;$i<sizeof($motivo);$i++){ ?>
                                <option value="<?php echo $motivo[$i]['id_motivo_importacion'] ?>"><?php echo $motivo[$i]['descripcion'] ?></option>
                            <?php } } ?>
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
            <button class="btn btn-dark" type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="
                document.getElementById('otros').value = 'saveotros',
                document.getElementById('id_rel_industria_otros').value = '',
                document.getElementById('anio_otros').value = '',
                document.getElementById('industria_otros').value = '',
                document.getElementById('id_servicio').value = '',
                document.getElementById('search_servicio').value = '',
                document.getElementById('frecuencia_otros').value = '',
                document.getElementById('cantidad_otros').value = '',
                document.getElementById('costo_otros').value = '',    
                document.getElementById('id_pais4').value = '',    
                document.getElementById('search_pais4').value = '',  
                document.getElementById('id_provincia4').value = '',                  
                document.getElementById('search_provincia4').value = '',
                document.getElementById('id_localidad6').value = '',    
                document.getElementById('search_localidad6').value = '',
                document.getElementById('motivo_importacion_otros').value = '',
                document.getElementById('detalles_otros').value = ''
                "><span class="fa fa-trash-o"></span> Cancelar</button>
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
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="assets/images/close.png"/></button>
            </div>
            
        <form class="form form-material" name="savedevengados" id="savedevengados" action="#">
                
               <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group has-feedback">
                            <input type="hidden" name="secciondevengados" id="secciondevengados" value="<?php echo encrypt('3'); ?>">
                            <input type="hidden" name="proceso" id="devengados" value="savedevengados"/>
                            <input type="hidden" name="industria_devengados" id="industria_devengados">
                            <input type="hidden" name="anio_devengado" id="anio_devengado">
                            <input type="hidden" name="zona_devengado" id="zona_devengado">
                            <label class="control-label">Descripción de Industria: <span class="symbol required"></span></label>
                            <br /><abbr title="Descripción de Industria"><label id="nombre_de_fantasia"></label></abbr>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="default_order" class="table2 display">
                            <thead>
                            <tr role="row">
                            <th>Servicios <span class="symbol required"></span></th>
                            <th>Total Consumo Anual <span class="symbol required"></span></th>
                            <th>Importe Total Anual <span class="symbol required"></span></th>
                            </tr>
                            </thead>
                            <tbody>
                    <?php 
                    $devengado = new Login();
                    $devengado = $devengado->ListarEgresosDevengados();
                    if($devengado==""){
                        echo "";    
                    } else {
                    $a=1;
                    for($i=0;$i<sizeof($devengado);$i++){ 
                    ?>
                            <tr role="row" class="odd">
                            <td><input type="hidden" name="id_servicio_devengado[]" id="id_servicio_devengado" value="<?php echo $devengado[$i]['id_servicio']; ?>" /><label><?php echo $devengado[$i]['descripcion']; ?></label></td>

                            <td class="text-center"><input type="text" class="form-control" name="cantidad_devengado[]" id="cantidad_devengado" value="1" placeholder="Ingrese Total Consumo Anual" autocomplete="off" style="width:100%;height:40px;background:#f0f9fc;border-radius:5px 5px 5px 5px;" disabled="disabled"></td>

                            <td class="text-center"><input type="text" class="form-control" name="costo_devengado[]" id="costo_devengado" placeholder="Ingrese Importe Total Anual" autocomplete="off" onKeyPress="EvaluateText('%f', this);" onBlur="this.value = Number_Format(this.value, '2', ',', '.')" style="width:100%;height:40px;background:#f0f9fc;border-radius:5px 5px 5px 5px;"></td>
                            </tr>
                    <?php } } ?>
                            </tbody>
                        </table>
                    </div>

                </div>

            <div class="modal-footer">
                <button type="submit" name="btn-devengados" id="btn-devengados" class="btn btn-danger"><span class="fa fa-save"></span> Guardar</button>
            <button class="btn btn-dark" type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="
                document.getElementById('devengados').value = 'savedevengados',
                document.getElementById('industria_devengados').value = '',
                document.getElementById('anio_devengado').value = '',
                document.getElementById('zona_devengado').value = '',
                document.getElementById('cantidad_devengado').value = '1',
                document.getElementById('costo_devengado').value = ''
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
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="assets/images/close.png"/></button>
            </div>
            
        <form class="form form-material" name="updatedevengados" id="updatedevengados" action="#">
                
       <div class="modal-body">

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group has-feedback">
                    <input type="hidden" name="secciondevengadosupdate" id="secciondevengadosupdate" value="<?php echo encrypt('3'); ?>">
                    <input type="hidden" name="proceso" id="devengadosupdate" value="updatedevengados"/>
                    <input type="hidden" name="id_rel_industria_devengados_update" id="id_rel_industria_devengados_update">
                    <input type="hidden" name="industria_devengados_update" id="industria_devengados_update">
                    <input type="hidden" name="anio_devengado_update" id="anio_devengado_update">
                    <label class="control-label">Descripción de Industria: <span class="symbol required"></span></label>
                    <br /><abbr title="Descripción de Industria"><label id="nombre_de_fantasia"></label></abbr>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table id="default_order" class="table2 display">
                    <thead>
                    <tr role="row">
                    <th>Servicio <span class="symbol required"></span></th>
                    <th>Total Consumo Anual <span class="symbol required"></span></th>
                    <th>Importe Total Anual <span class="symbol required"></span></th>
                    </tr>
                    </thead>
                    <tbody>
        
                    <tr role="row" class="odd">
                    <td><label id="nombre_egreso"></label></td>

                    <td class="text-center"><input type="te" class="form-control" name="cantidad_egreso" id="cantidad_egreso" value="1" placeholder="Ingrese Total Consumo Anual" autocomplete="off" style="width:100%;height:40px;background:#f0f9fc;border-radius:5px 5px 5px 5px;" disabled="disabled"></td>

                    <td class="text-center"><input type="text" class="form-control" name="costo_egreso" id="costo_egreso" placeholder="Ingrese Importe Total Anual" autocomplete="off" onKeyPress="EvaluateText('%f', this);" onBlur="this.value = Number_Format(this.value, '2', ',', '.')" style="width:100%;height:40px;background:#f0f9fc;border-radius:5px 5px 5px 5px;"></td>
                    </tr>
                    </tbody>
                </table>
            </div>

        </div>

            <div class="modal-footer">
                <button type="submit" name="btn-egresosupdate" id="btn-egresosupdate" class="btn btn-danger"><span class="fa fa-edit"></span> Actualizar</button>
            <button class="btn btn-dark" type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="
                document.getElementById('id_rel_industria_devengados_update').value = '',
                document.getElementById('anio_devengado_update').value = '',
                document.getElementById('cantidad_egreso').value = '1',
                document.getElementById('costo_egreso').value = ''
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
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="assets/images/close.png"/></button>
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
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="assets/images/close.png"/></button>
            </div>
            
        <form class="form form-material" name="savesituacion" id="savesituacion" action="#">
                
       <div class="modal-body">

        <h3 class="card-subtitle text-muted"><i class="fa fa-cube"></i> Situación de Planta</h3><hr>

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
                    <input type="hidden" name="seccionsituacion" id="seccionsituacion" value="<?php echo encrypt('4'); ?>">
                    <input type="hidden" name="proceso" id="situacion" value="savesituacion"/>
                    <input type="hidden" name="id_situacion_de_planta" id="id_situacion_de_planta">
                    <input type="hidden" name="industria_situacion" id="industria_situacion">
                    <input type="hidden" name="anio_situacion" id="anio_situacion">
                    <input type="text" class="form-control" name="produccion_sobre_capacidad" id="produccion_sobre_capacidad" placeholder="Ingrese Porcentaje de Producción" onKeyPress="EvaluateText('%f', this);" onBlur="this.value = NumberFormat(this.value, '2', '.', '')" autocomplete="off" required="" aria-required="true"/> 
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

            <div class="col-md-3">
                <div class="form-group has-feedback">
                    <label class="control-label">Importe de Inversión: <span class="symbol required"></span></label>
                    <input type="text" class="form-control" name="inversion_anual" id="inversion_anual" placeholder="Ingrese Importe de Inversión" onKeyPress="EvaluateText('%f', this);" onBlur="this.value = NumberFormat(this.value, '2', '.', '')" autocomplete="off" disabled="" required="" aria-required="true">
                    <i class="fa fa-pencil form-control-feedback"></i> 
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group has-feedback">
                    <label class="control-label">Inversión Activo Fijo: <span class="symbol required"></span></label>
                    <input type="text" class="form-control" name="inversion_activo_fijo" id="inversion_activo_fijo" placeholder="Ingrese Inversión Activo Fijo" onKeyPress="EvaluateText('%f', this);" onBlur="this.value = NumberFormat(this.value, '2', '.', '')" autocomplete="off" disabled="" required="" aria-required="true">
                    <i class="fa fa-pencil form-control-feedback"></i> 
                </div>
            </div>
        </div>

        <h3 class="card-subtitle text-muted"><i class="fa fa-file-text"></i> Capacidad Productiva</h3><hr>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group has-feedback">
                    <label class="control-label">Porcentaje de Capacidad Instalada en Uso de la Planta: <span class="symbol required"></span></label>
                    <input type="text" class="form-control" name="capacidad_instalada" id="capacidad_instalada" placeholder="Ingrese Porcentaje de Capacidad Instalada" onKeyPress="EvaluateText('%f', this);" onBlur="this.value = NumberFormat(this.value, '2', '.', '')" autocomplete="off" required="" aria-required="true"/>  
                    <i class="mdi mdi-percent form-control-feedback"></i> 
                </div>
            </div>  

            <div class="col-md-6">
                <div class="form-group has-feedback">
                    <label class="control-label">Porcentaje de Capacidad Ociosa de la Planta: <span class="symbol required"></span></label>
                    <input type="text" class="form-control" name="capacidad_ociosa" id="capacidad_ociosa" placeholder="Ingrese Porcentaje de Capacidad Ociosa" onKeyPress="EvaluateText('%f', this);" onBlur="this.value = NumberFormat(this.value, '2', '.', '')" autocomplete="off" required="" aria-required="true"/>  
                    <i class="mdi mdi-percent form-control-feedback"></i> 
                </div>
            </div>
        </div>

    </div>

            <div class="modal-footer">
                <button type="submit" name="btn-situacion" id="btn-situacion" class="btn btn-danger"><span class="fa fa-save"></span> Guardar</button>
            <button class="btn btn-dark" type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="
                document.getElementById('situacion').value = 'savesituacion',
                document.getElementById('id_situacion_de_planta').value = '',
                document.getElementById('industria_situacion').value = '',
                document.getElementById('anio_situacion').value = '',
                document.getElementById('produccion_sobre_capacidad').value = '',
                document.getElementById('superficie_lote').value = '',
                document.getElementById('superficie_planta').value = '',
                document.getElementById('es_zona_industrial').value = '1',
                document.getElementById('declara_inversion').value = '0',
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
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="assets/images/close.png"/></button>
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
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="assets/images/close.png"/></button>
            </div>
            
        <form class="form form-material" name="savemotivoasignado" id="savemotivoasignado" action="#">
                
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
                    <label class="control-label">Motivo Ociosidad: <span style="cursor: pointer;" class="mdi mdi-alert-circle text-danger" data-container="body" title="Notificación: Ingrese Descripción de Motivo Ociosidad y seleccione en el Listado que se mostrará, en caso de no aparecer, escribala y el sistema se encargará de la asignación del mismo."></span><span class="symbol required"></span></label>
                    <div class="form-group has-feedback">
                        <input type="hidden" name="seccionmotivo" id="seccionmotivo" value="<?php echo encrypt('4'); ?>">
                        <input type="hidden" name="proceso" id="motivo" value="savemotivo"/>
                        <input type="hidden" name="id_rel_industria_motivo_ociosidad" id="id_rel_industria_motivo_ociosidad">
                        <input type="hidden" name="industria_motivo" id="industria_motivo">
                        <input type="hidden" name="anio_motivo" id="anio_motivo">
                        <input type="hidden" name="id_motivo_ociosidad" id="id_motivo_ociosidad"/>
                        <input type="text" class="form-control" name="search_motivo" id="search_motivo" placeholder="Realice la Búsqueda de Ociosidad o Ingrese Descripción de Motivo" autocomplete="nope" required="" aria-required="true"/> 
                        <i class="fa fa-search form-control-feedback"></i> 
                    </div>
                </div>
            </div>

        </div>

            <div class="modal-footer">
                <button type="submit" name="btn-motivo" id="btn-motivo" class="btn btn-danger"><span class="fa fa-save"></span> Guardar</button>
            <button class="btn btn-dark" type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="
                document.getElementById('motivo').value = 'savemotivo',
                document.getElementById('id_rel_industria_motivo_ociosidad').value = '',
                document.getElementById('industria_motivo').value = '',
                document.getElementById('anio_motivo').value = '',
                document.getElementById('id_motivo_ociosidad').value = '',
                document.getElementById('search_motivo').value = ''
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
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="assets/images/close.png"/></button>
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
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="assets/images/close.png"/></button>
            </div>
            
        <form class="form form-material" name="savepersonal" id="savepersonal" action="#">
                
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
                    <div class="form-group has-feedback">
                        <label class="control-label">Roles de Trabajadores: <span class="symbol required"></span></label>
                        <i class="fa fa-bars form-control-feedback"></i>
                        <input type="hidden" name="seccionpersonal" id="seccionpersonal" value="<?php echo encrypt('4'); ?>">
                        <input type="hidden" name="proceso" id="personal" value="savepersonal"/>
                        <input type="hidden" name="industria_personal" id="industria_personal">
                        <input type="hidden" name="anio_personal" id="anio_personal">
                        <select class="form-control" id="rol_trabajador" name="rol_trabajador" required="" aria-required="true">
                        <option value=""> -- SELECCIONE -- </option>
                        <?php
                        $rol = new Login();
                        $rol = $rol->ListarRolTrabajador();
                        if($rol==""){ 
                            echo "";
                        } else {
                        for($i=0;$i<sizeof($rol);$i++){ ?>
                        <option value="<?php echo $rol[$i]['id_roles_trabajador'] ?>"><span class="fa fa-bars"></span> <?php echo $rol[$i]['descripcion'] ?></option>
                        <?php } } ?>
                        </select> 
                    </div>
                </div>
            </div>

            <div class="table-responsive">
              <table id="default_order" class="table2 display" border="0">
                <thead>
                  <tr role="row">
                    <th>Condición Laboral <span class="symbol required"></span></th>
                    <th>Masculino <span class="symbol required"></span></th>
                    <th>Femenino <span class="symbol required"></span></th>
                </tr>
            </thead>
            <tbody>
              <?php 
              $condicion = new Login();
              $condicion = $condicion->ListarCondicionesLaborales();
              if($condicion==""){
                echo "";    
            } else {
              $a=1;
              for($i=0;$i<sizeof($condicion);$i++){ 
                  ?>
                  <tr role="row" class="odd">
                    <td><input type="hidden" name="id_condicion_laboral[]" id="id_condicion_laboral" value="<?php echo $condicion[$i]['id_condicion_laboral']; ?>" /><label><?php echo $condicion[$i]['decripcion']; ?></label></td>

                    <td class="text-center"><input type="number" class="form-control" name="masculino[]" id="masculino" placeholder="Ingrese Cantidad Masculino" autocomplete="off" style="width:100%;height:40px;background:#f0f9fc;border-radius:5px 5px 5px 5px;"></td>

                    <td class="text-center"><input type="number" class="form-control" name="femenino[]" id="femenino" placeholder="Ingrese Cantidad Femenino" autocomplete="off" style="width:100%;height:40px;background:#f0f9fc;border-radius:5px 5px 5px 5px;"></td>
                </tr>
                 <?php } } ?>
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
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="assets/images/close.png"/></button>
            </div>
            
        <form class="form form-material" name="updatepersonal" id="updatepersonal" action="#">
                
       <div class="modal-body">

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group has-feedback">
                    <input type="hidden" name="seccionpersonalupdate" id="seccionpersonalupdate" value="<?php echo encrypt('4'); ?>">
                    <input type="hidden" name="proceso" id="personalupdate" value="updatepersonal"/>
                    <input type="hidden" name="industria_personal_update" id="industria_personal_update">
                    <input type="hidden" name="anio_personal_update" id="anio_personal_update">
                    <label class="control-label">Descripción de Industria: <span class="symbol required"></span></label>
                    <br /><abbr title="Descripción de Industria"><label id="nombre_de_fantasia"></label></abbr>
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

            <div id="detallespersonal"></div>
            
        </div>

            <div class="modal-footer">
                <button type="submit" name="btn-personalupdate" id="btn-personalupdate" class="btn btn-danger"><span class="fa fa-edit"></span> Actualizar</button>
            <button class="btn btn-dark" type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="
                document.getElementById('industria_personal_update').value = '',
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
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="assets/images/close.png"/></button>
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
                <button type="button" onclick="LimpiarRadio();" class="close" data-dismiss="modal" aria-hidden="true"><img src="assets/images/close.png"/></button>
            </div>
            
        <form class="form form-material" name="saveventa" id="saveventa" action="#">
                
       <div class="modal-body">

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group has-feedback">
                    <label class="control-label">Descripción de Industria: <span class="symbol required"></span></label>
                        <input type="hidden" name="seccionventa" id="seccionventa" value="<?php echo encrypt('5'); ?>">
                        <input type="hidden" name="proceso" id="ventas" value="saveventas"/>
                        <input type="hidden" name="industria_venta" id="industria_venta">
                        <input type="hidden" name="anio_venta" id="anio_venta">
                    <br /><abbr title="Descripción de Industria"><label id="nombre_de_fantasia"></label></abbr>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
              <table id="default_order" class="table2 display" border="0">
                <thead>
                  <tr role="row">
                    <th>Descripción</th>
                    <th>No Aplica </th>
                    <th>En la Provincia </th>
                    <th>Otras Provincias </th>
                    <th>Provincias </th>
                    <th>Otros Paises </th>
                    <th>Paises </th>
                </tr>
            </thead>
            <tbody>
              <?php 
              $clasificacion = new Login();
              $clasificacion = $clasificacion->ListarClasificacionVentas();
              if($clasificacion==""){
                echo "";    
            } else {
              $a=0;
              for($i=0;$i<sizeof($clasificacion);$i++){
              $b = $a++; 
            ?>
            <tr role="row" class="odd">
                <td><input type="hidden" name="id_clasificacion_ventas[]" id="id_clasificacion_ventas" value="<?php echo $clasificacion[$i]['id_clasificacion_ventas']; ?>" /><label><?php echo $clasificacion[$i]['clasificacion_ventas']; ?></label></td>

                <td class="text-center"><div class="custom-control custom-radio custom-control-inline"><input type="radio" name="checkbox[<?php echo $b; ?>]" id="no_aplica_<?php echo $clasificacion[$i]['id_clasificacion_ventas']; ?>" value="NO" class="custom-control-input"><label class="custom-control-label" for="no_aplica_<?php echo $clasificacion[$i]['id_clasificacion_ventas']; ?>" onClick="Limpiar(<?php echo $clasificacion[$i]['id_clasificacion_ventas']; ?>);"></label></div></td>

                <td class="text-center"><div class="custom-control custom-radio custom-control-inline"><input type="radio" name="checkbox[<?php echo $b; ?>]" id="provincia_<?php echo $clasificacion[$i]['id_clasificacion_ventas']; ?>" value="PROVINCIA" class="custom-control-input"><label class="custom-control-label" for="provincia_<?php echo $clasificacion[$i]['id_clasificacion_ventas']; ?>" onClick="Limpiar(<?php echo $clasificacion[$i]['id_clasificacion_ventas']; ?>);"></label></div></td>

                <td class="text-center"><div class="custom-control custom-radio custom-control-inline"><input type="radio" name="checkbox[<?php echo $b; ?>]" id="otra_provincia_<?php echo $clasificacion[$i]['id_clasificacion_ventas']; ?>" value="OTRA PROVINCIA" class="custom-control-input"><label class="custom-control-label" for="otra_provincia_<?php echo $clasificacion[$i]['id_clasificacion_ventas']; ?>" onClick="AsignaContadorProvincia(<?php echo $clasificacion[$i]['id_clasificacion_ventas']; ?>,<?php echo $b; ?>);" data-href="#" data-toggle="modal" data-target="#myModalProvincias" data-backdrop="static" data-keyboard="false"></label></div></td>

                <td><div id="provincia2_<?php echo $clasificacion[$i]['id_clasificacion_ventas']; ?>" class="provincias text-info"></div></td>

                <td class="text-center"><div class="custom-control custom-radio custom-control-inline"><input type="radio" name="checkbox[<?php echo $b; ?>]" id="otro_pais_<?php echo $clasificacion[$i]['id_clasificacion_ventas']; ?>" value="OTRO PAIS" class="custom-control-input"><label class="custom-control-label" for="otro_pais_<?php echo $clasificacion[$i]['id_clasificacion_ventas']; ?>" onClick="AsignaContadorPais(<?php echo $clasificacion[$i]['id_clasificacion_ventas']; ?>,<?php echo $b; ?>);" data-href="#" data-toggle="modal" data-target="#myModalPaises" data-backdrop="static" data-keyboard="false"></label></div></td>

                <td><div id="pais2_<?php echo $clasificacion[$i]['id_clasificacion_ventas']; ?>" class="paises text-info"></div></td>

                </tr>
                 <?php } } ?>
                </tbody>
                </table>
            </div>

        </div>

            <div class="modal-footer">
                <button type="submit" name="btn-venta" id="btn-venta" class="btn btn-danger"><span class="fa fa-save"></span> Guardar</button>
            <button type="button" onclick="LimpiarRadio();" class="btn btn-dark" class="close" data-dismiss="modal" aria-hidden="true" onclick="
                document.getElementById('ventas').value = 'saveventa',
                document.getElementById('industria_venta').value = '',
                document.getElementById('anio_venta').value = ''
                "><span class="fa fa-trash-o"></span> Cancelar</button>
            </div>
        </form>

    </div>
</div>
</div>
<!-- Modal para Asignar Ventas -->

<!-- Modal para Actualizar Ventas -->
<div id="MyModalUpdateVenta" class="modal fade" tabindex="-1" role="dialog" style="overflow-y: scroll;" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title text-white" id="myModalLabel"><i class="fa fa-tasks"></i> Actualizar Ventas Asociada a la Industria</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="assets/images/close.png"/></button>
            </div>
            
        <form class="form form-material" name="updateventa" id="updateventa" action="#">
                
       <div class="modal-body">

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group has-feedback">
                    <input type="hidden" name="seccionventaupdate" id="seccionventaupdate" value="<?php echo encrypt('5'); ?>">
                    <input type="hidden" name="proceso" id="ventaupdate" value="updateventas"/>
                    <input type="hidden" name="id_destino_ventas" id="id_destino_ventas">
                    <input type="hidden" name="industria_venta_update" id="industria_venta_update">
                    <input type="hidden" name="anio_venta_update" id="anio_venta_update">
                    <label class="control-label">Descripción de Industria: <span class="symbol required"></span></label>
                    <br /><abbr title="Descripción de Industria"><label id="nombre_de_fantasia"></label></abbr>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group has-feedback">
                    <label class="control-label">Descripción de Venta: <span class="symbol required"></span></label>
                    <br /><abbr title="Clasificación de Venta"><label id="clasificacion_venta"></label></abbr>
                    </div>
                </div>
            </div>

            <div id="detallesventa"></div>

        </div>

            <div class="modal-footer">
                <button type="submit" name="btn-ventaupdate" id="btn-ventaupdate" class="btn btn-danger"><span class="fa fa-edit"></span> Actualizar</button>
            <button type="button" class="btn btn-dark" class="close" data-dismiss="modal" aria-hidden="true" onclick="
                document.getElementById('id_destino_ventas').value = '',
                document.getElementById('industria_venta_update').value = '',
                document.getElementById('anio_venta_update').value = ''
                "><span class="fa fa-trash-o"></span> Cancelar</button>
            </div>
        </form>

    </div>
</div>
</div>
<!-- Modal para Actualizar Ventas -->

<!-- Modal Listado de Provincias -->
<div id="myModalProvincias" class="modal fade" tabindex="-1" role="dialog" style="overflow-y: scroll;" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title text-white" id="myModalLabel"><i class="fa fa-align-justify"></i> Listado de Provincias</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="assets/images/close.png"/></button>
            </div>
            <div class="modal-body">

            <div id="div2"><div class="table-responsive"><table id="datatable" class="table2 table-striped table-bordered border display">

                                                 <thead>
                                                 <tr role="row">
                                                    <th><i class="mdi mdi-check-circle"></i></th>
                                                    <th>Provincias</th>
                                                 </tr>
                                                 </thead>
                                                 <tbody class="BusquedaRapida">

<?php 
$new = new Login();
$provincia = $new->ListarProvincias();

if($provincia==""){
    
    echo "<div class='alert alert-danger'>";
    echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
    echo "<center><span class='fa fa-info-circle'></span> NO SE ENCONTRARON PROVINCIAS ACTUALMENTE </center>";
    echo "</div>";    

} else {
 
$a=1;
for($i=0;$i<sizeof($provincia);$i++){
$b = $a++;  
?>
                                               <tr role="row" class="odd">
                                               <td><div class="custom-control custom-radio">
<input type="hidden" name="contador" id="contador">
<input type="hidden" name="num" id="num">
<input type="radio" class="custom-control-input" name="check[]" id="check_<?php echo $b; ?>" value="<?php echo $provincia[$i]["id_provincia"] ?>">
                            <label class="custom-control-label text-success" for="check_<?php echo $b; ?>"></label>
                                    </div></td>
                                               <td><?php echo $provincia[$i]['nprovincia']; ?></td>
                                               </tr>
                                                <?php } } ?>
                                            </tbody>
                                     </table></div></div> 

            </div>
            <div class="modal-footer">
                <button type="button" onClick="AgregarProvincia(document.getElementById('check_<?php echo $b; ?>').value,document.getElementById('contador').value,document.getElementById('num').value)" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-check"></span> Seleccionar</button>
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
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="assets/images/close.png"/></button>
            </div>
            <div class="modal-body">

            <div id="div2"><div class="table-responsive"><table id="datatable" class="table2 table-striped table-bordered border display">

                                                 <thead>
                                                 <tr role="row">
                                                    <th><i class="mdi mdi-check-circle"></i></th>
                                                    <th>Paises</th>
                                                 </tr>
                                                 </thead>
                                                 <tbody class="BusquedaRapida">

<?php 
$new = new Login();
$pais = $new->ListarPaises();

if($pais==""){
    
    echo "<div class='alert alert-danger'>";
    echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
    echo "<center><span class='fa fa-info-circle'></span> NO SE ENCONTRARON PAISES ACTUALMENTE </center>";
    echo "</div>";    

} else {
 
$a=1;
for($i=0;$i<sizeof($pais);$i++){ 
$b = $a++; 
?>
                                               <tr role="row" class="odd">
                                               <td><div class="custom-control custom-radio">
<input type="hidden" name="contador2" id="contador2">
<input type="hidden" name="num2" id="num2">
<input type="radio" class="custom-control-input" name="check2[]" id="check2_<?php echo $b; ?>" value="<?php echo $pais[$i]["id_pais"] ?>">
                            <label class="custom-control-label text-success" for="check2_<?php echo $b; ?>"></label>
                                    </div></td>
                                               <td><?php echo $pais[$i]['npais']; ?></td>
                                               </tr>
                                                <?php } } ?>
                                            </tbody>
                                     </table></div></div> 

            </div>
            <div class="modal-footer">
                <button type="button" onClick="AgregarPais(document.getElementById('check2_<?php echo $b; ?>').value,document.getElementById('contador2').value,document.getElementById('num2').value)" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-check"></span> Seleccionar</button>
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
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="assets/images/close.png"/></button>
            </div>
            <div class="modal-body">

            <form class="form form-material" method="post" action="#" name="provinciasupdate" id="provinciasupdate">

            <div id="div2"><div class="table-responsive"><table id="datatable" class="table2 table-striped table-bordered border display">

                                                 <thead>
                                                 <tr role="row">
                                                    <th><i class="mdi mdi-check-circle"></i></th>
                                                    <th>Provincias</th>
                                                 </tr>
                                                 </thead>
                                                 <tbody class="BusquedaRapida">

<?php 
$new = new Login();
$provincia = $new->ListarProvincias();

if($provincia==""){
    
    echo "<div class='alert alert-danger'>";
    echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
    echo "<center><span class='fa fa-info-circle'></span> NO SE ENCONTRARON PROVINCIAS ACTUALMENTE </center>";
    echo "</div>";    

} else {
 
$a=1;
for($i=0;$i<sizeof($provincia);$i++){
$b = $a++;  
?>
                                               <tr role="row" class="odd">
                                               <td><div class="custom-control custom-radio">
<input type="radio" class="custom-control-input" name="check3[]" id="check3_<?php echo $b; ?>" value="<?php echo $provincia[$i]["id_provincia"] ?>">
                            <label class="custom-control-label text-success" for="check3_<?php echo $b; ?>"></label>
                                    </div></td>
                                               <td><?php echo $provincia[$i]['nprovincia']; ?></td>
                                               </tr>
                                                <?php } } ?>
                                            </tbody>
                                     </table></div></div>
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
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="assets/images/close.png"/></button>
            </div>
            <div class="modal-body">

            <form class="form form-material" method="post" action="#" name="paisesupdate" id="paisesupdate">

            <div id="div2"><div class="table-responsive"><table id="datatable" class="table2 table-striped table-bordered border display">

                                                 <thead>
                                                 <tr role="row">
                                                    <th><i class="mdi mdi-check-circle"></i></th>
                                                    <th>Paises</th>
                                                 </tr>
                                                 </thead>
                                                 <tbody class="BusquedaRapida">

<?php 
$new = new Login();
$pais = $new->ListarPaises();

if($pais==""){
    
    echo "<div class='alert alert-danger'>";
    echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
    echo "<center><span class='fa fa-info-circle'></span> NO SE ENCONTRARON PAISES ACTUALMENTE </center>";
    echo "</div>";    

} else {
 
$a=1;
for($i=0;$i<sizeof($pais);$i++){ 
$b = $a++; 
?>
                                               <tr role="row" class="odd">
                                               <td><div class="custom-control custom-radio">
<input type="radio" class="custom-control-input" name="check4[]" id="check4_<?php echo $b; ?>" value="<?php echo $pais[$i]["id_pais"] ?>">
                            <label class="custom-control-label text-success" for="check4_<?php echo $b; ?>"></label>
                                    </div></td>
                                               <td><?php echo $pais[$i]['npais']; ?></td>
                                               </tr>
                                                <?php } } ?>
                                            </tbody>
                                     </table></div></div>
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
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="assets/images/close.png"/></button>
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
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="assets/images/close.png"/></button>
            </div>
            
        <form class="form form-material" name="savefacturacion" id="savefacturacion" action="#">
                
       <div class="modal-body">

        <h3 class="card-subtitle text-muted"><i class="fa fa-cube"></i> Facturación</h3> <span class="card-subtitle text-muted">(Los montos declarados por actividad deben coincidir con los declarados ante AFIP y ATER)</span><hr>

        <div class="row mt-3">
            <div class="col-md-12">
                <div class="form-group has-feedback">
                <label class="control-label">Descripción de Industria: <span class="symbol required"></span></label>
                <input type="hidden" name="seccionfacturacion" id="seccionfacturacion" value="<?php echo encrypt('5'); ?>">
                <input type="hidden" name="proceso" id="facturacion" value="savefacturacion"/>
                <input type="hidden" name="id_facturacion" id="id_facturacion">
                <input type="hidden" name="industria_facturacion" id="industria_facturacion">
                <input type="hidden" name="anio_facturacion" id="anio_facturacion">
                <br /><abbr title="Descripción de Industria"><label id="nombre_de_fantasia"></label></abbr>
                </div>
            </div>
        </div>

        <h3 class="card-subtitle text-muted"><i class="fa fa-file-text"></i> Clasificación de Ingresos</h3><br>

        <div class="table-responsive">
            <div id="div1"></div>
        </div><br>

        <h3 class="card-subtitle text-muted"><i class="fa fa-file-text"></i> Información Impositiva y Niveles de Facturación</h3><hr>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group has-feedback">
                    <label class="control-label">Facturación Anual en Año Corriente (Pesos): <span class="symbol required"></span></label>
                    <input type="text" class="form-control" name="prevision_ingresos_anio_corriente" id="prevision_ingresos_anio_corriente" placeholder="Ingrese Facturación Anual en Año Corriente (Pesos)" onKeyPress="EvaluateText('%f', this);" onBlur="this.value = NumberFormat(this.value, '2', '.', '')" autocomplete="off" required="" aria-required="true"/>  
                    <i class="mdi mdi-currency-usd form-control-feedback"></i> 
                </div>
            </div>  

            <div class="col-md-6">
                <div class="form-group has-feedback">
                    <label class="control-label">Facturación Anual en Año Corriente (USD): <span class="symbol required"></span></label>
                    <input type="text" class="form-control" name="prevision_ingresos_anio_corriente_dolares" id="prevision_ingresos_anio_corriente_dolares" placeholder="Ingrese Facturación Anual en Año Corriente (USD)" onKeyPress="EvaluateText('%f', this);" onBlur="this.value = NumberFormat(this.value, '2', '.', '')" autocomplete="off" required="" aria-required="true"/>  
                    <i class="mdi mdi-cash-usd form-control-feedback"></i> 
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group has-feedback">
                    <label class="control-label">Facturación Mercado Interno (%): <span class="symbol required"></span></label>
                    <input type="text" class="form-control" name="porcentaje_prevision_mercado_interno" id="porcentaje_prevision_mercado_interno" placeholder="Ingrese Facturación Mercado Interno (%)" onKeyPress="EvaluateText('%f', this);" onBlur="this.value = NumberFormat(this.value, '2', '.', '')" autocomplete="off" required="" aria-required="true"/>  
                    <i class="mdi mdi-percent form-control-feedback"></i> 
                </div>
            </div>  

            <div class="col-md-6">
                <div class="form-group has-feedback">
                    <label class="control-label">Facturación Mercado Externo (%): <span class="symbol required"></span></label>
                    <input type="text" class="form-control" name="porcentaje_prevision_mercado_externo" id="porcentaje_prevision_mercado_externo" placeholder="Ingrese Facturación Mercado Externo (%)" onKeyPress="EvaluateText('%f', this);" onBlur="this.value = NumberFormat(this.value, '2', '.', '')" autocomplete="off" required="" aria-required="true"/>  
                    <i class="mdi mdi-percent form-control-feedback"></i> 
                </div>
            </div>
        </div>

    </div>

            <div class="modal-footer">
                <button type="submit" name="btn-facturacion" id="btn-facturacion" class="btn btn-danger"><span class="fa fa-save"></span> Guardar</button>
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
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="assets/images/close.png"/></button>
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
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="assets/images/close.png"/></button>
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
                    <input type="hidden" name="seccionefluente" id="seccionefluente" value="<?php echo encrypt('6'); ?>">
                    <input type="hidden" name="proceso" id="efluente" value="saveefluente"/>
                    <input type="hidden" name="id_rel_industria_efluente" id="id_rel_industria_efluente">
                    <input type="hidden" name="industria_efluente" id="industria_efluente">
                    <input type="hidden" name="anio_efluente" id="anio_efluente">
                    <input type="hidden" name="id_efluente" id="id_efluente"/>
                    <input type="text" class="form-control" name="search_efluente" id="search_efluente" placeholder="Realice la Búsqueda de Efluente o Ingrese Descripción" autocomplete="off" required="" aria-required="true"/> 
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
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="assets/images/close.png"/></button>
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
                <button type="button" onclick="LimpiarRadio();" class="close" data-dismiss="modal" aria-hidden="true"><img src="assets/images/close.png"/></button>
            </div>
            
        <form class="form form-material" name="savecertificado" id="savecertificado" action="#">
                
       <div class="modal-body">

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group has-feedback">
                    <label class="control-label">Descripción de Industria: <span class="symbol required"></span></label>
                    <br /><abbr title="Descripción de Industria"><label id="nombre_de_fantasia"></label></abbr>
                        <input type="hidden" name="seccioncertificado" id="seccioncertificado" value="<?php echo encrypt('6'); ?>">
                        <input type="hidden" name="proceso" id="certificado" value="savecertificado"/>
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
              <?php 
              $certificado = new Login();
              $certificado = $certificado->ListarCertificados();
              if($certificado==""){
                echo "";    
            } else {
              $a=0;
              for($i=0;$i<sizeof($certificado);$i++){ 
              $b = $a++; 
                  ?>
                  <tr role="row" class="odd">
                    <td><input type="hidden" name="id_certificado[]" id="id_certificado" value="<?php echo $certificado[$i]['id_certificado']; ?>" /><label><?php echo $certificado[$i]['certificado']; ?></label></td>

                    <td class="text-center"><div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="checkbox[<?php echo $b; ?>]" id="name1_<?php echo $certificado[$i]['id_certificado']; ?>" value="NO POSEE" class="custom-control-input" onClick="ProcesarCertificado('NO POSEE',<?php echo $certificado[$i]['id_certificado']; ?>);">
                    <label class="custom-control-label" for="name1_<?php echo $certificado[$i]['id_certificado']; ?>"></label>
                    </div></td>

                    <td class="text-center"><div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="checkbox[<?php echo $b; ?>]" id="name2_<?php echo $certificado[$i]['id_certificado']; ?>" value="EN TRAMITE" class="custom-control-input" onClick="ProcesarCertificado('EN TRAMITE',<?php echo $certificado[$i]['id_certificado']; ?>);">
                    <label class="custom-control-label" for="name2_<?php echo $certificado[$i]['id_certificado']; ?>"></label>
                    </div></td>

                    <td class="text-center"><div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="checkbox[<?php echo $b; ?>]" id="name3_<?php echo $certificado[$i]['id_certificado']; ?>" value="POSEE" class="custom-control-input" onClick="ProcesarCertificado('POSEE',<?php echo $certificado[$i]['id_certificado']; ?>);">
                    <label class="custom-control-label" for="name3_<?php echo $certificado[$i]['id_certificado']; ?>"></label>
                    </div></td>

                    <td class="text-center"><input type="text" class="form-control certificado" name="inicio_certificado[<?php echo $b; ?>]" id="inicio_certificado_<?php echo $certificado[$i]['id_certificado']; ?>" placeholder="Ingrese Fecha Inicial" autocomplete="off" style="width:100%;height:40px;background:#f0f9fc;border-radius:5px 5px 5px 5px;" onClick="Calendario(<?php echo $certificado[$i]['id_certificado']; ?>);" disabled="" title="Ingrese Fecha Inicial" required="" aria-required="true"></td>

                    <td class="text-center"><input type="text" class="form-control certificado" name="fin_certificado[<?php echo $b; ?>]" id="fin_certificado_<?php echo $certificado[$i]['id_certificado']; ?>" placeholder="Ingrese Fecha Final" autocomplete="off" style="width:100%;height:40px;background:#f0f9fc;border-radius:5px 5px 5px 5px;" onClick="Calendario(<?php echo $certificado[$i]['id_certificado']; ?>);" disabled="" title="Ingrese Fecha Final" required="" aria-required="true"></td>
                </tr>
                 <?php } } ?>
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
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="assets/images/close.png"/></button>
            </div>
            
        <form class="form form-material" name="updatecertificado" id="updatecertificado" action="#">
                
       <div class="modal-body">

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group has-feedback">
                    <input type="hidden" name="seccioncertificadoupdate" id="seccioncertificadoupdate" value="<?php echo encrypt('6'); ?>">
                    <input type="hidden" name="proceso" id="certificadoupdate" value="updatecertificado"/>
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
                        <input type="text" class="form-control desde" name="inicio_certificado" id="inicio_certificado" placeholder="Ingrese Fecha Inicial" autocomplete="off" disabled="" required="" aria-required="true"/> 
                        <i class="fa fa-calendar form-control-feedback"></i>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label class="control-label">Fecha Final: <span class="symbol required"></span></label>
                        <input type="text" class="form-control hasta" name="fin_certificado" id="fin_certificado" placeholder="Ingrese Fecha Final" autocomplete="off" disabled="" required="" aria-required="true"/> 
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
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="assets/images/close.png"/></button>
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
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="assets/images/close.png"/></button>
            </div>
            
        <form class="form form-material" name="savesistema" id="savesistema" action="#">
                
       <div class="modal-body">

        <div class="row">
            <div class="col-md-12">
                <div class="form-group has-feedback">
                <label class="control-label">Descripción de Industria: <span class="symbol required"></span></label>
                <br /><abbr title="Descripción de Industria"><label id="nombre_de_fantasia"></label></abbr>
                    <input type="hidden" name="seccionsistema" id="seccionsistema" value="<?php echo encrypt('7'); ?>">
                    <input type="hidden" name="proceso" id="sistema" value="savesistema"/>
                    <input type="hidden" name="industria_sistema" id="industria_sistema">
                    <input type="hidden" name="anio_sistema" id="anio_sistema">
                </div>
            </div>
        </div>

        <div id="div2"><div class="table-responsive">
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
              <?php 
              $sistema = new Login();
              $sistema = $sistema->ListarSistemasActivas();
              if($sistema==""){
                echo "";    
            } else {
              $a=0;
              for($i=0;$i<sizeof($sistema);$i++){ 
              $b = $a++; 
                  ?>
                  <tr role="row" class="odd">
                    <td><input type="hidden" name="id_sistema_de_calidad[]" id="id_sistema_de_calidad" value="<?php echo $sistema[$i]['id_sistema_de_calidad']; ?>" /><label><?php echo $sistema[$i]['descripcion']; ?></label></td>

                    <td class="text-center"><div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="checkbox[<?php echo $b; ?>]" id="name4_<?php echo $sistema[$i]['id_sistema_de_calidad']; ?>" value="NO POSEE" class="custom-control-input" onClick="ProcesarSistema('NO POSEE',<?php echo $sistema[$i]['id_sistema_de_calidad']; ?>);" checked="checked">
                    <label class="custom-control-label" for="name4_<?php echo $sistema[$i]['id_sistema_de_calidad']; ?>"></label>
                    </div></td>

                    <td class="text-center"><div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="checkbox[<?php echo $b; ?>]" id="name5_<?php echo $sistema[$i]['id_sistema_de_calidad']; ?>" value="EN TRAMITE" class="custom-control-input" onClick="ProcesarSistema('EN TRAMITE',<?php echo $sistema[$i]['id_sistema_de_calidad']; ?>);">
                    <label class="custom-control-label" for="name5_<?php echo $sistema[$i]['id_sistema_de_calidad']; ?>"></label>
                    </div></td>

                    <td class="text-center"><div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="checkbox[<?php echo $b; ?>]" id="name6_<?php echo $sistema[$i]['id_sistema_de_calidad']; ?>" value="POSEE" class="custom-control-input" onClick="ProcesarSistema('POSEE',<?php echo $sistema[$i]['id_sistema_de_calidad']; ?>);">
                    <label class="custom-control-label" for="name6_<?php echo $sistema[$i]['id_sistema_de_calidad']; ?>"></label>
                    </div></td>

                    <td class="text-center"><input type="text" class="form-control calidad" name="inicio_sistema[<?php echo $b; ?>]" id="inicio_sistema_<?php echo $sistema[$i]['id_sistema_de_calidad']; ?>" placeholder="Ingrese Fecha Inicial" autocomplete="off" style="width:100%;height:40px;background:#f0f9fc;border-radius:5px 5px 5px 5px;" disabled="" title="Ingrese Fecha Inicial" required="" aria-required="true"></td>

                    <td class="text-center"><input type="text" class="form-control calidad" name="fin_sistema[<?php echo $b; ?>]" id="fin_sistema_<?php echo $sistema[$i]['id_sistema_de_calidad']; ?>" placeholder="Ingrese Fecha Final" autocomplete="off" style="width:100%;height:40px;background:#f0f9fc;border-radius:5px 5px 5px 5px;" disabled="" title="Ingrese Fecha Final" required="" aria-required="true"></td>
                </tr>
                 <?php } } ?>
                </tbody>
                </table>
            </div></div>

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
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="assets/images/close.png"/></button>
            </div>
            
        <form class="form form-material" name="updatesistema" id="updatesistema" action="#">
                
       <div class="modal-body">

        <div class="row">
            <div class="col-md-12">
                <div class="form-group has-feedback">
                <input type="hidden" name="seccionsistemaupdate" id="seccionsistemaupdate" value="<?php echo encrypt('7'); ?>">
                <input type="hidden" name="proceso" id="sistemaupdate" value="updatesistema"/>
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
                    <input type="text" class="form-control desde" name="inicio_sistema" id="inicio_sistema" placeholder="Ingrese Fecha Inicial" autocomplete="off" disabled="" required="" aria-required="true"/> 
                    <i class="fa fa-calendar form-control-feedback"></i>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group has-feedback">
                    <label class="control-label">Fecha Final: <span class="symbol required"></span></label>
                    <input type="text" class="form-control hasta" name="fin_sistema" id="fin_sistema" placeholder="Ingrese Fecha Final" autocomplete="off" disabled="" required="" aria-required="true"/> 
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
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="assets/images/close.png"/></button>
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
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="assets/images/close.png"/></button>
            </div>
            
        <form class="form form-material" name="savepromocion" id="savepromocion" action="#">
                
       <div class="modal-body">

        <div class="row">
            <div class="col-md-12">
                <div class="form-group has-feedback">
                <label class="control-label">Descripción de Industria: <span class="symbol required"></span></label>
                <br /><abbr title="Descripción de Industria"><label id="nombre_de_fantasia"></label></abbr>
                    <input type="hidden" name="seccionpromocion" id="seccionpromocion" value="<?php echo encrypt('7'); ?>">
                    <input type="hidden" name="proceso" id="promocion" value="savepromocion"/>
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
          <?php 
          $promocion = new Login();
          $promocion = $promocion->ListarPromocionesActivas();
          if($promocion==""){
            echo "";    
        } else {
          $a=0;
          for($i=0;$i<sizeof($promocion);$i++){ 
          $b = $a++; 
              ?>
              <tr role="row" class="odd">
                <td><input type="hidden" name="id_promocion_industrial[]" id="id_promocion_industrial" value="<?php echo $promocion[$i]['id_promocion_industrial']; ?>" /><label><?php echo $promocion[$i]['descripcion']; ?></label></td>

                <td class="text-center"><div class="custom-control custom-radio custom-control-inline">
                <input type="radio" name="checkbox[<?php echo $b; ?>]" id="name7_<?php echo $promocion[$i]['id_promocion_industrial']; ?>" value="NO POSEE" class="custom-control-input">
                <label class="custom-control-label" for="name7_<?php echo $promocion[$i]['id_promocion_industrial']; ?>" onClick="ProcesarPromocion('NO POSEE',<?php echo $promocion[$i]['id_promocion_industrial']; ?>);"></label>
                </div></td>

                <td class="text-center"><div class="custom-control custom-radio custom-control-inline">
                <input type="radio" name="checkbox[<?php echo $b; ?>]" id="name8_<?php echo $promocion[$i]['id_promocion_industrial']; ?>" value="EN TRAMITE" class="custom-control-input" onClick="ProcesarPromocion('EN TRAMITE',<?php echo $promocion[$i]['id_promocion_industrial']; ?>);">
                <label class="custom-control-label" for="name8_<?php echo $promocion[$i]['id_promocion_industrial']; ?>"></label>
                </div></td>

                <td class="text-center"><div class="custom-control custom-radio custom-control-inline">
                <input type="radio" name="checkbox[<?php echo $b; ?>]" id="name9_<?php echo $promocion[$i]['id_promocion_industrial']; ?>" value="POSEE" class="custom-control-input" onClick="ProcesarPromocion('POSEE',<?php echo $promocion[$i]['id_promocion_industrial']; ?>);">
                <label class="custom-control-label" for="name9_<?php echo $promocion[$i]['id_promocion_industrial']; ?>"></label>
                </div></td>

                <td class="text-center"><input type="text" class="form-control calendario" name="inicio_promocion[<?php echo $b; ?>]" id="inicio_promocion_<?php echo $promocion[$i]['id_promocion_industrial']; ?>" placeholder="Ingrese Fecha Inicial" autocomplete="off" style="width:100%;height:40px;background:#f0f9fc;border-radius:5px 5px 5px 5px;" disabled="" title="Ingrese Fecha Inicial" required="" aria-required="true"></td>

                <td class="text-center"><input type="text" class="form-control calendario" name="fin_promocion[<?php echo $b; ?>]" id="fin_promocion_<?php echo $promocion[$i]['id_promocion_industrial']; ?>" placeholder="Ingrese Fecha Final" autocomplete="off" style="width:100%;height:40px;background:#f0f9fc;border-radius:5px 5px 5px 5px;" disabled="" title="Ingrese Fecha Final" required="" aria-required="true"></td>
            </tr>
             <?php } } ?>
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
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="assets/images/close.png"/></button>
            </div>
            
        <form class="form form-material" name="updatepromocion" id="updatepromocion" action="#">
                
       <div class="modal-body">

        <div class="row">
            <div class="col-md-12">
                <div class="form-group has-feedback">
                <input type="hidden" name="seccionpromocionupdate" id="seccionpromocionupdate" value="<?php echo encrypt('7'); ?>">
                <input type="hidden" name="proceso" id="promocionupdate" value="updatepromocion"/>
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
                    <input type="text" class="form-control desde" name="inicio_promocion" id="inicio_promocion" placeholder="Ingrese Fecha Inicial" autocomplete="off" disabled="" required="" aria-required="true"/> 
                    <i class="fa fa-calendar form-control-feedback"></i>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group has-feedback">
                    <label class="control-label">Fecha Final: <span class="symbol required"></span></label>
                    <input type="text" class="form-control hasta" name="fin_promocion" id="fin_promocion" placeholder="Ingrese Fecha Final" autocomplete="off" disabled="" required="" aria-required="true"/> 
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
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="assets/images/close.png"/></button>
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
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="assets/images/close.png"/></button>
            </div>
            
        <form class="form form-material" name="saveeconomia" id="saveeconomia" action="#">
                
       <div class="modal-body">

        <div class="row">
            <div class="col-md-12">
                <div class="form-group has-feedback">
                <label class="control-label">Descripción de Industria: <span class="symbol required"></span></label>
                <input type="hidden" name="seccioneconomia" id="seccioneconomia" value="<?php echo encrypt('8'); ?>">
                <input type="hidden" name="proceso" id="economia" value="saveeconomia"/>
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


















        <!-- INICIO DE MENU -->
        <?php include('menu.php'); ?>
        <!-- FIN DE MENU -->
   

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
                <h4 class="card-subtitle">Declaración jurada anual (Dec. 1736/68 MHEOP: Dec. 534/77 ME; Dec. 100/81 MEO y SP; Dec. 4962/85 MHS y OP) </h4><hr>
    
    <div id="save">
    <!-- error will be shown here ! -->
    </div>

    <div class="form-body"><!--form body-->

    <div id="secciones" class="mt-3"><!-- Div secciones -->

    <?php if (isset($_GET['in']) && isset($_GET['co'])) {
      
    $reg = $tra->SeccionGeneralPorId(); ?>

    <div class="row-horizon">
     <span class="categories selectedGat" id="seccion#1" onclick="CargaFormulario('<?php echo encrypt('1'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Datos Generales</span>
     <span class="categories" id="seccion#2" onclick="CargaFormulario('<?php echo encrypt('2'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Actividad</span>
     <span class="categories" id="seccion#3" onclick="CargaFormulario('<?php echo encrypt('3'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Insumos y Servicios</span>
     <span class="categories" id="seccion#4" onclick="CargaFormulario('<?php echo encrypt('4'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Situación de la Planta</span>
     <span class="categories" id="seccion#5" onclick="CargaFormulario('<?php echo encrypt('5'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Ventas y Facturación</span>
     <span class="categories" id="seccion#6" onclick="CargaFormulario('<?php echo encrypt('6'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Prevención y Control Ambiental</span>
     <span class="categories" id="seccion#7" onclick="CargaFormulario('<?php echo encrypt('7'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Sistemas de Calidad</span>
     <span class="categories" id="seccion#8" onclick="CargaFormulario('<?php echo encrypt('8'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Economía del Conocimiento</span>
     <span class="categories" id="seccion#9" onclick="CargaFormulario('<?php echo encrypt('9'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Revisión y Confirmación DDJJ</span>
    </div>

    <hr>
              
    <?php } else { ?>

    <div class="row-horizon">
     <span class="categories selectedGat" id="seccion#1" onclick="CargaFormulario('<?php echo encrypt('1'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Datos Generales</span>
     <span class="categories" id="seccion#2" onclick="CargaFormulario('<?php echo encrypt('2'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Actividad</span>
     <span class="categories" id="seccion#3" onclick="CargaFormulario('<?php echo encrypt('3'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Insumos y Servicios</span>
     <span class="categories" id="seccion#4" onclick="CargaFormulario('<?php echo encrypt('4'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Situación de la Planta</span>
     <span class="categories" id="seccion#5" onclick="CargaFormulario('<?php echo encrypt('5'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Ventas y Facturación</span>
     <span class="categories" id="seccion#6" onclick="CargaFormulario('<?php echo encrypt('6'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Prevención y Control Ambiental</span>
     <span class="categories" id="seccion#7" onclick="CargaFormulario('<?php echo encrypt('7'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Sistemas de Calidad</span>
     <span class="categories" id="seccion#8" onclick="CargaFormulario('<?php echo encrypt('8'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Economía del Conocimiento</span>
     <span class="categories" id="seccion#9" onclick="CargaFormulario('<?php echo encrypt('9'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Revisión y Confirmación DDJJ</span>
    </div>

    <hr>

    <?php } ?>

    <form class="form-material" method="post" action="#" name="savegeneral" id="savegeneral">

        <h3 class="card-subtitle mt-3"> Datos Generales</h3>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group has-feedback">
                    <label class="control-label">Año: <span class="symbol required"></span></label>
(Si bien el certificado será emitido a fecha del año corriente, la información volcada en el formulario debe corresponder al ejercicio inmediato anterior)
                    <i class="fa fa-bars form-control-feedback"></i>
                    <select class="form-control" id="id_periodo_fiscal" name="id_periodo_fiscal" disabled="" required="" aria-required="true">
                    <option value=""> -- SELECCIONE -- </option>
                    <?php
                    $pfiscal = new Login();
                    $pfiscal = $pfiscal->ListarPeriodosFiscales();
                    if($pfiscal==""){ 
                        echo "";
                    } else {
                    for($i=0;$i<sizeof($pfiscal);$i++){ ?>
                    <option value="<?php echo $pfiscal[$i]['id_periodo_fiscal']; ?>"<?php if (!(strcmp(date("Y"), $pfiscal[$i]['anio']))) {echo "selected=\"selected\"";} ?>><?php echo $pfiscal[$i]['anio'] ?></option>
                    <?php } } ?>
                    </select>  
                </div>
            </div>
        </div>

        <h3 class="card-subtitle mt-3"> Datos de Establecimiento Industrial</h3>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group has-feedback">
                    <label class="control-label">Nombre o Razón Social de la Empresa: <span class="symbol required"></span></label>
                    <input type="hidden" name="secciongeneral" id="secciongeneral" value="<?php echo encrypt('1'); ?>">
                    <input type="hidden" name="proceso" id="proceso" <?php if (isset($reg[0]['id_contribuyente'])) { ?> value="updategeneral" <?php } else { ?> value="savegeneral" <?php } ?>/>
                    <input type="hidden" name="id_contribuyente" id="id_contribuyente" <?php if (isset($reg[0]['id_contribuyente'])) { ?> value="<?php echo $reg[0]['id_contribuyente']; ?>" <?php } else { ?> value="<?php echo $_SESSION['id_contribuyente']; ?>" <?php } ?>>
                    <input type="hidden" name="id_persona" id="id_persona" <?php if (isset($reg[0]['id_persona'])) { ?> value="<?php echo $reg[0]['id_persona']; ?>" <?php } else { ?> value="<?php echo $_SESSION['id_persona']; ?>" <?php } ?>>
                    <input type="hidden" name="id_industria" id="id_industria" <?php if (isset($reg[0]['id_industria'])) { ?> value="<?php echo $reg[0]['id_industria']; ?>" <?php } else { ?> value="0" <?php } ?>>
                    <input type="hidden" name="id_periodo_de_actividad_de_contribuyente" id="id_periodo_de_actividad_de_contribuyente" <?php if (isset($reg[0]['id_periodo_de_actividad_de_contribuyente'])) { ?> value="<?php echo $reg[0]['id_periodo_de_actividad_de_contribuyente']; ?>" <?php } ?>>
                    <br><abbr title="Nombre Razón Social de Empresa"><?php echo $_SESSION['razonsocial']; ?></abbr>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="form-group has-feedback">
                    <label class="control-label">Nº de Cuit: <span class="symbol required"></span></label>
                    <br><abbr title="Nº de CUIT/CUIL"><?php echo $_SESSION['cuit']; ?></abbr> 
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group has-feedback">
                    <label class="control-label">Fecha Inicio Actividad Contribuyente: <span class="symbol required"></span></label>
                    <input type="text" class="form-control actividades" name="fecha_actividad_contribuyente" id="fecha_actividad_contribuyente" placeholder="Ingrese Fecha Inicio Actividad de Contribuyente" autocomplete="off" <?php if (isset($reg[0]['fecha_inicio_de_actividades'])) { ?> value="<?php echo date("d-m-Y",strtotime($reg[0]['fecha_inicio_de_actividades'])); ?>" <?php } ?> required="" aria-required="true"/>  
                    <i class="fa fa-calendar form-control-feedback"></i>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group has-feedback">
                    <label class="control-label">Régimen de Ingresos Brutos: <span class="symbol required"></span></label>
                    <i class="fa fa-bars form-control-feedback"></i>
                    <?php if (isset($reg[0]['regimen_ib'])) { ?>
                    <select class="form-control" id="id_regimen_ib" name="id_regimen_ib" required="" aria-required="true">
                    <option value=""> -- SELECCIONE -- </option>
                    <?php
                    $regimen = new Login();
                    $regimen = $regimen->ListarRegimenIngresosBrutos();
                    if($regimen==""){ 
                        echo "";
                    } else {
                    for($i=0;$i<sizeof($regimen);$i++){ ?>
                    <option value="<?php echo $regimen[$i]['id_regimen_ib'] ?>"<?php if (!(strcmp($reg[0]['regimen_ib'], htmlentities($regimen[$i]['id_regimen_ib'])))) { echo "selected=\"selected\""; } ?>><?php echo $regimen[$i]['regimen_ib'] ?></option>
                    <?php } } ?>
                    </select> 
                    <?php } else { ?>
                    <select class="form-control" id="id_regimen_ib" name="id_regimen_ib" required="" aria-required="true">
                    <option value=""> -- SELECCIONE -- </option>
                    <?php
                    $regimen = new Login();
                    $regimen = $regimen->ListarRegimenIngresosBrutos();
                    if($regimen==""){ 
                        echo "";
                    } else {
                    for($i=0;$i<sizeof($regimen);$i++){ ?>
                    <option value="<?php echo $regimen[$i]['id_regimen_ib'] ?>"><?php echo $regimen[$i]['regimen_ib'] ?></option>
                    <?php } } ?>
                    </select> 
                    <?php } ?>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group has-feedback">
                    <label class="control-label">Nº de Ingresos Brutos: <span class="symbol required"></span></label>
                    <input type="text" class="form-control" name="numero_de_ib" id="numero_de_ib" placeholder="Ingrese Nº de Ingresos Brutos" autocomplete="off" <?php if (isset($reg[0]['numero_de_ib'])) { ?> value="<?php echo $reg[0]['numero_de_ib']; ?>" <?php } ?> required="" aria-required="true"/>  
                    <i class="fa fa-pencil form-control-feedback"></i>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-6">
                <div class="form-group has-feedback">
                    <label class="control-label">Condición Frente al Iva: <span class="symbol required"></span></label>
                    <i class="fa fa-bars form-control-feedback"></i>
                    <?php if (isset($reg[0]['condicion_iva'])) { ?>
                    <select class="form-control" id="id_condicion_iva" name="id_condicion_iva" required="" aria-required="true">
                    <option value=""> -- SELECCIONE -- </option>
                    <?php
                    $civa = new Login();
                    $civa = $civa->ListarCondicionesIva();
                    if($civa==""){ 
                        echo "";
                    } else {
                    for($i=0;$i<sizeof($civa);$i++){ ?>
                    <option value="<?php echo $civa[$i]['id_condicion_iva'] ?>"<?php if (!(strcmp($reg[0]['condicion_iva'], htmlentities($civa[$i]['id_condicion_iva'])))) { echo "selected=\"selected\""; } ?>><?php echo $civa[$i]['condicion_iva'] ?></option>
                    <?php } } ?>
                    </select> 
                    <?php } else { ?>
                    <select class="form-control" id="id_condicion_iva" name="id_condicion_iva" required="" aria-required="true">
                    <option value=""> -- SELECCIONE -- </option>
                    <?php
                    $civa = new Login();
                    $civa = $civa->ListarCondicionesIva();
                    if($civa==""){ 
                        echo "";
                    } else {
                    for($i=0;$i<sizeof($civa);$i++){ ?>
                    <option value="<?php echo $civa[$i]['id_condicion_iva'] ?>"><?php echo $civa[$i]['condicion_iva'] ?></option>
                    <?php } } ?>
                    </select> 
                    <?php } ?> 
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group has-feedback">
                    <label class="control-label">Naturaleza Juridica: <span class="symbol required"></span></label>
                    <i class="fa fa-bars form-control-feedback"></i>
                    <?php if (isset($reg[0]['naturaleza_juridica'])) { ?>
                    <select class="form-control" id="id_naturaleza_juridica" name="id_naturaleza_juridica" required="" aria-required="true">
                    <option value=""> -- SELECCIONE -- </option>
                    <?php
                    $najuridica = new Login();
                    $najuridica = $najuridica->ListarNaturalezaJuridica();
                    if($najuridica==""){ 
                        echo "";
                    } else {
                    for($i=0;$i<sizeof($najuridica);$i++){ ?>
                    <option value="<?php echo $najuridica[$i]['id_naturaleza_juridica'] ?>"<?php if (!(strcmp($reg[0]['naturaleza_juridica'], htmlentities($najuridica[$i]['id_naturaleza_juridica'])))) { echo "selected=\"selected\""; } ?>><?php echo $najuridica[$i]['naturaleza_juridica'] ?></option>
                    <?php } } ?>
                    </select> 
                    <?php } else { ?>
                    <select class="form-control" id="id_naturaleza_juridica" name="id_naturaleza_juridica" required="" aria-required="true">
                    <option value=""> -- SELECCIONE -- </option>
                    <?php
                    $najuridica = new Login();
                    $najuridica = $najuridica->ListarNaturalezaJuridica();
                    if($najuridica==""){ 
                        echo "";
                    } else {
                    for($i=0;$i<sizeof($najuridica);$i++){ ?>
                    <option value="<?php echo $najuridica[$i]['id_naturaleza_juridica'] ?>"><?php echo $najuridica[$i]['naturaleza_juridica'] ?></option>
                    <?php } } ?>
                    </select> 
                    <?php } ?> 
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group has-feedback">
                    <label class="control-label">Nombre de Establecimiento Industrial <span class="text-blue">(Nombre de Fantasia)</span>: <span class="symbol required"></span></label>
                    <input type="text" class="form-control" name="nombre_de_fantasia" id="nombre_de_fantasia" placeholder="Ingrese Nombre de Establecimiento Industrial" autocomplete="off" <?php if (isset($reg[0]['nombre_de_fantasia'])) { ?> value="<?php echo $reg[0]['nombre_de_fantasia']; ?>" <?php } ?> required="" aria-required="true"/>  
                    <i class="fa fa-pencil form-control-feedback"></i> 
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group has-feedback">
                    <label class="control-label">Fecha de Inicio Actividad en Establecimiento: <span class="symbol required"></span></label>
                    <input type="text" class="form-control actividades" name="fecha_actividad_industria" id="fecha_actividad_industria" placeholder="Ingrese Fecha Inicio Actividad de Industria" autocomplete="off" <?php if (isset($reg[0]['fecha_inicio'])) { ?> value="<?php echo date("d-m-Y",strtotime($reg[0]['fecha_inicio'])); ?>" <?php } ?> required="" aria-required="true"/>  
                    <i class="fa fa-calendar form-control-feedback"></i>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group has-feedback">
                    <label class="control-label">Es Casa Central: <span class="symbol required"></span></label>
                    <i class="fa fa-bars form-control-feedback"></i>
                        <?php if (isset($reg[0]['es_casa_central'])) { ?>
                        <select name="es_casa_central" id="es_casa_central" class="form-control" required="" aria-required="true">
                        <option value=""> -- SELECCIONE -- </option>
<option value="SI"<?php if (!(strcmp('SI', $reg[0]['es_casa_central']))) {echo "selected=\"selected\"";} ?>>SI</option>
<option value="NO"<?php if (!(strcmp('NO', $reg[0]['es_casa_central']))) {echo "selected=\"selected\"";} ?>>NO</option>
                        </select>
                        <?php } else { ?>
                    <select class="form-control" id="es_casa_central" name="es_casa_central" required="" aria-required="true">
                    <option value=""> -- SELECCIONE -- </option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                    </select>
                    <?php } ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group has-feedback">
                    <label class="control-label">Nº de Teléfono Fijo: <span class="symbol required"></span></label>
                    <input type="text" class="form-control" name="tel_fijo" id="tel_fijo" placeholder="Ingrese Nº de Teléfono Fijo" <?php if (isset($reg[0]['tel_fijo'])) { ?> value="<?php echo $reg[0]['tel_fijo']; ?>" <?php } ?> autocomplete="off" required="" aria-required="true"/> 
                    <i class="fa fa-phone form-control-feedback"></i> 
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group has-feedback">
                    <label class="control-label">Nº de Celular de Contacto de la Empresa: <span class="symbol required"></span></label>
                    <input type="text" class="form-control" name="tel_celular" id="tel_celular" placeholder="Ingrese Nº de Celular" autocomplete="off" <?php if (isset($reg[0]['tel_celular'])) { ?> value="<?php echo $reg[0]['tel_celular']; ?>" <?php } ?> required="" aria-required="true"/>  
                    <i class="fa fa-mobile form-control-feedback"></i> 
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group has-feedback">
                    <label class="control-label">Código Postal: <span class="symbol required"></span></label>
                    <input type="text" class="form-control" name="cod_postal" id="cod_postal" placeholder="Ingrese Código Postal" autocomplete="off" <?php if (isset($reg[0]['cod_postal'])) { ?> value="<?php echo $reg[0]['cod_postal']; ?>" <?php } ?> required="" aria-required="true"/> 
                    <i class="fa fa-pencil form-control-feedback"></i> 
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group has-feedback">
                    <label class="control-label">Correo Electrónico para el Seguimiento del Trámite: <span class="symbol required"></span></label>
                    <input type="text" class="form-control" name="email_fiscal" id="email_fiscal" placeholder="Ingrese Correo Electrónico para Trámite" autocomplete="off" <?php if (isset($reg[0]['email_fiscal'])) { ?> value="<?php echo $reg[0]['email_fiscal']; ?>" <?php } else { ?> value="<?php echo $_SESSION["email"]; ?>" <?php } ?> required="" aria-required="true"/> 
                    <i class="fa fa-envelope-o form-control-feedback"></i> 
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="form-group has-feedback">
                    <label class="control-label">Zona de Planta: <span class="symbol required"></span></label>
                    <i class="fa fa-bars form-control-feedback"></i>
                    <?php if (isset($reg[0]['zona'])) { ?>
                    <select class="form-control" id="zona" name="zona" required="" aria-required="true">
                    <option value=""> -- SELECCIONE -- </option>
                    <?php
                    $cardinal = new Login();
                    $cardinal = $cardinal->ListarPuntosCardinales();
                    if($cardinal==""){ 
                        echo "";
                    } else {
                    for($i=0;$i<sizeof($cardinal);$i++){ ?>
                    <option value="<?php echo $cardinal[$i]['id_punto_cardinal'] ?>"<?php if (!(strcmp($reg[0]['zona'], htmlentities($cardinal[$i]['id_punto_cardinal'])))) { echo "selected=\"selected\""; } ?>><?php echo $cardinal[$i]['descripcion'] ?></option>
                    <?php } } ?>
                    </select> 
                    <?php } else { ?>
                    <select class="form-control" id="zona" name="zona" required="" aria-required="true">
                    <option value=""> -- SELECCIONE -- </option>
                    <?php
                    $cardinal = new Login();
                    $cardinal = $cardinal->ListarPuntosCardinales();
                    if($cardinal==""){ 
                        echo "";
                    } else {
                    for($i=0;$i<sizeof($cardinal);$i++){ ?>
                    <option value="<?php echo $cardinal[$i]['id_punto_cardinal'] ?>"><?php echo $cardinal[$i]['descripcion'] ?></option>
                    <?php } } ?>
                    </select> 
                    <?php } ?>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group has-feedback">
                    <label class="control-label">Localidad de Planta: <span style="cursor: pointer;" class="mdi mdi-alert-circle text-danger" data-container="body" title="Notificación: Ingrese Nombre de Localidad y seleccione en el Listado que se mostrará, en caso de no aparecer, escribala y el sistema se encargará de la asignación del mismo."></span><span class="symbol required"></span></label>
                    <input type="hidden" name="localidad" id="localidad" <?php if (isset($reg[0]['localidad'])) { ?> value="<?php echo $reg[0]['localidad']; ?>" <?php } ?>/>
                    <input type="text" class="form-control" name="search_localidad" id="search_localidad" placeholder="Ingrese Nombre de Localidad" autocomplete="off" <?php if (isset($reg[0]['localidad'])) { ?> value="<?php echo $reg[0]['nlocalidad']; ?>" <?php } ?> required="" aria-required="true"/>  
                    <i class="fa fa-search form-control-feedback"></i> 
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group has-feedback">
                    <label class="control-label">Barrio de Planta: <span style="cursor: pointer;" class="mdi mdi-alert-circle text-danger" data-container="body" title="Notificación: Ingrese Nombre de Barrio y seleccione en el Listado que se mostrará, en caso de no aparecer, escribala y el sistema se encargará de la asignación del mismo."></span><span class="symbol required"></span></label>
                    <input type="hidden" name="barrio" id="barrio" <?php if (isset($reg[0]['barrio'])) { ?> value="<?php echo $reg[0]['barrio']; ?>" <?php } ?> />
                    <input type="text" class="form-control" name="search_barrio" id="search_barrio" placeholder="Ingrese Nombre de Barrio" autocomplete="off" <?php if (isset($reg[0]['barrio'])) { ?> value="<?php echo $reg[0]['nbarrio']; ?>" <?php } ?> required="" aria-required="true"/>  
                    <i class="fa fa-search form-control-feedback"></i> 
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group has-feedback">
                    <label class="control-label">Calle de Planta: <span style="cursor: pointer;" class="mdi mdi-alert-circle text-danger" data-container="body" title="Notificación: Ingrese Nombre de Calle y seleccione en el Listado que se mostrará, en caso de no aparecer, escribala y el sistema se encargará de la asignación del mismo."></span><span class="symbol required"></span></label>
                    <input type="hidden" name="calle" id="calle" <?php if (isset($reg[0]['calle'])) { ?> value="<?php echo $reg[0]['calle']; ?>" <?php } ?> />
                    <input type="text" class="form-control" name="search_calle" id="search_calle" placeholder="Ingrese Nombre de Calle" autocomplete="off" <?php if (isset($reg[0]['calle'])) { ?> value="<?php echo $reg[0]['ncalle']; ?>" <?php } ?> required="" aria-required="true"/>  
                    <i class="fa fa-search form-control-feedback"></i> 
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="form-group has-feedback">
                    <label class="control-label">Zona Administrativa: <span class="symbol required"></span></label>
                    <i class="fa fa-bars form-control-feedback"></i>
                    <?php if (isset($reg[0]['zona_administracion'])) { ?>
                    <select class="form-control" id="zona_administracion" name="zona_administracion" required="" aria-required="true">
                    <option value=""> -- SELECCIONE -- </option>
                    <?php
                    $cardinal = new Login();
                    $cardinal = $cardinal->ListarPuntosCardinales();
                    if($cardinal==""){ 
                        echo "";
                    } else {
                    for($i=0;$i<sizeof($cardinal);$i++){ ?>
                    <option value="<?php echo $cardinal[$i]['id_punto_cardinal'] ?>"<?php if (!(strcmp($reg[0]['zona_administracion'], htmlentities($cardinal[$i]['id_punto_cardinal'])))) { echo "selected=\"selected\""; } ?>><?php echo $cardinal[$i]['descripcion'] ?></option>
                    <?php } } ?>
                    </select> 
                    <?php } else { ?>
                    <select class="form-control" id="zona_administracion" name="zona_administracion" required="" aria-required="true">
                    <option value=""> -- SELECCIONE -- </option>
                    <?php
                    $cardinal = new Login();
                    $cardinal = $cardinal->ListarPuntosCardinales();
                    if($cardinal==""){ 
                        echo "";
                    } else {
                    for($i=0;$i<sizeof($cardinal);$i++){ ?>
                    <option value="<?php echo $cardinal[$i]['id_punto_cardinal'] ?>"><?php echo $cardinal[$i]['descripcion'] ?></option>
                    <?php } } ?>
                    </select> 
                    <?php } ?>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group has-feedback">
                    <label class="control-label">Localidad Administrativa: <span style="cursor: pointer;" class="mdi mdi-alert-circle text-danger" data-container="body" title="Notificación: Ingrese Nombre de Localidad y seleccione en el Listado que se mostrará, en caso de no aparecer, escribala y el sistema se encargará de la asignación del mismo."></span><span class="symbol required"></span></label>
                    <input type="hidden" name="localidad_administracion" id="localidad_administracion" <?php if (isset($reg[0]['localidad_administracion'])) { ?> value="<?php echo $reg[0]['localidad_administracion']; ?>" <?php } ?> />
                    <input type="text" class="form-control" name="search_localidad2" id="search_localidad2" placeholder="Ingrese Nombre de Localidad" autocomplete="off" <?php if (isset($reg[0]['localidad_administracion'])) { ?> value="<?php echo $reg[0]['nlocalidad2']; ?>" <?php } ?>  required="" aria-required="true"/>  
                    <i class="fa fa-search form-control-feedback"></i> 
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group has-feedback">
                    <label class="control-label">Barrio Administrativa: <span style="cursor: pointer;" class="mdi mdi-alert-circle text-danger" data-container="body" title="Notificación: Ingrese Nombre de Barrio y seleccione en el Listado que se mostrará, en caso de no aparecer, escribala y el sistema se encargará de la asignación del mismo."></span><span class="symbol required"></span></label>
                    <input type="hidden" name="barrio_administracion" id="barrio_administracion" <?php if (isset($reg[0]['barrio_administracion'])) { ?> value="<?php echo $reg[0]['barrio_administracion']; ?>" <?php } ?> />
                    <input type="text" class="form-control" name="search_barrio2" id="search_barrio2" placeholder="Ingrese Nombre de Barrio" autocomplete="off" <?php if (isset($reg[0]['barrio_administracion'])) { ?> value="<?php echo $reg[0]['nbarrio2']; ?>" <?php } ?> required="" aria-required="true"/>  
                    <i class="fa fa-search form-control-feedback"></i> 
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group has-feedback">
                    <label class="control-label">Calle Administrativa: <span style="cursor: pointer;" class="mdi mdi-alert-circle text-danger" data-container="body" title="Notificación: Ingrese Nombre de Calle y seleccione en el Listado que se mostrará, en caso de no aparecer, escribala y el sistema se encargará de la asignación del mismo."></span><span class="symbol required"></span></label>
                    <input type="hidden" name="calle_administracion" id="calle_administracion" <?php if (isset($reg[0]['calle_administracion'])) { ?> value="<?php echo $reg[0]['calle_administracion']; ?>" <?php } ?> />
                    <input type="text" class="form-control" name="search_calle2" id="search_calle2" placeholder="Ingrese Nombre de Calle" autocomplete="off" <?php if (isset($reg[0]['calle_administracion'])) { ?> value="<?php echo $reg[0]['ncalle2']; ?>" <?php } ?> required="" aria-required="true"/>  
                    <i class="fa fa-search form-control-feedback"></i> 
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group has-feedback">
                    <label class="control-label">Nº de Teléfono Fijo: <span class="symbol required"></span></label>
                    <input type="text" class="form-control" name="tel_fijo_administracion" id="tel_fijo_administracion" placeholder="Ingrese Nº de Teléfono Fijo" <?php if (isset($reg[0]['tel_fijo_administracion'])) { ?> value="<?php echo $reg[0]['tel_fijo_administracion']; ?>" <?php } ?> autocomplete="off" required="" aria-required="true"/> 
                    <i class="fa fa-phone form-control-feedback"></i> 
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group has-feedback">
                    <label class="control-label">Nº de Celular de Contacto en Administración: <span class="symbol required"></span></label>
                    <input type="text" class="form-control" name="tel_celular_administracion" id="tel_celular_administracion" placeholder="Ingrese Nº de Celular" autocomplete="off" <?php if (isset($reg[0]['tel_celular_administracion'])) { ?> value="<?php echo $reg[0]['tel_celular_administracion']; ?>" <?php } ?> required="" aria-required="true"/>  
                    <i class="fa fa-mobile form-control-feedback"></i> 
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-5">
                <div class="form-group has-feedback">
                    <label class="control-label">Latitud de Ubicación: <span class="symbol required"></span></label>
                    <input type="text" class="form-control" name="latitud" id="latitud" placeholder="Ingrese Latitud de Ubicación" autocomplete="off" <?php if (isset($reg[0]['latitud'])) { ?> value="<?php echo $reg[0]['latitud']; ?>" <?php } ?> required="" aria-required="true"/>  
                    <i class="fa fa-map-marker form-control-feedback"></i>
                </div>
            </div>

            <div class="col-md-5">
                <div class="form-group has-feedback">
                    <label class="control-label">Longitud de Ubicación: <span class="symbol required"></span></label>
                    <input type="text" class="form-control" name="longitud" id="longitud" placeholder="Ingrese Longitud de Ubicación" autocomplete="off" <?php if (isset($reg[0]['longitud'])) { ?> value="<?php echo $reg[0]['longitud']; ?>" <?php } ?> required="" aria-required="true"/>  
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
                    <input type="url" class="form-control" name="pagina_web" id="pagina_web" placeholder="Ingrese Url de Pagina Web" autocomplete="off" <?php if (isset($reg[0]['pagina_web'])) { ?> value="<?php echo $reg[0]['pagina_web']; ?>" <?php } ?> required="" aria-required="true"/> 
                    <i class="fa fa-globe form-control-feedback"></i> 
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="form-group has-feedback">
                    <label class="control-label">Correo Electrónico de la Empresa: <span class="symbol required"></span></label>
                    <input type="text" class="form-control" name="email" id="email" placeholder="Ingrese Correo Electrónico de Empresa" autocomplete="off" <?php if (isset($reg[0]['email'])) { ?> value="<?php echo $reg[0]['email']; ?>" <?php } ?> required="" aria-required="true"/> 
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
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                <i class="fa fa-copyright"></i> <span class="current-year"></span>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
   

    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/script/jquery.min.js"></script> 
    <script src="assets/js/bootstrap.js"></script>
    <!-- apps -->
    <script src="assets/js/app.min.js"></script>
    <script src="assets/js/app.init.horizontal-fullwidth.js"></script>
    <script src="assets/js/app-style-switcher.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="assets/js/perfect-scrollbar.js"></script>
    <script src="assets/js/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="assets/js/waves.js"></script>
    <!-- Sweet-Alert -->
    <script src="assets/js/sweetalert-dev.js"></script>
    <!--Menu sidebar -->
    <script src="assets/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="assets/js/custom.js"></script>

   <!-- Custom file upload -->
    <script src="assets/plugins/fileupload/bootstrap-fileupload.min.js"></script>


    <!-- script jquery -->
    <script type="text/javascript" src="assets/script/titulos.js"></script>
    <script type="text/javascript" src="assets/js/inputmask.bundle.min.js"></script>
    <script type="text/javascript" src="assets/script/mask.js"></script>
    <script type="text/javascript" src="assets/script/menu.js"></script>
    <script type="text/javascript" src="assets/script/script2.js"></script>
    <script type="text/javascript" src="assets/script/ajax.js"></script>
    <script type="text/javascript" src="assets/script/validation.min.js"></script>
    <script type="text/javascript" src="assets/script/script.js"></script>
    <!-- script jquery -->

    <!-- Calendario -->
    <link rel="stylesheet" href="assets/calendario/jquery-ui.css" />
    <script src="assets/calendario/jquery-ui.js"></script>
    <script src="assets/script/jscalendario.js"></script>
    <script src="assets/script/autocompleto.js"></script>
    <!-- Calendario -->

    <!-- jQuery -->
    <script src="assets/plugins/noty/packaged/jquery.noty.packaged.min.js"></script>
    <!-- jQuery -->

    <script type="text/javascript">
        /*$(document).on('click', '#Crear', function() {
          $('#MyModalAsignaProducto').modal('show');
        });

        $(document).on('click', '#agregar_nombres', function() {
          $('#MyModalAsignaMateria').modal('show');
        });*/
    </script>
    

</body>
</html>

