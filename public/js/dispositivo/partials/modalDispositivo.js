import { modalEspera } from "../../auxiliares/partials/modalEspera.js";
import { validaciones } from "./validaciones.js";

export async function modalDispositivo(idDispositivo = null)
{
    modalEspera();  
    // validaciones();

    const modal = new bootstrap.Modal(document.getElementById('dispositivoModal'));
    const titulo = document.getElementById('dispositivoModalLabel');
    const form = document.getElementById('dispositivoForm');
    const button = document.getElementById('btnGuardarDispositivo');

    form.reset();
    const errores = form.querySelectorAll('.text-danger');
    errores.forEach(error => error.textContent = '');

    
    if(idDispositivo) {
        titulo.textContent = 'Editar Dispositivo';
        form.setAttribute('data-id', idDispositivo);
        button.textContent = 'Actualizar Dispositivo';
    } else {
        titulo.textContent = 'Crear Dispositivo';
        form.setAttribute('data-id', '');
        button.textContent = 'Crear Dispositivo';
    }
    setTimeout(() => {
        modal.show();
        Swal.close();
    }, 2000);

}