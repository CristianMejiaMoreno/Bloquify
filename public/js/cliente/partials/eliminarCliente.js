export async function eliminarCliente(id) {
    Swal.fire({
        title: "¿Estás seguro de eliminar al cliente?",
        text: "Una vez realizado no podrá recuperar sus datos",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Eliminar",
        cancelButtonText: "Cancelar"
    }).then(async (result) => {
        if (result.isConfirmed) {
            const url = `${APP_URL}/admin/Cliente/${id}`;
            const token = document.querySelector('meta[name="csrf-token"]').content;

            try {
                Swal.fire({
                    title: "Eliminando...",
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                const response = await fetch(url, {
                    method: 'DELETE',
                    headers: {
                        "X-CSRF-TOKEN": token
                    }
                });

                if (!response.ok) {
                    const errorJson = await response.json();
                    Swal.fire({
                        title: "Error al eliminar el cliente",
                        text: errorJson.error || "Error desconocido",
                        icon: "error"
                    });
                    return;
                }

                Swal.fire({
                    title: "Cliente eliminado con éxito",
                    icon: "success"
                });

                window.LaravelDataTables["cliente-table"].ajax.reload(null, false);

            } catch (err) {
                Swal.fire({
                    title: "Error de conexión",
                    text: err.message,
                    icon: "error"
                });
            }
        }
    });
}
