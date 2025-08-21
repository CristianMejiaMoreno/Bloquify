import { tomSelectTDocumento } from "./tomSelectTDocForCliente.js";
import {getClientebyId} from "./obtenerClienteId.js";

export async function modalCliente(preselectedId = null, idCliente = null)
{
    Swal.fire({
        title: "Obteniendo la informacion",
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

    titulo.textContent = 'y votaste con odio y ahora me extrañas???';

    const form = document.getElementById("clienteForm");

    const button = document.getElementById('btnGuardarCliente');

    button.dataset.clienteId = "123";
    
    form.reset();
    modal.show();
    Swal.close();


}