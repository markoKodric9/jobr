<?php

use Illuminate\Database\Seeder;
use App\Job;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      DB::table('jobs')->delete();

      Job::create([
        'job_type_id' => 6,
        'category_id' => 1,
        'post_id' => 1,
        'degree_id' => 1,
        'title' => 'Progamiranje PHP v Laravel ogrodju',
        'description' => 'Za projekto nalogo pri predmetu TPO iščemo zagrete študente, ki bodo fucking kej delal',
        'position' => 'backend programer',
        'terms' => 'brt, majkemi da delaš',
        'duration' => 3,
        'hourly_wage' => 0.0,
        'home' => true,
        'trial' => 0,
        'work_time' => 20,
        'weekends' => true,
        'address' => 'Pr\' Tinc 69',
      ]);
    }
}
