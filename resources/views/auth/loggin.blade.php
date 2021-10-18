<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Ing. Ruben Chirinos">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png') }}">
  <title></title>
  <!-- Custom CSS -->
  <link href="{{ asset('assets/css/style.css') }} " rel="stylesheet">
  <!-- Sweet-Alert -->
  <link rel="stylesheet" href="{{ asset('assets/css/sweetalert.css') }}">
  <!-- This Page CSS -->
  <link href="bootstrap-toggle.min.css" rel="stylesheet">
  <link href="bootstrap.min.css" rel="stylesheet">
  <!-- script jquery -->
  <script src="{{ asset('assets/script/jquery.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/script/titulos.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/script/validation.min.js')}}"></script>
  <!--<script type="text/javascript" src="{{ asset('assets/script/script.js') }}"></script>-->
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
            <span class="db">
              <img src="{{ asset('fotos/3-transp.png')}}" width="100%" height="76px" alt="Logo Principal">
            </span>
            <h5 class="font-medium mb-10"></h5>
          </div>

          @if (count($errors) > 0)

          <div class="alert alert-danger d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
            <div>
            Usuario o contraseña incorrecta, intentelo nuevamente
            </div>
          </div>
                

                
          @endif
          
          @if( session('status') )
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif
          
        
         



        

          

          <!-- Form -->
          <div class="row">
            <div class="col-12">

              <form class="form form-material new-lg-form" name="formlogin" id="formlogin" method="POST" action="{{ route('login') }}">
                @csrf
                <div id="login">
                  <!-- error will be shown here ! -->
                </div>

                <div class="row">
                  <div class="col-md-12 m-t-10">
                    <div class="form-group has-feedback">
                      <label class="control-label">Ingrese su Usuario: <span class="symbol required"></span></label>
                      <!--<input type="hidden" name="proceso" value="login"/>-->
                      <input type="email" class="form-control" placeholder="Ingrese su Usuario" name="email" autocomplete="off" required="" aria-required="true">
                      <i class="fa fa-user form-control-feedback"></i>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group has-feedback">
                      <div class="campo">
                        <label class="control-label">Ingrese su Password: <a class="symbol required"></a></label>
                        <input class="form-control" type="password" placeholder="Ingrese su Password" name="password" id="password" autocomplete="off" required="" aria-required="true"><span id="show_password" class="mdi mdi-eye icon" onclick="MostrarPassword()"></span>
                      </div>
                      <i class="fa fa-key form-control-feedback"></i>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-12">
                    <a href="{{route('password.request')}}" class="text-dark pull-right"><i class="fa fa-lock"></i> Olvidaste tu Contraseña?</a>
                  </div>
                </div>


                <div class="form-group text-center m-t-20">
                  <div class="col-xs-12">
                    <button class="btn btn-danger btn-lg btn-block waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Haga clic aquí para iniciar sesión" type="submit"><span class="fa fa-sign-in"></span> Acceder</button>
                  </div>
                </div>

              </form>
              <div class="col-sm-12 text-center"><span class="text-center text-blue">Si no posee cuenta,</span> <a href="{{ route('register') }}" title="Registrarse"> <span class="text-danger"> regístrese aquí</span></a>.</div>
            </div>
          </div>
        </div>

        <div id="recoverform">
          <div class="logo">
            <span class="db"><?php if (file_exists("fotos/logo-principal.png")) {
                                echo "<img src='fotos/logo-principal.png' width='80%' height='75px' alt='Logo Principal'>";
                              } else {
                                echo "<img src='' width='60%' height='60px' alt='Logo Principal'>";
                              }
                              ?></span>
            <h5 class="font-medium"></h5>
            <p align="center" class="text-muted">Ingrese su correo electrónico para que su Nueva Clave de Acceso le sea enviada al mismo!</p>
          </div>


          <form class="form form-material new-lg-form" name="formrecover" id="formrecover" action="">

            <div id="recover">
              <!-- error will be shown here ! -->
            </div>



            <div class="row">


              <div class="col-md-12 m-t-5">
                <div class="form-group has-feedback">
                  <label class="control-label">Ingrese su Usuario: <span class="symbol required"></span></label>
                  <input type="hidden" name="proceso" value="recuperar" />
                  <input type="text" class="form-control" placeholder="Ingrese su Usuario" name="usuario" id="usuario" autocomplete="off" value="RUBENCHIRINOS" required="" aria-required="true">
                  <i class="fa fa-user form-control-feedback"></i>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group has-feedback">
                  <label class="control-label">Correo Electrónico: <span class="symbol required"></span></label>
                  <input type="text" class="form-control" name="email" id="email" placeholder="Ingrese su Correo Electronico" autocomplete="off" required="" aria-required="true" />
                  <i class="fa fa-envelope-o form-control-feedback"></i>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group has-feedback">
                  <label class="control-label">Eres Contribuyente ?: <span class="symbol required"></span></label>
                  <br>
                  <div class="form-check form-check-inline">
                    <div class="custom-control custom-radio">
                      <input type="radio" class="custom-control-input" id="2" name="tipo" value="<?php echo encrypt("2"); ?>">
                      <label class="custom-control-label" for="2">Si</label>
                    </div>
                  </div>
                  <div class="form-check form-check-inline">
                    <div class="custom-control custom-radio">
                      <input type="radio" class="custom-control-input" id="3" name="tipo" value="<?php echo encrypt("3"); ?>">
                      <label class="custom-control-label" for="3">No</label>
                    </div>
                  </div>
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
  <script src="{{ asset('assets/js/jquery.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/script/password.js') }}"></script>
  <!-- slimscrollbar scrollbar JavaScript -->
  <script src="{{ asset('assets/js/perfect-scrollbar.js') }}"></script>
  <script src="{{ asset('assets/js/sparkline.js') }}"></script>
  <script src="{{ asset('assets/js/popper.min.js') }}"></script>
  <!-- Bootstrap Core JavaScript -->
  <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
  <!-- Menu Plugin JavaScript -->
  <script src="{{ asset('assets/js/sidebar-nav.js') }}"></script>

  <!--slimscroll JavaScript -->
  <script src="{{ asset('assets/js/jquery_002.js') }}"></script>
  <!--Wave Effects -->
  <script src="{{ asset('assets/js/waves.js') }}"></script>
  <!-- Sweet-Alert -->
  <script src="{{ asset('assets/js/sweetalert-dev.js') }}"></script>
  <!-- Custom Theme JavaScript -->
  <script src="{{ asset('assets/js/custom.js') }}"></script>
  <!-- jQuery -->
  <script src="{{ asset('assets/plugins/noty/packaged/jquery.noty.packaged.min.js') }}"></script>
  <!-- This Page JS -->
  <script src="{{ asset('assets/js/bootstrap-switch.min.js') }}"></script>
  <script src="bootstrap-toggle.min.js"></script>

</body>

</html>