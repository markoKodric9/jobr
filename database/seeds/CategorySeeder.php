<?php

use Illuminate\Database\Seeder;
use \App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('categories')->delete();

      Category::create([
        'category' => 'Administracija'
      ]);

      Category::create([
        'category' => 'Bančništvo, finance'
      ]);

      Category::create([
        'category' => 'Elektrotehnika, elektronika, telekomunikacije'
      ]);

      Category::create([
        'category' => 'Farmacija, kemija '
      ]);

      Category::create([
        'category' => 'Gradbeništvo, arhitektura, geodezija'
      ]);

      Category::create([
        'category' => 'Javni sektor, nevladne organizacije'
      ]);

      Category::create([
        'category' => 'Izobraževanje, prevajanje, kultura, šport'
      ]);

      Category::create([
        'category' => 'Kmetijstvo, ribištvo, gozdarstvo'
      ]);

      Category::create([
        'category' => 'Kadrovanje, HR'
      ]);

      Category::create([
        'category' => 'Kreativa, design'
      ]);

      Category::create([
        'category' => 'Komerciala, prodaja'
      ]);

      Category::create([
        'category' => 'Marketing, PR'
      ]);

      Category::create([
        'category' => 'Matematika, fizika in naravoslovje'
      ]);

      Category::create([
        'category' => 'Mediji'
      ]);

      Category::create([
        'category' => 'Nepremičnine'
      ]);

      Category::create([
        'category' => 'Osebne storitve in varovanje'
      ]);

      Category::create([
        'category' => 'Pravo in družboslovje'
      ]);

      Category::create([
        'category' => 'Prehrambena industrija, živilstvo, veterina'
      ]);

      Category::create([
        'category' => 'Proizvodnja'
      ]);

      Category::create([
        'category' => 'Računalništvo, programiranje'
      ]);

      Category::create([
        'category' => 'Računovodstvo, revizija'
      ]);

      Category::create([
        'category' => 'Socialne storitve'
      ]);

      Category::create([
        'category' => 'Strojništvo, metalurgija, rudarstvo'
      ]);

      Category::create([
        'category' => 'Tehnične storitve'
      ]);

      Category::create([
        'category' => 'Transport, nabava, logistika'
      ]);

      Category::create([
        'category' => 'Trgovina'
      ]);

      Category::create([
        'category' => 'Upravljanje, svetovanje, vodenje'
      ]);

      Category::create([
        'category' => 'Zavarovalništvo '
      ]);

      Category::create([
        'category' => 'Zdravstvo, nega'
      ]);

      Category::create([
        'category' => 'Znanost, tehnologija'
      ]);
    }
}
