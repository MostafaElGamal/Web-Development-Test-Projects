<?php

namespace App\Http\Controllers;
use App\Todo;

use Illuminate\Http\Request;
use App\Http\Requests\todo\TodoReqauest;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('todoapp.index')->with('link', Todo::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todoapp.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TodoReqauest $request)
    {
        Todo::create([
          'name' => $request->name,
          'descrption' =>$request->descrption,
          'completed' =>false,
        ]);
        session()->flash('success', 'The Mission has been Assigend');
        return redirect(route('todo.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        return view('todoapp.show')->with('link', $todo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        return view('todoapp.create')->with('link', $todo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TodoReqauest $request,Todo $todo)
    {
        $data = $request->only(['name', 'descrption']);

        $todo->update($data);

        session()->flash('success', 'New instructions Has been saved.! Your Welcome :D');
        return redirect(route('todo.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mission = Todo::find($id);

        $mission->delete();
        session()->flash('success', 'The Mission has been Faild');
        return redirect(route('todo.index'));
    }
}
