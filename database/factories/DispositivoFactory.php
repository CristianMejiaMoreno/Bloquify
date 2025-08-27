<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dispositivo>
 */
class DispositivoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'imei' => $this->faker->unique()->numerify(str_repeat('#', 15)),
            'marca' => $this->faker->randomElement(['Samsung', 'Apple', 'Xiaomi', 'Huawei', 'Motorola']),
            'modelo' => $this->faker->bothify('Modelo-##??'),
            'numero_serie' => strtoupper($this->faker->unique()->bothify('SN#######')),
            'estado_condicion' => $this->faker->randomElement(['nuevo', 'usado', 'reacondicionado']),
            'estado_uso' => $this->faker->randomElement(['disponible', 'asignado', 'bloqueado', 'mantenimiento']),
            'foto_url' => $this->faker->imageUrl(640, 480, 'technics', true, 'Dispositivo'),
            'observaciones' => $this->faker->optional()->sentence(8),
        ];
    }

}
