<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\ Post\CreatePostRequest;
use App\Http\Requests\ Post\CreateUpdatePostRequest;
use App\Category;
use App\Post;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Return fun() if thins method work will go to this page
        return view('post.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      // Return fun() if thins method work will go to this page
        return  view('post.create')->with('categories' , Category::all())   ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @retu  rn \Illuminate\Http\Response
     */
      public function store(CreatePostRequest $request)
      {
          // upload the image to storage
          $image = $request->image->store('posts');

          // create the post
          Post::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'contant'=>$request->contant,
            'image'=>$image,
            'publiched_at'=>$request->publiched_at,
            'category_id'=>$request->category,
          ]);

          // flash message
          session()->flash('success', 'The Post Published Successfully');

          // redirect user
          return redirect(route('posts.index'));
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
    public function edit(Post $post)
    {
        return view('post.create')->with('post', $post)->with('categories', Category::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateUpdatePostRequest $request,Post $post)
    {
      $data = $request->only(['title', 'description', 'publiched_at', 'contant']);

      // Check if new image
      if( $request->hasFile('image') ){
        // upload it
        $image = $request->store('posts');

        // delete old
        $post ->deleteImage();

        $data['image'] = $image;
      }

      // update attribute
        $post -> update($data);
      // flash msg
      session()->flash('success', 'The Saved Successfully');

      //redirect user
      return redirect(route('posts.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $post = Post::withTrashed()->where('id', $id)->firstOrFail();

        if ($post->trashed()) {

          $post ->deleteImage();
          $post->forceDelete();
        }else{
          $post->delete();
        }

        session()->flash('success', 'The Post Deleted Successfully');
        return redirect(route('trashed-posts.index'));

    }

    /**
     * Dispaly a list of trashed Post.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
      $trashed = Post::onlyTrashed()->get();



      // This line is like "return view('post.index')->with('posts', $trashed)"
      return view('post.index')->withPosts($trashed);
    }

    public function restore($id)
    {
      $post = Post::withTrashed()->where('id', $id)->firstOrFail();

      $post->restore();
      session()->flash('success', 'The Post Restore Successfully');
      return redirect()->back();

    }
}
