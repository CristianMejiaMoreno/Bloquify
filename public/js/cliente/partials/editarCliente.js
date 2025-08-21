import { getClientebyId } from './obtenerClienteId.js';
import { modalCliente } from './modalCliente.js';
import { llenarFormularioCliente } from './guardarCliente.js';

export async function editarCliente(id) {
    try {
        const cliente = await getClientebyId(id);
        console.log(cliente);
        
        await modalCliente(cliente.tipoDocumentoId, id);
        
        await llenarFormularioCliente(cliente);
        
    } catch (error) {
        console.error('Error al editar cliente:', error);
        Swal.fire({
            title: "Error",
            text: "No se pudo cargar los datos del cliente",
            icon: "error"
        });
    }
}