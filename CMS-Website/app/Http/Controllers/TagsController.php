<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Post;

use App\http\Requests\Tag\CreateTagRequest;
use App\http\Requests\Tag\TagUpadteRequest;


class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tags.index')->with('link', Tag::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTagRequest $request)
    {

        Tag::create([
        'name' => $request->name,
      ]);

      session()->flash('success', 'Tag Created Successfuly');

      return redirect( route('tags.index') );

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
    public function edit(Tag $tag)
    {
        return view('tags.create')->with('link', $tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagUpadteRequests $request, Tag $tag)
    {
        $tag ->update(['name' => $request->name]);


        session()->flash('success', 'Tag Upadted Successfuly');

        return redirect(route('tags.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
          if($tag -> posts->count() > 0){

            $count = $tag->posts->count();
            session()->flash('error', sprintf('Tag Cannot be deleted becouse there is %s Posts ',$count));

            return redirect()->back();
          }

          $tag ->delete();

          session()->flash('sucuss', 'Tag Delete Successfuly');

          return redirect( route('tags.index')) ;
    }
}
