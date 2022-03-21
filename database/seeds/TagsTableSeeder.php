<?php

use App\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['vegan','pesce','carne','gluten free'];
        foreach($tags as $tags_name){
            $new_tags = new Tag();
            $new_tags->name = $tags_name;
            $new_tags->slug = Str::of($tags_name)->slug('-');
            $new_tags->save();

        }
    }
}
