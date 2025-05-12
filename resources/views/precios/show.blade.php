@include('layouts.head')

<body>
    @include('layouts.header')
    <main>

        @if (isset($isAdmin) && $isAdmin)
            @if ($precios->isEmpty())
                <p class="text-muted">No se han encontrado ningún articulo.</p>
            @else
                <div class="text-center mb-3">
                    <a href="{{ route('home') }}" class="btn btn-dark">Volver al menú</a>
                </div>
                @foreach ($precios as $precio)
                    <div class="card m-2 shadow-sm">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title mb-0">
                                    <a href="{{ route('precios.show', $precio->id) }}" class="text-dark text-decoration-none">
                                        {{ $precio->nombre }}
                                    </a>
                                </h5>
                            </div>
                            <div>
                                <button class="btn btn-dark m-1 editPrecioBtn" data-bs-toggle="modal"
                                    data-bs-target="#editPrecioModal" data-id="{{ $precio->id }}"
                                    data-nombre="{{ $precio->nombre }}" data-precio="{{ $precio->precio }}"
                                    >
                                    Editar
                                </button>
                                <form action="{{ route('precios.destroy', $precio->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-dark m-1 deletePrecioBtn">Eliminar</button>
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

            <div class="modal fade" id="editPrecioModal" tabindex="-1" aria-labelledby="editPrecioLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form id="editPrecioForm" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" id="precioId">

                            <div class="modal-header">
                                <h5 class="modal-title" id="editPrecioLabel">Editar Clínica</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre">
                                </div>
                                <div class="mb-3">
                                    <label for="precio" class="form-label">Precio</label>
                                    <input type="number" class="form-control" id="precio" name="precio">
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
    <script src="{{ asset('js/precios.js') }}"></script>


</body>

</html>
