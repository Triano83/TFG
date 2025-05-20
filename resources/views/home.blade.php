@include('layouts.head')

<body>


    @include('layouts.header')
    <main>
        @if ($isAdmin)
        <div class="row justify-content-center">
            <div class="card mb-3 mx-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-2">
                        <img src="{{ asset('asset/img/logo/dientitopeque.png') }}" class="img-fluid rounded-start"
                            alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Clínicas Dentales</h5>
                            <p class="card-text">Creacion, Borrado y Listado de Clinicas Dentales</p>
                            <p class="card-text ">
                                <small class="text-muted">
                                    <button type="button" class="btn btn-dark m-2" data-bs-toggle="modal"
                                        data-bs-target="#addClinicModal">Añadir</button>
                                    <a href="{{ route('clinicas.show') }}"><button type="button"
                                            class="btn btn-dark m-2">Listado</button></a> </small>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3 mx-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-2">
                        <img src="{{ asset('asset/img/logo/dientitopeque.png') }}" class="img-fluid rounded-start"
                            alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Datos personales</h5>
                            <p class="card-text">Tus Datos Personales para que aparezcan en la factura</p>
                            <button type="button" class="btn btn-dark m-2" data-bs-toggle="modal"
                                data-bs-target="#addDatosModal">Añadir</button>
                            <a href="{{ route('datos.show') }}"><button type="button"
                                    class="btn btn-dark m-2">Listado</button></a>
                            </small></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3 mx-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-2">
                        <img src="{{ asset('asset/img/logo/dientitopeque.png') }}" class="img-fluid rounded-start"
                            alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Lista de Precios</h5>
                            <p class="card-text">Agregar, borrar, modificar, consultar productos y precios</p>
                            <p class="card-text"><small class="text-muted">
                                    <button type="button" class="btn btn-dark m-2">Añadir </button>
                                    <a href="{{ route ('lista.show') }}"><button type="button"
                                            class="btn btn-dark m-2">Listado</button></a>

                                </small></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3 mx-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-2">
                        <img src="{{ asset('asset/img/logo/dientitopeque.png') }}" class="img-fluid rounded-start"
                            alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Creacion de facturas</h5>
                            <p class="card-text">Crear, modificar , borrar, y listar facturas</p>
                            <p class="card-text"><small class="text-muted">
                                    <button type="button" class="btn btn-dark m-2">Añadir </button>
                                    <button type="button" class="btn btn-dark m-2">Listado</button>
                                </small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ventana del modal para Añadir Datos Personales -->
        <div class="modal fade" id="addDatosModal" tabindex="-1" aria-labelledby="addDatosModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addDatosModalLabel">Añadir Datos Personales</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action=" {{ route('datos.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="empresa" class="form-label">Empresa</label>
                                <input type="text" class="form-control" id="empresa" name="empresa" required>
                            </div>
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>
                            <div class="mb-3">
                                <label for="apellidos" class="form-label">Apellidos</label>
                                <input type="text" class="form-control" id="apellidos" name="apellidos" required>
                            </div>
                            <div class="mb-3">
                                <label for="direccion" class="form-label">Dirección</label>
                                <input type="text" class="form-control" id="direccion" name="direccion" required>
                            </div>
                            <div class="mb-3">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="tel" class="form-control" id="telefono" name="telefono" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo Electrónico</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="DNI" class="form-label">DNI</label>
                                <input type="text" class="form-control" id="DNI" name="DNI" required>
                            </div>
                            <button type="submit" class="btn btn-dark">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ventana del modal para Añadir Clinicas -->
        <div class="modal fade" id="addClinicModal" tabindex="-1" aria-labelledby="addClinicModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addClinicModalLabel">Añadir Clínica</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('clinica.store') }}">

                            @csrf
                            <div class="mb-3">
                                <label for="clinicName" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="clinicName" name="nombre" required>
                            </div>
                            <div class="mb-3">
                                <label for="clinicAddress" class="form-label">Dirección</label>
                                <input type="text" class="form-control" id="clinicAddress" name="direccion" required>
                            </div>
                            <div class="mb-3">
                                <label for="clinicNIF" class="form-label">NIF</label>
                                <input type="text" class="form-control" id="clinicNIF" name="NIF" required>
                            </div>
                            <div class="mb-3">
                                <label for="clinicEmail" class="form-label">Correo Electrónico</label>
                                <input type="email" class="form-control" id="clinicEmail" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="clinicPhone" class="form-label">Teléfono</label>
                                <input type="tel" class="form-control" id="clinicPhone" name="telefono" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>



        @else
        <script>
            window.location.href = "{{ route('homenoadmin') }}";
        </script>
        @endif
    </main>
    @include('layouts.footer')

</body>

</html>
