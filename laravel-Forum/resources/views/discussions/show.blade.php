@extends('layouts.app')

@section('content')



        <div class="card my-2">

            @include('partials.discussion-header')

            <div class="card-body">
              <div class="text-center">
                <strong>{{ $discussion->title }}</strong>
              </div>

                <hr>

                {!! $discussion->content !!}
            </div>
        </div>


        <div class="card my-5">
          <div class="card-header">
            Add a replay
          </div>

          <div class="card-body">
            @auth
              <form class="" action="{{ route('replies.store', $discussion->slug) }}" method="POST">
                @csrf

                <input  type="hidden" id="reply" name="reply">
                <trix-editor input="reply"></trix-editor>

                <button class="btn btn-success btn-sm my-2" type="submit" name="button">Add Comment</button>
              </form>
            @else
            <a class="btn btn-info" href="{{ route('login') }}">Sign in to add a comment</a>
            @endauth
          </div>
        </div>
@endsection

@section('css')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.1.1/trix.css">
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.1.1/trix.js">

    </script>
@endsection
