@extends('base.base')
@section('content')
      <div class="row justify-content-center">
        <div class="col-md-8">

          <h1 class="text-center my-5">ToDoPage</h1>

            <div class="card card-default">

              <div class="card-header">Todos</div>

              <div class="card-body">
                @foreach($link as $x)

                  <ul class="list-group">
                    <li class="list-group-item">
                       {{ $x-> name}}

                       @if(!$x -> completed)
                       <a class="btn btn-warning btn-sm float-right" style="color:white;" href="todos/{{$x -> id}}/complete">Complete</a>
                       @endif
                       <a class="btn btn-primary btn-sm float-right mr-2" href="todos/{{$x -> id}}">View</a>
                       <a class="btn btn-danger btn-sm float-right mr-2" href="todos/{{$x -> id}}/delete">Delete</a>
                    </li>
                  </ul>

                @endforeach
              </div>

            </div>

        </div>
      </div>
@endsection
