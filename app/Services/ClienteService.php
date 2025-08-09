<?php

namespace App\Services;

use App\Models\Cliente;

class ClienteService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getClientes($request)
    {
        $search = $request->get('search');

        $query = Cliente::query();

        if($search)
        {
            $query->where(function($q) use ($search){
                $q->where('nombre', 'like', "%{$search}%")
                    ->orWhere('apellido', 'like', '%{$search}%')
                    ->orWhere('direccion', 'like', '%{$search}%');                 
            });
        }

        $clientes = $query->orderBy('id', 'desc')
                        ->paginate(15)
                        ->withQueryString();

        return $clientes;
    }

    public function getClienteById($id)
    {
        $cliente = Cliente::findOrFail($id);

        return $cliente;
    }

    public function storeCliente($request)
    {
        $cliente = Cliente::create($request);

        return $cliente;
    }

    public function updateCliente($id, $request)
    {
        $cliente= Cliente::findOrFail($id);

        $cliente->update($request);

        return $cliente;
    }

    public function deleteCliente($id)
    {
        $cliente = Cliente::findOrFail($id);

        $cliente->delete();

        return true;
    }

}
