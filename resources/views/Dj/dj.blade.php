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
                    <td>Act. principal?</td>
                    <td>Obs</td>
                    <td>F.Inicio</td>
                    <td>F. Fin</td>
                    <td>M. Prima Elab.</td>
                    <td>Cant.Anual Utilizada</td>
                    <td>Propia?</td>
                    <td>Loc. Orig.</td>
                    <td>Pais Orig.</td>
                    <td>Mot.Import.</td>
                    <td>Detalle
                    <td>
                    <td>Año</td>
                </tr>


            </thead>


            <?php foreach ($act_prod as $act) { ?>

                <tr style="font-size:6px">
                    <td><?php echo $act->actividad ?></td>
                    <td style="text-align:center;"><?php echo $act->es_actividad_principal == "S" ? "Si" : "No" ?></td>
                    <td style="text-align:center;"><?php echo $act->observacion ?></td>
                    <td style="text-align:center;"><?php echo $act->fecha_inicio ?></td>
                    <td style="text-align:center;"><?php echo $act->fecha_fin == "" ? "--" : $act->fecha_fin ?></td>
                    <td style="text-align:center;"><?php echo $act->Productos_Elaborados ?></td>
                    <td style="text-align:center;"><?php echo $act->Cantidad_producida ?></td>
                    <td style="text-align:center;"><?php echo $act->porcentaje_sobre_produccion ?></td>
                    <td style="text-align:center;"><?php echo $act->ventas_en_provincia  ?></td>
                    <td style="text-align:center;"><?php echo $act->ventas_en_otras_provincias ?></td>
                    <td style="text-align:center;"><?php echo $act->ventas_en_provincia ?></td>
                    <td style="text-align:center;"><?php echo $act->ventas_en_provincia ?></td>
                    <td style="text-align:center;"><?php echo $act->anio_productos  ?></td>
                </tr>

            <?php } ?>
        </table>
    </div>
</body>

</html>