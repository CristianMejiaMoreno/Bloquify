<?php

namespace App\Services;

use App\Models\TipoDocumento;

class TipoDocumentoService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getTipoDocumentoForSelect()
    {
        $tipoDocumento = TipoDocumento::select('id as value', 'nombre as label')->get();

        return $tipoDocumento;
    }
}

