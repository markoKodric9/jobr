<?php

use Illuminate\Database\Seeder;
use App\Company;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->delete();

        Company::create([
          'name' => 'Merkator',
          'email' => 'apply@merkator.com',
          'password' => Hash::make('123')
        ]);

        Company::create([
          'name' => 'Coca-Cola',
          'email' => 'apply@coca-cola.com',
          'password' => Hash::make('123')
        ]);

        Company::create([
          'name' => 'Microsoft',
          'email' => 'apply@microsoft.com',
          'password' => Hash::make('123')
        ]);
    }
}
