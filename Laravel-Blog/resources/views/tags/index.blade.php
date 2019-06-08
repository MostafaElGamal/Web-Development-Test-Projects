@extends('layouts.app')
@section('content')

  <div class="d-flex justify-content-end my-2">
    <a class="btn btn-success" href="{{ route('tags.create')}}">Add tags</a>
  </div>

  <div class="card card-default">
    <div class="card-header">tags</div>
    <div class="card-body">

      @if($link -> count() > 0)
      <table class="table">
        <thead>
          <th>Name</th>
          <th>Post Count</th>
        </thead>

        <tbody>
            @foreach($link as $tags)
              <tr>
                <td>
                   {{ $tags->name }}
                </td>

                <td>
                  {{ $tags->posts->count() }}
                </td>

                <td>
                  <button class="btn btn-danger btn-sm float-right" type="button" onclick="handleDelete( {{ $tags->id }} )" name="button">Delete</button>
                  <a class="btn btn-info btn-sm float-right mr-2" href="{{ route('tags.edit', $tags->id) }}" style="color:white;">Edit</a>
                </td>
              </tr>

            @endforeach
        </tbody>

      </table>
          <!-- Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">

            <form action="" method="POST" id="deletetagsForm">
              @csrf
              @method('DELETE')
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="deleteModalLabel">Delete tags</h5>
                  <button type="button" class="close" data-dismiss="modal " aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <strong><p class="text-center">Do You Realy want to Delete..?</p></strong>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Close</button>
                  <button type="submit" class="btn btn-danger">Yes, Delete</button>
                </div>
              </div>
            </form>

          </div>
        </div>
        @else
        <h3 class="text-center"> No tags Created Yet</h3>
        @endif
    </div>
  </div>

@endsection


@section('scripts')
  <script>
      function handleDelete(id){

        var form = document.getElementById('deletetagsForm')
        form.action = '/tags/' + id
        $('#deleteModal').modal('show');
      }
  </script>
@endsection
