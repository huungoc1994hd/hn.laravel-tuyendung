<?php

use App\Http\Models\Posts;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Posts::class, 1000)->create();
    }
}
