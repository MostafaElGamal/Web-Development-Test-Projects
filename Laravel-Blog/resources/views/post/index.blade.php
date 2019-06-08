@extends('layouts.app')
@section('content')

  <div class="d-flex justify-content-end my-2">
    <a class="btn btn-success" href="{{ route('posts.create')}}">Add Post</a>
  </div>

  <div class="card card-default">
    <div class="card-header">Posts</div>
    <div class="card-body">

      @if($posts->count() > 0)
      <table class="table">
        <thead>
          <th>Image</th>
          <th>Title</th>
          <th>Category</th>
          <th></th>
          <th></th>
        </thead>

        <tbody>

          @foreach( $posts as $post)
          <tr>
            <td>

              <img src="http://127.0.0.1:8000/storage/{{ $post->image }}" width="120px" height="60px" alt="There is no IMAGE">
            </td>

            <td>
              {{ $post->title }}
            </td>

            <td>
              <a href="{{ route('categories.edit', $post->category->id) }}">
                {{ $post->category->name }}
              </a>
            </td>

            @if(! $post->trashed() )

            <td>
              <a class="btn btn-info btn-sm" href="{{ route('posts.edit', $post->id ) }}">Edit</a>
            </td>
            @else

            <td>
              <form action="{{ route('restore-post', $post->id) }}" method="POST">
                @csrf
                @method('PUT')
                <button class="btn btn-info btn-sm" type="submit" name="button">Restore</button>
              </form>
            </td>

            @endif
            <td>
              <form action="{{ route('posts.destroy' ,$post->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm" type="submit" >
                  {{ $post->trashed() ? 'Delete' : 'Trash'}}
                </button>
              </form>
            </td>

          @endforeach
          </tr>
        </tbody>
      </table>
      @else
        <h3 class="text-center"> No Posts Yet</h3>
      @endif

    </div>
@endsection
