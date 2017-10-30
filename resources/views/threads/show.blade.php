@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h2>{{ $thread->title }}</h2></div>
                    <div class="panel-body">{{ $thread->body }}</div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h3>List of Replies</h3>
                @foreach($thread->replies as $reply)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="{{ $reply->owner->path()  }}">{{ $reply->owner->name }} </a>
                            said <strong>{{ $reply->created_at->diffForHumans() }}</strong>
                        </div>
                        <div class="panel-body">{{ $reply->body }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
