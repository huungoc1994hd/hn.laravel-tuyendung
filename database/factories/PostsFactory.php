<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Http\Models\Posts;
use Illuminate\Support\Facades\Auth;
use Faker\Generator as Faker;

$factory->define(Posts::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'description' => $faker->text,
        'content' => $faker->text,
        'status' => Posts::STATUS_SHOW,
        'cate_id' => 1
    ];
});
