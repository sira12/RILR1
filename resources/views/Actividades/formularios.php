<?php
require_once("class/class.php");

$new = new Login();
?>




<?php
######################## BUSCA FORMULARIO PARA PROCEDIMIENTO ########################
if (isset($_GET['BuscaFormularioProcedimiento']) && isset($_GET['seccion']) && isset($_GET['in'])) {

    $c = new Login();
    $reg = $c->VerificaContribuyente();

    switch (decrypt($_GET['seccion'])) {
        case 1: ?>

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
                                if ($pfiscal == "") {
                                    echo "";
                                } else {
                                    for ($i = 0; $i < sizeof($pfiscal); $i++) { ?>
                                        <option value="<?php echo $pfiscal[$i]['id_periodo_fiscal']; ?>" <?php if (!(strcmp(date("Y"), $pfiscal[$i]['anio']))) {
                                                                                                                echo "selected=\"selected\"";
                                                                                                            } ?>><?php echo $pfiscal[$i]['anio'] ?></option>
                                <?php }
                                } ?>
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
                            <input type="hidden" name="proceso" <?php if (isset($reg[0]['id_contribuyente'])) { ?> value="updategeneral" <?php } else { ?> value="savegeneral" <?php } ?> />
                            <input type="hidden" name="id_contribuyente" id="id_contribuyente" <?php if (isset($reg[0]['id_contribuyente'])) { ?> value="<?php echo $reg[0]['id_contribuyente']; ?>" <?php } else { ?> value="<?php echo $_SESSION['id_contribuyente']; ?>" <?php } ?>>
                            <input type="hidden" name="id_persona" id="id_persona" <?php if (isset($reg[0]['id_persona'])) { ?> value="<?php echo $reg[0]['id_persona']; ?>" <?php } else { ?> value="<?php echo $_SESSION['id_persona']; ?>" <?php } ?>>
                            <input type="hidden" name="id_industria" id="id_industria" <?php if (isset($reg[0]['id_industria'])) { ?> value="<?php echo $reg[0]['id_industria']; ?>" <?php } else { ?> value="0" <?php } ?>>
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
                            <input type="text" class="form-control actividades" name="fecha_actividad_contribuyente" id="fecha_actividad_contribuyente" placeholder="Ingrese Fecha Inicio Actividad de Contribuyente" autocomplete="off" <?php if (isset($reg[0]['fecha_inicio_de_actividades'])) { ?> value="<?php echo date("d-m-Y", strtotime($reg[0]['fecha_inicio_de_actividades'])); ?>" <?php } ?> required="" aria-required="true" />
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
                                    if ($regimen == "") {
                                        echo "";
                                    } else {
                                        for ($i = 0; $i < sizeof($regimen); $i++) { ?>
                                            <option value="<?php echo $regimen[$i]['id_regimen_ib'] ?>" <?php if (!(strcmp($reg[0]['regimen_ib'], htmlentities($regimen[$i]['id_regimen_ib'])))) {
                                                                                                            echo "selected=\"selected\"";
                                                                                                        } ?>><?php echo $regimen[$i]['regimen_ib'] ?></option>
                                    <?php }
                                    } ?>
                                </select>
                            <?php } else { ?>
                                <select class="form-control" id="id_regimen_ib" name="id_regimen_ib" required="" aria-required="true">
                                    <option value=""> -- SELECCIONE -- </option>
                                    <?php
                                    $regimen = new Login();
                                    $regimen = $regimen->ListarRegimenIngresosBrutos();
                                    if ($regimen == "") {
                                        echo "";
                                    } else {
                                        for ($i = 0; $i < sizeof($regimen); $i++) { ?>
                                            <option value="<?php echo $regimen[$i]['id_regimen_ib'] ?>"><?php echo $regimen[$i]['regimen_ib'] ?></option>
                                    <?php }
                                    } ?>
                                </select>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group has-feedback">
                            <label class="control-label">Nº de Ingresos Brutos: <span class="symbol required"></span></label>
                            <input type="text" class="form-control" name="numero_de_ib" id="numero_de_ib" placeholder="Ingrese Nº de Ingresos Brutos" autocomplete="off" <?php if (isset($reg[0]['numero_de_ib'])) { ?> value="<?php echo $reg[0]['numero_de_ib']; ?>" <?php } ?> required="" aria-required="true" />
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
                                    if ($civa == "") {
                                        echo "";
                                    } else {
                                        for ($i = 0; $i < sizeof($civa); $i++) { ?>
                                            <option value="<?php echo $civa[$i]['id_condicion_iva'] ?>" <?php if (!(strcmp($reg[0]['condicion_iva'], htmlentities($civa[$i]['id_condicion_iva'])))) {
                                                                                                            echo "selected=\"selected\"";
                                                                                                        } ?>><?php echo $civa[$i]['condicion_iva'] ?></option>
                                    <?php }
                                    } ?>
                                </select>
                            <?php } else { ?>
                                <select class="form-control" id="id_condicion_iva" name="id_condicion_iva" required="" aria-required="true">
                                    <option value=""> -- SELECCIONE -- </option>
                                    <?php
                                    $civa = new Login();
                                    $civa = $civa->ListarCondicionesIva();
                                    if ($civa == "") {
                                        echo "";
                                    } else {
                                        for ($i = 0; $i < sizeof($civa); $i++) { ?>
                                            <option value="<?php echo $civa[$i]['id_condicion_iva'] ?>"><?php echo $civa[$i]['condicion_iva'] ?></option>
                                    <?php }
                                    } ?>
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
                                    if ($najuridica == "") {
                                        echo "";
                                    } else {
                                        for ($i = 0; $i < sizeof($najuridica); $i++) { ?>
                                            <option value="<?php echo $najuridica[$i]['id_naturaleza_juridica'] ?>" <?php if (!(strcmp($reg[0]['naturaleza_juridica'], htmlentities($najuridica[$i]['id_naturaleza_juridica'])))) {
                                                                                                                        echo "selected=\"selected\"";
                                                                                                                    } ?>><?php echo $najuridica[$i]['naturaleza_juridica'] ?></option>
                                    <?php }
                                    } ?>
                                </select>
                            <?php } else { ?>
                                <select class="form-control" id="id_naturaleza_juridica" name="id_naturaleza_juridica" required="" aria-required="true">
                                    <option value=""> -- SELECCIONE -- </option>
                                    <?php
                                    $najuridica = new Login();
                                    $najuridica = $najuridica->ListarNaturalezaJuridica();
                                    if ($najuridica == "") {
                                        echo "";
                                    } else {
                                        for ($i = 0; $i < sizeof($najuridica); $i++) { ?>
                                            <option value="<?php echo $najuridica[$i]['id_naturaleza_juridica'] ?>"><?php echo $najuridica[$i]['naturaleza_juridica'] ?></option>
                                    <?php }
                                    } ?>
                                </select>
                            <?php } ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group has-feedback">
                            <label class="control-label">Nombre de Establecimiento Industrial <span class="text-blue">(Nombre de Fantasia)</span>: <span class="symbol required"></span></label>
                            <input type="text" class="form-control" name="nombre_de_fantasia" id="nombre_de_fantasia" placeholder="Ingrese Nombre de Establecimiento Industrial" autocomplete="off" <?php if (isset($reg[0]['nombre_de_fantasia'])) { ?> value="<?php echo $reg[0]['nombre_de_fantasia']; ?>" <?php } ?> required="" aria-required="true" />
                            <i class="fa fa-pencil form-control-feedback"></i>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group has-feedback">
                            <label class="control-label">Fecha de Inicio Actividad en Establecimiento: <span class="symbol required"></span></label>
                            <input type="text" class="form-control actividades" name="fecha_actividad_industria" id="fecha_actividad_industria" placeholder="Ingrese Fecha Inicio Actividad de Industria" autocomplete="off" <?php if (isset($reg[0]['fecha_inicio'])) { ?> value="<?php echo date("d-m-Y", strtotime($reg[0]['fecha_inicio'])); ?>" <?php } ?> required="" aria-required="true" />
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
                                    <option value="SI" <?php if (!(strcmp('SI', $reg[0]['es_casa_central']))) {
                                                            echo "selected=\"selected\"";
                                                        } ?>>SI</option>
                                    <option value="NO" <?php if (!(strcmp('NO', $reg[0]['es_casa_central']))) {
                                                            echo "selected=\"selected\"";
                                                        } ?>>NO</option>
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
                            <input type="text" class="form-control" name="tel_fijo" id="tel_fijo" placeholder="Ingrese Nº de Teléfono Fijo" <?php if (isset($reg[0]['tel_fijo'])) { ?> value="<?php echo $reg[0]['tel_fijo']; ?>" <?php } ?> autocomplete="off" required="" aria-required="true" />
                            <i class="fa fa-phone form-control-feedback"></i>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group has-feedback">
                            <label class="control-label">Nº de Celular de Contacto de la Empresa: <span class="symbol required"></span></label>
                            <input type="text" class="form-control" name="tel_celular" id="tel_celular" placeholder="Ingrese Nº de Celular" autocomplete="off" <?php if (isset($reg[0]['tel_celular'])) { ?> value="<?php echo $reg[0]['tel_celular']; ?>" <?php } ?> required="" aria-required="true" />
                            <i class="fa fa-mobile form-control-feedback"></i>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group has-feedback">
                            <label class="control-label">Código Postal: <span class="symbol required"></span></label>
                            <input type="text" class="form-control" name="cod_postal" id="cod_postal" placeholder="Ingrese Código Postal" autocomplete="off" <?php if (isset($reg[0]['cod_postal'])) { ?> value="<?php echo $reg[0]['cod_postal']; ?>" <?php } ?> required="" aria-required="true" />
                            <i class="fa fa-pencil form-control-feedback"></i>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group has-feedback">
                            <label class="control-label">Correo Electrónico para el Seguimiento del Trámite: <span class="symbol required"></span></label>
                            <input type="text" class="form-control" name="email_fiscal" id="email_fiscal" placeholder="Ingrese Correo Electrónico para Trámite" autocomplete="off" <?php if (isset($reg[0]['email_fiscal'])) { ?> value="<?php echo $reg[0]['email_fiscal']; ?>" <?php } else { ?> value="<?php echo $_SESSION["email"]; ?>" <?php } ?> required="" aria-required="true" />
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
                                    if ($cardinal == "") {
                                        echo "";
                                    } else {
                                        for ($i = 0; $i < sizeof($cardinal); $i++) { ?>
                                            <option value="<?php echo $cardinal[$i]['id_punto_cardinal'] ?>" <?php if (!(strcmp($reg[0]['zona'], htmlentities($cardinal[$i]['id_punto_cardinal'])))) {
                                                                                                                    echo "selected=\"selected\"";
                                                                                                                } ?>><?php echo $cardinal[$i]['descripcion'] ?></option>
                                    <?php }
                                    } ?>
                                </select>
                            <?php } else { ?>
                                <select class="form-control" id="zona" name="zona" required="" aria-required="true">
                                    <option value=""> -- SELECCIONE -- </option>
                                    <?php
                                    $cardinal = new Login();
                                    $cardinal = $cardinal->ListarPuntosCardinales();
                                    if ($cardinal == "") {
                                        echo "";
                                    } else {
                                        for ($i = 0; $i < sizeof($cardinal); $i++) { ?>
                                            <option value="<?php echo $cardinal[$i]['id_punto_cardinal'] ?>"><?php echo $cardinal[$i]['descripcion'] ?></option>
                                    <?php }
                                    } ?>
                                </select>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group has-feedback">
                            <label class="control-label">Localidad de Planta: <span style="cursor: pointer;" class="mdi mdi-alert-circle text-danger" data-container="body" title="Notificación: Ingrese Nombre de Localidad y seleccione en el Listado que se mostrará, en caso de no aparecer, escribala y el sistema se encargará de la asignación del mismo."></span><span class="symbol required"></span></label>
                            <input type="hidden" name="localidad" id="localidad" <?php if (isset($reg[0]['localidad'])) { ?> value="<?php echo $reg[0]['localidad']; ?>" <?php } ?> />
                            <input type="text" class="form-control" name="search_localidad" id="search_localidad" placeholder="Ingrese Nombre de Localidad" autocomplete="off" <?php if (isset($reg[0]['localidad'])) { ?> value="<?php echo $reg[0]['nlocalidad']; ?>" <?php } ?> required="" aria-required="true" />
                            <i class="fa fa-search form-control-feedback"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group has-feedback">
                            <label class="control-label">Barrio de Planta: <span style="cursor: pointer;" class="mdi mdi-alert-circle text-danger" data-container="body" title="Notificación: Ingrese Nombre de Barrio y seleccione en el Listado que se mostrará, en caso de no aparecer, escribala y el sistema se encargará de la asignación del mismo."></span><span class="symbol required"></span></label>
                            <input type="hidden" name="barrio" id="barrio" <?php if (isset($reg[0]['barrio'])) { ?> value="<?php echo $reg[0]['barrio']; ?>" <?php } ?> />
                            <input type="text" class="form-control" name="search_barrio" id="search_barrio" placeholder="Ingrese Nombre de Barrio" autocomplete="off" <?php if (isset($reg[0]['barrio'])) { ?> value="<?php echo $reg[0]['nbarrio']; ?>" <?php } ?> required="" aria-required="true" />
                            <i class="fa fa-search form-control-feedback"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group has-feedback">
                            <label class="control-label">Calle de Planta: <span style="cursor: pointer;" class="mdi mdi-alert-circle text-danger" data-container="body" title="Notificación: Ingrese Nombre de Calle y seleccione en el Listado que se mostrará, en caso de no aparecer, escribala y el sistema se encargará de la asignación del mismo."></span><span class="symbol required"></span></label>
                            <input type="hidden" name="calle" id="calle" <?php if (isset($reg[0]['calle'])) { ?> value="<?php echo $reg[0]['calle']; ?>" <?php } ?> />
                            <input type="text" class="form-control" name="search_calle" id="search_calle" placeholder="Ingrese Nombre de Calle" autocomplete="off" <?php if (isset($reg[0]['calle'])) { ?> value="<?php echo $reg[0]['ncalle']; ?>" <?php } ?> required="" aria-required="true" />
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
                                    if ($cardinal == "") {
                                        echo "";
                                    } else {
                                        for ($i = 0; $i < sizeof($cardinal); $i++) { ?>
                                            <option value="<?php echo $cardinal[$i]['id_punto_cardinal'] ?>" <?php if (!(strcmp($reg[0]['zona_administracion'], htmlentities($cardinal[$i]['id_punto_cardinal'])))) {
                                                                                                                    echo "selected=\"selected\"";
                                                                                                                } ?>><?php echo $cardinal[$i]['descripcion'] ?></option>
                                    <?php }
                                    } ?>
                                </select>
                            <?php } else { ?>
                                <select class="form-control" id="zona_administracion" name="zona_administracion" required="" aria-required="true">
                                    <option value=""> -- SELECCIONE -- </option>
                                    <?php
                                    $cardinal = new Login();
                                    $cardinal = $cardinal->ListarPuntosCardinales();
                                    if ($cardinal == "") {
                                        echo "";
                                    } else {
                                        for ($i = 0; $i < sizeof($cardinal); $i++) { ?>
                                            <option value="<?php echo $cardinal[$i]['id_punto_cardinal'] ?>"><?php echo $cardinal[$i]['descripcion'] ?></option>
                                    <?php }
                                    } ?>
                                </select>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group has-feedback">
                            <label class="control-label">Localidad Administrativa: <span style="cursor: pointer;" class="mdi mdi-alert-circle text-danger" data-container="body" title="Notificación: Ingrese Nombre de Localidad y seleccione en el Listado que se mostrará, en caso de no aparecer, escribala y el sistema se encargará de la asignación del mismo."></span><span class="symbol required"></span></label>
                            <input type="hidden" name="localidad_administracion" id="localidad_administracion" <?php if (isset($reg[0]['localidad_administracion'])) { ?> value="<?php echo $reg[0]['localidad_administracion']; ?>" <?php } ?> />
                            <input type="text" class="form-control" name="search_localidad2" id="search_localidad2" placeholder="Ingrese Nombre de Localidad" autocomplete="off" <?php if (isset($reg[0]['localidad_administracion'])) { ?> value="<?php echo $reg[0]['nlocalidad2']; ?>" <?php } ?> required="" aria-required="true" />
                            <i class="fa fa-search form-control-feedback"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group has-feedback">
                            <label class="control-label">Barrio Administrativa: <span style="cursor: pointer;" class="mdi mdi-alert-circle text-danger" data-container="body" title="Notificación: Ingrese Nombre de Barrio y seleccione en el Listado que se mostrará, en caso de no aparecer, escribala y el sistema se encargará de la asignación del mismo."></span><span class="symbol required"></span></label>
                            <input type="hidden" name="barrio_administracion" id="barrio_administracion" <?php if (isset($reg[0]['barrio_administracion'])) { ?> value="<?php echo $reg[0]['barrio_administracion']; ?>" <?php } ?> />
                            <input type="text" class="form-control" name="search_barrio2" id="search_barrio2" placeholder="Ingrese Nombre de Barrio" autocomplete="off" <?php if (isset($reg[0]['barrio_administracion'])) { ?> value="<?php echo $reg[0]['nbarrio2']; ?>" <?php } ?> required="" aria-required="true" />
                            <i class="fa fa-search form-control-feedback"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group has-feedback">
                            <label class="control-label">Calle Administrativa: <span style="cursor: pointer;" class="mdi mdi-alert-circle text-danger" data-container="body" title="Notificación: Ingrese Nombre de Calle y seleccione en el Listado que se mostrará, en caso de no aparecer, escribala y el sistema se encargará de la asignación del mismo."></span><span class="symbol required"></span></label>
                            <input type="hidden" name="calle_administracion" id="calle_administracion" <?php if (isset($reg[0]['calle_administracion'])) { ?> value="<?php echo $reg[0]['calle_administracion']; ?>" <?php } ?> />
                            <input type="text" class="form-control" name="search_calle2" id="search_calle2" placeholder="Ingrese Nombre de Calle" autocomplete="off" <?php if (isset($reg[0]['calle_administracion'])) { ?> value="<?php echo $reg[0]['ncalle2']; ?>" <?php } ?> required="" aria-required="true" />
                            <i class="fa fa-search form-control-feedback"></i>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group has-feedback">
                            <label class="control-label">Nº de Teléfono Fijo: <span class="symbol required"></span></label>
                            <input type="text" class="form-control" name="tel_fijo_administracion" id="tel_fijo_administracion" placeholder="Ingrese Nº de Teléfono Fijo" <?php if (isset($reg[0]['tel_fijo_administracion'])) { ?> value="<?php echo $reg[0]['tel_fijo_administracion']; ?>" <?php } ?> autocomplete="off" required="" aria-required="true" />
                            <i class="fa fa-phone form-control-feedback"></i>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group has-feedback">
                            <label class="control-label">Nº de Celular de Contacto en Administración: <span class="symbol required"></span></label>
                            <input type="text" class="form-control" name="tel_celular_administracion" id="tel_celular_administracion" placeholder="Ingrese Nº de Celular" autocomplete="off" <?php if (isset($reg[0]['tel_celular_administracion'])) { ?> value="<?php echo $reg[0]['tel_celular_administracion']; ?>" <?php } ?> required="" aria-required="true" />
                            <i class="fa fa-mobile form-control-feedback"></i>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group has-feedback">
                            <label class="control-label">Latitud de Ubicación: <span class="symbol required"></span></label>
                            <input type="text" class="form-control" name="latitud" id="latitud" placeholder="Ingrese Latitud de Ubicación" autocomplete="off" <?php if (isset($reg[0]['latitud'])) { ?> value="<?php echo $reg[0]['latitud']; ?>" <?php } ?> required="" aria-required="true" />
                            <i class="fa fa-map-marker form-control-feedback"></i>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="form-group has-feedback">
                            <label class="control-label">Longitud de Ubicación: <span class="symbol required"></span></label>
                            <input type="text" class="form-control" name="longitud" id="longitud" placeholder="Ingrese Longitud de Ubicación" autocomplete="off" <?php if (isset($reg[0]['longitud'])) { ?> value="<?php echo $reg[0]['longitud']; ?>" <?php } ?> required="" aria-required="true" />
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
                            <input type="url" class="form-control" name="pagina_web" id="pagina_web" placeholder="Ingrese Url de Pagina Web" autocomplete="off" <?php if (isset($reg[0]['pagina_web'])) { ?> value="<?php echo $reg[0]['pagina_web']; ?>" <?php } ?> required="" aria-required="true" />
                            <i class="fa fa-globe form-control-feedback"></i>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group has-feedback">
                            <label class="control-label">Correo Electrónico de la Empresa: <span class="symbol required"></span></label>
                            <input type="text" class="form-control" name="email" id="email" placeholder="Ingrese Correo Electrónico de Empresa" autocomplete="off" <?php if (isset($reg[0]['email'])) { ?> value="<?php echo $reg[0]['email']; ?>" <?php } ?> required="" aria-required="true" />
                            <i class="fa fa-envelope-o form-control-feedback"></i>
                        </div>
                    </div>
                </div>


                <div class="text-right">
                    <button type="submit" name="btn-submit" id="btn-submit" class="btn btn-danger"><span class="fa fa-save"></span> Continuar</button>
                </div>

            </form>


        <?php
            break;
        case 2: ?>

            <div class="row-horizon">
                <span class="categories" id="seccion#1" onclick="CargaFormulario('<?php echo encrypt('1'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Datos Generales</span>
                <span class="categories selectedGat" id="seccion#2" onclick="CargaFormulario('<?php echo encrypt('2'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Actividad</span>
                <span class="categories" id="seccion#3" onclick="CargaFormulario('<?php echo encrypt('3'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Insumos y Servicios</span>
                <span class="categories" id="seccion#4" onclick="CargaFormulario('<?php echo encrypt('4'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Situación de la Planta</span>
                <span class="categories" id="seccion#5" onclick="CargaFormulario('<?php echo encrypt('5'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Ventas y Facturación</span>
                <span class="categories" id="seccion#6" onclick="CargaFormulario('<?php echo encrypt('6'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Prevención y Control Ambiental</span>
                <span class="categories" id="seccion#7" onclick="CargaFormulario('<?php echo encrypt('7'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Sistemas de Calidad</span>
                <span class="categories" id="seccion#8" onclick="CargaFormulario('<?php echo encrypt('8'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Economía del Conocimiento</span>
                <span class="categories" id="seccion#9" onclick="CargaFormulario('<?php echo encrypt('9'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Revisión y Confirmación DDJJ</span>
            </div>

            <hr>

            <h3 class="card-subtitle mt-3"> Actividad</h3>

            <?php if ($reg == "") {
                echo "<div class='alert alert-danger'>";
                echo "<center><span class='fa fa-info-circle'></span> POR FAVOR REALICE LA CARGA DE DATOS GENERALES PARA ASIGNAR ACTIVIDADES</center>";
                echo "</div>";
            } else { ?>
                <div class="text-right">
                    <button type="button" class="btn btn-info" data-placement="left" title="Agregar Nueva Actividad" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalActividad" data-backdrop="static" data-keyboard="false" onClick="AddIdActividadModal('<?php echo encrypt($reg[0]["id_industria"]); ?>','<?php echo $reg[0]["nombre_de_fantasia"]; ?>')"><i class="fa fa-plus-square"></i> Agregar Nueva Actividad</button>
                </div>
            <?php } ?>

            <div class="row mt-3">

                <div class="table-responsive">
                    <table id="default_order" class="table table-deredbor border display">

                        <thead>
                            <tr bgcolor="#808080" class="text-white" role="row">
                                <th>Fecha Inicio</th>
                                <th>Carácter</th>
                                <th>Actividad (Debe de coincidir con la actividad declarada en AFIP y DGIP)</th>
                                <th width="12%">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="BusquedaRapida">

                            <?php
                            if ($reg == "" || $reg[0]['descripcion'] == "") {

                                echo "";
                            } else {

                                $a = 1;
                                for ($i = 0; $i < sizeof($reg); $i++) {
                            ?>
                                    <tr role="row" class="odd">
                                        <td><?php echo date("d-m-Y", strtotime($reg[$i]['fecha_inicio'])); ?></td>
                                        <td><?php echo $caracter = ($reg[$i]['es_actividad_principal'] == 'SI' ? "PRINCIPAL" : "SECUNDARIO"); ?></td>
                                        <td><?php echo $reg[$i]['descripcion']; ?></td>
                                        <td>
                                            <span style="cursor: pointer;" data-placement="left" title="Ver Actividad" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalDetalleActividad" data-backdrop="static" data-keyboard="false" onClick="VerActividad('<?php echo encrypt($reg[$i]["id_rel_industria_actividad"]); ?>')"><i class="mdi mdi-eye font-22 text-danger"></i></span>

                                            <span style="cursor: pointer;" data-placement="left" title="Asignar o Editar Producto Cargado" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalAsignaProducto" onClick="AddProductoActividad('<?php echo encrypt($reg[$i]["id_rel_industria_actividad"]); ?>','<?php echo $reg[$i]["descripcion"]; ?>','<?php echo $reg[$i]["anio"]; ?>')"><i class="mdi mdi-plus-outline font-22 text-danger"></i></span>

                                            <span style="cursor: pointer;" data-placement="left" title="Actualizar Actividad" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalActividad" data-backdrop="static" data-keyboard="false" onClick="UpdateActividad('<?php echo encrypt($reg[$i]["id_rel_industria_actividad"]); ?>','<?php echo encrypt($reg[$i]["id_industria"]); ?>','<?php echo $reg[$i]["nombre_de_fantasia"]; ?>','<?php echo $reg[$i]["id_actividad"]; ?>','<?php echo $reg[$i]["nomenclatura_ib"]; ?>','<?php echo $reg[$i]["descripcion"]; ?>','<?php echo $reg[$i]["es_actividad_principal"]; ?>','<?php echo date("d-m-Y", strtotime($reg[$i]["fecha_inicio_actividad"])); ?>','<?php echo $reg[$i]["observacion"]; ?>','updateactividades')"><i class="mdi mdi-table-edit font-22 text-danger"></i></span>

                                            <span style="cursor: pointer;" title="Eliminar Actividad" onClick="EliminarActividad('<?php echo encrypt($reg[$i]["id_rel_industria_actividad"]); ?>','<?php echo encrypt($reg[$i]["id_industria"]); ?>','<?php echo encrypt("2"); ?>','<?php echo encrypt("SECCIONACTIVIDAD") ?>')"><i class="mdi mdi-delete font-22 text-danger"></i></span>
                                        </td>
                                    </tr>
                            <?php }
                            } ?>
                        </tbody>
                    </table>
                    <span class="card-subtitle">Nota:
                        <i class="mdi mdi-eye text-danger font-16"></i>(Ver Actividad) - <i class="mdi mdi-plus-outline text-danger font-16"></i>(Asignar Producto) - <i class="mdi mdi-table-edit text-danger font-16"></i>(Editar Actividad) - <i class="mdi mdi-delete text-danger font-16"></i>(Eliminar Actividad)
                    </span>
                </div>

            </div>

        <?php
            break;
        case 3: ?>

            <div class="row-horizon">
                <span class="categories" id="seccion#1" onclick="CargaFormulario('<?php echo encrypt('1'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Datos Generales</span>
                <span class="categories" id="seccion#2" onclick="CargaFormulario('<?php echo encrypt('2'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Actividad</span>
                <span class="categories selectedGat" id="seccion#3" onclick="CargaFormulario('<?php echo encrypt('3'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Insumos y Servicios</span>
                <span class="categories" id="seccion#4" onclick="CargaFormulario('<?php echo encrypt('4'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Situación de la Planta</span>
                <span class="categories" id="seccion#5" onclick="CargaFormulario('<?php echo encrypt('5'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Ventas y Facturación</span>
                <span class="categories" id="seccion#6" onclick="CargaFormulario('<?php echo encrypt('6'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Prevención y Control Ambiental</span>
                <span class="categories" id="seccion#7" onclick="CargaFormulario('<?php echo encrypt('7'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Sistemas de Calidad</span>
                <span class="categories" id="seccion#8" onclick="CargaFormulario('<?php echo encrypt('8'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Economía del Conocimiento</span>
                <span class="categories" id="seccion#9" onclick="CargaFormulario('<?php echo encrypt('9'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Revisión y Confirmación DDJJ</span>
            </div>

            <hr>

            <!-- ###################################### CONSULTA DE INSUMOS ###################################### -->

            <h3 class="card-subtitle mt-3"> Insumos</h3>

            <?php if ($reg[0]['descripcion'] == "") {
                echo "<div class='alert alert-danger'>";
                echo "<center><span class='fa fa-info-circle'></span> POR FAVOR REALICE LA CARGA DE ACTIVIDAD PARA ASIGNAR INSUMOS</center>";
                echo "</div>";
            } else { ?>
                <div class="text-right">
                    <button type="button" class="btn btn-info" data-placement="left" title="Agregar Nuevo Insumo" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalInsumo" data-backdrop="static" data-keyboard="false" onClick="AddIdActividadInsumoModal('<?php echo encrypt($reg[0]["id_industria"]); ?>','<?php echo $reg[0]["nombre_de_fantasia"]; ?>','<?php echo $reg[0]["anio"]; ?>')"><i class="fa fa-plus-square"></i> Agregar Insumos</button>
                </div>
            <?php } ?>

            <div class="row mt-3"><span class="card-subtitle">Detalle los 5 principales Insumos utilizados en el proceso de Industrialización</span>

                <div class="table-responsive">
                    <table id="default_order" class="table table-deredbor border display">

                        <thead>
                            <tr bgcolor="#808080" class="text-white" role="row">
                                <th>Insumo Utilizado</th>
                                <th>Cantidad</th>
                                <th>Unidad de Medida</th>
                                <th>Año</th>
                                <th width="12%">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="BusquedaRapida">

                            <?php
                            $insumo = new Login();
                            $insumo = $insumo->BuscarInsumosAsignados();

                            if ($insumo == "") {

                                echo "";
                            } else {

                                $a = 1;
                                for ($i = 0; $i < sizeof($insumo); $i++) {
                            ?>
                                    <tr role="row" class="odd">
                                        <td><?php echo $insumo[$i]['nominsumo']; ?></td>
                                        <td><?php echo $insumo[$i]['cantidad']; ?></td>
                                        <td><?php echo $insumo[$i]['nomunidad']; ?></td>
                                        <td><?php echo $insumo[$i]['anio']; ?></td>
                                        <td>
                                            <span style="cursor: pointer;" data-placement="left" title="Ver Insumo" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalDetalleInsumo" data-backdrop="static" data-keyboard="false" onClick="VerInsumoAsignado('<?php echo encrypt($insumo[$i]["id_rel_industria_insumos"]); ?>')"><i class="mdi mdi-eye font-22 text-danger"></i></span>

                                            <span style="cursor: pointer;" data-placement="left" title="Actualizar Insumo" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalInsumo" data-backdrop="static" data-keyboard="false" onClick="UpdateInsumoAsignado('<?php echo encrypt($insumo[$i]["id_rel_industria_insumos"]); ?>','<?php echo encrypt($insumo[$i]["id_industria"]); ?>','<?php echo $insumo[$i]["nombre_de_fantasia"]; ?>','<?php echo $insumo[$i]["insumo"]; ?>','<?php echo $insumo[$i]["nominsumo"]; ?>','<?php echo $insumo[$i]["unidad_de_medida"]; ?>','<?php echo $insumo[$i]["cantidad"]; ?>','<?php echo $insumo[$i]["es_propio"]; ?>','<?php echo $insumo[$i]["pais"]; ?>','<?php echo $insumo[$i]["npais"]; ?>','<?php echo $insumo[$i]["provincia"]; ?>','<?php echo $insumo[$i]["nprovincia"]; ?>','<?php echo $insumo[$i]["localidad"]; ?>','<?php echo $insumo[$i]["nlocalidad"]; ?>','<?php echo $insumo[$i]["motivo_importacion"] == "0" ? "" : $insumo[$i]["motivo_importacion"]; ?>','<?php echo $insumo[$i]["motivo_importacion"] == "0" ? "" : $insumo[$i]["detalles"]; ?>','<?php echo $insumo[$i]["anio"]; ?>','updateinsumo'); ActivaDetallesInsumo('<?php echo $insumo[$i]["detalles"]; ?>');"><i class="mdi mdi-table-edit font-22 text-danger"></i></span>

                                            <span style="cursor: pointer;" title="Eliminar Insumo" onClick="EliminarInsumoAsignado('<?php echo encrypt($insumo[$i]["id_rel_industria_insumos"]); ?>','<?php echo encrypt($insumo[$i]["id_industria"]); ?>','<?php echo encrypt("3"); ?>','<?php echo encrypt("SECCIONINSUMO") ?>')"><i class="mdi mdi-delete font-22 text-danger"></i></span>
                                        </td>
                                    </tr>
                            <?php }
                            } ?>
                        </tbody>
                    </table>
                    <span class="card-subtitle">Nota:
                        <i class="mdi mdi-eye text-danger font-16"></i>(Ver Insumo) - <i class="mdi mdi-table-edit text-danger font-16"></i>(Editar Insumo) - <i class="mdi mdi-delete text-danger font-16"></i>(Eliminar Insumo)
                    </span>
                </div>

            </div>

            <hr>
            <!-- ###################################### CONSULTA DE SERVICIOS BASICOS ###################################### -->

            <h3 class="card-subtitle mt-3"> Servicios Básicos</h3>

            <?php if ($reg[0]['descripcion'] == "") {
                echo "<div class='alert alert-danger'>";
                echo "<center><span class='fa fa-info-circle'></span> POR FAVOR REALICE LA CARGA DE ACTIVIDAD PARA ASIGNAR SERVICIOS BÁSICOS</center>";
                echo "</div>";
            } else { ?>
                <div class="text-right">

                    <button type="button" class="btn btn-info" data-placement="left" title="Agregar Nuevo Servicio" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalServiciosBasicos" data-backdrop="static" data-keyboard="false" onClick="AddIdServicioBasicoModal('<?php echo encrypt($reg[0]["id_industria"]); ?>','<?php echo $reg[0]["nombre_de_fantasia"]; ?>','<?php echo $reg[0]["localidad"]; ?>','<?php echo $reg[0]["anio"]; ?>')"><i class="fa fa-plus-square"></i> Agregar Servicios Básicos</button>
                </div>
            <?php } ?>

            <div class="row mt-3"><span class="card-subtitle">Servicios Básicos (Agua, Energia Electrica, Gas-oil, Gas, Telefonia, Internet.)</span>

                <div class="table-responsive">
                    <table id="default_order" class="table table-deredbor border display">

                        <thead>
                            <tr bgcolor="#808080" class="text-white" role="row">
                                <th>Servicio Utilizado</th>
                                <th>Frecuencia</th>
                                <th>Cantidad</th>
                                <th>Costo</th>
                                <th>Año</th>
                                <th width="12%">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="BusquedaRapida">

                            <?php
                            $servicio = new Login();
                            $servicio = $servicio->BuscarServiciosBasicosAsignados();

                            if ($servicio == "") {

                                echo "";
                            } else {

                                $a = 1;
                                for ($i = 0; $i < sizeof($servicio); $i++) {
                            ?>
                                    <tr role="row" class="odd">
                                        <td><?php echo $servicio[$i]['nomservicio']; ?></td>
                                        <td><?php echo $servicio[$i]['nomfrecuencia']; ?></td>
                                        <td><?php echo $servicio[$i]['cantidad_consumida']; ?></td>
                                        <td><?php echo number_format($servicio[$i]['costo_asociado'], 2, ',', '.'); ?></td>
                                        <td><?php echo $servicio[$i]['anio']; ?></td>

                                        <td>
                                            <span style="cursor: pointer;" data-placement="left" title="Ver Servicio" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalDetalleServicio" data-backdrop="static" data-keyboard="false" onClick="VerServicioAsignado('<?php echo encrypt($servicio[$i]["id_rel_industria_servicios"]); ?>')"><i class="mdi mdi-eye font-22 text-danger"></i></span>

                                            <span style="cursor: pointer;" data-placement="left" title="Actualizar Servicio" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalUpdateServicioBasico" data-backdrop="static" data-keyboard="false" onClick="UpdateServicioBasicoAsignado('<?php echo encrypt($servicio[$i]["id_rel_industria_servicios"]); ?>','<?php echo encrypt($servicio[$i]["id_industria"]); ?>','<?php echo $servicio[$i]["nombre_de_fantasia"]; ?>','<?php echo $servicio[$i]["nomservicio"]; ?>','<?php echo $servicio[$i]["costo_asociado"]; ?>','<?php echo $servicio[$i]["anio"]; ?>')"><i class="mdi mdi-table-edit font-22 text-danger"></i></span>
                                        </td>
                                    </tr>
                            <?php }
                            } ?>
                        </tbody>
                    </table>
                    <span class="card-subtitle">Nota:
                        <i class="mdi mdi-eye text-danger font-16"></i>(Ver Servicio) - <i class="mdi mdi-table-edit text-danger font-16"></i>(Editar Servicio)
                    </span>
                </div>

            </div>

            <hr>
            <!-- ###################################### CONSULTA DE COMBUSTIBLE ###################################### -->

            <h3 class="card-subtitle mt-3"> Combustible</h3>

            <?php if ($reg[0]['descripcion'] == "") {
                echo "<div class='alert alert-danger'>";
                echo "<center><span class='fa fa-info-circle'></span> POR FAVOR REALICE LA CARGA DE ACTIVIDAD PARA ASIGNAR COMBUSTIBLES</center>";
                echo "</div>";
            } else { ?>
                <div class="text-right">
                    <button type="button" class="btn btn-info" data-placement="left" title="Agregar Nuevo Combustible" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalCombustible" data-backdrop="static" data-keyboard="false" onClick="AddIdCombustibleModal('<?php echo encrypt($reg[0]["id_industria"]); ?>','<?php echo $reg[0]["nombre_de_fantasia"]; ?>','<?php echo $reg[0]["anio"]; ?>')"><i class="fa fa-plus-square"></i> Agregar Combustible</button>
                </div>
            <?php } ?>

            <div class="row mt-3"><span class="card-subtitle">Tipo de Combustible utilizado (Diesel, Leña, GNC, Nafta, Fuel Oil, Carbón, BLP, Biocombustible, Otro.)</span>

                <div class="table-responsive">
                    <table id="default_order" class="table table-deredbor border display">

                        <thead>
                            <tr bgcolor="#808080" class="text-white" role="row">
                                <th>Tipo</th>
                                <th>Frecuencia</th>
                                <th>Unidad Medida</th>
                                <th>Cantidad</th>
                                <th>Costo</th>
                                <th>Año</th>
                                <th width="12%">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="BusquedaRapida">

                            <?php
                            $servicio = new Login();
                            $servicio = $servicio->BuscarCombustibleAsignados();

                            if ($servicio == "") {

                                echo "";
                            } else {

                                $a = 1;
                                for ($i = 0; $i < sizeof($servicio); $i++) {
                            ?>
                                    <tr role="row" class="odd">
                                        <td><?php echo $servicio[$i]['nomservicio']; ?></td>
                                        <td><?php echo $servicio[$i]['nomfrecuencia']; ?></td>
                                        <td><?php echo $servicio[$i]['nomunidad']; ?></td>
                                        <td><?php echo $servicio[$i]['cantidad_consumida']; ?></td>
                                        <td><?php echo number_format($servicio[$i]['costo_asociado'], 2, ',', '.'); ?></td>
                                        <td><?php echo $servicio[$i]['anio']; ?></td>
                                        <td>
                                            <span style="cursor: pointer;" data-placement="left" title="Ver Servicio" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalDetalleServicio" data-backdrop="static" data-keyboard="false" onClick="VerServicioAsignado('<?php echo encrypt($servicio[$i]["id_rel_industria_servicios"]); ?>')"><i class="mdi mdi-eye font-22 text-danger"></i></span>

                                            <span style="cursor: pointer;" data-placement="left" title="Actualizar Servicio" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalCombustible" data-backdrop="static" data-keyboard="false" onClick="UpdateCombustibleAsignado('<?php echo encrypt($servicio[$i]["id_rel_industria_servicios"]); ?>','<?php echo encrypt($servicio[$i]["id_industria"]); ?>','<?php echo $servicio[$i]["nombre_de_fantasia"]; ?>','<?php echo $servicio[$i]["servicio"]; ?>','<?php echo $servicio[$i]["unidad_de_medida"]; ?>','<?php echo $servicio[$i]["nomfrecuencia"]; ?>','<?php echo $servicio[$i]["cantidad_consumida"]; ?>','<?php echo $servicio[$i]["costo_asociado"]; ?>','<?php echo $servicio[$i]["pais"]; ?>','<?php echo $servicio[$i]["npais"]; ?>','<?php echo $servicio[$i]["provincia"]; ?>','<?php echo $servicio[$i]["nprovincia"]; ?>','<?php echo $servicio[$i]["localidad"]; ?>','<?php echo $servicio[$i]["nlocalidad"]; ?>','<?php echo $servicio[$i]["motivo_importacion"] == "0" ? "" : $servicio[$i]["motivo_importacion"]; ?>','<?php echo $servicio[$i]["detalles"] == "0" ? "" : $servicio[$i]["detalles"]; ?>','<?php echo $servicio[$i]["anio"]; ?>','updatecombustible'); ActivaDetallesCombustible('<?php echo $servicio[$i]["detalles"]; ?>');"><i class="mdi mdi-table-edit font-22 text-danger"></i></span>

                                            <span style="cursor: pointer;" title="Eliminar Insumo" onClick="EliminarServicioAsignado('<?php echo encrypt($servicio[$i]["id_rel_industria_servicios"]); ?>','<?php echo encrypt($servicio[$i]["id_industria"]); ?>','<?php echo encrypt("3"); ?>','<?php echo encrypt("SECCIONSERVICIO") ?>')"><i class="mdi mdi-delete font-22 text-danger"></i></span>
                                        </td>
                                    </tr>
                            <?php }
                            } ?>
                        </tbody>
                    </table>
                    <span class="card-subtitle">Nota:
                        <i class="mdi mdi-eye text-danger font-16"></i>(Ver Servicio) - <i class="mdi mdi-table-edit text-danger font-16"></i>(Editar Servicio) - <i class="mdi mdi-delete text-danger font-16"></i>(Eliminar Servicio)
                    </span>
                </div>

            </div>

            <hr>
            <!-- ###################################### CONSULTA DE OTROS SERVICIOS ###################################### -->

            <h3 class="card-subtitle mt-3"> Otros Servicios</h3>

            <?php if ($reg[0]['descripcion'] == "") {
                echo "<div class='alert alert-danger'>";
                echo "<center><span class='fa fa-info-circle'></span> POR FAVOR REALICE LA CARGA DE ACTIVIDAD PARA ASIGNAR OTROS SERVICIOS</center>";
                echo "</div>";
            } else { ?>
                <div class="text-right">

                    <button type="button" class="btn btn-info" data-placement="left" title="Agregar Nuevo Servicio" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalOtros" data-backdrop="static" data-keyboard="false" onClick="AddIdOtrosModal('<?php echo encrypt($reg[0]["id_industria"]); ?>','<?php echo $reg[0]["nombre_de_fantasia"]; ?>','<?php echo $reg[0]["anio"]; ?>')"><i class="fa fa-plus-square"></i> Agregar Otros Servicios</button>
                </div>
            <?php } ?>

            <div class="row mt-3"><span class="card-subtitle">Otros Servicios Utilizados por la Planta (Servicios tercerizados, mano de obra indirecta, etc.)</span>

                <div class="table-responsive">
                    <table id="default_order" class="table table-deredbor border display">

                        <thead>
                            <tr bgcolor="#808080" class="text-white" role="row">
                                <th>Servicio Utilizado</th>
                                <th>Frecuencia</th>
                                <th>Cantidad</th>
                                <th>Costo</th>
                                <th>Año</th>
                                <th width="12%">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="BusquedaRapida">

                            <?php
                            $servicio = new Login();
                            $servicio = $servicio->BuscarOtrosServiciosAsignados();

                            if ($servicio == "") {

                                echo "";
                            } else {

                                $a = 1;
                                for ($i = 0; $i < sizeof($servicio); $i++) {
                            ?>
                                    <tr role="row" class="odd">
                                        <td><?php echo $servicio[$i]['nomservicio']; ?></td>
                                        <td><?php echo $servicio[$i]['nomfrecuencia']; ?></td>
                                        <td><?php echo $servicio[$i]['cantidad_consumida']; ?></td>
                                        <td><?php echo number_format($servicio[$i]['costo_asociado'], 2, ',', '.'); ?></td>
                                        <td><?php echo $servicio[$i]['anio']; ?></td>
                                        <td>
                                            <span style="cursor: pointer;" data-placement="left" title="Ver Servicio" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalDetalleServicio" data-backdrop="static" data-keyboard="false" onClick="VerServicioAsignado('<?php echo encrypt($servicio[$i]["id_rel_industria_servicios"]); ?>')"><i class="mdi mdi-eye font-22 text-danger"></i></span>

                                            <span style="cursor: pointer;" data-placement="left" title="Actualizar Servicio" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalOtros" data-backdrop="static" data-keyboard="false" onClick="UpdateOtrosAsignado('<?php echo encrypt($servicio[$i]["id_rel_industria_servicios"]); ?>','<?php echo encrypt($servicio[$i]["id_industria"]); ?>','<?php echo $servicio[$i]["nombre_de_fantasia"]; ?>','<?php echo $servicio[$i]["servicio"]; ?>','<?php echo $servicio[$i]["nomservicio"]; ?>','<?php echo $servicio[$i]["frecuencia_de_contratacion"]; ?>','<?php echo $servicio[$i]["cantidad_consumida"]; ?>','<?php echo $servicio[$i]["costo_asociado"]; ?>','<?php echo $servicio[$i]["pais"]; ?>','<?php echo $servicio[$i]["npais"]; ?>','<?php echo $servicio[$i]["provincia"]; ?>','<?php echo $servicio[$i]["nprovincia"]; ?>','<?php echo $servicio[$i]["localidad"]; ?>','<?php echo $servicio[$i]["nlocalidad"]; ?>','<?php echo $servicio[$i]["motivo_importacion"] == "0" ? "" : $servicio[$i]["motivo_importacion"]; ?>','<?php echo $servicio[$i]["detalles"] == "0" ? "" : $servicio[$i]["detalles"]; ?>','<?php echo $servicio[$i]["anio"]; ?>','updateotros'); ActivaDetallesOtros('<?php echo $servicio[$i]["detalles"]; ?>');"><i class="mdi mdi-table-edit font-22 text-danger"></i></span>

                                            <span style="cursor: pointer;" title="Eliminar Insumo" onClick="EliminarServicioAsignado('<?php echo encrypt($servicio[$i]["id_rel_industria_servicios"]); ?>','<?php echo encrypt($servicio[$i]["id_industria"]); ?>','<?php echo encrypt("3"); ?>','<?php echo encrypt("SECCIONSERVICIO") ?>')"><i class="mdi mdi-delete font-22 text-danger"></i></span>
                                        </td>
                                    </tr>
                            <?php }
                            } ?>
                        </tbody>
                    </table>
                    <span class="card-subtitle">Nota:
                        <i class="mdi mdi-eye text-danger font-16"></i>(Ver Servicio) - <i class="mdi mdi-table-edit text-danger font-16"></i>(Editar Servicio) - <i class="mdi mdi-delete text-danger font-16"></i>(Eliminar Servicio)
                    </span>
                </div>

            </div>

            <hr>
            <!-- ###################################### CONSULTA DE EGRESOS DEVENGADOS ###################################### -->

            <h3 class="card-subtitle mt-3"> Gastos Generados</h3>

            <?php if ($reg[0]['descripcion'] == "") {
                echo "<div class='alert alert-danger'>";
                echo "<center><span class='fa fa-info-circle'></span> POR FAVOR REALICE LA CARGA DE ACTIVIDAD PARA ASIGNAR GASTOS GENERADOS</center>";
                echo "</div>";
            } else { ?>
                <div class="text-right">

                    <button type="button" class="btn btn-info" data-placement="left" title="Agregar Nuevo Egreso" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalDevengados" data-backdrop="static" data-keyboard="false" onClick="AddIdActividadDevengadosModal('<?php echo encrypt($reg[0]["id_industria"]); ?>','<?php echo $reg[0]["nombre_de_fantasia"]; ?>','<?php echo $reg[0]["zona"]; ?>','<?php echo $reg[0]["anio"]; ?>')"><i class="fa fa-plus-square"></i> Agregar Gasto Generado</button>
                </div>
            <?php } ?>

            <div class="row mt-3"><span class="card-subtitle">Gastos Generados (Sueldos, Contribuciones, Pagos, Costo y Alquileres.)</span>

                <div class="table-responsive">
                    <table id="default_order" class="table table-deredbor border display">

                        <thead>
                            <tr bgcolor="#808080" class="text-white" role="row">
                                <th>Servicio Utilizado</th>
                                <th>Frecuencia</th>
                                <th>Cantidad</th>
                                <th>Costo</th>
                                <th>Año</th>
                                <th width="12%">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="BusquedaRapida">

                            <?php
                            $servicio = new Login();
                            $servicio = $servicio->BuscarEgresosDevengadosAsignados();

                            if ($servicio == "") {

                                echo "";
                            } else {

                                $a = 1;
                                for ($i = 0; $i < sizeof($servicio); $i++) {
                            ?>
                                    <tr role="row" class="odd">
                                        <td><?php echo $servicio[$i]['nomservicio']; ?></td>
                                        <td><?php echo $servicio[$i]['nomfrecuencia']; ?></td>
                                        <td><?php echo $servicio[$i]['cantidad_consumida']; ?></td>
                                        <td><?php echo number_format($servicio[$i]['costo_asociado'], 2, ',', '.'); ?></td>
                                        <td><?php echo $servicio[$i]['anio']; ?></td>
                                        <td>
                                            <span style="cursor: pointer;" data-placement="left" title="Ver Servicio" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalDetalleServicio" data-backdrop="static" data-keyboard="false" onClick="VerServicioAsignado('<?php echo encrypt($servicio[$i]["id_rel_industria_servicios"]); ?>')"><i class="mdi mdi-eye font-22 text-danger"></i></span>

                                            <span style="cursor: pointer;" data-placement="left" title="Actualizar Egreso" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalUpdateDevengado" data-backdrop="static" data-keyboard="false" onClick="UpdateDevengadoAsignado('<?php echo encrypt($servicio[$i]["id_rel_industria_servicios"]); ?>','<?php echo encrypt($servicio[$i]["id_industria"]); ?>','<?php echo $servicio[$i]["nombre_de_fantasia"]; ?>','<?php echo $servicio[$i]["nomservicio"]; ?>','<?php echo $servicio[$i]["costo_asociado"]; ?>','<?php echo $servicio[$i]["anio"]; ?>')"><i class="mdi mdi-table-edit font-22 text-danger"></i></span>
                                        </td>
                                    </tr>
                            <?php }
                            } ?>
                        </tbody>
                    </table>
                    <span class="card-subtitle">Nota:
                        <i class="mdi mdi-eye text-danger font-16"></i>(Ver Servicio) - <i class="mdi mdi-table-edit text-danger font-16"></i>(Editar Servicio)
                    </span>
                </div>

            </div>


        <?php
            break;
        case 4: ?>

            <div class="row-horizon">
                <span class="categories" id="seccion#1" onclick="CargaFormulario('<?php echo encrypt('1'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Datos Generales</span>
                <span class="categories" id="seccion#2" onclick="CargaFormulario('<?php echo encrypt('2'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Actividad</span>
                <span class="categories" id="seccion#3" onclick="CargaFormulario('<?php echo encrypt('3'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Insumos y Servicios</span>
                <span class="categories selectedGat" id="seccion#4" onclick="CargaFormulario('<?php echo encrypt('4'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Situación de la Planta</span>
                <span class="categories" id="seccion#5" onclick="CargaFormulario('<?php echo encrypt('5'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Ventas y Facturación</span>
                <span class="categories" id="seccion#6" onclick="CargaFormulario('<?php echo encrypt('6'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Prevención y Control Ambiental</span>
                <span class="categories" id="seccion#7" onclick="CargaFormulario('<?php echo encrypt('7'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Sistemas de Calidad</span>
                <span class="categories" id="seccion#8" onclick="CargaFormulario('<?php echo encrypt('8'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Economía del Conocimiento</span>
                <span class="categories" id="seccion#9" onclick="CargaFormulario('<?php echo encrypt('9'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Revisión y Confirmación DDJJ</span>
            </div>

            <hr>

            <!-- ###################################### CONSULTA DE SITUACION DE PLANA ###################################### -->

            <h3 class="card-subtitle mt-3"> Situación de Planta</h3>

            <?php if ($reg == "") {
                echo "<div class='alert alert-danger'>";
                echo "<center><span class='fa fa-info-circle'></span> POR FAVOR REALICE LA CARGA DE DATOS GENERALES PARA ASIGNAR SITUACIÓN DE PLANTA</center>";
                echo "</div>";
            } else { ?>
                <div class="text-right">
                    <button type="button" class="btn btn-info" data-placement="left" title="Agregar Nueva Situación de Planta" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalSituacion" data-backdrop="static" data-keyboard="false" onClick="AddIdSituacionModal('<?php echo encrypt($reg[0]["id_industria"]); ?>','<?php echo $reg[0]["nombre_de_fantasia"]; ?>','<?php echo $reg[0]["anio"]; ?>')"><i class="fa fa-plus-square"></i> Agregar Situación</button>
                </div>
            <?php } ?>

            <div class="table-responsive mt-3">
                <table id="default_order" class="table table-deredbor border display">

                    <thead>
                        <tr bgcolor="#808080" class="text-white" role="row">
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

                        <?php
                        $situacion = new Login();
                        $situacion = $situacion->BuscarSituacionPlanta();

                        if ($situacion == "") {

                            echo "";
                        } else {

                            $a = 1;
                            for ($i = 0; $i < sizeof($situacion); $i++) {
                        ?>
                                <tr role="row" class="odd">
                                    <td><?php echo $situacion[$i]['produccion_sobre_capacidad']; ?> %</td>
                                    <td><?php echo $situacion[$i]['superficie_lote']; ?> (m2)</td>
                                    <td><?php echo $situacion[$i]['superficie_planta']; ?> (m2)</td>
                                    <td><?php echo $situacion[$i]['capacidad_instalada']; ?> %</td>
                                    <td><?php echo $situacion[$i]['capacidad_ociosa']; ?> %</td>
                                    <td><?php echo $situacion[$i]['anio']; ?></td>
                                    <td>
                                        <span style="cursor: pointer;" data-placement="left" title="Ver Situación" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalDetalleSituacion" data-backdrop="static" data-keyboard="false" onClick="VerSituacion('<?php echo encrypt($situacion[$i]["id_situacion_de_planta"]); ?>')"><i class="mdi mdi-eye font-22 text-danger"></i></span>

                                        <span style="cursor: pointer;" data-placement="left" title="Actualizar Situación" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalSituacion" data-backdrop="static" data-keyboard="false" onClick="UpdateSituacion('<?php echo encrypt($situacion[$i]["id_situacion_de_planta"]); ?>','<?php echo encrypt($situacion[$i]["id_industria"]); ?>','<?php echo $situacion[$i]["nombre_de_fantasia"]; ?>','<?php echo $situacion[$i]["produccion_sobre_capacidad"]; ?>','<?php echo $situacion[$i]["superficie_lote"]; ?>','<?php echo $situacion[$i]["superficie_planta"]; ?>','<?php echo $situacion[$i]["es_zona_industrial"]; ?>','<?php echo $situacion[$i]["declara_inversion"]; ?>','<?php echo $situacion[$i]["inversion_anual"]; ?>','<?php echo $situacion[$i]["inversion_activo_fijo"]; ?>','<?php echo $situacion[$i]["capacidad_instalada"]; ?>','<?php echo $situacion[$i]["capacidad_ociosa"]; ?>','<?php echo $situacion[$i]["anio"]; ?>','updatesituacion'); ActivaDeclaraInversion('<?php echo $situacion[$i]["declara_inversion"]; ?>');"><i class="mdi mdi-table-edit font-22 text-danger"></i></span>

                                        <span style="cursor: pointer;" title="Eliminar Situación" onClick="EliminarSituacion('<?php echo encrypt($situacion[$i]["id_situacion_de_planta"]); ?>','<?php echo encrypt($situacion[$i]["id_industria"]); ?>','<?php echo encrypt("4"); ?>','<?php echo encrypt("SECCIONSITUACION") ?>')"><i class="mdi mdi-delete font-22 text-danger"></i></span>
                                    </td>
                                </tr>
                        <?php }
                        } ?>
                    </tbody>
                </table>
                <span class="card-subtitle">Nota:
                    <i class="mdi mdi-eye text-danger font-16"></i>(Ver Situación) - <i class="mdi mdi-table-edit text-danger font-16"></i>(Editar Situación) - <i class="mdi mdi-delete text-danger font-16"></i>(Eliminar Situación)
                </span>
            </div>

            </div>

            <hr>
            <!-- ###################################### CONSULTA DE OCIOSIDAD ###################################### -->

            <h3 class="card-subtitle mt-3"> Motivo Ociosidad</h3>


            <?php if ($reg == "") {
                echo "<div class='alert alert-danger'>";
                echo "<center><span class='fa fa-info-circle'></span> POR FAVOR REALICE LA CARGA DE DATOS GENERALES PARA ASIGNAR MOTIVO OCIOSIDAD</center>";
                echo "</div>";
            } else { ?>
                <div class="text-right">
                    <button type="button" class="btn btn-info" data-placement="left" title="Agregar Nuevo Motivo Ociosidad" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalMotivo" data-backdrop="static" data-keyboard="false" onClick="AddIdMotivoModal('<?php echo encrypt($reg[0]["id_industria"]); ?>','<?php echo $reg[0]["nombre_de_fantasia"]; ?>','<?php echo $reg[0]["anio"]; ?>')"><i class="fa fa-plus-square"></i> Agregar Motivo Ociosidad</button>
                </div>
            <?php } ?>

            <div class="row mt-3"><span class="card-subtitle">Motivo Ociosidad (Ej: Falta de Maquinarias, Falta de Personal, Alta Carga Impositiva, Costo Energía Eléctrica, otros)</span>

                <div class="table-responsive">
                    <table id="default_order" class="table table-deredbor border display">

                        <thead>
                            <tr bgcolor="#808080" class="text-white" role="row">
                                <th>Descripción de Motivo Ociosidad</th>
                                <th>Año</th>
                                <th width="12%">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="BusquedaRapida">

                            <?php
                            $motivo = new Login();
                            $motivo = $motivo->BuscarMotivoOciosidad();

                            if ($motivo == "") {

                                echo "";
                            } else {

                                $a = 1;
                                for ($i = 0; $i < sizeof($motivo); $i++) {
                            ?>
                                    <tr role="row" class="odd">
                                        <td><?php echo $motivo[$i]['nommotivo']; ?></td>
                                        <td><?php echo $motivo[$i]['anio']; ?></td>
                                        <td>
                                            <span style="cursor: pointer;" data-placement="left" title="Ver Motivo Ociosidad" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalDetalleMotivo" data-backdrop="static" data-keyboard="false" onClick="VerMotivo('<?php echo encrypt($motivo[$i]["id_rel_industria_motivo_ociosidad"]); ?>')"><i class="mdi mdi-eye font-22 text-danger"></i></span>

                                            <span style="cursor: pointer;" data-placement="left" title="Actualizar Motivo Ociosidad" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalMotivo" data-backdrop="static" data-keyboard="false" onClick="UpdateMotivo('<?php echo encrypt($motivo[$i]["id_rel_industria_motivo_ociosidad"]); ?>','<?php echo encrypt($motivo[$i]["id_industria"]); ?>','<?php echo $motivo[$i]["nombre_de_fantasia"]; ?>','<?php echo $motivo[$i]["motivo_ociosidad"]; ?>','<?php echo $motivo[$i]["nommotivo"]; ?>','<?php echo $motivo[$i]["anio"]; ?>','updatemotivo')"><i class="mdi mdi-table-edit font-22 text-danger"></i></span>

                                            <span style="cursor: pointer;" title="Eliminar Motivo Ociosidad" onClick="EliminarMotivo('<?php echo encrypt($motivo[$i]["id_rel_industria_motivo_ociosidad"]); ?>','<?php echo encrypt($motivo[$i]["id_industria"]); ?>','<?php echo encrypt("4"); ?>','<?php echo encrypt("SECCIONMOTIVO") ?>')"><i class="mdi mdi-delete font-22 text-danger"></i></span>
                                        </td>
                                    </tr>
                            <?php }
                            } ?>
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

            <?php if ($reg == "") {
                echo "<div class='alert alert-danger'>";
                echo "<center><span class='fa fa-info-circle'></span> POR FAVOR REALICE LA CARGA DE DATOS GENERALES PARA ASIGNAR PERSONAL OCUPADO</center>";
                echo "</div>";
            } else { ?>
                <div class="text-right">
                    <button type="button" class="btn btn-info" data-placement="left" title="Agregar Personal Ocupado" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalPersonal" data-backdrop="static" data-keyboard="false" onClick="AddIdPersonalModal('<?php echo encrypt($reg[0]["id_industria"]); ?>','<?php echo $reg[0]["nombre_de_fantasia"]; ?>','<?php echo $reg[0]["anio"]; ?>')"><i class="fa fa-plus-square"></i> Agregar Personal Ocupado</button>
                </div>
            <?php } ?>

            <div class="table-responsive mt-3">
                <table id="default_order" class="table table-deredbor border display">

                    <thead>
                        <tr bgcolor="#808080" class="text-white" role="row">
                            <th>Rol de Trabajador</th>
                            <th>Condición Laboral</th>
                            <th>Femenino</th>
                            <th>Masculino</th>
                            <th>Año</th>
                            <th width="12%">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="BusquedaRapida">

                        <?php
                        $personal = new Login();
                        $personal = $personal->BuscarPersonalOcupado();

                        if ($personal == "") {

                            echo "";
                        } else {

                            $a = 1;
                            for ($i = 0; $i < sizeof($personal); $i++) {
                        ?>
                                <tr role="row" class="odd">
                                    <td><?php echo $personal[$i]['nomrol']; ?></td>
                                    <td><?php echo $personal[$i]['detalles']; ?></td>
                                    <td><?php echo $personal[$i]['m']; ?></td>
                                    <td><?php echo $personal[$i]['f']; ?></td>
                                    <td><?php echo $personal[$i]['anio']; ?></td>
                                    <td>
                                        <span style="cursor: pointer;" data-placement="left" title="Ver Personal Ocupado" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalDetallePersonal" data-backdrop="static" data-keyboard="false" onClick="VerPersonal('<?php echo encrypt($personal[$i]["industria"]); ?>','<?php echo encrypt($personal[$i]["rol_trabajador"]); ?>','<?php echo encrypt($personal[$i]["anio"]); ?>')"><i class="mdi mdi-eye font-22 text-danger"></i></span>

                                        <span style="cursor: pointer;" data-placement="left" title="Actualizar Personal Ocupado" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalUpdatePersonal" data-backdrop="static" data-keyboard="false" onClick="UpdatePersonal('<?php echo encrypt($personal[$i]["id_industria"]); ?>','<?php echo $personal[$i]["nombre_de_fantasia"]; ?>','<?php echo encrypt($personal[$i]["rol_trabajador"]); ?>','<?php echo $personal[$i]["nomrol"]; ?>','<?php echo encrypt($personal[$i]["anio"]); ?>')"><i class="mdi mdi-table-edit font-22 text-danger"></i></span>
                                    </td>
                                </tr>
                        <?php }
                        } ?>
                    </tbody>
                </table>
                <span class="card-subtitle">Nota:
                    <i class="mdi mdi-eye text-danger font-16"></i>(Ver Personal) - <i class="mdi mdi-table-edit text-danger font-16"></i>(Editar Personal)
                </span>
            </div>

            </div>

            <hr>

        <?php
            break;
        case 5: ?>

            <div class="row-horizon">
                <span class="categories" id="seccion#1" onclick="CargaFormulario('<?php echo encrypt('1'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Datos Generales</span>
                <span class="categories" id="seccion#2" onclick="CargaFormulario('<?php echo encrypt('2'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Actividad</span>
                <span class="categories" id="seccion#3" onclick="CargaFormulario('<?php echo encrypt('3'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Insumos y Servicios</span>
                <span class="categories" id="seccion#4" onclick="CargaFormulario('<?php echo encrypt('4'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Situación de la Planta</span>
                <span class="categories selectedGat" id="seccion#5" onclick="CargaFormulario('<?php echo encrypt('5'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Ventas y Facturación</span>
                <span class="categories" id="seccion#6" onclick="CargaFormulario('<?php echo encrypt('6'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Prevención y Control Ambiental</span>
                <span class="categories" id="seccion#7" onclick="CargaFormulario('<?php echo encrypt('7'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Sistemas de Calidad</span>
                <span class="categories" id="seccion#8" onclick="CargaFormulario('<?php echo encrypt('8'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Economía del Conocimiento</span>
                <span class="categories" id="seccion#9" onclick="CargaFormulario('<?php echo encrypt('9'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Revisión y Confirmación DDJJ</span>
            </div>

            <hr>

            <!-- ###################################### CONSULTA DE VENTAS ###################################### -->

            <h3 class="card-subtitle mt-3"> Ventas</h3>

            <?php if ($reg == "") {
                echo "<div class='alert alert-danger'>";
                echo "<center><span class='fa fa-info-circle'></span> POR FAVOR REALICE LA CARGA DE DATOS GENERALES PARA ASIGNAR VENTAS</center>";
                echo "</div>";
            } else { ?>
                <div class="text-right">
                    <button type="button" class="btn btn-info" data-placement="left" title="Agregar Nueva Venta" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalVenta" data-backdrop="static" data-keyboard="false" onClick="AddIdVentaModal('<?php echo encrypt($reg[0]["id_industria"]); ?>','<?php echo $reg[0]["nombre_de_fantasia"]; ?>','<?php echo $reg[0]["anio"]; ?>')"><i class="fa fa-plus-square"></i> Agregar Venta</button>
                </div>
            <?php } ?>

            <div class="table-responsive mt-3">
                <table id="default_order" class="table table-deredbor border display">

                    <thead>
                        <tr bgcolor="#808080" class="text-white" role="row">
                            <th>Clasificación de Venta</th>
                            <th>En la Provincia</th>
                            <th>Otras Provincias</th>
                            <th>En el Pais</th>
                            <th>Otros Paises</th>
                            <th>Año</th>
                            <th width="12%">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="BusquedaRapida">

                        <?php
                        $venta = new Login();
                        $venta = $venta->BuscarVentas();

                        if ($venta == "") {

                            echo "";
                        } else {

                            $a = 1;
                            for ($i = 0; $i < sizeof($venta); $i++) {
                        ?>
                                <tr role="row" class="odd">
                                    <td><?php echo $venta[$i]['nomclasificacion']; ?></td>
                                    <td><?php echo $venta[$i]['provincia'] == '0' ? "**********" : $venta[$i]['nprovincia']; ?></td>
                                    <td><?php echo $venta[$i]['provincia2'] == '0' ? "**********" : $venta[$i]['nprovincia2']; ?></td>
                                    <td><?php echo $venta[$i]['pais'] == '0' ? "**********" : $venta[$i]['npais']; ?></td>
                                    <td><?php echo $venta[$i]['pais2'] == '0' ? "**********" : $venta[$i]['npais2']; ?></td>
                                    <td><?php echo $venta[$i]['anio']; ?></td>
                                    <td>
                                        <span style="cursor: pointer;" data-placement="left" title="Ver Venta" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalDetalleVenta" data-backdrop="static" data-keyboard="false" onClick="VerVenta('<?php echo encrypt($venta[$i]["id_destino_ventas"]); ?>')"><i class="mdi mdi-eye font-22 text-danger"></i></span>

                                        <span style="cursor: pointer;" data-placement="left" title="Actualizar Venta" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalUpdateVenta" data-backdrop="static" data-keyboard="false" onClick="UpdateVenta('<?php echo encrypt($venta[$i]["id_destino_ventas"]); ?>','<?php echo encrypt($venta[$i]["id_industria"]); ?>','<?php echo $venta[$i]["nombre_de_fantasia"]; ?>','<?php echo $venta[$i]["nomclasificacion"]; ?>','<?php echo $venta[$i]["provincia"]; ?>','<?php echo $venta[$i]["otro_pais"]; ?>','<?php echo $venta[$i]["anio"]; ?>')"><i class="mdi mdi-table-edit font-22 text-danger"></i></span>
                                    </td>
                                </tr>
                        <?php }
                        } ?>
                    </tbody>
                </table>
                <span class="card-subtitle">Nota:
                    <i class="mdi mdi-eye text-danger font-16"></i>(Ver Venta) - <i class="mdi mdi-table-edit text-danger font-16"></i>(Editar Venta)
                </span>
            </div>

            </div>

            <hr>

            <!-- ###################################### CONSULTA DE FACTURACION ###################################### -->

            <h3 class="card-subtitle mt-3"> Facturación </h3>

            <?php if ($reg == "") {
                echo "<div class='alert alert-danger'>";
                echo "<center><span class='fa fa-info-circle'></span> POR FAVOR REALICE LA CARGA DE DATOS GENERALES PARA ASIGNAR FACTURACIÓN</center>";
                echo "</div>";
            } else { ?>
                <div class="text-right">
                    <button type="button" class="btn btn-info" data-placement="left" title="Agregar Facturación" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalFacturacion" data-backdrop="static" data-keyboard="false" onClick="AddIdFacturacionModal('<?php echo encrypt($reg[0]["id_industria"]); ?>','<?php echo $reg[0]["nombre_de_fantasia"]; ?>','<?php echo $reg[0]["anio"]; ?>'); VerificaIngreso('<?php echo encrypt("0"); ?>');"><i class="fa fa-plus-square"></i> Agregar Facturación</button>
                </div>
            <?php } ?>

            <div class="table-responsive mt-3">
                <table id="default_order" class="table table-deredbor border display">

                    <thead>
                        <tr bgcolor="#808080" class="text-white" role="row">
                            <th>Facturación Anual en Pesos Arg.</th>
                            <th>Facturación Anual en USD</th>
                            <th>Porc. Mercado Interno</th>
                            <th>Porc. Mercado Externo</th>
                            <th>Nivel de Ingresos</th>
                            <th>Año</th>
                            <th width="12%">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="BusquedaRapida">

                        <?php
                        $facturacion = new Login();
                        $facturacion = $facturacion->BuscarFacturacion();

                        if ($facturacion == "") {

                            echo "";
                        } else {

                            $a = 1;
                            for ($i = 0; $i < sizeof($facturacion); $i++) {
                        ?>
                                <tr role="row" class="odd">
                                    <td>$ <?php echo $facturacion[$i]['prevision_ingresos_anio_corriente']; ?></td>
                                    <td>USD <?php echo $facturacion[$i]['prevision_ingresos_anio_corriente_dolares']; ?></td>
                                    <td><?php echo $facturacion[$i]['porcentaje_prevision_mercado_interno']; ?> %</td>
                                    <td><?php echo $facturacion[$i]['porcentaje_prevision_mercado_externo']; ?> %</td>
                                    <td><?php echo $facturacion[$i]['categoria'] . " $ (" . number_format($facturacion[$i]['monto_minimo'], 2, ',', '.') . " - $ " . number_format($facturacion[$i]['monto_maximo'], 2, ',', '.') . ")"; ?></td>
                                    <td><?php echo $facturacion[$i]['anio']; ?></td>
                                    <td>
                                        <span style="cursor: pointer;" data-placement="left" title="Ver Facturación" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalDetalleFacturacion" data-backdrop="static" data-keyboard="false" onClick="VerFacturacion('<?php echo encrypt($facturacion[$i]["id_facturacion"]); ?>')"><i class="mdi mdi-eye font-22 text-danger"></i></span>

                                        <span style="cursor: pointer;" data-placement="left" title="Actualizar Facturación" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalFacturacion" data-backdrop="static" data-keyboard="false" onClick="UpdateFacturacion('<?php echo encrypt($facturacion[$i]["id_facturacion"]); ?>','<?php echo encrypt($facturacion[$i]["id_industria"]); ?>','<?php echo $facturacion[$i]["nombre_de_fantasia"]; ?>','<?php echo $facturacion[$i]["prevision_ingresos_anio_corriente"]; ?>','<?php echo $facturacion[$i]["prevision_ingresos_anio_corriente_dolares"]; ?>','<?php echo $facturacion[$i]["porcentaje_prevision_mercado_interno"]; ?>','<?php echo $facturacion[$i]["porcentaje_prevision_mercado_externo"]; ?>','<?php echo $facturacion[$i]["anio"]; ?>','updatefacturacion'); VerificaIngreso('<?php echo encrypt($facturacion[$i]["id_facturacion"]); ?>');"><i class="mdi mdi-table-edit font-22 text-danger"></i></span>

                                        <span style="cursor: pointer;" title="Eliminar Facturación" onClick="EliminarFacturacion('<?php echo encrypt($facturacion[$i]["id_facturacion"]); ?>','<?php echo encrypt($facturacion[$i]["id_industria"]); ?>','<?php echo encrypt("5"); ?>','<?php echo encrypt("SECCIONFACTURACION") ?>')"><i class="mdi mdi-delete font-22 text-danger"></i></span>
                                    </td>
                                </tr>
                        <?php }
                        } ?>
                    </tbody>
                </table>
                <span class="card-subtitle">Nota:
                    <i class="mdi mdi-eye text-danger font-16"></i>(Ver Facturación) - <i class="mdi mdi-table-edit text-danger font-16"></i>(Editar Facturación) - <i class="mdi mdi-delete text-danger font-16"></i>(Eliminar Facturación)
                </span>
            </div>

            </div>

            <hr>

        <?php
            break;
        case 6: ?>

            <div class="row-horizon">
                <span class="categories" id="seccion#1" onclick="CargaFormulario('<?php echo encrypt('1'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Datos Generales</span>
                <span class="categories" id="seccion#2" onclick="CargaFormulario('<?php echo encrypt('2'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Actividad</span>
                <span class="categories" id="seccion#3" onclick="CargaFormulario('<?php echo encrypt('3'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Insumos y Servicios</span>
                <span class="categories" id="seccion#4" onclick="CargaFormulario('<?php echo encrypt('4'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Situación de la Planta</span>
                <span class="categories" id="seccion#5" onclick="CargaFormulario('<?php echo encrypt('5'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Ventas y Facturación</span>
                <span class="categories selectedGat" id="seccion#6" onclick="CargaFormulario('<?php echo encrypt('6'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Prevención y Control Ambiental</span>
                <span class="categories" id="seccion#7" onclick="CargaFormulario('<?php echo encrypt('7'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Sistemas de Calidad</span>
                <span class="categories" id="seccion#8" onclick="CargaFormulario('<?php echo encrypt('8'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Economía del Conocimiento</span>
                <span class="categories" id="seccion#9" onclick="CargaFormulario('<?php echo encrypt('9'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Revisión y Confirmación DDJJ</span>
            </div>

            <hr>

            <!-- ###################################### CONSULTA DE EFLUENTES ###################################### -->

            <h3 class="card-subtitle mt-3"> Efluentes</h3>

            <?php if ($reg == "") {
                echo "<div class='alert alert-danger'>";
                echo "<center><span class='fa fa-info-circle'></span> POR FAVOR REALICE LA CARGA DE DATOS GENERALES PARA ASIGNAR EFLUENTES</center>";
                echo "</div>";
            } else { ?>
                <div class="text-right">
                    <button type="button" class="btn btn-info" data-placement="left" title="Agregar Nuevo Efluente" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalEfluente" data-backdrop="static" data-keyboard="false" onClick="AddIdEfluenteModal('<?php echo encrypt($reg[0]["id_industria"]); ?>','<?php echo $reg[0]["nombre_de_fantasia"]; ?>','<?php echo $reg[0]["anio"]; ?>')"><i class="fa fa-plus-square"></i> Agregar Efluente</button>
                </div>
            <?php } ?>

            <div class="row mt-3"><span class="card-subtitle">Indique los efluentes industriales involucrados en la actividad declarada</span>

                <div class="table-responsive">
                    <table id="default_order" class="table table-deredbor border display">

                        <thead>
                            <tr bgcolor="#808080" class="text-white" role="row">
                                <th>Efluente</th>
                                <th>Tratamiento Residuo</th>
                                <th>Destino Final</th>
                                <th>Año</th>
                                <th width="12%">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="BusquedaRapida">

                            <?php
                            $efluente = new Login();
                            $efluente = $efluente->BuscarEfluente();

                            if ($efluente == "") {

                                echo "";
                            } else {

                                $a = 1;
                                for ($i = 0; $i < sizeof($efluente); $i++) {
                            ?>
                                    <tr role="row" class="odd">
                                        <td><?php echo $efluente[$i]['nomefluente']; ?></td>
                                        <td><?php echo $efluente[$i]['tratamiento_residuo']; ?></td>
                                        <td><?php echo $efluente[$i]['destino']; ?></td>
                                        <td><?php echo $efluente[$i]['anio']; ?></td>
                                        <td>
                                            <span style="cursor: pointer;" data-placement="left" title="Ver Efluente" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalDetalleEfluente" data-backdrop="static" data-keyboard="false" onClick="VerEfluente('<?php echo encrypt($efluente[$i]["id_rel_industria_efluente"]); ?>')"><i class="mdi mdi-eye font-22 text-danger"></i></span>

                                            <span style="cursor: pointer;" data-placement="left" title="Actualizar Efluente" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalEfluente" data-backdrop="static" data-keyboard="false" onClick="UpdateEfluente('<?php echo encrypt($efluente[$i]["id_rel_industria_efluente"]); ?>','<?php echo encrypt($efluente[$i]["id_industria"]); ?>','<?php echo $efluente[$i]["nombre_de_fantasia"]; ?>','<?php echo $efluente[$i]["efluente"]; ?>','<?php echo $efluente[$i]["nomefluente"]; ?>','<?php echo $efluente[$i]["tratamiento_residuo"]; ?>','<?php echo $efluente[$i]["destino"]; ?>','<?php echo $efluente[$i]["anio"]; ?>','updateefluente');"><i class="mdi mdi-table-edit font-22 text-danger"></i></span>

                                            <span style="cursor: pointer;" title="Eliminar Efluente" onClick="EliminarEfluente('<?php echo encrypt($efluente[$i]["id_rel_industria_efluente"]); ?>','<?php echo encrypt($efluente[$i]["id_industria"]); ?>','<?php echo encrypt("6"); ?>','<?php echo encrypt("SECCIONEFLUENTE") ?>')"><i class="mdi mdi-delete font-22 text-danger"></i></span>
                                        </td>
                                    </tr>
                            <?php }
                            } ?>
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

            <?php if ($reg == "") {
                echo "<div class='alert alert-danger'>";
                echo "<center><span class='fa fa-info-circle'></span> POR FAVOR REALICE LA CARGA DE DATOS GENERALES PARA ASIGNAR CERTIFICADOS</center>";
                echo "</div>";
            } else { ?>
                <div class="text-right">
                    <button type="button" class="btn btn-info" data-placement="left" title="Agregar Certificados" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalCertificado" data-backdrop="static" data-keyboard="false" onClick="AddIdCertificadoModal('<?php echo encrypt($reg[0]["id_industria"]); ?>','<?php echo $reg[0]["nombre_de_fantasia"]; ?>','<?php echo $reg[0]["anio"]; ?>')"><i class="fa fa-plus-square"></i> Agregar Certificado</button>
                </div>
            <?php } ?>

            <div class="table-responsive mt-3">
                <table id="default_order" class="table table-deredbor border display">

                    <thead>
                        <tr bgcolor="#808080" class="text-white" role="row">
                            <th>Documentación</th>
                            <th>Estado</th>
                            <th>Fecha Inicial</th>
                            <th>Fecha Final</th>
                            <th>Año</th>
                            <th width="12%">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="BusquedaRapida">

                        <?php
                        $certificado = new Login();
                        $certificado = $certificado->BuscarCertificado();

                        if ($certificado == "") {

                            echo "";
                        } else {

                            $a = 1;
                            for ($i = 0; $i < sizeof($certificado); $i++) {
                        ?>
                                <tr role="row" class="odd">
                                    <td><?php echo $certificado[$i]['nomcertificado']; ?></td>
                                    <td><?php echo $certificado[$i]['estado_certificado']; ?></td>
                                    <td><?php echo $certificado[$i]['inicio_certificado'] == '0000-00-00' ? "**********" : date("d-m-Y", strtotime($certificado[$i]['inicio_certificado'])); ?></td>
                                    <td><?php echo $certificado[$i]['fin_certificado'] == '0000-00-00' ? "**********" : date("d-m-Y", strtotime($certificado[$i]['fin_certificado'])); ?></td>
                                    <td><?php echo $certificado[$i]['anio']; ?></td>
                                    <td>
                                        <span style="cursor: pointer;" data-placement="left" title="Ver Certificado" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalDetalleCertificado" data-backdrop="static" data-keyboard="false" onClick="VerCertificado('<?php echo encrypt($certificado[$i]["id_rel_industria_certificado"]); ?>')"><i class="mdi mdi-eye font-22 text-danger"></i></span>

                                        <span style="cursor: pointer;" data-placement="left" title="Actualizar Certificado" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalUpdateCertificado" data-backdrop="static" data-keyboard="false" onClick="UpdateCertificado('<?php echo encrypt($certificado[$i]["id_rel_industria_certificado"]); ?>','<?php echo encrypt($certificado[$i]["id_industria"]); ?>','<?php echo $certificado[$i]["nombre_de_fantasia"]; ?>','<?php echo $certificado[$i]["nomcertificado"]; ?>','<?php echo $certificado[$i]["estado_certificado"]; ?>','<?php echo $certificado[$i]['inicio_certificado'] == '0000-00-00' ? "" : date("d-m-Y", strtotime($certificado[$i]['inicio_certificado'])); ?>','<?php echo $certificado[$i]['fin_certificado'] == '0000-00-00' ? "" : date("d-m-Y", strtotime($certificado[$i]['fin_certificado'])); ?>','<?php echo $certificado[$i]["anio"]; ?>'); ActivaRadioCertificado('<?php echo $certificado[$i]["estado_certificado"]; ?>');"><i class="mdi mdi-table-edit font-22 text-danger"></i></span>

                                        <span style="cursor: pointer;" title="Eliminar Certificado" onClick="EliminarCertificado('<?php echo encrypt($certificado[$i]["id_rel_industria_certificado"]); ?>','<?php echo encrypt($certificado[$i]["id_industria"]); ?>','<?php echo encrypt("6"); ?>','<?php echo encrypt("SECCIONCERTIFICADO") ?>')"><i class="mdi mdi-delete font-22 text-danger"></i></span>
                                    </td>
                                </tr>
                        <?php }
                        } ?>
                    </tbody>
                </table>
                <span class="card-subtitle">Nota:
                    <i class="mdi mdi-eye text-danger font-16"></i>(Ver Certificado) - <i class="mdi mdi-table-edit text-danger font-16"></i>(Editar Certificado) - <i class="mdi mdi-delete text-danger font-16"></i>(Eliminar Certificado)
                </span>
            </div>

            </div>

            <hr>

        <?php
            break;
        case 7: ?>

            <div class="row-horizon">
                <span class="categories" id="seccion#1" onclick="CargaFormulario('<?php echo encrypt('1'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Datos Generales</span>
                <span class="categories" id="seccion#2" onclick="CargaFormulario('<?php echo encrypt('2'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Actividad</span>
                <span class="categories" id="seccion#3" onclick="CargaFormulario('<?php echo encrypt('3'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Insumos y Servicios</span>
                <span class="categories" id="seccion#4" onclick="CargaFormulario('<?php echo encrypt('4'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Situación de la Planta</span>
                <span class="categories" id="seccion#5" onclick="CargaFormulario('<?php echo encrypt('5'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Ventas y Facturación</span>
                <span class="categories" id="seccion#6" onclick="CargaFormulario('<?php echo encrypt('6'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Prevención y Control Ambiental</span>
                <span class="categories selectedGat" id="seccion#7" onclick="CargaFormulario('<?php echo encrypt('7'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Sistemas de Calidad</span>
                <span class="categories" id="seccion#8" onclick="CargaFormulario('<?php echo encrypt('8'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Economía del Conocimiento</span>
                <span class="categories" id="seccion#9" onclick="CargaFormulario('<?php echo encrypt('9'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Revisión y Confirmación DDJJ</span>
            </div>

            <hr>

            <!-- ###################################### CONSULTA DE SISTEMA DE CALIDAD ###################################### -->

            <h3 class="card-subtitle mt-3"> Sistemas de Calidad </h3>

            <?php if ($reg == "") {
                echo "<div class='alert alert-danger'>";
                echo "<center><span class='fa fa-info-circle'></span> POR FAVOR REALICE LA CARGA DE DATOS GENERALES PARA ASIGNAR NORMAS DE CALIDAD</center>";
                echo "</div>";
            } else { ?>
                <div class="text-right">
                    <button type="button" class="btn btn-info" data-placement="left" title="Agregar Norma de Calidad" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalSistema" data-backdrop="static" data-keyboard="false" onClick="AddIdSistemaModal('<?php echo encrypt($reg[0]["id_industria"]); ?>','<?php echo $reg[0]["nombre_de_fantasia"]; ?>','<?php echo $reg[0]["anio"]; ?>')"><i class="fa fa-plus-square"></i> Agregar Norma de Calidad</button>
                </div>
            <?php } ?>

            <div class="row mt-3"><span class="card-subtitle">Identifique, si tuviere, las Normas de Calidad Nacionales y/o Internacionales implementadas</span>

                <div class="table-responsive">
                    <table id="default_order" class="table table-deredbor border display">

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

                            <?php
                            $sistema = new Login();
                            $sistema = $sistema->BuscarSistema();

                            if ($sistema == "") {

                                echo "";
                            } else {

                                $a = 1;
                                for ($i = 0; $i < sizeof($sistema); $i++) {
                            ?>
                                    <tr role="row" class="odd">
                                        <td><?php echo $a++; ?></td>
                                        <td><?php echo $sistema[$i]['nomsistema']; ?></td>
                                        <td><?php echo $sistema[$i]['estado_sistema']; ?></td>
                                        <td><?php echo $sistema[$i]['inicio_sistema'] == '0000-00-00' ? "**********" : date("d-m-Y", strtotime($sistema[$i]['inicio_sistema'])); ?></td>
                                        <td><?php echo $sistema[$i]['fin_sistema'] == '0000-00-00' ? "**********" : date("d-m-Y", strtotime($sistema[$i]['fin_sistema'])); ?></td>
                                        <td><?php echo $sistema[$i]['anio']; ?></td>
                                        <td>
                                            <span style="cursor: pointer;" data-placement="left" title="Ver Sistema" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalDetalleSistema" data-backdrop="static" data-keyboard="false" onClick="VerSistema('<?php echo encrypt($sistema[$i]["id_rel_industria_sistema"]); ?>')"><i class="mdi mdi-eye font-22 text-danger"></i></span>

                                            <span style="cursor: pointer;" data-placement="left" title="Actualizar Sistema" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalUpdateSistema" data-backdrop="static" data-keyboard="false" onClick="UpdateSistema('<?php echo encrypt($sistema[$i]["id_rel_industria_sistema"]); ?>','<?php echo encrypt($sistema[$i]["id_industria"]); ?>','<?php echo $sistema[$i]["nombre_de_fantasia"]; ?>','<?php echo $sistema[$i]["nomsistema"]; ?>','<?php echo $sistema[$i]["estado_sistema"]; ?>','<?php echo $sistema[$i]['inicio_sistema'] == '0000-00-00' ? "" : date("d-m-Y", strtotime($sistema[$i]['inicio_sistema'])); ?>','<?php echo $sistema[$i]['fin_sistema'] == '0000-00-00' ? "" : date("d-m-Y", strtotime($sistema[$i]['fin_sistema'])); ?>','<?php echo $sistema[$i]["anio"]; ?>'); ActivaRadioSistema('<?php echo $sistema[$i]["estado_sistema"]; ?>');"><i class="mdi mdi-table-edit font-22 text-danger"></i></span>

                                            <span style="cursor: pointer;" title="Eliminar Sistema" onClick="EliminarSistema('<?php echo encrypt($sistema[$i]["id_rel_industria_sistema"]); ?>','<?php echo encrypt($sistema[$i]["id_industria"]); ?>','<?php echo encrypt("7"); ?>','<?php echo encrypt("SECCIONSISTEMA") ?>')"><i class="mdi mdi-delete font-22 text-danger"></i></span>
                                        </td>
                                    </tr>
                            <?php }
                            } ?>
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

            <?php if ($reg == "") {
                echo "<div class='alert alert-danger'>";
                echo "<center><span class='fa fa-info-circle'></span> POR FAVOR REALICE LA CARGA DE DATOS GENERALES PARA ASIGNAR PROMOCIONES</center>";
                echo "</div>";
            } else { ?>
                <div class="text-right">
                    <button type="button" class="btn btn-info" data-placement="left" title="Agregar Promoción" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalPromocion" data-backdrop="static" data-keyboard="false" onClick="AddIdPromocionModal('<?php echo encrypt($reg[0]["id_industria"]); ?>','<?php echo $reg[0]["nombre_de_fantasia"]; ?>','<?php echo $reg[0]["anio"]; ?>')"><i class="fa fa-plus-square"></i> Agregar Promoción</button>
                </div>
            <?php } ?>

            <div class="table-responsive mt-3">
                <table id="default_order" class="table table-deredbor border display">

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

                        <?php
                        $promocion = new Login();
                        $promocion = $promocion->BuscarPromociones();

                        if ($promocion == "") {

                            echo "";
                        } else {

                            $a = 1;
                            for ($i = 0; $i < sizeof($promocion); $i++) {
                        ?>
                                <tr role="row" class="odd">
                                    <td><?php echo $a++; ?></td>
                                    <td><?php echo $promocion[$i]['nompromocion']; ?></td>
                                    <td><?php echo $promocion[$i]['estado_promocion']; ?></td>
                                    <td><?php echo $promocion[$i]['inicio_promocion'] == '0000-00-00' ? "**********" : date("d-m-Y", strtotime($promocion[$i]['inicio_promocion'])); ?></td>
                                    <td><?php echo $promocion[$i]['fin_promocion'] == '0000-00-00' ? "**********" : date("d-m-Y", strtotime($promocion[$i]['fin_promocion'])); ?></td>
                                    <td><?php echo $promocion[$i]['anio']; ?></td>
                                    <td>
                                        <span style="cursor: pointer;" data-placement="left" title="Ver Promoción" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalDetallePromocion" data-backdrop="static" data-keyboard="false" onClick="VerPromocion('<?php echo encrypt($promocion[$i]["id_rel_industria_promocion_industrial"]); ?>')"><i class="mdi mdi-eye font-22 text-danger"></i></span>

                                        <span style="cursor: pointer;" data-placement="left" title="Actualizar Promoción" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalUpdatePromocion" data-backdrop="static" data-keyboard="false" onClick="UpdatePromocion('<?php echo encrypt($promocion[$i]["id_rel_industria_promocion_industrial"]); ?>','<?php echo encrypt($promocion[$i]["id_industria"]); ?>','<?php echo $promocion[$i]["nombre_de_fantasia"]; ?>','<?php echo $promocion[$i]["nompromocion"]; ?>','<?php echo $promocion[$i]["estado_promocion"]; ?>','<?php echo $promocion[$i]['inicio_promocion'] == '0000-00-00' ? "" : date("d-m-Y", strtotime($promocion[$i]['inicio_promocion'])); ?>','<?php echo $promocion[$i]['fin_promocion'] == '0000-00-00' ? "" : date("d-m-Y", strtotime($promocion[$i]['fin_promocion'])); ?>','<?php echo $promocion[$i]["anio"]; ?>'); ActivaRadioPromocion('<?php echo $promocion[$i]["estado_promocion"]; ?>');"><i class="mdi mdi-table-edit font-22 text-danger"></i></span>

                                        <span style="cursor: pointer;" title="Eliminar Promoción" onClick="EliminarPromocion('<?php echo encrypt($promocion[$i]["id_rel_industria_promocion_industrial"]); ?>','<?php echo encrypt($promocion[$i]["id_industria"]); ?>','<?php echo encrypt("7"); ?>','<?php echo encrypt("SECCIONPROMOCION") ?>')"><i class="mdi mdi-delete font-22 text-danger"></i></span>
                                    </td>
                                </tr>
                        <?php }
                        } ?>
                    </tbody>
                </table>
                <span class="card-subtitle">Nota:
                    <i class="mdi mdi-eye text-danger font-16"></i>(Ver Promoción) - <i class="mdi mdi-table-edit text-danger font-16"></i>(Editar Promoción) - <i class="mdi mdi-delete text-danger font-16"></i>(Eliminar Promoción)
                </span>
            </div>

            </div>

            <hr>

        <?php
            break;
        case 8: ?>

            <div class="row-horizon">
                <span class="categories" id="seccion#1" onclick="CargaFormulario('<?php echo encrypt('1'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Datos Generales</span>
                <span class="categories" id="seccion#2" onclick="CargaFormulario('<?php echo encrypt('2'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Actividad</span>
                <span class="categories" id="seccion#3" onclick="CargaFormulario('<?php echo encrypt('3'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Insumos y Servicios</span>
                <span class="categories" id="seccion#4" onclick="CargaFormulario('<?php echo encrypt('4'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Situación de la Planta</span>
                <span class="categories" id="seccion#5" onclick="CargaFormulario('<?php echo encrypt('5'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Ventas y Facturación</span>
                <span class="categories" id="seccion#6" onclick="CargaFormulario('<?php echo encrypt('6'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Prevención y Control Ambiental</span>
                <span class="categories" id="seccion#7" onclick="CargaFormulario('<?php echo encrypt('7'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Sistemas de Calidad</span>
                <span class="categories selectedGat" id="seccion#8" onclick="CargaFormulario('<?php echo encrypt('8'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Economía del Conocimiento</span>
                <span class="categories" id="seccion#9" onclick="CargaFormulario('<?php echo encrypt('9'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Revisión y Confirmación DDJJ</span>
            </div>

            <hr>

            <!-- ###################################### CONSULTA DE ECONOMIA DEL CONOCIMIENTO ###################################### -->

            <h3 class="card-subtitle mt-3"> Economía del Conocimiento </h3>

            <?php if ($reg == "") {
                echo "<div class='alert alert-danger'>";
                echo "<center><span class='fa fa-info-circle'></span> POR FAVOR REALICE LA CARGA DE DATOS GENERALES PARA ASIGNAR ECONOMIA DEL CONOCIMIENTO</center>";
                echo "</div>";
            } else { ?>
                <div class="text-right">
                    <button type="button" class="btn btn-info" data-placement="left" title="Agregar Norma de Calidad" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalEconomia" data-backdrop="static" data-keyboard="false" onClick="AddIdEconomiaModal('<?php echo encrypt($reg[0]["id_industria"]); ?>','<?php echo $reg[0]["nombre_de_fantasia"]; ?>','<?php echo $reg[0]["anio"]; ?>'); VerificaEconomia('<?php echo encrypt("0"); ?>');"><i class="fa fa-plus-square"></i> Agregar Economía</button>
                </div>
            <?php } ?>

            <div class="table-responsive mt-3">
                <table id="default_order" class="table table-deredbor border display">

                    <thead>
                        <tr bgcolor="#808080" class="text-white" role="row">
                            <th>Nº</th>
                            <th>Inversión en Sector</th>
                            <th>Otra Inversión</th>
                            <th>Personal del Sector</th>
                            <th>Otro Personal</th>
                            <th>Año</th>
                            <th width="12%">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="BusquedaRapida">

                        <?php
                        $economia = new Login();
                        $economia = $economia->BuscarEconomia();

                        if ($economia == "") {

                            echo "";
                        } else {

                            $a = 1;
                            for ($i = 0; $i < sizeof($economia); $i++) {
                        ?>
                                <tr role="row" class="odd">
                                    <td><?php echo $a++; ?></td>
                                    <td><?php
                                        $new = explode(",", $economia[$i]['sectores']);
                                        foreach ($new as $val) {
                                            switch ($val) {
                                                case '1':
                                                    echo "Software y Servicios Informáticos Digitales";
                                                    break;
                                                case '2':
                                                    echo ", Producción y Postproducción Audiovisual";
                                                    break;
                                                case '3':
                                                    echo ", Biotecnología";
                                                    break;
                                                case '4':
                                                    echo ", Nanotecnología";
                                                    break;
                                                case '5':
                                                    echo ", Industria Aeroespacial y Satelital";
                                                    break;
                                                case '6':
                                                    echo ", Ingeniería e Industria 4.0";
                                                    break;
                                                case '7':
                                                    echo ", Otros";
                                                    break;
                                            }
                                        } ?>
                                    </td>
                                    <td><?php echo $economia[$i]['otro_sector'] == '0' ? "*********" : $economia[$i]['otro_sector']; ?></td>
                                    <td><?php
                                        $news = explode(",", $economia[$i]['personal']);
                                        foreach ($news as $value) {
                                            switch ($value) {
                                                case '1':
                                                    echo "Manejo de Idioma Extranjero";
                                                    break;
                                                case '2':
                                                    echo ", Programación";
                                                    break;
                                                case '3':
                                                    echo ", Informática";
                                                    break;
                                                case '4':
                                                    echo ", Diseño Multimedia";
                                                    break;
                                                case '5':
                                                    echo ", Robótica";
                                                    break;
                                                case '6':
                                                    echo ", Electrónica o Similar";
                                                    break;
                                                case '7':
                                                    echo ", Automatización de Procesos";
                                                    break;
                                                case '8':
                                                    echo ", Marketing Digital";
                                                    break;
                                                case '9':
                                                    echo ", Inteligencia Artifical";
                                                    break;
                                                case '10':
                                                    echo ", Big Data";
                                                    break;
                                                case '11':
                                                    echo ", Otros";
                                                    break;
                                            }
                                        } ?></td>
                                    <td><?php echo $economia[$i]['otro_personal'] == '0' ? "*********" : $economia[$i]['otro_personal']; ?></td>
                                    <td><?php echo $economia[$i]['anio']; ?></td>
                                    <td>
                                        <span style="cursor: pointer;" data-placement="left" title="Ver Economia" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalDetalleEconomia" data-backdrop="static" data-keyboard="false" onClick="VerEconomia('<?php echo encrypt($economia[$i]["id_economia"]); ?>')"><i class="mdi mdi-eye font-22 text-danger"></i></span>

                                        <span style="cursor: pointer;" data-placement="left" title="Actualizar Economia" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalEconomia" data-backdrop="static" data-keyboard="false" onClick="UpdateEconomia('<?php echo encrypt($economia[$i]["id_economia"]); ?>','<?php echo encrypt($economia[$i]["id_industria"]); ?>','<?php echo $economia[$i]["nombre_de_fantasia"]; ?>','<?php echo date("d-m-Y", strtotime($economia[$i]['anio'])); ?>','updateeconomia'); VerificaEconomia('<?php echo encrypt($economia[$i]["id_economia"]); ?>');"><i class="mdi mdi-table-edit font-22 text-danger"></i></span>

                                        <span style="cursor: pointer;" title="Eliminar Economia" onClick="EliminarEconomia('<?php echo encrypt($economia[$i]["id_economia"]); ?>','<?php echo encrypt($economia[$i]["id_industria"]); ?>','<?php echo encrypt("8"); ?>','<?php echo encrypt("SECCIONECONOMIA") ?>')"><i class="mdi mdi-delete font-22 text-danger"></i></span>
                                    </td>
                                </tr>
                        <?php }
                        } ?>
                    </tbody>
                </table>
                <span class="card-subtitle">Nota:
                    <i class="mdi mdi-eye text-danger font-16"></i>(Ver Economía) - <i class="mdi mdi-table-edit text-danger font-16"></i>(Editar Economía) - <i class="mdi mdi-delete text-danger font-16"></i>(Eliminar Economía)
                </span>
            </div>

            </div>

            <hr>

        <?php
            break;
        case 9: ?>

            <div class="row-horizon">
                <span class="categories" id="seccion#1" onclick="CargaFormulario('<?php echo encrypt('1'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Datos Generales</span>
                <span class="categories" id="seccion#2" onclick="CargaFormulario('<?php echo encrypt('2'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Actividad</span>
                <span class="categories" id="seccion#3" onclick="CargaFormulario('<?php echo encrypt('3'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Insumos y Servicios</span>
                <span class="categories" id="seccion#4" onclick="CargaFormulario('<?php echo encrypt('4'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Situación de la Planta</span>
                <span class="categories" id="seccion#5" onclick="CargaFormulario('<?php echo encrypt('5'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Ventas y Facturación</span>
                <span class="categories" id="seccion#6" onclick="CargaFormulario('<?php echo encrypt('6'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Prevención y Control Ambiental</span>
                <span class="categories" id="seccion#7" onclick="CargaFormulario('<?php echo encrypt('7'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Sistemas de Calidad</span>
                <span class="categories" id="seccion#8" onclick="CargaFormulario('<?php echo encrypt('8'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Economía del Conocimiento</span>
                <span class="categories selectedGat" id="seccion#9" onclick="CargaFormulario('<?php echo encrypt('9'); ?>','<?php echo encrypt($reg[0]["id_industria"]); ?>');"><i class="fa fa-tasks"></i> Revisión y Confirmación DDJJ</span>
            </div>

            <hr>

            <!-- ###################################### CONSULTA DE REVISION Y CONFIRMACION ###################################### -->

            EN DESARROLLO

<?php
            break;
    }
}
######################## BUSCA FORMULARIO PARA PROCEDIMIENTO ########################
?>







<!-- script jquery -->
<script type="text/javascript" src="assets/script/titulos.js"></script>
<script type="text/javascript" src="assets/js/inputmask.bundle.min.js"></script>
<script type="text/javascript" src="assets/script/mask.js"></script>
<script type="text/javascript" src="assets/script/menu.js"></script>
<script type="text/javascript" src="assets/script/script2.js"></script>
<script type="text/javascript" src="assets/script/validation.min.js"></script>
<script type="text/javascript" src="assets/script/script.js"></script>
<!-- script jquery -->

<!-- Calendario -->
<link rel="stylesheet" href="assets/calendario/jquery-ui.css" />
<script src="assets/script/jscalendario.js"></script>
<script src="assets/script/autocompleto.js"></script>
<!-- Calendario -->