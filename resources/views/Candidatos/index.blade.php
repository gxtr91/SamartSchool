@extends('layouts.backend')
@section('content')
    <div class="block-rounded block-themed bg-image"
        style="background-image: url('https://rootcapital.org/wp-content/uploads/2024/07/homepage-landscape.jpg');">
        <div class="block-header bg-black-50">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 style="color: white" class="flex-grow-1 fs-4 my-1 my-sm-3">Registro de candidatos</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Page Content -->
    <div class="content">
        <!-- Dynamic Table Full -->
        <div class="alert alert-info d-flex align-items-center" role="alert">
            <div class="flex-shrink-0">
                <i class="fa fa-fw fa-info-circle"></i>
            </div>
            <div class="flex-grow-1 ms-3">
                <p class="mb-0">La exportación se realiza en base a criterios de filtro seleccionados.</p>
            </div>
            <div class="dropdown dropleft">
                <a id="exportData" type="button" class="btn btn-secondary">
                    Exportar datos
                </a>
            </div>
        </div>

        @if ($currentUser->id_rol == 1)
            <div class="block block-rounded">
                <ul class="nav nav-tabs nav-tabs-block" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="btabs-animated-fade-home-tab" data-bs-toggle="tab"
                            data-bs-target="#btabs-animated-fade-home" role="tab"
                            aria-controls="btabs-animated-fade-home" aria-selected="true">Datos</button>
                    </li>
                    <!--<li class="nav-item" role="presentation">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      </li>-->
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="btabs-animated-fade-profile-tab" data-bs-toggle="tab"
                            data-bs-target="#btabs-animated-fade-eventos" role="tab"
                            aria-controls="btabs-animated-fade-eventos" aria-selected="false"
                            tabindex="-1">Gráfico</button>
                    </li>
                </ul>
                <div class="block-content tab-content overflow-hidden" style="padding-bottom: 20px">
                    <div class="tab-pane fade active show" id="btabs-animated-fade-home" role="tabpanel"
                        aria-labelledby="btabs-animated-fade-home-tab" tabindex="0">
        @endif
        @if ($currentUser->id_rol == 2 || $currentUser->id_rol == 4)
            <div class="block block-content block-content-full">
        @endif
        @if ($currentUser->id_rol == 1 || $currentUser->id_rol == 2 || $currentUser->id_rol == 3 || $currentUser->id_rol == 4)
            <div class="row">
                <div class="col-lg-2">
                    <div class="form-group">
                        <label for="Entrenador">Género:</label>
                        <select class=" js-select2 form-select me-1 mb-3" id="genero" name="genero"
                            style="width: 100%;">
                            <option value="">::. Todos .::</option>
                            <option value="Femenino">Femenino</option>
                            <option value="Masculino">Masculino</option>


                        </select>
                    </div>
                </div>

                <div style="display: none" id='fechas' class="col-lg-3 mb-2">
                    <div class="form-group">
                        <label for="rangoFechas">Rango de fechas:</label>
                        <div class="input-daterange input-group js-datepicker-enabled" data-date-format="dd/mm/yyyy"
                            data-week-start="1" data-autoclose="true" data-today-highlight="true">
                            <input type="text" id="startDate" placeholder="Inicial">
                            <span class="input-group-text fw-semibold">
                                <i class="fa fa-fw fa-arrow-right"></i>
                            </span>
                            <input type="text" id="endDate" placeholder="Final">
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 mb-3 mt-4 d-flex justify-content-left align-items-center">
                    <button id="btn-limpiar-filtros" class="btn btn-secondary btn-sm" type="button">Limpiar
                        filtros</button>
                </div>

            </div>
        @endif
        <table id="data-table"
            class="table table-bordered table-striped table-vcenter js-dataTable-responsive dataTable no-footer dtr-inline"
            style="width:100%">
            <thead>
                <tr>
                    <th data-priority="1" style="width:150px">Fecha</th>
                    <th data-priority="1" style="width:150px">Nombre completo</th>
                    <th data-priority="1" style="width:200px">Género</th>
                    <th data-priority="1" style="width:550px">Título estudio</th>
                    <th data-priority="1" style="width:150px">Ciudad+Estado</th>
                    <th data-priority="1" style="width:50px">Valoración promedio</th>
                    <th style="text-align: center" data-priority="1" style="width:150px">Status</th>
                    <th style="width:20px">Acciones</th>
                    <!-- Agrega más columnas según tus necesidades -->
                </tr>
            </thead>
        </table>
    </div>
    @if ($currentUser->id_rol == 1)
        <div class="tab-pane fade" id="btabs-animated-fade-profile" role="tabpanel"
            aria-labelledby="btabs-animated-fade-profile-tab" tabindex="0">
            <div class="responsive-iframe">

            </div>
        </div>
        <div class="tab-pane fade" id="btabs-animated-fade-eventos" role="tabpanel"
            aria-labelledby="btabs-animated-fade-eventos" tabindex="0">
            <div class="responsive-iframe">
                <iframe width="400" height="250"
                    src="https://lookerstudio.google.com/embed/reporting/6ef83564-c998-44e5-bf2e-1cab61f05182/page/6zXD"
                    frameborder="0" style="border:0" allowfullscreen
                    sandbox="allow-storage-access-by-user-activation allow-scripts allow-same-origin allow-popups allow-popups-to-escape-sandbox"></iframe>
            </div>
        </div>
        </div>
        </div>
    @endif

    </div>

    </div>


    <!-- END Page Content -->
    <!--start modal -->

    <div class="modal fade" id="modal-update-fadein" tabindex="-1" aria-labelledby="modal-block-large"
        style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="block block-rounded block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title"></h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block block-rounded">
                        <div class="block-content">
                            <div class="mb-2">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        Fecha de envio
                                    </span>
                                    <input readonly readonly type="text" class="form-control "
                                        id="modal_fecha_actividad" name="nombre" autocomplete="off">
                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        Nombre completo
                                    </span>
                                    <input readonly type="text" class="form-control " id="modal_nombre"
                                        name="modal_nombre" autocomplete="off">
                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        Género
                                    </span>
                                    <input readonly type="text" class="form-control " id="modal_genero"
                                        name="modal_genero" autocomplete="off">
                                </div>
                            </div>
                            <div class="mb-2 modulo">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        Duración
                                    </span>
                                    <input readonly type="text" class="form-control " id="modal_duracion"
                                        name="modal_duracion" autocomplete="off">
                                </div>
                            </div>
                            <div class="mb-2 otro_mod">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        Ciudad
                                    </span>
                                    <input readonly type="text" class="form-control " id="modal_ciudad"
                                        name="modal_ciudad" autocomplete="off">
                                </div>
                            </div>
                            <div class="mb-2 otro_mod">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        Estado
                                    </span>
                                    <input readonly type="text" class="form-control " id="modal_estado"
                                        name="modal_estado" autocomplete="off">
                                </div>
                            </div>
                            <div class="mb-2 otro_mod">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        Título
                                    </span>
                                    <input readonly type="text" class="form-control " id="modal_titulo"
                                        name="modal_titulo" autocomplete="off">
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Habilidades</h3>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        Inglés
                                    </span>
                                    <input readonly type="text" class="form-control " id="modal_ingles"
                                        name="modal_ingles" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        Excel
                                    </span>
                                    <input width="20px" readonly type="text" class="form-control " id="modal_excel"
                                        name="modal_excel" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        Base de Datos
                                    </span>
                                    <input readonly type="text" class="form-control " id="modal_bd" name="modal_bd"
                                        autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        Trabajo en equipo
                                    </span>
                                    <input readonly type="text" class="form-control " id="modal_trabajoe"
                                        name="modal_trabajoe" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="block-content">
                            <div class="block-content chart-container">
                                <canvas id="skillsChart"></canvas>
                                <br>
                            </div>
                            <h3 id="prom" class="block-title"></h3>
                        </div>
                    </div>

                    <div class="block-content block-content-full text-end bg-body">
                        <button type="button" class="btn btn-sm btn-alt-secondary"
                            data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--end modal -->
