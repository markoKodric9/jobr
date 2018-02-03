<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //$this->call('UserSeeder');
         //$this->call('CompanySeeder');
         $this->call('CategorySeeder');
         $this->call('DegreeSeeder');
         $this->call('PostSeeder');
         //$this->call('JobSeeder');
         $this->call('RegionSeeder');
         $this->call('JobTypeSeeder');
         //$this->call('ApplySeeder');
    }
}
