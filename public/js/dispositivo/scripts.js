import { modalDispositivo } from "./partials/modalDispositivo.js";
import { guardarDispositivo } from "./partials/guardarDispositivo.js";


window.modalDispositivo = modalDispositivo;
window.guardarDispositivo = guardarDispositivo;

document.getElementById('modelo').addEventListener('input', function(e) {
    e.target.value = e.target.value.toUpperCase();
});

document.getElementById('numero_serie').addEventListener('input', function(e){
    e.target.value = e.target.value.toUpperCase();
});