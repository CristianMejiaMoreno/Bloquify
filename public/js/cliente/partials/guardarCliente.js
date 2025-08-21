// guardarCliente.js - Función unificada para crear y editar
import { validacionesCliente } from "./validaciones.js";

export async function guardarCliente() {
    const nombre = document.getElementById('nombre').value.trim();
    const apellido = document.getElementById('apellido').value.trim();
    const tipoDocumentoId = document.getElementById('select-tdocumento').value;
    const numeroDocumento = document.getElementById('numeroDocumento').value.trim();
    const telefono = document.getElementById('telefono').value.trim();
    const direccion = document.getElementById('direccion').value.trim();

    // Validaciones
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

    const token = document.querySelector('meta[name="csrf-token"]').content;
    
    // Determinar si es edición o creación basado en el data-id del form
    const form = document.getElementById('clienteForm');
    const clienteId = form.getAttribute('data-id');
    const isEdit = clienteId && clienteId.trim() !== '';

    // Configurar URL y método según la operación
    const url = isEdit 
        ? `${APP_URL}/admin/Cliente/${clienteId}` 
        : `${APP_URL}/admin/Cliente`;
    
    const method = isEdit ? 'PUT' : 'POST';

    try {
        const response = await fetch(url, {
            method: method,
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token
            },
            body: JSON.stringify(data)
        });

        if (!response.ok) {
            const errorText = await response.json();
            
            Swal.fire({
                title: `Error al ${isEdit ? 'actualizar' : 'crear'} el cliente`,
                text: errorText || "Ocurrió un error inesperado.",
                icon: "error"
            });
            return;
        }

        Swal.fire({
            title: `Cliente ${isEdit ? 'actualizado' : 'creado'} con éxito`,
            icon: "success"
        });

        // Cerrar modal y recargar tabla
        bootstrap.Modal.getOrCreateInstance(document.getElementById("clienteModal")).hide();
        window.LaravelDataTables["cliente-table"].ajax.reload(null, false);
        
        // Limpiar form
        limpiarFormulario();

    } catch (error) {
        Swal.fire({
            title: "Error de red o servidor",
            text: error.message,
            icon: "error"
        });
    }
}

// Función para limpiar el formulario
function limpiarFormulario() {
    const form = document.getElementById('clienteForm');
    form.reset();
    form.setAttribute('data-id', '');
    
    // Limpiar errores
    const errores = form.querySelectorAll('.text-danger');
    errores.forEach(error => error.textContent = '');
    
    // Limpiar el select de TomSelect si es necesario
    const selectTDoc = document.getElementById('select-tdocumento');
    if (selectTDoc.tomselect) {
        selectTDoc.tomselect.clear();
    }
}

export async function llenarFormularioCliente(cliente) {
    document.getElementById('nombre').value = cliente.nombre || '';
    document.getElementById('apellido').value = cliente.apellido || '';
    document.getElementById('numeroDocumento').value = cliente.numeroDocumento || '';
    document.getElementById('telefono').value = cliente.telefono || '';
    document.getElementById('direccion').value = cliente.direccion || '';
    
    // Establecer el ID para indicar que es edición
    document.getElementById('clienteForm').setAttribute('data-id', cliente.id);
    
    // Configurar el select de tipo documento
    const selectTDoc = document.getElementById('select-tdocumento');
    if (selectTDoc.tomselect && cliente.tipoDocumentoId) {
        selectTDoc.tomselect.setValue(cliente.tipoDocumentoId);
    } else {
        selectTDoc.value = cliente.tipoDocumentoId || '';
    }
}