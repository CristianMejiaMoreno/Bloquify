export function validacionesCliente(nombre, apellido, tdocumento, ndocumento, telefono, direccion)
{
    const errNombre = document.getElementById('error-nombre');
    const errApellido = document.getElementById('error-apellido');
    const errTipoDoc = document.getElementById('error-tdocumento');
    const errNumDoc = document.getElementById('error-numdoc');
    const errTel = document.getElementById('error-telefono');
    const errDir = document.getElementById('error-direccion');

    [errNombre, errApellido, errTipoDoc, errNumDoc, errTel, errDir].forEach( err=>{
        err.textContent = '';
    });

    let esValido = true;

    const nombreLimpio = (nombre || '').trim();

    if(nombreLimpio.length < 3)
    {
        errNombre.textContent = 'El contenido del nombre debe tener al menos tres caracteres';
        esValido = false;
    }else if(nombreLimpio.charAt(0) != nombreLimpio.charAt(0).toUpperCase()){
        errNombre.textContent = 'El nombre debe comenzar con letra mayuscula';
        esValido = false;
    }

    const apellidoLimpio = (apellido || '').trim();

    if(apellidoLimpio.length < 3)
    {
        errApellido.textContent = 'El contenido del apellido debe tener al menos tres caracteres';
        esValido = false;
    }else if(apellidoLimpio.charAt(0) != apellidoLimpio.charAt(0).toUpperCase()){
        errApellido.textContent = 'El apellido debe comenzar con letra mayuscula';
        esValido= false;
    }

    if(!tdocumento)
    {
        errTipoDoc.textContent = 'Debe seleccionar un tipo de documento';
        esValido  = false;
    }

    if(!ndocumento)
    {
        errNumDoc.textContent = 'Debe ingresar un numero de documento';
        esValido = false;
    }

    if (!telefono) {
        errTel.textContent = 'Debe ingresar un número de teléfono';
        esValido = false;
    } else if (telefono.length !== 7) {
        errTel.textContent = 'El número de teléfono debe tener exactamente 7 dígitos';
        esValido = false;
    }


    if(!direccion)
    {
        errDir.textContent = 'Debe ingresar una direccion';
        esValido = false;
    }

    return esValido;
}