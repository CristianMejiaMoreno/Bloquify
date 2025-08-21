import { crearCliente } from "./partials/crearCliente.js";
import { modalCliente } from "./partials/modalCliente.js";
import {tomSelectTDocumento} from "./partials/tomSelectTDocForCliente.js"
import {getClientebyId} from  './partials/obtenerClienteId.js'
import {editarCliente} from './partials/editarCliente.js'
import { guardarCliente } from "./partials/guardarCliente.js"; 

window.crearCliente = crearCliente;
window.editarCliente = editarCliente;
window.modalCliente = modalCliente;
window.tomSelectTDocumento = tomSelectTDocumento;
window.getClientebyId = getClientebyId;
window.guardarCliente = guardarCliente; 


