@extends('layouts.app')

@section('content')

  <div class="row justify-content-center">
    <div class="col-md-4">
      <div class="card">
        <div class="card-header">
          <strong>Upload The Song</strong>
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

            <form  action="{{ route('music.store') }}" method="POST" enctype="multipart/form-data">
              @csrf

              <div class="form-group">
                <label for="name">Song Name</label>
                <input class="form-control"type="text" name="name" id="name">
              </div>
              <hr>
              <div class="from-group">
                <label for="media">Upload your song down here</label>
                <input type="file" name="the_song" id="the_song">
              </div>

              <button style="width:100%;" class="btn btn-success my-2" type="submit" name="button">Upload</button>
                    </form>
                  </div>
              </div>
            </div>
          </div>

@endsection
