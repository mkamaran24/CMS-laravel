<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Category;
use App\Post;
use App\Tag;
class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('role:super_admin');
    }
  

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index')->with('posts',Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // creating category before creating post
        $cat = Category::all();
        if($cat->count() == 0)
        {
            return redirect('/category/create');
        }
        
        // creating tag before post
        $tag = Tag::all();
        if($tag->count() == 0)
        {
            return redirect('/tag/create');
        }

        return view('posts.create')->with('categ',$cat)
        ->with('tags',$tag);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request,[
            "title"    => "required",
            "content"  => "required",
            "categ_id"  => "required",
            "image" => "required|image",
            "tags"  => "required"
        ]);
        
        $featured = $request->image;
        $featured_new_name = time().$featured->getClientOriginalName();
        $featured->move('uploads/post/',$featured_new_name);


        $post = Post::create([
            "title"    => $request->title,
            "content"  => $request->content,
            "category_id"  => $request->categ_id,
            "image" => 'uploads/post/'.$featured_new_name,
            "slug" => Str::slug($request->title, '-')
        ]);

        $post->tags()->attach($request->tags);

       return redirect()->back();
         
     

       

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findorfail($id);

        return view('posts.edit')->with('posts',$post)
        ->with('categ',Category::all())->with('tags',Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $post = Post::find($id);

        $this->validate($request,[
            "title"    => "required",
            "content"  => "required",
            "categ_id"  => "required" 
            
        ]);


        if ( $request->hasFile('image')  ) {
            $featured = $request->image;
            $featured_new_name = time().$featured->getClientOriginalName();
            $featured->move('uploads/post/',$featured_new_name);

            $post->image = 'uploads/post/'.$featured_new_name;
    
        }

       // dd($post);
        $post->title =  $request->title;
        $post->content =  $request->content;
        $post->category_id = $request->categ_id;
        $post->save();

      
        $post->tags()->sync($request->tags);
        return redirect('/post/index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findorfail($id);
        $post->delete();
        return redirect()->back();
    }

    public function trashed()
    {
        $post = Post::onlyTrashed()->get();
         
        return view('posts.deleted')->with('posts',$post);
        //return redirect()->back();
    }

    public function hdelete($id)
    {
        $post = Post::withTrashed()->where('id',$id)->first();
        $post->forceDelete();
        return redirect()->back();
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->where('id',$id)->first();
        $post->restore();
        return redirect('/post/index');
    }
}
