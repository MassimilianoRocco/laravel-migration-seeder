<?php

namespace Database\Seeders;

use App\Models\Train;
use Faker\Generator as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for($i=0; $i<10; $i++){

            $primoTreno = new Train();
            $primoTreno->azienda = $faker->company();
            $primoTreno->stazione_di_partenza = $faker->city();
            $primoTreno->stazione_di_arrivo = $faker->city();
            $primoTreno->orario_di_partenza = $faker->dateTime();
            $primoTreno->orario_di_arrivo = $faker->dateTime();
            $primoTreno->codice_treno = $faker->numerify('train-####');
            $primoTreno->numero_Carrozze = $faker->randomDigitNotNull();
            $primoTreno->in_Orario=$faker->boolean();
            $primoTreno->cancellato=$faker->boolean();
            $primoTreno->treno_veloce=$faker->boolean();
            $primoTreno->save();
        }

        // $primoTreno = new Train();
        // $primoTreno->azienda = 'Trenitalia';
        // $primoTreno->stazione_di_partenza = 'Palermo';
        // $primoTreno->stazione_di_arrivo = 'Roma';
        // $primoTreno->orario_di_partenza = '09:00';
        // $primoTreno->orario_di_arrivo = '20:00';
        // $primoTreno->codice_treno = '12345';
        // $primoTreno->numero_Carrozze = 10;
        // $primoTreno->in_Orario=false;
        // $primoTreno->cancellato=false;
        // $primoTreno->treno_veloce=false;
        // $primoTreno->save();

    }
}
