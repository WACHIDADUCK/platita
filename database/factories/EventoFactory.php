<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Evento;

class EventoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Evento::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'nombre' => fake()->name(),
            'descripcion' => fake()->text(),
            'tipo' => fake()->randomElement(["evento","actividad"]),
            'fecha_inicio' => fake()->dateTime(),
            'fecha_fin' => fake()->dateTime(),
            'accesibilidad' => fake()->randomElement(["socios","publico","privado","mixto"]),
            'estado' => fake()->randomElement(["abierto","cerrado"]),
            'aforo' => fake()->numberBetween(-10000, 10000),
            'aforo_socios' => fake()->numberBetween(-10000, 10000),
            'aforo_no_socios' => fake()->numberBetween(-10000, 10000),
            'voluntarios' => fake()->numberBetween(00000, 10000),
            'imagen' => "https://picsum.photos/300/300",
        ];
    }
}
