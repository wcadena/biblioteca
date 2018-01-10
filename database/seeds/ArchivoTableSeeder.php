<?php

use Illuminate\Database\Seeder;

class ArchivoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        //$table->enum('tipo',['archivo','pagina','rama','root'])->default('rama');

        //DB::table('archivos')->truncate();
        factory(App\Archivo::class)->create([
            'nombre' => 'Raiz',
            'identificacion' => 'root',
            'email' => 'wcadena@outlook.com',
            'tipo' => 'root',
        ]);

/*
        factory(App\Archivo::class)->create([
            'archivos_id' =>1,
            'nombre' => 'Archivo 1',
            'identificacion' => 'root',
            'email' => 'wcadena@outlook.com',
            'tipo' => 'root',
        ]);
        factory(App\Archivo::class)->create([
            'archivos_id' =>1,
            'nombre' => 'Archivo 2',
            'identificacion' => 'root',
            'email' => 'wcadena@outlook.com',
            'tipo' => 'root',
        ]);
        factory(App\Archivo::class)->create([
            'archivos_id' =>1,
            'nombre' => 'Archivo 3',
            'identificacion' => 'root',
            'email' => 'wcadena@outlook.com',
            'tipo' => 'root',
        ]);
        factory(App\Archivo::class)->create([
            'archivos_id' =>2,
            'nombre' => 'Archivo 4',
            'identificacion' => 'root',
            'email' => 'wcadena@outlook.com',
            'tipo' => 'root',
        ]);
        factory(App\Archivo::class)->create([
            'archivos_id' =>2,
            'nombre' => 'Archivo 5',
            'identificacion' => 'root',
            'email' => 'wcadena@outlook.com',
            'tipo' => 'root',
        ]);
        factory(App\Archivo::class)->create([
            'archivos_id' =>3,
            'nombre' => 'Archivo 6',
            'identificacion' => 'root',
            'email' => 'wcadena@outlook.com',
            'tipo' => 'root',
        ]);
        factory(App\Archivo::class)->create([
            'archivos_id' =>3,
            'nombre' => 'Archivo 7',
            'identificacion' => 'root',
            'email' => 'wcadena@outlook.com',
            'tipo' => 'root',
        ]);
        factory(App\Archivo::class)->create([
            'archivos_id' =>1,
            'nombre' => 'Archivo 8',
            'identificacion' => 'root',
            'email' => 'wcadena@outlook.com',
            'tipo' => 'root',
        ]);
*/
    }
}