@endsection

@push('css')
    <!-- TNS -->
    <link rel="stylesheet" href="{{ asset('/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css') }}">
    <!-- END TNS -->

    <link rel="stylesheet" href="{{ asset('/js/plugins/sweetalert2/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') }}">

    <style>
        table#data-table tbody tr:nth-child(even):hover td {
            background-color: #f8f8f8 !important;
        }

        table#data-table tbody tr:nth-child(odd):hover td {
            background-color: #f8f8f8 !important;
        }
    </style>
    <style>
        #data-table {
            visibility: hidden;
        }

        .btn-pdf {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-pdf:hover {
            background-color: #2980b9;
        }

        .table> :not(caption)>*>* {
            padding: 0.20rem 0.75rem !important;
        }

        div.dt-buttons {
            position: relative;
            float: right;
            padding: 0 0 10px 10px;
            top: -5px;
        }

        /* Estilos para hacer el iframe responsivo */
        .responsive-iframe {
            position: relative;
            width: 100%;
            height: 0;
            padding-bottom: 56.25%;
            /* Aspect ratio 16:9 */
        }

        .responsive-iframe iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
        }

        #data-table thead,
        td {
            font-size: small;
        }

        .custom-select-size {
            width: 50%;
            /* Ajusta el ancho */
            height: 35px;
            /* Ajusta la altura */
            font-size: 14px;
            /* Ajusta el tamaño del texto */
        }

        .centrar-texto {
            text-align: center;

        }

        .dataTables_filter {
            display: none;
        }

        .chart-container {
            display: flex;
            justify-content: center;
            /* Centra el contenido horizontalmente */
            align-items: center;
            /* Centra el contenido verticalmente */
            height: 100%;
            /* Opcional, dependiendo de tus necesidades */
        }

        #skillsChart {
            width: 50% !important;
            /* Establece el ancho a 50% de su contenedor */
            margin: auto;
            /* Añade margen automático para centrar horizontalmente */
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
@endpush

