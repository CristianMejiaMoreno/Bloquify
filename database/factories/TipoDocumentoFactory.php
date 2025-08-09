<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TipoDocumento>
 */
class TipoDocumentoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $tipoDocumento = [
            'Cédula de ciudadanía',
            'Cédula de extranjería',
            'Tarjeta de identidad',
            'Número de identificación tributaria',
            'Pasaporte',
            'Registro civil',
            'Permiso especial de permanencia'
        ];

        return [
            'nombre' => $this->faker->randomElement($tipoDocumento)
        ];
    }
}
