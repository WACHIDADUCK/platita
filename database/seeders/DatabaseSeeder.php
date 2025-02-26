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

        $usuariosConAsociaciones[0]->update([
            'name' => 'Gestor 1',
            'email' => 'gestor1@gestor1.com',
            'password' => bcrypt('password')
        ]);

        $usuariosConAsociaciones[1]->update([
            'name' => 'Gestor 2',
            'email' => 'gestor2@gestor2.com',
            'password' => bcrypt('password')
        ]);

        $usuariosConAsociaciones[2]->update([
            'name' => 'Gestor 3',
            'email' => 'gestor3@gestor3.com',
            'password' => bcrypt('password')
        ]);

        foreach ($usuariosConAsociaciones as $user) {
            $asociaciones = Asociacion::factory(rand(1, 2))->create();

            foreach ($asociaciones as $asociacion) {
                $asociacion->gestor_id = $user->id;
                $asociacion->save();

                // Crear eventos y asociarlos a la asociación
                $eventos = Evento::factory(rand(2, 3))->create();
                $eventos[0]->update(['estado' => 'abierto']);
                $eventos[1]->update(['estado' => 'cerrado']);
                foreach ($eventos as $evento) {
                    $asociacion->eventos()->attach($evento->id);
                }
            }
        }

        foreach ($usuariosConAsociaciones as $user) {
            $asociaciones = Asociacion::inRandomOrder()->take(rand(1, 3))->get();
            foreach ($asociaciones as $asociacion) {
                $user->asociacions()->attach($asociacion->id);
            }
        }

        //USUARIOS NORMALES
        $usuariosNormales = User::factory(200)->create();

        $usuariosNormales[0]->update([
            'name' => 'Normal 1',
            'email' => 'normal1@normal1.com',
            'password' => bcrypt('password')
        ]);

        foreach ($usuariosNormales as $user) {
            $user->update(['admin' => false]);

            // Obtener asociaciones aleatorias y asociarlas al User
            $asociaciones = Asociacion::inRandomOrder()->take(rand(1, 3))->get();
            foreach ($asociaciones as $asociacion) {
                $user->asociacions()->attach($asociacion->id);
            }
        }


        //PARTICIPACION EVENTOS

        $eventos = Evento::all();
        foreach ($eventos as $evento) {
            $usuarios = User::inRandomOrder()->take(rand(10, 100))->get();
            foreach ($usuarios as $user) {
                $user->eventos()->attach($evento->id);
            }
        }


        //COMENTARIOS
        // Crear 20 comentarios usando factories
        $comentarios = Comentario::factory(20)->make(); // Usar make() en lugar de create()

        foreach ($comentarios as $comentario) {
            // Asignar un usuario aleatorio
            $user = User::inRandomOrder()->first();
            $comentario->user_id = $user->id;

            // Elegir un modelo relacionado aleatorio (Asociacion o Evento)
            if (rand(0, 1) == 0) {
                $owner = Asociacion::inRandomOrder()->first();
            } else {
                $owner = Evento::inRandomOrder()->first();
            }

            // Guardar el comentario asociándolo con el modelo relacionado
            if ($owner) {
                $owner->comentarios()->save($comentario);
            } else {
                // Si no hay registros en Asociacion o Evento, manejar el error
                throw new \Exception("No hay registros en Asociacion o Evento.");
            }
        }

        // foreach ($usuariosNormales as $User) {
        //     $User->asociaciones()->attach($asociaciones->random(2));
        // }

    }
}
