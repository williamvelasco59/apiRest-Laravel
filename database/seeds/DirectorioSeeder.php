<?php

use Illuminate\Database\Seeder;

class DirectorioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('directorios')->insert([
            [
                'nombre' => 'William Velasco',
                'direccion' => 'Ciudad de La Paz',
                'telefono' => 78664568,
                'foto' => null
            ],
            [
                'nombre' => 'Fernando Herrera',
                'direccion' => 'Santa Cruz de la sierra',
                'telefono' => 67464937,
                'foto' => null
            ],
        ]
    );
    }
}
