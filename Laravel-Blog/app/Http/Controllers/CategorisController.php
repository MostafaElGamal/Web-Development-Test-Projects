<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;

use App\http\Requests\CreateCategoryRquest;
use App\http\Requests\CreateUpdateRequest;


class CategorisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('categories.index')->with('link', Category::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRquest  $request)
    {

        Category::create([
        'name' => $request->name,
      ]);

      session()->flash('success', 'Category Created Successfuly');

      return redirect( route('categories.index') );

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
    public function edit(Category $category)
    {
        return view('categories.create')->with('link', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateUpdateRequest $request, Category $category)
    {
        $category ->update(['name' => $request->name]);


        session()->flash('success', 'Category Upadted Successfuly');

        return redirect(route('categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
          // if you want to delete the category with all related posts
          // foreach ($category->posts as $key) {
          //   $key ->deleteImage();
          //   $key ->forceDelete();
          // }

          if($category -> posts->count() > 0){

            $count = $category->posts->count();
            session()->flash('error', sprintf('The Category Cannot be deleted becouse There is %s  posts', $count));

            return redirect()->back();
          }

          $category ->delete();

          session()->flash('sucuss', 'Category Delete Successfuly');

          return redirect( route('categories.index')) ;
    }
}
