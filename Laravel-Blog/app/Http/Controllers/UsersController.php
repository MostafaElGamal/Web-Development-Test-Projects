<?php

namespace App\Http\Controllers;
use App\User;
use App\Http\Requests\User\UpdateProfileRequest;
use Illuminate\Http\Request;


class UsersController extends Controller
{


    public function index()
    {
      return view('users.index')->with('users', User::all());
    }


    public function makeAdmin(User $user)
    {
      $user->role = 'admin';
      $user->save();

      session()->flash('success', sprintf('User %s has been upgraded to admin', $user->name));
      return redirect(route('users.index'));
    }

    public function edit()
    {
      return view('users.edit')->with('user', auth()->user());
    }

    public function update(UpdateProfileRequest $request)
    {
      $user = auth()->user();

      $user ->update([
        'name' => $request->name,
        'about'=> $request->about
      ]);

      session()->flash('success','User  has been updated Successfully');

      return redirect()->back();

    }
}
