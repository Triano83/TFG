let datos = [
    {
        nombre: "Férula de descarga",
        precio: 80,
    },
    {
        nombre: "Puente dental",
        precio: 250,
    },
    {
        nombre: "Corona de porcelana",
        precio: 150,
    },
    {
        nombre: "Implante dental",
        precio: 1200,
    },
    {
        nombre: "Prótesis completa",
        precio: 800,
    },
    {
        nombre: "Prótesis parcial removible",
        precio: 500,
    },
    {
        nombre: "Incrustación de oro",
        precio: 200,
    },
    {
        nombre: "Carilla de porcelana",
        precio: 300,
    },
    {
        nombre: "Prótesis sobre implantes",
        precio: 1000,
    },
    {
        nombre: "Prótesis flexible",
        precio: 450,
    },
    {
        nombre: "Resina para prótesis",
        precio: 50,
    },
    {
        nombre: "Cementado de prótesis",
        precio: 30,
    },
    {
        nombre: "Ajuste de prótesis",
        precio: 25,
    },
    {
        nombre: "Rebase de prótesis",
        precio: 60,
    },
    {
        nombre: "Reparación de prótesis",
        precio: 40,
    },
];

document.addEventListener("DOMContentLoaded", function () {
    const tabla = document.getElementById("datos");

    datos.forEach((element) => {
        const fila = document.createElement("tr");
        fila.innerHTML = `<td class="nombre">${element.nombre}</td><td class="precio">${element.precio} €</td>`;
        tabla.appendChild(fila);
    });
});
