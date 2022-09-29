<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      //create 1 user only, don't generate fake data
      $user = User::factory()->create([
         'name' => 'John Doe'
      ]);

      Post::factory(5)->create([
         'user_id' => $user->id //associate this with a single user
      ]); 
      
      //Post::factory(5)->create() this will create 5 user, 5 categories, 5 posts



      //   User::truncate();
      //   Category::truncate();
      //   Post::truncate();

        // $user = User::factory()->create();

      //   $personal = Category::create([
      //       'name' => 'Personal',
      //       'slug' => 'personal'
      //    ]);
      //    $family = Category::create([
      //       'name' => 'Family',
      //       'slug' => 'family'
      //    ]);
         
      //    $work = Category::create([
      //       'name' => 'Work',
      //       'slug' => 'work'
      //    ]);

      //    Post::create([
      //       'user_id' =>$user->id,
      //       'category_id' => $family->id,
      //       'title' =>'My Family Post',
      //       'slug' => 'my-family-post',
      //       'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
      //       'body' => 'Blanditiis labore praesentium illum unde neque, quis expedita maiores vel saepe reprehenderit quidem id aliquid quod dolorum deleniti laboriosam adipisci officiis ea.'
      //    ]);

      //    Post::create([
      //       'user_id' =>$user->id,
      //       'category_id' => $work->id,
      //       'title' =>'My Work Post',
      //       'slug' => 'my-work-post',
      //       'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
      //       'body' => 'Blanditiis labore praesentium illum unde neque, quis expedita maiores vel saepe reprehenderit quidem id aliquid quod dolorum deleniti laboriosam adipisci officiis ea.'
      //    ]);

    }
}
