<?php

use App\Post;
use App\Tag;
use App\Category;
use App\User;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class PostTabeleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $author1 = User::create([
        'name' =>'Kogo',
        'email' =>'Mustaf@gmail.com',
        'password'=> Hash::make('password')
      ]);

      $author2 = User::create([
        'name' =>'Mustafa',
        'email' =>'klo@gmail.com',
        'password'=> Hash::make('password')
      ]);

      $author3 = User::create([
        'name' =>'Mime',
        'email' =>'LOL@gmail.com',
        'password'=> Hash::make('password')
      ]);



        $category1 = Category::create([
          'name' => 'News'
        ]);

        $category2 = Category::create([
          'name' => 'Design'
        ]);
        $category3 = Category::create([
          'name' => 'Partnership'
        ]);



        $post1 = $author1->posts()->create([
          'title' => 'We relocated our office to a new designed garage',
          'description'=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
          'contant'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
          'category_id' => $category1->id,
          'image'=> 'posts/1.jpg'
        ]);

        $post2 = $author2->posts()->create([
          'title' => 'Top 5 brilliant content marketing strategiesWe relocated our office to a new designed garage',
          'description'=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
          'contant'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
          'category_id' => $category2->id,
          'image'=> 'posts/3.jpg'

        ]);

        $post3 = $author3->posts()->create([
          'title' => 'Congratulate and thank to Maryam for joining our team',
          'description'=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
          'contant'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
          'category_id' => $category3->id,
          'image'=> 'posts/2.jpg'

        ]);

        $post4 = $author1->posts()->create([
          'title' => 'Best practices for minimalist design with example',
          'description'=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incidid unt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
          'contant'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
          'category_id' => $category3->id,
          'image'=> 'posts/5.jpg',
        ]);

        $tag1 = Tag::create([
          'name' => 'Record'
        ]);
        $tag2 = Tag::create([
          'name' => 'Progress'
        ]);
        $tag3 = Tag::create([
          'name' => 'Customers'
        ]);

        $post1->tags()->attach([$tag1->id, $tag2->id]);
        $post2->tags()->attach([$tag1->id, $tag3->id]);
        $post3->tags()->attach([$tag1->id, $tag2->id]);
        $post4->tags()->attach([$tag1->id, $tag2->id]);


    }
}
