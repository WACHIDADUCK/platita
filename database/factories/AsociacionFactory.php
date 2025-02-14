<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Asociacion;
use App\Models\Usuario;

class AsociacionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Asociacion::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'nombre' => fake()->name(),
            'descripcion' => fake()->text(),
            'contacto' => fake()->phoneNumber(),
            'email' => fake()->email(),
            'imagen' => fake()->url(),
            'gestor_id' => Usuario::factory(),
        ];
    }
}