@push('js')
    <script src="{{ asset('/js/lib/jquery.min.js') }}"></script>
    <script src="{{ asset('/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js') }}"></script>

    <script src="{{ asset('/js/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('/js/plugins/sweetalert2/sweetalert2.min.js') }}"></script> -->
    <script src="{{ asset('/js/plugins/datatables-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('/js/plugins/datatables-buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('/js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('/js/plugins/datatables-buttons-jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('/js/plugins/datatables-buttons-pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('/js/plugins/datatables-buttons-pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('/js/plugins/datatables-buttons/buttons.print.min.js') }}"></script>
    <script src="{{ asset('/js/plugins/datatables-buttons/buttons.html5.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/es.js"></script>

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        let skillsChart; // Variable global para el gráfico


        $(document).ready(function() {
            $('#data-table tbody').on('click', '.moreData', function() {
                $('#modal-update-fadein').modal('show');

            });

            setTimeout(function() {
                document.getElementById('fechas').style.display = 'block';
            }, 500);

            const opcionesFlatpickr = {
                altInput: true,
                altFormat: "Y-m-d",
                dateFormat: "Y-m-d",
                locale: "es" // Para español
            };

            // Inicializar Flatpickr en los campos de entrada
            const fechaInicio = flatpickr("#startDate", {
                ...opcionesFlatpickr,
                onChange: function(selectedDates, dateStr, instance) {
                    fechaFin.set("minDate", dateStr);
                }
            });

            const fechaFin = flatpickr("#endDate", {
                ...opcionesFlatpickr,
                onChange: function(selectedDates, dateStr, instance) {
                    fechaInicio.set("maxDate", dateStr);
                }
            });

            var tabla = $('#data-table').DataTable({
                language: {
                    search: "Búsqueda:",
                    lengthMenu: "_MENU_",
                    info: "_START_ - _END_ de _TOTAL_",
                    infoEmpty: "Mostrando 0 a 0 de 0 registros",
                    infoFiltered: "(filtrado de _MAX_ registros en total)",
                    loadingRecords: "Cargando...",
                    processing: "Procesando...",
                    zeroRecords: "No se encontraron registros",
                    paginate: {
                        first: "Primero",
                        last: "Último",
                        next: "Sig",
                        previous: "Ant"
                    }
                },
                header: true, // Enable custom header styles
                initComplete: function(settings, json) {
                    $('#data-table').css('visibility', 'visible'); // Muestra la tabla
                    $('#data-table thead th').css({
                        "background-color": "#0eb5b3", // Establecer color de fondo a azul claro
                        "height": "50px", // Establecer la altura de los encabezados
                        "font-size": "12px", // Establecer tamaño de texto a 10px
                        "color": "white", // Establecer color de texto a blanco
                        "width": "auto" // Establecer el ancho de columna para que sea el mismo para todas las columnas
                    });
                },

                processing: true,
                serverSide: true,
                responsive: true,
                searchable: false,

                columnDefs: [{
                        className: "centrar-texto",
                        targets: [6]
                    },


                ],
                ajax: {
                    url: '{!! route('candidatos.indexJson') !!}',
                    data: function(d) {
                        d.genero = $('#genero').val(); // Valor del primer combo box
                        d.startDate = $('#startDate').val();
                        d.endDate = $('#endDate').val();
                    }
                },
                columns: [{
                        data: 'fecha_entrevista',
                        name: 'tipo_actividad'
                    },
                    {
                        data: 'nombres_apellidos',
                        name: 'tipo_actividad'
                    },
                    {
                        data: 'genero',
                        name: 'evento_empresa_texto'
                    },

                    {
                        data: 'titulo_estudio',
                        name: 'municipio'
                    },
                    {
                        data: 'ciudad_estado',
                        name: 'municipio'
                    },
                    {
                        data: 'PromedioValoracion',
                        name: 'total_horas'
                    },
                    {
                        data: 'status',
                        name: 'estado',
                        render: function(data, type, row) {

                            if (type === 'display') {
                                var state = parseInt(data);
                                var classColor = ''; // Clase de color por defecto

                                state == 1 ? classColor = 'bg-success' : classColor = 'bg-warning';

                                // Retorna el dato envuelto en un <span> con la clase de Bootstrap para el color de fondo
                                return '<span  class="nav-main-link-badge badge rounded-pill ' +
                                    classColor + '">' + data + '</span>';
                            }

                            return data;
                        }
                    },
                    {
                        data: 'acciones',
                        name: 'acciones'
                    },
                ],

                dom: 'Bfrtip',
                buttons: [{
                        attr: {
                            style: 'display: none;' // Esto ocultará el botón
                        },
                    }

                ],
            });

            $('.dt-buttons').append('<div style="font-weight:bold" id="total"></div>');

            var tabla = $('#data-table').DataTable();
            $('.dt-buttons div').css({
                'padding': '10px',
                'display': 'inline-block' // Esto garantiza que el padding se aplique correctamente
            });

            //FILTROS
            $('#genero, #startDate, #endDate').on('change',
                function() {
                    var tabla = $('#data-table').DataTable();
                    tabla.ajax.reload(); // Recarga la tabla manteniendo la posición de paginación actual
                });


            $('#btn-limpiar-filtros').on('click', function() {
                // Restablece los valores de tus combo boxes

                $('#genero').val('');
                $('#startDate').val('');
                $('#endDate').val('');


                // Aquí asumimos que estás usando DataTables de jQuery
                var tabla = $('#data-table').DataTable();
                tabla.search('').columns().search('').draw();
            });

            $('#data-table tbody').on('click', '.updateState', function() {
                var rowId = $(this).attr('data-id');
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ route('candidatos.updateState') }}",
                    method: 'POST',
                    data: {
                        id: rowId
                    },
                    success: function(response) {
                        tabla.ajax.reload();
                    },
                    error: function(error) {
                        console.log('Error updating state.');
                    }
                });
            });

            $('#data-table tbody').on('click', '.moreData', function() {
                var actividadId = $(this).data(
                    'id'); // Obtén el ID de la actividad desde el atributo data-id
                // Realiza la petición AJAX para obtener los detalles de la actividad
                $.ajax({
                    url: 'candidatos/report-view/' +
                        actividadId, // La URL correcta para obtener los detalles de la actividad
                    type: 'GET',
                    dataType: 'json',
                    success: function(actividad) {
                        $('#modal_fecha_actividad, #modal_nombre_actividad, #modal_tipo_asistencia, #modal_nombre_modulo, #modal_otro_modulo, #modal_objetivo_actividad, #modal_departamento, #modal_municipio, #modal_direccion, #modal_empresa, #modal_tecnico, #modal_horas, #modal_descripcion, #modal_resultados, #modal_obstaculos, #modal_sugerencias')
                            .val('');
                        // Actualiza los campos del modal con los detalles de la actividad
                        $('#modal_fecha_actividad').val(actividad.fecha_entrevista);
                        $('#modal_nombre').val(actividad.nombres_apellidos);
                        $('#modal_genero').val(actividad.genero);
                        $('#modal_duracion').val(actividad.duracion);
                        $('#modal_estado').val(actividad.estado);
                        $('#modal_ciudad').val(actividad.ciudad);
                        $('#modal_titulo').val(actividad.titulo_estudio);
                        $('#modal_ingles').val(actividad.ValoracionIngles);
                        $('#modal_excel').val(actividad.ValoracionExcel);
                        $('#modal_bd').val(actividad.ValoracionBasesDeDatos);
                        $('#modal_trabajoe').val(actividad.ValoracionTrabajoEquipo);
                        $('#prom').text('Puntación promedio: ' + actividad.PromedioValoracion);
                        // Datos para el gráfico
                        const data = {
                            labels: ['Inglés', 'Excel', 'Bases de Datos',
                                'Trabajo en Equipo'
                            ],
                            datasets: [{
                                label: 'Habilidades',
                                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                borderColor: 'rgba(255, 99, 132, 1)',
                                pointBackgroundColor: 'rgba(255, 99, 132, 1)',
                                data: [
                                    actividad.ValoracionIngles,
                                    actividad.ValoracionExcel,
                                    actividad.ValoracionBasesDeDatos,
                                    actividad.ValoracionTrabajoEquipo
                                ]
                            }]
                        };

                        // Asegurarse de destruir cualquier gráfico anterior antes de crear uno nuevo
                        if (window.skillsChart instanceof Chart) {
                            window.skillsChart.destroy();
                        }

                        const ctx = document.getElementById('skillsChart').getContext('2d');
                        window.skillsChart = new Chart(ctx, {
                            type: 'radar',
                            data: data,
                            options: {
                                scales: {
                                    r: {
                                        angleLines: {
                                            display: true
                                        },
                                        suggestedMin: 1, // Asegura que la escala comienza en 1
                                        suggestedMax: 5, // Asegura que la escala termina en 5
                                        ticks: {
                                            stepSize: 1, // Define el tamaño de paso de la escala a 1
                                            callback: function(value, index,
                                                values
                                            ) { // Opcional para formatear las etiquetas
                                                return value;
                                            }
                                        }
                                    }
                                },
                                plugins: {
                                    legend: {
                                        position: 'top',
                                    }
                                },
                                responsive: true,
                                maintainAspectRatio: false
                            }
                        });

                        $('#modal-update-fadein').modal('show');
                    },
                    error: function(error) {
                        // Manejo de errores aquí
                        console.error('Error al obtener los detalles de la actividad: ', error);
                    }
                });

            });

            tabla.on('draw', function() {
                var info = tabla.page.info();
                $('#total').html('Total: ' + info.recordsDisplay);
                var ids = [];

                // Selecciona todos los elementos que tienen un 'data-id' en las filas visibles de la tabla
                tabla.$('a[data-id]').each(function() {
                    // Añade el 'data-id' al array
                    var dataId = $(this).data('id');
                    if (dataId) { // Asegúrate de que el data-id existe y es válido
                        ids.push(dataId);
                    }
                });

                // Ahora puedes usar 'ids' para lo que necesites
                console.log('IDs recopilados tras el redibujo:', ids);
            });

            $('#exportData').on('click', function() {
                var genero = $('#genero').val();

                var startDate = $('#startDate').val();
                var endDate = $('#endDate').val();
                var info = tabla.page.info();

                if (info.recordsDisplay == 0) {
                    Swal.fire({

                        text: 'No se han seleccionado datos para exportar',
                        icon: 'warning',
                        confirmButtonColor: '#1F2350',
                        confirmButtonText: 'Aceptar',
                        cancelButtonColor: '#3085d6',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            return false;
                        }
                    });
                }
                if (startDate != '' && endDate == '') {
                    Swal.fire({

                        text: 'Seleccione una fecha final',
                        icon: 'warning',
                        confirmButtonColor: '#1F2350',
                        confirmButtonText: 'Aceptar',
                        cancelButtonColor: '#3085d6',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            return false;
                        }
                    });
                }
                if (info.recordsDisplay != 0 && startDate == '' && endDate == '') {
                    window.location.href = 'candidatos/excel-candidatos?genero=' + genero +
                        '&startDate=' + startDate + '&endDate=' + endDate;
                }
                if (info.recordsDisplay != 0 && startDate != '' && endDate != '') {
                    window.location.href = 'candidatos/excel-candidatos?genero=' + genero +
                        '&startDate=' + startDate + '&endDate=' + endDate;
                }
            });



        });
    </script>
@endpush
