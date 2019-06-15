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

            <a class="btn btn-success my-2" href="{{ route('music.create') }}">New Song</a>
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                   <table class="table">
                    <thead>
                      <th>Songs</th>
                      
                    </thead>

                    <tbody>

                    @foreach($music as $song)
                        <tr>
                            <td>
                                {{ $song->name }}

                                <a style="color: white;" class="btn btn-info btn-sm float-right" href="{{ route('music.show', $song->id)}}">Listen</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
