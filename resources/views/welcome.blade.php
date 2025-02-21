<!doctype html>
<html lang="es">

<head>
    <title>S.M. Dental</title>
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
    <main>
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 ">
            <div class="card m-3" style="width: 18rem;">
                <img src="{{ asset('asset/img/protesis.jpg') }}" class="card-img-top" alt="dentadura">
                <div class="card-body">
                    <p class="card-text">Con más de 20 años de experiencia en el ámbito de la prótesis dental, en S.M
                        Dental nos enorgullecemos de nuestro trabajo, porque tu sonrisa es nuestra prioridad.</p>
                </div>
            </div>
            <div class="card m-3" style="width: 18rem;">
                <img src="{{ asset('asset/img/feruladescarga.png') }}" class="card-img-top" alt="ferula">
                <div class="card-body">
                    <p class="card-text">Nuestros materiales son de primera calidad, trabajamos con las marcas mas
                        potentes del sector protesico.</p>
                </div>
            </div>
            <div class="card m-3" style="width: 18rem;">
                <img src="{{ asset('asset/img/implantes.jpeg') }}" class="card-img-top" alt="implantes">
                <div class="card-body">
                    <p class="card-text">Trabajamos tanto implantes, como estructuras removibles. Nuestros precios estan
                        ajustados para que puedas tener la mejor calidad a un precio accesible.</p>
                </div>
            </div>
            <div class="card m-3" style="width: 18rem;">
                <img src="{{ asset('asset/img/removible.jpeg') }}" class="card-img-top" alt="implantes">
                <div class="card-body">
                    <p class="card-text">Ven a vernos o contacta con nosotros, Estaremos encantados de proporcionarle la
                        mejor atención y solución para sus necesidades.</p>
                </div>
            </div>
        </div>
        <!-- Modal Login -->
        <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="loginModalLabel">Identificarse</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                <input type="password" class="form-control" id="login-password" name="password"
                                    required>
                            </div>
                            <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Registro  -->
        <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel"
            aria-hidden="true">
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