<!-- resources/views/form.blade.php -->

<link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">

<!-- Estilo general de la plantilla -->
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

@extends('layouts.app')

@section('content')

<div class="page-header">
    <h3 class="page-title"> Registro Peso Seco </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Peso Seco</a></li>
            <li class="breadcrumb-item active" aria-current="page">Registro</li>
        </ol>
    </nav>
</div>
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"> Peso Seco </h4>
                <p class="card-description"> Registro Diario </p>
                <form class="forms-sample" method="POST" action="{{ route('pesos.store') }}">
                    @csrf
                    <!-- Peso Entrada -->
                    <div class="form-group">
                        <label for="pesoSeco">Peso Inicial</label>
                        <input type="number" name="peso_inicial" class="form-control" id="pesoInicial" placeholder="Introduce el peso inicial" required>
                    </div>
                    <!-- Peso seco actual -->
                    <div class="form-group">
                        <label for="pesoSeco">Peso Seco</label>
                        <input type="number" name="peso_seco" class="form-control" id="pesoSeco" placeholder="Introduce el peso seco" required>
                    </div>

                    <!-- Fecha de medición -->
                    <div class="form-group">
                        <label for="fechaMedicion">Fecha de Medición</label>
                        <input type="datetime-local" name="fecha_medicion" class="form-control" id="fechaMedicion" required>
                    </div>

                    <!-- Notas adicionales -->
                    <div class="form-group">
                        <label for="notas">Notas Adicionales</label>
                        <textarea name="notas" class="form-control" id="notas" rows="3" placeholder="Escribe cualquier observación relevante (opcional)"></textarea>
                    </div>

                    <!-- Tensión arterial (opcional) -->
                    <div class="form-group">
                        <label for="tensionArterial">Tensión Arterial (Opcional)</label>
                        <input type="text" name="tension_arterial" class="form-control" id="tensionArterial" placeholder="Ej. 120/80">
                    </div>

                    <button type="submit" class="btn btn-primary me-2">Guardar</button>
                    <button class="btn btn-light">Cancelar</button>

                </form>
            </div>
        </div>
    </div>
</div>

<!-- Plugins: JS -->
<script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('assets/vendors/select2/select2.min.js') }}"></script>
<script src="{{ asset('assets/vendors/typeahead.js/typeahead.bundle.min.js') }}"></script>

<!-- Scripts personalizados para la página -->
<script src="{{ asset('assets/js/off-canvas.js') }}"></script>
<script src="{{ asset('assets/js/misc.js') }}"></script>
<script src="{{ asset('assets/js/settings.js') }}"></script>
<script src="{{ asset('assets/js/todolist.js') }}"></script>
<script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>

<!-- JS específicos para la página -->
<script src="{{ asset('assets/js/file-upload.js') }}"></script>
<script src="{{ asset('assets/js/typeahead.js') }}"></script>
<script src="{{ asset('assets/js/select2.js') }}"></script>

@endsection