<?php

use App\Models\User;

test('get clientes list', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $tipoDocumento = \App\Models\TipoDocumento::factory()->create();

    \App\Models\Cliente::factory()->count(101)->create([
        'tipoDocumentoId' => $tipoDocumento->id,
        'nombre' => 'Cristian',
    ]);

    $response = $this->get('admin/Cliente/get-all');

    $response->assertStatus(200);
    $response->assertJsonFragment(['nombre' => 'Cristian']);
    $response->assertJsonCount(101, 'data');
});




test('get cliente detail', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get('admin/Cliente/1');

    $response->assertStatus(200);

    $response->assertJsonStructure([
        [
            'id',
            'nombre',
            'apellido',
            'tipoDocumentoId',
            'numeroDocumento',
            'telefono',
            'direccion',
        ]
    ]);

    $response->assertJsonFragment(['nombre' => 'Cristian']);
});

