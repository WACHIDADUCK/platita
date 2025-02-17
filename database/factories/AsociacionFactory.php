<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Asociacion;
use App\Models\User;

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
            'contacto' => fake()->number(),
            'email' => fake()->safeEmail(),
            'imagen' => "https://picsum.photos/300/300",
            'gestor_id' => User::factory(),
            'asiste_evento_id' => User::factory(),
        ];
    }
}
