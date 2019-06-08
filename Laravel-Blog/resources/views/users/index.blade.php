@extends('layouts.app')
@section('content')



  <div class="card card-default">
    <div class="card-header">Users</div>
    <div class="card-body">

      @if($users->count() > 0)
      <table class="table">
        <thead>
          <th>Image</th>
          <th>Name</th>
          <th>Email</th>
          <th>Role</th>
          <th></th>
          <th></th>

        </thead>

        <tbody>

          @foreach( $users as $user)
          <tr>
            <td>
              <img width="40px" height="40px" style="border-radios:50%;" src="{{ Gravatar::src($user->email) }}" alt="">
            </td>

            <td>
              {{ $user->name }}
            </td>

            <td>
              {{ $user->email}}
            </td>

            <td>
              {{ $user -> role }}
            </td>

            <td>
              <form class="" action="{{ route('users.make-admin', $user->id) }}" method="POST">
                @csrf
                @if(!$user->isAdmin() )
                <button class="btn btn-success btn-sm" type="submit" name="button">Make Admin</button>
                @endif
              </form>
            </td>
          </tr>
          @endforeach

        </tbody>
      </table>
      @else
        <h3 class="text-center"> No Useres Yet</h3>
      @endif

    </div>
@endsection
