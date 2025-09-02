export async function modalEspera()
{
    Swal.fire({
        title: "Obteniendo la información",
        text: "Por favor, espere un momento",
        icon: "info",
        showConfirmButton: false,
        willOpen: () => {
            Swal.showLoading();
        }
    });
}