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
              <form class="" action="index.html" method="post">
                @if(!$user->isAdmin() )
                <button class="btn btn-success btn-sm" type="button" name="button">Make Admin</button>
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
