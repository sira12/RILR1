<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 11px;
        }

        .span-we {
            font-weight: 600;
        }

        table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
            border: 1px solid white;
            border-radius: 25px;
        }

        th,
        td {
            text-align: left;
            padding: 3px;
        }

        /*   thead{
            border:1px solid grey !important;
        } */

        tr:nth-child(even) {
            background-color: white;
            padding: 2px;
        }

        .table-rotate tr:nth-child(even) {
            background-color: #f2f2f2;
            padding: 2px;
        }


        /*   .table-rotate {
            transform: rotate(90deg);
        }

        .table-rotate th,
        .table-rotate td {
            transform: rotate(-90deg);
        }

        .table-rotate td {
            height: 50px;
        } */

        div.page_break+div.page_break {
            page-break-before: always;
        }
    </style>
</head>

<body>

    <div style="overflow-x:auto;">

        <table style="border:1px solid grey;">

            <tr style="text-align: center !important; ">
                <td>DATOS DEL CONTRIBUYENTE</td>

            </tr>

        </table>
        <table style="border: 1px solid grey; ">


            <tr>
                <td><span class="span-we">N° de Cuit: </span><?php echo $industria_contribuyente[0]->cuit ?></td>
                <td><span class="span-we">Razon social:</span><?php echo $industria_contribuyente[0]->razon_social ?></td>
                <td><span class="span-we">Razon social:</span><?php echo $industria_contribuyente[0]->razon_social ?></td>
            </tr>
            <tr>
                <td><span class="span-we">Nº de Ingresos Brutos: </span><?php echo $industria_contribuyente[0]->numero_de_ib ?></td>
                <td><span class="span-we">Condición Frente al Iva: </span><?php echo $industria_contribuyente[0]->condicion_iva ?></td>
                <td><span class="span-we">Naturaleza Juridica: </span><?php echo $industria_contribuyente[0]->naturaleza_juridica ?></td>


            </tr>

            <tr>
                <td><span class="span-we">Email Fiscal: </span><?php echo $industria_contribuyente[0]->email_fiscal ?></td>
                <td><span class="span-we">Código Postal: </span><?php echo $industria_contribuyente[0]->CP_Legal ?></td>
                <td><span class="span-we">Fecha Inicio Act. Contrib.: </span><?php echo $industria_contribuyente[0]->Inicio_de_actividad_Contribuyente ?></td>

            </tr>

            <tr>

                <td><span class="span-we">Localidad legal: </span><?php echo $industria_contribuyente[0]->Localidad_Legal ?></td>
                <td><span class="span-we">Dni: </span><?php echo $industria_contribuyente[0]->documento ?></td>
                <td><span class="span-we">Declarante: </span><?php echo $industria_contribuyente[0]->persona_declarante ?></td>

            </tr>


            <tr>
                <td><span class="span-we">En calidad de: </span><?php echo $industria_contribuyente[0]->En_calidad_de ?></td>
                <td><span></span></td>
                <td><span></span></td>
            </tr>
        </table>
        <br>
        <br>
        <table style="border:1px solid grey;">

            <tr style="text-align: center !important; ">
                <td>DATOS DE LA INDUSTRIA</td>

            </tr>

        </table>
        <table style="border: 1px solid grey; ">


            <tr>
                <td><span class="span-we">Nombre de Establecimiento Industrial </span><?php echo $industria_contribuyente[0]->nombre_de_fantasia ?></td>
                <td><span class="span-we">Fecha Inicio Act. de Establ.: </span><?php echo $industria_contribuyente[0]->Fecha_inicio_industria ?></td>
                <td><span class="span-we">Es casa central?: </span><?php echo $industria_contribuyente[0]->es_casa_central == "S" ? "Si" : "No"  ?></td>
            </tr>
            <tr>
                <td><span class="span-we">Es Zona industrial?: </span><?php echo $industria_contribuyente[0]->es_zona_industrial == "S" ? "Si" : "No" ?></td>
                <td><span class="span-we">Nº de Teléfono Fijo: </span><?php echo $industria_contribuyente[0]->tel_fijo ?></td>
                <td><span class="span-we">Nº de Celular: </span><?php echo $industria_contribuyente[0]->tel_celular ?></td>
            </tr>

            <tr>
                <td><span class="span-we">Email: </span><?php echo $industria_contribuyente[0]->mail_industria ?></td>
                <td><span class="span-we">Localidad de Planta: </span><?php echo $industria_contribuyente[0]->Localidad_Industria ?></td>
                <td><span class="span-we">Pagina Web: </span><?php echo $industria_contribuyente[0]->pagina_web ?></td>

            </tr>

            <tr>

                <td><span class="span-we">Latitud de Ubicación: </span><?php echo $industria_contribuyente[0]->latitud ?></td>
                <td><span class="span-we">Longitud de Ubicación: </span><?php echo $industria_contribuyente[0]->longitud ?></td>
                <td><span class="span-we">Código Postal: </span><?php echo $industria_contribuyente[0]->CP_Industria ?></td>

            </tr>
        </table>


        <br>
        <br>
        <table class="table-rotate" style="border:1px solid grey;">

            <tr style="text-align: center !important; ">
                <td>ACTIVIDADES Y PRODUCTOS</td>

            </tr>

        </table>
        <br>
        <br>
        <table class="table-rotate">

            <thead style="border-bottom:1px solid grey; border-top:1px solid grey;">
                <tr style="font-size:6px; text-align:justify;">
                    <td style="font-size:6px; text-align:center;">Actividad</td>
                    <td>Act. principal?</td>
                    <td>Obs</td>
                    <td>F.Inicio</td>
                    <td>F. Fin</td>
                    <td>Producto Elab.</td>
                    <td>Cant. Prod.</td>
                    <td>Porc. de Producción</td>
                    <td>Ventas en provincia</td>
                    <td>Ventas otras provincias</td>
                    <td>Ventas en exterior</td>
                    <td>Año</td>
                </tr>


            </thead>


            <?php foreach ($act_prod as $act) { ?>

                <tr style="font-size:6px">
                    <td><?php echo $act->actividad ?></td>
                    <td style="text-align:justify;"><?php echo $act->es_actividad_principal == "S" ? "Si" : "No" ?></td>
                    <td style="text-align:justify;"><?php echo $act->observacion ?></td>
                    <td style="text-align:justify;"><?php echo $act->fecha_inicio ?></td>
                    <td style="text-align:justify;"><?php echo $act->fecha_fin == "" ? "--" : $act->fecha_fin ?></td>
                    <td style="text-align:justify;"><?php echo $act->Productos_Elaborados ?></td>
                    <td style="text-align:justify;"><?php echo $act->Cantidad_producida ?></td>
                    <td style="text-align:justify;"><?php echo $act->porcentaje_sobre_produccion ?></td>
                    <td style="text-align:justify;"><?php echo $act->ventas_en_provincia  ?></td>
                    <td style="text-align:justify;"><?php echo $act->ventas_en_otras_provincias ?></td>
                    <td style="text-align:justify;"><?php echo $act->ventas_en_provincia ?></td>
                    <td style="text-align:justify;"><?php echo $act->anio_productos  ?></td>
                </tr>

            <?php } ?>
        </table>


        <br>
        <br>
        <table class="table-rotate" style="border:1px solid grey;">

            <tr style="text-align: center !important; ">
                <td>ACTIVIDADES Y MATERIA PRIMA</td>

            </tr>

        </table>
        <br>
        <br>
        <table class="table-rotate">

            <thead style="border-bottom:1px solid grey; border-top:1px solid grey;">
                <tr style="font-size:6px; text-align:justify;">
                    <td style="font-size:6px; text-align:center;">Actividad</td>
                    <td style=" text-align:center;">Act. principal?</td>
                    <td style=" text-align:center;">Obs</td>
                    <td style=" text-align:center;">F.Inicio</td>
                    <td style=" text-align:center;">F. Fin</td>
                    <td style=" text-align:center;">M. Prima Elab.</td>
                    <td style=" text-align:center;">Cant.Anual Utilizada</td>
                    <td style=" text-align:center;">Propia?</td>
                    <td style=" text-align:center;">Loc. Orig.</td>
                    <td style=" text-align:center;">Pais Orig.</td>
                    <td style=" text-align:center;">Mot.Import.</td>
                    <td style=" text-align:center;">Detalle</td>
                    <td style=" text-align:center;">Año</td>
                </tr>


            </thead>


            <?php foreach ($act_mat as $act) { ?>

                <tr style="font-size:6px">
                    <td><?php echo $act->actividad ?></td>
                    <td style="text-align:center;"><?php echo $act->es_actividad_principal == "S" ? "Si" : "No" ?></td>
                    <td style="text-align:center;"><?php echo $act->observacion ?></td>
                    <td style="text-align:center;"><?php echo $act->fecha_inicio ?></td>
                    <td style="text-align:center;"><?php echo $act->fecha_fin == "" ? "--" : $act->fecha_fin ?></td>
                    <td style="text-align:center;"><?php echo $act->Materia_Prima_Utilizada ?></td>
                    <td style="text-align:center;"><?php echo $act->Cantidad_MP_Anual_Utilizada ?></td>
                    <td style="text-align:center;"><?php echo $act->Es_MP_propia == "A" ? "NO" : "SI" ?></td>
                    <td style="text-align:center;"><?php echo $act->Localidad_Origen_MP  ?></td>
                    <td style="text-align:center;"><?php echo $act->Pais_Origen_MP ?></td>
                    <td style="text-align:center;"><?php echo $act->motivo_importacion_MP ?></td>
                    <td style="text-align:center;"><?php echo $act->Detalle_de_motivo_de_importacion_MP == "" ? "--" : $act->Detalle_de_motivo_de_importacion_MP ?></td>
                    <td style="text-align:center;"><?php echo $act->anio_MP  ?></td>
                </tr>

            <?php } ?>
        </table>



        <br>
        <br>
        <table class="table-rotate" style="border:1px solid grey;">

            <tr style="text-align: center !important; ">
                <td>INSUMOS</td>

            </tr>

        </table>
        <br>
        <br>
        <table class="table-rotate">

            <thead style="border-bottom:1px solid grey; border-top:1px solid grey;">
                <tr style=" text-align:center;">
                    <td style=" text-align:center;">Insumo</td>
                    <td style=" text-align:center;">Propia?</td>
                    <td style=" text-align:center;">Loc. Orig.</td>
                    <td style=" text-align:center;">Pais Orig.</td>
                    <td style=" text-align:center;">Motivo de Importacion</td>
                    <td style=" text-align:center;">Detalle Motivo</td>
                    <td style=" text-align:center;">Año</td>
                </tr>
            </thead>
            <?php foreach ($insumos as $ins) { ?>

                <tr>
                    <td><?php echo $ins->Insumos_utilizados ?></td>
                    <td style="text-align:center;"><?php echo $ins->Es_insumo_propio == "A" ? "NO" : "SI" ?></td>
                    <td style="text-align:center;"><?php echo $ins->Localidad_Origen_Insumo  ?></td>
                    <td style="text-align:center;"><?php echo $ins->Pais_Origen_Insumo ?></td>
                    <td style="text-align:center;"><?php echo $ins->motivo_importacion_Insumo == null ? "--" : $ins->motivo_importacion_Insumo ?></td>
                    <td style="text-align:center;"><?php echo $ins->Detalle_de_motivo_de_importacion_Insumo == "" ? "--" : $ins->Detalle_de_motivo_de_importacion_Insumo ?></td>
                    <td style="text-align:center;"><?php echo $ins->anio_insumos  ?></td>
                </tr>

            <?php } ?>
        </table>


        <br>
        <br>
        <table class="table-rotate" style="border:1px solid grey;">

            <tr style="text-align: center !important; ">
                <td>Servicios</td>

            </tr>

        </table>
        <br>
        <br>
        <table class="table-rotate">

            <thead style="border-bottom:1px solid grey; border-top:1px solid grey;">
                <tr style=" text-align:center;">
                    <td style=" text-align:center;">Servicio</td>
                    <td style=" text-align:center;">Cantidad Consumida</td>
                    <td style=" text-align:center;">Costo del Servicio</td>
                    <td style=" text-align:center;">Frec. de Contratacion</td>
                    <td style=" text-align:center;">Loc. Origen</td>
                    <td style=" text-align:center;">Motivo de importacion</td>
                    <td style=" text-align:center;">Detalle Motivo</td>
                    <td style=" text-align:center;">Año</td>
                </tr>
            </thead>
            <?php foreach ($servicios as $serv) { ?>

                <tr>
                    <td><?php echo $serv->Servicio ?></td>
                    <td style="text-align:center;"><?php echo $serv->cantidad_consumida ?></td>
                    <td style="text-align:center;"><?php echo $serv->Costo_del_Servicio == null ? "--" : $serv->Costo_del_Servicio   ?></td>
                    <td style="text-align:center;"><?php echo $serv->frecuencia_de_contratacion_Servicio ?></td>
                    <td style="text-align:center;"><?php echo $serv->Localidad_Origen_Servicio ?></td>

                    <td style="text-align:center;"><?php echo $serv->motivo_importacion_Servicio == null ? "--" : $serv->motivo_importacion_Servicio ?></td>
                    <td style="text-align:center;"><?php echo $serv->Detalle_de_motivo_de_importacion_Servicio == null ? "--" : $serv->Detalle_de_motivo_de_importacion_Servicio ?></td>
                    <td style="text-align:center;"><?php echo $serv->anio_Servicios  ?></td>
                </tr>

            <?php } ?>
        </table>



        <br>
        <br>
        <table class="table-rotate" style="border:1px solid grey;">

            <tr style="text-align: center !important; ">
                <td>GASTOS</td>

            </tr>

        </table>
        <br>
        <br>
        <table class="table-rotate">

            <thead style="border-bottom:1px solid grey; border-top:1px solid grey;">
                <tr style=" text-align:center;">
                    <td style=" text-align:center;">Concepto</td>
                    <td style=" text-align:center;">Importe</td>
                    <td style=" text-align:center;">Año</td>
                </tr>
            </thead>
            <?php foreach ($gastos as $gasto) { ?>

                <tr>
                    <td><?php echo $gasto->Concepto_de_egreso ?></td>
                    <td style="text-align:center;"><?php echo "$" . $gasto->importe ?></td>
                    <td style="text-align:center;"><?php echo $gasto->anio_egresos ?></td>

                </tr>

            <?php } ?>
        </table>




        <br>
        <br>
        <table class="table-rotate" style="border:1px solid grey;">

            <tr style="text-align: center !important; ">
                <td>SITUACION DE PLANTA</td>
            </tr>

        </table>
        <br>
        <br>
        <table class="table-rotate">

            <thead style="border-bottom:1px solid grey; border-top:1px solid grey;">
                <tr style=" text-align:center;">
                    <td style=" text-align:center;">% de Produccion</td>
                    <td style=" text-align:center;">Sup.Lote</td>
                    <td style=" text-align:center;">Sup.Planta</td>
                    <td style=" text-align:center;">Zona Ind?</td>
                    <td style=" text-align:center;">Inversion anual</td>
                    <td style=" text-align:center;">Inv Activo fijo</td>
                    <td style=" text-align:center;">Capacidad instalada</td>
                    <td style=" text-align:center;">Capacidad Ociosa</td>
                    <td style=" text-align:center;">Año</td>
                </tr>
            </thead>
            <?php foreach ($sit as $sp) { ?>

                <tr>
                    <td><?php echo $sp->produccion_sobre_capacidad."%" ?></td>
                    <td style="text-align:center;"><?php echo $sp->superficie_lote."m2" ?></td>
                    <td style="text-align:center;"><?php echo $sp->superficie_planta."m2"  ?></td>
                
                    <td><?php echo $sp->Establecida_en_zona_industrial == "0" ? "NO":"SI" ?></td>
                    <td style="text-align:center;"><?php echo "$" . $sp->inversion_anual ?></td>
                    <td style="text-align:center;"><?php echo "$" . $sp->inversion_activo_fijo ?></td>
               
                    <td><?php echo $sp->capacidad_instalada ?></td>
                    <td style="text-align:center;"><?php echo $sp->capacidad_ociosa ?></td>
                    <td style="text-align:center;"><?php echo $sp->anio_situacion_De_planta ?></td>

                </tr>
            <?php } ?>
        </table>


        <br>
        <br>
        <table class="table-rotate" style="border:1px solid grey;">

            <tr style="text-align: center !important; ">
                <td>MOTIVO OCIOSIDAD</td>
            </tr>

        </table>
        <br>
        <br>
        <table class="table-rotate">

            <thead style="border-bottom:1px solid grey; border-top:1px solid grey;">
                <tr style=" text-align:center;">
                    <td style=" text-align:center;">Motivo</td>
                    <td style=" text-align:center;">Año</td>
                </tr>
            </thead>
            <?php foreach ($ocios as $sp) { ?>

                <tr>
                    <td><?php echo $sp->motivo_ociosidad?></td>
                    <td style="text-align:center;"><?php echo $sp->anio_ociosidad ?></td>

                </tr>
            <?php } ?>
        </table>


        <br>
        <br>
        <table class="table-rotate" style="border:1px solid grey;">

            <tr style="text-align: center !important; ">
                <td>PERSONAL OCUPADO</td>
            </tr>

        </table>
        <br>
        <br>
        <table class="table-rotate">

            <thead style="border-bottom:1px solid grey; border-top:1px solid grey;">
                <tr style=" text-align:center;">
                    <td style=" text-align:center;">Rol</td>
                    <td style=" text-align:center;">Condicion Laboral</td>
                    <td style=" text-align:center;">Sexo</td>
                    <td style=" text-align:center;">N° de Trabajadores</td>
                    <td style=" text-align:center;">Año</td>
                </tr>
            </thead>
            <?php foreach ($po as $sp) { ?>

                <tr>
                    <td><?php echo $sp->rol_trabajador?></td>
                    <td style="text-align:center;"><?php echo $sp->condicion_laboral ?></td>
                    <td><?php echo $sp->sexo == "M" ? "MASCULINO" : "FEMENINO"?></td>
                    <td style="text-align:center;"><?php echo $sp->numero_de_trabajadores ?></td>
                    <td><?php echo $sp->anio_rol_trabajadores?></td>

                </tr>
            <?php } ?>
        </table>


        <br>
        <br>
        <table class="table-rotate" style="border:1px solid grey;">

            <tr style="text-align: center !important; ">
                <td>VENTAS INTERNACIONALES</td>
            </tr>

        </table>
        <br>
        <br>
        <table class="table-rotate">

            <thead style="border-bottom:1px solid grey; border-top:1px solid grey;">
                <tr style=" text-align:center;">
                    <td >Tipo de venta</td>
                    <td style=" text-align:center;">Pais</td>
                    <td >Año</td>
                </tr>
            </thead>
            <?php foreach ($venta_inter as $sp) { ?>

                <tr>
                    <td><?php echo $sp->Tipo_de_Venta?></td>
                    <td style="text-align:center;"><?php echo $sp->Pais_Destino_ventas ?></td>
                    <td><?php echo $sp->anio_destino_ventas ?></td>

                </tr>
            <?php } ?>
        </table>



        <br>
        <br>
        <table class="table-rotate" style="border:1px solid grey;">

            <tr style="text-align: center !important; ">
                <td>VENTAS NACIONALES</td>
            </tr>

        </table>
        <br>
        <br>
        <table class="table-rotate">

            <thead style="border-bottom:1px solid grey; border-top:1px solid grey;">
                <tr style=" text-align:center;">
                    <td >Tipo de venta</td>
                    <td style=" text-align:center;">Provincia</td>
                    <td >Año</td>
                </tr>
            </thead>
            <?php foreach ($venta_nacional as $sp) { ?>

                <tr>
                    <td><?php echo $sp->Tipo_de_Venta?></td>
                    <td style="text-align:center;"><?php echo $sp->Provincia_Destino_ventas ?></td>
                    <td><?php echo $sp->anio_destino_ventas ?></td>

                </tr>
            <?php } ?>
        </table>

        <br>
        <br>
        <table class="table-rotate" style="border:1px solid grey;">

            <tr style="text-align: center !important; ">
                <td>FACTURACIÓN</td>
            </tr>

        </table>
        <br>
        <br>
        <table class="table-rotate">

            <thead style="border-bottom:1px solid grey; border-top:1px solid grey;">
                <tr style=" text-align:center;">
                    <td >Clasificacion</td>
                    <td style=" text-align:center;">Facturación Anual (Pesos)</td>
                    <td style=" text-align:center;">Facturación Anual (USD)</td>
                    <td style=" text-align:center;">Facturación Mercado Interno (%)</td>
                    <td style=" text-align:center;">Facturación Mercado Externo (%)</td>
                    <td style=" text-align:center;">Año</td>
                </tr>
            </thead>
            <?php foreach ($fact as $sp) { ?>

                <tr>
                    <td><?php echo $sp->categoria_pyme?></td>
                    <td style="text-align:center;"><?php echo "$".$sp->prevision_ingresos_anio_corriente ?></td>
                    <td  style="text-align:center;"><?php echo $sp->prevision_ingresos_anio_corriente_dolares." USD" ?></td>
                    <td style="text-align:center;"><?php echo $sp->porcentaje_prevision_mercado_interno."%" ?></td>
                    <td  style="text-align:center;"><?php echo $sp->porcentaje_prevision_mercado_externo."%"  ?></td>
                    <td style="text-align:center;"><?php echo $sp->Anio_Facturacion ?></td>

                </tr>
            <?php } ?>
        </table>

        <br>
        <br>
        <table class="table-rotate" style="border:1px solid grey;">

            <tr style="text-align: center !important; ">
                <td>EFLUENTES</td>
            </tr>

        </table>
        <br>
        <br>
        <table class="table-rotate">

            <thead style="border-bottom:1px solid grey; border-top:1px solid grey;">
                <tr style=" text-align:center;">
                    <td >Efluente</td>
                    <td style=" text-align:center;">Tratamiento</td>
                    <td style=" text-align:center;">Destino</td>
                    <td style=" text-align:center;">Año</td>
                </tr>
            </thead>
            <?php foreach ($efluente as $sp) { ?>

                <tr>
                    <td><?php echo $sp->efluente?></td>
                    <td style="text-align:center;"><?php echo $sp->Tratamiento_del_Efluente ?></td>
                    <td  style="text-align:center;"><?php echo $sp->Destino_Efluente ?></td>
                    <td style="text-align:center;"><?php echo $sp->anio_efluente ?></td>

                </tr>
            <?php } ?>
        </table>

        <br>
        <br>
        <table class="table-rotate" style="border:1px solid grey;">

            <tr style="text-align: center !important; ">
                <td>CERTIFICADOS</td>
            </tr>

        </table>
        <br>
        <br>
        <table class="table-rotate">

            <thead style="border-bottom:1px solid grey; border-top:1px solid grey;">
                <tr style=" text-align:center;">
                    <td >Certificado</td>
                    <td style=" text-align:center;">Estado</td>
                    <td style=" text-align:center;">Vigencia del certificado</td>
                    <td style=" text-align:center;">Año</td>
                </tr>
            </thead>
            <?php foreach ($certificados as $sp) { ?>

                <tr>
                    <td><?php echo $sp->certificado ?></td>
                    <td style="text-align:center;"><?php echo $sp->Estado_Certificado ?></td>
                    <td  style="text-align:center;"><?php echo $sp->Vigencia_Certificado =="Desde: Hasta:" ? "--" :$sp->Vigencia_Certificado ?></td>
                    <td style="text-align:center;"><?php echo $sp->anio_certificado ?></td>

                </tr>
            <?php } ?>
        </table>


        <br>
        <br>
        <table class="table-rotate" style="border:1px solid grey;">

            <tr style="text-align: center !important; ">
                <td>SISTEMAS DE CALIDAD</td>
            </tr>

        </table>
        <br>
        <br>
        <table class="table-rotate">

            <thead style="border-bottom:1px solid grey; border-top:1px solid grey;">
                <tr style=" text-align:center;">
                    <td >Sistema de calidad</td>
                    <td style=" text-align:center;">Estado</td>
                    <td style=" text-align:center;">Vigencia</td>
                    <td style=" text-align:center;">Año</td>
                </tr>
            </thead>
            <?php foreach ($sistemas as $sp) { ?>

                <tr>
                    <td><?php echo $sp->sistema_de_calidad ?></td>
                    <td style="text-align:center;"><?php echo $sp->Estado_Sistema_de_calidad ?></td>
                    <td  style="text-align:center;"><?php echo $sp->Vigencia_Sistema_de_calidad =="Desde: Hasta:" ? "--" :$sp->Vigencia_Sistema_de_calidad ?></td>
                    <td style="text-align:center;"><?php echo $sp->Anio_Sistema_de_calidad ?></td>

                </tr>
            <?php } ?>
        </table>

        <br>
        <br>
        <table class="table-rotate" style="border:1px solid grey;">

            <tr style="text-align: center !important; ">
                <td>PROMOCION INDUSTRIAL</td>
            </tr>

        </table>
        <br>
        <br>
        <table class="table-rotate">

            <thead style="border-bottom:1px solid grey; border-top:1px solid grey;">
                <tr style=" text-align:center;">
                    <td >Descripción</td>
                    <td style=" text-align:center;">Estado</td>
                    <td style=" text-align:center;">Vigencia</td>
                    <td style=" text-align:center;">Año</td>
                </tr>
            </thead>
            <?php foreach ($promo as $sp) { ?>

                <tr>
                    <td><?php echo $sp->promocion_industrial ?></td>
                    <td style="text-align:center;"><?php echo $sp->Estado_Promocion_industrial ?></td>
                    <td  style="text-align:center;"><?php echo $sp->Vigencia_Promocion_industrial ==null ? "--" :$sp->Vigencia_Promocion_industrial ?></td>
                    <td style="text-align:center;"><?php echo $sp->Anio_Promocion_industrial ?></td>

                </tr>
            <?php } ?>
        </table>


        <br>
        <br>
        <table class="table-rotate" style="border:1px solid grey;">

            <tr style="text-align: center !important; ">
                <td>ECONOMIA DEL CONOCIMIENTO</td>
            </tr>

        </table>
        <br>
        <br>
        <table class="table-rotate">

            <thead style="border-bottom:1px solid grey; border-top:1px solid grey;">
                <tr style=" text-align:center;">
                    <td >Sector</td>
                    <td style=" text-align:center;">Año</td>
                </tr>
            </thead>
            <?php foreach ($eco as $sp) { ?>

                <tr>
                    <td><?php echo $sp->sector ?></td>
                    <td style="text-align:center;"><?php echo $sp->Anio_Economia_del_conocimiento_sector ?></td>

                </tr>
            <?php } ?>
        </table>


        <br>
        <br>
        <table class="table-rotate" style="border:1px solid grey;">

            <tr style="text-align: center !important; ">
                <td>PERFIL</td>
            </tr>

        </table>
        <br>
        <br>
        <table class="table-rotate">

            <thead style="border-bottom:1px solid grey; border-top:1px solid grey;">
                <tr style=" text-align:center;">
                    <td >Sector</td>
                    <td style=" text-align:center;">Año</td>
                </tr>
            </thead>
            <?php foreach ($perfil as $sp) { ?>

                <tr>
                    <td><?php echo $sp->perfil ?></td>
                    <td style="text-align:center;"><?php echo $sp->Anio_Economia_del_conocimiento_perfil ?></td>

                </tr>
            <?php } ?>
        </table>
   
    </div>
</body>

</html>