document.addEventListener("DOMContentLoaded", function () {
    let editListaBtns = document.querySelectorAll(".editListaBtn");

    editListaBtns.forEach((button) => {
        button.addEventListener("click", function () {
            document.getElementById("listaId").value = this.dataset.id;
            document.getElementById("nombre").value = this.dataset.nombre;
            document.getElementById("precio").value = this.dataset.precio;

            let form = document.getElementById("editListaForm");
            form.action = `/lista/${this.dataset.id}`;

            // Abre el modal automáticamente
            let modal = new bootstrap.Modal(
                document.getElementById("editListaModal")
            );
            modal.show();
        });
    });
});

document.addEventListener("DOMContentLoaded", function () {
    let deleteListaBtns = document.querySelectorAll(".deleteArticuloBtn");

    deleteListaBtns.forEach((button) => {
        button.addEventListener("click", function (event) {
            event.preventDefault();

            if (
                confirm("¿Estás seguro de que deseas eliminar este producto?")
            ) {
                this.closest("form").submit();
            }
        });
    });
});
