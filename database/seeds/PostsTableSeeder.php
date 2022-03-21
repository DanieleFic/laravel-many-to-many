<?php

use Illuminate\Database\Seeder;

use Faker\Generator as Faker;

use App\Post;

use Illuminate\Support\Str;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 5; $i++) { 
            $newPost = new Post();
            $newPost->title = $faker->words(3, true);
            $newPost->author = $faker->words(2, true);
            $newPost->content = $faker->text();
            /* $newPost->published = rand(0,1); */
            $newPost->slug = Str::of($newPost->title)->slug('-');
            $newPost->save();
        }
    }
}
