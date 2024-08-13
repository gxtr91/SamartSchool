@extends('layouts.backend')

@section('content')
    <!-- Hero -->
    <div class="bg-image" style="background-image: url('https://www.acdivoca.org/wp-content/uploads/2018/07/TMS1.jpg');">
        <div class="hero bg-white-90">
            <div class="hero-inner">
                <div class="content content-full text-center">
                    <div class="row items-push">
                        <div class="col-sm-6 col-xl-3">
                            <div class="block block-rounded text-center d-flex flex-column h-100 mb-0">
                                <div class="block-content block-content-full flex-grow-1">
                                    <div class="item rounded-3 bg-body mx-auto my-3">
                                        <i class="fa fa-users fa-lg text-primary"></i>
                                    </div>
                                    <div class="fs-1 fw-bold">{{ $total }}</div>
                                    <div class="text-muted mb-3">Candidatos registrados</div>
                                    <div
                                        class="d-inline-block px-3 py-1 rounded-pill fs-sm fw-semibold text-success bg-success-light">
                                        <i class="fa fa-caret-up me-1"></i>
                                        19.2%
                                    </div>
                                </div>
                                <div class="block-content block-content-full block-content-sm bg-body-light fs-sm">
                                    <a class="fw-medium" href="javascript:void(0)">
                                        Ver lista de candidatos
                                        <i class="fa fa-arrow-right ms-1 opacity-25"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-3">
                            <div class="block block-rounded text-center d-flex flex-column h-100 mb-0">
                                <div class="block-content block-content-full flex-grow-1">
                                    <div class="item rounded-3 bg-body mx-auto my-3">
                                        <i class="fa fa-venus fa-lg text-primary"></i>
                                    </div>
                                    <div class="fs-1 fw-bold">{{ $femenino }}</div>
                                    <div class="text-muted mb-3">Femenino</div>
                                    <div
                                        class="d-inline-block px-3 py-1 rounded-pill fs-sm fw-semibold text-danger bg-danger-light">
                                        <i class="fa fa-caret-down me-1"></i>
                                        2.3%
                                    </div>
                                </div>
                                <div class="block-content block-content-full block-content-sm bg-body-light fs-sm">
                                    <a class="fw-medium" href="javascript:void(0)">
                                        <i class="fa fa-arrow-right ms-1 opacity-25"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-3">
                            <div class="block block-rounded text-center d-flex flex-column h-100 mb-0">
                                <div class="block-content block-content-full flex-grow-1">
                                    <div class="item rounded-3 bg-body mx-auto my-3">
                                        <i class="fa fa-mars fa-lg text-primary"></i>
                                    </div>
                                    <div class="fs-1 fw-bold">{{ $masculino }}</div>
                                    <div class="text-muted mb-3">Masculino</div>
                                    <div
                                        class="d-inline-block px-3 py-1 rounded-pill fs-sm fw-semibold text-success bg-success-light">
                                        <i class="fa fa-caret-up me-1"></i>
                                        7.9%
                                    </div>
                                </div>
                                <div class="block-content block-content-full block-content-sm bg-body-light fs-sm">
                                    <a class="fw-medium" href="javascript:void(0)">

                                        <i class="fa fa-arrow-right ms-1 opacity-25"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-3">
                            <div class="block block-rounded text-center d-flex flex-column h-100 mb-0">
                                <div class="block-content block-content-full">
                                    <div class="item rounded-3 bg-body mx-auto my-3">
                                        <i class="fa fa-star fa-lg text-primary"></i>
                                    </div>
                                    <div class="fs-1 fw-bold">{{ $valoracion }}</div>
                                    <div class="text-muted mb-3">Valoración promedio general</div>
                                    <div
                                        class="d-inline-block px-3 py-1 rounded-pill fs-sm fw-semibold text-danger bg-danger-light">
                                        <i class="fa fa-caret-down me-1"></i>
                                        0.3%
                                    </div>
                                </div>
                                <div class="block-content block-content-full block-content-sm bg-body-light fs-sm">
                                    <a class="fw-medium" href="javascript:void(0)">
                                        <i class="fa fa-arrow-right ms-1 opacity-25"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">
                                Estadísticas
                            </h3>
                            <div class="block-options">

                            </div>
                        </div>


                        <div class="charts-container">
                            <div class="chart-container">
                                <canvas id="genderChart"></canvas>
                            </div>
                            <div class="chart-container">
                                <canvas id="ratingsChart"></canvas>
                            </div>
                        </div>



                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->

    <!-- END Page Content -->
@endsection
@push('css')
    <style>
        .charts-container {
            position: relative;
            left: 400px;
            display: flex !important;
            justify-content: center !important;
            /* Centra los gráficos horizontalmente */
            align-items: center !important;
            /* Centra los gráficos verticalmente */
            gap: 50px !important;
            /* Espacio entre los gráficos */
            width: 50% !important;
            /* Ocupa todo el ancho disponible */
            padding: 20px;
            /* Padding alrededor de los gráficos */
        }

        .chart-container {
            width: 50% !important;
            /* Cada contenedor ocupa el 50% del espacio */
            padding: 10px;
            /* Espacio interior para evitar que los gráficos se toquen */
        }

        canvas {
            width: 50% height: auto !important;
            /* Altura automática para mantener la proporción */
        }
    </style>
@endpush

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

    <script>
        // Gráfico de Género
        const genderCtx = document.getElementById('genderChart').getContext('2d');
        const genderChart = new Chart(genderCtx, {
            type: 'pie',
            data: {
                labels: Object.keys({!! json_encode($generos) !!}),
                datasets: [{
                    data: Object.values({!! json_encode($generos) !!}),
                    backgroundColor: [
                        'rgba(255, 182, 193, 0.7)', // Pastel Rojo
                        'rgba(173, 216, 230, 0.7)', // Pastel Azul
                        'rgba(152, 251, 152, 0.7)' // Pastel Verde
                    ],
                    borderColor: [
                        'rgba(255, 182, 193, 1)',
                        'rgba(173, 216, 230, 1)',
                        'rgba(152, 251, 152, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    datalabels: {
                        color: '#fff',
                        backgroundColor: '#666', // Fondo oscuro para las etiquetas
                        borderRadius: 4,
                        padding: 6,
                        font: {
                            weight: 'bold',
                            size: 14
                        },
                        formatter: (value, ctx) => {
                            // Esto mostrará el valor numérico dentro de cada segmento del gráfico de pastel
                            return value;
                        }
                    }
                }
            }
        });

        // Gráfico de Valoraciones
        const ratingsCtx = document.getElementById('ratingsChart').getContext('2d');
        const ratingsData = {!! json_encode($valoraciones) !!};
        const ratingsChart = new Chart(ratingsCtx, {
            type: 'bar',
            data: {
                labels: ['Inglés', 'Excel', 'Bases de Datos', 'Trabajo en Equipo'],
                datasets: [{
                    label: 'Promedio de Valoraciones',
                    data: [ratingsData.ingles, ratingsData.excel, ratingsData.bases_de_datos, ratingsData
                        .trabajo_en_equipo
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        'rgba(75, 192, 192, 0.5)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endpush
