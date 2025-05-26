<!doctype html>
<html lang="es">

<head>
    <title>S.M. Dental</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="{{ asset('css/styleFactura.css') }}">

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            padding: 40px;
            margin: 0;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        label,
        strong {
            font-weight: 600;
        }

        select,
        input {
            padding: 6px 10px;
            font-size: 0.95rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-top: 5px;
            margin-bottom: 15px;
        }

        button {
            padding: 6px 14px;
            font-size: 0.95rem;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.05);
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 20px;
            gap: 20px;
        }

        .col-half {
            flex: 1;
            min-width: 300px;
        }

        .card {
            border: 1px solid #ccc;
            padding: 15px;
            border-radius: 6px;
            background-color: #fefefe;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        table th,
        table td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
        }

        table th {
            background-color: #f0f0f0;
        }

        .footer-info {
            text-align: center;
            font-size: 0.85rem;
            color: #666;
            margin-top: 30px;
        }

        .summary-box {
            max-width: 300px;
            margin-left: auto;
            border: 1px solid #ccc;
            padding: 15px;
            border-radius: 6px;
            background-color: #fefefe;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Factura</h1>

        @if (isset($isAdmin) && $isAdmin)
            @if (!$datos->isEmpty())
                <select id="clienteSelect" onchange="rellenarDatosCliente()">
                    <option value="">-- Selecciona la empresa --</option>
                    @foreach ($datos as $dato)
                        <option value="{{ $dato->id }}">{{ $dato->nombre }} {{ $dato->apellidos }}</option>
                    @endforeach
                </select>
            @endif

            @if (!$clinicas->isEmpty())
                <select id="clinicaSelect" onchange="rellenarDatosClinica()">
                    <option value="">-- Selecciona una clínica --</option>
                    @foreach ($clinicas as $clinica)
                        <option value="{{ $clinica->id }}">{{ $clinica->nombre }}</option>
                    @endforeach
                </select>
            @endif

            <div class="row">
                <div class="col-half">
                    <div class="card">
                        <h4><strong>Datos de la Empresa</strong></h4>
                        <p><span id="nombreCliente"></span> <span id="apellidosCliente"></span></p>
                        <p><span id="direccionCliente"></span></p>
                        <p>Tel: <span id="telefonoCliente"></span></p>
                        <p>Email: <span id="emailCliente"></span></p>
                    </div>
                </div>
                <div class="col-half">
                    <div class="card">
                        <h4><strong>Datos de la Clínica</strong></h4>
                        <p><span id="nombreClinica"></span></p>
                        <p><span id="direccionClinica"></span></p>
                        <p>Tel: <span id="telefonoClinica"></span></p>
                        <p>Email: <span id="emailClinica"></span></p>
                    </div>
                </div>
            </div>

            <p><strong>Factura Nº:</strong> {{$facturas->count() + 1}}</p>
            <p><strong>Fecha:</strong> <span id="fechaFactura"></span></p>

            @if (!$listas->isEmpty())
                <div>
                    <select id="productoSelect">
                        <option value="">-- Selecciona un producto --</option>
                        @foreach ($listas as $producto)
                            <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                        @endforeach
                    </select>
                    <button onclick="agregarProducto()">Agregar</button>
                </div>
            @endif

            <table id="tablaProductos">
                <thead>
                    <tr>
                        <th>Nombre del producto</th>
                        <th>Precio Unitario (€)</th>
                        <th>Cantidad</th>
                        <th>Total (€)</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="tablaProductosBody">
                    <!-- Productos -->
                </tbody>
            </table>

            <div class="summary-box">
                <p><strong>Subtotal:</strong> <span id="subtotalFactura">0.00 €</span></p>
                <label for="descuentoInput"><strong>Descuento (%):</strong></label><br>
                <input type="number" id="descuentoInput" min="0" max="100" value="0" /><br><br>
                <p><strong>Total con Descuento:</strong> <span id="totalFactura">0.00 €</span></p>
            </div>

            <p class="footer-info">
                Esta factura ha sido generada electrónicamente y no requiere firma.
            </p>
        @endif
    </div>

    <!-- Scripts: se mantienen igual -->
    <script>
        const clientes = @json($datos);
        const clinicas = @json($clinicas);
        const productos = @json($listas);
        document.getElementById("fechaFactura").textContent = new Date().toLocaleDateString("es-ES");

        function rellenarDatosCliente() {
            const select = document.getElementById('clienteSelect');
            const id = select.value;
            const cliente = clientes.find(c => c.id == id);
            if (!cliente) return;

            document.getElementById('nombreCliente').textContent = cliente.nombre || '';
            document.getElementById('apellidosCliente').textContent = cliente.apellidos || '';
            document.getElementById('direccionCliente').textContent = cliente.direccion || '';
            document.getElementById('telefonoCliente').textContent = cliente.telefono || '';
            document.getElementById('emailCliente').textContent = cliente.email || '';

            // Oculta el select una vez seleccionado
            if (id) {
                select.style.display = 'none';
                const label = select.previousElementSibling;
                if (label && label.tagName.toLowerCase() === 'label') {
                    label.style.display = 'none';
                }
            }
        }

        function rellenarDatosClinica() {
            const select = document.getElementById('clinicaSelect');
            const id = select.value;
            const clinica = clinicas.find(c => c.id == id);
            if (!clinica) return;

            document.getElementById('nombreClinica').textContent = clinica.nombre || '';
            document.getElementById('direccionClinica').textContent = clinica.direccion || '';
            document.getElementById('telefonoClinica').textContent = clinica.telefono || '';
            document.getElementById('emailClinica').textContent = clinica.email || '';

            // Oculta el select una vez seleccionado
            if (id) {
                select.style.display = 'none';
                const label = select.previousElementSibling;
                if (label && label.tagName.toLowerCase() === 'label') {
                    label.style.display = 'none';
                }
            }
        }


        function agregarProducto() {
            const select = document.getElementById('productoSelect');
            const productoId = select.value;
            if (!productoId) return;

            const producto = productos.find(p => p.id == productoId);
            if (!producto) return;

            const existe = document.querySelector(`#tablaProductosBody tr[data-id='${producto.id}']`);
            if (existe) {
                alert("Este producto ya ha sido agregado.");
                return;
            }

            const precioUnitario = parseFloat(producto.precio || 0).toFixed(2);
            const fila = document.createElement('tr');
            fila.setAttribute('data-id', producto.id);

            fila.innerHTML = `
        <td>${producto.nombre}</td>
        <td><span class="precio-unitario">${precioUnitario}</span></td>
        <td>
            <input type="number" min="1" value="1" class="form-control form-control-sm cantidad" style="width: 80px;" />
        </td>
        <td><span class="total-linea">${precioUnitario}</span></td>
        <td>
            <button class="btn btn-sm btn-danger eliminar-producto">Eliminar</button>
        </td>
    `;

            // Recalcular al cambiar cantidad
            fila.querySelector('.cantidad').addEventListener('input', function () {
                const cantidad = parseFloat(this.value || 0);
                const totalCell = fila.querySelector('.total-linea');
                const total = (cantidad * precioUnitario).toFixed(2);
                totalCell.textContent = isNaN(total) ? '0.00' : total;
                calcularTotales();
            });

            // Lógica para eliminar producto
            fila.querySelector('.eliminar-producto').addEventListener('click', function () {
                fila.remove();
                calcularTotales();
            });

            document.getElementById('tablaProductosBody').appendChild(fila);
            calcularTotales();
        }
        function calcularTotales() {
            let subtotal = 0;

            document.querySelectorAll('#tablaProductosBody tr').forEach(fila => {
                const cantidad = parseFloat(fila.querySelector('.cantidad')?.value || 0);
                const precio = parseFloat(fila.querySelector('.precio-unitario')?.textContent || 0);
                subtotal += cantidad * precio;
            });

            const descuento = parseFloat(document.getElementById('descuentoInput').value || 0);
            const subtotalFormateado = subtotal.toFixed(2);
            const totalConDescuento = (subtotal * (1 - descuento / 100)).toFixed(2);

            document.getElementById('subtotalFactura').textContent = `${subtotalFormateado} €`;
            document.getElementById('totalFactura').textContent = `${totalConDescuento} €`;
        }

        // Modificación en agregarProducto para recalcular después de añadir
        function agregarProducto() {
            const select = document.getElementById('productoSelect');
            const productoId = select.value;
            if (!productoId) return;

            const producto = productos.find(p => p.id == productoId);
            if (!producto) return;

            const existe = document.querySelector(`#tablaProductosBody tr[data-id='${producto.id}']`);
            if (existe) {
                alert("Este producto ya ha sido agregado.");
                return;
            }

            const precioUnitario = parseFloat(producto.precio || 0).toFixed(2);
            const fila = document.createElement('tr');
            fila.setAttribute('data-id', producto.id);

            fila.innerHTML = `
        <td>${producto.nombre}</td>
        <td><span class="precio-unitario">${precioUnitario}</span></td>
        <td>
            <input type="number" min="1" value="1" class="form-control form-control-sm cantidad" style="width: 80px;" />
        </td>
        <td><span class="total-linea">${precioUnitario}</span></td>
        <td>
            <button class="btn btn-sm btn-danger eliminar-producto">Eliminar</button>
        </td>
    `;

            // Recalcular al cambiar cantidad
            fila.querySelector('.cantidad').addEventListener('input', function () {
                const cantidad = parseFloat(this.value || 0);
                const totalCell = fila.querySelector('.total-linea');
                const total = (cantidad * precioUnitario).toFixed(2);
                totalCell.textContent = isNaN(total) ? '0.00' : total;
                calcularTotales();
            });

            // Lógica para eliminar producto
            fila.querySelector('.eliminar-producto').addEventListener('click', function () {
                fila.remove();
                calcularTotales();
            });

            document.getElementById('tablaProductosBody').appendChild(fila);
            calcularTotales();
        }


        // Recalcular totales al cambiar el descuento
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('descuentoInput').addEventListener('input', calcularTotales);
        });
    </script>
</body>

</html>