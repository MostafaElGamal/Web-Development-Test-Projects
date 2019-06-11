@extends('base.base')
@section('content')
      <h1 class="text-center my-5"> {{ $single->name }} </h1>
      <div class="row justify-content-center">
        <div class="col-md-6">

          <div class="card card-default">

             <div class="card-header">Details</div>

             <div class="card-body">
               <p>{{ $single->description }}</p>
             </div>
           </div>
           <a class="btn btn-info my-2" href="/todos/{{ $single -> id }}/edit">Edit</a>
           <a class="btn btn-danger my-2" href="/todos/{{ $single -> id }}/delete">Delete</a>
        </div>

        </div>
@endsection
