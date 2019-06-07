@extends('layouts.app')
@section('content')

<div class="card card-default">
  <div class="card-header">
    {{ isset($post) ? 'Edit Post' : 'Create Post' }}

  </div>

  <div class="card-body">

    @include('partials.errors')


    <form action="{{ isset($post) ?route('posts.update', $post ->id) : route('posts.store') }}"   method="POST" enctype="multipart/form-data">
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
          <img src="http://127.0.0.1:8000/storage/{{ $post->image }}" alt="NoImage" style="width:100%">
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

      @if($tags->count() > 0)
      <div class="form-group">
        <label for="tags">Tags</label>

        <select class="form-control tags-selector" name="tags[]" id="tags" multiple>
            @foreach($tags as $tag)

            <option value="{{ $tag->id }}"
              @if(isset($post))
                @if( $post->hashTag($tag->id) )

                selected
                @endif
              @endif
              >
              {{ $tag -> name }}
            </option>

            @endforeach
        </select>
      </div>
      @endif

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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
  <script>
    flatpickr('#publiched_at', {
      enableTime: true
    })

    $(document).ready(function() {
    $(".tags-selector").select2();
 })
  </script>
@endsection

@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.1.1/trix.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

@endsection
