@include('layouts.head')

<body class="bg-light">
    @include('layouts.header')

    <main class="container py-4">
        @if (isset($isAdmin) && $isAdmin)
            @if ($lista->isEmpty())
                <div class="alert alert-secondary text-center" role="alert">
                    No se han encontrado artículos.
                </div>
            @else
                <div class="text-center mb-4">
                    <a href="{{ route('home') }}" class="btn btn-outline-dark">Volver al menú</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead class="table-dark text-white">
                            <tr class="text-center">
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lista as $articulo)
                                <tr class="text-center align-middle">

                                    <td>{{ $articulo->id }}</td>
                                    <td>{{ $articulo->nombre }}</td>
                                    <td class="fw-bold">{{ $articulo->precio }} €</td>
                                    <td>
                                        <button class="btn btn-outline-dark btn-sm editListaBtn" data-bs-toggle="modal"
                                            data-bs-target="#editListaModal" data-id="{{ $articulo->id }}"
                                            data-nombre="{{ $articulo->nombre }}" data-precio="{{ $articulo->precio }}">
                                            Editar
                                        </button>

                                        <form action="{{ route('lista.destroy', $articulo->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="btn btn-outline-danger deleteArticuloBtn btn-sm ">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

            <div class="text-center mt-4">
                <a href="{{ route('home') }}" class="btn btn-outline-dark">Volver al menú</a>
            </div>

            <!-- Modal para edición -->
            <div class="modal fade" id="editListaModal" tabindex="-1" aria-labelledby="editListaLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form id="editListaForm" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" id="listaId">

                            <div class="modal-header bg-dark text-white">
                                <h5 class="modal-title" id="editListaLabel">Editar Lista de Precios</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="nombre" class="form-label fw-bold">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre">
                                </div>
                                <div class="mb-3">
                                    <label for="precio" class="form-label fw-bold">Precio</label>
                                    <input type="number" step="0.01" name="precio" id="precio" class="form-control">
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
</body>