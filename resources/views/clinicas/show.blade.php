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

        @if (isset($isAdmin) && $isAdmin)
            @if ($clinicas->isEmpty())
                <p class="text-muted">No se han encontrado Clinicas.</p>
            @else
                <div class="text-center mb-3">
                    <a href="{{ route('home') }}" class="btn btn-dark">Volver al Home</a>
                </div>
                @foreach ($clinicas as $clinica)
                    <div class="card m-2 shadow-sm">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title mb-0">
                                    <a href="{{ route('clinicas.show', $clinica->id) }}" class="text-dark text-decoration-none">
                                        {{ $clinica->nombre }}
                                    </a>
                                </h5>
                            </div>
                            <div>
                                <button class="btn btn-dark m-1 editClinicaBtn" data-bs-toggle="modal"
                                    data-bs-target="#editClinicaModal" data-id="{{ $clinica->id }}"
                                    data-nombre="{{ $clinica->nombre }}" data-direccion="{{ $clinica->direccion }}"
                                    data-nif="{{ $clinica->NIF }}" data-email="{{ $clinica->email }}"
                                    data-telefono="{{ $clinica->telefono }}">
                                    Editar
                                </button>
                                <form action="{{ route('clinicas.destroy', $clinica->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-dark m-1 deleteClinicaBtn">Eliminar</button>
                                </form>

                            </div>
                        </div>
                    </div>

                @endforeach
            @endif
            <div class="text-center mt-4">
                <a href="{{ route('home') }}" class="btn btn-dark">Volver al Home</a>
            </div>
            <!-- ****************************MODAL ************************** -->

            <div class="modal fade" id="editClinicaModal" tabindex="-1" aria-labelledby="editClinicaLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form id="editClinicaForm" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" id="clinicaId">

                            <div class="modal-header">
                                <h5 class="modal-title" id="editClinicaLabel">Editar Clínica</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre">
                                </div>
                                <div class="mb-3">
                                    <label for="direccion" class="form-label">Dirección</label>
                                    <input type="text" class="form-control" id="direccion" name="direccion">
                                </div>
                                <div class="mb-3">
                                    <label for="NIF" class="form-label">NIF</label>
                                    <input type="text" class="form-control" id="NIF" name="NIF">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>
                                <div class="mb-3">
                                    <label for="telefono" class="form-label">Teléfono</label>
                                    <input type="text" class="form-control" id="telefono" name="telefono">
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-dark">Guardar cambios</button>
                            </div>
                        </form>
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
    <script src="{{ asset('js/clinicas.js') }}"></script>


</body>

</html>