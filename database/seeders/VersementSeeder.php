<?php

namespace Database\Seeders;

use App\Models\Gerant;
use App\Models\Versement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class VersementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currentDate = Carbon::now();
        for ($i = 0; $i < 30; $i++) {


            Versement::create([
                'identifiant' => 4,
                'prix' => rand(100, 1000),
                'created_at' =>  $currentDate->subDays($i),
            ]);
        }

 for ($i = 0; $i < 30; $i++) {


            Versement::create([
                'identifiant' => 1,
                'prix' => rand(100, 1000),
                'created_at' =>  $currentDate->subDays($i),
            ]);
        }

 for ($i = 0; $i < 30; $i++) {


            Versement::create([
                'identifiant' => 2,
                'prix' => rand(100, 1000),
                'created_at' =>  $currentDate->subDays($i),
            ]);
        }

 for ($i = 0; $i < 30; $i++) {


            Versement::create([
                'identifiant' => 3,
                'prix' => rand(100, 1000),
                'created_at' =>  $currentDate->subDays($i),
            ]);
        }



        Gerant::create([
            'nom' => "moussa",
            'prenom' => "Ali",
        ]);

 Gerant::create([
            'nom' => "Wahid",
            'prenom' => "Boubacar",
        ]);

 Gerant::create([
            'nom' => "Hamza",
            'prenom' => "Habibou",
        ]);

 Gerant::create([
            'nom' => "Sani",
            'prenom' => "Khalid",
        ]);


    }
}
