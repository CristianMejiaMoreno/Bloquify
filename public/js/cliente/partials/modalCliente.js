// modalCliente.js - SOLO ESTE CAMBIO MÍNIMO
import { tomSelectTDocumento } from "./tomSelectTDocForCliente.js";

export async function modalCliente(preselectedId = null, idCliente = null) {
    Swal.fire({
        title: "Obteniendo la información",
        text: "Por favor, espere un momento",
        icon: "info",
        showConfirmButton: false,
        willOpen: () => {
            Swal.showLoading();
        }
    });

    await tomSelectTDocumento(preselectedId);

    const modal = new bootstrap.Modal(document.getElementById('clienteModal'));
    const titulo = document.getElementById('clienteModalLabel');
    const form = document.getElementById("clienteForm");
    const button = document.getElementById('btnGuardarCliente');

    // Limpiar form completamente
    form.reset();
    const errores = form.querySelectorAll('.text-danger');
    errores.forEach(error => error.textContent = '');

    if (idCliente) {
        // MODO EDITAR
        titulo.textContent = 'Editar Cliente';
        form.setAttribute('data-id', idCliente);
        button.textContent = 'Actualizar Cliente';
    } else {
        // MODO CREAR
        titulo.textContent = 'Crear Cliente';
        form.setAttribute('data-id', ''); // LIMPIAR data-id - ESTO ERA EL PROBLEMA
        button.textContent = 'Crear Cliente';
    }

    modal.show();
    Swal.close();
}