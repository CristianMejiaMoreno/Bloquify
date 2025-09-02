import { validaciones } from "./validaciones.js";

export async function guardarDispositivo() {
    const imei = document.getElementById('imei').value;
    const marca = document.getElementById('marca').value;
    const modelo = document.getElementById('modelo').value;
    const numero_serie = document.getElementById('numero_serie').value;
    const estado_condicion = document.getElementById('estado_condicion').value;
    const estado_uso = document.getElementById('estado_uso').value;
    const foto_url = document.getElementById('foto_url');
    const observaciones = document.getElementById('observaciones').value;

    const esValido = await validaciones(
        imei,
        marca,
        modelo,
        numero_serie,
        estado_condicion,
        estado_uso,
        foto_url,
        observaciones
    );

    if (!esValido) {
        return;
    }


    const data = {
        imei,
        marca,
        modelo,
        numero_serie,
        estado_condicion,
        estado_uso,
        observaciones
    };

    const token = document.querySelector('meta[name="csrf-token"]').content;
    const form = document.getElementById('dispositivoForm');
    const dispositivoId = form.getAttribute('data-id');
    const isEdit = dispositivoId && dispositivoId.trim() !== '';
    const url = isEdit
        ? `${APP_URL}/admin/dispositivo/${dispositivoId}`
        : `${APP_URL}/admin/dispositivo`;
    const method = isEdit ? 'PUT' : 'POST';

    try {
        const formData = new FormData();
        Object.keys(data).forEach(key => formData.append(key, data[key]));
        if (foto_url.files && foto_url.files[0]) {
            formData.append('foto_url', foto_url.files[0]);
        }

        const res = await fetch(url, {
            method: method,
            headers: {
                'X-CSRF-TOKEN': token
            },
            body: formData
        });

        if (!res.ok) {
            const errorTexto = await res.json();
            Swal.fire({
                title: `Error al ${isEdit ? 'actualizar' : 'crear'} el cliente`,
                text: errorTexto || "Ocurrió un error inesperado al crear el cliente",
                icon: "error"
            });
            return;
        }

        Swal.fire({
            title: `Cliente ${isEdit ? 'actualizado' : 'creado'} con éxito`,
            icon: "success"
        });

        bootstrap.Modal.getOrCreateInstance(document.getElementById('dispositivoModal')).hide();

        if (
            window.LaravelDataTable &&
            window.LaravelDataTable["dispositivo-table"] &&
            typeof window.LaravelDataTable["dispositivo-table"].ajax !== "undefined"
        ) {
            window.LaravelDataTable["dispositivo-table"].ajax.reload(null, false);
        }

        limpiarFormulario()

    } catch (error) {
        Swal.fire({
            title: "Error de servidor o red",
            text: error.message,
            icon: "error"
        });
    }
}

export function limpiarFormulario() {
    const form = document.getElementById("dispositivoForm");
    form.reset();
    form.setAttribute('data-id', '');
    const errores = form.querySelectorAll('.text-danger');
    errores.forEach(error => error.textContent = '');
}