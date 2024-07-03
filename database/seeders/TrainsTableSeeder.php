<?php

namespace Database\Seeders;

use App\Models\Train;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $primoTreno = new Train();
        $primoTreno->azienda = 'Trenitalia';
        $primoTreno->stazione_di_partenza = 'Milano';
        $primoTreno->stazione_di_arrivo = 'Roma';
        $primoTreno->orario_di_partenza = '10:00';
        $primoTreno->orario_di_arrivo = '12:00';
        $primoTreno->codice_treno = '1234';
        $primoTreno->numero_Carrozze = 10;
        $primoTreno->in_Orario=false;
        $primoTreno->cancellato=false;
        $primoTreno->treno_veloce=false;
        $primoTreno->save();

        $primoTreno = new Train();
        $primoTreno->azienda = 'Trenitalia';
        $primoTreno->stazione_di_partenza = 'Palermo';
        $primoTreno->stazione_di_arrivo = 'Roma';
        $primoTreno->orario_di_partenza = '09:00';
        $primoTreno->orario_di_arrivo = '20:00';
        $primoTreno->codice_treno = '12345';
        $primoTreno->numero_Carrozze = 10;
        $primoTreno->in_Orario=false;
        $primoTreno->cancellato=false;
        $primoTreno->treno_veloce=false;
        $primoTreno->save();

    }
}
