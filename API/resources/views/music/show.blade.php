@extends('layouts.app')

@section('content')

  @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$song->name}}</div>

                <div class="card-body">
                <audio controls autoplay style="width: 100%;">
                  <source src="{{ asset($song->sound) }}" type="audio/ogg">
                    <source src="{{ asset($song->sound) }}" type="audio/mpeg">
                    Your browser does not support the audio element.
                </audio>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
