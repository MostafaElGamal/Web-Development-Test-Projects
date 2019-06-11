<?php

namespace App\Http\Controllers;

use App\Todo;

use Illuminate\Http\Request;

class Todos extends Controller
{
    //
    public function TodosIndex()
    {
      // code...
      return view('todos-app') ->with('link', Todo::all() );
    }

    public function show(Todo $id_do)
    {
      // code...
      return view('todo-show') -> with('single', $id_do);
    }

    public function create()
    {
      // code...
      return view('todos-create');
    }

    public function store()
    {
      $this -> validate(request() ,[
        'name' => 'required|min:4|max:13',
        'desc' => 'required'
      ]);

      $data = request()->all();

      $todo = new Todo();
      $todo -> name = $data['name'];
      $todo -> description = $data['desc'];
      $todo -> completed = false;

      $todo-> save();

      session() -> flash('success', 'Todo Created Succssfully');

      return redirect('/todos');
    }

    public function edit(Todo $todo_id)
    {
      // code...


      return view('todo-edit') -> with('edit_link', $todo_id);
    }

    public function update(Todo $todo_id)
    {
      // code..
      $this -> validate(request() ,[
        'name' => 'required|min:4|max:13',
        'desc' => 'required'
      ]);

      $data = request() -> all();


      $todo_id-> name = $data['name'];
      $todo_id ->description = $data['desc'];
      $todo_id -> completed = false;

      $todo_id-> save();

      session() -> flash('success', 'Todo Updated Succssfully');

      return redirect('/todos');

    }

    public function delete($todo_id)
    {
      // code...
      $todo = Todo::find($todo_id);

      $todo -> delete();

      session() -> flash('success', 'Todo Delete Succssfully');
      return redirect('/todos');

    }

    public function complete(Todo $todo_id)
    {
      // code...
      $todo_id -> completed = true;
      $todo_id ->save();

      session() -> flash('success', 'Todo Completed Succssfully');
      return redirect('/todos');
    }
}
