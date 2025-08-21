export async function getClientebyId(id) {
    const url = `${APP_URL}/admin/Cliente/${id}`;
    const token = document.querySelector('meta[name="csrf-token"]').content;

    try {
        const response = await fetch(url, {
            headers: {
                'X-CSRF-TOKEN': token
            }
        });

        if (!response.ok) {
            throw new Error(`Error al obtener cliente: ${response.status}`);
        }

        const cliente = await response.json();
        return cliente;

    } catch (error) {
        console.error("Error en getClientebyId:", error);
        return null;
    }
}
