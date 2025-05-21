@include('layouts.head')

<body>
    @include('layouts.header')
    <main>

        @if (isset($isAdmin) && $isAdmin)
            @if ($datos->isEmpty())
                <p class="text-muted">No se han encontrado datos personales.</p>
            @else
                <div class="text-center mb-3">
                    <a href="{{ route('home') }}" class="btn btn-dark">Volver al menú</a>
                </div>
                @foreach ($datos as $dato)
                    <div class="card m-2 shadow-sm">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title mb-0">
                                    <a href="{{ route('datos.show', $dato->id) }}" class="text-dark text-decoration-none">
                                        {{ $dato->nombre }}
                                    </a>
                                </h5>
                            </div>
                            <div>
                                <button class="btn btn-dark m-1 editDatoBtn" data-bs-toggle="modal" data-bs-target="#editDatoModal"
                                    data-id="{{ $dato->id }}" data-empresa="{{ $dato->empresa }}" data-nombre="{{ $dato->nombre }}"
                                    data-apellidos="{{ $dato->apellidos }}" data-direccion="{{ $dato->direccion }}"
                                    data-telefono="{{ $dato->telefono }}" data-email="{{ $dato->email }}"
                                    data-dni="{{ $dato->DNI }}">
                                    Editar
                                </button>
                                <form action="{{ route('datos.destroy', $dato->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-dark m-1 deleteDatoBtn">Eliminar</button>
                                </form>

                            </div>
                        </div>
                    </div>

                @endforeach
            @endif
            <div class="text-center mt-4">
                <a href="{{ route('home') }}" class="btn btn-dark">Volver al menú</a>
            </div>
            <!-- ****************************MODAL ************************** -->

            <div class="modal fade" id="editDatoModal" tabindex="-1" aria-labelledby="editDatoLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form id="editDatoForm" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" id="datoId">

                            <div class="modal-header">
                                <h5 class="modal-title" id="editDatoLabel">Editar Datos Personales</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="empresa" class="form-label">Empresa</label>
                                    <input type="text" class="form-control" id="empresa" name="empresa">
                                </div>
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre">
                                </div>
                                <div class="mb-3">
                                    <label for="apellidos" class="form-label">Apellidos</label>
                                    <input type="text" class="form-control" id="apellidos" name="apellidos">
                                </div>
                                <div class="mb-3">
                                    <label for="direccion" class="form-label">Dirección</label>
                                    <input type="text" class="form-control" id="direccion" name="direccion">
                                </div>
                                <div class="mb-3">
                                    <label for="telefono" class="form-label">Teléfono</label>
                                    <input type="text" class="form-control" id="telefono" name="telefono">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>
                                <div class="mb-3">
                                    <label for="dni" class="form-label">DNI</label>
                                    <input type="text" class="form-control" id="dni" name="dni">
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
    @include('layouts.footer')
    <script src="{{ asset('js/datos.js') }}"></script>


</body>

</html>