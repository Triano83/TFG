document.addEventListener("DOMContentLoaded", function () {
    let editDatoBtns = document.querySelectorAll(".editDatoBtn");

    editDatoBtns.forEach((button) => {
        button.addEventListener("click", function () {
            document.getElementById("datoId").value = this.dataset.id;
            document.getElementById("empresa").value = this.dataset.empresa;
            document.getElementById("nombre").value = this.dataset.nombre;
            document.getElementById("apellidos").value = this.dataset.apellidos;
            document.getElementById("direccion").value = this.dataset.direccion;
            document.getElementById("telefono").value = this.dataset.telefono;
            document.getElementById("email").value = this.dataset.email;
            document.getElementById("dni").value = this.dataset.dni;

            let form = document.getElementById("editDatoForm");
            form.action = `/datos/${this.dataset.id}`;
        });
    });
});

document.addEventListener("DOMContentLoaded", function () {
    let deleteDatoBtns = document.querySelectorAll(".deleteDatoBtn");

    deleteDatoBtns.forEach((button) => {
        button.addEventListener("click", function (event) {
            event.preventDefault();

            if (confirm("¿Estás seguro de que deseas eliminar este dato?")) {
                this.closest("form").submit(); 
            }
        });
    });
});
