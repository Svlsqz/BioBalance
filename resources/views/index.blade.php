<link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
<link rel="stylesheet" href="assets/vendors/ti-icons/css/themify-icons.css">
<link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
<link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css">
<!-- endinject -->
<!-- Plugin css for this page -->
<link rel="stylesheet" href="assets/vendors/jquery-bar-rating/css-stars.css">
<link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css">
<!-- End plugin css for this page -->
<!-- inject:css -->
<!-- endinject -->
<!-- Layout styles -->
<link rel="stylesheet" href="assets/css/style.css">

@extends('layouts.app')

@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Control de Peso Seco</title>

    <!-- Cargar jQuery antes de Flot.js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Usar una versión de Flot.js compatible con jQuery 3.x -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flot/0.8.3/jquery.flot.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flot/0.8.3/jquery.flot.time.min.js"></script>
</head>

<style>
    /* Asegurar que el gráfico tenga un tamaño adecuado */
    #flotChart {
        width: 100%;
        /* Asegura que ocupe el 100% del ancho */
        height: 400px;
        /* Asigna una altura fija para el gráfico */
    }
</style>

<body>

    <!-- Contenedor para el gráfico -->
    <div class="row">
        <div class="col-xl-9 stretch-card grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between flex-wrap">
                        <div>
                            <div class="card-title mb-0">Resumen Peso Seco</div>
                            <h3 class="fw-bold mb-0"></h3>
                        </div>
                    </div>
                    <div class="flot-chart-wrapper">

                        <div id="flotChart" class="flot-chart"
                            data-labels="{{ json_encode($labels) }}"
                            data-peso-inicial="{{ json_encode($pesoInicial) }}"
                            data-peso-final="{{ json_encode($pesoFinal) }}">
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 stretch-card grid-margin">
            <div class="card card-img">
                <div class="card-body d-flex align-items-center">
                    <div class="text-white">
                        <h1 class="font-20 fw-semibold mb-0">Información Detallada</h1>
                        <h1 class="font-20 fw-semibold">a tu alcance</h1>
                        <p>Accede a análisis completos de tus datos</p>
                        <p class="font-10 fw-semibold">Optimiza tus decisiones con información valiosa.</p>
                        <button class="btn bg-white text-dark font-12" onclick="location.href='/form'">Registrar Peso</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            if ($("#flotChart").length) {
                var chartData = document.getElementById('flotChart');
                var labels = JSON.parse(chartData.getAttribute('data-labels'));
                var pesoInicial = JSON.parse(chartData.getAttribute('data-peso-inicial'));
                var pesoFinal = JSON.parse(chartData.getAttribute('data-peso-final'));

                var maxItems = 5;
                labels = labels.slice(-maxItems);
                pesoInicial = pesoInicial.slice(-maxItems);
                pesoFinal = pesoFinal.slice(-maxItems);

                var fechas = labels.map(function(label) {
                    return new Date(label).getTime();
                });

                var dashDataInicial = fechas.map(function(val, index) {
                    return [val, pesoInicial[index]];
                });

                var dashDataFinal = fechas.map(function(val, index) {
                    return [val, pesoFinal[index]];
                });

                var formatDate = function(date) {
                    var d = new Date(date);
                    var day = d.getDate().toString().padStart(2, '0');
                    var month = (d.getMonth() + 1).toString().padStart(2, '0');
                    return `${day}/${month}`;
                };

                // Configurar el gráfico
                $.plot('#flotChart', [{
                    data: dashDataFinal,
                    color: '#00cff4',
                    lines: {
                        show: true,
                        lineWidth: 2,
                        fill: true
                    }
                }, {
                    data: dashDataInicial,
                    color: '#5e6eed',
                    lines: {
                        show: true,
                        lineWidth: 2,
                        fill: true
                    }
                }], {
                    series: {
                        shadowSize: 0
                    },
                    grid: {
                        borderWidth: 1,
                        borderColor: '#ddd',
                        labelMargin: 8
                    },
                    xaxis: {
                        mode: 'time',
                        timeformat: "%d/%m",
                        tickSize: [3, "day"],
                        tickFormatter: function(val, axis) {
                            return formatDate(val);
                        },
                        tickLength: 0,
                        font: {
                            size: 10,
                            color: "#333"
                        }
                    },
                    yaxis: {
                        min: 0,
                        max: 20,
                        show: true
                    }
                });

                // **Rotar las etiquetas del eje X**
                $("#flotChart .flot-x-axis div").css({
                    "transform": "rotate(45deg)",
                    "transform-origin": "top left",
                    "white-space": "nowrap",
                    "text-align": "left",
                    "margin-left": "10px" // Ajusta el margen si es necesario
                });
            }
        });
    </script>

    <!-- <script src="assets/vendors/js/vendor.bundle.base.js"></script> -->
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- <script src="assets/vendors/jquery-bar-rating/jquery.barrating.min.js"></script> -->
    <!-- <script src="assets/vendors/chart.js/chart.umd.js"></script> -->
    <!-- <script src="assets/vendors/flot/jquery.flot.js"></script> -->
    <script src="assets/vendors/flot/jquery.flot.resize.js"></script>
    <script src="assets/vendors/flot/jquery.flot.categories.js"></script>
    <script src="assets/vendors/flot/jquery.flot.fillbetween.js"></script>
    <script src="assets/vendors/flot/jquery.flot.stack.js"></script>
    <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
</body>
@endsection
