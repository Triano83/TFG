document.addEventListener("DOMContentLoaded", function () {
    let editListaBtns = document.querySelectorAll(".editListaBtn");

    editListaBtns.forEach((button) => {
        button.addEventListener("click", function () {
            document.getElementById("listaId").value = this.dataset.id;

            document.getElementById("nombre").value = this.dataset.nombre;
            document.getElementById("precio").value = this.dataset.precio;


            let form = document.getElementById("editListaForm");
            form.action = `/lista/${this.dataset.id}`;
        });
    });
});

document.addEventListener("DOMContentLoaded", function () {
    let deleteListaBtns = document.querySelectorAll(".deleteListaBtn");

    deleteListaBtns.forEach((button) => {
        button.addEventListener("click", function (event) {
            event.preventDefault(); // Evita el envío inmediato

            if (confirm("¿Estás seguro de que deseas eliminar este producto?")) {
                this.closest("form").submit(); // Envía el formulario si el usuario confirma
            }
        });
    });
});
