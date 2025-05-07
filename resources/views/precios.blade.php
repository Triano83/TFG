<!doctype html>
<html lang="en">

<head>
    <title>S.M Dental</title>
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
    <main class="mainPrecio">
        <div class="listaPrecio">
            <h1>Listado de precios</h1>
        </div>
        <div class="justify-content-center">
            <table id="datos">
                <tr>
                    <th>Articulo</th>
                    <th>Precio</th>
                </tr>

            </table>
        </div>


    </main>
    @include('layouts.footer')

    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>