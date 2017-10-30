@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>{{ $thread->title }}</h2>
                        posted: <a href="{{ $thread->creator->path() }}">{{ $thread->creator->name }}</a>
                    </div>
                    <div class="panel-body">{{ $thread->body }}</div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h3>List of Replies</h3>
                @foreach($thread->replies as $reply)
                    @include('threads.reply')
                @endforeach
            </div>
        </div>
    </div>
@endsection
