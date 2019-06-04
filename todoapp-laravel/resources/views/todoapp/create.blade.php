@extends('layout.app')

@section('content')

      @if( $errors->any() )
      <div class="alert alert-danger">
        <ul class="list-group">
          @foreach($errors->all() as $error)
            <li class="list-group-item text-denger">
              {{ $error }}
            </li>
          @endforeach
        </ul>
      </div>
      @endif

<div class="row justify-content-center my-5">
  <div class="col-md-8">
    <div class="card card-default">
      <div class="card-header">
        {{ isset($link) ? 'Modify Your Mission' : 'Assign your new mission' }}
      </div>

      <div class="card-body">
        <form  action="{{ isset($link) ? route('todo.update', $link->id ): route('todo.store') }}" method="POST">
          @csrf

          @if( isset($link))
          @method('PUT')
          @endif

          <div class="form-group">
            <label for="name">Name:</label>
            <input class="form-control" id="name" type="text" name="name" value="{{ isset($link) ? $link->name : '' }}">
          </div>

          <div class="form-group">
            <label for="name">Description:</label>
            <textarea class="form-control" id="descrption" name="descrption" rows="8" cols="80">{{ isset($link) ? $link->descrption : '' }}</textarea>
          </div>

          <button class="btn btn-success btn-sm"type="submit" name="button">
            {{ isset($link) ? 'New Instructions' : 'Gooooo..!!' }}
          </button>

        </form>
      </div>
    </div>
  </div>
</div>

@endsection
