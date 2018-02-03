<?php

use Illuminate\Database\Seeder;
use App\Apply;

class ApplySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('applies')->delete();

        Apply::create([
          'user_id' => 1,
          'job_id' => 1,
          'status' => 1,
        ]);

        Apply::create([
          'user_id' => 2,
          'job_id' => 1,
          'status' => 1,
        ]);

        Apply::create([
          'user_id' => 3,
          'job_id' => 1,
          'status' => 1,
        ]);
    }
}
