<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CategoryPost;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker =  Faker::create();
        $categories = ["sport","music","lifestyle","travel","politics","food","fitness","fashion","Finance","Business"];

        foreach($categories as $c){
            $category = new Category();
            $category->name = $c;
            $category->save();
        }

        foreach(range(1,25) as $p){
            $post = new Post();
            $post->title = implode("/t",$faker->words(rand(1,3)));
            $post->excerpt = $faker->paragraph(rand(1,2));
            $post->content = $faker->text(rand(200,450));
            $post->save();
            
            foreach(range(1, rand(2,5)) as $cp){
                $cp = new CategoryPost();
                $cp->post_id = $post->id;
                $cp->category_id = rand(1,10);
                $cp->save();
            }
        }

        
    }
}
