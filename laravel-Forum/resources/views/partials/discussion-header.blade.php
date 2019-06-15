<div class="card-header">

  <div class="d-flex justify-content-between">
    <div>
      <img width="20%" src="{{ Gravatar::src($discussion->user->email) }}" style="border-radius:50%;"alt="There is bo ">
      <strong class="ml-2">{{ $discussion->user->name }}</strong>
    </div>
    <div>
      <a class="btn btn-success btn-sm" href="{{ route('discussions.show', $discussion->slug) }}">View</a>
    </div>
  </div>
</div>
