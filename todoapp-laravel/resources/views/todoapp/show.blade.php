@extends('layout.app')

@section('content')

<a class="btn btn-success btn-sm" href="{{ route('todo.index') }}">Back </a>
<div class="row justify-content-center my-5">
  <div class="col-sm-8">
    <div class="card card-default">
      <div class="card-header">
        <h3>{{ $link->name }}</h3>
      </div>

      <div class="card-body">
      <p>{{ $link->descrption }}</p>
      </div>
    </div>
  </div>
</div>

@endsection
