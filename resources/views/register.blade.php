<!DOCTYPE html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Registro de Paciente</title>
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
                  <img src="../../assets/images/logo.svg">
                </div>
                <h4>Registro de Paciente</h4>
                <h6 class="fw-light">Complete los datos para registrar al paciente</h6>
                <form class="pt-3" method="POST" action="{{ route('register') }}">
                  @csrf
                  <!-- Nombre del paciente -->
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" id="exampleInputName" name="name" placeholder="Nombre Completo" value="{{ old('name') }}" required>
                    @error('name')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>

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

                  <!-- Confirmar Contraseña -->
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" id="exampleInputPasswordConfirmation" name="password_confirmation" placeholder="Confirmar Contraseña" required>
                  </div>

                  <!-- Aceptar Términos -->
                  <div class="mb-4">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" class="form-check-input" name="terms" required> Acepto los Términos y Condiciones
                      </label>
                    </div>
                  </div>

                  <!-- Botón de registro -->
                  <div class="mt-3 d-grid gap-2">
                    <button type="submit" class="btn btn-block btn-primary btn-lg fw-semibold auth-form-btn">REGISTRAR</button>
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
