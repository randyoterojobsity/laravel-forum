<div class="panel panel-default">
    <div class="panel-heading">
        <a href="{{ $reply->owner->path()  }}">{{ $reply->owner->name }} </a>
        said <strong>{{ $reply->created_at->diffForHumans() }}</strong>

        <form action="/replies/{{ $reply->id }}/favorites" method="POST" style="float: right;">
            {{ csrf_field() }}
            <button type="submit" class="btn btn-sm btn-default" {{ $reply->isFavorited() ? 'disabled' : '' }}>
                {{ $reply->favorites_count }} {{ str_plural('Favorite', $reply->favorites_count) }}
            </button>
        </form>
    </div>
    <div class="panel-body">{{ $reply->body }}</div>
</div>