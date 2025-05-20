@include('layouts.head')

<body>
    @include('layouts.header')
    <main>
        @if (isset($isAdmin) && $isAdmin)
        @if ($lista->isEmpty())
        <p class="text-muted">No se han encontrado articulos.</p>
        @else
        <div class="text-center mb-3">
            <a href="{{ route('home') }}" class="btn btn-dark">Volver al menú</a>
        </div>
        @foreach ($lista as $articulo)
        <div class="card m-2 shadow-sm">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="card-title mb-0">
                        <a href="{{ route('lista.show', $articulo->id) }}" class="text-dark text-decoration-none">
                            {{ $articulo->nombre }}
                        </a>
                    </h5>
                </div>
                <div>
                    <button class="btn btn-dark m-1 editArticuloBtn" data-bs-toggle="modal" data-bs-target="#editArticuloModal"
                        data-id="{{ $articulo->id }}" data-nombre="{{ $articulo->nombre }}" data-precio="{{ $articulo->precio }}">
                        Editar
                    </button>
                    <form action="{{ route('lista.destroy', $articulo->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-dark m-1 deleteArticuloBtn">Eliminar</button>
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
        <div class="modal fade" id="editListaModal" tabindex="-1" aria-labelledby="editListaLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="editListaForm" method="POST"  >
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="listaId">

                        <div class="modal-header">
                            <h5 class="modal-title" id="editListaLabel">Editar Lista de Precios</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre">
                            </div>
                            <div class="mb-3">
                                <label for="precio" class="form-label">Precio</label>
                                <input type="number" name="precio" id="precio" class="form-control">
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
    <script src="{{ asset('js/lista.js') }}"></script>
