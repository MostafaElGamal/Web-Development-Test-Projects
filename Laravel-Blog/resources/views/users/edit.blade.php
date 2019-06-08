@extends('layouts.app')

@section('content')
            <div class="card">
                <div class="card-header">My Profile</div>

                <div class="card-body">
                  @include('partials.errors')
                    <form action="{{ route('users.update-profile') }}" method="POST">
                      @csrf
                      @method('PUT')

                        <div class="form-group">
                          <label for="name">Name</label>
                          <input class="form-control" type="text" name="name" id="name" value="{{ $user->name }}">
                        </div>
                        <div class="form-group">
                          <label for="about">About Me</label>
                          <textarea class="form-control" name="about" id="about" rows="8" cols="80">{{ $user->about }}</textarea>
                        </div>

                        <button class="btn btn-success" type="submit" name="button">Update Profile</button>
                    </form>
                </div>
            </div>
@endsection
