<?php

namespace Database\Seeders;

use App\Models\Role;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


use App\Models\User;
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
        $admin = User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            'admin' => true
        ]);


        //USUARIOS CON ASOCIACIONES
        $usuariosConAsociaciones = User::factory(3)->create();

        foreach ($usuariosConAsociaciones as $User) {
            $asociaciones = Asociacion::factory(rand(1, 2))->create();
            foreach ($asociaciones as $asociacion) {
                $asociacion->gestor_id = $User->id;
                $asociacion->save();

                // Crear eventos y asociarlos a la asociación
                $eventos = Evento::factory(rand(1, 2))->create();
                foreach ($eventos as $evento) {
                    $asociacion->eventos()->attach($evento->id);
                }
            }
        }


        //USUARIOS NORMALES
        $usuariosNormales = User::factory(10)->create();
        foreach ($usuariosNormales as $User) {
            $User->admin = false;
            $User->save();

            // Obtener asociaciones aleatorias y asociarlas al User
            $asociaciones = Asociacion::inRandomOrder()->take(rand(1, 3))->get();
            foreach ($asociaciones as $asociacion) {
                $User->asociacions()->attach($asociacion->id);
            }
        }


        //PARTICIPACION EVENTOS

        $eventos = Evento::all();
        foreach ($eventos as $evento) {
            $usuarios = User::inRandomOrder()->take(rand(1, 5))->get();
            foreach ($usuarios as $User) {
                $User->eventos()->attach($evento->id);
            }
        }


        //COMENTARIOS
        $comentarios = Comentario::factory(20)->create();
        foreach ($comentarios as $comentario) {
            $User = User::inRandomOrder()->first();
            $evento = Evento::inRandomOrder()->first();
            $comentario->usuario_id = $User->id;
            $comentario->evento_id = $evento->id;
            $comentario->save();
        }


        // foreach ($usuariosNormales as $User) {
        //     $User->asociaciones()->attach($asociaciones->random(2));
        // }


    }
}
