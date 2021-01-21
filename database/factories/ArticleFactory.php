<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    $title = $faker->realText(50);
    $slug = \Illuminate\Support\Str::slug($title, '-');
    return [
        'title'=>$title,
        'slug'=>$slug,
        'text'=>$faker->realText(),
        'created_at'=>$faker->dateTime('now'),
    ];
});
