@extends('layouts.app')
@section('content')

  <div class="card card-default">
    <div class="card-header">

    {{ isset($link) ?'Edit Category' : 'Create Categories' }}

    </div>
    <div class="card-body">

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

      <form  action="{{ isset($link) ? route('categories.update', $link->id)  :  route('categories.store')  }}" method="POST">
        @csrf

        @if( isset($link) )
        @method('PUT')
        @endif
        <div class="form-group">
          <label for="name">Name</label>
          <input name="name"  id="name" type="text" class="form-control" value="{{ isset($link) ? $link->name : ''}}">
        </div>

        <div class="form-group">
          <button class="btn btn-success" type="submit" name="button">
          {{ isset($link) ?'Save Category' : 'Add Categories'}}
          </button>
        </div>

      </form>
    </div>
  </div>
@endsection
