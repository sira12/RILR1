<?php
require_once("class/class.php");

$tra = new Login();

if(isset($_POST["proceso"]) and $_POST["proceso"]=="login")
{
  $log = $tra->Logueo();
  exit;
}
elseif(isset($_POST["proceso"]) and $_POST["proceso"]=="recuperar")
{
  $reg = $tra->RecuperarPassword();
  exit;
}
?>
<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="Ing. Ruben Chirinos">
<link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title></title>
    <!-- Custom CSS -->
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- Sweet-Alert -->
    <link rel="stylesheet" href="assets/css/sweetalert.css">
    <!-- script jquery -->
    <script src="assets/script/jquery.min.js"></script> 
    <script type="text/javascript" src="assets/script/titulos.js"></script>
    <script type="text/javascript" src="assets/script/validation.min.js"></script>
    <script type="text/javascript" src="assets/script/script.js"></script>
    <!-- script jquery -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- Preloader -->
        <div class="preloader" style="display: none;">
          <div class="cssload-speeding-wheel"></div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:#f3f0f0; position: absolute; height: 100%; width: 100%; top: 0; left: 2px;">
            <div class="auth-box">


             <!--<p class="text-center"><a href="https://apps.entrerios.gov.ar/industriaycomercio/"><img src="https://apps.entrerios.gov.ar/industriaycomercio/xframework/app/themes/secretaria/imgs/login-logo.png" alt="Logo" class="img-responsive"></a></p>-->

              <div id="loginform">

                <div class="logo">
                <span class="db"><?php if (file_exists("fotos/logo-principal.png")){
                    echo "<img src='fotos/logo-principal.png' width='60%' height='70px' alt='Logo Principal'>"; 
                            } else {
                    echo "<img src='' width='60%' height='60px' alt='Logo Principal'>"; 
                            } 
                    ?></span>
                  <h5 class="font-medium mb-10"></h5>
                </div>

                <!-- Form -->
                <div class="row">
                  <div class="col-12">

                   <form class="form form-material new-lg-form" name="formlogin" id="formlogin" action="">

                    <div id="login">
                      <!-- error will be shown here ! -->
                    </div>

                    <div class="row">
                      <div class="col-md-12 m-t-20">
                        <div class="form-group">
                          <label class="control-label">Tipo de Acceso: <span class="symbol required"></span></label>
                          <br>
                            <div class="form-check form-check-inline">
                                <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" id="0" name="tipo" value="<?php echo encrypt("1"); ?>">
                                <label class="custom-control-label" for="0">Contribuyente</label>
                                </div>
                            </div>
                            <div class="form-check form-check-inline">
                                <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" id="1" name="tipo" value="<?php echo encrypt("2"); ?>">
                                <label class="custom-control-label" for="1">Usuario</label>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group has-feedback">
                          <label class="control-label">Ingrese su Usuario: <span class="symbol required"></span></label>
                          <input type="hidden" name="proceso" id="proceso" value="login"/>
                          <input type="text" class="form-control" placeholder="Ingrese su Usuario" name="usuario" id="usuario" autocomplete="off" required="" aria-required="true" value="30707124284"> 
                          <i class="fa fa-user form-control-feedback"></i>                
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group has-feedback">
                          <label class="control-label">Ingrese su Password: <span class="symbol required"></span></label>
                          <input class="form-control" type="password" placeholder="Ingrese su Password" name="password" id="password" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" required="" aria-required="true" value="RUBENCHIRINOS">
                          <i class="fa fa-key form-control-feedback"></i>               
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-12">
                        <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock"></i> Olvidaste tu Contraseña?</a>          
                      </div>
                    </div>


                    <div class="form-group text-center m-t-20">
                      <div class="col-xs-12">
                        <button class="btn btn-danger btn-lg btn-block waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Haga clic aquí para iniciar sesión" name="btn-login" id="btn-login" type="submit"><span class="fa fa-sign-in"></span> Acceder</button>
                      </div>
                    </div>

                  </form>
                  <div class="col-sm-12 text-center"><span class="text-center text-blue">Si no posee cuenta,</span> <a href="registro" title="Registrarse"> <span class="text-danger"> regístrese aquí</span></a>.</div>
                </div>
              </div>
            </div>

            <div id="recoverform">
              <div class="logo">
                <span class="db"><?php if (file_exists("fotos/logo-principal.png")){
                    echo "<img src='fotos/logo-principal.png' width='60%' height='70px' alt='Logo Principal'>"; 
                            } else {
                    echo "<img src='' width='60%' height='60px' alt='Logo Principal'>"; 
                            } 
                    ?></span>
                <h5 class="font-medium mb-3"></h5>
                <p align="center" class="text-muted">Ingrese su correo electrónico para que su Nueva Clave de Acceso le sea enviada al mismo!</p>
              </div>

                <form class="form form-material new-lg-form" name="formrecover" id="formrecover" action="">

                  <div id="recover">
                    <!-- error will be shown here ! -->
                  </div>

                  <div class="row">
                    <div class="col-md-12 m-t-20">
                      <div class="form-group has-feedback">
                        <label class="control-label">Correo Electrónico: <span class="symbol required"></span></label>
                        <input type="hidden" name="proceso" id="proceso" value="recuperar"/>
                        <input type="text" class="form-control" name="email" id="email" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Ingrese su Correo Electronico" autocomplete="off" required="" aria-required="true"/> 
                        <i class="fa fa-envelope-o form-control-feedback"></i>                            
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-12">
                     <a href="javascript:void(0)" id="to-login" class="text-dark pull-right"><i class="fa fa-arrow-circle-left"></i> Acceder al Sistema</a>
                   </div>
                 </div>

                 <div class="form-group text-center m-t-20">
                  <div class="col-xs-12">
                    <button class="btn btn-danger btn-lg btn-block waves-effect waves-light" name="btn-recuperar" id="btn-recuperar" type="submit"><span class="fa fa-check-square-o"></span> Recuperar Password</button>
                  </div>
                </div>
              </form>
            </div>
          </div>

        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <!-- jQuery -->
    <script src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/inputmask.bundle.min.js"></script>
    <script type="text/javascript" src="assets/script/mask.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="assets/js/perfect-scrollbar.js"></script>
    <script src="assets/js/sparkline.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="assets/js/sidebar-nav.js"></script>

    <!--slimscroll JavaScript -->
    <script src="assets/js/jquery_002.js"></script>
    <!--Wave Effects -->
    <script src="assets/js/waves.js"></script>
    <!-- Sweet-Alert -->
    <script src="assets/js/sweetalert-dev.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="assets/js/custom.js"></script>
    <!-- jQuery -->
    <script src="assets/plugins/noty/packaged/jquery.noty.packaged.min.js"></script>
</body>

</html>