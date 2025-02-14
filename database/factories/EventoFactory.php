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

        $fechaInicio = fake()->dateTimeBetween('+3 days', '+7 days'); // Genera una fecha de inicio entre 3 y 7 días adelante de la fecha actual
        $fechaFin = $fechaInicio->modify('+2 hours'); // Agrega 2 horas a la fecha de inicio para obtener la fecha de fin

        return [
            'nombre' => fake()->name(),
            'descripcion' => fake()->paragraph(20),
            'tipo' => fake()->randomElement(["evento", "actividad"]),
            'fecha_inicio' => $fechaInicio,
            'fecha_fin' => $fechaFin,
            'accesibilidad' => fake()->randomElement(["socios", "publico", "privado", "mixto"]),
            'estado' => fake()->randomElement(["abierto", "cerrado"]),
            'aforo' => fake()->numberBetween(-10000, 10000),
            'aforo_socios' => fake()->numberBetween(-10000, 10000),
            'aforo_no_socios' => fake()->numberBetween(-10000, 10000),
            'voluntarios' => fake()->numberBetween(-10000, 10000),
            'imagen' => fake()->word(),
        ];
    }
}
