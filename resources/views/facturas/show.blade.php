@include('layouts.head')

<body>
<div class="container mt-4">
        <!-- Datos del Cliente -->
        <h2>Datos del Cliente</h2>
        <div class="mb-3">
            <input type="text" class="form-control" placeholder="Nombre del cliente">
            <input type="text" class="form-control mt-2" placeholder="Dirección">
            <input type="text" class="form-control mt-2" placeholder="Teléfono">
        </div>

        <!-- Tus Datos -->
        <h2>Tus Datos</h2>
        <div class="mb-3">
            <input type="text" class="form-control" placeholder="Nombre de tu empresa">
            <input type="text" class="form-control mt-2" placeholder="Dirección">
        </div>

        <!-- Artículos -->
        <h2>Artículos Comprados</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Artículo</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody id="items">
                <!-- Filas dinámicas aquí -->
            </tbody>
        </table>
        <button class="btn btn-primary" onclick="agregarItem()">Agregar artículo</button>

        <!-- Resumen y total -->
        <h2>Resumen</h2>
        <p>Fecha: <span id="fecha"></span></p>
        <p>Subtotal: <span id="subtotal">0.00</span> €</p>
        <p>IVA (21%): <span id="iva">0.00</span> €</p>
        <p><strong>Total con IVA: <span id="total">0.00</span> €</strong></p>
    </div>

    <script>
        function agregarItem() {
            let fila = `<tr>
                <td><input type="text" class="form-control" placeholder="Descripción"></td>
                <td><input type="number" class="form-control" placeholder="Cantidad"></td>
                <td><input type="number" class="form-control" placeholder="Precio"></td>
            </tr>`;
            document.getElementById('items').innerHTML += fila;
        }

        function calcularTotal() {
            let filas = document.querySelectorAll("#items tr");
            let subtotal = 0;
            filas.forEach(fila => {
                let cantidad = fila.querySelector("td:nth-child(2) input").value || 0;
                let precio = fila.querySelector("td:nth-child(3) input").value || 0;
                subtotal += cantidad * precio;
            });
            let iva = subtotal * 0.21;
            let total = subtotal + iva;

            document.getElementById('subtotal').innerText = subtotal.toFixed(2);
            document.getElementById('iva').innerText = iva.toFixed(2);
            document.getElementById('total').innerText = total.toFixed(2);
        }

        document.getElementById('fecha').innerText = new Date().toLocaleDateString();
        setInterval(calcularTotal, 1000);
    </script>
</body>
</html>
