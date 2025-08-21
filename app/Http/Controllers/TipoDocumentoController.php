<?php

namespace App\Http\Controllers;

use App\Services\TipoDocumentoService;
use Illuminate\Http\Request;
use Exception;

class TipoDocumentoController extends Controller
{

    protected $tipoDocumentoService;

    public function __construct(TipoDocumentoService $tipoDocumentoService) {
        $this->tipoDocumentoService = $tipoDocumentoService;
    }
    public function tipoDocumentoTomSelect()
    {
        try
        {
            $tipoDocumento = $this->tipoDocumentoService->getTipoDocumentoForSelect();

            return response($tipoDocumento, 200);
        }catch(Exception $e)
        {
            return response([
                "Error al tratar de obtener los tipos de documentos" => $e->getMessage()
            ], 500);
        }
    }
}
