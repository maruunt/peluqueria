const disponibilidadServicios = {
    1: ["2025-11-20", "2025-11-21","2025-11-22", "2025-11-23", "2025-11-24"],// corte
    2: ["2025-11-20","2025-11-22", "2025-11-24"],       // peinado
    3: ["2025-11-20", "2025-11-22", "2025-11-24"],   // nutrición
    4: ["2025-11-20", "2025-11-21", "2025-11-23"],   // decoloracion
    5: ["2025-11-20", "2025-11-21", "2025-11-23"]  // alisado
};

document.addEventListener("DOMContentLoaded", function() {

    const selectServicio = document.getElementById("servicioSelect");
    const calendario = document.getElementById("calendarioContainer");
    const fechaInput = document.getElementById("fechaInput");
    const horaInput = document.getElementById("horaInput");

    // horarios
    const horarios = ["09:00", "10:00", "11:00", "14:00", "15:00"];

    selectServicio.addEventListener("change", function () {
        const servicioId = this.value;

        if (servicioId !== "0") {
            calendario.style.display = "block";

            // cargar fechas según el servicio
            const fechas = disponibilidadServicios[servicioId];

            // limitar el calendario a esas fechas
            fechaInput.value = "";
            fechaInput.setAttribute("min", fechas[0]);
            fechaInput.setAttribute("max", fechas[fechas.length - 1]);

            // impedir que elija una fecha no permitida
            fechaInput.addEventListener("input", () => {
                if (!fechas.includes(fechaInput.value)) {
                    fechaInput.value = "";
                    alert("Esta fecha no está disponible para este servicio.");
                }
            });

            // cargar horarios
            horaInput.innerHTML = ""; 
            horarios.forEach(hora => {
                let option = document.createElement("option");
                option.value = hora;
                option.textContent = hora;
                horaInput.appendChild(option);
            });

        } else {
            calendario.style.display = "none";
        }
    });

});


// alerta del turno B)
document.addEventListener("DOMContentLoaded", function () {

    const form = document.querySelector("#formTurno");
    const alerta = document.querySelector("#alertaForm");

    form.addEventListener("submit", function (e) {
        e.preventDefault(); // evitamos el envío para mostrar mensaje

        // alidaciones reales que no van a pasar jaja lol

        //la alerta epica
        alerta.innerHTML = `
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>¡Listo!</strong> Tu turno ha sido registrado con éxito. 
                En dos días recibirás un correo de confirmación.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        `;
    });

});
