<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
</head>

<body>

    <style>
        * {
            box-sizing: border-box;
            font-size:10px;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        /* Float four columns side by side */
        .column {
            display: grid;

/* define the number of grid columns */
grid-template-columns: repeat(4, 1fr);
        }

        /* Remove extra left and right margins, due to padding in columns */
        .row {
            margin: 0 -5px;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Style the counter cards */
        .card-header {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            /* this adds the "card" effect */
            padding: 16px;
            text-align: center;
            background-color: #f1f1f1;
        }

        /* Responsive columns - one column layout (vertical) on small screens */
        @media screen and (max-width: 600px) {
            .column {
                width: 100%;
                display: block;
                margin-bottom: 20px;
            }
        }

        .control-label{
            font-weight: 800;
        }

        .row {
  grid-row: 1 / span 2;
}
    </style>


<?php

/* var_dump($industria_contribuyente);
die();
 */
?>

    <div class="card">
        <div class="card-header">
            Datos del Contribuyente
        </div>
        <div class="card-body">
            <div class="row">
                <div class="column">
                    <div class="form-group has-feedback">
                        <label class="control-label">Nº de Cuit: </label><label><?php echo $industria_contribuyente[0]->cuit ?></label>
                        <br><abbr title="Nº de CUIT/CUIL"></abbr><span id="cuit_dj"></span>
                    </div>
                </div>
                <div class="column">
                    <div class="form-group has-feedback">
                        <label class="control-label">Razon social: </label><label><?php echo $industria_contribuyente[0]->razon_social ?></label>
                        <br><abbr title="Nº de CUIT/CUIL"></abbr> <span id="rs_dj"></span>
                    </div>
                </div>
                <div class="column">
                    <div class="form-group has-feedback">
                        <label class="control-label">Regimen de Ingresos Brutos:</label><label><?php echo $industria_contribuyente[0]->regimen_ib ?></label>
                        <br><abbr title="Nº de CUIT/CUIL"></abbr><span id="rib_dj"></span>
                    </div>
                </div>
                <div class="column">
                    <div class="form-group has-feedback">
                        <label class="control-label">Nº de Ingresos Brutos:</label><label><?php echo $industria_contribuyente[0]->numero_de_ib ?></label>
                        <br><abbr title="Nº de CUIT/CUIL"></abbr><span id="nib_dj"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <div class="form-group has-feedback">
                        <label class="control-label">Condición Frente al Iva:</label><label><?php echo $industria_contribuyente[0]->condicion_iva ?></label>
                        <br><abbr title="Nº de CUIT/CUIL"></abbr><span id="civa_dj"></span>
                    </div>
                </div>
                <div class="column">
                    <div class="form-group has-feedback">
                        <label class="control-label">Naturaleza Juridica:</label><label><?php echo $industria_contribuyente[0]->naturaleza_juridica?></label>
                        <br><abbr title="Nº de CUIT/CUIL"></abbr> <span id="nj_dj"></span>
                    </div>
                </div>
                <div class="column">
                    <div class="form-group has-feedback">
                        <label class="control-label">Email Fiscal :</label><label><?php echo $industria_contribuyente[0]->email_fiscal ?></label>
                        <br><abbr title="Nº de CUIT/CUIL"></abbr><span id="ef_dj"></span>
                    </div>
                </div>
                <div class="column">
                    <div class="form-group has-feedback">
                        <label class="control-label">Código Postal:</label><label><?php echo $industria_contribuyente[0]->CP_Legal ?></label>
                        <br><abbr title="Nº de CUIT/CUIL"></abbr><span id="cp_dj"></span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="column">
                    <div class="form-group has-feedback">
                        <label class="control-label">Fecha Inicio Actividad Contribuyente:</label><label><?php echo $industria_contribuyente[0]->Inicio_de_Actividades_Contribuyente ?></label>
                        <br><abbr title="Nº de CUIT/CUIL"></abbr><span id="fiac_dj"></span>
                    </div>
                </div>
                <div class="column">
                    <div class="form-group has-feedback">
                        <label class="control-label">Localidad legal:</label><label><?php echo $industria_contribuyente[0]->Localidad_Legal ?></label>
                        <br><abbr title="Nº de CUIT/CUIL"></abbr> <span id="ll_dj"></span>
                    </div>
                </div>
                <div class="column">
                    <div class="form-group has-feedback">
                        <label class="control-label">Dni:</label><label><?php echo $industria_contribuyente[0]->documento ?></label>
                        <br><abbr title="Nº de CUIT/CUIL"></abbr><span id="dni_dj"></span>
                    </div>
                </div>
                <div class="column">
                    <div class="form-group has-feedback">
                        <label class="control-label">Declarante:</label><label><?php echo $industria_contribuyente[0]->persona_declarante ?></label>
                        <br><abbr title="Nº de CUIT/CUIL"></abbr><span id="d_dj"></span>
                    </div>
                </div>


            </div>

            <div class="row">

                <div class="column">
                    <div class="form-group has-feedback">
                        <label class="control-label">En calidad de:</label><label><?php echo $industria_contribuyente[0]->En_calidad_de ?></label>
                        <br><abbr title="Nº de CUIT/CUIL"></abbr><span id="calidad_dj"></span>
                    </div>
                </div>


            </div>
        </div>
    </div>
</body>

</html>