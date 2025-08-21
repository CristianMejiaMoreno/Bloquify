import { validacionesCliente } from "./validaciones.js";

export async function crearCliente() {
    const nombre = document.getElementById('nombre').value.trim();
    const apellido = document.getElementById('apellido').value.trim();
    const tipoDocumentoId = document.getElementById('select-tdocumento').value;
    const numeroDocumento = document.getElementById('numeroDocumento').value.trim();
    const telefono = document.getElementById('telefono').value.trim();
    const direccion = document.getElementById('direccion').value.trim();

    if (!validacionesCliente(nombre, apellido, tipoDocumentoId, numeroDocumento, telefono, direccion)) {
        return;
    }

    const data = {
        nombre,
        apellido,
        tipoDocumentoId,
        numeroDocumento,
        telefono,
        direccion
    };

    const url = APP_URL + '/admin/cliente';
    const token = document.querySelector('meta[name="csrf-token"]').content;

    try {
        const response = await fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token
            },
            body: JSON.stringify(data)
        });

        if (!response.ok) {
            const errorText = await response.json(); 
            Swal.fire({
                title: "Error al crear el cliente",
                text: errorText || "Ocurrió un error inesperado.",
                icon: "error"
            });
            return;
        }

        Swal.fire({
            title: "Cliente creado con éxito",
            icon: "success"
        });

        bootstrap.Modal.getOrCreateInstance(document.getElementById("clienteModal")).hide();

        window.LaravelDataTables["cliente-table"].ajax.reload(null, false);

    } catch (error) {
        Swal.fire({
            title: "Error de red o servidor",
            text: error.message,
            icon: "error"
        });
    }
}
