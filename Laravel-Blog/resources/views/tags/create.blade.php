@extends('layouts.app')
@section('content')

  <div class="card card-default">
    <div class="card-header">

    {{ isset($link) ?'Edit Tag' : 'Create Tags' }}

    </div>
    <div class="card-body">

      @include('partials.errors')


      <form  action="{{ isset($link) ? route('tags.update', $link->id)  :  route('tags.store')  }}" method="POST">
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
          {{ isset($link) ?'Save Tag' : 'Add tags'}}
          </button>
        </div>

      </form>
    </div>
  </div>
@endsection
