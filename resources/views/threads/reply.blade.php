<div class="panel panel-default">
    <div class="panel-heading">
        <a href="{{ $reply->owner->path()  }}">{{ $reply->owner->name }} </a>
        said <strong>{{ $reply->created_at->diffForHumans() }}</strong>
    </div>
    <div class="panel-body">{{ $reply->body }}</div>
</div>