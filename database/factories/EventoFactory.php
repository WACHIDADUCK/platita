<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Evento;
use Carbon\Carbon;


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

        // Obtener la fecha de hoy
        $hoy = Carbon::now();

        // Calcular la fecha dentro de un mes
        $fechaUnMesDespues = Carbon::now()->addMonth();

        // Generar una fecha de inicio aleatoria entre hoy y un mes después
        $fecha_inicio = Carbon::instance(fake()->dateTimeBetween($hoy, $fechaUnMesDespues));

        // Generar una fecha de fin que esté entre 1 y 2 días después de la fecha de inicio
        $fecha_fin = Carbon::instance($fecha_inicio)->addDays(rand(1, 2));

        // Formatear las fechas si es necesario
        $fecha_inicio_formatted = $fecha_inicio->toDateTimeString();
        $fecha_fin_formatted = $fecha_fin->toDateTimeString();


        // Formatear las fechas si es necesario
        $fecha_inicio_formatted = Carbon::instance($fecha_inicio)->toDateTimeString();
        $fecha_fin_formatted = Carbon::instance($fecha_fin)->toDateTimeString();



        return [
            'nombre' => fake()->sentence(),
            'descripcion' => fake()->text(),
            'lugar' => fake()->address(),
            'tipo' => fake()->randomElement(["evento", "actividad"]),
            'fecha_inicio' => $fecha_inicio_formatted,
            'fecha_fin' => $fecha_fin_formatted,
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
