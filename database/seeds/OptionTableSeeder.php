<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OptionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('option')->insert(
            [
                'id' => 1,
                'web_title' => 'Tiêu đề website',
                'footer' => 'Nội dung footer'
            ]
        );
    }
}
