<form id="dispositivoForm" data-id="">
    <div class="row">
        <div class=" col mb-3">
            <label for="imei" class="form-label">IMEI</label>
            <input type="number" class="form-control input-form" id="imei">
            <div id="error-imei" class="small text-danger"></div>
        </div>

        <div class="col mb-3">
            <label for="marca" class="form-label">Marca de móvil</label>
            <select class="form-control input-form" id="marca" name="marca">
                <option value="">Seleccione una marca</option>
                @foreach($marcas as $marca)
                    <option value="{{ $marca }}">{{ $marca }}</option>
                @endforeach
            </select>
            <div id="error-marca" class="small text-danger"></div>
        </div>
    </div>

    <div class="row">
        <div class="col mb-3">
            <label for="modelo" class="form-label">Modelo</label>
            <input type="text" class="form-control input-form" id="modelo">
            <div id="error-modelo" class="small text-danger"></div>
        </div>
        
        <div class="col mb-3">
            <label for="numero_serie" class="form-label">Numero de serie</label>
            <input type="text" class="form-control input-form" id="numero_serie">
            <div id="error-numero_serie" class="small text-danger"></div>
        </div>
    </div>

    <div class="row">
        <div class="col mb-3">
            <label for="estado_condicion" class="form-label">Condicion del movil</label>
            <select class="form-control input-form" id="estado_condicion" name="estado_condicion">
                <option value="">Seleccione un estado</option>
                @foreach($condiciones as $condicion)
                    <option value="{{ $condicion }}">{{ ucfirst($condicion) }}</option>
                @endforeach
            </select>
            <div id="error-estado_condicion" class="small text-danger"></div>
        </div>

        <div class="col mb-3">
            <label for="estado_uso" class="form-label">Estado del movil </label>
            <select class="form-control input-form" id="estado_uso" name="estado_uso">
                <option value="">Seleccione un estado</option>
                @foreach($usos as $uso)
                    <option value="{{ $uso }}">{{ ucfirst($uso) }}</option>
                @endforeach
            </select>
            <div id="error-estado_uso" class="small text-danger"></div>
        </div>
    </div>

    <div class="col mb-12">
        <label for="foto_url" class="form-label">Imagen del dispositivo</label>
        <input type="file" class="form-control input-form" id="foto_url">
        <div class="small text-danger" id="error-foto-url"></div>
    </div>

    <div class="col mb-12">
        <label for="observaciones" class="form-label">Observaciones</label>
        <textarea class="form-control input-text-area" id="observaciones" name="observaciones" rows="3"
                placeholder="Escriba aquí las observaciones..."></textarea>
        <div id="error-observaciones" class="small text-danger"></div>
    </div>


    <div class="mt-3">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btnGuardarDispositivo" onclick="guardarDispositivo()">Save changes</button>
    </div>

</form>