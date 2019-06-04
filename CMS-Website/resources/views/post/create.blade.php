@extends('layouts.app')
@section('content')

<div class="card card-default">
  <div class="card-header">
    {{ isset($post) ? 'Edit Post' : 'Create Post' }}

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

    <form action="{{ isset($post) ?route('posts.update', $post ->id) : route('posts.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      @if(isset($post))
        @method('PUT')
      @endif
      <div class="form-group">
        <label for="title">Title</label>
        <input class="form-control" type="text" name="title"  id="title" value="{{ isset($post) ? $post->title : '' }}">
      </div>

      <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description" rows="5" cols="80">{{ isset($post) ? $post->description : '' }}</textarea>
      </div>

      <div class="form-group">

        <label for="contant">Contant</label>
        <input id="contant" type="hidden" name="contant" value="{{ isset($post) ? $post->contant : '' }}">
        <trix-editor input="contant"></trix-editor>

      </div>


      <div class="form-group">
        <label for="publiched_at">Publiched At</label>
        <input class="form-control" type="text" name="publiched_at" value="{{ isset($post) ? $post->publiched_at : '' }}" id="publiched_at">
      </div>

      @if(isset($post))
        <div class="form-group">
          <img src="{{ asset($post->image) }}" alt="" style="width:100%">
        </div>
      @endif

      <div class="form-group">
        <label for="image">Image:</label>
        <input  class="form-control" type="file" name="image"  id="image" value="{{ isset($post) ? $post->image : '' }}">
      </div>

      <div class="form-group">
        <label for="category">Category:</label>
        <select class="form-control" id="category" name="category">
            @foreach($categories as $category)
                <option value="{{ $category->id }}"

                  @if(isset($post))
                  @if($category->id === $post->category_id)
                   selected
                  @endif
                  @endif
                  >
                  {{ $category ->name}}
                </option>
            @endforeach
        </select>
      </div>

      <div class="form-group">
        <input class="btn btn-success" type="submit" name="submit" value="{{ isset($post) ? 'Save' : 'Publish' }}">
      </div>


    </form>
  </div>
</div>
@endsection

@section('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.1.1/trix.js" charset="utf-8"></script>
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script>
    flatpickr('#publiched_at', {
      enableTime: true
    })
  </script>
@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.1.1/trix.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

@endsection
