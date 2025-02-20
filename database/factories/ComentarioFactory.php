<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Comentario;
use App\Models\Evento;
use App\Models\User;

class ComentarioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comentario::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'evento_id' => Evento::factory(),
            'usuario_id' => User::factory(),
            'comentario' => fake()->text(),
            'fecha' => fake()->dateTime(),
            'valoracion' => fake()->numberBetween(00000, 10000),
            'user_id' => User::factory(),
        ];
    }
}
