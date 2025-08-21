<?php

namespace App\Http\Controllers;

use App\Http\Requests\CrearCliente;
use App\Models\Cliente;
use App\Models\TipoDocumento;
use App\Services\ClienteService;
use Exception;
use Illuminate\Http\Request;
use App\DataTables\ClienteDataTable;


class ClienteController extends Controller
{

    protected $clienteService;

    public function __construct(ClienteService $clienteService) {
        $this->clienteService = $clienteService;
    }

    public function getAllClientes(Request $request)
    {
        $clientes = $this->clienteService->getClientes($request);

        return response()->json($clientes);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(ClienteDataTable $clienteDataTable)
    {
        return $clienteDataTable->render('Cliente.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CrearCliente $request)
    {
        try{
            $cliente = $this->clienteService->storeCliente($request->validated());

            return response($cliente, 200);
        }catch(Exception $e)
        {
            return response()->json([
                "Error al crear el cliente"=>$e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try{
            $cliente = $this->clienteService->getClienteById($id);

            return response($cliente, 200);
        }catch(Exception $e)
        {
            return response()->json([
                "Error al obtener el cliente"=>$e->getMessage()
            ], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
}
