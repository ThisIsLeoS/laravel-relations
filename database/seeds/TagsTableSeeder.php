<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Tag::class, 30)
            ->create()
            ->each(function ($tag) {
                $posts = 
                    Post::inRandomOrder()
                    ->take(rand(0, 5))
                    ->get();
                $tag
                    ->posts()
                    ->attach($posts);
            });
    }
}
