<form id="clienteForm" data-id="">
    
    <div class="row">
        <div class=" col mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control input-form" id="nombre">
            <div id="error-nombre" class="small text-danger"></div>
        </div>

        <div class="col mb-3">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" class="form-control input-form" id="apellido">
            <div id="error-apellido" class="small text-danger"></div>
        </div>  
    </div>


    <div class="row">
        <div class="col mb-3">
            <label for="select-tdocumento" class="form-label">Tipo de Documento</label> 
            <select id="select-tdocumento" placeholder="Selecciona un tipo de documento..." autocomplete="off">
            </select>
            <span id="error-tdocumento" class="text-danger small"></span>
        </div>

        <div class=" col mb-3">
            <label for="numeroDocumento" class="form-label">Numero de documeto</label>
            <input type="text" class="form-control input-form" id="numeroDocumento">
            <div id="error-numdoc" class="small text-danger"></div>
        </div>
    </div>


    <div class="row">
        <div class=" col mb-3">
            <label for="telefono" class="form-label">Telefono</label>
            <input type="number" class="form-control input-form" id="telefono">
            <div id="error-telefono" class="small text-danger"></div>
        </div>

        <div class="col mb-3">
            <label for="direccion" class="form-label">Direccion</label>
            <input type="text" class="form-control input-form" id="direccion">
            <div id="error-direccion" class="small text-danger"></div>
        </div>  
    </div>

    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary" id="btnGuardarCliente" onclick="guardarCliente()">Save changes</button>

</form>