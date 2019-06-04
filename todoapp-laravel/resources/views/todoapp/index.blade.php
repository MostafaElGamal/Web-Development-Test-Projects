@extends('layout.app')

@section('content')

<div class="row justify-content-center my-5">
  <div class="col-md-8">
    <h1 class="text-center">Your Do List ....!</h1>
      <div class="card card-default">
        <div class="card-header">
          <strong>Here is your Missions.</strong>
          <a class="btn btn-success btn-sm float-right" href="{{ route('todo.create') }}">New Mission</a>
        </div>
        <div class="card-body">
          <table class="table">
            <thead>
              <th>Missions:</th>
              <th></th>
            </thead>
            <tbody>

          @foreach($link as $mission)
            <tr>
              <td>{{ $mission->name }}</td>
              <td>
                <form  action="{{ route('todo.destroy',$mission->id) }}" method="post">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm float-right" data-toggle="modal" data-target="#myModal">GiveUp</button>
                </form>
                <a class="btn btn-info btn-sm float-right mr-2" href="{{ route('todo.show', $mission->id )}}">View</a>

                <form action="{{ route('todo.edit', $mission->id) }}" method="POST">
                  @method('GET')
                  <button class="btn-warning btn-sm float-right mr-2" type="submit" name="button" style="color:white;">Update</button>
                </form>
              </td>
            </tr>

            @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

@endsection
