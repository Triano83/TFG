<!doctype html>
<html lang="es">

<head>
    <title>S.M. Dental</title>
    <!-- Meta etiquetas -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        /* Ajuste de tamaño para imágenes del carrusel */
        .carousel img {
            max-height: 650px;
            width: auto;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header class="d-flex flex-wrap align-items-center justify-content-between py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
            <img src="{{ asset('asset/img/logo/dientitopeque.png') }}" alt="Logotipo" class="m-3">
        </a>
        <ul class="nav col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="precios" class="nav-link px-2 link-secondary">Lista de precios</a></li>
            <li><a href="{{ route('home') }}" class="nav-link px-2 link-dark">Home</a></li>
        </ul>
        <div class="col-md-3 text-end">
            <button type="button" class="btn btn-outline-primary me-2" data-bs-toggle="modal"
                data-bs-target="#loginModal">Autentificarse</button>
            <button type="button" class="btn btn-outline-primary m-3" data-bs-toggle="modal"
                data-bs-target="#registerModal">Registrarse</button>
        </div>
    </header>

    <!-- Carrusel -->
    <main>
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('asset/img/protesis.jpg') }}" class="d-block w-100" alt="dentadura">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Prótesis Dental</h5>
                        <p>Con más de 20 años de experiencia, tu sonrisa es nuestra prioridad.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('asset/img/feruladescarga.png') }}" class="d-block w-100" alt="ferula">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Materiales de Calidad</h5>
                        <p>Trabajamos con las mejores marcas del sector protésico.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('asset/img/implantes.jpeg') }}" class="d-block w-100" alt="implantes">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Implantes y Estructuras</h5>
                        <p>Calidad premium a un precio accesible.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('asset/img/removible.jpeg') }}" class="d-block w-100" alt="removible">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Estructuras Removibles</h5>
                        <p>La mejor atención y solución para tus necesidades.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </div>
    </main>

    <!-- Modales -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Identificarse</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="login-email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="login-email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="login-password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="login-password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registerModalLabel">Registrarse</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('register') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="email" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" name="password" class="form-control" id="password" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Confirmar Contraseña</label>
                            <input type="password" name="password_confirmation" class="form-control" id="password"
                                required>
                        </div>
                        <button type="submit" class="btn btn-primary">Registrarse</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <div class="col-md-4 d-flex align-items-center">
            <span class="text-muted">&copy;2025 Jose Luis Triano</span>
        </div>
        <img src="{{ asset('asset/img/logo/dientitopeque.png') }}" alt="Logotipo" class="m-3">
        <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
            <li class="ms-3"><a class="text-muted m-3" href="#"><img src="{{ asset('asset/img/rrss/instagram.png') }}"
                        alt="Logotipo Instagram" width="50px"></a></li>
            <li class="ms-3"><a class="text-muted m-3" href="#"><img src="{{ asset('asset/img/rrss/facebook.png') }}"
                        alt="Logotipo Facebook" width="50px"></a></li>
            <li class="ms-3"><a class="text-muted m-3" href="#"><img src="{{ asset('asset/img/rrss/whatsapp.png') }}"
                        alt="Logotipo Whatsapp" width="50px"></a></li>
        </ul>
    </footer>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>