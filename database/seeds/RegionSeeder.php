<?php

use Illuminate\Database\Seeder;
use App\Region;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('regions')->delete();

        Region::create([
          'region' => 'Osrednjeslovenska'
        ]);

        Region::create([
          'region' => 'Podravska'
        ]);

        Region::create([
          'region' => 'Koroška'
        ]);

        Region::create([
          'region' => 'Pomurska'
        ]);

        Region::create([
          'region' => 'Savinjska'
        ]);

        Region::create([
          'region' => 'Zasavska'
        ]);

        Region::create([
          'region' => 'Gorenjska'
        ]);

        Region::create([
          'region' => 'Goriška'
        ]);

        Region::create([
          'region' => 'Obalna'
        ]);

        Region::create([
          'region' => 'Primorsko-notranjska'
        ]);

        Region::create([
          'region' => 'Dolenjska'
        ]);

        Region::create([
          'region' => 'Tujina'
        ]);

        Region::create([
          'region' => 'Spodnjeposavska'
        ]);


    }
}
