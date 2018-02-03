<?php

use Illuminate\Database\Seeder;
use App\JobType;

class JobTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('job_types')->delete();

        JobType::create([
          'type' => 'Redno, nedoločen delovni čas'
        ]);

        JobType::create([
          'type' => 'Redno, določen delovni čas'
        ]);

        JobType::create([
          'type' => 'Preko S.P.'
        ]);

        JobType::create([
          'type' => 'Projektno delo'
        ]);

        JobType::create([
          'type' => 'Pogodbeno delo'
        ]);

        JobType::create([
          'type' => 'Študentsko delo'
        ]);

        JobType::create([
          'type' => 'Prostovoljno'
        ]);

    }
}
