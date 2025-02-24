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
        $aforo = fake()->numberBetween(100, 300);
        $aforo_socios = fake()->numberBetween(30, 50);
        $aforo_no_socios = $aforo - $aforo_socios;
        $aforo_voluntarios = fake()->numberBetween(10, 20);

        return [
            'nombre' => fake()->sentence(),
            'descripcion' => fake()->text(),
            'lugar' => fake()->address(),
            'tipo' => fake()->randomElement(["evento", "actividad"]),
            'fecha_inicio' => fake()->dateTime(),
            'fecha_fin' => fake()->dateTime(),
            'accesibilidad' => fake()->randomElement(["socios", "publico", "privado", "mixto"]),
            'estado' => fake()->randomElement(["abierto", "cerrado"]),
            'aforo' => $aforo,
            'contador_aforo' => fake()->numberBetween(0, $aforo),
            'aforo_socios' => $aforo_socios,
            'contador_aforo_socios' => fake()->numberBetween(0, $aforo_socios),
            'aforo_no_socios' => $aforo_no_socios,
            'contador_aforo_no_socios' => fake()->numberBetween(0, $aforo_no_socios),
            'aforo_voluntarios' => $aforo_voluntarios,
            'contador_aforo_voluntarios' => fake()->numberBetween(0, $aforo_voluntarios),
            'imagen' => "https://picsum.photos/300/300",
        ];
    }
}
