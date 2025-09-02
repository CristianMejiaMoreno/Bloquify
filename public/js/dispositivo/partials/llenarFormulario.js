export async function llenarFomularioDispositivo(dispositivo) {
    document.getElementById('imei').value = dispositivo.imei || '';
    document.getElementById('marca').value = dispositivo.marca || '';
    document.getElementById('modelo').value = dispositivo.modelo || '';
    document.getElementById('numero_serie').value = dispositivo.numero_serie || '';
    document.getElementById('estado_condicion').value = dispositivo.estado_condicion || '';
    document.getElementById('estado_uso').value = dispositivo.estado_uso || '';
    document.getElementById('foto_url').value = dispositivo.foto_url || '';
    document.getElementById('observaciones').value = dispositivo.observaciones || '';

    document.getElementById('dispositivoForm').setAttribute('data-id', dispositivo.id);

}