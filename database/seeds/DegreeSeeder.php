<?php

use Illuminate\Database\Seeder;
use App\Degree;

class DegreeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('degrees')->delete();

      Degree::create([
        'name' => '7 razredov osnovne šole ali manj',
        'level' => '1'
      ]);

      Degree::create([
        'name' => 'dokončana osnovna šola',
        'level' => '2'
      ]);

      Degree::create([
        'name' => 'dokončana poklicna šola',
        'level' => '3'
      ]);

      Degree::create([
        'name' => 'dokončana srednja strokovna šola',
        'level' => '4'
      ]);

      Degree::create([
        'name' => 'dokončana gimnazija in ostale štiriletne šole',
        'level' => '5'
      ]);

      Degree::create([
        'name' => 'višješolski strokovni programi',
        'level' => '6.1'
      ]);

      Degree::create([
        'name' => 'visokošolski strokovni programi / 1. bolonjska stopnja ',
        'level' => '6.2'
      ]);

      Degree::create([
        'name' => 'univerzitetni programi / 2. bolonjska stopnja',
        'level' => '7'
      ]);

      Degree::create([
        'name' => 'doktorati znanosti / 3. bolonjska stopnja ',
        'level' => '8.1'
      ]);

      Degree::create([
        'name' => 'magisteriji znanosti',
        'level' => '8.2'
      ]);

    }
}
