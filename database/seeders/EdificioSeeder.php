<?php

namespace Database\Seeders;

use App\Models\Aula;
use App\Models\Edificio;
use Illuminate\Database\Seeder;

class EdificioSeeder extends Seeder
{
    public function run(): void
    {
        $edificio = Edificio::create(['nombre' => 'Edificio C']);

        foreach (['C1', 'C2', 'C3', 'C4', 'C5'] as $nombre) {
            $aula = new Aula();
            $aula->nombre = $nombre;
            $aula->capacidad = 30;
            $aula->wifi = true;
            $aula->edificio_id = $edificio->id;
            $aula->save();
        }
    }
}