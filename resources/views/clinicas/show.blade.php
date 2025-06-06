@include('layouts.head')

<body>
    @include('layouts.header')
    <main>

        @if (isset($isAdmin) && $isAdmin)
            @if ($clinicas->isEmpty())
                <p class="text-muted">No se han encontrado Clinicas.</p>
            @else
                <div class="text-center mb-3">
                    <a href="{{ route('home') }}" class="btn btn-dark">Volver al menú</a>
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
                <a href="{{ route('home') }}" class="btn btn-dark">Volver al menú</a>
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
    @include('layouts.footer')
    <script src="{{ asset('js/clinicas.js') }}"></script>


</body>

</html>