export async function validaciones(imei, marca, modelo, numero_serie, estado_condicion, estado_uso, foto_url, observaciones) {
    
    const errImei = document.getElementById('error-imei');
    const errMarca = document.getElementById('error-marca');
    const errModelo = document.getElementById('error-modelo');
    const errNserie = document.getElementById('error-numero_serie');
    const errEcondiccion = document.getElementById('error-estado_condicion');
    const errEUso = document.getElementById('error-estado_uso');
    const errFoto = document.getElementById('error-foto-url');
    const errObservaciones = document.getElementById('error-observaciones');

    [       
        errEUso,
        errEcondiccion,
        errFoto, 
        errImei, 
        errMarca, 
        errModelo,
        errObservaciones,
        errNserie
    ].forEach(err =>{
        err.textContent = '';
    });


    let esValido = true;
    
    const imeiLimpio = (imei || '').trim();

    if(imeiLimpio.length !== 15){
        errImei.textContent = 'El imei debe tener exactamente 15 caracteres';
        esValido = false;
    }

    if(!marca)
    {
        errMarca.textContent = 'Debe seleccionar una marca de telefonos';
        esValido = false;
    }
 
    const modeloLimpio = (modelo || '').trim();
    
    if(modeloLimpio.length < 3){
        errModelo.textContent = 'El modelo del celular debe tener al menos tres caracteres';
        esValido = false;
    }else if(modeloLimpio != modeloLimpio.toUpperCase()){
        errModelo.textContent = 'Las letras del modelo deben estar en mayúscula';
        esValido = false;
    }

    const nSerieLimpio = (numero_serie || '').trim();

    if(nSerieLimpio.length !== 15){
        errNserie.textContent = 'El número de serie debe tener exactamente 15 caracteres';
        esValido = false;
    }

    if(!estado_condicion)
    {
        errEcondiccion.textContent = 'Debe de seleccionar una condiccion';
        esValido = false;
    }

    if(!estado_uso)
    {
        errEUso.textContent = 'Debe de seleccionar un estado'
        esValido = false;
    }

    if(!foto_url) {
        errFoto.textContent = 'Debe de subir una imagen del movil';
        esValido = false;
    } else if(foto_url.files && foto_url.files[0]) {
        const imagen = foto_url.files[0];
        const formatosPermitidos = ['image/jpeg', 'image/png', 'image/jpg'];
        const tamanoMaximo = 2 * 1024 * 1024; 
    
        if(!formatosPermitidos.includes(imagen.type)) {
            errFoto.textContent = 'Solo se permiten imágenes JPG o PNG';
            esValido = false;
        } else if(imagen.size > tamanoMaximo) {
            errFoto.textContent = 'La imagen debe pesar menos de 2MB';
            esValido = false;
        }
    }

    if((observaciones || '').length > 255){
        errObservaciones.textContent = 'La observación no puede superar los 255 caracteres';
        esValido = false;
    }

    return esValido;

}