<?php

namespace Database\Seeders;

use App\Models\Role;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


use App\Models\Usuario;
use App\Models\Asociacion;
use App\Models\Evento;
use App\Models\Comentario;




class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        // $this->call([
        //     UsuarioSeeder::class,
        //     AsociacionSeeder::class,
        //     EventoSeeder::class,
        //     ComentarioSeeder::class
        // ]);

        // ADMINISTRADOR
        $admin = Usuario::factory()->create([
            'nombre' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            'admin' => true
        ]);


        //USUARIOS CON ASOCIACIONES
        $usuariosConAsociaciones = Usuario::factory(3)->create();

        foreach ($usuariosConAsociaciones as $usuario) {
            $asociaciones = Asociacion::factory(rand(1, 2))->create();
            foreach ($asociaciones as $asociacion) {
                $asociacion->gestor_id = $usuario->id;
                $asociacion->save();

                // Crear eventos y asociarlos a la asociación
                $eventos = Evento::factory(rand(1, 2))->create();
                foreach ($eventos as $evento) {
                    $asociacion->eventos()->attach($evento->id);
                }
            }
        }


        //USUARIOS NORMALES
        $usuariosNormales = Usuario::factory(10)->create();
        foreach ($usuariosNormales as $usuario) {
            $usuario->admin = false;
            $usuario->save();

            // Obtener asociaciones aleatorias y asociarlas al usuario
            $asociaciones = Asociacion::inRandomOrder()->take(rand(1, 3))->get();
            foreach ($asociaciones as $asociacion) {
                $usuario->asociacions()->attach($asociacion->id);
            }
        }


        //PARTICIPACION EVENTOS

        $eventos = Evento::all();
        foreach ($eventos as $evento) {
            $usuarios = Usuario::inRandomOrder()->take(rand(1, 5))->get();
            foreach ($usuarios as $usuario) {
                $usuario->eventos()->attach($evento->id);
            }
        }


        //COMENTARIOS
        $comentarios = Comentario::factory(20)->create();
        foreach ($comentarios as $comentario) {
            $usuario = Usuario::inRandomOrder()->first();
            $evento = Evento::inRandomOrder()->first();
            $comentario->usuario_id = $usuario->id;
            $comentario->evento_id = $evento->id;
            $comentario->save();
        }





        // foreach ($usuariosNormales as $usuario) {
        //     $usuario->asociaciones()->attach($asociaciones->random(2));
        // }




    }
}
