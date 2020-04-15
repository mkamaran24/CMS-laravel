<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Category;
use App\Post;
use App\Tag;
class siteUIController extends Controller
{

    

    public function index()
    {
         //skip(number) wata qlak pesh xot bina yan qlak baj bhela

        return view('welcome')->with('blog_name' , Setting::first()->blog_name)
        ->with('categories' , Category::take(5)->get())
        ->with('tags' , Tag::take(12)->get())
        ->with('first_post' , Post::orderBy('created_at','desc')->first()) 
        ->with('second_post' , Post::orderBy('created_at','desc')->skip(1)->take(1)->get()->first())
        ->with('third_post' , Post::orderBy('created_at','desc')->skip(2)->take(1)->get()->first())
        ->with('laravel',  Category::find(2) )
        ->with('ps4',  Category::find(2) )
        ->with('settings',  Setting::first() )
        ->with('Vuejs',  Category::find(6) ); 
    }

    public function showPost($slug)
    {

        $post=Post::where('slug' , $slug)->first();
         
        return view('posts.show') 
                             
                             ->with('tags' , Tag::all() ) 
                             ->with('post' , $post)
                            
                            ->with('blog_name' , Setting::first()->blog_name)
                            ->with('settings',  Setting::first() )
                            ->with('categories' , Category::take(5)->get());


    }
}