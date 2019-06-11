@extends('base.base')
@section('content')
<h1 class="text-center">Edit Todos</h1>

<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card card-default">
      <div class="card-header">Create New Todos</div>
        <div class="card-body">

          @if ($errors -> any())
            <div class="alert alert-danger">
              <ul class="list-group">
                @foreach($errors->all() as $error)
                  <li class="list-group-item">
                    {{ $error }}
                  </li>
                @endforeach
              </ul>
            </div>
          @endif

          <form action="/todos/{{ $edit_link -> id }}/update-todos" method="POST">
            @csrf
            <div class="form-group">
              <input class="form-control" type="text" name="name" placeholder="Name" value="{{ $edit_link -> name }}">
            </div>
            <div class="form-group">
              <textarea class="form-control" placeholder="Description" name="desc" rows="5" cols="50">{{ $edit_link-> description}}</textarea>
            </div>
            <div class="form-group text-center">
              <button class="btn btn-success" type="submit" name="button">Update Todo</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
