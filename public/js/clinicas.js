document.addEventListener("DOMContentLoaded", function () {
    let editClinicaBtns = document.querySelectorAll(".editClinicaBtn");

    editClinicaBtns.forEach((button) => {
        button.addEventListener("click", function () {
            document.getElementById("clinicaId").value = this.dataset.id;
            document.getElementById("nombre").value = this.dataset.nombre;
            document.getElementById("direccion").value = this.dataset.direccion;
            document.getElementById("NIF").value = this.dataset.nif;
            document.getElementById("email").value = this.dataset.email;
            document.getElementById("telefono").value = this.dataset.telefono;

            let form = document.getElementById("editClinicaForm");
            form.action = `/clinicas/${this.dataset.id}`;
        });
    });
});

document.addEventListener("DOMContentLoaded", function () {
    let deleteClinicaBtns = document.querySelectorAll(".deleteClinicaBtn");

    deleteClinicaBtns.forEach((button) => {
        button.addEventListener("click", function (event) {
            event.preventDefault(); // Evita el envío inmediato

            if (confirm("¿Estás seguro de que deseas eliminar esta clínica?")) {
                this.closest("form").submit(); // Envía el formulario si el usuario confirma
            }
        });
    });
});
