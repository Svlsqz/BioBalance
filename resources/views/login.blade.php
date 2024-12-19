<!DOCTYPE html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Inicio de Sesión</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../assets/vendors/font-awesome/css/font-awesome.min.css">
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="shortcut icon" href="../../assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <img src="../../assets/images/logo1.svg">
                </div>
                <h4>¡Bienvenido de nuevo!</h4>
                <h6 class="fw-light">Inicia sesión para continuar.</h6>
                <form class="pt-3" method="POST" action="{{ route('login') }}">
                  @csrf
                  <!-- Correo electrónico -->
                  <div class="form-group">
                    <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" name="email" placeholder="Correo Electrónico" value="{{ old('email') }}" required>
                    @error('email')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>

                  <!-- Contraseña -->
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" name="password" placeholder="Contraseña" required>
                    @error('password')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>

                  <!-- Botón de inicio de sesión -->
                  <div class="mt-3 d-grid gap-2">
                    <button type="submit" class="btn btn-block btn-primary btn-lg fw-semibold auth-form-btn">INICIAR SESIÓN</button>
                  </div>

                  <!-- Recordarme y olvido de contraseña -->
                  <div class="my-2 d-flex justify-content-between align-items-center">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" class="form-check-input" name="remember"> Recordarme
                      </label>
                    </div>
                    <!-- <a href="#" class="auth-link text-black">¿Olvidaste tu contraseña?</a> -->
                  </div>

                  <!-- Enlace para registrarse -->
                  <div class="text-center mt-4 fw-light"> ¿No tienes cuenta? <a href="{{ route('register') }}" class="text-primary">Crear cuenta</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <script src="../../assets/js/settings.js"></script>
    <script src="../../assets/js/todolist.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
  </body>
</html>
