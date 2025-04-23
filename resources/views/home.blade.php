<!doctype html>
<html lang="en">

<head>
    <title>Admin</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>
    <header
        class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
            <img src="{{ asset('asset/img/logo/dientitopeque.png') }}" alt="Logotipo" class="m-3">
        </a>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="/" class="nav-link px-2 link-dark">Home</a></li>

        </ul>

        <div class="col-md-3 text-end">

        </div>
    </header>
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
                                <button type="button" class="btn btn-dark m-2">Añadir </button>
                                <button type="button" class="btn btn-dark m-2">Listado</button>

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
                                        <button type="button" class="btn btn-dark m-2">Listado</button>

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
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <div class="col-md-4 d-flex align-items-center">
            <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                <svg class="bi" width="30" height="24">
                    <use xlink:href="#bootstrap"></use>
                </svg>
            </a>
            <span class="text-muted">&copy;2025 Jose Luis Triano</span>
        </div>
        <img src="{{ asset('asset/img/logo/dientitopeque.png') }}" alt="Logotipo" class="m-3">
        <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
            <li class="ms-3"><a class="text-muted m-3" href="#"><img src="{{ asset('asset/img/rrss/instagram.png') }}"
                        alt="Logotipo Instagram" width="50px">

                </a></li>
            <li class="ms-3"><a class="text-muted m-3" href="#"><img src="{{ asset('asset/img/rrss/facebook.png') }}"
                        alt="Logotipo Facebook" width="50px">

                </a></li>
            <li class="ms-3"><a class="text-muted m-3" href="#"><img src="{{ asset('asset/img/rrss/whatsapp.png') }}"
                        alt="Logotipo Whatsapp" width="50px">

                </a></li>
        </ul>
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>