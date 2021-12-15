<?php

namespace Database\Seeders;

use App\Models\Nota;
use Illuminate\Database\Seeder;

class NotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Nota::create([
            'titulo' => 'Exámen',
            'contenido' => 'Estudiar para el parcial de Software III'
        ]);

        Nota::create([
            'titulo' => 'Entrega proyecto',
            'contenido' => 'Entrega proyecto de Ingeniería de Software III al final de semestre'
        ]);

        Nota::create([
            'titulo' => 'Vacaciones',
            'contenido' => 'Ahorrar para las vacaciones de fin de año'
        ]);
    }
}
