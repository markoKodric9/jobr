<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->delete();

        Post::create([
          'post' => 1000,
          'city' => 'Ljubljana'
        ]);

        Post::create([
          'post' => 1240,
          'city' => 'Kamnik'
        ]);

        Post::create([
          'post' => 2000,
          'city' => 'Maribor'
        ]);

        Post::create([
          'post' => 3000,
          'city' => 'Celje'
        ]);

        Post::create([
          'post' => 4000,
          'city' => 'Kranj'
        ]);

        Post::create([
          'post' => 4270,
          'city' => 'Jesenice'
        ]);

        Post::create([
          'post' => 6330,
          'city' => 'Portorož'
        ]);

    }
}
