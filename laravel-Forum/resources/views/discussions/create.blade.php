@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">Add Discussion</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form  action="{{ route('discussions.store')}}" method="POST">
              @csrf

              <div class="form-group">
                <label for="title">Title</label>
                <input class="form-control" type="text" name="title" value="">
              </div>

              <div class="form-group">
                <label for="content">Content</label>

                  <input id="content" type="hidden" name="content">
                  <trix-editor input="content"></trix-editor>
              </div>

              <div class="form-group">
                <label for="channel">Channel</label>
                <select class="form-control" id="channel" name="channel">
                  @foreach($channels as $channel)
                    <option value="{{ $channel-> id}}">{{ $channel-> name}}</option>
                  @endforeach
                </select>
              </div>

              <button class="btn btn-success btn-sm" type="submit" name="button">Create Discussion</button>

            </form>
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
