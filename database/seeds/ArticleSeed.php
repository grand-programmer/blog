<?php

use Illuminate\Database\Seeder;

class ArticleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $articles=factory(App\Article::class,20)
           ->create()
           ->each(function ($article) {
           $article->tags()->save(factory(\App\Tag::class)->make());
       });;
    }
}
